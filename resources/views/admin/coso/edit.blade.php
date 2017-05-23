@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa cơ sở công ty
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <?php
            $id = $arNews['id'];
            $name = $arNews['name'];
            $mota = $arNews['mota'];
            $chitiet = $arNews['chitiet'];
            $picture = $arNews['picture'];
            $picUrl     = asset("storage/app/files/{$picture}");
        ?>
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.coso.edit', $id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên tin tức</label>
                    <input class="form-control" name="name" placeholder="Vui lòng nhập tên tin tức" required value="{{ $name }}"/>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" name="mota" placeholder="Vui lòng nhập mô tả" required value="{{ $mota }}" />
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="picture">
                </div>
                <div class="form-group">
                    <label>Ảnh cũ</label>
                    <img src="{{ $picUrl }}" width="100px" />
                </div>
                <div class="form-group">
                    <label>Chi tiết</label>
                    <textarea class="form-control" rows="3" name="chitiet">{{ $chitiet }}</textarea>
                    <script type="text/javascript">ckeditor ("chitiet")</script>
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