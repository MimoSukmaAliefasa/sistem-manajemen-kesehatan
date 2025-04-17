<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

  {{-- Sidebar brand logo --}}
  @if(config('adminlte.logo_img_xl'))
      @include('adminlte::partials.common.brand-logo-xl')
  @else
      @include('adminlte::partials.common.brand-logo-xs')
  @endif

  {{-- Sidebar menu --}}
  <div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="https://picsum.photos/300/300" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      @if (Auth::user())
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      @endif
    </div>
  </div>
      <nav class="pt-2">
          <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
              data-widget="treeview" role="menu"
              @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                  data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
              @endif
              @if(!config('adminlte.sidebar_nav_accordion'))
                  data-accordion="false"
              @endif>
              {{-- Configured sidebar links --}}
              @if (request()->is('dokter*'))

              <!-- Search Box -->
              <div class="form-inline mt-2 mb-3">
                  <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                      <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
                  </div>
              </div>

              <li class="nav-item">
                  <a href="/dokter/dashboard" class="nav-link {{ request()->is('dokter/dashboard*') ? "active" : "" }}">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
              <li class="nav-item">
                  <a href="{{ route('periksadokter') }}" class="nav-link {{ request()->is('dokter/periksa*') ? "active" : "" }}">
                    <i class="fas fa-fw fa-stethoscope"></i>
                    <p>Memeriksa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/dokter/obat" class="nav-link {{ request()->is('dokter/obat*') ? "active" : "" }}">
                    <i class="fas fa-fw fa-pills"></i>
                    <p>Obat</p>
                  </a>
                </li>
              @else
                  @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
              @endif

              @if (Auth::user())
                @include('adminlte::partials.navbar.menu-item-logout-link')
              @endif
          </ul>
      </nav>
  </div>

</aside>