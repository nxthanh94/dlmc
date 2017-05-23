@extends('templates.public.template')

@section('main')
				<div class="main1">
			<div class="main_one">
				<div class="one_left" id="one_left">
					<h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>GIỚI THIỆU VỀ CÔNG TY</h2>
					<p>Chào mừng đến với công ty chúng tôi</p>
					<?php
                		$arQuangCao1 = DB::table("quangcao")->where('id','=',1)->get();
                	?>
                    @foreach($arQuangCao1 as $key => $DVu)
						<?php
							$hinhanh = $DVu['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
						?>
					<div class="one_img">
						<a href="javascript:void(0)" title="">
							<img src="{{$picUrl}}" alt="">
						</a>
					</div>
					@endforeach
					<div class="one_con">
					<?php
                		$arGioithieuchung = DB::table("gioithieu")->where('id','=',1)->get();
                	?>
                    @foreach($arGioithieuchung as $key => $DVu)
						<?php
							$id = $DVu['id'];
							$content = $DVu['content'];
							$name = $DVu['name'];
							$nameSeo = str_slug($name);
							$url = route('public.gioithieu.detail',['slug' => $nameSeo,'id' => $id]);
						?>
						<p>{!!$content!!}</p>
					@endforeach
					</div>
					<div class="xem">
						<a style="text-decoration: none;" href="{{$url}}">
							<p>Chi tiết <i class="fa fa-chevron-right" aria-hidden="true"></i></p>
						</a>
					</div>
				</div>
				<div class="one_right" id="one_right">
					<h2 class="lenght1"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>TIN NỔI BẬT</h2>
					<div class="one_right_top">
						<ul>
						 @foreach($arItems as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$nameSeo = str_slug($name);
								$url = route('public.chitiet',['slug' => $nameSeo,'id' => $id]);
							?>
							<li><i class="fa fa-star" aria-hidden="true"></i><a style="color: #000; text-decoration: none;" href="{{$url}}">{{$name}}</a></li>
							@endforeach
								<div class="xem">
									<a style="text-decoration: none;color: #fff;" href="{{route('public.tintuc')}}">
										<p>Xem tất cả <i class="fa fa-chevron-right" aria-hidden="true"></i></p>
									</a>
								</div>
						</ul>
					</div>
					<?php
                		$arQuangCao = DB::table("quangcao")->where('id','=',4)->get();
                	?>
                    @foreach($arQuangCao as $key => $DVu)
						<?php
							$id = $DVu['id'];
							$name = $DVu['name'];
							$nameSeo = str_slug($name);
							$hinhanh = $DVu['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
						?>
					<div class="one_right_bot">
							<img src="{{$picUrl}}" alt="">
							@endforeach
							<div class="one_right_nd">
							<?php
		                		$arLich = DB::table("list_lich")->where('id','=',1)->get();
		                	?>
		                    @foreach($arLich as $key => $DVu)
								<?php
									$id = $DVu['id'];
									$name = $DVu['name'];
									$nameSeo = str_slug($name);
									$url = route('public.lich.danhmuc',['slug' => $nameSeo,'id' => $id]);
								?>
								<i class="fa fa-share-square-o" aria-hidden="true"></i>
								<a style="color: #9d2425;text-decoration: none;" href="{{$url}}">{{$name}}</a>
							@endforeach
								<br />
							<?php
		                		$arLich1 = DB::table("list_lich")->where('id','=',2)->get();
		                	?>
		                    @foreach($arLich1 as $key => $DVu)
								<?php
									$id = $DVu['id'];
									$name = $DVu['name'];
									$nameSeo = str_slug($name);
									$url = route('public.lich.danhmuc',['slug' => $nameSeo,'id' => $id]);
								?>
								<i class="fa fa-share-square-o" aria-hidden="true"></i>
								<a style="color: #9d2425;text-decoration: none;" href="{{$url}}">{{$name}}</a>
							@endforeach
							</div>
					</div>
					
					<div class="xem">
					<a style="text-decoration: none;color: #fff;" href="{{route('public.lich.index')}}">
						<p>Xem tất cả</p>
					</a>
					</div>
					
				</div>
			</div>
			<div class="main_two">
				<div class="two_left">
					<div class="two_left_one">
						<h2>
							<i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$nameid1}}
						</h2>
						<span class="line"></span>
						<div class="tleft">
						<?php
	                		$arCMCS1 = DB::table("dichvu")->where('id_listdv','=',1)->orderBy('id','desc')->take(1)->get();
	                	?>
	                    @foreach($arCMCS1 as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$mota = $DVu['mota'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
							?>
							<div class="tleft_top">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<img src="{{$picUrl}}" alt="">
								</a>
							</div>
							<div class="tleft_con">
								<p>{{$name}}</p>
								<span>
									{!!$mota!!}
								</span>
							</div>
						@endforeach
						</div>

						<div class="tright">
							<ul>
							@foreach($arItems1 as $key => $DVu)
								<?php
									$id = $DVu['id'];
									$name = $DVu['name'];
									$nameSeo = str_slug($name);
									$hinhanh = $DVu['picture'];
									$picUrl = asset("storage/app/files/{$hinhanh}");
									$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
								?>
								<li>
									<div class="tright_img">
										<div class="t_img">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<img src="{{$picUrl}}" alt="{{$nameSeo}}">
											</a>
										</div>
										<div class="t_con">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<p>{{$name}}</p>
											</a>
										</div>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
					<div class="two_left_one">
						<h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$nameid2}}</h2>
						<span class="line"></span>
						<div class="tleft">
							<?php
	                		$arCMCS2 = DB::table("dichvu")->where('id_listdv','=',2)->orderBy('id','desc')->take(1)->get();
	                	?>
	                    @foreach($arCMCS2 as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$mota = $DVu['mota'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
							?>
							<div class="tleft_top">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<img src="{{$picUrl}}" alt="">
								</a>
							</div>
							<div class="tleft_con">
								<p>{{$name}}</p>
								<span>
									{!!$mota!!}
								</span>
							</div>
						@endforeach
						</div>
						<div class="tright">
							<ul>
							@foreach($arItems2 as $key => $DVu)
								<?php
									$id = $DVu['id'];
									$name = $DVu['name'];
									$nameSeo = str_slug($name);
									$hinhanh = $DVu['picture'];
									$picUrl = asset("storage/app/files/{$hinhanh}");
									$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
								?>
								<li>
									<div class="tright_img">
										<div class="t_img">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<img src="{{$picUrl}}" alt="{{$nameSeo}}">
											</a>
										</div>
										<div class="t_con">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<p>{{$name}}</p>
											</a>
										</div>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
					<?php
                		$arQuangCao = DB::table("quangcao")->where('id','=',5)->get();
                	?>
                    @foreach($arQuangCao as $key => $DVu)
						<?php
							$id = $DVu['id'];
							$name = $DVu['name'];
							$nameSeo = str_slug($name);
							$hinhanh = $DVu['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
							$url = route('public.quangcao.detail',['slug' => $nameSeo,'id' => $id]);
						?>
					<div class="banner_img">
						<a href="{{$url}}" title="{{$nameSeo}}">
							<img src="{{$picUrl}}" alt="{{$nameSeo}}">
						</a>
					</div>
					@endforeach
					<div class="two_left_one">
						<h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$nameid3}}</h2>
						<span class="line"></span>
						<div class="tleft">
							<?php
	                		$arCMCS3 = DB::table("dichvu")->where('id_listdv','=',3)->orderBy('id','desc')->take(1)->get();
	                	?>
	                    @foreach($arCMCS3 as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$mota = $DVu['mota'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
							?>
							<div class="tleft_top">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<img src="{{$picUrl}}" alt="">
								</a>
							</div>
							<div class="tleft_con">
								<p>{{$name}}</p>
								<span>
									{!!$mota!!}
								</span>
							</div>
						@endforeach
						</div>
						<div class="tright">
							<ul>
							@foreach($arItems3 as $key => $DVu)
								<?php
									$id = $DVu['id'];
									$name = $DVu['name'];
									$nameSeo = str_slug($name);
									$hinhanh = $DVu['picture'];
									$picUrl = asset("storage/app/files/{$hinhanh}");
									$url = route('public.chieusang.detail1',['slug' => $nameSeo,'id' => $id]);
								?>
								<li>
									<div class="tright_img">
										<div class="t_img">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<img src="{{$picUrl}}" alt="{{$nameSeo}}">
											</a>
										</div>
										<div class="t_con">
											<a href="{{$url}}" title="{{$nameSeo}}">
												<p>{{$name}}</p>
											</a>
										</div>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
					<div class="two_left_two">
						<h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>CÔNG TRÌNH DỰ ÁN</h2>
						<span class="line"></span>
						<?php
	                		$arCongtrinh = DB::table("congtrinh")->orderBy('id','=','desc')->take(6)->get();
	                	?>
	                    @foreach($arCongtrinh as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$date = $DVu['created_at'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.duan.detail',['slug' => $nameSeo,'id' => $id]);
							?>
						<div class="t_left">
							<div class="two_left_img">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<img src="{{$picUrl}}" alt="{{$nameSeo}}">
								</a>
							</div>
							<div class="t_left_con">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<p>{{$name}}</p>
								</a>
								<span><?php \Carbon\Carbon::setLocale('vi') ?>
                      {{ \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans() }}</span>
							</div>
						</div>
						@endforeach	
					</div>
					<div class="two_left_two">
						<h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>CÁC CƠ SỞ CÔNG TY</h2>
						<span class="line"></span>
						<ul class="bxslider">
						<?php
	                		$arCoso = DB::table("coso")->orderBy('id','=','desc')->get();
	                	?>
	                    @foreach($arCoso as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.coso.detail',['slug' => $nameSeo,'id' => $id]);
							?>
							<li >
							    <a href="{{$url}}" title="{{$nameSeo}}"><img src="{{$picUrl}}"></a>
                                                            <p style="text-align: center;color: #034099;font-weight: bold;">{{$name}}</p>
							</li>
						@endforeach
						</ul>
					</div>
				</div>

				@include('news.right_bar')
			</div>
		</div>	
@endsection
@section('title')
<?php
	$arCat = DB::table("caidat")->get();
?>
@foreach($arCat as $key => $GioiThieu)
	<?php
		$name = $GioiThieu['name'];
	?>
{{$name}}
@endforeach
@endsection