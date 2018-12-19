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
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>교수진소개</strong>
            <span class="depth-Arrow">></span><strong>국어</strong>
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
                    <dt><a href="#none">정채영</a></dt>
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
    <div class="Content p_re ml20">

        <div class="willbes-Prof-Profile p_re mb40 NG tx-black">
            <div class="ProfImg p_re">
                <img src="{{ img_url('sample/prof5.png') }}">
            </div>
            <div class="prof-profile p_re">
                <ul class="prof-brief-btn">
                    <li>
                        <a href="#none" onclick="openWin('LayerProfile'),openWin('Profile')">
                            <img src="{{ img_url('prof/icon_profile.png') }}">
                            <div class="NSK">프로필</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none">
                            <img src="{{ img_url('prof/icon_sample.png') }}">
                            <div class="NSK">맛보기</div>
                        </a>
                    </li>
                    <li>
                        <a href="#none" onclick="openWin('LayerCurriculum'),openWin('Curriculum')">
                            <img src="{{ img_url('prof/icon_curri.png') }}">
                            <div class="NSK">커리큘럼</div>
                        </a>
                    </li>
                </ul>
                <div class="Obj NGR">
                    검증된 대한민국 국어 시험 전문가<br/>
                    출제자 시각의 분석, 수험생 시선까지 콕 집어내는 강의
                </div>
                <div class="Name"><span class="Sbj tx-blue">국어</span><strong>정채영</strong><span class="NGR">교수님</span></div>
                <div class="sliderBest cSlider">
                    <div class="best-tit">이 시기 BEST 강좌</div>
                    <div class="sliderControls">
                        <div class="lec-profile p_re">
                            <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강 [국가직] <img src="{{ img_url('prof/icon_ing.gif') }}"></div>
                            <dl class="w-info">
                                <dt><span class="tx-blue">30</span>일</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">48</span>강</dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><span class="tx-blue">100,000</span>원</dt>
                                <dt class="w-notice p_re">
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
                    커리큘럼 이미지 노출
                </div>
            </div>
            <div id="LayerCurriculum" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-CurriBox -->
        </div>
        <!-- willbes-Prof-Profile -->

        <div class="willbes-NoticeWrap p_re mb15 c_both">
            <div class="willbes-listTable willbes-newLec widthAuto460 mr20">
                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                <ul class="List-Table GM tx-gray">
                    <li><a href="#none">2018 정채영국어[현대] 문학 종결자 문학 집중강의 (5-6월)</a></li>
                    <li><a href="#none">2018 [지방직/서울시] 정채영 국어 [문학집중강의] 137작품을...</a></li>
                </ul>
            </div>
            <div class="willbes-listTable willbes-reply widthAuto460">
                <div class="will-Tit NG">수강후기 <a class="f_right" href="#none" onclick="openWin('LayerReply'),openWin('Reply')"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                <ul class="List-Table GM tx-gray">
                    <li><img src="{{ img_url('sub/star4.gif') }}"><a href="#none">설명도 잘 해주시고 좋은 강의에요</a></li>
                    <li><img src="{{ img_url('sub/star5.gif') }}"><a href="#none">짱 좋아요!</a></li>
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

            <div id="LayerReply" class="willbes-Layer-Black"></div>
            <!-- // willbes-Layer-ReplyBox -->

        </div>
        <!-- willbes-NoticeWrap -->

        <div class="willbes-Bnr mb15 pt10 pb10">
            <img src="{{ img_url('sample/bnr5.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Prof-Tabs">
            <div class="ProfDetailWrap">
                <ul class="tabWrap tabDepthProf tabDepthProf_1">
                    <li><a href="#Proftab6" class="on">T-pass자료실</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Proftab6" class="tabLink">
                        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
                            · T-pass자료실
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
                                <select id="acad" name="acad" title="구분" class="seleAcad" style="width: 220px">
                                    <option selected="selected">구분</option>
                                    <option value="2019 한덕현 국가직 T-pass">2019 한덕현 국가직 T-pass</option>
                                    <option value="2019 한덕현 국가직 T-pass2">2019 한덕현 국가직 T-pass2</option>
                                </select>
                                <div class="search-Btn btnAuto90 h27 f_right">
                                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>이용안내</span>
                                    </button>
                                </div>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 620px;">
                                        <col style="width: 65px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>첨부<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr class="top">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">244</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">10</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    2018 필살기실전모의고사파본관련공지
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">9</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    2018 필살기실전모의고사파본관련공지
                                                    <div class="subTit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                                                </a>
                                            </td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-list tx-center" colspan="5">검색 결과가 없습니다.</td>
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
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="3" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>2018 필살기실전모의고사파본관련공지</strong></th></tr>
                                        <tr>
                                            <td class="subTit tx-left pl20">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                            <td class="w-click"><strong>조회수</strong> 123</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="3">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt tx-left" colspan="3">
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
                </div>
            </div>
        </div>
        <!-- illbes-Prof-Tabs -->
    </div>
</div>
<!-- End Container -->
@stop