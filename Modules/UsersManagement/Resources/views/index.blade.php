@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('usersmanagement.name') !!}</h1>
    </div>

    <div class="card p-3">
        @livewire('usersmanagement::index', ['data' => $data])
        
    </div>
</section>
@endsection
