@extends('layouts.layout')

@section('content')
<h3 class="page-title">
   Informasi Ukuran
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('ukuranpria.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('ukuranpria.create') }}">Informasi Ukuran</a>
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
    <div class="tab-pane" id="tab_1_11">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
                <tr>
                    <th>
                        <h4 class="control-label"><strong>Detail Pemesanan</strong></h4>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            Model
                        </td>
                        <td>
                            {{ $dataModelDetail->nama_model }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jenis Model
                        </td>
                        <td>
                            {{ $dataModelDetail->nama_jenismodel }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Stok
                        </td>
                        <td>
                            {{ $dataModelDetail->banyaknya }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ongkos Jahit
                        </td>
                        <td>
                            {{ $dataModelDetail->ongkos_jahit }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Keterangan
                        </td>
                        <td>
                            {{ $dataModelDetail->deskripsi_pemesanan }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="tab-pane" id="tab_1_11">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
                <tr>
                    <th>
                        <h4 class="control-label"><strong>Ukuran Badan</strong></h4>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            Tinggi Badan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->tinggi_badan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Berat Badan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->berat_badan }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="tab-pane" id="tab_1_11">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
                <tr>
                    <th>
                        <h4 class="control-label"><strong>Ukuran Baju Atasan</strong></h4>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            Ukuran Baju
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->ukuran_baju }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Panjang Atasan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->panjang_atasan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Dada
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_dada }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Perut Atasan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_perut_atasan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Pinggul Atasan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_pinggul_atasan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lebar Bahu
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lebar_bahu }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lebar Bahu
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lebar_bahu }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Panjang Tangan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->panjang_tangan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Siku
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_siku }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Pergelangan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_pergelangan }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kerah
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->kerah }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="tab-pane" id="tab_1_11">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
                <tr>
                    <th>
                        <h4 class="control-label"><strong>Ukuran Celana</strong></h4>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            Ukuran Celana
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->ukuran_celana }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Panjang Celana
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->panjang_celana }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Perut Celana
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_perut_celana }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Pesak
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->pesak }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Pinggul Celana
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_pinggul_celana }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Paha
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_paha }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Lutut
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_lutut }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Lingkar Bawah
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->lingkar_bawah }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="tab-pane" id="tab_1_11">
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-advance table-hover">
            <thead>
                <tr>
                    <th>
                        <h4 class="control-label"><strong>Deskripsi</strong></h4>
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td>
                            Keterangan
                        </td>
                        <td>
                            {{ $dataModelDetailUkuran->deskripsi_ukuran }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

<!-- https://blog.quickadminpanel.com/master-detail-form-in-laravel-jquery-create-order-with-products/ -->
@section('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@stop
