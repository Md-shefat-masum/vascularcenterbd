<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class ChemberController extends Controller
{
    public function index(Request $request)
    {
        $data = Chember::paginate(10);
        return view('admin.chember.index',compact('data'));
    }

    public function create()
    {
        return view('admin.chember.create');
    }

    public function edit(Chember $chember)
    {
        return view('admin.chember.edit',compact('chember'));
    }

    public function store(Request $request)
    {
        $chember = Chember::create([
            'location' => nl2br($request->location),
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
                // $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/chember/chember_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/chember');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $chember->image = $path;
        }

        $chember->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function update(Request $request, Chember $chember)
    {
        $chember->fill([
            'location' => nl2br($request->location),
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
                // $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/chember/chember_283x195_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/chember');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $chember->image = $path;
        }

        $chember->save();

        return redirect()->back()->with('success','data uploaded successfully.');
    }

    public function destroy(Chember $chember)
    {
        $chember->delete();
        return redirect()->back()->with('success','data deleted successfully.');
    }
}
