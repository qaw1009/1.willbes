@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
 
	<style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }

        .WB_con01 {display:block; height:2455px; background:#fff url('https://static.willbes.net/public/images/promotion/2019/06/1299_top_bg.jpg') no-repeat center;}
        .WB_con02 {background:#fefefe;}
        .WB_con03 {background:#52e8a4; padding-bottom:100px;}
        .WB_con04 {background:#fefefe url('https://static.willbes.net/public/images/promotion/2019/06/1299_04_bg.jpg') no-repeat center;}

		 /* 슬라이드배너 */
        .bannerimg {position:relative; width:820px; margin:0 auto}
        .bannerimg p {position:absolute; top:50%; width:50px; z-index:100}
        .bannerimg img {width:100%}
        .bannerimg p a {cursor:pointer}
        .bannerimg p.leftBtn {left:-45px; top:50%; margin-top:-25px; width:45px; height:45px}
        .bannerimg p.rightBtn {right:-45px; top:50%; margin-top:-25px; width:45px; height:45px}

    </style>

  <div class="evtContent NSK" id="evtContainer">
  
  <div class="skybanner"> 
	 <a href="#1299_lecgo"><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_sky.png" alt="신청하기" /></a>
  </div>
  <!-- skybnr //--> 
  
  <div class="evtCtnsBox WB_con01">
	  <img src="https://static.willbes.net/public/images/promotion/2019/06/1299_top.png" alt="좋은데이 하승민" />
	  <img src="https://static.willbes.net/public/images/promotion/2019/06/1299_yb.png" alt="하승님교수님좋은데이" />
      <iframe width="900" height="506" src="https://www.youtube.com/embed/RJeRYZCe3vE?rel=0" frameborder="0" allowfullscreen></iframe>
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1299_01.png" alt="하승민 적중사례 보러가기" usemap="#Map_1299_go" border="0" />
     <map name="Map_1299_go">
      <area shape="rect" coords="276,717,791,792" href="https://police.willbes.net/promotion/index/cate/3001/code/1025" target="_blank">
     </map>
  </div>
  <!-- WB_con01//--> 

  <div class="evtCtnsBox WB_con02">
	 <img src="https://static.willbes.net/public/images/promotion/2019/06/1299_02.jpg" alt="#" />
  </div>
  <!-- WB_con02//--> 

  <div class="evtCtnsBox WB_con03">
	 <img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03.png" alt="#" />
		<div class="bannerimg">
		  <ul id="slidesImg2">
			<li><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03_c1.jpg" title="수강평1"></li>
			<li><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03_c2.jpg" title="수강평2"></li>
			<li><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03_c3.jpg" title="수강평3"></li>
			<li><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03_c4.jpg" title="수강평4"></li>
			<li><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_03_c5.jpg" title="수강평5"></li>
		  </ul>
		  <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_arr_l.png" title="back"></a></p>
		  <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_arr_r.png" title="next"></a></p>
		</div>
  </div>
 <!-- WB_con03//-->
 
  <div class="evtCtnsBox WB_con04" id="1299_lecgo">
    <a href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1046&subject_idx=1054" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1299_04.png" alt="#" /></a>
  </div>
 <!-- WB_con04//--> 
 
 </div>
<!-- End Container --> 

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
		slideWidth:1120,
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

@stop