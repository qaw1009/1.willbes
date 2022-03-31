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
            background:#fff}
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a {border:1px solid #000}
        
        /*****************************************************************/

        .sky {position:fixed; top:200px; right:0; z-index:11;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/03/2614_top_bg.jpg) no-repeat center top; }

        .evtMenu ul {width:1120px; margin:100px auto 0;}
        .evtMenu li {display:inline; float:left; width:25%; position: relative;}
        .evtMenu li a {display:block; text-align:center; padding:30px 0; color:#7d7d7d; font-size:20px; background:#e0dfdf; border-bottom:0; margin-right:4px;border:1px solid #bfbfbf;}
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:20px}
        .evtMenu li a div {margin-top:8px;color:#7d7d7d}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:2px solid #e14f4a;}
        .evtMenu li a.active:after,
        .evtMenu li a:hover:after {content:"▼"; display:block; clear:both; color:#e14f4a; font-size:25px; position:absolute; top:110px; width:100%; text-align:center; z-index: 10;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#e14f4a}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {position:relative; width:1120px; margin:0 auto; text-align:center; font-size:14px; padding-bottom:150px}
        .tabCts .download {font-weight:bold;font-size:17px;color:#e14f4a}
        .tabCts .download span {position:absolute; top:660px; display:block; width:72px; height:24px; line-height:24px; text-align:center; z-index:1}
        .tabCts .download span:nth-child(1) {left:160px;}
        .tabCts .download span:nth-child(2) {left:362px;}
        .tabCts .download span:nth-child(3) {left:572px;}
        .tabCts .download span:nth-child(4) {left:760px;}
        .tabCts .download span:nth-child(5) {left:940px;}
        .tabCts .download span a {display:block; color:#fff; background:#d18f04; border-radius:14px;}
        .tabCts .download span a:hover {background:#e50001}

        

        .Cts02 a {display:inline-block; padding:5px 10px; color:#f1e0e7; background:#e14f4a; font-size:90%; margin-left:20px}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
                     font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}
        
        .boardD {width:1120px; border-spacing:0px; border:1px solid #ccc; table-layout:auto; color:#666; margin:0 auto}
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD td:nth-child(1),
        .boardD td:nth-child(4),
        .boardD td:nth-last-child(9),
        .boardD td:nth-last-child(6),
        .boardD td:nth-last-child(2) {font-weight:bold;}
        .boardD td:nth-last-child(5),
        .boardD td:last-child {color:red;font-weight:bold;}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #ccc; border-bottom:1px solid #ccc; color:#000; font-weight:bold}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #ccc; border-bottom:1px solid #ccc; color:#000;}
        .boardD tbody th {background:#add7fb}
        .boardD .bg01 {background:#bdd7ee}
        .boardD .bg02 {background:#ddebf7}
        .boardD .bg03 {background:#f8cbad}
        .boardD .bg04 {background:#fce4d6}       


        .Cts03 {text-align:left}
        
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

    <div class="evtContent NSK" id="evtContainer">
{{--
        <div class="sky" id="QuickMenu">
            <a href="#none;">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_sky.png" alt="커밍쑨" />
            </a>
        </div>   --}}      

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_top.jpg" title="소방직 풀케어 서비스" />

            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2614/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>수험생이면 누구나</span>
                            <div class="NSK-Black">적중모의고사 무료</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/2614/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 합격선</span>
                            <div class="NSK-Black">지난 시험 완벽 분석</div>				
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() < strtotime('2022040931140')) javascript:alert('4.03(토)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>후기 나누고 간식 먹자!</span>
                            <div class="NSK-Black">시험 후기&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        <a id='tab4' href="@if(time() < strtotime('202204111600')) javascript:alert('4.05(월)오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2021 소방직</span>
                            <div class="NSK-Black">기출해설특강</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div id="content_1" class="tabCts">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_01_01.jpg" title="문제해설" />
                    <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" style="position: absolute; left: 27.41%; top: 79.2%; width: 45.71%; height: 8.21%; z-index: 2;"></a>
                </div>
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_01_02.jpg" title="유의사항" />        
            </div>

            <!--완벽분석-->
            <div id="content_2" class="tabCts Cts02">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_02_01.jpg" title="" id="content_2_01" />       
                <div class="mt20">
                    <p class="download">
                    2022 소방직 시험문제&가답안 다운로드 <a href="https://119gosi.kr:444/bbs/board.php?bo_table=040301" target="_blank">바로가기 ></a>
                    </p>
                    <div class="mt50" id="tabs1">
                        <table cellspacing="0" cellpadding="0" class="boardD">
                            <col span="15" />
                            <thead>
                                <tr>
                                    <th rowspan="3">지역</th>
                                    <th colspan="6">2021년도</th>
                                    <th colspan="8">2020년도</th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="bg01">남</th>
                                    <th colspan="3" class="bg03">여</th>
                                    <th colspan="4" class="bg01">남</th>
                                    <th colspan="4" class="bg03">여</th>
                                </tr>
                                <tr>
                                    <th class="bg02">선발예정</th>
                                    <th class="bg02">접수인원</th>
                                    <th class="bg02">경쟁률</th>
                                    <th class="bg04">선발예정</th>
                                    <th class="bg04">접수인원</th>
                                    <th class="bg04">경쟁률</th>
                                    <th class="bg02">선발예정</th>
                                    <th class="bg02">접수인원</th>
                                    <th class="bg02">경쟁률</th>
                                    <th class="bg02">합격선</th>
                                    <th class="bg04">선발예정</th>
                                    <th class="bg04">접수인원</th>
                                    <th class="bg04">경쟁률</th>
                                    <th class="bg04">합격선</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>서울</td>
                                    <td>315</td>
                                    <td>3247</td>
                                    <td>10.3:1</td>
                                    <td>31</td>
                                    <td>659</td>
                                    <td>21.3:1</td>
                                    <td>261</td>
                                    <td>1,918</td>
                                    <td>7.3:1</td>
                                    <td>341.4</td>
                                    <td>32</td>
                                    <td>819</td>
                                    <td>25.6:1</td>
                                    <td>398.51</td>
                                </tr>
                                <tr>
                                    <td>부산</td>
                                    <td>67</td>
                                    <td>1239</td>
                                    <td>18.5:1</td>
                                    <td>8</td>
                                    <td>170</td>
                                    <td>21.3:1</td>
                                    <td>100</td>
                                    <td>1,418</td>
                                    <td>14.2:1</td>
                                    <td>362.2</td>
                                    <td>5</td>
                                    <td>309</td>
                                    <td>61.8:1</td>
                                    <td>414.19</td>
                                </tr>
                                <tr>
                                    <td>대구</td>
                                    <td>137</td>
                                    <td>1524</td>
                                    <td>11.1:1</td>
                                    <td>15</td>
                                    <td>131</td>
                                    <td>20.9:1</td>
                                    <td>62</td>
                                    <td>1,171</td>
                                    <td>18.9:1</td>
                                    <td>371.77</td>
                                    <td>13</td>
                                    <td>460</td>
                                    <td>35.4:1</td>
                                    <td>405.47</td>
                                </tr>
                                <tr>
                                    <td>인천</td>
                                    <td>86</td>
                                    <td>949</td>
                                    <td>11.0:1</td>
                                    <td>8</td>
                                    <td>138</td>
                                    <td>17.3:1</td>
                                    <td>90</td>
                                    <td>1,464</td>
                                    <td>16.3:1</td>
                                    <td>372.98</td>
                                    <td>8</td>
                                    <td>246</td>
                                    <td>30.8:1</td>
                                    <td>406.64</td>
                                </tr>
                                <tr>
                                    <td>광주</td>
                                    <td>41</td>
                                    <td>657</td>
                                    <td>16.0:1</td>
                                    <td>3</td>
                                    <td>78</td>
                                    <td>26.0:1</td>
                                    <td>45</td>
                                    <td>927</td>
                                    <td>20.6:1</td>
                                    <td>376.75</td>
                                    <td>3</td>
                                    <td>170</td>
                                    <td>56.7:1</td>
                                    <td>398.47</td>
                                </tr>
                                <tr>
                                    <td>대전</td>
                                    <td>25</td>
                                    <td>365</td>
                                    <td>14.6:1</td>
                                    <td>2</td>
                                    <td>76</td>
                                    <td>38.0:1</td>
                                    <td>23</td>
                                    <td>517</td>
                                    <td>22.5:1</td>
                                    <td>379.84</td>
                                    <td>2</td>
                                    <td>130</td>
                                    <td>65.0:1</td>
                                    <td>402.03</td>
                                </tr>
                                <tr>
                                    <td>울산</td>
                                    <td>28</td>
                                    <td>371</td>
                                    <td>13.3:1</td>
                                    <td>2</td>
                                    <td>30</td>
                                    <td>15.0:1</td>
                                    <td>20</td>
                                    <td>473</td>
                                    <td>23.7:1</td>
                                    <td>370.17</td>
                                    <td>2</td>
                                    <td>92</td>
                                    <td>46.0:1</td>
                                    <td>412.37</td>
                                </tr>
                                <tr>
                                    <td>세종</td>
                                    <td>18</td>
                                    <td>177</td>
                                    <td>9.8:1</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>10</td>
                                    <td>189</td>
                                    <td>18.9:1</td>
                                    <td>366.83</td>
                                    <td>1</td>
                                    <td>57</td>
                                    <td>57.0:1</td>
                                    <td>396.44</td>
                                </tr>
                                <tr>
                                    <td>경기</td>
                                    <td>248</td>
                                    <td>3282</td>
                                    <td>13.2:1</td>
                                    <td>6</td>
                                    <td>198</td>
                                    <td>33.0:1</td>
                                    <td>463</td>
                                    <td>4,745</td>
                                    <td>10.2:1</td>
                                    <td>369.6</td>
                                    <td>10</td>
                                    <td>403</td>
                                    <td>40.3:</td>
                                    <td>386.56</td>
                                </tr>
                                <tr>
                                    <td>강원</td>
                                    <td>70</td>
                                    <td>1088</td>
                                    <td>15.5:1</td>
                                    <td>5</td>
                                    <td>129</td>
                                    <td>25.8:1</td>
                                    <td>205</td>
                                    <td>2,533</td>
                                    <td>12.4:1</td>
                                    <td>368.95</td>
                                    <td>15</td>
                                    <td>371</td>
                                    <td>24.7:1</td>
                                    <td>400.98</td>
                                </tr>
                                <tr>
                                    <td>충북</td>
                                    <td>92</td>
                                    <td>1012</td>
                                    <td>11.0:1</td>
                                    <td>5</td>
                                    <td>113</td>
                                    <td>22.6:1</td>
                                    <td>216</td>
                                    <td>2088</td>
                                    <td>9.7:1</td>
                                    <td>366.88</td>
                                    <td>12</td>
                                    <td>267</td>
                                    <td>22.3:1</td>
                                    <td>395.32</td>
                                </tr>
                                <tr>
                                    <td>충남</td>
                                    <td>145</td>
                                    <td>1630</td>
                                    <td>11.2:1</td>
                                    <td>9</td>
                                    <td>250</td>
                                    <td>27.8:1</td>
                                    <td>155</td>
                                    <td>1,351</td>
                                    <td>8.7:1</td>
                                    <td>356.02</td>
                                    <td>9</td>
                                    <td>181</td>
                                    <td>20.1:1</td>
                                    <td>374.37</td>
                                </tr>
                                <tr>
                                    <td>전북</td>
                                    <td>85</td>
                                    <td>1220</td>
                                    <td>14.4:1</td>
                                    <td>5</td>
                                    <td>112</td>
                                    <td>22.4:1</td>
                                    <td>119</td>
                                    <td>1,556</td>
                                    <td>13.1:1</td>
                                    <td>368.58</td>
                                    <td>6</td>
                                    <td>283</td>
                                    <td>47.2:1</td>
                                    <td>412.31</td>
                                </tr>
                                <tr>
                                    <td>전남</td>
                                    <td>60</td>
                                    <td>1195</td>
                                    <td>19.9:1</td>
                                    <td>5</td>
                                    <td>115</td>
                                    <td>23.0:1</td>
                                    <td>253</td>
                                    <td>2,713</td>
                                    <td>10.7:1</td>
                                    <td>365.02</td>
                                    <td>10</td>
                                    <td>231</td>
                                    <td>23.1:1</td>
                                    <td>386.92</td>
                                </tr>
                                <tr>
                                    <td>경북</td>
                                    <td>116</td>
                                    <td>1237</td>
                                    <td>10.7:1</td>
                                    <td>5</td>
                                    <td>100</td>
                                    <td>20.0:1</td>
                                    <td>224</td>
                                    <td>2,891</td>
                                    <td>12.9:1</td>
                                    <td>375.8</td>
                                    <td>10</td>
                                    <td>305</td>
                                    <td>30.5:1</td>
                                    <td>404.98</td>
                                </tr>
                                <tr>
                                    <td>경남</td>
                                    <td>219</td>
                                    <td>2517</td>
                                    <td>11.5:1</td>
                                    <td>12</td>
                                    <td>259</td>
                                    <td>21.6:1</td>
                                    <td>233</td>
                                    <td>2,268</td>
                                    <td>9.7:1</td>
                                    <td>370.73</td>
                                    <td>10</td>
                                    <td>321</td>
                                    <td>32.1:1</td>
                                    <td>406.88</td>
                                </tr>
                                <tr>
                                    <td>제주</td>
                                    <td>31</td>
                                    <td>530</td>
                                    <td>17.1:1</td>
                                    <td>4</td>
                                    <td>68</td>
                                    <td>17.0:1</td>
                                    <td>56</td>
                                    <td>753</td>
                                    <td>13.4:1</td>
                                    <td>365.75</td>
                                    <td>6</td>
                                    <td>156</td>
                                    <td>26.0:1</td>
                                    <td>411.45</td>
                                </tr>
                                <tr>
                                    <td>창원</td>
                                    <td>37</td>
                                    <td>373</td>
                                    <td>10.1:1</td>
                                    <td>2</td>
                                    <td>46</td>
                                    <td>23.0:1</td>
                                    <td>66</td>
                                    <td>958</td>
                                    <td>14.5:1</td>
                                    <td>369.02</td>
                                    <td>4</td>
                                    <td>127</td>
                                    <td>31.8:1</td>
                                    <td>394.27</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>               
                </div>
            </div>

            <!--시험총평 및 시험후기-->
            <div id="content_3" class="tabCts Cts03">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_03_01.jpg" title="시험 체감난이도&이벤트" />
                @include('willbes.pc.eventsurvey.show_graph_partial',array('is_series' => 'Y'))

                <div class="tx-center">
                    <a href="javascript:pullOpen();">
                        <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_btn03.png" title="설문하기" />
                    </a>
                </div>

                <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2022/03/2614_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
                {{--시험평가댓글--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
                @endif
            </div>

                    <!--기출해설강의-->
            <div id="content_4" class="tabCts Cts04">
                <div><img src="https://static.willbes.net/public/images/promotion/2022/03/2614_04_01.jpg" title="기출해설" /></div>
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
                                                    <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_btn04_01.png" title="해설강의">
                                                </a>
                                                @endif

                                                @if(empty($row['wUnitAttachFile']) === false)
                                                    <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                        <img src="https://static.willbes.net/public/images/promotion/2022/03/2614_btn04_02.png" title="해설자료">
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
    </script>
@stop