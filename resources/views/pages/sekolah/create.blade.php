@extends('layouts.stisla.master')
@section('head-js')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
@endsection

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

    @livewire('sekolah.create-form')

    <!--
    <div class="section-body">
        {{ Form::open(['route' => 'sekolah.store', 'method' => 'post', 'files' => true]) }}
        @csrf
        <div class="card p-3">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <img src="#" alt="" class="img-thumbnail">
                    <img src="https://source.unsplash.com/weekly?maps" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">

                    <div class="row mb-3">
                        <div class="col-md-3">
                            Nama Sekolah
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="namasekolah" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            NPSN
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="npsn" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Bentuk Pendidikan
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="bentukpendidikan" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Alamat
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="alamat" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Provinsi
                        </div>
                        <div class="col-md-9">
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Distrik
                        </div>
                        <div class="col-md-9">
                            <select name="distrik" id="distrik" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Kecamatan
                        </div>
                        <div class="col-md-9">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Kelurahan
                        </div>
                        <div class="col-md-9">
                            <select name="kelurahan" id="kelurahan" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Kodepos
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="kodepos" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Lokasi
                        </div>
                        <div class="col-md-9">
                            {{-- <livewire:map-location /> --}}
                            <div id='map' style='width: 550px; height: 300px;'></div>
                            <input type="text" name="bujur" id="long">
                            <input type="text" name="lintang" id="lat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            telp
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="telp" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            email
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="email" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            website
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="website" id="" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            Logo
                        </div>
                        <div class="col-md-9">
                            <input type="file" name="logo" id="">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
                </div>

            </div>
        </div>
        {{ Form::close() }}
    </div>
-->
</section>
@endsection

@section('js')
{{-- custom js per page --}}
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

{{-- script dropdown --}}
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
    function getKelurahan(villages) {
        kelurahan.empty();
        kelurahan.append('<option value="">Pilih</option>')
        villages.forEach(element => {
            kelurahan.append('<option value="' + element.id + '">' + element.name + '</option>')
        });
    }

</script>

<script>
    window.addEventListener('load', () => {
        const defaultLocation = [112.621391, -7.983908]

        mapboxgl.accessToken =
            'pk.eyJ1IjoidGVndWhwZXJtYWRpIiwiYSI6ImNrdHlmdjhrdzB0enIydXRodTNrMmsweWsifQ.qDYxEaljnRN5URnTUZcDjQ';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultLocation,
            zoom: 11, // starting zoom
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        map.addControl(new mapboxgl.NavigationControl)
        this.marker = new mapboxgl.Marker();

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng
            const lattitude = e.lngLat.lat
            // console.log({longtitude, lattitude})
            $('#long').val(longtitude)
            $('#lat').val(lattitude)
            add_marker(e)
        })

        function add_marker(event) {
            var coordinates = event.lngLat;
            // console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
            this.marker.setLngLat(coordinates).addTo(map);
        }
    })


</script>
@endsection
