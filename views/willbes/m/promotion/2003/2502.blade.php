@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; font-size:1.6vh clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    /*타이머*/
    .dday {font-size:2.4vh !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.4vh !important;}

    .apply_bg {background:#43AAF9;padding-bottom:50px}

    .wb_cts05 {background:#43AAF7;padding:10vh 0;}
    .wb_cts05 .ctTilte {color:#fff; letter-spacing:-1px; font-size:2vh; margin-bottom:5vh}
    .wb_cts05 .ctTilte h5 {font-size:4.4vh;}
    .wb_cts05 .ctTilte p {font-size:3.6vh;}
    .wb_cts05 .ctTilte strong {color:#fff901}

    .lecWrap {line-height:1.5; font-size:1.6vh; color:#333; padding:0 2vh}
    .lecWrap .pass {margin-bottom:10px; display:block; border-radius:10px; background:#fff; padding:2vh; text-align:left; font-size:2vh;}
    .lecWrap .titleBox div:nth-child(1) {font-weight:300; color:#0065ef}
    .lecWrap .titleBox div:nth-child(2) {margin-bottom:2vh; font-size:3vh}
    .lecWrap .titleBox div:nth-child(3) {font-size:2vh; font-weight:600;}
    .lecWrap .titleBox div:nth-child(4) {font-size:2.5vh; color:#0065ef}
    .lecWrap .titleBox div:nth-child(4) strong {font-size:3.6vh;}
    .lecWrap .titleBox div span {box-shadow:inset 0 -14px 0 #c5ddfd; color:#0065ef}
    .lecWrap .pass ul {margin-top:2vh; font-size:1.8vh; display:flex; flex-wrap: wrap;}
    .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:5px; font-weight:bold; width:calc(50% - 20px);}
    .lecWrap .pass li span {color:#0065ef; vertical-align:top}
    .lecWrap .pass li.ls_none {list-style:none; }

    .lecWrap .sort {width:100%; margin:2vh 0; font-size:1.8vh; text-align:left}
    .lecWrap .sort p {position: relative; width:49%; display:inline-block}
    .lecWrap .pass input[type="radio"] {position: absolute; top:30%; left:0; height:18px; width:18px; vertical-align:middle}
    .lecWrap .pass label {padding:5px 0 5px 23px; display:block; font-weight:bold; text-align:left}
    .lecWrap .pass:hover {cursor: pointer;}
    .lecWrap .pass input:checked + label {background:#0065ef; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3); color:#fff; border-radius:10px}
    .lecWrap .pass:last-child {border:3px solid #000}

    /*수강신청 체크*/
    .check {margin:3vh 1vh}
    .check label {cursor:pointer;color:#fff; font-weight:bold; font-size:1.8vh;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a.infotxt {display:inline-block; padding:12px 20px 10px 20px;color:#fff; background:#1c2127; margin-left:50px; border-radius:20px;font-weight:bold;}
    .wb_cts05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:3vh; border-radius:50px; padding:2vh 0; font-weight:bold}  
    .wb_cts05 .passbuy a:hover {background:#fff; color:#1c2127;}


    /* 이용안내 */
    .content_guide_wrap{background:#f3f3f3; padding:4vh 2vw; font-size:1.6vh; line-height:1.5}
    .content_guide_wrap .guide_tit{text-align:left; font-size:2.6vh; margin-bottom:30px}
    .content_guide_wrap .tabs {display:flex; justify-content: space-around;} 
    .content_guide_wrap .tabs li {width:50%;}
    .content_guide_wrap .tabs li a {display:block; text-align:center; padding:15px 0; font-size:1.8vh; border:2px solid #202020; background:#202020; color:#fff}
    .content_guide_wrap .tabs li a:hover,
    .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #f3f3f3; color:#202020; font-weight:600; background:#f3f3f3;}
    .content_guide_wrap .tabs:after {content:""; display:block; clear:both; }
    .content_guide_box{padding-top:20px;}
    .content_guide_box dl{word-break:keep-all; padding:10px}
    .content_guide_box dt{margin-bottom:10px}
    .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; font-weight:bold; margin-right:10px; font-size:1.8vh}
    .content_guide_box dd{color:#777; margin:0 0 20px 5px;}
    .content_guide_box dd strong {color:#555}
    .content_guide_box dd li {margin-bottom:10px; list-style:decimal; margin-left:20px}
    .content_guide_box dd:after {content:""; display:block; clear:both}


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {
        .lecWrap {display:block;}
        .lecWrap .pass li {width:calc(100%);}
    }  

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        /*.lecWrap {display:block;}
        .lecWrap .pass {display:block; width:calc(100%); height: auto; margin-right:0; margin:0 auto; margin-bottom:2vh }
        .lecWrap .sort {width:100%;}
        .lecWrap .sort p {position: relative; width:49%; display:inline-block}
        .lecWrap .pass input[type="radio"] {left:0;}
        .lecWrap .pass label {padding:5px 0 5px 25px;}*/
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {        

    }

    </style>

    <div id="Container" class="Container NSK">

        <div class="evtCtnsBox dday NSK-Thin">
            <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>      
        </div>

        <div class="evtCtnsBox" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2502m_top.jpg" alt="9급 패스">
                <a href="#lecBuy2023" title="2023 대비 9급 직렬별PASS 구매하기" style="position: absolute;left: 5.8%;top: 79.73%;width: 48.41%;height: 9.72%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2502m_01.jpg" alt="수많은 혜택">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2502m_03.jpg" alt="커리큘럼">
        </div>

        <div class="evtCtnsBox wb_cts05" data-aos="fade-up" id="lecBuy2023">
        <div class="ctTilte">
                지금부터 목표하는 시험일까지
                <h5 class="NSK-Black">윌비스 직렬별 전 강좌를<br> 합리적인 가격에!</h5>
                <p>최종 합격시 <strong class="NSK-Black">100% 환급</strong>까지!!</p>
            </div>
            <div>
                <div class="lecWrap">
                    <div class="pass">
                        <div class="titleBox">
                            <div>2023 ~ 24대비</div>
                            <div class="NSK-Black">9급 0원 PASS</div>
                            <div><span>인증 EVENT 5만원 할인</span></div>
                            <div>64만원 👉 <strong class="NSK-Black">59</strong>만원</div>
                        </div>
                        <ul>
                            <li><span>~24년 6월까지 수강</span></li>
                            <li><span>최종합격시 100% 환급</span></li>
                            <li><span>교재포인트 3만점 제공</span></li>
                            <li class="ls_none"><span></span></li>
                            <li>온라인모의고사 무료 <br>(전국모의고사 시행시 제공)</li>
                            <li>배속제한 없는 무제한수강</li>
                        </ul>
                        <div class="sort">
                            <p>                                
                                <input type="radio" id="y_pkg1" name="y_pkg" value="201798"/> 
                                <label for="y_pkg1"> 행정직 PASS</label>
                            </p>
                            <p>               
                                <input type="radio" id="y_pkg2" name="y_pkg" value="201800"/>
                                <label for="y_pkg2"> 세무직 PASS</label>
                            </p>
                            <p>
                                <input type="radio" id="y_pkg3" name="y_pkg" value="201802"/>
                                <label for="y_pkg3"> 교육행정직 PASS</label>
                            </p>
                            <p>                               
                                <input type="radio" id="y_pkg4" name="y_pkg" value="201804"/>
                                <label for="y_pkg4"> 사회복지직 PASS</label>
                            </p>
                        </div>                        
                    </div>

                    <div class="pass">
                        <div class="titleBox">
                            <div>2023대비</div>
                            <div class="NSK-Black">9급 0원 PASS</div>
                            <div><span>인증 EVENT 5만원 할인</span></div>
                            <div>54만원 👉 <strong class="NSK-Black">49</strong>만원</div>
                        </div>
                        <ul>
                            <li><span>23년 6월까지 수강</span></li>
                            <li><span>최종합격시 100% 환급</span></li>
                            <li><span>교재포인트 3만점 제공</span></li>
                            <li class="ls_none"><span></span></li>
                            <li>온라인모의고사 무료 <br>(전국모의고사 시행시 제공)</li>
                            <li>배속제한 없는 무제한수강</li>
                        </ul>
                        <div class="sort">
                            <p>                                
                                <input type="radio" id="y_pkg5" name="y_pkg" value="201797"/> 
                                <label for="y_pkg5"> 행정직 PASS</label>
                            </p>
                            <p>               
                                <input type="radio" id="y_pkg6" name="y_pkg" value="201799"/>
                                <label for="y_pkg6"> 세무직 PASS</label>
                            </p>
                            <p>
                                <input type="radio" id="y_pkg7" name="y_pkg" value="201801"/>
                                <label for="y_pkg7"> 교육행정직 PASS</label>
                            </p>
                            <p>                               
                                <input type="radio" id="y_pkg8" name="y_pkg" value="201803"/>
                                <label for="y_pkg8"> 사회복지직 PASS</label>
                            </p>
                        </div>                        
                    </div>

                    <div class="pass">
                        <div class="titleBox">
                            <div>2023대비</div>
                            <div class="NSK-Black">9급 문제풀이 PASS</div>
                            <div><span>인증 EVENT 5만원 할인</span></div>
                            <div>39만원 👉 <strong class="NSK-Black">34</strong>만원</div>
                        </div>
                        <ul>
                            <li><span>23년 6월까지 수강</span></li>
                            <li><span>최종합격시 100% 환급</span></li>
                            <li>온라인모의고사 무료 <br>(전국모의고사 시행시 제공)</li>
                            <li>배속제한 없는 무제한수강</li>
                        </ul>
                        <div class="sort">
                            <p>                                
                                <input type="radio" id="y_pkg9" name="y_pkg" value="203637"/> 
                                <label for="y_pkg9"> 행정직 PASS</label>
                            </p>
                            <p>               
                                <input type="radio" id="y_pkg10" name="y_pkg" value="203638"/>
                                <label for="y_pkg10"> 세무직 PASS</label>
                            </p>
                        </div>                        
                    </div>
                </div>

                <div class="check" id="chkInfo">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#careful" class="infotxt">이용안내확인하기 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>
            </div>
            {{--
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2502m_05.jpg" alt="">
            <div class="p_re apply_bg">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2502_05m_apply01.png" alt="" > 
                <div class=" passLecBuy passLecBuy2 NSK-Black"> 
                    <div class="sorts">                                
                        <label for="y_pkg1">행정직 PASS</label>
                        <input type="radio" id="y_pkg1" name="y_pkg" value="201798"/>
                    </div>
                    <div class="sorts">               
                        <label for="y_pkg2">세무직 PASS</label>
                        <input type="radio" id="y_pkg2" name="y_pkg" value="201800"/>
                    </div>
                    <div>                
                        <label for="y_pkg3">교육행정직 PASS</label>
                        <input type="radio" id="y_pkg3" name="y_pkg" value="201802"/>
                    </div>
                    <div>                
                        <label for="y_pkg4">사회복지직 PASS</label>
                        <input type="radio" id="y_pkg4" name="y_pkg" value="201804"/>
                    </div>                
                </div>
            </div>
            <div class="p_re apply_bg">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2502_05m_apply02.png" alt="" >
                <div class="passLecBuy passLecBuy2 NSK-Black"> 
                    <div class="sorts">                                
                        <label for="y_pkg5">행정직 PASS</label>
                        <input type="radio" id="y_pkg5" name="y_pkg" value="201797"/>
                    </div>
                    <div class="sorts">                        
                        <label for="y_pkg6">세무직 PASS</label>
                        <input type="radio" id="y_pkg6" name="y_pkg" value="201799"/>
                    </div>
                    <div>                
                        <label for="y_pkg7">교육행정직 PASS</label>
                        <input type="radio" id="y_pkg7" name="y_pkg" value="201801"/>
                    </div>
                    <div>                
                        <label for="y_pkg8">사회복지직 PASS</label>
                        <input type="radio" id="y_pkg8" name="y_pkg" value="201803"/>
                    </div>               
                </div>                
            </div>           
            <div class="check" id="chkInfo">
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#careful" class="infotxt" > 이용안내 확인하기 ↓</a>
            </div> 
            <div class="passbuy">
                <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
            </div>
            --}}
        </div>

        <div class="content_guide_wrap" id="tab">
            <div class="wrap" id="careful">
                <p class="guide_tit"> <span class="NSK-Black tx-blue">상품 </span> 이용안내 </p>
                <ul class="tabs">
                    <li><a href="#tab01" class="active">상품 구성 및 유의사항</a></li>
                    <li><a href="#tab02">환급 및 환불</a></li>               
                </ul>

                <div class="content_guide_box" id="tab01">
                    <dl>
                        <dt>
                            <h3>상품구성</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>2022~2024 대비로 진행된 전 강좌 제공 (진행 예정 신규강좌 포함)</li>
                                <li>수강 가능 교수진<br>                                                            
                                    <div class="tx-blue">
                                    · 행정직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 임병주, 행정학 김철<br>
                                    · 세무직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 회계학 이윤호, 세법 박창한<br>
                                    · 교육행정직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 임병주, 교육학 손영민<br>
                                    · 사회복지직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 행정법 임병주, 사회복지학 정형윤<br>
                                        <span class="tx-red">
                                        (*영어 한덕현 교수의 경우, [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공)<br>
                                        (*교수진별 커리큘럼 진행은 상이할 수 있으며 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있습니다)<br>
                                        신규 과정이 진행되지 않는 경우에는 이전 연도 과정을 대체 제공 해드립니다.)
                                        </span>
                                    </div>
                                </li>
                                <li>수강기간 :  2023 국가직 대비 : 2023년 4월까지<br>
                                    2023 시험대비 : 2023년 6월까지<br>
                                    2023~2024대비 : 2024년 6월까지
                                </li>                               
                            </ol>
                        </dd>

                        <dt>
                            <h3>수강 관련</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>[내강의실] - [무한PASS존] - 상품명 옆의 [강좌추가] 버튼 클릭, 원하는 과목/교수/강좌 선택 등록 후 수강</li>
                                <li>기기 제한 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                                <li>본 상품은 특별 기획/할인 상품이므로 일시정지/수강연장/재수강 불가</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재관련</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>교재 별도 구매 ([강좌 소개] 및 [교재구매] 메뉴 이용)</li>
                                <li>PASS 구매 시 지급되는 수강지원 포인트 3만점은 교재 구매 시 사용 가능 (수강기간 내에만 유효)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>재도전 / 환승 / 대학생 인증</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>1아이디당 1회만 참여 가능</li>
                                <li>인증 완료 처리는 신청 후, 24시간 이내에 처리. 단, 주말 및 공휴일 인증 건의 경우 평일 오전 중 처리<br>
                                    1) 재도전 인증<br>
                                    · 본인의 이름이 명시된 수험표 또는 윌비스 PASS 수강생의 경우 [내강의실] 페이지 내 이름과 PASS명이 명시된 이미지 캡쳐 후 업로드 시 인증 가능<br>
                                    2) 환승 인증<br>
                                    · 본인의 이름, 수강내역, 결제내역 등이 명확하게 기재된 수강증 등의 캡쳐를 통해서만 인증 가능<br>
                                    (결제내역을 통한 인증 시, 수강자 이름과 결제 금액, 강좌명 필수)<br>
                                    3) 대학생 인증<br>
                                    · 본인의 이름, 학번이 명시된 학생증 등의 사진을 통해서만 인증 가능
                                </li>
                                <li>본 이벤트는 이벤트 참여자가 본인의 명의로 구매/응시한 내용에 한합니다.</li>
                                <li>등록 인증 정보는 이벤트 목적 외 용도로 사용되지 않습니다.</li>
                                <li>발급된 쿠폰의 사용 기간은 3일로, 본 페이지 내에서 판매 중인 PASS 상품에만 적용 가능합니다.</li>
                            </ol>
                        </dd>
                       
                    </dl>
                </div>

                <div class="content_guide_box" id="tab02">
                    <dl>
                        <dt>
                            <h3>환급 조건</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>공무원 시험에 최종 합격하고 10일 이내 신청, 30일 이내 합격 인증 서류를 제출하시면 됩니다.<br>
                                    - PASS 수강기간 내 또는 구매일로부터 부여된 상품의 순수 대비 년도에 응시한 시험만 환급 대상 됩니다.
                                </li>
                                <li>9급 공무원 시험 국가직, 지방직, 서울시, 교육청 공무원 시험<br>
                                    (일반행정직, 세무직, 교육행정직, 사회복지직) 합격에 한해 적용됩니다.<br>
                                    ※ 단, 9급 공무원 공채 전형 합격자에 한해 환급이 가능합니다.
                                </li>
                                <li>합격 환급 신청 시, 공무원 상담게시판 및 아래 2개 카페 모두에 합격 수기를 작성 및 제출해야만 환급이 가능합니다.<br>                
                                    <div class="tx-blue">
                                        - 윌비스공무원 고객센터 >1:1 상담 게시판<br>
                                        - 아래 2개 카페의 합격수기 게시판에 작성 후, 해당 url 제출<br>
                                        <a href="http://cafe.daum.net/9glad" target="blank">○ 구꿈사 : http://cafe.daum.net/9glad<br></a>
                                        <a href="https://cafe.naver.com/gugrade" target="blank">○ 공드림 : https://cafe.naver.com/gugrade<br></a>
                                        <span class="tx-red">
                                        - 총 3군데에 합격수기를 작성, 환급 심사 시점에 3군데에 작성한 합격수기가 모두 확인되어야 합니다.
                                        </span>
                                    </div>
                                </li>                                
                                <li>합격수기 url은 반드시 전체공개로 작성이 되어야 하며, 비공개 또는 일부 공개 시 환급 불가합니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환급 신청</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>
                                    환급신청 방법 안내<br>
                                    - 수강기간 내 또는 구매일로부터 부여된 상품의 순수 대비 년도에 응시한 시험 합격 시 환급 신청이 가능합니다.<br>
                                    - 최종합격 발표일 기준으로 10일 이내 신청, 30일 이내 합격 인증 서류제출 하셔야 합니다.<br>
                                    - 환급 신청은 환급신청 기간 내 [고객센터 1:1 상담게시판]을 통해 신청해 주셔야 합니다.
                                </li>
                                <li>
                                    환급 증빙서류 안내<br>
                                    - 시험 응시표 사본,  합격증명서 사본, 본인 신분증 사본, 합격수기(사진 포함),카페 합격수기 게시내역<br>
                                    - PASS 신청자 ID, 시험응시표 사본, 합격인증 성명, 본인 신분증 사본 성명 및 응시번호가 모두 동일해야 가능합니다.<br>
                                    - 합격 인증 자료 제출 방법 : 윌비스 공무원 e-메일(willgosi@kakao.com)로 보내주세요.
                                </li>
                            </ol>
                        </dd>

                        <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="환급 신청서 다운">
                            <dd>
                                <p class="tx-red">※ 환급 신청서 다운 받기 ▼</p>
                            </dd>
                        </a>

                        <dt>
                            <h3>환급 조건 및 유의사항</h3>
                        </dt>
                        <dd>
                           <ol>
                                <li>환급액은 실제 결제한 금액에서 제반 수수료(카드 수수료, 교재 포인트, 제세공과금 등) 제외 후 지급됩니다.(무료 수강 강의 제외)<br>
                                    ▷ 제외 상세 내역 : 구매 시 지급 받으신 포인트, 제세공과금 : 22% 등
                                </li>
                                <li>환급 후 패스는 잔여 수강일에 상관없이 수강 종료됩니다.</li>
                                <li>합격수기(사진 포함) 자료는 윌비스 공무원 온라인 및 계열사(교수님 커뮤니티 포함)등 에서 홍보/마케팅 용도로 활용 됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불 정책 </h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 전액 환불 가능</li>
                                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능</li>
                                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주</li>
                                <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                                    · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                                    (* 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다)
                                </li>
                            </ol>
                        </dd>

                    </dl>
                </div>
                
            </div>
        </div>

    </div>

     <!-- End Container -->

     <script type="text/javascript">
        var $regi_form = $('#regi_form');

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });

       /*수강신청 동의*/ 
        function go_PassLecture(){
                if($("input[name='ischk']:checked").size() < 1){
                    alert("이용안내에 동의하셔야 합니다.");
                    return;
                }

                code = $('input[name="y_pkg"]:checked').val();
                if (typeof code == 'undefined' || code == '') {
                    alert('강좌를 선택해 주세요.');
                    return;
                }
                location.href = "{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}" + code;
            }    
        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab03']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab01']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });


               
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')   

@stop