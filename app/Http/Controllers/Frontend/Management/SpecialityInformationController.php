<?php

namespace App\Http\Controllers\Frontend\Management;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSpecialityInformation;
use Illuminate\Http\Request;

class SpecialityInformationController extends Controller
{
    public function index()
    {
        $infos = WebsiteSpecialityInformation::all();
        return view('dashboard.editor.speciality_information.index' ,['infos'=>$infos]);
    }
    public function store(Request $request)
    {
        WebsiteSpecialityInformation::create($request->all());
        return redirect()->route('editor_speciality_information_index');
    }
    public function update(Request $request)
    {
        $update_item=WebsiteSpecialityInformation::where('id',$request->id)->first();
        $update_item->fill($request->all())->save();
        return redirect()->route("editor_speciality_information_index");
    }
    public function delete(Request $request)
    {
        $delete_item=WebsiteSpecialityInformation::where('id',$request->id)->first();
        $delete_item->delete();
        return redirect()->back();
    }
}
