<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscribeInfo;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $data = SubscribeInfo::orderBy('id','DESC')->paginate(20);
        return view('admin.subscriber.index',compact('data'));
    }
}
