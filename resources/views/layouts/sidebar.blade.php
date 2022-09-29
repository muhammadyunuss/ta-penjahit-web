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
				<li class="start active ">
					<a href="{{ route('dashboard') }}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					<span class="selected"></span>
					</a>
				</li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-puzzle"></i>
                    <span class="title">Bahan Baku</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class= "active">
                            <a href="{{ route('supplier.index') }}">
                            Supplier</a>
                        </li>
                        <li>
                            <a href="{{ route('bahanbaku.index') }}">
                            Sediaan Bahan Baku</a>
                        </li>
                        <li>
                            <a href="">
                            Transaksi Bahan Baku</a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Pemesanan</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ route('pelanggan.index') }}">
                            Pelanggan</a>
                        </li>
                        <li>
                            <a href="">
                            Model Anda</a>
                        </li>
                        <li>
                            <a href="">
                            Model Pelanggan</a>
                        </li>
                        <li>
                            <a href="">
                            Transaksi Pemesanan</a>
                        </li>
                        <li>
                            <a href="">
                            Ukuran Pria</a>
                        </li>
                        <li>
                            <a href="">
                            Ukuran Wanita</a>
                        </li>
                    </ul>
                </li>
                <li >
                    <a href="javascript:;">
                    <i class="icon-present"></i>
                    <span class="title">Produksi</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                            Daftar Progres</a>
                        </li>
                        <li>
                            <a href="#">
                            Jadwal Progres</a>
                        </li>
                        <li>
                            <a href="#">
                            Penggunaan Bahan Baku</a>
                        </li>
                        <li>
                            <a href="#">
                            Realisasi Progres</a>
                        </li>
                    </ul>
                </li>
			</ul>
			<!-- END SIDEBAR MENU -->
