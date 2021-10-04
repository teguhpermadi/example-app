<div>
    {{-- locale --}}
    <li class="dropdown dropdown-list-toggle float-left">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{strtoupper(Lang::locale())}}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('lang', 'en') }}">EN</a>
            <a class="dropdown-item" href="{{ route('lang', 'id') }}">ID</a>
        </div>
    </li>

    <li class="dropdown  dropdown-list-toggle float-right">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="foto" src="{{ asset('storage/'.Auth::user()->avatar) }}" --}}
            <img alt="foto"
                src="{{ (Auth::user()->avatar == 'default.jpg') ? Avatar::create(Auth::user()->name)->toBase64() : asset('storage/'.Auth::user()->avatar)}}"
                class="rounded-circle mr-1 float-left">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="{{ route('profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
            </a>
            <div class="dropdown-divider"></div>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                   this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
        </div>
    </li>
</div>
