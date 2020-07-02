@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="Container njob2 NGR c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')

    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">창업<span class="row-line">|</span></li>
                <li class="subTit">e커머스</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">민사법</li>
                            <li><a href="#none">형사법</a></li>
                            <li><a href="#none">공법(헌법)</a></li>
                            <li><a href="#none">공법(행정법)</li>
                            <li><a href="#none">국제거래법</a></li>
                            <li><a href="#none">경제법</a></li>
                            <li><a href="#none">환경법</a></li>
                            <li><a href="#none">노동법</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">수강신청</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Section Section0">
        <div class="widthAuto">
            <a href="https://www.youtube.com/watch?v=sBGMUCaAq6k&feature=youtu.be" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_fullx110.gif" alt="1억뷰 N잡"></a>
        </div>
    </div>
        
    <div class="Section1 p_re">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_2000x670_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_2000x670_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_2000x670_03.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_bn_2000x670_01.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--
    <div class="Section NSK mt70">
        <div class="widthAuto">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 인기강좌</div> 
            <ul class="bestLec">
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_01.png" alt="김정한 대표">                        
                        <ul>
                            <li><span class="tx-red">NEW</span> · 이커머스</li>
                            <li>가장 현실적인 월 100만원 만들기, <br>
                                지금 바로 시작하는 스마트스토어!</li>
                            <li>다마고치 김정환 대표<br>
                                <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                            <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank">신청하기</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_02.png" alt="김경은 대표">
                        <ul>
                            <li><span class="tx-red">NEW</span> · 이커머스</li>
                            <li>혼자서도 할 수 있는 <br>
                                1인 온라인 창업</li>
                            <li>단아쌤 김경은 대표<br>
                                <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                            <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank">신청하기</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_03.png" alt="황채영 대표">
                        <ul>
                            <li><span class="tx-red">NEW</span> · 이커머스</li>
                            <li>재고없이 오픈마켓으로<br>
                                월 1천만원 수익 만들기</li>
                            <li>황채영 대표<br>
                                <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                            <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank">신청하기</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_04.png" alt="정문진 대표">
                        <ul>
                            <li><span class="tx-red">NEW</span> · 이커머스</li>
                            <li>진짜 고수에게 배우는 스마트스토어로, <br>
                                제2의 월급통장 만들기!</li>
                            <li>정문진 대표<br>
                                <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                            <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank">신청하기</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    --}}

    <div class="Section NSK mt70">
        <div class="widthAuto">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 인기강좌</div> 
            <ul class="bestLec">
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_hot_272_01.gif" alt="김정한 대표">                        
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_hot_272_02.gif" alt="김경은 대표">
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_hot_272_03.gif" alt="황채영 대표">
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_hot_272_04.gif" alt="정문진 대표">
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section NSK mt70">
        <div class="widthAuto">
            <div class="will-listTi NSK-Black">
                <img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> 신규강좌 
                <span>사전 예약시 수강기간 1년 + 20% 할인권 증정</span>                    
            </div>
            <ul class="bestLec">
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1665" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_new_272_01.gif" alt="이시한">                        
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1666" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_new_272_02.gif" alt="이승기">
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1668" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_new_272_03.gif" alt="안혜빈">
                    </a>
                </li>
                <li>
                    <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1669" target="_blank">
                        <img src="https://static.willbes.net/public/images/promotion/main/3114_new_272_04.gif" alt="이기용">
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section2 mt70">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3114_fullx600.jpg" alt="전강좌 10% 할인">
        </div>
    </div>

    <div class="Section3 pb100">
        <div class="widthAuto">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 클립 영상</div> 
            <ul class="bestLec">
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_01.png" alt="김정한"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_02.png" alt="김경은"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_03.png" alt="황채영"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_04.png" alt="정문진"></a></li>
            </ul>
        </div>

        <div class="widthAuto mt70">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> PD 추천 꿀 Tip</div> 
            <ul class="tipLec NSK-Black">
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_01.png" alt="김정한"></a>[추천] 김정환 대표</li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_02.png" alt="김경은"></a>[추천] 김경은 대표</li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_03.png" alt="황채영"></a>[추천] 황채영 대표</li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_04.png" alt="정문진"></a>[추천] 정문진 대표</li>
            </ul>
        </div>
    </div>

    <div class="Section mt70 mb70 NSK">
        <div class="widthAuto">  
            <div class="willbesNews">
                <div class="will-listTit NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> 공지사항 <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></div>
                <ul class="List-Table">
                    <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                    <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                    <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                    <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                    <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                </ul>
            </div>
            <!--willbesNews //-->

            <div class="willbesCenter f_right">
                <h5 class="NSK-Black">서비스 <span class="tx-color">이용안내</span> <span class="tx13 NSK ml20 tx-black">궁금하신 사항에 대해 자세히 알려드립니다.</span></h5>
                <ul>
                    <li>
                        <a href="{{ front_url('/support/faq/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                            <div class="nTxt">자주하는 질문</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/mobile/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                            <div class="nTxt">모바일 서비스</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/qna/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                            <div class="nTxt">동영상 상담실</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/remote/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                            <div class="nTxt">1:1 고객지원</div>
                        </a>
                    </li>
                </ul>
                <div class="tel">
                    수강문의 전화 <span class="NSK-Black tx-color ml10">1544-5006</span><br>
                    운영시간 평일 <span class="NSK-Black tx-color ml10">09시~18시 (점심시간 12시~1시)  주말/공휴일 휴무</span>
                </div>
            </div>            
        </div>
    </div>
</div>
<!-- End Container -->

@stop