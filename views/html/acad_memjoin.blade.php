@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="memContainer widthAuto c_both">

    <div class="mem-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">학원 방문결제 접수</span>
    </div>
     <!-- 로그인 -->
    <div class="Member mem-Login widthAuto460">
        <ul class="tabWrap tabLoginDepth1 tabs half c_both">
            <li><a href="#join1">회원</a></li>
            <li><a href="#join2">비회원</a></li>
        </ul>
        <div class="tabBox">
            <div id="join1">
                <div class="widthAuto460">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                    </div>
                    <div class="inputBox p_re">
                        <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="비밀번호" maxlength="30">
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
                </div>
            </div>
            <div id="join2">
                <div class="widthAuto460">
                    <div class="inputBox p_re">
                        <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="이름" maxlength="30">
                    </div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone" placeholder="휴대폰번호(-제외)" maxlength="30">
                    </div>
                    <div class="inputBox p_re">
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail01" placeholder="이메일" maxlength="30"> @ 
                        <input type="text" id="USER_EMAIL" name="USER_EMAIL" class="iptEmail02" maxlength="30">
                        <select id="email" name="email" title="직접입력" class="seleEmail">
                            <option selected="selected">직접입력</option>
                            <option value="naver.com">naver.com</option>
                            <option value="daum.net">daum.net</option>
                        </select>
                    </div>
                    <div class="tx-red mb30" style="display: block;">미입력 항목을 입력해 주세요.</div>
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>로그인</span>
                    </button>
                </div>
            </div>
        </div>
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
                <tr>
                    <td colspan="2"><span class="tx-black">비회원 수강신청 주의사항</span><br/>
                        - 비회원 접수내역은 회원가입 후에도 내강의실에서 <span class="tx-red">확인할 수 없습니다.</span><br/>
                        - 복습 동영상강의 및 보강동영상은 <span class="tx-red">회원가입을 하셔야만 학습 가능</span>합니다.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- End 로그인 -->


    <br/><br/><br/><br/><br/><br/>


</div>
<!-- End Container -->
@stop