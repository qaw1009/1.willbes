@extends('willbes.pc.layouts.player_master')

@section('script')
    <script type="text/javascript">
        var globalStudiedTime = 0;
        var globalStudiedRealTime = 0;
        var ajaxErrorCount = 0;

        $(document).ready(function (){
            setScreenReSizeVal();
            screenResize();
            fnDefense();

            $("#subframe").prop('src', '/player/Curriculum/?o={{$data['orderidx']}}&p={{$data['prodcode']}}&sp={{$data['prodcodesub']}}&op={{$data['orderprodidx']}}&l={{$data['lecidx']}}&u={{$data['unitidx']}}&q={{$data['quility']}}');

            var config = {
                userId: "{{$data['memid']}}",
                id: "starplayer",
                videoContainer: "video-container",
                controllerContainer: "controller-container",
                controllerContainerHtml5: "controller-container2",
                controllerUrl: "/public/vendor/starplayer/bin/axissoft3.bin",
                controller64Url: "/public/vendor/starplayer/bin/axissoft3_x64.bin",
                visible: true,
                auto_progressive_download: true,
                dualMonitor: true,
                watermarkText: "{{$data['memid']}}",
                watermarkTextColor: "#308ECE92",
                watermarkTextSize: "2%",
                watermarkHorzAlign: WatermarkAlign.RANDOM,
                watermarkVertAlign: WatermarkAlign.BOTTOM,
                watermarkInterval: "1800",
                watermarkShowInterval: "1",
                blockMessenger: false,
                blockVirtualMachine: true
            };

            var media = {
                url: "{!! $data['url'] !!}",
                @if($data['isIntro'] === true)
                intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",
                @endif
                autoPlay: true,
                startTime: startPosition
            };

            fnStartPlayer(config, media);

            realPlayerTime = new Speedplaytime(player);

            setTimeout(fnSendLog, 10000);
        });


        function fnCheckPID()
        {
            var url = "/player/checkDevicePC/";
            var data = "o={{$data['orderidx']}}&op={{$data['orderprodidx']}}&p={{$data['prodcode']}}&m={{$data['memidx']}}&di=" + player.getPID();

            sendAjax(url,
                data,
                function(ret){ /* 정상 기기 */ },
                function(ret, status){
                    player.stop();
                    alert(ret.ret_msg);
                }, false, 'GET', 'json');
        }


        function fnSendLog()
        {
            var url = "/player/log/";
            var data = "o={{$data['orderidx']}}&op={{$data['orderprodidx']}}&p={{$data['prodcode']}}&sp={{$data['prodcodesub']}}&u={{$data['unitidx']}}&m={{$data['memidx']}}&l={{$data['logidx']}}&w={{$data['lecidx']}}";

            var playedTime = Math.floor(realPlayerTime.getTime()); // 2배속으로 1분 수강시 2분
            var playedRealTime = Math.floor(player.getPlayTime()); // 2배속으로 1분 수강시 1분
            var currentPosition = Math.floor(player.getCurrentPosition());

            data = data + "&st=" + Math.floor(playedTime - globalStudiedTime);
            data = data + "&rst=" + Math.floor(playedRealTime - globalStudiedRealTime);
            data = data + "&pos=" + currentPosition;
            data = data + "&di=" + player.getPID();

            if(ajaxErrorCount > 10){
                player.stop();
                alert("인터넷오류로 강의가 중단되었습니다.");
            }

            $.ajax({
                type: "GET",
                url: url,
                data: data,
                cache: false,
                dataType: "text",
                error: function (request, status, error) {
                    ajaxErrorCount++;
                    setTimeout(fnSendLog, 1000 * 5);
                },
                success: function (response) {
                    if(response == "ERROR") {
                        player.stop();
                        alert("인터넷오류로 강의가 중단되었습니다.");
                    }
                    else if(response == "OK") {
                        globalStudiedTime = playedTime;
                        globalStudiedRealTime = playedRealTime;
                        ajaxErrorCount = 0;
                        setTimeout(fnSendLog, 1000 * 60);
                    }
                    else {
                        ajaxErrorCount++;
                        setTimeout(fnSendLog, 1000 * 5);
                    }
                }
            });
        }

        if (window.attachEvent) {
            /*IE and Opera*/
            window.attachEvent("onunload", function() {
                fnSendLog();
                window.opener.location.reload();
            });
        }
        else if (document.addEventListener) {
            /*Chrome, FireFox*/
            window.onbeforeunload = function() {
                fnSendLog();
                window.opener.location.reload();
            };
            /*IE 6, Mobile Safari, Chrome Mobile*/
            window.addEventListener("unload", function() {
                fnSendLog();
                window.opener.location.reload();
            }, false);
        }
        else {
            /*etc*/
            document.addEventListener("unload", function() {
                fnSendLog();
                window.opener.location.reload();
            }, false);
        }

    </script>
@stop