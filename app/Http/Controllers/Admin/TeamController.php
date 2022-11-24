<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $data = Team::paginate(10);
        return view('admin.team.index', compact('data'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function store(Request $request)
    {

        $service = Team::create([
            'name' => nl2br($request->name),
            'description' => nl2br($request->description),
            'designation' => json_encode($request->designation),
            's_links' => json_encode($request->s_links),
        ]);

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                // dd($file);
                $extension = $file->getClientOriginalExtension();
                $temp_name  = uniqid(10) . time();

                $image = Image::make($file)->resize(400, null, function ($constraint) {
                    $constraint->aspectRatio();
                });;

                // book size
                $canvas = Image::canvas(400, 400);
                $canvas->insert($image, 'center-center');
                // $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/team/team_400x400_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/team');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $service->image = $path;
        }

        $service->save();

        return redirect()->back()->with('success', 'data uploaded successfully.');
    }

    public function update(Request $request, Team $team)
    {

        // dd($request->all());
        $team->fill([
            'name' => nl2br($request->name),
            'description' => nl2br($request->description),
            'designation' => json_encode($request->designation),
            's_links' => json_encode($request->s_links),
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
                $canvas = Image::canvas(400, 400);
                $canvas->insert($image, 'center-center');
                // $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = 'uploads/team/team_400x400_' . $temp_name . '.' . $extension;
                Storage::makeDirectory('uploads/team');
                $canvas->save($path);
            } catch (Throwable $e) {
                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $team->image = $path;
        }

        $team->save();

        return redirect()->back()->with('success', 'data uploaded successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->back()->with('success', 'data deleted successfully.');
    }
}
