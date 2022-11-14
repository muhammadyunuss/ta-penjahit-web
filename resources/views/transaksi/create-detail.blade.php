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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jenis Model</label>
                            <select class="select2_category form-control" name="jenis_model_id" id="jenis_model_id" tabindex="1">
                                <option value="">Pilih</option>
                                @foreach ($dataJenisModel as $jenisModel)
                                    <option value="{{ $jenisModel->id }}">{{ $jenisModel->nama_jenismodel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Model</label>
                            <select class="select2_category form-control" name="model_id" id="model_id" tabindex="1">
                                <option value="">Pilih</option>
                                {{-- @foreach ($dataModel as $model)
                                    <option value="{{ $model->id }}">{{ $model->nama_model }}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Qty</label>
                            <input type="number" id="banyaknya" name="banyaknya" class="form-control" placeholder="Qty">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ongkos Jahit</label>
                            <input type="number" id="ongkos_jahit" name="ongkos_jahit" class="form-control" placeholder="Ongkos Jahit">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tinggi Badan</label>
                            <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Berat Badan</label>
                            <input type="number" id="berat_badan" name="berat_badan" class="form-control" placeholder="Berat Badan">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ukuran Baju</label>
                            <select class="select2_category form-control" name="ukuran_baju" id="ukuran_baju" tabindex="1">
                                <option value="">Pilih Ukuran Baju</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                                {{-- @foreach ($dataModel as $model)
                                    <option value="{{ $model->id }}">{{ $model->nama_model }}</option>
                                @endforeach --}}
                            </select>
                            {{-- <input type="number" id="ukuran_baju" name="ukuran_baju" class="form-control" placeholder="Ukuran Baju"> --}}
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Jas</label>
                            <input type="number" id="panjang_jas" name="panjang_jas" class="form-control" placeholder="Panjang Jas">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Dada</label>
                            <input type="number" id="lingkar_dada" name="lingkar_dada" class="form-control" placeholder="Lingkar Dada">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Pinggang</label>
                            <input type="number" id="lingkar_pinggang" name="lingkar_pinggang" class="form-control" placeholder="Lingkar Pinggang">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Pinggul</label>
                            <input type="number" id="lingkar_pinggul" name="lingkar_pinggul" class="form-control" placeholder="Lingkar Pinggul">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lebar Bahu</label>
                            <input type="number" id="lebar_bahu" name="lebar_bahu" class="form-control" placeholder="Lebar Bahu">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lebar Punggung</label>
                            <input type="number" id="lebar_punggung" name="lebar_punggung" class="form-control" placeholder="Lebar Punggung">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Lengan</label>
                            <input type="number" id="panjang_lengan" name="panjang_lengan" class="form-control" placeholder="Panjang Lengan">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Siku</label>
                            <input type="number" id="lingkar_siku" name="lingkar_siku" class="form-control" placeholder="Lingkar Siku">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Ujung Lengan</label>
                            <input type="number" id="lingkar_ujung_lengan" name="lingkar_ujung_lengan" class="form-control" placeholder="Lingkar Ujung Lengan">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Kerong Lengan</label>
                            <input type="number" id="lingkar_kerong_lengan" name="lingkar_kerong_lengan" class="form-control" placeholder="Lingkar Kerong Lengan">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ukuran Celana</label>
                            <input type="number" id="ukuran_celana" name="ukuran_celana" class="form-control" placeholder="Ukuran Celana">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Celana</label>
                            <input type="number" id="panjang_celana" name="panjang_celana" class="form-control" placeholder="Panjang Celana">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Parut</label>
                            <input type="number" id="lingkar_parut" name="lingkar_parut" class="form-control" placeholder="Lingkar Parut">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Pesak</label>
                            <input type="number" id="pesak" name="pesak" class="form-control" placeholder="Pesak">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Paha</label>
                            <input type="number" id="lingkar_paha" name="lingkar_paha" class="form-control" placeholder="Lingkar Paha">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Lutut</label>
                            <input type="number" id="lingkar_lutut" name="lingkar_lutut" class="form-control" placeholder="Lingkar Lutut">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Kaki</label>
                            <input type="number" id="lingkar_kaki" name="lingkar_kaki" class="form-control" placeholder="Lingkar Kaki">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Kebaya</label>
                            <input type="number" id="panjang_kebaya" name="panjang_kebaya" class="form-control" placeholder="Panjang Kebaya">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Dress</label>
                            <input type="number" id="panjang_dress" name="panjang_dress" class="form-control" placeholder="Panjang Dress">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Muka</label>
                            <input type="number" id="panjang_muka" name="panjang_muka" class="form-control" placeholder="Panjang Muka">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Belakang</label>
                            <input type="number" id="panjang_belakang" name="panjang_belakang" class="form-control" placeholder="Panjang Belakang">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bawah Tangan</label>
                            <input type="number" id="bawah_tangan" name="bawah_tangan" class="form-control" placeholder="Bawah Tangan">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Leher</label>
                            <input type="number" id="lingkar_leher" name="lingkar_leher" class="form-control" placeholder="Lingkar Leher">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cup Dada</label>
                            <input type="number" id="cup_dada" name="cup_dada" class="form-control" placeholder="Cup Dada">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Turun Dada</label>
                            <input type="number" id="turun_dada" name="turun_dada" class="form-control" placeholder="Turun Dada">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Rok</label>
                            <input type="number" id="panjang_rok" name="panjang_rok" class="form-control" placeholder="Panjang Rok">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Panjang Bawah</label>
                            <input type="number" id="panjang_bawah" name="panjang_bawah" class="form-control" placeholder="Panjang Bawah">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" id="deskripsi_pemesanan" name="deskripsi_pemesanan" class="form-control" placeholder="Deskripsi">
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

    $('#jenis_model_id').change(function(){
    let id = $(this).val();
    $.ajax({
        type:"GET",
        url: "{{ url('/pemesanan/transaksi/get-ajax-model-to-jenismodel') }}"+"/"+id,
        dataType: 'JSON',
        success:function(data){
            let html = '';
            let i;
            for(i=0; i<data.length; i++){
                html += '<option value='+data[i].id+'>'+data[i].nama_model+'</option>';
            }
            $('#model_id').html(html);
        }
    });
   });
</script>
@stop
