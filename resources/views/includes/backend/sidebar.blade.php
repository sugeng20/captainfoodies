<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('backend/dist/img/gina.jpeg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ url('/user') }}" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ url('dashboard') }}"
                    class="nav-link {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('kategori') }}" class="nav-link {{ Request::segment(1) == 'kategori' ? 'active' : '' }}"">
                                                        <i class=" nav-icon fas fa-list"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('barang') }}" class="nav-link {{ Request::segment(1) == 'barang' ? 'active' : '' }}"">
                                                        <i class=" nav-icon fas fa-archive"></i>
                    <p>
                        Barang
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('transaksi') }}"
                    class="nav-link {{ Request::segment(1) == 'transaksi' ? 'active' : '' }}"">
                                                                                <i class=" nav-icon fas
                    fa-money-bill"></i>
                    <p>
                        Transaksi
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('user') }}" class="nav-link {{ Request::segment(1) == 'user' ? 'active' : '' }}"">
                                                        <i class=" nav-icon fas fa-bars"></i>
                    <p>
                        Pengaturan
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        Logout
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>