@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container cop_acad NSK c_both">
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Section Bnr">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secA01.jpg') }}" alt="적중은역시신광은경찰팀"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section MainVisual MainVisual_acad mb50">
        <div class="widthAuto">
            <ul>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB01.jpg') }}" alt="기본이론종합반"></a>
                </li>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB02.jpg') }}" alt="superpass"></a>
                </li>
                <li class="VisualsubBox_acad">
                    <a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB03.jpg') }}" alt="문제풀이패키지"></a>
                </li>
                <li class="VisualsubBox_acad">
                    <div class="bSlider acad">
                        <div class="bSlider slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB04_01.jpg') }}" alt="합격전략설명회"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_secB04_02.jpg') }}" alt="황세웅면접캠프"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mb50">
        <div class="widthAuto">
            <div class="will-acadTit">교수별 <span class="tx-color">빠른강좌</span> 찾기</div>
            <ul class="caProfBox">
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_ske.jpg') }}" alt="형사소송법/수사 신광은">
                    <div class="caProfBtsn">
                        <div><a href="#none">문풀1단계<span>3.7 개강</span></a></div>
                        <div><a href="#none">기본형소법<span>3.21 개강</span></a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_jjh.jpg') }}" alt="경찰학개론 장정훈">
                    <div class="caProfBtsn">
                        <div><a href="#none">문풀1단계<span>3.7 개강</span></a></div>
                        <div><a href="#none">무료특강</a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_kwu.jpg') }}" alt="형법 김원욱">
                    <div class="caProfBtsn">
                        <div><a href="#none">기본형법<span>3.7 개강</span></a></div>
                        <div><a href="#none">심화강좌</a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_hsm.jpg') }}" alt="경찰영어 하승민">
                    <div class="caProfBtsn">
                        <div><a href="#none">문풀1단계<span>3.2 개강</span></a></div>
                        <div><a href="#none">심화강좌</a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_otj.jpg') }}" alt="한국사 오태진">
                    <div class="caProfBtsn">
                        <div><a href="#none">기본한국사<span>2.25 개강</span></a></div>
                        <div><a href="#none">문풀1단계<span>3.13 개강</span></a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_wyc.jpg') }}" alt="한국사 원유철">
                    <div class="caProfBtsn">
                        <div><a href="#none">기본한국사<span>2.25 개강</span></a></div>
                        <div><a href="#none">심화강좌</a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_khj.jpg') }}" alt="기초영어 김현정">
                    <div class="caProfBtsn">
                        <div><a href="#none">지옥탈출<span>3.11 개강</span></a></div>
                        <div><a href="#none">아침특강</a></div>
                    </div>
                </li>
                <li>
                    <img src="{{ img_url('cop_acad/prof/prof_hsw.jpg') }}" alt="면접 황세웅">
                    <div class="caProfBtsn">
                        <div><a href="#none">면접캠프</a></div>
                        <div><a href="#none">면접 스파르타</a></div>
                    </div>
                </li>

            <!--
                <li class="p_re">
                    <div class="cSlider graySlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180918.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180914.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                <li class="p_re">
                    <div class="cSlider graySlider AbsControls">
                        <div class="sliderControls">
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180919.png') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop/prof/prof_180916.png') }}"></a></div>
                        </div>
                    </div>
                </li>
                -->
            </ul>
        </div>
    </div>
    <!-- 교수별 빠른강좌 //-->


    <div class="Section mb50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰학원</span> 특별관리반</div>
            <ul class="specialClass">
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A01.jpg') }}" alt="스파르타"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A02.jpg') }}" alt="영어지옥 탈출반"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A03.jpg') }}" alt="통합생활 관리반"></a></li>
                <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_A04.jpg') }}" alt="특별체력 관리반"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section Section2 mb50">
        <div class="widthAuto p_re">
            <img src="{{ img_url('cop_acad/visual/visual_curri_bg.jpg') }}" alt="신광은경찰 합격커리큘럼">
            <div class="passCurriWrap">
                <ul>
                    <li class="curriStep1">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM01.png') }}" alt="집중 연강식 진행" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM01_on.png') }}" alt="집중 연강식 진행" class="over">
                    </li>
                    <li class="curriStep2">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM02.png') }}" alt="프리미엄 심화과정" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM02_on.png') }}" alt="프리미엄 심화과정" class="over">
                    </li>
                    <li class="curriStep3">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM03.png') }}" alt="핵심요약/진도별 정리" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM03_on.png') }}" alt="핵심요약/진도별 정리" class="over">
                    </li>
                    <li class="curriStep4">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM04.png') }}" alt="집중 약점 보안" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM04_on.png') }}" alt="집중 약점 보안" class="over">
                    </li>
                    <li class="curriStep5">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM05.png') }}" alt="실전력 극대화" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM05_on.png') }}" alt="실전력 극대화" class="over">
                    </li>
                    <li class="curriStep6">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM06.png') }}" alt="집단+개별면접대비" class="out">
                        <img src="{{ img_url('cop_acad/visual/visual_curriM06_on.png') }}" alt="집단+개별면접대비" class="over">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 합격커리큘럼 //-->

    {{-- on air include --}}
    @include('willbes.pc.site.main_partial.on_air')

    <div class="Section mt40">
        <div class="widthAuto">
            <div class="sliderSuccess">
                <div class="will-acadTit"><span class="tx-color">신광은경찰</span> 학원소식</div>
                <div class="sliderSuccessPlay">
                    <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="sliderInfo">
                <div class="will-acadTit"><span class="tx-color">왜</span> 노량진 실강인가?</div>
                <a href="#none" target="_blank"><img src="{{ img_url('cop_acad/banner/bnr_B01.jpg') }}" alt="노량진24시"></a>
            </div>
            <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad two">
                    <li><a href="#notice1" class="on">공지사항</a></li>
                    <li><a href="#notice2" class="">수험뉴스</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> 공지사항 제목이 출력됩니다. 공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> 3월 31일(금) 새벽시스템점검안내 안내안내안내 새벽시스템점검안내 안내안내안내</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                        </ul>
                    </div>
                    <div id="notice2" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> 공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Bnr mt50">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="https://cop.dev.willbes.net/lecture/index/cate/3001/pattern/free"><img src="{{ img_url('cop_acad/banner/bnr_190110.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Section4 mb50 mt30">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰</span> 캠퍼스</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">노량진(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">신림</a><span class="row-line">|</span></li>
                    <li><a href="#campus3" class="">인천</a><span class="row-line">|</span></li>
                    <li><a href="#campus4" class="">대구</a><span class="row-line">|</span></li>
                    <li><a href="#campus5" class="">부산</a><span class="row-line">|</span></li>
                    <li><a href="#campus6" class="">광주</a><span class="row-line">|</span></li>
                    <li><a href="#campus7" class="">제주</a><span class="row-line">|</span></li>
                    <li><a href="#campus8" class="">전북</a><span class="row-line">|</span></li>
                    <li><a href="#campus9" class="">진주</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_origin.jpg') }}" alt="노량진">
                            <span class="origin">노량진(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">노량진</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">노량진</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울시동작구만양로105 2층<br/>
                                                (서울시동작구노량진동116-2 2층)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-0336</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 노량진//-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_sl.jpg') }}" alt="신림">
                            <span>신 림</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">신림</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 관악구 신림로 23길 16 4층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-4006</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림 //-->

                    <div id="campus3" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_ic.jpg') }}" alt="인천">
                            <span>인 천</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">인천</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                인천 부평구 부평동 534-28 중보빌딩 10층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 인천 //-->

                    <div id="campus4" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_dg.jpg') }}" alt="대구">
                            <span>대 구</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">대구</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">대구</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            대구 중구 중앙대로 412(남일동) CGV 2층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-6112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 대구// -->

                    <div id="campus5" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_bs.jpg') }}" alt="부산">
                            <span>부 산</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">부산</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">부산</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            부산 진구 부정동 223-8
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1522-8112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 부산 //-->

                    <div id="campus6" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_kj.jpg') }}" alt="광주">
                            <span>광 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">광주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">광주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            광주 북구 호동로 6-11
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">062-722-8140</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 광주 //-->

                    <div id="campus7" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_jj.jpg') }}" alt="제주">
                            <span>제 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">제주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">제주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            제주도 제주시 동광로 56 3층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">064-722-8140</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <div id="campus8" class="tabContent">
                        <div>
                            <div class="map_img">
                                <img src="{{ img_url('cop_acad/map/map_cop_jbjj.jpg') }}" alt="전북 전주">
                                <span>전북 전주</span>
                            </div>
                            <div class="campus_info">
                                <dl>
                                    <dt>
                                        <div class="c-tit">
                                            <span class="tx-color">전북 </span> 캠퍼스 공지사항
                                            <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                        </div>
                                        <div class="c-info p_re">
                                            <ul class="List-Table">
                                                <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                                <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                            </ul>
                                        </div>
                                    </dt>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">전북 익산</span> 캠퍼스 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                    전북 전주시 덕진동2가 전북대학교 농생대1호관 303호
                                                </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">063-270-4144</span>
                                            </div>
                                        </div>
                                    </dt>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">전북 익산</span> 캠퍼스 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                전북 익산시 신용동 원광대학교 학생지원관 4층
                                                </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">063-270-4144</span>
                                            </div>
                                        </div>
                                    </dt>
                                </dl>
                                <div class="btn btn2 NSK-Black">
                                    <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                                </div>
                            </div>
                        </div>

                        <div class="c_both pt30">
                            <div class="map_img">
                                <img src="{{ img_url('cop_acad/map/map_cop_jbis.jpg') }}" alt="전북 익산">
                                <span>전북 익산</span>
                            </div>
                        </div>
                    </div>
                    <!-- 전북 //-->

                    <div id="campus9" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map_cop_jinj.jpg') }}" alt="진주">
                            <span>진 주</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">진주</span> 캠퍼스 공지사항
                                        <a href="https://cop.dev.willbes.net/pass/support/notice/index" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                    </div>
                                    <div class="c-info p_re">
                                        <ul class="List-Table">
                                            <li><a href="#none">[공지] 경찰3차 과목별 만점자를 소개합니다</a></li>
                                            <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a></li>
                                        </ul>
                                    </div>
                                </dt>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">진주</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                경남 진주시 칠암동 490-8 엠코아빌딩 4층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">055-755-7771</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="https://cop.dev.willbes.net/pass/support/qna/index">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! popup('657001') !!}
<!-- End Container -->
@stop