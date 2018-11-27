@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">

        <div class="mem-Tit">
            <img src="{{ img_url('login/logo.gif') }}">
            <span class="tx-blue">검색실패</span>
        </div>
        <!-- 아이디 찾기 완료 -->
        <div class="Member mem-SearchFin widthAuto690">
            <div class="user-Txt tx-black">
                입력하신 정보와 일치하는 정보가 없습니다.<br/>
                정보를 확인후 다시 시도해보시거나 회원가입을 진행해주십시요.
            </div>
            <div class="searchfin-Btn mt60">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="button" onclick="location.replace('{{front_app_url('/member/join/', 'www')}}');" class="mem-Btn bg-blue bd-dark-blue">
                            <span>회원가입</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="button" onclick="location.replace('{{front_app_url('/member/find/id/', 'www')}}');" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">아이디/비밀번호 찾기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End 아이디 찾기 완료 -->
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop