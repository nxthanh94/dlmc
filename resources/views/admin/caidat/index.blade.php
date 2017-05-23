@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cài đặt
                </h1>
                @if( Session::get('msg') != '')
                    <p style="color: red">{{ Session::get('msg') }}</p>
                @endif
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Mô tả</th>
                        <th>Key</th>
                        <th>Facebook</th>
                        <th>Youtobe</th>
                        <th>Skype</th>
                        <th>Twitter</th>
                        <th>Copy right</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Bản đồ</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id         = $arItem['id'];
                    $tenloai    = $arItem['name'];
                    $tenloai1    = $arItem['name1'];
                    $tenloai2    = $arItem['name2'];
                    $tenloai3    = $arItem['name3'];
                    $tenloai4    = $arItem['name4'];
                    $tenloai5    = $arItem['name5'];
                    $tenloai6    = $arItem['name6'];
                    $tenloai7    = $arItem['name7'];
                    $tenloai8    = $arItem['name8'];
                    $tenloai9    = $arItem['name9'];
                    $tenloai10    = $arItem['name10'];
                    $tenloai11    = $arItem['name11'];
                    $tenloai12    = $arItem['name12'];
                    $urlDel     = route('admin.caidat.del', $id);
                    $urlEdit    = route('admin.caidat.edit', $id);
                ?>
                    <tr class="odd gradeX">
                        <td>{{ $tenloai }}</td>
                        <td>{{ $tenloai1 }}</td>
                        <td>{{ $tenloai2 }}</td>
                        <td>{{ $tenloai3 }}</td>
                        <td>{{ $tenloai4 }}</td>
                        <td>{{ $tenloai5 }}</td>
                        <td>{{ $tenloai6 }}</td>
                        <td>{{ $tenloai7 }}</td>
                        <td>{{ $tenloai8 }}</td>
                        <td>{{ $tenloai9 }}</td>
                        <td>{{ $tenloai10 }}</td>
                        <td>{{ $tenloai11 }}</td>
                        <td>{{ $tenloai12 }}</td>
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