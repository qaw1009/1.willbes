@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1815_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f7f6fa}

        .youtube {background:#141621 url(https://static.willbes.net/public/images/promotion/2021/03/2017_prof_bg.jpg) no-repeat center top; padding:150px 0}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
        .youtube li:last-child {margin-left:20px}
        .youtube li div {margin-bottom:70px; font-size:30px; font-weight:bold; color:#fec345}
        .youtube li div span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube li.w100 {width:100%; margin:0}
        .youtube li.w100 iframe {width:887px; height:500px}
        .youtube ul:after {content:''; display:block; clear:both}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1815_top.jpg" alt="교육학 홍의일" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1815_01.jpg" alt="교육학 홍의일">                      
        </div>

        <div class="evtCtnsBox youtube">
            <ul>
                <li class="w100">
                    <div><span>교육학논술</span> 모의문제 첨삭강의보기</div>
                    <iframe src="https://www.youtube.com/embed/7JuuQIvXKws?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul>            
        </div>
    </div>
    <!-- End Container -->
@stop