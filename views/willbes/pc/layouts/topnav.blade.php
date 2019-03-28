<!-- Header -->
<div id="Header" class="NGR c_both">
    <div class="widthAuto">
        <div class="topnavTxt {{ SUB_DOMAIN }}">내 인생 모든 시험, <span class="tx-color">윌비스</span>로 합격하다!</div>
        <div class="loginDepth p_re">
            <ul class="myLog">
                @if(strpos(strtoupper(current_url()), '/MEMBER/JOIN') === false)
                    @if(sess_data('is_login') != true)
                        @if(strpos(strtoupper(current_url()), '/MEMBER/LOGIN') === false)
                            <li class="Login">
                                <a class="Tit" href="{{ app_url('/member/login/?rtnUrl='.rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')}}" >로그인</a>
                            </li>
                        @endif
                        <li class="joinUs dropdown">
                            <a class="Tit" href="{{ app_url('/member/join/?ismobile=0&sitecode='.config_app('SiteCode'), 'www') }}">회원가입<span class="arrow-Btn">></span></a>
                            <div class="drop-Box joinUs-Box">
                                <ul>
                                    <li>
                                        <a href="{{ app_url('/member/find/id/', 'www') }}">아이디찾기</a>
                                    </li>
                                    <li>
                                        <a href="{{ app_url('/member/find/pwd/', 'www') }}">비밀번호 찾기</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="Login">
                            {{sess_data('mem_name')}}님
                        </li>
                        <!--
                        <li class="ml20">
                            <a href="{{ app_url('/classroom/message/index', 'www') }}"><img src="{{ img_url('gnb/icon_memo.png') }}"> <span class="num-New">2</span></a>
                        </li>
                        -->
                        <li class="joinUs">
                            <a class="Tit" href="{{ app_url('/member/logout/', 'www') }}">로그아웃</a>
                        </li>
                    @endif
                    @if($__cfg['SiteCode'] != config_item('app_intg_site_code') && $__cfg['IsPassSite'] === false)
                        <li class="myCart">
                            <a class="Tit" href="{{ site_url('/cart/index') }}">장바구니</a>
                        </li>
                    @endif
                    <li class="myPage dropdown">
                        <a class="Tit" href="{{ app_url('/classroom/home/index', 'www') }}">내강의실<span class="arrow-Btn">></span></a>
                        <div class="drop-Box myPage-Box">
                            <ul>
                                <li>
                                    <a href="{{ app_url('/classroom/on/list/ongoing', 'www') }}">수강중인 강의</a>
                                </li>
                                <li>
                                    <a href="{{ app_url('/classroom/pass/index', 'www') }}">PASS 강의</a>
                                </li>
                                <li>
                                    <a href="{{ app_url('/classroom/order/index', 'www') }}">주문/배송조회</a>
                                </li>
                                <li>
                                    <a href="{{ app_url('/classroom/message/index', 'www') }}">새쪽지 <!--
                                    <span class="num-New">99+</span>
                                    //--></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                <li class="csCenter">
                    <a class="Tit" href="{{ front_url('/support/main') }}">고객센터</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@if(sess_data('is_login') != true)
    <!-- LoginForm -->
    <div id="LoginForm" class="Layer-Box" style="display: none">
        <form method="post" id="login_layer" name="login_layer" onsubmit=" return false; " >
            {!! csrf_field() !!}
            <input type="hidden" name="rtnUrl" value=" " >
            <a class="closeBtn" href="#none" onclick="closeWin('LoginForm')">
                <img src="{{ img_url('gnb/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NSK">
                윌비스 통합 <span class="tx-dark-blue">로그인</span>
            </div>
            <div class="Layer-Login GM widthAuto320">
                <div class="inputBox p_re">
                    <input type="text" id="layer_id" name="id" class="iptId" placeholder="아이디" maxlength="30" title="아이디">
                </div>
                <div class="inputBox p_re">
                    <input type="password" id="layer_pwd" name="pwd" class="iptPwd" placeholder="비밀번호" maxlength="30" title="비밀번호">
                </div>
                <div class="tx-red" style="display: block;" id="login_msg_layer"></div>
                <div class="chkBox-Save">
                    <input type="checkbox" id="id_save" name="id_save" class="iptSave">
                    <label for="id_save" class="labelSave tx-gray">아이디 저장</label>
                </div>
                <div class="Layer-Btn NSK widthAuto320">
                    <button type="submit" class="log-Btn bg-blue bd-dark-blue">
                        <span>로그인</span>
                    </button>
                </div>
                <ul class="btn-Txt tx-dark-black">
                    <li>
                        <span><a class="tx-dark-black" href="{{ app_url('/member/find/id/', 'www') }}">아이디</a>/<a class="tx-dark-black" href="{{ app_url('/member/find/password', 'www') }}">비밀번호찾기</a><span class="row-line">|</span></span>
                    </li>
                    <li>
                        <span><a class="tx-dark-blue" href="{{ app_url('/member/join', 'www') }}">회원가입</a></span>
                    </li>
                </ul>
            </div>
        </form>
    </div>

@endif
