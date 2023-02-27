@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Kolom Rak &nbsp;&nbsp;
    @if (auth()->user()->previledge == "Admin")
        <a type= "button" href="{{route('kolomrak.create')}}" class="btn btn-primary btn-sm">
            + Tambah Kolom Rak
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
            <a href="{{route('kolomrak.index')}}">Kolom Rak</a>
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
    <th>Nama Rak</th>
    <th>Nama Kolom</th>
    @if (auth()->user()->previledge == "Admin")
    <th>Aksi</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->nama_rak }}</td>
    <td>{{ $d->nama_kolom }}</td>
    @if (auth()->user()->previledge == "Admin")
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('kolomrak.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('kolomrak.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin akan menghapus data supplier dan data sediaan bahan baku yang berkaitan?')) {return false;}">
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
