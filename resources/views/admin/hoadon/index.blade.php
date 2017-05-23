@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách hóa đơn
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
                        <th>User</th>
                        <th width="70">T.Gian</th>
                        <th width="70">Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>T.Toán</th>
                        <th>Trạng thái</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arItems as $key => $arItem)
                <?php
                    $id = $arItem['hid'];
                    $id_user = $arItem['uid'];
                    $username = $arItem['username'];
                    $created_at = $arItem['created_at'];
                    $name = $arItem['uname'];
                    $hname = $arItem['hname'];
                    $hdiachi = $arItem['hdiachi'];
                    $email = $arItem['uemail'];
                    $hemail = $arItem['hemail'];
                    $diachi = $arItem['udiachi'];
                    $dienthoai = $arItem['udienthoai'];
                    $hdienthoai = $arItem['hdienthoai'];
                    $thanhtoan = $arItem['loaithanhtoan'];
                    $tonggia = $arItem['tonggia'];
                    $trangthai = $arItem['trangthai'];
                    $urlDel     = route('admin.hoadon.del',$id);

                ?>
                    <tr class="odd gradeX">
                        <td><a href="{{ route('admin.chitiethoadon.index', $id) }}">{{ $id }}</a></td>
                        <td>{{ $username }}</td>
                        <td>{{ $created_at }}</td>
                        @if($id_user == 4)
                        <td>{{ $hname }}</td>
                        <td>{{ $hemail }}</td>
                        <td>{{ $hdiachi }}</td>
                        <td>{{ $hdienthoai }}</td>
                        @else
                        <td>{{ $name }}</td>
                        <td>{{ $email }}</td>
                        <td>{{ $diachi }}</td>
                        <td>{{ $dienthoai }}</td>
                        @endif

                        <td>{{ $thanhtoan }}</td>
                        @if($trangthai == 0)
                        <td>
                            <a href="{{ route('admin.hoadon.trangthai', ['id' => $id, 'status' => $trangthai])}}">
                                <center><img src="{{ $url_admin }}/img/publish_x.png"></center>
                            </a>
                        </td>
                        @else
                        <td >
                            <a href="{{ route('admin.hoadon.trangthai', ['id' => $id, 'status' => $trangthai])}}"">
                                <center><img src="{{ $url_admin }}/img/tick.png"></center>
                            </a>
                        </td> 
                        @endif
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                            <a href="{{ $urlDel }}"  onclick="return confirm('Bạn chắc muốn xóa không ?');"> Xóa</a>
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