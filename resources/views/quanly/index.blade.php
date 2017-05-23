@extends('templates.public.template')

@section('main')
<div class="main col-md-12">
			<div class="main_left1 col-md-9">
				<h3>Quản lý Chất Lượng & Các Tiêu Chuẩn</h3>
				<?php
					$id = $arNews['id'];
					$name = $arNews['name'];
					$nameSeo = str_slug($name);
					$mota = $arNews['mota'];
					$chitiet = $arNews['chitiet'];
					$date = $arNews['created_at'];
					$hinhanh = $arNews['picture'];
					$picUrl = asset("storage/app/files/{$hinhanh}");
					$url = route('public.quanly.detail1',['slug' => $nameSeo,'id' => $id]);
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
					<p>{!! $mota !!}</p><br /> <br/>
					<center><img class="img-responsive" src="{{ $picUrl }}" alt="{{ $nameSeo }}"></center><br /> <br/>
					<p class="noidung">{!! $chitiet !!}</p>
					<div class="fb-comments" data-href="{{$url}}" data-numposts="5" data-width="auto"></div>
					<div class="clearfix"></div>
			</div>
			
			@include('news.right_bar')
		</div>
@endsection
@section('title')
{{$name}}
@endsection