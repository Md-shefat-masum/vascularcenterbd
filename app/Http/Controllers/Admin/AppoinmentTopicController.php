<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppoinmentTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class AppoinmentTopicController extends Controller
{
    public function index(Request $request)
    {
        $data = AppoinmentTopic::paginate(10);
        return view('admin.appoinment_topic.index',compact('data'));
    }

    public function create()
    {
        return view('admin.appoinment_topic.create');
    }

    public function edit(AppoinmentTopic $appoinment_topic)
    {
        return view('admin.appoinment_topic.edit',compact('appoinment_topic'));
    }

    public function store(Request $request)
    {
        $service = AppoinmentTopic::create([
            'title' => nl2br($request->title),
            'details' => nl2br($request->details),
        ]);

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                // dd($file);
                $extension = $file->getClientOriginalExtension();
                $temp_name  = uniqid(10) . time();

                $image = Image::make($file);

                // book size
                $canvas = Image::canvas(283, 195);
                $canvas->insert($image, 'center-center');
                $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/service/service_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/service');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $service->image = $path;
        }

        $service->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function update(Request $request, AppoinmentTopic $appoinment_topic)
    {
        $appoinment_topic->fill([
            'title' => nl2br($request->title),
            'details' => nl2br($request->details),
        ]);

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                // dd($file);
                $extension = $file->getClientOriginalExtension();
                $temp_name  = uniqid(10) . time();

                $image = Image::make($file);

                // book size
                $canvas = Image::canvas(283, 195);
                $canvas->insert($image, 'center-center');
                $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/service/service_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/service');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $appoinment_topic->image = $path;
        }

        $appoinment_topic->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function destroy(AppoinmentTopic $appoinment_topic)
    {
        $appoinment_topic->delete();
        return redirect()->back()->with('success','data deleted successfully.');
    }
}
