@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">로그인</span>
    </div>

    <!-- 로그인 -->
    <div class="Member mem-Login widthAuto460">
        <div class="inputBox p_re">
            <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
            <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
        </div>
        <div class="inputBox p_re">
            <label for="USER_PWD" class="labelPwd" style="display: block;">비밀번호</label>
            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" maxlength="30">
        </div>
        <div class="tx-red" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
        <div class="chkBox mt30">
            <ul>
                <li class="chkBox-Save">
                    <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
                    <label for="USER_ID_SAVE" class="labelSave tx-gray">아이디 저장</label>
                </li>
                <li class="chkBox-Search tx-gray">
                    <span><a class="tx-gray" href="#none">아이디</a>/<a class="tx-gray" href="#none">비밀번호찾기</a></span>
                </li>
            </ul>
        </div>
        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
            <span>로그인</span>
        </button>
        <table cellspacing="0" cellpadding="0" class="joinTable tx-gray mt40">
            <colgroup>
                <col width="356px"/>
                <col width="104px"/>
            </colgroup>
            <tbody>
                <tr>
                    <td>
                        <span class="tx-blue">아직 윌비스 통합회원이 아니신가요?</span><br/>
                        가입 즉시 패밀리 포인트 3,000P를 받으실 수 있습니다.  
                    </td>
                    <td>
                        <a class="bg-dark-blue" href="#none">통합회원가입</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="tx-blue">윌비스 통합회원이란?</span><br/>
                        한번의 회원가입으로 윌비스 전체 서비스를 이용하실 수 있는 멤버십입니다.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End 로그인 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">휴면회원 안내</span>
    </div>
    <!-- 휴면회원 안내 -->
    <div class="Member mem-Dormant widthAuto690">
        <div class="user-Txt tx-black">
            안녕하세요. <span class="tx-blue">홍길동</span>회원님<br/>
            오랫동안 이용하지 않아 회원님의 아이디가 휴면 상태로 전환되었습니다.
        </div>
        <div class="info-Txt tx-gray">
            윌비스 전체 서비스를 다시 이용하고 싶은 경우에는<br/>
            <strong>'휴면회원 해제'</strong> 버튼을 클릭해 주세요.
        </div>
        <div class="dormant-Btn btnAuto180 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>휴면회원 해제</span>
            </button>
        </div>
    </div>
    <!-- End 휴면회원 안내 -->


    <br/><br/><br/>


    <!-- 비밀번호 변경 -->
    <div class="Member mem-Password widthAuto690">
        <div class="user-Txt tx-black tx-left">
            회원님의 소중한 정보 보호를 위해 비밀번호를 변경해 주세요.
            <div class="user-sub-Txt tx-gray">
                개인정보보호를 위해 비밀번호는 6개월마다 변경해 주세요.
            </div>
        </div>
        <div class="widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_PWD" class="labelPwd" style="display: block;">현재비밀번호</label>
                <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" maxlength="30">
            </div>
            <div class="tx-red mb30" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
            <div class="inputBox p_re">
                <label for="USER_PWD_NEW" class="labelPwdNew" style="display: block;">새비밀번호</label>
                <input type="password" id="USER_PWD_NEW" name="USER_PWD_NEW" class="iptPwdNew sm" maxlength="30">
                <button type="submit" onclick="" class="mem-Btn sm bg-dark-blue bd-dark-blue">
                    <span>확인</span>
                </button>
            </div>
            <div class="tx-gray">8~20자리 이하 영문 대소문자, 숫자, 특수문자 중 2종류를 조합해 주세요.</div>
        </div>
        <div class="password-Btn mt70">
            <ul>
                <li>
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>지금 변경하기</span>
                    </button>
                </li>
                <li>
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">다음에 변경하기</span>
                    </button>
                </li>
                <li>
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">30일간 보지 않기</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <!-- End 비밀번호 변경 -->


    <br/><br/><br/>


     <!-- 비밀번호 5회입력 오류 : 휴대폰 인증 -->
    <div class="Member mem-Wrong widthAuto690">
        <div class="user-Txt tx-black tx-left">
            비밀번호를 5회 이상 잘못 입력하셨습니다.
            <div class="user-sub-Txt tx-gray">
                개인정보 보호를 위해 비밀번호 재설정이 필요합니다.</br>
                아이디 입력 후 원하시는 본인인증 방법을 선택해 주세요.
            </div>
        </div>
        <ul class="tabs c_both">
            <li class="on"><a href="#none">휴대폰 인증</a></li>
            <li><a href="#none">E-mail 인증</a></li>
            <li><a href="#none">아이핀 인증</a></li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="wrong-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>휴대폰 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt70">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 비밀번호 5회입력 오류 : 휴대폰 인증 -->


    <br/><br/><br/>


    <!-- 비밀번호 5회입력 오류 : E-mail 인증 -->
    <div class="Member mem-Wrong widthAuto690">
        <div class="user-Txt tx-black tx-left">
            비밀번호를 5회 이상 잘못 입력하셨습니다.
            <div class="user-sub-Txt tx-gray">
                개인정보 보호를 위해 비밀번호 재설정이 필요합니다.</br>
                아이디 입력 후 원하시는 본인인증 방법을 선택해 주세요.
            </div>
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">휴대폰 인증</a></li>
            <li class="on"><a href="#none">E-mail 인증</a></li>
            <li><a href="#none">아이핀 인증</a></li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="inputBox p_re">
                <label for="USER_EMAIL" class="labelEmail" style="display: block;">이메일</label>
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" maxlength="30"> @ 
                <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                <select id="email" name="email" title="직접입력" class="seleEmail">
                    <option selected="selected">직접입력</option>
                    <option value="naver.com">naver.com</option>
                    <option value="daum.net">daum.net</option>
                </select>
            </div>
            <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
        </div>
        <div class="wrong-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>이메일 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt70">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 비밀번호 5회입력 오류 : E-mail 인증 -->


    <br/><br/><br/>


    <!-- 비밀번호 5회입력 오류 : 아이핀 인증 -->
    <div class="Member mem-Wrong widthAuto690">
        <div class="user-Txt tx-black tx-left">
            비밀번호를 5회 이상 잘못 입력하셨습니다.
            <div class="user-sub-Txt tx-gray">
                개인정보 보호를 위해 비밀번호 재설정이 필요합니다.</br>
                아이디 입력 후 원하시는 본인인증 방법을 선택해 주세요.
            </div>
        </div>
        <ul class="tabs c_both">
            <li><a href="#none">휴대폰 인증</a></li>
            <li><a href="#none">E-mail 인증</a></li>
            <li class="on"><a href="#none">아이핀 인증</a></li>
        </ul>
        <div class="widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_ID" class="labelId" style="display: block;">아이디</label>
                <input type="text" id="USER_ID" name="USER_ID" class="iptId" maxlength="30">
            </div>
            <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
        </div>
        <div class="wrong-Btn btnAuto120 mt70 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>아이핀 인증</span>
            </button>
        </div>
        <div class="notice-Txt tx-gray mt70">
            * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
        </div>
    </div>
    <!-- End 비밀번호 5회입력 오류 : 아이핀 인증 -->


    <br/><br/><br/>


    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">비밀번호 재설정</span>
    </div>
    <!-- 비밀번호 재설정 -->
    <div class="Member mem-renew-Password widthAuto690">
        <div class="user-Txt tx-black">
            비밀번호 찾기 인증에 성공하셨습니다.
            <div class="user-sub-Txt tx-gray">
                비밀번호를 재설정 해주세요.
            </div>
        </div>
        <div class="widthAuto460">
            <div class="inputBox p_re">
                <label for="USER_PWD_NEW" class="labelPwdNew" style="display: block;">새비밀번호</label>
                <input type="password" id="USER_PWD_NEW" name="USER_PWD_NEW" class="iptPwdNew sm" maxlength="30">
                <button type="submit" onclick="" class="mem-Btn sm bg-dark-blue bd-dark-blue">
                    <span>확인</span>
                </button>
            </div>
            <div class="tx-gray">8~20자리 이하 영문 대소문자, 숫자, 특수문자 중 2종류를 조합해 주세요.</div>
        </div>
        <div class="renew-password-Btn btnAuto180 h36">
            <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                <span>비밀번호 변경하기</span>
            </button>
        </div>
    </div>
    <!-- End 비밀번호 재설정 -->


    <br/><br/><br/>


</div>
<!-- End Container -->
@stop