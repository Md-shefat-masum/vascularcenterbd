<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInfoTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutInformationController extends Controller
{
    public function index()
    {
        $infos = WebsiteInfo::where('type_name', 'about_information')->first();
        $info_image = WebsiteInfo::where('type_name', 'about_information_image')->first();
        // dd($infos, $info_image);
        return view('dashboard.editor.about_information.index', ['info_image' => $info_image, 'infos' => $infos]);
    }
    public function update(Request $request)
    {
        // dd($request->all());
        // if($request->id == 'null'){
        //     $info=WebsiteInfo::create($request->except('id'));
        // }
        // else{
        //     $info=WebsiteInfo::where('id',$request->id)->first();
        //     $info->fill($request->all())->save();
        // }

        $info = WebsiteInfo::where('id', $request->id)->first();
        if($info){
            $info->value = $request->value;
            $info->save();
        }

        $info = WebsiteInfo::where('id', $request->info_image_id)->first();
        if($info){
            $info->value = Storage::put('uploads/about',$request->about_information_image);
            $info->save();
        }
        return redirect()->route("editor_about_information_index");
    }
}
