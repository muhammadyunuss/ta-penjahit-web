@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    BOM
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi.index')}}">BOM</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi.create') }}">Tambah BOM</a>
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
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> BOM
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Bill Of Material</strong></h4>
                        <p class="control-label">Model : {{ $data->nama_model }}</p>
                        <p class="control-label">Ukuran : {{ $data->ukuran }}</p>
                        <p class="control-label">Lebar Kain : {{ $data->lebar_kain }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Tambah Detail BOM
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('bom.detail.save') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="bom_id" id="bom_id" value="{{ $data->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bahan Baku</label>
                            <select class="select2_category form-control" name="bahanbaku_id" id="bahanbaku_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($bahan_baku as $bb)
                                    <option value="{{ $bb->id }}">{{ $bb->nama_bahanbaku }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jumlah</label>
                            <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions right">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info"><i class="fa fa-check"></i> Save</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
console.log($("#bahanbaku_id option:selected" ).val());
console.log($('#bahanbaku_id').find('option:selected').val());
</script>
@stop
