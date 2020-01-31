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

        .skybanner {position:fixed;top:50px;right:10px;width:122px;z-index:10;}

        /*타이머*/
        .time {width:100%; text-align:center; background:#000}
        .time {text-align:center; padding:20px 0}
        .time table {width:1120px; margin:0 auto}
        .time table td:first-child {/*font-size:40px*/}
        .time table td img {width:70%}
        .time .time_txt {font-size:28px; color:#fff; letter-spacing: -1px; font-weight:600}
        .time .time_txt a {font-size:14px; display:block; margin-top:10px; border:1px solid #fff; padding:5px; border-radius:15px}
        .time .time_txt a:hover {background:#fff; color:#000}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time p {text-align:center}

        .wb_top {background:#e6e6e6 url(https://static.willbes.net/public/images/promotion/2019/12/1071_top_bg.jpg) no-repeat center top;position:relative;}

        
        /* 탭 */
        .tabContaier{padding-top:20px; padding-bottom:120px; position:absolute;left:515px;top:730px; z-index:10}
        .tabContaier ul {text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left;}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:''; display:block; clear:both}
        .tabContentsEvt iframe {width:876px; height:480px;}

        .wb_cts01_1 {background:#9E97FF url(https://static.willbes.net/public/images/promotion/2020/01/1071_01_bg.jpg) no-repeat center top;}

        .wb_cts01_2 {background:#E4E4E4;}

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
       
        /*탭(텍스트)*/
        .tabContaier2{width:960px;margin:0 auto;}
        .tabContaier2 li{display:inline-block;width:480px;height:60px;line-height:60px;background:#e8be2d;color:#000;float:left;font-size:18px;font-weight:bold;margin-top:-59.9px;}
        .tabContaier2:after {content:""; display:block; clear:both}
        .tabContaier2 li a{display:block;}
        .tabContaier2 li a:hover,
        .tabContaier2 li a.active {background:#e4e4e4;color:#000;}

        .wb_cts04 {background:#e4e4e4;position:relative;padding-bottom:150px;}

        .check { position:absolute; bottom:7%; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3;z-index:5;font-weight:bold;}
        .check label {cursor:pointer; font-size:14px}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#252525; margin-left:50px; border-radius:20px}
        .check a:hover {background:#ffc600; color:#252525}
        
        input[id="cb1"]:checked + label {background-color: red;}

        .wb_tip{background:#fff; padding:100px 0;}
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
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1468" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1071_sky2.png" alt="">
            </a>
        </div>         
        
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1071_top.gif" alt="전기/통신 수험생의 이유있는 선택 최우영교수"  >
            <div class="tabContaier">
                <ul class="youtubeTab">
                    <li>
                        <a class="active" href="#ytb01">
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1071_top_tap01off.jpg"  class="off" alt="통신직 off"/>
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1071_top_tap01on.jpg" class="on" alt="통신직 on" />
                        </a>
                    </li>
                    <li>
                        <a href="#ytb02">
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1071_top_tap02off.jpg"  class="off" alt="전기직 off"  />
                            <img src="https://static.willbes.net/public/images/promotion/2019/08/1071_top_tap02on.jpg"  class="on" alt="전기직 on"/>
                        </a>
                    </li>       
                </ul>

                <div class="tabContentsEvt" id="ytb01">
                    <iframe width="876px" height="480px" src="https://www.youtube.com/embed/rPN9bxcaiLU" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="tabContentsEvt" id="ytb02">                 
                </div>        
            </div><!--tabContaier//-->
        </div>       

        <div class="evtCtnsBox wb_cts01_1">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1071_01_1.jpg" alt="이유있는 선택"  > 
        </div>    

        <div class="evtCtnsBox wb_cts01_2">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1071_01_2.jpg" alt="커리큘럼"  > 
        </div>    

        <div class="evtCtnsBox wb_cts02" id="pkglec">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1071_03_1.jpg" alt="윌비스 최우영 교수의 전기/통신직 패키지"  usemap="#Map1071C" border="0" href="https://pass.willbes.net/periodPackage/show/cate/3019/pack/648001/prod-code/155797"  />
            <map name="Map1071C" id="Map1071C">
                <area shape="rect" coords="117,808,383,912" href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/155797" target="_blank" alt="통신기술직" onfocus="this.blur();"/>
                <area shape="rect" coords="423,809,686,912" href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/155798" target="_blank" alt="전송기술직" onfocus="this.blur();"/>
                <area shape="rect" coords="742,806,994,912" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/155799" target="_blank" alt="전기직" onfocus="this.blur();" />                
                <area shape="rect" coords="711,1228,918,1275" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/158347" target="_blank" alt="문풀패키지" />
                <area shape="rect" coords="711,1447,919,1490" href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/158349" target="_blank" alt="기출문풀패키지" />
            </map>
        </div>      

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
                        <td>2020 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156377" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 [군무원7급/서울시7급] 최우영 디지털공학 이론/문제</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156685" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157561" target="_blank">수강신청</a></td>
                    </tr> 
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 기출 단원문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159135" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 무선공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156378" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>무선공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157562" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156377" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 [군무원7급/서울시7급] 최우영 디지털공학 이론/문제</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156685" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157561" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 기출 단원문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159135" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156379" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2020 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157563" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157562" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156379" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2020 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157563" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 무선/통신 공통 단원별문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157562" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전기이론 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157559" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전기기기 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155800" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전기기기 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157560" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전기기기 기본강의</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/155800" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전기기기</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전기기기 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157560" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 회로이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159133" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156377" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 [군무원7급/서울시7급] 최우영 디지털공학 이론/문제</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156685" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157561" target="_blank">수강신청</a></td>
                    </tr> 
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 기출 단원문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159135" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 전자공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156377" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>디지털공학</td>
                        <td>이론</td>
                        <td>2019 [군무원7급/서울시7급] 최우영 디지털공학 이론/문제</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156685" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157561" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>전자공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 전자공학 기출 단원문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/159135" target="_blank">수강신청</a></td>
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
                        <td>2020 최우영 통신공학 이론</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/156379" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>이론</td>
                        <td>2020 최우영 통신이론 (이론/문풀)</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157563" target="_blank">수강신청</a></td>
                    </tr>
                    <tr>
                        <td>통신공학</td>
                        <td>문제풀이</td>
                        <td>2020 최우영 무선/통신 공통 단원별 문제풀이</td>
                        <td><a href="https://pass.willbes.net/lecture/show/cate/3028/pattern/only/prod-code/157562" target="_blank">수강신청</a></td>
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
        
        {{--
        <div class="evtCtnsBox wb_cts04">      
            <div class="tabContaier2">    
                <ul>    
                    <li><a href="#tabs1" id="tabs1_btn" class="active">최우영 통신직 T-PASS</a></li>
                    <li><a href="#tabs2" id="tabs2_btn">최우영 전기직 T-PASS</a></li>
                </ul>
            </div> 
            <div id="tabs1" class="tabContents2">       
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1071_04_tab1.png" usemap="#Map1071z" title="" border="0" id="evt1"/>
                <map name="Map1071z" id="Map1071z">
                    <area shape="rect" coords="754,616,934,726" href="javascript:go_PassLecture('159161');" >
                </map>
            </div>
            <div id="tabs2" class="tabContents2">       
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1071_04_tab2.png" usemap="#Map1071y"  title="" border="0" id="evt2"/>
                <map name="Map1071y" id="Map1071y">
                    <area shape="rect" coords="746,618,936,726" href="javascript:go_PassLecture('159162');" >
                </map>
            </div>   
            <div class="check">
                <label>
                    <input type="checkbox" name="ischk" value="Y" id="cb1">
                    페이지 하단 최우영 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다. 
                </label>
                <a href="#tip">이용안내확인하기 ↓</a>
            </div>   
        </div>  
        --}}

         <!-- 타이머 -->
         <div class="evtCtnsBox time NGEB"  id="newTopDday">
            <div>
                <table>
                    <tr>                       
                        <td class="time_txt">마감까지</td>
                        <td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">day </td>
                        <td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">:</td>
                        <td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
                        <td class="time_txt">남았습니다.<br></td>                     
                    </tr>
                </table>                
            </div>
        </div>
        
        {{--
        <div class="evtCtnsBox wb_tip" id="tip">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1071_tip.jpg" alt="유의사항"  > 
        </div>        
        --}}               
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var ytb01_url = "https://www.youtube.com/embed/rPN9bxcaiLU";
        var ytb02_url = "https://www.youtube.com/embed/eRrHTbcFBtY";

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

            /*탭(텍스터버전)*/
            $(".tabContents2").hide();
            $(".tabContents2:first").show();
            $(".tabContaier2 ul li a").click(function(){
                tpassTabClick(this);
            });

            $(".tabContents2 li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();
                return false;
            });

            /*디데이카운트다운*/
            dDayCountDown('{{$arr_promotion_params['edate']}}');
        });

        function tpassTabClick(obj) {
            var activeTab = $(obj).attr("href");
            $(".tabContaier2 ul li a").removeClass("active");
            $(activeTab + '_btn').addClass("active");
            $(".tabContents2").hide();
            $(activeTab).fadeIn();
            return false;
        }

        function go_PassLecture(code) {
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            var url = '{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }
    </script>

{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    

@stop

