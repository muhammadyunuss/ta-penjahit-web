@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Informasi Ukuran &nbsp;&nbsp;
    {{-- <a type= "button" href="{{route('informasiukuran.create')}}" class="btn btn-primary btn-sm">
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
            <a href="{{route('informasiukuran.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('informasiukuran.index')}}">Informasi Ukuran</a>
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

<div class="alert alert-default">
    <form method="POST" action="">
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Informasi Ukuran</label>
            <div class="col-md-10">
                <select name="s_pemesanan_model_id" id="s_pemesanan_model_id" data-with="100%" class="form-control select2me @error('s_pemesanan_model_id') is-invalid @enderror">
                    <option value="">Pilih Informasi Ukuran</option>
                    @foreach($viewTransaksiPemesanan as $p)
                        <option value="{{ $p->detail_pemesanan_model_id }}" {{ old('s_pemesanan_model_id', $id) == $p->detail_pemesanan_model_id ? 'selected' : null }}>Pelanggan : {{ $p->nama_pelanggan }} | Estimasi Selesai : {{ $p->tanggal }} | Nama Model : {{ $p->nama_model }} | Nama Model Detail : {{ $p->nama_model_detail }} | Jumlah : {{ $p->jumlah }} {{ $p->satuan }}</option>
                    @endforeach
                </select>
                @error('s_pemesanan_model_id')
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
<table class="table"  id="sample_1">
<thead>
    <tr>
    <!-- <th>ID</th> -->
    <th>Nama Model</th>
    <th>Nama Pelanggan</th>
    <th>Ukuran Baju</th>
    <th>Deskripsi</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->nama_model }}</td>
    <td>{{ $d->nama_pelanggan }}</td>
    <td>{{ $d->ukuran_baju }}</td>
    <td>{{ $d->deskripsi_ukuran }}</td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('informasiukuran.show', $d->id_ukuran) }}'" type="button" class="btn btn-light">Lihat</button>
            </li>
            {{-- <li>
                <form method="POST" action="{{route('informasiukuran.destroy' , $d->id)}}">
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
    $('#s_pemesanan_model_id').on('change', function() {
        let id_pemesanan_model = $(this).val();
        let url = id_pemesanan_model? '{{ route("informasiukuran.index") }}?id='+id_pemesanan_model : '{{ route("informasiukuran.index") }}'
        $('#btn-search').attr('href', url);

    });
});
</script>
@stop
