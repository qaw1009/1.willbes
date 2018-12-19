<!-- Header -->
<div id="Header" class="NG c_both">
    <div class="widthAutoFull">
        <div class="Menu-List p_re">
            <button type="button" class="menubar Menu_open">
                <span class="hidden">메뉴바</span>
            </button>
            <div class="logo">
                <a href="{{ front_url('/') }}"><img src="{{ img_url('m/main/logo.png') }}"></a>
            </div>
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
            @if(strpos(strtoupper(current_url()), '/MEMBER/JOIN') === false)
                @if(sess_data('is_login') != true)
                    <li class="Login">
                        <a class="Tit" href="{{ app_url('/member/login/?rtnUrl='.rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')}}" >로그인</a>
                        <span class="row-line">|</span>
                    </li>
                    <li class="joinUs">
                        <a class="Tit" href="{{ app_url('/member/join/?ismobile=1&sitecode='.config_app('SiteCode'), 'www') }}">회원가입</a>
                    </li>
                @else
                    <li class="Login">
                        {{sess_data('mem_name')}}님 로그인중입니다
                        <span class="row-line">|</span>
                    </li>
                    <li class="joinUs">
                        <a class="Tit" href="{{ front_app_url('/member/logout/', 'www') }}">로그아웃</a>
                    </li>
                @endif
            @endif
            </ul>
        </div>
    </div>
</div>