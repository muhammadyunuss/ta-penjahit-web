@extends('layouts.layout')

@section('content')
<h3 class="page-title">
   Tambah Akun
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{url('/')}}">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{route('admin.users.create')}}">Akun</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="{{ route('admin.users.create') }}">Tambah Akun</a>
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
            <i class="fa fa-reorder"></i> Tambah Akun
        </div>
    </div>
    <div class="portlet-body form">
        <div class="form-body">
            <form action="{{ route('admin.users.create') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="previledge">Previledge</label>
                    <select name="previledge" id="previledge" data-with="100%" class="form-control @error('previledge') is-invalid @enderror" required>
                        <option value="Admin">Admin</option>
                        <option value="Pemilik">Pemilik</option>
                        <option value="Kepala">Kepala</option>
                        <option value="Penjahit">Penjahit</option>
                        <option value="Finishing">Finishing</option>
                    </select>
                    @error('previledge')
                        <div class="invalid-feedback" style="color:red">{{ $message }}</div>
                    @enderror
                </div><br>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create User</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

<!-- https://blog.quickadminpanel.com/master-detail-form-in-laravel-jquery-create-order-with-products/ -->
@section('scripts')
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@stop
