@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Laporan Tertanggung &nbsp;&nbsp;
    {{-- <a type= "button" href="{{route('daftar-progres.create')}}" class="btn btn-primary btn-sm">
        + Tambah Laporan Tertanggung
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
            <a href="{{route('daftar-progres.index')}}">Laporan Tertanggung</a>
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
<table class="table" id="sample_1" class="display">
    <thead>
        <tr>
        <!-- <th>ID</th> -->
        <th>Pelanggan</th>
        <th>Model</th>
        <th>Tanggal Selesai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($viewTanggunanPesanan as $d)
        <?php $total=0 ?>
        <tr>
            <td>{{ $d->nama_pelanggan }}</td>
            <td>{{ $d->nama_model }}</td>
            <td>{{ $d->tanggal_selesai }}</td>
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
