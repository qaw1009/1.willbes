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

        .wb_top {background:#272831 url(http://file3.willbes.net/new_cop/on_basic/OB190207_p1_bg.jpg) no-repeat center}	
        .wb_cts01 {background:#fff}	            
        .wb_cts02 {background:#473c38 url(http://file3.willbes.net/new_cop/on_basic/OB190207_p3_bg.jpg) no-repeat center}	
        .wb_cts03 {background:#e2dbd6}
        .wb_cts04 {background:#fff}	


        /*플립 애니메이션*/
        #eventWrap .cont_main .main_img {position:relative;z-index:5;opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both;}
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

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <div id="eventWrap">
                <img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p1_1.png" alt="1"  />
                <div class="cont_main">
                    <div class="inner">
                        <div class="main_img m_tit4 flipInX animated" style="opacity: 1;">
                            <img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p1_2.png" alt="기본이론"  />
                        </div>
                    </div>
                </div>                
                <img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p1_3.png" alt="3"  />
            </div>
        </div><!--//Wb_top-->   

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p2.jpg"  alt="언론" usemap="#link1" />
            <map name="link1" >
                <area shape="rect" coords="82,524,286,577" href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170126_p&topMenuType=O#main" onfocus='this.blur()' alt="언론보도" target="_blank"/>
            </map>
        </div><!--//wb_cts01-->
		
        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p3.png"  alt="신광은경찰팀" />
        </div><!--//wb_cts02-->
		
	<div class="evtCtnsBox wb_cts03" >
		<img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p4.png"  alt="이론안내" /></li>
		</ul>
	</div><!--//wb_cts03-->
       
	<div class="evtCtnsBox wb_cts04" id="table">
		<img src="http://file3.willbes.net/new_cop/on_basic/OB190207_p5.png"  alt="강좌소개" usemap="#link2" />
		<map name="link2" >
			<!--단과-->
			<area shape="rect" coords="389,410,451,435" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1004&searchLeccode=D201800590&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="형사소송법 기본이론(19년 1월)" target="_blank"/>
			<area shape="rect" coords="389,460,451,485" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1005&searchLeccode=D201900046&leftMenuLType=M0001&newlearningCD=M0111&lecKType=D" onfocus='this.blur()' alt="경찰학개론 기본이론(19년 2월)" target="_blank"/>
			<area shape="rect" coords="389,510,451,535" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1003&searchLeccode=D201800584&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="김원욱 형법 기본이론(19년 1월)" target="_blank"/>
			<area shape="rect" coords="389,560,451,585" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1001&searchLeccode=D201800589&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="하승민 영어 기본이론(19년 1월)" target="_blank"/>

			<area shape="rect" coords="814,410,872,435" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900057&leftMenuLType=M0001&newlearningCD=M0111&lecKType=D" onfocus='this.blur()' alt="오태진 한국사 기본이론(19년 2월)" target="_blank"/>
			<area shape="rect" coords="814,460,872,485" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=081&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900055&leftMenuLType=M0001&newlearningCD=M0111&lecKType=D" onfocus='this.blur()' alt="원유철 한국사 기본이론(19년 2월)" target="_blank"/>
			<area shape="rect" coords="814,510,872,535" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=082&topMenuType=O&searchSubjectCode=1006&searchLeccode=D201700293&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="신광은 수사 이론" target="_blank"/>
			<area shape="rect" coords="814,560,872,585" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=082&topMenuType=O&searchSubjectCode=1007&searchLeccode=D201800087&leftMenuLType=M0001&lecKType=D" onfocus='this.blur()' alt="장정훈 행정법 이론 (3월)" target="_blank"/>

			<!--패키지-->
			<area shape="rect" coords="753,839,872,876" href="http://www.willbescop.net/lecture/movieLectureSDetail.html?searchLeccode=J201900012&topMenuType=O&leftMenuLType=M0001&newlearningCD=M0211&lecKType=J&topMenu=081&topMenuName" onfocus='this.blur()' alt="2019대비 일반경찰 기본이론 동영상 종합반(오태진史)" target="_blank"/>
			<area shape="rect" coords="753,1059,872,1096" href="http://www.willbescop.net/lecture/movieLectureSDetail.html?searchLeccode=J201900011&topMenuType=O&leftMenuLType=M0001&newlearningCD=M0211&lecKType=J&topMenu=081&topMenuName" onfocus='this.blur()' alt="2019대비 일반경찰 기본이론 동영상 종합반(원유철史)" target="_blank"/>
			<area shape="rect" coords="753,1279,872,1316" href="http://www.willbescop.net/lecture/movieLectureSDetail.html?searchLeccode=J201900010&topMenuType=O&leftMenuLType=M0001&newlearningCD=M0211&lecKType=J&topMenu=082&topMenuName" onfocus='this.blur()' alt="2019대비 경행경채 기본이론 동영상 종합반" target="_blank"/>
		</map>
	</div><!--//wb_cts04-->                
        
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