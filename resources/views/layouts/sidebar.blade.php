
<section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    
    @if (Auth::user()->hasRole('superadmin'))
        
    <li class="{{ (request()->is('superadmin')) ? 'active' : '' }}"><a href="/superadmin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    
    <li class="header">DATA MASTER</li>
    
    
    <li class="{{ (request()->is('superadmin/user*')) ? 'active' : '' }}"><a href="/superadmin/user"><i class="fa fa-th"></i> <span>Data User</span></a></li>
    <li class="{{ (request()->is('superadmin/kategori*')) ? 'active' : '' }}"><a href="/superadmin/kategori"><i class="fa fa-th"></i> <span>Data Kategori</span></a></li>
    <li class="{{ (request()->is('superadmin/kasi*')) ? 'active' : '' }}"><a href="/superadmin/kasi"><i class="fa fa-th"></i> <span>Data Kasi</span></a></li>
    <li class="{{ (request()->is('superadmin/kepala*')) ? 'active' : '' }}"><a href="/superadmin/kepala"><i class="fa fa-th"></i> <span>Data Kepala</span></a></li>
    <li class="{{ (request()->is('superadmin/penyedia*')) ? 'active' : '' }}"><a href="/superadmin/penyedia"><i class="fa fa-th"></i> <span>Data Penyedia</span></a></li>

    <li class="header">DATA TRANSAKSI</li>
    <li class="{{ (request()->is('superadmin/arsip*')) ? 'active' : '' }}"><a href="/superadmin/arsip"><i class="fa fa-th"></i> <span>Data Arsip</span></a></li>

    <li class="header">DATA LAPORAN</li>
    <li class="{{ (request()->is('superadmin/laporan*')) ? 'active' : '' }}"><a href="/superadmin/laporan"><i class="fa fa-th"></i> <span>Laporan</span></a></li>

    <li class="header">SETTING</li>
    <li><a href="/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
    @else
        
    
    @endif
    </ul>
    
</section>