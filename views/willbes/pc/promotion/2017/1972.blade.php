@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span,
        .evtContent s {vertical-align:bottom;}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; font-size:14px}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/1972_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#27c9d7;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1972_02_bg.jpg) no-repeat center top;}

        .evt03 {width:1120px; margin:0 auto; padding:100px 0}
        .evt03:after {content:''; display:block; clear:both}

        .tabs {float:left; width:300px; box-shadow:0 0 20px rgba(0,0,0,.2); border-radius:10px}
        .tabs ul {margin:16px; }
        .tabs li {border-bottom:1px solid #ddd; text-align:left;}
        .tabs li:last-child {border:0}
        .tabs li a {display:block; height:52px; line-height:52px; font-size:17px; padding:0 10px}
        .tabs li a span {font-weight:bold; float:right}
        .tabs li a.active,
        .tabs li a:hover {background:#ffd800}

        .tabCts {float:right; width:777px;}
        .tabCts .ctsTitle {font-size:38px; text-align:left; margin-bottom:20px; color:#232323}
        .tabCts .ctsTitle span {color:#cb1800}
        .tabTop {background:#4b66b0; border:1px solid #c4c4c4; border-top:5px solid #000;}
        .tabTop .left {float:left; width:276px}
        .tabTop .left li:nth-child(1) div {width:188px; height:188px; margin:50px auto 0; border-radius:94px; background:#fff; box-shadow:0 0 20px rgba(0,0,0,.3); overflow:hidden}
        .tabTop .left li:nth-child(1) div img {width:100%}
        .tabTop .left li:nth-child(2) {padding:20px 0; color:#fff; font-size:25px; line-height:1.2}
        .tabTop .left li a {display:block; border:1px solid #fff; height:40px; line-height:40px; color:#fff; font-size:14px; margin:0 30px 10px;
            background:url(https://static.willbes.net/public/images/promotion/2020/12/1972_arr_icon.png) no-repeat 90% center;}
        .tabTop .left li a:hover {background:#fff; color:#4b66b0}
        .tabTop .right {float:right}
        .tabTop:after {content:''; display:block; clear:both}

        .tabBottom {margin-top:40px; border:1px solid #c4c4c4;}
        .tabBottom td {padding:30px 20px; text-align:left; line-height:1.5; vertical-align: top;}
        .tabBottom td:nth-child(1) {background:#f3f3f3}
        .tabBottom td:nth-child(1) li {margin-bottom:5px; padding-left:60px; position:relative}
        .tabBottom td:nth-child(1) li span {position:absolute; left:0; display:inline-block; color:#2c4fad;}
        .tabBottom td:nth-child(1) li.sTitle {font-size:15px; margin:10px 0; padding:0}
        .tabBottom td:nth-child(1) li.sTitle:nth-child(1) {margin-top:0}
        .tabBottom td input {width:20px; height:20px; vertical-align: middle; margin-right:5px}
        .tabBottom td:nth-child(2) {font-size:16px}
        .tabBottom td:nth-child(2) li:nth-child(1) {margin-bottom:20px;}
        .tabBottom td:nth-child(2) li label .NSK-Black {letter-spacing:-1px}
        .tabBottom td:nth-child(2) strong {display:inline-block; width:26px; height:26px; line-height:26px; text-align:center; color:#fff; background:#17aec1; border-radius:13px;}
        .tabBottom td:nth-child(2) > div:nth-child(2) strong {background:#38af00;}
        .tabBottom td:nth-child(2) p {font-size:12px; padding-left:25px; color:#999}
        .tabBottom td:nth-child(2) > div {position:relative; margin-bottom:30px}
        .tabBottom td:nth-child(2) div li:last-child {position:absolute; bottom:0; right:20px; background:#ffd800; width:60px; height:60px; line-height:60px; 
            text-align:center; border-radius:30px; color:#000}
        .tabBottom td:nth-child(2) > div:last-child {margin:0}
        .tabBottom td:nth-child(2) > div:last-child a {display:inline-block; width:47%; margin-right:10px; color:#fff; background:#111; font-size:20px;
            padding:15px 0; text-align:center; line-height:1.2}
        .tabBottom td:nth-child(2) > div:last-child a:nth-child(2) {background:#4b66b0}
        .tabBottom td:nth-child(2) > div:last-child.three a {width:30%;}
        .tabBottom td:nth-child(2) > div:last-child a:nth-child(3) {background:#1bd3e1}
        .tabBottom td h5 {border-radius:10px; color:#fff; text-align:center; background:#4b66b0; padding:10px 0; width:100%; margin-bottom:10px; font-size:14px}

        .evt04 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1972_04_bg.jpg) no-repeat center top;}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/12/1972_05_bg.jpg) no-repeat center top;}

        .evtInfo {padding:80px 0; background:#fff; color:#242424; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox h4 span {color:#e30000}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:30px; margin-bottom:10px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1972_top.jpg" alt="2022학년도 연간패키지"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1972_01.jpg" alt="열공지원금 팡팡"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1972_02.jpg" alt="특별이벤트"/>
        </div>

        <div class="evtCtnsBox evt03">
            <div class="tabs">
                <ul>                    
                    <li><a href="#tab01">· 초등 <span>배재민 교수님</span></a>
                    <li><a href="#tab02">· 교육학 <span>정 현 교수님</span></a>
                    <li><a href="#tab03">· 전공체육 <span>최규훈 교수님</span></a>
                    <li><a href="#tab04">· 전공국어 <span>송원영 교수님</span></a>
                    <li><a href="#tab05">· 국어문법 <span>권보민 교수님</span></a>
                    <li><a href="#tab06">· 전공영어 <span>김유석 교수님</span></a>
                    <li><a href="#tab07">· 전공수학 <span>김철홍 교수님</span></a>
                    <li><a href="#tab08">· 수학교육론 <span>박태영 교수님</span></a>
                    <li><a href="#tab09">· 도덕윤리 <span>김병찬 교수님</span></a>
                    <li><a href="#tab10">· 전공역사 <span>최용림 교수님</span></a>
                    <li><a href="#tab11">· 전공음악 <span>다이애나 교수님</span></a>
                    <li><a href="#tab12">· 전기 <span>최우영 교수님</span></a>
                    <li><a href="#tab13">· 전자 <span>최우영 교수님</span></a>
                    <li><a href="#tab14">· 통신 <span>최우영 교수님</span></a>
                    <li><a href="#tab15">· 정보컴퓨터 <span>송광진 교수님</span></a>
                    <li><a href="#tab16">· 전공중국어 <span>정경미 교수님</span></a>
                </ul>  
            </div>

            <div class="tabCts">
                <div id="tab01">
                    <div class="ctsTitle NSK-Black">광범위한 교과내용을 <span>체계적인 강의</span>로 정리!!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51077/prof_detail_51077.png" alt="배재민"></div></li>
                                <li class="NSK-thin">초등<br> <strong class="NSK-Black">배재민</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">샘플강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r02.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span> 기본이론반</li>
                                        <li><span>3월</span> 기출분석반</li>
                                        <li><span>4월</span> 국정지도서분석반</li>
                                        <li><span>5월</span> 검정지도서분석반</li>
                                        <li><span>6~8월</span> 유아교육개론</li>
                                        <li><span>9월</span> 과목별 문제풀이반(기본문풀)</li>
                                        <li><span>10월</span> 실전 모의고사반(심화문풀)</li>
                                    </ul>
                                </td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"> 1년 전과정 Full Package</div>
                                                    <p>* 교재 별도 구매</p>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 학원강의 : 2021년 1월~10월<br>
                                                        - 온라인강의 : 326일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,000,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,400,000원</span></li>
                                            <li><div class="NSK-Black">30%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab02">
                    <div class="ctsTitle NSK-Black">교육학 고득점을 위한 <span>최적의 Solution</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51158/prof_detail_51158.png" alt="정 현"></div></li>
                                <li class="NSK-thin">교육학<br> <strong class="NSK-Black">정 현</strong> 교수<li>
                                <li>
                                    <a href="#none">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r03.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 (1~6월) 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년 VZONEdu 교육학 기본이론반</li>
                                        <li><span>1월</span> 교육사철학</li>
                                        <li><span>2월</span> 교육과정</li>
                                        <li><span>3월</span> 교육심리</li>
                                        <li><span>3월</span> 교육방법</li>
                                        <li><span>4월</span> 교육행정</li>
                                        <li><span>5월</span> 교육평가</li>
                                        <li><span>6월</span> 생활지도 및 교육사회</li>
                                        <li class="sTitle NSK-Black">2021년 VZON 전공체육 기본이론반</li>
                                        <li><span>1월</span> 체육교육론</li>
                                        <li><span>2월</span> 체육측정평가</li>
                                        <li><span>3월</span> 운동생리학</li>
                                        <li><span>4월</span> 운동역학</li>
                                        <li><span>5월</span> 운동학습과 심리</li>
                                        <li><span>6월</span> 스포츠사회학</li>
                                        <li><span>6월</span> 체육사ㆍ철학</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1~6월 기본이론 Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">VZONEdu(교육학) 기본이론 + VZON(전공체육) 기본이론 패키지</div>
                                                    <p>* 교재 별도 구매</p>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 직강 LIVE : 2021년 1월~6월<br>
                                                        - 온라인강의 : 240일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,820,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,600,000원</span></li>
                                            <li><div class="NSK-Black">12%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">직강LIVE</span><br>수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br>수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab03">
                    <div class="ctsTitle NSK-Black">전공체육 고득점을 위한 <span>최적의 Solution</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51156/prof_detail_51156.png" alt="최규훈"></div></li>
                                <li class="NSK-thin">전공체육<br> <strong class="NSK-Black">최규훈</strong> 교수<li>
                                <li>
                                    <a href="#none">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r04.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 (1~6월) 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">[정규강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                        <li class="sTitle NSK-Black">[논술강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1~6월 기본이론 Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">VZONEdu(교육학) 기본이론 + VZON(전공체육) 기본이론 패키지</div>
                                                    <p>* 교재 별도 구매</p>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 직강 LIVE : 2021년 1월~6월<br>
                                                        - 온라인강의 : 240일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,820,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,600,000원</span></li>
                                            <li><div class="NSK-Black">12%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">VZON(전공체육) 기본이론 패키지</div>
                                                    <p>* 교재 별도 구매</p>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 직강 LIVE : 2021년 1월~6월<br>
                                                        - 온라인강의 : 240일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,320,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,250,000원</span></li>
                                            <li><div class="NSK-Black">약5%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">직강LIVE</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab04">
                    <div class="ctsTitle NSK-Black">국어ㆍ문학교육론! 체계적이면서 <span>완벽한 자료!!</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51078/prof_detail_51078.png" alt="송원영"></div></li>
                                <li class="NSK-thin">전공국어<br> <strong class="NSK-Black">송원영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51078?cate_code=3137&subject_idx=1983" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">샘플강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r01.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span> 국어/문학교육론 이론정리반</li>
                                        <li><span>3~4월</span> 국어/문학교육론 교육과정 정리 및 문학작품 분석반</li>
                                        <li><span>5~6월</span> 국어/문학교육론 교육과정 적용, 구체화 및 문학작품 분석반(갈래이론 및 문학사)</li>
                                        <li><span>7~8월</span> 국어/문학교육론 문제풀이를 통한 이론정리반</li>
                                        <li><span>9~10월</span> 실전 모고를 통한 이론완성+파이널 시험 직전 출제 예상테마</li>
                                        <li class="sTitle NSK-Black tx-center tx18">+</li>
                                        <li class="sTitle NSK-Black">권보민 교수님 연간 패키지 </li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2021 연간 패키지</div>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 학원강의 : 2021년 1월~11월<br>
                                                        - 온라인강의 : 365일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,640,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,066,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab05">
                    <div class="ctsTitle NSK-Black">깊게 이해하고 쉽게 푸는 <span>국어문법</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51080/prof_detail_51080.png" alt="권보민"></div></li>
                                <li class="NSK-thin">국어문법<br> <strong class="NSK-Black">권보민</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51080?cate_code=3137&subject_idx=1983" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">샘플강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r04.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span>
                                            - 현대 국어 문법 기초 다지기<br>
                                            - 기출문제 분석 및 응용반 1<br>
                                            - 중세 국어 문법 감각 기르기 (중세 국어 문법 개론서 예문 분석 1)
                                        </li>
                                        <li><span>3~4월</span>
                                            - 중세 국어 문법 기초 다지기 <br>
                                            - 기출문제 분석 및 응용반2<br>
                                            - 중세 국어 문법 적용력 기르기 (중세 국어 문법 개론서 예문 분석 2 및 자료 강독 1)
                                        </li>
                                        <li><span>5~6월</span>
                                            - 현대 국어 문법과 중세 국어 문법 강화하기<br>
                                            - 중세 국어 문법 확장하기(중세 국어 원전 자료 강독 2)<br>
                                            - 문법 개론서 정리('우리말문법론' 핵심 정리) 
                                        </li>
                                        <li><span>7~8월</span>
                                            - 문법 갈무리 미니모의고사<br>
                                            - 적중 예상 문제 300제 특강<br>
                                            - 핵심 주제 문법 특강 1
                                        </li>
                                        <li><span>9~10월</span>
                                            - 실전모의고사 1<br>
                                            - 중세 국어 문법 열매 맺기 (중세 국어 원전 자료 강독 3)<br>
                                            - 핵심 주제 문법 특강 2<br>
                                        </li>
                                        <li><span>11월</span>
                                            - 실전모의고사 2<br>
                                            - 중세 국어 문법 파이널 갈무리<br>
                                            - 현대 국어 문법 파이널 갈무리
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">권보민 교수님 국어문법  패키지</div>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 학원강의 : 2021년 1월~11월<br>
                                                        - 온라인강의 : 365일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,640,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,066,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">권보민 교수님 국어문법 + 송원영 교수님 국어/문학 교육론  패키지</div>
                                                    <div class="NSK tx14 mt10">
                                                        [수강기간]<br>
                                                        - 학원강의 : 2021년 1월~11월<br>
                                                        - 온라인강의 : 365일 * 배수:1.8배수<br>
                                                    </div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,640,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,066,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab06">
                    <div class="ctsTitle NSK-Black">흐름을 꿰뚫는 <span>전략!</span> 차이를 만드는 <span>힘!</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51081/prof_detail_51081.png" alt="김유석"></div></li>
                                <li class="NSK-thin">전공영어<br> <strong class="NSK-Black">김유석</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">샘플강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r06.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span> 일반영어 Power Reading(5판)</li>
                                        <li><span>1~2월</span> 영미문학 영미시의 이해</li>
                                        <li><span>3~4월</span> 일반영어 Power Prose Writing</li>
                                        <li><span>5~6월</span> 일반영어/영미문학 기출 모의고사반</li>
                                        <li><span>3~4월</span> 영미문학 영미소설의 이해</li>
                                        <li><span>5~6월</span> 영미시/영미소설 문제적용반</li>
                                        <li><span>7~8월</span> 일반영어/영미문학 상위권 문제풀이반</li>
                                        <li><span>9~11월</span> 일반영어/영미문학 상위권 모의고사반</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,040,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,700,000원</span></li>
                                            <li><div class="NSK-Black">17%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab07">
                    <div class="ctsTitle NSK-Black">수학 <span>“내용학+교육론”</span> 합격을 위한 One Team</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51084/prof_detail_51084.png" alt="김철홍"></div></li>
                                <li class="NSK-thin">전공수학<br> <strong class="NSK-Black">김철홍</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51084?cate_code=3137&subject_idx=1985" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r07.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <ul>
                                        <li class="sTitle NSK-Black">[정규강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                        <li class="sTitle NSK-Black">[논술강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                    </ul>
                                </td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab08">
                    <div class="ctsTitle NSK-Black">수학 <span>“내용학+교육론”</span> 합격을 위한 One Team</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51085/prof_detail_51085.png" alt="박태영"></div></li>
                                <li class="NSK-thin">수학교육론<br> <strong class="NSK-Black">박태영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r08.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <ul>
                                        <li class="sTitle NSK-Black">[정규강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                        <li class="sTitle NSK-Black">[논술강의]</li>
                                        <li><span>1~2월</span> 유아교육개론</li>
                                        <li><span>3~4월</span> 유아교육개론</li>
                                        <li><span>5~6월</span> 유아교육개론</li>
                                    </ul>
                                </td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab09">
                    <div class="ctsTitle NSK-Black">독보적인 도덕ㆍ윤리, <span>명품 강의!</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51088/prof_detail_51088.png" alt="김병찬"></div></li>
                                <li class="NSK-thin">도덕윤리<br> <strong class="NSK-Black">김병찬</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r09.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~2월</span> 교과 내용학 Ⅰ</li>
                                        <li><span>3~4월</span> 교과 내용학 Ⅱ</li>
                                        <li><span>4~5월</span> 기출문제 분석</li>
                                        <li><span>5~6월</span> 교과교육론</li>
                                        <li><span>7~8월</span> 영역별ㆍ주제별 문제풀이</li>
                                        <li><span>9~10월</span> 모의고사</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~10월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,980,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">1,728,000원</span></li>
                                            <li><div class="NSK-Black">13%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab10">
                    <div class="ctsTitle NSK-Black">최적의 <span>학습전략</span>으로 합격의 역사를 쓴다!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51089/prof_detail_51089.png" alt="최용림"></div></li>
                                <li class="NSK-thin">전공역사<br> <strong class="NSK-Black">최용림</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r10.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span> 임용역사 이론반</li>
                                        <li><span>3~4월</span> 임용역사 심화이론</li>
                                        <li><span>5~6월</span> 임용역사 기출문제분석</li>
                                        <li><span>7~8월</span> 임용역사 영역ㆍ단원별 문제풀이</li>
                                        <li><span>9~10월</span> 임용역사 실전모의고사 </li>
                                        <li><span>11월</span> 임용역사 핵심 FINAL - 출제 예상 주제 및 모의고사</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~11월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>1,580,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">948,000원</span></li>
                                            <li><div class="NSK-Black">40%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab11">
                    <div class="ctsTitle NSK-Black">구조화의 끝판왕! <span>합격의 지름길!!</span></div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51090/prof_detail_51090_1606459468.png" alt="다이애나"></div></li>
                                <li class="NSK-thin">전공음악<br> <strong class="NSK-Black">다이애나</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r11.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021년</li>
                                        <li><span>1~2월</span> 전공음악 기본이론</li>
                                        <li><span>1~2월</span> 전공음악 화성학</li>
                                        <li><span>1~2월</span> 전공음악 한.끝.맵.(한권으로 끝내는 마인드맵)</li>
                                        <li><span>3~4월</span> 전공음악 심화이론</li>
                                        <li><span>3~6월</span> 전공음악 한줄정리(국악)</li>
                                        <li><span>3~6월</span> 전공음악 한줄정리(서양음악)</li>
                                        <li><span>3~6월</span> 전공음악 개론서(국악)</li>
                                        <li><span>3~6월</span> 전공음악 개론서(서양음악)</li>
                                        <li><span>3~6월</span> 전공음악 개론서(음악교육론)</li>
                                        <li><span>7~8월</span> 전공음악 문제풀이반</li>
                                        <li><span>7~8월</span> 전공음악 기출문제 풀이반</li>
                                        <li><span>9~10월</span> 전공음악 모의고사반</li>
                                        <li><span>11월</span> 전공음악 파이널 스터디</li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                    <p>* 교재 별도 구매</p>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~6월<br>
                                                    - 직강 LIVE : 2021년 1월~6월<br>
                                                    - 온라인강의 : 240일 * 배수:1.8배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div class="three">
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">직강LIVE</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab12">
                    <div class="ctsTitle NSK-Black">합격하는 그 순간까지 함께 하는 우영쌤~!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">전기<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r12.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~2월</span> 기초 전기전자/회로이론</li>
                                        <li><span>3~6월</span> 전력+문제풀이</li>
                                        <li><span>3~6월</span> 전기자기학</li>
                                        <li><span>7~9월</span> 1~6월, 이론반 통합문제풀이</li>
                                        <li><span>10~11월</span> 전기 모의고사 </li>
                                        <li><span>인강제공</span> 
                                            출문제분석<br>
                                            전기기기+문제풀이<br>
                                            제어+문제풀이
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>                                        
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~11월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab13">
                    <div class="ctsTitle NSK-Black">합격하는 그 순간까지 함께 하는 우영쌤~!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">전자<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r13.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~2월</span> 기초 전기전자/회로이론</li>
                                        <li><span>3~6월</span> 전자회로</li>
                                        <li><span>3~6월</span> 전기자기학</li>
                                        <li><span>7~9월</span> 1~6월, 이론반 통합문제풀이</li>
                                        <li><span>10~11월</span> 전기 모의고사</li>
                                        <li><span>인강제공</span> 
                                            마이크로프로세서+문제풀이<br>
                                            통신+문제풀이<br>
                                            전자기기+문제풀이
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <h5>1년 전과정 Full Package</h5>
                                    <div>                                        
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~11월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab14">
                    <div class="ctsTitle NSK-Black">합격하는 그 순간까지 함께 하는 우영쌤~!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">통신<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r14.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~2월</span> 기초 전기전자/회로이론</li>
                                        <li><span>3~6월</span> 전자회로</li>
                                        <li><span>3~6월</span> 전기자기학</li>
                                        <li><span>7~9월</span> 1~6월, 이론반 통합문제풀이</li>
                                        <li><span>10~11월</span> 전기 모의고사</li>
                                        <li><span>인강제공</span> 
                                            마이크로프로세서+문제풀이<br>
                                            통신+문제풀이<br>
                                            전자기기+문제풀이
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                     <h5>1년 전과정 Full Package</h5>
                                    <div>                                        
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~11월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab15">
                    <div class="ctsTitle NSK-Black">정보컴퓨터의 절대 강자!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51092/prof_detail_51092.png" alt="송광진"></div></li>
                                <li class="NSK-thin">정보컴퓨터<br> <strong class="NSK-Black">송광진</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r15.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~3월</span> 정보컴퓨터 내용학 일반과정</li>
                                        <li><span>4~6월</span> 정보컴퓨너 태용학 심화과정</li>
                                        <li><span>3~4월</span> 정보컴퓨터 내용학 기출문제분석</li>
                                        <li><span>7~9월</span> 정보컴퓨터 적중 문제풀이반</li>
                                        <li><span>10~11월</span> 정보컴퓨터 최종모의고사반(송광진&장순선)</li>
                                        <li><span>인강제공</span> 정보컴퓨터 내용학 C언어 특강</li>
                                    </ul>
                                </td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~11월<br>
                                                    - 온라인강의 : 365일 * 배수:1.6배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab16">
                    <div class="ctsTitle NSK-Black">임용 중국어의 New Paradigm!</div>
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51094/prof_detail_51094.png" alt="정경미"></div></li>
                                <li class="NSK-thin">전공중국어<br> <strong class="NSK-Black">정경미</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">기출 해설강의 보기</a>
                                </li>                                
                            </ul>
                        </div>
                        <div class="right"><img src="https://static.willbes.net/public/images/promotion/2020/12/1972_03_r16.jpg" alt=""/></div>
                    </div>
                    <div class="tabBottom">
                        <table>
                            <col width="276px" />
                            <col />
                            <tr>
                                <td>
                                    <h5>2022학년도 대비 연간 커리큘럼</h5>
                                    <ul>
                                        <li class="sTitle NSK-Black">2021</li>
                                        <li><span>1~4월</span> 전공중국어 기본이론</li>
                                        <li><span>1~4월</span> 전공중국어 기본독해</li>
                                        <li><span>5~6월</span> 전공중국어 기본이론심화</li>
                                        <li><span>5~6월</span> 전공중국어 독해심화</li>
                                        <li><span>7~8월</span> 전공중국어 핵심체크</li>
                                        <li><span>7~8월</span> 전공중국어 독해반</li>
                                        <li><span>9~10월</span> 전공중국어 모의고사</li>
                                    </ul>
                                </td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox">2020 연간 패키지</div>
                                                </label>
                                                <div class="NSK tx14 mt10">
                                                    [수강기간]<br>
                                                    - 학원강의 : 2021년 1월~10월<br>
                                                    - 온라인강의 : 365일 * 배수:1.8배수<br>
                                                </div>
                                            </li>
                                            <li class="tx-gray">원 수강료 : <s>2,800,000원</s></li>
                                            <li>패키지 수강료 : <span class="NSK-Black">2,100,000원</span></li>
                                            <li><div class="NSK-Black">25%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 수강신청</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 수강신청</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1972_04.jpg" alt="초심을 잃지 마세요~!"/>
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1972_05.jpg" alt="합격 패키지"/>
        </div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black"><span>[ 필독 ]</span>  연간패키지 초심응원 이벤트 유의사항</h4>
                <ul>
                    <li>문화상품권은 2020년 12월 31일(목) 17시까지 본 이벤트 페이지에 게시된 패키지 강의 접수자에 한하여 지급합니다. (한시적 이벤트)</li>
                    <li>지급 대상자가 접수 순서에 의하여 1,000명이 초과하면 본 이벤트는 종료합니다.  (선착순 1,000명 도달 시, 이벤트 종료)</li>
                    <li>본 이벤트 페이지에 등록된 과목의 패키지 강의 결제 시에만 카운트 됩니다. (가상계좌의 경우, 임금 완료 순)</li>
                    <li>문화상품권 이벤트 당첨자들에게는 1월 중순 이후 개별적으로 문자발송 드릴 예정입니다. </li>
                    <li>문화상품권 수령을 위해서는 세금 소득신고를 위한 수령자의 주민번호를 요청할 수 있습니다. (본인 입력방식)</li>
                    <li>온라인 문화상품권은 윌비스 홈페이지의 회원정보에 기록된 문자로 발송됩니다. </li>
                    <li>휴대폰 번호 기재 오류로 인한 피해는 본사에서 책임지지 않습니다. </li>
                    <li>문화상품권 수령 후, 패키지 강의 환불을 요청하실 때에는 받으신 문화상품권에 대한 금액은 차감 됩니다. (제세공과금이 포함된 금액 차감)</li>
                    <li>패키지 강의는 1차 대비 강의만 포함됩니다. (2차 강의는 별도)</li>
                    <li>패키지 강의의 경우 365일 기간 제공이 되며, 일시중지 및 유료 연장은 없습니다. <br>
                        ( ※ 과목에 따라 수강기간이 1년(365일) 이하의 상품도 포함될 수 있음) </li>
                    <li>패키지 강의의 환불은 수강기간, 수강률, 자료 다운 유무 등에 따라 금액을 공제하며, 강좌의 원 금액을 기준으로 공제가 됩니다.</li>                     
                </ul>

            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
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