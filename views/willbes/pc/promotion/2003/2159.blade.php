@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height:auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }

        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; }

        /*****************************************************************/

        .sky {position:fixed; top:310px; right:0; z-index:11;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/04/2159_top_bg.jpg) no-repeat center top; }
        .youtube {position:absolute; top:1140px; left:50%;z-index:12;margin-left:-450px}
        .youtube iframe {width:900px; height:525px;}


        .evtMenu { position:absolute; left:50%; margin-left:-560px; z-index:10;padding-top:550px;}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px;
            background:#e0dfdf;border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #219164;}
        .evtMenu li:hover:after {content:"▼"; display:block; clear:both;color:#219164;font-size:25px;}

        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#219164}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {
            position:relative; width:1120px; margin:0 auto; text-align:center; font-size:14px;
        }
        .tabCts .download span {position:absolute; top:660px; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
        .tabCts .download span:nth-child(1) {left:160px;}
        .tabCts .download span:nth-child(2) {left:362px;}
        .tabCts .download span:nth-child(3) {left:572px;}
        .tabCts .download span:nth-child(4) {left:760px;}
        .tabCts .download span:nth-child(5) {left:940px;}
        .tabCts .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
        .tabCts .download span a:hover {background:#e50001}
        .tabCts .youtube {width:100%; text-align:center; margin:3em 0}
        .tabCts .youtube iframe {width:800px; height:453px; margin:0 auto}

        #content_1 {padding-top:600px;padding-bottom:50px;}
        #content_2_01 {padding-top:600px;padding-bottom:50px;}
        #content_3 {padding-top:625px;}
        #content_4 {padding-top:600px;}
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#219164}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#219164; font-size:90%; margin-left:20px}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
            font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD td:nth-child(4) {background:#DAF2E2;font-weight:bold;}
        .boardD td:nth-child(7) {background:#DAF2E2;font-weight:bold;}
        .boardD td:nth-child(9) {color:red;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #000; border-bottom:1px solid #000; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #000; border-bottom:1px solid #000;color:#000;}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#f6f6f6}
        .boardD th a {display:inline; padding:5px 10px; color:#333; background:#fff; border:1px solid #ccc; border-radius:4px; margin:0 auto}
        .boardD th a:hover {background:#e50001; color:#fff}

        .Cts03 {margin-bottom:100px; text-align:left}

        .Cts03 h3 {font-size:16px;}
        .Cts03 h3 span {color:#fa7738; vertical-align: top;}
        .graphWrap {width:100%; margin-top:50px; font-size:14px; line-height:1.5;}
        .graphWrap li {position:relative; display:inline; float:left; width:48%; text-align:left; margin:0 0.5%;}
        .graphWrap select {position:absolute; top:5px; right:0}
        .graphWrap:after {content:""; display:block; clear:both}
        .graphbox {width:90%; margin:20px auto; border:1px solid #000;}
        .graphbox .subTit {font-size:120%; color:#F30}
        .graph {width:20%; float:left; text-align:center; background:url(http://file.willbes.net/new_image/2015/04/graphBg.png) repeat;}
        .graph p {padding:10px 0; background:#fff}
        .graph p:last-child {border-top:1px solid #333}
        .graph div {position:relative; width:45px; height:250px; margin:0 auto;}
        .graph div img {position:absolute; bottom:0; left:0; width:100%; background:#e2be43 url(https://static.willbes.net/public/images/promotion/common/patternA.png) repeat;}
        .graph2 div img {background:#bdbdcc url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat;}
        .graphbox:after {content:""; display:block; clear:both}
        .graphWrap:after {content:""; display:block; clear:both}
        .Cts03_01 {width:1120px; text-align:left; margin:80px auto 0}
        .Cts03_01 div {border:1px solid #e4e4e4; padding:20px; margin-top:20px}

        .Cts04 {padding-bottom:100px}
        .Cts04 .lecture {
            width:1000px; margin:0 auto;
        }
        .Cts04 .lecture li {
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px; min-height:330px;
        }
        .Cts04 .lecture li:hover {background:#fff url(https://static.willbes.net/public/images/promotion/common/patternB.png) repeat}
        .Cts04 .lecture li img.prof {
            width:199px !important; border:1px solid #ccc;
        }
        .Cts04 .t_tilte {
            line-height:1.5; padding:10px 0; color:#666; width:200px; margin:0 auto
        }
        .Cts04 .t_tilte p {border-top:1px solid #e4e4e4; padding-top:10px; margin-top:10px}
        .Cts04 .t_tilte span {
            color:#36374d; font-size:14px; ;
        }

        .Cts04 .lecture ul:after {
            content:""; display:block; clear:both;
        }
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}" readonly="readonly"/>
        <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11" readonly="readonly">
        <input type="hidden" name="register_type" value="promotion" readonly="readonly"/>

        @foreach($arr_base['register_list'] as $key => $val)
            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                <input type="hidden" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" readonly="readonly"/>
            @endif
        @endforeach
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2020" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_sky.png" alt="지방직 대비 문풀 수강하기" />
            </a>
        </div>

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_top.jpg" title="국가직 9급 풀케어 서비스" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/85P7aoE5tew?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="evtMenu" id="evtMenu">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2159/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>실전동형모의고사 강좌</span>
                            <div class="NSK-Black">+온라인모의고사 무료!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2159/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>지난 국가직으로</span>
                            <div class="NSK-Black">올해의 국가직을 알아보자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202104171140')) javascript:alert('4.17(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <div class="NSK-Black">체감난이도 투표하고</div>
                            <span>맛있는 간식 먹자!</span>
                        </a>
                    </li>
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202104191600')) javascript:alert('4.19(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2021 국가직 9급</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_01_01.jpg" title="" />
            <a href="javascript:void(0);" title="적중 경험하기" onclick="javascript:fn_submit();" style="position: absolute; left: 26.98%; top: 30.73%; width: 46.86%; height: 2.93%; z-index: 2;"></a>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_01_02.jpg" title="" />
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="응시하기" style="position: absolute; left: 20.98%; top: 56.73%; width: 57.86%; height: 3.93%; z-index: 2;"></a>
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_01_03.jpg" title="" />
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_02_01.jpg" title="" id="content_2_01" />
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_02_02.jpg" title="" />
            <div class="mt20 mb100">
                <p class="download">
                    2021 국가직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                </p>
                <div class="mt20" id="tabs1">
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col width="222" />
                        <col width="91" span="7" />
                        <col width="147" />
                        <tr style="background:#F3F3F3;font-weight:bold;">
                            <td rowspan="2" width="222">모집단위</td>
                            <td colspan="3" width="273">2021년</td>
                            <td colspan="5" width="511">2020년</td>
                        </tr>
                        <tr style="background:#F3F3F3;font-weight:bold;">
                            <td width="91">선발예정인원</td>
                            <td width="91">접수인원</td>
                            <td width="91">경쟁률</td>
                            <td width="91" style="background:#F3F3F3;font-weight:bold;">선발예정인원</td>
                            <td width="91">접수인원</td>
                            <td width="91">경쟁률</td>
                            <td width="91" style="background:#F3F3F3;font-weight:bold;">응시인원</td>
                            <td width="147">합격선</td>
                        </tr>
                        <tr style="background:#DAF2E2;font-weight:bold;">
                            <td width="222">총 계</td>
                            <td width="91">         5,662 </td>
                            <td width="91">      198,110 </td>
                            <td width="91">35:1</td>
                            <td width="91">         4,985 </td>
                            <td width="91">      185,203 </td>
                            <td width="91">37:1</td>
                            <td width="91">       13,123 </td>
                            <td width="147" style="color:black;">-</td>
                        </tr>
                        <tr style="background:#B4E7C6;font-weight:bold;">
                            <td width="222">행정직 계</td>
                            <td width="91">         4,951 </td>
                            <td width="91">      171,071 </td>
                            <td width="91" style="background:#B4E7C6;font-weight:bold;">35:1</td>
                            <td width="91">         4,209 </td>
                            <td width="91">      160,830 </td>
                            <td width="91" style="background:#B4E7C6;font-weight:bold;">38:1</td>
                            <td width="91">      127,475 </td>
                            <td width="147" style="color:black;">-</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(일반행정:전국:일반)</td>
                            <td width="91">            416 </td>
                            <td width="91">        41,754 </td>
                            <td width="91">100:1</td>
                            <td width="91">            279 </td>
                            <td width="91">        35,198 </td>
                            <td width="91">126:1</td>
                            <td width="91">        23,838 </td>
                            <td width="147">397.06</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(일반행정:전국:장애)</td>
                            <td width="91">             33 </td>
                            <td width="91">            629 </td>
                            <td width="91">19:1</td>
                            <td width="91">             24 </td>
                            <td width="91">            640 </td>
                            <td width="91">27:1</td>
                            <td width="91">            420 </td>
                            <td width="147">310.62</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(일반행정:전국:저소득)</td>
                            <td width="91">             13 </td>
                            <td width="91">            735 </td>
                            <td width="91">57:1</td>
                            <td width="91">              9 </td>
                            <td width="91">            364 </td>
                            <td width="91">40:1</td>
                            <td width="91">            381 </td>
                            <td width="147">365.39</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(일반행정:지역:일반)</td>
                            <td width="91">            256 </td>
                            <td width="91">        16,511 </td>
                            <td width="91">64:1</td>
                            <td width="91">            115 </td>
                            <td width="91">        13,075 </td>
                            <td width="91">114:1</td>
                            <td width="91">          8,481 </td>
                            <td width="147">403.17(최고)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(일반행정:지역:장애)</td>
                            <td width="91">             15 </td>
                            <td width="91">            128 </td>
                            <td width="91">9:1</td>
                            <td width="91">              9 </td>
                            <td width="91">            341 </td>
                            <td width="91">38:1</td>
                            <td width="91">            234 </td>
                            <td width="147">360.65(최고)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(우정사업본부:전국:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">            106 </td>
                            <td width="91">18:1</td>
                            <td width="91">             16 </td>
                            <td width="91">            271 </td>
                            <td width="91">17:1</td>
                            <td width="91">            181 </td>
                            <td width="147">318.11</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(우정사업본부:지역:일반)</td>
                            <td width="91">            172 </td>
                            <td width="91">          5,327 </td>
                            <td width="91">31:1</td>
                            <td width="91">            527 </td>
                            <td width="91">        13,386 </td>
                            <td width="91">25:1</td>
                            <td width="91">        10,156 </td>
                            <td width="147">384.13(최고)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(우정사업본부:지역:장애)</td>
                            <td width="91">             15 </td>
                            <td width="91">            128 </td>
                            <td width="91">9:1</td>
                            <td width="91">             44 </td>
                            <td width="91">            315 </td>
                            <td width="91">7:1</td>
                            <td width="91">            228 </td>
                            <td width="147">342.27(최고)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(경찰청:전국:일반)</td>
                            <td width="91">            383 </td>
                            <td width="91">        11,632 </td>
                            <td width="91">30:1</td>
                            <td width="91">            409 </td>
                            <td width="91">        10,031 </td>
                            <td width="91">25:1</td>
                            <td width="91">          7,876 </td>
                            <td width="147">384.84/383.30(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(경찰청:전국:장애)</td>
                            <td width="91">             31 </td>
                            <td width="91">            277 </td>
                            <td width="91">9:1</td>
                            <td width="91">             33 </td>
                            <td width="91">            292 </td>
                            <td width="91">9:1</td>
                            <td width="91">            204 </td>
                            <td width="147">273.81</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(경찰청:전국:저소득)</td>
                            <td width="91">             12 </td>
                            <td width="91">            208 </td>
                            <td width="91">17:1</td>
                            <td width="91">             13 </td>
                            <td width="91">            196 </td>
                            <td width="91">15:1</td>
                            <td width="91">            146 </td>
                            <td width="147">350.85</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(고용노동:전국:일반)</td>
                            <td width="91">            656 </td>
                            <td width="91">        17,892 </td>
                            <td width="91">27:1</td>
                            <td width="91">            409 </td>
                            <td width="91">        13,835 </td>
                            <td width="91">34:1</td>
                            <td width="91">        10,577 </td>
                            <td width="147">386.22</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(고용노동:전국:장애)</td>
                            <td width="91">             53 </td>
                            <td width="91">            377 </td>
                            <td width="91">7:1</td>
                            <td width="91">             35 </td>
                            <td width="91">            314 </td>
                            <td width="91">9:1</td>
                            <td width="91">            232 </td>
                            <td width="147">252.58/247.43(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(고용노동:전국:저소득)</td>
                            <td width="91">             22 </td>
                            <td width="91">            450 </td>
                            <td width="91">20:1</td>
                            <td width="91">             13 </td>
                            <td width="91">            207 </td>
                            <td width="91">16:1</td>
                            <td width="91">            131 </td>
                            <td width="147">320.38/320.28(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(교육행정:일반)</td>
                            <td width="91">             51 </td>
                            <td width="91">        14,394 </td>
                            <td width="91">282:1</td>
                            <td width="91">             52 </td>
                            <td width="91">        11,641 </td>
                            <td width="91">224:1</td>
                            <td width="91">          7,905 </td>
                            <td width="147">401.47/397.89(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(교육행정:장애)</td>
                            <td width="91">              4 </td>
                            <td width="91">            228 </td>
                            <td width="91">57:1</td>
                            <td width="91">              4 </td>
                            <td width="91">            202 </td>
                            <td width="91">51:1</td>
                            <td width="91">            120 </td>
                            <td width="147">303.08</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(교육행정:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">            202 </td>
                            <td width="91">101:1</td>
                            <td width="91">              2 </td>
                            <td width="91">            166 </td>
                            <td width="91">83:1</td>
                            <td width="91">             98 </td>
                            <td width="147">371.05</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(선거행정:일반)</td>
                            <td width="91">             60 </td>
                            <td width="91">          1,231 </td>
                            <td width="91">21:1</td>
                            <td width="91">             70 </td>
                            <td width="91">          1,211 </td>
                            <td width="91">17:1</td>
                            <td width="91">            873 </td>
                            <td width="147">395.11</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(선거행정:장애)</td>
                            <td width="91">              5 </td>
                            <td width="91">             42 </td>
                            <td width="91">8:1</td>
                            <td width="91">              7 </td>
                            <td width="91">             41 </td>
                            <td width="91">6:1</td>
                            <td width="91">             23 </td>
                            <td width="147">295.49</td>
                        </tr>
                        <tr>
                            <td width="222">행정직(선거행정:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">            102 </td>
                            <td width="91">17:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             16 </td>
                            <td width="91">8:1</td>
                            <td width="91">             13 </td>
                            <td width="147">331.31</td>
                        </tr>
                        <tr>
                            <td width="222">직업상담직(직업상담:일반)</td>
                            <td width="91">            180 </td>
                            <td width="91">          3,205 </td>
                            <td width="91">18:1</td>
                            <td width="91">             36 </td>
                            <td width="91">          1,369 </td>
                            <td width="91">38:1</td>
                            <td width="91">            777 </td>
                            <td width="147">375.70/375.33(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">직업상담직(직업상담:장애)</td>
                            <td width="91">             14 </td>
                            <td width="91">             50 </td>
                            <td width="91">4:1</td>
                            <td width="91">              3 </td>
                            <td width="91">             52 </td>
                            <td width="91">17:1</td>
                            <td width="91">             36 </td>
                            <td width="147">314.76</td>
                        </tr>
                        <tr>
                            <td width="222">직업상담직(직업상담:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">            102 </td>
                            <td width="91">17:1</td>
                            <td width="91">              1 </td>
                            <td width="91">             26 </td>
                            <td width="91">26:1</td>
                            <td width="91">             18 </td>
                            <td width="147">284.45</td>
                        </tr>
                        <tr>
                            <td width="222">세무직(세무:일반)</td>
                            <td width="91">          1,111 </td>
                            <td width="91">        19,689 </td>
                            <td width="91">18:1</td>
                            <td width="91">            652 </td>
                            <td width="91">        16,094 </td>
                            <td width="91">25:1</td>
                            <td width="91">        12,606 </td>
                            <td width="147">379.23</td>
                        </tr>
                        <tr>
                            <td width="222">세무직(세무:장애)</td>
                            <td width="91">             87 </td>
                            <td width="91">            284 </td>
                            <td width="91">3:1</td>
                            <td width="91">             56 </td>
                            <td width="91">            296 </td>
                            <td width="91">5:1</td>
                            <td width="91">            237 </td>
                            <td width="147">218.14</td>
                        </tr>
                        <tr>
                            <td width="222">세무직(세무:저소득)</td>
                            <td width="91">             35 </td>
                            <td width="91">            327 </td>
                            <td width="91">9:1</td>
                            <td width="91">             21 </td>
                            <td width="91">            311 </td>
                            <td width="91">15:1</td>
                            <td width="91">            231 </td>
                            <td width="147">330.76</td>
                        </tr>
                        <tr>
                            <td width="222">관세직(관세:일반)</td>
                            <td width="91">             55 </td>
                            <td width="91">          2,836 </td>
                            <td width="91">52:1</td>
                            <td width="91">             68 </td>
                            <td width="91">          3,088 </td>
                            <td width="91">45:1</td>
                            <td width="91">          2,504 </td>
                            <td width="147">394.26/392.97(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">관세직(관세:장애)</td>
                            <td width="91">              5 </td>
                            <td width="91">             68 </td>
                            <td width="91">14:1</td>
                            <td width="91">              6 </td>
                            <td width="91">             77 </td>
                            <td width="91">13:1</td>
                            <td width="91">             57 </td>
                            <td width="147">289.94</td>
                        </tr>
                        <tr>
                            <td width="222">관세직(관세:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             42 </td>
                            <td width="91">21:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             42 </td>
                            <td width="91">21:1</td>
                            <td width="91">             35 </td>
                            <td width="147">367.07</td>
                        </tr>
                        <tr>
                            <td width="222">통계직(통계:일반)</td>
                            <td width="91">             66 </td>
                            <td width="91">          1,282 </td>
                            <td width="91">19:1</td>
                            <td width="91">             79 </td>
                            <td width="91">          1,416 </td>
                            <td width="91">18:1</td>
                            <td width="91">          1,060 </td>
                            <td width="147">390.51</td>
                        </tr>
                        <tr>
                            <td width="222">통계직(통계:장애)</td>
                            <td width="91">              5 </td>
                            <td width="91">             16 </td>
                            <td width="91">3:1</td>
                            <td width="91">              8 </td>
                            <td width="91">             28 </td>
                            <td width="91">4:1</td>
                            <td width="91">             20 </td>
                            <td width="147">257.98</td>
                        </tr>
                        <tr>
                            <td width="222">통계직(통계:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             32 </td>
                            <td width="91">16:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             17 </td>
                            <td width="91">9:1</td>
                            <td width="91">             13 </td>
                            <td width="147">310.53</td>
                        </tr>
                        <tr>
                            <td width="222">교정직(교정:남)</td>
                            <td width="91">            603 </td>
                            <td width="91">          6,801 </td>
                            <td width="91">11:1</td>
                            <td width="91">            554 </td>
                            <td width="91">          6,113 </td>
                            <td width="91">11:1</td>
                            <td width="91">          4,629 </td>
                            <td width="147">347</td>
                        </tr>
                        <tr>
                            <td width="222">교정직(교정:여)</td>
                            <td width="91">             52 </td>
                            <td width="91">          1,276 </td>
                            <td width="91">25:1</td>
                            <td width="91">             20 </td>
                            <td width="91">          1,054 </td>
                            <td width="91">53:1</td>
                            <td width="91">            780 </td>
                            <td width="147">379.64</td>
                        </tr>
                        <tr>
                            <td width="222">교정직(교정:저소득)</td>
                            <td width="91">             19 </td>
                            <td width="91">            176 </td>
                            <td width="91">9:1</td>
                            <td width="91">             17 </td>
                            <td width="91">            146 </td>
                            <td width="91">9:1</td>
                            <td width="91">            113 </td>
                            <td width="147">286.78</td>
                        </tr>
                        <tr>
                            <td width="222">보호직(보호:남)</td>
                            <td width="91">            131 </td>
                            <td width="91">          2,470 </td>
                            <td width="91">19:1</td>
                            <td width="91">            135 </td>
                            <td width="91">          2,706 </td>
                            <td width="91">20:1</td>
                            <td width="91">          1,920 </td>
                            <td width="147">367.16</td>
                        </tr>
                        <tr>
                            <td width="222">보호직(보호:여)</td>
                            <td width="91">             56 </td>
                            <td width="91">          3,399 </td>
                            <td width="91">61:1</td>
                            <td width="91">             59 </td>
                            <td width="91">          3,341 </td>
                            <td width="91">57:1</td>
                            <td width="91">          2,117 </td>
                            <td width="147">373.01</td>
                        </tr>
                        <tr>
                            <td width="222">보호직(보호:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">            141 </td>
                            <td width="91">24:1</td>
                            <td width="91">              6 </td>
                            <td width="91">            127 </td>
                            <td width="91">21:1</td>
                            <td width="91">             88 </td>
                            <td width="147">336.21</td>
                        </tr>
                        <tr>
                            <td width="222">검찰직(검찰:일반)</td>
                            <td width="91">            233 </td>
                            <td width="91">        10,410 </td>
                            <td width="91">45:1</td>
                            <td width="91">            170 </td>
                            <td width="91">        10,726 </td>
                            <td width="91">63:1</td>
                            <td width="91">          7,702 </td>
                            <td width="147">390.27</td>
                        </tr>
                        <tr>
                            <td width="222">검찰직(검찰:저소득)</td>
                            <td width="91">              7 </td>
                            <td width="91">            161 </td>
                            <td width="91">23:1</td>
                            <td width="91">              5 </td>
                            <td width="91">            157 </td>
                            <td width="91">31:1</td>
                            <td width="91">            112 </td>
                            <td width="147">370.92</td>
                        </tr>
                        <tr>
                            <td width="222">마약수사직(마약수사:일반)</td>
                            <td width="91">             15 </td>
                            <td width="91">            791 </td>
                            <td width="91">53:1</td>
                            <td width="91">             11 </td>
                            <td width="91">            698 </td>
                            <td width="91">63:1</td>
                            <td width="91">            390 </td>
                            <td width="147">380.92</td>
                        </tr>
                        <tr>
                            <td width="222">마약수사직(마약수사:저소득)</td>
                            <td width="91">              1 </td>
                            <td width="91">             19 </td>
                            <td width="91">19:1</td>
                            <td width="91">              1 </td>
                            <td width="91">             31 </td>
                            <td width="91">31:1</td>
                            <td width="91">             23 </td>
                            <td width="147">350.97</td>
                        </tr>
                        <tr>
                            <td width="222">출입국관리직(출입국관리:일반)</td>
                            <td width="91">             28 </td>
                            <td width="91">          4,045 </td>
                            <td width="91">144:1</td>
                            <td width="91">            213 </td>
                            <td width="91">        10,053 </td>
                            <td width="91">47:1</td>
                            <td width="91">          7,874 </td>
                            <td width="147">391.22/388.17(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">출입국관리직(출입국관리:저소득)</td>
                            <td width="91">              1 </td>
                            <td width="91">             60 </td>
                            <td width="91">60:1</td>
                            <td width="91">              6 </td>
                            <td width="91">            128 </td>
                            <td width="91">21:1</td>
                            <td width="91">             87 </td>
                            <td width="147">363.79</td>
                        </tr>
                        <tr>
                            <td width="222">철도경찰직(철도경찰:일반)</td>
                            <td width="91">             18 </td>
                            <td width="91">            806 </td>
                            <td width="91">45:1</td>
                            <td width="91">              6 </td>
                            <td width="91">            722 </td>
                            <td width="91">120:1</td>
                            <td width="91">            382 </td>
                            <td width="147">378.29</td>
                        </tr>
                        <tr>
                            <td width="222">철도경찰직(철도경찰:저소득)</td>
                            <td width="91">              1 </td>
                            <td width="91">             14 </td>
                            <td width="91">14:1</td>
                            <td width="91"> - </td>
                            <td width="91"> - </td>
                            <td width="91">-</td>
                            <td width="91"> - </td>
                            <td width="147">-</td>
                        </tr>
                        <tr style="background:#B4E7C6;font-weight:bold;">
                            <td width="222">기술직 계</td>
                            <td width="91">           711 </td>
                            <td width="91">       27,039 </td>
                            <td width="91" style="background:#B4E7C6;font-weight:bold;">38:1</td>
                            <td width="91">           776 </td>
                            <td width="91">       24,363 </td>
                            <td width="91" style="background:#B4E7C6;font-weight:bold;">31:1</td>
                            <td width="91">　</td>
                            <td width="147">　</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(일반기계:일반)</td>
                            <td width="91">             77 </td>
                            <td width="91">          3,133 </td>
                            <td width="91">41:1</td>
                            <td width="91">             87 </td>
                            <td width="91">          2,713 </td>
                            <td width="91">31:1</td>
                            <td width="91">          1,730 </td>
                            <td width="147">82.00/79.00(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(일반기계:장애)</td>
                            <td width="91">              6 </td>
                            <td width="91">             31 </td>
                            <td width="91">5:1</td>
                            <td width="91">              8 </td>
                            <td width="91">             28 </td>
                            <td width="91">4:1</td>
                            <td width="91">             14 </td>
                            <td width="147">57 </td>
                        </tr>
                        <tr>
                            <td width="222">공업직(일반기계:저소득)</td>
                            <td width="91">              3 </td>
                            <td width="91">             39 </td>
                            <td width="91">13:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             41 </td>
                            <td width="91">21:1</td>
                            <td width="91">             20 </td>
                            <td width="147">63</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(전기:일반)</td>
                            <td width="91">             50 </td>
                            <td width="91">          2,887 </td>
                            <td width="91">58:1</td>
                            <td width="91">             54 </td>
                            <td width="91">          2,584 </td>
                            <td width="91">48:1</td>
                            <td width="91">          1,525 </td>
                            <td width="147">81.00/78.00(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(전기:장애)</td>
                            <td width="91">              4 </td>
                            <td width="91">             17 </td>
                            <td width="91">4:1</td>
                            <td width="91">              4 </td>
                            <td width="91">             23 </td>
                            <td width="91">6:1</td>
                            <td width="91">             14 </td>
                            <td width="147">59</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(전기:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             37 </td>
                            <td width="91">19:1</td>
                            <td width="91">              3 </td>
                            <td width="91">             22 </td>
                            <td width="91">7:1</td>
                            <td width="91">             13 </td>
                            <td width="147">62</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(화공:일반)</td>
                            <td width="91">             17 </td>
                            <td width="91">          1,757 </td>
                            <td width="91">103:1</td>
                            <td width="91">             21 </td>
                            <td width="91">          1,558 </td>
                            <td width="91">74:1</td>
                            <td width="91">            931 </td>
                            <td width="147">82</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(화공:장애)</td>
                            <td width="91">              1 </td>
                            <td width="91">              5 </td>
                            <td width="91">5:1</td>
                            <td width="91">              2 </td>
                            <td width="91">              7 </td>
                            <td width="91">4:1</td>
                            <td width="91">              6 </td>
                            <td width="147">65</td>
                        </tr>
                        <tr>
                            <td width="222">공업직(화공:저소득)</td>
                            <td width="91">              1 </td>
                            <td width="91">             19 </td>
                            <td width="91">19:1</td>
                            <td width="91">              1 </td>
                            <td width="91">             11 </td>
                            <td width="91">11:1</td>
                            <td width="91">              9 </td>
                            <td width="147">56</td>
                        </tr>
                        <tr>
                            <td width="222">농업직(일반농업:일반)</td>
                            <td width="91">             49 </td>
                            <td width="91">          3,244 </td>
                            <td width="91">66:1</td>
                            <td width="91">             77 </td>
                            <td width="91">          3,114 </td>
                            <td width="91">40:1</td>
                            <td width="91">          2,041 </td>
                            <td width="147">81</td>
                        </tr>
                        <tr>
                            <td width="222">농업직(일반농업:장애)</td>
                            <td width="91">              4 </td>
                            <td width="91">             32 </td>
                            <td width="91">8:1</td>
                            <td width="91">              6 </td>
                            <td width="91">             39 </td>
                            <td width="91">7:1</td>
                            <td width="91">             28 </td>
                            <td width="147">45</td>
                        </tr>
                        <tr>
                            <td width="222">농업직(일반농업:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             36 </td>
                            <td width="91">18:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             49 </td>
                            <td width="91">25:1</td>
                            <td width="91">             30 </td>
                            <td width="147">67</td>
                        </tr>
                        <tr>
                            <td width="222">임업직(산림자원:일반)</td>
                            <td width="91">             49 </td>
                            <td width="91">          1,726 </td>
                            <td width="91">35:1</td>
                            <td width="91">             57 </td>
                            <td width="91">          1,651 </td>
                            <td width="91">29:1</td>
                            <td width="91">          1,205 </td>
                            <td width="147">80</td>
                        </tr>
                        <tr>
                            <td width="222">임업직(산림자원:장애)</td>
                            <td width="91">              4 </td>
                            <td width="91">              8 </td>
                            <td width="91">2:1</td>
                            <td width="91">              4 </td>
                            <td width="91">             14 </td>
                            <td width="91">4:1</td>
                            <td width="91">             10 </td>
                            <td width="147">60</td>
                        </tr>
                        <tr>
                            <td width="222">임업직(산림자원:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             18 </td>
                            <td width="91">9:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             14 </td>
                            <td width="91">7:1</td>
                            <td width="91">              9 </td>
                            <td width="147">60</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(일반토목:일반)</td>
                            <td width="91">             74 </td>
                            <td width="91">          4,186 </td>
                            <td width="91">57:1</td>
                            <td width="91">             98 </td>
                            <td width="91">          3,865 </td>
                            <td width="91">39:1</td>
                            <td width="91">          2,170 </td>
                            <td width="147">71.00/70.00(양성)</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(일반토목:장애)</td>
                            <td width="91">              5 </td>
                            <td width="91">             12 </td>
                            <td width="91">2:1</td>
                            <td width="91">              9 </td>
                            <td width="91">             25 </td>
                            <td width="91">3:1</td>
                            <td width="91">             20 </td>
                            <td width="147">54</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(일반토목:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             30 </td>
                            <td width="91">15:1</td>
                            <td width="91">              4 </td>
                            <td width="91">             26 </td>
                            <td width="91">7:1</td>
                            <td width="91">             14 </td>
                            <td width="147">56</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(건축:일반)</td>
                            <td width="91">             41 </td>
                            <td width="91">          3,429 </td>
                            <td width="91">84:1</td>
                            <td width="91">             83 </td>
                            <td width="91">          3,035 </td>
                            <td width="91">37:1</td>
                            <td width="91">          1,860 </td>
                            <td width="147">73</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(건축:장애)</td>
                            <td width="91">              3 </td>
                            <td width="91">             19 </td>
                            <td width="91">6:1</td>
                            <td width="91">              6 </td>
                            <td width="91">             19 </td>
                            <td width="91">3:1</td>
                            <td width="91">             13 </td>
                            <td width="147">51</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(건축:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             30 </td>
                            <td width="91">15:1</td>
                            <td width="91">              2 </td>
                            <td width="91">             19 </td>
                            <td width="91">10:1</td>
                            <td width="91">             10 </td>
                            <td width="147">57</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(시설조경:일반)</td>
                            <td width="91">              9 </td>
                            <td width="91">            638 </td>
                            <td width="91">71:1</td>
                            <td width="91">              6 </td>
                            <td width="91">            720 </td>
                            <td width="91">120:1</td>
                            <td width="91">            419 </td>
                            <td width="147">82</td>
                        </tr>
                        <tr>
                            <td width="222">시설직(시설조경:장애인)</td>
                            <td width="91">              1 </td>
                            <td width="91">              9 </td>
                            <td width="91">9:1</td>
                            <td width="91">              1 </td>
                            <td width="91">              6 </td>
                            <td width="91">6:1</td>
                            <td width="91">              5 </td>
                            <td width="147">전원과락</td>
                        </tr>
                        <tr>
                            <td width="222">방재안전직(방재안전)</td>
                            <td width="91">              5 </td>
                            <td width="91">            571 </td>
                            <td width="91">114:1</td>
                            <td width="91">              3 </td>
                            <td width="91">            476 </td>
                            <td width="91">159:1</td>
                            <td width="91">            233 </td>
                            <td width="147">82</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(전산개발:일반)</td>
                            <td width="91">            186 </td>
                            <td width="91">          3,594 </td>
                            <td width="91">19:1</td>
                            <td width="91">             97 </td>
                            <td width="91">          2,705 </td>
                            <td width="91">28:1</td>
                            <td width="91">          1,935 </td>
                            <td width="147">78</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(전산개발:장애)</td>
                            <td width="91">             14 </td>
                            <td width="91">             45 </td>
                            <td width="91">3:1</td>
                            <td width="91">              8 </td>
                            <td width="91">             42 </td>
                            <td width="91">5:1</td>
                            <td width="91">             34 </td>
                            <td width="147">54</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(전산개발:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">             31 </td>
                            <td width="91">5:1</td>
                            <td width="91">              3 </td>
                            <td width="91">             17 </td>
                            <td width="91">6:1</td>
                            <td width="91">             12 </td>
                            <td width="147">64</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(정보보호:일반)</td>
                            <td width="91">             18 </td>
                            <td width="91">            331 </td>
                            <td width="91">18:1</td>
                            <td width="91">             46 </td>
                            <td width="91">            491 </td>
                            <td width="91">11:1</td>
                            <td width="91">            325 </td>
                            <td width="147">79</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(정보보호:장애)</td>
                            <td width="91">             14 </td>
                            <td width="91">             45 </td>
                            <td width="91">3:1</td>
                            <td width="91">              4 </td>
                            <td width="91">              4 </td>
                            <td width="91">1:1</td>
                            <td width="91">              3 </td>
                            <td width="147">66</td>
                        </tr>
                        <tr>
                            <td width="222">전산직(정보보호:저소득)</td>
                            <td width="91">              6 </td>
                            <td width="91">             31 </td>
                            <td width="91" >5:1</td>
                            <td width="91">              1 </td>
                            <td width="91">              4 </td>
                            <td width="91">4:1</td>
                            <td width="91">              2 </td>
                            <td width="147">전원과락</td>
                        </tr>
                        <tr>
                            <td width="222">방송통신직(전송기술:일반)</td>
                            <td width="91">             66 </td>
                            <td width="91">          1,087 </td>
                            <td width="91">16:1</td>
                            <td width="91">             68 </td>
                            <td width="91">          1,030 </td>
                            <td width="91">15:1</td>
                            <td width="91">            654 </td>
                            <td width="147">70</td>
                        </tr>
                        <tr>
                            <td width="222">방송통신직(전송기술:장애)</td>
                            <td width="91">              5 </td>
                            <td width="91">             11 </td>
                            <td width="91">2:1</td>
                            <td width="91">              5 </td>
                            <td width="91">              9 </td>
                            <td width="91">2:1</td>
                            <td width="91">              5 </td>
                            <td width="147">전원과락</td>
                        </tr>
                        <tr>
                            <td width="222">방송통신직(전송기술:저소득)</td>
                            <td width="91">              2 </td>
                            <td width="91">             12 </td>
                            <td width="91">6:1</td>
                            <td width="91">              2 </td>
                            <td width="91">              2 </td>
                            <td width="91">1:1</td>
                            <td width="91">              8 </td>
                            <td width="147">64</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_03_01.jpg" title="시험 체감난이도&이벤트" />
            @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'N')) {{-- is_series(직렬: Y, 직렬아님: N) --}}

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn03.png" title="설문참야하기" />
                </a>
            </div>

        <!--
            <div class="Cts03_01">
                <h3>2020년 6월 13일 시행 <span>지방직 9급 시험 총평</span></h3>
                <div>
                    {!! $data['Content'] !!}
                </div>
            </div>
            -->

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/04/2159_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/04/2159_03_03.jpg" title="기대평과 응원 메시지" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2021/04/2159_04_01.jpg" title="기출해설" /></div>
            <div class="lecture">
                <ul>
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @foreach($arr_base['promotion_otherinfo_data'] as $row)
                            <li>
                                @if(empty($row['ReferValue']) === false)<img src="{{ $row['ReferValue'] }}" title="{{ $row['ProfNickName'] }}" class="prof">@endif
                                <div class="t_tilte">
                                    {{ $row['SubjectName'] }} {{ $row['ProfNickName'] }} 교수<br>
                                    <span>{{ $row['OtherData2'] }}</span>
                                    <p>
                                        @if(empty($row['wUnitIdx']) === true && empty($row['wUnitAttachFile']) === true)
                                            추후 제공 예정입니다.
                                        @else
                                            @if(empty($row['wHD']) === false)
                                                <a href="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');">
                                                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn04_01.png" title="해설강의">
                                                </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2021/04/2159_btn04_02.png" title="해설자료">
                                                </a>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $('.tabMenu').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active[0].hash);

            $links.not($active).each(function(){
                $(this.hash).hide();
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
                $active = $(this);
                $content = $(this.hash);
                $active.addClass('active');
                $content.show();
                e.preventDefault();
            });
        });

        /*tab*/
        $(document).ready(function(){
            var cnt;
            var tab_id = '{{ $arr_base['tab_id'] }}';
            $('#tab'+tab_id).addClass('active');
            $('.evtMenu ul > li').each(function(item){
                cnt = item + 1;
                $("#content_"+cnt).hide();
                if (tab_id == cnt) {
                    $("#content_"+cnt).show();
                }
            });
        });

        function fn_FileDownload(path){
            if(confirm("다운로드 하시겠습니까?")){
                location.href = "/download.do?path="+path;
            }
        }

        function pullOpen(){
            @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
            @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        {{--무료 강좌발급--}}
        $regi_form = $('#regi_form');
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var _url = '{!! front_url('/event/registerStore') !!}?event_code={{$data["ElIdx"]}}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert('강좌가 지급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }
    </script>
@stop