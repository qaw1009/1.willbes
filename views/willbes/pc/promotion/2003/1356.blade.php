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
            background:url(https://static.willbes.net/public/images/promotion/2019/08/1356_top_bg.jpg) no-repeat center top
        }
        
        .evtMenu {width:100%; background:#707070; border-bottom:5px solid #f8a198}
        .evtMenu ul {width:1120px; margin:0 auto; border-left:1px solid #90887b}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#fff; font-size:150%; font-weight:900;border-right:1px solid #90887b;
        }  
        .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#f8a198; color:#36374d; font-weight:normal; font-size:70%}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#f8a198; color:#2e2e2e}
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
        .boardD td {padding:10px 5px; margin:0; border:none; text-align:right; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
        .boardD td:nth-child(4) {color:#000}
        .boardD td:last-child {color:#C00}
        .boardD tr.gray th,
        .boardD tr.gray td {background:#eee}

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
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
        </div>

        <div class="evtCtnsBox evtMenu NG" id="evtMenu">                
            <ul>
                <li>
                    <a id='tab1' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1356/spidx/2?tab=1#content_1') }}">
                        <span>합격을 위한</span>
                        <div>최종 마무리 전략</div>
                    </a>
                </li>
                <li>
                    <a id='tab2' href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1356/spidx/2?tab=2#content_2') }}">
                        <span>전년도 국가직 7급</span>
                        <div>완벽분석</div>				
                    </a>
                </li>
                <li>
                    <a id='tab3' href="@if(time() >= strtotime('201908171140')){{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1356/spidx/2?tab=3#content_3') }} @else {{ 'javascript:alert(\'준비중입니다\');' }} @endif">
                        <span>2019 국가직 7급</span>
                        <div>후기 및 적중 이벤트</div>
                    </a>
                </li>     
                <li>
                    <a id='tab4' href="@if(time() >= strtotime('201908191500')){{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1356/spidx/2?tab=4#content_4') }} @else {{ 'javascript:alert(\'준비중입니다\');' }} @endif">
                        <span>2019 국가직 7급</span>
                        <div>기출해설 자료</div>
                    </a>
                </li>
            </ul>
        </div>

        <!--최종 마무리 전략-->
        <div id="content_1" class="tabCts pb90">
            <div class="download">		
                <!--국어-->
                {{--
                <span>
                    <a href="@if($file_yn == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif">다운로드</a>
                </span>

                <!--영어-->
                <span>
                    <a href="@if($file_yn == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif">다운로드</a>
                </span>
                    
                <!--한국사-->
                <span>
                    <a href="@if($file_yn == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif">다운로드</a>
                </span>
    
                <!--행정법-->
                <span>
                    <a href="@if($file_yn == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif">다운로드</a>
                </span>
                    
                <!--행정학-->
                <span>
                    <a href="@if($file_yn == 'Y') {{ front_url($file_link[5]) }} @else {{ $file_link[5] }} @endif">다운로드</a>
                </span>
                --}}
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_01_1.jpg" title="풀캐어 강사진" />            
            </div>
               
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_01_2.jpg" title="점수 10점 상승을 위한 시험 전 유의사항/최상의 컨디션을 위한 시험 당일 유의사항" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_01_3.jpg" title="응시자 준수사항 및 필기장소 안내" />
            <div class="youtube">
                <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/08/1356_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>  
        </div>

        <!--완벽분석-->
        <div id="content_2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_02_1.jpg" title="전년도 국가직 9급 체감난이도" />            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_02_2.jpg" title="풀캐어 강사진" />
            <div class="mt20 mb100">
                <p class="download">
                * 시험문제/가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기</a>
                </p>
                <ul class="tabMenu">
                	<li><a href="#tabs1" class="active">행정직</a></li>
                    <li><a href="#tabs2" class="">기술직</a></li>
                </ul>
                <div class="mt20" id="tabs1">
                    <table class="boardD">
                        <col />
                        <col span="5" />
                        <col />
                        <col />
                        <tr>
                            <th rowspan="2">모집단위</th>
                            <th colspan="3">2019년</th>
                            <th colspan="5">2018년</th>
                        </tr>
                        <tr>
                            <th>선발예정인원</th>
                            <th>접수인원</th>
                            <th>경쟁률</th>
                            <th>선발예정인원</th>
                            <th>접수인원</th>
                            <th>경쟁률</th>
                            <th>응시인원</th>
                            <th>합격선 (최고점)</th>
                        </tr>
                        <tr>
                            <th>소계(행정직)</th>
                            <td>           534 </td>
                            <td>        30,310 </td>
                            <td>83.71:1</td>
                            <td>           566 </td>
                            <td>        31,558 </td>
                            <td>55.8:1</td>
                            <td>22,549</td>
                            <td>85.83</td>
                        </tr>
                        <tr>
                            <th>행정직(일반행정:일반)</th>
                            <td>           153 </td>
                            <td>        13,073 </td>
                            <td>85.44:1</td>
                            <td>          159 </td>
                            <td>        14,106 </td>
                            <td>88.7:1</td>
                            <td>9,859</td>
                            <td>80 / 79.16(지방)</td>
                        </tr>
                        <tr>
                            <th>행정직(일반행정:장애인)</th>
                            <td>              11 </td>
                            <td>          178 </td>
                            <td>16.18:1</td>
                            <td>              10 </td>
                            <td>          185</td>
                            <td>18.5:1</td>
                            <td>127 </td>
                            <td>63.33 / 61.66(양성)</td>
                        </tr>
                        <tr>
                            <th>행정직(우정사업본부:일반)</th>
                            <td>               27 </td>
                            <td>              772 </td>
                            <td>28.59:1</td>
                            <td>               20 </td>
                            <td>              753 </td>
                            <td>37.7:1</td>
                            <td>519 </td>
                            <td>76.66</td>
                        </tr>
                        <tr>
                            <th>행정직(우정사업본부:장애인)</th>
                            <td>                2 </td>
                            <td>              23 </td>
                            <td>11.50:1</td>
                            <td>               1 </td>
                            <td>              11 </td>
                            <td>11:1</td>
                            <td>5 </td>
                            <td>전원과락 </td>
                        </tr>
                        <tr>
                            <th>행정직(인사조직)</th>
                            <td>              5 </td>
                            <td>          2,178 </td>
                            <td>435.60:1</td>
                            <td>              4 </td>
                            <td>          1,457 </td>
                            <td>364.3:1</td>
                            <td>965 </td>
                            <td>80 </td>
                        </tr>
                        <tr>
                            <th>행정직(고용노동:일반)</th>
                            <td>                109 </td>
                            <td>              1100 </td>
                            <td>10.09:1</td>
                            <td>                117 </td>
                            <td>              876 </td>
                            <td>7.5:1</td>
                            <td>610 </td>
                            <td>69.66 / 68.33(지방)</td>
                        </tr>
                        <tr>
                            <th>행정직(고용노동:장애인)</th>
                            <td>               8 </td>
                            <td>              52 </td>
                            <td>6.50:1</td>
                            <td>               8 </td>
                            <td>              33 </td>
                            <td>4.1:1</td>
                            <td>23 </td>
                            <td>49.16 </td>
                        </tr>                   
                        <tr>
                            <th>행정직(교육행정:일반)</th>
                            <td>               3 </td>
                            <td>              689 </td>
                            <td>229.67:1</td>
                            <td>               3 </td>
                            <td>              713 </td>
                            <td>237.7:1</td>
                            <td>439 </td>
                            <td>81.66 </td>
                        </tr>
                        <tr>
                            <th>행정직(회계:일반)</th>
                            <td>               2 </td>
                            <td>            68 </td>
                            <td>34.00:1</td>
                            <td>              6 </td>
                            <td>            179 </td>
                            <td>29.8:1</td>
                            <td>113 </td>
                            <td>75 </td>
                        </tr>
                        <tr>
                            <th>행정직(선거행정:일반)</th>
                            <td>               9 </td>
                            <td>               1,063 </td>
                            <td>118.11:1</td>
                            <td>                19 </td>
                            <td>               1,599 </td>
                            <td>84.2:1</td>
                            <td>1,068 </td>
                            <td>82.5 </td>
                        </tr>
                        <tr>
                            <th>행정직(선거행정:장애인)</th>
                            <td>                1 </td>
                            <td>               27 </td>
                            <td>27.00:1</td>
                            <td>                1 </td>
                            <td>              31 </td>
                            <td>31:1</td>
                            <td>20</td>
                            <td>65.83</td>
                        </tr>
                        <tr>
                            <th>세무직(세무:일반)</th>
                            <td> 76 </td>
                            <td> 3,081 </td>
                            <td>40.54:1</td>
                            <td> 68 </td>
                            <td> 3,587 </td>
                            <td>52.8:1</td>
                            <td>2,744 </td>
                            <td>78.33 / 77.5(지방) </td>
                        </tr>
                        <tr>
                            <th>세무직(세무:장애인)</th>
                            <td>6 </td>
                            <td>76 </td>
                            <td>12.67:1</td>
                            <td> 5 </td>
                            <td> 77 </td>
                            <td>15.4:1</td>
                            <td>54 </td>
                            <td>55.83 </td>
                        </tr>
                        <tr>
                            <th>관세직(관세:일반)</th>
                            <td>              7 </td>
                            <td>          686 </td>
                            <td>98.00:1</td>
                            <td> 17 </td>
                            <td> 886 </td>
                            <td>52.1:1</td>
                            <td>682 </td>
                            <td>83.33 </td>
                        </tr>
                        <tr>
                            <th>관세직(관세:장애인)</th>
                            <td>              1 </td>
                            <td>              15 </td>
                            <td>15.00:1</td>
                            <td> 1 </td>
                            <td>26</td>
                            <td>26:1</td>
                            <td>15 </td>
                            <td>65.83 </td>
                        </tr>
                        <tr>
                            <th>통계직(통계:일반)</th>
                            <td>               11 </td>
                            <td>              295 </td>
                            <td>26.82:1</td>
                            <td> 7 </td>
                            <td> 268 </td>
                            <td>38.3:1</td>
                            <td>211 </td>
                            <td>83 </td>
                        </tr>
                        <tr>
                            <th>통계직(통계:장애인)</th>
                            <td>             1 </td>
                            <td>            9 </td>
                            <td>9.00:1</td>
                            <td>              1 </td>
                            <td>          2 </td>
                            <td>2:1</td>
                            <td>2 </td>
                            <td>67.16 </td>
                        </tr>
                        <tr>
                            <th>감사직(감사:일반)</th>
                            <td>               26 </td>
                            <td>              1003 </td>
                            <td>38.58:1</td>
                            <td>               13 </td>
                            <td>              947 </td>
                            <td>72.8:1</td>
                            <td>724 </td>
                            <td>84.16 / 83.33(양성)</td>
                        </tr>
                        <tr>
                            <th>감사직(감사:장애인)</th>
                            <td>                2 </td>
                            <td>              23 </td>
                            <td>11.50:1</td>
                            <td>               1 </td>
                            <td>              22 </td>
                            <td>22:1</td>
                            <td>16 </td>
                            <td>75 </td>
                        </tr>
                        <tr>
                            <th>교정직(교정)</th>
                            <td> 30 </td>
                            <td> 922 </td>
                            <td>30.73:1</td>
                            <td> 30 </td>
                            <td> 1,047 </td>
                            <td>34.9:1</td>
                            <td>739 </td>
                            <td>77.5 / 76.66(지방) </td>
                        </tr>
                        <tr>
                            <th>행보호직(보호)</th>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> 5 </td>
                            <td> 95 </td>
                            <td>19:1</td>
                            <td>62 </td>
                            <td>76.66 </td>
                        </tr>
                        <tr>
                            <th>검찰직(검찰)</th>
                            <td> 10 </td>
                            <td> 1,434 </td>
                            <td>143.40:1</td>
                            <td> 10 </td>
                            <td> 1,355 </td>
                            <td>135.5:1</td>
                            <td>863 </td>
                            <td>83.33 </td>
                        </tr>
                        <tr>
                            <th>출입국관리직(출입국관리)</th>
                            <td> 2 </td>
                            <td> 1096 </td>
                            <td>548.00:1</td>
                            <td> 20 </td>
                            <td> 902 </td>
                            <td>45.1:1</td>
                            <td>656 </td>
                            <td>77.5 </td>
                        </tr>
                        <tr>
                            <th>외무영사직(일반)</th>
                            <td>30 </td>
                            <td> 2,415 </td>
                            <td>80.50:1</td>
                            <td> 37 </td>
                            <td> 2,372 </td>
                            <td>64.1:1</td>
                            <td>2,012 </td>
                            <td>85.83 / 85(양성) </td>
                        </tr>
                        <tr>
                            <th>외무영사직(장애인)</th>
                            <td>               2 </td>
                            <td>          32 </td>
                            <td>16.00:1</td>
                            <td>               3 </td>
                            <td>           29 </td>
                            <td>9.7:1</td>
                            <td>21 </td>
                            <td>71.66 </td>
                        </tr>                           
                    </table>
                </div>
                <div class="mt20" id="tabs2">  
                    <table class="boardD">
                        <col />
                        <col span="5" />
                        <col />
                        <col />
                        <tr>
                            <th rowspan="2">모집단위</th>
                            <th colspan="3">2019년</th>
                            <th colspan="5">2018년</th>
                        </tr>
                        <tr>
                            <th>선발예정인원</th>
                            <th>접수인원</th>
                            <th>경쟁률</th>
                            <th>선발예정인원</th>
                            <th>접수인원</th>
                            <th>경쟁률</th>
                            <th>응시인원</th>
                            <th>합격선 (최고점)</th>
                        </tr>
                        <tr>
                            <th>소계(기술직)</th>
                            <td>           210  </td>
                            <td>        4,928  </td>
                            <td>19.21:1</td>
                            <td>           204 </td>
                            <td>        5,104 </td>
                            <td>25:1</td>
                            <td>3,424</td>
                            <td>84.16</td>
                        </tr>
                        <tr>
                            <th>공업직(일반기계:일반)</th>
                            <td>           24  </td>
                            <td>        600  </td>
                            <td>25.00:1</td>
                            <td>          32 </td>
                            <td>       672 </td>
                            <td>21:1</td>
                            <td>462</td>
                            <td>75 / 72.5(양성)</td>
                        </tr>
                        <tr>
                            <th>공업직(일반기계:장애인)</th>
                            <td>              3  </td>
                            <td>          5  </td>
                            <td>1.67:1</td>
                            <td>              2 </td>
                            <td>          9</td>
                            <td>4.5:1</td>
                            <td>6  </td>
                            <td>70.83</td>
                        </tr>
                        <tr>
                            <th>공업직(전기:일반)</th>
                            <td>               21  </td>
                            <td>              606  </td>
                            <td>28.86:1</td>
                            <td>               31 </td>
                            <td>              666 </td>
                            <td>21.5:1</td>
                            <td>411  </td>
                            <td>75 / 72.5(양성)</td>
                        </tr>
                        <tr>
                            <th>공업직(전기:장애인)</th>
                            <td>               3  </td>
                            <td>               5   </td>
                            <td>1.67:1</td>
                            <td>               2 </td>
                            <td>              10 </td>
                            <td>5:1</td>
                            <td> 5 </td>
                            <td>50 </td>
                        </tr>
                        <tr>
                            <th>공업직(화공:일반)</th>
                            <td>              19 </td>
                            <td>          570  </td>
                            <td>30.00:1</td>
                            <td>             24 </td>
                            <td>         586 </td>
                            <td>24.4:1</td>
                            <td>426  </td>
                            <td>72.5 </td>
                        </tr>
                        <tr>
                            <th>공업직(화공:장애인)</th>
                            <td>                2  </td>
                            <td>              3  </td>
                            <td>1.50:1</td>
                            <td>                2 </td>
                            <td>              5 </td>
                            <td>2.5:1</td>
                            <td>5 </td>
                            <td>68.33</td>
                        </tr>
                        <tr>
                            <th>농업직(일반농업:일반)</th>
                            <td>               18  </td>
                            <td>              541  </td>
                            <td>30.06:1</td>
                            <td>               7 </td>
                            <td>              479 </td>
                            <td>68.4:1</td>
                            <td>316  </td>
                            <td>84.16 </td>
                        </tr>                   
                        <tr>
                            <th>농업직(일반농업:장애인)</th>
                            <td>               1  </td>
                            <td>              5  </td>
                            <td>5.00:1</td>
                            <td>               1</td>
                            <td>              5 </td>
                            <td>5:1</td>
                            <td>4 </td>
                            <td>77.5 </td>
                        </tr>
                        <tr>
                            <th>임업직(산림자원:일반)</th>
                            <td>               5  </td>
                            <td>            234  </td>
                            <td>46.80:1</td>
                            <td>              6 </td>
                            <td>            248 </td>
                            <td>41.3:1</td>
                            <td>171  </td>
                            <td>79.16 </td>
                        </tr>
                        <tr>
                            <th>임업직(산림자원:장애인)</th>
                            <td>               - </td>
                            <td>               - </td>
                            <td>               - </td>
                            <td>                1 </td>
                            <td>                1 </td>
                            <td>1:1</td>
                            <td>1 </td>
                            <td>62.5 </td>
                        </tr>
                        <tr>
                            <th>시설직(일반토목:일반)</th>
                            <td>                28  </td>
                            <td>               468  </td>
                            <td>16.71:1</td>
                            <td>                32 </td>
                            <td>              484 </td>
                            <td>15.1:1</td>
                            <td>340 </td>
                            <td>70.83 / 68.33(양성)</td>
                        </tr>
                        <tr>
                            <th>시설직(일반토목:장애인)</th>
                            <td>2  </td>
                            <td>9  </td>
                            <td>4.50:1</td>
                            <td> 2 </td>
                            <td>10 </td>
                            <td>5:1</td>
                            <td>6 </td>
                            <td>57.5 </td>
                        </tr>
                        <tr>
                            <th>시설직(건축:일반)</th>
                            <td>30  </td>
                            <td>497  </td>
                            <td>16.57:1</td>
                            <td> 16 </td>
                            <td> 495 </td>
                            <td>30.9:1</td>
                            <td>306  </td>
                            <td>76.66 / 75.83(지방) </td>
                        </tr>
                        <tr>
                            <th>시설직(건축:장애인)</th>
                            <td>              2  </td>
                            <td>          6  </td>
                            <td>3.00:1</td>
                            <td> 1 </td>
                            <td> 6 </td>
                            <td>6:1</td>
                            <td>4 </td>
                            <td>61.66 </td>
                        </tr>
                        <tr>
                            <th>방재안전직(방재안전:일반)</th>
                            <td>              2 </td>
                            <td>              152</td>
                            <td>76.00:1</td>
                            <td> 5 </td>
                            <td>253</td>
                            <td>50.6:1</td>
                            <td>140  </td>
                            <td>75.83 </td>
                        </tr>
                        <tr>
                            <th>전산직(전산개발:일반)</th>
                            <td>               30  </td>
                            <td>              980  </td>
                            <td>32.67:1</td>
                            <td> 29 </td>
                            <td> 929 </td>
                            <td>32:1</td>
                            <td>659  </td>
                            <td>74.16 / 73.33(지방) </td>
                        </tr>
                        <tr>
                            <th>전산직(전산개발:장애인)</th>
                            <td>             2 </td>
                            <td>            17 </td>
                            <td>8.50:1</td>
                            <td>              2 </td>
                            <td>          11 </td>
                            <td>5.5:1</td>
                            <td>7 </td>
                            <td>47.5 </td>
                        </tr>
                        <tr>
                            <th>방송통신직(전송기술:일반)</th>
                            <td>               17 </td>
                            <td>              226 </td>
                            <td>13.29:1</td>
                            <td>               8 </td>
                            <td>              232 </td>
                            <td>29:1</td>
                            <td>153  </td>
                            <td>75</td>
                        </tr>
                        <tr>
                            <th>방송통신직(전송기술:장애인)</th>
                            <td>                1 </td>
                            <td>              14 </td>
                            <td>4.00:1</td>
                            <td>               1 </td>
                            <td>              3 </td>
                            <td>3:1</td>
                            <td>2 </td>
                            <td>71.66 </td>
                        </tr>                                          
                    </table>
                    <p>&nbsp;</p>
                </div>  
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="content_3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_03_1.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="mt30 tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_btn02.png" title="설문하기" />
                </a>
            </div>

            <div class="Cts03_01">
                <h3>2019년 8월 17일 시행 <span>국가직 7급 시험 총평</span></h3>
                <div>
                    {{--{!! $data['Content'] !!}--}}
                </div>
            </div>

            <div><img src="https://static.willbes.net/public/images/promotion/2019/08/1356_03_2.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/08/1356_03_3.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="content_4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/08/1356_04_1.jpg" title="기출해설강의" /></div>
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
                                                <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_btn03.png" title="해설강의">
                                            </a>
                                            @endif

                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}" target="_blank">
                                                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1356_btn04.png" title="해설자료">
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

            
    /*tabs*/
        $(document).ready(function(){
        $('.tabMenu').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        );
        function fn_FileDownload(path){
            if(confirm("다운로드 하시겠습니까?")){
                location.href = "/download.do?path="+path;
            }
        }
        


        function pullOpen(){
            var url = "{{front_url('/survey/index/2')}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
        }
    </script>
@stop