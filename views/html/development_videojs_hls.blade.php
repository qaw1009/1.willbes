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
        <!-- <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8" type="application/x-mpegURL"/> -->

        <!-- 유효기간 90일 -->
        <!-- <source src="https://gscdn.willbes.net/Sillim/nomu/2020_06/dongcha/leesoojin_nodongbub_dongcha/lsj_04_02_0617_nodongbub_dongcha.mp4/mp4hls/playlist.m3u8?_lsu_sa_=33125cb7cf7b69c3a80117d76eb2bd93df8c66062059f5ac3601704a6f4e6614b5a8152f38f9a7c2ff4b3ec4d053825c38a56eea6f24ea938a424cf2e30e04a8f142b9faca4ebae7fc84e7892251ac10a038704fee14ea0531c7f757c380e622eff413ac9144b63ad2e3d030c9582b528f9fbf32ba723148f4842542aafeeeebe546e752509a8bc8f1334537d67edc36441a59288cc2e34ec2d3f28c6ff87ae411fb806d841430458aa373d3b0bacd156ddf2db08b79bdb9bfd2f3d376fb851a" type="application/x-mpegURL"/> -->
        <source src="https://gscdn.willbes.net/encryptions/_definst_/mp4:Sillim/nomu/2020_06/dongcha/leesoojin_nodongbub_dongcha/lsj_04_02_0617_nodongbub_dongcha.mp4/playlist.m3u8?_lsu_sa_=328254ba4f0762c3830247d2631265935f896f96865cc5493b61e2473f656924c8a9655e3ba925cd3f173db4aa5b62738532c6a27b52764bfc1c6184fd74980eb908aca4c7a85cc260b2bfd7ee6c72b24fc8e478254900ee8494b454656d32922e8f405d49c1007b7cafe43919ef287a34e7a7af549fc0043768453acfda509f6e933db40fc3b5196fd8bbae546adc0e8d93af490a39ed57c9e99f3dc65ba26e11f475a6025f8cf2d3b433d68f77f30d8b454e8f917e38334f7427f522d6c4bf365ca1883b2d9b9ddb8fda3748680fee" type="application/x-mpegURL"/>
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
