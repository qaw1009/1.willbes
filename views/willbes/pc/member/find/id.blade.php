@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">아이디/비밀번호 찾기</span>
        </div>
        <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : 휴대폰 인증 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                아이디/비밀번호를 분실하셨나요?</br>
                원하시는 인증방법을 선택해 주세요.
            </div>
            <ul class="tabs c_both">
                <li class="on"><a href="#none">아이디 찾기</a></li>
                <li><a href="#none">비밀번호 찾기</a></li>
                <li><a href="#none">휴면회원 해제</a></li>
            </ul>
            <ul class="tabs-Certi">
                <li id="tab1" class="on">
                    <a href="#none">
                        <div>휴대폰 인증</div>
                    </a>
                </li>
                <li id="tab2">
                    <a href="#none">
                        <div>E-mail 인증</div>
                    </a>
                </li>
                <li id="tab3">
                    <a href="#none">
                        <div>아이핀 인증</div>
                    </a>
                </li>
            </ul>
            <div class="info-Txt tx-gray">
                본인 명의의 휴대폰을 통해 인증합니다.
            </div>
            <div class="search-Btn btnAuto120 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>휴대폰 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
            </div>
        </div>
        <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : 휴대폰 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">아이디/비밀번호 찾기</span>
        </div>
        <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : E-mail 인증 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                아이디/비밀번호를 분실하셨나요?</br>
                원하시는 인증방법을 선택해 주세요.
            </div>
            <ul class="tabs c_both">
                <li class="on"><a href="#none">아이디 찾기</a></li>
                <li><a href="#none">비밀번호 찾기</a></li>
                <li><a href="#none">휴면회원 해제</a></li>
            </ul>
            <ul class="tabs-Certi">
                <li id="tab1">
                    <a href="#none">
                        <div>휴대폰 인증</div>
                    </a>
                </li>
                <li id="tab2" class="on">
                    <a href="#none">
                        <div>E-mail 인증</div>
                    </a>
                </li>
                <li id="tab3">
                    <a href="#none">
                        <div>아이핀 인증</div>
                    </a>
                </li>
            </ul>
            <div class="widthAuto460">
                <div class="inputBox p_re mt30">
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
            <div class="search-Btn btnAuto120 mt70 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>이메일 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 입력하신 메일로 발송된 인증메일의 인증링크를 유효시간 30분 안에 클릭해 주세요.
            </div>
        </div>
        <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : E-mail 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">아이디/비밀번호 찾기</span>
        </div>
        <!-- 아이디/비밀번호 찾기 : 아이디 찾기 : 아이핀 인증 -->
        <div class="Member mem-Search widthAuto690">
            <div class="user-Txt tx-black">
                아이디/비밀번호를 분실하셨나요?</br>
                원하시는 인증방법을 선택해 주세요.
            </div>
            <ul class="tabs c_both">
                <li class="on"><a href="#none">아이디 찾기</a></li>
                <li><a href="#none">비밀번호 찾기</a></li>
                <li><a href="#none">휴면회원 해제</a></li>
            </ul>
            <ul class="tabs-Certi">
                <li id="tab1">
                    <a href="#none">
                        <div>휴대폰 인증</div>
                    </a>
                </li>
                <li id="tab2">
                    <a href="#none">
                        <div>E-mail 인증</div>
                    </a>
                </li>
                <li id="tab3" class="on">
                    <a href="#none">
                        <div>아이핀 인증</div>
                    </a>
                </li>
            </ul>
            <div class="info-Txt tx-gray">
                가입한 아이핀 ID를 통해 인증합니다.
            </div>
            <div class="search-Btn btnAuto120 h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span>아이핀 인증</span>
                </button>
            </div>
            <div class="notice-Txt tx-gray mt40">
                * 본인인증 시 제공되는 <strong class="tx-blue">정보는 해당 인증기관에서 직접 수집</strong>하며, 인증 이외의 용도로 이용 또는 저장하지 않습니다.
            </div>
        </div>
        <!-- End 아이디/비밀번호 찾기 : 아이디 찾기 : 아이핀 인증 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">아이디 찾기 완료</span>
        </div>
        <!-- 아이디 찾기 완료 -->
        <div class="Member mem-SearchFin widthAuto690">
            <div class="user-Txt tx-black">
                아이디 찾기 본인인증에 성공하셨습니다.</br>
                입력하신 정보와 일치하는 아이디 목록입니다.
            </div>
            <div class="info-Txt info-Txt-Wrap tx-black mt40">
                아아디 노출 (2018-00-00)
            </div>
            <div class="searchfin-Btn mt60">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>로그인</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">비밀번호 찾기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End 아이디 찾기 완료 -->
        <br><br><br>

    </div>
    <!-- End Container -->
@stop