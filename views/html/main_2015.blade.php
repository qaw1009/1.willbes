@extends('willbes.pc.layouts.master')
@section('content')
<link href="/public/css/willbes/style_2015.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<div id="Container" class="Container incheon NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">소방<span class="row-line">|</span></li>
                <li class="subTit">노량진소방학원</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">단기합격관리반</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">특공반</a></li>
                            <li><a href="#none">강습반</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">수강신청</a>
                    <div class="drop-Box list-drop-Box list-drop-Box-ic">
                        <ul>
                            <li class="Tit">9급 공무원</li>
                            <li>
                                <span>종합반</span>
                                <a href="#none">특공반</a>
                                <a href="#none">ALL PASS</a>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                            <li>
                                <span>단과</span>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                            <li class="Tit">경찰 공무원</li>
                            <li>
                                <span>종합반</span>
                                <a href="#none">특공반</a>
                                <a href="#none">ALL PASS</a>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                            <li>
                                <span>단과</span>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                            <li class="Tit">소방 공무원</li>
                            <li>
                                <span>종합반</span>
                                <a href="#none">특공반</a>
                                <a href="#none">ALL PASS</a>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                            <li>
                                <span>단과</span>
                                <a href="#none">이론관정</a>
                                <a href="#none">문제풀이</a>
                                <a href="#none">특강</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">합격가이드</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">시험공고</a></li>
                            <li><a href="#none">수험뉴스</a></li>
                            <li><a href="#none">기출문제</a></li>
                            <li><a href="#none">학원모의고사</a></li>
                            <li><a href="#none">합격수기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">공지/이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">진행중인이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">상담실</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">질문/답변</a></li>
                            <li><a href="#none">방문상담예약</a></li>
                            <li><a href="#none">전화상담예약</a></li>
                            <li><a href="#none">자주하는질문</a></li>
                        </ul>
                    </div>
                </li>
                <li class="willbesedu">
                    <a href="#none" target="_self">
                    학원방문결제<span class="arrow-Btn">></span>
                    </a>
                 </li>
            </ul>
        </h3>
    </div>

    <div class="Section MainVisual mt20">
        <div class="widthAuto">
            <div class="VisualBox p_re">
                <div id="MainRollingDiv" class="MaintabList">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">7급공무원</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">9급공무원</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">소방직</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);" class="">군무원</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);" class="">기술직</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider01.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider02.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider03.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider04.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_acad/visual/MaintabSlider05.jpg') }}" alt="배너명"></a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="VisualsubBox mt40">
                <ul>
                    <li>
                        <div class="bSlider acad">
                            <div class="slider">
                                <div><a href="http://willbes.com"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                                <div>
                                    <img src="https://www.willbes.net/public/img/willbes/gosi_acad/visual/visualsub_190131.jpg" usemap="#Mapaaaaa" border="0" />
                                    <map name="Mapaaaaa" id="Mapaaaaa">
                                        <area shape="rect" coords="24,17,162,142" href="http://www.naver.com" />
                                        <area shape="rect" coords="172,21,360,144" href="http://www.daum.net" />
                                    </map>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190129.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190131.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="Section mt40">
        <div class="widthAuto c_both">
            <div class="f_left"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2015_bn_550x150_01.jpg" alt="배너명"></a></div>
            <div class="f_right"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2015_bn_550x150_02.jpg" alt="배너명"></a></div>
        </div>
    </div>

    <div class="Section gosi-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">합격을 책임질 <span>9급 대표 교수진</span></div>       
            <div class="gosi-tabs-contents-wrap">
                <div class="gosi-tabs-content">
                    <ul class="gosi-gate-prof">
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div> 

    <div class="Section mt20 c_both">
        <div class="widthAuto">
            <div class="will-acadTit">학원 <span class="tx-color">둘러보기</span></div>
            <div class="acadview">
                <ul class="avslider">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_01.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_02.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_03.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_04.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_05.jpg">
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_06.jpg">
                    </li>
                </ul>  
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>            
            </div>
        </div>
    </div> 

    <div class="Section mt40">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">공지사항</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs">
                <div class="will-listTit">시험공고</div>
                <div class="tabBox noticeBox">
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

            <div class="noticeTabs mr-zero">
                <div class="will-listTit">수험뉴스</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none">2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="Section Section4_ic mt40">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">소방학원</span></div>
            <div class="noticeTabs campus c_both">
                <div class="tabBox noticeBox_campus">
                    <div class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2015/map2015.jpg" alt="소방">
                            <span>윌비스 소방</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">윌비스</span> 소방학원</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                            서울시 동작구 만양로 105 한성빌딩 2층
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">문의</span>
                                            <span class="tx-color">1522-6112</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="traffic">
                        <p class="tx16"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map01.png"> 지하철을 이용할 경우</p>
                        <ul>
                            <li>
                                <div class="tx14">1.9호선 <span class="tx-color">노량진역 (1.2.3번 출구)</span></div>
                                도보 5분 (250m)
                            </li>
                        </ul>
                        <div class="line"></div>
                        <p class="tx16"><img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map02.png"> 버스를 이용할 경우</p>
                        <ul>
                            <li>
                                <div>ㆍ노량진역(노량진수산시장.CTS기독교TV 방면 / 노들역 방면)</div>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png">150, 360, 507, 605, 640 <br>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png">5531, 6211, 6411 <br>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map06.png">9408 <br>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map05.png">동작03, 동작08
                            </li>
                            <li>
                                <div>ㆍ노량진역 2번출구 (동작구청, 노량진초등학교앞 방면)</div>
                                <div>ㆍ노량진역 3번출구 (노들역 방면)</div>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map03.png">152, 500, 504, 654, 742 <br>
                                <img src="https://static.willbes.net/public/images/promotion/main/2018/icon_map04.png">5516, 5517, 5535, 5536
                            </li>                   
                        </ul>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section mt50 mb50 c_both">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">학원 수강문의</div>
                                <div class="nNumber tx-color">1522-6112</div>
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
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 소방학원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">학원<br/>상담실</div>
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


    <div id="QuickMenu" class="MainQuickMenu">
        <div class="mb5">
            <a href="https://police.willbes.net/pass/campus/show/code/605005" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/main/2015_sky01.jpg">
            </a>
        </div>
        <ul class="gobtn">
            <li><a href="#none">이달의 개강안내</a></li>
            <li><a href="#none">학원 갤러리</a></li>
            <li><a href="#none">강의 시간표</a></li>
            <li><a href="#none">모의고사</a></li>            
            <li><a href="#none">실시간 소통실</a></li>
        </ul>
        <ul>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2004//2004_sky01.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2004//2004_sky01.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2004//2004_sky01.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2004//2004_sky01.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->

<script type="text/javascript">
    $(function() {
        var slidesImg1 = $(".avslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:4,
            maxSlides:4,
            slideWidth: 280,
            slideMargin:12,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft1").click(function (){
            slidesImg1.goToNextSlide();
        });
        $("#imgBannerRight1").click(function (){
            slidesImg1.goToPrevSlide();
        });        
    });

    /*교수진*/
    $(function() {
        $('.sliderProf').bxSlider({        
            auto: true,
            controls: true,
            pause: 4000,
            pager: true,
            pagerType: 'short',
            slideWidth: 208,
            minSlides:1,
            maxSlides:1,
            moveSlides:1,
            adaptiveHeight: true,
            infiniteLoop: true,
            touchEnabled: false,
            autoHover: true,
            onSliderLoad: function(){
                $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1}); 
            }  
        });
    });
</script>
@stop