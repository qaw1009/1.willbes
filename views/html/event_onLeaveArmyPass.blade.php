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
        
        .LAeventA01 {
            position:relative;
            width:100%; 
            text-align:center; 
            background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_bg.jpg) no-repeat center top; 
            background-size:auto;         
        }
        .LAeventA01 .main_img {position:absolute; width:980px; top:474px; left:50%; margin-left:-490px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}

        .LAeventA01 .flipInX {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInX;
        animation-name: flipInX;
        }
        
        .LAeventA02 {width:100%; text-align:center; background:#ececec; padding-bottom:120px}
        .LAeventA02 div {width:904px; margin:0 auto; text-align:center}
        .LAeventA02 a {margin-bottom:10px; margin-right:10px; display:inline-block}
        .LAeventA03 {width:100%; text-align:center; background:#252525}		
    </style>
    
    <div class="p_re evtContent" id="evtContainer">
        @include('html.event_onLeaveArmyPassRlnb') 
        
        <div class="LAeventA01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
				<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_txt.png" alt="">
			</div>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01.jpg" alt="전역(예정)군인 인증센터"/>                           
		</div>
        
        <div class="LAeventA02">
        	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_1.jpg" alt=""/>
			<div>
            	<a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t1.jpg" alt="소방직"/></a>
                <a href="/event/arm_event.html?event_cd=On_leaveArmy02&topMenuType=O&EVENT_NO=53"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t2.jpg" alt="경찰직"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t3.jpg" alt="군무원"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t4.jpg" alt="기술직"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t5.jpg" alt="일반행정직"/></a>
            </div>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_2.jpg" alt=""/>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_3.jpg" alt="" usemap="#Map180124"/>
            <map name="Map" id="Map180124">
              <area shape="rect" coords="168,530,374,570" href="#none" />
              <area shape="rect" coords="611,531,816,569" href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710" />
            </map>
        </div>
        <div class="LAeventA03">
        	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_4.jpg" alt="오로지 학습에만 집중할 수 있도록 필요한 모든 것을 준비했습니다."/>
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