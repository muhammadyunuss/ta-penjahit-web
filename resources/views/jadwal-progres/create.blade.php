@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Jadwal Progres <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jadwal-progres.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jadwal-progres.index')}}">Jadwal Progress</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jadwal-progres.create')}}">Tambah Jadwal Progress</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Jadwal Progress
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('jadwal-progres.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pemesan</label>
                        <div class="col-md-12">
                            <select name="pemesanan_id" id="pemesanan_id" data-with="100%" class="form-control @error('pemesanan_id') is-invalid @enderror">
                                <option value="">Pilih Pemesanan</option>
                                @foreach($pemesanan as $p)
                                    <option value="{{ $p->id }}" {{ old('pemesanan_id') == $p->id ? 'selected' : null }}>Pelanggan : <b>{{ $p->nama_pelanggan }}</b> | Tanggal: <b>{{ $p->tanggal }}</b></option>
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
                            <select name="detail_pemesanan_model_id" id="detail_pemesanan_model_id" data-with="100%" class="form-control @error('detail_pemesanan_model_id') is-invalid @enderror">
                                <option value="">Pilih Pemesanan Detail</option>
                            </select>
                            @error('detail_pemesanan_model_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="proses_produksi_id" class="col-md-4 col-form-label">Proses Produksi</label>
                        <div class="col-md-12">
                            <select name="proses_produksi_id" id="proses_produksi_id" data-with="100%" class="form-control @error('proses_produksi_id') is-invalid @enderror">
                                <option value="">Pilih Pemesanan Detail</option>
                                @foreach($prosesProduksi as $p)
                                    <option value="{{ $p->id }}" {{ old('proses_produksi_id') == $p->id ? 'selected' : null }}>{{ $p->nama_prosesproduksi }}</option>
                                @endforeach
                            </select>
                            @error('proses_produksi_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                        </div>
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
<script type="text/javascript">

        $('#pemesanan_id').change(function(e){
            let id=$(this).val();
            $.ajax({
                url : "{{ url('/produksi/jadwal-progres/get-ajax-pemesanan-to-pemesanan-detail') }}"+"/"+id,
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

</script>
@endsection
