<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta seo -->
    <?php
        $arCat = DB::table("caidat")->get();
    ?>
    @foreach($arCat as $key => $GioiThieu)
        <?php
            $name1 = $GioiThieu['name1'];
            $name2 = $GioiThieu['name2'];
        ?>
    <meta name="description" content="{!!$name1!!}" />
    <meta name="keywords" content="{!!$name2!!}" />
    @endforeach
    <!-- Meta seo -->
    <!-- Link icon -->
    <link href="{{ $url_public }}/images/logo.png" rel="shortcut icon" type="image/x-icon" />
    <!-- Link icon -->
    <link href="{{ $url_public }}/css/reset.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/style.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/style1.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/flipping_gallery.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/elusive-webfont.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/menu.css" type="text/css" rel="stylesheet" />
    <link href="{{ $url_public }}/css/slider.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="{{ $url_public }}/js/slider.js"></script>
    <!-- bxSlider Javascript file -->
    <script src="{{ $url_public }}/js/jquery.bxslider.min.js"></script>
    <script src="{{ $url_public }}/js/jquery.flipping_gallery.js"></script>
    
    <!-- bxSlider CSS file -->
    <link href="{{ $url_public }}/js/jquery.bxslider.css" rel="stylesheet" />
    <!-- <script type="text/javascript">
        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var bodyWidth = document.body.clientWidth;
            if (bodyWidth)
                jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
    </script> -->
    <script type="text/javascript">
        $(document).ready(function(){
          $('.slider4').bxSlider({
            slideWidth: 275,
            minSlides: 2,
            maxSlides: 4,
            moveSlides: 1,
            auto: true,
            pager: false,
            slideMargin: 14
          });
        });             
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('ul.nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        }, function() {
          $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        });
    });     
    </script>
    <script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBVKrdPwfYZpv9qzUSSTwAxNt2u-ozJMww&sensor=false"></script>
    <script>
        function initialize() {
            var myLatlng = new google.maps.LatLng(<?php
                $arCat = DB::table("caidat")->get();
            ?>
            @foreach($arCat as $key => $GioiThieu)
                <?php
                    $name12 = $GioiThieu['name12'];
                ?>
                {!!$name12!!}@endforeach);
            
            var mapOptions = {
                zoom: 14,
                center: myLatlng
            };
 
            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
            <?php
                $arCat = DB::table("caidat")->get();
            ?>
            @foreach($arCat as $key => $GioiThieu)
                <?php
                    $diachi = $GioiThieu['name8'];
                ?>
           var contentString = "<table><tr><th>Công ty Quản lý vận hành điện chiếu sáng công cộng Đà Nẵng </th></tr><tr><td>Địa chỉ: {{$diachi}}</td></tr></table>";
           @endforeach
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
 
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Công ty Quản lý vận hành điện chiếu sáng công cộng Đà Nẵng'
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            minSlides: 1,
            maxSlides: 5,
            slideWidth: 210,
            slideMargin: 0,
            ticker: true,
            speed: 50000,
            slideMargin: 20
        });
    });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var h = document.getElementById("one_right").offsetHeight;
    		var l = document.getElementById("one_left").offsetHeight;
    		if(h > l){
    			document.getElementById("one_left").style.height = h + "px";
    		}
    		else{
    			document.getElementById("one_right").style.height = h + "px";
    		}
        

    });
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {    
          //selector đến menu cần làm việc
          var TopFixMenu = $("#fixNav");
          // dùng sự kiện cuộn chuột để bắt thông tin đã cuộn được chiều dài là bao nhiêu.
            $(window).scroll(function(){
            // Nếu cuộn được hơn 150px rồi
                if($(this).scrollTop()>194){
              // Tiến hành show menu ra 
                    $("#menu").css({"position":"fixed","z-index":"100"});
                }
                else{
                    $("#menu").css({"position":"unset","z-index":"100"});
                }
            }
            )
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function($) {    
          var lenght = $('#lenght1').text().length;
          if(lenght > 30){
            $("#lenght1").css({"width":"55%"}); 
          }
        })
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="top">
                <div class="bac_top"></div>
                <div class="logo" >
                    <a href="/" title="logo">
                        <img src="{{ $url_public }}/images/logo.png" alt="logo">
                    </a>
                </div>
                <div class="top_right" style="display: none;">
                    <div class="top_img">
                        <a href="" title="">
                            <img src="{{ $url_public }}/images/img1.png" alt="">
                        </a>
                    </div>
                    <div class="top_img">
                        <a href="" title="">
                            <img src="{{ $url_public }}/images/img6.png" alt="">
                        </a>
                    </div>
                    <div class="top_img topimg">
                        <a href="" title="">
                            <img src="{{ $url_public }}/images/img6t.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="top_con">
                    <p>Công ty Quản lý vận hành điện chiếu sáng công cộng Đà Nẵng</p>
                                        <h5 style="font-size: 24px;color: #555;text-align: center;margin-bottom: 5px;font-family: Times New Roman;margin-top: 0px;">DANANG LIGHTING MANAGEMENT COMPANY</h5>
                    
                </div>
            </div>
            <div class="menu" id="menu">
                    <nav class="navbar navbar-inverse" role="navigation">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                            <li class="{{ Route::currentRouteNamed('public.index') ? 'active' : '' }}"><a href="/">trang chủ</a></li>
                            <?php
                                $arCat = DB::table("gioithieu")->get();
                            ?>
                            @foreach($arCat as $key => $DVu)
                                <?php
                                    $id = $DVu['id'];
                                    $name = $DVu['name'];
                                    $nameSeo = str_slug($name);
                                ?>  
                            <li class="dropdown {{ Route::currentRouteNamed('public.gioithieu.detail',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                            @endforeach
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Giới thiệu <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <?php
                                        $arGioithieu = DB::table("gioithieu")->get();
                                    ?>
                                    @foreach($arGioithieu as $key => $DVu)
                                        <?php
                                            $id = $DVu['id'];
                                            $name = $DVu['name'];
                                            $nameSeo = str_slug($name);
                                            $url = route('public.gioithieu.detail',['slug' => $nameSeo,'id' => $id]);
                                            
                                        ?>  
                                        <li><a href="{{$url}}">{{$name}}</a></li>
                                    @endforeach
                                    </ul>
                            </li>
                            <?php
                                $arCat = DB::table("list_dv")->get();
                            ?>
                            @foreach($arCat as $key => $DVu)
                                <?php
                                    $id = $DVu['id'];
                                    $name = $DVu['name'];
                                    $nameSeo = str_slug($name);
                                ?>  
                            <li class="dropdown {{ Route::currentRouteNamed('public.chieusang.detail',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                                @endforeach
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Chuyên mục chiếu sáng<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $arCat = DB::table("list_dv")->get();
                                            ?>
                                            @foreach($arCat as $key => $DVu)
                                                <?php
                                                    $id = $DVu['id'];
                                                    $name = $DVu['name'];
                                                    $nameSeo = str_slug($name);
                                                ?>  
                                            <li><a href="{{ route('public.chieusang.detail',['slug' => $nameSeo,'id' => $id]) }}">{{$name}}</a></li>
                                             @endforeach
                                        </ul>
                            </li>
                            <?php
                                $arCat = DB::table("list_congtrinh")->get();
                            ?>
                            @foreach($arCat as $key => $DVu)
                                <?php
                                    $id = $DVu['id'];
                                    $name = $DVu['name'];
                                    $nameSeo = str_slug($name);
                                ?>  
                            <li class="dropdown {{ Route::currentRouteNamed('public.duan.danhmuc',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                                @endforeach
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dự án<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $arCat = DB::table("list_congtrinh")->get();
                                            ?>
                                            @foreach($arCat as $key => $DVu)
                                                <?php
                                                    $id = $DVu['id'];
                                                    $name = $DVu['name'];
                                                    $nameSeo = str_slug($name);
                                                ?>  
                                            <li><a href="{{ route('public.duan.danhmuc',['slug' => $nameSeo,'id' => $id]) }}">{{$name}}</a></li>
                                             @endforeach
                                        </ul>
                            </li>
                                <?php
                                    $arTuyendung = DB::table("tuyendung")->get();
                                ?>
                                @foreach($arTuyendung as $key => $DVu)
                                    <?php
                                        $id = $DVu['id'];
                                        $name = $DVu['name'];
                                        $nameSeo = str_slug($name);
                                    ?>  
                                <li class="dropdown {{ Route::currentRouteNamed('public.thutuc.detail',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                                @endforeach
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thủ tục hành chính<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $arTuyendung = DB::table("tuyendung")->get();
                                            ?>
                                            @foreach($arTuyendung as $key => $DVu)
                                                <?php
                                                    $id = $DVu['id'];
                                                    $name = $DVu['name'];
                                                    $nameSeo = str_slug($name);
                                                ?>  
                                            <li><a href="{{ route('public.thutuc.detail',['slug' => $nameSeo,'id' => $id]) }}">{{$name}}</a></li>
                                             @endforeach
                                        </ul>
                                </li>
                                <?php
                                    $arCat = DB::table("list_news")->get();
                                ?>
                                @foreach($arCat as $key => $DVu)
                                    <?php
                                        $id = $DVu['id'];
                                        $name = $DVu['name'];
                                        $nameSeo = str_slug($name);
                                    ?>  
                                <li class="dropdown {{ Route::currentRouteNamed('public.detail',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                                @endforeach
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tin tức & sự kiện<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $arCat = DB::table("list_news")->get();
                                            ?>
                                            @foreach($arCat as $key => $DVu)
                                                <?php
                                                    $id = $DVu['id'];
                                                    $name = $DVu['name'];
                                                    $nameSeo = str_slug($name);
                                                ?>  
                                            <li><a href="{{ route('public.detail',['slug' => $nameSeo,'id' => $id]) }}">{{$name}}</a></li>
                                             @endforeach
                                        </ul>
                                </li>
                                <?php
                                    $arThuvien = DB::table("list_thuvien")->get();
                                ?>
                                @foreach($arThuvien as $key => $DVu)
                                    <?php
                                        $id = $DVu['id'];
                                        $name = $DVu['name'];
                                        $nameSeo = str_slug($name);
                                    ?>  
                                <li class="dropdown {{ Route::currentRouteNamed('public.thuvien.danhmuc',['slug' => $nameSeo,'id' => $id]) ? 'active' : '' }}">
                                @endforeach
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Thư viện<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <?php
                                                $arThuvien = DB::table("list_thuvien")->get();
                                            ?>
                                            @foreach($arThuvien as $key => $DVu)
                                                <?php
                                                    $id = $DVu['id'];
                                                    $name = $DVu['name'];
                                                    $nameSeo = str_slug($name);
                                                ?>  
                                            <li><a href="{{ route('public.thuvien.danhmuc',['slug' => $nameSeo,'id' => $id]) }}">{{$name}}</a></li>
                                             @endforeach
                                        </ul>
                                </li>
                            <li class="grid {{ Route::currentRouteNamed('public.lienhe') ? 'active' : '' }}"><a href="{{ route('public.lienhe') }}">Liên hệ</a></li>
                          </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                      </div>
                      <!-- /.container-fluid -->
                    </nav>
                    
                </div>
            <div class="slide">
                <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:523px;overflow:hidden;visibility:hidden;">
                <!-- Loading Screen -->
                    <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('/resources/assets/templates/public/images/icon/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:523px;overflow:hidden;">
                 <?php
                    $arSlider = DB::table("slider")->get();
                ?>
                @foreach($arSlider as $key => $DVu)
                    <?php
                        $id = $DVu['id'];
                        $name = $DVu['name'];
                        $hinhanh = $DVu['hinhanh'];
                        $picUrl = asset("storage/app/files/{$hinhanh}");
                    ?>  
                    <div>
                        <img data-u="image" src="{{$picUrl}}" />
                    </div>
                @endforeach
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
                </div>
                <script type="text/javascript">jssor_1_slider_init();</script>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>