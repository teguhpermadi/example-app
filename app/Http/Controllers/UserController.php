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
            // hapus avatar yang lama
            // Storage::delete(storage_path('uploads/avatars/' . $request->oldavatar ));
            
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
            // $img = Image::make($avatar)->resize(300, 300);
            $path = Storage::putFile('uploads/avatars',$request->file('avatar'));
    		// Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		// Image::make($avatar)->resize(300, 300)->save( storage_path('uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $path;
    		$user->save();
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
        Storage::delete('uploads/avatars/'.$id);
    }

}
