@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Giới thiệu
                </h1>
            </div>
            <!-- /.col-lg-12 -->
             <?php
                $id = $arGioithieu['id'];
                $content = $arGioithieu['content'];
                $chitiet = $arGioithieu['visao'];
                $name = $arGioithieu['name'];
            ?>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.gioithieu.edit',$id) }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" value="{{ $name }}" required />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="mota">{{$content}}</textarea>
                        <script type="text/javascript">ckeditor ("mota")</script>
                    </div>
                     <div class="form-group">
                        <label>Chi tiết</label>
                        <textarea class="form-control" rows="3" name="chitiet">{{$chitiet}}</textarea>
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