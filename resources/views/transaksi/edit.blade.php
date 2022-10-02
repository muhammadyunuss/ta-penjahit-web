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
				<i class="fa fa-reorder"></i> Edit Pemesanan
			</div>
		</div>
		<div class="portlet-body form">
            <form action="{{ route('transaksi.update', $id) }}" method="POST">
			@csrf
            @method('PUT')
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-md-12">
                            <select name="pelanggan_id" id="pelanggan_id" data-with="100%" class="form-control @error('pelanggan_id') is-invalid @enderror">
                                <option value="">== Pilih Nama Pelanggan ==</option>
                                @foreach($dataPelanggan as $dp)
                                    <option value="{{ $dp->id }}" {{ old('pelanggan_id', $data->pelanggan_id) == $dp->id ? 'selected' : null }}>{{ $dp->nama_pelanggan }}</option>
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
                                @foreach($dataPenjahit as $dp)
                                    <option value="{{ $dp->id }}" {{ old('penjahit_id', $data->penjahit_id ) == $dp->id ? 'selected' : null }}>{{ $dp->nama_penjahit }}</option>
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
                            <input type="date" id="tanggal" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{ old('tanggal', date('Y-m-d', $data->tanggal==null ? null : strtotime($data->tanggal)))}}">
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
