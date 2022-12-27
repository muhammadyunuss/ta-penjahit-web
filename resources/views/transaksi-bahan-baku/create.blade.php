@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Transaksi Bahan Baku
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi.index')}}">Transaksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi-bahanbaku.create') }}">Tambah Transaksi Bahan Baku</a>
        </li>
    </ul>
</div>

<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Transaksi Bahan Baku
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('transaksi-bahanbaku.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Supplier</label>
                        <div class="col-md-12">
                            <select name="supplier_id" id="supplier_id" data-with="100%" class="form-control @error('supplier_id') is-invalid @enderror">
                                <option value="">Pilih Nama Supplier</option>
                                @foreach($datasupplier as $dp)
                                    <option value="{{ $dp->id }}" {{ old('supplier_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_supplier }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Penjahit</label>
                        <div class="col-md-12">
                            <select name="penjahit_id" id="penjahit_id" data-with="100%" class="form-control @error('penjahit_id') is-invalid @enderror">
                                @foreach($datapenjahit as $dp)
                                    <option value="{{ $dp->id }}" {{ old('penjahit_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_penjahit }}</option>
                                @endforeach
                            </select>
                            @error('penjahit_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_beli') is-invalid @enderror" id="tanggal_beli" name="tanggal_beli" value="{{ old('tanggal_beli') }}">
                        </div>
                    </div><br>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection
