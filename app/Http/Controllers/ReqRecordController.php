<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReqRecords;
use App\Models\UserModel;

class ReqRecordController extends Controller
{
    public function index()
    {
        $req = ReqRecords::orderBy('id', 'DESC')->get();
        return view('reqrecords.index')->with('req', $req);
    }

    public function hide($id)
    {
       ReqRecords::destroy($id);
        return redirect('reqrecords');
    }

    public function make(Request $request, $id)
    {
        $user = UserModel::findorFail($id);

        $req = ReqRecords::create([
            'name' => $user->name,
            'email' => $request->owneremail,
            'request' => $request->recreq,
            'petname' => $request->petname,
            'status' => "unattended",
        ]);

        return back()->with('success', 'Request Sent');
    }

    public function response(Request $request, $email)
    {
        
    }
}
