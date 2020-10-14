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
        .evtCtnsBox {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_top_bg.jpg) repeat-x center top;}
        .event01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200716_01_bg.jpg) repeat-x center top;}
        .event02 {background:#333}    
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200716_top.jpg" title=""/>
        </div>

        <div class="evtCtnsBox event01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200716_01.jpg" title="" usemap="#Map200716" border="0"/>
            <map name="Map200716" id="Map200716">
              <area shape="rect" coords="457,480,579,517" href="#none" title="이인재 문제지" />
              <area shape="rect" coords="587,480,709,520" href="#none" title="이인재 해설자료" />
              <area shape="rect" coords="715,480,837,521" href="#none" title="이인재 해설강의" />
              <area shape="rect" coords="459,716,578,758" href="#none" title="송원영 문제지" />
              <area shape="rect" coords="586,716,708,758" href="#none" title="송원영 해설자료" />
              <area shape="rect" coords="921,716,1044,758" href="#none" title="권보민 문제지" />
              <area shape="rect" coords="1052,716,1173,758" href="#none" title="권보민 해설자료" />
              <area shape="rect" coords="457,955,578,996" href="#none" title="박태영 문제지" />
              <area shape="rect" coords="586,955,708,996" href="#none" title="박태영 해설자료" />
              <area shape="rect" coords="716,955,838,996" href="#none" title="박태영 해설강의" />
              <area shape="rect" coords="458,1194,579,1232" href="#none" title="최용림 문제지" />
              <area shape="rect" coords="587,1194,707,1232" href="#none" title="최용림 해설강의" />
              <area shape="rect" coords="458,1433,577,1470" href="#none" title="송광진 문제지" />
              <area shape="rect" coords="587,1433,706,1470" href="#none" title="송광진 해설자료" />
              <area shape="rect" coords="924,1430,1044,1472" href="#none" title="장순선 문제지" />
              <area shape="rect" coords="1051,1430,1171,1472" href="#none" title="장순선 해설자료" />
              <area shape="rect" coords="459,1670,579,1708" href="#none" title="정경미 문제지" />
              <area shape="rect" coords="593,1670,710,1708" href="#none" title="정경미 해설자료" />
              <area shape="rect" coords="878,1787,1172,1846" href="#none" title="답안 작성지 다운로드" />              
            </map>
        </div>

        <div class="evtCtnsBox event02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200716_02.jpg" title=""/>
		</div>
    </div>
    <!-- End Container -->
@stop