@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        body{width:100%; min-width:1240px; margin:auto;}
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}        

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#dbc6b3 url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c2_bg.jpg) no-repeat center top; margin-top:20px}
        
        .m_title {display: block; position:absolute; top:550px; left:50%; margin-left:-605px; z-index:9000}        
        
        .wb_cts01 {  width:100%; text-align:center; min-width:1210px; background:#dbc6b3 url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c1_bg.jpg) no-repeat center top; margin-top:20px}	
        .wb_cts01 div { position:relative; width:1210px; margin:0 auto}
        .wb_cts01 div .why {position: absolute; top:550px; left:50%; width:1210px; margin-left:-605px; z-index:100}

        .wb_cts02 {width:100%; min-width:1210px; text-align:center; background:#fff url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c3_bg.jpg) no-repeat center top}

        .wb_cts03 { width:100%; text-align:center; min-width:1210px; padding-bottom:50px; background:#edf1f4 ;}
        .wb_cts04 ul {width:100%; margin:0 auto; max-width:980px}
        
		.menuWarp {position:relative; width:980px; height:730px; margin:0 auto} /**/
		.PeMenu {position:absolute; width:980px; height:328px; top:0px; left:0px;}
		.PeMenu li { display:inline; float:left}
		.PeMenu li a img.off {display:block} 	
		.PeMenu li a img.on {display:none} 	

        .skybanner {
            position:absolute; 
            top:20px; 
            right:10px;
            width:112px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}
  
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="skybanner">
            <div>   
                <img  src="http://file3.willbes.net/new_gosi/2018/01/EV180110_sky.jpg" alt="초시생 위합 합격비법" usemap="#Map180110_c1" border="0">
                <map name="Map180110_c1" >
                    <area shape="rect" coords="16,19,98,104" href="#Q1" onfocus="this.blur();"  />
                    <area shape="rect" coords="22,121,99,194" href="#Q2" onfocus="this.blur();"  />
                    <area shape="rect" coords="18,212,96,295" href="#Q3" onfocus="this.blur();" />
                    <area shape="rect" coords="16,308,99,397" href="#Q4" onfocus="this.blur();" />
                    <area shape="rect" coords="16,406,109,486" href="#Q5" onfocus="this.blur();" />
                </map>
            </div>
		</div>
        
        <div class="wb_cts01" >
      		<div>
                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c1_2.jpg" usemap="#Map171218_c2" border="0"  >
                <map name="Map171218_c2" >
                    <area shape="rect" coords="158,18,585,103"  href="#" target="_blank" onFocus="this.blur();" alt="초시생을 위한 합격비법"/>
                    <!--area shape="rect" coords="677,22,1055,93" href="javascript:alert('*** Coming Soon! ***');"  onfocus="this.blur();"  alt="Coming Soon!" /-->
                    <area shape="rect" coords="677,22,1055,93" href="/event/movie/event.html?event_cd=On_180322_y&topMenuType=O"  onfocus="this.blur();"  alt="N수생의 합격노트" />
                </map>
                <div class="why"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_top.gif" alt=""/></div>
                <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c2.jpg"  >
      		</div>
	    </div><!--wb_cts01//-->

        <div class="wb_cts02" >
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c3.jpg" alt="과락률 50%, 70점 미만 86.6%!"  /></li>
                <li id="Q1">
                    <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c4.jpg" alt="공무원에는 어떤 직렬이 있나요?" usemap="#Map180110_c2" border="0" />
                    <map name="Map180110_c2" >
                        <area shape="rect" coords="111,433,241,484" href="/boardExamInfoOn/board_list.html?topMenuType=O&topMenuGnb=OM_005&topMenu=001&menuID=OM_005_001&BOARDTYPE=1&INCTYPE=list&BOARD_MNG_SEQ=NOTICE_008" target="_blank"   onfocus="this.blur();"/>
                    </map>
                <li id="Q2"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c5.jpg" alt="Q2. 시험은 어떤 식으로 치러지나요?" />
                <li id="Q3"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c6.jpg" alt="Q3. 올해 시험 일정은 언제인가요?" />
                <li id="Q4"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c7.jpg" alt="Q4. 시험 공부 계획은 어떻게 세워야 하나요?" />
                <li id="Q5"><img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c8.jpg" alt="Q5. 공무원, 경찰, 소방 단기간 합격비법, 영어에 달려있다! " />
                </li>
            </ul>
        </div><!--wb_cts02//-->  
  
        <div class="wb_cts03" >
  			<img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c9.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"  />
            <div class="menuWarp">
                <div class="PeMenu">
                    <ul>
                        <li> 
                            <a href="http://www.willbesgosi.net/001/index.html?topMenuType=O&topMenu=001&topMenuName=9급공무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_1.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbescop.net/main/index.html" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_2.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbesgosi.net/005/index.html?topMenuType=O&topMenu=005&topMenuName=세무/관세&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_3.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbesgosi.net/018/index.html?topMenuType=O&topMenu=018&topMenuName=법원직 김동진팀&topMenuGnb=OM_001&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" alt=""  />
                            </a>
                        </li>
                        <li class="2line">
                            <a href="http://www.willbesgosi.net/006/index.html?topMenuType=O&topMenu=006&topMenuName=소방공무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_5.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="/011/index.html?topMenuType=O&topMenu=011&topMenuName=기술직&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_6.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbesgosi.net/007/index.html??topMenuType=O&topMenu=007&topMenuName=군무원&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_7.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_4.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbesgosi.net/main/index.html" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/01/EV180110_c10_8.jpg'" alt=""  />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--wb_cts03//-->

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $( document ).ready( function() {
            var jbOffset = $( '.skybanner' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.skybanner' ).addClass( 'skybanner_sectionFixed' );
              }
              else {
                $( '.skybanner' ).removeClass( 'skybanner_sectionFixed' );
              }
            });
          } );

        $(document).ready(function() {
            $('.skybanner').onePageNav({
                currentClass: 'hvr-shutter-out-horizontal_active'
            });
        }); 

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });         
    </script> 
@stop