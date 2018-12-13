@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="Member mem-Login widthAuto460">
            <button type="button" onclick="getDeviceInfo()" class="mem-Btn bg-blue bd-dark-blue">
                <span>디바이스정보</span>
            </button>
            <br><br>
            <button type="button" onclick="getToken()" class="mem-Btn bg-blue bd-dark-blue">
                <span>겟토큰</span>
            </button>
            <br><br>
            <button type="button" onclick="goSample()" class="mem-Btn bg-blue bd-dark-blue">
                <span>샘플페이지</span>
            </button>
        </div>
    </div>
    <!-- End Container -->
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

        function goSample() {
            location.href = "http://dev.starplayer.net/hybrid/willbes_portal.html";
        }

    </script>
@stop