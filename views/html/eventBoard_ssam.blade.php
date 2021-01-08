
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
            <span class="depth-Arrow">></span><strong>이벤트</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray c_both mt0">
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="event" name="event" title="event" class="seleEvt mr10 f_left">
                        <option selected="selected">전체 이벤트</option>
                        <option value="진행중">진행중</option>
                        <option value="종료">종료</option>
                    </select>
                    <select id="campus" name="campus" title="campus" class="seleCampus mr10 f_left">
                        <option selected="selected">유형</option>
                        <option value="설명회">설명회</option>
                        <option value="특강">특강</option>
                        <option value="이벤트">이벤트</option>
                    </select>
                </span>
                <div class="willbes-Lec-Search GM f_left" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="LeclistTable orderTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 70px;">
                        <col style="width: 160px;">
                        <col >
                        <col style="width: 100px;">
                        <col style="width: 120px;">
                        <col style="width: 80px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>NO<span class="row-line">|</span></li></th>
                            <th colspan="2">이벤트 정보<span class="row-line">|</span></li></th>
                            <th>진행상태<span class="row-line">|</span></li></th>
                            <th>참여대상<span class="row-line">|</span></li></th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no"><img src="{{ img_url('sub/icon_HOT.gif') }}"></td>
                            <td class="w-img">
                                <a href="{{ site_url('/home/html/event_ing_read') }}"><img src="{{ img_url('sample/evt2.jpg') }}"></a>
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/event_ing_read') }}"><strong><span class="tx-light-blue">[이벤트]</span> 18년 제1차 경찰공무원(순경) 채용 시험문제 - 국어</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                                <div class="mt5"><a href="#none" class="btnstA">바로가기 ></a></div>
                            </td>
                            <td class="w-progress"><span class="on">진행중</span></td>
                            <td class="w-user">회원</td>
                            <td class="w-view">123</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-img">
                            <a href="{{ site_url('/home/html/event_ing_read') }}"><img src="{{ img_url('sample/evt2.jpg') }}"></a>
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <div class="w-tit">
                                    <a href="#none"><strong><span class="tx-light-blue">[설명회]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                            </td>
                            <td class="w-progress"><span class="on">진행중</span></td>
                            <td class="w-user">회원+비회원</td>
                            <td class="w-view">244</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-img">
                            <a href="{{ site_url('/home/html/event_ing_read') }}"><img src="{{ img_url('sample/evt2.jpg') }}"></a>
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <div class="w-tit">
                                    <a href="#none"><strong><span class="tx-light-blue">[특강]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                            </td>
                            <td class="w-progress"><span class="off">마감</span></td>
                            <td class="w-user">회원</td>
                            <td class="w-view">355</td>
                        </tr>
                    </tbody>
                </table>
                <div class="Paging">
                    <ul>
                        <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                        <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                        <li><a href="#none">2</a><span class="row-line">|</span></li>
                        <li><a href="#none">3</a><span class="row-line">|</span></li>
                        <li><a href="#none">4</a><span class="row-line">|</span></li>
                        <li><a href="#none">5</a><span class="row-line">|</span></li>
                        <li><a href="#none">6</a><span class="row-line">|</span></li>
                        <li><a href="#none">7</a><span class="row-line">|</span></li>
                        <li><a href="#none">8</a><span class="row-line">|</span></li>
                        <li><a href="#none">9</a><span class="row-line">|</span></li>
                        <li><a href="#none">10</a></li>
                        <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- willbes-Leclist -->

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

         <!-- View -->
         <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col>
                        <col style="width: 150px;">
                        <col style="width: 150px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th colspan="3" class="w-list tx-left pl20"><span class="w-select tx-blue">[이벤트]</span> <strong>합격생 중교 입교 버스 든든 이벤트</strong></th></tr>
                        <tr>
                            <td class="w-type tx-left pl20">
                                <span class="mr10">진행중</span>
                                <span class="mr10">회원+비회원</span>
                                <span class="mr10">[접수기간] 2018-00-00 ~ 2018-00-00</span>               
                                <span class="row-line">|</span>
                            </td>
                            <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                            <td class="w-click"><strong>조회수</strong> 123</td>
                        </tr>
                    </thead>
                    <tbody>
                        {{--
                        <tr>
                            <td class="w-file tx-left pl20" colspan="3">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                            </td>
                        </tr>
                        --}}
                        <tr>
                            <td class="w-txt tx-left" colspan="3">
                                <img src="https://ssam.willbes.net/public/uploads/willbes/event/2020/1228/event_0_20201228170207.jpg" class="boardImg">
                                수험생 여러분들께 보다 나은 수강환경을 제공해드리기 위해<br/>
                                서버 점검 및 개선 작업이 진행될 예정입니다.<br/><br/>
                                점검 시간에는 수강이 원활하지 않으니 양해 부탁드립니다.
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                    <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                        <span>목록</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop