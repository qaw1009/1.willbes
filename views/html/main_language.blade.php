@extends('willbes.pc.layouts.master')

@section('content')
<style>
    .lang .MainVisual {
    width: 100%;
    min-width: 1120px;
    max-width: 2000px;
    height: 409px;
    overflow: hidden;
    position: relative;
    margin-top:30px;
}

.lang .VisualsubBox {
    position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 409px;
}
.lang .VisualsubBox .bx-wrapper .bx-controls-auto {
    left:50%;
    bottom: 20px;
    margin-left:-540px;
    width: 50px;
    z-index: 90;
  }
.lang .VisualsubBox .bx-wrapper .bx-pager {
    float: right;
    width: auto;
    left:50%;
    margin-left:-500px;
    bottom: 20px;
    text-align: right;
    z-index: 100;
}
.lang .VisualsubBox .bx-wrapper .bx-pager.bx-default-pager a {
    background: #fff;
    width: 8px;
    height: 8px;
    margin: 0 2px;    
}

.lang .bx-wrapper .bx-pager.bx-default-pager a {
  background: #898989 !important;
}
.lang .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.lang .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.lang .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #db3e34 !important;
}
</style>
<!-- Container -->
<div id="Container" class="Container lang c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">어학<span class="row-line">|</span></li>
                <li class="subTit">G-TELP</li>
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
   
    <div class="Section MainVisual">        
        <div class="NSK mt30">
            <div class="VisualsubBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_01.jpg" alt="g-telp 서미진"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_02.jpg" alt="g-telp 서미진"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_03.jpg" alt="g-telp 서미진"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_04.jpg" alt="g-telp 서미진"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_05.jpg" alt="g-telp 서미진"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_06.jpg" alt="g-telp 서미진"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section1">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2007_1120x200.jpg" alt="g-telp 서미진"></a>
        </div>
    </div>

    <div class="Section Section2 NSK">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/2007_sec02.jpg" alt="g-telp를 선택해야하는 이유">
            <ul>
                <li><a href="https://www.g-telp.co.kr:335/receipt/schedule.asp" target="_blank">시험일정 확인하기</a></li>
                <li><a href="https://www.g-telp.co.kr:335" target="_blank">원서접수 바로가기</a></li>
            </ul>
        </div>
    </div>

    <div class="Section Section3">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/2007_sec03.jpg" alt="g-telp를 선택해야하는 이유">
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
                                    주말/공휴일 휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    주말/공휴일 휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-1881 <span>▶</span> 1</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말 09시~ 22시<br/>
                                </div>
                            </li>
                        </ul>
                    </dt>    
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 어학 사이트에 물어보세요!</div>
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