 
@extends('html.m.layouts.master')


@section('content')
<!-- Container -->
<style type="text/css">     
    .evtCtnsBox {width:100%; text-align:center; max-width:720px; margin:0 auto;}
    .evtCtnsBox img {max-width:100%}

    .skybanner {
        position:fixed;
        bottom:20px;
        right:10px;
        z-index:1;
    }

    .evtCtnsBox .will-listTi {font-size:20px; margin-bottom:20px; text-align:left}
    .evtCtnsBox .will-listTi > img {width:50px}
    .evt02 {padding:20px 30px;}  
    .evt02 .bestLec {width:100%; margin:0 auto}
    .evt02 .bestLec div {width:272px; margin:0 auto; text-align:left}
    .evt02 .bestLec li ul {padding:20px 10px; font-size:15px; line-height:1.5; }
    .evt02 .bestLec li ul li {margin-bottom:10px; }
    .evt02 .bestLec li ul li:first-child {font-size:14px}
    .evt02 .bestLec li ul li span {vertical-align: bottom;}
    .evt02 .bestLec li ul li:last-child a {display:inline-block; width:80px; text-align:center; color:#Fff; background:#3997f0; font-size:14px; height:24px; line-height:24px; border-radius:5px}
    

    .evt03 {padding:20px 30px 0 30px; text-align:left; background:#f7f7f7}
    .evt03 .hotLec {margin-left:-20px}
    .evt03 .hotLec li {
        display: inline;
        float: left;
        width:50%;        
        margin-bottom:20px;
    }   
    .evt03 .hotLec li a {display:block; margin-left:20px;}
    .evt03 .hotLec li img {width:100%; max-width:288px}
    .evt03 .hotLec:after {
        content:'';
        display: block;
        clear:both;
    }   

    .evt04 {margin:0 auto}

    .evt05 {padding:20px 30px 0 30px; text-align:left}
    .evt05 .tipLec {margin-left:-20px}
    .evt05 .tipLec li {
        display: inline;
        float: left;
        width:50%;        
        margin-bottom:20px;
    }    
    .evt05 .tipLec li a {display:block; margin-left:20px;}
    .evt05 .tipLec li img {width:100%; max-width:288px}
    .evt05 .tipLec:after {
        content:'';
        display: block;
        clear:both;
    }
    .evt06 {padding:20px 30px 0 30px; text-align:left}
    .evt06 .List-Table {
        width: 100%;
        border-top:1px solid #000;
        padding:0;
    }
    .evt06 .List-Table li {
        position: relative;
        font-size: 13px;
        color: #3a3a3a;
        height: 48px;
        line-height: 48px;
        border-bottom: 1px solid #e3e3e3;
    }
    .evt06 .List-Table li a {
        display: inline-block;
        width: 70%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        letter-spacing: 0;
    }
    .evt06 .List-Table li a span {
        background: #3997f0;
        color:#fff;
        padding: 3px 10px;
        border-radius: 10px;
        margin-right: 5px;
    }
    .evt06 .date {float:right}
    .evt06 .List-Table li:last-child {
        border-bottom: 1px solid #000;
    }

    .evt07 {padding:20px 30px 0 30px;}
    .evt07 ul {background:#f5f5f5}
    .evt07 li { display:inline; float:left; width:25%; padding:20px 0; line-height:1.5}
    .evt07 div {margin-top:5px}
    .evt07 ul:after {
        content:'';
        display: block;
        clear:both;
    }
    .evt08 {margin:20px auto 30px}
    .evt08 img {width:40px}
    .evt08 a {display: inline-block; margin:0 5px}

    .swiper-button-next,
    .swiper-button-prev {background-color:#fff !important; border-radius:30px; width:30px !important; height:30px !important; margin:0 10px; }

    .btnbuy {position:fixed; width:100%; bottom:0; left:0; border-top:1px solid #ccc; border-bottom:1px solid #ccc; background:#fff; z-index:100;}
    .btnbuy div {text-align:left; height:50px; line-height:50px; padding:0 10px; max-width:720px; margin:0 auto;
        background:url(https://static.willbes.net/public/images/promotion/m/icon_notice.png) no-repeat right center; background-size:30px;
        font-size:14px; }
    .btnbuy a {display:inline-block; margin:0 3px}
    .btnbuy span {color:#ccc; margin:0 3px}
    .btnbuy a:hover {background:#fff; color:#3a99f0;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {  
          
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) { 
        .evt02 {padding:40px 60px;} 
        .evt03,
        .evt05,
        .evt06,
        .evt07 {padding:40px 60px 0 40px;}
        .evt08 {margin:40px auto 60px}  
        .evtCtnsBox .will-listTi > img {width:64px}       
        .evtCtnsBox .will-listTi {font-size:24px; margin-bottom:30px;}
        .evt02 .bestLec > li {
        display: inline ; float:left; width:50% ; 
        }
        .evt02 .bestLec:after {content:""; display:block; clear:both}    
        .evt07 br {display:none}
        .evt08 img {width:78px} 
        .btnbuy div {height:60px; line-height:60px;}  
        .btnbuy a {margin:0 5px}
        .btnbuy span {margin:0 5px}      
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) { 


    } 
 </style>   

    <div id="Container" class="Container NGR c_both">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/m/3114_top.jpg" title="">
        </div>

        <div class="evtCtnsBox evt01">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3114_bn01.jpg" title=""></a>
        </div>

        <div class="evtCtnsBox evt01">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3114_bn02.jpg" title=""></a>
        </div>   

        <div class="evtCtnsBox evt04" id="evt04">
            <div class="MainBnrSlider swiper-container swiper-container-arrow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/3114_main_01.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/3114_main_02.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/3114_main_03.jpg" title=""></a></div>
                    <div class="swiper-slide"><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/3114_main_04.jpg" title=""></a></div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div> 

        <div class="evtCtnsBox evt02">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/3114_icon.png" alt="1억뷰 N잡"> HOT 인기 강좌</div>
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
                            <li><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" target="_blank">신청하기</a></li>
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
                            <li><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" target="_blank">신청하기</a></li>
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
                            <li><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" target="_blank">신청하기</a></li>
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
                            <li><a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" target="_blank">신청하기</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>    

        <div class="evtCtnsBox evt01">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/3114_bn03.jpg" title=""></a>
        </div>              

        <div class="evtCtnsBox evt03">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/3114_icon.png" alt="1억뷰 N잡"> HOT 클립 영상</div>
            <ul class="hotLec">
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_clip_01.png" alt="김정한"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_clip_02.png" alt="김경은"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_clip_03.png" alt="황채영"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_clip_04.png" alt="정문진"></a></li>
            </ul>
        </div>    

        <div class="evtCtnsBox evt05">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/3114_icon.png" alt="1억뷰 N잡"> PD 추천 꿀 Tip</div>
            <ul class="tipLec">
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_tip_01.png" alt="김정한"></a></li> 
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_tip_02.png" alt="김경은"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_tip_03.png" alt="황채영"></a></li>
                <li><a href="#nnoe"><img src="https://static.willbes.net/public/images/promotion/m/3114_tip_04.png" alt="정문진"></a></li>
            </ul>
        </div>

        <div class="evtCtnsBox evt06">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/3114_icon.png" alt="1억뷰 N잡"> 공지사항 <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></div>
            <ul class="List-Table">
                <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
            </ul>            
        </div>

        <div class="evtCtnsBox evt07">
            <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/3114_icon.png" alt="1억뷰 N잡"> 서비스 이용안내</div>
            <ul>
                <li>
                    <a href="{{ front_url('/support/faq/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                        <div class="nTxt">자주하는<br>질문</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/mobile/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                        <div class="nTxt">모바일<br>서비스</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/qna/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                        <div class="nTxt">동영상<br>상담실</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/remote/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                        <div class="nTxt">1:1<br>고객지원</div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox evt08">
            <a href="https://www.youtube.com/channel/UC2jUfowhznI9aNF7iA5vnIA" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_youtube.png" alt="유튜브"></a>
            <a href="https://www.instagram.com/willbesnjob/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_instar.png" alt="인스타그램"></a>
            <a href="https://www.facebook.com/willbesnjob" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_fb.png" alt="페이스북"></a>
            <a href="https://tv.naver.com/willbesnjob" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_tv.png" alt="네이버TV"></a>
            <a href="https://cafe.naver.com/willbes" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_cafe.png" alt="카페"></a>
        </div>
        
        <div class="btnbuy NSK">
            <div>
                [수강신청]
                <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1564" >김정환</a><span>|</span>
                <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1566" >김경은</a><span>|</span>
                <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1565" >황채영</a><span>|</span>
                <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1567" >정문진</a>
            </div>
        </div>
    </div>
<!-- End Container -->

@stop