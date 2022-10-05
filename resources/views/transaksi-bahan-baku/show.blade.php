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
    <div class="portlet-body form">
        <div class="form-body">
            <a href="{{ route('transaksi.bahanbaku.detail.create', $data->id )}}" class="btn btn-success btn-sm">+ Tambah Detail</a>
        </div>
    </div>
</div>
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
                        <p class="control-label">No. Telepon : {{ $data->nomor_telepon }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat }}</p>
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
            <i class="fa fa-reorder"></i> Detail Transaksi Bahan Baku
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubTotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($dataDetail as $model)
                        <tr>
                            <td>{{ $model->nama_bahan_baku }}</td>
                            <td>{{ $model->harga_beli }}</td>
                            <td>{{ $model->jumlah }}</td>
                            <td>{{ $model->subtotal }}</td>
                            <td>
                                <a href="{{ route('transaksi.detail.edit', $model->id) }}">Edit</a>
                            </td>
                        </tr>
                        @php
                            $total += $model->subtotal
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="edit_modal">
                    <div class="modal-dialog">
                       <form id="dataDetailPemesanan">
                            <div class="modal-content">
                            <input type="hidden" id="color_id" name="color_id" value="">
                            <div class="modal-body">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet-body form">
    <!-- BEGIN FORM-->
    <form action="#" class="horizontal-form">
        <div class="form-body">
            <h3 class="form-section">Pembayaran</h3>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Total</label>
                        <input type="number" id="total_ongkos" class="form-control" placeholder="Total" value="{{ $total }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions right">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
        </div>
    </form>
    <!-- END FORM-->
</div>

@endsection

@section('scripts')
<script>

</script>
@stop