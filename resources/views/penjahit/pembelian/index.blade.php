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
<li >
    <a href="{{url('/')}}">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    </a>
</li>
<li class="active ">
    <a href="javascript:;">
    <i class="icon-puzzle"></i>
    <span class="title">Bahan Baku</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
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
        <li class = "active">
            <a href="{{route('pembelians.index')}}">
            Transaksi Bahan Baku</a>
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
    Transaksi Bahan Baku &nbsp;&nbsp;
    <a type= "button" href="{{route('bahanbakus.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH TRANSAKSI
    </a>
    <a class="btn btn-primary" data-toggle="modal" href="#basic"
				 onclick="addForm()"> + TAMBAH TRANSAKSI</a>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bahanbakus.index')}}">Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table" id="sample_1">
<thead>
    <tr>
    <!-- <th>ID</th> -->
    <th>Tanggal</th>
    <th>Supplier</th>
    <th>Total Harga</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
   
</tbody>
</table>
@includeIf('penjahit.pembelian.supplier')
@endsection

@section('footer')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {    
	//plugin datatable
	$('#sample_1').DataTable();
});
</script>


@stop