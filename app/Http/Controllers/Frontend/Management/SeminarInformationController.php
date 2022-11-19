<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\SeminarInfo;
use App\Models\SeminarRegistrationInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class SeminarInformationController extends Controller
{
    public function index()
    {  
        $seminar = SeminarInfo::where('countdown_time','>=',date('Y-m-d H:i:s'))->orderBy('countdown_time','ASC')->get();
        return view('dashboard.editor.seminar_information.index' ,['seminar'=>$seminar]);
    }
    public function upcomming_seminar()
    {  
        $seminar = SeminarInfo::where('countdown_time','>',date('Y-m-d H:i:s'))->orderBy('countdown_time','ASC')->get();
        return view('dashboard.editor.seminar_information.create_upcomming_seminar' ,['seminar'=>$seminar]);
    }
    public function upcomming_seminar_update(Request $req)
    {  
        $seminar = SeminarInfo::where('id',$req->id)->first();
        return view('dashboard.editor.seminar_information.update_upcomming_seminar' ,['seminar'=>$seminar]);
    }
    public function upcomming_seminar_view(Request $req)
    {  
        $seminar = SeminarInfo::where('id',$req->id)->first();
        return view('dashboard.editor.seminar_information.view_upcomming_seminar' ,['seminar'=>$seminar]);
    }
    public function registration_seminar(Request $req)
    {  
        $seminar = SeminarInfo::where('id',$req->id)->first();
        $registration = SeminarRegistrationInfo::where('seminar_id',$req->id)->get();
        return view('dashboard.editor.seminar_information.seminar_registration' ,['seminar'=>$seminar,'registration'=>$registration]);
    }
    public function registration_seminar_delete(Request $req)
    {  
        $reg = SeminarRegistrationInfo::where('id',$req->id)->first();
        $reg->delete();
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $seminar=SeminarInfo::create($request->except('image'));
        $seminar->countdown_time=Carbon::parse($request->countdown_time)->toDateTimeString();
        $pro_video='';
        if(isset($request->promo_video_link))
        {
            if(str_starts_with($request->promo_video_link,'https://youtu.be'))
                {
                    $pro_video=explode("https://youtu.be/",$request->promo_video_link);
                    $seminar->promo_video_link=$pro_video[1];
                }
            if(str_starts_with($request->promo_video_link,'https://www.youtube.com/watch'))
                {
                    $pro_video=explode("https://www.youtube.com/watch?v=",$request->promo_video_link);
                    $seminar->promo_video_link=$pro_video[1];
                }     
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$seminar->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $seminar_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(300, 250, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(300, 250);
            $image->resize(300, 250);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/seminar/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path("uploads/seminar/".$directory . '/' . $seminar_thumb))){
                    unlink(public_path("uploads/seminar/".$directory . '/' . $seminar_thumb));
                }
            }
            $img_canvas->save($image_folder . '/' . $seminar_thumb);
            $seminar->image = "uploads/seminar/".$directory . '/' . $seminar_thumb;
        }

        $seminar->save();
        return redirect()->route('editor_seminar_information_index');
    }
    public function update(Request $request)
    {
        $seminar=SeminarInfo::where('id',$request->id)->first();
        $seminar->fill($request->except('image'))->save();
        $seminar->countdown_time=Carbon::parse($request->countdown_time)->toDateTimeString();
        $pro_video='';
        if(isset($request->promo_video_link))
        {
            if(str_starts_with($request->promo_video_link,'https://youtu.be'))
                {
                    $pro_video=explode("https://youtu.be/",$request->promo_video_link);
                    $seminar->promo_video_link=$pro_video[1];
                }
            if(str_starts_with($request->promo_video_link,'https://www.youtube.com/watch'))
                {
                    $pro_video=explode("https://www.youtube.com/watch?v=",$request->promo_video_link);
                    $seminar->promo_video_link=$pro_video[1];
                }
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$seminar->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $seminar_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(300, 250, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(300, 250);
            $image->resize(300, 250);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/seminar/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($seminar->image))){
                    unlink(public_path($seminar->image));
                }
            }
            $img_canvas->save($image_folder . '/' . $seminar_thumb);
            $seminar->image = "uploads/seminar/".$directory . '/' . $seminar_thumb;
        }
        $seminar->save();
        return redirect()->route("editor_seminar_information_index");
    }
    public function previous_seminar_index()
    {  
        $seminar = SeminarInfo::where('countdown_time','<',date('Y-m-d H:i:s'))->orderBy('countdown_time','ASC')->get();
        return view('dashboard.editor.seminar_information.previous_seminar_index' ,['seminar'=>$seminar]);
    }
    public function previous_seminar_update(Request $req)
    {  
        $seminar = SeminarInfo::where('id',$req->id)->first();
        return view('dashboard.editor.seminar_information.previous_seminar_update' ,['seminar'=>$seminar]);
    }
    public function previous_seminar_view(Request $req)
    {  
        $seminar = SeminarInfo::where('id',$req->id)->first();
        return view('dashboard.editor.seminar_information.previous_seminar_view' ,['seminar'=>$seminar]);
    }
    public function update_previous(Request $request)
    {
        $seminar=SeminarInfo::where('id',$request->id)->first();
        $seminar->fill($request->except('image'))->save();
        $pro_video='';
        if(isset($request->seminar_video_link))
        {
            if(str_starts_with($request->seminar_video_link,'https://youtu.be'))
                {
                    $pro_video=explode("https://youtu.be/",$request->seminar_video_link);
                    $seminar->seminar_video_link=$pro_video[1];
                }
            if(str_starts_with($request->seminar_video_link,'https://www.youtube.com/watch'))
                {
                    $pro_video=explode("https://www.youtube.com/watch?v=",$request->seminar_video_link);
                    $seminar->seminar_video_link=$pro_video[1];
                }  
        }
        if(isset($request->fir_cl_video_link))
        {
            if(str_starts_with($request->fir_cl_video_link,'https://youtu.be'))
                {
                    $pro_video=explode("https://youtu.be/",$request->fir_cl_video_link);
                    $seminar->fir_cl_video_link=$pro_video[1];
                }
            if(str_starts_with($request->fir_cl_video_link,'https://www.youtube.com/watch'))
                {
                    $pro_video=explode("https://www.youtube.com/watch?v=",$request->fir_cl_video_link);
                    $seminar->fir_cl_video_link=$pro_video[1];
                }
        }
        if(isset($request->sec_cl_video_link))
        {
            if(str_starts_with($request->sec_cl_video_link,'https://youtu.be'))
                {
                    $pro_video=explode("https://youtu.be/",$request->sec_cl_video_link);
                    $seminar->sec_cl_video_link=$pro_video[1];
                }
            if(str_starts_with($request->sec_cl_video_link,'https://www.youtube.com/watch'))
                {
                    $pro_video=explode("https://www.youtube.com/watch?v=",$request->sec_cl_video_link);
                    $seminar->sec_cl_video_link=$pro_video[1];
                }
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$seminar->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $seminar_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(300, 250, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(300, 250);
            $image->resize(300, 250);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/seminar/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($seminar->image))){
                    unlink(public_path($seminar->image));
                }
            }
            $img_canvas->save($image_folder . '/' . $seminar_thumb);
            $seminar->image = "uploads/seminar/".$directory . '/' . $seminar_thumb;
        }
        $seminar->save();
        return redirect()->route("editor_previous_seminar_index_information");
    }
    public function delete(Request $request)
    {
        $delete_item=SeminarInfo::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
}
