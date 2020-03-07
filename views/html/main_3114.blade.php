@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<link href="/public/css/willbes/style_2014_3114.css?ver={{time()}}" rel="stylesheet">

<div id="Container" class="Container njob NGR c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')

    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">창업<span class="row-line">|</span></li>
                <li class="subTit">e커머스</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">민사법</li>
                            <li><a href="#none">형사법</a></li>
                            <li><a href="#none">공법(헌법)</a></li>
                            <li><a href="#none">공법(행정법)</li>
                            <li><a href="#none">국제거래법</a></li>
                            <li><a href="#none">경제법</a></li>
                            <li><a href="#none">환경법</a></li>
                            <li><a href="#none">노동법</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">수강신청</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="skybanner">
        <span><img src="https://static.willbes.net/public/images/promotion/main/3114_sky00.png" alt="시계" ></span>
        <img src="https://static.willbes.net/public/images/promotion/main/3114_sky01.png" alt="사전예약 신청하기" usemap="#Map3114" border="0">
        <map name="Map3114" id="Map3114">
            <area shape="rect" coords="18,372,88,481" href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank" alt="김정환" />
            <area shape="rect" coords="93,371,162,483" href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank" alt="김경은" />
            <area shape="rect" coords="21,488,88,600" href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank" alt="정문진" />
            <area shape="rect" coords="95,489,163,601" href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank" alt="황채영" />
        </map>
    </div>

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_top.jpg" alt="1억뷰 N잡">
    </div>
        
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_01.jpg" alt="사전수강신청" usemap="#Map3114B" border="0">
        <map name="Map3114B" id="Map3114B">
            <area shape="rect" coords="178,948,365,1120" href="#evt04" alt="김정환" />
            <area shape="rect" coords="370,948,556,1120" href="#evt05" alt="김경은" />
            <area shape="rect" coords="565,948,750,1120" href="#evt06" alt="황채영" />
            <area shape="rect" coords="754,948,944,1120" href="#evt07" alt="정문진" />
        </map>
    </div>
        
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_02.jpg" alt="1억뷰 n잡에서 그 꿈을 응원합니다.">
    </div>
        
    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_03.jpg" alt="인플루언서 막강라이업">
    </div>
        
    <div class="evtCtnsBox evt04" id="evt04">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_04.jpg" alt="김정환"></a>
    </div>

    <div class="evtCtnsBox evt05" id="evt05">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_05.jpg" alt="김경은"></a>
    </div>

    <div class="evtCtnsBox evt06" id="evt06">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_06.jpg" alt="황채영"></a>
    </div>

    <div class="evtCtnsBox evt07" id="evt07">
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_07.jpg" alt="정문진"></a>
    </div>

    <div class="evtCtnsBox evt08">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_08.jpg" alt="사전 예약시 파격혜택 제공">
    </div>

    <div class="evtCtnsBox evtFooter">
        <img src="https://static.willbes.net/public/images/promotion/main/3114_standby_footer.jpg" alt="윌비스">
    </div>
</div>

<!-- End Container -->

@stop