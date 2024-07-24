<!-- resources/views/partials/sidebar.blade.php -->
<!-- Main Sidebar Container -->

<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="/assets/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="/assets/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div> --}}

    <!-- SidebarSearch Form -->
    {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/listbarang" class="nav-link {{ request()->is('listbarang*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                        List Barang
                    </p>
                </a>
            </li>
            <li class="nav-header">CONFIG</li>
            <li class="nav-item">
                <a href="/posisi" class="nav-link {{ request()->is('posisi*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-map"></i>
                    <p>
                        Posisi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        User Management
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<!-- /.Main Sidebar Container -->
