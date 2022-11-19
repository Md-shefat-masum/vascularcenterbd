<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInfoTitle;
use Illuminate\Http\Request;

class SocialLinksController extends Controller
{
    public function index()
    {
        $infos = WebsiteInfo::where('type_name','social_information')->orderBy('title','ASC')->get();
        $social_title=WebsiteInfoTitle::where("type_name","social_information")->orderBy('title',"ASC")->get();
        return view('dashboard.editor.social_information.index' ,['infos'=>$infos,"social_title"=>$social_title]);
    }
    public function store(Request $request)
    {
        WebsiteInfo::create($request->all());
        return redirect()->route('editor_social_information_index');
    }
    public function update(Request $request)
    {
        $update_item=WebsiteInfo::where('id',$request->id)->first();
        $update_item->fill($request->all())->save();
        return redirect()->route("editor_social_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteInfo::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
}
