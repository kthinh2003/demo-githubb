@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">CẬP NHẬT LOẠI SẢN PHẨM</h1>
</div>

<form class="row g-3" method="POST" action="{{ route('lop-hoc.xl-cap-nhat', ['id' => $lopHoc->id]) }}">
    <div class="col-12">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="ten-lop" class="form-label">Tên lớp</label>
                <input type="text" name="ten" class="form-control" id="ten-lop" value="{{ $lopHoc->ten }}">
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