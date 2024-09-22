<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <div class="container-fluid">
        <!-- Brand/Title -->
        <a class="navbar-brand" href="#">Event Today Management</a>

        <!-- Navbar Toggler for smaller screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="{{ asset('style/assets/img/profile.jpg') }}" alt="Profile" class="avatar-img rounded-circle" />
                        </div>
                        <span class="profile-username">
                            @if(Auth::check())
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">{{ Auth::user()->name }}</span>
                            @else
                            <span class="op-7">Hi,</span>
                            <span class="fw-bold">Guest</span>
                            @endif
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li class="dropdown-item">
                            <div class="user-box">
                                <div class="avatar-lg">
                                    <img src="{{ asset('style/assets/img/profile.jpg') }}" alt="Profile" class="avatar-img rounded" />
                                </div>
                                <div class="u-text">
                                    @if(Auth::check())
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>

                                    @else
                                    <h4>Guest</h4>
                                    <p class="text-muted">Please log in</p>
                                    <a href="{{ route('login') }}" class="btn btn-xs btn-secondary btn-sm">Log In</a>
                                    @endif
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="#">My Balance</a>
                            <a class="dropdown-item" href="#">Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Account Setting</a>
                            <div class="dropdown-divider"></div>
                            @if(Auth::check())
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @else
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->