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
            <a href="{{route('transaksi.index')}}">Transaksi Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi.create') }}">Tambah Transaksi Bahan Baku</a>
        </li>
    </ul>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Pemesan
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Supplier</strong></h4>
                        <p class="control-label">Nama : {{ $data->nama_supplier }}</p>
                        <p class="control-label">Email : {{ $data->email }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat }}</p>
                        <p class="control-label">No. Telepon : {{ $data->nomor_telepon }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Penjahit</strong></h4>
                        <p class="control-label">Nama Penjahit : {{ $data->nama_penjahit }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Tambah Detail Transaksi Bahan Baku
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi.bahanbaku.save.detail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="pembelian_bahanbaku_id" id="pembelian_bahanbaku_id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bahan Baku</label>
                            <select class="select2_category form-control" name="bahan_baku_id" id="bahan_baku_id" tabindex="1">
                                <option value="">Pilih</option>
                                @foreach ($dataBahanBaku as $bahan)
                                    <option value="{{ $bahan->id }}">{{ $bahan->nama_bahanbaku }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Harga Beli</label>
                            <input type="number" id="harga_beli" name="harga_beli" class="form-control" placeholder="Harga Beli">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Sub Total</label>
                            <input type="number" id="subtotal" name="subtotal" class="form-control" placeholder="Sub Total" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $( "#jumlah" ).keyup(function() {
        let jumlah = $(this).val();
        let harga_beli = document.getElementById("harga_beli").value;
        let total = parseInt(jumlah) * parseInt(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });

    $( "#harga_beli" ).keyup(function() {
        let harga_beli = $(this).val();
        let jumlah = document.getElementById("jumlah").value;
        let total = parseInt(jumlah) * parseInt(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });
</script>
@stop
