<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInfoTitle;
use Illuminate\Http\Request;

class SeoInformationController extends Controller
{
    public function index()
    {
        
        $infos = WebsiteInfo::where('type_name','seo_information')->orderBy('title','ASC')->get();
        $seo_title=WebsiteInfoTitle::where("type_name","seo_information")->orderBy('title',"ASC")->get();
        return view('dashboard.editor.seo_information.index' ,['infos'=>$infos,"seo_title"=>$seo_title]);
    }
    public function store(Request $request)
    {
        WebsiteInfo::create([
            "title"=>$request->title,
            "value"=>json_encode($request->value),
            'type_name'=>$request->type_name
        ]);
        return redirect()->route('editor_seo_information_index');
    }
    public function update(Request $request)
    {
        $update_item=WebsiteInfo::where('id',$request->id)->first();

        $update_item->fill(    [
            "title"=>$request->title,
            "value"=>json_encode($request->value)
            ])->save();
        return redirect()->route("editor_seo_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteInfo::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
}
