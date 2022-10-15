@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Supplier <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-progres.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-progres.index')}}">Supplier</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-progres.create')}}">Tambah Supplier</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Supplier
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('daftar-progres.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="nama_prosesproduksi">Nama Proses Produksi</label>
						<input type="text" class="form-control @error('nama_prosesproduksi') is-invalid @enderror" name="nama_prosesproduksi" value="{{ old('nama_prosesproduksi') }}" placeholder="Daftar Progres">
						@error('nama_prosesproduksi')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
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