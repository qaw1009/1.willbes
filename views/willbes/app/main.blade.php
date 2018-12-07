@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        윌비스 하이브리드앱 메인페이지입니다.
        <br>
        {{$_SERVER['HTTP_USER_AGENT']}}

        <a href="http://dev.starplayer.net/hybrid/willbes_portal.html">테스트페이지</a>

        <body>
        <h1>StarPlayer Bridge Demo</h1>
        <script>
            var urls = [
                "http://www.axissoft.co.kr/contents/252782_ehd.mp4",
                "http://starplayer.dl.cdn.cloudn.co.kr/etoos/L52961_00_ehd_org.mp4",
                "http://starplayer.dl.cdn.cloudn.co.kr/sample.mp4",
                "http://m.starplayer.net/kim.mp4",
                "http://m.starplayer.net/dev/22_astroboy-tsr2_h1080p.mp4"
            ];

            var intros = [
                "http://m.starplayer.net/sample.mp4",
                "http://m.starplayer.net/sample.mp4",
                "http://m.starplayer.net/sample.mp4"
            ];

            var category = window.btoa(encodeURIComponent("New2018 상위 1%만 아는 비밀"));

            var thumbnail = "http://dev.starplayer.net/hybrid/testthumb.png";
            var app = null;


            window.onerror = function(err) {
                log('window.onerror: ' + err)
            }

            var uniqueId = 1;
            function log(message) {
                var log = document.getElementById('log')
                var el = document.createElement('div')
                el.className = 'logLine'
                el.innerHTML = uniqueId++ + '. ' + message + '<br/>'
                if (log.children.length) {
                    log.insertBefore(el, log.children[0])
                }
                else {
                    log.appendChild(el)
                }
            }

            function onDownloadEvent(url, status, sofarBytes, totalBytes) {
            }

            function onInitEvent() {
            }

            function onPlayerClosedEvent(url, contentId, currentPosition) {
                //alert(url + "/" + contentId + "/" + currentPosition);
            }

            window.onload = function() {
                app = new StarPlayerBridge();
                app.bindEvent("downloadEvent", onDownloadEvent);
                app.bindEvent("initEvent", onInitEvent);
                app.bindEvent("playerClosedEvent", onPlayerClosedEvent);

            }

            function multiDownload(title, desc, teacher) {
                var media1 = {
                    "category":category,
                    "thumbnail":thumbnail,
                    "url":"http://m.starplayer.net/sample.mp4",
                    "cc":"http://m.starplayer.net/dev/kr.smi",
                    "title":window.btoa(encodeURIComponent(title)),
                    "desc":window.btoa(encodeURIComponent(desc)),
                    "teacher":window.btoa(encodeURIComponent(teacher)),
                    "expiry_date":"2030-12-22",
                    "content_id":"test01/test02/test03/test04"
                };
                var media2 = {
                    "category":category,
                    "thumbnail":thumbnail,
                    "url":"http://starplayer.dl.cdn.cloudn.co.kr/test/etoos/252826_ehd.mp4",
                    "cc":"http://m.starplayer.net/dev/kr.smi",
                    "title":window.btoa(encodeURIComponent("New2017 상위 2%만 아는 비밀")),
                    "desc":window.btoa(encodeURIComponent(desc)),
                    "teacher":window.btoa(encodeURIComponent(teacher)),
                    "expiry_date":"2030-12-22",
                    "content_id":"test05/test06/test07/test08"
                };
                var mediaArray = [media1, media2];
                app.multiDownload(mediaArray);
            }

            /* 로그인 토큰 set */
            function setToken() {
                app.login(jwt);
            }

            /* 로그인 토큰 remove */
            function removeToken() {
                app.logout();
            }

            /* 로그인 토큰 get */
            function getToken() {
                app.getToken(function(token) {
                    $("#result").text(token);
                });
            }

            /* 디바이스 정보 get */
            function getDeviceInfo() {
                app.getDeviceInfo(function(id, name, model){
                    $("#result").html("id : "+id+"<br/>name : "+name+"<br/>model : "+model);
                });
            }

            /* 다운로드함 열기 */
            function openDownloadBox() {
                app.openDownloadBox();
            }

            /* 설정 열기 */
            function openSettingBox() {
                app.openSettingBox();
            }


            //스트리밍 재생
            function onDemandPlay(url, content_id, position) {
                var media = {
                    "url":url,
                    "cc":"http://m.starplayer.net/dev/kr.smi",
                    "position":position,
                    "tracker":"30:200,300:400",
                    "title":window.btoa(encodeURIComponent("[액시스소프트] 이투스 테스트!!")),
                    "content_id":content_id,
                    "subpage":"http://dev.starplayer.net/hybrid/willbes_portal.html"
                };
                app.streaming(media);
            }

            // 영상 특정 구간만 재생
            function onDemandPlay2(url, content_id, begin, end) {
                var media = {
                    "url":url,
                    "cc":"http://m.starplayer.net/dev/kr.smi",
                    "position":0,
                    "title":"[액시스소프트] 이투스 테스트!!",
                    "content_id":content_id,
                    "begin":begin,
                    "end":end,
                    "subpage":"http://dev.starplayer.net/hybrid/willbes.html"
                };
                app.streaming(media);
            }

            function showDeviceId() {
                app.getDeviceId(function(id){
                    alert(id);
                });
            }

            function showToken() {
                app.getToken(function(token) {
                    alert(token);
                });
            }

        </script>
        <!-- 	<h3>로그인</h3> -->
        <button onclick="javascript:setToken();">로그인</button>
        <br>

        <!-- <h3>로그아웃</h3> -->
        <button onclick="javascript:removeToken();">로그아웃</button>
        <br>

        <!-- <h3>토큰정보 받기</h3> -->
        <button onclick="javascript:getToken();">토큰정보 받기</button>
        <br>

        <!-- <h3>디바이스ID 값 받기</h3> -->
        <button onclick="javascript:showDeviceId();">디바이스ID 값 받기</button>
        <br>

        <!-- <h3>디바이스정보 값 받기</h3> -->
        <button onclick="javascript:getDeviceInfo();">디바이스정보 값 받기</button>
        <br>


        <!-- <h3>1. 강의 재생</h3> -->
        <button onclick="javascript:onDemandPlay(urls[0], &quot;starplayer_value&quot;, 0);">스트리밍 재생</button>
        <br>
        <button onclick="javascript:onDemandPlay2(urls[0], &quot;starplayer_value&quot;, 0, 300, 600);">스트리밍 특정 구간 재생</button>

        <br>
        <!-- <h3>download</h3> -->
        <button onclick="javascript:multiDownload(&quot;달려라 액시스소프트 %!@#A&quot;, &quot;글로벌 기업으로&quot;, &quot;박경근&quot;);">멀티다운로드</button>
        <br>
        <br>
        <h3>etc.</h3>
        <br />
        <button onclick='javascript:window.open("https://www.w3schools.com", "_self");'>test window.open</button>

        <div id="buttons"></div> <div id="log"></div>
        <h3>토큰 값</h3>
        <p id="jwt"></p>
        <div id="result" class="text_01"></div>


        </body>
    </div>
    <!-- End Container -->
@stop