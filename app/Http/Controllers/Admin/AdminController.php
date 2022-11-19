<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseBatch;
use App\Models\CourseBatchSeasonWeekAssignment;
use App\Models\CourseBatchSeasonWeekEpisodeContent;
use App\Models\CourseBatchSeasonWeekEpisodeContentWatchHistory;
use App\Models\User;
use App\Models\UserAddressInfo;
use App\Models\UserEducationInfo;
use App\Models\UserJobExperienceInfo;
use App\Models\UserJobInfo;
use App\Models\UserLinkInfo;
use App\Models\UserSkillSetInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::user()->role_id == 3) {
            return redirect('/');
        }
        if (Auth::user()->role_id == 4) {
            return redirect('/');
        }
        if (Auth::user()->role_id == 5) {
            Auth::logout();
            return redirect('/')->with('success','thanks for the registration.');
        }
        if (Auth::user()->role_id == 6) {
            return redirect()->route('editor_index');
        }
    }


    public function get_token()
    {
        if (auth()->check()) {
            return \App\Models\User::find(auth()->user()->id)->createToken('accessToken');
        } else {
            return 0;
        }
    }
}
