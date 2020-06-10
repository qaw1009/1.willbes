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
            <li><a href="#notice1" class="on">학원 공지사항</a></li>
            <li><a href="#notice2">동영상 공지사항</a></li>
            <li><a href="#notice3">강의계획서</a></li>
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

    <div class="mSubTit NSK-Black mt30" ><span>PSAT</span> 합격 로드맵</div>
    <div class="loadMap">
        <p class="start"><span>START</span></p>
        <ul>
            <li class="lmTitle"><a href="#none">기초입문강의(4~5월)</a>
                <div class="lmCts">
                    입문자를 위한 기출유형분석으로 기초이론을 확립하는 강의
                    <ul>
                        <li>입문자를 위한 첫 과정으로, 기출문제를 중심으로 PSAT의 가장 기초적인 이론을 학습합니다.</li>
                        <li>기출문제를 통한 유형별 분석과 출제경향을 파악하는 과정으로, 향후 올바른 방향으로 PSAT 대비를 할 수 있도록 학습의 기준을 잡아주는 강의입니다.</li>
                    </ul>
                    <div><span>[PSAT의 올바른 학습을 위한 출발점에 있는 강좌입니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>          
            <li class="lmTitle"><a href="#none">기본강의(6~8월)</a>
                <div class="lmCts">
                    기본이론 습득 및 출제경향 파악과 기출문제 응용으로 기본기를 확립하는 강의
                    <ul>
                        <li>기본강의는 기출문제를 중심으로 기본이론과 심화내용을 학습하여, PSAT을 준비하는 수험생에게 가장 중요한 기본기 확립을 위한 필수 과정입니다.</li>
                        <li>기초입문강의에서 학습한 기출문제가 최근에는 어떻게 응용되고 있는지, 최신 출제경향은 어떠한지, 더 크게는 앞으로의 응용방향까지 연습해볼 수 있는 강의입니다.</li>
                    </ul>
                    <div><span>[PSAT 시험에서 요구되는 기본기를 습득할 수 있는 필수 강좌입니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">심화강의(9~10월)</a>
                <div class="lmCts">
                    정리된 이론을 문제에 적용하여 연습하고, 취약점을 보완하는 HALF 모의고사 강의
                    <ul>
                        <li>본격적인 문제해결 과정으로, 유형별 HALF PSAT 모의고사(20문제) 후 문제풀이와 유형별 주요이론에 대한 적용연습이 병행됩니다.</li>
                        <li>기출변형문제를 중심으로 이루어지는 강의로써 입법고시 문제까지 아우르게 되어, PSAT 문제해결능력을 한 단계 업그레이드 할 수 있습니다.</li>
                    </ul>
                    <div><span>[각 유형별 이론들을 하프모의고사에 직접 적용하여 문제해결을 위한 SKILL과 TIP을 학습하고 속도감 있는 문제풀이 방법을 연습합니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">핵심강의(11~12월)</a>
                <div class="lmCts">
                    단기간에 연도별 기출문제를 정리로 PSAT 전범위의 균형감각 유지를 위한 강의
                    <ul>
                        <li>기출문제에 대한 속도감 있는 풀이과정이 주가 되는 강의로, 그 동안 공부한 기출문제를 빠르게 정리할 수 있는 과정입니다.</li>
                        <li>기초입문강의, 기본강의, 심화강의가 주로 문제를 유형별로 학습하는데 초점이 맞추어져 있다면, 핵심강의는 연도별로 기출문제를 정리할 수 있으므로 균형적인 감각을 유지하는데 큰 도움이 되는 강의입니다.</li>
                    </ul>
                    <div><span>[그동안 공부한 기출문제를 빠르게 연도별로 정리하고, 실전모의고사 전 PSAT에 대한 균형감각을 되살리기에 적합한 강의입니다.]</span></div>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">실전모의고사+핵심해설강의(12~1월)</a>
                <div class="lmCts">
                    실전모의고사+핵심해설강의 
                    <ul>
                        <li>실제 시험과 유사한 조건에서 매일 신작 40문제 모의고사 후 해설 강의 진행으로, 자신의 강·약점을 최종점검하고, 최대표본을 통해 객관적 위치를 확인할 수 있습니다.</li>
                        <li>정답률 향상 및 시간안배 연습, 핵심내용의 최종정리 등 시험 전반의 운영능력을 향상할 수 있는 실전용 마무리 과정입니다.</li>
                    </ul>
                    <div><span>[매일 40문제의 신작 모의고사로 실전 연습하고, 시험 전반의 능력을 모두 향상시키는 합격을 위한 필수 강좌입니다.]</span></div>
                    <br>
                    <a href="#none" class="moreBtn">강의 바로보기 ></a>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">테마특강</a>
                <div class="lmCts">
                    각 영역의 중요테마를 단기간에 집중 정리하는 강의 
                    <ul>
                        <li>각 영역에서 큰 비중을 차지하는 주요 테마를 집중 학습하고 정리합니다.</li>
                        <li>PSAT의 근본이 되는 핵심 테마를 학습하는 과정으로, 향후 기본이론 습득과 문제적용에 큰 도움이 되는 강의입니다.</li>
                    </ul>
                    <div><span>[주요 테마에 대한 심도 있는 학습과 관련 연습문제를 풀이하는 포인트 강좌입니다.]</span></div>
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