<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteInfo;
use App\Models\WebsiteInfoTitle;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
class ImageInformationController extends Controller
{
    public function index()
    {
        $infos = WebsiteInfo::where('type_name','image_information')->orderBy('title','ASC')->get();
        $image_title=WebsiteInfoTitle::where("type_name","image_information")->orderBy('title',"ASC")->get();

        return view('dashboard.editor.image_information.index' ,['infos'=>$infos,"image_title"=>$image_title]);
    }
    public function store(Request $request)
    {
        $info=WebsiteInfo::create($request->except('value'));
        if ($request->hasFile('value')) {
            $file = $request->file('value');
            $slug =  "image".$info->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $info_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);
            $image_folder = public_path() . "/uploads/website/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($image_folder.'/'.$info->value))){
                    unlink(public_path($image_folder.'/'.$info->value));
                }
            }
            $image->save($image_folder . '/' . $info_thumb);
            $info->value = "uploads/website/".$directory . '/' . $info_thumb;
            $info->save();
        }
        return redirect()->route('editor_image_information_index');
    }
    public function update(Request $request)
    {
        $info=WebsiteInfo::where('id',$request->id)->first();
        $info->fill($request->except('value'))->save();
        if ($request->hasFile('value')) {
            $file = $request->file('value');
            $slug =  "image".$info->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $info_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);
            $image_folder = public_path() . "/uploads/website/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($image_folder.'/'.$info->value))){
                    unlink(public_path($image_folder.'/'.$info->value));
                }
            }
            $image->save($image_folder . '/' . $info_thumb);
            $info->value = "uploads/website/".$directory . '/' . $info_thumb;
            $info->save();
        }
        return redirect()->route("editor_image_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteInfo::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
    
}