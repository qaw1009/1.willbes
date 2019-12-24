@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both mb20">
    <div class="MainSlider swiper-container swiper-container-page c_both">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{ img_url('m/sample/slider1.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ img_url('m/sample/slider2.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ img_url('m/sample/slider3.jpg') }}"></div>
            <div class="swiper-slide"><img src="{{ img_url('m/sample/slider4.jpg') }}"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="buttonTabs noticeTabs c_both">
        <ul class="tabWrap buttonWrap noticeWrap three">
            <li><a href="#notice1" class="on">학원 공지사항</a></li>
            <li><a href="#notice2">동영상 공지사항</a></li>
            <li><a href="#notice3">수험정보</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent">
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice2" class="tabContent" style="display: none;">
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice3" class="tabContent" style="display: none;">
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.333</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내33</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내33</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="appPlayer c_both">
        <a href="#none">
            <img src="{{ img_url('m/main/icon_app_player.gif') }}">
        </a>
    </div>
</div>
<!-- End Container -->
@stop