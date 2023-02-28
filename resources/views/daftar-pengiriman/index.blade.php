@extends('layouts.layout')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css"> --}}
@endsection
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Daftar Pengiriman &nbsp;&nbsp;
    <a href="{{route('daftar-pengiriman.create')}}" class="btn btn-primary btn-sm">
      + TAMBAH DAFTAR PENGIRIMAN
    </a>
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
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if (session('statushapus'))
<div class="alert alert-danger">
    {{ session('statushapus') }}
</div>
@endif

<div class="alert alert-default">
    {{-- <form action="" method="POST">
        @csrf --}}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Nama Pemesanan</label>
            <div class="col-md-10">
                <select name="s_pemesanan_id" id="s_pemesanan_id" data-with="100%" class="form-control @error('s_pemesanan_id') is-invalid @enderror">
                    <option value="">Pilih Nama Pemesanan</option>
                    @foreach($viewTransaksiPemesanan as $p)
                        <option value="{{ $p->detail_pemesanan_model_id }}">Pelanggan : {{ $p->nama_pelanggan }} | Estimasi Selesai : {{ $p->tanggal }} | Nama Model : {{ $p->nama_model }} | Nama Model Detail : {{-- $p->nama_model_detail --}} | Jumlah : {{ $p->jumlah }} {{ $p->satuan }}</option>
                    @endforeach
                </select>
                @error('s_pemesanan_id')
                    <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                {{-- <a href="{{ route('daftar-pengiriman.search') }}" id="btn-search" class="btn btn-info">Search</a> --}}
                {{-- <button type="submit" class="btn btn-info">Search</button> --}}
            </div>
        </div>
   {{-- </form> --}}
</div>

    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Realisasi Progres
            </div>
            <div class="tools">
                <a href="javascript:;" class="reload">
                </a>
                <a href="javascript:;" class="remove">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover" style="width:100%" id="sample_3">
            <thead>
                <tr>
                    <th>
                        Action
                    </th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Model</th>
                    {{-- <th>Jenis Model</th> --}}
                </tr>
            </thead>
            </table>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}

<script>
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        // var flagsUrl = '{{ URL::asset('/upload_image/foto_realisasi/') }}';
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Opsi : </td>' +
            '<td>' + d.opsi_pengambilan + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Tanggal : </td>' +
            '<td>'+ d.tanggal +'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Alamat Pengiriman : </td>' +
            '<td>' + d.alamat_pengiriman +'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Biaya Pengiriman : </td>' +
            '<td>' + d.biaya_pengiriman +'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>No. Resi : </td>' +
            '<td>' + d.no_resi +'</td>' +
            '</tr>' +
            '</table>'
        );
    }

    var table = $('#sample_3').DataTable({
            ajax:{
                url: "{{ route('daftar-pengiriman.index') }}"
            },
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                {data: 'nama_pelanggan', name: 'nama_pelanggan'},
                {data: 'nama_model', name: 'nama_model'},
                // {data: 'nama_jenismodel', name: 'nama_jenismodel'},
            ],
            order: [[1, 'asc']],
        });
        // $('#sample_3').DataTable().ajax.reload();


        // Add event listener for opening and closing details
        $('#sample_3 tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.find('svg').attr('data-icon', 'plus-circle');    // FontAwesome 5
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.find('svg').attr('data-icon', 'minus-circle'); // FontAwesome 5
            }
        });

$('#s_pemesanan_id').change(function(){
    // $('#sample_3').DataTable().clear().destroy();
    $('#sample_3').DataTable().clear();
    $('#sample_3').DataTable().destroy();
    $('#sample_3').empty();
    let pemesanan_id = $('#s_pemesanan_id').val();

    var table = $('#sample_3').DataTable({
            ajax:{
                url: "{{ route('daftar-pengiriman.index') }}",
                data: function(d)  {
                    d.pemesanan_id = pemesanan_id
                }
            },
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                {data: 'nama_pelanggan', name: 'nama_pelanggan'},
                {data: 'nama_model', name: 'nama_model'},
                {data: 'nama_jenismodel', name: 'nama_jenismodel'},
            ],
            order: [[1, 'asc']],
        });
        // $('#sample_3').DataTable().ajax.reload();


        // Add event listener for opening and closing details
        $('#sample_3 tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.find('svg').attr('data-icon', 'plus-circle');    // FontAwesome 5
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.find('svg').attr('data-icon', 'minus-circle'); // FontAwesome 5
            }
        });

});

</script>

@stop
