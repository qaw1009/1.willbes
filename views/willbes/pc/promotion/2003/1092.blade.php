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

        .wb_cts01 {background:url("http://file3.willbes.net/new_gosi/2018/01/EV180129_k_bg.jpg") center top no-repeat; margin-top:20px}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#bdc6e2; height:1270px}        
            .cont_inner {position:relative ;width:1210px; margin:0 auto}
            .roll_img {position:absolute;left:0;top:0;bottom:0;right:0}
	        .roll_img li {position:absolute;left:0;top:0;opacity:0} 

        
        .wb_cts04 {width:100%; text-align:center; background:url("http://file3.willbes.net/new_gosi/2018/01/EV180117_k_bg2.jpg") center top no-repeat}
        .wb_cts05 {width:100%; text-align:center; background:url("http://file3.willbes.net/new_gosi/2018/01/EV180117_k_bg2.jpg") center top no-repeat}
        .wb_cts06 {width:100%; text-align:center; background:url("http://file3.willbes.net/new_gosi/2018/01/EV180117_k_bg2.jpg") center top no-repeat}
        .wb_cts07 {width:100%; text-align:center; background:url("http://file3.willbes.net/new_gosi/2018/01/EV180117_k_bg3.jpg") center top no-repeat}
        .wb_cts08 {width:100%; text-align:center; background:#e9e9e9}	


    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
    <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_1.png" alt=""/>
        </div><!--wb_cts01//-->      
        
        <div class="evtCtnsBox wb_cts02">  		
            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_2.gif" alt="" />       
        </div><!--wb_cts02//-->


		<div class="evtCtnsBox wb_cts03">	
		  <div class="cont_inner">
				<div style="position:absolute; top:0; width:1210px; height:1270px; left:50%; margin-left:-605px; z-index:10">
                    <ul class="roll_img">
                        <li>
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_t1.jpg" alt="방송통신직 전기직 최우영" usemap="#tch_over1_1Map"/>
                            <map name="tch_over1_1Map">
                              <area onfocus='blur()' shape="rect" coords="533,285,696,515" href="javascript:;" class="tch2" alt="장사원"/>
                              <area onfocus='blur()' shape="rect" coords="708,289,857,515" href="javascript:;" class="tch3" alt="하재남"/>
                              <area onfocus='blur()' shape="poly" coords="318,500,62,490,212,159,562,144,586,259,396,276,367,363" href="javascript:;" class="tch4" alt="김정배 고진목 송광진 장재영"/>
                              <area onfocus='blur()' shape="poly" coords="622,274,609,147,782,146,1079,279,1102,515,906,516,856,393,841,287" href="javascript:;" class="tch5" alt="장재영 송광진 고진목 김정배"/>
                              <area onfocus='blur()' shape="rect" coords="331,583,599,648" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt103" class="tch6" alt="최우영 방송통신직 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="612,583,881,648" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt_103" class="tch7" alt="최우영 전기직 커리큘럼"/>
                            </map> 
                      </li>
                        <li>
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_t2.jpg" alt="농업직 농촌지도사 장사원" usemap="#tch_over2_1Map"/>
                            <map name="tch_over2_1Map">
                              <area onfocus='blur()' shape="rect" coords="364,283,516,514" href="javascript:;" class="tch1" alt="최우영"/>
                              <area onfocus='blur()' shape="rect" coords="708,289,857,515" href="javascript:;" class="tch3" alt="하재남"/>
                              <area onfocus='blur()' shape="poly" coords="318,500,62,490,212,159,562,144,586,259,396,276,367,363" href="javascript:;" class="tch4" alt="김정배 고진목 송광진 장재영"/>
                              <area onfocus='blur()' shape="poly" coords="622,274,609,147,782,146,1079,279,1102,515,906,516,856,393,841,287" href="javascript:;" class="tch5" alt="장재영 송광진 고진목 김정배"/>
                              <area onfocus='blur()' shape="rect" coords="430,580,777,651" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt-t001" class="tch6" alt="장사원 커리큘럼"/>
                            </map> 
                      </li>
                        <li>
                          <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_t3.jpg" alt="보건직 하재남" usemap="#tch_over3_1Map"/>
                            <map name="tch_over3_1Map">
                              <area onfocus='blur()' shape="rect" coords="364,283,516,514" href="javascript:;" class="tch1" alt="최우영"/>
                              <area onfocus='blur()' shape="rect" coords="526,285,689,515" href="javascript:;" class="tch2" alt="장사원"/>
                              <area onfocus='blur()' shape="poly" coords="318,500,62,490,212,159,562,144,586,259,396,276,367,363" href="javascript:;" class="tch4" alt="김정배 고진목 송광진 장재영"/>
                              <area onfocus='blur()' shape="poly" coords="622,274,609,147,782,146,1079,279,1102,515,906,516,856,393,841,287" href="javascript:;" class="tch5" alt="장재영 송광진 고진목 김정배"/>
                              <area onfocus='blur()' shape="rect" coords="431,582,779,650" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt102" class="tch6" alt="하재남 커리큘럼"/>
                            </map> 
                      </li>
                        <li>
                          <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_t4.jpg" alt="김명애 유선영 장성국 조복희" usemap="#tch_over4_1Map"/>
                            <map name="tch_over4_1Map">
                              <area onfocus='blur()' shape="rect" coords="364,283,516,514" href="javascript:;" class="tch1" alt="최우영"/>
                              <area onfocus='blur()' shape="rect" coords="533,285,696,515" href="javascript:;" class="tch2" alt="장사원"/>
                              <area onfocus='blur()' shape="rect" coords="708,289,857,515" href="javascript:;" class="tch3" alt="하재남"/>
                              <area onfocus='blur()' shape="poly" coords="622,274,609,147,782,146,1079,279,1102,515,906,516,856,393,841,287" href="javascript:;" class="tch5" alt="장재영 송광진 고진목 김정배"/>
                              <area onfocus='blur()' shape="rect" coords="165,583,382,649" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_011&topMenu=011&menuID=&searchUserId=wgt186" class="tch6" alt="김명애 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="386,583,603,647" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt_1601" class="tch7" alt="유선영 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="610,582,824,648" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt-1602" class="tch8" alt="장성국 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="828,580,1048,649" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt8250" class="tch9" alt="조복희 커리큘럼"/>
                            </map> 
                      </li>
                        <li>
                          <img src="http://file3.willbes.net/new_gosi/2018/01/EV180129_k_t5.jpg" alt="김정배 고진목 송광진 장재영" usemap="#tch_over5_1Map"/>
                            <map name="tch_over5_1Map">
                              <area onfocus='blur()' shape="rect" coords="364,283,516,514" href="javascript:;" class="tch1" alt="최우영"/>
                              <area onfocus='blur()' shape="rect" coords="533,285,696,515" href="javascript:;" class="tch2" alt="장사원"/>
                              <area onfocus='blur()' shape="rect" coords="708,289,857,515" href="javascript:;" class="tch3" alt="하재남"/>
                              <area onfocus='blur()' shape="poly" coords="318,500,62,490,212,159,562,144,586,259,396,276,367,363" href="javascript:;" class="tch4" alt="김정배 고진목 송광진 장재영"/>
                              <area onfocus='blur()' shape="rect" coords="165,583,382,649" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt-t002" class="tch6" alt="김정배 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="386,583,603,647" href="/teacher/movieTeacherDetail.html?&topMenuType=O&topMenuGnb=OM_002&topMenu=011&menuID=&searchUserId=wgt_1602" class="tch7" alt="고진목 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="610,582,824,648" href="/teacher/movieTeacherDetail.html?topMenuType=O&topMenuGnb=OM_002&topMenu=001&topMenuName=9급공무원&menuID=&searchUserId=wgt-1603&searchSubjectNm=정보보호론&searchSubjectCode=1064" class="tch8" alt="송광진 커리큘럼"/>
                              <area onfocus='blur()' shape="rect" coords="828,580,1048,649" href="/teacher/movieTeacherDetail.html?topMenuType=O&topMenuGnb=OM_002&topMenu=001&topMenuName=9급공무원&menuID=&searchUserId=wgt1603&searchSubjectNm=임업경영&searchSubjectCode=1117" class="tch9" alt="장재영 커리큘럼"/>
                            </map> 
                      </li>
                    </ul>
        		</div> 
			</div>                  
		</div><!--wb_cts03//-->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
		var J$ = jQuery.noConflict();
    </script>
    
    <script type="text/javascript">	

        //리스트(ul) rolling2
        function rolling2(o) {
            J$(o).siblings().css({ 'z-index': '1'}).animate({ opacity: '0' }, 300);
            J$(o).css({ 'z-index': '2'}).animate({ opacity: '1' }, 300);
        }

        (function(a){
            a.fn.roll_auto2=function(p){
                var s_t_i=p&&p.scroller_time_interval?p.scroller_time_interval: 2000; // 자동롤링속도
                var dom=a(this);
                var s_length=dom.length;
                var timer;
                var current = 0; begin(); play();
                function begin(){
                    dom.parent().hover(function(){stop();},function(){timer = setTimeout(play,s_t_i);});
                    J$(".roll_img li").find('area').on('click', function(){
                        var area_current = J$(this).attr( "class" );
                        var area_current2 = area_current.substring( 3, 5 );
                        current = area_current2-1;
                        rolling2(dom[current]);
                    });
                }
                function stop(){ clearTimeout(timer); }
                function play(){
                    clearTimeout(timer);
                    rolling2(dom[current]);
                    if(current >= s_length-1){
                            current = 0;
                    }else{
                        current ++;
                    }
                    timer = setTimeout(play,s_t_i);
                }

            }
        })(jQuery);

        setTimeout(function(){J$(".roll_img li").roll_auto2();},2000);
    </script>

    <script type="text/javascript">
        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });
    </script>
@stop