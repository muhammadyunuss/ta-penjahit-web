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
            <a href="{{ route('transaksi.create') }}">Edit Transaksi</a>
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
            <i class="fa fa-reorder"></i> Edit Detail Pemesanan
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi.update.detail.ukuran') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-body">
            <h4 class="control-label"><strong>Ukuran Badan</strong></h4>
            <input type="hidden" name="pemesanan_id" id="pemesanan_id" value="{{ $dataModelDetail->pemesanan_id }}">
            <input type="hidden" name="detail_pemesanan_model_id" id="detail_pemesanan_model_id" value="{{ $detailUkuran->detail_pemesanan_model_id }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ukuran Baju</label>
                        <select class="select2_category form-control" name="ukuran_baju" id="ukuran_baju" tabindex="1">
                            <option value="">Pilih Ukuran Baju</option>
                            <option value="S" {{ old('ukuran_baju', $detailUkuran->ukuran_baju) == "S" ? 'selected' : null }}>S</option>
                            <option value="M" {{ old('ukuran_baju', $detailUkuran->ukuran_baju) == "M" ? 'selected' : null }}>M</option>
                            <option value="L" {{ old('ukuran_baju', $detailUkuran->ukuran_baju) == "L" ? 'selected' : null }}>L</option>
                            <option value="XL" {{ old('ukuran_baju', $detailUkuran->ukuran_baju) == "XL" ? 'selected' : null }}>XL</option>
                            <option value="XXL" {{ old('ukuran_baju', $detailUkuran->ukuran_baju) == "XXL" ? 'selected' : null }}>XXL</option>
                            {{-- @foreach ($dataModel as $model)
                                <option value="{{ $model->id }}">{{ $model->nama_model }}</option>
                            @endforeach --}}
                        </select>
                        {{-- <input type="number" id="ukuran_baju" name="ukuran_baju" class="form-control" placeholder="Ukuran Baju"> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Jumlah Baju Dengan Ukuran Yang Sama</label>
                        <input type="number" id="jumlah_baju_dengan_ukuran_yg_sama" name="jumlah_baju_dengan_ukuran_yg_sama" class="form-control" value="{{ $detailUkuran->jumlah_baju_dengan_ukuran_yg_sama }}" placeholder="Jumlah Baju ukuran yang sama">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tinggi Badan</label>
                        <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control" value="{{ $detailUkuran->tinggi_badan }}" placeholder="Tinggi Badan">
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Berat Badan</label>
                        <input type="number" id="berat_badan" name="berat_badan" class="form-control" value="{{ $detailUkuran->berat_badan }}" placeholder="Berat Badan">
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <h4 class="control-label"><strong>Ukuran Baju Atas</strong></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Panjang Atasan</label>
                        <input type="number" id="panjang_atasan" name="panjang_atasan" class="form-control" value="{{ $detailUkuran->panjang_atasan }}" placeholder="Panjang Atasan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Perut Atasan</label>
                        <input type="number" id="lingkar_perut_atasan" name="lingkar_perut_atasan" class="form-control" value="{{ $detailUkuran->lingkar_perut_atasan }}" placeholder="Lingkar Pinggang">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Dada</label>
                        <input type="number" id="lingkar_dada" name="lingkar_dada" class="form-control" value="{{ $detailUkuran->lingkar_dada }}" placeholder="Lingkar Dada">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lebar Bahu</label>
                        <input type="number" id="lebar_bahu" name="lebar_bahu" class="form-control" value="{{ $detailUkuran->lebar_bahu }}" placeholder="Lebar Bahu">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Panjang Tangan</label>
                        <input type="number" id="panjang_tangan" name="panjang_tangan" class="form-control" value="{{ $detailUkuran->panjang_tangan }}" placeholder="Panjang Tangan">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Pinggul Atasan</label>
                        <input type="number" id="lingkar_pinggul_atasan" name="lingkar_pinggul_atasan" class="form-control" value="{{ $detailUkuran->lingkar_pinggul_atasan }}" placeholder="Lingkar Pinggul">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Siku</label>
                        <input type="number" id="lingkar_siku" name="lingkar_siku" class="form-control" value="{{ $detailUkuran->lingkar_siku }}" placeholder="Lingkar Siku">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Pergelangan</label>
                        <input type="number" id="lingkar_pergelangan" name="lingkar_pergelangan" class="form-control" value="{{ $detailUkuran->lingkar_pergelangan }}" placeholder="Lingkar Pergelangan">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Kerah</label>
                        <input type="number" id="kerah" name="kerah" class="form-control" value="{{ $detailUkuran->kerah }}" placeholder="Kerah">
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <!--/row-->
            <h4 class="control-label"><strong>Ukuran Celana</strong></h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Ukuran Celana</label>
                        <input type="number" id="ukuran_celana" name="ukuran_celana" class="form-control" value="{{ $detailUkuran->ukuran_celana }}" placeholder="Ukuran Celana">
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Panjang Celana</label>
                        <input type="number" id="panjang_celana" name="panjang_celana" class="form-control" value="{{ $detailUkuran->panjang_celana }}" placeholder="Panjang Celana">
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Perut Celana</label>
                        <input type="number" id="lingkar_perut_celana" name="lingkar_perut_celana" class="form-control" value="{{ $detailUkuran->lingkar_perut_celana }}" placeholder="Lingkar Perut Celana">
                    </div>
                </div>
                <!--/span-->
            </div>
            <!--/row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Pesak</label>
                        <input type="number" id="pesak" name="pesak" class="form-control" value="{{ $detailUkuran->pesak }}" placeholder="Pesak">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Pinggul Celana</label>
                        <input type="number" id="lingkar_pinggul_celana" name="lingkar_pinggul_celana" class="form-control" value="{{ $detailUkuran->lingkar_pinggul_celana }}" placeholder="Lingkar Pinggul Celana">
                    </div>
                </div>
            </div>
            <!--/row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Paha</label>
                        <input type="number" id="lingkar_paha" name="lingkar_paha" class="form-control" value="{{ $detailUkuran->lingkar_paha }}" placeholder="Lingkar Paha">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Lutut</label>
                        <input type="number" id="lingkar_lutut" name="lingkar_lutut" class="form-control" value="{{ $detailUkuran->lingkar_lutut }}" placeholder="Lingkar Lutut">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Lingkar Bawah</label>
                        <input type="number" id="lingkar_bawah" name="lingkar_bawah" class="form-control" value="{{ $detailUkuran->lingkar_bawah }}" placeholder="Lingkar Bawah">
                    </div>
                </div>
            </div>
            <h4 class="control-label"><strong>Deksripsi</strong></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <input type="text" id="deskripsi_ukuran" name="deskripsi_ukuran" class="form-control" value="{{ $detailUkuran->deskripsi_ukuran }}" placeholder="Deskripsi">
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
