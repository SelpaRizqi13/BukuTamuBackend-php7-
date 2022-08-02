<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <!-- Brand Logo -->
        {{-- <img src="{{ asset('logo.png') }}" width="150px" alt="AdminLTE Logo"
                class="brand-image " > --}}
        <a href="/dashboard" class="brand-link">
            <img src="{{ asset('diskominfo.png') }}" alt="AdminLTE Logo"
                class="brand-image " >
            <span class="brand-text font-weight-light">{{ auth()->user()->name }}</span>
        </a>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Data Tamu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- @can('roles') -->
                        @can('roles')
                        
                        <li class="nav-item">
                            <a href="{{ url('user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Pengguna</p>
                            </a>
                        </li>
                        @endcan
                        <!-- @endcan -->
                        <li class="nav-item">
                            <a href="{{ url('buku_tamu') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buku Tamu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ url('survei') }}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Data Survei
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ url('pegawai') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Pegawai
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('instansi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Instansi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pegawai') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('jadwal') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Data Jadwal Kegiatan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
