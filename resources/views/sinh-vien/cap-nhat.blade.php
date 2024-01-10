@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('sinh-vien.xl-cap-nhat', ['id' => $sinhVien->id]) }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="mssv" class="form-label">MSSV</label>
                <input type="text" name="mssv" class="form-control" id="mssv" value="{{ $sinhVien->mssv }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="ho-ten" class="form-label">Họ tên</label>
                <input type="text" name="ho_ten" class="form-control" id="ho-ten" value="{{ $sinhVien->ho_ten }}">
            </div>
            </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="lop" class="form-label">Lớp</label>
                <input type="text" name="lop" class="form-control" id="lop" value="{{ $sinhVien->lop }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $sinhVien->email }}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <label for="dien-thoai" class="form-label">Điện thoại</label>
                <input type="text" name="dien_thoai" class="form-control" id="dien-thoai" value="{{ $sinhVien->dien_thoai }}">
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