@auth
  @role('super-admin|admin')
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Abu Zaid</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      MASTER DATA
    </div>

    <li class="nav-item {{ request()->is('admin/kategori') ||request()->is('admin/supplier') || request()->is('admin/barang') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master</span>
      </a>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Master Data:</h6>
          <a class="collapse-item {{ request()->is('admin/kategori') ? 'active' : '' }}" href="{{ route('admin.kategori') }}"><i class="fas fa-list-ol fa-chart-area"></i> <span>Kategori</span></a>

          <a class="collapse-item {{ request()->is('admin/supplier') ? 'active' : '' }}" href="{{ route('admin.supplier') }}"><i class="fas fa-truck fa-chart-area"></i>
            <span>Suppliers</span></a>

          <a class="collapse-item
          {{ request()->routeIs('admin.barang') || request()->routeIs('admin.barang.create') || request()->routeIs('admin.barang.edit') || request()->routeIs('admin.barang.show') ? 'active' : '' }}
          " href="{{ route('admin.barang') }}"> <i class="fas fa-mobile-alt fa-chart-area"></i>
            <span>Barang</span></a>
        </div>
      </div>
    </li>

    <li class="nav-item {{ request()->is('admin/pelanggan') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.pelanggan') }}">
        <i class="fas fa-user fa-chart-area"></i>
        <span>Pelanggan</span></a>
    </li>

    <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.user') }}">
        <i class="fas fa-users fa-chart-area"></i>
        <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      TRANSAKSI
    </div>

    <li class="nav-item {{ request()->is('admin/transaksi-kredit') ||request()->is('admin/bayar-kredit') }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Kredit</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Transaksi Kredit:</h6>
          <a class="collapse-item {{ request()->is('admin/transaksi-kredit') ? 'active' : '' }}" href="{{ route('admin.transaksi.kredit') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Transaksi Kredit</span>
          </a>

          <a class="collapse-item {{ request()->is('admin/bayar-kredit') ? 'active' : '' }}" href="{{ route('admin.bayar.kredit') }}">
            <i class="fas fa-truck fa-chart-area"></i>
            <span>Bayar Cicilan</span>
          </a>
        </div>
      </div>
    </li>

    <li class="nav-item {{ request()->is('admin/transaksi-tunai') }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Tunai</span>
      </a>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Transaksi Tunai:</h6>
          <a class="collapse-item {{ request()->is('admin/transaksi-tunai') ? 'active' : '' }}" href="{{ route('admin.transaksi.tunai') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Transaksi Tunai</span>
          </a>
        </div>
      </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      LAPORAN
    </div>
  
    <li class="nav-item {{ request()->is('admin/transaksi-kredit/all') ||request()->is('admin/transaksi-tunai/all') || request()->is('admin/transaksi/all') ? 'active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-cog"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Laporan:</h6>
          <a class="collapse-item {{ request()->is('admin/transaksi-kredit/all') ? 'active' : '' }}" href="{{ route('admin.transaksi.kredit.all') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Transaksi Kredit</span>
          </a>
          <a class="collapse-item {{ request()->is('admin/transaksi-tunai/all') ? 'active' : '' }}" href="{{ route('admin.transaksi.tunai.all') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Transaksi Tunai</span>
          <a class="collapse-item {{ request()->is('admin/transaksi/all') ? 'active' : '' }}" href="{{ route('admin.transaksi.all') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Semua Transaksi</span>
          </a>
          </a>
        </div>
      </div>
    </li>

      {{-- @role('pelanggan')
        <li class="nav-item {{ request()->is('admin/transaksi-kredit') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.transaksi.kredit') }}">
            <i class="fas fa-money-bill-wave fa-chart-area"></i>
            <span>Transaksi Kredit</span>
          </a>
        </li>
      @endrole --}}
      
      <hr class="sidebar-divider d-none d-md-block">
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    @endrole
@endauth