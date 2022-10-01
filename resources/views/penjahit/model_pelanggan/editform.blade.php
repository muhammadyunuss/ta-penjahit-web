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
            Transaksi Bahan Baku</a>
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
        <li class = "active">
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
        <li>
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
    Model Pelanggan<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggans.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggans.index')}}">Model Pelanggan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggans.edit', $data->id)}}">Ubah Model Pelanggan</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Model Pelanggan
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('modelpelanggans.update', $data->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
				<div class="form-body">
                    <div class="mb-3">
						<label for="image" class="form-label">Gambar</label>
						<input type="hidden" name="oldImage" value="{{ $data->foto_model }}"> <!-- menyimpan image lama -->
						<input class="form-control" type="file" id="image" name="image" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
						@if($data->foto_model)
							<img src="{{ asset('storage/' . $data->foto_model) }}" class="img-fluid" id="img-preview" style="max-height:400px">
						@else
							<img class="img-fluid" id="img-preview" style="max-height:400px">
							@error('image')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
						@endif
					</div><br>
                    <div class="form-group">
						<label for="nmModel">Nama</label>
						<input type="text" class="form-control @error('nmModel') is-invalid @enderror" name="nmModel" value="{{ old('nmModel', $data->nama_model) }}" placeholder="Isikan nama model Pelanggan">
						@error('nmModel')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="hrgModel">Ongkos Jahit</label> (Rp)
						<input type="number" class="form-control @error('hrgModel') is-invalid @enderror" name="hrgModel" value="{{ old('hrgModel', $data->ongkos_jahit) }}"  placeholder="Isikan harga model Pelanggan" min="0">
						@error('hrgModel')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="deskModel">Deskripsi</label>
						<textarea class="form-control @error('deskModel') is-invalid @enderror" name="deskModel" placeholder="Isikan deskripsi model Pelanggan" rows="3">{{ old('deskModel', $data->deskripsi_model) }}</textarea>
						@error('deskModel')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <!-- <div class="form-group">
                        <label for="tampilModel">Tampilkan Model pada Konsumen</label> <br>
                    	<div class="form-check">
							<input type="radio" class="form-check-input" name="tampilModel" id="tampilModel" value="tampilkan" {{ $data->status == 'tampilkan' ? 'checked' : ''}}>
							<label for="tampiltrue" class="form-check-label"> Ya </label>
                        </div>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="tampilModel" id="tampilModel" value="sembunyikan" {{ $data->status == 'sembunyikan' ? 'checked' : ''}}>
							<label for="tampilfalse" class="form-check-label"> Tidak  </label>
                        </div>
                	</div><br> -->
                    <div class="form-group row">
						<label for="name" class="col-md-4 col-form-label">Jenis Model</label>
						<div class="col-md-12">
							<select name="jnsModel" id="jnsModel" class="form-control @error('jnsModel') is-invalid @enderror">
								<option value="" >== Pilih Jenis Model ==</option>
								@foreach($jenismodel as $jm)
								<option value="{{ $jm->id }}" {{ old('jnsModel', $data->jenismodel_id) == $jm->id ? 'selected' : null }}>{{ $jm->nama_jenismodel }}</option>
								@endforeach
							</select>
							@error('jnsModel')
								<div class="invalid-feedback" style="color:red">{{ $message }}</div>
							@enderror
						</div>
                	</div>
                    <div class="form-group row">
						<label for="name" class="col-md-4 col-form-label">Pelanggan</label>
						<div class="col-md-12">
							<select name="plgnModel" id="plgnModel" class="form-control @error('plgnModel') is-invalid @enderror">
								<option value="" >== Pilih Pelanggan ==</option>
								@foreach($pelanggan as $p)
								<option value="{{ $p->id }}" {{ old('plgnModel', $data->pelanggan_id) == $p->id ? 'selected' : null }}>{{ $p->nama_pelanggan }}</option>
								@endforeach
							</select>
							@error('plgnModel')
								<div class="invalid-feedback" style="color:red">{{ $message }}</div>
							@enderror
						</div>
                	</div>
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
    $('#plgnModel').select2();
});
</script>
@stop
