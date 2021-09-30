@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Profil Sekolah</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="section-body">
        {{ Form::open(['route' => ['sekolah.update', $sekolah->id], 'method' => 'put', 'files' => true]) }}
        @csrf
        <div class="card p-3">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ $sekolah->logo }}" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td><input type="text" name="namasekolah" value="{{ $sekolah->namasekolah }}" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td><input type="text" value="{{ $sekolah->npsn }}" name="npsn" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Bentuk Pendidikan</td>
                                <td><input type="text" value="{{ $sekolah->bentukpendidikan }}" name="bentukpendidikan" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><input type="text" name="alamat"id=""  class="form-control"  value="{{ $sekolah->alamat }}"></td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td><input type="text" name="kelurahan"id=""  class="form-control"  value="{{ $sekolah->kelurahan }}"></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td><input type="text" name="kecamatan"id=""  class="form-control"  value="{{ $sekolah->kecamatan }}"></td>
                            </tr>
                            <tr>
                                <td>Distrik</td>
                                <td><input type="text" name="distrik" id=""  class="form-control"  value="{{ $sekolah->kota }}"></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td><input type="text" name="provinsi"id=""  class="form-control"  value="{{ $sekolah->provinsi }}"></td>
                            </tr>
                            <tr>
                                <td>Kodepos</td>
                                <td><input type="text" name="kodepos"id=""  class="form-control"  value="{{ $sekolah->kodepos }}"></td>
                            </tr>
                            <tr>
                                <td>lintang</td>
                                <td><input type="text" name="lintang"id=""  class="form-control"  value="{{ $sekolah->lat }}"></td>
                            </tr>
                            <tr>
                                <td>bujur</td>
                                <td><input type="text" name="bujur"id=""  class="form-control"  value="{{ $sekolah->lng }}"></td>
                            </tr>
                            <tr>
                                <td>telp</td>
                                <td><input type="text" name="telp"id=""  class="form-control"  value="{{ $sekolah->telp }}"></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="text" name="email"id=""  class="form-control"  value="{{ $sekolah->email }}"></td>
                            </tr>
                            <tr>
                                <td>website</td>
                                <td><input type="text" name="website"id=""  class="form-control"  value="{{ $sekolah->website }}"></td>
                            </tr>
                            <tr>
                                <td>Logo</td>
                                <td>
                                    <input type="file" name="logo" id="">
                                    <input type="hidden" name="oldlogo" value="{{ $sekolah->logo }}">
                                </td>
                            </tr>
                      </table>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </div>
        </div>
        {{ Form::close() }}
    </div>
</section>
@endsection

@section('js')
{{-- custom js per page --}}
@endsection
