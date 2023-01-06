@extends('html.m.layouts.v2.master')

@section('content')
<style>
    .swiper-sec06-Wrap {
        position: relative;
        overflow: hidden;
        padding:5vh 0 6vh;
        background: #c0bcb0;
        margin-top:2vh;
    }
    .swiper-sec06-Wrap .gosiTitle {
	font-size: 3vh;
	text-align: center;
	padding: 0 0 20px;
	word-break: keep-all;
	line-height: 1.2;
    color:#fff
}
    .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
    .swiper-sec06-Wrap .swiper-slide {
        width: 210px; align-items: flex-start; margin-right:10px;
    }
    .swiper-sec06-Wrap .swiper-slide:last-child {margin-right:0}
    .swiper-sec06-Wrap .swiper-slide a {
        display: block;
    }
    .swiper-sec06-Wrap .swiper-slide img {
        max-width: 100%;
    }
    /* iPhone 5/SE */
    @@media only screen and (max-width: 374px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }            
    }
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }
    }
</style>
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

    <div class="swiper-sec06-Wrap">
        <div class="gosiTitle NSK">
            합격을 책임지는 <strong class="NSK-Black">소방대표 교수진</strong>
        </div>

        <div class="swiper-sec06">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_01.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_02.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_03.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_04.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_05.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_06.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_07.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/210x350_08.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
        </div>
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

<script>   
    //교수진
    var swiper6 = new Swiper('.swiper-sec06', {
      slidesPerView: 'auto',
      slidesPerColumn: 1,
      spaceBetween: 10,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
    });

</script> 
@stop