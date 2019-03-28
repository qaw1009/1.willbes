@extends('willbes.pc.layouts.player_master')

@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            SubFrameTag_width = 0;

            setScreenReSizeVal();
            screenResize();
            fnDefense();

            config = {
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
                watermarkText: "{{$data['memid'] == "ANOMYNOUS" ? $data['ip'] : $data['memid']}}",
                watermarkTextColor: "#308ECE92",
                watermarkTextSize: "2%",
                watermarkHorzAlign: WatermarkAlign.RANDOM,
                watermarkVertAlign: WatermarkAlign.BOTTOM,
                watermarkInterval: "1800",
                watermarkShowInterval: "1",
                blockMessenger: false,
                blockVirtualMachine: true
            };

            media = {
                url: "{!! $data['url'] !!}",
                @if($data['isIntro'] === true)
                intro: "http://hd.willbes.gscdn.com/warning/warning_new_5.mp4",
                @endif
                autoPlay: true,
                startTime: 0
            };

            fnStartPlayer(config, media);
        });

        function fnCheckPID(){ /* DUMMY */ }
    </script>
@stop
