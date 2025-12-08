<nav class="navbar navbar-expand-lg premium-navbar shadow-sm fixed-top">
    <div class="container-fluid">

        <!-- Toggle (Mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#adminSidebar" aria-controls="adminSidebar"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand (Mobile Only) -->
        <a class="navbar-brand d-lg-none text-white fw-bold" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-user-shield me-2"></i> Admin Panel
        </a>

        <!-- Right Menu -->
        <div class="ms-auto">
            <ul class="navbar-nav">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle admin-profile" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown">

                        <i class="fas fa-user-circle me-2"></i>
                        {{ Auth::user()->name }} <span class="role-badge">ADMIN</span>

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow-sm rounded-3">
                        <li>
                            <a class="dropdown-item py-2" href="#">
                                <i class="fas fa-id-card me-2 text-primary"></i> Profil Admin
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item text-danger py-2">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>

                </li>

            </ul>
        </div>

    </div>
</nav>

<style>
    /* Premium Navbar */
    .premium-navbar {
        background: linear-gradient(90deg, #1e88e5, #42a5f5);
        padding: 10px 18px;
        border-bottom: 3px solid rgba(255, 255, 255, 0.35);
        backdrop-filter: blur(6px);
    }

    .premium-navbar .navbar-brand {
        font-size: 1.1rem;
        letter-spacing: 0.5px;
    }

    /* Profile Button */
    .admin-profile {
        font-weight: 600;
        color: #ffffff !important;
        font-size: 0.95rem;
        transition: 0.2s;
    }

    .admin-profile:hover {
        opacity: 0.9;
    }

    .role-badge {
        background: rgba(255, 255, 255, 0.25);
        padding: 3px 7px;
        border-radius: 6px;
        font-size: 0.7rem;
        margin-left: 3px;
        font-weight: 600;
        color: #fff;
    }

    /* Dropdown */
    .dropdown-menu {
        border: none;
        animation: fadeIn 0.2s ease-in-out;
    }

    .dropdown-item:hover {
        background: rgba(66, 165, 245, 0.15);
        border-radius: 6px;
    }

    /* Fade-in animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(5px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
