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
            <span class="depth-Arrow">></span><strong>학습지원관리</strong>
            <span class="depth-Arrow">></span><strong>알림관리</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-SUPPORTZONE c_both">
            <div class="willbes-Notice-chk">
                <span class="subTit tx-gray">회원정보 SMS 수신여부와 상관없이, SMS 알림 설정시 SMS가 발송됩니다.</span>
                <table cellspacing="0" cellpadding="0" class="userNoticeTable NG">
                    <colgroup>
                        <col style="width: 33.33333333%;"/>
                        <col style="width: 33.33333333%;"/>
                        <col style="width: 33.33333333%;"/>
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-tit bg-light-white">학습 알림 설정</td>
                            <td>
                                · 휴대폰번호 <span class="tx-light-blue">010-1111-1111</span>
                                <span class="tBox black NSK"><a href="#none" onclick="openWin('COUPONPASS')">변경</a></span>
                            </td>
                            <td class="w-chk tx-left pl40">
                                <ul>
                                    <li><label>· 수신방법</label></li>
                                    <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>SMS</label></li>
                                    <li><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> <label>쪽지</label></li>
                                </ul>
                                <ul>
                                    <li><label>· 수신설정</label></li>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전체수신</label></li>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>전체미수신</label></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Mypage-SUPPORTZONE -->

        <div class="willbes-Leclist c_both">

            <div class="willbes-NoticeBox">
                <div class="willbes-Notice-Tit NG">온라인 수강 관련 알림</div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable userNoticeBoxTable under-gray bdt-gray tx-gray GM">
                        <colgroup>
                            <col style="width: 650px;"/>
                            <col style="width: 290px;"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="w-tit">
                                    자동 수강 시작 알림
                                    <div class="w-subtit">강좌시작일이 도래하여 강좌 수강이 자동으로 시작된 경우 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    강의 업데이트 알림
                                    <div class="w-subtit">수강중인 강좌에 신규 강의가 업데이트되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    수강종료 7일전 알림
                                    <div class="w-subtit">수강 종료일 7일 전이 되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    일시정지 해제알림
                                    <div class="w-subtit">일시정지가 해제되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-NoticeBox : 온라인 수강 관련 알림 -->

            <div class="willbes-NoticeBox">
                <div class="willbes-Notice-Tit NG">온라인 장바구니/결제 관련 알림</div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable userNoticeBoxTable under-gray bdt-gray tx-gray GM">
                        <colgroup>
                            <col style="width: 650px;"/>
                            <col style="width: 290px;"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="w-tit">
                                    장바구니 삭제 알림
                                    <div class="w-subtit">장바구니에 담긴 상품이 삭제될 경우, 삭제 당일 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    무통장입금 결제 마감 1일 전 알림
                                    <div class="w-subtit">무통장입금 결제 마감 1일 전이 되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-NoticeBox : 온라인 장바구니/결제 관련 알림 -->

            <div class="willbes-NoticeBox">
                <div class="willbes-Notice-Tit NG">학원 관련 알림</div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable userNoticeBoxTable under-gray bdt-gray tx-gray GM">
                        <colgroup>
                            <col style="width: 650px;"/>
                            <col style="width: 290px;"/>
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="w-tit">
                                    학원방문상담 1일 전 알림
                                    <div class="w-subtit">학원 방문상담 1일 전이 되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    사물함 마감 7일 전 알림
                                    <div class="w-subtit">대여종료 7일 전이 되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th class="w-tit">
                                    독서실 마감 7일 전 알림
                                    <div class="w-subtit">대여종료 7일 전이 되면 알려 드립니다.</div>
                                </th>
                                <td class="w-chk">
                                    <ul>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>수신</label></li>
                                        <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"> <label>미수신</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-NoticeBox : 학원 관련 알림 -->

        </div>
        <!-- willbes-Leclist -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop