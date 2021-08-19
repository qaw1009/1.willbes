@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>내강의실</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>인적성검사</strong></span>
    </div>

    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Txt">
                                    - 해당 인적성검사는 검사시작 후(시작일 포함) 7일까지만 응시 가능합니다.<br>
                                    - 검사기간은 인적성검사 페이지에서 ‘검사시작’ 클릭 시점으로 시작일과 종료일이 셋팅됩니다.<br>
                                    - 인적성검사를 시작한 이후에는 환불이 불가합니다.<br>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>


        
        <div class="c_both tx-right mt40"><a href="#none" class="bdb-dark-gray pb5">내강의실 메인으로 이동하기 →</a></div>
        <div class="willbes-Mypage-EDITZONE mt20 c_both p_re">            
            <div class="tx-red">📌 검사완료 후 검사기간, 검사상태가 업데이트 되지 않거나 ‘결과보기’ 버튼이 보이지 않을 경우 새로고침(ctrl+F5)를 실행해 주세요.</div>
            <div class="LeclistTable mt20 c_both">
                <table cellspacing="0" cellpadding="0" class="listTable editTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 60px;">
                        <col>
                        <col style="width: 120px;">
                        <col style="width: 220px;">
                        <col style="width: 100px;">
                        <col style="width: 100px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></th>
                            <th>인적성검사명<span class="row-line">|</span></th>
                            <th>신청일<span class="row-line">|</span></th>
                            <th>검사기간<span class="row-line">|</span></th>
                            <th>검사상태<span class="row-line">|</span></th>
                            <th>검사결과</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>7</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 7</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>검사시작 후(시작일 포함) 7일까지</td>
                            <td>검사대기</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 6</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td>검사시작</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 5</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td>검사중</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 4(난이도 2)</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td><span class="tx-blue">검사완료</span></td>
                            <td><a href="#none" class="aBox answerBox tx-blue">결과보기</a></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 3</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td>시간만료</td>
                            <td><a href="#none" class="aBox answerBox tx-blue">결과보기</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 3</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td>기간만료</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td class="w-list tx-left pl20"><a href="#none" onclick="openWin('Aptitude')" class="tx-blue underline">소방직 인적성검사 3</a></td>
                            <td>2021-00-00 00:00</td>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <td><span class="tx-red">환불완료</span><br/>(2021-00-00)</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Mypage-EDITZONE -->

        <div id="Aptitude" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox740 h460 fix abs">
                <a class="closeBtn" href="#none" onclick="closeWin('Aptitude')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit NG tx-dark-black">인적성검사 사전 안내사항</div>
                <div class="Layer-Cont">
                    <div class="strong mt20 mb10 tx-gray">[유의사항]</div>
                    <div class="mb20 lh1_5">
                        · 해당 인적성검사는 검사시작 후(시작일 포함) <span class="tx-red">7일까지만 응시 가능</span>합니다.<br/>
                        · ‘인적성검사 페이지로 이동하기’ 버튼 클릭 시 해당 페이지에서 유의사항 확인 후 ‘검사시작’ 버튼을 클릭하시면 인적성검사가 시작됩니다.<br/>
                        <span class="tx-red">· 인적성검사를 시작한 이후에는 환불이 불가합니다.</span>
                    </div>
                    <div class="aptitudeBox">
                        <label>위 사전 안내사항을 모두 확인하였고 이에 동의합니다.  <input type="checkbox"></label>
                        <a href="#none" class="NG">인적성검사 페이지로 이동하기 ></a>
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-PassBox : 과제제출 -->
        </div>
        
    </div>
    <div class="Quick-Bnr">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop