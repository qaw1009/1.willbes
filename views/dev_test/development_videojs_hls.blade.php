<!DOCTYPE html>
<html>
<head>
    <link href="/public/vendor/videojs/7.7.5/video-js.css" rel="stylesheet" />
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/vendor/videojs/7.7.5/video.js"></script>
    <script src="/public/vendor/videojs/7.7.5/videojs-contrib-quality-levels.js"></script>
    <script src="/public/vendor/videojs/7.7.5/videojs-hls-quality-selector.js"></script>
</head>
<body>

    <style>
        .vjs-picture-in-picture-control { display: none !important; }
    </style>

    <h1>VideoJs(7.7.5) HLS Sample</h1>
    <video
        id="my-video"
        class="video-js vjs-default-skin vjs-big-play-centered"
        controls
        disablePictureInPicture
        preload="none"
        width="1200"
        height="600"
        poster="/public/img/willbes/willbes_video_test.jpg"
        data-setup="{}"
    >
        {{-- <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8" type="application/x-mpegURL"/> --}}
        {{-- <source src="https://gscdn.willbes.net/Sillim/nomu/2020_06/dongcha/leesoojin_nodongbub_dongcha/lsj_04_02_0617_nodongbub_dongcha.mp4/mp4hls/playlist.m3u8?_lsu_sa_=33125cb7cf7b69c3a80117d76eb2bd93df8c66062059f5ac3601704a6f4e6614b5a8152f38f9a7c2ff4b3ec4d053825c38a56eea6f24ea938a424cf2e30e04a8f142b9faca4ebae7fc84e7892251ac10a038704fee14ea0531c7f757c380e622eff413ac9144b63ad2e3d030c9582b528f9fbf32ba723148f4842542aafeeeebe546e752509a8bc8f1334537d67edc36441a59288cc2e34ec2d3f28c6ff87ae411fb806d841430458aa373d3b0bacd156ddf2db08b79bdb9bfd2f3d376fb851a" type="application/x-mpegURL"/> --}}
        {{-- 유효기간 1년. 2021-10-20 --}}
         <source src="https://gscdn.willbes.net/encryptions/_definst_/smil:willbes_test5.smil/playlist.m3u8?_lsu_sa_=390267b28f956753bb0537856f42dc935f826316df5d75873cf18b4b8f3468245cabe5e93d6907c37f493304985b6251927d07e324b886db6a721ca561e8748e1958f502f006b143b03f925f0e1022be4760a740d64b3a752213705576990346641fd0f720e0959227cfb947e033323706dbf918e55e8207351a6fd840e416a2" type="application/x-mpegURL"/>

        {{-- <track src="/public/vendor/videojs/test_subtitle.vtt" kind="captions" srclang="kor" label="한국어" default> --}}
    </video>
    <div>
        <h3>셈플</h3>
        <button type="button" onclick="javascript:setSampleUrl(0);">영상1</button>
        <button type="button" onclick="javascript:setSampleUrl(1);">영상2</button>
        <button type="button" onclick="javascript:setSampleUrl(2);">영상3</button>
    </div>

    <div>
        <h3>재생할 영상url</h3>
        <input type="text" id="input_url" value="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8" style="width: 500px;"/>
        <button type="button" onclick="javascript:playSampleVideo();" style="width: 100px;">play</button>
    </div>

    <script>

        const my_video = videojs('my-video', {
            playbackRates: [0.5, 1, 1.5, 2],
            controlBar: {
                // bigPlayButton: false,
                // muteToggle: false,
                // playToggle: true,
                // timeDivider: true,
                // currentTimeDisplay: true,
                // durationDisplay: true,
                // remainingTimeDisplay: false,
                // progressControl: true,
                // fullscreenToggle: false,
                // volumeControl: false,
                // currentTimeDisplay: true,
                // remainingTimeDisplay: true,
                remainingTimeDisplay: false,
                volumePanel: {
                    inline: false
                }
            },
            plugins: {
            }
        });

        my_video.on(['loadstart', 'play', 'playing', 'firstplay', 'pause', 'ended', 'adplay', 'adplaying', 'adfirstplay', 'adpause', 'adended', 'contentplay', 'contentplaying', 'contentfirstplay', 'contentpause', 'contentended', 'contentupdate', 'loadeddata', 'loadedmetadata'], function(e) {
        });

        my_video.hlsQualitySelector({
            displayCurrentQuality: true
        });

        function setSampleUrl(url_num) {
            var arr_url = [
                'https://gscdn.willbes.net/encryptions/_definst_/smil:willbes_test5.smil/playlist.m3u8',
                'https://gscdn.willbes.net/encryptions/_definst_/smil:willbes_test5.smil/playlist.m3u8?_lsu_sa_=390267b28f956753bb0537856f42dc935f826316df5d75873cf18b4b8f3468245cabe5e93d6907c37f493304985b6251927d07e324b886db6a721ca561e8748e1958f502f006b143b03f925f0e1022be4760a740d64b3a752213705576990346641fd0f720e0959227cfb947e033323706dbf918e55e8207351a6fd840e416a2',
                'https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8'
            ];
            $('#input_url').val(arr_url[url_num]);
            playSampleVideo();
        }

        function playSampleVideo(){
            my_video.src({type: 'application/x-mpegURL', src: $('#input_url').val()});
            my_video.play();
        }

    </script>
</body>

</html>
