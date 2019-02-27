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

        .wb_cts01 {background:#dbc6b3 url(http://file3.willbes.net/new_gosi/2018/03/180316_EV01_bg.jpg) no-repeat center top;  margin-top:20px}	
		.wb_cts01_mo {width:1210px; margin:0 auto; position:relative}
		.wb_cts01_mo span {position:absolute}
		.wb_cts01_mo .wb_cts01_tit1 {top:376px; left:521px; animation:txt1 1s ease-in; z-index:1}
		.wb_cts01_mo .wb_cts01_tit2 {top:495px; left:290px; animation:txt2 1.4s ease-in; z-index:2}
		@@keyframes txt1{
			0%{opacity:0}
			100%{opacity:1}
		}
		@@keyframes txt2{
			0%{left:150px; opacity:0}
			100%{left:290px; opacity:1}
		}
		
        .wb_cts02 {background:#277bd9}	
        
        .wb_cts03 {padding-bottom:50px}
        .wb_cts03 .tabs {width:900px; margin:0 auto}
        .wb_cts03 .tabs li {display:inline; float:left; width:300px}
        .wb_cts03 .tabs a {display:block; border:2px solid #1087ef; background:#1087ef; color:#a6c9f7; text-align:center; height:58px; line-height:58px; font-size:160%; font-weight:600}
        .wb_cts03 .tabs a:hover,
        .wb_cts03 .tabs a.active {border:2px solid #1087ef; border-bottom:2px solid #fff; background:#fff; color:#1087ef}
        .wb_cts03 .tabs:after {content:""; display:block; clear:both}	
        .wb_cts03 div img {border-bottom:1px solid #1087ef}
        
        .wb_cts04 {background:#edf1f4; padding-bottom:100px}
        
        .wb_cts04 ul {width:980px; margin:0 auto}
        .wb_cts04 li {display:inline; float:left}
        .wb_cts04 li a img.off {display:block}
        .wb_cts04 li a img.on {display:none}
        .wb_cts04 li a:hover img.off {display:none} 	
        .wb_cts04 li a:hover img.on {display:block}
        .wb_cts04 ul:after {content:""; display:block; clear:both}
  
    </style>
    

    <div class="p_re evtContent NSK" id="evtContainer">       
        <div class="evtCtnsBox wb_cts01">
            <div class="wb_cts01_mo">
                <span class="wb_cts01_tit1"><img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV01_02.png" alt="합격노트"></span>
                <span class="wb_cts01_tit2"><img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV01_01.png" alt="노트이미지"></span>
                <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV01.jpg" usemap="#Map180316" border="0" alt="N수생를 위한 합격비법">
                <map name="Map180316" >
                    <area shape="rect" coords="158,18,586,97"  href="/event/movie/event.html?event_cd=On_180110_c1&topMenuType=O" onFocus="this.blur();" alt="초시생을 위한 합격비법"/>
                    <area shape="rect" coords="677,22,1055,93" href="#"  onfocus="this.blur();"  alt="N수생을 위한 합격비법" />
                </map>
            </div>
        </div><!--wb_cts01//-->
  

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV02.jpg" alt="기출을 알고 나를 알면 백전백승">
        </div><!--wb_cts02//-->
  
  
        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV03.jpg" alt="체계적으로 정답 잡는 오답노트 작성법 대공개"  />
            <ul class="tabs">
                <li><a href="#tab1">국어</a></li>
                <li><a href="#tab2">영어</a></li>
                <li><a href="#tab3">한국사</a></li>
            </ul>
            <div id="tab1">
                <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV03_01.jpg" alt="국어 오답노트"  />
            </div>
            <div id="tab2">
                <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV03_02.jpg" alt="영어 오답노트"  />
            </div>
            <div id="tab3">
                <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV03_03.jpg" alt="한국사 오답노트"  />
            </div>
            <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV03_04.jpg" alt="그동안 풀었던 문제를 오답노트를 통해 확실하게 정리하고 있었나요?"  />
        </div><!--wb_cts03//-->
    
        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2018/03/180316_EV04.jpg" alt="이제 합격을 위해 다시 도전할 준비가 되셨나요?"  />
            <ul>
                <li> 
                    <a href="/001/index.html?topMenuType=O&topMenu=001&topMenuName=9급공무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg" class="off" alt="9급페트라pass"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1on.jpg" class="on" alt="9급페트라pass" />
                    </a>
                </li>
                <li>
                    <a href="http://www.willbescop.net" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg" class="off" alt="신광은경찰pass"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2on.jpg" class="on" alt="신광은경찰pass" />
                    </a>
                </li>
                <li> 
                    <a href="/005/index.html?topMenuType=O&topMenu=005&topMenuName=세무/관세&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg" class="off" alt="이진욱세무팀 세파르타"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3on.jpg" class="on" alt="이진욱세무팀 세파르타"/>
                    </a>
                </li>
                <li> 
                    <a href="/018/index.html?topMenuType=O&topMenu=018&topMenuName=법원직 김동진팀&topMenuGnb=OM_001&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg" class="off" alt="김동진 법원팀"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4on.jpg" class="on" alt="김동진 법원팀"/>
                    </a>
                </li>
                <li >
                    <a href="/006/index.html?topMenuType=O&topMenu=006&topMenuName=소방공무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg" class="off" alt="소방직PASS" />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5on.jpg" class="on" alt="소방직PASS"/>
                    </a>
                </li>
                <li> 
                    <a href="/011/index.html?topMenuType=O&topMenu=011&topMenuName=기술직&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg" class="off" alt="윌비스기술직"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6on.jpg" class="on" alt="윌비스기술직"/>
                    </a>
                </li>
                <li> 
                    <a href="/007/index.html??topMenuType=O&topMenu=007&topMenuName=군무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7.jpg" class="off" alt="군무원행정직PASS"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7on.jpg" class="on" alt="군무원행정직PASS"/>
                    </a>
                </li>
                <li>
                    <a href="/main/index.html" target="_blank" onFocus="this.blur();" >
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg" class="off" alt="윌비스T-PASS"  />
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8on.jpg" class="on" alt="윌비스T-PASS" />
                    </a>
                </li>
            </ul>
        </div>
        <!-- wb_cts04 //-->

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(document).ready(function(){
            $('ul.tabs').each(function(){
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

                    e.preventDefault()})}
            )}
        );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });         
    </script> 
@stop