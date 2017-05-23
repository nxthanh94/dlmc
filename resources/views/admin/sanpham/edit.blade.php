@extends('templates.admin.template')

@section('main')


<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Sửa sản phẩm
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <?php
            $id = $arItems['id'];
            $name = $arItems['name'];
            $gia = $arItems['gia'];
            $mota = $arItems['mota'];
            $soluong = $arItems['soluong'];
            $id_hangsx = $arItems['id_hangsx'];
            $id_loaisp = $arItems['id_loaisp'];
            $picture = $arItems['hinhanh'];
            $picUrl     = asset("storage/app/files/{$picture}");
        ?>
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.sanpham.edit', $id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" placeholder="Vui lòng nhập tên sản phẩm" required value="{{ $name }}" />
                     @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Hãng sản xuất</label>
                    <select class="form-control" name="hsx">
                    @foreach($arHangsx as $key => $Hangsx)
                    @if($Hangsx['id'] == $id_hangsx)
                        <option selected="selected" value="{{ $Hangsx['id'] }} ">{{ $Hangsx['tenhsx'] }}</option>
                    @else
                        <option  value="{{ $Hangsx['id'] }}">{{ $Hangsx['tenhsx'] }}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select class="form-control" name="loaisp">
                    @foreach($arLoaisp as $key => $Loaisp)
                    @if($Loaisp['id'] == $id_loaisp)
                        <option selected="selected" value="{{ $Loaisp['id'] }}">{{ $Loaisp['tenloai'] }}</option>
                    @else
                        <option value="{{ $Loaisp['id'] }}">{{ $Loaisp['tenloai'] }}</option>
                    @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" name="gia" placeholder="Vui lòng nhập giá tiền" required value="{{ $gia }}" />
                     @if ($errors->Has ('gia'))
                           <p style="color:red"> {!!  $errors->First ('gia') !!} </p>
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
                    <label>Số lượng</label>
                    <input class="form-control" name="soluong" placeholder="Vui lòng nhập số lượng" required value="{{ $soluong }}" />
                     @if ($errors->Has ('soluong'))
                           <p style="color:red"> {!!  $errors->First ('soluong') !!} </p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="mota">{{ $mota }}</textarea>
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