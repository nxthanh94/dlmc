@extends('templates.public.template')

@section('main')
<div class="main col-md-12">
			<div class="main_left1 col-md-9">
				<h3>Giới thiệu</h3>
                         @foreach($arItems as $key => $arItem)
			<?php
				$id = $arItem['id'];
				$content = $arItem['content'];
			?>
				{!! $content !!}

			@endforeach
			
			</div>
			
			@include('news.right_bar')
		</div>
@endsection
@section('title')
Giới thiệu
@endsection