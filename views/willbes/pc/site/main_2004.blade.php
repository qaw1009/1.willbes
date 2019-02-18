@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="Container gosi GA NSK c_both">
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Section MainVisual mt20">
        <div class="widthAuto">
            <div class="VisualBox p_re">
                <div id="MainRollingDiv" class="MaintabList five">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">7급공무원</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">9급공무원</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">소방직</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);" class="">군무원</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);" class="">기술직</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider01.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider02.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider03.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider04.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider05.jpg') }}" alt="배너명"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox mt20">
                <ul>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190131.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190131.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Bnr mt5 mb80">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('gosi_acad/banner/bnr_190129.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section2 pt80 pb80">
        <div class="widthAuto">
            <div class="gosi-acadTit NSK-Thin mb50">
                여러분의 꿈과 목표를 위해,<br />
                <strong class="NSK-Black">오늘도 최선을 다하는 <span class="tx-color">윌비스 고시학원</span></strong>
            </div>
            <ul class="ProfBox">
                <li>
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox01.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox04.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox02.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox05.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi_acad/prof/ProfBox03.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section Section1 mt60">
        <div class="widthAuto">
            <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad three">
                    <li><a href="#notice1" class="on">시험공고</a></li>
                    <li><a href="#notice2" class="">수험뉴스</a></li>
                    <li><a href="#notice3" class="">합격수기</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a></li>
                            <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a></li>
                            <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a></li>
                            <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a></li>
                            <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a></li>
                        </ul>
                    </div>
                    <div id="notice2" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내22</a></li>
                        </ul>
                    </div>
                    <div id="notice3" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내333</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내333</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내333</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sliderEvt pick">
                <div class="will-acadTit">윌비스 <span class="tx-color">이벤트</span></div>
                <div class="bSlider acad">
                    <div class="sliderTM">
                        <div><a href="#none"><img src="{{ img_url('gosi_acad/event/evt190130.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_acad/event/evt190130.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>

            <ul class="acad_infoBox">
                <li class="w-infoBox1">
                    <a href="#none"><span>1:1 학습컨설팅</span></a>
                </li>
                <li class="w-infoBox2">
                    <a href="#none"><span>학원실강접수</span></a>
                </li>
                <li class="w-infoBox3">
                    <a href="#none"><span>학원개강안내</span></a>
                </li>
                <li class="w-infoBox4">
                    <a href="#none"><span>강의실배정표</span></a>
                </li>
                <li class="w-infoBox5">
                    <a href="#none"><span>모의고사신청</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mt80">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">공무원학원</span> 교수님</div>
            <img src="{{ img_url('gosi_acad/prof/ProfBig.jpg') }}" alt="배너명">
        </div>
    </div>

    <div class="Section mb50">
        <div class="widthAuto">
            <div class="sliderSuccess">
                <div class="will-acadTit">학원 <span class="tx-color">갤러리</span></div>
                <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                <ul>
                    <li>
                        <img src="{{ img_url('gosi_acad/gallery/gallery01.jpg') }}" alt="배너명">
                        <div>
                            <strong>[노량진]</strong>
                            <p>새벽부터 길게 늘어선 학원수강생의 모습 학원수강생의 모습 학원수강생의 모습</p>
                            <span>2019-01-15</span>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('gosi_acad/gallery/gallery02.jpg') }}" alt="배너명">
                        <div>
                            <strong>[노량진]</strong>
                            <p>새벽부터 길게 늘어선 학원수강생의 모습 학원수강생의 모습 학원수강생의 모습</p>
                            <span>2019-01-15</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="sliderInfo">
                <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                <a href="#none" target="_blank">
                    <img src="{{ img_url('gosi_acad/event/hotFocus01.jpg') }}" alt="배너명">
                </a>
            </div>
        </div>
    </div>

    <div class="Section Section4 mb50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">공무원</span> 캠퍼스</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">노량진(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">인천</a><span class="row-line">|</span></li>
                    <li><a href="#campus3" class="">대구</a><span class="row-line">|</span></li>
                    <li><a href="#campus4" class="">부산</a><span class="row-line">|</span></li>
                    <li><a href="#campus5" class="">광주</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapSeoul.jpg') }}" alt="노량진">
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit">
                                        <span class="tx-color">노량진</span> 캠퍼스 공지사항
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
                                <a href="http://pf.kakao.com/_kcZIu/chat" target="_blank"><img src="{{ img_url('gosi_acad/icon_kakaotalk.png') }}"> 카톡상담신청</a>
                            </div>
                        </div>
                    </div>
                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapIC.jpg') }}" alt="인천">
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
                    <div id="campus3" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapDG.jpg') }}" alt="대구">
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
                    <div id="campus4" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapBS.jpg') }}" alt="부산">
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
                    <div id="campus5" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapKJ.jpg') }}" alt="광주">
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
                </div>
            </div>
        </div>
    </div>
</div>
{!! popup('657001', $__cfg['SiteCode'], '0') !!}
<!-- End Container -->
@stop