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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1825_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f7f6fa;}
        .evt02 {background:#fff;}

        .btnSt {width:470px; margin:50px auto 0; position:relative}
        .btnSt a {display:block; border-radius:18px; color:#fff; background:#ce3c3f; padding:20px 0; font-size:24px}
        .btnSt a:hover {background:#000}
        .btnSt img {position:absolute; left:70%; top:35px}

        .youtube {background:#141621 url(https://static.willbes.net/public/images/promotion/2021/03/2017_prof_bg.jpg) no-repeat center top; padding:150px 0}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
        .youtube li:nth-child(2),
        .youtube li:last-child {margin-left:20px}
        .youtube li div {margin-bottom:70px; font-size:30px; font-weight:bold; color:#fec345}
        .youtube li div span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube ul:after {content:''; display:block; clear:both}

        .willbes-Layer-ReplyBox { top:2000px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1825_top.jpg" alt="수학 박태영" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1825_01.jpg" alt="수학 박태영">                    
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1825_02.jpg" alt="수학 박태영">                    
        </div>

        <div class="evtCtnsBox youtube">
            <ul>
                <li>
                    <div><span>2021 1~2월 </span> 이론반 실강</div>
                    <iframe src="https://www.youtube.com/embed/beHIn0F_2lI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li>
                    <div><span>2021 </span> 기출 해설 강의</div>
                    <iframe src="https://www.youtube.com/embed/17WQEf6HLdY?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li class="mt100">
                    <div><span>2021 </span> 기출 적중 비교 영상</div>
                    <iframe src="https://www.youtube.com/embed/okSM82f5Yxg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li class="mt100">
                    <div><span>2022 학년도 대비 </span> 설명회</div>
                    <iframe src="https://www.youtube.com/embed/ZinD4SnjwYg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul>            
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop