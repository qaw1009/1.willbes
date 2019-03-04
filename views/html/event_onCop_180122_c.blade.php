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
            position:relative;            
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }	
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute; 
            top:20px; 
            right:10PX;
            z-index:1;            
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}    

        .wb_cts01 {background:#0091fa url(http://file3.willbes.net/new_cop/2018/01/EV180122_c1_bg.jpg) no-repeat center top; position:relative;}	
        .wb_cts01 div {position:relative;}
        .wb_cts01 div .why {position: absolute; top:624px; left:50%; width:1210px;  margin-left:-605px; z-index:100; }            
        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_gosi/2018/01/EV180110_c3_bg.jpg) no-repeat center top;}
        .wb_cts03 {background:#edf1f4}
		.menuWarp {position:relative; width:980px; height:490px; margin:0 auto; } /**/
		.PeMenu {position:absolute; width:980px; height:328px; top:0px; left:0px;}
		.PeMenu li { display:inline; float:left}
		.PeMenu li a img.off {display:block} 	
		.PeMenu li a img.on {display:none} 

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img  src="http://file3.willbes.net/new_cop/2018/01/EV180122_c11.jpg" alt="초시생 위합 합격비법" usemap="#Map180110_c1" border="0">
            <map name="Map180110_c1" >
                <area shape="rect" coords="16,19,98,104" href="#Q1" onfocus="this.blur();"  />
                <area shape="rect" coords="22,121,99,194" href="#Q2" onfocus="this.blur();"  />
                <area shape="rect" coords="18,212,96,295" href="#Q3" onfocus="this.blur();" />
                <area shape="rect" coords="16,308,99,397" href="#Q4" onfocus="this.blur();" />
                <area shape="rect" coords="11,405,104,485" href="#Q5" onfocus="this.blur();" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <div id="main">
                <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c1.jpg" usemap="#Map171218_c2" border="0"  >
                <map name="Map171218_c2" >
                    <area shape="rect" coords="157,17,584,102"  href="#none"  onfocus="this.blur();" alt="초시생을 위한 합격비법"/>
                    <area shape="rect" coords="677,22,1055,93" href="{{ site_url('/home/html/event_onCop_181127_c') }}"  onfocus="this.blur();"  alt="N수생을 위한 합격비법" />
                </map>
                <div class="why"><img src="http://file3.willbes.net/new_cop/2018/01/EV180122_top.gif" alt=""/></div>
                <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c2.jpg"  >
            </div>
        </div>
        <!--wb_cts01//-->    

        <div class="evtCtnsBox wb_cts02" >
            <ul>
                <li> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c3.jpg" alt="과락률 50%, 70점 미만 86.6%!"  /></li>
                <li id="Q1"> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c4.jpg" alt="공무원에는 어떤 직렬이 있나요?" usemap="#Map180122_c2" border="0" />
                <map name="Map180122_c2" >
                    <area shape="rect" coords="111,433,241,484" href="/boardExamInfoOn/board_list.html?topMenuType=O&topMenuGnb=OM_005&topMenu=081&menuID=OM_005_001&BOARDTYPE=1&INCTYPE=list&BOARD_MNG_SEQ=NOTICE_008" target="_blank"   onfocus="this.blur();"/>
                </map>
                <li id="Q2"> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c5.jpg" alt="Q2. 시험은 어떤 식으로 치러지나요?" usemap="#Map180122_c3" border="0" />
                <map name="Map180122_c3" >
                    <area shape="rect" coords="675,357,797,393" href="/boardExamInfoOn/board_list.html?topMenuGnb=OM_005&BOARDTYPE=3&INCTYPE=list&BOARD_MNG_SEQ=&topMenuType=O&topMenuGnb=OM_005&topMenu=081&topMenuName=ÀÏ¹Ý°æÂû&menuID=OM_005_003&active_menu=4" onfocus="this.blur();" target="_blank"/>
                    <area shape="rect" coords="676,627,791,676" href="http://www.willbescop.net/boardExamInfoOn/board_list.html?topMenuGnb=OM_005&BOARDTYPE=3&INCTYPE=list&BOARD_MNG_SEQ=&topMenuType=O&topMenuGnb=OM_005&topMenu=081&topMenuName=ÀÏ¹Ý°æÂû&menuID=OM_005_003&active_menu=5" onfocus="this.blur();" target="_blank"/>
                </map>
                <li id="Q3"> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c6.jpg" alt="Q3. 올해 시험 일정은 언제인가요?" />
                <li id="Q4"> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c7.jpg" alt="Q4. 시험 공부 계획은 어떻게 세워야 하나요?" />
                <li id="Q5"> <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c8.jpg" alt="Q5. 공무원, 경찰, 소방 단기간 합격비법, 영어에 달려있다! " />
                </li>
            </ul>
        </div><!--wb_cts02//-->  
  
        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c9.jpg" alt="윌비스와 함께 자랑스러운 대한민국의 공무원이 되어주세요!"  />
            <div class="menuWarp">
                <div class="PeMenu">
                    <ul>
                        <li> 
                            <a href="http://www.willbescop.net/main/index.html" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c10_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_1.jpg'" alt=""  />
                            </a>
                        </li>
                        <li>
                            <a href="http://www.willbescop.net/082/index.html?topMenuType=O&topMenu=082&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c10_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_2.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbescop.net/085/index.html?topMenuType=O&topMenu=085&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c10_3.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_3on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_3.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_3.jpg'" alt=""  />
                            </a>
                        </li>
                        <li> 
                            <a href="http://www.willbescop.net/080/index.html?ltopMenuType=O&topMenu=083&topMenuGnb=OM_001&topMenuGnb=OM_001" target="_blank" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2018/01/EV180122_c10_4.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_4on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_4.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2018/01/EV180122_c10_4.jpg'" alt=""  />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--wb_cts03//-->                
        
    </div>
    <!-- End Container -->  


    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>         
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });

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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });       
    </script>    
@stop