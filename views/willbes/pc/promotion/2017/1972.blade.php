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
        .tabCts {float:right; width:777px; border-top:5px solid #000;}

        .tabTop {background:#4b66b0; border:1px solid #c4c4c4; border-top:0}
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
        .tabBottom td {padding:30px; text-align:left; line-height:1.5; vertical-align: top;}
        .tabBottom td:nth-child(1) {background:#f3f3f3}
        .tabBottom td:nth-child(1) li {margin-bottom:5px}
        .tabBottom td:nth-child(1) li span {display:inline-block; color:#2c4fad; width:50px; margin-right:10px}
        .tabBottom td:nth-child(1) li.sTitle {font-size:17px; margin:10px 0}
        .tabBottom td:nth-child(1) li.sTitle:nth-child(1) {margin-top:0}
        .tabBottom td input {width:22px; height:22px; vertical-align: middle; margin-right:5px}
        .tabBottom td:nth-child(2) {font-size:19px}
        .tabBottom td:nth-child(2) li:nth-child(1) {margin-bottom:20px}
        .tabBottom td:nth-child(2) strong {display:inline-block; width:26px; height:26px; line-height:26px; text-align:center; color:#fff; background:#17aec1; border-radius:13px;}
        .tabBottom td:nth-child(2) > div:nth-child(2) strong {background:#38af00;}
        .tabBottom td:nth-child(2) p {font-size:12px; padding-left:25px; color:#999}
        .tabBottom td:nth-child(2) > div {position:relative; margin-bottom:30px}
        .tabBottom td:nth-child(2) div li:last-child {position:absolute; bottom:0; right:20px; background:#ffd800; width:60px; height:60px; line-height:60px; 
            text-align:center; border-radius:30px; color:#000}
        .tabBottom td:nth-child(2) > div:nth-child(3) {margin:0}
        .tabBottom td:nth-child(2) > div:nth-child(3) a {display:inline-block; width:47%; margin-right:10px; color:#fff; background:#111; font-size:20px;
            padding:15px 0; text-align:center; line-height:1.2}
        .tabBottom td:nth-child(2) > div:nth-child(3) a:last-child {background:#4b66b0}

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
                    <li><a href="#tab01">· 유아 <span>민정선 교수님</span></a>
                    <li><a href="#tab02">· 초등 <span>배재민 교수님</span></a>
                    <li><a href="#tab03">· 교육학 <span>정 현 교수님</span></a>
                    <li><a href="#tab04">· 전공체육 <span>최규훈 교수님</span></a>
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
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51076/prof_detail_51076.png" alt="민정선"></div></li>
                                <li class="NSK-thin">유아<br> <strong class="NSK-Black">민정선</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51076?cate_code=3135&subject_idx=1981" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab02">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51077/prof_detail_51077.png" alt="배재민"></div></li>
                                <li class="NSK-thin">초등<br> <strong class="NSK-Black">배재민</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51077?cate_code=3136&subject_idx=1982" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab03">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51158/prof_detail_51158.png" alt="정 현"></div></li>
                                <li class="NSK-thin">교육학<br> <strong class="NSK-Black">정 현</strong> 교수<li>
                                <li>
                                    <a href="#none">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab04">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51156/prof_detail_51156.png" alt="최규훈"></div></li>
                                <li class="NSK-thin">전공체육<br> <strong class="NSK-Black">최규훈</strong> 교수<li>
                                <li>
                                    <a href="#none">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab05">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51080/prof_detail_51080.png" alt="권보민"></div></li>
                                <li class="NSK-thin">국어문법<br> <strong class="NSK-Black">권보민</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51080?cate_code=3137&subject_idx=1983" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab06">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51081/prof_detail_51081.png" alt="김유석"></div></li>
                                <li class="NSK-thin">전공영어<br> <strong class="NSK-Black">김유석</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51081?cate_code=3137&subject_idx=1984" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab07">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51084/prof_detail_51084.png" alt="김철홍"></div></li>
                                <li class="NSK-thin">전공수학<br> <strong class="NSK-Black">김철홍</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51084?cate_code=3137&subject_idx=1985" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab08">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51085/prof_detail_51085.png" alt="박태영"></div></li>
                                <li class="NSK-thin">수학교육론<br> <strong class="NSK-Black">박태영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51085?cate_code=3137&subject_idx=1986" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab09">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51088/prof_detail_51088.png" alt="김병찬"></div></li>
                                <li class="NSK-thin">도덕윤리<br> <strong class="NSK-Black">김병찬</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51088?cate_code=3137&subject_idx=1989" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab10">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51089/prof_detail_51089.png" alt="최용림"></div></li>
                                <li class="NSK-thin">전공역사<br> <strong class="NSK-Black">최용림</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51089?cate_code=3137&subject_idx=1990" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab11">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51090/prof_detail_51090_1606459468.png" alt="다이애나"></div></li>
                                <li class="NSK-thin">전공음악<br> <strong class="NSK-Black">다이애나</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51090?cate_code=3137&subject_idx=1991" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab12">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">전기<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab13">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">전자<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab14">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51091/prof_detail_51091.png" alt="최우영"></div></li>
                                <li class="NSK-thin">통신<br> <strong class="NSK-Black">최우영</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51091?cate_code=3137&subject_idx=1992" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab15">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51092/prof_detail_51092.png" alt="송광진"></div></li>
                                <li class="NSK-thin">정보컴퓨터<br> <strong class="NSK-Black">송광진</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51092?cate_code=3137&subject_idx=1993" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div id="tab16">
                    <div class="tabTop">
                        <div class="left">
                            <ul>
                                <li><div><img src="https://ssam.willbes.net/public/uploads/willbes/professor/51094/prof_detail_51094.png" alt="정경미"></div></li>
                                <li class="NSK-thin">전공중국어<br> <strong class="NSK-Black">정경미</strong> 교수<li>
                                <li>
                                    <a href="/professor/show/prof-idx/51094?cate_code=3137&subject_idx=1995" target="_blank">교수페이지 바로가기</a>
                                    <a href="#none">합격전략 설명회 보기</a>
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
                                                    <div class="NSK-Black"><input type="checkbox"><strong>A</strong> 2020 연간 패키지 - 논술 포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <ul>
                                            <li>
                                                <label>                                                    
                                                    <div class="NSK-Black"><input type="checkbox"><strong>B</strong> 2020 연간 패키지 - 논술 미포함</div>
                                                    <p>* 1차 대비 강의만 포함 (2차 강의는 별도)</p>
                                                </label>
                                            </li>
                                            <li class="tx-gray">정상수강료 : <s>2,270,000원</s></li>
                                            <li>패키지 구매가 : <span class="NSK-Black">1,470,000원</span></li>
                                            <li><div class="NSK-Black">35%</div></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#none"><span class="NSK-Black">학원강의</span><br> 바로 구매하기</a>
                                        <a href="#none"><span class="NSK-Black">온라인강의</span><br> 바로 구매하기</a>
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