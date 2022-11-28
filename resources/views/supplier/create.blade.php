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
            <a href="{{route('supplier.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('supplier.index')}}">Supplier</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('supplier.create')}}">Tambah Supplier</a>
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
			<form method="POST" action="{{ route('supplier.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="nama_supplier">Nama</label>
						<input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" name="nama_supplier" value="{{ old('nama_supplier') }}" placeholder="Isikan nama supplier Anda" required>
						@error('nama_supplier')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Isikan alamat supplier Anda" required>
					</div><br>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Isikan email supplier Anda">
					</div><br>
					<div class="form-group">
						<label for="nomor_telepon">Nomor Telepon</label>
						<input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Isikan nomor telepon supplier Anda" required>
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
