@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách tin 
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
                        <th >Tên tin </th>
                        <th >Danh mục </th>
                        <th>Ngày đăng</th>
                        <th >Hình ảnh</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id     = $arItem['tid'];
                    $name     = $arItem['tname'];
                    $lname     = $arItem['lname'];
                    $chitiet     = $arItem['chitiet'];
                    $date     = $arItem['created_at'];
                    $hinhanh     = $arItem['picture'];
                    $picUrl         = asset("storage/app/files/{$hinhanh}");
                    $urlDel  = route('admin.lich.del', $id);
                    $urlEdit = route('admin.lich.edit', $id);
                    $urlCT = route('admin.lich.chitiet', $id);
                ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $id }}</td>
                        <td><a href="{{ $urlCT }}">{{ $name }}</a></td>
                        <td>{{ $lname }}</td>
                        <td>{{ $date }}</td>
                        <td>
                            @if($hinhanh != '')
                            <img src="{{ $picUrl }}" width="100px" height="60px" />
                            @else
                            <span>--Chua up hinh--</span>
                            @endif
                        </td>
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