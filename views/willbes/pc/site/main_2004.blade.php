@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="Container gosi GA NSK c_both">
    @include('willbes.pc.layouts.partial.site_menu')
    <div class="Section MainVisual mt20">
        <div class="widthAuto">
            @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
            <div class="VisualBox p_re">
                <div id="MainRollingDiv" class="MaintabList five">
                    <ul class="Maintab">
                        @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                            <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                @php
                                    $link_url = '';
                                    foreach($data['arr_main_banner']['메인_빅배너'] as $row) {
                                        if (empty($row['LinkUrl']) === false) {
                                            $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www');
                                        }
                                        echo '<li><a href="'.$link_url.'" target="_'.$row['LinkType'].'"><img src="'. $row['BannerFullPath'] . $row['BannerImgName'] .'" alt="'.$row['BannerName'].'"></a></li>';
                                    }
                                @endphp
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="VisualsubBox mt20">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(empty($data['arr_main_banner']['메인_서브'.$i]) === false)
                        <li>
                            <div class="bSlider acad">
                                <div class="sliderTM">
                                    @php
                                        $link_url = '';
                                        foreach($data['arr_main_banner']['메인_서브'.$i] as $row) {
                                            if (empty($row['LinkUrl']) === false) {
                                                $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www');
                                            }
                                            echo '<div><a href="'.$link_url.'" target="_'.$row['LinkType'].'"><img src="'. $row['BannerFullPath'] . $row['BannerImgName'] .'" alt="'.$row['BannerName'].'"></a></div>';
                                        }
                                    @endphp
                                </div>
                            </div>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    <div class="Section Bnr mt5 mb80">
        <div class="widthAuto">
            <div class="willbes-Bnr">
                @if(empty($data['arr_main_banner']['메인_띠배너']) === false)
                    @php
                        $link_url = '';
                        $last_banner = end($data['arr_main_banner']['메인_띠배너']); //마지막 배열값 셋팅
                        if (empty($last_banner['LinkUrl']) === false) {
                            $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . $last_banner['LinkUrlType'], 'www');
                        }
                        echo '<ul><li><a href="'.$link_url.'" target="_'.$last_banner['LinkType'].'"><img src="'. $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] .'" alt="'.$last_banner['BannerName'].'"></a></li></ul>';
                    @endphp
                @endif
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
                @for($i=1; $i<=5; $i++)
                    @if(empty($data['arr_main_banner']['메인_미들'.$i]) === false)
                        <li>
                            <div class="bSlider acad">
                                <div class="sliderTM">
                                    @php
                                        $link_url = '';
                                        foreach($data['arr_main_banner']['메인_미들'.$i] as $row) {
                                            if (empty($row['LinkUrl']) === false) {
                                                $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www');
                                            }
                                            echo '<div><a href="'.$link_url.'" target="_'.$row['LinkType'].'"><img src="'. $row['BannerFullPath'] . $row['BannerImgName'] .'" alt="'.$row['BannerName'].'"></a></div>';
                                        }
                                    @endphp
                                </div>
                            </div>
                        </li>
                    @endif
                @endfor
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
                @if(empty($data['arr_main_banner']['메인_이벤트']) === false)
                    <div class="bSlider acad">
                        <div class="sliderTM">
                            @php
                                $link_url = '';
                                foreach($data['arr_main_banner']['메인_이벤트'] as $row) {
                                    if (empty($row['LinkUrl']) === false) {
                                        $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www');
                                    }
                                    echo '<div><a href="'.$link_url.'" target="_'.$row['LinkType'].'"><img src="'. $row['BannerFullPath'] . $row['BannerImgName'] .'" alt="'.$row['BannerName'].'"></a></div>';
                                }
                            @endphp
                        </div>
                    </div>
                @endif
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
        @if(empty($data['arr_main_banner']['메인_대표교수']) === false)
            @php
                $last_banner = end($data['arr_main_banner']['메인_대표교수']); //마지막 배열값 셋팅
            @endphp
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 <span class="tx-color">공무원학원</span> 교수님</div>
                <img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}">
            </div>
        @endif
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

            @if(empty($data['arr_main_banner']['메인_포커스']) === false)
                <div class="sliderInfo">
                    <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                    @php
                        $link_url = '';
                        $last_banner = end($data['arr_main_banner']['메인_포커스']); //마지막 배열값 셋팅
                        if (empty($last_banner['LinkUrl']) === false) {
                            $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . $last_banner['LinkUrlType'], 'www');
                        }
                        echo '<a href="'.$link_url.'" target="_'.$last_banner['LinkType'].'"><img src="'. $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] .'" alt="'.$last_banner['BannerName'].'"></a>';
                    @endphp
                </div>
            @endif
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