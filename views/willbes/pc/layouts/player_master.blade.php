<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9, requiresActiveX=true"/>
    <title>Willbes Player</title>
    <link href="/public/css/willbes/basic.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/css/willbes/style.css?ver={{time()}}" rel="stylesheet">
    <link href="/public/vendor/starplayer/css/starplayer.css?token={{time()}}" rel="stylesheet" type="text/css">
</head>
<body onkeydown="onKeyDown(event.keyCode);" style="background-color: black;margin: 0 0 0 0">
<div class="videoPopup" id="videoPopup">
    <div class="view p_re">
        <div class="viewList" id="viewList">
            <span class="Tit NGR"><span class="NG" id="title">{{$data['pretitle']}}</span> : {{$data['title']}}</span>
            <ul class="btnList">
                <li class="lecCtr">
                    @if(empty($data['pre']) == true)
                        <a href="javascript:;" class="pre noLec" style="cursor: default">이전 강의</a>
                    @else
                        @if($data['pre']['isstart'] == 'Y' && $data['pre']['ispause'] == 'N')
                            @if($data['pre']['timeover'] == 'N')
                                <a href="javascript:;" onclick='fnPlayer("{{$data['pre']['OrderIdx']}}","{{$data['pre']['ProdCode']}}","{{$data['pre']['ProdCodeSub']}}","{{$data['pre']['wLecIdx']}}","{{$data['pre']['wUnitIdx']}}","{{$data['quility']}}");' class="pre">이전 강의</a>
                            @else
                                <a href="javascript:;" onclick='' class="pre noLec" style="cursor: default">이전 강의</a>
                            @endif
                        @elseif($data['pre']['ispause'] == 'Y')
                            <a href="javascript:;" onclick='' class="pre noLec" style="cursor: default">이전 강의</a>
                        @else
                            <a href="javascript:;" onclick='' class="pre noLec" style="cursor: default">이전 강의</a>
                        @endif
                    @endif
                    @if(empty($data['next']) == true)
                        <a href="javascript:;" class="next noLec" style="cursor: default">다음 강의</a>
                    @else
                        @if($data['next']['isstart'] == 'Y' && $data['next']['ispause'] == 'N')
                            @if($data['next']['timeover'] == 'N')
                                <a href="javascript:;" onclick='fnPlayer("{{$data['next']['OrderIdx']}}","{{$data['next']['ProdCode']}}","{{$data['next']['ProdCodeSub']}}","{{$data['next']['wLecIdx']}}","{{$data['next']['wUnitIdx']}}","{{$data['quility']}}");' class="next">다음 강의</a>
                            @else
                                <a href="javascript:;" onclick='' class="next noLec" style="cursor: default">다음 강의</a>
                            @endif
                        @elseif($data['next']['ispause'] == 'Y')
                            <a href="javascript:;" onclick='' class="next noLec" style="cursor: default">다음 강의</a>
                        @else
                            <a href="javascript:;" onclick='' class="next noLec" style="cursor: default">다음 강의</a>
                        @endif
                    @endif
                </li>
                <li><a class="iconBtn btnSetting" href="javascript:;" onclick="fnSettingPOP();">버튼 단축키</a></li>
                <li><span class="btnFAQ"><a href="{{front_url('/support/faq/index')}}" target="_blank">동영상 FAQ</a></span></li>
            </ul>
        </div>
        <div id="settingPOP" class="settingPOP settingPOP2">
            <img src="{{ img_url('player/player_keyH.png') }}" usemap="#player_key" style="border: 0; z-index:12;" onclick="fnSettingPOP();">
            <map name="player_key">
                <area shape="rect" coords="930,10,960,36" href="javascript:;" onclick="fnSettingPOP();" onfocus="blur();" />
            </map>
        </div>
        <div id="player-container" style="background-color: black;">
            <div id="video-container" style="width:640px;height:400px;position:absolute;"></div>
            <div id="controller-container" style="width:640px;height:81px;"></div>
            <div id="controller-container2" class="starplayer_script_ui" style="margin: 0 0 0 0; display:block; position:absolute; top:400px; background-color:black; width:640px; height:81px;">
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
    </div>
    <iframe id="subframe" frameborder="0" scrolling="no" width="400px" height="500px" src=""></iframe>
</div>
<script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
{{--
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script>
<script src="/public/js/willbes/app.js?token={{time()}}"></script>
--}}
<script src="/public/js/util.js?token={{time()}}"></script>
{{-- <script type="text/javascript" src="/public/vendor/starplayer/js/hls.js?token={{time()}}"></script> --}}
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_config.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/starplayer_ui.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/vendor/starplayer/js/speedplaytime.js?token={{time()}}"></script>
<script type="text/javascript" src="/public/js/willbes/player.js?token={{time()}}"></script>
<script>
    ratio = {{empty($data['ratio']) == true ? '16' : $data['ratio']}};
    startPosition = {{empty($data['startPosition']) == true ? '0' : $data['startPosition']}};
    video_container_width = @if($data['quility'] == 'WD'){{'1280'}}@elseif($data['quility'] == 'HD'){{'960'}}@else{{'960'}}@endif;

    function fnSettingPOP()
    {
        $('#settingPOP').toggle();
    }
</script>
@yield('script')
</body>
</html>
