@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">종합반</a>
                </li>
                <li>
                    <a href="#none">단과</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/acad_info1') }}">학원안내</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원안내</li>
                            <li><a href="{{ site_url('/home/html/acad_info1_1') }}">학원강의정보</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info2') }}">모의고사성적공지</a></li>
                            <li><a href="{{ site_url('/home/html/acad_info3') }}">학원갤러리</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">학원소개</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원안내</strong></span>
        <span class="1depth"><span class="depth-Arrow">></span><strong>학원강의정보</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-AcadInfo c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 학원강의정보
            </div>
            <div class="Acad_info mt30">
                <ul class="tabMock four mb60">
                    <li><a href="{{ site_url('/home/html/acad_info1_1') }}">강의시간표</a></li>
                    <li><a href="{{ site_url('/home/html/acad_info1_2') }}">강의실배정표</a></li>
                    <li><a class="on" href="#none">휴강/보강공지</a></li>
                    <li><a href="{{ site_url('/home/html/acad_info1_4') }}">신규강의안내</a></li>
                </ul>

                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                            <select id="acad" name="acad" title="카테고리" class="seleAcad">
                                <option selected="selected">카테고리</option>
                                <option value="카테고리1">카테고리1</option>
                                <option value="카테고리2">카테고리2</option>
                            </select>
                            <select id="campus" name="campus" title="campus" class="seleCampus">
                                <option selected="selected">캠퍼스</option>
                                <option value="헌법">헌법</option>
                                <option value="스파르타반">스파르타반</option>
                                <option value="공직선거법">공직선거법</option>
                            </select>
                        </span>
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </span>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 110px;">
                                <col style="width: 510px;">
                                <col style="width: 65px;">
                                <col style="width: 100px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>캠퍼스<span class="row-line">|</span></th>
                                    <th>제목<span class="row-line">|</span></th>
                                    <th>첨부<span class="row-line">|</span></th>
                                    <th>작성일<span class="row-line">|</span></th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                    <td class="w-campus">공통</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    </td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">123</td>
                                </tr>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                    </td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">244</td>
                                </tr>
                                <tr>
                                    <td class="w-no">10</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">9</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">8</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">7</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">6</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">5</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">4</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">3</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">2</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-list tx-center" colspan="6">검색 결과가 없습니다.</td>
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
                                <col style="width: 640px;">
                                <col style="width: 150px;">
                                <col style="width: 150px;">
                            </colgroup>
                            <thead>
                                <tr><th colspan="3" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                <tr>
                                    <td class="w-acad tx-left pl20">
                                        <dl>
                                            <dt>일반경찰<span class="row-line">|</span></dt>
                                            <dt>경행경채<span class="row-line">|</span></dt>
                                            <dt>노량진</dt>
                                        </dl>
                                        <span class="row-line">|</span>
                                    </td>
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
            </div>
        </div>
        <!-- willbes-AcadInfo -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop