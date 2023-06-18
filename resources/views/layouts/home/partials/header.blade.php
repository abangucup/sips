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
            <!--End: Logo-->


            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <button class="lines-button x bg-light px-2"> <span class="lines"></span> </button>
            </div>

            <div id="mainMenu" class="menu-slide light text-white bgc-primary items-visible">
                <div class="container">
                    <nav>
                        <ul>
                            <li class=""><a href="index.html">Beranda</a>
                            </li>
                            <li class=""><a href="portal/doc/peraturan">Jadwal</a>
                            </li>
                            <li><a href="{{ route('login') }}" class="btn btn-primary">Masuk</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>