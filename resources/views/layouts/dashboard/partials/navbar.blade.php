<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark" data-bs-toggle="tooltip"
                data-bs-placement="bottom" title="Mode">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Shortcut">
                <span class="fe fe-grid fe-16"></span>
            </a>
        </li>
        {{-- <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif"
                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifikasi">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
        </li> --}}
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="avatar avatar-sm mt-2">
                    <img src="{{ asset('dashboard/asset/avatar_female.svg') }}" alt="{{ $user->username }}"
                        class="avatar-img rounded-circle" />
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-danger" href="{{ route('logout') }}">Keluar</a>
            </div>
        </li>
    </ul>
</nav>