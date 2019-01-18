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
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>무한PASS존</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-PASSZONE c_both">
            <div class="willbes-Prof-Mypage NG tx-black">
                <div class="prof-profile p_re">
                    <div class="Name">
                        <strong>정채영</strong><br>
                        교수님
                    </div>
                    <div class="ProfImg">
                        <img src="/public/img/willbes/sample/prof2-1.png">
                    </div>
                    <div class="prof-home subBtn NSK"><a href="#none"><img src="/public/img/willbes/sub/icon_profhome.gif" style="margin-top: -4px; margin-right: 4px">교수홈</a></div>
                </div>
                <div class="lec-profile p_re">
                    <div class="w-tit">2018 정채영 국어 [현대] 문학종결자 문학집중강의 (5-6월 문학집중)</div>
                    <dl class="w-info tx-dark-gray">
                        <dt class="NSK ml10">
                            <span class="nBox n1">2배수</span>
                            <span class="nBox n2">진행중</span>
                            <span class="nBox n3">예정</span>
                            <span class="nBox n4">완강</span>
                        </dt>
                    </dl>
                    <div class="Prof-MypageBox pt15 c_both">
                        <table cellspacing="0" cellpadding="0" class="ProfmypageTable">
                            <colgroup>
                                <col style="width: 145px;"/>
                                <col style="width: 105px;"/>
                                <col style="width: 125px;"/>
                                <col style="width: 100px;"/>
                                <col style="width: 165px;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="w-lectit">최근수강강의</div>
                                        <div class="w-lec NGEB">2강</div>
                                        <div class="w-date tx-gray">(수강일 : 2018.3.20)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">진도율</div>
                                        <div class="w-lec NGEB">20%</div>
                                        <div class="w-date tx-gray">(수강시간기준)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">일시정지</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">2</span>회</div>
                                        <div class="w-date tx-gray">(3.20~4.20)</div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">수강연장</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">3</span>회</div>
                                        <div class="w-date tx-gray">
                                            <div class="w-btn">
                                                <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="w-lectit">잔여기간</div>
                                        <div class="w-lec NGEB"><span class="tx-light-blue">10</span>일/ 100일</div>
                                        <div class="w-date tx-gray">(2018.3.20~2018.6.20)</div>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="Mypage-PASSZONE-Btn">
                <ul>
                    <li class="subBtn blue NSK"><a href="#none">수강후기 작성하기 ></a></li>
                    <li class="subBtn NSK"><a href="#none">학습 Q&A</a></li>
                </ul>
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none">교재구매</a></div>
            </div>
        </div>
        <!-- willbes-Mypage-PASSZONE -->

        <div class="willbes-Leclist c_both mt40">
            <div class="LeclistTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 200px;">
                        <col style="width: 90px;">
                        <col style="width: 90px;">
                        <col style="width: 120px;">
                        <col style="width: 100px;">
                        <col style="width: 155px;">
                        <col style="width: 105px;">
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
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">10p~15p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
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
                        <tr>
                            <td class="w-no">2강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-page">5p~15p</td>
                            <td class="w-file">
                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
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
        <!-- willbes-Leclist -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop