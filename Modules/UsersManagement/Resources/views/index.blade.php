@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{!! config('usersmanagement.name') !!}</h1>
    </div>

    <div class="card p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <td><img class="rounded-circle mr-3" src="@if (Auth::user()->avatar != 'default.jpg') {{ asset('storage/'.$user->avatar) }} @else {{ Avatar::create($user->name)->toBase64() }} @endif" alt="" height="30px"><span class="text-primary">{{ $user->username }}</span></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-info">Info</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Disable</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
