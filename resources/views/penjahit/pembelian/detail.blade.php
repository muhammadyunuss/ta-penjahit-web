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
    Daftar Pembelian Bahan Baku &nbsp;&nbsp;
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

<div class="form-body">
    <div class="form-group row" >
        <label for="nama" class="col-md-2 col-form-label">Nama:</label>
        <div class="col-md-4">
            <label for="name" class="col-md-4 col-form-label">{{ $supplier->nama_supplier }}</label>
        </div>
    </div>
    <div class="form-group row" >
        <label for="email" class="col-md-2 col-form-label">Email:</label>
        <div class="col-md-4">
            <label for="name" class="col-md-4 col-form-label">{{ $supplier->email }}</label>
        </div>
    </div>
    <div class="form-group row" >
        <label for="noTelp" class="col-md-2 col-form-label">No. Telepon:</label>
        <div class="col-md-4">
            <label for="name" class="col-md-4 col-form-label">{{ $supplier->no_telepon }}</label>
        </div>
    </div>
</div>

<div class="form-body">
    <form class="form-bahanbaku">
        @csrf
        <div class="form-group row" >
            <label for="nama_bahanbaku" class="col-lg-2">Bahan Baku:</label>
            <div class = "col-lg-5">
                <div class="input-group">
                    <input name="pembelian_id" id="pembelian_id" value="{{ $pembelian_id }}">
                    <input name="id" id="id">
                    <input type="text" class="form-control" name="nama_bahanbaku" id="nama_bahanbaku">
                    <span class="input-group-btn">
                        <button data-toggle="modal" href="#basic" onClick="tampilBahanBaku()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table table-pembelian" >
<thead>
    <tr>
        <!-- <th>ID</th> -->
        <th>Nama Bahan Baku</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Subtotal</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>

</tbody>
</table>
@includeIf('penjahit.pembelian.bahanbaku')
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
jQuery(document).ready(function() {
    //plugin datatable
        // $('#sample_1').DataTable();
    }
);
</script>
@stop
