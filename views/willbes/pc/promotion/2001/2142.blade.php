@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/  

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2142_top_bg.jpg) no-repeat center top; position:relative}
        .wb_cts01 span {position:absolute; width:520px; top:724px; left:50%; margin-left:-469px; background:#000; z-index:10}
        .wb_cts01 iframe {width:520px; margin:0 auto; height:300px}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2142_01_bg.jpg) no-repeat center top}

        .wb_cts04 {background:#029ffe}
        .wb_cts03 > div,
        .wb_cts04 > div {width:1120px; margin:0 auto; position:relative}

        

    </style>

    <div class="evtContent NSK" id="evtContainer"> 
     
        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2142_top.jpg" alt="장정훈 경찰학" />
            <span><iframe src="https://www.youtube.com/embed/mURIBPp8zs8?rel=0" frameborder="0" allowfullscreen></iframe></span> 
        </div>       

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2142_01.jpg" alt="수강후기" />            
        </div>

        <div class="evtCtnsBox wb_cts03">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2142_02_01.jpg">
                <a href="https://police.willbes.net/pass/support/notice/show?board_idx=327640&" title="적중사례더보기" target="_blank" style="position: absolute; left: 24.29%; top: 76.5%; width: 51.07%; height: 12.1%; z-index: 2;"></a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2142_02_02.jpg" title="경찰학개론" >
        </div>

        <div class="evtCtnsBox wb_cts04">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2142_03.jpg" alt="커리큘럼"/>
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50031/?subject_idx=1005&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" title="온라인 강의신청" style="position: absolute; left: 6.34%; top: 80.76%; width: 41.07%; height: 8.05%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/professor/show/prof-idx/50032/?cate_code=3010&subject_idx=1058&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0&tab=open_lecture" target="_blank" title="학원 강의신청" style="position: absolute; left: 52.5%; top: 80.76%; width: 41.07%; height: 8.05%; z-index: 2;"></a>
            </div>
        </div>

    </div>
    <!-- End Container -->
@stop