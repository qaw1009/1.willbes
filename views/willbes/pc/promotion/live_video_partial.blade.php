<div id="movieFrame2">
    @php
        $live_type = 'off';
        $live_video_type = 'off';
        $day = date('Ymd');
        $time = date('His');
        $live_onoff_auto = 'false';      //라이브실행 on off
        $live_ratio = '';           //라이브화면 비율
        $live_path = '';            //라이브경로
        $live_mobile_path1 = '';     //라이브모바일경로
        $live_mobile_path2 = '';     //라이브모바일경로

        if (empty($arr_base['promotion_live_data']) === false) {
            if ($day < $arr_base['promotion_live_data'][0]['LiveDate']) {
                $live_type = 'standby';
            } else if ($day >= $arr_base['promotion_live_data'][0]['LiveDate'] && $day <= end($arr_base['promotion_live_data'])['LiveDate']){
                $live_type = 'on';
            } else {
                $live_type = 'off';
            }

            foreach ($arr_base['promotion_live_data'] as $row) {
                if ($row['LiveDate'] == $day) {
                    if ($time >= $row['LiveStartTime'] && $time <= $row['LiveEndTime']) {
                        $live_video_type = 'on';
                        $live_onoff_auto = ($row['LiveAutoType'] == 'Y') ? 'true' : 'false';
                        $live_ratio = $row['LiveRatio'];
                        $live_path = 'rtmp://'.$row['LiveUrl'].'1';
                        $live_mobile_path1 = 'http://'.$row['LiveUrl'].'1/Playlist.m3u8';
                        $live_mobile_path2 = 'http://'.$row['LiveUrl'].'2/Playlist.m3u8';
                    }
                }
            }
        }
    @endphp

    @if ($live_type == 'standby')
        {{--방송 전--}}
        <img src="https://static.willbes.net/public/images/promotion/live/liveBefore.jpg" title="방송전">

    @elseif ($live_type == 'on' && $live_video_type == 'on')
        {{--7/2 ~ 7.15 오전 9시 30분 방송 중--}}
        <script src="/public/vendor/jwplayer/jwplayer.js"></script>
        <div class="movieplayer">
            <div class="embedWrap">
            @if ($ismobile == false)
                <!--PC-->
                    <div class="embed-container" id="myElement">
                        <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                        <script type="text/javascript">
                            jwplayer("myElement").setup({
                                width: '100%',
                                logo: {file: 'https://static.willbes.net/public/images/promotion/live/liveBi.png'},
                                image: "https://static.willbes.net/public/images/promotion/live/liveIng.jpg",
                                aspectratio: "{{ $live_ratio }}",
                                autostart: "{{ $live_onoff_auto }}",
                                file: "{{ $live_path }}"
                            });
                        </script>
                    </div>
            @else
                <!--모바일용-->
                    <div class="embed-container-mobile" id="myElement"></div>
                    <ul class="mobileCh">
                        <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/live/livePlaybtnH.png" title="고화질 보기"></a></li>
                        <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/live/livePlaybtnN.png" title="일반화질 보기"></a></li>
                    </ul>
                @endif
            </div>
        </div>

    @elseif ($live_type == 'on' && $live_video_type == 'off')
        {{--방송 전--}}
        <img src="https://static.willbes.net/public/images/promotion/live/liveBefore.jpg" title="방송전">
    @else
        {{--방송종료 00:00 부터 노출--}}
        <img src="https://static.willbes.net/public/images/promotion/live/liveAfter.jpg" title="방송종료" />
    @endif
</div>

<script>
    function fn_live(p_type) {
        if(p_type == "hd"){
            location.href = "{{ $live_mobile_path1 }}";
        }else{
            location.href = "{{ $live_mobile_path2 }}";
        }
    }
</script>