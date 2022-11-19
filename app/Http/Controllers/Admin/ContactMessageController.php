<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteContactAnyQuestion;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $data = WebsiteContactAnyQuestion::paginate(10);
        return view('admin.contact.index',compact('data'));
    }

    public function destroy(WebsiteContactAnyQuestion $message)
    {
        $message->delete();
        return redirect()->back()->with('success','data deleted successfully.');
    }

}
