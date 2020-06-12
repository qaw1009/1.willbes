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

        .evtTop {
            background:url(https://static.willbes.net/public/images/promotion/2020/06/1660_top_bg.jpg) no-repeat center top;
        }
        .evtTop > span { position:absolute; left:50%; z-index:10}
        .evtTop span.img01 {top:770px; margin-left:-700px; width:465px; animation:iptimg1 1s ease-in;-webkit-animation:iptimg1 1s ease-in;}
        .evtTop span.img02 {top:750px; margin-left:250px; width:418px; animation:iptimg2 1s ease-in;-webkit-animation:iptimg2 1s ease-in;}
        @@keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-700px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg1{
        from{margin-left:-1200px; opacity: 0;}
        to{margin-left:-700px; opacity: 1;}
        }
        
        @@keyframes iptimg2{
        from{margin-left:600px; opacity: 0;}
        to{margin-left:250px; opacity: 1;}
        }
        @@-webkit-keyframes iptimg2{
        from{margin-left:600px; opacity: 0;}
        to{margin-left:250px; opacity: 1;}
        }

        .evtMenu { position:absolute; left:50%; margin-left:-560px; bottom:0; z-index:10}
        .evtMenu ul {width:1120px; margin:0 auto;}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#fff; font-size:24px; 
            background:#cbb485; border:1px solid #cc9966; border-bottom:0; margin-right:4px
        }  
        .evtMenu li:last-child a {margin:0}
        .evtMenu li a span {font-size:16px}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#fff; color:#663333; border:1px solid #fff;}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {color:#663333}
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
        .tabCts .youtube {width:100%; text-align:center; margin:0}	
        .tabCts .youtube iframe {width:980px; height:551px; margin:0 auto}

        .Cts02 .mt20 > a {display:inline-block; padding:5px 10px; color:#fff; background:#363636; margin-left:20px}
        .Cts02 a:hover {background:#e50001}
        
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
            <span class="img01">
                <a href="/promotion/index/cate/3019/code/1660/spidx/10?tab=1#content_1">
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_top_img01.png" alt="신문">
                </a>
            </span>
            <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2020/06/1660_top_img02.png" alt="상품"></span>
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
            <div class="evtMenu" id="evtMenu">                
                <ul>
                    <li>
                        <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=1#content_1') }}">
                            <span>수험생이면 누구나</span>
                            <div class="NSK-Black">적중모의고사 무료</div>
                        </a>
                    </li>
                    <li>
                        <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=2#content_2') }}">
                            <span>경쟁률 및 체감난이도</span>
                            <div class="NSK-Black">지난 시험 완벽분석</div>				
                        </a>
                    </li>
                    <li>
                        {{-- <a id='tab3' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/2?tab=3#content_3') }}">--}}
                        <a id='tab3' href="@if(time() < strtotime('202006131140'))javascript:alert('6/13(토) 11:40 오픈!');@else{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=3#content_3') }}@endif">
                            <span>시험 후 당충전 필수!</span>
                            <div class="NSK-Black">시험총평&이벤트</div>
                        </a>
                    </li>     
                    <li>
                        {{-- <a id='tab4' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/2?tab=4#content_4') }}">--}}
                        <a id='tab4' href="@if(time() < strtotime('202006151600'))javascript:alert('6/15(월) 16:00 오픈!');@else{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1660/spidx/' . (empty($arr_promotion_params['SpIdx']) === false ? $arr_promotion_params['SpIdx'] : '') . '?tab=4#content_4') }}@endif">
                            <span>2020 지방직 9급</span>
                            <div class="NSK-Black">기출해설강의</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>        

        <!--최종 마무리 전략-->
        <div id="content_1" class="tabCts">
            <div class="download">
                {{--
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_01.jpg" usemap="#Map1660A" title="적중모의고사 무료" border="0" />
                <map name="Map1660A">
                    <area shape="rect" coords="102,941,396,1039" href="@if($file_yn[18] == 'Y') {{ front_url($file_link[18]) }} @else {{ $file_link[18] }} @endif" target="_blank" alt="기미진국어 자료">
                    <area shape="rect" coords="409,942,700,1038" href="@if($file_yn[19] == 'Y') {{ front_url($file_link[19]) }} @else {{ $file_link[19] }} @endif" target="_blank" alt="한덕현영어 자료">
                    <area shape="rect" coords="726,942,1020,1036" href="@if($file_yn[20] == 'Y') {{ front_url($file_link[20]) }} @else {{ $file_link[20] }} @endif" target="_blank" alt="조민주영어 자료">
                </map>
                --}} 
                <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_01_01.jpg" usemap="#Map0609" border="0">
                <map name="Map0609">
                    <area shape="rect" coords="232,930,533,1028" href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" alt="무료접수">
                    <area shape="rect" coords="584,930,880,1027" href="https://www.willbes.net/classroom/mocktest/exam/index" target="_blank" alt="무료응시">
                    <area shape="rect" coords="11,1630,356,1859" href="https://www.youtube.com/embed/y8L8RSxCOzc" target="_blank">
                    <area shape="rect" coords="383,1632,732,1864" href="https://www.youtube.com/embed/8fEtDRTsxkg" target="_blank">
                    <area shape="rect" coords="764,1630,1108,1863" href="https://www.youtube.com/embed/G5MiVdQEiNo" target="_blank">
                </map>  
            </div>       
            
            <!--
            <div class="youtube">
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
                {{-- <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_comingsoon.jpg"  title="방송전" /> --}}
                {{--<iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>--}}
            </div>
            -->

            <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_02.jpg" title="응시자 준수사항 및 필기장소 안내" />           
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_03.jpg" title="전년도 국가직 9급 체감난이도" />           
            <div class="mt20 mb100">
                * 2020 지방직 시험문제&가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138">바로가기</a>
                <div class="mt20">
                    <table class="boardD">
                        <col />
                        <col span="5" />
                        <col />
                        <col />
                        <col />
                        <col span="5" />
                        <col />
                        <col />
                        <thead>
                            <tr>
                                <th rowspan="3">모집단위</th>
                                <th colspan="6">2020년</th>
                                <th colspan="2">2019년</th>
                            </tr>
                              <tr>
                                <th colspan="2">선발예정인원</th>
                                <th colspan="2">접수인원</th>
                                <th colspan="2">경쟁률</th>
                                <th>경쟁률</th>
                                <th>합격선(최고점)</th>
                            </tr>
                            <tr>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>전체</th>
                                <th>일반행정 9급</th>
                                <th>일반행정 9급</th>
                                <th>일반행정 9급</th>
                            </tr>
                        </thead>
                        <tbody>
							<tr class="gray">
                                <th>계</th>
                                <td>23,709</td>
                                <td>8,381</td>
                                <td>249,007</td>
                                <td>114,406</td>
                                <td>11.80:1</td>
                                <td>15.14:1</td>
                                <td>17.36:1</td>
                                <td>361.47</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" target="_blank">서울</a></th>
                                <td>2,935</td>
                                <td>914</td>
                                <td>49,818</td>
                                <td>20,388</td>
                                <td>16.97:1</td>
                                <td>22.31:1</td>
                                <td>24.0:1</td>
                                <td>372.03</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" target="_blank">강원</a></th>
                                <td>1,363</td>
                                <td>424</td>
                                <td>10,604</td>
                                <td>5,020</td>
                                <td>7.78:1</td>
                                <td>11.84:1</td>
                                <td>13.72:1</td>
                                <td>364.13</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" target="_blank">경기</a></th>
                                <td>4,978</td>
                                <td>1,430</td>
                                <td>42,261</td>
                                <td>16,168</td>
                                <td>8.49:1</td>
                                <td>11.31:1</td>
                                <td>13.85:1</td>
                                <td>362.63</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" target="_blank">경남</a></th>
                                <td>1,639</td>
                                <td>548</td>
                                <td>18,384</td>
                                <td>9,079</td>
                                <td>11.22:1</td>
                                <td>16.57:1</td>
                                <td>12.21:1</td>
                                <td>363.88</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[5] == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif" target="_blank">경북</a></th>
                                <td>2,022</td>
                                <td>723</td>
                                <td>18,226</td>
                                <td>8,164</td>
                                <td>9.01:1</td>
                                <td>11.29:1</td>
                                <td>10.44:1</td>
                                <td>359.81</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[6] == 'Y') {{ front_url($file_link[6]) }} @else {{ $file_link[6] }} @endif" target="_blank">광주</a></th>
                                <td>636</td>
                                <td>248</td>
                                <td>9,868</td>
                                <td>4,723</td>
                                <td>15.52:1</td>
                                <td>19.04:1</td>
                                <td>17.96:1</td>
                                <td>360.68</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[7] == 'Y') {{ front_url($file_link[7]) }} @else {{ $file_link[7] }} @endif" target="_blank">대구</a></th>
                                <td>726</td>
                                <td>389</td>
                                <td>11,887</td>
                                <td>6,754</td>
                                <td>16.37:1</td>
                                <td>17.36:1</td>
                                <td>22.69:1</td>
                                <td>363.18</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[8] == 'Y') {{ front_url($file_link[8]) }} @else {{ $file_link[8] }} @endif" target="_blank">대전</a></th>
                                <td>404</td>
                                <td>206</td>
                                <td>7,407</td>
                                <td>4,063</td>
                                <td>18.33:1</td>
                                <td>19.72:1</td>
                                <td>23.77:1</td>
                                <td>364.6</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[9] == 'Y') {{ front_url($file_link[9]) }} @else {{ $file_link[9] }} @endif" target="_blank">부산</a></th>
                                <td>1,274</td>
                                <td>494</td>
                                <td>15,943</td>
                                <td>8,244</td>
                                <td>12.51:1</td>
                                <td>16.69:1</td>
                                <td>24.32:1</td>
                                <td>370.33</td>
                            </tr>
                            <tr>
                                <th><a href="@if($file_yn[10] == 'Y') {{ front_url($file_link[10]) }} @else {{ $file_link[10] }} @endif" target="_blank">세종</a></th>
                                <td>76</td>
                                <td>30</td>
                                <td>1,493</td>
                                <td>785</td>
                                <td>19.64:1</td>
                                <td>26.17:1</td>
                                <td>24.60:1</td>
                                <td>364.07</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[11] == 'Y') {{ front_url($file_link[11]) }} @else {{ $file_link[11] }} @endif" target="_blank">울산</a></th>
                                <td>354</td>
                                <td>122</td>
                                <td>4,936</td>
                                <td>2,495</td>
                                <td>13.94:1</td>
                                <td>20.45:1</td>
                                <td>40.84:1</td>
                                <td>369.87</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[12] == 'Y') {{ front_url($file_link[12]) }} @else {{ $file_link[12] }} @endif" target="_blank">인천</a></th>
                                <td>1,461</td>
                                <td>555</td>
                                <td>11,355</td>
                                <td>5,446</td>
                                <td>7.77:1</td>
                                <td>9.81:1</td>
                                <td>8.68:1</td>
                                <td>346.17</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[13] == 'Y') {{ front_url($file_link[13]) }} @else {{ $file_link[13] }} @endif" target="_blank">전남</a></th>
                                <td>1,496</td>
                                <td>646</td>
                                <td>11,769</td>
                                <td>5,593</td>
                                <td>7.87:1</td>
                                <td>8.66:1</td>
                                <td>11.69:1</td>
                                <td>357.14</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[14] == 'Y') {{ front_url($file_link[14]) }} @else {{ $file_link[14] }} @endif" target="_blank">전북</a></th>
                                <td>1,119</td>
                                <td>410</td>
                                <td>12,237</td>
                                <td>5,787</td>
                                <td>10.94:1</td>
                                <td>14.11:1</td>
                                <td>13.30:1</td>
                                <td>357.26</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[15] == 'Y') {{ front_url($file_link[15]) }} @else {{ $file_link[15] }} @endif" target="_blank">제주</a></th>
                                <td>315</td>
                                <td>126</td>
                                <td>3,357</td>
                                <td>1,801</td>
                                <td>10.66:1</td>
                                <td>14.29:1</td>
                                <td>10.82:1</td>
                                <td>359.44</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[16] == 'Y') {{ front_url($file_link[16]) }} @else {{ $file_link[16] }} @endif" target="_blank">충남</a></th>
                                <td>1,690</td>
                                <td>614</td>
                                <td>10,750</td>
                                <td>5,279</td>
                                <td>6.36:1</td>
                                <td>8.60:1</td>
                                <td>10.65:1</td>
                                <td>352.96</td>
                              </tr>
                              <tr>
                                <th><a href="@if($file_yn[17] == 'Y') {{ front_url($file_link[17]) }} @else {{ $file_link[17] }} @endif" target="_blank">충북</a></th>
                                <td>1,221</td>
                                <td>502</td>
                                <td>8,712</td>
                                <td>4,617</td>
                                <td>7.14:1</td>
                                <td>9.20:1</td>
                                <td>11.57:1</td>
                                <td>356.77</td>
                              </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1660_03_01.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn02.png" title="설문하기" />
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

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/06/1660_03_02.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2020/06/1660_03_03.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2020/06/1660_04_01.jpg" title="기출해설강의" /></div>
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
            @if(empty($arr_promotion_params['SpIdx']) === true)
                alert('설문정보가 없습니다.');
                return;
            @else
                var url = "{{front_url('/survey/index/' . $arr_promotion_params['SpIdx'])}}";
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }
    </script>
@stop