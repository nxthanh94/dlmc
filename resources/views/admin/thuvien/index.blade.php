@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách hình ảnh
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
                        <th >Hình ảnh</th>
                        <th >Danh mục</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ThuVien as $key => $arItem)
                <?php
                    $id     = $arItem['tid'];
                    $name     = $arItem['lname'];
                    $hinhanh     = $arItem['hinhanh'];
                    $picUrl         = asset("storage/app/files/{$hinhanh}");
                    $urlDel  = route('admin.thuvien.del', $id);
                ?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $id }}</td>
                        <td>
                            @if($hinhanh != '')
                            <img src="{{ $picUrl }}" width="100px" height="60px" />
                            @else
                            <span>--Chua up hinh--</span>
                            @endif
                        </td>
                        <td>{{ $name }}</td>
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