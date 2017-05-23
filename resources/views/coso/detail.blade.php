@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<h2 id="lenght1">
						<i class="fa fa-lightbulb-o" aria-hidden="true"></i>CÁC CƠ SỞ CÔNG TY
					</h2>
					<span class="line"></span>
				<?php
					$id = $arNews['id'];
					$mota = $arNews['mota'];
					$name = $arNews['name'];
					$chitiet = $arNews['chitiet'];
					$hinhanh = $arNews['picture'];
					$picUrl = asset("storage/app/files/{$hinhanh}");
					$nameSeo = str_slug($name);
					$url = route('public.coso.detail',['slug' => $nameSeo,'id' => $id]);
				?>
				<h4>{{ $name }}</h4>
					<br/>
					<p>{!! $mota !!}</p><br /> <br/>
					<center><img class="img-responsive" src="{{ $picUrl }}" alt="{{ $nameSeo }}"></center><br /> <br/>
					<p class="noidung">{!! $chitiet !!}</p>
					<div class="fb-comments" data-href="{{$url}}" data-numposts="5" data-width="auto"></div>
					<div class="clearfix"></div>

			</div>
				@include('news.right_bar')

				</div>
		</div>	
@endsection
@section('title')
{{$name}}
@endsection