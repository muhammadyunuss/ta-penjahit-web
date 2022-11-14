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
            <a href="{{ route('transaksi.detail.create', $data->id )}}" class="btn btn-success btn-sm">+ Tambah Detail Model</a>
            <a type= "button" class="btn btn-primary btn-sm" data-toggle="modal" href="#basic">
                + Tambah Bahan Baku
            </a>
            <a type= "button" class="btn btn-primary btn-sm" data-toggle="modal" href="{{ route('transaksi.invoice', $data->id )}}">
                + Invoice
            </a>
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
                        <h4 class="control-label"><strong>Pelanggan</strong></h4>
                        <p class="control-label">Nama : {{ $data->nama_pelanggan }}</p>
                        <p class="control-label">Email : {{ $data->email_pelanggan }}</p>
                        <p class="control-label">No. Telepon : {{ $data->no_telepon_pelanggan }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat_pelanggan }}</p>
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
            <i class="fa fa-reorder"></i> Detail Pemesanan
        </div>
    </div>
    @php
        $total = 0;
    @endphp
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
                            <td>Rp. {{ number_format($model->ongkos_jahit ,2,',','.')}}</td>
                            <td>{{ $model->deskripsi_pemesanan }}</td>
                            <td>
                                <a href="{{ route('transaksi.detail.edit', $model->id) }}">Edit</a>
                            </td>
                            @php
                                $total += $model->ongkos_jahit;
                            @endphp
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
    <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Nama Bahan Baku</th>
                            <th>Qty</th>
                            <th>Ongkos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailBahanBaku as $model)
                        <tr>
                            <td>{{ $model->nama_bahanbaku }}</td>
                            <td>{{ $model->jumlah_terpakai }}</td>
                            <td>Rp. {{ number_format($model->ongkos_jahit ,2,',','.')}}</td>
                            <td>
                                <a href="{{ route('transaksi.detail.edit', $model->id) }}">Edit</a>
                            </td>
                            @php
                                $total += $model->ongkos_jahit;
                            @endphp
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
<div class="portlet-body form">
    <!-- BEGIN FORM-->
    <form role="form" method="POST" id="formtotaltransaksi" name="formtotaltransaksi" action="{{ route('transaksi.update.total', $data->id) }}" class="horizontal-form">
        @csrf
        @method("PUT")
        <div class="form-body">
            <h3 class="form-section">Pembayaran</h3>
            <div class="row">
                <div class="col-md-6">
                    {{-- <input type="hidden" id="id" name="id" value="{{ $data->id }}"> --}}
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Total</label>
                        <span class="form-control">Rp. {{ number_format($total ,2,',','.') }}</span>
                        <input type="hidden" id="total_ongkos" name="total_ongkos" class="form-control" placeholder="Total" value="{{ $total }}" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" value="{{ $data->bayar }}">
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
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Bahan Baku</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" id="formbahanbaku" action="{{route('transaksi.save.bahanbaku')}}" name="formbahanbaku">
                    @csrf
                    <div class="form-body">
                        <input type="hidden" id="pemesanan_id" name="pemesanan_id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Bahan Baku</label>
                            <div class="col-md-9">
                                <select class="form-control input-sm" id="bahan_baku_id" name="bahan_baku_id">
                                    <option value="">Pilih Bahan Baku</option>
                                    @foreach ($bahanBaku as $bb)
                                        <option value="{{ $bb->id }}">{{ $bb->nama_bahanbaku }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ongkos</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="ongkos_jahit" name="ongkos_jahit" placeholder="Ongkos">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')
<script>
    $("#bahan_baku_id").on('change', function(event) {
        let id = $(this).val();
        document.getElementById("ongkos_jahit").value = 0;
        if(id){
            $.ajax ({
                type: 'GET',
                url: "{{ url('/pemesanan/transaksi/get-ajax-bahan-baku') }}"+"/"+id,
                dataType: 'json',
                success : function(data) {
                    document.getElementById("ongkos_jahit").value = data[0].harga_jual;
                }
            });
        }
    });
</script>
@stop
