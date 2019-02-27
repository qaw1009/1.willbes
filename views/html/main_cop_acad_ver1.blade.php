@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container cop_acad NSK c_both">
    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
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
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Section Bnr">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="#none"><img src="{{ img_url('cop_acad/banner/bnr_190111.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section MainVisual MainVisual_acad mb30">
        <div class="widthAuto">
            <ul>
                <li class="VisualBox_acad">
                    <a href="http://www.willbescop.net/event/movie/event.html?event_cd=Off_basic&EventReply=Y&topMenuType=F#main" target="_blank"><img src="{{ img_url('cop_acad/visual/visual_190111.jpg') }}"></a>
                    <!--
                    <div class="bSlider acad">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visual_190111.jpg') }}"></a></div>
                            <div><img src="{{ img_url('cop_acad/visual/visual_190111.jpg') }}"></div>
                        </div>
                    </div>
                    -->
                </li>
                <li class="VisualsubBox_acad">
                    <a href="http://www.willbescop.net/gosi/event.html?event_cd=Off_pass_4month&topMenuType=F" target="_blank"><img src="{{ img_url('cop_acad/visual/visualsub_190110.jpg') }}"></a>
                    <!--
                    <div class="bSlider acad">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visualsub_190110.jpg') }}"></a></div>
                            <div><img src="{{ img_url('cop_acad/visual/visualsub_190111.jpg') }}"></div>
                        </div>
                    </div>
                    -->
                </li>
                <li class="VisualsubBox_acad">
                    <a href="https://cop.dev.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=1360&" target="_blank"><img src="{{ img_url('cop_acad/visual/visualsub_190111.jpg') }}"></a>
                    <!--
                    <div class="bSlider acad">
                        <div class="bSlider slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/visual/visualsub_190111.jpg') }}"></a></div>
                            <div><img src="{{ img_url('cop_acad/visual/visualsub_190110.jpg') }}"></div>
                        </div>
                    </div>
                    -->
                </li>
            </ul>
        </div>
    </div>
    <div class="Section Section1 mb50">
        <div class="widthAuto">
            <div class="sliderPick pick">
                <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰</span> 학원 Hot Pick</div>
                <div class="pickBox pick1">
                    <a href="http://www.willbescop.net/gosi/event.html?event_cd=Off_180828_g&topMenuType=F" target="_blank"><img src="{{ img_url('cop_acad/event/evt_190101.jpg') }}"></a>
                    <!--
                    <div class="bSlider acad">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/event/evt_190101.jpg') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop_acad/event/evt_190102.jpg') }}"></a></div>
                        </div>
                     </div>
                    -->
                </div>
                <div class="pickBox pick2">
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=On_181228_p&topMenuType=O" target="_blank"><img src="{{ img_url('cop_acad/event/evt_190102.jpg') }}"></a>
                    <!--
                    <div class="bSlider acad">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('cop_acad/event/evt_190101.jpg') }}"></a></div>
                            <div><a href="#none"><img src="{{ img_url('cop_acad/event/evt_190102.jpg') }}"></a></div>
                        </div>
                     </div>
                    -->
                </div>
            </div>
            <div class="sliderEvt pick">
                <div class="will-acadTit">실력을 <span class="tx-color">변화시키는</span> 명품특강</div>
                <ul>
                    <li><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_181220_j&topMenuType=O#tab01" target="_blank"><img src="{{ img_url('cop_acad/event/evt_190103.jpg') }}"></a></li>
                    <li>
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                <div><a href="https://cop.dev.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=1363&"><img src="{{ img_url('cop_acad/event/evt_190104.jpg') }}"></a></div>
                                <div><a href="https://cop.dev.willbes.net/pass/offinfo/boardInfo/show/78?board_idx=1363&"><img src="{{ img_url('cop_acad/event/evt_190104.jpg') }}"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="acad_infoBox">
                <li class="w-infoBox1">
                    <a href="https://cop.dev.willbes.net/pass/consultManagement/index"><span>1:1 심층상담</span></a>
                </li>
                <li class="w-infoBox2">
                    <a href="https://cop.dev.willbes.net/pass/offinfo/boardInfo/index/82"><span>강의실배정표</span></a>
                </li>
                <li class="w-infoBox3">
                    <a href="#none"><span>방문접수</span></a>
                </li>
                <li class="w-infoBox4">
                    <a href="#none"><span>모의고사접수</span></a>
                </li>
                <li class="w-infoBox5">
                    <a href="#none"><span>학원갤러리</span></a>
                </li>
            </ul>
        </div>
    </div>

    {{-- on air include --}}
    @include('willbes.pc.site.main_partial.on_air')

    <div class="Section Section2 mb10">
        <div class="widthAuto">
            <div class="sliderSuccess">
                <div class="will-acadTit">합격으로 증명된 윌비스 <span class="tx-color">신광은경찰</span></div>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop_acad/event/info_190101.jpg') }}"></a>
                <!--
                <div class="bSlider acad blue">
                    <div class="slider">
                        <div><a href="#none"><img src="{{ img_url('cop_acad/event/info_190101.jpg') }}"></a></div>
                        <div><a href="#none"><img src="{{ img_url('cop_acad/event/info_190101.jpg') }}"></a></div>
                    </div>
                </div>
                -->
            </div>
            <div class="sliderInfo">
                <div class="will-acadTit"><span class="tx-color">학원</span> 소식</div>
                <ul>
                    <li><a href="https://chamsooristudyclub.modoo.at/" target="_blank"><img src="{{ img_url('cop_acad/event/info_190102.jpg') }}"></a></li>
                    <li><a href="https://cop.dev.willbes.net/pass/support/notice/show?board_idx=1361&"><img src="{{ img_url('cop_acad/event/info_190103.jpg') }}"></a></li>
                </ul>
            </div>
            <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad two">
                    <li><a href="#notice1" class="on">시험공고</a></li>
                    <li><a href="#notice2" class="">수험뉴스</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                        <ul class="List-Table">
                            <li><a href="#none">공지사항 제목이 출력됩니다. 공지사항 제목이 출력됩니다.</a></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내 안내안내안내 새벽시스템점검안내 안내안내안내</a></li>
                            <li><a href="#none">설연휴학원고객센터운영안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내 고객센터운영안내</a></li>
                        </ul>
                    </div>
                    <div id="notice2" class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                        <ul class="List-Table">
                            <li><a href="#none">공지사항 제목이 출력됩니다.</a></li>
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
    <div class="Section Bnr mt10 mb60">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                <ul>
                    <li><a href="https://cop.dev.willbes.net/lecture/index/cate/3001/pattern/free"><img src="{{ img_url('cop_acad/banner/bnr_190110.jpg') }}"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Section3 mb80">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰</span> 학원 강사진</div>
            <ul class="ProfBox">
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50100/?cate_code=3006&subject_idx=10066&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95"><img src="{{ img_url('cop_acad/prof/prof_190101.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50101/?cate_code=3006&subject_idx=10068&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0"><img src="{{ img_url('cop_acad/prof/prof_190102.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50102/?cate_code=3006&subject_idx=10070&subject_name=%ED%98%95%EB%B2%95"><img src="{{ img_url('cop_acad/prof/prof_190103.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50103/?cate_code=3006&subject_idx=10072&subject_name=%EC%98%81%EC%96%B4"><img src="{{ img_url('cop_acad/prof/prof_190104.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50105/?cate_code=3006&subject_idx=10074&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC"><img src="{{ img_url('cop_acad/prof/prof_190105.png') }}"></a></li>
                <li><a href="https://cop.dev.willbes.net/pass/professor/show/prof-idx/50104/?cate_code=3006&subject_idx=10074&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC"><img src="{{ img_url('cop_acad/prof/prof_190106.png') }}"></a></li>
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
    <div class="Section Section4 mb50">
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
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus3" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus4" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus5" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus6" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus7" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus8" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                    <div id="campus9" class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('cop_acad/map/map1.jpg') }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@stop