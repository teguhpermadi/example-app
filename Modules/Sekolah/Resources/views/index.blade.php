@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('sekolah.name') !!}</h1>
    </div>

    <a href="{{ route('sekolah.create') }}" class="btn btn-primary">Create</a>

    @foreach ($data as $sekolah)
        @livewire('sekolah::index', ['data' => $sekolah])
    @endforeach
</section>
@endsection
