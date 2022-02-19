<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class AppLogController extends Controller
{
    public function show()
    {
        $activity = Activity::all();

        return view('applog', ['activity' => $activity]);
    }
}
