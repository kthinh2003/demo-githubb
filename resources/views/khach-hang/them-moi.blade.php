@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">THÊM MỚI KHÁCH HÀNG</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('khach-hang.xl-them-moi') }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten_kh" class="form-label">TÊN KHÁCH HÀNG</label>
                <input type="text" name="ten_kh" class="form-control" id="ten_kh">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="dia_chi" class="form-label">ĐỊA CHỈ</label>
                <input type="text" name="dia_chi" class="form-control" id="dia_chi">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sdt" class="form-label">SĐT</label>
                <input type="text" name="sdt" class="form-control" id="sdt">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="ten_tk" class="form-label">TÊN TÀI KHOẢN</label>
                <input type="text" name="ten_tk" class="form-control" id="ten_tk">
            </div>
        </div>     
        
        <div class="row">
            <div class="col-md-6">
                <label for="mat_khau" class="form-label">MẬT KHẨU</label>
                <input type="text" name="mat_khau" class="form-control" id="mat_khau">
            </div>
        </div>  

        <div class="row pt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</form>
@endsection