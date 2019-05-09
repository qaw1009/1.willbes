@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center cscenter">
                <li>
                    <a href="{{ site_url('/home/html/cscenter_index') }}">고객센터 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter1') }}">자주하는 질문</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter2') }}">공지사항</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter3') }}">1:1 상담</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter4') }}">사이트 이용가이드</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter5') }}">모바일 이용가이드</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/cscenter6_1') }}">수강지원</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수강지원</li>
                            <li><a href="{{ site_url('/home/html/cscenter6_1') }}">PC 원격지원</a></li>
                            <li><a href="{{ site_url('/home/html/cscenter6_2') }}">학습 프로그램 설치</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter7') }}">부정사용자 규제</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>고객센터</strong>
            <span class="depth-Arrow">></span><strong>공지사항</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="Act2">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray mt0">
                        <div class="f_left">
                            <select id="acad" name="acad" title="구분" class="seleAcad">
                                <option selected="selected">구분</option>
                                <option value="학원">학원</option>
                                <option value="온라인">온라인</option>
                            </select>
                            <select id="campus" name="campus" title="campus" class="seleCampus">
                                <option selected="selected">캠퍼스</option>
                                <option value="헌법">헌법</option>
                                <option value="스파르타반">스파르타반</option>
                                <option value="공직선거법">공직선거법</option>
                            </select>
                        </div>
                        <div class="willbes-Lec-Search GM f_left mg0">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
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
                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
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
                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                    <td class="w-campus">스파르타반</td>
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
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">9</td>
                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">8</td>
                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">7</td>
                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">6</td>
                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">5</td>
                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">4</td>
                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">355</td>
                                </tr>
                                <tr>
                                    <td class="w-no">3</td>
                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                    <td class="w-campus">스파르타반</td>
                                    <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                    <td class="w-file">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-click">466</td>
                                </tr>
                                <tr>
                                    <td class="w-no">2</td>
                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                    <td class="w-campus">스파르타반</td>
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
                                    <td class="w-txt tx-left" colspan="7">
                                        이달의 개강 강좌 공지입니다.<br/>
                                        이달의 개강 강좌 공지입니다.<br/>
                                        이달의 개강 강좌 공지입니다.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-file tx-left" colspan="4">
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a>
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a>
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
        <!-- willbes-CScenter -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop