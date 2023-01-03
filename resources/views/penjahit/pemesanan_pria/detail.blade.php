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
<li>
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
        <li>
            <a href="{{route('pembelians.index')}}">
            Daftar Pembelian Bahan Baku</a>
        </li>
    </ul>
</li>
<li class = "active">
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
        <li class = "active">
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
    Pemesanan Pria &nbsp;&nbsp;
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pemesananprias.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('pemesananprias.index')}}">Pemesanan Pria</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('pemesananprias.show', $data->id) }}">{{ $data->modelBaju->nama_model }}</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> {{ $data->modelBaju->nama_model }} ( {{ $data->pelanggan->nama_pelanggan }} )
			</div>
		</div>
		<div class="portlet-body form">
			<form >
                <img src="{{ asset('storage/'.$data->gambar) }}" style="width: 30%; display: block; margin-left: auto; margin-right: auto;" alt=""/><br>
                <table class="table">
                    <tr>
                        <td colspan="2"> </td>
                    </tr>
                    <th colspan="2" style="text-align: center">
                        Detail Model
                    </th>
                    <tr>
                        <th>Gambar</th>
                        <td>
                        @if ($data->modelBaju->foto_model)
                        <button type="button" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;">
                            <img src="{{ asset('storage/'.$data->modelBaju->foto_model) }}" style="max-height:200px" alt="" data-toggle="modal" href="#detail_{{$data->id}}">
                        @endif
                        </button>
                        <div class="modal fade" id="detail_{{$data->id}}" tabindex="-1" role="basic" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">{{ $data->modelBaju->nama_model }}</h4>
                                    </div>
                                    <div class="modal-body">
                                    <img src="{{ asset('storage/'.$data->modelBaju->foto_model) }}" style="width: 60%; display: block; margin-left: auto; margin-right: auto;" alt=""/>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </td>
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah Pemesanan</th>
                        <td>{{ $data->jumlah }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"> </td>
                    </tr>
                    <th colspan="2" style="text-align: center">
                        Detail Baju
                    </th>
                    <tr>
                        <th>Ukuran baju</th>
                        <td>{{ $data->ukuran_baju }}</td>
                    </tr>
                    <tr>
                        <th>Panjang Jas</th>
                        <td>{{ $data->panjang_jas }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Dada</th>
                        <td>{{ $data->lingkar_dada }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Pinggang</th>
                        <td>{{ $data->lingkar_pinggang }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Pinggul</th>
                        <td>{{ $data->lingkar_pinggul }}</td>
                    </tr>
                    <tr>
                        <th>Lebar Bahu</th>
                        <td>{{ $data->lebar_bahu }}</td>
                    </tr>
                    <tr>
                        <th>Lebar Punggung</th>
                        <td>{{ $data->lebar_pungung }}</td>
                    </tr>
                    <tr>
                        <th>Panjang Lengan</th>
                        <td>{{ $data->panjang_lengan }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Siku</th>
                        <td>{{ $data->lingkar_siku }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Ujung Lengan</th>
                        <td>{{ $data->lingkar_ujung_lengan }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Kerong Lengan</th>
                        <td>{{ $data->lingkar_kerong_lengan }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"> </td>
                    </tr>
                    <th colspan="2" style="text-align: center">
                        Detail Celana
                    </th>
                    <tr>
                        <th>Panjang Celana</th>
                        <td>{{ $data->panjang_celana }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Perut</th>
                        <td>{{ $data->lingkar_perut }}</td>
                    </tr>
                    <tr>
                        <th>Pesak</th>
                        <td>{{ $data->pesak }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Paha</th>
                        <td>{{ $data->lingkar_paha }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Lutut</th>
                        <td>{{ $data->lingkar_lutut }}</td>
                    </tr>
                    <tr>
                        <th>Lingkar Kaki</th>
                        <td>{{ $data->lingkar_kaki }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"> </td>
                    </tr>
                    <th colspan="2" style="text-align: center">
                        Detail Lain-lain
                    </th>
                    <tr>
                        <th>Deskripsi Tambahan</th>
                        <td>{{ $data->deskripsi_pesanan }}</td>
                    </tr>

                </table>
            </form>
		</div>
	</div>
</div>
@endsection
