@extends('templates.admin.template')

@section('main')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm 
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{ route('admin.caidat.add') }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label>Thẻ title</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập thẻ title"  />
                         @if ($errors->Has ('name'))
                           <p style="color:red"> {!!  $errors->First ('name') !!} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Thẻ meta mô tả</label>
                        <input class="form-control" name="name1" placeholder="Vui lòng nhập thẻ meta"  />
                    </div>
                    <div class="form-group">
                        <label>Thẻ meta keywords</label>
                        <input class="form-control" name="name2" placeholder="Vui lòng nhập thẻ meta"  />
                    </div>
                    <div class="form-group">
                        <label>Link facebook</label>
                        <input class="form-control" name="name3" placeholder="Vui lòng nhập link facebook"  />
                    </div>
                    <div class="form-group">
                        <label>Link youtobe</label>
                        <input class="form-control" name="name4" placeholder="Vui lòng nhập link youtobe"  />
                    </div>
                    <div class="form-group">
                        <label>Link skype</label>
                        <input class="form-control" name="name5" placeholder="Vui lòng nhập link skype"  />
                    </div>
                    <div class="form-group">
                        <label>Link twitter</label>
                        <input class="form-control" name="name6" placeholder="Vui lòng nhập link twitter"  />
                    </div>
                    <div class="form-group">
                        <label>Footer copy right</label>
                        <input class="form-control" name="name7" placeholder="Vui lòng nhập copy right"  />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="name8" placeholder="Vui lòng nhập "  />
                    </div>
                    <div class="form-group">
                        <label>SĐT</label>
                        <input class="form-control" name="name9" placeholder="Vui lòng nhập "  />
                    </div>
                    <div class="form-group">
                        <label>Tel</label>
                        <input class="form-control" name="name10" placeholder="Vui lòng nhập "  />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="name11" placeholder="Vui lòng nhập "  />
                    </div>
                    <div class="form-group">
                        <label>Bản đồ</label>
                        <input class="form-control" name="name12" placeholder="Ví dụ: 16.084624,108.109306 "  />
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