<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicRecords;
use App\Models\ReqRecords;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PublicRecordsController extends Controller
{
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'filerecord' => 'required'
        ]);
        
        $reqstatus = ReqRecords::findorFail($id);
        $pubfilerecord;

        $filenameWithExt = $request->file('filerecord')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filerecord')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $pubfilerecord = $fileNameToStore;
        $path = $request->file('filerecord')->storeAs('public/filerecords', $fileNameToStore);

        $pubrecords = PublicRecords::create([
            'petname' => $request->petname,
            'email' => $request->email,
            'filerecord' => $pubfilerecord,
        ]);

        $reqstatus->status = $request->status;
        $reqstatus->save();

        return back();
    }

    public function show($id)
    {
        $rec = PublicRecords::findorFail($id);

        return response()->file(public_path($rec->filerecord));
    }

    public function destroy($id)
    {
        PublicRecords::destroy($id);
        return back();
    }
}
