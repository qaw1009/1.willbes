@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        <div class="MainTxtBnr">적중! 적중! 또 다시 적중! <strong>신광은경찰팀</strong>은 곧, <strong>합격</strong>입니다.</div>
        {!! banner('M_메인_01', 'MainSlider swiper-container swiper-container-page c_both', $__cfg['SiteCode'], '0') !!}
        <div class="MainFixBnr c_both">
            <ul>
                <li>{!! banner('M_메인_02_01', '', $__cfg['SiteCode'], '0') !!}</li>
                <li>{!! banner('M_메인_02_02', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>
        {!! banner('M_메인_03', 'MainBnrSlider', $__cfg['SiteCode'], '0') !!}
        <div class="line">-</div>
        {{--
        <div class="lineTabs lecProfTabs c_both">
            <div class="MainCampusTabs">
                <div class="willbes-Txt-Tit NG">· 전국캠퍼스</div>
                <div class="MainCampusSlider swiper-container swiper-container-campus c_both">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><a class="on" href="#none">노량진</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">신림</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">인천</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">대구</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">부산</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">광주</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">제주</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">전북</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">전남</a><span class="row-line">|</span></div>
                        <div class="swiper-slide"><a href="#none">강원</a></div>
                    </div>
                </div>
                <div class="MainCampusListSlider c_both p_re">
                    <div class="campuslistWrap swiper-container swiper-container-campus-list swiper-wrapper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><a class="on" href="#none">국어</a></div>
                            <div class="swiper-slide"><a href="#none">공무원영어</a></div>
                            <div class="swiper-slide"><a href="#none">공무원국어</a></div>
                            <div class="swiper-slide"><a href="#none">영어</a></div>
                            <div class="swiper-slide"><a href="#none">공무원수학</a></div>
                            <div class="swiper-slide"><a href="#none">공무원한국사</a></div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="tabSection">
                <ul class="tabWrap lineWrap boxlineWrap lecProfWrap two">
                    <li><a href="#lecprof1" class="on"><img src="{{ img_url('m/main/icon_new.png') }}">신규강좌</a></li>
                    <li><a href="#lecprof2"><img src="{{ img_url('m/main/icon_best.png') }}">추천강좌</a></li>
                </ul>
                <div class="tabBox lineBox lecProfBox">
                    <div id="lecprof1" class="tabContent">
                        <ul>
                            <li class="profImg"><img src="{{ img_url('m/sample/prof1.jpg') }}"></li>
                            <li class="w-list">
                                <div class="w-tit">22222차 대비 적중예상 문제풀이</div>
                                <div class="w-name">신광은 교수님</div>
                            </li>
                        </ul>
                        <ul>
                            <li class="profImg"><img src="{{ img_url('m/sample/prof1.jpg') }}"></li>
                            <li class="w-list">
                                <div class="w-tit">hggkghggkh2차 대비 적중예상 문제풀이</div>
                                <div class="w-name">신광은 교수님</div>
                            </li>
                        </ul>
                    </div>
                    <div id="lecprof2" class="tabContent" style="display: none;">
                        <ul>
                            <li class="profImg"><img src="{{ img_url('m/sample/prof1.jpg') }}"></li>
                            <li class="w-list">
                                <div class="w-tit">33333hjdaslhflashdj차 대비 적중예상 문제풀이</div>
                                <div class="w-name">신광은 교수님</div>
                            </li>
                        </ul>
                        <ul>
                            <li class="profImg"><img src="{{ img_url('m/sample/prof1.jpg') }}"></li>
                            <li class="w-list">
                                <div class="w-tit">00차 대비 적중예상 문제풀이</div>
                                <div class="w-name">신광은 교수님</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        --}}
        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>
        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
@stop