<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteBlogTagName;
use Illuminate\Http\Request;

class BlogTagsInformationController extends Controller
{
    public function index()
    {
        
        $tags = WebsiteBlogTagName::all();
        return view('dashboard.editor.blog_information.tag_name.index' ,['tags'=>$tags]);
    }
    public function store(Request $request)
    {
        WebsiteBlogTagName::create($request->all());
        return redirect()->route('editor_blog_tags_information_index');
    }
    public function update(Request $request)
    {
        $update_item=WebsiteBlogTagName::where('id',$request->id)->first();

        $update_item->fill($request->all())->save();
        return redirect()->route("editor_blog_tags_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteBlogTagName::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
}
