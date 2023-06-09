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
        
        .rLnb {
            position:absolute; width:190px; top:240px; right:10px; z-index:1;
        }
        .rLnb ul {background:#fff; border:1px solid #2f2f2f; margin-bottom:10px;
            -webkit-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            -moz-box-shadow: 5px 5px 10px 0px rgba(0,0,0,0.21);
            box-shadow:5px 5px 10px 0px rgba(0,0,0,0.21);
        }
        .rLnb li {}
        .rLnb li:first-child {
            background:#cdcdcd;
            color:#000;
            text-align:center;
            padding:12px 0;
            font-weight:bold;
            font-size:15px;
			letter-spacing:-1px			
        }
        .rLnb .typeA a {
            border-bottom:1px solid #bfbfbf; display:block; padding:10px 10px 10px 15px; line-height:1.4; font-weight:bold; 
            background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb_arrow.jpg) no-repeat 93% center;        }
        .rLnb .typeA a:hover {
            font-weight: 600;
            background:#ebebeb url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb_arrow.jpg) no-repeat 93% center;
        }
        .rLnb .typeA li:last-child a {border:0}
        .rLnb .typeB li {            
            text-align:center;
            padding:15px 0;
            line-height: 1.4;
        }
        .rLnb .typeB a {display:block; background:#000; color:#fff; border-radius: 20px; padding:8px 0; margin:0 20px}

	
        .LAeventZ01 {width:100%; text-align:center; background:#111 url(http://file3.willbes.net/new_gosi/2019/leave_army/la_incheon_top_bg.jpg) no-repeat center top; background-size:auto; margin-top:20px; position:relative}

        /*플립 애니메이션*/
        .LAeventZ01 .main_img {position:absolute; width:1120px; top:150px; left:50%; margin-left:-560px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}
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

        .LAeventZ02 {width:100%; text-align:center; background:#ececec; position:relative}		
    </style>
    


    <div class="p_re evtContent" id="evtContainer">        
        <div class="rLnb">
            @include('html.event_onLeaveArmyPassRlnb')
        </div>       
        
        <div class="LAeventZ01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
				<img src="http://file3.willbes.net/new_gosi/2019/leave_army/la_incheon_top_txt.png" alt="">
			</div>
            <img src="http://file3.willbes.net/new_gosi/2019/leave_army/la_incheon_top.jpg" alt=""/>                           
		</div>
        
        <div class="LAeventZ02">
		  	<img src="http://file3.willbes.net/new_gosi/2019/leave_army/la_incheon_01.jpg" alt=""/>                        
		</div>
    </div>
    <!-- End Container -->


    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });

        $(function(){
            var vi = 0;  // 하단에 메뉴 표시할 스크롤 위치값 지정
            var nav_y = $(".rLnb").offset().top + $(".rLnb").height();

            $(window).scroll(function(){
                var num = $(window).scrollTop();
                if( num > nav_y ){
                    if( num > vi ){
                        $(".rLnb").css({"position":"fixed","top":"20px","rigth":"20px"}).fadeIn();
                    }else{
                        $(".rLnb").fadeOut();
                    }
                }else{
                    $(".rLnb").finish().css({"top":"100px"});
                } 
            });
        });      
    </script>

@stop