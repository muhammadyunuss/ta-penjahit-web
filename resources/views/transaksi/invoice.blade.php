@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Nota
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
            {{-- <a href="{{ route('transaksi.show', $data->id) }}">Nota</a> --}}
        </li>
    </ul>
</div>

<div class="invoice">
    <div class="row invoice-logo">
        <div class="col-xs-6 invoice-logo-space">
            <img src="{{ asset('assets/img/invoice/walmart.png')}}" alt=""/>
        </div>
        <div class="col-xs-6">

        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-4">
            <h4>Pelanggan</h4>
            <ul class="list-unstyled">
                {{-- <li>
                    <strong>Nama:</strong> {{ $data->pelanggan->nama_pelanggan }}
                </li>
                <li>
                    <strong>Alamat:</strong> {{ $data->pelanggan->alamat_rumah }}
                </li>
                <li>
                    <strong>No. Telepon:</strong> {{ $data->pelanggan->no_telepon }}
                </li> --}}

            </ul>
        </div>
        <div class="col-xs-2">

        </div>
        <div class="col-xs-4 invoice-payment">
            <h4>Detail Pembayaran</h4>
            <ul class="list-unstyled">
                {{-- <li>
                    <strong>Tanggal Masuk:</strong> {{ $data->created_at }}
                </li>
                <li>
                    <strong>Tanggal Keluar:</strong> {{ $data->tanggal_keluar }}
                </li>
                <li>
                    <strong>Status Pembayaran:</strong> {{ $data->status_pembayaran }}
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                        Jumlah
                </th>
                <th>
                        Nama Model
                </th>
                <th class="hidden-480">
                        Total Tagihan
                </th>
            </tr>
            </thead>
            <tbody>
            {{-- @foreach($data->modelBajus as $m) --}}
            <tr>
                {{-- <td>
                    {{ $m->model->jumlah }}
                </td>
                <td>
                    {{ $m->nama_model }}
                </td>
                <td class="hidden-480">
                        Server hardware purchase
                </td> --}}

            </tr>
            {{-- @endforeach --}}
            </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <div class="well">
                <address>
                <strong>Loop, Inc.</strong><br/>
                795 Park Ave, Suite 120<br/>
                San Francisco, CA 94107<br/>
                <abbr title="Phone">P:</abbr> (234) 145-1810 </address>
                <address>
                <strong>Full Name</strong><br/>
                <a href="mailto:#">first.last@email.com</a>
                </address>
            </div>
        </div>
        <div class="col-xs-8 invoice-block">
            <ul class="list-unstyled amounts">
                <li>
                    <strong>Sub - Total amount:</strong> $9265
                </li>
                <li>
                    <strong>Discount:</strong> 12.9%
                </li>
                <li>
                    <strong>VAT:</strong> -----
                </li>
                <li>
                    <strong>Grand Total:</strong> $12489
                </li>
            </ul>
            <br/>
            <a class="btn btn-lg btn-info hidden-print" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></a>
            <a class="btn btn-lg btn-success hidden-print">Submit Your Invoice <i class="fa fa-check"></i></a>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection