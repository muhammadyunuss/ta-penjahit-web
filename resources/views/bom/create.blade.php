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
            <a href="{{route('bom.index')}}">BOM</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('bom.create') }}">Tambah BOM</a>
        </li>
    </ul>
</div>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Tambah Nota
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('bom.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-body">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Model</label>
                    <div class="col-md-12">
                        <select name="model_id" id="model_id" data-with="100%" class="form-control @error('model_id') is-invalid @enderror" required>
                            <option value="">Pilih</option>
                            @foreach($model as $dp)
                                <option value="{{ $dp->id }}" {{ old('model_id') == $dp->id ? 'selected' : null }}>{{ $dp->nama_model }}</option>
                            @endforeach
                        </select>
                        @error('model_id')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="control-label">Ukuran Baju</label>
                        <select class="select2_category form-control" name="bom_standart_ukuran_id" id="bom_standart_ukuran_id" tabindex="1">
                            <option value="">Pilih Ukuran</option>
                            @foreach($ukuran as $dp)
                                <option value="{{ $dp->id }}" {{ old('bom_standart_ukuran_id') == $dp->id ? 'selected' : null }}>{{ $dp->ukuran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

@endsection
