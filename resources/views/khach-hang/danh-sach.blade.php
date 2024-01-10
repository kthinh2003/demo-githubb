@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH KHÁCH HÀNG</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('khach-hang.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>TÊN KHÁCH HÀNG</th>
                <th>ĐỊA CHỈ</th>
                <th>SĐT</th>
                <th>TÊN TÀI KHOẢN</th>
                <th>MẬT KHẨU</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsKH as $KH)
        <tr>
            <td>{{ $KH->id }}</td>
            <td>{{ $KH->ten_kh }}</td>
            <td>{{ $KH->dia_chi }}</td>
            <td>{{ $KH->sdt }}</td>
            <td>{{ $KH->ten_tk }}</td>
            <td>{{ $KH->mat_khau }}</td>
            <td>
                <a href="{{ route('khach-hang.cap-nhat', ['id' => $KH->id]) }}">Sửa</a> | <a href="{{ route('khach-hang.xoa', ['id' => $KH->id]) }}">Xóa</a>
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