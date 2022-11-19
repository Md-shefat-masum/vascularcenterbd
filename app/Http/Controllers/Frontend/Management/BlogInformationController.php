<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteBlogCategoryInfo;
use App\Models\WebsiteBlogCommentsInfo;
use App\Models\WebsiteBlogInfo;
use App\Models\WebsiteBlogTagInfo;
use App\Models\WebsiteBlogTagName;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInfoTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as interImage;
use Throwable;

class BlogInformationController extends Controller
{
    public function list()
    {
        $list = WebsiteBlogInfo::latest()->with([
            'category'
        ])->paginate(5);
        return view('dashboard.editor.blog_information.list', compact('list'));
    }

    public function blog_comment()
    {
        $comment = WebsiteBlogCommentsInfo::latest()->with([
            'creator'
        ])->get();
        return view('dashboard.editor.blog_information.blog_comment',compact('comment'));
    }

    public function get_commentjson(Request $request)
    {
        $comment = WebsiteBlogCommentsInfo::orderBy('id', 'DESC')->with([
            'blog' => function ($query) {
                $query->select([
                    'id',
                    'title',
                    'image',
                    'slug',
                    'short_description',
                ]);
            }
        ])
            // ->whereExists(function ($query) {
            //     $query->select(DB::raw(1))
            //         ->from('website_blog_infos')
            //         ->whereColumn('website_blog_infos.id', 'blog_comments.blog_id');
            // })
            ->paginate(10);

        return response($comment);
    }
    public function all_course_comment(Request $req)
    {
        $courses = WebsiteBlogInfo::orderBy('category', 'ASC')->get();
        return view('dashboard.editor.course_information.all_course_comment', ['courses' => $courses]);
    }
    public function course_comment(Request $req)
    {
        $course = WebsiteBlogInfo::where('id', $req->id)->first();
        if ($course !== null) {
            $comment = WebsiteBlogCommentsInfo::where('course_id', $req->id)->orderBy("status", "DESC")->get();
        }
        return view('dashboard.editor.course_information.course_comment', ['comment' => $comment, 'course' => $course]);
    }
    public function course_comment_delete(Request $req)
    {
        $comment = WebsiteBlogCommentsInfo::where('id', $req->id)->first();
        $comment->delete();
        return redirect()->back();
    }
    public function course_comment_update(Request $req)
    {
        $comment = WebsiteBlogCommentsInfo::where('id', $req->id)->first();
        $comment->comment_reply = $req->comment_reply;
        $comment->comment_reply_id = Auth::user()->id;
        $comment->save();
        return "success";
    }
    public function comment_accept(Request $request)
    {
        $comment = WebsiteBlogCommentsInfo::find($request->id);
        !$comment->status ? $comment->status = 1 : $comment->status = 0;
        $comment->save();
        return redirect()->back();
    }

    public function comment_delete($id)
    {
        $comment = WebsiteBlogCommentsInfo::find($id);
        WebsiteBlogCommentsInfo::where('parent', $comment->id)->delete();
        $comment->delete();
        return redirect()->back();
    }

    public function list_json()
    {
        $blog = WebsiteBlogInfo::where('status', 1)
            ->select(['id', 'title', 'image', 'short_description'])
            ->with([
                'categories' => function ($query) {
                    $query->select([
                        'website_blog_category_infos.id',
                        'name'
                    ]);
                }
            ])
            ->paginate(5);

        return response()->json($blog, 200);
    }

    public function get_json($id)
    {
        $blog = WebsiteBlogInfo::where('status', 1)
            ->where('id', $id)
            ->with([
                'categories' => function ($query) {
                    $query->select([
                        'website_blog_category_infos.id',
                        'name'
                    ]);
                }
            ])
            ->first();

        return response()->json($blog, 200);
    }

