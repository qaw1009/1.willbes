@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        하이브리드 앱 초기화면
        <br><br>
        <div class="Member mem-Login widthAuto460">
            <button type="button" onclick="getDeviceInfo()" class="mem-Btn bg-blue bd-dark-blue">
                <span>디바이스정보</span>
            </button>
            <br><br>
            <button type="button" onclick="getDeviceId()" class="mem-Btn bg-blue bd-dark-blue">
                <span>디바이스아이디</span>
            </button>
            <br><br>
            <button type="button" onclick="getToken()" class="mem-Btn bg-blue bd-dark-blue">
                <span>겟토큰</span>
            </button>
            <br><br>
            <button type="button" onclick="location.href='http://dev.starplayer.net/hybrid/willbes.html';" class="mem-Btn bg-blue bd-dark-blue">
                <span>테스트 페이지</span>
            </button>
            <br><br>
            <br><br>
            token : {{$token}}
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.bindEvent("initEvent", onInitEvent);
        });

        function onInitEvent() {
            app.getToken(function(token) {
                if($.trim(token) == ""){

                } else {

                }
            });
        }

        function getDeviceInfo() {
            app.getDeviceInfo(function(id, name, model){
                alert("id : "+id+" name : "+name+" model : "+model);
            });
        }

        function getToken() {
            app.getToken(function(token) {
                alert(token);
            });
        }

        function getDeviceId() {
            app.getDeviceId(function(id){
                alert(id);
            });
        }
    </script>
@stop