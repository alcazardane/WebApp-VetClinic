<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetProfile;
use App\Models\PublicRecords;
use App\Models\UserModel;
use App\Models\VaxHistory;
use App\Models\VaxRecords;
use Auth;

class PetProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($email)
    {
        $petprofile = PetProfile::all()->where('owneremail', $email);
        return view('petprofile.index', ['petprofile' => $petprofile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petprofile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petprofile = new PetProfile;
        $petprofile->petname = $request->petname;
        $petprofile->petgender = $request->petgender;
        $petprofile->petbreed = $request->petbreed;
        $petprofile->petspecies = $request->petspecies;
        $petprofile->owneremail = Auth::user()->email;
        $petprofile->ownername = Auth::user()->name;

        if ($request->hasFile('petimage')) {
            $filenameWithExt = $request->file('petimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('petimage')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $petprofile->profilepicture = $fileNameToStore;
            $path = $request->file('petimage')->storeAs('public', $fileNameToStore);
        }
        else{
            $petprofile->profilepicture = "ClinicLogo.png";
        }
        $petprofile->save();

        return redirect('client-profile/'.Auth::user()->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petprofile = PetProfile::findorFail($id); // *

        // To return the records in pdf form.
        $records = PublicRecords::all()->whereIn('email', $petprofile->owneremail)
                                    ->whereIn('petname', $petprofile->petname);
        
        // reference for vaxhistory query
        $vaxrecords = VaxRecords::where('owneremail', $petprofile->owneremail)
                                ->where('petname', $petprofile->petname)
                                ->first();
        
        try {
            $history = VaxHistory::all()->where('recid', $vaxrecords->recid);
        } catch (\Throwable $th) {
            $history = [];
        }
        
        
        return view('petprofile.show', ['petprofile' => $petprofile, 'records' => $records, 'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petprofile = PetProfile::findorFail($id);
        return view('petprofile.edit', ['petprofile' => $petprofile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petprofile = PetProfile::findorFail($id);
        $userid = UserModel::where('email', $petprofile->owneremail)->first(['id']);
        $petprofile->petname = $request->petname;
        $petprofile->petgender = $request->petgender;
        $petprofile->petbreed = $request->petbreed;
        $petprofile->petspecies = $request->petspecies;
        if ($request->hasFile('petimage')) {
            $filenameWithExt = $request->file('petimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('petimage')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $petprofile->profilepicture = $fileNameToStore;
            $path = $request->file('petimage')->storeAs('public/profileimage', $fileNameToStore);
        }
        $petprofile->save();

        return redirect('client-profile/'.$userid->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PetProfile::destroy($id);
        return back();
    }
}
