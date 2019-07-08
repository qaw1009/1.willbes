@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')


<!-- Container-->

<style type="text/css">

	.subContainer {
		min-height: auto !important;
		margin-bottom: 0 !important;
	}
	.evtContent {
		width: 100% !important;
		min-width: 1210px !important;
		background: #ccc;
		margin-top: 20px !important;
		padding: 0 !important;
		background: #fff;
	}
	.evtCtnsBox {
		width: 100%;
		text-align: center;
		min-width: 1120px;
	}
	/************************************************************/

	.evtTop {background:#fff url(https://static.willbes.net/public/images/promotion/2019/07/1311_top_bg.jpg) no-repeat center top;}
	.evt01 {background:#fff}
	.evt02 {background:#fff;  padding-bottom:100px}
	.evt03 {background:#100760; padding-bottom:100px}

	/* 슬라이드배너 */
	.bannerimg {position:relative; width:980px; margin:0 auto}
	.bannerimg p {position:absolute; top:50%; width:50px; z-index:100}
	.bannerimg img {width:100%}
	.bannerimg p a {cursor:pointer}
	.bannerimg p.leftBtn {left:-30px; top:50%; margin-top:-25px; width:50px; height:50px}
	.bannerimg p.rightBtn {right:-30px; top:50%; margin-top:-25px; width:50px; height:50px}

</style>

<div class="p_re evtContent NSK" id="evtContainer">
  <div class="evtCtnsBox evtTop"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_top.png" usemap="#Map_1311_go" title="#" border="0" >
	<map name="Map_1311_go">
	  <area shape="rect" coords="46,907,457,1007" href="#1311_go">
	</map>
   </div>
  <div class="evtCtnsBox evt01"> <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_01.jpg" title="시험전,수강생공부방법"> </div>
  <div class="evtCtnsBox evt02"> <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02.jpg"  title="교수님 수강평">
    <div class="bannerimg">
      <ul id="slidesImg2">
        <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r1.jpg" title="수강평1"></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r2.jpg" title="수강평2"></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r3.jpg" title="수강평3"></li>
      </ul>
      <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_pre.png" title="back"></a></p>
      <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_next.png" title="next"></a></p>
    </div>
  </div>
  <div class="evtCtnsBox evt03" id="1311_go"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_03.jpg" usemap="#Map1177B" title="최신기출 및 최신판례신청하기" border="0">
  <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_popup.jpg"  title="최신기출 및 최신판례신청하기" >
   </div>
</div>
<!-- End Container --> 


<!-- script -->

<script>
	$(document).ready(function() {
	var slidesImg1 = $("#slidesImg2").bxSlider({
	mode:'fade',
	auto:true,
	speed:350,
	pause:3000,
	pager:true,
	controls:false,
	minSlides:1,
	maxSlides:1,
	slideWidth:1210,
	slideMargin:0,
	autoHover: true,
	moveSlides:1,
	pager:false
	});

	$("#imgBannerLeft").click(function (){
	slidesImg1.goToPrevSlide();
	});

	$("#imgBannerRight").click(function (){
	slidesImg1.goToNextSlide();
	});
	});

	$(function(e){
	var targetOffset= $("#evtContainer").offset().top;
	$('html, body').animate({scrollTop: targetOffset}, 500);
	/*e.preventDefault(); */
	});
</script> 

<!-- script// -->



@stop