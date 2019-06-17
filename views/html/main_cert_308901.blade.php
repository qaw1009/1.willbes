@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->

<div id="Container" class="Container cert c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">공무원<span class="row-line">|</span></li>
                <li class="subTit">9급</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">PASS</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">PASS</li>
                            <li><a href="#none">0원 PASS</a></li>
                            <li><a href="#none">6개월 PASS</a></li>
                            <li><a href="#none">12개월 PASS</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="#none">추천 패키지</a></li>
                            <li><a href="#none">선택 패키지</a></li>
                            <li><a href="#none">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">공무원학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>   
        
    <div class="Section mt30">
        <div class="widthAuto bnrSec01 nSlider pick">   
            <ul>
                <li>                    
                    <div class="sliderNum">
                        <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1237" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x292_190514.jpg" alt="10일 완성 패키지"></a></div>
                        <div><a href="{{ site_url('/promotion/index/cate/3001/code/1035') }}"><img src="{{ img_url('cop_sea_special/banner/bnr_556_02.jpg') }}" title="KCG 핵심요약"></a></div>
                    </div>
                </li>
                <li>                    
                    <div class="sliderNum">
                        <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1237" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x292_190514.jpg" alt="10일 완성 패키지"></a></div>
                        <div><a href="{{ site_url('/promotion/index/cate/3001/code/1035') }}"><img src="{{ img_url('cop_sea_special/banner/bnr_556_02.jpg') }}" title="KCG 핵심요약"></a></div>
                    </div>
                </li>
            </ul>         
        </div>
    </div>

    <div class="Section Section2">
        <div class="widthAuto">
            <a href="#none"><img src="{{ img_url('gosi_law/visual/visual_top.jpg') }}" alt="최적의 합격솔루션 김동진 법원팀"></a>
        </div>
    </div>
    
    <div class="Section ProfBox">
        <div class="widthAuto">
            <ul class="PBtab NSK">
                <li><a href="#tab01">현재 준비중인 수험생이라면</a></li>
                <li><a href="#tab02">지금 시작하는 초시생이라면</a></li>
            </ul>  
            <div id="tab01">  
                <img src="{{ img_url('gosi_law/visual/visual_tit01_01.jpg') }}" alt="지금은 전범위 모의고사로 마무리 할 때!">            
                <ul class="PBcts">
                    <li>
                        <a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof01.jpg') }}" alt="배너명"></a>
                    </li>
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof02.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof03.jpg') }}" alt="배너명"></a></li>
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof04.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof04.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="tab02">  
                <img src="{{ img_url('gosi_law/visual/visual_tit01_02.jpg') }}" alt="빠르게 기본이론 강좌로 개념정립!">            
                <ul class="PBcts">
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosgosi_lawi_tech/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof01.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof06.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof07.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof08.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Section3 mt100">
        <div class="widthAuto p_re">
            <div><img src="{{ img_url('gosi_law/visual/visual_tip.jpg') }}" alt="김동진 법원팀의 학습 Tip"></div>
            <ul class="tipGo NSK">
                <li><a href="#none">강좌 바로가기</a></li>
                <li><a href="#none">강좌 바로가기</a></li>
                <li><a href="#none">강좌 바로가기</a></li>
                <li><a href="#none">강좌 바로가기</a></li>
                <li><a href="#none">강좌 바로가기</a></li>
                <li><a href="#none">강좌 바로가기</a></li>
            </ul>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto p_re">
            <img src="{{ img_url('gosi_law/visual/visual_tit02.jpg') }}" alt="오직 법원직을 위한 최강 라인업 윌비스 김동진 법원팀">
            <ul class="ProfBoxB">
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
                <li><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_prof_01.jpg') }}" alt="배너명"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section NSK mt90">
        <div class="widthAuto">  
            <div class="willbesNews">
                <div class="noticeTabs f_left">
                <div class="will-listTit">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="noticeTabs f_right">
                    <ul class="tabWrap noticeWrap three">
                        <li><a href="#notice1" class="on">시험공고</a></li>
                        <li><a href="#notice2" class="">수험뉴스</a></li>
                        <li><a href="#notice3" class="">합격수기</a></li>
                    </ul>
                    <div class="tabBox noticeBox">
                        <div id="notice1" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>국가직 | 2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>서울시 | 2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">제주도 | 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">광주광역시 | 2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">부산광역시 | 2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice2" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                        <div id="notice3" class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내333</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>


    <div class="Section NSK mt70 mb90">
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
                                <div class="nNumber tx-color">1544-0336</div>
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

<script type="text/javascript">    
    $(document).ready(function(){
        $('.PBtab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        );
</script>
@stop