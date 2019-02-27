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

        .wb_cts01 {background:#ededed url("http://file3.willbes.net/new_gosi/2018/10/EV181012_1_bg.png") center top no-repeat; margin-top:20px}
        .wb_cts02 {background:#b8755a}
        .wb_cts02_box {width:1210px; margin:auto}
        .wb_cts03 {text-align:center; background:#ededed;}
        .wb_cts04 {background:#fff}
        .wb_cts04_box {width:1210px; margin:auto}

        /*TAB*/
        .tab_menu {width:1210px; text-align:center; background:#b8755a;}
        .tab01 {width:980px; margin:0 auto !important;}
        .tab01 li {display:inline; float:left; margin-right:0px}
        .tab01 li:last-child {margin:0}
        .tab01 li a {display:block}
        .tab01 li a img.on {display:none}
        .tab01 li a img.off {display:block}
        .tab01 li a:hover img.on,
        .tab01 li a.active img.on{display:block}
        .tab01 li a:hover img.off,
        .tab01 li a.active img.off{display:none}
        .tab01:after {content:""; display:block; clear:both}
        
        .tab_menu2 {width:1210px; text-align:center; background:#fff;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_1.png" alt="#"/>
        </div>
        <!--wb_cts01//-->
  
        <div class="evtCtnsBox wb_cts02">
            <div class="wb_cts02_box">
            <div class="tab_menu">
                <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2.png" alt="" />
                <ul class="tab01">
                    <li><a href="#tab1"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_1.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_1_on.png" alt="" class="on"/></a></li>
                    <li><a href="#tab2"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_2.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_2_on.png" alt="" class="on"/></a></li>
                    <li><a href="#tab3"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_3.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_3_on.png" alt="" class="on"/></a></li>
                    <li><a href="#tab4"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_4.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_4_on.png" alt="" class="on"/></a></li>
                    <li><a href="#tab5"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_5.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_5_on.png" alt="" class="on"/></a></li>
                    <li><a href="#tab6"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_6.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_tab_6_on.png" alt="" class="on"/></a></li>
                </ul>
            
                <div id="tab1" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_1.png" alt="" usemap="#Map_law_go" border="0" />
                    <map name="Map_law_go"><area shape="rect" coords="347,342,626,399" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_180321_k&topMenuType=O"  target="_blank" alt="예비순환" /></map>
                </div>

                <div id="tab2" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_2.png" alt="" usemap="#Map_law_go2" border="0" />
                    <map name="Map_law_go2"><area shape="rect" coords="363,339,624,397" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_180321_law1&topMenuType=O"  target="_blank" alt="1순환" /></map>
                </div>

                <div id="tab3" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_3.png" alt="" usemap="#Map_law_go3" border="0" />
                    <map name="Map_law_go3"><area shape="rect" coords="353,337,624,398" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_180529_law2&topMenuType=O"  target="_blank" alt="2순환" /></map>
                </div>

                <div id="tab4" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_4.png" alt="" usemap="#Map_law_go4" border="0" />
                    <map name="Map_law_go4"> <area shape="rect" coords="349,335,641,400" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_180906_law3&topMenuType=O"  target="_blank" alt="3순환" /></map>
                </div>

                <div id="tab5" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_5.png" alt="" usemap="#Map_law_go5" border="0" />
                    <map name="Map_law_go5"><area shape="rect" coords="356,343,629,398" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_181001_law4&topMenuType=O"  target="_blank" alt="4순환" /></map>
                </div>

                <div id="tab6" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_2_6.png" alt="" usemap="#Map_law_go6" border="0" />
                    <map name="Map_law_go6"> <area shape="rect" coords="356,339,632,397" href="http://www.willbesgosi.net/event/movie/event.html?event_cd=On_181001_law4&topMenuType=O" target="_blank" alt="5순환" /></map>
                </div>

            </div>
            </div>
        </div>
        <!--wb_cts02//-->
  
        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_3.png" alt="#"/>
        </div>
        <!--wb_cts03//-->
  
        <div class="evtCtnsBox wb_cts04">
            <div class="wb_cts04_box">
                <div class="tab_menu2">
                    <img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4.png" alt="#"/>
                    <ul class="tab01 tab02">
                        <li><a href="#tab7"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_t1.png" class="off" /><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_t1_on.png" alt="" class="on"/></a></li>
                        <li><a href="#tab8"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_t2.png" alt="" class="off"/><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_t2_on.png" alt="" class="on"/></a></li>
                    </ul>
                    <div id="tab7" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_1.png" alt="#" usemap="#Map_law_lec" border="0"/>
                        <map name="Map_law_lec">
                            <area shape="rect" coords="183,332,407,394" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800088" target="_blank" alt="3법팩">
                            <area shape="rect" coords="494,334,718,394" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800087" target="_blank" alt="5법팩">
                            <area shape="rect" coords="798,336,1040,397" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800086" target="_blank" alt="4,5순환 문풀 팩">
                        </map>
                    </div>

                    <div id="tab8" class="tabCts"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181012_4_2.png" alt="#" usemap="#Map_lec_go2" border="0"/>
                        <map name="Map_lec_go2">
                            <area shape="rect" coords="124,349,288,397" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800046" target="_blank" alt="1순환">
                            <area shape="rect" coords="325,349,487,400" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800057" target="_blank" alt="2순환">
                            <area shape="rect" coords="522,349,687,397" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800076" target="_blank" alt="3순환">
                            <area shape="rect" coords="720,351,888,401" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800082" target="_blank" alt="4순환">
                            <area shape="rect" coords="922,353,1087,398" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=018&topMenuName=&topMenuType=O&searchCategoryCode=018&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800124" target="_blank" alt="5순환">
                        </map>
                    </div>
                </div>
            </div>
        </div>
        <!--wb_cts04//-->
    
    </div>
    <!-- End Container -->
                    
    <script>   
        $(document).ready(function(){
        $('.tab01').each(function(){
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
        
            e.preventDefault()})})}
        );

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>
@stop