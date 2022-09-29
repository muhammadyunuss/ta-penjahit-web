@extends('penjahit.layout.conquer')

@section('left_sidebar')
<li class="sidebar-toggler-wrapper">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="sidebar-toggler">
    </div>
    <div class="clearfix">
    </div>
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
</li>
<li class="sidebar-search-wrapper">
    <form class="search-form" role="form" action="index.html" method="get">
        <div class="input-icon right">
            <i class="icon-magnifier"></i>
            <input type="text" class="form-control" name="query" placeholder="Search...">
        </div>
    </form>
</li>
<li >
    <a href="{{url('/')}}">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    </a>
</li>
<li>
    <a href="javascript:;">
    <i class="icon-puzzle"></i>
    <span class="title">Bahan Baku</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('suppliers.index')}}">
            Supplier</a>
        </li>
        <li>
            <a href="{{route('bahanbakus.index')}}">
            Sediaan Bahan Baku</a>
        </li>
        <li>
            <a href="{{route('pembelians.index')}}">
            Transaksi Bahan Baku</a>
        </li>
    </ul>
</li>
<li class="active ">
    <a href="javascript:;">
    <i class="icon-briefcase"></i>
    <span class="title">Pemesanan</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="{{route('pelanggans.index')}}">
            Pelanggan</a>
        </li>
        <li>
            <a href="{{route('modelandas.index')}}">
            Model Anda</a>
        </li>
        <li>
            <a href="{{route('modelpelanggans.index')}}">
            Model Pelanggan</a>
        </li>
        <li class="active">
            <a href="{{route('transaksis.index')}}">
            Transaksi</a>
        </li>
        <li>
            <a href="{{route('pemesananprias.index')}}">
            Pemesanan Pria</a>
        </li>
        <li>
            <a href="{{route('pemesananwanitas.index')}}">
            Pemesanan Wanita</a>
        </li>
    </ul>
</li>
<li >
    <a href="javascript:;">
    <i class="icon-present"></i>
    <span class="title">Produksi</span>
    <span class="arrow "></span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="#">
            Daftar Progres</a>
        </li>
        <li>
            <a href="#">
            Jadwal Progres</a>
        </li>
        <li>
            <a href="#">
            Penggunaan Bahan Baku</a>
        </li>
        <li>
            <a href="#">
            Realisasi Progres</a>
        </li>
    </ul>
</li>
@endsection

@section('konten')
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
            <a href="{{route('transaksis.index')}}">Transaksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('transaksis.create') }}">Tambah Transaksi</a>
        </li>
    </ul>
</div>

<div >
<div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Nota
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('transaksis.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label">Nama Pelanggan</label>
                        <div class="col-md-12">
                            <select name="nmPelanggan" id="nmPelanggan" data-with="100%" class="form-control @error('nmPelanggan') is-invalid @enderror">
                                <option value="">== Pilih Nama Pelanggan ==</option>
                                @foreach($datapelanggan as $dp)
                                    <option value="{{ $dp->id }}" {{ old('nmPelanggan') == $dp->id ? 'selected' : null }}>{{ $dp->nama_pelanggan }}</option>
                                @endforeach
                            </select>
                            @error('nmPelanggan')
                                <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estimasiselesai">Estimasi Selesai</label>
                        <div>
                            <input type="date" data-date-format="dd-mm-yyyy" class="form-control @error('estimasiselesai') is-invalid @enderror" id="estimasiselesai" name="estimasiselesai" value="{{ old('estimasiselesai') }}">
                        </div>
                        <script>
                            let DateToday=new Date();
                            let month=DateToday.getMonth()+1;
                            let day=DateToday.getDate();
                            let year=DateToday.getFullYear();
                            if(month<10)
                                month='0'+month.toString();
                            if(day<10)
                                day='0'+day.toString();
                            let Today=year+'-'+month+'-'+day;
                            let maxdate=year+1+'-'+month+'-'+day;
                            document.getElementById('estimasiselesai').setAttribute("min",Today);
                        </script>
                    </div><br>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="products_table">
                            <thead>
                                <tr>
                                    <th>Jumlah</th>
                                    <th>Model Baju</th>
                                    <th class="text-center"> Harga </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="product0">
                                    <td>
                                        <input type="number" name="quantities[]" class="form-control" value="1" min="1"/>
                                    </td>
                                    <td>
                                        <select name="products[]"  id="nmModel" class="form-control">
                                            <option value="">-- choose product --</option>
                                            @foreach ($datamodel as $dm)
                                                <option value="{{ $dm->id }}">
                                                    {{ $dm->nama_model }} (Rp{{ number_format($dm->harga) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name='price[]' placeholder='Enter Unit Price' class="form-control price" step="0.00" min="0"/></td>
                                </tr>
                                <tr id="product1"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
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

<!-- https://blog.quickadminpanel.com/master-detail-form-in-laravel-jquery-create-order-with-products/ -->
@section('footer')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

 $(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });

    $('#products_table tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
  });

  function calc()
{
	$('#products_table tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);
			
			calc_total();
		}
    });
}

</script>



<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#nmModel').select2();
});
</script> -->

@stop