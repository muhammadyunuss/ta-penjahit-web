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
    Realisasi Progres &nbsp;&nbsp;
    <a href="{{route('realisasi-progres.create')}}" class="btn btn-primary btn-sm">
      + TAMBAH REALISASI PROGRES
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
            <a href="{{route('realisasi-progres.index')}}">Produksi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('realisasi-progres.index')}}">Realisasi Progres</a>
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

    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe"></i>Responsive Table With Expandable details
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
                    <th>
                        Realisasi Progres
                    </th>
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
    var flagsUrl = '{{ URL::asset('/upload_image/foto_realisasi/') }}';
    return (
        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
        '<tr>' +
        '<td>Nama Penjahit : </td>' +
        '<td>' + d.nama_penjahit + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Tanggal Mulai : </td>' +
        '<td>'+ d.tanggal_mulai +'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Tanggal Selesai : </td>' +
        '<td>' + d.tanggal_selesai +'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Keterangan : </td>' +
        '<td>' + d.keterangan +'</td>' +
        '</tr>' +
        '<tr>' +
        '<td>Gambar : </td>' +
        '<td>' +
            '<div class="modal-body">' +
                '<img src="'+flagsUrl+'/' +d.foto + '" width="500px" style="display: block; margin-left: auto; margin-right: auto;">' +
            '</div>' +
        '</td>' +
        '</tr>' +
        '</table>'
    );
}

$(document).ready(function () {
    var table = $('#sample_3').DataTable({
        ajax: "{{ route('realisasi-progres.index') }}",
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            { data: 'nama_prosesproduksi' },
        ],
        order: [[1, 'asc']],
    });

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
