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
                <li>
                    <a href="#none">이벤트</a>
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
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>기출문제</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mocktest INFOZONE c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 기출문제
                <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="willbes-Leclist c_both mt30">

            <!-- List -->
            <div class="willbes-Leclist c_both">
                <div class="willbes-Lec-Selected tx-gray">
                    <select id="area" name="area" title="지역" class="seleArea">
                        <option selected="selected">지역</option>
                        <option value="경기도">경기도</option>
                        <option value="경상북도">경상북도</option>
                    </select>
                    <select id="year" name="year" title="연도" class="seleYear">
                        <option selected="selected">연도</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                    </select>
                    <select id="subject" name="subject" title="과목" class="seleSubject">
                        <option selected="selected">과목</option>
                        <option value="국어">국어</option>
                        <option value="형사소송법">형사소송법</option>
                    </select>
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 65px;">
                            <col style="width: 80px;">
                            <col style="width: 60px;">
                            <col style="width: 110px;">
                            <col style="width: 360px;">
                            <col style="width: 65px;">
                            <col style="width: 110px;">
                            <col style="width: 90px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>지역<span class="row-line">|</span></th>
                                <th>연도<span class="row-line">|</span></th>
                                <th>과목<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>첨부<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file"><img src="{{ img_url('prof/icon_file.gif') }}"></td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">123</td>
                            </tr>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                <td class="w-area">경상북도</td>
                                <td class="w-year">2016</td>
                                <td class="w-sbj">형상소송법</td>
                                <td class="w-list tx-left pl20"><a href="#none">[2014년 1차] 경찰공무원(순경) 채용시험-형사소송법</a></td>
                                <td class="w-file"><img src="{{ img_url('prof/icon_file.gif') }}"></td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">244</td>
                            </tr>
                            <tr>
                                <td class="w-no">10</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2015</td>
                                <td class="w-sbj">형법</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">9</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">8</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">5</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">4</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-no">3</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">466</td>
                            </tr>
                            <tr>
                                <td class="w-no">2</td>
                                <td class="w-area">경기도</td>
                                <td class="w-year">2017</td>
                                <td class="w-sbj">국어</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰공무원(순경) 채용시험 문제-국어</a></td>
                                <td class="w-file">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-click">355</td>
                            </tr>
                            <tr>
                                <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
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

            <br/><br/><br/>

            <!-- View -->
            <div class="willbes-Leclist c_both">
                <div class="LecViewTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 65px;">
                            <col style="width: 65px;">
                            <col style="width: 510px;">
                            <col style="width: 150px;">
                            <col style="width: 150px;">
                        </colgroup>
                        <thead>
                            <tr><th colspan="5" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_notice.gif') }}" style="marign-right: 5px;"> <strong>[2014년 1차] 경찰공무원(순경) 채용시험-형법</strong></th></tr>
                            <tr>
                                <td class="w-area">서울<span class="row-line">|</span></td>
                                <td class="w-year">2015<span class="row-line">|</span></td>
                                <td class="w-sbj tx-left pl20">형법<span class="row-line">|</span></td>
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
                    <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 150px;">
                            <col style="width: 640px;">
                            <col style="width: 150px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                <td class="tx-left pl20"><a href="#none">3월 31일(금) 새벽 시스템 점검 안내</a><span class="row-line">|</span></td>
                                <td class="w-date">2018-00-00</td>
                            </tr>
                            <tr>
                                <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                <td class="tx-left pl20"><a href="#none">다음글이 없습니다.</a><span class="row-line">|</span></td>
                                <td class="w-date">2018-00-00</td>
                            </tr> 
                        </tbody>
                    </table>
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