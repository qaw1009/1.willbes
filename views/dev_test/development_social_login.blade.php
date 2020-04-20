<!DOCTYPE html>
<html>
<head>
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
{{--    <script src="/public/vendor/bootstrap/v.3.3.7/js/bootstrap.min.js"></script>--}}

    {{-- 네이버 --}}
    <script src="/public/vendor/socialLogin/naver/naveridlogin_js_sdk_2.0.0.js"></script>

    {{-- 카카오 --}}

    {{-- 페이스북 --}}

    {{-- 구글 --}}

</head>
<body>
    <style type="text/css">
        {{--
        --}}
    </style>

    <div class="jumbotron">
        <h1>SAMPLE PAGE</h1>
        <p class="lead">네이버 아이디로 로그인 Javascript 샘플 페이지.<br> 간단한 적용 예제를 포함합니다.</p>
        <!-- (1) 버튼 event 처리를 위하여 id를 지정 id=loginButton -->
        <p></p>
            <div id="naverIdLogin">
                <a id="naverIdLogin_loginButton" href="http://static.nid.naver.com/oauth/sample/javascript_sample.html#">
                    <img src="" height="60">
                </a>
            </div>
        <p></p>
    </div>

    <script>
        var naverLogin = new naver.LoginWithNaverId(
            {
                clientId: "KfwZkPOqgdTMK5oPqpet",
                //callbackUrl: "http://" + window.location.hostname + ((location.port==""||location.port==undefined)?"":":" + location.port) + "/oauth/sample/callback.html",
                callbackUrl: "https://www.dev.willbes.net/home/dev_test/development_social_login_result",
                isPopup: false,
                loginButton: {color: "green", type: 3, height: 60}
            }
        );
        /* (4) 네아로 로그인 정보를 초기화하기 위하여 init을 호출 */
        naverLogin.init();

        /* (4-1) 임의의 링크를 설정해줄 필요가 있는 경우 */
        $("#gnbLogin").attr("href", naverLogin.generateAuthorizeUrl());

        /* (5) 현재 로그인 상태를 확인 */
        window.addEventListener('load', function () {
            naverLogin.getLoginStatus(function (status) {
                if (status) {
                    /* (6) 로그인 상태가 "true" 인 경우 로그인 버튼을 없애고 사용자 정보를 출력합니다. */
                    setLoginStatus();
                }
            });
        });

        /* (6) 로그인 상태가 "true" 인 경우 로그인 버튼을 없애고 사용자 정보를 출력합니다. */
        function setLoginStatus() {
            var profileImage = naverLogin.user.getProfileImage();
            var nickName = naverLogin.user.getNickName();
            $("#naverIdLogin_loginButton").html('<br><br><img src="' + profileImage + '" height=50 /> <p>' + nickName + '님 반갑습니다.</p>');
            $("#gnbLogin").html("Logout");
            $("#gnbLogin").attr("href", "#");
            /* (7) 로그아웃 버튼을 설정하고 동작을 정의합니다. */
            $("#gnbLogin").click(function () {
                naverLogin.logout();
                location.reload();
            });
        }
    </script>
</body>

</html>
