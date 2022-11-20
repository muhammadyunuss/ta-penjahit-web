@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Ukuran Pria &nbsp;&nbsp;
    {{-- <a type= "button" href="{{route('ukuranpria.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH PELANGGAN
    </a> --}}
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
            <a href="{{route('ukuranpria.index')}}">Ukuran Pria</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if (session('statushapus'))
<div class="alert alert-danger">
    {{ session('statushapus') }}
</div>
@endif

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table"  id="sample_1">
<thead>
    <tr>
    <!-- <th>ID</th> -->
    <th>Nama Model</th>
    <th>Nama Pelanggan</th>
    <th>Ongkos Jahit</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->nama_model }}</td>
    <td>{{ $d->nama_pelanggan }}</td>
    <td>{{ $d->ongkos_jahit }}</td>
    <td>{{ $d->deskripsi_model }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('ukuranpria.show', $d->id) }}'" type="button" class="btn btn-light">Lihat</button>
            </li>
            {{-- <li>
                <form method="POST" action="{{route('ukuranpria.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                </form>
            </li> --}}
        </ul>
    </td>
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
