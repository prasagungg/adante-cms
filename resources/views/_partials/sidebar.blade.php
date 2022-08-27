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


          {{-- <li class="nav-item">
            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
              <i class="ni ni-ungroup text-orange"></i>
              <span class="nav-link-text">Examples</span>
            </a>
            <div class="collapse" id="navbar-examples">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/examples/pricing.html" class="nav-link">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal"> Pricing </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/login.html" class="nav-link">
                    <span class="sidenav-mini-icon"> L </span>
                    <span class="sidenav-normal"> Login </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/register.html" class="nav-link">
                    <span class="sidenav-mini-icon"> R </span>
                    <span class="sidenav-normal"> Register </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/lock.html" class="nav-link">
                    <span class="sidenav-mini-icon"> L </span>
                    <span class="sidenav-normal"> Lock </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/timeline.html" class="nav-link">
                    <span class="sidenav-mini-icon"> T </span>
                    <span class="sidenav-normal"> Timeline </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/profile.html" class="nav-link">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal"> Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/examples/rtl-support.html" class="nav-link">
                    <span class="sidenav-mini-icon"> RP </span>
                    <span class="sidenav-normal"> RTL Support </span>
                  </a>
                </li>
              </ul>
            </div>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
              <i class="ni ni-planet text-info"></i>
              <span class="nav-link-text">Zoom</span>
            </a>
            <div class="collapse" id="navbar-components">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/components/buttons.html" class="nav-link">
                    <span class="sidenav-mini-icon"> B </span>
                    <span class="sidenav-normal"> Buttons </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/components/cards.html" class="nav-link">
                    <span class="sidenav-mini-icon"> C </span>
                    <span class="sidenav-normal"> Cards </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
              <i class="ni ni-money-coins text-default"></i>
              <span class="nav-link-text">Keuangan</span>
            </a>
            <div class="collapse" id="navbar-tables">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/tables/tables.html" class="nav-link">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal"> Pendapatan </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/tables/sortable.html" class="nav-link">
                    <span class="sidenav-mini-icon"> P </span>
                    <span class="sidenav-normal"> Pemasukan </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
              <i class="ni ni-single-02 text-primary"></i>
              <span class="nav-link-text">Users</span>
            </a>
            <div class="collapse" id="navbar-maps">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="../../pages/maps/google.html" class="nav-link">
                    <span class="sidenav-mini-icon"> G </span>
                    <span class="sidenav-normal"> Google </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/maps/vector.html" class="nav-link">
                    <span class="sidenav-mini-icon"> V </span>
                    <span class="sidenav-normal"> Vector </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        
        </ul>
      </div>
    </div>
  </div>
</nav>