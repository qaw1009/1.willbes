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
            background:url(../../public/img/willbes/leave_army/la_on_top_bg.jpg) no-repeat center top;         
        }
        /*플립 애니메이션*/
        .LAeventA01 .main_img {position:absolute; width:601px; top:1000px; left:50%; margin-left:-488px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
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
        
        .LAeventA01 .flipInX {
        -webkit-backface-visibility: visible !important;
        backface-visibility: visible !important;
        -webkit-animation-name: flipInX;
        animation-name: flipInX;
        }
        
        .LAeventA02 {width:100%; text-align:center; background:#ececec}
        .LAeventA02 ul {width:1034px; margin:0 auto; }
        .LAeventA02 li {margin-bottom:13px; margin-right:13px; display:inline; float:left;}
        .LAeventA02 li:nth-child(3n+3) {margin:0}
        .LAeventA02 ul:after {
            content:'';
            display:block;
            clear:both;
        }
        .LAeventA03 {width:100%; text-align:center; background:#252525}		
    </style>
    
    <div class="p_re evtContent" id="evtContainer">
        @include('html.event_onLeaveArmyPassRlnb') 
        
        <div class="LAeventA01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
                <img src="{{ img_url('leave_army/la_on_top_txt.png') }}" alt="윌비스 PASS 혜택">  
			</div>
            <img src="{{ img_url('leave_army/la_on_top.jpg') }}" alt="윌비스 PASS">                          
		</div>
        
        <div class="LAeventA02">
        	<img src="{{ img_url('leave_army/la_on_01.jpg') }}" alt=""/>
			<ul>
            	<li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m1.jpg') }}" alt="소방직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m2.jpg') }}" alt="경찰직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m3.jpg') }}" alt="군무원"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m4.jpg') }}" alt="기술직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m5.jpg') }}" alt="일반행정직"/></a></li>
                <li><a href="#none"><img src="{{ img_url('leave_army/la_on_01_m6.jpg') }}" alt="소방(산업)기사 자격증"/></a></li>
            </ul>
            <img src="{{ img_url('leave_army/la_on_02.jpg') }}"  alt="" usemap="#Mappass02"/>
            <map name="Map" id="Mappass02">
                <area shape="rect" coords="194,1063,398,1102" href="#" />
                <area shape="rect" coords="714,1063,922,1102" href="#" />
            </map>
        </div>
        <div class="LAeventA03">
        	<img src="{{ img_url('leave_army/la_on_03.jpg') }}" alt="합격을 위한 너무나 다영한 선택! 윌비스 PASS"/>
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