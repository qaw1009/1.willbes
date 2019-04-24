@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:150px;
            z-index:1;
        }
        .skybanner li a {display:block; padding:20px 0; text-align:center; background:#000; color:#fff; font-size:14px; line-height:1.5; margin-bottom:1px}
        .skybanner li a:hover {background:#e11c57}

        .evtTop {background:#79edff url(https://static.willbes.net/public/images/promotion/2019/04/1206_top_bg.jpg)  repeat-x center top;}
        .evt01 {background:#0956bd; padding:50px 0}
        .evt02 {background:#79edff; padding:100px 0}
        .evt02 iframe {width:854px; height:480px; margin-bottom:80px}
        .evt03 {background:#eee}
        .evt04 {background:#79edff}
        .evt05 {background:#022ef3}
        .evt06 {background:#79edff}
        .evt07 {background:#f5f5f5}
        .evt08 {background:#101010}
    </style>

    <div class="evtContent NGR" id="evtContainer">
        <ul class="skybanner NGEB">
            <li><a href="#go01">사전특강&<br>설명회</a></li>
            <li><a href="#go02">인적성<br>검사일정</a></li>
            <li><a href="#go03">사전조사서<br> 특강</a></li>
            <li><a href="#go04">면접캠프<br>프로그램 안내</a></li>
        </ul>
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_top.jpg"alt="면접은 스피치가 아니다." usemap="#Map1206A" border="0" >
            <map name="Map1206A" id="Map1206A">
                <area shape="rect" coords="476,653,737,769" href="#" alt="면접캠프 신청하기" />
            </map>
        </div>

        <div  class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_01.jpg" alt="최종합격생이 추천하는 황세웅 면접캠프">
        </div>

        <div class="evtCtnsBox evt02">
            <iframe width="854" height="480" src="https://www.youtube.com/embed/-19yIQTjdQs?rel=0" frameborder="0" allowfullscreen></iframe>
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_02.jpg" alt="면접캠프 설명회" usemap="#Map1206B" border="0" id="go01">
            <map name="Map1206B" id="Map1206B" id="go01">
                <area shape="rect" coords="605,402,1021,515" href="#" alt="사전특강&amp;설명회 신청하기"/>
            </map>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_03.jpg"alt="윌비스신광은경찰팀의 황세웅 교수"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_04.jpg" alt="차별화된 면접 프로그램"/>
        </div>

        <div class="evtCtnsBox evt05" id="go02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_05.jpg" alt="인적성 일정 미치 면접캠프 안내" usemap="#Map1206C" border="0" />
            <map name="Map1206C" id="Map1206C">
                <area shape="rect" coords="836,780,975,893" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&amp;subject_idx=1069&amp;campus_ccd=605001&amp;course_idx=1047" />
            </map>
        </div>

        <div class="evtCtnsBox evt06" id="go03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_06.jpg" alt="사전조사서 특강 및 첨삭" usemap="#Map1206D" border="0"/>
            <map name="Map1206D" id="Map1206D">
                <area shape="rect" coords="905,442,1067,576" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&amp;subject_idx=1070&amp;campus_ccd=605001&amp;course_idx=1047" />
            </map>
        </div>

        <div class="evtCtnsBox evt07" id="go04">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_07.jpg" alt="황세웅 면접캠프 안내" usemap="#Map1206E" border="0"/>
            <map name="Map1206E" id="Map1206E">
                <area shape="rect" coords="946,234,1107,435" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3010&subject_idx=1064&campus_ccd=605001&course_idx=1047" />
            </map>
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_08.jpg" alt="황세웅 교수와 함께하면 최종 합격할 수 있습니다."/>
        </div>
    </div>
    <!-- End Container -->

@stop