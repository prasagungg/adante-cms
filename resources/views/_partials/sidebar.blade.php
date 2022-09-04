<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header  d-flex  align-items-center">
      <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <div class=" ml-auto ">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
        
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('project*') ? 'active' : '' }}" href="{{ route('project.index') }}">
              <i class="ni ni-spaceship text-orange"></i>
              <span class="nav-link-text">Project</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('netflix*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-single-copy-04 text-pink"></i>
              <span class="nav-link-text">Netflix</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('zooms*') ? 'active' : '' }}" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-tables">
              <i class="ni ni-planet text-info"></i>
              <span class="nav-link-text">Zoom</span>
            </a>
            <div class="collapse show" id="navbar-tables">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('type.index') }}" class="nav-link {{ request()->is('zooms/type*') ? 'active' : '' }}">
                    <span class="sidenav-mini-icon"> T </span>
                    <span class="sidenav-normal"> Type Zoom </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('zoom.index') }}" class="nav-link {{ request()->is('zooms/zoom*') ? 'active' : '' }}">
                    <span class="sidenav-mini-icon"> S </span>
                    <span class="sidenav-normal"> Account Zoom </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>

        <hr class="my-3">

        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Transaction</span>
          <span class="docs-mini">T</span>
        </h6>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('zoom*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-basket text-green"></i>
              <span class="nav-link-text">Penjualan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('zoom*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-basket text-green"></i>
              <span class="nav-link-text">Pembelian</span>
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">User Management</span>
          <span class="docs-mini">U</span>
        </h6>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('zoom*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text">Users</span>
            </a>
          </li>
        </ul>

        <hr class="my-3">

        <h6 class="navbar-heading p-0 text-muted">
          <span class="docs-normal">Report</span>
          <span class="docs-mini">U</span>
        </h6>

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ request()->is('zoom*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text">Laporan Penjualan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->is('zoom*') ? 'active' : '' }}" href="{{ route('netflix.index') }}">
              <i class="ni ni-single-02 text-red"></i>
              <span class="nav-link-text">Laporan Pembelian</span>
            </a>
          </li>

        </ul>

      </div>
    </div>
  </div>
</nav>