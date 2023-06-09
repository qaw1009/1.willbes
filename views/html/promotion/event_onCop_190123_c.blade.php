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

        .wb_cts03 {background:#fb9193 url(http://file3.willbes.net/new_cop/2019/01/EV190123_c1_bg.jpg) no-repeat center top;  margin-top:20px; padding-bottom:100px;}

            .menuWarp {position:relative; width:1210px; height:630px; margin:0 auto; } /**/
            .PeMenu {position:absolute; width:1210px;  top:0px; left:0px;}
            .PeMenu li { display:inline; float:left}
            .PeMenu li a img.off {display:block} 	
            .PeMenu li a img.on {display:none}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        
        <div class="evtCtnsBox wb_cts03" >
            <p><img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c1.png" alt=""  /></p>
            <div class="menuWarp">
                <div class="PeMenu">
                    <ul>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190111_c"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_1on.jpg'" alt="신광은 형소법"  />
                            </a>
                        </li>
                        <li>
                            <a href="/movie/event.html?event_cd=On_190118_y&topMenuType=O"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_2on.jpg'" alt="장정훈 경찰학"  />
                            </a>
                        </li>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190226_c&topMenuType=O" onfocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_3.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_3on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_3.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_3on.jpg'" alt="김원욱 형법"  />
                            </a>
                        </li>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190102_p&topMenuType=O"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_4.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_4on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_4.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_4on.jpg'" alt="하승민 경찰영어"  />
                            </a>
                        </li>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190110_o&topMenuType=O#main" onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_5.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_5on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_5.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_5on.jpg'" alt="오태진 경찰한국사"  />
                            </a>
                        </li>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190111_pp&topMenuType=O"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_6.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_6on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_6.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_6on.jpg'" alt="원유철 경찰한국사"  />
                            </a>
                        </li>
                        <li> 
                            <a href="/event/movie/event.html?event_cd=On_190111_p&topMenuType=O"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_cop/2019/01/EV190123_c2_7.jpg" onmouseover="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_7on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_7.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_cop/2019/01/EV190123_c2_7on.jpg'" alt="김현정 경찰영어"  />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>             
        
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
    </script>    
@stop