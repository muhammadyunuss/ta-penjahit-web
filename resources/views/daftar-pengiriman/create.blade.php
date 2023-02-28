@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Pengiriman<br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-pengiriman.index')}}">Pengiriman</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-pengiriman.index')}}">Daftar Pengiriman</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('daftar-pengiriman.create')}}">Tambah Daftar Pengiriman</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Daftar Pengiriman
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('daftar-pengiriman.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pemesan</label>
                        <div class="col-md-12">
                            <select name="pemesanan_id" id="pemesanan_id" data-with="100%" class="form-control @error('pemesanan_id') is-invalid @enderror" required>
                                <option value="">Pilih Nama Pemesanan</option>
                                @foreach($pemesanan as $p)
                                    <option value="{{ $p->id }}">Pelanggan : {{ $p->nama_pelanggan }} | Tanggal : {{ $p->tanggal }}</option>
                                @endforeach
                            </select>
                            @error('pemesanan_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Opsi Pengambilan</label>
                        <div class="radio-list">
                            <label class="radio-inline">
                            <input type="radio" name="opsi_pengambilan" id="opsi_pengambilan_ambil" value="Ambil" required> Ambil </label>
                            <label class="radio-inline">
                            <input type="radio" name="opsi_pengambilan" id="opsi_pengambilan_kirim" value="Kirim" required> Kirim </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Jasa Ekspedisi</label>
                        <div class="col-md-12">
                            <select name="jasa_ekspedisi_id" id="jasa_ekspedisi_id" data-with="100%" class="form-control @error('jasa_ekspedisi_id') is-invalid @enderror">
                                <option value="">Pilih Jasa Ekspedisi</option>
                                @foreach($jasaEkspedisi as $p)
                                    <option value="{{ $p->id }}">{{ $p->jasa_ekspedisi }}</option>
                                @endforeach
                            </select>
                            @error('jasa_ekspedisi_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
						<label for="alamat_pengiriman">Alamat Pengirim</label>
						<input type="text" class="form-control @error('alamat_pengiriman') is-invalid @enderror" name="alamat_pengiriman" id="alamat_pengiriman" value="{{ old('alamat_pengiriman') }}" placeholder="Alamat">
						@error('alamat_pengiriman')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="biaya_pengiriman">Biaya Pengirim</label>
						<input type="text" class="form-control @error('biaya_pengiriman') is-invalid @enderror" name="biaya_pengiriman" id="biaya_pengiriman" value="{{ old('biaya_pengiriman') }}" placeholder="Biaya Pengiriman">
						@error('biaya_pengiriman')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div>
                    <div class="form-group">
						<label for="no_resi">No. Resi</label>
						<input type="number" class="form-control @error('no_resi') is-invalid @enderror" name="no_resi" id="no_resi" value="{{ old('no_resi') }}" placeholder="No. Resi">
						@error('no_resi')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
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

<script>
$('input[type=radio][name=opsi_pengambilan]').change(function() {
    if (this.value == 'Ambil') {
        $("#jasa_ekspedisi_id").prop('required',false);
        $("#alamat_pengiriman").prop('required',false);
        $("#biaya_pengiriman").prop('required',false);
        $("#no_resi").prop('required',false);
    }
    else if (this.value == 'Kirim') {
        $("#jasa_ekspedisi_id").prop('required',true);
        $("#alamat_pengiriman").prop('required',true);
        $("#biaya_pengiriman").prop('required',true);
        $("#no_resi").prop('required',true);
    }
});

</script>

<script type="text/javascript">

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
                    html += '<option value='+data[i].id+'>'+data[i].nama_model+' '+data[i].nama_jenismodel+' '+data[i].banyaknya+' Pcs'+'</option>';
                }
                $('#detail_pemesanan_model_id').html(html);

            }
        });
        return false;
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

</script>
@stop
