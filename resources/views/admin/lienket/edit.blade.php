@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa liên kết
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php
                $id = $arLoaisp['id'];
                $tenloai = $arLoaisp['name'];
                $link = $arLoaisp['link'];
            ?>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.lienket.edit', $id) }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập tên" required value="{{ $tenloai }}" />
                         @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="link" placeholder="Vui lòng nhập tên" required value="{{ $link }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@endsection