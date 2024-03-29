@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Sediaan Bahan Baku &nbsp;&nbsp;
    @if (auth()->user()->previledge == "Admin")
    <a type= "button" href="{{route('bahanbaku.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH SEDIAAN BAHAN BAKU
    </a>
    @endif
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bahanbaku.index')}}">Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bahanbaku.index')}}">Sediaan Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

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
<table class="table" id="sample_1">
<thead>
    <tr>
    <th>Foto</th>
    <th>Kode</th>
    <th>Nama</th>
    <th>Letak</th>
    <th>Harga Beli</th>
    {{-- <th>Harga Jual</th> --}}
    <th>Stok</th>
    <th>Supplier</th>
    <th>Lebar</th>
    <th>Warna Kain</th>
    @if (auth()->user()->previledge == "Admin")
    <th>Aksi</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>
        @if ($d->foto_bahanbaku)
        <button type = "button" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;">
            <img src="{{ asset('upload_image/foto_bahanbaku/'.$d->foto_bahanbaku) }}" width="100px" alt="" data-toggle="modal" href="#detail_{{$d->id}}">
        @endif
        </button>
        <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">{{ $d->nama_bahanbaku }}</h4>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('upload_image/foto_bahanbaku/'.$d->foto_bahanbaku) }}" width="500px" style="display: block; margin-left: auto; margin-right: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
        </div>
    </td>
    <td>{{ $d->kode_bahan_baku }}</td>
    <td>{{ $d->nama_bahanbaku }}</td>
    <td>{{ $d->nama_rak }} - {{ $d->nama_kolom }}</td>
    <td>{{ $d->harga_beli }}</td>
    {{-- <td>{{ $d->harga_jual }}</td> --}}
    <td>{{ $d->stok }} {{ $d->satuan }}</td>
    <td>{{ $d->nama_supplier }}</td>
    <td>{{ $d->lebar }}</td>
    <td>{{ $d->warna_kain }}</td>
    @if (auth()->user()->previledge == "Admin")
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('bahanbaku.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('bahanbaku.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                </form>
            </li>
        </ul>
    </td>
    @endif
    </tr>
    @endforeach
</tbody>
</table>
@endsection

@section('scripts')
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
