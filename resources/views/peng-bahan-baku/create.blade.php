@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Pengunaan Bahan Baku <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('peng-bahan-baku.index')}}">Pemesanan</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('peng-bahan-baku.index')}}">Pengunaan Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('peng-bahan-baku.create')}}">Tambah Pengunaan Bahan Baku</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Penggunaan Bahan Baku
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('peng-bahan-baku.store') }}" enctype="multipart/form-data">
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
                        <label for="bahan_baku_id" class="col-md-4 col-form-label">Bahan Baku</label>
                        <div class="col-md-12">
                            <select name="bahan_baku_id" id="bahan_baku_id" data-with="100%" class="form-control @error('bahan_baku_id') is-invalid @enderror">
                                <option value="">Pilih Bahan Baku</option>
                                @foreach($bahanBaku as $p)
                                    <option value="{{ $p->id }}" {{ old('bahan_baku_id') == $p->id ? 'selected' : null }}>{{ $p->nama_bahanbaku }}</option>
                                @endforeach
                            </select>
                            @error('bahan_baku_id')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_terpakai">Jumlah Pemakaian</label>
                        <div>
                            <input type="number" class="form-control @error('jumlah_terpakai') is-invalid @enderror" id="jumlah_terpakai" name="jumlah_terpakai" placeholder="Jumlah Pemakaian" value="{{ old('jumlah_terpakai') }}">
                        </div>
                    </div>
                    <div id="notification" style="display: none;">
                        <span class="dismiss"><a title="dismiss this notification">x</a></span>
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

        $('#bahan_baku_id').change(function(e){
            let id=$(this).val();
            $.ajax({
                url : "{{ url('/produksi/peng-bahan-baku/get-ajax-bahan-baku-first') }}"+"/"+id,
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    console.log(data.stok);
                    $( "#jumlah_terpakai" ).keyup(function() {
                        let jumlah=$(this).val();
                        if(jumlah > data.stok){
                            $("#notification").fadeIn("slow").html('<p style="color:red;">Mohon maaf pemakaian bahan baku melebihi jumlah <b>'+data.stok+'</b> stok sediaan bahan baku dan tidak bisa tersimpan, stok anda akan minus</p>');
                        }else{
                            $("#notification").fadeOut("slow").html('<p style="color:green;">Stok sudah aman</p>');
                        }
                    });

                }
            });
            return false;
        });

</script>
@endsection
