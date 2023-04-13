<div>
    <nav class="navbar navbar-expand-lg shadow-sm bg-success navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Pengajuan Cuti</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link
                        @if( Request::is('/'))
                        active
                        @endif
                        " aria-current="page" href="{{ url('/') }}">Dashboard</a>
                    </li>
                    @if(auth()->user()->role == 'pegawai')
                    <li class="nav-item">
                        <a class="nav-link
                        @if( Request::is('pengajuan'))
                        active
                        @endif
                        " href="{{ url('pengajuan') }}">Pengajuan</a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link

                        @if( Request::is('kelola-pengajuan'))
                        active
                        @endif" href="{{ url('kelola-pengajuan') }}">Kelola pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                        @if( Request::is('kelola-jenis-pengajuan'))
                        active
                        @endif" href="{{ url('kelola-jenis-pengajuan') }}">kelola jenis pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                        @if( Request::is('kelola-subjenis-pengajuan'))
                        active
                        @endif
                        " href="{{ url('kelola-subjenis-pengajuan') }}">Kelola subjenis pengajuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( Request::is('kelola-setting'))
                        active
                        @endif" href="{{ url('kelola-setting') }}">Kelola setting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if( Request::is('kelola-akun'))
                        active
                        @endif
                        " href="{{ url('kelola-akun') }}">Kelola akun</a>
                    </li>
                    @endif


                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->username }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            {{-- <li><a class="dropdown-item" href="#"></a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            <li><button class="dropdown-item text-danger" wire:click='logout'>Logout</button></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
