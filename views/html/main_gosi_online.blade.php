@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->

<div id="Container" class="Container gosi NSK c_both">
    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">9급</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">PASS</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">PASS</li>
                            <li><a href="#none">0원 PASS</a></li>
                            <li><a href="#none">6개월 PASS</a></li>
                            <li><a href="#none">12개월 PASS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">공무원학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    
    <div class="Section mt20 p_re">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_1120x400_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_1120x400_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_1120x400_01.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="VisualsubBoxTop"><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x128_01.jpg') }}" alt="배너명"></a></div>   
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_364x248_01.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <div class="Section barBnr">
        <div class="widthAuto">
            <a href="#none"><img src="{{ img_url('gosi/banner/bnr_1120x110.jpg') }}" alt="배너명"></a>
        </div>
    </div>
    
    <div class="Section">
        <div class="widthAuto">
            <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
            <ul class="PBcts">
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_01.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_02.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_03.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_03.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_04.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_04.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_05.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/banner/bnr_224x390_05.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section Section3 mt110">
        <div class="widthAuto">
            <div><img src="{{ img_url('gosi/visual/visual_tit02.jpg') }}" alt="추천강좌/이벤트/최신소식"></div>
            <ul class="SpecialBox">
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t02.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t03.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t04.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t05.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t06.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t07.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t08.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t09.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t10.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section NSK mt90">
        <div class="widthAuto">
            <div class="willbesLec">
                <div class="smallTit mb30">          
                    <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>            
                </div> 
                <div class="will-listTit">BEST 강좌</div>                
                <div class="bestLectBx">                                                  
                    <ul class="prof-subject">                        
                        <li><a href='#none'><span>|</span>국어</a></li>                        
                        <li><a href='#none'><span>|</span>영어</a></li>                        
                        <li><a href='#none'><span>|</span>한국사</a></li>                        
                        <li><a href='#none'><span>|</span>헌법</a></li>                        
                        <li><a href='#none'><span>|</span>행정법</a></li>                        
                        <li><a href='#none'><span>|</span>행정학</a></li>                        
                        <li><a href='#none'><span>|</span>사회</a></li>                        
                        <li><a href='#none'><span>|</span>세법</a></li>                        
                        <li><a href='#none'><span>|</span>회계학</a></li>                        
                        <li><a href='#none'><span>|</span>경제학</a></li>                        
                        <li><a href='#none'><span>|</span>국제법</a></li>                        
                        <li><a href='#none'><span>|</span>전자공학</a></li>                        
                        <li><a href='#none'><span>|</span>무선공학</a></li>                        
                        <li><a href='#none'><span>|</span>통신이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기기기</a></li>                        
                        <li><a href='#none'><span>|</span>소방학개론</a></li>                        
                        <li><a href='#none'><span>|</span>소방관계법규</a></li>                        
                        <li><a href='#none'><span>|</span>한국사검정능력시험</a></li>                        
                    </ul>

                    <div id="prof-professors" class="prof-professors">
                        <ul class="prof-slider">                        
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>  
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어2</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>                          
                        </ul>
                    </div> 
                </div>
                
                <div class="will-listTit mt45">무료특강</div>
                <ul class="freeLectBx">
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free01.jpg') }}" alt="" class="배너명"/>
                        <p>기초입문특강</p>
                        국어,영어,한국사 기초입문 풀패키지
                    </li>
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free02.jpg') }}" alt="" class="배너명"/>
                        <p>기초문제 해설특강</p>
                        출제경향 완벽대비
                    </li>
                </ul>
            </div>
            <!-- willbesLec//-->

            <div class="willbesNews">
                <div class="smallTit mb30">          
                    <p><span>윌비스 <strong>소식</strong></span></p>                                
                </div>
                <div class="noticeTabs">
                <div class="will-listTit mt45">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="noticeTabs mt30">
                    <ul class="tabWrap noticeWrap three">
                        <li><a href="#notice1" class="on">시험정보</a></li>
                        <li><a href="#notice2" class="">수험공고</a></li>
                        <li><a href="#notice3" class="">수험뉴스</a></li>
                    </ul>
                    <div class="tabBox noticeBox">
                        <div id="notice1" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice2" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice3" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>

    <div class="Section NG mt90">
        <div class="widthAuto">            
            <div class="smallTit mb30">          
                <p><span>솔직한 <strong>수강후기</strong><a href="#none"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></span></p>                                
            </div>
            <div class="reviewBx">
                <div class="sliderNumV vSlider">
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                    <div class="lecReview">
                        <div class="imgBox cover">
                            <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                            <img src="{{ img_url('gosi/prof/tea_list_1_kmj_104x104.png') }}">
                        </div>
                        <ul>
                            <li>[작물생리학] 장사원</li>
                            <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                            <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- 수강후기 //-->

    <div class="Section NSK mt90 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0336</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->

    <div id="QuickMenu" class="MainQuickMenu">
        <ul>
            <li>
                <div class="QuickSlider ">
                    <div class="sliderNum">
                        <div class="QuickDdayBox">
                            <div class="q_tit">3차 필기시험</div>
                            <div class="q_day">2018.12.12</div>
                            <div class="q_dday NSK-Blac">D-5</div>
                        </div>
                        <div class="QuickDdayBox">
                            <div class="q_tit">1차 공무원</div>
                            <div class="q_day">2019.04.05</div>
                            <div class="q_dday NSK-Blac">D-10</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" title="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" title="배너명"></a>
            </li>
        </ul>
    </div>

</div>
<!-- End Container -->

<script type="text/javascript">
    $(function(){ 
        $('.prof-subject').bxSlider({ 
            speed:800,  
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });
    });

    $(function() {
    $('.sliderNumV').bxSlider({
        mode: 'vertical', 
        auto: true,
        controls: true,
        infiniteLoop: true,
        slideWidth: 1120,
        pagerType: 'short',
        minSlides: 3,
        pause: 3000,
        pager: true,
        onSliderLoad: function(){
            $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
        } 
    });
});
</script>
@stop