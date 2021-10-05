@extends('layouts.app')

@section('content')
<section class="section">

<div class="section-header">
    <h1>Hello World</h1>
</div>

<div class="card p-3">
    @livewire('users::index', ['users' => $users])
</div>

</section>
@endsection
