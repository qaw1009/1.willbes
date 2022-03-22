@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /*****************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:11;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2589_top_bg.jpg) no-repeat center top; }
        .youtube {}
        .youtube iframe {width:900px; height:525px;}

        .evtMenu ul {width:1120px; margin:100px auto 0;}
        .evtMenu li {display:inline; float:left; width:25%; position: relative;}
        .evtMenu li a {display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px; background:#e0dfdf; border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #0070cf;}
        .evtMenu li a.active:after,
        .evtMenu li a:hover:after {content:"▼"; display:block; clear:both; color:#0070cf; font-size:25px; position:absolute; top:110px; width:100%; text-align:center; z-index: 10;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#0070cf}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {position:relative; width:1120px; margin:0 auto; text-align:center; font-size:14px;}
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

        .download {font-weight:bold;font-size:17px;padding-bottom:35px;color:#0070cf}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#0070cf; font-size:90%; margin-left:20px}

        .boardD {width:980px; border-spacing:0px; border:1px solid #000; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD td:nth-child(4) {background:#d1eaff;font-weight:bold;}
        .boardD td:nth-child(7) {background:#d1eaff;font-weight:bold;}
        .boardD td:nth-child(9) {color:red;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #000; border-bottom:1px solid #000; color:#000; font-weight:bold}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #000; border-bottom:1px solid #000;color:#000;}
        .boardD tbody th {background:#add7fb}
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
        {{--
        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2020" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_sky.png" alt="혜택받기" />
            </a>
        </div>
        --}}

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_top.jpg" title="국가직 9급 풀케어 서비스" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/85P7aoE5tew?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox">
            <div class="evtMenu" id="evtMenu" data-aos="fade-up">
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2159/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>실전464 강좌</span>
                            <div class="NSK-Black">+온라인 모의고사 무료!</div>
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
                            <span>2022 국가직 9급</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="content_1" class="tabCts" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_01_01.jpg" title="" />
                    <a href="javascript:void(0);" title="적중 경험하기" onclick="javascript:fn_submit();" style="position: absolute; left: 26.96%; top: 88.72%; width: 45.98%; height: 8.37%; z-index: 2;"></a>
                </div>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_01_02.jpg" title="" />
                    <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="응시하기" style="position: absolute; left: 21.16%; top: 81.84%; width: 57.59%; height: 9.18%; z-index: 2;"></a>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_01_03.jpg" title="" />
            </div>

            <!--완벽분석-->
            <div id="content_2" class="tabCts Cts02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_02_01.jpg" title="" id="content_2_01" />
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_02_02.jpg" title="" />
                <div class="mt20 mb100">
                    <p class="download">
                        2022 국가직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                    </p>
                    <div class="mt20" id="tabs1">
                        <table cellspacing="0" cellpadding="0" class="boardD">
                            <col />
                            <col span="7" />
                            <col />
                            <thead>
                                <tr>
                                    <th rowspan="2">모집단위</th>
                                    <th colspan="3">2022년</th>
                                    <th colspan="5">2021년</th>
                                </tr>
                                <tr>
                                    <th>선발예정인원</th>
                                    <th>접수인원</th>
                                    <th>경쟁률</th>
                                    <th>선발예정인원</th>
                                    <th>접수인원</th>
                                    <th>경쟁률</th>
                                    <th>응시인원</th>
                                    <th>합격선</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>총 계</th>
                                    <th>         5,672 </th>
                                    <th>      165,524 </th>
                                    <th>29:1</th>
                                    <th>         5,662 </th>
                                    <th>      198,110 </th>
                                    <th>35:1</th>
                                    <th>      156,311 </th>
                                    <th>-</th>
                                </tr>
                                <tr>
                                    <th>행정직 계</th>
                                    <th>         4,996 </th>
                                    <th>      141,733 </th>
                                    <th>28:1</th>
                                    <th>         4,951 </th>
                                    <th>      171,071 </th>
                                    <th>35:1</th>
                                    <th>      151,866 </th>
                                    <th>-</th>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:일반)</td>
                                    <td>            456 </td>
                                    <td>        42,828 </td>
                                    <td>94:1</td>
                                    <td>            416 </td>
                                    <td>        41,754 </td>
                                    <td>100:1</td>
                                    <td>        32,772 </td>
                                    <td>400.84</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:장애)</td>
                                    <td>             38 </td>
                                    <td>            594 </td>
                                    <td>16:1</td>
                                    <td>             33 </td>
                                    <td>            629 </td>
                                    <td>19:1</td>
                                    <td>            493 </td>
                                    <td>309.02    / 296.79(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:전국:저소득)</td>
                                    <td>             15 </td>
                                    <td>            776 </td>
                                    <td>52:1</td>
                                    <td>             13 </td>
                                    <td>            735 </td>
                                    <td>57:1</td>
                                    <td>            554 </td>
                                    <td>378.45</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:지역:일반)</td>
                                    <td>            233 </td>
                                    <td>        13,999 </td>
                                    <td>60:1</td>
                                    <td>            256 </td>
                                    <td>        16,511 </td>
                                    <td>64:1</td>
                                    <td>        13,104 </td>
                                    <td>384.10    (최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(일반행정:지역:장애)</td>
                                    <td>             19 </td>
                                    <td>            339 </td>
                                    <td>18:1</td>
                                    <td>             15 </td>
                                    <td>            128 </td>
                                    <td>9:1</td>
                                    <td>            342 </td>
                                    <td>219.79    (최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:전국:저소득)</td>
                                    <td>             19 </td>
                                    <td>            381 </td>
                                    <td>20:1</td>
                                    <td>              6 </td>
                                    <td>            106 </td>
                                    <td>18:1</td>
                                    <td>             88 </td>
                                    <td>322.67</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:지역:일반)</td>
                                    <td>            573 </td>
                                    <td>        14,100 </td>
                                    <td>25:1</td>
                                    <td>            172 </td>
                                    <td>          5,327 </td>
                                    <td>31:1</td>
                                    <td>          4,256 </td>
                                    <td>374.02 (최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(우정사업본부:지역:장애)</td>
                                    <td>             47 </td>
                                    <td>            224 </td>
                                    <td>5:1</td>
                                    <td>             15 </td>
                                    <td>            128 </td>
                                    <td>9:1</td>
                                    <td>             97 </td>
                                    <td>229.60    (최저)</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:일반)</td>
                                    <td>            338 </td>
                                    <td>          8,909 </td>
                                    <td>26:1</td>
                                    <td>            383 </td>
                                    <td>        11,632 </td>
                                    <td>30:1</td>
                                    <td>          9,771 </td>
                                    <td>394.10    / 389.10(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:장애)</td>
                                    <td>             28 </td>
                                    <td>            234 </td>
                                    <td>8:1</td>
                                    <td>             31 </td>
                                    <td>            277 </td>
                                    <td>9:1</td>
                                    <td>            211 </td>
                                    <td>277.7</td>
                                </tr>
                                <tr>
                                    <td>행정직(경찰청:전국:저소득)</td>
                                    <td>             11 </td>
                                    <td>            227 </td>
                                    <td>21:1</td>
                                    <td>             12 </td>
                                    <td>            208 </td>
                                    <td>17:1</td>
                                    <td>            165 </td>
                                    <td>350.7</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:일반)</td>
                                    <td>            469 </td>
                                    <td>          3,732 </td>
                                    <td>8:1</td>
                                    <td>            656 </td>
                                    <td>        17,892 </td>
                                    <td>27:1</td>
                                    <td>        14,849 </td>
                                    <td>387.34    / 386.40(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:장애)</td>
                                    <td>             40 </td>
                                    <td>            102 </td>
                                    <td>3:1</td>
                                    <td>             53 </td>
                                    <td>            377 </td>
                                    <td>7:1</td>
                                    <td>            289 </td>
                                    <td>216.19</td>
                                </tr>
                                <tr>
                                    <td>행정직(고용노동:전국:저소득)</td>
                                    <td>             16 </td>
                                    <td>             80 </td>
                                    <td>5:1</td>
                                    <td>             22 </td>
                                    <td>            450 </td>
                                    <td>20:1</td>
                                    <td>            373 </td>
                                    <td>344.85</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:일반)</td>
                                    <td>             71 </td>
                                    <td>        16,295 </td>
                                    <td>230:1</td>
                                    <td>             51 </td>
                                    <td>        14,394 </td>
                                    <td>282:1</td>
                                    <td>        11,512 </td>
                                    <td>411.84    / 410.80(양성)</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:장애)</td>
                                    <td>              5 </td>
                                    <td>            231 </td>
                                    <td>46:1</td>
                                    <td>              4 </td>
                                    <td>            228 </td>
                                    <td>57:1</td>
                                    <td>            179 </td>
                                    <td>349.66</td>
                                </tr>
                                <tr>
                                    <td>행정직(교육행정:저소득)</td>
                                    <td>              3 </td>
                                    <td>            199 </td>
                                    <td>66:1</td>
                                    <td>              2 </td>
                                    <td>            202 </td>
                                    <td>101:1</td>
                                    <td>            141 </td>
                                    <td>402.91</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:일반)</td>
                                    <td>             60 </td>
                                    <td>          1,199 </td>
                                    <td>20:1</td>
                                    <td>             60 </td>
                                    <td>          1,231 </td>
                                    <td>21:1</td>
                                    <td>            901 </td>
                                    <td>396.75</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:장애)</td>
                                    <td>              5 </td>
                                    <td>             56 </td>
                                    <td>11:1</td>
                                    <td>              5 </td>
                                    <td>             42 </td>
                                    <td>8:1</td>
                                    <td>             33 </td>
                                    <td>227.34</td>
                                </tr>
                                <tr>
                                    <td>행정직(선거행정:저소득)</td>
                                    <td>              2 </td>
                                    <td>             25 </td>
                                    <td>13:1</td>
                                    <td>              6 </td>
                                    <td>            102 </td>
                                    <td>17:1</td>
                                    <td>             15 </td>
                                    <td>350.65</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:일반)</td>
                                    <td>            125 </td>
                                    <td>          2,651 </td>
                                    <td>21:1</td>
                                    <td>            180 </td>
                                    <td>          3,205 </td>
                                    <td>18:1</td>
                                    <td>          2,272 </td>
                                    <td>361.72</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:장애)</td>
                                    <td>             11 </td>
                                    <td>             41 </td>
                                    <td>4:1</td>
                                    <td>             14 </td>
                                    <td>             50 </td>
                                    <td>4:1</td>
                                    <td>             37 </td>
                                    <td>218.73</td>
                                </tr>
                                <tr>
                                    <td>직업상담직(직업상담:저소득)</td>
                                    <td>              4 </td>
                                    <td>             40 </td>
                                    <td>10:1</td>
                                    <td>              6 </td>
                                    <td>            102 </td>
                                    <td>17:1</td>
                                    <td>             72 </td>
                                    <td>351.71    / 344.43(양성)</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:일반)</td>
                                    <td>            850 </td>
                                    <td>        10,956 </td>
                                    <td>13:1</td>
                                    <td>          1,111 </td>
                                    <td>        19,689 </td>
                                    <td>18:1</td>
                                    <td>        16,058 </td>
                                    <td>375.34</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:장애)</td>
                                    <td>             73 </td>
                                    <td>             92 </td>
                                    <td>1:1</td>
                                    <td>             87 </td>
                                    <td>            284 </td>
                                    <td>3:1</td>
                                    <td>            221 </td>
                                    <td>215.2</td>
                                </tr>
                                <tr>
                                    <td>세무직(세무:저소득)</td>
                                    <td>             27 </td>
                                    <td>            167 </td>
                                    <td>6:1</td>
                                    <td>             35 </td>
                                    <td>            327 </td>
                                    <td>9:1</td>
                                    <td>            263 </td>
                                    <td>321.91</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:일반)</td>
                                    <td>             38 </td>
                                    <td>          1,996 </td>
                                    <td>53:1</td>
                                    <td>             55 </td>
                                    <td>          2,836 </td>
                                    <td>52:1</td>
                                    <td>          2,352 </td>
                                    <td>400.09.    / 398.73(양성)</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:장애)</td>
                                    <td>              4 </td>
                                    <td>             40 </td>
                                    <td>10:1</td>
                                    <td>              5 </td>
                                    <td>             68 </td>
                                    <td>14:1</td>
                                    <td>             51 </td>
                                    <td>319.8</td>
                                </tr>
                                <tr>
                                    <td>관세직(관세:저소득)</td>
                                    <td>              1 </td>
                                    <td>             16 </td>
                                    <td>16:1</td>
                                    <td>              2 </td>
                                    <td>             42 </td>
                                    <td>21:1</td>
                                    <td>             33 </td>
                                    <td>382.82</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:일반)</td>
                                    <td>             47 </td>
                                    <td>            887 </td>
                                    <td>19:1</td>
                                    <td>             66 </td>
                                    <td>          1,282 </td>
                                    <td>19:1</td>
                                    <td>          1,006 </td>
                                    <td>393.42</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:장애)</td>
                                    <td>              4 </td>
                                    <td>              8 </td>
                                    <td>2:1</td>
                                    <td>              5 </td>
                                    <td>             16 </td>
                                    <td>3:1</td>
                                    <td>             10 </td>
                                    <td>280.17</td>
                                </tr>
                                <tr>
                                    <td>통계직(통계:저소득)</td>
                                    <td>              2 </td>
                                    <td>             16 </td>
                                    <td>8:1</td>
                                    <td>              2 </td>
                                    <td>             32 </td>
                                    <td>16:1</td>
                                    <td>             26 </td>
                                    <td>338.62</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:남)</td>
                                    <td>            705 </td>
                                    <td>          4,764 </td>
                                    <td>7:1</td>
                                    <td>            603 </td>
                                    <td>          6,801 </td>
                                    <td>11:1</td>
                                    <td>          5,178 </td>
                                    <td>340.59</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:여)</td>
                                    <td>            118 </td>
                                    <td>          1,365 </td>
                                    <td>12:1</td>
                                    <td>             52 </td>
                                    <td>          1,276 </td>
                                    <td>25:1</td>
                                    <td>          1,050 </td>
                                    <td>365.06</td>
                                </tr>
                                <tr>
                                    <td>교정직(교정:저소득)</td>
                                    <td>             25 </td>
                                    <td>            156 </td>
                                    <td>6:1</td>
                                    <td>             19 </td>
                                    <td>            176 </td>
                                    <td>9:1</td>
                                    <td>            139 </td>
                                    <td>290.73</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:남)</td>
                                    <td>            137 </td>
                                    <td>          1,419 </td>
                                    <td>10:1</td>
                                    <td>            131 </td>
                                    <td>          2,470 </td>
                                    <td>19:1</td>
                                    <td>          1,935 </td>
                                    <td>364.62</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:여)</td>
                                    <td>             59 </td>
                                    <td>          1,816 </td>
                                    <td>31:1</td>
                                    <td>             56 </td>
                                    <td>          3,399 </td>
                                    <td>61:1</td>
                                    <td>          2,817 </td>
                                    <td>381.85</td>
                                </tr>
                                <tr>
                                    <td>보호직(보호:저소득)</td>
                                    <td>              5 </td>
                                    <td>             81 </td>
                                    <td>16:1</td>
                                    <td>              6 </td>
                                    <td>            141 </td>
                                    <td>24:1</td>
                                    <td>            105 </td>
                                    <td>346.31</td>
                                </tr>
                                <tr>
                                    <td>검찰직(검찰:일반)</td>
                                    <td>            248 </td>
                                    <td>          7,538 </td>
                                    <td>30:1</td>
                                    <td>            233 </td>
                                    <td>        10,410 </td>
                                    <td>45:1</td>
                                    <td>          7,771 </td>
                                    <td>389.08</td>
                                </tr>
                                <tr>
                                    <td>검찰직(검찰:저소득)</td>
                                    <td>              7 </td>
                                    <td>            139 </td>
                                    <td>20:1</td>
                                    <td>              7 </td>
                                    <td>            161 </td>
                                    <td>23:1</td>
                                    <td>             12 </td>
                                    <td>355.48</td>
                                </tr>
                                <tr>
                                    <td>마약수사직(마약수사:일반)</td>
                                    <td>             19 </td>
                                    <td>            486 </td>
                                    <td>26:1</td>
                                    <td>             15 </td>
                                    <td>            791 </td>
                                    <td>53:1</td>
                                    <td>            474 </td>
                                    <td>382.14</td>
                                </tr>
                                <tr>
                                    <td>마약수사직(마약수사:저소득)</td>
                                    <td>              1 </td>
                                    <td>             11 </td>
                                    <td>11:1</td>
                                    <td>              1 </td>
                                    <td>             19 </td>
                                    <td>19:1</td>
                                    <td>             13 </td>
                                    <td>342.11</td>
                                </tr>
                                <tr>
                                    <td>출입국관리직(출입국관리:일반)</td>
                                    <td>             17 </td>
                                    <td>          2,132 </td>
                                    <td>125:1</td>
                                    <td>             28 </td>
                                    <td>          4,045 </td>
                                    <td>144:1</td>
                                    <td>          3,126 </td>
                                    <td>403.66    / 400.69(양성)</td>
                                </tr>
                                <tr>
                                    <td>출입국관리직(출입국관리:저소득)</td>
                                    <td>              1 </td>
                                    <td>             21 </td>
                                    <td>21:1</td>
                                    <td>              1 </td>
                                    <td>             60 </td>
                                    <td>60:1</td>
                                    <td>             42 </td>
                                    <td>385.52</td>
                                </tr>
                                <tr>
                                    <td>철도경찰직(철도경찰:일반)</td>
                                    <td>             19 </td>
                                    <td>            358 </td>
                                    <td>19:1</td>
                                    <td>             18 </td>
                                    <td>            806 </td>
                                    <td>45:1</td>
                                    <td>            498 </td>
                                    <td>372.56</td>
                                </tr>
                                <tr>
                                    <td>철도경찰직(철도경찰:저소득)</td>
                                    <td>              1 </td>
                                    <td>             17 </td>
                                    <td>17:1</td>
                                    <td>              1 </td>
                                    <td>             14 </td>
                                    <td>14:1</td>
                                    <td>              8 </td>
                                    <td>349</td>
                                </tr>
                                <tr>
                                    <th>기술직 계</th>
                                    <th>           676 </th>
                                    <th>       23,791 </th>
                                    <th>35:1</th>
                                    <th>           711 </th>
                                    <th>       27,039 </th>
                                    <th>38:1</th>
                                    <th>　</th>
                                    <th>　</th>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:일반)</td>
                                    <td>             68 </td>
                                    <td>          2,492 </td>
                                    <td>37:1</td>
                                    <td>             77 </td>
                                    <td>          3,133 </td>
                                    <td>41:1</td>
                                    <td>          2,338 </td>
                                    <td>83.00    / 82.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:장애)</td>
                                    <td>              5 </td>
                                    <td>             20 </td>
                                    <td>4:1</td>
                                    <td>              6 </td>
                                    <td>             31 </td>
                                    <td>5:1</td>
                                    <td>             20 </td>
                                    <td>47 </td>
                                </tr>
                                <tr>
                                    <td>공업직(일반기계:저소득)</td>
                                    <td>              2 </td>
                                    <td>             24 </td>
                                    <td>12:1</td>
                                    <td>              3 </td>
                                    <td>             39 </td>
                                    <td>13:1</td>
                                    <td>             28 </td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:일반)</td>
                                    <td>             52 </td>
                                    <td>          2,419 </td>
                                    <td>47:1</td>
                                    <td>             50 </td>
                                    <td>          2,887 </td>
                                    <td>58:1</td>
                                    <td>          1,990 </td>
                                    <td>84.00  81.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:장애)</td>
                                    <td>              5 </td>
                                    <td>             10 </td>
                                    <td>2:1</td>
                                    <td>              4 </td>
                                    <td>             17 </td>
                                    <td>4:1</td>
                                    <td>             10 </td>
                                    <td>62</td>
                                </tr>
                                <tr>
                                    <td>공업직(전기:저소득)</td>
                                    <td>              2 </td>
                                    <td>             33 </td>
                                    <td>17:1</td>
                                    <td>              2 </td>
                                    <td>             37 </td>
                                    <td>19:1</td>
                                    <td>             23 </td>
                                    <td>66</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:일반)</td>
                                    <td>             15 </td>
                                    <td>          1,432 </td>
                                    <td>95:1</td>
                                    <td>             17 </td>
                                    <td>          1,757 </td>
                                    <td>103:1</td>
                                    <td>          1,329 </td>
                                    <td>90</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:장애)</td>
                                    <td>              1 </td>
                                    <td>              7 </td>
                                    <td>7:1</td>
                                    <td>              1 </td>
                                    <td>              5 </td>
                                    <td>5:1</td>
                                    <td>              4 </td>
                                    <td>전원과락</td>
                                </tr>
                                <tr>
                                    <td>공업직(화공:저소득)</td>
                                    <td>              1 </td>
                                    <td>             15 </td>
                                    <td>15:1</td>
                                    <td>              1 </td>
                                    <td>             19 </td>
                                    <td>19:1</td>
                                    <td>             13 </td>
                                    <td>76</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:일반)</td>
                                    <td>             46 </td>
                                    <td>          2,816 </td>
                                    <td>61:1</td>
                                    <td>             49 </td>
                                    <td>          3,244 </td>
                                    <td>66:1</td>
                                    <td>          2,578 </td>
                                    <td>90.00    / 89.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:장애)</td>
                                    <td>              4 </td>
                                    <td>             23 </td>
                                    <td>6:1</td>
                                    <td>              4 </td>
                                    <td>             32 </td>
                                    <td>8:1</td>
                                    <td>             25 </td>
                                    <td>65</td>
                                </tr>
                                <tr>
                                    <td>농업직(일반농업:저소득)</td>
                                    <td>              2 </td>
                                    <td>             30 </td>
                                    <td>15:1</td>
                                    <td>              2 </td>
                                    <td>             36 </td>
                                    <td>18:1</td>
                                    <td>             23 </td>
                                    <td>68</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:일반)</td>
                                    <td>             47 </td>
                                    <td>          1,616 </td>
                                    <td>34:1</td>
                                    <td>             49 </td>
                                    <td>          1,726 </td>
                                    <td>35:1</td>
                                    <td>          1,399 </td>
                                    <td>84</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:장애)</td>
                                    <td>              4 </td>
                                    <td>              8 </td>
                                    <td>2:1</td>
                                    <td>              4 </td>
                                    <td>              8 </td>
                                    <td>2:1</td>
                                    <td>              6 </td>
                                    <td>53</td>
                                </tr>
                                <tr>
                                    <td>임업직(산림자원:저소득)</td>
                                    <td>              2 </td>
                                    <td>             18 </td>
                                    <td>9:1</td>
                                    <td>              2 </td>
                                    <td>             18 </td>
                                    <td>9:1</td>
                                    <td>             14 </td>
                                    <td>57</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:일반)</td>
                                    <td>             79 </td>
                                    <td>          4,189 </td>
                                    <td>53:1</td>
                                    <td>             74 </td>
                                    <td>          4,186 </td>
                                    <td>57:1</td>
                                    <td>          3,220 </td>
                                    <td>74.00  73.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:장애)</td>
                                    <td>              6 </td>
                                    <td>              5 </td>
                                    <td>1:1</td>
                                    <td>              5 </td>
                                    <td>             12 </td>
                                    <td>2:1</td>
                                    <td>             11 </td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>시설직(일반토목:저소득)</td>
                                    <td>              3 </td>
                                    <td>             35 </td>
                                    <td>12:1</td>
                                    <td>              2 </td>
                                    <td>             30 </td>
                                    <td>15:1</td>
                                    <td>             23 </td>
                                    <td>68</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:일반)</td>
                                    <td>             41 </td>
                                    <td>          2,788 </td>
                                    <td>68:1</td>
                                    <td>             41 </td>
                                    <td>          3,429 </td>
                                    <td>84:1</td>
                                    <td>          2,698 </td>
                                    <td>81</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:장애)</td>
                                    <td>              3 </td>
                                    <td>             19 </td>
                                    <td>6:1</td>
                                    <td>              3 </td>
                                    <td>             19 </td>
                                    <td>6:1</td>
                                    <td>             16 </td>
                                    <td>56</td>
                                </tr>
                                <tr>
                                    <td>시설직(건축:저소득)</td>
                                    <td>              1 </td>
                                    <td>             26 </td>
                                    <td>26:1</td>
                                    <td>              2 </td>
                                    <td>             30 </td>
                                    <td>15:1</td>
                                    <td>             25 </td>
                                    <td>76</td>
                                </tr>
                                <tr>
                                    <td>시설직(시설조경:일반)</td>
                                    <td>              9 </td>
                                    <td>            521 </td>
                                    <td>58:1</td>
                                    <td>              9 </td>
                                    <td>            638 </td>
                                    <td>71:1</td>
                                    <td>            495 </td>
                                    <td>86</td>
                                </tr>
                                <tr>
                                    <td>시설직(시설조경:장애인)</td>
                                    <td>              1 </td>
                                    <td>               - </td>
                                    <td>:1</td>
                                    <td>              1 </td>
                                    <td>              9 </td>
                                    <td>9:1</td>
                                    <td>              2 </td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>방재안전직(방재안전)</td>
                                    <td>              5 </td>
                                    <td>            378 </td>
                                    <td>76:1</td>
                                    <td>              5 </td>
                                    <td>            571 </td>
                                    <td>114:1</td>
                                    <td>            331 </td>
                                    <td>82</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:일반)</td>
                                    <td>            188 </td>
                                    <td>          3,464 </td>
                                    <td>18:1</td>
                                    <td>            186 </td>
                                    <td>          3,594 </td>
                                    <td>19:1</td>
                                    <td>          2,781 </td>
                                    <td>74</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:장애)</td>
                                    <td>             15 </td>
                                    <td>             49 </td>
                                    <td>3:1</td>
                                    <td>             14 </td>
                                    <td>             45 </td>
                                    <td>3:1</td>
                                    <td>             33 </td>
                                    <td>47</td>
                                </tr>
                                <tr>
                                    <td>전산직(전산개발:저소득)</td>
                                    <td>              6 </td>
                                    <td>             49 </td>
                                    <td>8:1</td>
                                    <td>              6 </td>
                                    <td>             31 </td>
                                    <td>5:1</td>
                                    <td>             22 </td>
                                    <td>56.00    / 53.00(양성)</td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:일반)</td>
                                    <td>              8 </td>
                                    <td>            305 </td>
                                    <td>38:1</td>
                                    <td>             18 </td>
                                    <td>            331 </td>
                                    <td>18:1</td>
                                    <td>            217 </td>
                                    <td>73</td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:장애)</td>
                                    <td>              1 </td>
                                    <td>              7 </td>
                                    <td>7:1</td>
                                    <td>             14 </td>
                                    <td>             45 </td>
                                    <td>3:1</td>
                                    <td>              3 </td>
                                    <td>56</td>
                                </tr>
                                <tr>
                                    <td>전산직(정보보호:저소득)</td>
                                    <td>　</td>
                                    <td>　</td>
                                    <td>　</td>
                                    <td>              6 </td>
                                    <td>             31 </td>
                                    <td>5:1</td>
                                    <td>              8 </td>
                                    <td>61</td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:일반)</td>
                                    <td>             48 </td>
                                    <td>            967 </td>
                                    <td>20:1</td>
                                    <td>             66 </td>
                                    <td>          1,087 </td>
                                    <td>16:1</td>
                                    <td>             88 </td>
                                    <td>67</td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:장애)</td>
                                    <td>              4 </td>
                                    <td>              9 </td>
                                    <td>2:1</td>
                                    <td>              5 </td>
                                    <td>             11 </td>
                                    <td>2:1</td>
                                    <td>              7 </td>
                                    <td>55</td>
                                </tr>
                                <tr>
                                    <td>방송통신직(전송기술:저소득)</td>
                                    <td>              2 </td>
                                    <td>             17 </td>
                                    <td>9:1</td>
                                    <td>              2 </td>
                                    <td>             12 </td>
                                    <td>6:1</td>
                                    <td>              9 </td>
                                    <td>61</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--시험총평 및 시험후기-->
            <div id="content_3" class="tabCts Cts03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_03_01.jpg" title="시험 체감난이도&이벤트" />
                @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'N')) {{-- is_series(직렬: Y, 직렬아님: N) --}}

                <div class="tx-center">
                    <a href="javascript:pullOpen();">
                        <img src="https://static.willbes.net/public/images/promotion/2022/03/2589_btn03.png" title="설문참야하기" />
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

                <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2022/03/2589_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
                {{--시험평가댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
                @endif

                <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2022/03/2589_03_03.jpg" title="기대평과 응원 메시지" /> </div>
                {{--기본댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_normal_partial')
                @endif
            </div>

            <!--기출해설강의-->
            <div id="content_4" class="tabCts Cts04" data-aos="fade-up">
                <div><img src="https://static.willbes.net/public/images/promotion/2022/03/2589_04_01.jpg" title="기출해설" /></div>
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
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>

    <script type="text/javascript">
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