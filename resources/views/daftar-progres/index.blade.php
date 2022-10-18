@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Progres &nbsp;&nbsp;
    <a type= "button" href="{{route('daftar-progres.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH DAFTAR PROGRES
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
            <a href="{{route('daftar-progres.index')}}">Supplier</a>
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

<div class="alert alert-default">
    <form method="POST" action="">
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label">Nama Penjahit</label>
        <div class="col-md-10">
            <select name="s_pemesanan_id" id="s_pemesanan_id" data-with="100%" class="form-control @error('s_pemesanan_id') is-invalid @enderror">
                <option value="">== Pilih Nama Penjahit ==</option>
                @foreach($pemesanan as $p)
                    <option value="{{ $p->id }}" {{ old('s_pemesanan_id', $id) == $p->id ? 'selected' : null }}>{{ $p->nama_pelanggan }} | {{ $p->tanggal }}</option>
                @endforeach
            </select>
            @error('s_pemesanan_id')
                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-2">
            <a href="" id="btn-search" class="btn btn-info">Search</a>
        </div>
    </div>
   </form>
</div>
<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<table class="table" id="sample_1">
<thead>
    <tr>
    <th>No</th>
    <th>Nama Progres</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @php
        $no = 1;
    @endphp
    @foreach($data as $d)
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $d->nama_prosesproduksi }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('daftar-progres.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('daftar-progres.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin akan menghapus data daftar progres yang berkaitan?')) {return false;}">
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
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script>
jQuery(document).ready(function() {
	//plugin datatable
	$('#sample_1').DataTable();
    $('#s_pemesanan_id').on('change', function() {
        let id_pemesanan = $(this).val();
        let url = id_pemesanan? '{{ route("daftar-progres.index") }}?id='+id_pemesanan : '{{ route("daftar-progres.index") }}'
        $('#btn-search').attr('href', url);

    });
});
</script>
@stop
