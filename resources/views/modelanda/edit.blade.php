@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Model Anda<br>
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
            <a href="{{route('modelanda.index')}}">Model Anda</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelanda.edit', $data->id)}}">Ubah Model Anda</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Model Anda
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('modelanda.update', $data->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
				<div class="form-body">
                    <div class="mb-3">
						<label for="foto_model" class="form-label">Gambar</label>
						{{-- <input type="hidden" name="oldfoto_model" value="{{ $data->foto_model }}"> --}}
						<input class="form-control" type="file" id="foto_model" name="foto_model" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
						@if($data->foto_model)
							<img src="{{ asset('upload_image/foto_model/'.$data->foto_model) }}" class="img-fluid" id="img-preview" style="max-height:400px">
						@else
                            <img class="img-fluid" id="img-preview" style="max-height:400px">
                            @error('foto_model')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
						@endif
					</div>
                    <div class="form-group">
						<label for="nama_model">Nama</label>
						<input type="text" class="form-control @error('nama_model') is-invalid @enderror" name="nama_model" value="{{ old('nama_model', $data->nama_model) }}" placeholder="Isikan nama model Anda">
						@error('nama_model')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="ongkos_jahit">Ongkos Jahit</label> (Rp)
						<input type="number" class="form-control @error('ongkos_jahit') is-invalid @enderror" name="ongkos_jahit" value="{{ old('ongkos_jahit', $data->ongkos_jahit) }}"  placeholder="Isikan harga model Anda" min="0">
						@error('ongkos_jahit')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label for="deskripsi_model">Deskripsi</label>
						<textarea class="form-control @error('deskripsi_model') is-invalid @enderror" name="deskripsi_model" placeholder="Isikan deskripsi model Anda" rows="3">{{ old('deskripsi_model', $data->deskripsi_model) }}</textarea>
					</div>
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
                            <select name="jenis_model" id="jenis_model" class="form-control @error('jenis_model') is-invalid @enderror">
								<option value="">== Pilih Jenis Model ==</option>
								@foreach($jenismodel as $key => $jm)
								<option value="{{ $key }}" {{ old('jenis_model', $data->jenis_model) == $key ? 'selected' : null }}>{{ $jm }}</option>
									<option value="{{ $key }}">{{ $jm }}</option>
								@endforeach
							</select>
							@error('jnsModel')
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
