<?php

namespace App\Http\Controllers;

use App\Http\Requests\SekolahRequest;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sekolah::all();
        if($data->count() > 0)
        {
            $sekolah = $data;
        } else {
            $sekolah = [];
        };
        // dd($sekolah);
        return view('pages.sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $request)
    {
        if($request->hasFile('logo')){
            $path = $request->file('logo')->store('uploads/images');
        } else {
            $path = '';
        }
        
        $data = [
            'namasekolah' => $request->namasekolah,
            'npsn' => $request->npsn,
            'bentukpendidikan' => $request->bentukpendidikan,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'distrik' => $request->distrik,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'telp' => $request->telp,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $path,
        ];

        $validatedData = $request->validated();
        // $data = $request->merge(['logo' => $path]);
        // dd($validatedData);
        Sekolah::create($data);
        Session::flash('message', 'Data added successfuly.'); 
        Session::flash('alert-class', 'alert-info'); 
        return redirect('sekolah');
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
        $sekolah = Sekolah::find($id);
        return view('pages.sekolah.edit', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SekolahRequest $request, $id)
    {
        $validated = $request->validated();
        ddd($validated);
        
        $data = [
            'namasekolah' => $request->namasekolah,
            'npsn' => $request->npsn,
            'bentukpendidikan' => $request->bentukpendidikan,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'distrik' => $request->distrik,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'telp' => $request->telp,
            'email' => $request->email,
            'website' => $request->website,
        ];

        // Handle the user upload of avatar
    	if($request->hasFile('logo')){
    		// rename file
    		$path = $request->file('logo')->store('uploads/images');

            // delete old file
            Storage::delete($request->oldlogo);
            // $data = [
            //     'namasekolah' => $request->namasekolah,
            //     'npsn' => $request->npsn,
            //     'bentukpendidikan' => $request->bentukpendidikan,
            //     'alamat' => $request->alamat,
            //     'kelurahan' => $request->kelurahan,
            //     'kecamatan' => $request->kecamatan,
            //     'distrik' => $request->distrik,
            //     'provinsi' => $request->provinsi,
            //     'kodepos' => $request->kodepos,
            //     'lintang' => $request->lintang,
            //     'bujur' => $request->bujur,
            //     'telp' => $request->telp,
            //     'email' => $request->email,
            //     'website' => $request->website,
            //     'logo' => $path,
            // ];
            $data = array_merge($data, ['logo' => $path]);
    	}
        // dd($data);
        
        
        // $input = $request->except(['_method', '_token']);

        Sekolah::find($id)->update($data);
        Session::flash('message', 'Data updated successfuly.'); 
        Session::flash('alert-class', 'alert-warning'); 
        return redirect('sekolah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sekolah::find($id)->delete();
        Session::flash('message', 'Data deleted successfuly.'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect('sekolah');

    }
}
