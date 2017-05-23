@extends('templates.public.template')

@section('main')
<div class="main col-md-12">
			<div class="main_left1 col-md-9">
				<h3>Vì sao chọn chúng tôi</h3>

			@foreach($arItems as $key => $arItem)
			<?php
				$id = $arItem['id'];
				$visao = $arItem['visao'];
			?>
				{!! $visao !!}

			@endforeach
			</div>
			
			@include('news.right_bar')
		</div>
@endsection
@section('title')
Vì sao chọn chúng tôi
@endsection