@extends('willbes.pc.layouts.master_no_topnav')

@section('content')
    <!-- Container -->
    <link href="/public/css/willbes/style_2014_3114.css?ver={{time()}}" rel="stylesheet">

    <div id="Container" class="Container njob NGR c_both">
        <!-- site nav -->

        <div class="skybanner">
            <span><img src="https://static.willbes.net/public/images/promotion/main/3114_sky00.png" alt="시계" ></span>
            <img src="https://static.willbes.net/public/images/promotion/main/3114_sky01.png" alt="사전예약 신청하기" usemap="#Map3114" border="0">
            <map name="Map3114" id="Map3114">
                <area shape="rect" coords="18,313,88,422" href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank" alt="김정환" />
                <area shape="rect" coords="93,312,162,424" href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank" alt="김경은" />
                <area shape="rect" coords="20,428,87,540" href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank" alt="정문진" />
                <area shape="rect" coords="93,427,161,539" href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank" alt="황채영" />
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
            <a href="/promotion/index/cate/3114/code/1564" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_04.jpg" alt="김정환"></a>
        </div>

        <div class="evtCtnsBox evt05" id="evt05">
            <a href="/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_05.jpg" alt="김경은"></a>
        </div>

        <div class="evtCtnsBox evt06" id="evt06">
            <a href="/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_06.jpg" alt="황채영"></a>
        </div>

        <div class="evtCtnsBox evt07" id="evt07">
            <a href="/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_standby_07.jpg" alt="정문진"></a>
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