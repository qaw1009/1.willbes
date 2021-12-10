@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}

        /************************************************************/

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2455_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#eee9e3 url(https://static.willbes.net/public/images/promotion/2021/12/2455_01_bg.jpg) no-repeat center top;}
        .evt01 .profList {width:1120px; margin:10px auto 0; display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom:140px}
        .evt01 .profList .profBox {width: 270px; margin-bottom:15px; position: relative;}
        .evt01 .profList .profBox a:hover {box-shadow:5px 5px 10px rgba(0,0,0,.4); outline:1px solid #b28026; display: block;}
        .evt01 .profList .soon {position:absolute; width:100%; height:100%; background:rgba(0,0,0,.6); color:#fff; z-index: 2;
            display: flex; justify-content: center; align-items: flex-end; font-size:24px; padding-bottom:80px}
        
        .evt02 {background:#b28026}

        .evt03 {background:#eee9e3; padding-top:150px}    
        .evt03 .map {width:1120px; margin:0 auto; height:623px; background:#f4f4f4}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/12/2455_top.jpg" alt="2023학년도 대비 윌비스 임용 합격전략 설명회"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01.jpg" alt="교수진"/>
            <div class="profList">
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1508" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t01.jpg" alt="이경범 교육학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t24.jpg" alt="정현 교육학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t23.jpg" alt="신태식 교육학"/></a>
                </div>
                <div class="profBox">                    
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1484" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t02.jpg" alt="이인재 교육학"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1511" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t03.jpg" alt="송원영 전공국어"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1507" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t04.jpg" alt="구동언 전공국어"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1495" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t05.jpg" alt="김유석 전공영어"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t06.jpg" alt="김영문 영어학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t07.jpg" alt="김철홍 전공수학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t22.jpg" alt="김현웅 전공수학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t08.jpg" alt="박태영 수학교육론"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1506" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t09.jpg" alt="박혜향 수학교육론"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:fnPlayerSample('174880','1258449','HD');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t10.jpg" alt="양혜정 생물교육론"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1501" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t11.jpg" alt="강철 전공화학"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:fnPlayerSample('174884','1256233','HD');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t12.jpg" alt="김병찬 도덕윤리"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1505" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t13.jpg" alt="김민응 도덕윤리"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1504" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t14.jpg" alt="허역팀 일반사회"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1503" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t15.jpg" alt="김종권 전공역사"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t20.jpg" alt="최용림 역사"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t25.jpg" alt="최규훈 전공체육"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/188601" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t16.jpg" alt="다이애나 전공음악"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:fnPlayerSample('177588','1270307','HD');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t17.jpg" alt="최우영 전기전자통신"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1491" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t18.jpg" alt="송광진 정보컴퓨터"/></a>
                </div>
                <div class="profBox">
                    <a href="https://ssam.willbes.net/event/show/all?event_idx=1502" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t19.jpg" alt="장영희 전공중국어"/></a>
                </div>
                <div class="profBox">
                    <a href="javascript:alert('준비중입니다.');"><img src="https://static.willbes.net/public/images/promotion/2021/12/2455_01_t21.jpg" alt="정경미 전공중국어"/></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2455_02.jpg" alt="유의사항"/>

        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2455_03_01.jpg" alt="오시는길"/>
            <div class="map" id="map">지도영역</div>
            <div class="map" id="alterMap1" style="display: none;"><img src="https://static.willbes.net/public/images/promotion/main/2018/2017_map.jpg" style="width: 100%"></div>
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2455_03_02.jpg" alt="버스 노선"/>
        </div>
    </div>
    <!-- End Container -->

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>
<script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue"><strong class="tx-color">교원임용고시학원</strong> (남강타워 5층)</div>';
        var $kakaomap = new kakaoMap();
        $kakaomap.config.ele_id = 'map';
        $kakaomap.config.alter_id = 'alterMap1';
        $kakaomap.config.level = 4;
        $kakaomap.config.addr = '서울 동작구 노량진로 202';
        $kakaomap.config.info_txt = info_txt;
        $kakaomap.config.info_txt_x_anchor = 0.5;
        $kakaomap.config.info_txt_y_anchor = 2.7;
        $kakaomap.run();
    });
</script>
@stop