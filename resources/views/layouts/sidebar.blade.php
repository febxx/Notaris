<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Notaris</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto" id="sidenav-collapse-main">
        @if (auth()->user()->isAdmin())
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                    href="{{ url('kelola-notaris') }}">
                    <i class="fas fa-users"></i> Kelola Notaris
                </a>
            </li>
        </ul>
        @endif

        @if (auth()->user()->isNotaris())
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button align-left" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <span><i class="fa fa-user-secret"></i> Akta Umum</span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse {{ (Request::is('akta-notaris*') ? 'show' : '') }}" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ route('akta-notaris.index') }}">
                                    <i class="fas fa-tachometer-alt"></i> Kelola Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('akta-notaris-pihak.index') }}">
                                    <i class="fas fa-users"></i> Daftar Pihak
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('akta-notaris-jenis') ? 'active' : '') }} "
                                    href="{{ route('akta-notaris-jenis.index') }}">
                                    <i class="fas fa-users"></i> Kelola Jenis Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} " href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Laporan Pencatatan Akta
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span><i class="fa fa-user-secret"></i> Badan Hukum / Usaha</span>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Kelola Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Kelola Jenis Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Laporan Pencatatan Akta
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span><i class="fa fa-table"></i> Akta PPAT</span>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Kelola Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Daftar Pihak
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Kelola Jenis Akta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Laporan Pencatatan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span><i class="fa fa-files-o"></i> Surat Bawah Tangan</span>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Kelola Surat
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Kelola Sifat Surat
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <span><i class="fa fa-money"></i> Keuangan</span>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}"
                                    href="{{ url('dashboard') }}">
                                    <i class="fas fa-tachometer-alt"></i> Kelola Transaksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Laporan Keuangan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-notaris') ? 'active' : '') }} "
                                    href="{{ url('kelola-notaris') }}">
                                    <i class="fas fa-users"></i> Kelola Akun
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <span><i class="fa fa-users"></i> Kelola User</span>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse {{ (Request::is('kelola-staff*', 'kelola-client*') ? 'show' : '') }}" aria-labelledby="headingSix"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-client') ? 'active' : '') }}"
                                    href="{{ route('kelola-client.index') }}">
                                    <i class="fas fa-tachometer-alt"></i> Corporate Client
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::is('kelola-staff') ? 'active' : '') }} "
                                    href="{{ route('kelola-staff.index') }}">
                                    <i class="fas fa-users"></i> Staff
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</aside>
