@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Daftar Pembelian Bahan Baku
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi-bahanbaku.index')}}">Transaksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi-bahanbaku.create') }}">Tambah Daftar Pembelian Bahan Baku</a>
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
    @if (auth()->user()->previledge == "Admin")
    <div class="portlet-body form">
        <div class="form-body">
            <a href="{{ route('transaksi.bahanbaku.detail.create', $data->id )}}" class="btn btn-success btn-sm">+ Tambah Daftar Pembelian Bahan Baku Detail</a>
        </div>
    </div>
    @endif
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
                        <h4 class="control-label"><strong>Pegawai</strong></h4>
                        <p class="control-label">Nama Pegawai : {{ $data->nama_penjahit }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Detail Daftar Pembelian Bahan Baku
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
                            @if (auth()->user()->previledge == "Admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($dataDetail as $model)
                        <tr>
                            <td>{{ $model->kode_bahan_baku }} - {{ $model->nama_bahan_baku }}</td>
                            <td>Rp. {{ number_format($model->harga_beli ,2,',','.') }}</td>
                            <td>{{ $model->jumlah }}</td>
                            <td>Rp. {{ number_format($model->subtotal ,2,',','.') }}</td>
                            @if (auth()->user()->previledge == "Admin")
                            <td>
                                <a href="{{ route('transaksi.bahanbaku.detail.edit', $model->id) }}">Edit</a>
                            </td>
                            @endif
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
    <form method="POST" action="{{ route('transaksi.update.totalbayar', $id) }}" class="horizontal-form" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-body">
            <h3 class="form-section">Pembayaran</h3>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Total</label>
                        <span class="form-control">Rp. {{ number_format($total ,2,',','.') }}</span>
                        <input type="hidden" id="total" name="total" class="form-control" placeholder="Total" value="{{ $total }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                @if (auth()->user()->previledge == "Admin")
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        @if(isset($data->bayar))
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" value="{{ $data->bayar }}">
                        @else
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" value="0">
                        @endif

                    </div>
                </div>
                @endif
            </div>
        </div>
        @if (auth()->user()->previledge == "Admin")
        <div class="form-actions right">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
        </div>
        @endif
    </form>
    <!-- END FORM-->
</div>

@endsection

@section('scripts')
<script>

</script>
@stop
