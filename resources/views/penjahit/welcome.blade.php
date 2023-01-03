@extends('penjahit.layout.conquer')

@section('left_sidebar')
<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="sidebar-search-wrapper">
    <form class="search-form" role="form" action="index.html" method="get">
        <div class="input-icon right">
            <i class="icon-magnifier"></i>
            <input type="text" class="form-control" name="query" placeholder="Search...">
        </div>
    </form>
</li>
<li class="start active ">
    <a href="{{url('/')}}">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    <span class="selected"></span>
    </a>
</li>
<li>
    <a href="javascript:;">
    <i class="icon-puzzle"></i>
    <span class="title">Bahan Baku</span>
    <span class="selected"></span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('suppliers.index')}}">
            Supplier</a>
        </li>
        <li>
            <a href="{{route('bahanbakus.index')}}">
            Sediaan Bahan Baku</a>
        </li>
        <li>
            <a href="{{route('pembelians.index')}}">
            Daftar Pembelian Bahan Baku</a>
        </li>
    </ul>
</li>
<li >
    <a href="javascript:;">
    <i class="icon-briefcase"></i>
    <span class="title">Pemesanan</span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('pelanggans.index')}}">
            Pelanggan</a>
        </li>
        <li>
            <a href="{{route('modelandas.index')}}">
            Model Anda</a>
        </li>
        <li>
            <a href="{{route('modelpelanggans.index')}}">
            Model Pelanggan</a>
        </li>
        <li>
            <a href="{{route('transaksis.index')}}">
            Transaksi Pemesanan</a>
        </li>
        <li>
            <a href="{{route('pemesananprias.index')}}">
            Ukuran Pria</a>
        </li>
        <li>
            <a href="{{route('pemesananwanitas.index')}}">
            Ukuran Wanita</a>
        </li>
    </ul>
</li>
<li >
    <a href="javascript:;">
    <i class="icon-present"></i>
    <span class="title">Produksi</span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="#">
            Daftar Progres</a>
        </li>
        <li>
            <a href="#">
            Jadwal Progres</a>
        </li>
        <li>
            <a href="#">
            Penggunaan Bahan Baku</a>
        </li>
        <li>
            <a href="#">
            Realisasi Progres</a>
        </li>
    </ul>
</li>
@endsection

@section('konten')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Dashboard <small>statistics and more</small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

@endsection
