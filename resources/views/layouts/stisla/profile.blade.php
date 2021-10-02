@extends('layouts.stisla.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
    </div>

    <div class="section-body">
        @if (session('message'))
            <div class="alert {{ session('alert-class', 'alert-info') }}">
                {{ session('message') }}
            </div>
        @endif

        <h2 class="section-title">Hi, <span class="fw-bolder text-uppercase">{{ $user->name }}!</span></h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="@if (Auth::user()->avatar != 'default.jpg') {{ asset('storage/'.Auth::user()->avatar) }} @else {{ Avatar::create(Auth::user()->name)->toBase64() }} @endif"
                        {{-- <img alt="image" src="{{ asset('storage/'.$user->avatar) }}" --}}
                            class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Posts</div>
                                <div class="profile-widget-item-value">187</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Followers</div>
                                <div class="profile-widget-item-value">6,8K</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Following</div>
                                <div class="profile-widget-item-value">2,1K</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">Ujang Maman <div
                                class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> Web Developer
                            </div>
                        </div>
                        Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                        fictional character but an original hero in my family, a hero for his children and for his wife.
                        So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John
                            Doe'</b>.
                    </div>
                    <div class="card-footer text-center">
                        <div class="font-weight-bold mb-2">Follow Ujang On</div>
                        <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-github mr-1">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    {{ Form::open(array('route' => ['profile.update'], 'method' => 'put', 'files' => true, 'class' => '')) }}
                    @csrf
                    {{-- <form method="post" class="needs-validation" novalidate=""> --}}
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    required="">
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}"
                                    required="">
                                <div class="invalid-feedback">
                                    Please fill in the last name
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required="">
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="tel" class="form-control" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label>Avatar</label>
                                <input type="hidden" name="oldavatar" value="{{ $user->avatar }}">
                                <input type="file" class="form-control" name="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    {{-- </form> --}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
{{-- custom js per page --}}
@endsection
