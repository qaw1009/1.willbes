@extends('willbes.pc.layouts.master')

@section('content')

<link href="/public/css/willbes/style_2015.css?ver={{time()}}" rel="stylesheet">
<style type="text/css">
.bnArea01 {
    width: 100%;
    max-width: 2000px;
    margin-top:20px
}
.bnArea01 .gosi-bntop {position:relative; margin:0; height: 460px !important;}
.bnArea01 .gosi-bntop .GositabBox {
    position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 460px; 
    overflow: hidden;
}

.bnArea01 .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
.bnArea01 .gosi-bntop .GositabBox p a {display:none;}
.bnArea01 .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
.bnArea01 .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}	
.bnArea01 .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}

.bnArea01 .gosi-bntop .GositabList {
    position: absolute;
    top:404px;
    width:100%;
    z-index: 50;
    background-color: rgba(0,0,0,0.5);
    padding:10px 0;
}

.bnArea01 .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
.bnArea01 .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
.bnArea01 .gosi-bntop .Gositab li {display:inline-block;  width: calc(11.11111% - 2px);}   
.bnArea01 .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
.bnArea01 .gosi-bntop .Gositab li a:hover,
.bnArea01 .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

.bnArea02 {display:flex; justify-content: space-between;}
</style>

<!-- Container -->
<div id="Container" class="Container incheon job309007 NGR c_both">
    <div class="Menu widthAuto c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">자격증<span class="row-line">|</span></li>
                <li class="subTit">손해평가사</li>
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

    <div class="Section bnArea01 NSK">
        <div class="gosi-bntop">                        
            <div id="TechRollingSlider" class="GositabBox">
                <ul class="GositabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
            </div> 
            
            <div id="TechRollingDiv" class="GositabList">
                <div class="Gositab">
                    <li><a data-slide-index="0" href="javascript:void(0);" class="active">농업전공X영어<br>PACKAGE</a></li>
                    <li><a data-slide-index="1" href="javascript:void(0);">전기/통신 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="2" href="javascript:void(0);">농업직 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="3" href="javascript:void(0);">축산/기계/조경<br>NEW 라인업</a></li>
                    <li><a data-slide-index="4" href="javascript:void(0);">환경직<br>PACKAGE</a></li>
                    <li><a data-slide-index="5" href="javascript:void(0);">전산직<br>PACKAGE</a></li>
                    <li><a data-slide-index="6" href="javascript:void(0);">임업직<br>PACKAGE</a></li>
                    <li><a data-slide-index="7" href="javascript:void(0);">전기/통신<br>최우영</a></li>
                    <li><a data-slide-index="8" href="javascript:void(0);">농업직렬<br>장사원</a></li>
                </div>
            </div>           
        </div>        
    </div>

    <div class="Section">
        <div class="widthAuto bnArea02">
            <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
            <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
            <div><a href="#none"><img src="{{ img_url('gosi_acad/visual/visualsub_190130.jpg') }}" alt="배너명"></a></div>
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
            <div class="will-acadTit">인천 <span class="tx-color">고시학원</span></div>
            <div class="noticeTabs campus c_both">
                <div class="tabBox noticeBox_campus">
                    <div class="tabContent">
                        <div class="map_img">
                            <img src="{{ img_url('gosi_acad/map/mapIC.jpg') }}" alt="인천">
                            <span>인 천</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">인천</span> 캠퍼스 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                인천 부평구 경원대로 1395 부평일번가 11층<br> (부평역 13번 출구)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="#none">1:1 상담신청</a>
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
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 1</div>
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
                                <div class="nNumber tx-color">1544-1661</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 18시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">인천 고시학원 사이트에 물어보세요!</div>
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
    //상단 메인 배너
    $(function(){ 
        var slidesImg = $(".GositabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            sliderWidth:2000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#TechRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    }); 

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
</script>
@stop