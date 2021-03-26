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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1821_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/1821_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#ccc}
        .evt04 {background:#f7f6fa}

        .btnSt {width:470px; margin:50px auto 0; position:relative}
        .btnSt a {display:block; border-radius:18px; color:#fff; background:#ce3c3f; padding:20px 0; font-size:24px}
        .btnSt a:hover {background:#000}
        .btnSt img {position:absolute; left:70%; top:35px}

        .youtube {background:#141621 url(https://static.willbes.net/public/images/promotion/2021/03/2017_prof_bg.jpg) no-repeat center top; padding:150px 0}
        .youtube ul {width:1120px; margin:0 auto}
        .youtube li {display:inline; float:left;}
        .youtube li:last-child {margin-left:20px}
        .youtube .title {margin-bottom:70px; font-size:30px; font-weight:bold; color:#fec345; text-align:center}
        .youtube .title span {color:#fff;}
        .youtube li iframe {width:550px; height:310px}
        .youtube ul:after {content:''; display:block; clear:both}      
        .youtube .play span {display:inline-block; margin-bottom:10px; margin-right:10px}
        .youtube .play iframe {width:365px; height:205px;}
        .youtube .play:after {content:''; display:block; clear:both}

        .willbes-Layer-ReplyBox { top:2000px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1821_top.jpg" alt="영어 김유석" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1821_01.jpg" alt="영어 김유석">                       
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1821_02.jpg" alt="영어 김유석">                       
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1821_03.jpg" alt="영어 김유석">                       
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1821_04.jpg" alt="영어 김유석">                       
        </div>

        <div class="evtCtnsBox youtube">
            <ul class="mb100">
                <li>
                    <div class="title"><span>2021 1~2월</span> 영미시의 이해 1강 보기</div>
                    <iframe src="https://www.youtube.com/embed/cQrUoe1fJR0?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li>
                    <div class="title"><span>2022 학년도 대비 </span> 설명회 바로보기</div>
                    <iframe src="https://www.youtube.com/embed/1arYo1DapLU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul> 
            <div class="title"><span>[김유석 교수의 영어 임용 뽀개기] </span> # 1~5 바로 보기</div>
            <div class="play">             
                <span>
                    <iframe src="https://www.youtube.com/embed/eTnfvDnlcLI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </span>
                <span>
                    <iframe src="https://www.youtube.com/embed/DoderGxRl0Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </span>
                <span>
                    <iframe src="https://www.youtube.com/embed/5fNDsen79RM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </span><br>
                <span>              
                    <iframe src="https://www.youtube.com/embed/iYeGGdt015g?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </span>
                <span>
                    <iframe src="https://www.youtube.com/embed/rqPo6DFRUt8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </span>
            </div>           
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop