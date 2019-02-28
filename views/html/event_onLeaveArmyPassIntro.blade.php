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
        
        .LAeventZ01 {
            background:url(../../public/img/willbes/leave_army/la_00_top_bg.jpg) no-repeat center top; 
            margin-top:10px; 
            position:relative
        }
	
        /*플립 애니메이션*/
        .LAeventZ01 .main_img {position:absolute; width:601px; top:534px; left:50%; margin-left:-300px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
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

        .LAeventZ02 {background:#ececec;}		
    </style>
    


    <div class="p_re evtContent" id="evtContainer">        
        <div class="evtCtnsBox LAeventZ01">
        	<div class="main_img flipInX animated" style="opacity:1;">
                <img src="{{ img_url('leave_army/la_00_top_txt.png') }}" alt="전역(예정)군인 인증센터"> 
			</div>
            <img src="{{ img_url('leave_army/la_00_top.jpg') }}" alt="전역(예정)군인 인증센터">                           
		</div>
        <div class="evtCtnsBox LAeventZ02">
            <img src="{{ img_url('leave_army/la_00_01.jpg') }}" alt="학원실강/온라인동영상 교육과정" usemap="#Map180123" border="0"> 
            <map name="Map180123" id="Map180123">
                <area shape="rect" coords="67,835,197,864" href="#none" alt="학원실강 서울 노량진"/>
                <area shape="rect" coords="215,835,346,864" href="#none" alt="학원실강 인천 부평"/>
                <area shape="rect" coords="365,835,494,864" href="#none" alt="학원실강 부산 서면"/>
                <area shape="rect" coords="776,835,905,864" href="#none" alt="온라인 교육과정"/>
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