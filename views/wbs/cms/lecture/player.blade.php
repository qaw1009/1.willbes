<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9, requiresActiveX=true"/>
    <title>Willbes Player</title>
    <!-- Custom Theme Style -->
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/css/willbes/style.css?ver={{time()}}" rel="stylesheet">

    <link href="/public/vendor/starplayer/css/starplayer.css?token={{time()}}" rel="stylesheet" type="text/css">
</head>
<body onkeydown="onKeyDown(event.keyCode);" style="background-color: black;margin: 0 0 0 0">
<div class="videoPopup">
    <div class="view p_re">
        <div class="viewList">
            <span class="Tit NGR">{{$title}}</span>
        </div>
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
    <iframe id="subframe" frameborder="0" scrolling="no" width="400px" height="500px" src=""></iframe>
</div>
<script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
{{-- <script type="text/javascript" src="/public/vendor/starplayer/js/hls.js?token={{time()}}"></script> --}}
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_config.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_ui.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/speedplaytime.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/js/willbes/player.js?token={{time()}}"></script>
<script type="text/javascript">
    ratio = {{$ratio}};
    startPosition = 0;
    video_container_width = 1000;

    $(document).ready(function (){
        SubFrameTag_width = 0;

        setScreenReSizeVal();
        screenResize();

        config = {
            userId: "{{sess_data('admin_id')}}_admin",
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

        media = {
            url: "{!! $url !!}",
            autoPlay: true,
            startTime: 0
        };

        fnStartPlayer(config, media);
    });

    function fnCheckPID(){}
</script>
</body>
</html>
