@extends('html.m.layouts.v2.master')

@section('content')
<style>
    .gosiTitle {
        font-size: 2.2vh;
        text-align: center;
        padding: 5vh 0 2vh;
        word-break: keep-all;
        line-height: 1.2;
    }
    .swiper-sec06-Wrap {
        position: relative;
        overflow: hidden;
        padding:0 0 6vh;
        margin-top:5vh;
    }
    .swiper-sec06-Wrap .gosiTitle {
        padding: 0 0 20px;
    }
    .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
    .swiper-sec06-Wrap .swiper-slide {
        width: 208px; align-items: flex-start; margin-right:10px;
    }
    .swiper-sec06-Wrap .swiper-slide:last-child {margin-right:0}
    .swiper-sec06-Wrap .swiper-slide a {
        display: block;
    }
    .swiper-sec06-Wrap .swiper-slide img {
        max-width: 100%;
    }

    .csCenter li {
        width: 50%;
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
<div id="Container" class="Container NG c_both gosi mb20">    
    <div class="MainSlider swiper-container swiper-container-page c_both">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0910/banner_20191028180337.jpg"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2019/0510/banner_20190510170355.jpg"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://police.willbes.net/public/uploads/willbes/banner/2020/0304/banner_20200304162845.jpg"></a></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div> 

    <div class="gosiSecBn01 mt20">
        <ul>
            <li class="f_left">
                <a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_350x130_01.jpg"></a>
            </li>
            <li class="f_right">
                <div class="MainSlider swiper-container swiper-container-page">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_350x130_03.jpg"></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_350x130_02.jpg"></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_350x130_04.jpg"></div>
                        <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_350x130_01.jpg"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </li>
        </ul>
    </div>

    <div class="gosiTitle NSK">
        <span class="NSK-Black">신규개강</span> 안내
    </div>

    <div class="MainSlider swiper-container swiper-container-page">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2015/720x130_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2015/720x130_01.jpg"></div>
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
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2015/208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
        </div>
    </div>  

    <div class="gosiTitle NSK">
        윌비스 <span class="NSK-Black">불꽃소방</span> 오시는 길
    </div>

    <div class="campus">
        <div class="mapCts">
            <div id="map01">
                <div><img src="https://static.willbes.net/public/images/willbes/gosi_acad/map/mapSeoul.jpg"></div>
                <div class="add">
                    <p>서울 동작구 만양로 105 한성빌딩 2층</p>
                    <p>1544-0330</p>
                    <a href="#none">실시간 상담신청 ></a>
                </div>
            </div>
        </div>
    </div>

    <div class="noticeTabs c_both mt30">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">학원공지사항</a></li>
            <li><a href="#notice2">시험공고</a></li>
            <li><a href="#notice3">수험뉴스</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent pd20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice2" class="tabContent pd20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none">공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice3" class="tabContent pd20">
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

    <div class="csCenter">
        <ul class="link">
            <li><a href="https://willbesedu.willbes.net/m/pass/support/qna/index">학원 1:1상담</a></li>
            <li><a href="#map01">학원 오시는 길</a></li>
        </ul>
        <ul class="tel">
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>학원문의</strong>
                        <span>1544-6112</span>
                        평일 09시~18시<br>
                        (점심시간 12시~13시)<br>
                        공휴일/일요일휴무
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>교재문의</strong>
                        <span>1544-4944</span>
                        평일 09시~17시<br>
                        (점심시간 12시~13시)<br>
                        공휴일/일요일휴무
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <div class="appPlayer c_both">
        <a href="#none">
            <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x96.jpg">
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