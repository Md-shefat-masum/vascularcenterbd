<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteCourseCategory;
use App\Models\WebsiteCourseComment;
use App\Models\WebsiteCourseContent;
use App\Models\WebsiteCourseFeature;
use App\Models\WebsiteCourseInfo;
use App\Models\WebsiteCourseNextBatchRegisterInfo;
use App\Models\WebsiteCourseRequirement;
use App\Models\WebsiteInstructor;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CourseInformationController extends Controller
{
    public function index()
    {
        $courses=WebsiteCourseInfo::orderBy('category','ASC')->get();
        return view('dashboard.editor.course_information.index',['courses'=>$courses]);
    }
    public function create_course_page(){
        $instructor=WebsiteInstructor::all();
        $category=WebsiteCourseCategory::all();
        return view('dashboard.editor.course_information.create_course_page' ,['instructor'=>$instructor,'category'=>$category]);
    }
    public function update_course_page(Request $req){
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        $instructor=WebsiteInstructor::all();
        $category=WebsiteCourseCategory::all();
        return view('dashboard.editor.course_information.update_course_page' ,['instructor'=>$instructor,'course'=>$course,'category'=>$category]);
    }
    public function view_course_page(Request $req){
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        $instructor=WebsiteInstructor::all();
        return view('dashboard.editor.course_information.view_course_page' ,['instructor'=>$instructor,'course'=>$course]);
    }
    public function all_course_registration(Request $req){
        $courses=WebsiteCourseInfo::orderBy('category','ASC')->get();
        return view('dashboard.editor.course_information.all_course_registration',['courses'=>$courses]);
    }
    public function course_registration(Request $req){
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        if($course !== null){
            $registration=WebsiteCourseNextBatchRegisterInfo::where('course_id',$req->id)->get();
        }
        return view('dashboard.editor.course_information.course_registration' ,['registration'=>$registration,'course'=>$course]);
    }
    public function course_registration_delete(Request $req){
        $registraion=WebsiteCourseNextBatchRegisterInfo::where('id',$req->id)->first();
        $registraion->delete();
        return redirect()->back();
    }
    public function all_course_comment(Request $req){
        $courses=WebsiteCourseInfo::orderBy('category','ASC')->get();
        return view('dashboard.editor.course_information.all_course_comment',['courses'=>$courses]);
    }
    public function course_comment(Request $req){
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        if($course !== null){
            $comment=WebsiteCourseComment::where('course_id',$req->id)->orderBy("status","DESC")->get();
        }
        return view('dashboard.editor.course_information.course_comment' ,['comment'=>$comment,'course'=>$course]);
    }
    public function course_comment_delete(Request $req){
        $comment=WebsiteCourseComment::where('id',$req->id)->first();
        $comment->delete();
        return redirect()->back();
    }
    public function course_comment_update(Request $req){
        $comment=WebsiteCourseComment::where('id',$req->id)->first();
        $comment->comment_reply = $req->comment_reply;
        $comment->comment_reply_id = Auth::user()->id;
        $comment->save();
        return "success";
    }
    public function update_course_content(Request $req){
        $content=WebsiteCourseContent::where('course_id',$req->id)->get();
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        return view('dashboard.editor.course_information.update_course_content' ,['content'=>$content,'course'=>$course]);
    }
    public function update_course_requirement(Request $req){
        $requirement=WebsiteCourseRequirement::where('course_id',$req->id)->get();
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        return view('dashboard.editor.course_information.update_course_requirement' ,['requirement'=>$requirement,'course'=>$course]);
    }
    public function update_course_feature(Request $req){
        $feature=WebsiteCourseFeature::where('course_id',$req->id)->get();
        $course=WebsiteCourseInfo::where('id',$req->id)->first();
        return view('dashboard.editor.course_information.update_course_feature' ,['feature'=>$feature,'course'=>$course]);
    }
    public function all_course_instructor(){
        $instructor=WebsiteInstructor::all();
        return view('dashboard.editor.course_information.all_course_instructor' ,['instructor'=>$instructor]);
    }
    public function create_course_instructor(){
        $category=WebsiteCourseCategory::all();
        return view('dashboard.editor.course_information.create_course_instructor',['category'=>$category]);
    }
    public function update_course_instructor(Request $req){
        $instructor=WebsiteInstructor::where('id',$req->id)->first();
        $category=WebsiteCourseCategory::all();
        return view('dashboard.editor.course_information.update_course_instructor' ,['instructor'=>$instructor,'category'=>$category]);
    }
    public function view_course_instructor(Request $req){
        $instructor=WebsiteInstructor::where('id',$req->id)->first();
        return view('dashboard.editor.course_information.view_course_instructor' ,['instructor'=>$instructor]);
    }
    public function store(Request $request)
    {
        $course=WebsiteCourseInfo::create($request->except('image'));
        $course->slug = str_replace(" ","-",$course->title).'-'.$course->id.rand(100,1000);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$course->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $course_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(600, 400);
            $image->resize(600, 400);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/course/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path("uploads/course/".$directory . '/' . $course_thumb))){
                    unlink(public_path("uploads/course/".$directory . '/' . $course_thumb));
                }
            }
            $img_canvas->save($image_folder . '/' . $course_thumb);
            $course->image = "uploads/course/".$directory . '/' . $course_thumb;
           
        }
        $course->save();
        return redirect()->route('editor_course_information_index');
    }
    public function update(Request $request)
    {
        $course=WebsiteCourseInfo::where('id',$request->id)->first();
        $course->fill($request->except('image'))->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$course->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $course_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(600, 400);
            $image->resize(600, 400);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/course/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($course->image))){
                    unlink(public_path($course->image));
                }
            }
            $img_canvas->save($image_folder . '/' . $course_thumb);
            $course->image = "uploads/course/".$directory . '/' . $course_thumb;
            $course->save();
        }
        
        return redirect()->route("editor_course_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteCourseInfo::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
    public function store_instructor(Request $request)
    {
        $instructor=WebsiteInstructor::create($request->except('image'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$instructor->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $instructor_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(600, 400);
            $image->resize(600, 400);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/instructor/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path("uploads/instructor/".$directory . '/' . $instructor_thumb))){
                    unlink(public_path("uploads/instructor/".$directory . '/' . $instructor_thumb));
                }
            }
            $img_canvas->save($image_folder . '/' . $instructor_thumb);
            $instructor->image = "uploads/instructor/".$directory . '/' . $instructor_thumb;
            $instructor->save();
        }  
        return redirect()->route('editor_all_course_instructor_information');
    }
    public function update_instructor(Request $request)
    {
        $instructor=WebsiteInstructor::where('id',$request->id)->first();
        $instructor->fill($request->except('image'))->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $slug =  "image".$instructor->id ;
            $directory = Carbon::now()->year . '/' . Carbon::now()->format('m');
            // dd($directory);
            $currentDate = str_replace(':', '_', Carbon::now()->toDateTimeString());
            $currentDate = str_replace(' ', '_', $currentDate);
            $currentDate = str_replace('-', '_', $currentDate);

            // dd($currentDate);
            $instructor_thumb = $slug . '-' . $currentDate . '.' . $file->getClientOriginalExtension();

            $image = Image::make($file);

            $image->resize(600, 400, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img_canvas = Image::canvas(600, 400);
            $image->resize(600, 400);
            // $img_canvas->insert($imagebg, 'center');
            $img_canvas->insert($image, 'center');

            $image_folder = public_path() . "/uploads/instructor/" . $directory;
            if (!file_exists($image_folder)) {
                mkdir($image_folder, 0777, true);
            }else{
                // dd(public_path($user->photo));
                if(file_exists(public_path($instructor->image))){
                    unlink(public_path($instructor->image));
                }
            }
            $img_canvas->save($image_folder . '/' . $instructor_thumb);
            $instructor->image = "uploads/instructor/".$directory . '/' . $instructor_thumb;
            $instructor->save();
        }
        
        return redirect()->route("editor_all_course_instructor_information");
    }
    public function delete_instructor(Request $request)
    {
        $delete_item=WebsiteInstructor::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
    public function all_category(Request $request)
    {
        $categories=WebsiteCourseCategory::all();
        return view('dashboard.editor.course_information.course_category_index',['categories'=>$categories]);
    }
    public function store_category(Request $request)
    {
        WebsiteCourseCategory::create($request->all());
        return redirect()->route("editor_all_category_information");
    }
    public function update_category(Request $request)
    {
        $category=WebsiteCourseCategory::where('id',$request->id)->first();
        $category->fill($request->all());
        $category->save();
        return redirect()->route("editor_all_category_information");
    }
    public function delete_category(Request $request)
    {
        $delete_item=WebsiteInstructor::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
    public function store_course_other(Request $request)
    {
        if($request->type == 'feature')
        {
            WebsiteCourseFeature::create($request->except('type'));
            return redirect()->route("editor_update_course_feature_information",['id'=>$request->course_id]);
        }
        if($request->type == 'requirement')
        {
            WebsiteCourseRequirement::create($request->except('type'));
            return redirect()->route("editor_update_course_requirement_information",['id'=>$request->course_id]);
        }
        if($request->type == 'content')
        {
            WebsiteCourseContent::create($request->except('type'));
            return redirect()->route("editor_update_course_content_information",['id'=>$request->course_id]);
        }
        return redirect()->route("editor_course_information_index");
    }
    public function update_course_other(Request $request)
    {
        if($request->type == 'feature')
        {
            $update=WebsiteCourseFeature::where('id',$request->id)->first();
            $update->fill($request->except('type'));
            $update->save();
            return redirect()->route("editor_update_course_feature_information",['id'=>$request->course_id]);
        }
        if($request->type == 'requirement')
        {
            $update=WebsiteCourseRequirement::where('id',$request->id)->first();
            $update->fill($request->except('type'));
            $update->save();
            return redirect()->route("editor_update_course_requirement_information",['id'=>$request->course_id]);
        }
        if($request->type == 'content')
        {
            $update=WebsiteCourseContent::where('id',$request->id)->first();
            $update->fill($request->except('type'));
            $update->save();
            return redirect()->route("editor_update_course_content_information",['id'=>$request->course_id]);
        }
        return redirect()->route("editor_course_information_index");
    }
    public function delete_course_other(Request $request)
    {
        if($request->type == 'feature')
        {
            $delete_item=WebsiteCourseFeature::where('id',$request->id)->first();
            $delete_item->delete();
            return redirect()->route("editor_update_course_feature_information",['id'=>$request->course_id]);
        }
        if($request->type == 'requirement')
        {
            $delete_item=WebsiteCourseRequirement::where('id',$request->id)->first();
            $delete_item->delete();
            return redirect()->route("editor_update_course_requirement_information",['id'=>$request->course_id]);
        }
        if($request->type == 'content')
        {
            $delete_item=WebsiteCourseContent::where('id',$request->id)->first();
            $delete_item->delete();
            return redirect()->route("editor_update_course_content_information",['id'=>$request->course_id]);
        }
        return redirect()->back();
    }
}
