@extends('templates.public.template')
@section('main')
		<br />
		<div class="contact col-md-12">
			<div class="contact_left col-md-3">
				<div class="address">
                    <h3>Thông tin</h3>
                    <table>
                    <?php
                		$arCat = DB::table("caidat")->get();
                	?>
                    @foreach($arCat as $key => $GioiThieu)
						<?php
							$diachi = $GioiThieu['name8'];
							$phone = $GioiThieu['name9'];
							$mail = $GioiThieu['name11'];
							$tel = $GioiThieu['name10'];
						?>
                    	<tr>
                    		<td width="25%">Địa chỉ</td>
                    		<td>{{ $diachi }}</td>
                    	</tr>
                    	<tr>
                    		<td>Moblie</td>
                    		<td>{{ $phone }}</td>
                    	</tr>
                    	<tr>
                    		<td>Fax</td>
                    		<td>{{ $tel }}</td>
                    	</tr>
                    	<tr>
                    		<td>Email</td>
                    		<td><a href="mailto:{{ $mail }}">{{ $mail }}</a></td>
                    	</tr>
                    @endforeach
                    </table>
                </div>
			</div>
			<div class="contact_right col-md-9">
				<h3>Thông tin phản hồi</h3>
				 @if(Session::get('msg') != "")
                	<p style="color: red">{{ Session::get('msg') }}</p>
            	@endif
				<p>Xin vui lòng điền đầy đủ các thông tin vào form dưới đây và gửi cho chúng tôi. Chúng tôi sẽ trả lời bạn sau khi nhận được.</p>
				<p>Xin chân thành cảm ơn!</p>
				<form action="{{ route('public.lienhe') }}" method="post">
				{{ csrf_field() }}
					<div class="form-group ">
					  <label for="usr">Họ và tên(<font color="red">*</font>):</label>
					  <input class="form-control" name="name" type="text" placeholder="Họ và tên" required/>
					</div>
                    <div class="form-group">
					  <label for="usr">Số điện thoại(<font color="red">*</font>):</label>
					  <input class="form-control" name="phone" type="text" placeholder="Số điện thoại"  required />
					</div>
					<div class="form-group">
					  <label for="usr">Email(<font color="red">*</font>):</label>
					  <input class="form-control" name="email" type="text"  placeholder="Email"  required />
					</div>
					<div class="form-group">
					  <label for="usr">Nội dung(<font color="red">*</font>):</label>
					  <textarea  class="form-control" rows="5" name="noidung" placeholder="Nội dung"></textarea>
					</div>
                    <input class="btn btn-default" type="submit" value="Gửi đi">
                    <input class="btn btn-default" type="reset" value="Nhập lại">
                </form>					
			</div>
		</div>
		<div class="clearfix"></div>
@endsection
@section('title')
Liên hệ
@endsection