@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa dịch vụ
            </h1>
        </div>
        <?php
            $id = $arNews['id'];
            $name = $arNews['name'];
            $id_listdv = $arNews['id_listdv'];
            $mota = $arNews['mota'];
            $chitiet = $arNews['chitiet'];
            $picture = $arNews['picture'];
            $picUrl     = asset("storage/app/files/{$picture}");
        ?>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.dichvu.edit',$id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên dịch vụ</label>
                    <input class="form-control" name="name" value="{{ $name }}" required />
                </div>
               <div class="form-group">
                    <label>Loại dịch vụ</label>
                    <select class="form-control" name="id_cot">
                    @foreach($arQCao as $key => $arQC)
                    @if($arQC['id'] == $id_listdv)
                        <option selected="selected" value="{{ $arQC['id'] }} ">{{ $arQC['name'] }}</option>
                    @else
                        <option  value="{{ $arQC['id'] }}">{{ $arQC['name'] }}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input class="form-control" name="mota" placeholder="Vui lòng nhập mô tả" value="{{ $mota }}" required />
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
                    <textarea class="form-control" rows="3" name="chitiet">{!! $chitiet !!}</textarea>
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