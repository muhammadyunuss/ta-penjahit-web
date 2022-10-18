@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Model Pelanggan &nbsp;&nbsp;
    <a href="{{route('modelpelanggan.create')}}" class="btn btn-primary btn-sm">
      + TAMBAH MODEL PELANGGAN
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
            <a href="{{route('modelpelanggan.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('modelpelanggan.index')}}">Model Pelanggan</a>
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

<table class="table"  id="sample_1">
<thead>
    <tr>
    <!-- <th>ID</th> -->
    <th>Gambar</th>
    <th>Nama</th>
    <th>Ongkos Jahit</th>
    <th>Deskripsi</th>
    <th>Jenis</th>
    <th>Pelanggan</th>
    <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $d)
    <tr>
    <td>
        @if ($d->foto_model)
        <button type = "button" style="background-color: Transparent; background-repeat:no-repeat; border: none; cursor:pointer; overflow: hidden;">
            <img src="{{ asset('upload_image/foto_model/'.$d->foto_model) }}" width="100px" alt="" data-toggle="modal" href="#detail_{{$d->id}}">
        @endif
        </button>
        <div class="modal fade" id="detail_{{$d->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">{{ $d->nama_model }}</h4>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('upload_image/foto_model/'.$d->foto_model) }}" width="500px" style="display: block; margin-left: auto; margin-right: auto;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
        </div>
    </td>
    <td>{{ $d->nama_model }}</td>
    <td>{{ $d->ongkos_jahit }}</td>
    <td>{{ $d->deskripsi_model }}</td>
    <td>
        @if($d->jenis_model == 1)
            Pria
        @else
            Wanita
        @endif
    </td>
    <td></td>
    <td>
        <ul class="nav nav-pills">
            <li >
                <button onclick="window.location='{{ route('modelpelanggan.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
            </li>
            <li>
                <form method="POST" action="{{route('modelpelanggan.destroy' , $d->id)}}">
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
</div>
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
