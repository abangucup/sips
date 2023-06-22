<div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <div class="row align-items-center">
                    <div class="col-6 text-center">
                        <a href="{{ route('desa.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/desa') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-map fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/desa') ? 'text-success' : '' }}">Data Desa</p>
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('sampah.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/sampah') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-trash fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/sampah') ? 'text-success' : '' }}">Data Sampah</p>
                        </a>
                    </div>
                    {{-- <div class="col-6 text-center">
                        <a href="{{ route('jalur.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/jalur') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-move fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/jalur') ? 'text-success' : '' }}">Data Jalur</p>
                        </a>
                    </div> --}}
                </div>
                {{-- <div class="row align-items-center">
                    <div class="col-6 text-center">
                        <a href="{{ route('lokasi.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/lokasi') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-map-pin fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/lokasi') ? 'text-success' : '' }}">Lokasi</p>
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('kenderaan.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/kenderaan') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-truck fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/kenderaan') ? 'text-success' : '' }}">Kenderaan</p>
                        </a>
                    </div>
                </div> --}}
                <div class="row align-items-center">
                    <div class="col-6 text-center">
                        <a href="{{ route('tarif.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/tarif') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-dollar-sign fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/tarif') ? 'text-success' : '' }}">Data Tarif</p>
                        </a>
                    </div>
                    <div class="col-6 text-center">
                        <a href="{{ route('jadwal.index') }}" class="nav-link">
                            <div
                                class="squircle {{ Request::is('*/jadwal') ? 'bg-success' : 'bg-primary' }} justify-content-center">
                                <i class="fe fe-calendar fe-32 align-self-center text-white"></i>
                            </div>
                            <p class="{{ Request::is('p3b3k/jadwal') ? 'text-success' : '' }}">Jadwal</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>