@extends('willbes.pc.layouts.master')

@section('content')


<style type="text/css">
    body{width:100%; min-width:1240px; margin:auto;}
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
	.rLnb {position:fixed; width:170px; top:200px; right:10px; z-index:1;
	}
    .rLnb ul {padding:6px 12px; background:#fff; border:3px solid #2f2f2f; margin-bottom:10px;
        -webkit-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
	    -moz-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
        box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
    }
	.rLnb li {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb_arrow.jpg) no-repeat 100% center}
	.rLnb a {border-bottom:1px solid #bfbfbf; display:block; padding:10px 0; line-height:1.4;}
    .rLnb a:hover {border-bottom:1px solid #000;
        font-weight: 600;
    }
    .rLnb li:last-child a {border:0}
    .rLnb div {
        text-align:center;
        padding:20px 0;
        background:#fff;   
        border:3px solid #2f2f2f;  
    }
	
	.LAeventA01 {
        position:relative;
        width:100%; 
        text-align:center; 
        background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_bg.jpg) no-repeat center top; 
        background-size:auto;         
    }
	.LAeventA01 .main_img {position:absolute; width:980px; top:474px; left:50%; margin-left:-490px; z-index:10; opacity:0;filter:alpha(opacity=0);-webkit-animation-duration: 1s;animation-duration: 1s;-webkit-animation-fill-mode: both;animation-fill-mode: both}

	.LAeventA01 .flipInX {
	  -webkit-backface-visibility: visible !important;
	  backface-visibility: visible !important;
	  -webkit-animation-name: flipInX;
	  animation-name: flipInX;
	}
	
	.LAeventA02 {width:100%; text-align:center; background:#ececec; padding-bottom:120px}
	.LAeventA02 div {width:904px; margin:0 auto; text-align:center}
	.LAeventA02 a {margin-bottom:10px; margin-right:10px; display:inline-block}
	.LAeventA03 {width:100%; text-align:center; background:#252525}
	
	#skybanner {position:fixed;top:200px;right:10px; width:210px; text-align:right; z-index:1000;}
</style>

<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both ">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">종합반</a>
                </li>
                <li>
                    <a href="#none">단과</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/acad_info1') }}">학원안내</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원안내</li>
                            <li><a href="{{ site_url('/home/html/acad_info1_1') }}">학원강의정보</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info2') }}">모의고사성적공지</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info3') }}">학원갤러리</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">학원소개</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원안내</strong></span>
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원강의정보</strong></span>
    </div>
</div>
<!-- 고정 메뉴 //-->

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
<script type="text/javascript">
function openArmConfirm(){
	 var url = '<c:url value="/user/memberConfirmArmyPop.html?EVENT_NO=710"/>' ;
	  window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=600,height=700');
}
</script>
@stop