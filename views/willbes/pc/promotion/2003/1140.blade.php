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
            background:url(https://static.willbes.net/public/images/promotion/2019/03/1140_top_bg.jpg) no-repeat center top
        }
        
        .evtMenu {width:100%; background:#36374d; border-bottom:5px solid #e2be43}
        .evtMenu ul {width:1120px; margin:0 auto; border-left:1px solid #686063}
        .evtMenu li {display:inline; float:left; width:25%}
        .evtMenu li a {
            display:block; text-align:center; padding:30px 0; color:#868791; font-size:150%; font-weight:900; 
            background:#36374d; border-right:1px solid #686063;
        }  
        .evtMenu li a span {padding:3px 10px; border-radius:15px; background:#868791; color:#36374d; font-weight:normal; font-size:70%}
        .evtMenu li a div {margin-top:8px}
        .evtMenu li:hover a,
        .evtMenu li a.active {background:#e2be43; color:#fff}
        .evtMenu li:hover a span,
        .evtMenu li a.active span {background:#fff; color:#e2be43}
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
        .Cts02 a:hover {background:#e50001}
        
        .boardD {width:900px; border-spacing:0px; border:1px solid #dedede; table-layout:auto; color:#666; margin:0 auto} 
        .boardD caption {display:none}
        .boardD th {padding:10px 5px; background:#f5f5f5; border-right:1px solid #dedede; border-bottom:1px solid #dedede; color:#333}
        .boardD thead th {background:#eee; color:#333}
        .boardD td {padding:10px 5px; margin:0; border:none; text-align:center; border-right:1px solid #dedede; border-bottom:1px solid #dedede}
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
            display:inline; float:left; width:25%; text-align:center; margin-bottom:20px;
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

    @php
        $now = date('YmdHis');
        $show_date_tab3 = '20190406110000';
        $show_date_tab4 = '20190408000000';
        $show_type_tab3 = 'open';
        $show_type_tab4 = 'open';

        //실서버 반영
        if (ENVIRONMENT == 'production') {
            if ($now < $show_date_tab3) {
                $show_type_tab3 = 'close';
            }

            if ($now < $show_date_tab4) {
                $show_type_tab4 = 'close';
            }
        }
    @endphp

    <div class="evtContent NG" id="evtContainer">
        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_top.jpg" title="2019 국가직 9급 풀캐어 서비스" />
        </div>

        <div class="evtCtnsBox evtMenu NG" id="evtMenu">                
            <ul>
                <li>
                    <a title='tab1' href="#tab1">
                        <span>합격을 위한</span>
                        <div>최종 마무리 전략</div>
                    </a>
                </li>
                <li>                    
                    <a title='tab2' href="#tab2">
                        <span>전년도 국가직 9급</span>
                        <div>완벽분석</div>				
                    </a>
                </li>
                <li>
                    <a title='tab3' href="#tab3">
                        <span>2019 국가직 9급</span>
                        <div>시험총평 및 시험후기 준비중</div>
                    </a>
                </li>     
                <li>
                    <a title='tab4' href="#tab4">
                        <span>2019 국가직 9급</span>
                        <div>기출해설강의 준비중</div>
                    </a>
                </li>
            </ul>
        </div>

        <!--최종 마무리 전략-->
        <div id="tab1" class="tabCts pb90">
            <div class="download">		
                <!--국어-->
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
                <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_01_1.jpg" title="풀캐어 강사진" />            
            </div>
               
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_01_2.jpg" title="점수 10점 상승을 위한 시험 전 유의사항/최상의 컨디션을 위한 시험 당일 유의사항" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_01_3.jpg" title="응시자 준수사항 및 필기장소 안내" />
            <div class="youtube">
                <iframe class="youtubePlayer" src="https://www.youtube.com/embed/gpppIN1ISaw?rel=0" frameborder="0" allowfullscreen></iframe>
            </div>
            <div><a href="http://gosi.go.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000131" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn01.png" title="필기시험 장소 안내 바로가기" /></a> </div>  
        </div>

        <!--완벽분석-->
        <div id="tab2" class="tabCts Cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_02_1.jpg" title="전년도 국가직 9급 체감난이도" />            
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_02_2.jpg" title="풀캐어 강사진" />
            <div class="mt20 mb100">
                * 시험문제/가답안 다운로드 <a href="https://www.gosi.kr/cop/bbs/selectBoardList.do?bbsId=BBSMSTR_000000000138" target="_blank">바로가기</a>
                <div class="mt20">
                    <table class="boardD">
                    <col />
                    <col span="5" />
                    <col />
                    <col />
                    <tr>
                        <th rowspan="2">모집단위</th>
                        <th colspan="3">2019년</th>
                        <th colspan="4">2018년</th>
                    </tr>
                    <tr>
                        <th>선발예정인원</th>
                        <th>접수인원</th>
                        <th>경쟁률</th>
                        <th>선발예정인원</th>
                        <th>접수인원</th>
                        <th>경쟁률</th>
                        <th>합격선</th>
                    </tr>
                    <tr>
                        <th>총 계</th>
                        <td>           4,987 </td>
                        <td>        195,322 </td>
                        <td>39:1</td>
                        <td>           4,953 </td>
                        <td>        202,978 </td>
                        <td>41:1</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <th>행정직 계</th>
                        <td>           4,350 </td>
                        <td>        171,562 </td>
                        <td>39:1</td>
                        <td>           4,504 </td>
                        <td>        180,038 </td>
                        <td>40:1</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <th>행정직(일반행정:전국:일반)</th>
                        <td>              294 </td>
                        <td>          33,539 </td>
                        <td>114:1</td>
                        <td>              232 </td>
                        <td>          37,543 </td>
                        <td>162:1</td>
                        <td>369.99</td>
                    </tr>
                    <tr>
                        <th>행정직(일반행정:전국:장애)</th>
                        <td>               23 </td>
                        <td>              677 </td>
                        <td>29:1</td>
                        <td>               16 </td>
                        <td>              610 </td>
                        <td>38:1</td>
                        <td>285.28    / 280.18(양성)</td>
                    </tr>
                    <tr>
                        <th>행정직(일반행정:전국:저소득)</th>
                        <td>                9 </td>
                        <td>              687 </td>
                        <td>76:1</td>
                        <td>               11 </td>
                        <td>              711 </td>
                        <td>65:1</td>
                        <td>338.10    / 333.51(양성)</td>
                    </tr>
                    <tr>
                        <th>행정직(일반행정:지역:일반)</th>
                        <td>              123 </td>
                        <td>          14,184 </td>
                        <td>115:1</td>
                        <td>              119 </td>
                        <td>          13,492 </td>
                        <td>113:1</td>
                        <td>(평균)359.98</td>
                    </tr>
                    <tr>
                        <th>행정직(일반행정:지역:장애)</th>
                        <td>                7 </td>
                        <td>              404 </td>
                        <td>58:1</td>
                        <td>                9 </td>
                        <td>              420 </td>
                        <td>47:1</td>
                        <td>(평균)262.87</td>
                    </tr>
                    <tr>
                        <th>행정직(우정사업본부:전국:저소득)</th>
                        <td>               19 </td>
                        <td>              374 </td>
                        <td>20:1</td>
                        <td>               20 </td>
                        <td>              256 </td>
                        <td>13:1</td>
                        <td>272.13</td>
                    </tr>
                    <tr>
                        <th>행정직(우정사업본부:지역:일반)</th>
                        <td>              595 </td>
                        <td>          16,570 </td>
                        <td>28:1</td>
                        <td>              680 </td>
                        <td>          17,968 </td>
                        <td>26:1</td>
                        <td>(평균)377.62</td>
                    </tr>
                    <tr>
                        <th>행정직(우정사업본부:지역:장애)</th>
                        <td>               48 </td>
                        <td>              392 </td>
                        <td>8:1</td>
                        <td>               50 </td>
                        <td>              467 </td>
                        <td>9:1</td>
                        <td>(평균)242.5</td>
                    </tr>
                    <tr>
                        <th>행정직(병무청:전국:일반)</th>
                        <td>               31 </td>
                        <td>            1,042 </td>
                        <td>34:1</td>
                        <td>              100 </td>
                        <td>            2,737 </td>
                        <td>27:1</td>
                        <td>350.99</td>
                    </tr>
                    <tr>
                        <th>행정직(병무청:전국:장애)</th>
                        <td>                3 </td>
                        <td>               21 </td>
                        <td>7:1</td>
                        <td>                9 </td>
                        <td>               62 </td>
                        <td>7:1</td>
                        <td>231.16</td>
                    </tr>
                    <tr>
                        <th>행정직(병무청:전국:저소득)</th>
                        <td>                1 </td>
                        <td>               19 </td>
                        <td>19:1</td>
                        <td>                3 </td>
                        <td>               33 </td>
                        <td>11:1</td>
                        <td>281.41</td>
                    </tr>
                    <tr>
                        <th>행정직(병무청:지역:일반)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(병무청:지역:장애)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(경찰청:전국:일반)</th>
                        <td>              344 </td>
                        <td>          15,894 </td>
                        <td>46:1</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(경찰청:전국:장애)</th>
                        <td>               27 </td>
                        <td>              366 </td>
                        <td>14:1</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(경찰청:전국:저소득)</th>
                        <td>               11 </td>
                        <td>              301 </td>
                        <td>27:1</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(고용노동:전국:일반)</th>
                        <td>              273 </td>
                        <td>            6,120 </td>
                        <td>22:1</td>
                        <td>              520 </td>
                        <td>          18,815 </td>
                        <td>36:1</td>
                        <td>349.82</td>
                    </tr>
                    <tr>
                        <th>행정직(고용노동:전국:장애)</th>
                        <td>               22 </td>
                        <td>              233 </td>
                        <td>11:1</td>
                        <td>               40 </td>
                        <td>              566 </td>
                        <td>14:1</td>
                        <td>240.59</td>
                    </tr>
                    <tr>
                        <th>행정직(고용노동:전국:저소득)</th>
                        <td>                8 </td>
                        <td>              119 </td>
                        <td>15:1</td>
                        <td>               15 </td>
                        <td>              265 </td>
                        <td>18:1</td>
                        <td>305.67</td>
                    </tr>
                    <tr>
                        <th>행정직(고용노동:지역:일반)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(고용노동:지역:장애)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(농림축산식품부)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(보건복지부:일반)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(보건복지부:장애인)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>행정직(교육행정:일반)</th>
                        <td>               60 </td>
                        <td>          10,292 </td>
                        <td>172:1</td>
                        <td>               45 </td>
                        <td>            9,310 </td>
                        <td>207:1</td>
                        <td>368.19</td>
                    </tr>
                    <tr>
                        <th>행정직(교육행정:장애)</th>
                        <td>                5 </td>
                        <td>              206 </td>
                        <td>41:1</td>
                        <td>                4 </td>
                        <td>              166 </td>
                        <td>42:1</td>
                        <td>290.93</td>
                    </tr>
                    <tr>
                        <th>행정직(교육행정:저소득)</th>
                        <td>                1 </td>
                        <td>              140 </td>
                        <td>140:1</td>
                        <td>                1 </td>
                        <td>              119 </td>
                        <td>119:1</td>
                        <td>334.61</td>
                    </tr>
                    <tr>
                        <th>행정직(선거행정:일반)</th>
                        <td>               60 </td>
                        <td>            1,590 </td>
                        <td>27:1</td>
                        <td>               90 </td>
                        <td>            1,759 </td>
                        <td>20:1</td>
                        <td>340.29</td>
                    </tr>
                    <tr>
                        <th>행정직(선거행정:장애)</th>
                        <td>                5 </td>
                        <td>               55 </td>
                        <td>11:1</td>
                        <td>                7 </td>
                        <td>               67 </td>
                        <td>10:1</td>
                        <td>277.49</td>
                    </tr>
                    <tr>
                        <th>행정직(선거행정:저소득)</th>
                        <td>                1 </td>
                        <td>               23 </td>
                        <td>23:1</td>
                        <td>                3 </td>
                        <td>               48 </td>
                        <td>16:1</td>
                        <td>314.12</td>
                    </tr>
                    <tr>
                        <th>직업상담직(직업상담:일반)</th>
                        <td>               48 </td>
                        <td>            2,660 </td>
                        <td>55:1</td>
                        <td>               54 </td>
                        <td>            2,165 </td>
                        <td>40:1</td>
                        <td>319.63    / 316.71(양성)</td>
                    </tr>
                    <tr>
                        <th>직업상담직(직업상담:장애)</th>
                        <td>                4 </td>
                        <td>               40 </td>
                        <td>10:1</td>
                        <td>                4 </td>
                        <td>               34 </td>
                        <td>9:1</td>
                        <td>252.25</td>
                    </tr>
                    <tr>
                        <th>직업상담직(직업상담:저소득)</th>
                        <td>                1 </td>
                        <td>               38 </td>
                        <td>38:1</td>
                        <td>                2 </td>
                        <td>               68 </td>
                        <td>34:1</td>
                        <td>283.18</td>
                    </tr>
                    <tr>
                        <th>세무직(세무:일반)</th>
                        <td>              855 </td>
                        <td>          19,319 </td>
                        <td>23:1</td>
                        <td>              878 </td>
                        <td>          23,161 </td>
                        <td>26:1</td>
                        <td>343.59</td>
                    </tr>
                    <tr>
                        <th>세무직(세무:장애)</th>
                        <td>               69 </td>
                        <td>              343 </td>
                        <td>5:1</td>
                        <td>               66 </td>
                        <td>              356 </td>
                        <td>5:1</td>
                        <td>208.93</td>
                    </tr>
                    <tr>
                        <th>세무직(세무:저소득)</th>
                        <td>               27 </td>
                        <td>              353 </td>
                        <td>13:1</td>
                        <td>               25 </td>
                        <td>              447 </td>
                        <td>18:1</td>
                        <td>300.41</td>
                    </tr>
                    <tr>
                        <th>관세직(관세:일반)</th>
                        <td>              194 </td>
                        <td>            4,820 </td>
                        <td>25:1</td>
                        <td>              155 </td>
                        <td>            5,201 </td>
                        <td>34:1</td>
                        <td>350.53</td>
                    </tr>
                    <tr>
                        <th>관세직(관세:장애)</th>
                        <td>               16 </td>
                        <td>               84 </td>
                        <td>5:1</td>
                        <td>               12 </td>
                        <td>              102 </td>
                        <td>9:1</td>
                        <td>253.91</td>
                    </tr>
                    <tr>
                        <th>관세직(관세:저소득)</th>
                        <td>                7 </td>
                        <td>               56 </td>
                        <td>8:1</td>
                        <td>                5 </td>
                        <td>               73 </td>
                        <td>15:1</td>
                        <td>320.64</td>
                    </tr>
                    <tr>
                        <th>통계직(통계:일반)</th>
                        <td>               78 </td>
                        <td>            1,331 </td>
                        <td>17:1</td>
                        <td>               55 </td>
                        <td>              998 </td>
                        <td>18:1</td>
                        <td>351.09</td>
                    </tr>
                    <tr>
                        <th>통계직(통계:장애)</th>
                        <td>                7 </td>
                        <td>               30 </td>
                        <td>4:1</td>
                        <td>                4 </td>
                        <td>               21 </td>
                        <td>5:1</td>
                        <td>245.85</td>
                    </tr>
                    <tr>
                        <th>통계직(통계:저소득)</th>
                        <td>                3 </td>
                        <td>               39 </td>
                        <td>13:1</td>
                        <td>                2 </td>
                        <td>               26 </td>
                        <td>13:1</td>
                        <td>276.11</td>
                    </tr>
                    <tr>
                        <th>교정직(교정:남)</th>
                        <td>              219 </td>
                        <td>            6,992 </td>
                        <td>32:1</td>
                        <td>              507 </td>
                        <td>          10,839 </td>
                        <td>21:1</td>
                        <td>321</td>
                    </tr>
                    <tr>
                        <th>교정직(교정:여)</th>
                        <td>               20 </td>
                        <td>            1,132 </td>
                        <td>57:1</td>
                        <td>               50 </td>
                        <td>            1,560 </td>
                        <td>31:1</td>
                        <td>332.78</td>
                    </tr>
                    <tr>
                        <th>교정직(교정:저소득)</th>
                        <td>                7 </td>
                        <td>              148 </td>
                        <td>21:1</td>
                        <td>               15 </td>
                        <td>              231 </td>
                        <td>15:1</td>
                        <td>282.52</td>
                    </tr>
                    <tr>
                        <th>보호직(보호:남)</th>
                        <td>              177 </td>
                        <td>            3,296 </td>
                        <td>19:1</td>
                        <td>               97 </td>
                        <td>            2,181 </td>
                        <td>23:1</td>
                        <td>326.74</td>
                    </tr>
                    <tr>
                        <th>보호직(보호:여)</th>
                        <td>               77 </td>
                        <td>            3,286 </td>
                        <td>43:1</td>
                        <td>               21 </td>
                        <td>            2,705 </td>
                        <td>129:1</td>
                        <td>352.74</td>
                    </tr>
                    <tr>
                        <th>보호직(보호:저소득)</th>
                        <td>                7 </td>
                        <td>              132 </td>
                        <td>19:1</td>
                        <td>                3 </td>
                        <td>              106 </td>
                        <td>35:1</td>
                        <td>323.43</td>
                    </tr>
                    <tr>
                        <th>검찰직(검찰:일반)</th>
                        <td>              250 </td>
                        <td>          12,031 </td>
                        <td>48:1</td>
                        <td>              287 </td>
                        <td>          12,032 </td>
                        <td>42:1</td>
                        <td>347.04</td>
                    </tr>
                    <tr>
                        <th>검찰직(검찰:저소득)</th>
                        <td>                7 </td>
                        <td>              213 </td>
                        <td>30:1</td>
                        <td>                8 </td>
                        <td>              202 </td>
                        <td>25:1</td>
                        <td>317.09</td>
                    </tr>
                    <tr>
                        <th>마약수사직(마약수사:일반)</th>
                        <td>                9 </td>
                        <td>              576 </td>
                        <td>64:1</td>
                        <td>               24 </td>
                        <td>            1,327 </td>
                        <td>55:1</td>
                        <td>352.2</td>
                    </tr>
                    <tr>
                        <th>마약수사직(마약수사:저소득)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>                1 </td>
                        <td>               67 </td>
                        <td>67:1</td>
                        <td>301.89</td>
                    </tr>
                    <tr>
                        <th>출입국관리직(출입국관리:일반)</th>
                        <td>              261 </td>
                        <td>            9,956 </td>
                        <td>38:1</td>
                        <td>              197 </td>
                        <td>            8,810 </td>
                        <td>45:1</td>
                        <td>359.31    / 355.47(양성)</td>
                    </tr>
                    <tr>
                        <th>출입국관리직(출입국관리:저소득)</th>
                        <td>                8 </td>
                        <td>              167 </td>
                        <td>21:1</td>
                        <td>                6 </td>
                        <td>              182 </td>
                        <td>30:1</td>
                        <td>321.48</td>
                    </tr>
                    <tr>
                        <th>철도경찰직(철도경찰:일반)</th>
                        <td>               28 </td>
                        <td>            1,255 </td>
                        <td>45:1</td>
                        <td>               50 </td>
                        <td>            1,707 </td>
                        <td>34:1</td>
                        <td>333.94</td>
                    </tr>
                    <tr>
                        <th>철도경찰직(철도경찰:저소득)</th>
                        <td>                1 </td>
                        <td>               17 </td>
                        <td>17:1</td>
                        <td>                2 </td>
                        <td>               23 </td>
                        <td>12:1</td>
                        <td>279.03</td>
                    </tr>
                    <tr class="gray">
                        <th>기술직 계</th>
                        <td>             637 </td>
                        <td>         23,760 </td>
                        <td>37:1</td>
                        <td>             449 </td>
                        <td>         22,940 </td>
                        <td>51:1</td>
                        <td>　</td>
                    </tr>
                    <tr>
                        <th>공업직(일반기계:일반)</th>
                        <td>               44 </td>
                        <td>            2,493 </td>
                        <td>57:1</td>
                        <td>               35 </td>
                        <td>            2,388 </td>
                        <td>68:1</td>
                        <td>70    / 69(양성)</td>
                    </tr>
                    <tr>
                        <th>공업직(일반기계:장애)</th>
                        <td>                4 </td>
                        <td>               31 </td>
                        <td>8:1</td>
                        <td>                3 </td>
                        <td>               29 </td>
                        <td>10:1</td>
                        <td>53</td>
                    </tr>
                    <tr>
                        <th>공업직(일반기계:저소득)</th>
                        <td>                1 </td>
                        <td>               26 </td>
                        <td>26:1</td>
                        <td>                1 </td>
                        <td>               27 </td>
                        <td>27:1</td>
                        <td>60</td>
                    </tr>
                    <tr>
                        <th>공업직(전기:일반)</th>
                        <td>               30 </td>
                        <td>            2,287 </td>
                        <td>76:1</td>
                        <td>               23 </td>
                        <td>            2,186 </td>
                        <td>95:1</td>
                        <td>72    / 70(양성)</td>
                    </tr>
                    <tr>
                        <th>공업직(전기:장애)</th>
                        <td>                3 </td>
                        <td>               22 </td>
                        <td>7:1</td>
                        <td>                2 </td>
                        <td>               28 </td>
                        <td>14:1</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <th>공업직(전기:저소득)</th>
                        <td>                1 </td>
                        <td>               35 </td>
                        <td>35:1</td>
                        <td>                1 </td>
                        <td>               22 </td>
                        <td>22:1</td>
                        <td>55</td>
                    </tr>
                    <tr>
                        <th>공업직(화공:일반)</th>
                        <td>               26 </td>
                        <td>            1,414 </td>
                        <td>54:1</td>
                        <td>               18 </td>
                        <td>            1,220 </td>
                        <td>68:1</td>
                        <td>74</td>
                    </tr>
                    <tr>
                        <th>공업직(화공:장애)</th>
                        <td>                3 </td>
                        <td>                6 </td>
                        <td>2:1</td>
                        <td>                1 </td>
                        <td>                5 </td>
                        <td>5:1</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <th>공업직(화공:저소득)</th>
                        <td>                1 </td>
                        <td>               16 </td>
                        <td>16:1</td>
                        <td>                1 </td>
                        <td>               12 </td>
                        <td>12:1</td>
                        <td>56</td>
                    </tr>
                    <tr>
                        <th>농업직(일반농업:일반)</th>
                        <td>              122 </td>
                        <td>            3,452 </td>
                        <td>28:1</td>
                        <td>               63 </td>
                        <td>            3,279 </td>
                        <td>52:1</td>
                        <td>78</td>
                    </tr>
                    <tr>
                        <th>농업직(일반농업:장애)</th>
                        <td>                9 </td>
                        <td>               30 </td>
                        <td>3:1</td>
                        <td>                6 </td>
                        <td>               37 </td>
                        <td>6:1</td>
                        <td>54</td>
                    </tr>
                    <tr>
                        <th>농업직(일반농업:저소득)</th>
                        <td>                4 </td>
                        <td>               36 </td>
                        <td>9:1</td>
                        <td>                2 </td>
                        <td>               33 </td>
                        <td>17:1</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <th>임업직(산림자원:일반)</th>
                        <td>               47 </td>
                        <td>            1,842 </td>
                        <td>39:1</td>
                        <td>               76 </td>
                        <td>            1,944 </td>
                        <td>26:1</td>
                        <td>71</td>
                    </tr>
                    <tr>
                        <th>임업직(산림자원:장애)</th>
                        <td>                4 </td>
                        <td>               12 </td>
                        <td>3:1</td>
                        <td>                7 </td>
                        <td>               24 </td>
                        <td>3:1</td>
                        <td>72</td>
                    </tr>
                    <tr>
                        <th>임업직(산림자원:저소득)</th>
                        <td>                1 </td>
                        <td>               19 </td>
                        <td>19:1</td>
                        <td>                2 </td>
                        <td>               23 </td>
                        <td>12:1</td>
                        <td>58</td>
                    </tr>
                    <tr>
                        <th>시설직(일반토목:일반)</th>
                        <td>               97 </td>
                        <td>            3,863 </td>
                        <td>40:1</td>
                        <td>               43 </td>
                        <td>            3,708 </td>
                        <td>86:1</td>
                        <td>65    / 64(양성)</td>
                    </tr>
                    <tr>
                        <th>시설직(일반토목:장애)</th>
                        <td>                8 </td>
                        <td>               35 </td>
                        <td>4:1</td>
                        <td>                4 </td>
                        <td>               34 </td>
                        <td>9:1</td>
                        <td>52</td>
                    </tr>
                    <tr>
                        <th>시설직(일반토목:저소득)</th>
                        <td>                3 </td>
                        <td>               27 </td>
                        <td>9:1</td>
                        <td>                1 </td>
                        <td>               30 </td>
                        <td>30:1</td>
                        <td>57</td>
                    </tr>
                    <tr>
                        <th>시설직(건축:일반)</th>
                        <td>               26 </td>
                        <td>            2,660 </td>
                        <td>102:1</td>
                        <td>               18 </td>
                        <td>            2,359 </td>
                        <td>131:1</td>
                        <td>75</td>
                    </tr>
                    <tr>
                        <th>시설직(건축:장애)</th>
                        <td>                3 </td>
                        <td>               29 </td>
                        <td>10:1</td>
                        <td>                1 </td>
                        <td>               20 </td>
                        <td>20:1</td>
                        <td>전원과락</td>
                    </tr>
                    <tr>
                        <th>시설직(건축:저소득)</th>
                        <td>                1 </td>
                        <td>               25 </td>
                        <td>25:1</td>
                        <td>                1 </td>
                        <td>               21 </td>
                        <td>21:1</td>
                        <td>61</td>
                    </tr>
                    <tr>
                        <th>방재안전직(방재안전)</th>
                        <td>                3 </td>
                        <td>              593 </td>
                        <td>198:1</td>
                        <td>                9 </td>
                        <td>              708 </td>
                        <td>79:1</td>
                        <td>67</td>
                    </tr>
                    <tr>
                        <th>전산직(전산개발:일반)</th>
                        <td>               83 </td>
                        <td>            3,218 </td>
                        <td>39:1</td>
                        <td>               50 </td>
                        <td>            3,138 </td>
                        <td>63:1</td>
                        <td>73</td>
                    </tr>
                    <tr>
                        <th>전산직(전산개발:장애)</th>
                        <td>                7 </td>
                        <td>               55 </td>
                        <td>8:1</td>
                        <td>                4 </td>
                        <td>               50 </td>
                        <td>13:1</td>
                        <td>48</td>
                    </tr>
                    <tr>
                        <th>전산직(전산개발:저소득)</th>
                        <td>                3 </td>
                        <td>               39 </td>
                        <td>13:1</td>
                        <td>                1 </td>
                        <td>               30 </td>
                        <td>30:1</td>
                        <td>66</td>
                    </tr>
                    <tr>
                        <th>전산직(정보보호:일반)</th>
                        <td>                8 </td>
                        <td>              268 </td>
                        <td>34:1</td>
                        <td>                5 </td>
                        <td>              360 </td>
                        <td>72:1</td>
                        <td>69    / 67(양성)</td>
                    </tr>
                    <tr>
                        <th>전산직(정보보호:장애)</th>
                        <td> - </td>
                        <td> - </td>
                        <td>-</td>
                        <td>                1 </td>
                        <td>               11 </td>
                        <td>11:1</td>
                        <td>전원과락</td>
                    </tr>
                    <tr>
                        <th>방송통신직(전송기술:일반)</th>
                        <td>               85 </td>
                        <td>            1,205 </td>
                        <td>14:1</td>
                        <td>               63 </td>
                        <td>            1,192 </td>
                        <td>19:1</td>
                        <td>65</td>
                    </tr>
                    <tr>
                        <th>방송통신직(전송기술:장애)</th>
                        <td>                7 </td>
                        <td>               11 </td>
                        <td>2:1</td>
                        <td>                5 </td>
                        <td>               14 </td>
                        <td>3:1</td>
                        <td>64</td>
                    </tr>
                    <tr>
                        <th>방송통신직(전송기술:저소득)</th>
                        <td>                3 </td>
                        <td>               11 </td>
                        <td>4:1</td>
                        <td>                2 </td>
                        <td>                8 </td>
                        <td>4:1</td>
                        <td>60</td>
                    </tr>
                    </table>
                    <p>&nbsp;</p>
                </div>  
            </div>
        </div>

        <!--시험총평 및 시험후기-->
        <div id="tab3" class="tabCts Cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_03_1.jpg" title="시험 총평 및 시험후기, 적중이벤트" />
            @include('willbes.pc.survey.show_graph_partial')

            <div class="mt30 tx-center">
                <a href="javascript:pullOpen();">
                    <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn02.png" title="설문하기" />
                </a>
            </div>

            <div class="Cts03_01">
                <h3>2019년 4월 7일 시행 <span>국가직 9급 시험 총평</span></h3>
                <div>
                    {!! $data['Content'] !!}
                </div>
            </div>

            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_03_2.jpg" title="시험후기 댓글 이벤트" /></div>
            {{--시험평가댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_evaluate_partial')
            @endif

            <div class="mt100"><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_03_3.jpg" title="소름돋는 적중" /> </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif

        </div>

        <!--기출해설강의-->
        <div id="tab4" class="tabCts Cts04">
            <div><img src="https://static.willbes.net/public/images/promotion/2019/03/1140_04_1.jpg" title="기출해설강의" /></div>
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
                                            <a href="javascript:fnPlayerFree('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');">
                                                <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn03.png" title="해설강의">
                                            </a>
                                            @if(empty($row['wUnitAttachFile']) === false)
                                                <a href="{{ site_url('/promotion/downloadReference?file_idx='.$row['wUnitIdx'].'&event_idx='.$data['ElIdx']) }}" target="_blank">
                                                    <img src="https://static.willbes.net/public/images/promotion/2019/03/1140_btn04.png" title="해설자료">
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
            $('.evtMenu ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function(){
                    $(this.hash).hide();
                    $('#frm').height('450px');
                    $('#frm_713001').height('840px');
                    $('#frm_713004').height('840px');
                });

                $(this).on('click', 'a', function(e){
                    var open_type = 'false';
                    var open_type3 = '{{ $show_type_tab3 }}';
                    var open_type4 = '{{ $show_type_tab4 }}';

                    if($(this).attr('title') == 'tab1' || $(this).attr('title') == 'tab2') {
                        open_type = 'true';
                    } else {
                        if($(this).attr('title') == 'tab3' && open_type3 == 'open') {
                            open_type = 'true';
                        }

                        if($(this).attr('title') == 'tab4' && open_type4 == 'open') {
                            open_type = 'true';
                        }
                    }

                    if (open_type == 'true') {
                        $active.removeClass('active');
                        $content.hide();
                        $active = $(this);
                        $content = $(this.hash);
                        $active.addClass('active');
                        $content.show();
                        e.preventDefault();
                    } else {
                        if($(this).attr('title') == 'tab3') {
                            alert('4월 6일 공개됩니다.');
                            return false;
                        }

                        if($(this).attr('title') == 'tab4') {
                            alert('4월 8일 공개됩니다.');
                            return false;
                        }
                    }
                });
            });
        });

        function pullOpen(){
            var url = "{{front_url('/survey/index/2')}}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
        }
    </script>
@stop