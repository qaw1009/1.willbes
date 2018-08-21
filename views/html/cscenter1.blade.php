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
            <span class="depth-Arrow">></span><strong>자주하는 질문</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 자주하는 질문
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="Act1 mt30">
                <div class="LeclistTable c_both">
                    <div class="questionBoxWrap">
                        <ul class="tabWrap tabcsDepth2 tab_Question p_re NG">
                            <li>
                                <a class="qBox" href="#question1">
                                    <img src="{{ img_url('cs/icon_question623.gif') }}">
                                    <div>회원정보</div>
                                </a>
                                <div class="subBox on">
                                    <dl>
                                        <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                        <dt><button type="submit" onclick="">회원가입</button><span class="row-line">|</span></dt>
                                        <dt><button type="submit" onclick="">회원탈퇴</button><span class="row-line">|</span></dt>
                                        <dt><button type="submit" onclick="">회원정보</button></dt>
                                    </dl>
                                </div>
                            </li>
                            <li>
                                <a class="qBox" href="#question2">
                                    <img src="{{ img_url('cs/icon_question624.gif') }}">
                                    <div>결제/환불</div>
                                </a>
                                <div class="subBox">
                                    <dl>
                                        <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                        <dt><button type="submit" onclick="">결제</button><span class="row-line">|</span></dt>
                                        <dt><button type="submit" onclick="">환불</button></dt>
                                    </dl>
                                </div>
                            </li>
                            <li>
                                <a class="qBox" href="#question3">
                                    <img src="{{ img_url('cs/icon_question625.gif') }}">
                                    <div>교재</div>
                                </a>
                            </li>
                            <li>
                                <a class="qBox" href="#question4">
                                    <img src="{{ img_url('cs/icon_question626.gif') }}">
                                    <div>온라인수강</div>
                                </a>
                            </li>
                            <li>
                                <a class="qBox" href="#question5">
                                    <img src="{{ img_url('cs/icon_question627.gif') }}">
                                    <div>모바일</div>
                                </a>
                            </li>
                            <li>
                                <a class="qBox" href="#question6">
                                    <img src="{{ img_url('cs/icon_question628.gif') }}">
                                    <div>학원수강</div>
                                </a>
                            </li>
                        </ul>
                        <div class="tabBox mt100">
                            <div id="question1" class="tabContent">
                                <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 70px;">
                                        <col style="width: 100px;">
                                        <col style="width: 120px;">
                                        <col style="width: 560px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>캠퍼스<span class="row-line">|</span></th>
                                            <th>분류<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="replyList cscenterList">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                            <td class="w-select">회원정보</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                            <td class="w-select">회원탈퇴</td>
                                            <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                            <td class="w-click">244</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no">2</td>
                                            <td class="w-acad"><span class="oBox nyBox NSK">노량진</span></td>
                                            <td class="w-select">회원정보</td>
                                            <td class="w-list tx-left pl20">회원탈퇴는어떻게하나요?</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
                                        </tr>

                                        <tr class="replyList cscenterList">
                                            <td class="w-no">1</td>
                                            <td class="w-acad"><span class="oBox smBox NSK">신림</span></td>
                                            <td class="w-select">회원탈퇴</td>
                                            <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr class="replyTxt cscenterTxt bg-light-gray tx-gray">
                                            <td colspan="5">
                                                로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                            </td>
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
                            <div id="question2" class="tabContent">
                                결제/환불
                            </div>
                            <div id="question3" class="tabContent">
                                교재
                            </div>
                            <div id="question4" class="tabContent">
                                온라인수강
                            </div>
                            <div id="question5" class="tabContent">
                                모바일
                            </div>
                            <div id="question6" class="tabContent">
                                학원수강
                            </div>

                        </div>
                    </div>
                </div>
                <!--LeclistTable -->
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