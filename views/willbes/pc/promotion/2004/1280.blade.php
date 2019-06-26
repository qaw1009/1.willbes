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

        .wb_cts01 {position:relative; overflow:hidden; background:#1c1c1c url("https://static.willbes.net/public/images/promotion/2019/06/1280_top_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:#dedede;}
        .wb_cts03 {background:#a2252b;}
        .wb_cts04 {background:#dab483; padding-bottom:120px;}
		    .wb_cts05 {background:#e9e9e9; padding-bottom:120px;}
        .wb_cts06 {background:#0b0b0b url("https://static.willbes.net/public/images/promotion/2019/06/1280_05_bg.jpg") center top  no-repeat}
		    .wb_cts07 {background:#dadada;}

		/* TAB */
        .tab {width:980px; margin:0 auto}		
        .tab li {display:inline; float:left}	
        .tab a img.off {display:block}
        .tab a img.on {display:none}
        .tab a.active img.off {display:none}
        .tab a.active img.on {display:block}
        .tab:after {content:""; display:block; clear:both}
		
		/*TAB TYU*/
        .tabWrapEvt{width:980px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:195px; margin-left:0px;}
        .tabWrapEvt li a {display:block; text-align:center}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li a:hover,
        .tabWrapEvt li a.active {}
        .tabWrapEvt li:last-child a {margin-right:0}
        .tabWrapEvt:after {content:""; display:block; clear:both}
        .tabcts {background:none; width:900px; margin:30px auto 0; text-align:center;}
        .tabcts iframe {width:900px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}

		/* txt_motion */
      .wb_cts01 > div {width:1120px; margin:0 auto; position:relative;}
      .wb_cts01 > div span {position:absolute; width:120px; z-index: 1;}
      .wb_cts01 > div span.txt1 {top:80px; left:100px; animation:slidein1 0.2s ease-in; -webkit-animation:slidein1 0.2s ease-in;}
      .wb_cts01 > div span.txt2 {top:200px; left:100px; animation:slidein2 0.4s ease-in; -webkit-animation:slidein2 0.4s ease-in;}
      @@keyframes slidein1 {from {left:605px; opacity: 0;}to {left:100px; opacity: 1}}
      @@keyframes slidein2 {from {left:605px; opacity: 0;}to {left:100px; opacity: 1}}

 </style>

<div class="p_re evtContent NGR" id="evtContainer">
  <div class="evtCtnsBox wb_cts01">
    <div class style="height:720px;">
	<span class="txt1"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_txt1.png" title="어차피 될거잖아요 소방관 " /></span>
	<span class="txt2"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_txt2.png" title="소방학개론 소방관계법규" /></span></div>
  </div>
  <!--wb_cts01//-->
  
  <div class="evtCtnsBox wb_cts02"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_01.jpg"  title="김종상교수님" />
  </div>
  <!--wb_cts02//-->
  
  <div class="evtCtnsBox wb_cts03"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_02.jpg" title="수강후기 " />
  </div>
  <!--wb_cts03//-->
  
  <div class="evtCtnsBox wb_cts04"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03.png"  title="고득점전략"/>
    <ul class="tab">
      <li><a href="#tab6"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_tab1.jpg" class="off" alt="01"/>
	  <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_tab1_on.jpg" class="on"  /></a>
	  </li>
      <li><a href="#tab7"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_tab2.jpg" class="off" alt="02"/>
	  <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_tab2_on.jpg" class="on"  /></a>
	  </li>
    </ul>
    <div id="tab6">
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_c1.gif" title="#" /></li>
    </div>
    <div id="tab7">
      <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_03_c2.gif" title="#"/></li>
    </div>
  </div>
  <!--wb_cts04//-->
  
  <div class="evtCtnsBox wb_cts05"> <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04.jpg"  title="무료특강체험하기"/> 
    <!--tab-->
    <ul class="tabWrapEvt">
      <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab1.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab1_on.png" alt="" class="on"/></a></li>
      <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab2.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab2_on.png" alt="" class="on"/></a></li>
      <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab3.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab3_on.png" alt="" class="on"/></a></li>
      <li><a href="#tab4"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab4.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab4_on.png" alt="" class="on"/></a></li>
      <li><a href="#tab5"><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab5.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/06/1280_04_tab5_on.png" alt="" class="on"/></a></li>
    </ul>
    <div id="tab1" class="tabcts"> <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_01_txt1.png" alt=""/>
      <iframe src="https://www.youtube.com/embed/Zp37bwpMfUU?rel=0" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="tab2" class="tabcts"></div>
    <div id="tab3" class="tabcts"></div>
    <div id="tab4" class="tabcts"></div>
    <div id="tab5" class="tabcts"></div>
    <!--tab//--> 
  </div>
  <!--wb_cts05//-->
  
  <div class="evtCtnsBox wb_cts06"> <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_05.png" usemap="#Map_1280_link"  title="커리큘럼" border="0"/>
    <map name="Map_1280_link">
      <area shape="rect" coords="180,995,551,1106" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3050&search_text=UHJvZE5hbWU66rmA7KKF7IOB" target="_blank" alt="학원">
      <area shape="rect" coords="567,997,944,1107" href="javascript:alert('준비중');" target="_blank" alt="온라인">
    </map>
  </div>
  <!--wb_cts06//-->
  
  <div class="evtCtnsBox wb_cts07">
    <img src="https://static.willbes.net/public/images/promotion/2019/06/1280_06.jpg"  title="김종상교수님의 필수 수험서"/>
  </div>
  <!--wb_cts07//-->
 
</div>
<!-- End Container --> 


<script type="text/javascript">
	var tab1_url = "https://www.youtube.com/embed/Zp37bwpMfUU?rel=0";
	var tab2_url = "https://www.youtube.com/embed/rHfE0KMGmf8?rel=0";
	var tab3_url = "https://www.youtube.com/embed/S9QmJaITKEk?rel=0";
	var tab4_url = "https://www.youtube.com/embed/_uMwWV91RTc?rel=0";
	var tab5_url = "https://www.youtube.com/embed/fJ2FIW6iWP0?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
      $(".tabcts:first").show();
        $(".tabWrapEvt li a").click(function(){ 
          var activeTab = $(this).attr("href"); 
          var html_str = "";
          if(activeTab == "#tab1"){
          html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/06/1280_04_txt1.png' alt=''/> <iframe src='"+tab1_url+"' allowfullscreen></iframe>";
          }else if(activeTab == "#tab2"){
          html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/06/1280_04_txt2.png' alt=''/> <iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
          }else if(activeTab == "#tab3"){
          html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/06/1280_04_txt3.png' alt=''/> <iframe src='"+tab3_url+"' allowfullscreen></iframe>";
          }else if(activeTab == "#tab4"){
          html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/06/1280_04_txt4.png' alt=''/> <iframe src='"+tab4_url+"' allowfullscreen></iframe>";
          }else if(activeTab == "#tab5"){
          html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/06/1280_04_txt5.png' alt=''/> <iframe src='"+tab5_url+"' allowfullscreen></iframe>";
        }
      $(".tabWrapEvt li a").removeClass("active"); 
      $(this).addClass("active"); 
      $(".tabcts").hide(); 
      $(".tabcts").html(''); 
      $(activeTab).html(html_str);
      $(activeTab).fadeIn(); 
      return false; 
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
	$('.tab').each(function(){
	var $active, $content, $links = $(this).find('a');
	$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
	$active.addClass('active');

	$content = $($active[0].hash);

	$links.not($active).each(function () {
	$(this.hash).hide()});

	// Bind the click event handler
	$(this).on('click', 'a', function(e){
	$active.removeClass('active');
	$content.hide();

	$active = $(this);
	$content = $(this.hash);

	$active.addClass('active');
	$content.show();

	e.preventDefault()})});
	tabMenuSlider();
	}); 

	/**/
	$(function(e){
	var targetOffset= $("#evtContainer").offset().top;
	$('html, body').animate({scrollTop: targetOffset}, 700);  
	});

</script>
@stop