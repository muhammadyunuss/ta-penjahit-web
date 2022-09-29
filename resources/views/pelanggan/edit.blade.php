@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pelanggan <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pelanggan.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pelanggan.index')}}">Pelanggan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pelanggan.edit', $pelanggan->id)}}">Ubah Pelanggan</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Pelanggan
			</div>
		</div>
		<div class="portlet-body form">

        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-body">
                <div class="form-group">
                    <label for="nama_pelanggan">Nama</label>
                    <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}" placeholder="Isikan nama bahan baku Anda">
                    @error('nama_pelanggan')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email', $pelanggan->email) }}" placeholder="Isikan email pelanggan Anda">
                    @error('email')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="no_telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telepon" value="{{ old('no_telepon', $pelanggan->no_telepon) }}" placeholder="Isikan nomor telepon pelanggan Anda">
                    @error('no_telepon')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $pelanggan->alamat) }}" placeholder="Isikan alamat rumah pelanggan Anda">
                    @error('alamat')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
            </form>

		</div>
	</div>
</div>
@endsection
