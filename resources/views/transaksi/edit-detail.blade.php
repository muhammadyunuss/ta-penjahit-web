@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Edit Detail Transaksi
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi.index')}}">Transaksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi.create') }}">Tambah Transaksi</a>
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
            <i class="fa fa-reorder"></i> Pemesan
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Pelanggan</strong></h4>
                        <p class="control-label">Nama : {{ $data->nama_pelanggan }}</p>
                        <p class="control-label">Email : {{ $data->email_pelanggan }}</p>
                        <p class="control-label">No. Telepon : {{ $data->no_telepon_pelanggan }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat_pelanggan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Pegawai</strong></h4>
                        <p class="control-label">Nama Pegawai : {{ $data->nama_penjahit }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Tambah Detail Pemesanan
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi.update.detail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="{{ $data->id }}">
                <input type="hidden" name="detail_pemesanan_id" id="detail_pemesanan_id" value="{{ $dataModelDetail->id }}">

                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Model</label>
                            <select class="select2_category form-control" name="model_id" id="model_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($dataModel as $model)
								    <option value="{{ $model->id }}" {{ old('jenis_model_id', $dataModelDetail->model_id) == $model->id ? 'selected' : null }}>{{ $model->nama_model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Model</label>
                            <select class="select2_category form-control" name="jenis_model_id" id="jenis_model_id" tabindex="1">
                                <option value="">Pilih</option>
                                @foreach($dataJenisModel as $jenisModel)
								    <option value="{{ $jenisModel->id }}" {{ old('jenis_model_id', $dataModelDetail->jenis_model_id) == $jenisModel->id ? 'selected' : null }}>{{ $jenisModel->nama_jenismodel }}</option>
								@endforeach
                            </select>
                        </div>
                    </div> --}}
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Stock</label>
                            <input type="number" id="banyaknya" name="banyaknya" class="form-control" placeholder="Stock" value="{{ $dataModelDetail->banyaknya }}" min="0" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ongkos Jahit</label>
                            <input type="number" id="ongkos_jahit" name="ongkos_jahit" class="form-control" placeholder="Ongkos Jahit" value="{{ $dataModelDetail->ongkos_jahit }}" required min="0">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
						<label for="file_gambar" class="form-label">Gambar</label>
						{{-- <input type="hidden" name="oldfoto_model" value="{{ $data->file_gambar }}"> --}}
						<input class="form-control" type="file" id="file_gambar" name="file_gambar" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
						@if($dataModelDetail->file_gambar)
							<img src="{{ asset('upload_image/file_gambar/'.$dataModelDetail->file_gambar) }}" class="img-fluid" id="img-preview" style="max-height:400px">
						@else
                            <img class="img-fluid" id="img-preview" style="max-height:400px">
                            @error('file_gambar')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
						@endif
					</div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Model</label>
                            <input type="input" id="nama_model_detail" name="nama_model_detail" class="form-control" placeholder="Nama Model" value="{{ $dataModelDetail->nama_model_detail }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" id="deskripsi_pemesanan" name="deskripsi_pemesanan" class="form-control" placeholder="Deskripsi" value="{{ $dataModelDetail->deskripsi_pemesanan }}">
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

<!-- https://blog.quickadminpanel.com/master-detail-form-in-laravel-jquery-create-order-with-products/ -->
@section('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
    $('#model_id').change(function(){
        let id = $(this).val();
        $.ajax({
            type:"GET",
            url: "{{ url('/pemesanan/transaksi/get-ajax-jenismodel-ongkos') }}"+"/"+id,
            dataType: 'JSON',
            success:function(data){
                $('#ongkos_jahit').val(data.ongkos_jahit);
            }
        });
    });
</script>

@stop
