@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Transaksi
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
                        <h4 class="control-label"><strong>Penjahit</strong></h4>
                        <p class="control-label">Nama Penjahit : {{ $data->nama_penjahit }}</p>
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
        <form method="POST" action="{{ route('transaksi.save.detail') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="{{ $data->id }}">
                <!--/row-->
                <div class="row">
                    {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Model</label>
                            <select class="select2_category form-control" name="jenis_model_id" id="jenis_model_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($dataJenisModel as $jenisModel)
                                    <option value="{{ $jenisModel->id }}">{{ $jenisModel->nama_jenismodel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Model</label>
                            <select class="select2_category form-control" name="model_id" id="model_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($dataModel as $model)
                                    <option value="{{ $model->id }}">{{ $model->nama_model }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Qty</label>
                            <input type="number" id="banyaknya" name="banyaknya" class="form-control" placeholder="Qty" required>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ongkos Jahit</label>
                            <input type="text" id="ongkos_jahit" name="ongkos_jahit" class="form-control" placeholder="Ongkos Jahit" required>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="file_gambar" class="form-label">Gambar</label>
                        <input class="form-control" type="file" id="file_gambar" name="file_gambar" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
                        @error('file_gambar')
                            <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                        @enderror
                        <img class="img-fluid" id="img-preview" style="max-height:400px">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Nama Detail Model</label>
                            <input type="input" id="nama_model_detail" name="nama_model_detail" class="form-control" placeholder="Nama Detail Model" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" id="deskripsi_pemesanan" name="deskripsi_pemesanan" class="form-control" placeholder="Deskripsi" >
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
    $("#bahan_baku_id").on('change', function(event) {
        let id = $(this).val();
        document.getElementById("ongkos_jahit").value = 0;
        if(id){
            $.ajax ({
                type: 'GET',
                url: "{{ url('/pemesanan/transaksi/get-ajax-bahan-baku') }}"+"/"+id,
                dataType: 'json',
                success : function(data) {
                    document.getElementById("ongkos_jahit").value = data[0].harga_jual;

                }
            });
        }
    });

    // $('#jenis_model_id').change(function(){
    //     let id = $(this).val();
    //     $.ajax({
    //         type:"GET",
    //         url: "{{ url('/pemesanan/transaksi/get-ajax-model-to-jenismodel') }}"+"/"+id,
    //         dataType: 'JSON',
    //         success:function(data){
    //             let html = '';
    //             let i;
    //             html += '<option value='+'>Pilih Model</option>';
    //             for(i=0; i<data.length; i++){
    //                 html += '<option value='+data[i].id+'>'+data[i].nama_model+'</option>';
    //             }
    //             $('#model_id').html(html);
    //         }
    //     });
    // });

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
