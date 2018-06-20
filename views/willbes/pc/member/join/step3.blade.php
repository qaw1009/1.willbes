@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 회원가입완료 -->
        <div class="Member mem-CombineFin widthAuto690">
            <ul class="tabs-Step mb60">
                <li>본인인증</li>
                <li>약관동의/정보입력</li>
                <li class="on">회원가입완료</li>
            </ul>
            <div class="user-Txt tx-black">
                <span class="tx-blue">홍길동</span>님, <strong>윌비스 통합 회원 가입을 환영합니다.</strong></br>
                <span class="tx-blue">아이디 willbes</span>로 모든 윌비스 서비스를 이용하실 수 있습니다.
            </div>
            <img class="mt70" src="/public/img/front/login/willbes_welcome.jpg">
            <div class="info-Txt info-Txt-Wrap tx-black bg-none mt60">
                <strong class="tx-gray">시작할 서비스를 선택해 주세요</strong>
                <select id="site" name="site" title="선택안함" class="seleSite">
                    <option selected="selected">선택안함</option>
                    <option value="공무원">공무원</option>
                    <option value="경찰">경찰</option>
                    <option value="임용">임용</option>
                </select>
            </div>
            <button type="submit" onclick="" class="mem-Btn h36 mt70 bg-blue bd-dark-blue">
                <span>시작하기</span>
            </button>
        </div>
        <!-- End 통합회원가입 : 회원가입완료 -->


        <br/><br/><br/>


        <div class="mem-Tit">
            <img src="/public/img/front/login/logo.gif">
            <span class="tx-blue">통합회원가입</span>
        </div>
        <!-- 통합회원가입 : 기가입자 -->
        <div class="Member mem-CombineFin widthAuto690">
            <ul class="tabs-Step mb60">
                <li class="on">본인인증</li>
                <li>약관동의/정보입력</li>
                <li>회원가입완료</li>
            </ul>
            <div class="user-Txt tx-black">
                <strong class="tx-blue">홍길동</strong>회원님은 이미 윌비스 회원으로 등록되어 있습니다.</br>
                회원 아이디로 로그인하시거나, 비밀번호 찾기를 진행해 주세요.
            </div>
            <div class="info-Txt info-Txt-Wrap tx-black mt40">
                <strong class="tx-blue">willbes****</strong> (2018-00-00)
            </div>
            <div class="combinefin-Btn mt60">
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
        <!-- End 통합회원가입 : 기가입자 -->
        <br/><br/><br/>

    </div>
    <!-- End Container -->
@stop