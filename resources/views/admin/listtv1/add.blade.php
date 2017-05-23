@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm thể loại
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.listtv1.add') }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Danh mục</label>
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
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập thể loại" required />
                         @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                        @endif
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