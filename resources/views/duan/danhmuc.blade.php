@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<div class="two_left_two">
						<h2 id="lenght1"><i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$name}}</h2>
						<span class="line"></span>
						@foreach($arDichVu as $key => $arItem)
							<?php
								$id = $arItem['id'];
								$mota = $arItem['mota'];
								$chitiet = $arItem['chitiet'];
								$name = $arItem['name'];
								$date = $arItem['created_at'];
								$hinhanh = $arItem['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$nameSeo = str_slug($name);
								$url = route('public.duan.detail',['slug' => $nameSeo,'id' => $id]);
							?>
						<div class="t_left">
							<div class="two_left_img">
								<a href="{{$url}}" title="{{ $nameSeo }}">
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
				</div>

				@include('news.right_bar')
			</div>
		</div>	
		{{$arDichVu->links()}}
@endsection
@section('title')
Công trình dự án
@endsection