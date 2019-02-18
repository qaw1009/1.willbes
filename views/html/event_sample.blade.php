@extends('willbes.pc.layouts.master')

@section('content')


<style type="text/css">
    body{width:100%; min-width:1240px; margin:auto; background:none}
    .evtContent {
        width:100% !important;
        min-width:1210px !important;
        background:#ccc;
    }	
	.rLnb {position:fixed; width:170px; top:250px; right:30px; border:3px solid #2f2f2f; background:#fff; z-index:999;
	-webkit-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
	-moz-box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
	box-shadow: 10px 10px 20px 0px rgba(0,0,0,0.21);
	}
	.rLnb ul {padding:6px 12px}
	.rLnb li {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb_arrow.jpg) no-repeat 100% center}
	.rLnb a {border-bottom:1px solid #bfbfbf; display:block; height:39px; line-height:39px; font-size:0; text-indent:-9999}
	.rLnb a.menu1 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb01.jpg) no-repeat left center}
	.rLnb a.menu2 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb02.jpg) no-repeat left center}
	.rLnb a.menu3 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb03.jpg) no-repeat left center}
	.rLnb a.menu4 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb04.jpg) no-repeat left center}
	.rLnb a.menu5 {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmylnb05.jpg) no-repeat left center}
	.rLnb a:hover {border-bottom:1px solid #000}
	.rLnb li:last-child a {border:0}
	.rBn {position:fixed; width:170px;top:480px; right:30px; border:3px solid #2f2f2f; background:#fff; text-align:center; padding:10px 0; z-index:999;}
	
	.leaveArmyLnb {position:fixed; width:120px; top:300px; left:30px; z-index:999}
	.leaveArmyLnb li {margin-bottom:5px}
	.leaveArmyLnb li.confirm {background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyBtn04_bg.png) no-repeat; height:97px; text-align:center; margin-top:17px}
	.leaveArmyLnb li.confirm img {vertical-align:middle}
	.leaveArmyLnb li.confirm .top {height:73px; vertical-align:middle}
	.leaveArmyLnb li.confirm .top p {padding-top:15px}
	.leaveArmyLnb li.confirm .top span {color:#F00; font-weight:bold}
	.leaveArmyLnb li.confirm .bottom {height:25px; line-height:25px}
	
	.LAeventA01 {width:100%; text-align:center; background:url(http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass01_bg.jpg) no-repeat center top; background-size:auto; margin-top:10px; position:relative}
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
    <div class="widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
    </div>
</div>

    <div class="evtContent p_re evtContent">
        <div class="rLnb">
        	<ul>
            	<li><a href="http://www.willbesgosi.net/event/arm_event.html?event_cd=On_leaveArmy00&topMenuType=O&EVENT_NO=710" class="menu1" target="_blank">인증센터</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_f" class="menu2" target="_blank">소방공무원 단독반</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_a" class="menu3" target="_blank">군무원 단독반</a></li>
                <li><a href="http://www.willbesgosi.net/event/movie/event.html?topMenuType=F&event_cd=Off_leaveArmy_ic" class="menu4" target="_blank">공무원 단독반</a></li>
                <li><a href="/event/arm_event.html?event_cd=On_leaveArmy_pass&topMenuType=O&EVENT_NO=710" class="menu5">윌비스 PSASS</a></li>
            </ul>
        </div>
        <div class="rBn">
        	<img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyPass_bn1.jpg" alt=""/>
        </div>

		<div class="leaveArmyLnb">
			<ul>
		      	<li><a href="/event/arm_event.html?event_cd=On_leaveArmy_pass&topMenuType=O&EVENT_NO=53"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyBtn01_on.png" alt="윌비스 PASS 소개"/></a></li>
		      	<li><a href="/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53"><img src="http://file3.willbes.net/new_gosi/2018/01/leaveArmyBtn02.png" alt="윌비스 PASS 신청하기"/></a></li>
		          <li class="confirm">
		          	<div class="top">
		          	    <a href="javascript:openArmConfirm();"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyBtn04.png" alt="전역(예정)군인 가입/인증"/></a>
		          	</div>
		            <div class="bottom"><a href="#"><img src="http://file3.willbes.net/new_gosi/2017/01/leaveArmyBtn04_top.png" alt="맨위로"/></a></div>
		          </li>
		      </ul>
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
@stop