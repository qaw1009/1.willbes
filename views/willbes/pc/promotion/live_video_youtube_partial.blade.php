<style type="text/css">
    /*라이브영상*/
    #movieFrame {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center top;}
    .embedWrap {position:relative; width:980px; height:551px; margin:0 auto}
    .embed-container {overflow:hidden; width:100%; min-height:551px; margin:0 auto}
    
    /*크롬*/
    @@media screen and (-webkit-min-device-pixel-ratio:0) {
    #movieFrame2 {position:relative; width:1120px; height:694px; margin:0 auto; padding-top:14px; background:url(https://static.willbes.net/public/images/promotion/live/liveTV.png) no-repeat center center;}
    .embedWrap {position:relative; width:980px; height:551px; background:url(https://static.willbes.net/public/images/promotion/2019/10/liveIng_1.jpg) no-repeat center center;}
    .embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; max-height:551px; margin:0 auto}
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
                        $live_path = $row['LiveUrl'];
                    }
                }
            }
        }
    @endphp

    @if ($live_type == 'standby')
        {{--방송 전 4월 13일까지 보여지는 이미지--}}
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_live.jpg" title="방송전">
        {{--방송 전 4월 13일이후 보여지는 이미지--}}
        <img src="https://static.willbes.net/public/images/promotion/2019/10/liveIng_1.jpg" title="방송전">
    @elseif ($live_type == 'on' && $live_video_type == 'on')
        <div class="movieplayer">
            <div class="embedWrap">
                <div class="embed-container" id="myElement">
                    <span>
                        <figure data-ke-type="video" data-ke-style="alignCenter" data-video-host="youtube" data-video-url="{{$live_path}}" data-video-thumbnail="https://scrap.kakaocdn.net/dn/cvnOmS/hyBS2AsyJA/aeK3Xxb1QfVB3eI16KuEQ0/img.jpg?width=1280&height=720&face=0_0_1280_720">
                            <iframe id="live_video_frame" src="{{$live_path}}" width="980" height="551" frameborder="0" allowfullscreen="true"></iframe>
                            <figcaption></figcaption>
                        </figure>
                    </span>
                </div>
            </div>
        </div>
    @elseif ($live_type == 'on' && $live_video_type == 'off')
        {{--방송 전--}}
        <img src="https://static.willbes.net/public/images/promotion/2019/10/liveIng_1.jpg" title="방송전">
    @else
        {{--방송종료 00:00 부터 노출--}}
        <img src="https://static.willbes.net/public/images/promotion/live/liveAfter.jpg" title="방송종료" />
    @endif
</div>

