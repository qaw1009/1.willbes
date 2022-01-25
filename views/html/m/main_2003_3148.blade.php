@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NSK mb40">

    {{--
    <div class="bnSec03">
        <ul>
            <li><a href="https://pass.willbes.net/m/pass/support/notice/show?board_idx=274671&s_cate_code=3059">6~8월 강의시간표</a></li>
            <li><a href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank">김동진법원팀 다음카페</a></li>
        </ul>
    </div>
    --}}
    
    <div class="MainSlider swiper-container swiper-container-page">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3148_720x400_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_02.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_03.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/3094_720x400_04.jpg"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="noticeTabs c_both">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">학원<br>공지사항</a></li>
            <li><a href="#notice2">동영상<br>공지사항</a></li>
            <li><a href="#notice3">신규<br>강의안내</a></li>
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

    <div class="mSubTit NSK-Black" >윌비스 검찰직 <span>이달의 강의</span></div>
    <div class="thisMonth">
        <div class="swiper-container-lec">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png" alt="강사명">
                        <div>
                            <span>황종휴 1</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png" alt="강사명">
                        <div>
                            <span>황종휴 2</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png" alt="강사명">
                        <div>
                            <span>황종휴 3</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png" alt="강사명">
                        <div>
                            <span>황종휴 4</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png" alt="강사명">
                        <div>
                            <span>황종휴 5</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/prof_index_50836.png" alt="강사명">
                        <div>
                            <span>황종휴 6</span>
                            경제학<br>
                            예비순환
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/prof_index_50836.png" alt="강사명">
                        <div>
                            <span>황종휴 7</span>
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
                                경제학<span></span><strong>황종휴 1</strong>
                                <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/lec_list_50837.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>김정일 2</strong>
                                <p>행정법 원론강의 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/lec_list_50838.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>박도원 3</strong>
                                <p>행정법 GS3순환 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/lec_list_50836.png" alt="강사명">
                            <div>
                                행정학<span></span><strong>백승준 4</strong>
                                <p>2020 행정학 예비순환 오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 5</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 6</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 7</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 8</strong>
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

    <div class="mSubTit NSK-Black mt30" ><span>윌비스 검찰직</span> 합격 로드맵</div>
    <div class="loadMap">
        <p class="start"><span>START</span></p>
        <ul>
            <li class="lmTitle"><a href="#none">1순환 기본강의(약 8주)</a>
                <div class="lmCts">
                    <div>
                        <span><‘체계’의 과정><br>
                        “기본서의 내용 중 폭넓은 이해를 위한 6~70%의 내용을 다루어 체계를 세우고 기본기를 다집니다.”
                        </span>
                    </div>
                    <ul>
                        <li>강의 + 복습 ➜ 2회독<br>
                            강약조절이 될 만큼 공부가 되지 않은 상태에서의 예습은 효율적이지 못하기 때문에 강의와 복습에 시간을 투자하여 큰 틀에서의 흐름을 파악하는 것을 목표로 학습합니다.
                        </li>                      
                    </ul>                    
                </div>
            </li>          
            <li class="lmTitle"><a href="#none">2순환 심화강의(약 12주)</a>
                <div class="lmCts">
                    <div>
                        <span>
                        <‘체득’의 과정><br>
                        “검찰직 시험 합격을 위한 모든 기초이론과 심화이론을 완성하는 과정입니다. 1순환 기본과정을 통해 세워진 체계와 다져진 기본기를 바탕으로 검찰직 시험에 출제되는 모든 이론을 정리합니다.”
                        </span>
                    </div>
                    <ul>
                        <li>
                            이러한 1~2순환을 거치면서 기본서 1권의 정리가 완성됩니다.
                        </li>
                        <li>
                            예습 + 강의 + 복습 ➜ 3회독<br>
                            2순환 강의에 앞서 1순환에 학습한 체계와 틀을 예습을 통해 확립합니다. 짧은 예습을 통해 2순환 강의에 더욱 집중할 수 있을 뿐 아니라, 복습시간을 단축하는 효과까지 얻을 수 있습니다.
                        </li>
                    </ul>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">3순환 진도별모의고사(기출포함) (약 10주)</a>
                <div class="lmCts">
                    <div>
                        <span>
                        <‘확인’의 과정><br>
                        “1~2순환 과정을 통해 습득한 모든 내용을 출제형태와 동일한 객관식의 형태로 확인하고, 효율적으로 회독수를 늘리기 위한 문제집에 정리하는 과정입니다.”
                        </span>
                    </div>
                    <ul>
                        <li>
                            진도별 모의고사 + 문제집<br>
                            미리 정해진 진도에 따라 1~2순환 과정을 통해 정리된 기본서로 예습을 하고, 실전과 같은 환경에서 매일 진도별 모의고사를 응시합니다. 이해를 통해 내 것이 되어 정확히 맞힌 문제와 틀리거나 헷갈린 문제를 구분하여 문제집에 체크하고 강의를 통해 객관식에 적합한 형식으로 정리하여 반복합니다.
                        </li>                    
                    </ul>
                </div>
            </li>
            <li class="lmTitle"><a href="#none">4순환 전범위모의고사(약 5주)</a>
                <div class="lmCts">
                    <div>
                        <span>
                            <‘확신’의 과정><br>
                            “실전과 같은 전범위 모의고사를 통해 나의 약점을 파악하고 3순환에 정리한 문제집에 보충적으로 정리하면서 나만의 마무리 교재를 완성합니다. 준비한 마무리 교재를 무한 반복하여 실력을 극대화화고 실수를 줄이도록 합니다.”
                        </span>
                    </div>
                    <ul>
                        <li>
                            3순환 과정을 통해 정리된 문제집을 이용하여 전범위를 빠르게 예습하고 매주 1회 실전모의고사를 치릅니다. 3순환에 이어 틀리거나 헷갈린 문제를 문제집에 체크하여 정리하고, 다시는 틀리지 않도록 정확히 암기합니다. 특히 반복해서 틀리는 문제들을 끝없이 반복하여 암기하는 과정을 통해 실력과 점수를 극대화합니다.
                        </li>
                        <li>
                            실전모의고사 + 강의 + 무한회독 ➜ 점수향상<br>
                            틀리는 문제와 내용을 반복하는 복습’을 통해 아는 것과 모르는 것, 헷갈리는 것이 모두 체크된 나만의 마무리 교재를 시험당일까지 무한회독합니다.
                        </li>
                    </ul>
                </div>
            </li>            
        </ul>
        <p class="goal"><span>GOAL</span></p>
    </div>

    <div class="csCenter">
        <ul class="link">
            <li><a href="https://pass.willbes.net/m/support/qna/index?s_cate_code=3035">동영상 1:1상담</a></li>
            <li><a href="https://pass.willbes.net/m/pass/support/qna/index?s_cate_code=3059">학원 1:1상담</a></li>
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
                        <span>1544-0330</span>
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
    //이달의강의
    $(function() {
        var swiper = new Swiper ('.swiper-container-Lec', { 
            slidesPerView: 'auto',
            spaceBetween: 7, 
            slidesPerGroup: 2,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
            pagination: { 
                el: '.swiper-pagination', 
                type: 'fraction', 
            }, 
        }); 
    });

    //맛보기강의
    $(function() {
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