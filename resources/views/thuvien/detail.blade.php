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
					      <div class="gallery">
						@foreach($arDichVu as $key => $arItem)
							<?php
								$id = $arItem['id'];
								$hinhanh = $arItem['hinhanh'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
							?>
					        <a href="javascript:void(0)" data-caption=""><img src="{{ $picUrl }}"></a>
					    @endforeach
					      </div>
					    </div>
					</div>
	<script type="text/javascript">
	  $(document).ready( function() {
	    $(".gallery").flipping_gallery({
	      enableScroll: true,
	      autoplay: 2000
	    });
	  });
    
  </script>
			</div>
			
			@include('news.right_bar')

				</div>
		</div>
@endsection
@section('title')
Thư viện
@endsection