    public function create()
    {
        $categories = WebsiteBlogCategoryInfo::all();
        $tags = WebsiteBlogTagName::all();
        return view('dashboard.editor.blog_information.create', ['categories' => $categories, 'tags' => $tags]);
    }
    public function edit(Request $request)
    {
        $blog = WebsiteBlogInfo::where('id', $request->id)->first();
        $categories = WebsiteBlogCategoryInfo::all();
        $tags = WebsiteBlogTagName::all();

        return view('dashboard.editor.blog_information.edit', ['blog' => $blog, 'categories' => $categories, 'tags' => $tags]);
    }
    public function view(Request $request)
    {
        $blog = WebsiteBlogInfo::where('id', $request->id)->first();
        $category = WebsiteBlogCategoryInfo::where('id', $blog->category_id)->first();
        $tags = WebsiteBlogTagName::all();
        return view('dashboard.editor.blog_information.view', ['blog' => $blog, 'category' => $category, 'tags' => $tags]);
    }

    public function url_check(Request $request)
    {
        if (WebsiteBlogInfo::where('url', $request->url)->exists()) {
            if ($request->has('id') && WebsiteBlogInfo::where('url', $request->url)->where('id', $request->id)->exists()) {
                return response()->json(false);
            } elseif ($request->has('id') && WebsiteBlogInfo::where('url', $request->url)->exists()) {
                return response()->json(true . '2nd');
            } else {
                return response()->json(false);
            }
        }
    }

    public function store(Request $request)
    {
        $blog = WebsiteBlogInfo::create($request->except(['image', 'tag_name']));
        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                // dd($file);
                $extension = $file->getClientOriginalExtension();
                $temp_name  = uniqid(10) . time();

                $image = interImage::make($file);

                // book size
                $canvas = interImage::canvas(740, 400);
                $image->resize(740, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $canvas->insert($image, 'center-center');
                $canvas->insert(interImage::make(public_path('logo.png'))->opacity(50), 'bottom-right');

                $path = 'uploads/blog/blog_740x400_' . $temp_name . '.' . $extension;
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $blog->image = $path;
        }
        $blog->creator = Auth::user()->id;
        if (WebsiteBlogInfo::where('slug', $blog->url)->exists()) {
            $blog->slug = $blog->url . '-' . $blog->id;
        } else {
            $blog->slug = $blog->url;
        }
        $blog->tag_name = json_encode($request->tag_name);
        $blog->save();

        // dd($request->all());

        return redirect()->route('editor_blog_list');
    }

    public function update(Request $request)
    {
        $blog = WebsiteBlogInfo::find($request->id);
        $blog->fill($request->except(['image', 'tag_name']));
        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            if ($blog->image && file_exists(public_path($blog->image))) {
                unlink(public_path($blog->image));
            }
            try {
                $file = $request->file('image');
                // dd($file);
                $extension = $file->getClientOriginalExtension();
                $temp_name  = uniqid(10) . time();

                $image = interImage::make($file);

                // book size
                $canvas = interImage::canvas(740, 400);
                $image->resize(740, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $canvas->insert($image, 'center-center');
                $canvas->insert(interImage::make(public_path('logo.png'))->opacity(50), 'bottom-right');

                $path = 'uploads/blog/blog_740x400_' . $temp_name . '.' . $extension;
                $canvas->save($path);
                $blog->image = $path;
            } catch (Throwable $e) {
                report($e);
                return response()->json($e, 500);
            }
        }
        $blog->creator = Auth::user()->id;
        if ($blog->slug !== $blog->url) {
            if (WebsiteBlogInfo::where('slug', $blog->url)->exists()) {
                $blog->slug = $blog->url . '-' . $blog->id;
            } else {
                $blog->slug = $blog->url;
            }
        }
        $blog->tag_name = json_encode($request->tag_name);
        $blog->save();
        return redirect()->route('editor_blog_edit', ['id' => $blog->id]);
    }

    public function destroy($id)
    {
        $blog = WebsiteBlogInfo::find($id);
        $blog->delete();
        return redirect()->route('editor_blog_list');
    }
}
