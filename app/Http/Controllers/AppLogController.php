<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Models\UserModel;

class AppLogController extends Controller
{
    public function show()
    {
        $activity = Activity::orderBy('created_at', 'DESC')->get();

        return view('applog', ['activity' => $activity]);
    }
}
