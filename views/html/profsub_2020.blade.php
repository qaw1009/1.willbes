@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth">
            <span class="depth-Arrow">></span><strong>교수진소개</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>국어</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span><strong>정채영 교수님</strong>
        </span>
    </div>
    <div class="Lnb NG">
        <h2>교수진 소개</h2>
        <div class="lnb-List">
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">국어<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth">
                <dl>
                    <dt><a href="#none" class="active">정채영</a></dt>
                    <dt><a href="#none">기미진</a></dt>
                    <dt><a href="#none">김세령</a></dt>
                    <dt><a href="#none">오대혁</a></dt>
                </dl>
            </div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">영어<span class="arrow-Btn">></span></span></a> 
            </div>
            <div class="lnb-List-Depth">
                <dl>
                    <dt><a href="#none">한덕주</a></dt>
                    <dt><a href="#none">김신주</a></dt>
                    <dt><a href="#none">성기건</a></dt>
                    <dt><a href="#none">김영</a></dt>
                </dl>
            </div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">한국사<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">행정학<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">교정학<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">국제법<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">사회<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
            <div class="lnb-List-Tit">
                <a href="#none"><span class="Txt">사회복지학<span class="arrow-Btn">></span></span></a>
            </div>
            <div class="lnb-List-Depth"></div>
        </div>
    </div>
    <div class="Content p_re ml20 NG">
        <div class="willbes-Prof-Profile p_re mb40 NG tx-black">
            <div class="bSlider layerPopProf">
                <div class="slider">
                    <div><a href="#none"><img src="{{ img_url('prof/layerpopprof_01.jpg') }}" alt="배너명"></a></div>
                    <div><a href="#none"><img src="{{ img_url('prof/layerpopprof_02.jpg') }}" alt="배너명"></a></div>
                </div>
            </div>

            <div class="ProfImg p_re">
                <img src="{{ img_url('prof/viewSample01.png') }}" alt="교수명">
            </div>

            <div class="prof-profile p_re">
                <div class="Name"><span class="Sbj tx-blue">감정평가 및 보상법규</span><strong>정채영</strong><span class="NGR">교수</span></div>
                <ul class="prof-brief-btn">
                    <li>
                        <a href="#none" onclick="openWin('LayerProfile'),openWin('Profile')">
                            <div>프로필</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <div>맛보기</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'),openWin('Curriculum')">
                            <div>커리큘럼</div>
                        </a>
                    </li>
                    {{--카페 링크 있을 경우만 노출--}}
                    <li class="cafe">
                        <a href="#none" >
                            <div>교수카페</div>
                        </a>
                    </li>
                </ul>
                <div class="Obj NGR">
                    검증된 대한민국 국어 시험 전문가<br/>
                    출제자 시각의 분석, 수험생 시선까지 콕 집어내는 강의
                </div>

                <ul class="prof-banner01">
                    <li>
                        <iframe src="https://www.youtube.com/embed/sVr6LYsbzek?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                    </li>
                    <li class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="{{ img_url('prof/bnrA01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('prof/bnrA02.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </li>
                </ul>
                
                <div class="sliderBest cSliderH">
                    <div class="best-tit">이 시기 BEST 강좌</div>
                    <div class="sliderControlsHover">
                        <div class="lec-profile p_re">
                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강 [국가직] <img src="{{ img_url('prof/icon_ing.gif') }}"></div>
                            <dl class="w-info">
                                <dt><span class="tx-blue">30</span>일</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">48</span>강</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">100,000</span>원</dt>
                                <dt class="w-notice p_re">
                                    {{--
                                    <ul class="w-sp">
                                        <li><a href="#none" onclick="openWin('viewBox')">맛보기</a></li>
                                    </ul>
                                    <div id="viewBox" class="viewBox" style="top: 0; left: 63px;">
                                        <a class="closeBtn" href="#none" onclick="closeWin('viewBox')"><img src="{{ img_url('cart/close.png') }}"></a>
                                        <dl class="NSK">
                                            <dt class="Tit NG">맛보기1</dt>
                                            <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                            <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                        </dl>
                                    </div>
                                    --}}
                                    <dl class="NSK">
                                        <dt class="Tit NG mr5">맛보기1</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                        <dt class="Tit NG ml10 mr5">맛보기2</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                    </dl>
                                </dt>
                            </dl>
                        </div>
                        <div class="lec-profile p_re">
                            <div class="w-tit">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</div>
                            <dl class="w-info">
                                <dt><span class="tx-blue">20</span>일</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">72</span>강</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">180,000</span>원</dt>
                                <dt class="w-notice p_re">
                                    {{--
                                    <ul class="w-sp">
                                        <li><a href="#none" onclick="openWin('viewBox2')">맛보기</a></li>
                                    </ul>
                                    <div id="viewBox2" class="viewBox" style="top: 0; left: 63px;">
                                        <a class="closeBtn" href="#none" onclick="closeWin('viewBox2')"><img src="{{ img_url('cart/close.png') }}"></a>
                                        <dl class="NSK">
                                            <dt class="Tit NG">맛보기1</dt>
                                            <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                            <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                        </dl>
                                    </div>
                                    --}}
                                    <dl class="NSK">
                                        <dt class="Tit NG mr5">맛보기1</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                        <dt class="Tit NG ml10 mr5">맛보기2</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                    </dl>
                                </dt>
                            </dl>
                        </div>
                    </div>
                </div>               
            </div>

            <!-- willbes-Layer-ProfileBox -->
            <div id="Profile" class="willbes-Layer-ProfileBox">
                <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile'),closeWin('Profile')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">정채영</span> 교수님 프로필</div>
                <div class="Layer-Cont">
                    <div class="Layer-SubTit NG">· 약력</div>
                    <div class="Layer-Txt tx-gray">
                        · 現) 윌비스공무원국어전임<br/>
                        · 2008~2015 8년연속EBS 9,7급공무원국어전임<br/>
                        · 前)2005~2006 방송대학TV 공무원교수전임<br/>
                        · 前)박문각남부고시학원국어대표<br/>
                        · 2015 국가직지방직문제풀이강의마감<br/>
                        · 2015 국가직지방직심화이론강의마감
                    </div>
                    <div class="Layer-SubTit NG">· 저서</div>
                    <div class="Layer-Txt tx-gray">
                        · 2018 정채 영국어 마무리 시리즈[문학편]_137작품을 알려주마 (제2판)<br/> 
                        (윌비스)<br/>
                        · 2018 정채 영국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!<br/> 
                        (전정2판) (윌비스)<br/>
                        · 정채 영국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마! (제2판)<br/> 
                        (윌비스)<br/>
                        · 2018 정채 영국어 문제 종결자 (더나은)
                    </div>
                </div>
            </div>
            <div id="LayerProfile" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-ProfileBox -->

            <!-- willbes-Layer-CurriBox -->
            <div id="Curriculum" class="willbes-Layer-CurriBox">
                <a class="closeBtn" href="#none" onclick="closeWin('LayerCurriculum'),closeWin('Curriculum')">
                    <img src="{{ img_url('prof/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">정채영</span> 교수님 커리큘럼</div>
                <div class="Layer-Cont">
                    <img src="http://file1.willbes.net//data/upload/popup/hanlim/POPUPVALUE3510.JPG"/>
                    <ul>
                        <li><a href="#none">2022학년도 커리큘럼.jpg</a></li>
                        <li><a href="#none">2022학년도_교육학_커리큘럼_상세.hwp</a></li>
                    </ul>
                </div>
            </div>
            <div id="LayerCurriculum" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-CurriBox -->
        </div>
        <!-- willbes-Prof-Profile -->

        
        <div class="willbes-Prof-Tabs">
            <div class="ProfDetailWrap">
                <ul class="tabWrap tabDepthProf tabDepthProf_6">
                    <li><a href="#Proftab1" class="on">교수님 홈</a></li>
                    <li><a href="#Proftab2">개설강좌</a></li>
                    <li><a href="#Proftab3">무료강좌</a></li>
                    <li><a href="#Proftab4">공지사항</a></li>
                    <!--li><a href="#Proftab5">학습Q&amp;A</a></li-->
                    <li><a href="#Proftab6">학습자료실</a></li>
                    <!--li><a href="#Proftab6">T-pass자료실 </a></li-->
                    <li><a href="#Proftab8">교수님 TCC</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Proftab1" class="tabLink">
                        <div class="willbes-NoticeWrap p_re mb15 c_both">
                            <div class="willbes-listTable widthAuto940 mt30">
                                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                                <ul class="List-Table w50 tx-gray">
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>                                    
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                </ul>
                            </div>

                            <div class="willbes-listTable mt30">
                                <div class="will-Tit NG">교재구매 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                                <div class="willbes-Lec-Table bdb-none">        
                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                        <colgroup>
                                            <col style="width:150px;">
                                            <col style="width:320px;">
                                            <col style="width:150px;">
                                            <col style="width:320px;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a onclick="openWin('pocketBox')">장바구니</a> 
                                                        <div id="pocketBox" class="pocketBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                <img src="{{ img_url('cart/close.png') }}">
                                                            </a>
                                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                                            장바구니로 이동하시겠습니까?
                                                            <ul class="NSK mt20">
                                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                            </ul>
                                                        </div>                                 
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none" onclick="openWin('bookLec')">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a> 
                                                        {{--강의정보--}}
                                                        <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                                                <img src="{{ img_url('prof/close.png') }}">
                                                            </a>
                                                            <div class="Layer-Cont">
                                                                <div class="LeclistTable">
                                                                    <ul>
                                                                        <li>강의명 1</li>
                                                                        <li>강의명 2</li>
                                                                        <li>강의명 3</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>                                  
                                                    </div>                                
                                                </td>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#none"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a href="#none">장바구니</a>                                  
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a>                                
                                                    </div>                                
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a onclick="openWin('pocketBox')">장바구니</a> 
                                                        <div id="pocketBox" class="pocketBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('pocketBox')">
                                                                <img src="{{ img_url('cart/close.png') }}">
                                                            </a>
                                                            해당 상품이 장바구니에 담겼습니다.<br/>
                                                            장바구니로 이동하시겠습니까?
                                                            <ul class="NSK mt20">
                                                                <li class="aBox answerBox_block"><a href="#none">예</a></li>
                                                                <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
                                                                <li class="aBox closeBox_block"><a href="#none" onclick="closeWin('pocketBox')">닫기</a></li>
                                                            </ul>
                                                        </div>                                 
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none" onclick="openWin('bookLec')">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a> 
                                                        {{--강의정보--}}
                                                        <div id="bookLec" class="willbes-Layer-CScenterBox willbes-Layer-bookLecBox">
                                                            <a class="closeBtn" href="#none" onclick="closeWin('bookLec')">
                                                                <img src="{{ img_url('prof/close.png') }}">
                                                            </a>
                                                            <div class="Layer-Cont">
                                                                <div class="LeclistTable">
                                                                    <ul>
                                                                        <li>강의명 1</li>
                                                                        <li>강의명 2</li>
                                                                        <li>강의명 3</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>                                  
                                                    </div>                                
                                                </td>
                                                <td class="w-list">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                </td>
                                                <td class="w-data tx-left pr10">
                                                    <div class="w-tit">
                                                        2019년 1차대비 신광은 형사소송법 적중예상 문제풀이
                                                    </div>

                                                    <div class="w-info">
                                                        신광은 저 <span class="row-line">|</span> 2019-03-08<span class="row-line">|</span> 
                                                        <a href="#none"><strong class="detail">교재상세정보</strong></a>
                                                    </div>

                                                    <div class="priceWrap priceWrap2 mb10">
                                                        <span>[판매중]</span>
                                                        <span class="price">40,000원</span>
                                                        <span class="discount">(10%↓)</span>  ▶
                                                        <span class="dcprice">36,000원</span>
                                                    </div>

                                                    <ul class="lecBuyBtns lecBuyBtns2">
                                                        <li class="btnCart"><a href="#none">장바구니</a>                                  
                                                        <li class="btnBuy"><a href="#none">바로결제</a></li>
                                                    </ul>

                                                    <div class="bookLecBtn">
                                                        <a href="#none">
                                                            <strong>교재로 진행중인 강의 ▼</strong>
                                                        </a>                                
                                                    </div>                                
                                                </td>
                                            </tr>
                                            <tr>
                                              <td colspan="4" class="w-list">등록된 교재정보가 없습니다.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                            </div>

                            <div class="willbes-listTable widthAuto940 mt30">
                                <div class="will-Tit NG">무료강좌</div>
                                <ul class="List-Table w50 tx-gray">
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>                                    
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>                                    
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                    <li class="tx-center widthAutoFull">무료강좌가 업습니다.</li>
                                </ul>
                            </div>

                            <div class="willbes-listTable willbes-reply2 widthAuto940 mt30">
                                <div class="will-Tit NG">수강후기 <a class="f_right" href="#none" onclick="openWin('LayerReply'),openWin('Reply')"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                                
                                <ul class="List-Table w50 tx-gray">                                                                   
                                    <li><a href="#none"><img src="{{ img_url('sub/star4.gif') }}" alt="별점">설명도 잘 해주시고 좋은 강의에요</a></li>
                                    <li><a href="#none"><img src="{{ img_url('sub/star5.gif') }}" alt="별점">짱 좋아요!</a></li>
                                    <li><a href="#none"><img src="{{ img_url('sub/star2.gif') }}" alt="별점">설명도 잘 해주시고 좋은 강의에요</a></li>                                    
                                    <li><a href="#none"><img src="{{ img_url('sub/star3.gif') }}" alt="별점">짱 좋아요!</a></li>
                                    <li class="tx-center widthAutoFull">수강 후기가 업습니다.</li>
                                </ul>
                                
                            </div>

                            <!-- willbes-Layer-ReplyBox -->
                            <div id="Reply" class="willbes-Layer-ReplyBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('LayerReply'),closeWin('Reply'),closeWin('replyWrite'),openWin('replyListLayer')"><img src="{{ img_url('prof/close.png') }}"></a>
                                <div class="Layer-Tit NG tx-dark-black">수강후기</div>

                                <!-- List -->
                                <div id="replyListLayer" class="Layer-Cont">
                                    <div class="curriWrap c_both">
                                        <div class="CurriBox">
                                            <table cellspacing="0" cellpadding="0" class="curriTable curriTableLayer">
                                                <colgroup>
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                    <col width="*">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <th class="tx-gray">과목선택</th>
                                                        <td colspan="8">
                                                            <ul class="curriSelect">
                                                                <li><a href="#none">사회복지학</a></li>
                                                                <li><a href="#none">국어</a></li>
                                                                <li><a href="#none">영어</a></li>
                                                                <li><a href="#none">한국사</a></li>
                                                                <li><a href="#none">행정법</a></li>
                                                                <li><a href="#none">행정학</a></li>
                                                                <li><a href="#none">교육학</a></li>
                                                                <li><a href="#none">수학</a></li>
                                                                <li><a href="#none">독일어</a></li>
                                                                <li><a href="#none">경영학</a></li>
                                                                <li><a href="#none">일본어</a></li>
                                                                <li><a href="#none">관세법</a></li>
                                                                <li><a href="#none">공직선거법</a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="tx-gray">교수선택</th>
                                                        <td colspan="8" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                                                        <!-- 과목선택 시 해당 과목 교수 출력
                                                        <td>
                                                            <a href="#none">정채영</a>
                                                        </td>
                                                        <td>
                                                            <a href="#none">기미진</a>
                                                        </td>
                                                        <td>
                                                            <a href="#none">김세령</a>
                                                        </td>
                                                        <td>
                                                            <a href="#none">오대혁</a>
                                                        </td>
                                                        <td>
                                                            <a href="#none">이현나</a>
                                                        </td>
                                                        -->
                                                    </tr>
                                                    <tr>
                                                        <th class="tx-gray">강좌선택</th>
                                                        <td colspan="8" class="tx-left">
                                                            <select id="email" name="email" title="강좌를 선택해 주세요." class="seleEmail">
                                                                <option selected="selected">강좌를 선택해 주세요.</option>
                                                                <option value="강좌1">강좌1</option>
                                                                <option value="강좌2">강좌2</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- curriWrap -->
                                    <div class="willbes-Leclist c_both">
                                        <div class="willbes-LecreplyList tx-gray">
                                            <dl class="Select-Btn NG">
                                                <dt><a class="on" href="#none">BEST순</a></dt>
                                                <dt><a href="#none">최신순</a></dt>
                                                <dt><a href="#none">평점순</a></dt>
                                            </dl>
                                            <div class="search-Btn btnAuto120 h27 f_right">
                                                <button type="submit" onclick="closeWin('replyListLayer'),openWin('replyWrite')" class="mem-Btn bg-blue bd-dark-blue">
                                                    <span>수강후기 작성</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="LeclistTable">
                                            <table cellspacing="0" cellpadding="0" class="listTable replyTable upper-black upper-gray bdb-gray tx-gray">
                                                <colgroup>
                                                    <col style="width: 75px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 100px;">
                                                    <col style="width: 120px;">
                                                    <col style="width: 260px;">
                                                    <col style="width: 90px;">
                                                    <col style="width: 100px;">
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>No<span class="row-line">|</span></li></th>
                                                        <th>과목<span class="row-line">|</span></li></th>
                                                        <th>교수명<span class="row-line">|</span></li></th>
                                                        <th>평점<span class="row-line">|</span></li></th>
                                                        <th>제목<span class="row-line">|</span></li></th>
                                                        <th>작성자<span class="row-line">|</span></li></th>
                                                        <th>등록일</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                        <td class="w-lec">헌법</td>
                                                        <td class="w-name">정채영</td>
                                                        <td class="w-star star1"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋은강의입니다.
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">장동*</td>
                                                        <td class="w-date">2018-00-00</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            Woo ah(우와) Dae Bark(박) 입니다!!! 정채영 교수님 수업을 온/오프라인으로 몇번 들었던 장수생입니다.
                                                            계속해서 무료 강좌 시리즈를 개설해 주셔서 감사합니다! 강의의 질이나 수준도 결코 유료특강에 떨어지지 않는 수준입니다.
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                        <td class="w-lec">공직선거법</td>
                                                        <td class="w-name">한덕현</td>
                                                        <td class="w-star star5"></td>
                                                        <td class="w-list tx-left pl20">
                                                            쉽게 설명해주시네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">박형*</td>
                                                        <td class="w-date">2018-00-00</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            베스트 댓글2
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">8</td>
                                                        <td class="w-lec">스파르타반</td>
                                                        <td class="w-name">김쌤</td>
                                                        <td class="w-star star4"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">7</td>
                                                        <td class="w-lec">행정법</td>
                                                        <td class="w-name">최진우</td>
                                                        <td class="w-star star2"></td>
                                                        <td class="w-list tx-left pl20">
                                                            저랑 잘 맞는 강의입니다.
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">박형*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다. 저랑 잘 맞는 강의입니다.
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">6</td>
                                                        <td class="w-lec">공통</td>
                                                        <td class="w-name">윤세훈</td>
                                                        <td class="w-star star2"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">장동*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div> 
                                                            좋네요 좋네요 좋네요
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">5</td>
                                                        <td class="w-lec">헌법</td>
                                                        <td class="w-name">정채영</td>
                                                        <td class="w-star star2"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋은강의입니다.
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다. 좋은강의입니다.
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">4</td>
                                                        <td class="w-lec">공직선거법</td>
                                                        <td class="w-name">한덕현</td>
                                                        <td class="w-star star3"></td>
                                                        <td class="w-list tx-left pl20">
                                                            쉽게 설명해주시네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            쉽게 설명해주시네요. 쉽게 설명해주시네요. 쉽게 설명해주시네요.
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">3</td>
                                                        <td class="w-lec">스파르타반</td>
                                                        <td class="w-name">김쌤</td>
                                                        <td class="w-star star4"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">2</td>
                                                        <td class="w-lec">행정법</td>
                                                        <td class="w-name">최진우</td>
                                                        <td class="w-star star3"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            좋네요 좋네요
                                                        </td>
                                                    </tr>

                                                    <tr class="replyList w-replyList">
                                                        <td class="w-no">1</td>
                                                        <td class="w-lec">공통</td>
                                                        <td class="w-name">윤세훈</td>
                                                        <td class="w-star star1"></td>
                                                        <td class="w-list tx-left pl20">
                                                            좋네요
                                                            <div class="subTit">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</div>
                                                        </td>
                                                        <td class="w-write">최귀*</td>
                                                        <td class="w-date">2018-04-22</td>
                                                    </tr>
                                                    <tr class="replyTxt w-replyTxt tx-gray">
                                                        <td colspan="7">
                                                            <div class="tx-blue"><a href="#none">2018 정채영 국어 필살기 모의고사Ⅱ (3월)</a></div>
                                                            좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요 좋네요
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="willbes-Lec-Search GM p_re mt30">
                                            <div class="inputBox">
                                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                                <button type="submit" onclick="" class="search-Btn">
                                                    <span>검색</span>
                                                </button>
                                            </div>
                                        </div> 
                                    </div>
                                    <!-- willbes-Leclist -->
                                </div>

                                <!-- Write -->
                                <div id="replyWrite" class="Layer-Cont" style="display: none">
                                    <ul class="replyInfo tx-gray NG">
                                        <li>· 수강생에 한해 강좌당 1회 작성이 가능합니다.</li>
                                        <li>· 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.</li>
                                        <li>· 수강후기 작성 시 포인트 500P가 지급됩니다. (월 최대 2,000p 지급가능)</li>
                                        <li>· 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다.</li>
                                    </ul>

                                    <div class="willbes-Leclist c_both">
                                        <div class="LecWriteTable">
                                            <table cellspacing="0" cellpadding="0" class="listTable writeTable upper-gray upper-black bdt-gray bdb-gray fc-bd-none tx-gray">
                                                <colgroup>
                                                    <col style="width: 120px;">
                                                    <col style="width: 720px;">
                                                </colgroup>
                                                <tbody>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">수강정보<span class="tx-light-blue">(*)</span></td>
                                                        <td class="w-selected tx-left pl30">
                                                            <select id="Sbj" name="Sbj" title="Sbj" class="seleSbj" style="width: 150px;">
                                                                <option selected="selected">과목선택</option>
                                                                <option value="헌법">헌법</option>
                                                                <option value="스파르타반">스파르타반</option>
                                                                <option value="공직선거법">공직선거법</option>
                                                            </select>
                                                            <select id="Prof" name="Prof" title="Prof" class="seleProf" style="width: 150px;">
                                                                <option selected="selected">교수선택</option>
                                                                <option value="정채영">정채영</option>
                                                                <option value="한덕현">한덕현</option>
                                                                <option value="김쌤">김쌤</option>
                                                            </select>
                                                            <select id="Lec" name="Lec" title="Lec" class="seleLec" style="width: 360px;">
                                                                <option selected="selected">강좌선택</option>
                                                                <option value="기타">기타</option>
                                                                <option value="강좌내용">강좌내용</option>
                                                                <option value="학습상담">학습상담</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">평점<span class="tx-light-blue">(*)</span></td>
                                                        <td class="w-selected tx-left pl30">
                                                            <!-- Rating Stars Box -->
                                                            <div class="rating-stars text-center GM">
                                                                <ul id="stars">
                                                                    <li class="star" title="" data-value='1'>
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
                                                                    <li class="star" title="" data-value='2'>
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
                                                                    <li class="star" title="" data-value='3'>
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
                                                                    <li class="star" title="" data-value='4'>
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
                                                                    <li class="star" title="" data-value='5'>
                                                                        <i class="fa fa-star fa-fw"></i>
                                                                    </li>
                                                                </ul>
                                                                <div class="success-box">
                                                                    <div class="text-message">0</div>/ 5
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                                        <td class="w-text tx-left pl30">
                                                            <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                                        <td class="w-textarea write tx-left pl30">
                                                            <textarea></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="search-Btn mt20 h36 p_re">
                                                <button type="submit" onclick="closeWin('replyWrite'),openWin('replyListLayer')" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                                    <span class="tx-purple-gray">취소</span>
                                                </button>
                                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                                    <span>저장</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- willbes-Leclist -->
                                </div>

                            </div>

                            <div class="willbes-listTable widthAuto460 mr20 mt30">
                                <div class="will-Tit NG">공지사항 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                                <ul class="List-Table tx-gray">
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                </ul>
                            </div>
                            <div class="willbes-listTable widthAuto460 mt30">
                                <div class="will-Tit NG">학습자료실 <a class="f_right" href="#none"><img src="{{ img_url('prof/icon_add.png') }}" alt="더보기"></a></div>
                                <ul class="List-Table tx-gray">
                                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                                </ul>
                            </div>                            

                            <div id="LayerReply" class="willbes-Layer-Black"></div>
                            <!-- // willbes-Layer-ReplyBox -->

                            <div id="InfoForm" class="willbes-Layer-Box">
                                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                                    <img src="{{ img_url('sub/close.png') }}">
                                </a>
                                <div class="Layer-Tit tx-dark-black NG">
                                    교재상세정보
                                </div>
                                <div class="lecDetailWrap">
                                    <div class="tabBox">
                                        <div class="tabLink book2">
                                            <div class="bookWrap">
                                                <div class="bookInfo">
                                                    <div class="bookImg">
                                                        <img src="{{ img_url('sample/book.jpg') }}">
                                                    </div>
                                                    <div class="bookDetail">
                                                        <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                                        <div class="book-Author tx-gray">
                                                            <ul>
                                                                <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                                                <li>저자 : 저자명 <span class="row-line">|</span></li>
                                                                <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                                                <li>판형/쪽수 : 190*260 / 769</li>
                                                            </ul>
                                                            <ul>
                                                                <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                                                <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong> <strong class="tx-light-blue">[판매중]</strong></li>
                                                            </ul>
                                                        </div>
                                                        <div class="bookBoxWrap">
                                                            <ul class="tabWrap tabDepth2">
                                                                <li><a href="#info1" class="on">교재소개</a></li>
                                                                <li><a href="#info2">교재목차</a></li>
                                                            </ul>
                                                            <div class="tabBox">
                                                                <div id="info1" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        2018년재신정판을내면서..<br/>
                                                                        첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                                        둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                                        셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                                        기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                                    </div>
                                                                    <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                                                </div>
                                                                <div id="info2" class="tabContent">
                                                                    <div class="book-TxtBox tx-gray">
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학<br/>
                                                                        제1편 현대 문법<br/>
                                                                        제2편 고전 문법<br/>
                                                                        제3편 국어 생활<br/>
                                                                        제4편 현대 문학<br/>
                                                                        제5편 고전 문학
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- willbes-Layer-Box -->
                        </div>
                        <!-- willbes-NoticeWrap -->

                        <div class="profEditer mt30 c_both">
                            <div class="profEd-Tit NG"><a href="#none">닫기 ▼</a></div>
                            <div class="profEd-cts">
                                안녕하세요, 윌비스신광은경찰입니다.  <Br> 
                                <Br>
                                온라인 강의 자료 출력 제한 콘텐츠 운영 안내 드립니다.<Br>
                                <Br>
                                최근 온라인강의에 포함 되어 있는 학습파일자료에 대한<Br>
                                공유, 복제, 배포 등 무분별하게 남용이 되고 있습니다.    <Br>                        
                                <Br>
                                이에 자료에 대한 저작권피해를 예방하기 위하여<Br>
                                동영상 강좌 ‘강의자료 3회출력 제한’을 적용합니다.<Br>                            
                                <Br>
                                강의 자료 출력 제한은<Br>
                                2020년 1차 대비 신규로 진행 하는 2단계 동형모의고사 ,3단계 파이널 모의고사 강좌에만 적용됩니다.<Br>
                                <div><img src="{{ img_url('prof/prof_sample.jpg') }}" alt=""></div>
                            </div>
                        </div>

                        <div class="prof-banner02 bSlider mt40 c_both">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('prof/bnrB01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('prof/bnrB02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                        <!-- willbes-Bnr -->

                        <div class="sliderWillbesBnr cSliderTM mt40">
                            <div class="sliderControlsTM">
                                <div><img src="{{ img_url('prof/bnrC01.jpg') }}" alt="이미지명"></div>
                                <div><img src="{{ img_url('prof/bnrC02.jpg') }}" alt="이미지명"></div>
                                <div><img src="{{ img_url('prof/bnrC03.jpg') }}" alt="이미지명"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Proftab1// -->                    
                    
                    <div id="Proftab2" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">· 개설강좌</div>
                        <div class="acadBoxWrap">
                            <ul class="tabWrap tabDepthAcad">
                                <li><a href="#acad1" class="on">온라인강좌</a></li>
                                <li><a href="#acad2">학원강좌</a></li>
                            </ul>
                            <div class="AcadtabBox">
                                <div id="acad1" class="tabContent">
                                    <div class="tabGrid">
                                        <ul class="tabWrap acadline three">
                                            <li><a href="#onlist1" class="on">단강좌</a></li>
                                            <li><a href="#onlist2">추천패키지</a></li>
                                            <li><a href="#onlist3">선택패키지</a></li>
                                        </ul>
                                    </div>

                                    <div class="AcadListBox user-lec-list c_both">
                                        <div id="onlist1" class="tabContent">
                                            <div class="ListTabs">
                                                <ul>
                                                    <li><a class="on" href="#none">전체</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">이론과정</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">심화과정</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">문제풀이</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">특강</a></li>
                                                </ul>
                                            </div>

                                            <div class="willbes-Lec-Search p_re mt30">
                                                <div class="inputBox p_re">
                                                    <div class="selectBox">
                                                        <select id="select" name="select" title="직접입력" class="">
                                                            <option selected="selected">직접입력</option>
                                                            <option value="과정명">과정명</option>
                                                            <option value="강좌명">강좌명</option>
                                                            <option value="과목명">과목명</option>
                                                            <option value="교수명">교수명</option>                                                            
                                                        </select>
                                                    </div>
                                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강의명" maxlength="30">
                                                    <button type="submit" onclick="" class="search-Btn">
                                                        <span>검색</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Profdata tx-dark-black">
                                                    <ul>
                                                        <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"> </li>
                                                        <li class="ProfDetail">
                                                            <div class="Obj">
                                                                공무원 국어종결자<br/>정채영 국어
                                                            </div>
                                                            <div class="Name">정채영 교수님</div>
                                                        </li>
                                                        <li class="Reply tx-blue">
                                                            <strong>수강후기</strong>
                                                            <div class="sliderUp vSlider">
                                                                <div class="sliderVertical roll-Reply tx-dark-black">
                                                                    <div>1국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                                    <div>2국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                                    <div>3국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- willbes-Lec-Profdata -->

                                                <div class="willbes-Lec-Line">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 85px;">
                                                            <col>
                                                            <col style="width: 260px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-list">문제풀이</td>
                                                                <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                                <td class="w-data tx-left pl25 p_re">
                                                                    <div class="OTclass"><span>직장인/재학생반</span> <a href="#none" onclick="openWin('OTclassInfo')">?</a></div>
                                                                    <div class="w-tit">
                                                                        <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                                                    </div>
                                                                    <dl class="w-info">   
                                                                        <dt>학원실강의 : 2020년 1월</dt>      
                                                                        <dt><span class="row-line">|</span></dt>                                                                      
                                                                        <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                                                        <dt><span class="row-line">|</span></dt>
                                                                        <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                                                        <dt class="NSK ml15">
                                                                            <span class="nBox n1">2배수</span>
                                                                            <span class="nBox n2">진행중</span>
                                                                        </dt><br>                                                                        
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>강좌상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                    </dl>
                                                                    <div class="tx-red">※ 바로결제만 가능한 상품입니다.</div>

                                                                    {{--직장인/재학생 반 안내 팝업--}}
                                                                    <div id="OTclassInfo" class="willbes-Layer-requestInfo willbes-Layer-requestInfo2">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('OTclassInfo')">
                                                                            <img src="{{ img_url('prof/close.png') }}">
                                                                        </a>
                                                                        <div class="Layer-Tit NG tx-dark-black">직장인/재학생반  <span class="tx-blue">수강 안내</span></div>
                                                                        <div class="Layer-Cont">
                                                                            <div class="Layer-SubTit tx-gray">
                                                                                <ul>
                                                                                    <li>
                                                                                        <strong>예) 40일 강좌 수강시</strong><br>
                                                                                        - 수강 시간 : 평일 19~03시만 수강 / 주말, 공휴일 24시간 수강 가능<br>
                                                                                        - 수강 기간 : 원래 수강 기간 X 1.4배수(40일 X 1.4 = 56일)<br>
                                                                                        - 수강 중지 : 3회. 3회의 합은 56일까지<br>
                                                                                        - 수강 연장 : 3회. 1일 연장 수강료는 원래 수강 기간 40일 기준(강의 종료일까지만 연장 가능)<br>
                                                                                        - 수강 환불 : 환불일수는 원래 수강 기간 40일 기준(수강 중지시 환불 불가)<br>
                                                                                        <br>
                                                                                        <span class="tx-red">※ 주말반은 일반강의로 변경이 안됩니다.</span>
                                                                                    </li>                        
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="w-sp one"><a href="#none" onclick="openWin('viewBox')">맛보기</a></div>
                                                                    <div id="viewBox" class="viewBox">
                                                                        <a class="closeBtn" href="#none" onclick="closeWin('viewBox')"><img src="{{ img_url('cart/close.png') }}"></a>
                                                                        <dl class="NSK">
                                                                            <dt class="Tit NG">맛보기1</dt>
                                                                            <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                                                            <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                                                        </dl>
                                                                        <dl class="NSK">
                                                                            <dt class="Tit NG">맛보기2</dt>
                                                                            <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                                                            <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                                                        </dl>
                                                                    </div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="select">PC</span>
                                                                        <span class="dcprice">6,000원</span>
                                                                    </div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="select">모바일</span>
                                                                        <span class="dcprice">90,000원</span>
                                                                    </div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="select">PC+모바일</span>
                                                                        <span class="price">154,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                    <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 865px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>
                                                                    <div class="w-sub">
                                                                        <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                                        <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                                                        <span class="chk buybtn p_re">
                                                                            <label>[판매중]</label>
                                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                        </span>
                                                                        <span class="priceWrap">
                                                                            <span class="price tx-blue">30,000원</span>
                                                                            <span class="discount">(↓10%)</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="w-sub">
                                                                        <span class="w-obj tx-blue tx11">주교재</span> 
                                                                        <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                                                        <span class="chk">
                                                                            <label class="soldout">[품절]</label>
                                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                                        </span>
                                                                        <span class="priceWrap">
                                                                            <span class="price tx-blue">20,000원</span>
                                                                            <span class="discount">(↓10%)</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="w-sub">
                                                                        <span class="w-obj tx-blue tx11">부교재</span> 
                                                                        <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                                        <span class="chk">
                                                                            <label class="press">[출간예정]</label>
                                                                            <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                                        </span>
                                                                        <span class="priceWrap">
                                                                            <span class="price tx-blue">0원</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="w-sub  tx-red">※ 정부지침에 의해 강좌와 교재는 동시 결제가 불가능한점 양해 부탁드립니다.</div>
                                                                    <div class="w-sub">
                                                                        <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->
                                            </div>
                                            <!-- willbes-Lec -->
                                        </div>

                                        <div id="onlist2" class="tabContent">
                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">추천패키지</div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Line">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table d_block">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                                        <colgroup>
                                                            <col style="width: 95px;">
                                                            <col style="width: 665px;">
                                                            <col style="width: 180px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-list bg-light-white">이론</td>
                                                                <td class="w-data tx-left pl25">
                                                                    <div class="w-tit">
                                                                        <a href="{{ site_url('/home/html/packagesub') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#none" onclick="openWin('InfoForm')">
                                                                                <strong>패키지상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                                        <dt><span class="row-line">|</span></dt>
                                                                        <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                                        <dt class="NSK ml15">
                                                                            <span class="nBox n1">2배수</span>
                                                                            <span class="nBox n2">진행중</span>
                                                                            <span class="nBox n3">예정</span>
                                                                            <span class="nBox n4">완강</span>
                                                                        </dt>
                                                                    </dl>
                                                                </td>
                                                                <td class="w-notice">
                                                                    <div class="priceWrap">
                                                                        <span class="price">80,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">64,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-list bg-light-white">문제풀이</td>
                                                                <td class="w-data tx-left pl25">
                                                                    <div class="w-tit">2017 (하반기 지방직 대비) 페트라 출제포인트 패키지</div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20"><strong>패키지상세정보</strong></dt>
                                                                        <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                                        <dt><span class="row-line">|</span></dt>
                                                                        <dt>수강기간 : <span class="tx-blue">15일</span></dt>
                                                                        <dt class="NSK ml15">
                                                                            <span class="nBox n1">2배수</span>
                                                                            <span class="nBox n4">완강</span>
                                                                        </dt>
                                                                    </dl>
                                                                </td>
                                                                <td class="w-notice">
                                                                    <div class="priceWrap">
                                                                        <span class="price">80,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">64,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->

                                                <div class="TopBtn">
                                                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                                                </div>
                                                <!-- TopBtn-->
                                            </div>
                                        </div>

                                        <div id="onlist3" class="tabContent">
                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">선택패키지</div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Line">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table d_block">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable">
                                                        <colgroup>
                                                            <col style="width: 95px;">
                                                            <col style="width: 665px;">
                                                            <col style="width: 180px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-list bg-light-white">이론</td>
                                                                <td class="w-data tx-left pl25">
                                                                    <div class="w-tit">
                                                                        <a href="{{ site_url('/home/html/packagesub') }}">2017 9급 공무원 이론 선택형 종합 패키지 - 30일완성</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#none" onclick="openWin('InfoForm')">
                                                                                <strong>패키지상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt>개강일 : <span class="tx-blue">2017년 02월 14일</span></dt>
                                                                        <dt><span class="row-line">|</span></dt>
                                                                        <dt>수강기간 : <span class="tx-blue">30일</span></dt>
                                                                    </dl>
                                                                </td>
                                                                <td class="w-notice">
                                                                    <div class="priceWrap">
                                                                        <span class="price">80,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">64,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->

                                                <div class="TopBtn">
                                                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                                                </div>
                                                <!-- TopBtn-->
                                            </div>
                                            <!-- willbes-Lec -->
                                        </div>
                                    </div>

                                </div>
                                <!-- acad1 -->

                                <div id="acad2" class="tabContent">
                                    <div class="tabGrid">
                                        <ul class="tabWrap acadline two">
                                            <li><a href="#offlist1" class="on">단강좌</a></li>
                                            <li><a href="#offlist2">종합반</a></li>
                                        </ul>
                                    </div>
                                    <div class="AcadListBox user-lec-list c_both">
                                        <div id="offlist1" class="tabContent">
                                            <div class="ListTabs">
                                                <ul>
                                                    <li><a class="on" href="#none">노량진</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">부산</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">대구</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">인천</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">광주</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">전부</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">제주</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">경기광주(기숙형)</a></li>
                                                </ul>
                                            </div>

                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Line mt20">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 85px;">
                                                            <col style="width: 75px;">
                                                            <col>
                                                            <col style="width: 165px;">
                                                            <col style="width: 185px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-place">노량진</td>
                                                                <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                                <td class="w-list">이론</td>
                                                                <td class="w-data tx-left">
                                                                    <div class="w-tit w-acad-tit">
                                                                        <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>강좌상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt class="NSK">
                                                                            <span class="acadBox n1">방문+온라인</span>
                                                                        </dt>
                                                                    </dl>
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월~금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="acadInfo NSK n1">접수중</div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="price">154,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="w-tit tx-black">▷ 강좌정보</div>
                                                                    <div class="w-txt">
                                                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                                                        <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                                                        <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                                                        <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                                    </div>            

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->

                                                <div class="willbes-Lec-Table">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 85px;">
                                                            <col style="width: 75px;">
                                                            <col style="width: 355px;">
                                                            <col style="width: 165px;">
                                                            <col style="width: 185px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-place">노량진</td>
                                                                <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                                                <td class="w-list">이론</td>
                                                                <td class="w-data tx-left">
                                                                    <div class="w-tit w-acad-tit">
                                                                        <a href="#none">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>강좌상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt class="NSK">
                                                                            <span class="acadBox n2">방문접수</span>
                                                                        </dt>
                                                                    </dl>
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/3 ~ 6/30</span> (16회차)<br/>
                                                                    월~금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="acadInfo NSK n2">접수예정</div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="price">154,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="w-tit tx-black">▷ 강좌정보</div>
                                                                    <div class="w-txt">
                                                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                                    </div>            

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->
                                            </div>
                                            <!-- willbes-Lec -->

                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">· 영어<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Line mt20">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 85px;">
                                                            <col style="width: 75px;">
                                                            <col style="width: 355px;">
                                                            <col style="width: 165px;">
                                                            <col style="width: 185px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-place">노량진</td>
                                                                <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                                                                <td class="w-list">이론</td>
                                                                <td class="w-data tx-left">
                                                                    <div class="w-tit w-acad-tit">
                                                                        <a href="#none">[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>강좌상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt class="NSK">
                                                                            <span class="acadBox n3">온라인 접수</span>
                                                                        </dt>
                                                                    </dl><br/>
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/3 ~ 6/30</span> (16회차)<br/>
                                                                    월~금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="acadInfo NSK n3">마감</div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="w-tit tx-black">▷ 강좌정보</div>
                                                                    <div class="w-txt">
                                                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                                                        <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                                                        <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                                                        <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                                    </div>            

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->
                                                </div>
                                                <!-- willbes-Lec-Table -->
                                            </div>
                                            <!-- willbes-Lec -->
                                        </div>
                                        <div id="offlist2" class="tabContent">
                                            <div class="ListTabs">
                                                <ul>
                                                    <li><a class="on" href="#none">노량진</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">부산</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">대구</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">인천</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">광주</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">전부</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">제주</a><span class="row-line">|</span></li>
                                                    <li><a href="#none">경기광주(기숙형)</a></li>
                                                </ul>
                                            </div>
                                            <div class="willbes-Lec NG c_both">
                                                <div class="willbes-Lec-Subject tx-dark-black">· 종합반<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
                                                <!-- willbes-Lec-Subject -->

                                                <div class="willbes-Lec-Line mt20">-</div>
                                                <!-- willbes-Lec-Line -->

                                                <div class="willbes-Lec-Table p_re pb_active">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 90px;">
                                                            <col style="width: 425px;">
                                                            <col style="width: 165px;">
                                                            <col style="width: 185px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-place">노량진</td>
                                                                <td class="w-list">문제<br/>풀이</td>
                                                                <td class="w-data tx-left pl15">
                                                                    <div class="w-tit w-acad-tit">
                                                                        <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>종합반 상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt class="NSK">
                                                                            <span class="acadBox n1">방문+온라인</span>
                                                                        </dt>
                                                                    </dl><br/>
                                                                </td>
                                                                <td class="w-schedule">
                                                                    개강 : <span class="tx-blue">2018/05/10(목)</span><br/>
                                                                    종료 : 2018/06/30 (토)
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="acadInfo NSK n1">접수중</div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable bdb-dark-gray">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="w-tit w-Infotit tx-black">▷ 강좌정보</div>
                                                                    <div class="w-txt">
                                                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                                                        <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                                                        <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                                                        <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                                    </div>            

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoPackageTable tx-dark-gray">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 525px;">
                                                            <col style="width: 170px;">
                                                            <col style="width: 90px;">
                                                        </colgroup>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4"><div class="w-tit w-Infotit tx-black tx-left mb15 bd-none">▷ 필수과목 <span class="w-InfoSubtit">(과목별 1개만 선택해 주세요)</span></div></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="Top">
                                                                <td class="w-sbj">과목</td>
                                                                <td class="w-list">교수/강좌명</td>
                                                                <td class="w-schedule">강의시간</td>
                                                                <td class="w-info">강좌정보</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-sbj" rowspan="2">국어</td>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#none">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-sbj">영어</td>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#none">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable : 필수과목 -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoPackageTable tx-dark-gray">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 525px;">
                                                            <col style="width: 170px;">
                                                            <col style="width: 90px;">
                                                        </colgroup>
                                                        <thead>
                                                            <tr>
                                                                <th colspan="4"><div class="w-tit w-Infotit tx-black tx-left mb15 bd-none">▷ 선택과목 <span class="w-InfoSubtit">(전체 선택과목 중 2개를 선택해 주세요)</span></div></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="Top">
                                                                <td class="w-sbj">과목</td>
                                                                <td class="w-list">교수/강좌명</td>
                                                                <td class="w-schedule">강의시간</td>
                                                                <td class="w-info">강좌정보</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-sbj" rowspan="2">국어</td>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#none">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#none">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w-sbj">영어</td>
                                                                <td class="w-list tx-left pl10">
                                                                    <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                                                    <span class="tx-blue">김세령</span>
                                                                    [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                                </td>
                                                                <td class="w-schedule">
                                                                    <span class="tx-blue">5/1 ~ 6/30</span> (16회차)<br/>
                                                                    월 ~ 금 14:00 ~ 18:00
                                                                </td>
                                                                <td class="w-info">
                                                                    <a href="#none">
                                                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable : 선택과목 -->

                                                    <div class="lecInfoTable willbes-Lec-buyBtn GM">
                                                        <ul>
                                                            <li class="btnAuto180 h36">
                                                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                                                    <span>방문접수</span>
                                                                </button>
                                                            </li>
                                                            <li class="btnAuto180 h36">
                                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                                                    <span class="tx-light-blue">바로결제</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- willbes-Lec-Table -->

                                                <div class="willbes-Lec-Table p_re pb_active">
                                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                                        <colgroup>
                                                            <col style="width: 75px;">
                                                            <col style="width: 90px;">
                                                            <col style="width: 425px;">
                                                            <col style="width: 165px;">
                                                            <col style="width: 185px;">
                                                        </colgroup>
                                                        <tbody>
                                                            <tr>
                                                                <td class="w-place">노량진</td>
                                                                <td class="w-list">문제<br/>풀이</td>
                                                                <td class="w-data tx-left pl15">
                                                                    <div class="w-tit w-acad-tit">
                                                                        <a href="#none">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</a>
                                                                    </div>
                                                                    <dl class="w-info">
                                                                        <dt class="mr20">
                                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                                <strong>종합반 상세정보</strong>
                                                                            </a>
                                                                        </dt>
                                                                        <dt class="NSK">
                                                                            <span class="acadBox n2">방문접수</span>
                                                                        </dt>
                                                                    </dl><br/>
                                                                </td>
                                                                <td class="w-schedule">
                                                                    개강 : <span class="tx-blue">2018/05/10(목)</span><br/>
                                                                    종료 : 2018/06/30 (토)
                                                                </td>
                                                                <td class="w-notice p_re">
                                                                    <div class="acadInfo NSK n2">접수예정</div>
                                                                    <div class="priceWrap priceWrap2">
                                                                        <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                                        <span class="price">154,000원</span>
                                                                        <span class="discount">(10%↓)</span>  ▶
                                                                        <span class="dcprice">123,000원</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecTable -->

                                                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="w-tit tx-black">▷ 강좌정보</div>
                                                                    <div class="w-txt">
                                                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                                                    </div>            

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- lecInfoTable -->

                                                    <div class="lecInfoTable willbes-Lec-buyBtn GM">
                                                        <ul>
                                                            <li class="btnAuto180 h36">
                                                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                                                    <span>방문접수</span>
                                                                </button>
                                                            </li>
                                                            <li class="btnAuto180 h36">
                                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                                                    <span class="tx-light-blue">바로결제</span>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- willbes-Lec-Table -->
                                            </div>
                                            <!-- willbes-Lec -->
                                        </div>
                                    </div>
                                </div>
                                <!-- acad2 -->
                            </div>
                        </div>
                    </div>
                    <!-- Proftab2// -->

                    <div id="Proftab3" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">· 무료강좌</div>

                        <div class="willbes-Lec NG c_both">
                            <div class="willbes-Lec-Profdata tx-dark-black">
                                <ul>
                                    <li class="ProfImg"><img src="{{ img_url('prof/viewSample03.png') }}" alt="교수명"></li>
                                    <li class="ProfDetail">
                                        <div class="Obj">
                                            국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                                        </div>
                                        <div class="Name">기미진 교수님</div>
                                    </li>
                                    <li class="Reply tx-blue">
                                        <strong>수강후기</strong>
                                        <div class="sliderUp">
                                            <div class="sliderVertical roll-Reply tx-dark-black">
                                                <div>444국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                <div>555국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                                <div>666국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- willbes-Lec-Profdata -->

                            <div class="willbes-Lec-Line">-</div>
                            <!-- willbes-Lec-Line -->

                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 85px;">
                                        <col>
                                        <col style="width: 260px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-list">유료특강</td>
                                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                            <td class="w-data tx-left pl25">
                                                <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n2">진행중</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                <div class="priceWrap priceWrap2 tx-center">
                                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                    <span class="dcprice">0원</span>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">부교재</span> 
                                                    <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                                    <span class="chk">
                                                        <label class="press">[출간예정]</label>
                                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                                    </span>
                                                    <span class="priceWrap">
                                                        <span class="price tx-blue">0원</span>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->

                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 85px;">
                                        <col>
                                        <col style="width: 260px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-list">문제풀이</td>
                                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                                            <td class="w-data tx-left pl25">
                                                <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n3">예정</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one"><a href="#none">맛보기</a></div>
                                                <div class="priceWrap priceWrap2 tx-center">
                                                    <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                                    <span class="dcprice">0원</span>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 75px;">
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table --> 
                        </div>
                        <!-- willbes-Lec -->

                        <div class="willbes-Lec-buyBtn">
                            <ul>
                                <li class="btnAuto180 h36">
                                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>장바구니</span>
                                    </button>
                                </li>
                                <li class="btnAuto180 h36">
                                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">바로결제</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Lec-buyBtn -->
                    </div>
                    <!-- Proftab3// -->

                    <div id="Proftab4" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                            · 공지사항
                            <div class="willbes-Lec-Search GM f_right">
                                <div class="inputBox p_re">
                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                    <button type="submit" onclick="" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray">
                                <select id="acad" name="acad" title="구분" class="seleAcad">
                                    <option selected="selected">구분</option>
                                    <option value="학원">학원</option>
                                    <option value="온라인">온라인</option>
                                </select>
                                <select id="lec" name="lec" title="lec" class="seleLec">
                                    <option selected="selected">과목</option>
                                    <option value="헌법">헌법</option>
                                    <option value="스파르타반">스파르타반</option>
                                    <option value="공직선거법">공직선거법</option>
                                </select>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 65px;">
                                        <col style="width: 110px;">
                                        <col style="width: 445px;">
                                        <col style="width: 65px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>구분<span class="row-line">|</span></th>
                                            <th>과목<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>첨부<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">스파르타반</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">244</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">10</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">9</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">헌법</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->

                        <br/><br/><br/>

                        <!-- View -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 575px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="4" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                        <tr>
                                            <td class="w-acad pl20"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec tx-left pl20">헌법<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                            <td class="w-click"><strong>조회수</strong> 123</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="4">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt tx-left" colspan="7">
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                    <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                        <span>목록</span>
                                    </button>
                                </div>
                                <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 150px;">
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr>
                                        <tr>
                                            <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->
                    </div>
                    <!-- Proftab4// -->

                    <div id="Proftab5" class="tabLink" style="display:none">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                            · 학습Q&A
                            <div class="willbes-Lec-Search GM f_right">
                                <div class="inputBox p_re">
                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                    <button type="submit" onclick="" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray">
                                <select id="lec" name="lec" title="lec" class="seleLec">
                                    <option selected="selected">과목</option>
                                    <option value="헌법">헌법</option>
                                    <option value="스파르타반">스파르타반</option>
                                    <option value="공직선거법">공직선거법</option>
                                </select>
                                <select id="question" name="question" title="질문유형" class="seleQuestion">
                                    <option selected="selected">질문유형</option>
                                    <option value="기타">기타</option>
                                    <option value="강좌내용">강좌내용</option>
                                    <option value="학습상담">학습상담</option>
                                </select>
                                <ul class="chkBox" style="position: relative; top: -2px;">
                                    <li>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                        <label>공지숨기기</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                        <label>내질문보기</label>
                                    </li>
                                </ul>
                                <div class="search-Btn btnAuto90 h27 f_right">
                                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>질문하기</span>
                                    </button>
                                </div>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 100px;">
                                        <col style="width: 100px;">
                                        <col style="width: 395px;">
                                        <col style="width: 90px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>과목<span class="row-line">|</span></th>
                                            <th>질문유형<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>작성자<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>답변상태</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-question">기타</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-lec">스파르타반</td>
                                            <td class="w-question">강좌내용</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[필독] 가장자주묻는질문7가지</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">10</td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-question">학습상담</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 안녕하세요?
                                                </a>
                                            </td>
                                            <td class="w-write">장동*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">9</td>
                                            <td class="w-lec">행정법</td>
                                            <td class="w-question">기타</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 만띄어쓰기질문이요 
                                                    <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-write">박형*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-question">학습상담</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 안녕하세요?
                                                </a>
                                            </td>
                                            <td class="w-write">장동*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-lec">행정법</td>
                                            <td class="w-question">기타</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 만띄어쓰기질문이요 
                                                    <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-write">박형*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-question">강좌내용</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> 안녕하세요?
                                                </a>
                                            </td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-lec">행정법</td>
                                            <td class="w-question">기타</td>
                                            <td class="w-list tx-left pl20"><a href="#none">3월 24일 시험과 관련해서 질문 있습니다.</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-question">강좌내용</td>
                                            <td class="w-list tx-left pl20"><a href="#none">3월 24일 시험과 관련해서 질문 있습니다.</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-lec">행정법</td>
                                            <td class="w-question">기타</td>
                                            <td class="w-list tx-left pl20"><a href="#none">3월 24일 시험과 관련해서 질문 있습니다.</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-question">강좌내용</td>
                                            <td class="w-list tx-left pl20"><a href="#none">3월 24일 시험과 관련해서 질문 있습니다.</a></td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->

                        <br/><br/><br/>

                        <!-- Write -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecWriteTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 120px;">
                                        <col style="width: 370px;">
                                        <col style="width: 120px;">
                                        <col style="width: 330px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">과목<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-selected tx-left pl30">
                                                <select id="lec" name="lec" title="lec" class="seleLec">
                                                    <option selected="selected">과목을 선택하세요.</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                            </td>
                                            <td class="w-tit bg-light-white tx-left strong pl30">질문유형<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-selected tx-left pl30">
                                                <select id="Q" name="Q" title="Q" class="seleQ">
                                                    <option selected="selected">질문유형을 선택하세요.</option>
                                                    <option value="기타">기타</option>
                                                    <option value="강좌내용">강좌내용</option>
                                                    <option value="학습상담">학습상담</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">수강정보</td>
                                            <td class="w-selected full tx-left pl30" colspan="3">
                                                <select id="A" name="A" title="A" class="seleLecA">
                                                    <option selected="selected">질문강좌를 선택하세요.</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                                            <td class="w-radio tx-left pl30" colspan="3">
                                                <ul>
                                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>공개</label></li>
                                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>비공개</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-text tx-left pl30" colspan="3">
                                                <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-textarea write tx-left pl30" colspan="3">
                                                <textarea></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                                            <td class="w-file answer tx-left" colspan="4">
                                                <ul class="attach">
                                                    <li>
                                                        <!--div class="filetype">
                                                            <input type="text" class="file-text" />
                                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                            <span class="file-select"-->
                                                                <input type="file" class="input-file" size="3">
                                                            <!--/span>
                                                        </div-->
                                                    </li>
                                                    <li>
                                                        <!--div class="filetype">
                                                            <input type="text" class="file-text" />
                                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                            <span class="file-select"-->
                                                                <input type="file" class="input-file" size="3">
                                                            <!--/span>
                                                        </div-->
                                                    </li>
                                                    <li>
                                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="search-Btn mt20 mb50 f_right">
                                    <ul>
                                        <li class="btnAuto90 h36">
                                            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                                <span>저장</span>
                                            </button>
                                        </li>
                                        <li class="btnAuto90 h36">
                                            <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                                <span class="tx-purple-gray">취소</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->

                        <br/><br/><br/>

                        <!-- View -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 90px;">
                                        <col style="width: 70px;">
                                        <col style="width: 620px;">
                                        <col style="width: 160px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="4" class="w-list tx-left  pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
                                        <tr>
                                            <td class="w-write">작성자명<span class="row-line">|</span></td>
                                            <td class="w-lec">행정법<span class="row-line">|</span></td>
                                            <td class="subTit tx-left pl20"><strong class="tx-light-blue" style="padding-right: 5px;">[강좌내용]</strong>2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="4">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="4">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 90px;">
                                        <col style="width: 690px;">
                                        <col style="width: 160px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="3" class="w-list tx-left  pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
                                        <tr>
                                            <td class="w-answer"><img src="{{ img_url('prof/icon_answer.gif') }}"></td>
                                            <td class="w-write tx-left">홍길*<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="3">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="search-Btn mt20 mb30 h36 p_re">
                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                        <span class="tx-purple-gray">삭제</span>
                                    </button>
                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                                        <span class="tx-purple-gray">수정</span>
                                    </button>
                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                        <span>목록</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->
                    </div>
                    <!-- Proftab5// -->

                    <div id="Proftab6" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                            · 학습자료실
                            <div class="willbes-Lec-Search GM f_right">
                                <div class="inputBox p_re">
                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                    <button type="submit" onclick="" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray">
                                <select id="acad" name="acad" title="구분" class="seleAcad">
                                    <option selected="selected">구분</option>
                                    <option value="학원">학원</option>
                                    <option value="온라인">온라인</option>
                                </select>
                                <select id="lec" name="lec" title="lec" class="seleLec">
                                    <option selected="selected">과목</option>
                                    <option value="헌법">헌법</option>
                                    <option value="스파르타반">스파르타반</option>
                                    <option value="공직선거법">공직선거법</option>
                                </select>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 90px;">
                                        <col style="width: 100px;">
                                        <col style="width: 80px;">
                                        <col style="width: 395px;">
                                        <col style="width: 90px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>구분<span class="row-line">|</span></th>
                                            <th>과목<span class="row-line">|</span></th>
                                            <th>자료유형<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>첨부파일<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">스파르타반</td>
                                            <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[필독] 가장자주묻는질문7가지</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">456</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">10</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    2018 필살기실전모의고사파본관련공지
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">9</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    2018 필살기실전모의고사파본관련공지
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공통</td>
                                            <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-type"><div class="pBox p1 NSK">강좌</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">스파르타반</td>
                                            <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec">스파르타반</td>
                                            <td class="w-type"><div class="pBox p2 NSK">패키지</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[주의] 이럴 경우 답변되지 않을수 있습니다.</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-lec">공직선거법</td>
                                            <td class="w-type"><div class="pBox p3 NSK">교재</div></td>
                                            <td class="w-list tx-left pl20"><a href="#none">2018 필살기실전모의고사파본관련공지</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-list tx-center" colspan="8">검색 결과가 없습니다.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->

                        <br/><br/><br/>

                        <!-- View -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 80px;">
                                        <col style="width: 495px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="5" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                        <tr>
                                            <td class="w-acad pl20"><span class="oBox offlineBox NSK">학원</span><span class="row-line">|</span></td>
                                            <td class="w-lec">행정법<span class="row-line">|</span></td>
                                            <td class="subTit tx-left pl20"><strong class="tx-light-blue" style="padding-right: 5px;">[강좌]</strong>2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                            <td class="w-click"><strong>조회수</strong> 123</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="5">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt tx-left" colspan="5">
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                    <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                        <span>목록</span>
                                    </button>
                                </div>
                                <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 150px;">
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr>
                                        <tr>
                                            <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- willbes-Leclist -->
                    </div>
                    <!--Proftab6//-->                  
                    


                    <div id="Proftab8" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                            · 교수님 TCC
                        </div>
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <ul class="tccWrap">
                                <li>
                                    <img src="{{ img_url('prof/tccImg.jpg') }}" alt="TCC영상제목">
                                    <div class="tccInfo">
                                        <h4><span class="NG">D-47 신광은 교수님의 당부의 말씀</span><span class="date">2018-06-22</span></h4>
                                        <div>
                                            경찰 3차 합격,<Br>
                                            지금부터 하는 공부가 합격의 당락을 좌우합니다!<Br>
                                            지금도 늦지 않았습니다.<Br>
                                            <Br>
                                            앞으로 남은기간 최선을 다하자!<Br>
                                            앞으로 배운것만 틀리지 않고 다 맞을 수 있게 공부하자!<Br>
                                        </div>
                                    </div>   
                                    <a id="youtube-1" href="https://www.youtube.com/embed/3iEgf4R4oHU?rel=0" class="playBtn">영상보기</a> 
                                </li>
                                <li>
                                    <img src="{{ img_url('prof/tccImg.jpg') }}" alt="TCC영상제목">
                                    <div class="tccInfo">
                                        <h4><span class="NG">D-47 신광은 교수님의 당부의 말씀</span><span class="date">2018-06-22</span></h4>
                                        <div>
                                            경찰 3차 합격,
                                            지금부터 하는 공부가 합격의 당락을 좌우합니다!
                                            지금도 늦지 않았습니다.
                                            
                                            앞으로 남은기간 최선을 다하자!
                                            앞으로 배운것만 틀리지 않고 다 맞을 수 있게 공부하자!
                                        </div>
                                    </div>   
                                    <a id="youtube-2" href="https://www.youtube.com/embed/3iEgf4R4oHU?rel=0" class="playBtn">영상보기</a> 
                                </li>
                            </ul>
                        </div>
                        <!-- willbes-Leclist -->
                    </div>
                    <!-- Proftab8// -->

                </div>
                <!-- tabBox// -->
            </div>
        </div>
        <!-- willbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->


<link rel="stylesheet" type="text/css" href="/public/js/willbes/colorbox/colorbox.css" />
<script type="text/javascript" src="/public/js/willbes/colorbox/jquery.colorbox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {      
        $("#youtube-1").colorbox({iframe:true, innerWidth:800, innerHeight:600});
        $("#youtube-2").colorbox({iframe:true, innerWidth:800, innerHeight:600});
        $("#youtube-3").colorbox({iframe:true, innerWidth:800, innerHeight:600});
        $("#youtube-4").colorbox({iframe:true, innerWidth:800, innerHeight:600});
        $("#youtube-5").colorbox({iframe:true, innerWidth:800, innerHeight:600});    
    });
    function goList(page) {
        if(typeof(page) == "undefined") page = 1;
        else page = page;
        
        var url = "/teacher/board/board_list.html?topMenuType=O&topMenuGnb=OM_002&topMenu=081&menuID=OM_002_007"
                +"&BOARD_MNG_SEQ=TCC_000&BOARDTYPE=T4&INCTYPE=list&currentPage="+page 
                +"&SEARCHKIND="+$("#SEARCHKIND").val()
                +"&SEARCHTEXT="+$("#SEARCHTEXT").val()
                +"&searchUserId=wc_001" 
                +"&searchUserNm=" ;
        location.href = url ;                    
    }

    function fn_view(board_seq , parent_board_seq){
        var url = '/teacher/board/board_view.html?topMenuType=O&topMenuGnb=OM_002&topMenu=081&menuID=OM_002_007'
            +'&BOARD_MNG_SEQ=TCC_000&BOARDTYPE=T4&INCTYPE=view&currentPage=1'
            +'&BOARD_SEQ='+board_seq+'&PARENT_BOARD_SEQ='+parent_board_seq
            +'&SEARCHKIND='
            +'&SEARCHTEXT='
            +'&searchUserId=wc_001'
            +'&searchUserNm=' ;
        location.href = url;
    }

    //영상Player
    function fn_freeMp4Player(url,searchUserId){
        if(searchUserId == null || searchUserId == '') {
            searchUserId = 'anonymous';
        }
        var w = '960';  //가로 
        var h = '500'; //세로 
        var scroll = 'no'; //옵션
        var name = "StarPlayer";
        var LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        var TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        var settings = 'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable=no'; 
        var url = "/movieLectureInfo/freestarPlayer.pop2?searchUserId="+searchUserId+"&FREE_URL="+url;
        //고화질 플레이어
        try {
        if(pop.name){//저화질 플레이어 팝업이 열려 있는 상태
            //alert('저화질 플레이어 닫기');
            pop.close();//저화질 플레이어 닫기
            pop = null;
        } 
        }catch (exception) {}
        //저화질 플레이어
        try { 
            if(pop.name){//저화질 플레이어 팝업이 열려 있는 상태
                mp4pop =  window.open(url,name,settings);
            } 
        }catch(e){
            mp4pop =  window.open(url,name,settings);
        }
    }
</script>

@stop