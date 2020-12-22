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
        class="video-js vjs-default-skin vjs-big-play-centered vjs-16-9"
        controls
        {{-- disablePictureInPicture --}}
        preload="auto"
        {{-- width="1200" --}}
        {{-- height="600" --}}
        poster="/public/img/willbes/willbes_video_test.jpg"
        data-setup="{}"
    >
        {{-- <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8" type="application/x-mpegURL"/> --}}
        {{-- <source src="https://gscdn.willbes.net/Sillim/nomu/2020_06/dongcha/leesoojin_nodongbub_dongcha/lsj_04_02_0617_nodongbub_dongcha.mp4/mp4hls/playlist.m3u8?_lsu_sa_=33125cb7cf7b69c3a80117d76eb2bd93df8c66062059f5ac3601704a6f4e6614b5a8152f38f9a7c2ff4b3ec4d053825c38a56eea6f24ea938a424cf2e30e04a8f142b9faca4ebae7fc84e7892251ac10a038704fee14ea0531c7f757c380e622eff413ac9144b63ad2e3d030c9582b528f9fbf32ba723148f4842542aafeeeebe546e752509a8bc8f1334537d67edc36441a59288cc2e34ec2d3f28c6ff87ae411fb806d841430458aa373d3b0bacd156ddf2db08b79bdb9bfd2f3d376fb851a" type="application/x-mpegURL"/> --}}
        {{-- 유효기간 1년. 2021-10-20 --}}
        <source src="https://gscdn.willbes.net/encryptions/_definst_/smil:willbes_test6.smil/playlist.m3u8?_lsu_sa_=314292badf3c6e436309071a660262979f7b6816f55c95e93761ae480f836224dca3a573300909c3afa53fb40e5312f353f784ec148a22b00b302b14d11e57619b2dc11bb3483b2ce9bb696d8b39c0eb3ded56e243e63166ea9b672f655c8203a56e1623493d2bc30e6610300b0a8d0743867b0fbc1ef6d5ebe7a5885560a805" type="application/x-mpegURL"/>

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
                pictureInPictureToggle: true,
                remainingTimeDisplay: false,
                volumePanel: {
                    inline: false
                }
            },
            html5: {
                hls: {
                    overrideNative: true,
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
