@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
   
<!-- Container -->
<style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_cts01 {position:relative; overflow:hidden; background:#e8e46b url("https://static.willbes.net/public/images/promotion/2019/06/1291_top_bg.jpg") center top  no-repeat}
        .wb_cts01 img {vertical-align:top}
		.wb_cts01 .inner{position:relative;width:1210px;margin:0 auto;}
		.wb_cts01 .area_vsiual .inner{height:880px;}
		.wb_cts01 .area_vsiual .ani{position:absolute;}
		.wb_cts01 .area_vsiual .ani._01{top:520px;left:340px;}
		.wb_cts01 .area_vsiual .ani._01.rubber{animation:rubberBand 1s linear 1s;}
		.wb_cts01 .area_vsiual .ani._02{top:620px;left:160px;}
		.wb_cts01 .area_vsiual .ani._02.rubber{animation:rubberBand 1s linear 2s;}		
		.wb_cts02 {background:#d9f086;}

		/*상단모션*/
		@@keyframes rubberBand{
		0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
		30%{-webkit-transform:scale3d(1.25,.75,1);transform:scale3d(1.25,.75,1)}
		40%{-webkit-transform:scale3d(0.75,1.25,1);transform:scale3d(0.75,1.25,1)}
		50%{-webkit-transform:scale3d(1.15,.85,1);transform:scale3d(1.15,.85,1)}
		65%{-webkit-transform:scale3d(.95,1.05,1);transform:scale3d(.95,1.05,1)}
		75%{-webkit-transform:scale3d(1.05,.95,1);transform:scale3d(1.05,.95,1)}
		100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
		}
  </style>

  <div class="p_re evtContent NGR" id="evtContainer">
  
  <div class="evtCtnsBox wb_cts01">
    <div class="area_vsiual">
      <div class="inner">
		  <img src="https://static.willbes.net/public/images/promotion/2019/06/1291_top_txt1.png" alt="국어 성적 상승메이커" class="ani _01 animated">
		  <img src="https://static.willbes.net/public/images/promotion/2019/06/1291_top_txt2.png" alt="신규입성 국어오훈" class="ani _02">
	  </div>
    </div>
  </div>
  <!--wb_cts01//-->
  
  <div class="evtCtnsBox wb_cts02">
	<img src="https://static.willbes.net/public/images/promotion/2019/06/1291_01.jpg" usemap="#Map_1291" title="프로필" border="0"/>
	<map name="Map_1291">
	  <area shape="circle" coords="892,647,74" href="#" >
	</map>
	
	<div class="tipPopup" id="textZone">
		<img src="https://static.willbes.net/public/images/promotion/2019/06/1291_profile_o.jpg" title="프로필_팝업창" />
		<img src="https://static.willbes.net/public/images/promotion/2019/06/1291_profile_x.jpg"  title="닫기" />
	</div>

   </div>
  <!--wb_cts02//--> 
  
</div>
<!-- End Container -->

<script type="text/javascript">
	var J$ = jQuery.noConflict();
	//첫 로딩 스크롤 이동
	aLink(".wb_cts01", 0);
	function aLink(target, topMargin){
	J$("html,body").animate({ scrollTop : (J$(target).offset().top) + topMargin },1000)
	}

	//상단 모션
	function animation(tar){
	J$(tar).addClass("rubber animated");
	}
	function removeani(get){
	J$(get).removeClass("rubber animated");
	}
	J$(window).on("load",function(){
	animation("._01");
	animation("._02");
	});

	$(document).ready(function(){
		$("#stoggleBtn").click(function(){
			$("#textZone").slideToggle("fast");
		});
    });
</script>


@stop