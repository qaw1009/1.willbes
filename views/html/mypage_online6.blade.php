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
                            <li><a href="{{ site_url('/home/html/mypage_online5') }}">북마크</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online7') }}">수강확인증출력</a></li>
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
            <span class="depth-Arrow">></span><strong>온라인강좌</strong>
            <span class="depth-Arrow">></span><strong>북마크</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">북마크</div>
                                <div class="Txt">
                                    - 북마크는 강좌 수강 중 다시 보고 싶은 위치를 저장해 두는 편리한 기능입니다.<br/>
                                    - 북마크 저장은 수강 시 플레이어의 북마크 메뉴를 통해 하실 수 있습니다.<br/>
                                    - 저장된 북마크는 강의회차별 최근등록순으로 정렬됩니다.<br/>
                                    - 저장된 북마크는 해당 강좌의 수강기간이 종료된 이후 자동으로 삭제되므로 이용에 유의하시기 바랍니다.<br/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="willbes-Prof-List c_both">
            <table cellspacing="0" cellpadding="0" class="bookmark-prof tx-gray NG">
                <colgroup>
                    <col style="width: 20%;"/>
                    <col style="width: 80%;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-prof">
                            <span class="tx-black">국어</span> <span class="row-line">|</span> <span class="tx-deep-blue">정채영교수</span>
                        </td>
                        <td class="w-lec">
                            2018 정채영 국어[현대] 문학 종결자 문학 집중강의(5-6월)<br/>
                            강의명이 두줄까지 출력될 수 있습니다.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="willbes-Leclist c_both">
            <div class="LeclistTable">
                <ul class="f_right c_both mb20">
                    <li class="aBox cancelBox_block mr5"><a href="#none">전체삭제</a></li>
                    <li class="aBox cancelBox_block"><a href="#none">선택삭제</a></li>
                </ul>
                <table cellspacing="0" cellpadding="0" class="listTable bookmarkTable upper-black under-gray tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 250px;">
                        <col style="width: 80px;">
                        <col style="width: 90px;">
                        <col style="width: 100px;">
                        <col style="width: 240px;">
                        <col style="width: 100px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">No<span class="row-line">|</span></li></th>
                            <th>강의명<span class="row-line">|</span></li></th>
                            <th>강의시간<span class="row-line">|</span></li></th>
                            <th>강의수강<span class="row-line">|</span></li></th>
                            <th>북마크시간<span class="row-line">|</span></li></th>
                            <th>북마크내용<span class="row-line">|</span></li></th>
                            <th>북마크일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">1강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">2강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">3강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
                        </tr>
                        <tr>
                            <td class="w-no"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">4강</td>
                            <td class="w-lec">강의명이 출력됩니다.</td>
                            <td class="w-lec-time">50분</td>
                            <td class="w-free mypage">
                                <div class="tBox NSK t3 white"><a href="">WIDE</a></div>
                                <div class="tBox NSK t1 black"><a href="">HIGH</a></div>
                                <div class="tBox NSK t2 gray"><a href="">LOW</a></div>
                            </td>
                            <td class="w-bm-time">35분50.314초</td>
                            <td class="w-bm-txt">
                                <textarea id="" name="" cols="10" rows="1" class="memoText"></textarea>
                                <div class="aBox cancelBox_block"><a href="#none">수정</a></div>
                            </td>
                            <td class="w-bm-day">2018-10-10</td>
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