<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $data = Video::paginate(10);
        return view('admin.video.index',compact('data'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function edit(Video $video)
    {
        return view('admin.video.edit',compact('video'));
    }

    public function store(Request $request)
    {
        $service = Video::create([
            'title' => nl2br($request->title),
            'details' => nl2br($request->details),
            'yt_link' => nl2br($request->yt_link),
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

                $path = 'uploads/video/video_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/video');
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

    public function update(Request $request, Video $video)
    {
        $video->fill([
            'title' => nl2br($request->title),
            'details' => nl2br($request->details),
            'yt_link' => nl2br($request->yt_link),
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

                $path = 'uploads/video/video_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/video');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $video->image = $path;
        }

        $video->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->back()->with('success','data deleted successfully.');
    }
}
