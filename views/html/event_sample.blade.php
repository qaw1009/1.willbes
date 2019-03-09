@extends('willbes.pc.layouts.master')

@section('content')


<style type="text/css">
    body{width:100%; min-width:1210px; margin:auto;}
    .Depth {display:none}
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


</style>

    <div class="p_re evtContent">
        <div class="rLnb">
            <ul>
                <li><a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy_pass&topMenuType=O&EVENT_NO=53" target="_blank">윌비스PASS<br>과정안내</a></li>
                <li><a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank">윌비스PASS<br>신청하기</a></li>
                <li><a href="javascript:openArmConfirm();" class="menu1" target="_blank">전역(예정)간부<br>가입인증</a></li>    
            </ul>
            <ul>
                <li><a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy00&topMenuType=O&EVENT_NO=710" class="menu1" target="_blank">인증센터</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_f" class="menu2" target="_blank">소방공무원 단독반</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_a" class="menu3" target="_blank">군무원 단독반</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_ic" class="menu4" target="_blank">공무원 단독반</a></li>
                <li><a href="/event/arm_event.html?event_cd=On_leaveArmy_pass&topMenuType=O&EVENT_NO=710" class="menu5">윌비스 PSASS</a></li>
            </ul>
            <div>
        	    <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass_bn1.jpg" alt=""/>
            </div>
        </div>

        <div class="LAeventA01">
		  	<div class="main_img flipInX animated" style="opacity:1;">
				<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_txt.png" alt="">
			</div>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01.jpg" alt="전역(예정)군인 인증센터"/>                           
		</div>
        
        <div class="LAeventA02">
        	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_1.jpg" alt=""/>
			<div>
            	<a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t1.jpg" alt="소방직"/></a>
                <a href="/event/arm_event.html?event_cd=On_leaveArmy02&topMenuType=O&EVENT_NO=53"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t2.jpg" alt="경찰직"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t3.jpg" alt="군무원"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t4.jpg" alt="기술직"/></a>
                <a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_t5.jpg" alt="일반행정직"/></a>
            </div>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_2.jpg" alt=""/>
            <img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_3.jpg" alt="" usemap="#Map180124"/>
            <map name="Map" id="Map180124">
              <area shape="rect" coords="168,530,374,570" href="javascript:openArmConfirm();" />
              <area shape="rect" coords="611,531,816,569" href="/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=710" />
            </map>
        </div>
        <div class="LAeventA03">
        	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass02_4.jpg" alt="오로지 학습에만 집중할 수 있도록 필요한 모든 것을 준비했습니다."/>
        </div>
    </div>
<!-- End Container -->


    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */   
	    });
    </script>
@stop