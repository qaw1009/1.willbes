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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /*****************************************************************/  

        .evtTop {
            background:url(https://static.willbes.net/public/images/promotion/2019/10/1417_top_bg.jpg) no-repeat center top
        }
        
        .evtMenu {width:100%; background:#5d5d5d;}
        .evtMenu ul {width:1120px; margin:0 auto; border-left:1px solid #90887b}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#a9a9a9; font-size:150%; font-weight:900;border-right:1px solid #90887b;
        }  
        .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#fce6d8; color:#5d5d5d; font-weight:normal; font-size:70%}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fce6d8; color:#4b4848}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {background:#fff; color:#000}
        .evtMenu ul:after {content:""; display:block; clear:both}

        .tabCts {
            position:relative; width:1120px; margin:0 auto; text-align:center; 
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

        .Cts02 a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; font-size:90%; margin-left:20px}

        .Cts02 .download{padding:40px 0 20px;}       
        .tabMenu{width:900px;margin:0 auto 80px;}
        .tabMenu li{display:inline;float:left;width:50%;}
        .tabMenu li a{display:block;text-align:center;border:1px solid #000;border-bottom:0;font-size:140%;
                     font-weight:500;margin-right:2px;padding:20px 0;color: #fff;background:#000;}
        .tabMenu li a.active{color:#000;background:#fff;}
        

        .boardD {width:900px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th {padding:10px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD thead th.bg2 {background:#e5c8af; color:#000}
        .boardD thead th.bg3 {background:#fdeada; color:#000}
        .boardD td {padding:10px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
        .boardD td:last-child {color:#C00}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#eee}
        .boardD tbody tr:hover {background:#f5f5f5}

        .Cts03 {margin-bottom:100px; text-align:left}
        
        .Cts03 h3 {font-size:16px;}
        .Cts03 h3 span {color:#fa7738}
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

    <div class="evtContent NG" id="evtContainer">
        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_top.jpg" title="2019 7급 풀캐어 서비스" />
        </div>

        <div class="evtCtnsBox evtMenu NG" id="evtMenu">                
            <ul>
                <li>
                    <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1417/?tab=1#content_1') }}">
                        <span>합격을 위한</span>
                        <div>최종 마무리 전략</div>
                    </a>
                </li>
                <li>
                    <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1417/?tab=2#content_2') }}">
                        <span>전년도 지방직/서울시 7급</span>
                        <div>완벽 분석</div>				
                    </a>
                </li>
                <li>
                    <a id='tab3' href="@if(time() >= strtotime('201908171140')){{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1417/?tab=3#content_3') }} @else {{ 'javascript:alert(\'준비중입니다\');' }} @endif">
                        <span>2019 지방직/서울시 7급</span>
                        <div>후기 및 적중 이벤트</div>
                    </a>
                </li>     
                <li>
                    <a id='tab4' href="@if(time() >= strtotime('201908191500')){{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1417/?tab=4#content_4') }} @else {{ 'javascript:alert(\'준비중입니다\');' }} @endif">
                        <span>2019 지방직/서울시 7급</span>
                        <div>기출해설 자료</div>
                    </a>
                </li>
            </ul>
        </div>

        <!--최종 마무리 전략-->
        <div id="content_1" class="tabCts pb90">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts01_01.jpg" title="유의사항" />
            <div>
                <table class="boardD">
                    <col span="5" />
                    <tr>
                        <th>지역</th>
                        <th>필기 합격자 발표</th>
                        <th>면접 시험장소 공고일 </th>
                        <th>면접 시험일</th>
                        <th>최종 합격자 발표</th>
                    </tr>
                    <tr>
                        <td>서울 </td>
                        <td>11.19.(화) </td>
                        <td>11.19.(화) </td>
                        <td>12.12.(목)~12.20.(금) </td>
                        <td>12.30(월) </td>
                    </tr>
                    <tr>
                        <td>강원 </td>
                        <td>11.12.(화) </td>
                        <td>11.12.(화) </td>
                        <td>11.26.(화) </td>
                        <td>12.11.(수) </td>
                    </tr>
                    <tr>
                        <td>경기&nbsp; </td>
                        <td>11.18.(월) </td>
                        <td>11.18.(월) </td>
                        <td>11.30.(토) </td>
                        <td>12.9.(월) </td>
                    </tr>
                    <tr>
                        <td>경남&nbsp; </td>
                        <td>11.7.(목) </td>
                        <td>11.7.(목) </td>
                        <td>11.20.(수)~11.22.(금) </td>
                        <td>12.5.(목) </td>
                    </tr>
                    <tr>
                        <td>경북&nbsp; </td>
                        <td>11.1.(금) </td>
                        <td>11.1.(금) </td>
                        <td>11.13.(수) </td>
                        <td>11.22.(금) </td>
                    </tr>
                    <tr>
                        <td>광주&nbsp; </td>
                        <td>11.8.(금) </td>
                        <td>11.8.(금) </td>
                        <td>11.26.(화) </td>
                        <td>12.6.(화) </td>
                    </tr>
                    <tr>
                        <td>대구&nbsp; </td>
                        <td>11.8.(금) </td>
                        <td>11.8.(금) </td>
                        <td>11.26.(화) </td>
                        <td>12.5.(목) </td>
                    </tr>
                    <tr>
                        <td>대전&nbsp; </td>
                        <td>11.4.(월) </td>
                        <td>11.4.(월) </td>
                        <td>11.18.(월)~11.19.(화) </td>
                        <td>12.10.(화) </td>
                    </tr>
                    <tr>
                        <td>부산&nbsp; </td>
                        <td>11.6.(수) </td>
                        <td>11.6.(수) </td>
                        <td>11.26.(화)~11.28.(목) </td>
                        <td>12.13.(금) </td>
                    </tr>
                    <tr>
                        <td>세종&nbsp; </td>
                        <td>11.12.(화) </td>
                        <td>11.12.(화) </td>
                        <td>11.21.(목) </td>
                        <td>11.28.(목) </td>
                    </tr>
                    <tr>
                        <td>울산&nbsp; </td>
                        <td>11.8.(금) </td>
                        <td>11.8.(금) </td>
                        <td>11.21.(목) </td>
                        <td>12.6.(금) </td>
                    </tr>
                    <tr>
                        <td>인천&nbsp; </td>
                        <td>11.1.(금) </td>
                        <td>11.1.(금) </td>
                        <td>11.18.(월)~11.22.(금) </td>
                        <td>12.6.(금) </td>
                    </tr>
                    <tr>
                        <td>전남&nbsp; </td>
                        <td>11.5.(화) </td>
                        <td>11.5.(화) </td>
                        <td>11.19.(화) </td>
                        <td>11.26.(화) </td>
                    </tr>
                    <tr>
                        <td>전북&nbsp; </td>
                        <td>11.8.(금) </td>
                        <td>11.8.(금) </td>
                        <td>11.20.(수)~11.22.(금) </td>
                        <td>11.25.(월) </td>
                    </tr>
                    <tr>
                        <td>충남&nbsp; </td>
                        <td>11.8.(금) </td>
                        <td>11.8.(금) </td>
                        <td>11.26.(화)~11.27.(수) </td>
                        <td>12.12.(목) </td>
                    </tr>
                    <tr>
                        <td>충북&nbsp; </td>
                        <td>11.15.(금) </td>
                        <td>11.15.(금) </td>
                        <td>12.3.(화)~12.6.(금) </td>
                        <td>12.20.(금) </td>
                    </tr>
                </table>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts01_02.jpg" title="응시자 준수사항 및 필기장소 안내" />
            
            <div class="youtube">
                <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts01_btn.png" title="필기시험 장소 안내 바로가기" /></a> </div>  
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts02_01.jpg" title="전년도 7급 체감난이도" />           

            <div class="mt20 mb100">
                <p class="download">
                * 시험문제/가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기</a>
                </p>

                <div class="mt20">
                    <table class="boardD">
                        <col span="9" />
                        <thead>
                            <tr>
                                <th rowspan="3">모집단위</th>
                                <th colspan="6" class="bg2">2019년</th>
                                <th colspan="2">2018년</th>
                            </tr>
                            <tr>
                                <th colspan="2" class="bg3">선발예정인원</th>
                                <th colspan="2" class="bg3">접수인원</th>
                                <th colspan="2" class="bg3">경쟁률</th>
                                <th>경쟁률</th>
                                <th>합격선</th>
                            </tr>
                            <tr>
                                <th class="bg3">전체</th>
                                <th class="bg3">일반행정 7급</th>
                                <th class="bg3">전체</th>
                                <th class="bg3">일반행정 7급</th>
                                <th class="bg3">전체(평균)</th>
                                <th class="bg3">일반행정 7급</th>
                                <th>일반행정 7급</th>
                                <th>일반행정 7급</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_01_20191002095744.pdf" target="_blank">서울</a></th>
                                <td>231</td>
                                <td>125</td>
                                <td>17,472</td>
                                <td>12,852</td>
                                <td>73.15:1</td>
                                <td>102.82:1</td>
                                <td>　75.0:1</td>
                                <td>85</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_05_20191002100623.pdf" target="_blank">강원</a></th>
                                <td>160</td>
                                <td>2</td>
                                <td>1,228</td>
                                <td>485</td>
                                <td>29.92:1</td>
                                <td>242.50:1</td>
                                <td>562.0:1</td>
                                <td>84.79</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_03_20191002095744.pdf" target="_blank">경기</a></th>
                                <td>124</td>
                                <td>77</td>
                                <td>7,884</td>
                                <td>6,491</td>
                                <td>43.92:1</td>
                                <td>84.30:1</td>
                                <td>152.3:1</td>
                                <td>85.28</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_04_20191002095744.pdf" target="_blank">경남</a></th>
                                <td>160</td>
                                <td>19</td>
                                <td>4,257</td>
                                <td>1507</td>
                                <td>21.83:1</td>
                                <td>79.32:1</td>
                                <td>126.8:1</td>
                                <td>85.28</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_05_20191002095744.pdf" target="_blank">경북</a></th>
                                <td>21</td>
                                <td>21</td>
                                <td>1,257</td>
                                <td>1,257</td>
                                <td>59.86:1</td>
                                <td>59.86:1</td>
                                <td>72.1:1</td>
                                <td>87.14</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_07_20191002100623.pdf" target="_blank">광주</a></th>
                                <td>52</td>
                                <td>20</td>
                                <td>1,610</td>
                                <td>1,079</td>
                                <td>18.36:1</td>
                                <td>53.95:1</td>
                                <td>111.7:1</td>
                                <td>84.28</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239895_05_20191002100623.pdf" target="_blank">대구</a></th>
                                <td>19</td>
                                <td>12</td>
                                <td>1,781</td>
                                <td>1,666</td>
                                <td>31.55:1</td>
                                <td>138.83:1</td>
                                <td>160.2:1</td>
                                <td>84.57</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_04_20191002100711.pdf" target="_blank">대전</a></th>
                                <td>24</td>
                                <td>7</td>
                                <td>1,106</td>
                                <td>876</td>
                                <td>25.32:1</td>
                                <td>125.14:1</td>
                                <td>224.2:1</td>
                                <td>85.29</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_02_20191002095831.pdf" target="_blank">부산</a></th>
                                <td>61</td>
                                <td>15</td>
                                <td>3,410</td>
                                <td>2,107</td>
                                <td>30.13:1</td>
                                <td>140.47:1</td>
                                <td>167.9:1</td>
                                <td>84.57</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_06_20191002100711.pdf" target="_blank">세종</a></th>
                                <td>14</td>
                                <td>3</td>
                                <td>424</td>
                                <td>275</td>
                                <td>32.61:1</td>
                                <td>91.67:1</td>
                                <td>58.7:1</td>
                                <td>74.21</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_07_20191002100711.pdf" target="_blank">울산</a></th>
                                <td>15</td>
                                <td>3</td>
                                <td>838</td>
                                <td>514</td>
                                <td>31.63:1</td>
                                <td>171.33:1</td>
                                <td>71.0:1</td>
                                <td>82.64</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_07_20191002100729.pdf" target="_blank">인천</a></th>
                                <td>99</td>
                                <td>17</td>
                                <td>1,751</td>
                                <td>1,056</td>
                                <td>12.92:1</td>
                                <td>62.12:1</td>
                                <td>133.3:1</td>
                                <td>585 (총점)</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239896_06_20191002095831.pdf" target="_blank">전남</a></th>
                                <td>120</td>
                                <td>32</td>
                                <td>2,108</td>
                                <td>1,208</td>
                                <td>10.08:1</td>
                                <td>37.75:1</td>
                                <td>15.0:1</td>
                                <td>81</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239898_01_20191002100022.pdf" target="_blank">전북</a></th>
                                <td>76</td>
                                <td>5</td>
                                <td>1,915</td>
                                <td>785</td>
                                <td>25.62:1</td>
                                <td>157.00:1</td>
                                <td>419.0:1</td>
                                <td>82.86</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239898_02_20191002102338.pdf" target="_blank">제주</a></th>
                                <td>14</td>
                                <td>5</td>
                                <td>489</td>
                                <td>445</td>
                                <td>18.75:1</td>
                                <td>89.00:1</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239898_03_20191002102338.pdf" target="_blank">충남</a></th>
                                <td>75</td>
                                <td>12</td>
                                <td>1,556</td>
                                <td>932</td>
                                <td>13.12:1</td>
                                <td>77.67:1</td>
                                <td>60.8:1</td>
                                <td>81.71</td>
                            </tr>
                            <tr>
                                <th><a href="https://pass.willbes.net/public/uploads/willbes/board/97/2019/1002/board_239898_04_20191002102643.pdf" target="_blank">충북</a></th>
                                <td>39</td>
                                <td>12</td>
                                <td>1,714</td>
                                <td>755</td>
                                <td>48.91:1</td>
                                <td>62.92:1</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts03_01.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="mt30 tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts03_btn.png" title="설문하기" />
                </a>
            </div>

            {{--
            <div class="Cts03_01">
                <h3>2019년 8월 17일 시행 <span>국가직 7급 시험 총평</span></h3>
                <div>
                    {!! $data['Content'] !!}
                </div>
            </div>
            --}}

            <div><img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts03_03.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/10/1417_cts04_01.jpg" title="기출해설강의" /></div>
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
                                                <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_btn03.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}" target="_blank">
                                                    <img src="https://static.willbes.net/public/images/promotion/2019/10/1417_btn04.png" title="해설자료">
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
        });

        function fn_FileDownload(path){
            if(confirm("다운로드 하시겠습니까?")){
                location.href = "/download.do?path="+path;
            }
        }

        function pullOpen(){
            var url = "{{front_url('/survey/index/'.$arr_promotion_params['SpIdx'])}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
        }
    </script>
@stop