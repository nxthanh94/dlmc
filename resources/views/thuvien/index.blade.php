@extends('templates.public.template')

@section('main')
<div class="main1">
			
			<div class="main_two">
				<div class="two_left">
					<h2>
						<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
					</h2>
					<span class="line"></span>
					<div class="main_left_co">
					    <div class="page_container">
					      <div class="gallery">
					        <a href="#" data-caption="Trekking in Chhomrong, Himalayas, Nepal"><img src="{{ $url_public }}/images/logo.png"></a>
					        <a href="#" data-caption="Ghandruk, getting a good feel of the local"><img src="{{ $url_public }}/images/logo.png"></a>
					        <a href="#" data-caption="Ghandruk, getting a good feel of the local"><img src="{{ $url_public }}/images/logo.png"></a>
					        <a href="#" data-caption="Ghandruk, getting a good feel of the local"><img src="{{ $url_public }}/images/logo.png"></a>
					        <a href="#" data-caption="Ghandruk, getting a good feel of the local"><img src="{{ $url_public }}/images/logo.png"></a>
					      </div>
					    </div>
					</div>
	<script type="text/javascript">
	  $(document).ready( function() {
	    $(".gallery").flipping_gallery({
	      enableScroll: true,
	      autoplay: 500
	    });
	  });
    
  </script>
			</div>
			
			@include('news.right_bar')

				</div>
		</div>
@endsection
@section('title')
@endsection