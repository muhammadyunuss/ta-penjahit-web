@extends('layouts.layout')

@section('content')
<h3 class="page-title">
   Ukuran Pria
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
            <a href="{{ route('ukuranpria.create') }}">Ukuran Pria</a>
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
                     List
                </th>
                <th>
                    Keterangan
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
                    Tinggi Badan
                </td>
                <td>
                    {{ $dataModelDetail->tinggi_badan }}
                </td>
            </tr>
            <tr>
                <td>
                    Berat Badan
                </td>
                <td>
                    {{ $dataModelDetail->berat_badan }}
                </td>
            </tr>
            <tr>
                <td>
                    Ukuran Baju
                </td>
                <td>
                    {{ $dataModelDetail->ukuran_baju }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Jas
                </td>
                <td>
                    {{ $dataModelDetail->panjang_jas }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Dada
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_dada }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Pinggan
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_pinggang }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Pinggul
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_pinggul }}
                </td>
            </tr>
            <tr>
                <td>
                    Lebar Bahu
                </td>
                <td>
                    {{ $dataModelDetail->lebar_bahu }}
                </td>
            </tr>
            <tr>
                <td>
                    Lebar Punggung
                </td>
                <td>
                    {{ $dataModelDetail->lebar_punggung }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Lengan
                </td>
                <td>
                    {{ $dataModelDetail->panjang_lengan }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Siku
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_siku }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Ujung Lengan
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_ujung_lengan }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Kerong Lengan
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_kerong_lengan }}
                </td>
            </tr>
            <tr>
                <td>
                    Ukuran Celana
                </td>
                <td>
                    {{ $dataModelDetail->ukuran_celana }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Celana
                </td>
                <td>
                    {{ $dataModelDetail->panjang_celana }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Parut
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_parut }}
                </td>
            </tr>
            <tr>
                <td>
                    Pesak
                </td>
                <td>
                    {{ $dataModelDetail->pesak }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Paha
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_paha }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Lutut
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_lutut }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Kaki
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_kaki }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Kebaya
                </td>
                <td>
                    {{ $dataModelDetail->panjang_kebaya }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Dress
                </td>
                <td>
                    {{ $dataModelDetail->panjang_dress }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Muka
                </td>
                <td>
                    {{ $dataModelDetail->panjang_muka }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Belakang
                </td>
                <td>
                    {{ $dataModelDetail->panjang_belakang }}
                </td>
            </tr>
            <tr>
                <td>
                   Bawah Tangan
                </td>
                <td>
                    {{ $dataModelDetail->bawah_tangan }}
                </td>
            </tr>
            <tr>
                <td>
                    Lingkar Leher
                </td>
                <td>
                    {{ $dataModelDetail->lingkar_leher }}
                </td>
            </tr>
            <tr>
                <td>
                    Cup Dada
                </td>
                <td>
                    {{ $dataModelDetail->cup_dada }}
                </td>
            </tr>
            <tr>
                <td>
                    Turun Dada
                </td>
                <td>
                    {{ $dataModelDetail->turun_dada }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Rok
                </td>
                <td>
                    {{ $dataModelDetail->panjang_rok }}
                </td>
            </tr>
            <tr>
                <td>
                    Panjang Bawah
                </td>
                <td>
                    {{ $dataModelDetail->panjang_bawah }}
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

@endsection

<!-- https://blog.quickadminpanel.com/master-detail-form-in-laravel-jquery-create-order-with-products/ -->
@section('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@stop
