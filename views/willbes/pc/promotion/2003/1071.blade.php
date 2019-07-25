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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_top {background:#fef053 url(https://static.willbes.net/public/images/promotion/2019/05/1071_top_bg.jpg) no-repeat center top}

        .wb_cts01{background:#fff;}
        /* 탭 */
        .tabContaier{padding-top:20px; padding-bottom:120px;}
        .tabContaier ul {width:980px; text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; margin-bottom:20px;}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:''; display:block; clear:both}
        .tabContentsEvt iframe {width:876px; height:480px;}

        .wb_cts02 {background:#ffd84f;}

        .wb_cts03 {background:#ffd84f; padding-bottom:100px}
        .wb_cts03 ul {width:960px; margin:0 auto}
        .wb_cts03 li {display:inline; float:left; width:16.666666%}
        .wb_cts03 li a {display:block; height:60px; line-height:60px; text-align:center; font-size:16px; position:relative; border:1px solid #1e1e1e; margin-right:5px}
        .wb_cts03 li a span {position:absolute; display:block; left:50%; top:-10px; width:90px; margin-left:-45px; padding:0 10px; font-size:12px; color:#fff; 
        background:#1e1e1e; height:24px; line-height:20px; border:2px solid #ffd84f; border-radius:20px;
        }
        .wb_cts03 li a.active,
        .wb_cts03 li a:hover {background:#1e1e1e; color:#ffd84f}
        .wb_cts03 li:last-child a {margin:0}
        .wb_cts03 ul:after {content:''; display:block; clear:both}
        .wb_cts03 .tabContents {width:960px; margin:16px auto 0; background:#fff; padding:50px 30px; text-align:left}
        .wb_cts03 .tabContents h3 {font-size:22px; color:#930f0d; margin:20px 0}
        .wb_cts03 .tabContents p {font-size:18px; margin:20px 0}
        .wb_cts03 table {background:#fff; width:100%; background:#fff} 
        .wb_cts03 tr {border-bottom:1px solid #ccc}        
        .wb_cts03 tr.st01 {background:#ececec}
        .wb_cts03 tr:hover {background:#f9f9f9}
        .wb_cts03 th,
        .wb_cts03 td {padding:10px; font-size:14px; font-weight:500;}
        .wb_cts03 th {background:#5f5f5f; color:#fff}
        .wb_cts03 td:nth-child(1) {text-align:center}
        .wb_cts03 td:nth-child(2) {text-align:center}
        .wb_cts03 td:nth-child(3) {color:#930f0d}
        .wb_cts03 td:last-child {border:0}
        .wb_cts03 td p {font-size:12px}
		.wb_cts03 table a {padding:10px 15px; color:#202020; background:#ffd84f; font-size:14px; display:block; border-radius:20px; text-align:center}
        .wb_cts03 table a.btn2 {color:#666; background:#fff; border:1px solid #666; cursor:default}
        .wb_cts03 table a:hover {background:#202020; color:#fff;}
        .wb_cts03 table a.onBtn {margin-top:20px; font-size:20px; font-weight:500; border-radius:40px 40px 0 40px; padding:20px 0}


        .PeMenu {width:1210px; margin:0 auto 0; padding-top:100px}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block}
        .PeMenu li a img.on {display:none}

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            width:122px;
            z-index:10;
        }


    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_05.png" alt="2019대비 통신직/전기직 이론/문제풀이 패키지" usemap="#Map1071A" border="0">
                <map name="Map1071A" id="Map1071A" >
                    <area shape="rect" coords="5,137,116,189" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="1" />
                    <area shape="rect" coords="5,196,116,258" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="2"/>
                    <area shape="rect" coords="5,266,116,326" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="3"/>
                    <area shape="rect" coords="5,334,116,384" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="4"/>
                    <area shape="rect" coords="5,390,116,457" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="5"/>
                    <area shape="rect" coords="5,462,116,511" href="#" onfocus="this.blur();" class="r_btn_tab" data-tab-id="6"/>
                </map>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_top_01.png" alt=" 윌비스 차원이 다른 전기/통신 기술직의 대가 최우영교수 " usemap="#Map1071B" border="0"  />
            <map name="Map1071B" id="Map1071B" >
                <area shape="rect" coords="216,691,341,747" href="#event01" onfocus="this.blur();"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_01.jpg" alt="기술직 수험생의 이유있는 선택 최우영교수"  ><br>
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02.jpg" alt="난해한 부분의 핵심포인트를 짚어주는 고득점 합격 필수 강의 최우영교수" >
            <div class="tabContaier">
                <ul class="youtubeTab">
                    <li>
                        <a class="active" href="#ytb01">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap01off_c.jpg"  class="off" alt="전자공학"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap01on_c.jpg" class="on"  />
                        </a>
                    </li>
                    <li>
                        <a href="#ytb02">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap02off_c.jpg"  class="off"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap02on_c.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li>
                        <a href="#ytb03">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap03off_c.jpg"  class="off" />
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap03on_c.jpg"  class="on" alt="전기이론학"/>
                        </a>
                    </li>
                    <li>
                        <a href="#ytb04">
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap04off_c.jpg"  class="off" alt="전기기기"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_02_tap04on_c.jpg" class="on" />
                        </a>
                    </li>
                </ul>

                <div class="tabContentsEvt" id="ytb01">
                    <iframe width="876px" height="480px" src="https://www.youtube.com/embed/ZJG2UIJmQxc?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="tabContentsEvt" id="ytb02"></div>
                <div class="tabContentsEvt" id="ytb03"></div>
                <div class="tabContentsEvt" id="ytb04"></div>
            </div><!--tabContaier//-->
        </div>
        <!--WB_top01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_03.jpg" alt="윌비스 최우영 교수의 전기/통신직 패키지"  usemap="#Map1071C" border="0" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155797"  />
            <map name="Map1071C" id="Map1071C">
                <area shape="rect" coords="117,808,383,912" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155797" target="_blank" alt="통신기술직" onfocus="this.blur();"/>
                <area shape="rect" coords="423,809,686,912" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155798" target="_blank" alt="전송기술직" onfocus="this.blur();"/>
                <area shape="rect" coords="742,806,994,912" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/155799" target="_blank" alt="전기직" onfocus="this.blur();" />                
            </map>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1071_04.jpg" alt="윌비스 최우영 교수 단과 수강신청"/><br>
            <ul class="tabs">
                <li><a href="#tab1" id="menu_tab1">전송기술 9급<span>국가직</span></a></li>
                <li><a href="#tab2" id="menu_tab2">통신기술 9급<span>서울/지방직</span></a></li>
                <li><a href="#tab3" id="menu_tab3">통신직 7급</a></li>
                <li><a href="#tab4" id="menu_tab4">전기직 9급</a></li>
                <li><a href="#tab5" id="menu_tab5">전기직 7급</a></li>
                <li><a href="#tab6" id="menu_tab6">군무원<span>전자/통신직</span></a></li>
            </ul>
            <div class="tabContents" id="tab1">
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2020 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155014" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2019 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146362" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146363" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146644" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146957" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147120" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152669" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 무선공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>이론</td>
                        <td>2020 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155015" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>이론</td>
                        <td>2019 최우영 무선공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146360" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146645" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146718" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147119" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            <div class="tabContents" id="tab2">
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2020 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155014" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2019 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146362" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146363" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146644" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146957" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147120" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152669" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2020 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155015" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2019 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2019 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146361" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146645" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 통신공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152841" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 통신공학/통신이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152663" target="_blank">수강신청</a></td>
                    </tr>
                </table>                
            </div>

            <div class="tabContents" id="tab3">
                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2020 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155015" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2019 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2019 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146361" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146645" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 통신공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152841" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 통신공학/통신이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152663" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2018 최우영 전기자기학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/145753" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2018 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146194" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전자회로</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>이론</td>
                        <td>2018 최우영 전자회로 이론 및 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146195" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>유료특강</td>
                        <td>2018 최우영 전자회로 기출문제특강</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146348" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            <div class="tabContents" id="tab4">
                <p>● 전기이론</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>이론</td>
                        <td>2020 최우영 전기이론 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155016" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기이론 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146365" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기이론 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146952" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기이론</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전기이론 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152688" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기기기</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>이론</td>
                        <td>2019 최우영 전기기기 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146238" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기기기 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146364" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기기기 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146951" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전기기기 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152687" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            <div class="tabContents" id="tab5">
                <p>● 전기기기</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>이론</td>
                        <td>2020 최우영 전기이론 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155016" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기기기 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146364" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전기기기 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146951" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전기기기 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152687" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2018 최우영 전기자기학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/145753" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2018 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146194" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 회로이론</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>회로이론</td>
                        <td>이론</td>
                        <td>2017 최우영 회로이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/145706" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>회로이론</td>
                        <td>문제풀이</td>
                        <td>2017 최우영 회로이론 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/145710" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>

            <div class="tabContents" id="tab6">
                <h3 class="NGEB">군무원 전자직 9/7급</h3>
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2020 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155014" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2019 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146362" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146363" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146644" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146957" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147120" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152669" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [군무원대비] 최우영 전자공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152733" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전자회로</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>이론</td>
                        <td>2018 최우영 전자회로 이론 및 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146195" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자회로</td>
                        <td>유료특강</td>
                        <td>2018 최우영 전자회로 기출문제특강</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146348" target="_blank">수강신청</a></td>
                    </tr>
                </table>

                <h3 class="NGEB">군무원 통신직 9/7급</h3>
                <p>● 전자공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>기초전기전자</td>
                        <td>이론</td>
                        <td>2020 최우영 기초전기전자 이론강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155014" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>이론</td>
                        <td>2019 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146362" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 최우영 디지털공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146363" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146644" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 단원별 기출문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146957" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/147120" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 전자공학 실전 동형모의고사</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152669" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2019 [군무원대비] 최우영 전자공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152733" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 통신이론/공학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2020 최우영 무선/통신 공통 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155015" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>이론</td>
                        <td>2019 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146544" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2019 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146361" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146645" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2019 최우영 통신공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152841" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신이론</td>
                        <td>문제풀이</td>
                        <td>2019 [지방직/서울시] 최우영 통신공학/통신이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/152663" target="_blank">수강신청</a></td>
                    </tr>
                </table>
                <p>● 전기자기학</p>
                <table cellspacing="0" cellpadding="0">
                    <col width="15%"/>
                    <col width="15%"/>
                    <col />
                    <col width="12%"/>
                    <tr>
                        <th>과목</th>
                        <th>과정</th>
                        <th>강좌명</th>
                        <th>수강신청</th>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>이론</td>
                        <td>2018 최우영 전기자기학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/145753" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기자기학</td>
                        <td>문제풀이</td>
                        <td>2018 최우영 전기자기학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/146194" target="_blank">수강신청</a></td>
                    </tr>
                </table>
            </div>
        </div><!--wb_cts03//-->
          
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var ytb01_url = "https://www.youtube.com/embed/ZJG2UIJmQxc?rel=0";
        var ytb02_url = "https://www.youtube.com/embed/gTLrfJBKmGI?rel=0";
        var ytb03_url = "https://www.youtube.com/embed/8y8JNZapAB0?rel=0";
        var ytb04_url = "https://www.youtube.com/embed/6-W1MgmE8dc?rel=0";

        $(document).ready(function(){
            /*영상탭*/
            $(".tabContentsEvt").hide();
            $(".tabContentsEvt:first").show();
            $(".youtubeTab a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#ytb01"){
                    html_str = "<iframe src='"+ytb01_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb02"){
                    html_str = "<iframe src='"+ytb02_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb03"){
                    html_str = "<iframe src='"+ytb03_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#ytb04"){
                    html_str = "<iframe src='"+ytb04_url+"' allowfullscreen></iframe>";
                }
                $(".youtubeTab a").removeClass("active");
                $(this).addClass("active");
                $(".tabContentsEvt").hide();
                $(".tabContentsEvt").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });

            /*강의탭*/
            var $active, $links = $(this).find('.tabs li a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
            $links.not($active).each(function () {
                $(this.hash).hide()
            });

            $(".r_btn_tab").click(function () {
                var offset = $('.tabs').offset();
                $('html, body').animate({scrollTop : offset.top}, 400);

                var activeTab = $(this).data("tab-id");
                $(".tabs li a").removeClass("active");
                $('#menu_tab'+activeTab).addClass("active");
                $(".tabContents").hide();
                $('#tab'+activeTab).fadeIn();
                return false;
            });

            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();
                return false;
            });
        });
    </script>

@stop