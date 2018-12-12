@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        하이브리드 앱은 기본적으로 로그인 페이지
        <br />
        <br />
        agent : {{$_SERVER['HTTP_USER_AGENT']}}
        <br />
        <br />
        token : {{$token}}
        <button onclick='javascript:setToken();'>로그인</button>
        <br />
        <br />
        <!-- <h3>로그아웃</h3> -->
        <button onclick='javascript:removeToken();'>로그아웃</button>
        <br />
        <br />
        <!-- <h3>토큰정보 받기</h3> -->
        <button onclick='javascript:getToken();'>토큰정보 받기</button>
        <br />
        <br />
        <!-- <h3>디바이스ID 값 받기</h3> -->
        <button onclick='javascript:showDeviceId();'>디바이스ID 값 받기</button>
        <br />
        <br />
        <!-- <h3>디바이스정보 값 받기</h3> -->
        <button onclick='javascript:getDeviceInfo();'>디바이스정보 값 받기</button>
    </div>
    <!-- End Container -->
@stop