@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Transaksi Pemesanan
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
@if (auth()->user()->previledge == "Admin")
<div class="portlet">
    <div class="portlet-body form">
        <div class="form-body">
            <a href="{{ route('transaksi.detail.create', $data->id )}}" class="btn btn-success btn-sm">+ Tambah Detail Model</a>
            <a type= "button" class="btn btn-primary btn-sm" data-toggle="modal" href="#basic">
                + Tambah Bahan Baku
            </a>
            <a type= "button" class="btn btn-primary btn-sm" href="{{ route('transaksi.invoice', $data->id )}}">
                + Invoice
            </a>
        </div>
    </div>
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
                        <h4 class="control-label"><strong>Pelanggan</strong></h4>
                        <p class="control-label">Nama : {{ $data->nama_pelanggan }}</p>
                        <p class="control-label">Email : {{ $data->email_pelanggan }}</p>
                        <p class="control-label">No. Telepon : {{ $data->no_telepon_pelanggan }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat_pelanggan }}</p>
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
            <i class="fa fa-reorder"></i> Detail Pemesanan
        </div>
    </div>
    @php
        $total = 0;
    @endphp
    {{-- <div class="portlet-body form">
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
                                <a class="btn btn-default btn-xs green-stripe" href="{{ route('transaksi.detail.edit', $model->id) }}">Edit</a>
                                <a class="btn btn-default btn-xs green-stripe" href="{{ route('transaksi.detail.ukuran.create', $model->id) }}">Tambah Ukuran</a>
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
    </div> --}}
    <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Model</th>
                            <th>Model Detail</th>
                            <th>Qty</th>
                            
                            <th>Ongkos Jahit</th>
                            <th>Gambar</th>
                            <th>Deksripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataParam as $model)
                        <tr class="success">
                            <td>{{ $model['nama_model'] }}</td>
                            <td>{{ $model['nama_model_detail'] }}</td>
                            <td>{{ $model['banyaknya'] }}</td>
                            
                            <td>Rp. {{ number_format($model['ongkos_jahit'] ,2,',','.')}}</td>
                            <td>
                                @if ($model['file_gambar'])
                                <button type = "button" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;">
                                    <img src="{{ asset('upload_image/file_gambar/'.$model['file_gambar']) }}" width="100px" alt="" data-toggle="modal" href="#detail_{{$model['id']}}">
                                @endif
                                </button>
                                <div class="modal fade" id="detail_{{$model['id']}}" tabindex="-1" role="basic" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">{{ $model['nama_model'] }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('upload_image/file_gambar/'.$model['file_gambar']) }}" width="500px" style="display: block; margin-left: auto; margin-right: auto;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $model['deskripsi_pemesanan'] }}</td>
                            <td>
                                @if (auth()->user()->previledge == "Admin")
                                <a class="btn btn-success btn-xs green-stripe" href="{{ route('transaksi.detail.ukuran.create', $model['id']) }}">Tambah Ukuran</a>
                                <a class="btn btn-primary btn-xs green-stripe" href="{{ route('transaksi.detail.edit', $model['id']) }}">Edit</a>
                                @endif
                            </td>
                            @php
                                $total += ($model['ongkos_jahit'] * $model['banyaknya']);
                            @endphp
                        </tr>
                        @foreach ($model['details'] as $detail)
                        <tr class="active">
                            <td>
                                +
                            </td>
                            <td>
                                    <li>
                                        Tinggi Badan : {{ $detail->tinggi_badan }}
                                    </li>
                                    <li>
                                        Berat Badan : {{ $detail->berat_badan }}
                                    </li>
                                    <li>
                                        Ukuran Baju : {{ $detail->ukuran_baju }}
                                    </li>
                            </td>
                            <td>
                                {{ $detail->jumlah_baju_dengan_ukuran_yg_sama }}
                            </td>
                            <td>
                                <li>Panjang Atasan : {{ $detail->panjang_atasan }}</li>
                                <li>Lingkar Dada : {{ $detail->lingkar_dada }}</li>
                                <li>Lingkar Perut Atasan : {{ $detail->lingkar_perut_atasan }}</li>
                                <li>Lingkar Pinggul Atasan : {{ $detail->lingkar_pinggul_atasan }}</li>
                                <li>Panjang Tangan : {{ $detail->panjang_tangan }}</li>
                                <li>Lingkar Siku : {{ $detail->lingkar_siku }}</li>
                                <li>Lingkar Pergelangan : {{ $detail->lingkar_pergelangan }}</li>
                                <li>Kerah : {{ $detail->kerah }}</li>
                            </td>
                            <td>
                                <li>Ukuran Celana : {{ $detail->ukuran_celana }}</li>
                                <li>Panjang Celana : {{ $detail->panjang_celana }}</li>
                                <li>Lingkar Perut Celana : {{ $detail->lingkar_perut_celana }}</li>
                                <li>Pesak : {{ $detail->pesak }}</li>
                                <li>Lingkar Pinggul Celana : {{ $detail->lingkar_pinggul_celana }}</li>
                                <li>Lingkar Lutut : {{ $detail->lingkar_lutut }}</li>
                                <li>Lingkar Bawah : {{ $detail->lingkar_bawah }}</li>
                            </td>
                            <td>
                                Deskripsi : {{ $detail->deskripsi_ukuran }}
                            </td>
                            <td>
                                @if (auth()->user()->previledge == "Admin")
                                <a class="btn btn-primary btn-xs green-stripe" href="{{ route('transaksi.edit.detail.ukuran', $detail->id) }}">Edit</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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
    {{-- <div class="portlet-body form">
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
    </div> --}}
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
                @if (auth()->user()->previledge == "Admin")
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Bayar</label>
                        <input type="number" id="bayar" name="bayar" class="form-control" placeholder="Bayar" value="{{ $data->bayar }}">
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
                                <select class="form-control input-sm" id="bahan_baku_id" name="bahan_baku_id" required>
                                    <option value="">Pilih Bahan Baku</option>
                                    @foreach ($bahanBaku as $bb)
                                        <option value="{{ $bb->id }}">{{ $bb->kode_bahan_baku }} - {{ $bb->nama_bahanbaku }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> <br>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Pilih Detail Model</label>
                            <div class="col-md-9">
                                <select class="form-control input-sm" id="detail_pemesanan_model_id" name="detail_pemesanan_model_id" required>
                                    <option value="">Pilih Pilih Detail Model</option>
                                    @foreach ($dataModelDetail as $bb)
                                        <option value="{{ $bb->id }}">{{ $bb->nama_model }} - {{ $bb->nama_model_detail }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ongkos</label>
                            <div class="col-md-9"> --}}
                                <input type="hidden" class="form-control" id="ongkos_jahit" name="ongkos_jahit" placeholder="Ongkos">
                            {{-- </div>
                        </div>
                    </div> --}}
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
