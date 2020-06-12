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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_cts01 {position:relative;overflow:hidden; min-width:1210px; text-align:center; background:#000 url("https://static.willbes.net/public/images/promotion/2019/05/1229_top_bg.jpg") center top  no-repeat; margin-top:5px;}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#d7d7d7}
        .wb_cts04 {background:#141319; padding-bottom:100px}
		.wb_cts05 {background:#e1e1e1 url("https://static.willbes.net/public/images/promotion/2019/05/1229_04_bg.jpg") center top  no-repeat;}
		.wb_cts06 {background:#c12525}
		
		/*TAB*/
        .tabWrapEvt{width:980px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:310px; margin-left:10px;}
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

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
	  
	  <div class="evtCtnsBox wb_cts01">
		<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_top.png" usemap="#Map_1229_lec"  title="G-TELP서민지" border="0"/>
		<map name="Map_1229_lec">
		<area shape="rect" coords="142,946,647,1033" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/153255" target="_blank" alt="수강신청">
		</map>
	  </div>
	  <!--wb_cts01//-->
	  
	  <div class="evtCtnsBox wb_cts02">
		<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_01.jpg"  title="G-TELP국제공인영어시험"/>
	  </div>
	  <!--wb_cts02//-->
	  
	  <div class="evtCtnsBox wb_cts03">
		<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_02.jpg" alt="G-TELP서민지약력"/>
	  </div>
	  <!--wb_cts03//-->
	  
	  <div class="evtCtnsBox wb_cts04">
		<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03.jpg"  title="G-TELP모든것"/>
		
		<!--tab-->
		<ul class="tabWrapEvt">
		  <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t1.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t1_on.png" alt="" class="on"/></a></li>
		  <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t2.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t2_on.png" alt="" class="on"/></a></li>
		  <li><a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t3.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t3_on.png" alt="" class="on"/></a></li>
		</ul>
		<div id="tab1" class="tabcts">
			<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_03_t_c1.png" alt=""/>
			<iframe src="https://www.youtube.com/embed/afYUa3Al1Vo?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="tab2" class="tabcts">			
		</div>
		<div id="tab3" class="tabcts">			
		</div>
		<!--tab//--> 

	  </div>
	  <!--wb_cts04//-->
	  
	  <div class="evtCtnsBox wb_cts05">
		 <img src="https://static.willbes.net/public/images/promotion/2019/05/1229_04.png" usemap="#Map_1229_book"  title="교재구매하기" border="0"/>
		 <map name="Map_1229_book">
		    <area shape="rect" coords="253,773,854,873" href="https://pass.willbes.net/book/index/cate/3024?cate_code=3024&subject_idx=1177" target="_blank" alt="교재구매하기">
		 </map>
	  </div>
	  <!--wb_cts05//-->
	  
	  <div class="evtCtnsBox wb_cts06">
		<img src="https://static.willbes.net/public/images/promotion/2019/05/1229_05.jpg" usemap="#Map_1229_lec2"  title="수강신청" border="0"/>
		<map name="Map_1229_lec2">
		  <area shape="rect" coords="118,711,695,799" href="https://pass.willbes.net/lecture/show/cate/3024/pattern/only/prod-code/153255" target="_blank" alt="수강신청">
		</map>
	  </div>
	  <!--wb_cts06//--> 
	  
	</div>
	<!-- End Container -->

	<script type="text/javascript">
			var tab1_url = "https://www.youtube.com/embed/afYUa3Al1Vo?rel=0";
			var tab2_url = "https://www.youtube.com/embed/Fb9xMNurYac?rel=0";
			var tab3_url = "https://www.youtube.com/embed/GDz8dCWTw1w?rel=0";

			$(document).ready(function(){
			$(".tabcts").hide(); 
			$(".tabcts:first").show();
			$(".tabWrapEvt li a").click(function(){ 
					var activeTab = $(this).attr("href"); 
					var html_str = "";
					if(activeTab == "#tab1"){
                        html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/05/1229_03_t_c1.png' alt=''/> <iframe src='"+tab1_url+"' allowfullscreen></iframe>";
					}else if(activeTab == "#tab2"){
						html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/05/1229_03_t_c2.png' alt=''/> <iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
                    }else if(activeTab == "#tab3"){
						html_str = "<img src='https://static.willbes.net/public/images/promotion/2019/05/1229_03_t_c3.png' alt=''/> <iframe src='"+tab3_url+"' allowfullscreen></iframe>";
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

@stop