@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pengunaan Bahan Baku &nbsp;&nbsp;
    <a type= "button" href="{{route('peng-bahan-baku.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH PENGGUNAAN BAHAN BAKU
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
            <a href="{{route('peng-bahan-baku.index')}}">Pengunaan Bahan Baku</a>
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
            <label for="name" class="col-md-4 col-form-label">Nama Pemesanan</label>
            <div class="col-md-10">
                <select name="s_pemesanan_id" id="s_pemesanan_id" data-with="100%" class="form-control @error('s_pemesanan_id') is-invalid @enderror">
                    <option value="">Pilih Nama Pemesanan</option>
                    @foreach($viewTransaksiPemesanan as $p)
                        <option value="{{ $p->detail_pemesanan_model_id }}" {{ old('s_pemesanan_id', $id) == $p->detail_pemesanan_model_id ? 'selected' : null }}>Pelanggan : {{ $p->nama_pelanggan }} | Tanggal : {{ $p->tanggal }} | Jenis Model : {{ $p->jenis_model }} | Jumlah : {{ $p->jumlah }} {{ $p->satuan }}</option>
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
    <!-- <th>ID</th> -->
    <th>Nama Bahan Baku</th>
    <th>Jumlah Terpakai</th>
    {{-- <th>Stock</th> --}}
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->nama_bahanbaku }}</td>
    <td>{{ $d->jumlah_terpakai }}</td>
    {{-- <td>{{ $d->stok }} {{ $d->satuan }}</td> --}}
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('peng-bahan-baku.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('peng-bahan-baku.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin akan menghapus data jadwal-progres dan data sediaan bahan baku yang berkaitan?')) {return false;}">
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
        let url = id_pemesanan? '{{ route("peng-bahan-baku.index") }}?id='+id_pemesanan : '{{ route("peng-bahan-baku.index") }}'
        $('#btn-search').attr('href', url);

    });
});
</script>
@stop
