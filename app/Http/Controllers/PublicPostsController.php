<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicPosts;
use App\Models\Posts;

class PublicPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pubs = PublicPosts::all();
        return view('publicposts.index')->with('pubs', $pubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pub = PublicPosts::findorFail($id);
        if ($pub->status == "hidden") {
            $pub->status = "shown";
            $pub->save();
            return redirect('publicposts')->with('success', 'Post Shown');
        }
        return redirect('publicposts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PublicPosts::destroy($id);
        return redirect('publicposts');
    }

    public function hide($id)
    {
        $pub = PublicPosts::findorFail($id);
        
        if ($pub->status == "shown") {
            $pub->status = "hidden";
            $pub->save();
            return redirect('publicposts')->with('success', 'Post Hidden');
        }

        return redirect('publicposts');
        
    }
}
