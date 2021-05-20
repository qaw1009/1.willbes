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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/05/2216_top_bg.jpg) no-repeat center top; }
        .youtube {position:absolute; top:1140px; left:50%;z-index:12;margin-left:-450px}
        .youtube iframe {width:900px; height:525px;}


        .evtMenu { position:absolute; left:50%; margin-left:-560px; z-index:10;}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px;
            background:#e0dfdf;border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #806ae9;}
        .evtMenu li:hover:after {content:"▼"; display:block; clear:both;color:#806ae9;font-size:25px;}

        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#806ae9}
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

        #content_1 {padding-top:100px;padding-bottom:50px;}
        #content_2_01 {padding-top:100px;}
        #content_3 {padding-top:100px;}
        #content_4 {padding-top:100px;}
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#806ae9}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#806ae9; font-size:90%; margin-left:20px}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
            font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD tr:nth-child(1) {background:#D9D9D9;font-weight:bold;}
        .boardD tr:nth-child(2) {background:#D9D9D9;font-weight:bold;}
        .boardD tr:nth-child(3) {background:#D9D9D9;font-weight:bold;}
        .boardD tr:nth-child(4) {background:#FDEADA;font-weight:bold;}
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

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_top.jpg" title="지방직 9급 풀케어 서비스" />
            {{--
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/85P7aoE5tew?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            --}}
            <div class="evtMenu" id="evtMenu">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2216/SsIdx/114' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>지방직 국/영/史</span>
                            <div class="NSK-Black">실전동형모고 강좌 무료!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2216/SsIdx/114' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>지난 지방직으로</span>
                            <div class="NSK-Black">올해의 지방직을 알아보자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('202106051140')) javascript:alert('6.5(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>체감난이도 투표하고</span>
                            <div class="NSK-Black">맛있는 간식 먹자!</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202106071600')) javascript:alert('6.7(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2021 지방직 9급</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_01_01.jpg" title="" />
            <a href="javascript:void(0);" title="적중 경험하기" onclick="javascript:fn_submit();" style="position: absolute; left: 26.98%; top: 38.73%; width: 46.86%; height: 3.93%; z-index: 2;"></a>
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_01_03.jpg" title="" />
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_02_01.jpg" title="" id="content_2_01" />
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_02_02.jpg" title="" />
            <div class="mt20 mb100">
                <p class="download">
                    2021 국가직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                </p>
                <div class="mt20" id="tabs1">
                    <table cellspacing="0" cellpadding="0" class="boardD">
                        <col width="72" />
                        <col width="104" />
                        <col width="102" />
                        <col width="72" />
                        <col width="102" />
                        <col width="74" />
                        <col width="77" />
                        <col width="102" />
                        <col width="115" />
                        <tr>
                            <td rowspan="3" dir="ltr" width="72">모집단위</td>
                            <td colspan="6" dir="ltr" width="531">2021년</td>
                            <td colspan="2" dir="ltr" width="217">2020년</td>
                        </tr>
                        <tr>
                            <td colspan="2" dir="ltr" width="206">선발예정인원</td>
                            <td colspan="2" dir="ltr" width="174">접수인원</td>
                            <td colspan="2" dir="ltr" width="151">경쟁률</td>
                            <td dir="ltr" width="102">경쟁률</td>
                            <td dir="ltr" width="115">합격선(최고점)</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="104">전체</td>
                            <td dir="ltr" width="102">일반행정 9급</td>
                            <td dir="ltr" width="72">전체</td>
                            <td dir="ltr" width="102">일반행정 9급</td>
                            <td dir="ltr" width="74">전체</td>
                            <td dir="ltr" width="77">일반행정 9급</td>
                            <td dir="ltr" width="102">일반행정 9급</td>
                            <td dir="ltr" width="115">일반행정 9급</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72" style="color:red">계</td>
                            <td dir="ltr" width="104">22,829</td>
                            <td dir="ltr" width="102">8,445</td>
                            <td dir="ltr" width="72">235,971</td>
                            <td dir="ltr" width="102">109,398</td>
                            <td dir="ltr" width="74">11.5:1</td>
                            <td dir="ltr" width="77">13.9:1</td>
                            <td dir="ltr" width="102">15.14:1</td>
                            <td dir="ltr" width="115">409.56</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">서울</td>
                            <td dir="ltr" width="104">3,246</td>
                            <td dir="ltr" width="102">1156</td>
                            <td dir="ltr" width="72">35,931</td>
                            <td dir="ltr" width="102">16,503</td>
                            <td dir="ltr" width="74">11.1:1</td>
                            <td dir="ltr" width="77">14.3:1</td>
                            <td dir="ltr" width="102">22.31:1</td>
                            <td dir="ltr" width="115">385.75</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">강원</td>
                            <td dir="ltr" width="104">1,191</td>
                            <td dir="ltr" width="102">411</td>
                            <td dir="ltr" width="72">10,593</td>
                            <td dir="ltr" width="102">5,129</td>
                            <td dir="ltr" width="74">8.9:1</td>
                            <td dir="ltr" width="77">12.8:1</td>
                            <td dir="ltr" width="102">11.84:1</td>
                            <td dir="ltr" width="115">393.37</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">경기</td>
                            <td dir="ltr" width="104">4,784</td>
                            <td dir="ltr" width="102">1,713</td>
                            <td dir="ltr" width="72">44,490</td>
                            <td dir="ltr" width="102">22,922</td>
                            <td dir="ltr" width="74">9.3:1</td>
                            <td dir="ltr" width="77">13.4:1</td>
                            <td dir="ltr" width="102">11.31:1</td>
                            <td dir="ltr" width="115">390.95</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">경남</td>
                            <td dir="ltr" width="104">1,494</td>
                            <td dir="ltr" width="102">546</td>
                            <td dir="ltr" width="72">17,780</td>
                            <td dir="ltr" width="102">8,620</td>
                            <td dir="ltr" width="74">11.9:1</td>
                            <td dir="ltr" width="77">15.8:1</td>
                            <td dir="ltr" width="102">16.57:1</td>
                            <td dir="ltr" width="115">392.58</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">경북</td>
                            <td dir="ltr" width="104">1,715</td>
                            <td dir="ltr" width="102">570</td>
                            <td dir="ltr" width="72">17,655</td>
                            <td dir="ltr" width="102">7,869</td>
                            <td dir="ltr" width="74">10.3:1</td>
                            <td dir="ltr" width="77">13.8:1</td>
                            <td dir="ltr" width="102">11.29:1</td>
                            <td dir="ltr" width="115">385.03</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">광주</td>
                            <td dir="ltr" width="104">738</td>
                            <td dir="ltr" width="102">291</td>
                            <td dir="ltr" width="72">9,265</td>
                            <td dir="ltr" width="102">4,201</td>
                            <td dir="ltr" width="74">12.6:1</td>
                            <td dir="ltr" width="77">14.4:1</td>
                            <td dir="ltr" width="102">19.04:1</td>
                            <td dir="ltr" width="115">386.36</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">대구</td>
                            <td dir="ltr" width="104">828</td>
                            <td dir="ltr" width="102">346</td>
                            <td dir="ltr" width="72">11,829</td>
                            <td dir="ltr" width="102">6,107</td>
                            <td dir="ltr" width="74">14.3:1</td>
                            <td dir="ltr" width="77">17.7:1</td>
                            <td dir="ltr" width="102">17.36:1</td>
                            <td dir="ltr" width="115">384.84</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">대전</td>
                            <td dir="ltr" width="104">560</td>
                            <td dir="ltr" width="102">213</td>
                            <td dir="ltr" width="72">6,869</td>
                            <td dir="ltr" width="102">3,484</td>
                            <td dir="ltr" width="74">12.3:1</td>
                            <td dir="ltr" width="77">16.4:1</td>
                            <td dir="ltr" width="102">19.72:1</td>
                            <td dir="ltr" width="115">387.08</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">부산</td>
                            <td dir="ltr" width="104">1,193</td>
                            <td dir="ltr" width="102">519</td>
                            <td dir="ltr" width="72">16,750</td>
                            <td dir="ltr" width="102">8,608</td>
                            <td dir="ltr" width="74">14.0:1</td>
                            <td dir="ltr" width="77">16.6:1</td>
                            <td dir="ltr" width="102">16.69:1</td>
                            <td dir="ltr" width="115">386.84</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">세종</td>
                            <td dir="ltr" width="104">81</td>
                            <td dir="ltr" width="102">40</td>
                            <td dir="ltr" width="72">1,244</td>
                            <td dir="ltr" width="102">712</td>
                            <td dir="ltr" width="74">15.4:1</td>
                            <td dir="ltr" width="77">17.8:1</td>
                            <td dir="ltr" width="102">26.17:1</td>
                            <td dir="ltr" width="115">390.43</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">울산</td>
                            <td dir="ltr" width="104">352</td>
                            <td dir="ltr" width="102">147</td>
                            <td dir="ltr" width="72">4,810</td>
                            <td dir="ltr" width="102">2,339</td>
                            <td dir="ltr" width="74">13.7:1</td>
                            <td dir="ltr" width="77">15.9:1</td>
                            <td dir="ltr" width="102">20.45:1</td>
                            <td dir="ltr" width="115">391.66</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">인천</td>
                            <td dir="ltr" width="104">1,126</td>
                            <td dir="ltr" width="102">87</td>
                            <td dir="ltr" width="72">10,885</td>
                            <td dir="ltr" width="102">608</td>
                            <td dir="ltr" width="74">9.7:1</td>
                            <td dir="ltr" width="77">7.0:1</td>
                            <td dir="ltr" width="102">9.81:1</td>
                            <td dir="ltr" width="115">371.84</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">전남</td>
                            <td dir="ltr" width="104">1,516</td>
                            <td dir="ltr" width="102">692</td>
                            <td dir="ltr" width="72">12,355</td>
                            <td dir="ltr" width="102">6,183</td>
                            <td dir="ltr" width="74">8.2:1</td>
                            <td dir="ltr" width="77">8.9:1</td>
                            <td dir="ltr" width="102">8.66:1</td>
                            <td dir="ltr" width="115">382.52</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">전북</td>
                            <td dir="ltr" width="104">1,320</td>
                            <td dir="ltr" width="102">743</td>
                            <td dir="ltr" width="72">12,067</td>
                            <td dir="ltr" width="102">5,227</td>
                            <td dir="ltr" width="74">9.1:1</td>
                            <td dir="ltr" width="77">7.0:1</td>
                            <td dir="ltr" width="102">14.11:1</td>
                            <td dir="ltr" width="115">409.56</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">제주</td>
                            <td dir="ltr" width="104">175</td>
                            <td dir="ltr" width="102">49</td>
                            <td dir="ltr" width="72">3,359</td>
                            <td dir="ltr" width="102">1,113</td>
                            <td dir="ltr" width="74">19.2:1</td>
                            <td dir="ltr" width="77">22.7:1</td>
                            <td dir="ltr" width="102">14.29:1</td>
                            <td dir="ltr" width="115">387.69</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">충남</td>
                            <td dir="ltr" width="104">1,381</td>
                            <td dir="ltr" width="102">477</td>
                            <td dir="ltr" width="72">10,924</td>
                            <td dir="ltr" width="102">5,030</td>
                            <td dir="ltr" width="74">8.0:1</td>
                            <td dir="ltr" width="77">11.0:1</td>
                            <td dir="ltr" width="102">8.60:1</td>
                            <td dir="ltr" width="115">379.17</td>
                        </tr>
                        <tr>
                            <td dir="ltr" width="72">충북</td>
                            <td dir="ltr" width="104">1,129</td>
                            <td dir="ltr" width="102">445</td>
                            <td dir="ltr" width="72">9,165</td>
                            <td dir="ltr" width="102">4,743</td>
                            <td dir="ltr" width="74">8.1:1</td>
                            <td dir="ltr" width="77">10.7:1</td>
                            <td dir="ltr" width="102">9.20:1</td>
                            <td dir="ltr" width="115">380.93</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2216_03_01.jpg" title="시험 체감난이도&이벤트" />
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

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/05/2216_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2021/05/2216_03_03.jpg" title="기대평과 응원 메시지" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2021/05/2216_04_01.jpg" title="기출해설" /></div>
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