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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/     

        .wb_top {background:#202334 url(https://static.willbes.net/public/images/promotion/2020/08/1739_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:#F9F9F9;}
		.wb_cts02 {background:#F9F9F9;}
        .wb_cts03 {background:#F9F9F9;}
        .wb_cts04 {background:#7104FF}
        .wb_cts05 {background:#F9F9F9}
		.wb_cts06 {background:#fff;padding-bottom:100px;}

        /*TAB*/
        .tabWrapEvt{width:920px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:450px; margin-left:10px;}
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
        .tabcts {background:none; width:920px; margin:30px auto 0; text-align:center;}
        .tabcts iframe {width:940px; margin:30px auto 0; height:520px; border:#f4f4f4 solid 14px;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_top.gif" alt="서민지 3시간완성" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_01.jpg" alt="수강 신청하기" usemap="#Map1739_apply" border="0"/>
            <map name="Map1739_apply" id="Map1739_apply">
                <area shape="rect" coords="142,224,977,322" href="#apply" />
            </map>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_02.jpg" alt="1초 비법 서민지"/>
            <!--tab-->
            <ul class="tabWrapEvt">
                <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2020/08/1739_tab_1off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/08/1739_tab_1on.jpg" alt="" class="on"/></a></li>
                <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/08/1739_tab_2off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/08/1739_tab_2on.jpg" alt="" class="on"/></a></li>
            </ul>
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/BT7sfyECChA?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="tab2" class="tabcts">		
                <iframe src="https://www.youtube.com/embed/sYw3MWvWhwM?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <!--tab//--> 
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_03.jpg" alt="고민 날리기"/>
		</div>	

		<div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_04.jpg" alt="그룹 스터디 채팅"/>
		</div>	

		<div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_05.jpg" alt="수강생 후기"/>
		</div>	

		<div class="evtCtnsBox wb_cts06" id="apply" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1739_06.jpg" alt="수강신청단"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif 
		</div>	
    </div>
    <!-- End Container -->

    <script type="text/javascript">
		var tab1_url = "https://www.youtube.com/embed/BT7sfyECChA?rel=0";
		var tab2_url = "https://www.youtube.com/embed/sYw3MWvWhwM?rel=0";

		$(document).ready(function(){
		$(".tabcts").hide(); 
		$(".tabcts:first").show();
		$(".tabWrapEvt li a").click(function(){ 
			var activeTab = $(this).attr("href"); 
			var html_str = "";
			if(activeTab == "#tab1"){
				html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
			}else if(activeTab == "#tab2"){
				html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";					
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