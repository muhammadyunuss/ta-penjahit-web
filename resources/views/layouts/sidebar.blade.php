<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: for circle icon style menu apply page-sidebar-menu-circle-icons class right after sidebar-toggler-wrapper -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<div class="clearfix">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="sidebar-search-wrapper">
					<form class="search-form" role="form" action="index.html" method="get">
						<div class="input-icon right">
							<i class="icon-magnifier"></i>
							<input type="text" class="form-control" name="query" placeholder="Search...">
						</div>
					</form>
				</li>
				<li class="{{ (request()->segment(1) == 'dashboard') ? 'active' : '' }} ">
					<a href="{{ route('dashboard') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					{{-- <span class="selected"></span> --}}
					</a>
				</li>
                <li class="{{ (request()->segment(1) == 'bahan-baku') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-puzzle"></i>
                    <span class="title">Bahan Baku</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'bahan-baku') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class= "{{ (request()->segment(2) == 'supplier') ? 'active' : '' }}">
                            <a href="{{ route('supplier.index') }}">
                            Supplier</a>
                        </li>
                       <li class= "{{ (request()->segment(2) == 'bahanbaku') ? 'active' : '' }}">
                            <a href="{{ route('bahanbaku.index') }}">
                            Sediaan Bahan Baku</a>
                        </li>
                       <li class= "{{ (request()->segment(2) == 'transaksi-bahanbaku') ? 'active' : '' }}">
                            <a href="{{ route('transaksi-bahanbaku.index') }}">
                            Transaksi Bahan Baku</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'pemesanan') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Pemesanan</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'pemesanan') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{ (request()->segment(2) == 'pelanggan') ? 'active' : '' }}">
                            <a href="{{ route('pelanggan.index') }}">
                            Pelanggan</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'modelanda') ? 'active' : '' }}">
                            <a href="{{ route('modelanda.index') }}">
                            Model Anda</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'modelpelanggan') ? 'active' : '' }}">
                            <a href="{{ route('modelpelanggan.index') }}">
                            Model Pelanggan</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'transaksi') ? 'active' : '' }}">
                            <a href="{{ route('transaksi.index') }}">
                            Transaksi Pemesanan</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'informasiukuran') ? 'active' : '' }}">
                            <a href="{{ route('informasiukuran.index') }}">
                            Informasi Ukuran</a>
                        </li>
                        {{-- <li class="{{ (request()->segment(2) == 'ukuranpria') ? 'active' : '' }}">
                            <a href="{{ route('ukuranpria.index') }}">
                            Ukuran Pria</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'ukuranwanita') ? 'active' : '' }}">
                            <a href="{{ route('ukuranwanita.index') }}">
                            Ukuran Wanita</a>
                        </li> --}}
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'produksi') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Produksi</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'produksi') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                         <li class="{{ (request()->segment(2) == 'daftar-progres') ? 'active' : '' }}">
                            <a href="{{ route('daftar-progres.index') }}">
                            Daftar Progres</a>
                        </li>
                         <li class="{{ (request()->segment(2) == 'jadwal-progres') ? 'active' : '' }}">
                            <a href="{{ route('jadwal-progres.index') }}">
                            Jadwal Progres</a>
                        </li>
                         <li class="{{ (request()->segment(2) == 'peng-bahan-baku') ? 'active' : '' }}">
                            <a href="{{ route('peng-bahan-baku.index') }}">
                            Penggunaan Bahan Baku</a>
                        </li>
                         <li class="{{ (request()->segment(2) == 'realisasi-progres') ? 'active' : '' }}">
                            <a href="{{ route('realisasi-progres.index') }}">
                            Realisasi Progres</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ (request()->segment(1) == 'pengiriman') ? 'active' : '' }}">
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Pengiriman</span>
                    <span class="selected"></span>
                    <span class="arrow {{ (request()->segment(1) == 'pengiriman') ? 'open' : '' }}"></span>
                    </a>
                    <ul class="sub-menu">
                         <li class="{{ (request()->segment(2) == 'jasaekspedisi') ? 'active' : '' }}">
                            <a href="{{ route('jasaekspedisi.index') }}">
                            Jasa Ekspedisi</a>
                        </li>
                        <li class="{{ (request()->segment(2) == 'daftar-pengiriman') ? 'active' : '' }}">
                           <a href="{{ route('daftar-pengiriman.index') }}">
                           Pengiriman</a>
                       </li>
                    </ul>
                </li>
			</ul>
			<!-- END SIDEBAR MENU -->
