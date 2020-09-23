@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/     

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1850_top_bg.jpg) no-repeat center top;}
        .wb_top span.img1 {position:absolute; left:50%; z-index:1; top:300px; margin-left:-80px; width:560px; height:655px; overflow:hidden; 
            animation:iptimg1 2s ease-out; -webkit-animation:iptimg1 2s ease-out;}
        @@keyframes iptimg1{
            0%{margin-left:0px; opacity: 0;}
            100%{margin-left:-80px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
            0%{margin-left:0px; opacity: 0;}
            100%{margin-left:-80px; opacity: 1;}
        }

        .wb_cts01 {background:#fff;}
		.wb_cts02 {background:#7104ff;}
        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#eb4295}


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
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_top.jpg" alt="서민지 티패스" usemap="#Map1850A" border="0" />
            <map name="Map1850A">
                <area shape="rect" coords="304,1641,817,1740" href="#wb_cts04" alt="티패스 수강신청">
            </map>
            <span class="img1"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_top_img.png" alt="서민지" /></span>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_01.jpg" alt="수험생의 영어 고민"/>
            <!--tab-->
            <ul class="tabWrapEvt">
                <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_1off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_1on.jpg" alt="" class="on"/></a></li>
                <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_2off.jpg" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2020/09/1850_tab_2on.jpg" alt="" class="on"/></a></li>
            </ul>
            <div id="tab1" class="tabcts">
                <iframe src="https://www.youtube.com/embed/uKyEIDr_uKQ?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div id="tab2" class="tabcts">		
                <iframe src="https://www.youtube.com/embed/yICiyJncmtA?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>            
            <!--tab//--> 
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_01_01.jpg" alt="한번에 날려드려요"/>
        </div>
        
        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_02.jpg" alt="꿀팁"/>
            
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_03.jpg" alt="생생후기"/>
		</div>	

		<div class="evtCtnsBox wb_cts04" id="wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1850_04.jpg" alt="티패스 신청하기" usemap="#Map1850B" border="0"/>
            <map name="Map1850B">
              <area shape="rect" coords="103,396,990,557" href="#none" alt="수강신청">
            </map>
		</div>		
    </div>
    <!-- End Container -->

    <script type="text/javascript">
		var tab1_url = "https://www.youtube.com/embed/uKyEIDr_uKQ?rel=0";
		var tab2_url = "https://www.youtube.com/embed/yICiyJncmtA?rel=0";

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