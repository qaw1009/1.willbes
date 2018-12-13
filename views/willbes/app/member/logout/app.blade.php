@extends('willbes.app.layouts.master')

@section('content')
    <div id="Container" class="Container NG c_both">
        로그아웃 처리 페이지
        <div class="Member mem-Login widthAuto460">
            <button type="button" onclick="getDeviceInfo()" class="mem-Btn bg-blue bd-dark-blue">
                <span>디바이스정보</span>
            </button>
            <br><br>
            <button type="button" onclick="logout()" class="mem-Btn bg-blue bd-dark-blue">
                <span>로그아웃</span>
            </button>
            <br><br>
            <button type="button" onclick="getToken()" class="mem-Btn bg-blue bd-dark-blue">
                <span>겟토큰</span>
            </button>
        </div>
    </div>
    <script type="text/javascript">
        var app = null;
        $(document).ready(function() {
            app = new StarPlayerBridge();
        });

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

        function logout(){
            app.logout();
        }
    </script>
@stop