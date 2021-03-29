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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/03/1816_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f7f6fa}
        .evt02 {background:#1f2942; padding-bottom:150px}

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

        .willbes-Layer-ReplyBox { top: 4000px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1816_top.jpg" alt="유아 민정선" />
        </div> 

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1816_01.jpg" alt="유아 민정선">                      
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1816_02.jpg" alt="유아 민정선">  
            <div class="btnSt NSK-Black">
                <a href="#none" onclick="go_study_comment_popup();" id="wsammjs">놀라운 합격수기 확인하기 ></a>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2017_prof_icon.png" alt="">
            </div>                    
        </div>

        <div class="evtCtnsBox youtube">
            <ul>
                <li>
                    <div><span>2019학년도</span> 유아 합격생 간담회</div>
                    <iframe src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
                <li>
                    <div><span>2021학년도</span> 유아 합격전략 설명회 보기</div>
                    <iframe src="https://www.youtube.com/embed/yjdW1qJ1vHs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </li>
            </ul>            
        </div>

        {{--
        <div class="evtCtnsBox ev01">         




            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsammjs_02.jpg" usemap="#Mapmjs02" border="0">
                <map name="Mapmjs02" class="review_btn" id="wsammjs">
                  <area shape="rect" coords="467,2241,809,2324" href="#none" onclick="go_study_comment_popup();" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt04">
              	<ul>
                	<li><iframe width="600" height="336" src="https://www.youtube.com/embed/Y2W3lUrn3aI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                    <li><iframe width="600" height="336" src="https://www.youtube.com/embed/yjdW1qJ1vHs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
                </ul>
       	   </div>
        </div>
        --}}
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop