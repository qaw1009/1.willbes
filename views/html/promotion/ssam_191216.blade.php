@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}

        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/191216_top_bg.jpg) no-repeat center top}
        .evt02 {background:#262767; position:relative}
            .conuter {position:absolute; width:288px; height:140px; left:50%; top:182px; margin-left:-639px; background:url(https://static.willbes.net/public/images/promotion/2020/09/181206_02_1.png) no-repeat left top; z-index:10; display:none}
            .conuter ul {margin:54px 0 0 84px}
            .conuter li {display:inline; float:left}
            .conuter li span {display:block; width:52px; height:62px; line-height:62px; color:#febb75; text-align:center; font-size:28px; font-weight:bold}
            .conuter ul:after {content:""; display:block; clear:both}

        .evt03 {background:#fff; width:1278px; margin:0 auto; padding:80px 0}
            .tabs {width:346px; float:left; margin-left:10px}
            .tabs ul {background:#e9eef1; border:1px solid #baced5; padding:22px 20px}
            .tabs li {height:50px; line-height:50px; border-bottom:1px solid #c7d1db; text-align:left}
            .tabs li:last-child {border:0}
            .tabs a {font-size:18px !important; color:#000; display:block; padding:0 20px 0 30px; background:url(https://static.willbes.net/public/images/promotion/2020/09/181206_list_dot.jpg) no-repeat 10px center;}
            .tabs a:hover,
            .tabs a.active {background:#006687 url(https://static.willbes.net/public/images/promotion/2020/09/181206_list_dot.jpg) no-repeat 10px center; color:#fff}
            .tabs strong {float:right}

            .tabCts {float:right; margin-right:10px; width:872px; position:relative; }
            .tabCts .lecInfo {border:5px solid #ddd; margin-top:22px; text-align:left; position:relative;
            background: url(https://static.willbes.net/public/images/promotion/2020/09/181216_03_bg.jpg) repeat-y 400px top;		 
            }
            .tabCts .lecInfoL {margin:15px; float:left; width:43%; min-height:200px}
            .tabCts .lecInfoL table {width:100%}
            .tabCts .lecInfoL th {padding:10px 0; text-align:left;}
            .tabCts .lecInfoL tr:nth-child(1) th {padding: 0 0 10px}
            .tabCts .lecInfoL td {line-height:1.4; padding:2px 4px; font-size:14px; letter-spacing:-1px}
            .tabCts .lecInfoL td:nth-child(1),
            .tabCts .lecInfoL td:nth-child(3) {color:#000; width:13%; text-decoration:underline; padding:2px 0}
            .tabCts .lecInfoL th strong {padding:5px 20px; color:#000; font-weight:500; font-size:18px; background:#ddd; height:40px !important; line-height:40px !important; border-radius:20px}
            .btnDc {position:absolute; bottom:20px; left:20px; width:300px; z-index:10; }
            .btnDc a {display:block; text-align:center; color:#fff; font-size:20px; background:#39F; padding:20px 0}
            .tabCts .lecInfoL div {font-size:14px; line-height:1.5; margin-top:20px}

            .tabCts .lecInfoR {float:left; padding:20px 0 110px 20px; width:50%; height:100%}
            .tabCts .lecInfoR p {font-size:18px; font-weight:600; margin-bottom:30px; color:#000}
            .tabCts .lecInfoR p span {display:inline-block; width:30px; height:30px; line-height:30px; color:#fff; background:#17aec1; border-radius:15px; text-align:center; font-size:18px}
            .tabCts .lecInfoR p span.sty01 {background:#38af00;}
            .tabCts .lecInfoR input {width:22px; height:22px; margin-right:5px; vertical-align:middle}
            .tabCts .lecInfoR div {font-size:12px; text-align:right; margin-top:-20px; margin-bottom:20px}
            .tabCts .lecInfoR div.sty01 {font-size:16px; text-align:center;}
            .tabCts .lecInfoR ul {margin-bottom:30px; width:100%}
            .tabCts .lecInfoR ul li {display:inline; float:left; text-align:center; font-size:18px; color:#000; line-height:1.2}
            .tabCts .lecInfoR ul.cts01 li {width:35%}
            .tabCts .lecInfoR ul.cts01 li:nth-child(2) {height:47px; width:30%}
            .tabCts .lecInfoR ul li:last-child {margin:0}
            .tabCts .lecInfoR li em {font-style:normal; background:#eb400a; color:#fff; font-weight:600; font-size:16px; display:block; width:80%; margin: auto; height:47px; line-height:47px; border-radius:25px}
            .tabCts .lecInfoR li span {display:block; text-decoration:line-through; font-size:22px; color:#666}
            .tabCts .lecInfoR li strong {display:block; font-size:22px}
            .tabCts .lecInfoR ul:after {content:""; display:block; clear:both}

            .tabCts .lecInfoR ul.ctsBtns {
                position: absolute;
                bottom: 21px;
                left: 424px;
                width: 465px;
                z-index: 10
            }
            .tabCts .lecInfoR ul.ctsBtns li {margin-right:5px}
            .tabCts .lecInfoR ul.ctsBtns li:last-child {margin:0}
            .tabCts .lecInfoR ul:last-child {margin:0}
            .tabCts .lecInfo:after {content:""; display:block; clear:both}		
            
        .evt03:after {content:""; display:block; clear:both}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/09/181206_04_bg.jpg) no-repeat center top}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/09/181206_05_bg.jpg) no-repeat center top}

        .evnInfo {width:100%; background:#000; padding:80px 0; text-align:left}
        .evnInfo ul {width:1046px; margin:0 auto}
        .evnInfo h3 {font-size:22px; color:#000; width:1046px; margin:0 auto; margin-bottom:20px; color:#C00}
        .evnInfo li {font-size:14px; margin-bottom:8px; list-style:decimal; margin-left:15px; letter-spacing:normal; color:#fff}
	
        .lecInfoR .areaBtn {
            position: absolute;	
            top:750px;
            left:424px;
            width: 420px;
            z-index: 11;
        }
        .lecInfoR .areaBtn table {width:100%; border-bottom:1px solid #000; border-right:1px solid #000;}
        .lecInfoR .areaBtn th,
        .lecInfoR .areaBtn td {text-align:center; font-size:16px; text-align:center; border-top:1px solid #000; border-left:1px solid #000; font-weight:bold}
        .lecInfoR .areaBtn th {padding:15px 0; background:#ccc; color:#000}
        .lecInfoR .areaBtn a {display:block; color:#333; background:#e4e4e4; text-align:center; font-size:14px; padding:15px 0;}
        .lecInfoR .areaBtn a:hover {background:#333; color:#fff;}  
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/191216_top.jpg" alt="윌비스 임용 연간 패키지">
        </div>
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/191216_01.jpg" alt="혜택">
        </div>
        <div class="evtCtnsBox evt03">
            <div class="tabs">
                <ul>
                    <li><a href="#tab01">유아 <strong>민정선 교수님</strong></a></li>
                    <li><a href="#tab02">초등 <strong>배재민 교수님</strong></a></li>
                    <li><a href="#tab03">교육학 <strong>김차웅 교수님</strong></a></li>
                    <li><a href="#tab04">교육학 <strong>이인재 교수님</strong></a></li>
                    <li><a href="#tab06">국어문법 <strong>권보민 교수님</strong></a></li>
                    {{--<li id="re1"><a href="#tab08">전공영어 <strong>공훈 교수님</strong></a></li>--}}
                    <li><a href="#tab10">전공수학 <strong>김철홍 교수님</strong></a></li>
                    <li><a href="#tab11">수학교육론 <strong>박태영 교수님</strong></a></li>
                    <li><a href="#tab12">도덕윤리 <strong>김병찬 교수님</strong></a></li>
                    <li><a href="#tab13">전공역사 <strong>최용림 교수님</strong></a></li>
                    <li><a href="#tab18">전공음악 <strong>다이애나 교수님</strong></a></li>
                    <li><a href="#tab14">전기 <strong>최우영 교수님</strong></a></li>
                    <li><a href="#tab15">전자 <strong>최우영 교수님</strong></a></li>
                    <li><a href="#tab16">통신 <strong>최우영 교수님</strong></a></li>
                    <li><a href="#tab17">정보컴퓨터 <strong>송광진 교수님</strong></a></li>
                    <li><a href="#tab19">전공중국어 <strong>정경미 교수님</strong></a></li>
                </ul>
            </div>

            <div class="tabCts" id="tab01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/191209_03_01.jpg" alt="유아 민정선" usemap="#Mapmjs" border="0">
                <map name="Mapmjs" id="Mapmjs">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>유아교육개론</td>
                            </tr>
                            <tr>
                            <td>3~6월</td>
                            <td>누리과정+관련연수자료+각론이론<br />+법자료+교육과정운영(인강제공)</td>
                            </tr>
                            <tr>
                            <td>7~9월</td>
                            <td>영역별 정리/문제풀이반</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반</td>
                            </tr>
                            <tr>
                            <th colspan="2"><strong>논술강의</strong></th>
                            </tr>
                            <tr>
                            <td>3~6월</td>
                            <td>논술 쓰기의 기본 (기출문제 15주, 인강제공)</td>
                            </tr>
                            <tr>
                            <td>7~9월</td>
                            <td>논술 쓰기반 (영역별 예상문제)</td>
                            </tr>
                            <tr>
                            <th colspan="2"><strong>인강전용강의</strong></th>
                            </tr>
                            <tr>
                            <td colspan="2">안전교육<br />
                                의사소통<br />
                            기출 영역별 분석반</td>
                            </tr>
                        </table>

                        <div class="btnDc">
                            <a href="#none" class="offlecbuy offlecbuy2">2019 연간패키지 수강생<br />추가 할인 적용하기 </a>
                        </div>
                    </div>

                    <div class="lecInfoR" style="height:850px">
                        <p><label><input name="" type="checkbox" id="checkboxMJS1" value="" /> <span>A</span> 2020 연간 패키지 - 논술 포함</label></p>
                        <div>* 1차 대비 강의만 포함(2차 강의는 별도)</div>
                        <ul class="cts01">
                            <li>정상수강료<span>2,270,000원</span></li>
                            <li id="textMJSl1"><em>35%</em></li>
                            <li id="textMJSp1">패키지 구매가<strong>1,475,000원</strong></li>
                        </ul>
                        <p><label><input name="" type="checkbox" id="checkboxMJS2" value="" /> <span class="sty01">B</span> 2020 연간 패키지 - 논술 미 포함</label></p>
                        <div>* 1차 대비 강의만 포함(2차 강의는 별도)</div>
                        <ul class="cts01">
                            <li>정상수강료<span>1,915,000원</span></li>
                            <li id="textMJSl2"><em>35%</em></li>
                            <li id="textMJSp2">패키지 구매가<strong>1,244,000원</strong></li>
                        </ul>
                        <p><label><input name="" type="checkbox" id="checkboxMJS3" value="" /> <span>C</span> 2020 직강영상반 연간 패키지 - 논술 포함</label></p>
                        <ul class="cts01">
                            <li>정상수강료<span>2,270,000원</span></li>
                            <li id="textMJSl3"><em>35%</em></li>
                            <li id="textMJSp3">패키지 구매가<strong>1,475,000원</strong></li>
                        </ul>
                        <p><label><input name="" type="checkbox" id="checkboxMJS4" value="" /> <span class="sty01">D</span> 2020 직강영상반 연간 패키지 - 논술 미포함</label></p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,915,000원</span></li>
                            <li id="textMJSl4"><em>35%</em></li>
                            <li id="textMJSp4">패키지 구매가<strong>1,244,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns" style="top:610px">
                            <li><a href="#none" class="offlecbuy offlecbuy2" id="aFMJS"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy onlecbuy2" id="aOMJS"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                        <div class="areaBtn">
                            <table cellspacing="0" cellpadding="0">
                                <col/>
                                <col />
                                <col />
                                <tr>
                                <th colspan="3">전국라이브 강의 신청 바로 가기</th>
                                </tr>
                                <tr>
                                <td><a href="#none">대구 라이브 영상반 &gt;</a></td>
                                <td><a href="#none">부산 라이브 영상반 &gt;</a></td>
                                <td><a href="#none">광주 라이브 영상반 &gt;</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="tabCts" id="tab02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_02.jpg" alt="초등 배재민" usemap="#Mapbjm" border="0">
                <map name="Mapbjm" id="Mapbjm">
                    <area shape="rect" coords="43,409,267,454" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,460,267,504" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>기본이론반</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>기출분석반</td>
                            </tr>
                            <tr>
                            <td>4~5월</td>
                            <td>(예체능) 각론분석반</td>
                            </tr>
                            <tr>
                            <td>6~8월</td>
                            <td>통합 서브노트반</td>
                            </tr>
                            <tr>
                            <td>9월</td>
                            <td>기본문풀반</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>심화문제풀이</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,730,000원</span></li>
                            <li><em>53%</em></li>
                            <li>패키지 구매가<strong>810,000원</strong></li>
                        </ul>
                        <div>* 12월 31일 이후 945,000원 으로 변경 됩니다.</div>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab03">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/pkg_kcu_200303.jpg" alt="교육학 김차웅" usemap="#Mapkcw" border="0">
                <map name="Mapkcw" id="Mapkcw">
                    <area shape="rect" coords="43,409,267,454" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,459,267,503" href="#none" target="_blank" alt="교수페이지" />
                    <area shape="rect" coords="424,461,700,507" href="#none" alt="적중영상바로보기" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>입문이론</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>기본이론</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>원본 알짜306 논점쓰기(1)</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>원본 알짜306 논점쓰기(2)</td>
                            </tr>
                            <tr>
                            <td>9~11월</td>
                            <td>실전 모의고사</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>심층면접(2차)</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,700,000원</span></li>
                            <li><em>35%</em></li>
                            <li>패키지 구매가<strong>1,100,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab04">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181216_03_04.jpg" alt="교육학 이인재" usemap="#Maplij" border="0">
                <map name="Maplij" id="Maplij">
                    <area shape="rect" coords="43,411,267,456" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>이론 정규강의 패키지</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>[입문] 기초 논술 이론반</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>기초 심화반</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>기출분석 및 이론반</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>문제 풀이반</td>
                            </tr>
                            <tr>
                            <td>9~11월</td>
                            <td>실전 모의고사반</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,750,000원</span></li>
                            <li><em>43%</em></li>
                            <li>패키지 구매가<strong>990,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab06">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_05.jpg" alt="국어문법 권보민" usemap="#Mapgbm" border="0">
                <map name="Mapgbm" id="Mapgbm">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>현대국어문법 디딤돌 기초반+특강 2강좌</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>중세국어문법 디딤돌 기초반+특강 2강좌</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>현대국어문법과 중세국어문법 디딤돌 심화반+특강 2강좌</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>미니모의고사 문법 비상(飛翔)반+특강 2강좌</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전모의고사 1+특강 2강좌</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>실전모의고사 2+특강 2강좌</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,640,000원</span></li>
                            <li><em>35%</em></li>
                            <li>패키지 구매가<strong>1,066,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab10">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_10.jpg" alt="전공수학 김철홍" usemap="#Mapkch" border="0">
                <map name="Mapkch" id="Mapkch">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>내용학</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>미분기하학 마스터반 [5주]</td>
                            </tr>
                            <tr>
                            <td>2월</td>
                            <td>미분기하학 문제풀이반 [3주]</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>- 대수학 마스터반(기본이론+문제풀이)<br />
                            - 해석학 마스터반(기본이론+문제풀이)</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>- 위상수학 마스터반(기본이론+문제풀이)<br />
                            - 복소해석학 마스터반(기본이론+문제풀이)</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>문제풀이반</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반 (내용학+교육론)</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>
                            최종 정리반<br />
                                - [인강전용] 선형대수학 마스터반(기본이론+문제풀이) (2019년 강의)<br />
                                - [인강전용] 미적분학 및 다변수해석학 마스터반(기본이론+문제풀이) (2019년 강의)<br />
                                - [인강전용] 이산수학 마스터반(기본이론+문제풀이) (2020년 강의)"
                            </td>
                            </tr>
                            <tr>
                            <th colspan="2"><strong>수학교육론</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>신기한 이론반</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>수학교육과정과 교재연구</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>기출 100선</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>단원별 모의고사반</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반 (내용학+교육론)</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td> 파이널 특강</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>3,570,000원</span></li>
                            <li><em>50%</em></li>
                            <li>패키지 구매가<strong>1,785,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab11">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_11.jpg" alt="수학교육론 박태영" usemap="#Mappty" border="0">
                <map name="Mappty" id="Mappty">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                        <tr>
                            <th colspan="2"><strong>내용학</strong></th>
                        </tr>
                        <tr>
                            <td>1~2월</td>
                            <td>미분기하학 마스터반 [5주]</td>
                        </tr>
                        <tr>
                            <td>2월</td>
                            <td>미분기하학 문제풀이반 [3주]</td>
                        </tr>
                        <tr>
                            <td>3~4월</td>
                            <td>- 대수학 마스터반(기본이론+문제풀이)<br />
                            - 해석학 마스터반(기본이론+문제풀이)</td>
                        </tr>
                        <tr>
                            <td>5~6월</td>
                            <td>- 위상수학 마스터반(기본이론+문제풀이)<br />
                            - 복소해석학 마스터반(기본이론+문제풀이)</td>
                        </tr>
                        <tr>
                            <td>7~8월</td>
                            <td>문제풀이반</td>
                        </tr>
                        <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반 (내용학+교육론)</td>
                        </tr>
                        <tr>
                            <td>11월</td>
                            <td> 최종 정리반<br />
                            - [인강전용] 선형대수학 마스터반(기본이론+문제풀이) (2019년 강의)<br />
                            - [인강전용] 미적분학 및 다변수해석학 마스터반(기본이론+문제풀이) (2019년 강의)<br />
                            - [인강전용] 이산수학 마스터반(기본이론+문제풀이) (2020년 강의)&quot; </td>
                        </tr>
                        <tr>
                            <th colspan="2"><strong>수학교육론</strong></th>
                        </tr>
                        <tr>
                            <td>1~2월</td>
                            <td>신기한 이론반</td>
                        </tr>
                        <tr>
                            <td>3~4월</td>
                            <td>수학교육과정과 교재연구</td>
                        </tr>
                        <tr>
                            <td>5~6월</td>
                            <td>기출 100선</td>
                        </tr>
                        <tr>
                            <td>7~8월</td>
                            <td>단원별 모의고사반</td>
                        </tr>
                        <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반 (내용학+교육론)</td>
                        </tr>
                        <tr>
                            <td>11월</td>
                            <td> 파이널 특강</td>
                        </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>3,570,000원</span></li>
                            <li><em>50%</em></li>
                            <li>패키지 구매가<strong>1,785,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab12">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_13.jpg" alt="도덕윤리 김병찬" usemap="#Mapkbc" border="0">
                <map name="Mapkbc" id="Mapkbc">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>

                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>교과 내용학 Ⅰ</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>교과 내용학 Ⅱ</td>
                            </tr>
                            <tr>
                            <td>4~5월</td>
                            <td>기출문제 분석</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>교과 교육론</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>영역별, 주제별 문제풀이</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,980,000원</span></li>
                            <li><em>13%</em></li>
                            <li>패키지 구매가<strong>1,728,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="tabCts" id="tab13">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/pkg_cyr_200303.jpg" alt="전공역사 최용림" usemap="#Mapcyl01" border="0">
                <map name="Mapcyl01" id="Mapcyl01">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>

                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>이론반</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>심화이론</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>기출문제분석</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>영역문제풀이</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전모의고사</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>핵심 FINAL<br />
                            출제 예상주제 및 모의고사</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>1,580,000원</span></li>
                            <li><em>40%</em></li>
                            <li>패키지 구매가<strong>948,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab18">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/pkg_ana_200305.jpg" alt="전공음악 다이애나" usemap="#MapDiana01" border="0">
                <map name="MapDiana01" id="MapDiana01">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>

                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>전공음악 화성학<br />
                                전공음악 기본이론</td>
                            </tr>
                            <tr>
                            <td>3~7월</td>
                            <td>
                                전공음악 종음셋 (국악)<br />
                                전공음악 종음셋 (서양음악)<br />
                                전공음악 종음셋 (음악교육론)<br />
                                전공음악 한줄정리 (국악)<br />
                                전공음악 한줄정리 (서양음악)<br />
                                전공음악 개론서 (국악)<br />
                                전공음악 개론서 (서양음악)<br />
                                전공음악 개론서 (음악교육론)
                            </td>
                            </tr>
                            <tr>
                            <td>5월</td>
                            <td>전공음악 교과서 분석반</td>
                            </tr>
                            <tr>
                            <td>8~10월</td>
                            <td>전공음악 영역별 문제풀이<br />
                                전공음악 기출문제 분석
                            </td>
                            </tr>
                            <tr>
                            <td>10~11월</td>
                            <td>전공음악 실전 모의고사<br />
                                전공음악 스파르타 Final 이론정리
                            </td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>2021학년도 대비 전공음악 All FreePass</p>
                        <ul class="cts01">
                            <li>정상수강료<span>4,220,000원</span></li>
                            <li><em>58%</em></li>
                            <li>패키지 구매가<strong>1,790,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab14">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_15_1.jpg" alt="전기 최우영" usemap="#Mapcwy01" border="0">
                <map name="Mapcwy01" id="Mapcwy01">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>

                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>전기 part</strong></th>
                            </tr>
                            <tr>
                            <td colspan="2">[인강전용]  기초전기전자,전기기기,전력,기출문제분석</td>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>회로이론, 전기자기학</td>
                            </tr>
                            <tr>
                            <td>3~5월</td>
                            <td>전자회로(전자공학)</td>
                            </tr>
                            <tr>
                            <td>6월</td>
                            <td>제어</td>
                            </tr>
                            <tr>
                            <td>7~9월</td>
                            <td>영역별 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>10~11월</td>
                            <td>전기 모의고사</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>2,590,000원</span></li>
                            <li><em>42%</em></li>
                            <li>패키지 구매가<strong>1,490,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab15">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_15_2.jpg" alt="전자 최우영" usemap="#Mapcwy02" border="0">
                <map name="Mapcwy02" id="Mapcwy02">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>전자 part</strong></th>
                            </tr>
                            <tr>
                            <td colspan="2">[인강전용] 기초전기전자, 마이크로프로세서, 전자기기,기출문제분석</td>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>회로이론, 전기자기학</td>
                            </tr>
                            <tr>
                            <td>3~5월</td>
                            <td>전자회로(전자공학)</td>
                            </tr>
                            <tr>
                            <td>3~6월</td>
                            <td>통신이론 + 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>7~9월</td>
                            <td>영역별 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>10~11월</td>
                            <td>전자 모의고사</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>2,690,000원</span></li>
                            <li><em>45%</em></li>
                            <li>패키지 구매가<strong>1,490,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab16">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_15_3.jpg" alt="통신 최우영" usemap="#Mapcwy03" border="0">
                <map name="Mapcwy03" id="Mapcwy03">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>통신 part</strong></th>
                            </tr>
                            <tr>
                            <td colspan="2">[인강전용] 기초전기전자, 마이크로프로세서, 기출문제분석</td>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>회로이론, 전기자기학</td>
                            </tr>
                            <tr>
                            <td>3~5월</td>
                            <td>전자회로(전자공학)</td>
                            </tr>
                            <tr>
                            <td>3~6월</td>
                            <td>통신이론 + 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>영역별 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>10~11월</td>
                            <td>통신 모의고사</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>2,490,000원</span></li>
                            <li><em>40%</em></li>
                            <li>패키지 구매가<strong>1,490,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab17">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190103_wsamskj.jpg" alt="정보컴퓨터 송광진" usemap="#Mapskj" border="0">
                <map name="Mapskj" id="Mapskj">
                    <area shape="rect" coords="43,412,267,457" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,463,267,507" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~3월</td>
                            <td>내용학 일반과정</td>
                            </tr>
                            <tr>
                            <td>4~6월</td>
                            <td>내용학 심화과정</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>내용학 기출문제 분석</td>
                            </tr>
                            <tr>
                            <td>7~9월</td>
                            <td>내용학 적중 문제풀이반</td>
                            </tr>
                            <tr>
                            <td>10~11월</td>
                            <td>최종 모의고사반, 마무리 특강, C언어 특강</td>
                            </tr>
                        </table>
                        <br />
                        <br />
                        <div>
                        ※ 정보컴퓨터 연간패키지는 개별 단과에서 제공되는 기간만큼만 수강 할 수 있습니다. (1년간 제공하지 않음)<br />
                        Ex.) 1~3월 내용학 일반과정(150일제공)
                        </div>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>2,950,000원</span></li>
                            <li><em>25%</em></li>
                            <li>패키지 구매가<strong>2,212,500원</strong></li>
                        </ul>

                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tabCts" id="tab19">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_03_18.jpg" alt="전공중국어 정경미" usemap="#Mapjkm" border="0">
                <map name="Mapjkm" id="Mapjkm">
                    <area shape="rect" coords="43,409,267,454" href="#none" alt="샘플강의" />
                    <area shape="rect" coords="44,459,267,503" href="#none" target="_blank" alt="교수페이지" />
                </map>
                <div class="lecInfo">
                    <div class="lecInfoL">
                        <table>
                            <tr>
                            <th colspan="2"><strong>정규강의</strong></th>
                            </tr>
                            <tr>
                            <td>1~2월</td>
                            <td>기본이론Ⅰ, 기본 독해Ⅰ</td>
                            </tr>
                            <tr>
                            <td>3~4월</td>
                            <td>기본이론Ⅱ, 기본 독해Ⅱ, 단원별 모의고사</td>
                            </tr>
                            <tr>
                            <td>5~6월</td>
                            <td>심화이론반, 심화 독해반, 기출문제 특강</td>
                            </tr>
                            <tr>
                            <td>7~8월</td>
                            <td>영역별 문제풀이반/핵심체크반, 독해 마스터반</td>
                            </tr>
                            <tr>
                            <td>9~10월</td>
                            <td>실전 모의고사반</td>
                            </tr>
                            <tr>
                            <td>11월</td>
                            <td>최종 정리 모의고사반</td>
                            </tr>
                        </table>
                    </div>

                    <div class="lecInfoR">
                        <p>1년 전 과정 FULL PACKAGE</p>
                        <ul class="cts01">
                            <li>정상수강료<span>3,630,000원</span></li>
                            <li><em>50</em></li>
                            <li>패키지 구매가<strong>1,815,000원</strong></li>
                        </ul>
                        <ul class="ctsBtns">
                            <li><a href="#none" class="offlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn01.jpg" alt="학원강의 바로 구매하기"></a></li>
                            <li><a href="#none" class="onlecbuy"><img src="https://static.willbes.net/public/images/promotion/2020/09/181206_btn02.jpg" alt="인터넷강의 바로 구매하기"></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_04.jpg" alt="초심을 잃지 마세요">
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/181206_05.jpg" alt="수강생의 약 75%는 윌비스임용 연간 패키지를 선택했습니다.">
        </div>

        <div class="evtCtnsBox evnInfo">
            <h3>유의사항</h3>
            <ul>
                <li>문화상품권은 2019년 12월 24일(화) 17시까지 접수자에 한하여 지급합니다. (한시적 이벤트)</li>
                <li>패키지 결제 시에만 카운트 됩니다. (가상계좌의 경우 입금 완료 순)</li>
                <li>본 페이지에 등록된 과목만 인정되며, 이외 과목 패키지는 각 교수 페이지에서 구매 가능합니다.</li>
                <li>문화상품권 이벤트 당첨자들에게는 1월 중순이후 개별적으로 문자발송 드릴 예정입니다.</li>
                <li>온라인 문화 상품권이 문자 발송됩니다.</li>
                <li>추후 환불 요청시, 받으신 문화상품권에 대한 금액은 차감 됩니다.</li>
                <li>패키지 강의는 1차 대비 강의만 포함됩니다.(2차 강의는 별도)</li>
                <li>패키지 강의의 경우 365일 기간 제공이 되며, 일시중지 및 유료 연장은 없습니다.</li>
                <li>패키지 강의 환불은 기간, 수강률, 자료 다운 유무 등에 따라 큰 금액을 공제하며, 강좌의 원금액을 기준으로 공제가 됩니다.</li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    <script>
        /*tab*/
        $(document).ready(function(){
            $('.tabs ul').each(function(){
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
    </script>
@stop