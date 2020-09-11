@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/

        .quick {display:none !important}
        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}
        .evtCtnsBox {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_top_bg.jpg) repeat-x center top;}
        .event01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_01_bg.jpg) repeat-x center top;}
        .event02 {background:#333}    
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200716_top.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200716_01.jpg" alt="" usemap="#Map200716" border="0"/>
            <map name="Map200716" id="Map200716">
              <area shape="rect" coords="457,480,537,519" href="#none" alt="이인재 문제지" />
              <area shape="rect" coords="543,480,621,518" href="#none" alt="해설자료" />
              <area shape="rect" coords="627,480,708,519" href="#none" alt="해설강의" />
              <area shape="rect" coords="922,480,1001,519" href="#none" alt="김차웅 문제지" />
              <area shape="rect" coords="1008,481,1089,519" href="#none" alt="해설자료" />
              <area shape="rect" coords="1093,481,1173,518" href="#none" alt="해설강의" />
              <area shape="rect" coords="459,716,578,758" href="#none" alt="송원영 문제지" />
              <area shape="rect" coords="586,716,708,758" href="#none" alt="해설자료" />
              <area shape="rect" coords="921,716,1044,758" href="#none" alt="권보민 문제지" />
              <area shape="rect" coords="1052,716,1173,758" href="#none" alt="해설자료" />
              <area shape="rect" coords="457,955,578,996" href="#none" alt="박태영 문제지" />
              <area shape="rect" coords="586,955,708,996" href="#none" alt="해설자료" />
              <area shape="rect" coords="716,955,838,996" href="#none" alt="해설강의" />
              <area shape="rect" coords="458,1194,579,1232" href="#none" alt="최용림 문제지" />
              <area shape="rect" coords="587,1194,707,1232" href="#none" alt="해설강의" />
              <area shape="rect" coords="458,1433,577,1470" href="#none" alt="송광진 문제지" />
              <area shape="rect" coords="587,1433,706,1470" href="#none" alt="해설자료" />
              <area shape="rect" coords="924,1430,1044,1472" href="#none" alt="장순선 문제지" />
              <area shape="rect" coords="1051,1430,1171,1472" href="#none" alt="해설자료" />
              <area shape="rect" coords="459,1670,579,1708" href="#none" alt="정경미 문제지" />
              <area shape="rect" coords="593,1670,710,1708" href="#none" alt="해설자료" />
              <area shape="rect" coords="878,1787,1172,1846" href="#none" alt="답안 작성지 다운로드" />              
            </map>
        </div>

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200716_02.jpg" alt=""/>
		</div>
    </div>
    <!-- End Container -->
@stop