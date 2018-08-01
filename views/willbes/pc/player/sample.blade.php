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
<body>
<div style="text-align:left">
    <div id="video-container" style="width:690px;height:390px;"></div>
    <div id="controller-container" style="width:690px;height:81px;"></div>
    <!-- Start HTML5 UI -->
    <div id="controller-container2" class="starplayer_script_ui" style="margin: 0 0 0 0;width:690px;height:81px;background-color:black;top:0px;">
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
    <!-- End HTML5 UI -->
</div>
<script>
    var player;
    var step_;
    var realPlayerTime = null;

    function getStep() { return step_; }
    function setStep(step) { step_ = step; }
    function onMouseDbclick(x, y) { player.setFullscreen(!player.getFullscreen()); }

    $(document).ready(function (){
        var startPosition = 0;

        var config = {
            userId: "test",
            id: "starplayer",
            videoContainer: "video-container",
            controllerContainer: "controller-container",
            controllerContainerHtml5: "controller-container2",
            controllerUrl: "axissoft3.bin",
            controller64Url: "axissoft3_x64.bin",
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
            @if($data['isIntro'] === true)intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",@endif
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

    function onKeyDown(keycode) {
        var temp;

        switch (keycode) {
            case 13: // ENTER
                player.setFullscreen(true);
                break;
            case 32: // SPACE
                if (player.getPlayState() == PlayState.PLAYING)
                    player.pause();
                else
                    player.play();
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
</script>
</body>
</html>
