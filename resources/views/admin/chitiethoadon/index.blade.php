@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Chi tiết hóa đơn
                </h1>
                @if(Session::get('msg') != "")
                <p style="color: red">{{ Session::get('msg') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                
                @foreach($arItems as $key => $arItem)
                <?php
                    $id = $arItem['id'];
                    $id_sp = $arItem['id_sp'];   
                    $id_hoadon = $arItem['id_hoadon'];   
                    $soluong = $arItem['soluong'];   
                    $arSanpham = DB::table('sanpham')->where('id','=',$id_sp)->first();
                    $name = $arSanpham['name'];
                    $gia1 = $arSanpham['gia'];
                    $gia = number_format($gia1,0,'','.');
                    $thanhtien = $soluong*$gia1;
                    $thanh_tien = number_format($thanhtien,0,'','.');

                ?>
                    <tr class="odd gradeX">
                        <td>{{ $name }}</td>
                        <td>{{ $gia }}</td>
                        <td>{{ $soluong }}</td>
                        <td>{{ $thanh_tien }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tbody>
                    <tr>
                        <th colspan="3">Tổng tiền</th>
                        <th colspan="1">{{ $tong_gia }} VNĐ</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


@endsection