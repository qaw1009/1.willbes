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
                <li>
                    <a href="#none">모의고사관리</a>
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
            <span class="depth-Arrow">></span><strong>회원정보</strong>
            <span class="depth-Arrow">></span><strong>비밀번호변경</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG tx-center">비밀번호변경</div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="Member mem-renew-Password widthAuto530 pt50">
            <div class="user-Txt tx-black pb40">
                <div class="user-sub-Txt tx-gray" style="letter-spacing: 0;">
                    비밀번호를 재설정 해주세요.<br/>
                    비밀번호는 8~20자리 이하 영문 대소문자, 숫자, 특수문자 중 2종류를 조합해 주세요.
                </div>
            </div>
            <div class="widthAuto460">
                <div class="inputBox p_re">
                    <input type="password" id="USER_PWD_NEW" name="USER_PWD_NEW" class="iptPwdNew sm" placeholder="새비밀번호" maxlength="30">
                    <button type="submit" onclick="" class="mem-Btn sm bg-dark-blue bd-dark-blue">
                        <span>확인</span>
                    </button>
                </div>
            </div>
            <div class="renew-password-Btn btnAuto180 h36 mt60">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>비밀번호 변경하기</span>
                </button>
            </div>
        </div>
         <!-- 비밀번호 재설정 -->


         <br/><br/><br/>


        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG tx-center">비밀번호확인</div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="Member mem-renew-Password widthAuto530 pt50">
            <div class="user-Txt tx-black pb40">
                <div class="user-sub-Txt tx-gray" style="letter-spacing: 0;">
                    회원님의 정보를 더 안전하게 보호하기 위해 비밀번호를 다시 한 번 확인합니다.<br/>
                    비밀번호가 유출되지 않도록 주의해 주세요.
                </div>
            </div>
            <div class="widthAuto400">
                <div class="inputBox p_re" style="height: auto">
                    <input type="text" id="USER_ID" name="USER_ID" class="iptID bg-gray mb10" placeholder="아이디" maxlength="30" disabled="disabled">
                    <input type="password" id="USER_PWD_NEW" name="USER_PWD_NEW" class="iptPwdNew" placeholder="비밀번호를 입력해 주세요." maxlength="30">
                </div>
            </div>
            <div class="renew-password-Btn btnAuto180 h36 mt60">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>확인</span>
                </button>
            </div>
        </div>
         <!-- 비밀번호 재설정 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop