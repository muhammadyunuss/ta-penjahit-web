@extends('layouts.layout')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
    Jasa Ekspedisi <br>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jasaekspedisi.index')}}">Pengiriman</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jasaekspedisi.index')}}">Jasa Ekspedisi</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('jasaekspedisi.create')}}">Tambah Jasa Ekspedisi</a>
        </li>
    </ul>
</div>
<!-- END PAGE HEADER-->

<!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
<div>
    <div class="portlet">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-reorder"></i> Tambah Jasa Ekspedisi
			</div>
		</div>
		<div class="portlet-body form">
			<form method="POST" action="{{ route('jasaekspedisi.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="form-body">
                    <div class="form-group">
						<label for="jasa_ekspedisi">Nama Ekspedisi</label>
						<input type="text" class="form-control @error('jasa_ekspedisi') is-invalid @enderror" name="jasa_ekspedisi" value="{{ old('jasa_ekspedisi') }}" placeholder="Isikan nama jasaekspedisi Anda" required>
						@error('jasa_ekspedisi')
							<div class="invalid-feedback" style="color:red">{{ $message }}</div>
						@enderror
					</div><br>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
