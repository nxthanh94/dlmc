@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm sản phẩm
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.sanpham.add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Vui lòng nhập tên sản phẩm" required />
                    @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Hãng sản xuất</label>
                    <select class="form-control" name="hsx">
                    @foreach($arHangsx as $key => $Hangsx)
                    <?php
                        $id = $Hangsx['id'];
                        $tenhsx = $Hangsx['tenhsx'];
                    ?>
                        <option value="{{ $id }}">{{ $tenhsx }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="loaisp">
                    @foreach($arLoaisp as $key => $Loaisp)
                    <?php
                        $id = $Loaisp['id'];
                        $tenloai = $Loaisp['tenloai'];
                    ?>
                        <option value="{{ $id }}">{{ $tenloai }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" name="gia" placeholder="Vui lòng nhập giá tiền" />
                     @if ($errors->Has ('gia'))
                           <p style="color:red"> {!!  $errors->First ('gia') !!} </p>
                        @endif
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="picture">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input class="form-control" name="soluong" placeholder="Vui lòng nhập số lượng" required />
                     @if ($errors->Has ('soluong'))
                           <p style="color:red"> {!!  $errors->First ('soluong') !!} </p>
                        @endif
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="mota">Vui lòng nhập mô tả</textarea>
                     @if ($errors->Has ('mota'))
                           <p style="color:red"> {!!  $errors->First ('mota') !!} </p>
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