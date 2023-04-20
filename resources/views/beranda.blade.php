@extends('layouts.layout')
@section('content')
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                 Widget settings form goes here
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- BEGIN STYLE CUSTOMIZER -->
<div class="theme-panel hidden-xs hidden-sm">
    <div class="toggler">
        <i class="fa fa-gear"></i>
    </div>
    <div class="theme-options">
        <div class="theme-option theme-colors clearfix">
            <span>
            Theme Color </span>
            <ul>
                <li class="color-black current color-default tooltips" data-style="default" data-original-title="Default">
                </li>
                <li class="color-grey tooltips" data-style="grey" data-original-title="Grey">
                </li>
                <li class="color-blue tooltips" data-style="blue" data-original-title="Blue">
                </li>
                <li class="color-red tooltips" data-style="red" data-original-title="Red">
                </li>
                <li class="color-light tooltips" data-style="light" data-original-title="Light">
                </li>
            </ul>
        </div>
        <div class="theme-option">
            <span>
            Layout </span>
            <select class="layout-option form-control input-small">
                <option value="fluid" selected="selected">Fluid</option>
                <option value="boxed">Boxed</option>
            </select>
        </div>
        <div class="theme-option">
            <span>
            Header </span>
            <select class="header-option form-control input-small">
                <option value="fixed" selected="selected">Fixed</option>
                <option value="default">Default</option>
            </select>
        </div>
        <div class="theme-option">
            <span>
            Sidebar </span>
            <select class="sidebar-option form-control input-small">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
        <div class="theme-option">
            <span>
            Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-small">
                <option value="left" selected="selected">Left</option>
                <option value="right">Right</option>
            </select>
        </div>
        <div class="theme-option">
            <span>
            Footer </span>
            <select class="footer-option form-control input-small">
                <option value="fixed">Fixed</option>
                <option value="default" selected="selected">Default</option>
            </select>
        </div>
    </div>
</div>
<!-- END BEGIN STYLE CUSTOMIZER -->
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
Dashboard
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
    {{-- <div class="page-toolbar">
        <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height btn-primary" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
            <i class="icon-calendar"></i>&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp; <i class="fa fa-angle-down"></i>
        </div>
    </div> --}}
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN OVERVIEW STATISTIC BARS-->
<div class="row stats-overview-cont">
    <div class="col-md-2 col-sm-4">
        <div class="stats-overview stat-block">
            <div class="details">
                <div class="title">
                    Total Transaksi Pembelian Bahan Baku
                </div>
                <div class="numbers">
                    {{ $transaksi_pembelian }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="stats-overview stat-block">
            <div class="details">
                <div class="title">
                    Pembelian Bahan Baku Belum Dibayar
                </div>
                <div class="numbers">
                     {{ $transaksi_belum_dibayar }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="stats-overview stat-block">
            <div class="details">
                <div class="title">
                    Total Transaksi Pemesanan Jasa Jahit
                </div>
                <div class="numbers">
                     {{ $transaksi_pemesanan }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4">
        <div class="stats-overview stat-block">
            <div class="details">
                <div class="title">
                     Total Pengiriman
                </div>
                <div class="numbers">
                    {{ $jumlah_pesanan_telah_dikirim }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-2 col-sm-4">
        <div class="stats-overview stat-block">
            <div class="details">
                <div class="title">
                     Pengiriman Perlu Di Proses
                </div>
                <div class="numbers">

                </div>
            </div>
        </div>
    </div> --}}
</div>
<!-- END OVERVIEW STATISTIC BARS-->
<div class="clearfix">
</div>
<div class="col-md-6 col-sm-4">
    <h3>Kain yang harus dibeli</h3>
    <table class="table" id="example" class="display">
        <thead>
            <tr>
            <th>Nama Bahan Baku</th>
            <th>Sisa Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock_bahan_baku as $d)
            <tr>
                <td>{{ $d->nama_bahanbaku }}</td>
                <td>{{ $d->stok }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
<div class="col-md-6 col-sm-4">
    <h3>Pemberitahuan ! Deadline Terdekat</h3>
    <table class="table" id="example1" class="display">
        <thead>
            <tr>
            <th>Nama Pelanggan</th>
            <th>Estimasi Selesai (H-5)</th>
            <th>Nama Model</th>
            <th>Model Detail</th>
            <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi_selesai as $d)
            <tr>
                <td>{{ $d->nama_pelanggan }}</td>
                <td>{{ $d->realisasi_tanggal_selesai }}</td>
                <td>{{ $d->nama_model }}</td>
                <td>{{ $d->nama_model_detail }}</td>
                <td>{{ $d->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
<div class="clearfix">
</div>
<div class="row ">

</div>
<div class="clearfix">
</div>
<div class="row ">

</div>
<div class="clearfix">
</div>
<!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
<div class="row">

</div>
<!-- END OVERVIEW STATISTIC BLOCKS-->
<div class="clearfix">
</div>
<div class="row ">

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $(document).ready(function () {
        $('#example1').DataTable();
    });
</script>
@endsection
