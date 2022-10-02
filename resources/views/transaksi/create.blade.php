@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Transaksi
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
            <a href="{{ route('transaksi.create') }}">Tambah Transaksi</a>
        </li>
    </ul>
</div>

<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Nota
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-md-12">
                            <select name="pelanggan_id" id="pelanggan_id" data-with="100%" class="form-control @error('pelanggan_id') is-invalid @enderror">
                                <option value="">== Pilih Nama Pelanggan ==</option>
                                @foreach($datapelanggan as $dp)
                                    <option value="{{ $dp->id }}" {{ old('pelanggan_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            @error('pelanggan_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Penjahit</label>
                        <div class="col-md-12">
                            <select name="penjahit_id" id="penjahit_id" data-with="100%" class="form-control @error('penjahit_id') is-invalid @enderror">
                                <option value="">== Pilih Nama Penjahit ==</option>
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
                        <label for="tanggal">Estimasi Selesai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                        </div>
                    </div><br>
                    {{-- <div class="card-body">
                        <table class="table table-bordered table-hover" id="products_table">
                            <thead>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>Model Baju</th>
                                    <th class="text-center"> Harga </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <input type="number" name="banyaknya[]" class="form-control" value="1" min="1"/>
                                    </td>
                                    <td>
                                        <select name="jenis_model_id[]"  id="jenis_model_id" class="form-control">
                                            <option value="">-- choose product --</option>
                                            @foreach ($datamodel as $dm)
                                                <option value="{{ $dm->id }}">
                                                    {{ $dm->nama_model }} (Rp{{ number_format($dm->harga) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name='ongkos_jahit[]' id="ongkos_jahit" placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>
                    </div> --}}
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