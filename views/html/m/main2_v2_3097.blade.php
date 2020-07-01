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

    <div class="mSubTit NSK-Black mt30" ><span>5급 헌법</span> 합격 로드맵</div>
    <div class="loadMap">
        <p class="start"><span>START</span></p>
        <ul>
            <li class="lmTitle"><a href="#none">기본강의(5월)</a>
                <div class="lmCts">
                    5급 헌법의 출제 논점을 헌법이 생소한 분들도 쉽게 이해하고 정리할 수 있는 입문자용 강의
                    <ul>
                        <li>기출문제의 완벽한 분석을 통한 기본이론 습득으로, 향후 올바른 방향으로 시험을 대비할 수 있도록 학습방향과 기준을 잡아주는 강의입니다.</li>
                        <li>기출 경향 분석을 통해 중요이론과 조문 및 판례를 정리하여 필요한&최소한의 학습량을 제시합니다.</li>
                    </ul>
                    <div><span>[5급 헌법 PASS를 위해 필요한 만큼을 정확하고 효과적으로 정리하는 필수 이론 강좌입니다.]</span></div>                    
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>          
            <li class="lmTitle"><a href="#none">핵심강의(9월)</a>
                <div class="lmCts">
                    출제 가능성이 높은 부분을 중심으로 필요한 핵심만을 정리하는 강의
                    <ul>
                        <li>헌법조문 및 부속법률, 판례 등을 기출된 부분, 제·개정된 부분 등 출제가능성이 높은 부분을 중심으로 정리합니다.</li>
                        <li>최근 출제경향을 반영하여 꼭 봐야할 부분과 넘어가도 될 부분을 정확히 구분하여 전체적인 학습량을 줄입니다.</li>
                    </ul>
                    <div><span>[5급 헌법 PASS에 반드시 필요한 부분만 선택해서 집중하는 강좌입니다.]</span></div> 
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">진도별 모의고사+집중정리강의(12월)</a>
                <div class="lmCts">
                    최근 출제경향을 적극 반영한 신작 진도별 모의고사(25문제)로 핵심내용 정리와 실전 연습을 병행하는 강의
                    <ul>
                        <li>실제시험과 유사한 조건에서 매일 진도별 신작 모의고사(25문제)를 통해 시험운영능력을 향상하고, 
                            자세한 해설을 통해 자신의 취약부분을 점검하고 보완합니다.</li>
                        <li>출제 가능성 높은 문제들에 대한 풀이연습 및 핵심내용 체크와 최신판례까지 정리합니다.</li>
                        <li>전체 수강생의 오답지문 선택비율의 분석을 통해 쉽게 빠질 수 있는 함정을 확인하고, 중요 지문의 정리를 통해 실전을 대비합니다.</li>
                    </ul>
                    <div><span>[진도별 모의고사로 취약지점 분석과 문제풀이 연습, 핵심내용을 점검하는 필수강좌입니다.]</span></div> 
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">Final 모의고사(2월)</a>
                <div class="lmCts">
                    오직 5급 헌법 시험만을 위한 전범위 모의고사와 해설 강의 
                    <ul>
                        <li>헌법조문 및 부속법률, 판례 등을 최근 시험출제비율에 맞추어 매회 실제시험과 같이 진행되는 전범위 모의고사입니다.</li>
                        <li>문제+해설로 재편집된 해설지만 참조하여도 문제분석이 충분하도록 풍부한 해설을 수록하였습니다.</li>
                    </ul>
                    <div><span>[전범위 모의고사로 실전감각을 극대화하고 시험 전 최종점검을 위한 강좌입니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">테마특강</a>
                <div class="lmCts">
                    테마특강
                    <ul>
                        <li>시험에 필요한 부분을 테마 별로 정리하여 필요한 부분만 선택과 집중 할 수 있습니다.</li>
                        <li>5급 헌법 공부방법부터 기초개념, 조문정리, 최신판례 등 시기와 수준에 따라 필요한 부분을 정리합니다.</li>
                    </ul>
                    <div><span>[주요 테마의 집중력 있는 학습과 정리를 진행하는 포인트 강좌입니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
        </ul>
        <p class="goal"><span>GOAL</span></p>
    </div>

    <div class="csCenter">
        <ul class="link">
            <li><a href="#none">동영상 1:1상담</a></li>
            <li><a href="#none">학원 1:1상담</a></li>
            <li><a href="#none">학원 오시는 길</a></li>
        </ul>
        <ul class="tel">
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>온라인문의</strong>
                        <span>1544-5006</span>
                        평일 09시~18시<Br>
                        주말/공휴일 제외
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>학원문의</strong>
                        <span>1544-5881</span>
                        평일 08시~18시<Br>
                        주말/공휴일 가능
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>교재문의</strong>
                        <span>1544-4944</span>
                        평일 09시~18시<Br>
                        주말/공휴일 제외
                    </div>
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