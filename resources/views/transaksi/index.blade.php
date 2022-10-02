@extends('layouts.layout')

@section('styles')
@endsection

@section('content')
<h3 class="page-title">
    Transaksi &nbsp;&nbsp;
    <a type= "button" href="{{route('transaksi.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH TRANSAKSI
    </a>
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

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table" id="example" class="display">
<thead>
    <tr>
    <!-- <th>ID</th> -->
    <th>Pelanggan</th>
    <th>Tanggal</th>
    <th>Produk</th>
    <th>Total</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <?php $total=0 ?>
    <tr>
        <td>{{ $d->nama_pelanggan }}</td>
        <td>{{ $d->tanggal }}</td>
        <td>

        </td>
        <td>{{ $total }}</td>
        <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('transaksi.show', $d->id) }}'" type="button" class="btn btn-default">Detail</button>
            </li>
            {{-- <li >
                <button onclick="window.location='{{ route('transaksi.detail.create', $d->id) }}'" type="button" class="btn btn-info">Tambah Pemesanan</button>
            </li> --}}
            <li >
                <button onclick="window.location='{{ route('transaksi.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('transaksi.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                </form>
            </li>
        </ul>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection
