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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:absolute; 
            top:400px; 
            right:10px;
            z-index:1;            
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .WB_con01 {background:#ebe4d2 url('http://file3.willbes.net/new_cop/2019/02/EV190218_01_bg.png') no-repeat center;}         
        .WB_con02{background:#590100 url(http://file3.willbes.net/new_cop/2019/02/EV190218_02_bg.png) no-repeat center;}
        .WB_con03{background:#3e100c;}	
        .WB_con04{background:#e8e8e8;}        
    </style>

    <div class="evtContent NSK" id="evtContainer"> 
        <div class="skybanner">
            <a href="#190218_evt_go"><img src="http://file3.willbes.net/new_cop/2019/02/EV190218_sky.png" alt="영어지옥탈출반" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190218_01.png" alt="#" />>
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190218_02.png" alt="#" /><
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190218_03.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con04" id="190218_evt_go">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190218_04.png" alt="#" usemap="#Map_0219_lec" border="0" />
            <map name="Map_0219_lec">
                <area shape="rect" coords="209,794,921,870" href="http://willbescop.net/lecture/passLectureDetail.html?topMenu=081&topMenuName=%EC%9D%BC%EB%B0%98%EA%B2%BD%EC%B0%B0&searchTopCategoryCode=&searchCategoryCode=081&searchSubjectCode=1042&searchLeccode=D201900139&leftMenuLType=&lecKType=&USER_ID=&hSEARCHTYPE=&hSEARCHTEXT=&learningCD=&topMenuType=F&topMenuGnb=OM_009&SEARCHSERIESCODE=" target="_blank">
            </map>
        </div>
        <!--//WB_con04-->

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