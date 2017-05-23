@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<h2 id="lenght1">
						<i class="fa fa-lightbulb-o" aria-hidden="true"></i>THỦ TỤC HÀNH CHÍNH
					</h2>
					<span class="line"></span>
					@foreach($arItems as $key => $arItem)
					<?php
						$id = $arItem['id'];
						$mota = $arItem['mota'];
						$chitiet = $arItem['chitiet'];
						$name = $arItem['name'];
						$date = $arItem['created_at'];
						$hinhanh = $arItem['picture'];
						$picUrl = asset("storage/app/files/{$hinhanh}");
						$nameSeo = str_slug($name);
						$url = route('public.thutuc.detail',['slug' => $nameSeo,'id' => $id]);
					?>
					
						<div class="main_left_co">
							<div class="main_img">
								<a href="{{$url}}" title="{{$nameSeo}}">
									<img src="{{ $picUrl}}" alt="{{$nameSeo}}">
								</a>
							</div>
							<div class="main_content">
								<a href="{{$url}}" title="{{$nameSeo}}"><p>{{$name}}</p></a>
								<span>Ngày đăng:  <?php \Carbon\Carbon::setLocale('vi') ?>
                      {{ \Carbon\Carbon::createFromTimeStamp(strtotime($date))->diffForHumans() }} / Bình luận : <span class="fb-comments-count" data-href="{{ $url }}"></span></span>
								<div class="content_body">
									<p>{!! $mota!!}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				@include('news.right_bar')

				</div>
		</div>	
		{{$arItems->links()}}
@endsection
@section('title')
Thủ tục hành chính
@endsection