@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('sinh-vien.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>MSSV</th>
                <th>HỌ TÊN</th>
                <th>LỚP</th>
                <th>EMAIL</th>
                <th>ĐIỆN THOẠI</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsSinhVien as $sinhVien)
        <tr>
            <td>{{ $sinhVien->id }}</td>
            <td>{{ $sinhVien->mssv }}</td>
            <td>{{ $sinhVien->ho_ten }}</td>
            <td>{{ $sinhVien->lop_id }}</td>
            <td>{{ $sinhVien->email }}</td>
            <td>{{ $sinhVien->dien_thoai }}</td>
            <td>
                <a href="{{ route('sinh-vien.cap-nhat', ['id' => $sinhVien->id]) }}">Sửa</a> | <a href="{{ route('sinh-vien.xoa', ['id' => $sinhVien->id]) }}">Xóa</a>
            </td>
        <tr>
        @empty
        <tr>
            <td colspan=7>Không có dữ liệu</td>
        </tr>
        @endforelse
        <tbody>
    </table>
</div>
@endsection