<header id="header" class="header-transparent header-fullwidth dark header-plain">
    <div id="header-wrap">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="index.html" class="logo" data-dark-logo="{{ asset('dashboard/asset/desa.svg') }}">
                    <img src="{{ asset('dashboard/asset/desa.svg') }}" alt="Polo Logo">
                    <span>SIPS</span>
                </a>
            </div>

            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <button class="lines-button x bg-light px-2"> <span class="lines"></span> </button>
            </div>

            <div id="mainMenu" class="menu-slide light text-white bgc-primary items-visible">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{ route('home') }}"
                                    class="{{ Request::is('/') ? 'bg-primary' : '' }}">Beranda</a>
                            </li>
                            <li><a href="{{ route('list_desa') }}"
                                    class="{{ Request::is('list-desa') ? 'bg-primary' : '' }}">Desa</a>
                            </li>
                            <li class="mr-sm-4 pb-4"><a href="{{ route('list_jadwal') }}"
                                    class="{{ Request::is('list-jadwal') ? 'bg-primary' : '' }}">Jadwal</a>
                            </li>
                            <li class="ml-sm-5"><a href="{{ route('login') }}" class="btn btn-primary">Masuk</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>