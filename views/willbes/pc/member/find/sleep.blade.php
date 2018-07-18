@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">휴면회원 해제</span>
        </div>
        <!-- 휴면회원 해제 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                1년 이상 윌비스에 로그인하지 않아 휴면상태로 전환된 경우라도,</br>
                계정정보를 인증하시면 정상적으로 서비스를 이용하실 수 있습니다.
            </div>
            <ul class="tabWrap tabLoginDepth1 tabs c_both">
                <li><a href="#type1">아이디 찾기</a></li>
                <li><a href="#type2">비밀번호 찾기</a></li>
                <li><a href="#type3">휴면회원 해제</a></li>
            </ul>
            <ul class="tabWrap tabLoginDepth2 tabs-Certi">
                <li id="tab1"><a href="#lock_certi1"><div>휴대폰 인증</div></a></li>
                <li id="tab2"><a href="#lock_certi2"><div>E-mail 인증</div></a></li>
                <li id="tab3"><a href="#lock_certi3"><div>아이핀 인증</div></a></li>
            </ul>
            <div clsas="tabBox">
                <div id="lock_certi1">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                        </div>
                        <div class="tx-red mb30" style="display: block;">이름을 정확하게 입력해 주세요.</div>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_PHONE" name="USER_PHONE" class="iptPhone certi" placeholder="휴대폰번호(-제외)" maxlength="30">
                            <button type="submit" onclick="" class="mem-Btn certi bg-dark-blue bd-dark-blue">
                                <span>인증번호 발송</span>
                            </button>
                        </div>
                        <div class="tx-red mb30" style="display: block;"> ‘-’ 없이 숫자만 입력해 주세요.</div>
                        <div class="inputBox p_re">
                            <input type="text" id="USER_NUMBER" name="USER_NUMBER" class="iptNumber" placeholder="인증번호입력" maxlength="30">
                        </div>
                        <div class="tx-red mb30" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                    </div>
                    <div class="search-Btn btnAuto120 mt30 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>확인</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray mt40">* 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.</div>
                </div>
                <div id="lock_certi2">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
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
                        <div class="tx-red" style="display: block;">가입 시 입력한 메일주소를 입력해 주세요.</div>
                    </div>
                    <div class="search-Btn btnAuto120 mt70 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>확인</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray mt40">* 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.</div>
                </div>
                <div id="lock_certi3">
                    <div class="widthAuto460 mt30">
                        <div class="inputBox p_re">
                            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="아이디" maxlength="30">
                        </div>
                        <div class="tx-red" style="display: block;">입력하신 정보와 일치하는 아이디가 없습니다.</div>
                    </div>
                    <div class="search-Btn btnAuto120 mt30 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>아이핀 인증</span>
                        </button>
                    </div>
                    <div class="notice-Txt tx-gray tx-left mt40 pl60">
                        * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.<br/>
                        * 아이디/비밀번호가 생각나지 않으신가요? <span class="underline valign-base">아이디/비밀번호 찾기</span>를 이용해 주세요.
                    </div>
                </div>
            </div>
        </div>
        <!-- End 휴면회원 해제 -->

    </div>
    <!-- End Container -->
@stop