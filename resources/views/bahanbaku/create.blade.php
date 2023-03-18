@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Bahan Baku <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        <li>
        <li>
            <a href="{{route('bahanbaku.index')}}">Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bahanbaku.index')}}">Sediaan Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bahanbaku.create')}}">Tambah Sediaan Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Sediaan Bahan Baku
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('bahanbaku.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="kode_bahan_baku">Kode Bahan Baku</label>
						<input type="text" class="form-control @error('kode_bahan_baku') is-invalid @enderror" name="kode_bahan_baku" value="{{ old('kode_bahan_baku') }}" placeholder="Isikan Kode Bahan Baku bahan baku Anda" required>
						@error('kode_bahan_baku')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="nama_bahanbaku">Nama</label>
						<input type="text" class="form-control @error('nama_bahanbaku') is-invalid @enderror" name="nama_bahanbaku" value="{{ old('nama_bahanbaku') }}" placeholder="Isikan nama bahan baku Anda" required>
						@error('nama_bahanbaku')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="kolom_rak_id">Letak</label>
						<select name="kolom_rak_id" id="kolom_rak_id" data-with="100%" class="form-control @error('kolom_rak_id') is-invalid @enderror" required>
                            <option value="">Pilih Letak</option>
                            @foreach($kolomrak as $dp)
                                <option value="{{ $dp->id }}" {{ old('kolom_rak_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_rak }} - {{  $dp->nama_kolom }}</option>
                            @endforeach
                        </select>
                        @error('kolom_rak_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
					</div><br>
                    <div class="form-group">
						<label for="harga_beli">Harga Beli</label> (Rp)
						<input type="number" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" value="{{ old('harga_beli') }}" placeholder="Isikan harga beli bahan baku Anda" min="0" required>
						@error('harga_beli')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    {{-- <div class="form-group">
						<label for="harga_jual">Harga Jual</label> (Rp)
						<input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" value="{{ old('harga_jual') }}" placeholder="Isikan harga jual bahan baku Anda" min="0">
						@error('harga_jual')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br> --}}
					{{-- <div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" step="any" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}"  placeholder="Isikan stok bahan baku Anda" min="0" required>
						@error('stok')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br> --}}
                    <div class="form-group">
						<label for="satuan">Satuan</label>
						<input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ old('satuan') }}" placeholder="Isikan satuan bahan baku Anda" required>
						@error('satuan')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
                    <div class="form-group">
						<label for="supplier_id">Nama Supplier</label>
						<select name="supplier_id" id="supplier_id" data-with="100%" class="form-control @error('supplier_id') is-invalid @enderror" required>
                            <option value="">Pilih Nama Supplier</option>
                            @foreach($dataSupplier as $dp)
                                <option value="{{ $dp->id }}" {{ old('supplier_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_supplier }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
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

@section('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
<script type="text/javascript">
$(document).ready(function() {
    // $('#supplier_id').select2();
});
</script>
@stop
