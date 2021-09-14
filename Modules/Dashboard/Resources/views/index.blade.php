@extends('layouts.stisla.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{!! config('dashboard.name') !!}</h1>
        </div>

        <div class="section-body">
            <p>
                This view is loaded from module: {!! config('dashboard.name') !!}
            </p>
        </div>
    </section>
@endsection

@section('js')
    {{-- custom js per page --}}
@endsection