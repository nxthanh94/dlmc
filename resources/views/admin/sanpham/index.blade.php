@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách sản phẩm
                </h1>
                @if( Session::get('msg') != '')
                    <p style="color: red">{{ Session::get('msg') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th width="70">Tên sản phẩm</th>
                        <th>Hãng</th>
                        <th>Loại</th>
                        <th width="90">Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id     = $arItem['sid'];
                    $name     = $arItem['name'];
                    $tenhsx     = $arItem['tenhsx'];
                    $tenloai     = $arItem['tenloai'];
                    $hinhanh     = $arItem['hinhanh'];
                    $picUrl         = asset("storage/app/files/{$hinhanh}");
                    $soluong     = $arItem['soluong'];
                    $gia     = $arItem['gia'];
                    $urlDel  = route('admin.sanpham.del', $id);
                    $urlEdit = route('admin.sanpham.edit', $id);
                ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $id }}</td>
                        <td><a href="{{ route('admin.sanpham.mota', $id) }}">{{ $name }}</a></td>
                        <td>{{ $tenhsx }}</td>
                        <td>{{ $tenloai }}</td>
                        <td>
                            @if($hinhanh != '')
                            <img src="{{ $picUrl }}" width="100px" height="60px" />
                            @else
                            <span>--Chua up hinh--</span>
                            @endif
                        </td>
                        <td>{{ $soluong }}</td>
                        <td>{{ $gia }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="{{ $urlDel }}" onclick="return confirm('Bạn chắc muốn xóa không ?');"> Xóa</a>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i>
                            <a href="{{ $urlEdit }}">Sửa</a>
                        </td>
                    </tr>
                @endforeach
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