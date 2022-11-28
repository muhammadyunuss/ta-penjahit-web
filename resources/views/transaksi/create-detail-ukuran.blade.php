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
            <i class="fa fa-reorder"></i> Detail Pemesan
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <p class="control-label">Model : {{ $dataModelDetail->nama_model }}</p>
                        <p class="control-label">Jenis Model : {{ $dataModelDetail->nama_jenismodel }}</p>
                        <p class="control-label">Deskripsi : {{ $dataModelDetail->deskripsi_pemesanan }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <p class="control-label">Qty : {{ $dataModelDetail->banyaknya }}</p>
                        <p class="control-label">Ongkos Jahit : {{ $dataModelDetail->ongkos_jahit }}</p>
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
        <form method="POST" action="{{ route('transaksi.save.detail.ukuran') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="{{ $data->id }}">
                <input type="hidden" name="detail_pemesanan_model_id" id="detail_pemesanan_model_id" value="{{ $dataModelDetail->id }}">
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
                            <label class="control-label">Panjang Atasan</label>
                            <input type="number" id="panjang_atasan" name="panjang_atasan" class="form-control" placeholder="Panjang Atasan">
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
                            <label class="control-label">Lingkar Perut Atasan</label>
                            <input type="number" id="lingkar_perut_atasan" name="lingkar_perut_atasan" class="form-control" placeholder="Lingkar Pinggang">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Pinggul Atasan</label>
                            <input type="number" id="lingkar_pinggul_atasan" name="lingkar_pinggul_atasan" class="form-control" placeholder="Lingkar Pinggul">
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
                            <label class="control-label">Panjang Tangan</label>
                            <input type="number" id="panjang_tangan" name="panjang_tangan" class="form-control" placeholder="Panjang Tangan">
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
                            <label class="control-label">Lingkar Pergelangan</label>
                            <input type="number" id="lingkar_pergelangan" name="lingkar_pergelangan" class="form-control" placeholder="Lingkar Pergelangan">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Kerah</label>
                            <input type="number" id="kerah" name="kerah" class="form-control" placeholder="Kerah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ukuran Celana</label>
                            <input type="number" id="ukuran_celana" name="ukuran_celana" class="form-control" placeholder="Ukuran Celana">
                        </div>
                    </div>
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
                            <label class="control-label">Lingkar Perut Celana</label>
                            <input type="number" id="lingkar_perut_celana" name="lingkar_perut_celana" class="form-control" placeholder="Lingkar Perut Celana">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Pinggul Celana</label>
                            <input type="number" id="lingkar_pinggul_celana" name="lingkar_pinggul_celana" class="form-control" placeholder="Lingkar Pinggul Celana">
                        </div>
                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Paha</label>
                            <input type="number" id="lingkar_paha" name="lingkar_paha" class="form-control" placeholder="Lingkar Paha">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Lutut</label>
                            <input type="number" id="lingkar_lutut" name="lingkar_lutut" class="form-control" placeholder="Lingkar Lutut">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Lingkar Bawah</label>
                            <input type="number" id="lingkar_bawah" name="lingkar_bawah" class="form-control" placeholder="Lingkar Bawah">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Deskripsi</label>
                            <input type="text" id="deskripsi_ukuran" name="deskripsi_ukuran" class="form-control" placeholder="Deskripsi">
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
