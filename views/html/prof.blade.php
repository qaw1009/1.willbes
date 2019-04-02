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
        <span class="1depth"><span class="depth-Arrow">></span><strong>교수진소개</strong></span>
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

        <div class="willbes-NoticeWrap mb40 c_both">
            <div class="sliderPromotion nSlider widthAuto460 f_left mr20">
                <div class="sliderNum">
                    <div><img src="{{ img_url('sample/roll1.jpg') }}"></div>
                    <div><img src="{{ img_url('sample/roll2.jpg') }}"></div>
                </div>
            </div>
            <div class="willbes-listTable willbes-newLec widthAuto460">
                <div class="will-Tit NG">신규강좌 <img style="vertical-align: top;" src="{{ img_url('prof/icon_new.gif') }}"></div>
                <ul class="List-Table GM tx-gray">
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">강좌명이 노출됩니다.</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">강좌명이 노출됩니다.</a><span class="date">2018.03.06</span>
                    </li>
                    <li>
                        <a href="#none">2017 기미진 국어 아침특강(5-6월)</a><span class="date">2018.03.06</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-NoticeWrap -->

        <div class="curriWrap GM c_both mb10">
            <div class="CurriBox">
                <table cellspacing="0" cellpadding="0" class="curriTable">
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
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th class="tx-gray">직렬선택</th>
                            <td class="All">
                                <a href="#none">전체</a>
                            </td>
                            <td>
                                <a href="#none">일반행정직</a>
                            </td>
                            <td>
                                <a href="#none">교육행정직</a>
                            </td>
                            <td>
                                <a href="#none">출입국관리직</a>
                            </td>
                            <td>
                                <a href="#none">선거행정직</a>
                            </td>
                            <td>
                                <a href="#none">사회복지직</a>
                            </td>
                            <td>
                                <a href="#none">9급견습직</a>
                            </td>
                            <td>
                                <a href="#none">관세직</a>
                            </td>
                            <td>
                                <a href="#none">고용노동직</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td class="All">
                                <a href="#none">전체</a>
                            </td>
                            <td>
                                <a href="#none">국어</a>
                            </td>
                            <td>
                                <a href="#none">영어</a>
                            </td>
                            <td>
                                <a href="#none">한국사</a>
                            </td>
                            <td>
                                <a href="#none">행정법</a>
                            </td>
                            <td>
                                <a href="#none">행정학</a>
                            </td>
                            <td>
                                <a href="#none">교육학</a>
                            </td>
                            <td>
                                <a href="#none">수학</a>
                            </td>
                            <td>
                                <a href="#none">과학</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Prof-List NG c_both">
            <div class="willbes-Prof-Subject tx-dark-black">· 국어</div>
            <!-- willbes-Prof-Subject -->
            <ul class="profGrid">
                <li class="profList">
                    <a href="{{ site_url('/home/html/profsub') }}">
                        <div class="Obj">공무원 국어종결자 <br/>
                            공무원<br/>국어종결자</div>
                        <div class="Name">
                            <strong>정채영</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>기미진</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>김세령</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <img class="Evt" src="{{ img_url('prof/icon_event.gif') }}">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>오대혁</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
            </ul>
            <ul class="profGrid">
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>정채영</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>기미진</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>김세령</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>오대혁</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
            </ul>
        </div>
        <!-- willbes-Prof-List -->

        <div class="willbes-Prof-List NG c_both">
            <div class="willbes-Prof-Subject tx-dark-black">· 영어</div>
            <!-- willbes-Prof-Subject -->
            <ul class="profGrid">
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>정채영</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>오대혁</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
            </ul>
        </div>
        <!-- willbes-Prof-List -->

        <div class="willbes-Prof-List NG c_both">
            <div class="willbes-Prof-Subject tx-dark-black">· 한국사</div>
            <!-- willbes-Prof-Subject -->
            <ul class="profGrid">
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>정채영</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>오대혁</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
                <li class="profList">
                    <a href="#none000">
                        <div class="Obj">공무원 국어종결자<br/>정채영 국어</div>
                        <div class="Name">
                            <strong>오대혁</strong><br/>
                            교수님 <img class="N" src="{{ img_url('prof/icon_N.gif') }}">
                        </div>
                        <img class="profImg" src="{{ img_url('sample/prof4.png') }}">
                    </a>
                    <div class="w-notice">
                        <dl>
                            <dt><a href="#none"><span>대표강의</span></a></dt>
                            <dt><a href="#none"><span>프로필</span></a></dt>
                        </dl>
                    </div>
                </li>
            </ul>
        </div>
        <!-- willbes-Prof-List -->

    </div>
</div>
<!-- End Container -->
@stop