<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Login;
use Spatie\Activitylog\Models\Activity;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
      $login = Login::all()->where('email', Auth::user()->email);

        if (Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'vet' ||Auth::user()->user_type == 'staff')
        {
          activity(Auth::user()->user_type.'_IN')
            ->causedBy(Auth::user()->id)
            ->event('login')
            ->log(Auth::user()->user_type.' has logged in');

          return 'dashboard';  // admin dashboard path
        } else {
          activity(Auth::user()->user_type.'_IN')
            ->causedBy(Auth::user()->id)
            ->event('login')
            ->log(Auth::user()->user_type.' has logged in');
          return '/home';  // member dashboard path
        }
      
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
}
