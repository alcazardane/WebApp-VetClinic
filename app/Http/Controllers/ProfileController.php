<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\PublicRecords;
use App\Models\PetProfile;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.profile');
    }

    public function clientindex($id)
    {
        $user = UserModel::findorFail($id);
        $petprofile = PetProfile::all()->where('owneremail', $user->email);
        return view('profile.clientProfile', ['user' => $user, 'petprofile' => $petprofile]);
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
        $updateprofile = UserModel::findorFail($id);
        $updateprofile->name = $request->name;
        $updateprofile->email = $request->email;
        if ($request->hasFile('profileimage')) {
            $filenameWithExt = $request->file('profileimage')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profileimage')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $updateprofile->profileimage = $fileNameToStore;
            $path = $request->file('profileimage')->storeAs('public/profileimage', $fileNameToStore);
        }
        $updateprofile->save();

        return back();
    }

    public function updatepassword(Request $request, $id)
    {
        $updateprofile = UserModel::findorFail($id);
        $updateprofile->password = Hash::make($request->password);
        $updateprofile->save();

        return redirect('dashboard')->with('success', 'Password Updated');
    }
}
