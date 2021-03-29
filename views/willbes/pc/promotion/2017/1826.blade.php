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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1826_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f7f6fa; padding-bottom:150px}

        .btnSt {width:470px; margin:50px auto 0; position:relative}
        .btnSt a {display:block; border-radius:18px; color:#fff; background:#ce3c3f; padding:20px 0; font-size:24px}
        .btnSt a:hover {background:#000}
        .btnSt img {position:absolute; left:70%; top:35px}

        .youtube {background:#141621 url(https://static.willbes.net/public/images/promotion/2021/03/2017_prof_bg.jpg) no-repeat center top; padding:150px 0}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
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
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1826_top.jpg" alt="생물 강차욱" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1826_01.jpg" alt="생물 강차욱"> 
            <div class="btnSt NSK-Black">
                <a href="#none" onclick="go_study_comment_popup();" id="wsamkcy">교수님의 더 많은 수강후기 확인하기 ></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2017_prof_icon.png" alt="">
            </div>                        
        </div>

        <div class="evtCtnsBox youtube">
            <ul>
                <li>
                    <div><span>2021 1~2월 </span> 생물학 총론 실강 </div>
                    <iframe src="https://www.youtube.com/embed/hPXBthC1xmU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li>
                    <div><span>2020 </span> 예상 문제 풀이 실강 </div>
                    <iframe src="https://www.youtube.com/embed/VnthgNFeeLA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul>            
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop