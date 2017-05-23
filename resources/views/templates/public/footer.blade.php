
		<div class="clearfix"></div>
		<div class="footer ">
			<div class="lienhe ">
				<h3>Công ty Quản lý vận hành điện chiếu sáng công cộng Đà Nẵng</h3>
				<ul>
				<?php
            		$arCat = DB::table("caidat")->get();
            	?>
                @foreach($arCat as $key => $GioiThieu)
					<?php
						$name7 = $GioiThieu['name7'];
						$name8 = $GioiThieu['name8'];
						$name9 = $GioiThieu['name9'];
						$name10 = $GioiThieu['name10'];
						$name11 = $GioiThieu['name11'];
					?>
					<li>Địa Chỉ: {{$name8}} </li>
					<li>Điện thoại: {{$name9}}</li>
					<li>Fax : {{$name10}}</li>
					<li>Email:  {{$name11}}</li>
					<li>Website: <a style="color:#fff;text-decoration: none;" href="http://dlmc.com.vn">www.dlmc.com.vn</a></li>
				</ul>
			</div>
			<div class="lienket">
				<div id="map_canvas">
					
				</div>
			</div>
		</div>
		<div class="end">
			<p>{{$name7}} &nbsp|&nbsp Cung cấp bởi <a style="text-decoration: none;color: red;" href="http://ngoisaovietmedia.com">Vietstar media</a></p>
		</div>
		@endforeach
	</div>
</body>
<script type="text/javascript">
/ <![CDATA[ /
var google_conversion_id = 869788428;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/ ]]> /
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/869788428/?guid=ON&amp;script=0"/>
</div>
</noscript>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1873419896211314";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</html>