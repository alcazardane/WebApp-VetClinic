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
        $req = new ReqRecords;

        $req->name = $user->name;
        $req->email = $request->owneremail;
        $req->request = $request->recreq;
        $req->petname = $request->petname;
        $req->status = "unattended";
        $req->save();

        return back()->with('success', 'Request Sent');
    }

    public function response(Request $request, $email)
    {
        
    }
}
