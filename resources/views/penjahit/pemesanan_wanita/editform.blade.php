@extends('penjahit.layout.conquer')

@section('left_sidebar')
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
<li >
    <a href="{{url('/')}}">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    </a>
</li>
<li>
    <a href="javascript:;">
    <i class="icon-puzzle"></i>
    <span class="title">Bahan Baku</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('suppliers.index')}}">
            Supplier</a>
        </li>
        <li>
            <a href="{{route('bahanbakus.index')}}">
            Sediaan Bahan Baku</a>
        </li>
        <li>
            <a href="{{route('pembelians.index')}}">
            Daftar Pembelian Bahan Baku</a>
        </li>
    </ul>
</li>
<li class = "active">
    <a href="javascript:;">
    <i class="icon-briefcase"></i>
    <span class="title">Pemesanan</span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('pelanggans.index')}}">
            Pelanggan</a>
        </li>
        <li>
            <a href="{{route('modelandas.index')}}">
            Model Anda</a>
        </li>
        <li>
            <a href="{{route('modelpelanggans.index')}}">
            Model Pelanggan</a>
        </li>
        <li>
            <a href="{{route('transaksis.index')}}">
            Transaksi Pemesanan</a>
        </li>
        <li>
            <a href="{{route('pemesananprias.index')}}">
            Ukuran Pria</a>
        </li>
        <li class = "active">
            <a href="{{route('pemesananwanitas.index')}}">
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
@endsection

