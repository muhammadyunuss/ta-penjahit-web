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
            <a href="{{ route('transaksi.detail.create', $data->id )}}" class="btn btn-success">Tambah Detail</a>
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
                        <h4 class="control-label">Pelanggan</h4>
                        <h2 class="control-label">{{ $data->nama_pelanggan }}</h2>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label">Penjahit</h4>
                        <h2 class="control-label">{{ $data->nama_penjahit }}</h2>
                    </div>
                </div>
                <!--/span-->
            </div>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Detail Pemesanan
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Qty</th>
                            <th>Jenis</th>
                            <th>Ongkos Jahit</th>
                            <th>Deksripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataModelDetail as $model)
                        <tr>
                            <td>{{ $model->nama_model }}</td>
                            <td>{{ $model->banyaknya }}</td>
                            <td>{{ $model->nama_jenismodel }}</td>
                            <td>{{ $model->ongkos_jahit }}</td>
                            <td>{{ $model->deskripsi_pemesanan }}</td>
                            <td>
                                <a href="{{ route('transaksi.detail.edit', $model->id) }}">Edit</a>
                            </td>
                        </tr>
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
@endsection

@section('scripts')

@stop
