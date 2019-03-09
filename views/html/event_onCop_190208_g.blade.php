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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .WB_con01 {background:#ebe4d2 url('http://file3.willbes.net/new_cop/2019/02/EV190208_1_bg.png') no-repeat center;}         
        .WB_con02 {background:#000835 url('http://file3.willbes.net/new_cop/2018/11/EV181114_2_bg.png') no-repeat center;}
        .WB_con03 {background:#f2f2f2;}	
        .WB_con04 {background:#e8e1d0;}	

        /*업다운 애니메이션*/
       .m_img1 {position:fixed; top:400px; right:100px; z-index:10; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite}
        @@keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-30px}
        to{margin-top:0}
        }
        @@-webkit-keyframes upDown{
        from{margin-top:0}
        60%{margin-top:-30px}
        to{margin-top:0}
        }

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="m_img1">
            <a href="#Map_1115_cop_event"><img src="http://file3.willbes.net/new_cop/2019/02/EV190208_sky.png" alt="#" /></a>
        </div>
        

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190208_1.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181114_2.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181114_3.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con04" id="Map_1115_cop_event">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190208_4.png" alt="수강신청" usemap="#Map_1115_lec" border="0" />
            <map name="Map_1115_lec">
                <area shape="rect" coords="638,216,1065,452" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=088&topMenuType=O&searchSubjectCode=1032&searchLeccode=D201900052&leftMenuLType=M0003&lecKType=D"  alt="권소현" target="_blank">
                <area shape="rect" coords="156,221,585,450" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=088&topMenuType=O&searchSubjectCode=1030&searchLeccode=D201900053&leftMenuLType=M0003&lecKType=D"  alt="공득인"  target="_blank">
                <area shape="rect" coords="153,555,574,795" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=088&topMenuType=O&searchSubjectCode=1033&searchLeccode=D201800483&leftMenuLType=M0003&lecKType=D"  alt="권소현"  target="_blank">
                <area shape="rect" coords="636,560,1060,797" href="http://www.willbescop.net/lecture/movieLectureDetail.html?topMenu=088&topMenuType=O&searchSubjectCode=1034&searchLeccode=D201800484&leftMenuLType=M0003&lecKType=D"  alt="황다혜"  target="_blank">
            </map>
        </div>          
        
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);  
	    });       
    </script>    
@stop