<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse"
            aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand d-lg-none text-primary" href="{{ url('/') }}">
            <i class="fas fa-graduation-cap me-2"></i> Bimbel App
        </a>

        <div class="ms-auto">
            <ul class="navbar-nav">
                @php
                    $user = Auth::user();
                    $avatarUrl = $user->avatar
                        ? route('avatar.show', basename($user->avatar))
                        : asset('images/default-avatar.png');
                @endphp

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-secondary d-flex align-items-center" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ $avatarUrl }}" class="rounded-circle me-2" width="30" height="30" alt="avatar">
                        <span>{{ $user->name }} ({{ strtoupper($user->role) }})</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="fas fa-user me-1"></i> Profil Saya
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
