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
        {{ Form::open(['route' => 'sekolah.store', 'method' => 'post', 'files' => true]) }}
        @csrf
        <div class="card p-3">
            <div class="row">
                <div class="col-sm-3">
                    <img src="#" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Nama Sekolah</td>
                                <td><input type="text" name="namasekolah" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td><input type="text" name="npsn" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Bentuk Pendidikan</td>
                                <td><input type="text" name="bentukpendidikan" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><input type="text" name="alamat" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Provinsi</td>
                                <td>
                                    {{-- <input type="text" name="provinsi" id="" class="form-control"> --}}
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Distrik</td>
                                <td>
                                    {{-- <input type="text" name="distrik" id="" class="form-control"> --}}
                                    <select name="distrik" id="distrik" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td>
                                    {{-- <input type="text" name="kecamatan" id="" class="form-control"> --}}
                                    <select name="kecamatan" id="kecamatan" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td>
                                    {{-- <input type="text" name="kelurahan" id="" class="form-control"> --}}
                                    <select name="kelurahan" id="kelurahan" class="form-control">
                                        <option value="">Pilih</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Kodepos</td>
                                <td><input type="text" name="kodepos" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>lintang</td>
                                <td><input type="text" name="lintang" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>bujur</td>
                                <td><input type="text" name="bujur" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>telp</td>
                                <td><input type="text" name="telp" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><input type="text" name="email" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>website</td>
                                <td><input type="text" name="website" id="" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Logo</td>
                                <td><input type="file" name="logo" id=""></td>
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
<script>
    // onload page
    var provinsi = $('#provinsi')
    var distrik = $('#distrik')
    var kecamatan = $('#kecamatan')
    var kelurahan = $('#kelurahan')

    // data provinsi di load
    fetch(`https://teguhpermadi.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => getProvinsi(provinces));

    // tampilkan semua data provinsi
    function getProvinsi(provinces) {
        provinces.forEach(element => {
            provinsi.append('<option value="' + element.id + '">' + element.name + '</option>')
        });
    }

    // ketika dropdown provinsi diubah
    provinsi.change(function () {
        fetch(`https://teguhpermadi.github.io/api-wilayah-indonesia/api/regencies/` + this.value + `.json`)
            .then(response => response.json())
            .then(regencies => getDistrik(regencies));
    })

    // tampilkan data distrik
    function getDistrik(regencies) {
        distrik.empty();
        distrik.append('<option value="">Pilih</option>')
        kecamatan.empty();
        kecamatan.append('<option value="">Pilih</option>')
        kelurahan.empty();
        kelurahan.append('<option value="">Pilih</option>')

        regencies.forEach(element => {
            distrik.append('<option value="' + element.id + '">' + element.name + '</option>')
        });
    }

    // ketika dropdown distrik diubah
    distrik.change(function () {
        fetch(`https://teguhpermadi.github.io/api-wilayah-indonesia/api/districts/` + this.value + `.json`)
            .then(response => response.json())
            .then(districts => getKecamatan(districts));
    })

    // tampilkan data kecamatan
    function getKecamatan(districts) {
        kecamatan.empty();
        kecamatan.append('<option value="">Pilih</option>')
        kelurahan.empty();
        kelurahan.append('<option value="">Pilih</option>')
        districts.forEach(element => {
            kecamatan.append('<option value="' + element.id + '">' + element.name + '</option>')
        });
    }

    // ketika dropdown kecamatan diubah
    kecamatan.change(function () {
        fetch(`https://teguhpermadi.github.io/api-wilayah-indonesia/api/villages/` + this.value + `.json`)
            .then(response => response.json())
            .then(villages => getKelurahan(villages));
    })

    // tampilkan data kelurahan
    function getKelurahan(villages)
    {
        kelurahan.empty();
        kelurahan.append('<option value="">Pilih</option>')
        villages.forEach(element => {
            kelurahan.append('<option value="' + element.id + '">' + element.name + '</option>')
        });
    }

</script>
@endsection
