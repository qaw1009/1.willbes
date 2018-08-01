<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9, requiresActiveX=true"/>
    <title>Willbes Player</title>
    <link href="/public/vendor/starplayer/css/starplayer.css?token={{time()}}" rel="stylesheet" type="text/css">
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_config.js?token={{time()}}"></script>
    <script type="text/javascript" src="/public/vendor/starplayer/js/starplayer.js?token={{time()}}"></script>
    <script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_ui.js?token={{time()}}"></script>
    <script type="text/javascript" src="/public/vendor/starplayer/js/speedplaytime.js?token={{time()}}"></script>
</head>
<body onkeydown="onKeyDown(event.keyCode);" style="background-color: white;margin: 0 0 0 0">
<div style="text-align:left">
    <div id="video-container" style="width:690px;height:400px;"></div>
    <div id="controller-container" style="width:690px;height:81px;"></div>
    <div id="controller-container2" class="starplayer_script_ui" style="margin: 0 0 0 0; display:block; position:absolute; top:400px; background-color:black; width:690px; height:81px;">
        <div class="top_area">
            <div class="seekbar_l">
                <div class="currentbar"></div>
                <div class="repeatbar"></div>
                <div class="seekbar_area">
                    <a class="btn_common btn_seek"></a>
                    <a class="btn_common btn_repeatA" style="left:0%;display:none;"></a>
                    <a class="btn_common btn_repeatB" style="left:100%;display:none;"></a>
                </div>
            </div>
            <div class="seekbar_r">
                <a class="btn_common btn_repeat"></a>
                <a class="btn_common btn_fullscreen"></a>
                <a class="btn_common btn_mute"></a>
                <div class="volumebar">
                    <div class="current_volumebar"></div>
                    <div class="volumebar_area">
                        <a class="btn_common btn_volume"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom_area">
            <div class="control_l">
                <div class="basic_controls">
                    <a class="btn_common btn_play"></a>
                    <a class="btn_common btn_stop"></a>
                    <a class="btn_common btn_backward"></a>
                    <a class="btn_common btn_forward"></a>
                </div>
                <div class="control_text_status">준비</div>
                <div class="control_text_time"><span id="text_currentTime">00:00:00</span> / <span id="text_duration">00:00:00</span></div>
            </div>
            <div class="control_r">
                <ul class="speed_controls">
                    <li><a class="btn_common btn_speed06"></a></li>
                    <li><a class="btn_common btn_speed08"></a></li>
                    <li><a class="btn_common btn_speed10 active"></a></li>
                    <li><a class="btn_common btn_speed12"></a></li>
                    <li><a class="btn_common btn_speed14"></a></li>
                    <li><a class="btn_common btn_speed16"></a></li>
                    <li><a class="btn_common btn_speed18"></a></li>
                    <li><a class="btn_common btn_speed20"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
{{$data['url']}}
<script>
    var player;
    var step_;
    var realPlayerTime = null;
    var pcScreenWidth = screen.availWidth;
    var pcScreenHeight = screen.availHeight;

    var playerWidth;
    var playerHeight;

    var playerTitleHeight = 60;
    var controller_container_height	= 80;
    var playerPaddingWidth = 24;

    var video_container_width;
    var video_container_height;
    var controller_container_width;

    var SubFrameTag_height;
    var player_tb_height;

    var moveLeft;
    var moveTop;

    function getStep() { return step_; }

    function setStep(step) { step_ = step; }

    function onMouseDbclick(x, y) { player.setFullscreen(!player.getFullscreen()); }

    function onKeyDown(keycode) {
        switch (keycode) {
            case 13: // ENTER
                player.setFullscreen(true);
                break;
            case 32: // SPACE
                if (player.getPlayState() == PlayState.PLAYING){ player.pause(); }
                else { player.play(); }
                break;
            case 38: // UP
                player.setVolume(player.getVolume() + 0.1);
                break;
            case 40: // DOWN
                player.setVolume(player.getVolume() - 0.1);
                break;
            case 37: // LEFT
                player.backward(getStep());
                break;
            case 39: // RIGHT
                player.forward(getStep());
                break;
            case 190: // >
                player.setRate(player.getRate() + 0.2);
                break;
            case 188: // <
                player.setRate(((player.getRate() - 0.2) < 0.6) ? 0.6 : (player.getRate() - 0.2));
                break;
            case 77: // M
                player.setMute(!player.getMute());
                break;
            case 82: // R
                player.setRepeat(!player.getRepeat());
                break;
            case 90: // z : 원배속
                player.setRate(((player.getRate() - 0.2) < 0.6) ? 0.6 : (player.getRate() - 0.2));
                break;
            case 88: // x : 느리게
                player.setRate(1);
                break;
            case 67: // c : 빠르게
                player.setRate(player.getRate() + 0.2);
                break;
            default:
                return;
        }
        return false;
    }

    function onPlayStateChange(state) {
        switch (state) {
            case PlayState.PLAYING:
                player.setVisible(true);
                break;
            case PlayState.PAUSED:
                break;
            case PlayState.STOPPED:
                player.setVisible(false);
                break;
            case PlayState.BUFFERING_STARTED:
                break;
        }
    }

    function onError(error_code) {
        player.setVisible(true);

        switch (error_code) {
            case StarPlayerError.MULTIPLE_CONNECTIONS:
                alert("아이디 동시 접속!");
                break;
        };
    }


    function click() {
        if ( (event.button==2) || (event.button==3) || (event.keyCode == 93) ) {
            return false;
        }
        else {
            if( event.ctrlKey ) {
                return false;
            }
        }
    }

    document.onmousedown = click;
    document.onkeydown = click;

    var ratio = {{$data['ratio']}};

    function getScreenSize() {
        if (pcScreenWidth <= 800) {
            playerWidth = 640;playerHeight = 300;
            SubFrameTag_width = 0;
        } else {
            playerWidth = parseInt(pcScreenWidth * 0.8);
            playerHeight = parseInt((pcScreenWidth-334) * 9 / ratio) + controller_container_height + playerTitleHeight;
            SubFrameTag_width = 310;
        }

        if ( pcScreenWidth > 1600 && playerHeight > pcScreenHeight - 50 ) {
            playerWidth = parseInt(pcScreenWidth * 0.7);
            playerHeight = parseInt((pcScreenWidth-334) * 9 / ratio) + controller_container_height + playerTitleHeight;
            SubFrameTag_width = 310;
        }
    }


    function setScreenReSizeVal() {
        video_container_width = playerWidth - SubFrameTag_width - playerPaddingWidth ;
        video_container_height = parseInt ( video_container_width * 9 / ratio );
        controller_container_width = video_container_width;
        SubFrameTag_height = video_container_height + 130;
        player_tb_height = video_container_height - 30;

        moveLeft = (video_container_width + SubFrameTag_width + playerPaddingWidth - SubFrameTag_width);
        moveTop = (video_container_height + controller_container_height+130);
        moveLeft = ( ( screen.availWidth - 10 ) - moveLeft) / 2;
        moveTop = ( ( screen.availHeight - 30 ) - moveTop) / 2;
    }


    function screenResize() {
        window.moveTo(moveLeft, moveTop);
        window.resizeTo(video_container_width+SubFrameTag_width+20 +15 -SubFrameTag_width, video_container_height+controller_container_height+playerTitleHeight+80);

        $("#video-container").attr("style", "height:" + video_container_height + "px; width:" + video_container_width + "px;");
        $("#controller-container").attr("style", "height:" + controller_container_height + "px; width:" + controller_container_width + "px;");
        $("#controller-container2").attr("style", "position:absolute;display:block;left:0px;height:" + controller_container_height + "px; width:" + controller_container_width + "px;top:" + parseInt(video_container_height +0) + "px;");
        $("#SubFrameTag").attr("style", "height:" + SubFrameTag_height + "px; width:" + SubFrameTag_width + "px;");
    }

    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
            return false;
        }
    });

    $(document).on("contextmenu", function (e) {
        e.preventDefault();
    });

    $(document).ready(function (){

        getScreenSize();
        setScreenReSizeVal();
        screenResize();

        var checkStatus;
        var checkCrome = true;
        var element = new Image();

        try {
            element.__defineGetter__('id', function() {
                checkStatus = 'on';
            });
        } catch (e) {
            checkCrome = false;
        } finally {

        }

        var interVal = setInterval(function () {
            if (checkCrome) {
                checkStatus = 'off';
                console.log(element);
                console.clear();
                if (checkStatus=="on") {
                    player.stop();
                    clearInterval(interVal);
                    document.write ("디버깅 창이 활성 화 되어 있습니다.<br>디버깅 창 종료 후 다시 이용하여 주시기 바랍니다.");
                }
            }
            else {
                var isIeDebugging = !!window.__IE_DEVTOOLBAR_CONSOLE_COMMAND_LINE || ('__BROWSERTOOLS_CONSOLE_SAFEFUNC' in window);
                if (isIeDebugging== true) {
                    player.stop();
                    clearInterval(interVal);
                    document.write ("디버깅 창이 활성 화 되어 있습니다.<br>디버깅 창 종료 후 다시 이용하여 주시기 바랍니다.");
                }
            }
        }, 500);

        var startPosition = {{$data['startPosition']}};
        var config = {
            userId: "test",
            id: "starplayer",
            videoContainer: "video-container",
            controllerContainer: "controller-container",
            controllerContainerHtml5: "controller-container2",
            controllerUrl: "/public/vendor/starplayer/bin/axissoft3.bin",
            controller64Url: "/public/vendor/starplayer/bin/axissoft3_x64.bin",
            visible: true,
            auto_progressive_download: true,
            dualMonitor: true,
            watermarkText: "test",
            watermarkTextColor: "#308ECE92",
            watermarkTextSize: "2%",
            watermarkHorzAlign: WatermarkAlign.RANDOM,
            watermarkVertAlign: WatermarkAlign.BOTTOM,
            watermarkInterval: "60",
            watermarkShowInterval: "1",
            blockMessenger: false,
            blockVirtualMachine: false
        };
        var media = {
            url: "{{$data['url']}}",
            @if($data['isIntro'] === true)
            intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",
            @endif
            autoPlay: true,
            startTime: startPosition
        };

        player = new StarPlayer(config, media);
        player.onKeyDown = onKeyDown;
        player.onMouseDbclick = onMouseDbclick;
        player.onPlayStateChange = onPlayStateChange;
        player.onError = onError;
        initScriptUI(player);

        realPlayerTime = new SpeedPlayTime(player);
    });
</script>
</body>
</html>
