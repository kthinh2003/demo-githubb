@extends('master')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">DANH SÁCH PHIẾU NHẬP</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="" class="btn btn-sm btn-outline-secondary">Thêm vào danh sách</a>
        </div>
    </div>
</div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <label for="" class="form-label"> NHÀ CUNG CẤP</label>
                <select name="ncc" class="form-select" aria-label="Default select example" id="ncc">
                    <option selected>Chọn nhà cung cấp</option>
                    @foreach($dsNhaCungCap as $nhaCungCap)
                    <option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-6">
                <label for="nhan_vien" class="form-label">Nhân viên</label>
                <select name="nhan_vien" class="form-select" aria-label="Default select example" id="nhan-vien">
                @foreach($dsnhanVien as $nhanVien)
                    <option value="{{ $nhanVien->id }}">{{ $nhanVien->tai_khoan }}</option>
                @endforeach
                </select>
                <span class="error" id="error-san-pham">Vui lòng chọn sản phẩm</span>
            </div>S
        </div> --}}

        <div class="row">
            <div class="col-md-6">
                <label for="ngay_nhap" class="form-label">NGÀY NHẬP</label>
                <input type="text" name="ngay_nhap" class="form-control" id="ngay_nhap" >
            </div>
            </div>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">DANH SÁCH PHIẾU NHẬP</h1>
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
                <label for="so-luong" class="form-label">Số lượng:</label>
                <input type="number" name="so_luong" class="form-control" id="so-luong" value="0">
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="gia-nhap" class="form-label">Giá nhập:</label>
                <input type="number" name="gia_nhap" class="form-control" id="gia-nhap" value="0">
            </div>
</div>
<div class="row">
            <div class="col-md-6">
                <label for="gia-ban" class="form-label">Giá bán:</label>
                <input type="number" name="gia_ban" class="form-control" id="gia-ban" value="0">
            </div>
</div>
        <div class="row">
            <div class="col-md-6">
                <label for="trang_thai" class="form-label">TRẠNG THÁI</label>
                <input type="text" name="trang_thai" class="form-control" id="trang_thai">
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
        <div class="table-responsive">
        <table class="table table-striped table-sm" id="tb-ds-sanpham">
            <thead>
                <tr>
                    <th>STT</td>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá Nhập</th>
                    <th>Giá Bán</th>
                    <th>Thanh tien</th>
                </tr>
            </thead>
            <tbody>
            <tbody>
        </table>
    </div>
    <br/>
    <br/>
    <input type="hidden" name="ncc" value="1"/>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="submit" class="btn btn-sm btn-outline-secondary">Lưu</a>
        </div>
    </form>
    @endsection
    @section('page-js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn-them").click(function(){
                var stt=$('#tb-ds-san-pham tbody tr').length+1;
                var tenSP=$('#san_pham').find(":selected").text();
                var idSP=$('#san_pham').find(":selected").val();
                var soLuong=$('#so-luong').val();
                var giaNhap=$('#gia-nhap').val();
                var giaBan=$('#gia-ban').val();
                var thanhTien=soLuong*giaNhap;

                var row= `<tr>
                <td>${stt}</td>
                <td>${tenSP}<input type="hidden" name="id[]" value="${idSP}" /></td>
                <td>${soLuong}<input type="hidden" name="soLuong[]" value="${soLuong}" /></td>
                <td>${giaNhap}<input type="hidden" name="giaNhap[]" value="${giaNhap}" /></td>
                <td>${giaBan}<input type="hidden" name="giaBan[]" value="${giaBan}" /></td>
                <td>${thanhTien}<input type="hidden" name="thanhTien[]" value="${thanhTien}" /></td>
                </tr>`;

                $("#tb-ds-san-pham").find('tbody').append(row);
            });

        });

    </script>
@endsection
