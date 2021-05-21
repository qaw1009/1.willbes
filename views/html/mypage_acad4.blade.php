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
        <img src="/public/img/willbes/sub/icon_home.gif">
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>내강의실</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>내강의실</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>보강/복습동영상</strong></span>
    </div>
    <div class="Content p_re">  
        <div class="willbes-Mypage-Tabs">
            <div class="LeclistTable bdt-gray mb30 c_both">
                <table class="listTable passTable-Select under-gray tx-gray">
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 30%;">
                        <col style="width: 20%;">
                        <col style="width: 30%;">
                    </colgroup>
                    </tbody>
                        <tr>
                            <th>과목</th>
                            <td>유아</td>
                            <th>강사명</th>
                            <td>민정선</td>
                        </tr>
                        <tr>
                            <th>강좌명</th>
                            <td colspan="3" class="tx-blue">2020 (9~10월) 실전 모의고사반 (7주)</td>
                        </tr>
                        <tr>
                            <th>수강기간</th>
                            <td>2021-00-00 ~ 2021-00-00</td>
                            <th>잔여일</th>
                            <td>2일</td>
                        </tr>                        
                    </tbody>
                </table>
            </div>  

            <div class="c_both mt40 tx-right"><a href="#none" class="bdb-dark-gray pb5">다른 수강강좌 보기 →</a></div>

            <div class="willbes-Leclist c_both mt40">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                        <colgroup>
                            <col style="width: 80px;">
                            <col>
                            <col style="width: 80px;">
                            <col style="width: 50px;">
                            <col style="width: 70px;">
                            <col style="width: 70px;">
                            <col style="width: 130px;">
                            <col style="width: 70px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></li></th>
                                <th>강의명<span class="row-line">|</span></li></th>
                                <th>북페이지<span class="row-line">|</span></li></th>
                                <th>자료<span class="row-line">|</span></li></th>
                                <th>강의수강<span class="row-line">|</span></li></th>
                                <th>강의시간<span class="row-line">|</span></li></th>
                                <th>수강시간/배수시간<span class="row-line">|</span></li></th>
                                <th>잔여시간</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no">1강</td>
                                <td class="w-lec">
                                강의명이 출력됩니다.
                                <p>[설명] 족보 p.8</p>
                                </td>
                                <td class="w-page">10p~15p</td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_down.png') }}"></a>
                                </td>
                                <td class="w-free mypage">
                                    <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                    <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                    <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                                </td>
                                <td class="w-lec-time">50분</td>
                                <td class="w-study-time">40분/ 100분</td>
                                <td class="w-r-time">50분</td>
                            </tr>
                            <tr class="finish">
                                <td class="w-no">2강</td>
                                <td class="w-lec">강의명이 출력됩니다.</td>
                                <td class="w-page">5p~15p</td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_down.png') }}"></a>
                                </td>
                                <td class="w-free mypage">
                                    <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                    <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                    <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                                </td>
                                <td class="w-lec-time">40분</td>
                                <td class="w-study-time">10분/ 100분</td>
                                <td class="w-r-time">40분</td>
                            </tr>
                            <tr>
                                <td class="w-no">3강</td>
                                <td class="w-lec">강의명이 출력됩니다.</td>
                                <td class="w-page">25p~30p</td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                </td>
                                <td class="w-free mypage">
                                    <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                    <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                    <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                                </td>
                                <td class="w-lec-time">30분</td>
                                <td class="w-study-time">90분/ 100분</td>
                                <td class="w-r-time">30분</td>
                            </tr>
                            <tr>
                                <td class="w-no">4강</td>
                                <td class="w-lec">강의명이 출력됩니다.</td>
                                <td class="w-page">40p~70p</td>
                                <td class="w-file">
                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                </td>
                                <td class="w-free mypage">
                                    <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                    <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                    <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                                </td>
                                <td class="w-lec-time">20분</td>
                                <td class="w-study-time">70분/ 100분</td>
                                <td class="w-r-time">20분</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="c_both mt40 tx-right"><a href="#none" class="bdb-dark-gray pb5">다른 수강강좌 보기 →</a></div>
        </div>

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop