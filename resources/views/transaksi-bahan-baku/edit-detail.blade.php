@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    Daftar Pembelian Bahan Baku
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('transaksi.index')}}">Daftar Pembelian Bahan Baku</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksi.create') }}">Tambah Daftar Pembelian Bahan Baku</a>
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
                        <h4 class="control-label"><strong>Supplier</strong></h4>
                        <p class="control-label">Nama : {{ $data->nama_supplier }}</p>
                        <p class="control-label">Email : {{ $data->email }}</p>
                        <p class="control-label">Alamat : {{ $data->alamat }}</p>
                        <p class="control-label">No. Telepon : {{ $data->nomor_telepon }}</p>
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
            <i class="fa fa-reorder"></i> Tambah Detail Daftar Pembelian Bahan Baku
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{ route('transaksi.bahanbaku.update.detail', $id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-body">
                <input type="hidden" name="pembelian_bahanbaku_id" id="pembelian_bahanbaku_id" value="{{ $dataDetail->pembelian_bahanbaku_id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Bahan Baku</label>
                            <select class="select2_category form-control" name="bahan_baku_id" id="bahan_baku_id" tabindex="1" required>
                                <option value="">Pilih</option>
                                @foreach ($dataBahanBaku as $bahan)
                                <option value="{{ $bahan->id }}" {{ old('bahan_baku_id', $bahan->id ) == $dataDetail->bahan_baku_id ? 'selected' : null }}>{{ $bahan->kode_bahan_baku }} - {{ $bahan->nama_bahanbaku }}</option>
                                    {{-- <option value="{{ $bahan->id }}">{{ $bahan->nama_bahanbaku }}</option> --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Satuan</label>
                            <input type="text" id="satuan" class="form-control" placeholder="{{ $dataDetail->satuan }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Jumlah</label>
                            <input type="text" id="jumlah" name="jumlah" class="form-control" placeholder="Jumlah" value="{{  $dataDetail->jumlah }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Harga Beli</label>
                            <input type="number" id="harga_beli" name="harga_beli" class="form-control" placeholder="Harga Beli" value="{{  $dataDetail->harga_beli }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Sub Total</label>
                            <input type="number" id="subtotal" name="subtotal" class="form-control" placeholder="Sub Total" readonly value="{{ $dataDetail->subtotal }}" required>
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
    $('#bahan_baku_id').change(function(e){
            let id=$(this).val();
            // let detail_pemesanan_model_id = "{{-- $perencanaanProduksi->detail_pemesanan_model_id --}}";
            $.ajax({
                url : "{{ url('bahan-baku/get-ajax-bahan-baku') }}" + '/' + id,
                method : "GET",
                async : true,
                dataType : 'json',
                success: function(data){
                    document.getElementById("harga_beli").value = data[0].harga_beli;
                    document.getElementById("satuan").value = data[0].satuan;
                }
            });
            return false;
        });

    $( "#jumlah" ).keyup(function() {
        var regex = /[^\d.]|\.(?=.*\.)/g;
        var subst = "";

        var str    = $(this).val();
        var result = str.replace(regex, subst);
        $(this).val(result);

        let jumlah = $(this).val();
        let harga_beli = document.getElementById("harga_beli").value;
        let total = parseFloat(jumlah) * parseFloat(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });

    $( "#harga_beli" ).keyup(function() {
        let harga_beli = $(this).val();
        let jumlah = document.getElementById("jumlah").value;
        let total = parseFloat(jumlah) * parseFloat(harga_beli);
        let subtotal = document.getElementById("subtotal").value = total;

    });


   

</script>
@stop
