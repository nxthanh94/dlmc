@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách liên hệ
                </h1>
                @if( Session::get('msg') != '')
                    <p style="color: red">{{ Session::get('msg') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Email</th>
                        <th>Tin nhắn</th>
                        <th>Thời gian</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id         = $arItem['id'];
                    $name       = $arItem['name'];
                    $email      = $arItem['email'];
                    $diachi     = $arItem['diachi'];
                    $dienthoai  = $arItem['dienthoai'];
                    $noidung    = $arItem['noidung'];
                    $created_at = $arItem['created_at'];
                    $urlDel     = route('admin.lienhe.del', $id);
                ?>
                    <tr class="odd gradeX" >
                        <td>{{ $id }}</td>
                        <td>{{ $name }}</td>
                        <td>{{ $diachi }}</td>
                        <td>{{ $dienthoai }}</td>
                        <td>{{ $email }}</td>
                        <td>{{ $noidung }}</td>
                        <td>{{ $created_at }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="{{ $urlDel }}" onclick="return confirm('Bạn chắc muốn xóa không ?');"> Xóa</a>
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