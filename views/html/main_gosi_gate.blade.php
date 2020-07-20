@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">

</style>

<div id="Container" class="Container gosi-gate NGR c_both">
    <div class="widthAuto gosi-gate-top">
        <div class="gosi-gate-sns">
            <ul>
                <li>
                    <a href="https://www.youtube.com/channel/UCsNPdhwjR37qVtuePB599KQ" target="_blank">
                        <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/pass/promotion/index/cate/3048/code/1104') }}" target="_blank">
                        <img src="{{ img_url('gnb/icon_kakao.png') }}" title="카카오톡">
                    </a>
                </li>
                <li>
                    <a href="https://tv.naver.com/willbes79" target="_blank">
                        <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                    </a>
                </li>
                <li>
                    <a href="https://blog.naver.com/willbes79" target="_blank">
                        <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                    </a>
                </li>
                <li>
                    <a href=" https://www.instagram.com/willbes_gong/" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/2019/10/icon_instagram.png" title="인스타그램"> 
                    </a>
                </li>
            </ul>
        </div>

        <div class="gosi-logo">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2003_logo.png" alt="윌비스 공무원">
        </div>

        <div class="gosi-gate-search">
            <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                <div class="Section widthAuto">
                    <div class="onSearch NGR">
                        <div>
                            <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                            <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                            <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                            <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                            <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                            <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                        </div>
                        <div class="searchPop">
                            <div class="popTit">인기검색어</div>
                            <ul>
                                <li><a href="#nnon">신광은</a></li>
                                <li><a href="#nnon">무료특강</a></li>
                                <li><a href="#nnon">형소법</a></li>
                                <li><a href="#nnon">기미진</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="gosi-gate-menu">
        <ul>
            <li><a href="#none">무료인강</a></li>
            <li><a href="#none">9급</a></li>
            <li><a href="#none">7급 PSAT</a></li>
            <li><a href="#none">7급</a></li>
            <li><a href="#none">세무직</a></li>
            <li><a href="#none">법원직</a></li>
            <li><a href="#none">소방직</a></li>
            <li><a href="#none">기술직</a></li>
            <li><a href="#none">군무원</a></li>
        </ul>
    </div>
    
    <div class="Section mt30">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x80.jpg" alt="배너명">
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_txt01.jpg" alt="윌비스 패스">
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto gosi-gate-bnSec01 nSlider pick">   
            <div class="f_left">                
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_540x400_01.jpg" alt="정태정 핵심이론"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_540x400_02.jpg" alt="10일 완성 패키지"></a></div>
                </div>
            </div>
            <div class="f_right">                    
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_540x400_02.jpg" alt="10일 완성 패키지"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_540x400_01.jpg" title="KCG 핵심요약"></a></div>
                </div>
            </div>
            </ul>         
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_txt02.jpg" alt="윌비스 티패스">
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <div class="gosi-gate-bnSec02 p_re">
                <div id="MainRollingDiv" class="MaintabList five">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">9/7급공무원</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">소방직</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">세무직</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);" class="">법원직</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);" class="">군무원/기술직</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <ul class="MaintabSlider">
                        <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x400_01.jpg" alt="배너명"></a></li>
                        <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x400_02.jpg" alt="배너명"></a></li>
                        <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x400_01.jpg" alt="배너명"></a></li>
                        <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x400_02.jpg" alt="배너명"></a></li>
                        <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_1120x400_01.jpg" alt="배너명"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section mt50">
        <div class="widthAuto">
            <ul class="gosi-gate-bnSec03">
                <li><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_img01.jpg" alt="공무원, 어떻게 시작해야될지 고민된다면?"></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_300x200_01.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_300x200_02.jpg" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_txt03.jpg" alt="윌비스 교수진">
            <ul class="gosi-gate-prof">
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_220x380.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_txt04.jpg" alt="수험생활 tip">
            <div class="castBox">
                <ul class="castslider">
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">190504 중앙경찰학교 입교 현장스케치</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰학원 행사이벤트 및 커리큘럼안내</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">합격생이 말해주는 1단계 문제풀이 ☜ 12월30일 大개강이라닛☆</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x220.jpg">
                            </a>
                        </div>
                        <div class="castTitle">압도적 1위 장정훈 교수 6만돌파 이벤트!</div>
                    </li>
                </ul>  
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                
            </div>
        </div>
    </div>

    <div class="Section mt50">
        <div class="widthAuto gosi-gate-bnSec04 nSlider pick">   
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_txt05.jpg" alt="학원 실강 안내">
            <ul>
                <li>
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_01.jpg" alt="정태정 핵심이론"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_02.jpg" alt="10일 완성 패키지"></a></div>
                    </div>
                </li>
                <li>
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_03.jpg" alt="정태정 핵심이론"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_01.jpg" alt="10일 완성 패키지"></a></div>
                    </div>
                </li>
                <li>
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_02.jpg" alt="정태정 핵심이론"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/gosi_gate_370x320_03.jpg" alt="10일 완성 패키지"></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mt80">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto350 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 경찰3과 과목별 만점자를 소개합니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>하승민 영어 2018년 3차 시험 적중!</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</span></a><span class="date">2018-08-13</span></li>
                        <li><a href="#none"><span>[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</span></a><span class="date">2018-08-13</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>제주자치경찰 확대 시험운영 추진</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                        <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt50 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0330</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                    
                </dl>
            </div>            
        </div>
    </div>
    <!-- CS센터 //-->
</div>

<!-- End Container -->
<script src="/public/js/willbes/jquery.counterup.min.js"></script>
<script src="/public/js/willbes/waypoints.min.js"></script>
<script type="text/javascript">
    //캐스트
    $(function() {
        var slidesImg1 = $(".castslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 370,
            slideMargin:5,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft1").click(function (){
            slidesImg1.goToPrevSlide();
        });

        $("#imgBannerRight1").click(function (){
            slidesImg1.goToNextSlide();
        });
    }); 

    //자동검색어
    $(function(){
        var autocomplete_text = ["스파르타","신광은","모의고사","장정훈","최신판례","김원욱","하승민","형사소송법","네친구","해설","형법","최신","수사","실용글쓰기","최기판","오태진","승진","면접","리마인드","원유철","숫자","판례","해설강의","경찰학","김현정","기출","Flex","원기총","형소법","개정","실무종합","영어","문제풀이","마무리","오현웅","행정법","동형","2단계","2020","경찰학개론","송광호","학설","한국사","좋은데이","조문","심화","신광은 형사소송법","문제폭격","최신기출","1차","실용","추록","최신 판례","형사소송","신의한수","해양경찰","총평","숫자특강","심화이론","기지개","특강","형사법","구문독해","마무리특강","경찰승진","입문특강","해사법규","위원회","키워드","김준기","교재","형사소송법 심화","무료특강","2020년 1차","시험","승진기출","기본이론","헌법","실무","모의","글쓰기","해양경찰학","합격","공득인","김원욱 형법","체력","형법 심화","형법 최신","형법 심화이론","법학경채","아침","박우찬","기출해설","적중","형법 핵심이론 요약정리","조문특강","파이널","합기독","ox","개정법령","마무리 특강","5개년","형법 최신판례","패키지","최신기출판례","기본","독해","사료","요약","법학","20년 1차","범죄수사","기출문제","장정훈 경찰학개론","2차","문제","주관식","형사","찍기","심화기출","2차대비","해양경찰학개론","보강","1단계","문풀","죄수론","2020년 1차대비 신광은 형사소송법","법령","최신판례특강","죄수","전문법칙","역사","민법","일정","2020 1차","강의","하이힐","단계","박영식","판례특강","진도별","경찰실무","정태정","2019","경찰간부","19년 2차","해설특강","최기","2020년 2차","오태진 한국사","해양","간부","최신판","형법최신판례","제이슨","숫자 특강","무료","형사소송법 입문","해사영어","경찰","김원욱 형법 기본","300","신광은 형사법","실전","도사국사","경찰작용법","2018","2020년 1차대비 김원욱 형법 기본","찍기특강","선박","2020년 2차대비 신광은 형사소송법","형사소송법 최신판례","면접캠프","2018년 3차","기관술"," 마무리","베이직","형법 마무리","3개월","아침영어","신광은 형소법","이것만","인증","김원욱형법","이론","국어","경찰특공대","해수부","이기자","문제폭격 스파르타","신광은 경찰","신광은 형사소송법 기본이론 ","장정훈 행정법","풀이","1차대비","최신 기출","한국사 기본","1개년","심화이론특강","300제"];
        $("#unifiedSearch_text").autocomplete({
            source: autocomplete_text,
            select: function(event, ui) {
            },
            focus: function(event, ui) {
                return false;
            }
        })
    });

    //인기검색어
    $(document).ready(function() {
        var fieldExample = $('.unifiedSearch');
            fieldExample.focus(function() {
            var div = $('div.searchPop').show();
            $(document).bind('focusin.example click.example',function(e) {
                if ($(e.target).closest('.example, .unifiedSearch').length) return;
                $(document).unbind('.example');
                div.fadeOut('medium');
            });
        });
        $('div.searchPop').hide();
    });
</script>
@stop