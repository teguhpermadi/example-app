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

</section>
@endsection

@section('js')
{{-- custom js per page --}}
<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
@endsection
