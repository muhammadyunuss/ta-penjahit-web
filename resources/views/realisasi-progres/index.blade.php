@extends('layouts.layout')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}"/>
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
            <table class="table table-striped table-bordered table-hover" id="sample_3">
            <thead>
                <tr>
                    <th>
                        Rendering engine
                    </th>
                    <th>
                        Browser
                    </th>
                    <th>
                        Platform(s)
                    </th>
                    <th>
                        Engine version
                    </th>
                    <th>
                        CSS grade
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Trident
                    </td>
                    <td>
                        Internet Explorer 4.0
                    </td>
                    <td>
                        Win 95+
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        X
                    </td>
                </tr>
            </tbody>
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

<script>
    var TableAdvanced = function () {

        var initTable3 = function () {
            var table = $('#sample_3');

            /* Formatting function for row details */
            function fnFormatDetails(oTable, nTr) {
                var aData = oTable.fnGetData(nTr);
                var sOut = '<table>';
                sOut += '<tr><td>Platform(s):</td><td>' + aData[2] + '</td></tr>';
                sOut += '<tr><td>Engine version:</td><td>' + aData[3] + '</td></tr>';
                sOut += '<tr><td>CSS grade:</td><td>' + aData[4] + '</td></tr>';
                sOut += '<tr><td>Others:</td><td>Could provide a link here</td></tr>';
                sOut += '</table>';

                return sOut;
            }

            /*
            * Insert a 'details' column to the table
            */
            var nCloneTh = document.createElement('th');
            nCloneTh.className = "table-checkbox";

            var nCloneTd = document.createElement('td');
            nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

            table.find('thead tr').each(function () {
                this.insertBefore(nCloneTh, this.childNodes[0]);
            });

            table.find('tbody tr').each(function () {
                this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
            });

            /*
            * Initialize DataTables, with no sorting on the 'details' column
            */
            var oTable = table.dataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0]
                }],
                "order": [
                    [1, 'asc']
                ],
                "lengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,
            });
            var tableWrapper = $('#sample_3_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper

            tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown

            /* Add event listener for opening and closing details
            * Note that the indicator for showing which row is open is not controlled by DataTables,
            * rather it is done here
            */
            table.on('click', ' tbody td .row-details', function () {
                var nTr = $(this).parents('tr')[0];
                if (oTable.fnIsOpen(nTr)) {
                    /* This row is already open - close it */
                    $(this).addClass("row-details-close").removeClass("row-details-open");
                    oTable.fnClose(nTr);
                } else {
                    /* Open this row */
                    $(this).addClass("row-details-open").removeClass("row-details-close");
                    oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
                }
            });
        }

        return {

            //main function to initiate the module
            init: function () {

                if (!jQuery().dataTable) {
                    return;
                }

                initTable3();
            }

        };

    }();
</script>

@stop
