<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Banner;
use App\Models\SeminarInfo;
use App\Models\SeminarRegistrationInfo;
use App\Models\SubscribeInfo;
use App\Models\Team;
use App\Models\WebsiteBlogCategoryInfo;
use App\Models\WebsiteBlogCommentsInfo;
use App\Models\WebsiteBlogInfo;
use App\Models\WebsiteContactAnyQuestion;
use App\Models\WebsiteCourseAdmissionInfo;
use App\Models\WebsiteCourseComment;
use App\Models\WebsiteCourseInfo;
use App\Models\WebsiteCourseNextBatchRegisterInfo;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInstructor;
use App\Models\WebsiteSpecialityInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function login(request $req)
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        return view('auth.login', ["website_info" => $website_data]);
    }

    public function register(request $req)
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        return view('auth.register', ["website_info" => $website_data]);
    }
    public function reset(request $req)
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        return view('auth.passwords.reset', ["website_info" => $website_data]);
    }
    public function email(request $req)
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        return view('auth.passwords.email', ["website_info" => $website_data]);
    }
    public function postSubscribe(request $req)
    {
        $check = SubscribeInfo::insert([
            'email' => $req['email'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        return $check;
    }
    public function index()
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            array_push($website_data[$value->title], $value->value);
            // $website_data[$value->title] += [$value->value];
        }
        $course = new WebsiteCourseInfo;
        $specility = WebsiteSpecialityInformation::all();
        $team = Team::all();
        $banner = Banner::latest()->get();
        $blogs = WebsiteBlogInfo::latest()->limit(3)->get();
        // dd($website_data);
        return view('fontend.home', [
            'banner' => $banner,
            'about' => $website_data['About Information'][0],
            'blogs' => $blogs,
            'team' => $team,
            'about_image' => $website_data['About Information Image'][0],
            "website_info" => $website_data,
            "course" => $course,
            'speciality' => $specility
        ]);
    }

    public function contact()
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        return view('fontend.contact', ["website_info" => $website_data]);
    }
    public function any_question(request $req)
    {

        $data = WebsiteContactAnyQuestion::create([
            'name' => $req['name'],
            'phone' => $req['phone'],
            'email' => $req['email'],
            'question' => $req['question'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        try {
            $mail_view = view('email.contact_mail', [
                'data' => $data,
            ])->render();
            Mail::to('myphoto204@gmail.com')->send(new ContactMail($mail_view));
        } catch (\Throwable $th) {
            return redirect()->back()->with('success','thanks for your feedback.');
        }

        return redirect()->back()->with('success','thanks for your feedback.');
    }
    public function about()
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            array_push($website_data[$value->title], $value->value);
            // $website_data[$value->title] += [$value->value];
        }
        // dd($website_data);
        return view('fontend.about', [
            "website_info" => $website_data,
            'about' => $website_data['About Information'][0],
            'about_image' => $website_data['About Information Image'][0],
        ]);
    }

    public function blog()
    {
        $website_info = WebsiteInfo::where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        if (request()->has('key')) {
            $key = request()->key;
            $all_blog = WebsiteBlogInfo::where(function ($q) use ($key) {
                return $q->where('title', 'LIKE', '%' . $key . '%')
                    ->orWhere('search_keywords', 'LIKE', '%' . $key . '%');
            })->where('status', 'active')->orderBy('add_to_featured', 'ASC')->with([
                'category'
            ])->paginate(5);
        } else if (request()->has('tag')) {
            $all_blog = WebsiteBlogInfo::whereJsonContains('tag_name', request()->tag)->where('status', 'active')->orderBy('add_to_featured', 'ASC')->with([
                'category'
            ])->paginate(5);
        } else if (request()->has('category')) {
            $all_blog = WebsiteBlogInfo::where('category_id', request()->category)->where('status', 'active')->orderBy('add_to_featured', 'ASC')->with([
                'category'
            ])->paginate(5);
        } else {
            $all_blog = WebsiteBlogInfo::where('status', 'active')->orderBy('add_to_featured', 'ASC')->with([
                'category'
            ])->paginate(5);
        }

        $top_view = WebsiteBlogInfo::where('status', 'active')->orderBy('view', 'DESC')->limit(3)->get();
        $recent_post = WebsiteBlogInfo::where('status', 'active')->orderBy('updated_at', 'ASC')->limit(3)->get();
        $blog_category = WebsiteBlogCategoryInfo::all();

        return view('fontend.blog', ["website_info" => $website_data, 'all_blog' => $all_blog, 'top_view' => $top_view, "recent_post" => $recent_post, 'blog_category' => $blog_category]);
    }

    public function item_blog_page(Request $request)
    {
        $website_info = WebsiteInfo::where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            $website_data[$value->title] += [$value->value];
        }
        $recent_post = WebsiteBlogInfo::where('status', 'active')->orderBy('updated_at', 'ASC')->limit(3)->get();
        $blog = WebsiteBlogInfo::where('slug', '/' . $request->slug)->with([
            'category',
            'comments' => function ($q) {
                return $q->where('status', 1)->with(['creator']);
            }
        ])->first();
        $blog->view = $blog->view + 1;
        $blog->save();

        $blog_categories = WebsiteBlogCategoryInfo::latest()->withCount(['blogs'])->get()->take(10);
        $latest_blog = WebsiteBlogInfo::latest()->limit(5)->get();

        return view('fontend.item_blog_page', ["latest_blog" => $latest_blog, "blog_categories" => $blog_categories, "website_info" => $website_data, 'blog' => $blog, 'recent_post' => $recent_post]);
    }

    public function store_blog_comment(Request $request)
    {
        $comment = WebsiteBlogCommentsInfo::create($request->only(['blog_id', 'comment']));
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back();
    }
}
