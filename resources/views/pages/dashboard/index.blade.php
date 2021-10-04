{{-- @extends('layouts.stisla.master') --}}
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <h1>{{ __('general.title') }}</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt laborum vel ratione obcaecati vero quibusdam tempore distinctio esse aliquam quia. Repellendus illum quae distinctio atque pariatur, corporis eius delectus. Deserunt.
            </p>
        </div>
    </section>
@endsection

@section('js')
    {{-- custom js per page --}}
@endsection