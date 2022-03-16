<li class="nav-item nav-category">
    <span class="nav-link">Navigation</span>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ url('kasir') }}">
        <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="{{ url('kasirmenu') }}">
        <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
        </span>
        <span class="menu-title">Menu</span>
    </a>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">Transaksi</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi
                    Baru</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('kasirtrans') }}">Transaksi
                    Lama</a>
            </li>
        </ul>
    </div>
</li>
<li class="nav-item menu-items">
    <a class="nav-link" href="#">
        <span class="menu-icon">
            <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Laporan</span>
    </a>
</li>
