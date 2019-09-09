<!-- Header -->
<div id="Header" class="NG c_both">
    <div class="widthAutoFull">
        <div class="Menu-List p_re">
            <button type="button" class="menubar Menu_open">
                <span class="hidden">메뉴바</span>
            </button>
            <div class="logo">
                <a href="{{front_url('/home/index')}}"><img src="{{img_url('m/main/logo.png')}}" alt="logo"/></a>
            </div>
            {{--@if($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['IsPassSite'] === false)
                <button type="button" class="basket" onclick="document.location='{{front_url('/cart/index')}}';">
                    <span class="hidden">장바구니</span>
                </button>
            @endif--}}
            <button type="button" class="mypage" onclick="document.location='{{front_app_url('/classroom/pass/index','www')}}';">
                <span class="hidden">내강의실</span>
            </button>
        </div>
        <div class="Login-List p_re">
            {{--@if($__cfg['SiteCode'] != config_item('app_intg_site_code'))
                <button type="button" class="myacad" onclick="document.location='{{front_url('/lecture/index/pattern/only')}}';">
                    <span class="hidden">수강신청</span>
                </button>
            @endif--}}
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
                        {{sess_data('mem_name')}}님 로그인중입니다.
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