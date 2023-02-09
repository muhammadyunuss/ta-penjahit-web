@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Model Pakaian<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelanda.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelanda.index')}}">Model Pakaian</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelanda.create')}}">Tambah Model Pakaian</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Model Pakaian
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('modelanda.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="mb-3">
						<label for="foto_model" class="form-label">Gambar</label>
						<input class="form-control" type="file" id="foto_model" name="foto_model" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
						@error('foto_model')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
						<img class="img-fluid" id="img-preview" style="max-height:400px">
					</div><br>
                    <div class="form-group">
						<label for="nama_model">Nama</label>
						<input type="text" class="form-control @error('nama_model') is-invalid @enderror" name="nama_model" value="{{ old('nama_model') }}" placeholder="Isikan nama model Pakaian">
						@error('nama_model')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="ongkos_jahit">Ongkos Jahit</label> (Rp)
						<input type="number" class="form-control @error('ongkos_jahit') is-invalid @enderror" name="ongkos_jahit" value="{{ old('ongkos_jahit') }}"  placeholder="Isikan harga model Pakaian" min="0">
						@error('ongkos_jahit')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="deskripsi_model">Deskripsi</label>
						<textarea class="form-control @error('deskripsi_model') is-invalid @enderror" name="deskripsi_model" placeholder="Isikan deskripsi model Pakaian" rows="3">{{ old('deskripsi_model') }}</textarea>
					</div><br>
                    <!-- <div class="form-group">
                        <label for="tampilModel">Tampilkan Model pada Konsumen</label> <br>
                    	<div class="form-check">
							<label><input type="radio" name="tampilModel" id="tampilModel" value="tampilkan" checked="checked"/>Ya</label>
                        </div>
						<div class="form-check">
							<label><input type="radio" name="tampilModel" id="tampilModel" value="sembunyikan"/>Tidak</label>
                        </div>
                	</div><br> -->
                    <div class="form-group row">
						<label for="jenis_model" class="col-md-4 col-form-label">Jenis Model</label>
						<div class="col-md-12">
							<select name="jenis_model" id="jenis_model" class="form-control @error('jenis_model') is-invalid @enderror">
								<option value="">== Pilih Jenis Model ==</option>
								@foreach($jenismodel as $key => $jm)
									<option value="{{ $key }}">{{ $jm }}</option>
								@endforeach
							</select>
							@error('jenis_model')
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
    $('#nmBahanBaku').select2();
});
</script>
@stop
