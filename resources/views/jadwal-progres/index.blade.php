@extends('layouts.layout')

@section('content')

<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Jadwal Progres &nbsp;&nbsp;
    @if (auth()->user()->previledge == "Admin")
    <a type= "button" href="{{route('jadwal-progres.create')}}" class="btn btn-primary btn-sm">
        + TAMBAH JADWAL PROGRES
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
            <a href="{{route('jadwal-progres.index')}}">Jadwal Progres</a>
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
                <select name="s_pemesanan_id" id="s_pemesanan_id" data-with="100%" class="form-control select2me @error('s_pemesanan_id') is-invalid @enderror">
                    <option value="">Pilih Nama Pemesanan</option>
                    @foreach($viewTransaksiPemesanan as $p)
                        <option value="{{ $p->detail_pemesanan_model_id }}" {{ old('s_pemesanan_id', $id) == $p->detail_pemesanan_model_id ? 'selected' : null }}>Pelanggan : {{ $p->nama_pelanggan }} | Estimasi Selesai : {{ $p->tanggal }} | Nama Model : {{ $p->nama_model }} | Nama Model Detail : {{ $p->nama_model_detail }} | Jumlah : {{ $p->jumlah }} {{ $p->satuan }}</option>
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
    <th>Nama Progres</th>
    <th>Tanggal Mulai</th>
    <th>Tanggal Selesai</th>
    <th>Penanggung Jawab</th>
    @if (auth()->user()->previledge == "Admin")
    <th>Aksi</th>
    @endif
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>{{ $d->nama_prosesproduksi }}</td>
    <td>{{ $d->tanggal_mulai }}</td>
    <td>{{ $d->tanggal_selesai }}</td>
    <td>{{ $d->nama_kepalapenjahit }}</td>
    @if (auth()->user()->previledge == "Admin")
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('jadwal-progres.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('jadwal-progres.destroy' , $d->id)}}">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                    onclick="if(!confirm('Apakah Anda yakin akan menghapus data jadwal progres?')) {return false;}">
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
    $('#s_pemesanan_id').on('change', function() {
        let id_pemesanan = $(this).val();
        let url = id_pemesanan? '{{ route("jadwal-progres.index") }}?id='+id_pemesanan : '{{ route("jadwal-progres.index") }}'
        $('#btn-search').attr('href', url);

    });
});
</script>

@stop
