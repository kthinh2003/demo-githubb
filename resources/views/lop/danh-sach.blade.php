@extends('master')

@section('page-js')
    @if(session('thong_bao'))
    <script>
        Swal.fire("{{session('thong_bao')}}");
    </script>
    @endif
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH LOẠI SẢN PHẨM</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('lop-hoc.them-moi') }}" class="btn btn-sm btn-outline-secondary">Thêm mới</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>ID</td>
                <th>TÊN LỚP</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @forelse($dsLopHoc as $lopHoc)
        <tr>
            <td>{{ $lopHoc->id }}</td>
            <td>{{ $lopHoc->ten }}</td>
            <td>
                <a href="{{ route('lop-hoc.cap-nhat', ['id' => $lopHoc->id]) }}">Sửa</a> | <a href="{{ route('lop-hoc.xoa', ['id' => $lopHoc->id]) }}">Xóa</a>
            </td>
        <tr>
        @empty
        <tr>
            <td colspan=3>Không có dữ liệu</td>
        </tr>
        @endforelse
        <tbody>
    </table>
</div>
@endsection