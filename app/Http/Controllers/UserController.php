<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('layouts.stisla.profile', compact('user'));
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
        //
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
    public function update(Request $request)
    {
        // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		// rename file
    		$avatar = $request->file('avatar');
    		$filename = 'uploads/avatars/' . time() . '.' . $avatar->getClientOriginalExtension();
            
            // resizing an uploaded file
            Image::make($request->file('avatar'))->resize(300, 300)->save(public_path('storage/'.$filename));

            // save to db
    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();

            // delete old file
            Storage::delete($request->oldavatar);
    	}

        Auth::user()->update($request->all());
        Session::flash('message', 'Data updated successfuly.'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
