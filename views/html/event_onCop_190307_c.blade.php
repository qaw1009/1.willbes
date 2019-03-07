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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:#1e2530 url(http://file3.willbes.net/new_cop/2019/03/EV190307_c1_bg.jpg) no-repeat center}
        .wb_01 {background:#005ecc;}	
        .wb_02 {background:#ececec;}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">     

        <div class="evtCtnsBox wb_top" id="main">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c1.jpg"  alt="메인" /><br>
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c2.jpg"  alt="메인" />
		</div>

		<div class="evtCtnsBox wb_01" id="promotion">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c3.jpg" alt="이벤트" /><br>
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c4.png" alt="이벤트" /><br>
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c5.png" alt="이벤트" usemap="#Map" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="370,472,587,528" href="javascript:doEvent()" />
            </map>			  
		</div>

   		<div class="evtCtnsBox wb_02">
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c6.jpg" alt="합격을 응원합니다" /><br>
			<img src="http://file3.willbes.net/new_cop/2019/03/EV190307_c7.jpg" alt="합격을 응원합니다" />
		</div>      
        
    </div>
    <!-- End Container --> 

    <script type="text/javascript">
        function doEvent() {
            if("<c:out value='${userInfo.USER_ID}' />" == ""){
                alert("로그인을 해주세요.");
                return;
            }
            var url = 'event_onCop_190307_c_pop' ;
            window.open(url,'event', 'scrollbars=yes,toolbar=no,resizable=yes,width=600,height=700,top=50,left=100');
        }
	</script>   
    
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