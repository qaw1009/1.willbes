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

        .wb_top {background:#1e1e1e url(http://file3.willbes.net/new_gosi/2018/06/EV180626_c1_bg.jpg) no-repeat center top; position:relative; }
        .wb_cts01 {background:#fff;}            
        .wb_cts02 {background:#f0efef;}        
        .wb_cts03 {background:#ccbba2 url(http://file3.willbes.net/new_gosi/2018/06/EV180626_c6_bg.jpg) repeat;}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:259px; 
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }

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
    
    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
			<div><a href="#event"><img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_sky.png" alt="첨삭지도반" ></a></div>
		</div> 

        <div class="evtCtnsBox wb_top" >
      	    <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c1.png" alt="윌비스 매직아이 김신주 영어"  />
	    </div><!--WB_top//-->

	    <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c2.jpg" alt="윌비스 빠른 합격을 위한 매직아이 영어"  />
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c3.jpg" alt=""  />
	    </div><!--wb_cts01//-->  

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c4.jpg" alt="윌비스 실전에 강한 매직아이 영어"  />
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c5.jpg" alt=""  />
        </div><!--wb_cts02//-->      

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180626_c6.jpg" alt="윌비스 행정법 변원갑 수강신청하기" usemap="#Map180625_c1" border="0"  />
            <map name="Map180625_c1" >
                <area shape="rect" coords="588,668,915,794"href="#" onclick="javascript:goPopup()" onFocus="this.blur()" />
            </map>                    
        </div><!--wb_cts03//-->
    
    </div>
    <!-- End Container -->
           
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>  
    
    <script type="text/javascript">				
		function goPopup() {
			if("<c:out value='${userInfo.USER_ID}' />" == ""){
				alert("로그인을 해주세요.");
				return;
			}
			
    		//alert("마감되었습니다.");
    		//return;     
			
		    $.ajax({
		        type: "GET",        
		        url: '<c:url value="/event/editUserCount.json"/>',
		        data: $("#eventForm").serialize(),        		
		        dataType: "json",
		        async : false,
		        success: function(result) {
		            
		        	//alert(result);
		        	if(result == 500){
		        		alert("이미 등록하셨습니다.");
		        		return;
		        	}
		        	if(result >= 110){
		        		alert("마감되었습니다. ");
		        		return;        		
		        	}		        	
		        	window.open('event_onGosiHdhReadinPop','pop1','scrollbars=yes , width=470,height=352,top=100,left=500');		        	
		        }
		    });			
		}		
    </script>

@stop