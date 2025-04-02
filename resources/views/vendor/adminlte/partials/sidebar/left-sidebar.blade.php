<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
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
                <li class="nav-item">
                    <a href="/dokter/periksa" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Periksa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/dokter/obat" class="nav-link">
                        <i class="fas fa-pills nav-icon"></i>
                        <p>Obat</p>
                      </a>
                    </li>
                @elseif (request()->is('pasien*')) {{-- Tambahkan blok ini --}}
                <li class="nav-item">
                    <a href="/pasien/periksa" class="nav-link active">
                      <i class="fas fa-stethoscope nav-icon"></i>
                      <p>Periksa</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/pasien/riwayat" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Riwayat</p>
                      </a>
                    </li>
                @else
                    @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
                @endif               
            </ul>
        </nav>
    </div>

</aside>
