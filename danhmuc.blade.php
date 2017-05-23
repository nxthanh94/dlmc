@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<h2>
						<i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$name}}
					</h2>
					<span class="line"></span>
					<div class="main_left_co">
					    <div class="page_container">
					    @foreach($arDichVu as $key => $arItem)
							<?php
								$id = $arItem['id'];
								$name = $arItem['name'];
								$nameSeo = str_slug($name);
								$url = route('public.thuvien.detail',['slug' => $nameSeo,'id' => $id]);
							?>
							
							<div class="page_img">
								<a href="{{$url}}">
								<?php 
									$arCat12 = DB::table('thuvien as t')
									->join('list_thuvien1 as l','t.id_list','=','l.id')
									->select('*','l.name as lname','t.id as tid','l.id as lid')
									->take(1)->get();
								?>
								@foreach($arCat12 as $key => $arItem12)
								<?php 
									$hinhanh = $arItem12['hinhanh'];
									$picUrl = asset("storage/app/files/{$hinhanh}");
								?>
									<img src="{{$picUrl}}">
								@endforeach
								</a>
								<a href="{{$url}}">{{$name}}</a>
							</div>
						@endforeach
					    </div>
					</div>
	
			</div>
			
			@include('news.right_bar')

				</div>
		</div>
@endsection
@section('title')
Thư viện
@endsection