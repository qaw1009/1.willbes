<!DOCTYPE html>
<html>
<head>
    <link href="/public/vendor/videojs/7.7.5/video-js.css" rel="stylesheet" />
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
        <source src="https://gscdn.willbes.net/encryptions/_definst_/mp4:Sillim/nomu/2020_06/dongcha/leesoojin_nodongbub_dongcha/lsj_04_02_0617_nodongbub_dongcha.mp4/playlist.m3u8?_lsu_sa_=38925bba9f4665639a06576363e2b9913fd96186e65cc53430e10f49af0b6024ccaef510367915c21fb13674a953629189014384c0044211529f02bd85fbc5886b53d89a719b982fa32a1bfec4bed853cd07dbf295bb135418417c4dd461c3d536979eb6a8a8b7132a2855d49351cfe33afb1dbf1c358ebc56e81973cb8a5c45d4d1bc89f007097884bc300bff31a37444641e8b3b08b2750ba5262ad250925af52cf5503329ce939d51a913bed2209066335cee8062cb9bf0ea7bb5877bfb6d2e2fdf6c1e5f774a55abe0010a9a4293" type="application/x-mpegURL"/>
        <track src="/public/vendor/videojs/test_subtitle.vtt" kind="captions" srclang="kor" label="한국어" default>
    </video>

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
            displayCurrentQuality: true,
        });

    </script>
</body>

</html>
