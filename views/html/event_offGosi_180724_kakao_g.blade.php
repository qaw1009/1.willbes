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

        .skybanner {
            position:absolute; 
            top:20px; 
            right:10px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}    

        .WB_con01 {background:#fae100; padding:100px 0}    

 
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/180723_kakao1_sky.png" alt="카카오톡실시간 스카이배너" usemap="#Map_180724_sky" border="0"  />
            <map name="Map_180724_sky">
                <area shape="rect" coords="5,92,92,116" href="http://pf.kakao.com/_kcZIu" target="_blank" alt="친추">
                <area shape="rect" coords="7,120,94,144" href="http://pf.kakao.com/_kcZIu/chat " target="_blank" alt="상담">
            </map>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_gosi/2018/07/180723_kakao1.png" alt="카카오톡실시간상담" usemap="#Map_2018_kakao" border="0" />
            <map name="Map_2018_kakao">
                <area shape="rect" coords="258,671,603,754" href="http://pf.kakao.com/_kcZIu" target="_blank" alt="친추">
                <area shape="rect" coords="614,673,945,752" href="http://pf.kakao.com/_kcZIu/chat" target="_blank" alt="상담">
            </map>                
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */   
	    });       
    </script>    
@stop