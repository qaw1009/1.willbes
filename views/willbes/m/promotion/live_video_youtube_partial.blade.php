@php
    $live_type = 'off';
    $live_video_type = 'off';
    $day = date('Ymd');
    $time = date('His');
    $live_onoff_auto = 'false';     //라이브실행 on off
    $live_ratio = '';               //라이브화면 비율
    $live_path = '';                //라이브경로
    $live_mobile_path1 = '';        //라이브모바일경로
    $live_mobile_path2 = '';        //라이브모바일경로

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
    {{-- n월 n일 방송이 시작됩니다. --}}
    <img src="https://static.willbes.net/public/images/promotion/2020/05/liveIng_1.jpg" alt=""/>
@elseif ($live_type == 'on' && $live_video_type == 'on')
    {{-- 라이브 방송중 --}}
    <div class="video-container-box">
        <div class="video-container">
            <iframe src="{{$live_path}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
@elseif ($live_type == 'on' && $live_video_type == 'off')
    {{-- 지금은 방송 시간이 아닙니다. --}}
    <img src="https://static.willbes.net/public/images/promotion/2020/05/liveIng_1.jpg" alt=""/>
@else
    {{-- 라이브 강의가 종료 되었습니다. --}}
    <img src="https://static.willbes.net/public/images/promotion/live/liveAfter.jpg" alt=""/>
@endif