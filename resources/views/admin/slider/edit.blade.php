@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm slider
            </h1>
        </div>
        <!-- /.col-lg-12 -->
         <?php
            $id = $arNews['id'];
            $name = $arNews['name'];
            $mota = $arNews['content'];
            $picture = $arNews['hinhanh'];
            $picUrl     = asset("storage/app/files/{$picture}");
        ?>
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.slider.edit',$id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Vui lòng nhập tên sản phẩm" required value="{{$name}}" />
                    @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                    @endif
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
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="chitiet">{!!$mota!!}</textarea>
                    <script type="text/javascript">ckeditor ("chitiet")</script>
                     @if ($errors->Has ('mota'))
                           <p style="color:red"> {!!  $errors->First ('mota') !!} </p>
                        @endif
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