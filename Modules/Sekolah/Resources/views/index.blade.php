@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('sekolah.name') !!}</h1>
    </div>

    <div class="row p-3">
        <a href="{{ route('sekolah.create') }}" class="btn btn-primary">Create</a>
    </div>

    @foreach ($data as $sekolah)
        @livewire('sekolah::index', ['data' => $sekolah])
    @endforeach
</section>
@endsection
