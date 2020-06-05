@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    .bnSec01 {padding:20px 0 0} 
    .bnSec01 li {display:inline; float:left}
    .bnSec01:after {content:""; display:block; clear:both}

    .onProfBox {margin-right:-12px; margin-bottom: -12px;}
    .onProfBox li {
        position: relative;
        display: inline;
        float: left;
        width: 271px;
        height: 297px;
        margin-right:12px;
        margin-bottom: 12px;
        overflow: hidden;
        background: url("../../img/willbes/cop_acad/prof/prof_temp.jpg") no-repeat center center;
    }

    .onProfBox li img {
        position: absolute;
        left:50%;
        margin-left:-50%;
    }
    .onProfBox .onProfBtns {
        position: absolute;
        top:170px;
        left:35px;
        font-size: 14px;
    }
    .onProfBox .onProfBtns a {
        display: block;
        font-size: 16px;
        background: url("https://static.willbes.net/public/images/promotion/main/icon_arrow.png") no-repeat 95% 7px;
        padding:5px 30px 5px 5px;
        margin-left:-5px;
        margin-bottom: 5px
    }
    .onProfBox .onProfBtns span {
        display: block;
        font-size: 13px;
        color:#fd6f31;
        margin-top: 4px;
    }
    .onProfBox .onProfBtns a:hover {
        color:#fff !important;
        background: #0c5dc0 url("https://static.willbes.net/public/images/promotion/main/icon_arrow.png") no-repeat 95% 7px;
        border-radius: 0 5px 0 5px;
    }
    .onProfBox .onProfBtns a:hover span {
        color:#fff;
    }
    .onProfBox:after {
        content: '';
        display: block;
        clear: both;
    }

    .bnSec02 ul {margin-right:-20px; margin-bottom:-20px}
    .bnSec02 li {
        display: inline;
        float: left;
        margin-right:20px;
        margin-bottom:20px;
    }
    .bnSec02 li:last-child {
        margin: 0;
    }
    .bnSec02 li.nSlider {
        display: inline;
    }
    .sliderbnSec02 {
        width: 550px;
    }
    .bnSec02 ul:after {content:""; display:block; clear:both}
    
    .cop .preview .previewBox {position:relative; width:1120px; margin: 0 auto;}
    .cop .preview .pvslider {width:1120px; margin: 0 auto; height:225px; overflow: hidden;}
    .cop .preview .pvslider li {display: inline; float: left; width:33.33333%;}
    .cop .preview .pvslider li a {display:block; height:225px;} 
    .cop .preview .pvslider:after {content: ""; display: block; clear:both}
    .cop .preview .previewBox p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
    .cop .preview .previewBox p.leftBtn {left:-22px}
    .cop .preview .previewBox p.rightBtn {right:-22px}
</style>

