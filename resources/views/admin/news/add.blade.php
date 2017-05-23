@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm tin tức
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.news.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên tin tức</label>
                    <input class="form-control" name="name" placeholder="Vui lòng nhập tên tin tức" required />
                </div>
                 <div class="form-group">
                    <label>Loại tin tức </label>
                    <select class="form-control" name="id_list">
                    @foreach($arQCao as $key => $arQC)
                    <?php
                        $id = $arQC['id'];
                        $name = $arQC['name'];
                    ?>
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" name="mota" placeholder="Vui lòng nhập mô tả" required />
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="picture">
                </div>
                <div class="form-group">
                    <label>Chi tiết</label>
                    <textarea class="form-control" rows="3" name="chitiet">Vui lòng nhập chi tiết</textarea>
                    <script type="text/javascript">ckeditor ("chitiet")</script>
                </div>
                <button type="submit" class="btn btn-default">Thêm</button>
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