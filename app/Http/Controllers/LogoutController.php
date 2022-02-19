<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function perform()
    {
      activity(Auth::user()->user_type.'_OUT')
            ->causedBy(Auth::user()->id)
            ->event('logout')
            ->log(Auth::user()->user_type.' has logged logout');

        Session::flush();
        
        Auth::logout();
        
        return redirect('/');
    }
}