<!-- Container -->
<div id="Container" class="Container cop NSK c_both">
    <div class="Section widthAuto">
        <div class="onSearch NGR">
            <input type="search" id="onsearch" name="" value="" placeholder="온라인강의 검색" title="온라인강의 검색" />
            <label for="onsearch"><button title="검색">검색</button></label>
        </div>
    </div>

    <div class="Menu widthAuto NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
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
                <li class="police">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>    

    <div class="Section">
        <div class="widthAuto">
            <ul class="bnSec01">
                <li><a href="#collaboslides"><img src="https://static.willbes.net/public/images/promotion/main/3001_315x120_01.jpg" alt="협력기관"></a></li>
                <li><a href="/"><img src="https://static.willbes.net/public/images/promotion/main/3001_logo.jpg"></a></li>
                <li><a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1393" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/main/3001_315x120_02.jpg" alt="만점자"></a></li>
            </ul>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_1120x100.jpg" alt="배너명"></a>
        </div>
    </div>

    <div class="Section mt20">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_1120x450.jpg" alt="배너명"></a>
        </div>
    </div>

    <div class="Section HotIssue mt20">
        <ul class="widthAuto">
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_370x210_01.jpg" alt="배너명"></a></li>
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_370x210_02.jpg" alt="배너명"></a></li>
            <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_370x210_03.jpg" alt="배너명"></a></li>
        </ul>
    </div>

    <div class="Section Section5 mt50">
        <div class="widthAuto">
            <div class="will-nTit bd-none">경찰합격 <span class="cop-color">전문교수진</span></div>
            <ul class="onProfBox">
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_01.jpg" usemap="#MapProp01" title="배너명" border="0">
                    <map name="MapProp01">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_02.jpg" usemap="#MapProp02" title="배너명" border="0">
                    <map name="MapProp02">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_03.jpg" usemap="#MapProp03" title="배너명" border="0">
                    <map name="MapProp03">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_04.jpg" usemap="#MapProp04" title="배너명" border="0">
                    <map name="MapProp04">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_05.jpg" usemap="#MapProp05" title="배너명" border="0">
                    <map name="MapProp05">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_06.jpg" usemap="#MapProp06" title="배너명" border="0">
                    <map name="MapProp06">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>                                       
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_07.jpg" usemap="#MapProp07" title="배너명" border="0">
                    <map name="MapProp07">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/main/2002_prof_08.jpg" usemap="#MapProp08" title="배너명" border="0">
                    <map name="MapProp08">
                        <area shape="rect" coords="30,171,135,196" href="#" alt="맛보기">
                        <area shape="rect" coords="30,203,136,229" href="#" alt="베스트강좌">
                    </map>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section bnSec02 mt50">
        <div class="widthAuto">
            <ul>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_01.jpg" title="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_02.jpg" title="배너명"></a></li>
                <li class="sliderbnSec02 nSlider pick">
                    <div class="sliderNum">
                        <div><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_03.jpg"></div>
                        <div><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_04.jpg"></div>
                    </div>
                </li>
                <li class="sliderbnSec02 nSlider pick">
                    <div class="sliderNum">
                        <div><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_04.jpg"></div>
                        <div><img src="https://static.willbes.net/public/images/promotion/main/3001_550x150_03.jpg"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="Section HotIssue mt80">
        <div class="widthAuto">  
            <div class="widthAuto smallTit">          
                <p><span>학원 최신 소식을 한 눈에! <strong>학원 Hot Issue</strong></span></p>            
            </div>
        </div>
        <ul class="widthAuto mt50">
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiA01.jpg') }}" title="배너명"></a></li>
            <li><a href="#none"><img src="{{ img_url('cop/banner/bnr_onHiB01.jpg') }}" title="배너명"></a></li>
            <li class="sliderHotIssue nSlider pick">
                <div class="sliderNum">
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
                    <div><img src="{{ img_url('cop/banner/bnr_onHiC01.jpg') }}"></div>
                </div>
            </li>
        </ul>
    </div>
    <!-- HotIssue //-->

    <div class="Section Section5 mt50">
        <div class="widthAuto">
            <div class="sliderPick nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
                <div class="pickBox pick1">
                    <a href="#none"><img src="{{ img_url('cop/event/evt_190101.jpg') }}"></a>
                </div>
                <div class="pickBox pick2">
                    <a href="#none"><img src="{{ img_url('cop/event/evt_190102.jpg') }}"></a>
                </div>
            </div>
            <div class="sliderEvt nSlider pick">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 무료특강</div>
                <ul>
                    <li><a href="#none" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_353x196.jpg"></a></li>
                    {{--
                    <li>
                        <div class="sliderNum">
                            <div><img src="{{ img_url('cop/event/evt_190104.jpg') }}"></div>
                            <div><img src="{{ img_url('cop/event/evt_190105.jpg') }}"></div>
                        </div>
                    </li>
                    --}}
                </ul>
            </div>
        </div>
    </div>

    <div class="Section Section5 mt50">
        <div class="widthAuto">
            <div class="will-nTit bd-none">윌비스 <span class="cop-color">경찰 캐스트</span></div>
            <div class="preview">
                <div class="previewBox">
                    <ul class="pvslider">
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main//3001_367x225.jpg">
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                
                </div>
            </div>

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

    <div class="Section Section7 mt50 mb50">
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
            <li>
                <div class="QuickDdayBox">
                    <div class="q_tit">3차 필기시험</div>
                    <div class="q_day">2018.12.12</div>
                    <div class="q_dday NSK-Blac">D-5</div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}" title="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" title="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" title="배너명"></a>
            </li>
        </ul>
    </div>        
</div>
<!-- End Container -->

<div class="mainBottomBn">
    <div>
        <a href="#none">
            <img src="https://static.willbes.net/public/images/promotion/2019/03/1009_mainBottom_bn.jpg" title="" class="mbBanner">
        </a>
        <span class="btmEvClose">닫기</span>
    </div>
</div>

<script type="text/javascript">  
        var tab1_url = "https://www.youtube.com/embed/re8w_IFAPS4?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/GlE9EGMDF98?rel=0&modestbranding=1&showinfo=0";        
        var tab3_url = "https://www.youtube.com/embed/VEmBnYu8tcc?rel=0&modestbranding=1&showinfo=0";
        var tab4_url = "https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0";

        $(function() {
        $(".youtubeBox").hide(); 
        $(".youtubeBox:first").show();
        $(".youtubetab li a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' frameborder='0' allowfullscreen></iframe>";                   
                }else if(activeTab == "#tab4"){
                    html_str = "<iframe src='"+tab4_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".youtubetab a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeBox").hide(); 
                $(".youtubeBox").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
                });
            });	


        //하단이벤트배너 닫기
        $(function(){        
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });
        });	 

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

        //경찰캐스트
        $(function() {
        var slidesImg1 = $(".pvslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 460,
            slideMargin:10,
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
</script>
@stop