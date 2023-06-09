@extends('willbes.pc.layouts.master')
@section('content')
<link href="/public/css/willbes/style_lang.css??ver={{time()}}" rel="stylesheet">

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
        <div class="VisualsubBox">
            <div class="bSlider">
                <div class="sliderStopAutoPager">
                    <div><a href="#none"><img src="https://lang.dev.willbes.net/public/uploads/willbes/banner/2019/1127/banner_20191127164335.jpg" alt=""></a></div>    
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_01.jpg" alt=""></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_02.jpg" alt=""></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_03.jpg" alt=""></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_04.jpg" alt=""></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_05.jpg" alt=""></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3093_visualtop_06.jpg" alt=""></a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section1">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual01.jpg" alt="">
        </div>
    </div>

    <div class="Section Section2">
        <div class="widthAuto">
            <iframe src="https://www.youtube.com/embed/Oqc0yoIIIsw?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

    <div class="Section Section3">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual03.jpg" alt="">
        </div>
    </div>

    <div class="Section Section4 NGR">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual04.jpg" alt="시험 접수방법" usemap="#Map3093A" border="0">
            <map name="Map3093A" id="Map3093A">
                <area shape="rect" coords="837,299,1043,341" href="https://www.g-telp.co.kr:335/" target="_blank" alt="인터넷 접수 바로가기" />
            </map>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.018409696558!2d127.11567647087642!3d37.49509369349401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca58fab795a41%3A0x2fab085681355d29!2z7ISc7Jq47Yq567OE7IucIOyGoe2MjOq1rCDqsIDrnb3rj5kg7Iah7YyM64yA66GcMzLquLggNC03!5e0!3m2!1sko!2skr!4v1537275097078" frameborder="0" allowfullscreen=""></iframe>
            <p>문의 : (주)한국지텔프 1588-0589</p>
            <p class="mt40 tx-red tx14">* 고사장에서는 시험접수를 받지 않습니다.</p>
        </div>     
    </div>

    <div class="Section Section5">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual05.jpg" alt="" usemap="#Map3093B" border="0">
            <map name="Map3093B" id="Map3093B">
                <area shape="rect" coords="40,380,671,595" href="https://lang.willbes.net/book/index/cate/3093" target="_blank" alt="교재 자세히 보기" />
            </map>
        </div>
    </div>

    <div class="Section Section6">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual06.jpg" alt="" usemap="#Map3093C" border="0">
            <map name="Map3093C" id="Map3093C">
                <area shape="rect" coords="120,751,325,794" href="{{ front_url('/guide/show/cate/3093/pattern/gtelp') }}" target="_blank"/>
                <area shape="rect" coords="452,752,655,793" href="https://lang.willbes.net/support/examAnnouncement/show/cate/3093?board_idx=240562" target="_blank" />
                <area shape="rect" coords="785,750,979,796" href="https://www.g-telp.co.kr:335/" target="_blank"/>
            </map>
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