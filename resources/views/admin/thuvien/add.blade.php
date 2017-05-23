@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm hình ảnh
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.thuvien.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
               
                <div class="form-group">
                    <label>Danh mục </label>
                    <select class="form-control" name="id_list1" id="loaitin">
                    @foreach($arQCao1 as $key => $arQC1)
                    <?php
                        $id1 = $arQC1['id'];
                        $name1 = $arQC1['name'];
                    ?>
                        <option value="{{ $id1 }}">{{ $name1 }}</option>
                    @endforeach
                    </select>
                </div>
            @for($i = 1; $i <= 9; $i++)
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="picture[]">
                </div>
            @endfor
                
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