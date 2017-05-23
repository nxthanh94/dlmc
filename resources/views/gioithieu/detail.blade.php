@extends('templates.public.template')

@section('main')
<div class="main1">
			
	<div class="main_two">
		<div class="two_left">
		<?php
				$id = $arNews['id'];
				$visao = $arNews['visao'];
				$name = $arNews['name'];
			?>
			<h2>
				<i class="fa fa-lightbulb-o" aria-hidden="true"></i>{{$name}}
			</h2>
			<span class="line"></span>
			
				{!! $visao !!}

		</div>
		@include('news.right_bar')

	</div>
</div>	
@endsection
@section('title')
Giới thiệu
@endsection