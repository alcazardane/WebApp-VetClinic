<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\ClientCredentials;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\PublicPosts;
use DB;

class PageController extends Controller
{
    public function index(){

        $pubs = PublicPosts::all();
        return view('pages.index')->with('pubs', $pubs);
    }

    public function guessAppointment(){ 
        return view('appointments.userCreate');
    }

    public function guessAppointStore(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'contactnum' => 'required|numeric',
            'email' => 'required|email',
            'datetime' => 'required',
            'purpose' => 'required',
        ]);

        $lastid = DB::table('appointments')->orderBy('id','desc')->first();

        $createAppointment = Appointment::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'contactnum' => $request->contactnum,
            'email' => $request->email,
            'purpose' => $request->purpose,
            'datetime' => $request->datetime,
            'appointmentid' => 'VTKZAPP-'.(int)$lastid->id+1,
        ]);

        return redirect('/')->with('success', 'Thank you for requesting your appointment online. 
        We will send you an email confirmation as soon as this appointment is approved.
        Have a great day ahead!');
    }

    public function adminDashboard()
    {
        return view('dashboard.index');
    }

    public function setUnamePword(Request $request, $email){
        
        $clients = Clients::where('email', Request::get('email'))->first();
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
            'confpassword' => 'confpassword'
        ]);
    }

    public function helpfularticle(){
        return view('pages.articles');
    }

    public function help(){
        return view('pages.help'); //for admin
    }
	
	public function helppage(){
        return view('pages.helppage'); //for client
    }

    public function authenticate(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Authentication passed...
            return redirect()->intended('index')
                            ->withSuccess('Signed in');
         }

         return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
