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
            <a href="{{ route('transaksi.show', $data->id) }}">Nota</a>
        </li>
    </ul>
</div>

<div class="invoice">
    <div class="row invoice-logo">
        <div class="col-xs-6 invoice-logo-space">
            <img src="{{ asset('assets/img/invoice/invoice.png')}}" alt=""/>
        </div>
        <div class="col-xs-6">

        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-4">
            <h4>Pelanggan</h4>
            <ul class="list-unstyled">
                <li>
                    <strong>Nama:</strong> {{ $data->nama_pelanggan }}
                </li>
                <li>
                    <strong>Alamat:</strong> {{ $data->alamat_pelanggan }}
                </li>
                <li>
                    <strong>No. Telepon:</strong> {{ $data->no_telepon_pelanggan }}
                </li>

            </ul>
        </div>
        <div class="col-xs-2">

        </div>
        <div class="col-xs-4 invoice-payment">
            <h4>Detail Pembayaran</h4>
            <ul class="list-unstyled">
                <li>
                    <strong>Tanggal Masuk:</strong> {{ $data->created_at }}
                </li>
                <li>
                    <strong>Tanggal Keluar:</strong> {{ $data->tanggal }}
                </li>
                <li>
                    <strong>Status Pembayaran:</strong> {{ $data->status_pembayaran }}
                </li>
            </ul>
        </div>
    </div>
    @php
        $total = 0;
    @endphp
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-bordered table-hover" id="products_table">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Qty</th>
                        <th>Jenis</th>
                        <th>Ongkos Jahit</th>
                        {{-- <th>Deksripsi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataModelDetail as $model)
                    <tr>
                        <td>{{ $model->nama_model }}</td>
                        <td>{{ $model->banyaknya }}</td>
                        <td>{{ $model->nama_jenismodel }}</td>
                        <td>Rp. {{ number_format($model->ongkos_jahit ,2,',','.')}}</td>
                        {{-- <td>{{ $model->deskripsi_pemesanan }}</td> --}}
                        @php
                            $total += $model->ongkos_jahit;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <table class="table table-bordered table-hover" id="products_table">
                <thead>
                    <tr>
                        <th>Nama Bahan Baku</th>
                        <th>Qty</th>
                        <th>Ongkos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailBahanBaku as $model)
                    <tr>
                        <td>{{ $model->nama_bahanbaku }}</td>
                        <td>{{ $model->jumlah_terpakai }}</td>
                        <td>Rp. {{ number_format($model->ongkos_jahit ,2,',','.')}}</td>
                        @php
                            $total += $model->ongkos_jahit;
                        @endphp
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        {{-- <div class="col-xs-4"> --}}
            {{-- <div class="well">

                <address>
                <strong>Penjahit, Inc.</strong><br/>
                795 Park Ave, Suite 120<br/>
                San Francisco, CA 94107<br/>
                <abbr title="Phone">P:</abbr> (234) 145-1810 </address>
                <address>
                <strong>Full Name</strong><br/>
                <a href="mailto:#">first.last@email.com</a>
                </address>
            </div> --}}
        {{-- </div> --}}
        <div class="col-xs-12 invoice-block">
            <div class="well">
                <strong>Total : </strong>
                <span class="">Rp. {{ number_format($total ,2,',','.') }}</span>
                {{-- <li>
                    <strong>Discount:</strong> 12.9%
                </li>
                <li>
                    <strong>VAT:</strong> -----
                </li>
                <li>
                    <strong>Grand Total:</strong> $12489
                </li> --}}
            </div>
            <br/>
            <a class="btn btn-md btn-info hidden-print" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></a>
            {{-- <a class="btn btn-lg btn-success hidden-print">Submit Your Invoice <i class="fa fa-check"></i></a> --}}
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->

@endsection
