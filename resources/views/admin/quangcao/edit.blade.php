@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa quảng cáo
            </h1>
        </div>
        <?php
            $id = $arNews['id'];
            $name = $arNews['name'];
            $mota = $arNews['mota'];
            $id_cot = $arNews['id_cot'];
            $chitiet = $arNews['detail'];
            $picture = $arNews['picture'];
            $picUrl     = asset("storage/app/files/{$picture}");
        ?>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.quangcao.edit',$id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Tên quảng cáo</label>
                    <input class="form-control" name="name" value="{{ $name }}" required />
                </div>
               <div class="form-group">
                    <label>Cột</label>
                    <select class="form-control" name="id_cot">
                    @foreach($arQCao as $key => $arQC)
                    @if($arQC['id'] == $id_cot)
                        <option selected="selected" value="{{ $arQC['id'] }} ">{{ $arQC['name'] }}</option>
                    @else
                        <option  value="{{ $arQC['id'] }}">{{ $arQC['name'] }}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="picture">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="mota">{!! $mota !!}</textarea>
                    <script type="text/javascript">ckeditor ("mota")</script>
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