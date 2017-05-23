@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách User
                </h1>
            </div>
            @if( Session::get('msg') != '')
                <p style="color: red">{{ Session::get('msg') }}</p>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Họ và tên</th>
                        <th>Cấp</th>
                        <th>Mail</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id = $arItem['uid'];
                    $name = $arItem['name'];
                    $username = $arItem['username'];
                    $email = $arItem['email'];
                    $tenpq = $arItem['tenpq'];
                    $diachi = $arItem['diachi'];
                    $dienthoai = $arItem['dienthoai'];
                    $urlEdit = route('admin.users.edit', $id);
                    $urlDel  = route('admin.users.del', $id);
                ?>
                    <tr class="odd gradeX">
                        <td>{{ $id }}</td>
                        <td>{{ $username }}</td>
                        <td>{{ $name }}</td>
                        <td>{{ $tenpq }}</td>
                        <td>{{ $email }}</td>
                        <td>{{ $diachi }}</td>
                        <td>{{ $dienthoai }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{ $urlDel }}" onclick="return confirm('Bạn chắc muốn xóa không ?');" > Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ $urlEdit }}">Sửa</a></td>
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

<!-- jQuery -->

@endsection