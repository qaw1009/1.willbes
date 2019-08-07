<style type="text/css">    
    /*라이브영상*/
    #movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center top;}
    .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
    .embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:551px; margin:0 auto}
    
    /*크롬*/
    @@media screen and (-webkit-min-device-pixel-ratio:0) {
    #movieFrame2 {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center center;}
    .embedWrap {position:relative; width:980px; height:551px; background:url(https://static.willbes.net/public/images/promotion/live/liveBefore.jpg) no-repeat center center;}
    .embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; height:auto; margin:0 auto}
    .mobileCh {position:absolute; left:0; bottom:0; width:980px;}
    .mobileCh li {display:inline; float:left; width:490px;}
    .mobileCh li a {display:block;}
    .mobileCh li a.ch2 {color:#6CF}
    .mobileCh li a:hover {color:#FC0}
    .mobileCh:after {content:""; display:block; clear:both}
    }
    
    /*모바일*/
    .mobileCh {position:absolute; bottom:0; width:980px;}
    .mobileCh li {display:inline; float:left; width:50%;}
    .mobileCh li a {display:block;}
    .mobileCh li:last-child a {margin:0}
    .mobileCh li a.ch2 {color:#6CF}
    .mobileCh li a:hover {color:#FC0}
    .mobileCh:after {content:""; display:block; clear:both}

    #myElement{position:absolute;left:0;}
    .liveVideoNoLogin  {margin-top: 270px; font-size: 20px}
</style>

<div id="movieFrame">
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
            {{--@if (sess_data('is_login') !== true)
                <li class="liveVideoNoLogin">로그인이 필요합니다.</li>
            @else--}}
                <div class="embedWrap">
                    @if ($ismobile == false)
                        <!--PC-->
                        @if (sess_data('is_login') !== true)
                            <div onclick="javascript:alert('로그인 후 이용해 주세요.');" style="cursor: pointer;"><img src="https://static.willbes.net/public/images/promotion/live/liveIng.jpg" title=""></div>
                        @else
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
                        @endif
                    @else
                        <!--모바일용-->
                        <div class="embed-container-mobile" id="myElement"></div>
                        <ul class="mobileCh">
                            <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/live/livePlaybtnH.png" title="고화질 보기"></a></li>
                            <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/live/livePlaybtnN.png" title="일반화질 보기"></a></li>
                        </ul>
                    @endif
                </div>
            {{--@endif--}}
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
        @if(sess_data('is_login') != true)
            alert('로그인 후 이용해 주세요.');
        @else
            if(p_type == "hd"){
                location.href = "{{ $live_mobile_path1 }}";
            }else{
                location.href = "{{ $live_mobile_path2 }}";
            }
        @endif
    }
</script>