<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <ul class="navbar-nav m-4 flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a href="navbar-brand mx-auto mt-5 flex-fill text-center" href="{{ route('dashboard.p3b3k') }}">
                    <span class="h2 ml-3 item-text">SIPS</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="{{ Request::is('*/dashboard') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('dashboard.p3b3k') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-1 item-text">Dashboard</span>
                </a>
            </li>
        </ul>

        {{-- MENU P3B3K --}}
        @if ($username == 'p3b3k')
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Data Master</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/desa') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('desa.index') }}">
                    <i class="fe fe-map fe-16"></i>
                    <span class="ml-1 item-text">Data Desa</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/sampah') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('sampah.index') }}">
                    <i class="fe fe-trash fe-16"></i>
                    <span class="ml-1 item-text">Data Sampah</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/tarif') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('tarif.index') }}">
                    <i class="fe fe-dollar-sign fe-16"></i>
                    <span class="ml-1 item-text">Data Tarif Sampah</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/jadwal') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('jadwal.index') }}">
                    <i class="fe fe-calendar fe-16"></i>
                    <span class="ml-1 item-text">Data Jadwal</span>
                </a>
            </li>
            {{-- <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/jalur') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('jalur.index') }}">
                    <i class="fe fe-move fe-16"></i>
                    <span class="ml-1 item-text">Data Jalur</span>
                </a>
            </li> --}}

        </ul>
        {{-- <p class="text-muted nav-heading mt-4 mb-1">
            <span>Data Transaksi</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/kenderaan') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('kenderaan.index') }}">
                    <i class="fe fe-truck fe-16"></i>
                    <span class="ml-1 item-text">Data Kenderaan</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/lokasi') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('lokasi.index') }}">
                    <i class="fe fe-map-pin fe-16"></i>
                    <span class="ml-1 item-text">Data Lokasi</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/jadwal') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('jadwal.index') }}">
                    <i class="fe fe-calendar fe-16"></i>
                    <span class="ml-1 item-text">Data Jadwal</span>
                </a>
            </li>
        </ul> --}}
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Laporan</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="{{ Request::is('p3b3k/kenderaan') ? 'text-primary' : '' }} nav-link"
                    href="{{ route('laporan.index') }}">
                    <i class="fe fe-truck fe-16"></i>
                    <span class="ml-1 item-text">Laporan Pengangkutan</span>
                </a>
            </li>
        </ul>
        @endif


    </nav>
</aside>