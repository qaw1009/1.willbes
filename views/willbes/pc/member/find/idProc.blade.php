@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="memContainer widthAuto c_both">



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
        <br/><br/><br/><br/><br/><br/>
    </div>
    <!-- End Container -->
@stop