@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<h2 id="lenght1">
						<i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$name}}
					</h2>
					<span class="line"></span>
				<?php
					$id = $arNews['id'];
					$mota = $arNews['preview'];
					$name = $arNews['name'];
					$chitiet = $arNews['detail'];
					$date = $arNews['created_at'];
					$hinhanh = $arNews['picture'];
					$picUrl = asset("storage/app/files/{$hinhanh}");
					$nameSeo = str_slug($name);
					$url = route('public.chitiet',['slug' => $nameSeo,'id' => $id]);
				?>
				<h4>{{ $name }}</h4>
					<div class="news_content_left">
						<span><i class="fa fa-calendar" aria-hidden="true"></i> <?php \Carbon\Carbon::setLocale('vi') ?>
                      {{ \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans() }}</span>
					</div>
					<div class="news_content_right">
						<span><i class="fa fa-comment" aria-hidden="true"></i> <span class="fb-comments-count" data-href="{{ $url }}"></span></span> lượt bình luận
						&nbsp &nbsp <div class="fb-like" data-href="{{ $url }}" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
					</div>
					<br/><br/>
					
					<p class="noidung">{!! $chitiet !!}</p>
					<div class="fb-comments" data-href="{{$url}}" data-numposts="5" data-width="auto"></div>
					<div class="clearfix"></div>
					@if($parent > 1)
					<div class="product_lq">
						<h2>
							<i class="fa fa-lightbulb-o" aria-hidden="true"></i>CHUYÊN MỤC LIÊN QUAN
						</h2>
						<span class="line"></span>
						@foreach($arNewslienquan as $key => $arNews)
						<?php
							$id = $arNews['id'];
							$mota = $arNews['mota'];
							$name = $arNews['name'];
							$chitiet = $arNews['chitiet'];
							$date = $arNews['created_at'];
							$hinhanh = $arNews['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
							$nameSeo = str_slug($name);
							$url = route('public.chitiet',['slug' => $nameSeo,'id' => $id]);
						?>
						<div class="col-md-4 pro_main">
							<div class="pro_img">
								<a href="{{$url}}" title="{{ $nameSeo }}"><img class="img-responsive" src="{{$picUrl}}" alt="{{$nameSeo}}"></a>
							</div>
							<a href="{{$url}}"><p>{{$name}} </p></a>
						</div>
						@endforeach
					</div>
					@else
					@endif

			</div>
				@include('news.right_bar')

				</div>
		</div>	
@endsection
@section('title')
{{$name}}
@endsection