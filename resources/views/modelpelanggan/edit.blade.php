@extends('layouts.layout')

@section('content')
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
            <a href="{{route('modelpelanggan.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggan.index')}}">Model Pelanggan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggan.edit', $data->id)}}">Ubah Model Pelanggan</a>
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
			<form method="POST" action="{{ route('modelpelanggan.update', $data->id) }}" enctype="multipart/form-data">
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
						<input type="text" class="form-control @error('nmModel') is-invalid @enderror" name="nmModel" value="{{ old('nmModel', $data->nama_model) }}" placeholder="Isikan nama model Anda">
						@error('nmModel')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="hrgModel">Ongkos Jahit</label> (Rp)
						<input type="number" class="form-control @error('hrgModel') is-invalid @enderror" name="hrgModel" value="{{ old('hrgModel', $data->ongkos_jahit) }}"  placeholder="Isikan harga model Anda" min="0">
						@error('hrgModel')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
					<div class="form-group">
						<label for="deskModel">Deskripsi</label>
						<textarea class="form-control @error('deskModel') is-invalid @enderror" name="deskModel" placeholder="Isikan deskripsi model Anda" rows="3">{{ old('deskModel', $data->deskripsi_model) }}</textarea>
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
