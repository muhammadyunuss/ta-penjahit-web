@extends('layouts.layout')

@section('styles')
@endsection

@section('content')
<h3 class="page-title">
    Bill Of Material &nbsp;&nbsp;
    @if (auth()->user()->previledge == "Admin")
    <a type= "button" href="{{route('bom.create')}}" class="btn btn-primary btn-sm">
        + Tambah Bill Of Material
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
            <a href="{{route('bom.index')}}">Bill Of Material</a>
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
        <th>Model</th>
        <th>Ukuran</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <?php $total=0 ?>
        <tr>
            <td>{{ $d->nama_model }}</td>
            <td>{{ $d->ukuran }}</td>
            <td>
            <ul class="nav nav-pills">
                <li >
                    <button onclick="window.location='{{ route('bom.show', $d->id) }}'" type="button" class="btn btn-default">Lihat</button>
                </li>
                {{-- <li >
                    <button onclick="window.location='{{ route('bom.detail.create', $d->id) }}'" type="button" class="btn btn-info">Tambah Pemesanan</button>
                </li> --}}
                {{-- <li >
                    <button onclick="window.location='{{ route('bom.edit', $d->id) }}'" type="button" class="btn btn-success">Ubah</button>
                </li> --}}
                {{-- @if (auth()->user()->previledge == "Admin")
                <li>
                    <form method="POST" action="{{route('bom.destroy' , $d->id)}}">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger " type="SUBMIT" value="Hapus"
                        onclick="if(!confirm('Apakah Anda yakin?')) {return false;}">
                    </form>
                </li>
                @endif --}}
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
