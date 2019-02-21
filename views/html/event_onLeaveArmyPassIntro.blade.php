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
        
        .LAeventZ01 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyZ01_bg.jpg) no-repeat center top; background-size:auto; margin-top:10px; position:relative}
	
        /*플립 애니메이션*/
        .LAeventZ01 .main_img {position:absolute; width:601px; top:457px; left:50%; margin-left:-300px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
        @@keyframes flipInX {
        from {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
            opacity: 0;
        }
        40% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
            -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
        }
        60% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
            opacity: 1;
        }
        80% {
            -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
            transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        }
        to {
            -webkit-transform: perspective(400px);
            transform: perspective(400px);
        }
        }

        .flipInX {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInX;
        animation-name: flipInX;
        }

        .LAeventZ02 {background:#ececec; padding-bottom:120px}		
    </style>
    
    @include('html.event_incOnTnb')

    <div class="p_re evtContent" id="evtContainer">
        @include('html.event_onLeaveArmyPassRlnb') 
        
        <div class="evtCtnsBox LAeventZ01">
        	<div class="main_img flipInX animated" style="opacity:1;">
				<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyZ01_txt.png" alt="전역(예정)간부인증센터">
			</div>
		  	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyZ01.jpg" alt="2년연속공식지정 국방부.보훈처 전문교육기관"/>                           
		</div>
        <div class="evtCtnsBox LAeventZ02">
		  	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyZ02_1.jpg" alt="합격을 위해 필요한 모든 것"/>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyZ02_2.jpg" alt="학원실강/온라인동영상 교육과정" usemap="#Map180123" border="0"/>
            <map name="Map180123" id="Map180123">
              <area shape="rect" coords="430,206,560,244" href="/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_f#tab3" alt="소방공무원" />
              <area shape="rect" coords="430,436,561,475" href="/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_a#tab3" alt="군무원" />
              <area shape="rect" coords="431,667,561,704" href="/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_ic" alt="공무원 인천" />
              <area shape="rect" coords="753,666,883,705" href="/event/arm_event.html?event_cd=On_leaveArmy_pass&topMenuType=O&EVENT_NO=710" alt="온라인과정" />
            </map>                        
		</div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });

        $( document ).ready( function() {
            var jbOffset = $( '.rLnb' ).offset();
            $( window ).scroll( function() {
              if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.rLnb' ).addClass( 'rLnb_sectionFixed' );
              }
              else {
                $( '.rLnb' ).removeClass( 'rLnb_sectionFixed' );
              }
            });
          } );

        $(document).ready(function() {
            $('.rLnb').onePageNav({
                currentClass: 'hvr-shutter-out-horizontal_active'
            });
        });       
    </script>

@stop