@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Realisasi Progres<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('realisasi-progres.index')}}">Produksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('realisasi-progres.index')}}">Realisasi Progres</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('realisasi-progres.create')}}">Tambah Realisasi Progres</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Ubah Model Anda
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('realisasi-progres.update', $data->id) }}" enctype="multipart/form-data">
			@csrf
			@method("PUT")
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pemesan</label>
                        <div class="col-md-12">
                            <select name="pemesanan_id" id="pemesanan_id" data-with="100%" class="form-control @error('pemesanan_id') is-invalid @enderror" required>
                                <option value="">Pilih Pemesanan</option>
                                @foreach($pemesanan as $p)
                                    <option value="{{ $p->id }}" {{ old('pemesanan_id', $data->pemesanan_id) == $p->id ? 'selected' : null }}>Pelanggan : <b>{{ $p->nama_pelanggan }}</b> | Tanggal: <b>{{ $p->tanggal }}</b></option>
                                @endforeach
                            </select>
                            @error('pemesanan_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detail_pemesanan_model_id" class="col-md-4 col-form-label">Pemesan Detail</label>
                        <div class="col-md-12">
                            <select name="detail_pemesanan_model_id" id="detail_pemesanan_model_id" data-with="100%" class="form-control @error('detail_pemesanan_model_id') is-invalid @enderror" required>
                                <option value="">Pilih Pemesanan Detail</option>
                            </select>
                            @error('detail_pemesanan_model_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="perencanaan_produksi_id" class="col-md-4 col-form-label">Perencanaan Produksi</label>
                        <div class="col-md-12">
                            <select name="perencanaan_produksi_id" id="perencanaan_produksi_id" data-with="100%" class="form-control @error('perencanaan_produksi_id') is-invalid @enderror" required>
                                <option value="{{ $perencanaan_produksi->proses_produksi_id }}">{{ $perencanaan_produksi->nama_prosesproduksi }}</option>
                            </select>
                            @error('detail_pemesanan_model_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', date('Y-m-d', $data->tanggal_mulai==null ? null : strtotime($data->tanggal_mulai)))}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', date('Y-m-d', $data->tanggal_selesai==null ? null : strtotime($data->tanggal_selesai)))}}" required>
                        </div>
                    </div>
                    <div class="form-group">
						<label for="deskripsi_model">Keterangan</label>
						<textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" placeholder="Isikan deskripsi Realisasi Progres" rows="3">{{ old('keterangan', $data->keterangan) }}</textarea>
					</div><br>
                    <div class="mb-3">
						<label for="foto" class="form-label">Gambar</label>
						{{-- <input type="hidden" name="oldfoto" value="{{ $data->foto }}"> --}}
						<input class="form-control" type="file" id="foto" name="foto" onchange="document.getElementById('img-preview').src = window.URL.createObjectURL(this.files[0])">
						@if($data->foto)
							<img src="{{ asset('upload_image/foto_realisasi/'.$data->foto) }}" class="img-fluid" id="img-preview" style="max-height:400px">
						@else
                            <img class="img-fluid" id="img-preview" style="max-height:400px">
                            @error('foto')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
						@endif
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#nmBahanBaku').select2();
});
</script>

<script type="text/javascript">
    get_data_edit();
    $('#pemesanan_id').change(function(e){
        let id=$(this).val();
        $.ajax({
            url : "{{ url('/produksi/realisasi-progres/get-ajax-pemesanan-to-pemesanan-detail') }}"+"/"+id,
            method : "GET",
            async : true,
            dataType : 'json',
            success: function(data){
                let html = '<option value=0>Pilih Pemesanan Detail</option>';
                let i;
                $('#detail_pemesanan_model_id').html(html);
                for(i=0; i<data.length; i++){
                    // html += '<option value='+data[i].id+'>'+data[i].nama_model+' '+data[i].nama_jenismodel+' '+data[i].banyaknya+' Pcs'+'</option>';
                    html += '<option value='+data[i].id+'>'+'Model: '+data[i].nama_model+'| Detail Model: '+data[i].nama_model_detail+'| Jumlah: '+data[i].banyaknya+' Pcs'+'</option>';
                }
                $('#detail_pemesanan_model_id').html(html);

            }
        });

        $('#detail_pemesanan_model_id').change(function(e){
            let id=$(this).val();
            $.ajax({
                url : "{{ url('/produksi/realisasi-progres/get-ajax-pemesanan-detail-to-perencanaan-produksi') }}"+"/"+id,
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    let html = '<option value=0>Pilih Perencanaan Produksi</option>';
                    let i;
                    $('#perencanaan_produksi_id').html(html);
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id+'>'+data[i].nama_prosesproduksi+'</option>';
                    }
                    $('#perencanaan_produksi_id').html(html);

                }
            });
            return false;
        });

        return false;
    });



    function get_data_edit(){
                let detail_pemesanan_id = "{{ $perencanaan_produksi->id }}";
                // console.log(detail_pemesanan_id);
                $.ajax({
                    url : "{{ url('/produksi/jadwal-progres/get-ajax-perencanaan-produksi-to-pemesanan-detail-edit-first') }}"+"/"+detail_pemesanan_id,
                    method : "GET",
                    async : true,
                    dataType : 'json',
                    success : function(data){
                        console.log(data);
                        // let html ='';
                        // $('#detail_pemesanan_model_id').html(html);
                        // $.each(data, function(i, item){
                            $('select[name="detail_pemesanan_model_id"]').append('<option value="'+ data.id +'" selected>'+'Model: '+data.nama_model+'| Detail Model: '+data.nama_model_detail+' | Jumlah: '+data.banyaknya+' Pcs' +'</option>').trigger('change');
                            // html += $('select[name="detail_pemesanan_model_id"]').append('Model: '+data.nama_model+'| Detail Model: '+data.nama_model_detail+'| Jumlah: '+data.banyaknya+' Pcs'+'</option>').trigger('change');
                            // $('[name="detail_pemesanan_model_id"]').val(data[i].id).trigger('change');
                        // });
                        // $('#detail_pemesanan_model_id').html(html);

                    }

                });
            }

</script>
@stop
