@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_cop.css??ver={{time()}}" rel="stylesheet">
<style type="text/css">
    .gosi-gate-secTop {position:relative; padding-top:56px;}
    .gosi-gate-secTop .gosi-gate-search {position:absolute; top:35px;}
    .onSearch {width:200px}
    .onSearch input[type="text"] {width:190px}

    .topMenu { position:relative; width:1120px; margin:0 auto;}
    .topMenu div {position:absolute; top:-30px; width:880px; display:flex; align-items: flex-end; font-size:19px; font-weight:bold; z-index: 100; vertical-align:bottom}
    .topMenu .copLogo {margin-right:30px}
    .topMenu div a {display:block; text-align:center; width:15%; padding-bottom:10px}
    .topMenu div a:last-child {text-align:right; width:25%; background: url(https://static.willbes.net/public/images/promotion/main/cop_gate/icon_cop01.png) no-repeat 50% 0; color:#0041b5}

    .cop-gate .Section01 {margin-top:50px; border-top:4px solid #ffc100; text-align:center; position:relative}
    .cop-gate .Section01 .Sec01_01 {background: url(https://static.willbes.net/public/images/promotion/main/cop_gate/sec01_bg_01.jpg) no-repeat left top; height:670px; padding-top:60px}
    .cop-gate .Section01 .bnBox {position:absolute; width:1030px; top:560px; left:50%; margin-left:-515px; display:flex; justify-content: space-between;}
    .cop-gate .Section01 .bnBox img {box-shadow:10px 10px 26px rgba(0,0,0,.2);}

    .cop-gate .Section01 .Sec01_02 {background: url(https://static.willbes.net/public/images/promotion/main/cop_gate/sec01_bg_02.jpg) no-repeat left top; height:748px; padding-top:60px}
    .cop-gate .Section01 .titleBox {color:#fff; margin-top:150px; line-height:1.2}
    .cop-gate .Section01 .title01 {font-size:26px; color:rgba(0,0,0,.8);}
    .cop-gate .Section01 .title02 {font-size:100px; margin-top:55px; color:#191919}
    .cop-gate .Section01 .title03 {font-size:128px; color:#191919}

    .cop-gate .Section02 {text-align:center; background:#525252; padding:150px 0; color:#fff; height: auto;}
    .cop-gate .Section02 .title01 {font-size:26px; margin-bottom:10px}
    .cop-gate .Section02 .title02 {font-size:82px; margin-bottom:90px;}
    .cop-gate .Section02 .bnBox {position:relative; width:986px; margin:0 auto}
    .cop-gate .Section02 .bnBox a {position: absolute; width: 13%; z-index: 2; background:#fff; color:#24262d; font-size:16px; font-weight:bold; font-size:16px; border-radius:10px; padding:10px 0}
    .cop-gate .Section02 .bnBox a:hover {background:#083381; color:#fff;}
</style>

<!-- Container -->

<div id="Container" class="Container cop cop-gate NSK c_both">

    <div class="widthAuto gosi-gate-secTop">
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
    

    <div class="topMenu">
        <div>
            <span class="copLogo">
                <img src="https://static.willbes.net/public/images/promotion/main/cop_gate/logo_cop.jpg" alt="윌비스경찰">
            </span>
            <a href="#none">일반.경찰</a>
            <a href="#none">경찰승진</a>
            <a href="#none">해양경찰</a>
            <a href="#none">해양경채</a>
            <a href="#none">경찰간부</a>
            <a href="#none">경찰학원</a>
        </div>
    </div>


    <div class="Section Section01">
        <div class="Sec01_01">
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/sec01_img.png" alt="컴팩트한 강의, 확실한 합격!"></div>
        </div>        
       
        <div class="bnBox" data-aos="fade-left">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2718"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_01.png" alt="경찰PASS"></a>
            <a href="https://police.willbes.net/promotion/index/cate/3006/code/2478"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_02.png" alt="승진PASS"></a>
            <a href="https://police.willbes.net/promotion/index/cate/3007/code/2414"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_03.png" alt="합격PASS"></a>
            <a href="https://police.willbes.net/promotion/index/cate/3007/code/2598"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_04.png" alt="해경간부리더"></a>
        </div>

        <div class="Sec01_02">
            <div class="titleBox NSK-Black" data-aos="fade-right">
                <div class="title01">
                    NEW 윌비스 경찰은<br>
                    여러분의 경찰 합격을 최상위 목표로 합니다.
                </div>
                <div class="title02">젊다, 간결하다.</div>
                <div class="title03">그렇지만 정확하다!</div>
            </div>
        </div>
    </div>

    <div class="Section Section02 NSK-Black">
        <div class="title01" data-aos="fade-down">
            형사법,경찰학,헌법과 검정제(G-TELP, 한능검)과목까지 책임지는
        </div>
        <div class="title02" data-aos="fade-down">
            윌비스 경찰 교수진
        </div>
        <div class="bnBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/main/cop_gate/sec02_img.png" alt="배너명">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" title="이국령" style="left: 51%; top: 41.49%;">확인하기 ></a>
            {{--
            <a href="#none" title="" style="left: 18%; top: 41.49%;">확인하기 ></a>            
            <a href="#none" title="" style="left:  84.5%; top: 41.49%;">확인하기 ></a>
            
            <a href="#none" title="" style="left: 12.3%; top: 84.57%;">확인하기 ></a>
            <a href="#none" title="" style="left: 35.8%; top: 84.57%;">확인하기 ></a>
            <a href="#none" title="" style="left: 60.5%; top: 84.57%;">확인하기 ></a>
            --}}
        </div>
    </div>

    <div class="Section Section6 mt80">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto350 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>[공지] 경찰3과 과목별 만점자를 소개합니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>하승민 영어 2018년 3차 시험 적중!</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</span></a><span class="date">2018-08-24</span></li>
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
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</span></a><span class="date">2018-09-01</span></li>
                        <li><a href="#none"><span>제주자치경찰 확대 시험운영 추진</span></a><span class="date">2018-08-24</span></li>
                        <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section Section7 mt30">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesCenter">
                        <div class="centerTit">신광은 경찰 사이트에 물어보세요!</div>
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
                        </ul>
                    </dt>
                </dl>
            </div>            
        </div>
    </div>

    <div class="Section mt50 mb50">
        <div class="widthAuto">
            <div class="collaborate">
                <div id="collaboslides">
                    <ul>
                        <li>
                            <a href="https://www.police.go.kr/main.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a>
                            <a href="http://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_02.jpg" alt="서울지방경찰청기동본부"></a>
                            <a href="http://www.gangdong.ac.kr/Home/Main.mbz" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_03.jpg" alt="강동대학교"></a>
                            <a href="http://kollabo.kiu.ac.kr/pages/index_mapsi.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_04.jpg" alt="경일대학교"></a>
                            <a href="http://cover.kimpo.ac.kr/intro/new/index.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_05.jpg" alt="김포대학교"></a>
                            <a href="http://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_06.jpg" alt="제주지방경찰청"></a>
                            <a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_07.jpg" alt="경찰대학"></a>
                            <a href="https://job.kyungnam.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_08.jpg" alt="경남대학교"></a>
                            <a href="http://ipsi.kmcu.ac.kr/admission/index.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_09.jpg" alt="계명문화대학교"></a>
                            <a href="http://www.dju.ac.kr/kor/html/main.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_10.jpg" alt="대전대학교"></a>
                        </li>
                        <li>
                            <a href="http://www.seowon.ac.kr/web/kor/home" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_11.jpg" alt="서원대학교"></a>
                            <a href="http://www.sehan.ac.kr/main/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_12.jpg" alt="세한대학교"></a>
                            <a href="http://www.jbnu.ac.kr/kor/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_13.jpg" alt="전북대학교"></a>
                            <a href="https://www3.chosun.ac.kr/chosun/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_14.jpg" alt="조선대학교"></a>
                            <a href="https://www.hyundai1990.ac.kr/index/main.asp?re=y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_15.jpg" alt="특성화학교"></a>
                            <a href="https://lily.sunmoon.ac.kr/MainDefault.aspx" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_16.jpg" alt="선문대학교"></a>
                            <a href="http://www.wku.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_17.jpg" alt="원광대학교"></a>
                            <a href="http://www.jj.ac.kr/jj/index.jsp" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_18.jpg" alt="전주대학교"></a>
                            <a href="http://www.joongbu.ac.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_19.jpg" alt="중부대학교"></a>
                            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_temp.jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="QuickMenu" class="MainQuickMenu">
        <ul>
            <li class="dday">
                <div class="QuickSlider">
                    <div class="sliderNum">
                        <div class="QuickDdayBox">
                            <div class="q_tit">3차 필기시험</div>
                            <div class="q_day">2018.12.12</div>
                            <div class="q_dday NSK-Blac">D-5</div>
                        </div>
                        <div class="QuickDdayBox">
                            <div class="q_tit">1차 공무원</div>
                            <div class="q_day">2019.04.05</div>
                            <div class="q_dday NSK-Blac">D-10</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/1112/banner_20210201181048.png" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0625/banner_20200625154631.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0224/banner_20200624133355.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });

    //협력기관
    $(document).ready(function() {
        var collaboslides = $("#collaboslides ul").bxSlider({
            mode:'fade', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:750,
            pause:3000,
            pager:false,
            controls:false,
            minSlides:1,
            maxSlides:1,
            moveSlides:1,
        });
    });
</script>


@stop