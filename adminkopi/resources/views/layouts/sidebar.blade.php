<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4" style="background-color: #3E8E7E">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('') }}assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold" >KOPI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block font-weight-bold">{{ $user->name }}</a>
        </div>
      </div>
      <div class="row mb-3 ml-1 mr-1">
        <a href="/logout" class="ml-auto btn btn-danger ml-auto btn-sm text-white">Logout</a>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link {{ $active == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item  {{ ($active == 'mkeluarga') ? 'menu-is-opening menu-open' : (($active == 'mtingkat') ? 'menu-is-opening menu-open' : (($active == 'marea') ? 'menu-is-opening menu-open' : (($active == 'manggota') ? 'menu-is-opening menu-open' : '')))  }}">
            <a href="#" class="nav-link {{ ($active == 'mkeluarga') ? 'active' : (($active == 'mtingkat') ? 'active' : (($active == 'marea') ? 'active' : (($active == 'manggota') ? 'active' : '')))  }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manggota" class="nav-link {{ $active == 'manggota' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mkeluarga" class="nav-link {{ $active == 'mkeluarga' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Keluarga</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="/mtingkat" class="nav-link {{ $active == 'mtingkat' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Tingkat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/marea" class="nav-link {{ $active == 'marea' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Area</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($active == 'tak' ? 'menu-is-opening menu-open' : ($active == 'ka' ? 'menu-is-opening menu-open' : '')) }}">
            <a href="#" class="nav-link {{ ($active == 'tak' ? 'active' : ($active == 'ka' ? 'active' : '')) }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Table
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/akeluarga" class="nav-link {{ $active == 'tak' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota Keluarga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/keanggotaan" class="nav-link {{ $active == 'ka' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keanggotaan</p>
                </a>
              </li>
            </ul>
          </li>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>