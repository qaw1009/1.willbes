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
        <source src="https://bitdash-a.akamaihd.net/content/MI201109210084_1/m3u8s/f08e80da-bf1d-4e3d-8899-f0f6155f6efa.m3u8" type="application/x-mpegURL"/>
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
