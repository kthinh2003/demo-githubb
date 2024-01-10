@extends('master')
    @if(session('thong_bao'))
    <script>
        Swal.fire("{{session('thong_bao')}}");
    </script>
    @endif
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">XUẤT HÀNG</h1>
</div>
<form class="row g-3" method="POST">
<div class="row">
            <div class="col-md-6">
                <label for="khach_hang" class="form-label">Khách hàng:</label>
                <select name="khach_hang" class="form-select" aria-label="Default select example" id="khach_hang">
                    <option selected>Chọn khách hàng</option>
                    @foreach($dsKhachHang as $khachHang)
                    <option value="{{ $khachHang->id }}">{{ $khachHang->ten }}</option>
                    @endforeach
                </select>
            </div>
</div>
</form>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH SẢN PHẨM</h1>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="san_pham" class="form-label">Chọn sản phẩm:</label>
                <select name="san_pham" class="form-select" aria-label="Default select example" id="san_pham">
                    <option selected>Chọn sản phẩm</option>
                    @foreach($dsSanPham as $sanPham)
                    <option value="{{ $sanPham->id }}">{{ $sanPham->ten }}</option>
                    @endforeach
                </select>
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="ma-don-hang" class="form-label">Mã đơn hàng:</label>
                <input type="number" name="ma-don-hang" class="form-control" id="ma-don-hang" >
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="ngay" class="form-label">Ngày tạo hóa đơn:</label>
                <input type="text" name="ngay" class="form-control" id="ngay" >
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="nguoi-tao" class="form-label">Người tạo:</label>
                <input type="text" name="nguoi-tao" class="form-control" id="nguoi-tao" >
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="tong-tien" class="form-label">Tổng tiền:</label>
                <input type="number" name="tong-tien" class="form-control" id="tong-tien" value="0" >
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="trang-thai" class="form-label">Trạng thái:</label>
                <input type="number" name="trang-thai" class="form-control" id="trang-thai" value="0">
            </div>
</div>
<br>
<br>
<div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button href="" class="btn btn-sm btn-outline-secondary" id="btn-them">Thêm vào danh sách</button>
        </div>
</div>
<br>
<br>
<br>
<form method="POST" action="">
    @csrf
    <div class="table-responsive" id="tb-ds-san-pham">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>STT</td>
                    <th>Mã Đơn Hàng</th>
                    <th>Ngày Tạo</th>
                    <th>Người Tạo</th>
                    <th>Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <br>
        <br>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="submit" class="btn btn-sm btn-outline-secondary">Lưu</a>
        </div>
</div>
    </div>
</form>
@endsection

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){
        $("#btn-them").click(function(){
            var stt=$('#tb-ds-san-pham tbody tr').length+1;
            var maDonHang=$('#ma-don-hang').text();
            var ngayTao=$('#ngay').text();
            var nguoiTao=$('#nguoi-tao').text();
            var tenKH=$('#khach-hang').find(":selected").text();
            var idKH=$('#khach-hang').find(":selected").val();
            var tongTien=$('#tong-tien').val();
            var trangThai=$('#trang-thai').val();

            var row= `<tr>
            <td>${stt}</td>
            <td>${maDonHang}<input type="hidden" name="id[]" value="${maDonHang}" /></td>
            <td>${ngayTao}<input type="hidden" name="ngayTao[]" value="${ngayTao}" /></td>
            <td>${nguoiTao}<input type="hidden" name="nguoiTao[]" value="${nguoiTao}" /></td>
            <td>${tenKH}<input type="hidden" name="id[]" value="${idKH}" /></td>
            <td>${tongTien}<input type="hidden" name="thanhTien[]" value="${tongTien}" /></td>
            <td>${trangThai}<input type="hidden" name="trangThai[]" value="${trangThai}" /></td>
            </tr>`;

            $("#tb-ds-san-pham").find('tbody').append(row);
        });

    });

</script>
@endsection
