<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteBlogCategoryInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogCategoryInformationController extends Controller
{
    public function categories()
    {

        $categories = WebsiteBlogCategoryInfo::paginate(10);;
        return view('dashboard.editor.blog_information.categories.categories', compact('categories'));
    }

    public static function static_categories_tree_json()
    {
        return (new self)->make_category_tree_array();
    }

    public function categories_tree_json()
    {
        return $this->make_category_tree_array();
    }

    private function buildCategories($children, $parent_id)
    {
        $result = array();
        foreach ($children as $row) {
            if ($row->parent_id == $parent_id) {
                if (WebsiteBlogCategoryInfo::where('parent_id', $row->id)->where('status', 1)->exists()) {
                    $children = WebsiteBlogCategoryInfo::where('parent_id', $row->id)->where("status", 1)->get();
                    $temp_category = [];
                    $temp_category['id'] = $row->id;
                    $temp_category['name'] = $row->name;
                    $temp_category['parent'] = $parent_id;
                    $temp_category['child'] = $this->buildCategories($children, $row->id);
                    $result[] = $temp_category;
                } else {
                    $temp_category['id'] = $row->id;
                    $temp_category['name'] = $row->name;
                    $temp_category['parent'] = $parent_id;
                    $temp_category['child'] = [];
                    $result[] = $temp_category;
                }
            }
        }
        return $result;
    }

    public function create_category()
    {
        return view('dashboard.editor.blog_information.categories.create');
    }

    public function edit_category($id)
    {
        $category = WebsiteBlogCategoryInfo::find($id);
        return view('dashboard.editor.blog_information.categories.edit', compact('category'));
    }
    
    public function category_delete($id)
    {
        $category = WebsiteBlogCategoryInfo::find($id);
        $category->delete();
        return redirect()->back();
    }

    public function view_category(Request $request)
    {
        $category = WebsiteBlogCategoryInfo::where('id', $request->id)->first();
        return view('dashboard.editor.blog_information.categories.view', compact('category'));
    }

    public function category_data($id)
    {
        return WebsiteBlogCategoryInfo::find($id);
    }

    public function make_category_tree_array()
    {
        $categories = WebsiteBlogCategoryInfo::where("status", 1)
            ->where('parent_id', 0)
            ->get();

        $all_category = [];

        foreach ($categories as $key => $item) {
            $module = $item->name . '_' . $item->id;
            if (WebsiteBlogCategoryInfo::where('parent_id', $item->id)->where('status', 1)->exists()) {
                $children = WebsiteBlogCategoryInfo::where('parent_id', $item->id)->where("status", 1)->get();
                $temp_category = [];
                $temp_category['id'] = $item->id;
                $temp_category['name'] = $item->name;
                $temp_category['parent'] = null;
                $temp_category['child'] = $this->buildCategories($children, $item->id);
                $all_category[] = $temp_category;
            } else {
                $temp_category['id'] = $item->id;
                $temp_category['name'] = $item->name;
                $temp_category['parent'] = null;
                $temp_category['child'] = [];
                $all_category[] = $temp_category;
            }
        }

        return $all_category;
    }
    public function make_category_tree($categories, $default_category)
    {
        return view('dashboard.editor.blog_information.categories.category_tree_view', compact('categories', 'default_category'))->render();
    }

    public function store_category(Request $request)
    {
        $category = WebsiteBlogCategoryInfo::create($request->except('category_image'));
        $category->creator = Auth::user()->id;
        $category->save();
        $category->slug = $category->id . rand(1111, 9999) . Str::slug($request->name);
        $category->save();

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $path = Storage::put('/uploads/category_image', $file);
            $category->category_image = $path;
            $category->save();
        }
        return view('dashboard.editor.blog_information.categories.create');
    }

    public function store_category_from_blog_create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
        ]);
        $category = new WebsiteBlogCategoryInfo();
        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->creator = Auth::user()->id;
        $category->save();
        $category->slug = $category->id . uniqid(5);
        $category->url = Str::slug($request->name) . $category->id . rand(1111, 9999);
        $category->save();

        return $category;
    }

    public function update_category(Request $request)
    {

        // return dd($request->all());
        $category = WebsiteBlogCategoryInfo::find($request->id);
        $category->fill($request->except('category_image'));
        $category->creator = Auth::user()->id;
        $category->save();

        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $path = Storage::put('/uploads/category_image', $file);
            $category->category_image = $path;
            $category->save();
        }
        return redirect()->route('editor_blog_edit_category', ['id' => $category->id]);
    }

    public function rearenge_category(Request $request)
    {
        if (!$request->parent_id) {
            $parent_id = 0;
        } else {
            $parent_id = $request->parent_id;
        }
        WebsiteBlogCategoryInfo::where('id', $request->id)->update([
            'parent_id' => $parent_id,
        ]);
        return $request->all();
    }

    public function categorie_url_check(Request $request)
    {
        if (WebsiteBlogCategoryInfo::where('url', $request->url)->exists()) {
            if ($request->has('id') && WebsiteBlogCategoryInfo::where('url', $request->url)->where('id', $request->id)->exists()) {
                return response()->json(false);
            } elseif ($request->has('id') && WebsiteBlogCategoryInfo::where('url', $request->url)->exists()) {
                return response()->json(true . '2nd');
            } else {
                return response()->json(false);
            }
        }
    }
}
