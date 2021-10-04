@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('sekolah.name') !!}</h1>
    </div>
    
    <div class="card p-3">
        @livewire('sekolah::form')
    </div>
</section>
@endsection
