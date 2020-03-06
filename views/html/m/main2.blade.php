@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both mb20">
    <div class="onlecgosi">
        <div>동영상 수강신청 ▼</div>
        <div>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3094">5급행정</a>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3095">국립외교원</a>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3096">PSAT</a>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3097">5급헌법</a>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3098">법원행시</a>
            <a href="https://gosi.willbes.net/m/lecture/index/pattern/only?search_order=course&cate_code=3099">변호사시험</a>
        </div>
    </div>

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

    <div class="gosibtns">
        <ul>
            <li><a href="https://www.willbes.net/m/classroom/on/list/ongoing">내강의실</a></li>
            <li><a href="https://gosi.willbes.net/support/notice/show/cate/3094?board_idx=261349" target="_blank">신규동영상안내</a></li>
            <li><a href="https://gosi.willbes.net/m/lecture/index/pattern/free">무료특강(보강)</a></li>
            <li><a href="https://gosi.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank">강의시간표</a></li>
            <li><a href="https://gosi.willbes.net/pass/offinfo/boardInfo/index/109" target="_blank">강의계획서</a></li>
            <li><a href="https://gosi.willbes.net/pass/offinfo/boardInfo/index/82"  target="_blank">강의실배정표</a></li>
        </ul>
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