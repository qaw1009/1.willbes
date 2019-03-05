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

        .sec-01 {background:#1f1f1f url(http://file3.willbes.net/new_cop/2018/11/EV181129_p1_bg.jpg) no-repeat center;}
        .sec-02 {background:#353535;}
        .sec-03 {background:#303030 url(http://file3.willbes.net/new_cop/2018/11/EV181129_p3_bg.jpg) no-repeat center;}
        .sec-04 {background:#202020;}        
        .sec-05 {background:#1f1f1f url(http://file3.willbes.net/new_cop/2018/11/EV181129_p5_bg.jpg) no-repeat center;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox sec-01" id="main">
           	<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p1.png" alt="합격자의밤" />
		</div>
            
		<div class="evtCtnsBox sec-02">
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p2.png" alt="축제" />
		</div>

		<div class="evtCtnsBox sec-03">
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p3.png" alt="사진" />
		</div>

		<div class="evtCtnsBox sec-04">
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p4_1.png" alt="사진" /><br>
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p4_2.png" alt="사진" /><br>
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p4_3.png" alt="사진" /><br>
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p4_4.png" alt="사진" /><br>
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p4_5.png" alt="사진" />
		</div>

		<div class="evtCtnsBox sec-05">
			<img src="http://file3.willbes.net/new_cop/2018/11/EV181129_p5.png" alt="사진" />
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