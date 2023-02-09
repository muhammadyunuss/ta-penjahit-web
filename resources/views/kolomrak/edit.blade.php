@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Kolom Rak <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kolomrak.index')}}">Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kolomrak.index')}}">Kolom Rak</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('kolomrak.edit', $kolomrak->id)}}">Ubah Kolom Rak</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Kolom Rak
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('kolomrak.update', $kolomrak->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
				<div class="form-body">
                    <div class="form-group">
						<label for="nama_rak">Nama Rak</label>
						<input type="text" class="form-control @error('nama_rak') is-invalid @enderror" name="nama_rak" value="{{ old('nama_rak', $kolomrak->nama_rak) }}" placeholder="Isikan nama rak" required>
						@error('nama_rak')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="nama_kolom">Nama Kolom</label>
						<input type="text" class="form-control @error('nama_kolom') is-invalid @enderror" name="nama_kolom" value="{{ old('nama_kolom', $kolomrak->nama_kolom) }}" placeholder="Isikan nama kolom" required>
						@error('nama_kolom')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
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
