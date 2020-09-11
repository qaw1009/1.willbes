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

        .quick {display:none !important}
        .btnBox {width:100%; text-align:center}
        .btnBox a {width:420px; margin:0 auto; display:inline-block; color:#fff; background:#b9689d; font-size:24px; font-weight:bold; height:60px; line-height:60px; border-radius:30px; border-bottom:3px solid #682c53; text-align:center}
        .btnBox a:hover {background:#682c53;}

        .evtCtnsBox {width:100%; min-width:1278px; margin:0 auto; text-align:center; font-size:14px; line-height:1.4}
        .evtCtnsBox input[type=checkbox] {width:20px; height:20px; vertical-align:middle}

        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_top_bg.jpg) repeat-x center top;}

        .event01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_01_bg.jpg) repeat-x center top;}

        .event02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_02_bg.jpg) repeat-x center top; 
            position:relative; height:855px; padding-top:258px;}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:1063px; margin:0 auto; 0; min-height:399px}
        .slide_con p {position:absolute; top:50%; width:26px; height:29px; margin-top:-13px; background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_arrow.png) no-repeat; z-index:100}

        .slide_con p a {cursor:pointer; display:block; font-size:0; width:26px; height:29px;}
        .slide_con p.leftBtn {left:-42px; background-position:left center}
        .slide_con p.rightBtn {right:-42px; background-position:right center}
        .slide_con li {display:inline; float:left}
        .slide_con li img {width:100%}
        .slide_con ul:after {content:""; display:block; clear:both}

        .event02 .btnmore {width:344px; position:absolute; top:710px; left:50%; margin-left:-172px;}
        .event02 .btnmore a {display:block; padding:15px 0; border:5px solid #ffeb90; font-size:20px; font-weight:600; background:#7c87f8; color:#fff; border-radius:40px}
        .event02 .btnmore a:hover {background:#ffeb90; color:#7c87f8;}

        .event03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_03_bg.jpg) repeat-x center top; padding:250px 0 100px}
        .event03 .profBox {width:1278px; margin:0 auto}
        .event03 .profTab {width:1063px; margin:0 auto; height:129px}
        .event03 .profTab li {display:inline; float:left; width:14.666666%; margin-bottom:15px; margin-right:2%}
        .event03 .profTab li a {display:block; border-radius:20px; border:1px solid #59aaf9; height:42px; line-height:42px; text-align:center; color:#6f6f6f;
            font-size:14px; font-weight:bold; }
        .event03 .profTab li:nth-child(6),
        .event03 .profTab li:last-child {margin-right:0}
        .event03 .profTab li a.active,
        .event03 .profTab li a:hover {background:#157de0; border:1px solid #157de0; color:#fff}
        .event03 .profTab li a.active span,
        .event03 .profTab li:hover a span {color:#ffeb90}
        .event03 .profTab:after {content:""; display:block; clear:both}

        .event04 {background:#cfe05e;}
        .event04 .evtTable {background:url(https://static.willbes.net/public/images/promotion/2020/09/200622_04_02.jpg) repeat-y; width:1278px; margin:0 auto;}
        .event04 .evtTable table {width:85%; margin:0 auto; border-top:1px solid #d0d2d9; border-left:1px solid #d0d2d9}
        .event04 .evtTable table thead th,
        .event04 .evtTable table tbody th {text-align:center;}
        .event04 .evtTable table tr {border-bottom:1px solid #d0d2d9}
        .event04 .evtTable table th,
        .event04 .evtTable table td {border-right:1px solid #d0d2d9; padding:10px 5px}
        .event04 .evtTable table th {background:#e4e4e4}
        .event04 .evtTable table td strong {color:#0021b0}  
        .event04 .evtTable p {margin-right:100px; text-align:right}
        .event04 .evtTable table td a {display:block; color:#fff; border-radius:10px; padding:5px 10px}
        .event04 .evtTable table td a.btnGo {background:#469da2}
        .event04 .evtTable table td a.btnGo2 {background:#ff6600}

        .event05 {background:#393951; padding:80px 0; line-height:1.4}
        .event05Box {width:1100px; margin:0 auto; text-align:left; letter-spacing:normal}
        .event05Box div {color:#ffe677; font-size:20px; font-weight:bold; margin-bottom:20px; border-bottom:1px solid #fee777; padding-bottom:10px}
        .event05Box li {list-style:decimal; margin-left:20px; margin-bottom:10px; color:#fff; font-size:14px}      
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_top.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox event01">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_01.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox event02">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/200622_02_1.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/200622_02_2.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/200622_02_3.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/09/200622_02_4.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><span>이전</span></a>
                <p class="rightBtn"><a id="imgBannerRight3"><span>다음</span></a>
            </div>
            <div class="btnmore"><a href="#none">합격 수기 자세히 보기 ></a></div>
        </div>

        <div class="evtCtnsBox event03">
            <div class="profBox">
            	<ul class="profTab">
                	<li><a href="#tbox01"><div><span>교육논술학</span> 이인재</div></a></li>
                    <li><a href="#tbox02"><div><span>전공국어</span> 권보민</div></a></li>
                    <li><a href="#tbox03"><div><span>전공영어</span> 김유석</div></a></li>
                    <li><a href="#tbox04"><div><span>전공영어</span> 김영문</div></a></li>
                    <li><a href="#tbox05"><div><span>전공영어</span> 공훈</div></a></li>
                    <li><a href="#tbox06"><div><span>전공수학</span> 김철홍</div></a></li>
                    <li><a href="#tbox07"><div><span>수학교육론</span> 박태영</div></a></li>
                    <li><a href="#tbox08"><div><span>도덕윤리</span> 김병찬</div></a></li>
                    <li><a href="#tbox09"><div><span>전공역사</span> 최용림</div></a></li>
                    <li><a href="#tbox10"><div><span>전공음악</span> 다이애나</div></a></li>
                    <li><a href="#tbox11"><div><span>전전통</span> 최우영</div></a></li>
                    <li><a href="#tbox12"><div><span>중국어</span> 정경미</div></a></li>
                </ul>

                <div id="tbox01">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t01.jpg" alt="이인재" usemap="#Map01" border="0" />
                    <map name="Map01" id="Map01">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none');" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox02">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t02.jpg" alt="권보민" usemap="#Map02" border="0" />
                    <map name="Map02" id="Map02">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox03">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t03.jpg" alt="김유석" usemap="#Map03" border="0" />
                    <map name="Map03" id="Map03">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" onclick="javascript:alert('직강은 마감되었습니다.');" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox04">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t04.jpg" alt="김영문" usemap="#Map04" border="0" />
                    <map name="Map04" id="Map04">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox05">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t05.jpg" alt="공훈" usemap="#Map05" border="0" />
                    <map name="Map05" id="Map05">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox06">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t06.jpg" alt="김철홍" usemap="#Map06" border="0" />
                    <map name="Map06" id="Map06">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox07">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t07.jpg" alt="박태영" usemap="#Map07" border="0" />
                    <map name="Map07" id="Map07">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,435,956,488" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,437,1141,487" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox08">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t08.jpg" alt="김병찬" usemap="#Map08" border="0" />
                    <map name="Map08" id="Map08">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox09">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t09.jpg" alt="최용림" usemap="#Map09" border="0" />
                    <map name="Map09" id="Map09">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>
                <div id="tbox10">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t10.jpg" alt="다이애나" usemap="#Map10" border="0" />
                    <map name="Map10" id="Map10">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                      <area shape="rect" coords="805,724,960,778" href="#none" alt="직강2" />
                      <area shape="rect" coords="966,724,1143,778" href="#none"alt="동영상2" />
                      <area shape="rect" coords="804,1077,957,1128" href="#none" alt="직강3" />
                      <area shape="rect" coords="968,1077,1142,1130" href="#none"alt="동영상3" />
                    </map>
                </div>
                <div id="tbox11">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t11.jpg" alt="최우영" usemap="#Map11" border="0" />
                    <map name="Map11" id="Map11">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청1" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의1" />
                      <area shape="rect" coords="804,709,959,759" href="#none" alt="직강신청2" />
                      <area shape="rect" coords="966,708,1144,761" href="#none" alt="동영상강의2" />
                      <area shape="rect" coords="806,1061,957,1111" href="#none" alt="직강신청3" />
                      <area shape="rect" coords="965,1060,1145,1113" href="#none" alt="동영상강의3" />
                    </map>
                </div>
                <div id="tbox12">
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_t12.jpg" alt="정경미" usemap="#Map12" border="0" />
                    <map name="Map12" id="Map12">
                      <area shape="rect" coords="107,373,239,410" href="#none" alt="샘플강의" />
                      <area shape="rect" coords="244,373,370,409" href="#none" alt="교수페이지" />
                      <area shape="rect" coords="806,356,956,409" href="#none" alt="직강신청" />
                      <area shape="rect" coords="967,357,1141,407" href="#none" alt="동영상강의" />
                    </map>
                </div>

                <div>
                	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_03_bottom.png" alt="" />
                </div>
            </div>
		</div><!--//event04-->

        <div class="evtCtnsBox event04">
        	<img src="https://static.willbes.net/public/images/promotion/2020/09/200622_04_01.jpg" alt=""/>
            <div class="evtTable">
                <table>
                    <colgroup>
                        <col width="70">
                        <col width="70">
                        <col width="350">
                        <col>
                        <col width="250">
                        <col width="100">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>과 목</th>
                            <th>교 수</th>
                            <th>과 정 명 </th>
                            <th>강 의 일 정</th>
                            <th>수 강 료 </th>
                            <th>신청하기</th>
                        </tr>
                    </thead>
                    <tbody>                    
                        <tr>
                            <td rowspan="2">유아</td>
                            <td rowspan="2">민정선</td>
                            <td>7~9월 영역별 정리/문제풀이반(10주)&nbsp;<br>
                                <strong class="tx-red">※ 지방라이브반 / 인강반만 접수 가능</strong></td>
                            <td>
                            07월04일(토)~09월05일(토) <br>매주[토] 10:00~18:00</td>
                            <td>
                            495,000원 →<strong> 396,000원</strong>(20%할인)</td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td></tr>
                            <tr>
                            <td>7~9월 논술 영역별 예상문제(9주)<br />
                                <strong class="tx-red">※ 지방라이브반 / 인강반만 접수 가능</strong></td>
                            <td>07월11일(토)~09월05일(토) <br />
                                매주[토] 10:00~18:00<br />
                                논술써보기 09:00~10:00<br />
                                해설강의 17:00~18:00
                                </td>
                            <td>165,000원 →<strong> 132,000원</strong>(20%할인)</td>
                        </tr>
                        <tr>
                            <td rowspan="2">초등</td>
                            <td rowspan="2">배재민</td>
                            <td>6~8월 통합서브노트반</td>
                            <td>
                            06월07일(일)~08월23일(일) <br>매주[일] 13:00~19:00</td>
                            <td>
                            <strong>550,000원</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td></tr>
                            <tr>
                            <td colspan="3" class="tx-left">※<strong class="tx-black"> 2020 초등 연간 FULL 패키지:</strong>&nbsp; 1,730,000원 → <strong>945,000원</strong>(45%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="6">교육학</td>
                            <td rowspan="3">김차웅</td>
                            <td>7~8월 교육학논술 원본 알짜 306 논점쓰기(2)</td>
                            <td>
                            07월06일(월)~08월25일(화) <br>매주[월/화] 09:00~13:30</td>
                            <td>
                            <strong>330,000원</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>교육학논술 원본 알짜 306특강 </td>
                            <td>
                            7월15일(수)/9월16(수) <br>/11월11일(수)
                            [수] 8:00~19:00</td>
                            <td>
                            <strong>90,000원</strong></td>
                            <td><a class="btnGo2" href="http://ssam.willbes.net/classes/spclect/1/wsamkcw/index.html">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">1~11월 연간 FULL 패키지: </strong>&nbsp;1,700,000원 → <strong>1,100,000원</strong> (35%할인) <br>
                            ※ <strong class="tx-black">5~8월 알짜 논점쓰기 패키지:</strong>&nbsp;&nbsp;660,000원 → <strong>550,000원</strong> (17%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">이인재</td>
                            <td>7~8월 이인재 교육학 문제풀이반</td>
                            <td>
                            07월06일(월)~08월25일(화) <br>매주[월/화] 09:30~13:30</td>
                            <td>330,000원 → <strong>297,000원</strong>(10%할인)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">
                            ※<strong class="tx-black"> 1~11월 연간 패키지 </strong>1,750,000원<strong> → 990,000원</strong>(43%할인) <br>
                            ※ <starog class="tx-black">하반기 패키지(문제풀이+모의고사반)</strong> 760,000원 →<strong> 430,000원</strong>(43%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>홍의일</td>
                            <td colspan="3" class="tx-left">
                            <strong class="tx-black">강의일정 추후 공지</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="7">국어</td>
                            <td rowspan="2">송원영</td>
                            <td>7~8월 국어/문학교육론 핵심정리 및 문제풀이반</td>
                            <td>
                            07월02일(목)~08월28일(금) <br>매주[목/금] 10:00~18:00</td>
                            <td>
                            <p>380,000원 → <strong>340,000원</strong>(11%할인)
                            06.30.까지 신청시 320,000원</td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                            <tr>
                            <td>7~8월 국어교육론 핵심정리 및 문제풀이반</td>
                            <td>
                            07월02일(목)~08월27일(목) <br>매주[목] 10:00~18:00</td>
                            <td>
                            <strong>190,000원</strong></td>
                        </tr>
                        <tr>
                            <td>이원근</td>
                            <td colspan="3">
                            <strong>강의일정 추후 공지</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="4">권보민</td>
                            <td>7~8월 미니모의고사 문법 비상(飛翔)반</td>
                            <td>
                            07월04일(토)~08월29일(토) <br>매주[토] 10:30~16:00</td>
                            <td>
                            <strong>200,000원</strong></td>
                            <td rowspan="3"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>7~8월 주제별 특강 1</td>
                            <td>
                            07월04일(토)~08월29일(토) <br>매주[토] 16:00~17:00</td>
                            <td>
                            <strong>50,000원</strong></td></tr>
                            <tr>
                            <td>7~8월 기출문제 분석반 3 특강</td>
                            <td>
                            07월04일(토)~08월29일(토) <br>매주[토] 17:00~18:00</td>
                            <td>
                            <strong>50,000원</strong></td></tr>
                            <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 권보민 국어문법 연간 Full 패키지</strong> 1,640,000원 → 1<strong>,066,000원</strong>(35%할인) <br>
                            ※ <strong class="tx-black">2020 7~11월 권보민 국어문법 하반기 패키지</strong> 740,000원 → <strong>592,000원</strong>(20%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="8">영어</td>
                            <td rowspan="3">김유석</td>
                            <td>
                            7~8월 김유석 일반영어/영미문학 핵심모의고사반<br />
                            <strong class="tx-red">※ 직강마감 / 직영상반 및 인강만 접수 가능</strong></td>
                            <td>
                            07월03일(금)~08월28일(금) <br>매주[금] 09:10~13:00</td>
                            <td>
                            300,000원 →<strong> 280,000원</strong>(7%할인)</td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">7~8월 김유석 직강 채점/컨퍼런스반 (총 2회)</td>
                            <td>
                            <strong>50,000원</strong></td></tr>
                            <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">7~11월 김유석 일반영어/영미문학 모의고사 패키지</strong> 680,000원 → <strong>600,000원</strong>(12%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">공훈</td>
                            <td>7~8월 공훈 영교/영어학 영역별 문제풀이반</td>
                            <td>
                            07월09일(목)~08월27일(목) <br>매주[목] 09:30~12:30</td>
                            <td>
                            <strong>140,000원</strong></td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>7~8월 공훈 Syntax (Andrew Carnie) 원서특강</td>
                            <td>
                            07월09일(목)~08월27일(목) <br>매주[목] 13:30~16:30</td>
                            <td>
                            <strong>140,000원</strong><br>
                            <span  class="tx-red">(직강은 무료)</span></td></tr>
                            <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 공훈 영교론/영어학 연간 패키지</strong>&nbsp; 1,740,000원 →<strong> 960,000원</strong> (45%할인) <br>
                            ※<strong class="tx-black"> 2020 공훈 영교론/영어학 하반기 패키지</strong>&nbsp; 340,000원 → <strong>272,000원</strong> (20%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">김영문</td>
                            <td>7~8월 김영문 영어학 영역별 문제풀이 및 기출 문제풀이반</td>
                            <td>
                            07월02일(목)~08월27일(목) <br>매주[목] 10:00~13:00</td>
                            <td>
                            <strong>140,000원</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td></tr>
                            <tr>
                            <td colspan="3" class="tx-left">※<strong class="tx-black"> 2020 7~11월 영어학 하반기 패키지</strong>&nbsp; 340,000원 → <strong>272,000원</strong> (20%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="5">수학</td>
                            <td>김철홍</td>
                            <td>7~8월 문제풀이반(10회 과정) (2~4회 수요일 보강 진행 예정)</td>
                            <td>
                            07월10일(금)~08월28일(금) <br>매주[금]13:00~19:00</td>
                            <td>400,000원 → <strong>360,000원</strong>(10%할인)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">박태영</td>
                            <td>7~8월 단원별 모의고사반</td>
                            <td>
                            07월09일(목)~08월27일(목) <br>매주[목] 10:00~13:00</td>
                            <td>200,000원 → <strong>180,000원</strong>(10%할인)</td>
                            <td rowspan="3"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>하반기 특강 1：감점 없는 답안지 작성 특강</td>
                            <td>
                            07월23일(목) 14:00~17:00</td>
                            <td>
                            <strong>30,000원</strong></td></tr>
                            <tr>
                            <td>하반기 특강 2：빈칸 채우기 특강</td>
                            <td>
                            08월27일(목) 14:00~17:00</td>
                            <td>
                            <strong>30,000원</strong></td></tr>
                            <tr>
                            <td colspan="4" class="tx-left">※ <strong class="tx-black">2020 (1~11월) 전공수학(내용학+교육론) 연간 Full 패키지</strong> 3,800,000원 → <strong>1,785,000원</strong>(약 53%할인) <br>
                            ※ <strong class="tx-black">2020 (7~11월) 수학내용학 실전완성 패키지</strong> 820,000원 → <strong>492,000원</strong>(40%할인) <br>
                            ※ <strong class="tx-black">2020 (7~11월) 수학교육론 하반기 패키지</strong> 460,000원 → <strong>240,000원</strong>(48%할인) <br>※ 직강 수강생 : 전 강좌 인강 복습용(0.8배수) 강의 제공</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">생물</td>
                            <td>강치욱</td>
                            <td>5~8월 내용학 기출, 예제문제 풀이</td>
                            <td>
                            05월09일(토)~08월29일(토) <br>매주[토] 12:00~20:00</td>
                            <td>
                            720,000원 → <strong>660,000원</strong>(8%할인)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>양혜정</td>
                            <td>7~8월 생물교육론 문제풀이</td>
                            <td>
                            07월15일(수)~09월02일(수) <br>매주[수] 10:00~17:00</td>
                            <td>
                            360,000원 → <strong>340,000원</strong>(6%할인)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">도덕<br>윤리</td>
                            <td rowspan="2">김병찬</td>
                            <td>7~8월 영역별․주제별 문제풀이</td>
                            <td>
                            07월09일(목)~09월03일(목) <br>매주[목] 10:00~18:00</td>
                            <td>
                            330,000원 → <strong>300,000원</strong>(9%할인)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 (1~10월) 도덕윤리 연간 Full 패키지</strong> 1,980,000원 → <strong>1,728,000원</strong>(약 13%할인) <br>
                            ※ <strong class="tx-black">2020 (7~10월) 도덕윤리 하반기 패키지</strong> 660,000원 → <strong>600,000원</strong>(약 9%할인) <br>
                            ※ 직강 수강생 : 전 강좌 인강 복습용(0.6배수) 강의 제공</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">역사</td>
                            <td rowspan="2">최용림</td>
                            <td>7~8월 임용역사 영역문제풀이(8주 과정)</td>
                            <td>
                            07월01일(수)~08월27일(목) <br>매주[수/목] 10:00~18:00</td>
                            <td>
                            280,000원 <br>→ 직강 <strong>140,000원</strong>(50% 할인) <br>→ 인강<strong> 196,000원</strong>(30% 할인) <br>(개강 전 사전 접수 시 / 개강 이후 접수 시 10% 할인 예정)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 최용림 전공역사 연간 Full 패키지</strong> 1,580,000원 → <strong>1,264,000원</strong>(20%할인) <br>
                            ※ <strong class="tx-black">2020 최용림 전공역사 하반기 패키지</strong> 740,000원 →<strong> 592,000원</strong>(20%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">음악</td>
                            <td rowspan="3">다이애나</td>
                            <td>7~9월 전공음악 영역별 문제풀이</td>
                            <td>&nbsp; </td>
                            <td>
                            <strong>520,000원</strong></td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td></tr>
                            <tr>
                            <td>7~9월 전공음악 기출문제 분석</td>
                            <td>&nbsp; </td>
                            <td>
                            <strong>280,000원</strong></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                            ※ <strong>2020 (1~11월) 전공음악 All Free Pass 패키지</strong> 4,220,000원 → <strong>1,790,000원</strong>(58%할인)<br />
                            ※ <strong>2020 (7~12월) 전공음악 special 하반기 패키지</strong> 1,630,000원 → <strong>1,000,000원</strong>(39%할인)<br />
                            ※<strong> 2020 (7~12월) 전공음악&nbsp;basic&nbsp;하반기&nbsp;패키지</strong> 1,350,000원 → <strong>850,000원</strong>(37%할인)<br />
                            ※ <strong>2020 (7~11월) 전공음악&nbsp;simple 패키지</strong> 800,000원 → <strong>750,000원</strong>(7%할인)
                            </td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">전기<br>전자<br>통신</td>
                            <td rowspan="2">최우영</td>
                            <td>7~9월 영역별 문제풀이반(1~5월 통합 이론반)</td>
                            <td>
                            07월13일(월)~09월30일(수)<br>
                            매주 월 14:00~ <br>매주 수 09:00~</td>
                            <td>
                            450,000원 → <strong>405,000원</strong>(10%할인) <br>(20. 6. 30.까지)</td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 전지/전자/통신 연간 Full 패키지</strong> <strong>1,490,000원</strong>(정가의 40% 이상 할인 중) <br>
                            ※ <strong class="tx-black">2020 전지/전자/통신 하반기 패키지</strong> <strong>730,000원</strong>(정가의 20%할인)</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                            <tr>
                            <td rowspan="2">정보<br>컴퓨터</td>
                            <td rowspan="2">송광진</td>
                            <td>7~9월 정보컴퓨터 적중 문제풀이반</td>
                            <td>
                            07월05일(일)~09월20일(일) <br>매주[일] 13:00~19:00</td>
                            <td>
                            600,000원 → <strong>570,000원</strong>(5%할인)</td>
                            <td><a class="btnGo2" href="http://ssam.willbes.net/classes/lecture/22/wsamskj/index.html">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 송광진 정보컴퓨터 내용학 All-in-one 패키지</strong> 2,950,000원 → <strong>2,212,500원</strong>(25%할인), 직/인강 <br>
                            ※ <strong class="tx-black">2020 송광진 정보컴퓨터 7~11월 하반기 패키지</strong> 1,000,000원 → <strong>800,000원</strong>(20%할인), 직/인강</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="2">
                            <div><span style="font-size: 10pt;">정컴</span></div>
                            <div><span style="font-size: 10pt;">교육론</span></div></td>
                            <td rowspan="2">장순선</td>
                            <td>8월 정컴교육론 문제풀이반</td>
                            <td>
                            08월08일(토)~08월29일(토) <br>매주[토] 13:00~17:00</td>
                            <td>
                            <strong>200,000원</strong></td>
                            <td><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="tx-left">※ <strong class="tx-black">2020 장순선 정컴교육론 All Pass 패키지</strong> 600,000원 → <strong>510,000원</strong>(15%할인), 직/인강</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td rowspan="3">중국어</td>
                            <td rowspan="3">정경미</td>
                            <td>7~8월 영역별 문제풀이+핵심체크반</td>
                            <td>
                            07월05일(일)~08월23일(일) <br>매주[일] 09:30~18:30</td>
                            <td>
                            340,000원 → <strong>306,000원</strong>(10%할인)<br>(20. 6. 30.까지)</td>
                            <td rowspan="2"><a class="btnGo2" href="#none">신청하기</a></td>
                        </tr>
                        <tr>
                            <td>7~8월 독해 마스터반</td>
                            <td>
                            07월06일(월)~08월24일(월) <br>매주[월] 09:30~18:30</td>
                            <td>
                            340,000원 → <strong>306,000원</strong>(10%할인)<br>
                            (20. 6. 30.까지)</td></tr>
                            <tr>
                            <td colspan="3">※ <strong class="tx-black">2020 정경미 중국어 연간 패키지</strong>&nbsp; 3,630,000원 →<strong> 1,815,000원</strong>(50%할인), 직/인강 <br>
                            ※ <strong class="tx-black">2020 정경미 중국어 하반기 패키지</strong> 1,140,000원 → <strong>741,000원</strong>(35%할인), 직/인강</td>
                            <td><a class="btnGo" href="#none">신청하기</a></td>
                        </tr>
                    </tbody>
                </table>
                &nbsp;
                <p>※ 상기 내용은 학원 사정 상 변경될 수 있습니다.</p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/09/200622_04_03.jpg" alt=""/>
        </div>

        <div class="evtCtnsBox event05">
            <div class="event05Box">
                <div>[문제풀이 신청시 유의사항]</div>
                <ul>
                    <li>7월이후 진행되는 문제풀이 및 모의고사 강의는 강의 자료를 다운받는 행위 자체가 '강의수강'으로 간주 됩니다.</li>
                    <li>수강료의 총액을 동영상강의(50%)와 프린트(50%)로 간주하여 강의 승인 후 프린트물을 다운로드 한 경우 수강료의 50%를 공제한 후 환불규정 16조 3항에 따라 환불 가능합니다.</li>
                    <li>할인혜택을 받아서 수강하신 경우 환불시, 원 수강료에서 기산됩니다.</li>
                    <li>학원의 수강증 및 동영상 ID는 양도 및 매매 또는 공유가 불가능하며, 위반시 처벌을 받게 됩니다.</li>
                    <li>상기 강의일정 및 동영상 업로드 일정은 학원의 사정상 변경될 수 있습니다.</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });

        $(document).ready(function(){
            $('.profTab').each(function(){
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