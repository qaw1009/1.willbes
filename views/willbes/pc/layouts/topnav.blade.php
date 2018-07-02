<!-- Header -->
<div id="Header" class="NSK c_both">
    <div class="widthAuto">
        <div class="loginDepth p_re">
            <ul class="myLog">
                <li class="Login">
                    <a class="Tit" href="#none" onclick="openWin('LoginForm')">로그인</a>
                </li>
                <li class="joinUs dropdown">
                    <a class="Tit" href="/member/join">회원가입<span class="arrow-Btn">></span></a>
                    <div class="drop-Box joinUs-Box">
                        <ul>
                            <li>
                                <a href="/member/findid">아이디찾기</a>
                            </li>
                            <li>
                                <a href="/member/findpwd">비밀번호 찾기</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="myCart">
                    <a class="Tit" href="#none">장바구니</a>
                </li>
                <li class="myPage dropdown">
                    <a class="Tit" href="#none">내강의실<span class="arrow-Btn">></span></a>
                    <div class="drop-Box myPage-Box">
                        <ul>
                            <li>
                                <a href="#none">수강중인 강의</a>
                            </li>
                            <li>
                                <a href="#none">PASS 강의</a>
                            </li>
                            <li>
                                <a href="#none">배송조회</a>
                            </li>
                            <li>
                                <a href="#none">새쪽지 <span class="num-New">99+</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="csCenter">
                    <a class="Tit" href="#none">고객센터</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- LoginForm -->
<div id="LoginForm" class="Layer-Box" style="display: none">
    <a class="closeBtn" href="#none" onclick="closeWin('LoginForm')">
        <img src="{{ img_url('gnb/close.png') }}">
    </a>
    <div class="Layer-Tit tx-dark-black NSK">
        윌비스 통합 <span class="tx-dark-blue">로그인</span>
    </div>
    <div class="Layer-Login GM widthAuto320">
        <div class="inputBox p_re">
            <input type="text" id="USER_ID" name="USER_ID" class="iptId" placeholder="ID" maxlength="30">
        </div>
        <div class="inputBox p_re">
            <input type="password" id="USER_PWD" name="USER_PWD" class="iptPwd" placeholder="비밀번호" maxlength="30">
        </div>
        <div class="tx-red" style="display: block;">아이디 또는 비밀번호가 일치하지 않습니다.</div>
        <div class="chkBox-Save">
            <input type="checkbox" id="USER_ID_SAVE" name="USER_ID_SAVE" class="iptSave">
            <label for="USER_ID_SAVE" class="labelSave tx-gray">아이디 저장</label>
        </div>
        <div class="Layer-Btn NSK widthAuto320">
            <button type="submit" onclick="" class="log-Btn bg-blue bd-dark-blue">
                <span>로그인</span>
            </button>
        </div>
        <ul class="btn-Txt tx-dark-black">
            <li>
                <span><a class="tx-dark-black" href="/Member/FindID">아이디</a>/<a class="tx-dark-black" href="/Member/FindPWD">비밀번호찾기</a><span class="row-line">|</span></span>
            </li>
            <li>
                <span><a class="tx-dark-blue" href="/Member/Join">회원가입</a></span>
            </li>
        </ul>
    </div>
</div>