@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both mb20">    
    <div class="MainSlider swiper-container swiper-container-page c_both">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0910/banner_20191028180337.jpg"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0510/banner_20190510170355.jpg"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2020/0304/banner_20200304162845.jpg"></a></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div> 
    
    <div class="MainSlider swiper-container swiper-container-page c_both mt20">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2002_734_120_20032301.jpg" alt="샘플"></a></div>
            
            {{--<div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2002_734_120_20032302.jpg" alt="샘플"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2002_734_120_20032303.jpg" alt="샘플"></a></div>--}}
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div> 

    <div class="buttonTabs noticeTabs c_both">
        <ul class="tabWrap buttonWrap noticeWrap three">
            <li><a href="#notice1" class="on">공지사항</a></li>
            <li><a href="#notice2">시험공고</a></li>
            <li><a href="#notice3">수험뉴스</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent pt20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice2" class="tabContent pt20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice3" class="tabContent pt20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
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

    <div class="bannerSec01">
        <a href="#none">
            <img src="https://static.willbes.net/public/images/promotion/m/2002_734_120_20032301.jpg" alt="샘플">
        </a>
    </div>

    <div class="appPlayer c_both">
        <a href="#none">
            <img src="{{ img_url('m/main/icon_app_player.gif') }}">
        </a>
    </div>
</div>
<!-- End Container -->
@stop