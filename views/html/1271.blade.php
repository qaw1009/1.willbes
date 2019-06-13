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

  .wb_cts01 {position:relative; overflow:hidden; background:#1a1d22 url("https://static.willbes.net/public/images/promotion/2019/06/1271_top_bg.jpg") center top  no-repeat}
  .wb_cts02 {background:#c37a5a url("https://static.willbes.net/public/images/promotion/2019/06/1271_01_bg.jpg") center top  no-repeat}
  .wb_cts03 {background:#e8e6f1;}
  .wb_cts03 .mv_bg {position:relative; width:1120px; height:600px; margin:0 auto; background:#e8e6f1 url("https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv_bg.jpg") no-repeat center top;}
  .wb_cts03 .mv_bg ul {position:absolute; width:810px; top:50px; left:50%; margin-left:-400px}
  .wb_cts03 .mv_bg li {display:inline; float:left;}
  .wb_cts03 .mv_bg ul:after {content:""; display:block; clear:both}
  .wb_cts04 {background:#f5f5f5;}
  .wb_cts05 {background:#e8e6f1;}
  .menuWarp {position:relative; width:980px; height:640px; margin:0 auto} /**/
  .PeMenu  {position:absolute; width:980px;  height:260px; top:0px; left:0px;}
  .PeMenu li {display:inline; float:left; padding:10px;}
  .PeMenu li a img.off {display:block}
  .PeMenu li a img.on {display:none}

  .slide_con1 {position:absolute; width:640px; top:620px; left:50%; margin-left:-325px;}
  .slide_con1 p {position:absolute; top:35%; width:30px; z-index:10}
  .slide_con1 img {width:100%;}
  .slide_con1 p a {cursor:pointer}
  .slide_con1 p.leftBtn1 {left:-62px; top:50%; width:45px; height:70px; margin-top:-30px; opacity:0.9; filter:alpha(opacity=90);}
  .slide_con1 p.rightBtn1 {right:-62px;top:50%; width:45px; height:70px;  margin-top:-30px; opacity:0.9; filter:alpha(opacity=90);}  

  /* 상단 메뉴 제어 */
  .jbMenu {display:none}
  .jbMenu {position:absolute; top:0px; width:100%; background:url("https://static.willbes.net/public/images/promotion/2019/06/1271_t_navi_bg.png"); display:block; border-bottom:#002c59 solid 1px; z-index:100}
  .jbMenu ul {width:100%; max-width:980px; margin:0 auto}
  .jbMenu li {display:inline; float:left; width:}
  .jbFixed {position:fixed; top: 0px}
  </style>

 <div class="p_re evtContent NGR" id="evtContainer">
  <div class="jbMenu cf">
    <ul>
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_t_navi.png" usemap="#Map_1271_welcome"  title="선택의 폭을 넓히면 공무원 합격이 더 빨라집니다." border="0" />
		<map name="Map_1271_welcome">
		  <area shape="rect" coords="698,23,898,82" href="https://www.willbes.net/promotion/index/code/1137" target="_blank">
		</map>
		</li>
    </ul>
  </div>
  <div class="slide_con1">
    <ul id="slidesImg1">
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_c1.png"  title="수강평1" /></li>
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_c2.png"  title="수강평2" /></li>
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_c3.png"  title="수강평3" /></li>
    </ul>
    <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_arr_l.png"></a></p>
    <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_arr_r.png"></a></p>
  </div>
  <div class="evtCtnsBox wb_cts01"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_top.jpg" usemap="#Map_1271_lec" title="회원가입바로가기" border="0" />
	<map name="Map_1271_lec">
	  <area shape="rect" coords="288,513,808,597" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank">
	</map>
	</div>
  <!--wb_cts01//-->
  
  <div class="evtCtnsBox wb_cts02"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_01.jpg"  title="당신의 선택이 곧, 실력이자 합격" /></div>
  <!--wb_cts02//-->
  
  <div class="evtCtnsBox wb_cts03"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02.jpg" title="윌비스 공무원 명품 교수진" />
    <div class="mv_bg">
      <ul>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv1.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv2.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv3.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv4.gif" alt="" /></li>
        <li style="clear:left;"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv5.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv6.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv7.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv8.gif" alt="" /></li>
        <li style="clear:left;"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv9.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv10.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv11.gif" alt="" /></li>
        <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_02_mv12.gif" alt="" /></li>
      </ul>
    </div>
  </div>
  <!--wb_cts03//-->
  
  <div class="evtCtnsBox wb_cts04"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_03.jpg"  title="패키지 무료수강 방법 안내"/></div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05"><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04.jpg" title="전문적인 직렬별 커리큘럼" />
    <div class="menuWarp">
      <div class="PeMenu">
        <ul>
          <li><a href="https://pass.willbes.net/home/index/cate/3019" target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c1.jpg" onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c1_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c1.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c1.jpg'" alt=""  /></a></li>
          <li><a href="https://pass.willbes.net/home/index/cate/3020" target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c2.jpg" onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c2_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c2.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c2.jpg'" alt=""  /></a></li>
          <li><a href="https://pass.willbes.net/home/index/cate/3035" target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c3.jpg" onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c3_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c3.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c3.jpg'" alt=""  /></a></li>
          <li><a href="https://pass.willbes.net/home/index/cate/3023" target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c4.jpg" onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c4_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c4.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c4.jpg'" alt=""  /></a></li>
          <li class="2line"> <a href="https://pass.willbes.net/home/index/cate/3028" target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c5.jpg" onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c5_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c5.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c5.jpg'" alt=""  /></a></li>
          <li><a href="https://pass.willbes.net/home/index/cate/3024 " target="_blank" onFocus="this.blur();" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1271_04_c6.jpg"  onmouseover="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c6_on.jpg'" onMouseOut="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c6.jpg'" onMouseDown="this.src='https://static.willbes.net/public/images/promotion/2019/06/1271_04_c6.jpg'" alt=""  /></a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--wb_cts05//--> 
  
</div>
<!-- End Container -->

<script type="text/javascript">
	$(document).ready(function() {
    var slidesImg1 = $("#slidesImg1").bxSlider({
    mode:'fade',
    auto:true,
    speed:350,
    pause:3000,
    pager:true,
    controls:false,
    minSlides:1,
    maxSlides:1,
    autoHover: true,
    moveSlides:1,
    pager:false
    });

    $("#imgBannerLeft1").click(function (){
    slidesImg1.goToPrevSlide();
    });

    $("#imgBannerRight1").click(function (){
    slidesImg1.goToNextSlide();
    });

	});

	/* 스크롤배너*/
	$( document ).ready( function() {
    var jbOffset = $( '.jbMenu' ).offset();
    $( window ).scroll( function() {
    if ( $( document ).scrollTop() > jbOffset.top ) {
    $( '.jbMenu' ).addClass( 'jbFixed' );
    }
    else {
    $( '.jbMenu' ).removeClass( 'jbFixed' );
    }
    });
	});
</script>
@stop