@section('konten')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pemesanan Wanita &nbsp;&nbsp;
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pemesananwanitas.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pemesananwanitas.index')}}">Pemesanan Wanita</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pemesananwanitas.create')}}">Tambah Pemesanan Wanita</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Pemesanan Wanita
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('pemesananwanitas.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group row" hidden>
                        <label for="name" class="col-md-4 col-form-label">Nama Jenis Model</label>
                        <div class="col-md-12">
                            <select name="jnsModelPemesanan" id="jnsModelPemesanan" data-with="100%" class="form-control @error('jnsModelPemesanan') is-invalid @enderror">
                                @foreach($jenismodel as $jm)
                                    <option value="{{ $jm->id }}" {{ old('jnsModelPemesanan') == $jm->id ? 'selected' : null }}>{{ $jm->nama_jenismodel }}</option>
                                @endforeach
                            </select>
                            @error('jnsModelPemesanan')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-md-12">
                            <select name="nmPelanggan" id="nmPelanggan" data-with="100%" class="form-control @error('nmPelanggan') is-invalid @enderror">
                                <option value="">== Pilih Nama Pelanggan ==</option>
                                @foreach($datapelanggan as $dp)
                                    <option value="{{ $dp->id }}" {{ old('nmPelanggan') == $dp->id ? 'selected' : null }}>{{ $dp->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            @error('nmPelanggan')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Model</label>
                        <div class="col-md-12">
                            <select name="nmModel" id="nmModel" data-with="100%" class="form-control @error('nmModel') is-invalid @enderror">
                                <option value="">== Pilih Nama Model ==</option>
                                @foreach($datamodel as $dm)
                                    <option value="{{ $dm->id }}" {{ old('nmModel') == $dm->id ? 'selected' : null }}>{{ $dm->nama_model }}</option>
                                @endforeach
                            </select>
                            @error('nmModel')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
						<label for="jmlhPemesanan">Jumlah</label>
						<input type="number" step="any" class="form-control @error('jmlhPemesanan') is-invalid @enderror" name="jmlhPemesanan" value="{{ old('jmlhPemesanan') }}"  placeholder="Isikan jumlah pemesanan pelanggan" min="0">
						@error('jmlhPemesanan')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="pnjgKebayaPemesanan">Panjang Kebaya</label>
						<input type="number" step="any" class="form-control" name="pnjgKebayaPemesanan" value="{{ old('pnjgKebayaPemesanan') }}"  placeholder="Isikan panjang kebaya pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pnjgDressPemesanan">Panjang Dress</label>
						<input type="number" step="any" class="form-control" name="pnjgDressPemesanan" value="{{ old('pnjgDressPemesanan') }}"  placeholder="Isikan panjang dress pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lngkrPinggangPemesanan">Lingkar Pinggang</label>
						<input type="number" step="any" class="form-control" name="lngkrPinggangPemesanan" value="{{ old('lngkrPinggangPemesanan') }}"  placeholder="Isikan lingkar pinggang pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lngkrPinggulPemesanan">Lingkar Pinggul</label>
						<input type="number" step="any" class="form-control" name="lngkrPinggulPemesanan" value="{{ old('lngkrPinggulPemesanan') }}"  placeholder="Isikan lingkar pinggul pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pnjgMukaPemesanan">Panjang Muka</label>
						<input type="number" step="any" class="form-control" name="pnjgMukaPemesanan" value="{{ old('pnjgMukaPemesanan') }}"  placeholder="Isikan panjang muka pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pnjgBelakangPemesanan">Panjang Belakang</label>
						<input type="number" step="any" class="form-control" name="pnjgBelakangPemesanan" value="{{ old('pnjgBelakangPemesanan') }}"  placeholder="Isikan panjang belakang pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lbrBahuPemesanan">Lebar Bahu</label>
						<input type="number" step="any" class="form-control" name="lbrBahuPemesanan" value="{{ old('lbrBahuPemesanan') }}"  placeholder="Isikan lebar bahu pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pjgLenganPemesanan">Panjang Lengan</label>
						<input type="number" step="any" class="form-control" name="pjgLenganPemesanan" value="{{ old('pjgLenganPemesanan') }}"  placeholder="Isikan panjang lengan pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lkrUjungLenganPemesanan">Lingkar Ujung Lengan</label>
						<input type="number" step="any" class="form-control" name="lkrUjungLenganPemesanan" value="{{ old('lkrUjungLenganPemesanan') }}"  placeholder="Isikan lingkar ujung lengan pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lkrKerongLenganPemesanan">Lingkar Kerong Lengan</label>
						<input type="number" step="any" class="form-control" name="lkrKerongLenganPemesanan" value="{{ old('lkrKerongLenganPemesanan') }}"  placeholder="Isikan lingkar kerong lengan pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lkrSikuPemesanan">Lingkar Siku</label>
						<input type="number" step="any" class="form-control" name="lkrSikuPemesanan" value="{{ old('lkrSikuPemesanan') }}"  placeholder="Isikan lingkar siku pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="bwhTanganPemesanan">Bawah Tangan</label>
						<input type="number" step="any" class="form-control" name="bwhTanganPemesanan" value="{{ old('bwhTanganPemesanan') }}"  placeholder="Isikan bawah tangan pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="lkrLeherPemesanan">Lingkar Leher</label>
						<input type="number" step="any" class="form-control" name="lkrLeherPemesanan" value="{{ old('lkrLeherPemesanan') }}"  placeholder="Isikan lingkar leher pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="cupDadaPemesanan">Cup Dada</label>
						<input type="number" step="any" class="form-control" name="cupDadaPemesanan" value="{{ old('cupDadaPemesanan') }}"  placeholder="Isikan cup dada pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="trnDadaPemesanan">Turun Dada</label>
						<input type="number" step="any" class="form-control" name="trnDadaPemesanan" value="{{ old('trnDadaPemesanan') }}"  placeholder="Isikan turun dada pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pjgRokPemesanan">Panjang Rok</label>
						<input type="number" step="any" class="form-control" name="pjgRokPemesanan" value="{{ old('pjgRokPemesanan') }}"  placeholder="Isikan panjang rok pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="pjgBawahPemesanan">Panjang Bawah</label>
						<input type="number" step="any" class="form-control" name="pjgBawahPemesanan" value="{{ old('pjgBawahPemesanan') }}"  placeholder="Isikan panjang bawah pemesanan pelanggan" min="0">
					</div><br>
                    <div class="form-group">
						<label for="deskTambahanPemesanan">Deskripsi Tambahan</label>
						<textarea class="form-control" name="deskTambahanPemesanan" placeholder="Isikan deskripsi tambahan pemesanan Anda" rows="3">{{ old('deskProduk') }}</textarea>
					</div><br>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#nmPelanggan').select2();
    $('#nmModel').select2();
});
</script>
@stop
