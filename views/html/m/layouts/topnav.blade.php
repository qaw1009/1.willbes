<!-- Header -->
<div id="Header" class="NG c_both">
    <div class="widthAutoFull">
        <div class="Menu-List p_re">
            <button type="button" class="menubar Menu_open">
                <span class="hidden">메뉴바</span>
            </button>
            <div class="logo">
                <a href="{{ site_url('/home/html/m/sample') }}"><img src="{{ img_url('m/main/logo.png') }}"></a>
            </div>
            <button type="button" class="basket">
                <span class="hidden">장바구니</span>
            </button>
            <button type="button" class="mypage">
                <span class="hidden">내강의실</span>
            </button>
        </div>
        <div class="Login-List p_re">
            <!-- 2차 오픈메뉴 -->
            <button type="button" class="myacad">
                <span class="hidden">수강신청</span>
            </button>
            
            <ul class="myLog tx-black NG">
                <li class="Login">
                    <a class="Tit" href="#none" onclick="openWin('LoginForm')">로그인</a>
                    <span class="row-line">|</span>
                </li>
                <li class="joinUs">
                    <a class="Tit" href="#none">회원가입</a>
                </li>
            </ul>
        </div>
    </div>
</div>