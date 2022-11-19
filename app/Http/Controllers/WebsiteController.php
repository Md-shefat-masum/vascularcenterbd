<?php

namespace App\Http\Controllers;

use App\Mail\AppoinmentMail;
use App\Models\Appoinment;
use App\Models\Chember;
use App\Models\CourseBatchSeason;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class WebsiteController extends Controller
{

    public $website_info;

    public function __construct()
    {
        $website_info = DB::table("website_infos")->where("status", 1)->get();
        $website_data = [];
        foreach ($website_info as $key => $value) {
            if (!array_key_exists($value->title, $website_data)) {
                $website_data[$value->title] = [];
            }
            array_push($website_data[$value->title], $value->value);
            // $website_data[$value->title] += [$value->value];
        }

        $this->website_info = $website_data;
    }
    

    public function chember()
    {
        $chembers = Chember::get();
        return view('fontend.chember', [
            "website_info" => $this->website_info,
            "chembers" => $chembers,
        ]);
    }

    public function service()
    {
        $services = Service::get();
        return view('fontend.service', [
            "website_info" => $this->website_info,
            "services" => $services,
        ]);
    }

    public function appointment_store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required'],
            'phone' => ['required'],
            'topic' => ['required'],
            'time' => ['required'],
            'date' => ['required'],
        ]);

        $service = Appoinment::create($request->except('image'));

        if ($request->hasFile('image')) {
            // $path = Storage::put('uploads/file_manager',$request->file('fm_file'));
            try {
                $file = $request->file('image');
                // dd($file);
                // $extension = $file->getClientOriginalExtension();
                // $temp_name  = uniqid(10) . time();

                // $image = Image::make($file);

                // // book size
                // $canvas = Image::canvas(283, 195);
                // $canvas->insert($image, 'center-center');
                // $canvas->insert(Image::make(public_path('logo.png'))->resize(183)->opacity(50), 'bottom-right');

                $path = Storage::put('uploads/appoinment', $file);
                // Storage::makeDirectory('uploads/service');
                // $canvas->save($path);
            } catch (Throwable $e) {

                // report($e);
                // return response()->json($e->getMessage(), 500);
            }
            $service->image = $path;
        }

        $service->save();
        
        $mail_view = view('email.appoinment_mail', [
            'data' => $service,
        ])->render();

        try {
            Mail::to('myphoto204@gmail.com')->send(new AppoinmentMail($mail_view));
        } catch (\Throwable $th) {
            return redirect()->back()->with('success','appoinment created successfully.');
        }

        return redirect()->back()->with('success', 'appoinment created successfully.');
    }

    public function contact()
    {
        $services = Service::get();
        return view('fontend.contact', [
            "website_info" => $this->website_info,
            "services" => $services,
        ]);
    }
}
