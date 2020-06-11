@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NSK mb40"> 
    <div class="bnSec03">
        <ul>
            <li><a href="http://reserve.willbes.net/sub_login/" target="_blank">강의실좌석예약</a></li>
            <li><a href="#none">강의실좌석예약</a></li>
        </ul>
    </div>

    <div class="MainSlider swiper-container swiper-container-page">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_02.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_03.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_04.jpg"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>  

    <div class="bnSec02">
        <ul>
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3094_240x146_01.jpg"></a></li>
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3094_240x146_02.jpg"></a></li>
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3094_240x146_03.jpg"></a></li>
        </ul>
    </div>

    <div class="noticeTabs c_both">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">학원<br>공지사항</a></li>
            <li><a href="#notice2">동영상<br>공지사항</a></li>
            <li><a href="#notice3">강의<br>계획서</a></li>
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

    <div class="mSubTit NSK-Black" >윌비스 한림법학원 <span>이달의 강의</span></div>
    <div class="thisMonth">
        <div class="swiper-container-lec">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/prof_index_50836.png" alt="강사명">
                        <div>
                            <span>황종휴</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div> 

    <div class="mSubTit NSK-Black mt30" >윌비스 <span>대표 강의 맛보기</span></div>
    <div class="sampleView">
        <div class="overhidden">
            <div class="swiper-container-view">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                                경제학<span></span><strong>황종휴</strong>
                                <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/lec_list_50837.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>김정일</strong>
                                <p>행정법 원론강의 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/lec_list_50838.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>박도원</strong>
                                <p>행정법 GS3순환 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/lec_list_50836.png" alt="강사명">
                            <div>
                                행정학<span></span><strong>백승준</strong>
                                <p>2020 행정학 예비순환 오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <div class="csCenter">
        <ul class="link">
            <li><a href="#none">동영상 1:1상담</a></li>
            <li><a href="#none">학원 1:1상담</a></li>
            <li><a href="#none">학원 오시는 길</a></li>
        </ul>
        <ul class="tel">
            <li>
                <img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>온라인문의</strong>
                    <span>1544-5006</span>
                    평일 09시~18시<Br>
                    주말/공휴일 제외
                </div>
            </li>
            <li>
                <img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>학원문의</strong>
                    <span>1544-5881</span>
                    평일 08시~18시<Br>
                    주말/공휴일 가능
                </div>
            </li>
            <li>
                <img src="{{ img_url('m/main/icon_tel.png') }}">
                <div>
                    <strong>교재문의</strong>
                    <span>1544-4944</span>
                    평일 09시~18시<Br>
                    주말/공휴일 제외
                </div>
            </li>
        </ul>
    </div>
    
    <div class="appPlayer c_both">
        <a href="#none">
            <img src="{{ img_url('m/main/icon_app_player.gif') }}">
        </a>
    </div>

</div>
<!-- End Container -->
<script>    
    //상단메뉴    
    $(function() {
        $('.subMenu .sMenuList a.moreMenu').click(function() {
            $('.subMenu .sMenuList .dropBox').removeClass('on');

            if ($(this).next().is(':visible')) {
                $(this).next().hide();
                $(this).removeClass('on');
            } else {
                $('.dropBox').hide();
                $(this).next().show();
                $(this).addClass('on');
            }   
        });
    });


    //이달의강의
    var swiper = new Swiper ('.swiper-container-Lec', { 
        slidesPerView: 'auto',
        spaceBetween: 7, 
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
        pagination: { 
            el: '.swiper-pagination', 
            clickable: true, 
        }, 
    }); 

    //맛보기강의
    var swiper = new Swiper('.swiper-container-view', {
        slidesPerView: 1,
        slidesPerColumn: 4,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });    

    //로드맵
    $(function() {
        $('.loadMap .lmTitle a').click(function() {
            var $loadmap_table = $(this).parents('.loadMap li').find('.lmCts');
            if ($loadmap_table.is(':hidden')) {
                $loadmap_table.show().css('display','block');
                $(this).css('background-image','url("/public/img/willbes/m/main/icon_arr_bottom.png")');
            } else {
                $loadmap_table.hide().css('display','none');
                $(this).css('background-image','url("/public/img/willbes/m/main/icon_arr_top.png")');
            }
        });    
    });
    
</script> 

@stop