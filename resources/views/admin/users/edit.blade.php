@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa User
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php
                $id         = $arUsers['id'];
                $username   = $arUsers['username'];
                $name   = $arUsers['name'];
                $password   = $arUsers['password'];
                $email   = $arUsers['email'];
                $diachi   = $arUsers['diachi'];
                $dienthoai   = $arUsers['dienthoai'];
                $id_phanquyen   = $arUsers['id_phanquyen'];
            ?>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.users.edit', $id) }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" readonly="" class="form-control" name="username" placeholder="Vui lòng nhập Username" value="{{ $username }}" required  />
                        @if ($errors->Has ('username'))
                           <p style="color:red"> {!!  $errors->First ('username') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password" placeholder="Vui lòng nhập mật khẩu" value=""  />
                         @if ($errors->Has ('password'))
                           <p style="color:red"> {!!  $errors->First ('password') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Vui lòng nhập họ tên" value="{{ $name }}" required />
                         @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Vui lòng nhập Email" value="{{ $email }}" required />
                         @if ($errors->Has ('email'))
                           <p style="color:red"> {!!  $errors->First ('email') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="diachi" placeholder="Vui lòng nhập địa chỉ" value="{{ $diachi }}" required />
                         @if ($errors->Has ('diachi'))
                           <p style="color:red"> {!!  $errors->First ('diachi') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" name="sdt" placeholder="Vui lòng nhập số điện thoại" value="{{ $dienthoai }}" required />
                        @if ($errors->Has ('sdt'))
                           <p style="color:red"> {!!  $errors->First ('sdt') !!} </p>
                        @endif
                    </div>
                    
                    <div class="form-group" >
                       
                        <label>Cấp</label>
                        @if(Auth::user()->id_phanquyen == 1)
                        <label class="radio-inline">
                            <input name="phanquyen" value="1"  type="radio" >Admin
                        </label>

                        <label class="radio-inline">
                            <input name="phanquyen" value="2" type="radio"  >Mod
                        </label>
                        <label class="radio-inline">
                            <input name="phanquyen" value="3" checked="" type="radio"  />Member
                        </label>
                        @else
                         <label class="radio-inline">
                            <input name="phanquyen" value="2" type="radio"  >Mod
                        </label>
                        <label class="radio-inline">
                            <input name="phanquyen" value="3" checked="" type="radio"  />Member
                        </label>
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