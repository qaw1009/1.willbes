@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1210px; margin:auto;}
        .Depth {display:none}
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

        .wb_cts01 {background:#30313c url(http://file3.willbes.net/new_gosi/2018/10/EV181012Y_01_bg.jpg) no-repeat center top; margin-top:20px}
		.wb_cts01_wrap {width:1210px; margin:0 auto; position:relative}
		.wb_cts01_wrap span.tilte {position:absolute; width:760px; left:50%; top:380px; margin-left:-380px; z-index:10; animation:animatezoom 2s}
		.wb_cts01_wrap span.starA {position:absolute; width:266px; left:113px; top:260px; z-index:9; animation:starA 5s infinite linear}
		.wb_cts01_wrap span.starB {position:absolute; width:137px; right:178px; top:445px; z-index:8; animation:starB 3s infinite linear}
		@@keyframes starA{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}
		@@keyframes starB{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}
		@@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}}
		
        .wb_cts02 {background:#f7ece8 url(http://file3.willbes.net/new_gosi/2018/10/EV181012Y_02_bg.jpg) no-repeat center top}	
        .wb_cts03 {background:#ecc7a9}
        .wb_cts04 {background:#30313c}
        .wb_cts05 {background:#e4240b; padding:50px 0}	


    </style>
    


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01">
            <div class="wb_cts01_wrap">
                <span class="starA"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_01_imgA.png" alt="" /></span>
                <span class="starB"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_01_imgB.png" alt="" /></span>
                <span class="tilte"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_01_title.png" alt="" /></span>
                <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_01.jpg" alt="윌비스 army 부사관PASS" />
            </div>
        </div><!--//wb_cts01-->
  
        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_02.jpg" alt="지금이 바로 부사관이 될 수 있는 절호의 타이밍 "  />
        </div><!--//wb_cts02-->
    
        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_03.jpg" alt="중추적역활의 부사관이란"  />
        </div><!--//wb_cts03-->
  
        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_04.jpg" alt="윌비스 Freemium 학습 콘텐츠 지원"  usemap="#Map181012A" border="0"/><br />
            <map name="Map181012A" id="Map181012A">
                <area shape="rect" coords="231,1138,303,1166" href="javascript:openYoutube('event_onGosiNoncomPop?youtube_path=https://www.youtube.com/embed/nvE2uzvpaZ8?rel=0')" class="youtube" onclick='fn_bannerClick("8400");' alt="정훈의">
                <area shape="rect" coords="454,1138,525,1166" href="javascript:openYoutube('event_onGosiNoncomPop?youtube_path=https://www.youtube.com/embed/TM58Ydr-MHc?rel=0')" class="youtube" onclick='fn_bannerClick("8400");' alt="황두기">
                <area shape="rect" coords="694,1138,766,1166" href="javascript:openYoutube('event_onGosiNoncomPop?youtube_path=https://www.youtube.com/embed/zS5qUagCJK0?rel=0')" class="youtube" onclick='fn_bannerClick("8400");' alt="이서연">
                <area shape="rect" coords="884,1138,956,1166" href="javascript:openYoutube('event_onGosiNoncomPop?youtube_path=https://www.youtube.com/embed/idWxxPsEThk?rel=0')" class="youtube" onclick='fn_bannerClick("8400");' alt="이현정">
            </map>
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_05.jpg" /><br />        
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_06.jpg" alt="부사관 전문교재" /><br />
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_07.jpg" alt="커리큘럼" /><br />
        </div><!--//wb_cts04-->
  
        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012Y_08.jpg"  usemap="#Map181012B" border="0" />
            <map name="Map181012B" id="Map181012B">
                <area shape="rect" coords="125,463,1084,546" href="/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=013&topMenuName=&topMenuType=O&searchCategoryCode=013&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800036" target="_blank">
            </map>	  
        </div><!--//wb_cts05-->
    
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        function openYoutube(id) {
            window.open("event_onGosiNoncomPop?youtube_path="+id, "NewWindow", "left=0, top=0, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=810, height=510");
        }
        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });
    </script>
@stop