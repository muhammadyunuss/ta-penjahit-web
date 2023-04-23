@extends('layouts.layout')

@section('content')
<h3 class="page-title">
    BOM
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('bom.index')}}">BOM</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('bom.create') }}">Tambah BOM</a>
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
@if (auth()->user()->previledge == "Admin")
<div class="portlet">
    <div class="portlet-body form">
        <div class="form-body">
            <a href="{{ route('bom.detail.create', $data->id )}}" class="btn btn-success btn-sm">+ Tambah Detail BOM</a>
        </div>
    </div>
</div>
@endif
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> BOM
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h4 class="control-label"><strong>Bill Of Material</strong></h4>
                        <p class="control-label">Model : {{ $data->nama_model }}</p>
                        <p class="control-label">Ukuran : {{ $data->ukuran }}</p>
                        <p class="control-label">Lebar Kain : {{ $data->lebar_kain }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Detail BOM
        </div>
    </div>
    @php
        $total = 0;
    @endphp
    <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Bahan Baku</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_detail as $model)
                        <tr>
                            <td>{{ $model->nama_bahanbaku }}</td>
                            <td>{{ $model->jumlah }}</td>
                            <td>
                                @if (auth()->user()->previledge == "Admin")
                                <a class="btn btn-primary btn-xs green-stripe" href="{{ route('bom.detail.edit', $model->id) }}">Edit</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="edit_modal">
                    <div class="modal-dialog">
                       <form id="dataDetailPemesanan">
                            <div class="modal-content">
                            <input type="hidden" id="color_id" name="color_id" value="">
                            <div class="modal-body">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="portlet-body form">
        <div class="form-body">
            <div class="card-body">
                <table class="table table-bordered table-hover" id="products_table">
                    <thead>
                        <tr>
                            <th>Nama Bahan Baku</th>
                            <th>Qty</th>
                            <th>Ongkos</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailBahanBaku as $model)
                        <tr>
                            <td>{{ $model->nama_bahanbaku }}</td>
                            <td>{{ $model->jumlah_terpakai }}</td>
                            <td>Rp. {{ number_format($model->ongkos_jahit ,2,',','.')}}</td>
                            <td>
                                <a href="{{ route('bom.detail.edit', $model->id) }}">Edit</a>
                            </td>
                            @php
                                $total += $model->ongkos_jahit;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="edit_modal">
                    <div class="modal-dialog">
                       <form id="dataDetailPemesanan">
                            <div class="modal-content">
                            <input type="hidden" id="color_id" name="color_id" value="">
                            <div class="modal-body">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                            <input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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
</script>
@stop
