@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->

<div id="Container" class="Container value NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">자격증<span class="row-line">|</span></li>
                <li class="subTit">감정평가사</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">민법</a></li> 
                            <li><a href="#none">경제학</a></li>   
                            <li><a href="#none">회계학</li>
                            <li><a href="#none">감정평가관계법규</a></li>
                            <li><a href="#none">부동산학원론</a></li>
                            <li><a href="#none">감정평가실무</a></li>
                            <li><a href="#none">감정평가이론</a></li>
                            <li><a href="#none">보상법규/감정행정법</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">학원강의상당실</a></li>
                            <li><a href="#none">학원보강</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">시험안내</a></li>
                            <li><a href="#none">과목별 공부방법론</a></li>
                            <li><a href="#none">입문가이드</a></li>
                            <li><a href="#none">맞춤형가이드</a></li>
                            <li><a href="#none">수험뉴스</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="value">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section p_re">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_725x400.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_725x400.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="bSlider VisualsubBoxTop">                    
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x128.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x128.jpg" alt="배너명"></a></div>
                    </div>
                </div>   
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x248.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_364x248.jpg" alt="배너명"></a></div>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <div class="Section mt50">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3094_1120x20_sample.jpg" alt="배너명"></a>
        </div>
    </div> 

    <div class="Section mt50">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">학원 공지사항</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs">
                <div class="will-listTit">동영상 공지사항</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs mr-zero">
                <div class="will-listTit">강의계획서</div>
                <div class="tabBox noticeBox">
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
        </div>
    </div>

    <div class="Section mt30">
        <div class="widthAuto"> 
            <ul id="goMenu" class="goMenu" >
                <li><a href="#none">학원수강신청<span>|</span></a></li>
                <li><a href="#none">학원보강<span>|</span></a></li>
                <li><a href="#none">강의실배정표<span>|</span></a></li>
                <li><a href="#none">강의시간표<span>|</span></a></li>
                <li><a href="#none">무료특강<span>|</span></a></li>
                <li><a href="#none">강의자료실</a></li>
            </ul>
        </div>
    </div>

    <div class="Section lecBanner mt50">
        <div class="widthAuto">
            <div class="copyTit NSK-Thin mb50">
                꿈을 향한 소중한 첫 걸음부터, <strong class="NSK-Black"><span class="tx-color">합격의 순간</span></strong>까지!<br />
                29년을 이어온 대표전문학원, <strong class="NSK-Black"><span class="tx-color">윌비스 한림법학원</span></strong>이 함께 합니다!!
            </div>
            <ul>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115095837.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115102038.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200123131907.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128152955.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128153052.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200131165936.jpg" alt="배너명"></a></li>                
            </ul>
        </div>
    </div>

    {{--이달의 강의 / 강의맛보기 --}}
    <div class="Section Section1">
        <div>
            <div class="copyTit">
                <strong class="NSK-Black">WILLBES 한림법학원</strong> <strong class="NSK-Black"><span class="tx-color">이달의 강의</span></strong>
            </div>
            <div class="thisMonth NSK">
                <div class="thisMonthBox">
                    <ul class="tmslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div class="tx-color">
                                    미시경제학 3대 難題 복습 특강
                                    <span class="NSK-Black">황종휴<span>
                                </div>
                                <div>경제학을 위한 기초수학 동영상 무료업로드!</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div class="tx-color">
                                    행정법 예비순환
                                    <span class="NSK-Black">김정일</span>
                                </div>
                                <div>기본서(행정법강의)를 중심으로 행정법의 전체흐름과 주요내용을 학습, 법학의 기초개념을 마스터하고</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div class="tx-color">
                                    2020 행정법 GS3순환
                                    <span class="NSK-Black">박도원</span>
                                </div>
                                <div>행정법 GS3순환(미시+거시) + 매일모의고사추가</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">김기홍</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">이동호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">최승호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50852/prof_index_50852_1586137263.png">
                                <div class="tx-color">
                                    경제학 예비순환
                                    <span class="NSK-Black">안진우</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                 
                </div>
            </div>

            <div class="copyTit mt100">
                <strong class="NSK-Black">윌비스</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
            </div>
            <div class="preview NSK">
                <div class="previewBox">
                    <ul class="pvslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                
                </div>
            </div>
        </div>
    </div>
    
    {{--
    <div class="Section mt90">
        <div class="widthAuto">
            <ul class="PBcts">
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/bn_216x234.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    --}}

    <div class="Section Section4_hl mt50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">자격증</span> 학원</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">신림(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">강남(분원)</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map01.jpg" alt="신림(본원)">
                            <span class="origin">신림(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림(본원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 관악구 신림로 23길 16 일성트루엘 4층<br/>
                                                (신림동 1523-1)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-4774</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림동 //-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map02.jpg" alt="강남(분원)">
                            <span>강남(분원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">강남(분원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 강남구 테헤란로19길 18<br>
                                                (역삼동 645-12)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-3383</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}x">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 강남 //-->
                </div>
            </div>
        </div>
    </div>    

    <div class="Section NSK mt90 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 4</div>
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
                                <div class="nNumber tx-color">1544-4774</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 08시~ 18시<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 자격증 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">학원<br/>상담실</div>
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

    {{--
    <div id="QuickMenu" class="MainQuickMenu">
        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005_sky01.jpg"></a></div>    
        <ul>
            <li><a href="#none">강의 계획서</a></li>
            <li><a href="#none">강의 시간표</a></li>
            <li><a href="#none">강의실 배정표</a></li>
            <li><a href="#none">학원 할인정책</a></li>
        </ul>
    </div>
    --}}

</div>
<!-- End Container -->

<script type="text/javascript">
        $(function() {
            var slidesImg = $(".tmslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 274,
                slideMargin:8,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        $(function() {
            var slidesImg1 = $(".pvslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 460,
                slideMargin:10,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>

@stop