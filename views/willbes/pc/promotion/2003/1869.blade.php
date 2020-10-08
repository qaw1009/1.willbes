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

        .sky {position:fixed; top:250px; right:10px; z-index:1;}

        .evtTop {
            background:#E7D8C1 url(https://static.willbes.net/public/images/promotion/2020/10/1869_top_bg.jpg) no-repeat center top;
        }
        .evtTop > span { position:absolute; left:50%; z-index:10}

        .evtMenu { position:absolute; left:50%; margin-left:-560px; bottom:0; z-index:10}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#eeeded; font-size:24px; 
            background:#bd86a1;border-bottom:0; margin-right:4px
        }  
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:16px}
        .evtMenu li a div {margin-top:8px;color:#eeeded}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#363636; border:1px solid #fff;font-weight:bold;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#363636;font-weight:bold;}
        .evtMenu li:hover a div,
        .evtMenu li a.active div {color:#98435b}
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

        #content_1 {padding-bottom:100px;}
        .download {font-weight:bold;font-size:17px;padding-bottom:35px;}

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; font-size:90%; margin-left:20px}
        .Cts02 a:hover {background:#959595;color:#fff;}

        .tabMenu{width:360px;margin:0 auto 100px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:3px solid #959595;font-size:140%;
                     font-weight:500;margin-right:2px;padding:20px 0;color:#959595;background:#fff;border-radius:25px;}
        .tabMenu li a.active{color:#fff;background:#959595;}
        
        .boardD {width:980px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th,
        .boardD td {font-size:14px}
        .boardD th {padding:15px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:15px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
        .boardD td:nth-child(4) {color:#000}
        .boardD td:last-child {color:#C00}
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
            width:200px !important; border:1px solid #ccc;
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

        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1869_top.jpg" title="국가직 7급 풀캐어 서비스" />
            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1869/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=1#content_1') }}">
                            <span>합격을 위한</span>
                            <div class="NSK-Black">최종 마무리 전략</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1869/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 체감난이도</span>
                            <div class="NSK-Black">지난 시험 완벽 분석</div>				
                        </a>
                    </li>
                    <li>
                        <a id='tab3' href="@if(time() > strtotime('202010171140')) javascript:alert('10.17(토) 오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>시험 후 당충전 필수!</span>
                            <div class="NSK-Black">시험총평&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        <a id='tab4' href="@if(time() > strtotime('202010191600')) javascript:alert('10.19(월) 오픈!') @else {{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/' . $arr_base['promotion_code'] . '/SsIdx/' . (empty($arr_promotion_params['SsIdx']) === false ? $arr_promotion_params['SsIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2020 서울·지방직 7급</span>
                            <div class="NSK-Black">기출해설강의</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>        

        <div id="content_1" class="tabCts">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts01_01.jpg" usemap="#Map1804a" border="0">
            <table cellspacing="0" cellpadding="0" class="boardD">
                <col width="66" />
                <col width="138" />
                <col width="171" />
                <col width="155" />
                <col width="138" />
                <tr>
                    <td width="66">지역&nbsp;</td>
                    <td width="138">필기 합격자 발표&nbsp;</td>
                    <td width="171">면접 시험장소    공고일&nbsp;</td>
                    <td width="155">면접 시험일&nbsp;</td>
                    <td width="138">최종 합격자 발표&nbsp;</td>
                </tr>
                <tr>
                    <td>서울</td>
                    <td>11.17.(화)</td>
                    <td width="171">11.17.(화)<br />
                    인성검사 : 11.28.(토)</td>
                    <td>12.9.(수)~12.18.(금)</td>
                    <td>12.30.(수)</td>
                </tr>
                <tr>
                    <td>강원</td>
                    <td>11.6.(금)</td>
                    <td>11.6.(금)</td>
                    <td>11.19.(목)</td>
                    <td>12.3.(목)</td>
                </tr>
                <tr>
                    <td>경기&nbsp;</td>
                    <td>11.23.(월)</td>
                    <td>11.23.(월)</td>
                    <td>12.5.(토)</td>
                    <td>12.14.(월)</td>
                </tr>
                <tr>
                    <td>경남&nbsp;</td>
                    <td>11.12.(목)</td>
                    <td>11.12(목)</td>
                    <td>11.23.(월)~11.25.(수)</td>
                    <td>11.30.(월)</td>
                </tr>
                <tr>
                    <td>경북&nbsp;</td>
                    <td>11.4.(수)</td>
                    <td>11.4.(수)</td>
                    <td>11.18.(수)</td>
                    <td>11.26.(목)</td>
                </tr>
                <tr>
                    <td>광주&nbsp;</td>
                    <td>11.6.(금)</td>
                    <td>11.6.(금)</td>
                    <td>11.25.(수)~11.26.(목)</td>
                    <td>12.11.(금)</td>
                </tr>
                <tr>
                    <td>대구&nbsp;</td>
                    <td>11.5.(목)</td>
                    <td>11.5.(목)</td>
                    <td>11.24.(화)~11.25.(수)</td>
                    <td>12.4.(금)</td>
                </tr>
                <tr>
                    <td>대전&nbsp;</td>
                    <td>11.2.(월)</td>
                    <td>11.2.(월)</td>
                    <td>11.16.(월)~11.17.(화)</td>
                    <td>12.8.(화)</td>
                </tr>
                <tr>
                    <td>부산&nbsp;</td>
                    <td>11.11.(수)</td>
                    <td>11.11.(수)</td>
                    <td>11.24.(화)~11.26.(목)</td>
                    <td>12.11.(금)</td>
                </tr>
                <tr>
                    <td>세종&nbsp;</td>
                    <td>11.18.(수)</td>
                    <td>11.18.(수)</td>
                    <td>11.30.(월)</td>
                    <td>12.7.(월)</td>
                </tr>
                <tr>
                    <td>울산&nbsp;</td>
                    <td>11.13.(금)</td>
                    <td>11.13.(금)</td>
                    <td>11.26.(목)</td>
                    <td>12.7.(월)</td>
                </tr>
                <tr>
                    <td>인천&nbsp;</td>
                    <td>11.4.(수)</td>
                    <td>11.4.(수)</td>
                    <td>11.23.(월)~11.27.(금)</td>
                    <td>12.8.(화)</td>
                </tr>
                <tr>
                    <td>전남&nbsp;</td>
                    <td>11.3.(화)</td>
                    <td>11.3.(화)</td>
                    <td>11.17.(화)</td>
                    <td>11.24.(화)</td>
                </tr>
                <tr>
                    <td>전북&nbsp;</td>
                    <td>11.9.(월)</td>
                    <td>11.9.(월)</td>
                    <td>11.18.(수)~11.20.(금)</td>
                    <td>11.24.(화)</td>
                </tr>
                <tr>
                    <td>충남&nbsp;</td>
                    <td>11.11.(수)</td>
                    <td>11.11.(수)</td>
                    <td>11.25.(수)~11.27.(금)</td>
                    <td>12.10.(목)</td>
                </tr>
                <tr>
                    <td>충북&nbsp;</td>
                    <td>11.13.(금)</td>
                    <td>11.13.(금)</td>
                    <td>11.30.(월)~12.4.(금)</td>
                    <td>12.11.(금)</td>
                </tr>
                </table>
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts02_01.jpg" title="" id="content_2_01" />       
            <div class="mt20 mb100">
                <p class="download">
                * 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기 ></a>
                </p>
                <table cellspacing="0" cellpadding="0" class="boardD">
                    <col width="72" />
                    <col width="125" span="8" />
                    <tr>
                        <td rowspan="3" width="72">모집단위</td>
                        <td colspan="6" width="750">2020년</td>
                        <td colspan="2" width="250">2019년</td>
                    </tr>
                    <tr>
                        <td colspan="2">선발예정인원</td>
                        <td colspan="2">접수인원</td>
                        <td colspan="2">경쟁률</td>
                        <td>경쟁률</td>
                        <td>합격선</td>
                    </tr>
                    <tr>
                        <td>전체</td>
                        <td>일반행정 7급</td>
                        <td>전체</td>
                        <td>일반행정 7급</td>
                        <td>전체</td>
                        <td>일반행정 7급</td>
                        <td>일반행정 7급</td>
                        <td>일반행정 7급</td>
                    </tr>
                    <tr>
                        <td>서울</td>
                        <td>284</td>
                        <td>142</td>
                        <td>17,668</td>
                        <td>12,272</td>
                        <td>62.22:1</td>
                        <td>86.43:1</td>
                        <td>102.82:1</td>
                        <td>85.5</td>
                    </tr>
                    <tr>
                        <td>강원</td>
                        <td>106</td>
                        <td>5</td>
                        <td>1,570</td>
                        <td>584</td>
                        <td>14.82:1</td>
                        <td>116.8:1</td>
                        <td>242.50:1</td>
                        <td>80.1</td>
                    </tr>
                    <tr>
                        <td>경기</td>
                        <td>131</td>
                        <td>75</td>
                        <td>7,443</td>
                        <td>5,724</td>
                        <td>56.82:1</td>
                        <td>76.32:1</td>
                        <td>84.30:1</td>
                        <td>85.5</td>
                    </tr>
                    <tr>
                        <td>경남</td>
                        <td>121</td>
                        <td>14</td>
                        <td>3,859</td>
                        <td>1387</td>
                        <td>31.9:1</td>
                        <td>99.08:1</td>
                        <td>79.32:1</td>
                        <td>90.71</td>
                    </tr>
                    <tr>
                        <td>경북</td>
                        <td>15</td>
                        <td>15</td>
                        <td>1,220</td>
                        <td>1,220</td>
                        <td>81.34:1</td>
                        <td>81.34:1</td>
                        <td>59.86:1</td>
                        <td>86.71</td>
                    </tr>
                    <tr>
                        <td>광주</td>
                        <td>42</td>
                        <td>15</td>
                        <td>1,493</td>
                        <td>1,164</td>
                        <td>35.55:1</td>
                        <td>77.6:1</td>
                        <td>53.95:1</td>
                        <td>83.57</td>
                    </tr>
                    <tr>
                        <td>대구</td>
                        <td>29</td>
                        <td>12</td>
                        <td>1,938</td>
                        <td>1,551</td>
                        <td>66.83:1</td>
                        <td>129.25:1</td>
                        <td>138.83:1</td>
                        <td>87.85</td>
                    </tr>
                    <tr>
                        <td>대전</td>
                        <td>55</td>
                        <td>22</td>
                        <td>1,419</td>
                        <td>1,042</td>
                        <td>25.8:1</td>
                        <td>47.37:1</td>
                        <td>125.14:1</td>
                        <td>86.21</td>
                    </tr>
                    <tr>
                        <td>부산</td>
                        <td>50</td>
                        <td>15</td>
                        <td>3,500</td>
                        <td>2,189</td>
                        <td>70:1</td>
                        <td>145.94:1</td>
                        <td>140.47:1</td>
                        <td>86.43</td>
                    </tr>
                    <tr>
                        <td>세종</td>
                        <td>11</td>
                        <td>2</td>
                        <td>517</td>
                        <td>239</td>
                        <td>47:1</td>
                        <td>119.5:1</td>
                        <td>91.67:1</td>
                        <td>83.85</td>
                    </tr>
                    <tr>
                        <td>울산</td>
                        <td>16</td>
                        <td>4</td>
                        <td>804</td>
                        <td>559</td>
                        <td>50.25:1</td>
                        <td>139.75:1</td>
                        <td>171.33:1</td>
                        <td>83.86</td>
                    </tr>
                    <tr>
                        <td>인천</td>
                        <td>93</td>
                        <td>12</td>
                        <td>2,494</td>
                        <td>1,324</td>
                        <td>26.82:1</td>
                        <td>110.34:1</td>
                        <td>62.12:1</td>
                        <td>(총점) 590</td>
                    </tr>
                    <tr>
                        <td>전남</td>
                        <td>111</td>
                        <td>33</td>
                        <td>2,082</td>
                        <td>1,274</td>
                        <td>18.76:1</td>
                        <td>38.61:1</td>
                        <td>37.75:1</td>
                        <td>80.71</td>
                    </tr>
                    <tr>
                        <td>전북</td>
                        <td>81</td>
                        <td>3</td>
                        <td>1,667</td>
                        <td>801</td>
                        <td>20.59:1</td>
                        <td>267:1</td>
                        <td>157.00:1</td>
                        <td>84.07</td>
                    </tr>
                    <tr>
                        <td>제주</td>
                        <td>7</td>
                        <td>-</td>
                        <td>286</td>
                        <td>-</td>
                        <td>40.86:1</td>
                        <td>-</td>
                        <td>89.00:1</td>
                        <td>85.71</td>
                    </tr>
                    <tr>
                        <td>충남</td>
                        <td>112</td>
                        <td>8</td>
                        <td>1,963</td>
                        <td>1,105</td>
                        <td>17.53:1</td>
                        <td>138.13:1</td>
                        <td>77.67:1</td>
                        <td>86.21</td>
                    </tr>
                    <tr>
                        <td>충북</td>
                        <td>40</td>
                        <td>10</td>
                        <td>1,585</td>
                        <td>759</td>
                        <td>39.63:1</td>
                        <td>75.9:1</td>
                        <td>62.92:1</td>
                        <td>83.57</td>
                    </tr>
                    </table>
     
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts03_01.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.eventsurvey.show_graph_partial')

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts03_btn.png" title="설문하기" />
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

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts03_03.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2020/10/1869_cts04_01.jpg" title="기출해설강의" /></div>
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
                                                <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_btn03.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}">
                                                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_btn04.png" title="해설자료">
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
            @if(date('YmdHi') < '202010120000' && ENVIRONMENT == 'production')
                alert('10.12(월) 오픈!');
                location.href = '{{ front_url('/') }}';
            @endif

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