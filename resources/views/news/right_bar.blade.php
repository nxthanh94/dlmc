<div class="two_right">
					<div class="t_right">
						<h2>Tin tức và sự kiện</h2>
						<div class="two_right_img">
						<?php
                    		$arNew = DB::table("news")->orderBy('id','=','desc')->take(1)->get();
                    	?>
                        @foreach($arNew as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$preview = $DVu['preview'];
								$nameSeo = str_slug($name);
								$hinhanh = $DVu['picture'];
								$picUrl = asset("storage/app/files/{$hinhanh}");
								$url = route('public.chitiet',['slug' => $nameSeo,'id' => $id]);
							?>	
							<a href="{{$url}}" title="{{$nameSeo}}">
								<img src="{{ $picUrl }}" alt="{{$nameSeo}}">
							</a>
							<!-- <p style="color: #000;margin-top: 1em;">{{$preview}}</p> -->
						@endforeach
						</div>
						<div class="two_right_con">
							<ul>
							@foreach($arCat1 as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$nameSeo = str_slug($name);
								$url = route('public.chitiet',['slug' => $nameSeo,'id' => $id]);
							?>
								<li>
									<a href="{{$url}}" title="{{$nameSeo}}">
										<p>{{ $name}}</p>
									</a>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
					<?php
                		$arQuangCao = DB::table("quangcao")->where('id','=',2)->get();
                	?>
                    @foreach($arQuangCao as $key => $DVu)
						<?php
							$id = $DVu['id'];
							$name = $DVu['name'];
							$nameSeo = str_slug($name);
							$hinhanh = $DVu['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
							$url = route('public.quangcao.detail',['slug' => $nameSeo,'id' => $id]);
						?>
					<div class="t2_right">
						<a href="{{$url}}" title="{{$nameSeo}}">
							<img src="{{ $picUrl }}" alt="{{$nameSeo}}" style="height: 180px;">
						</a>
					</div>
					@endforeach
					<div class="t1_right">
						<h2>Thủ tục hành chính</h2>
						<ul>

						@foreach($arCat as $key => $DVu)
							<?php
								$id = $DVu['id'];
								$name = $DVu['name'];
								$date = $DVu['created_at'];
								$nameSeo = str_slug($name);
								$url = route('public.thutuc.detail',['slug' => $nameSeo,'id' => $id]);
							?>
							<li>
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<a style="color: #000; text-decoration: none;" href="{{$url}}" title="{{$nameSeo}}">
									{{$name}}
								</a>
							</li>
						@endforeach
						</ul>
					</div>
					<div class="t2_right">
						<a href="" title="">
							<img src="{{ $url_public }}/images/hotro.png" alt="">
						</a>
						<div class="t2_con">
						<?php
	                		$arCat = DB::table("caidat")->get();
	                	?>
	                    @foreach($arCat as $key => $GioiThieu)
							<?php
								$name9 = $GioiThieu['name9'];
								$name13 = $GioiThieu['name13'];
								$name14 = $GioiThieu['name14'];
								$name15 = $GioiThieu['name15'];
								$name16 = $GioiThieu['name16'];
								$name17 = $GioiThieu['name17'];
								$name18 = $GioiThieu['name18'];
							?>
							
							
							<ul>
								<li>
									<div class="hotro">
										<i class="fa fa-phone" aria-hidden="true"></i>
										{{$name14}}
										
									</div>
								</li>
								<li>
									<div class="hotro">
										<i class="fa fa-phone" aria-hidden="true"></i>
										{{$name16}}
										
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="t2_right quangcao">
						<h2>Video</h2>
						<iframe width="100%" height="100%" src="{{$name18}}" frameborder="0" allowfullscreen></iframe>
						<div class="vd_con">
							<p>{{$name17}}</p>
						</div>
						@endforeach
					</div>
					<?php
                		$arQuangCao = DB::table("quangcao")->where('id','=',3)->get();
                	?>
                    @foreach($arQuangCao as $key => $DVu)
						<?php
							$id = $DVu['id'];
							$name = $DVu['name'];
							$nameSeo = str_slug($name);
							$hinhanh = $DVu['picture'];
							$picUrl = asset("storage/app/files/{$hinhanh}");
							$url = route('public.quangcao.detail',['slug' => $nameSeo,'id' => $id]);
						?>
					<div class="t2_right quangcao">
						<a href="{{$url}}" title="{{$nameSeo}}">
							<img src="{{ $picUrl }}" alt="{{$nameSeo}}" style="height: 180px;">
						</a>
					</div>
					@endforeach
					<div class="t2_right">
						<select onchange="location = this.value;">
						<option selected="true" value="">Liên kết website</option>
						<?php
	                		$arLienket = DB::table("lienket")->get();
	                	?>
	                    @foreach($arLienket as $key => $GioiThieu)
							<?php
								$name = $GioiThieu['name'];
								$link = $GioiThieu['link'];
							?>
							<a href="{{$link}}"><option value="{{$link}}">{{$name}}</option></a>
						@endforeach
						</select>
					</div>


				</div>