@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1376_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#665227;}
        .evt02 {background:#f6f6f6;}
        .evt02 span {position:absolute; top:403px; left:50%; margin-left:-490px; width:980px; z-index:10}
        .evt02 span figure {width:980px; height:551px}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1376_top.jpg" title="경찰 합격기원 토크쇼">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1376_01.jpg" title="경찰 합격기원 토크쇼 교수진">
        </div>

        <div class="evtCtnsBox evt02">
            @php
                $live_type = 'standby';
                $now_datm = date('YmdHis');
                if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development') {
                    $start_time = '20190830135000';
                    $end_time = '20190830200000';
                } else {
                    $start_time = '20190831135000';
                    $end_time = '20190831200000';
                }

                if ($now_datm < $start_time) {
                    $live_type = 'standby';
                } else if ($now_datm >= $start_time && $now_datm < $end_time) {
                    $live_type = 'on';
                } else {
                    $live_type = 'off';
                }
            @endphp
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1376_02.jpg" title="라이브 토크쇼">
            @if ($live_type == 'standby')
                {{--방송전 31일 13시까지--}}
                <span><img src="https://static.willbes.net/public/images/promotion/2019/08/1376_02_before.jpg" title="방송전"></span>
            @elseif($live_type == 'on')
                {{--방송전 31일 13시~14시까지--}}
                {{--<span><iframe src="https://www.youtube.com/watch?v=8_TeXs4Uh_4?version-2&autoplay=1&rel=0&autohide=1" frameborder="0" allowfullscreen=""></iframe></span>--}}
                    <span>
                    <figure data-ke-type="video" data-ke-style="alignCenter" data-video-host="youtube" data-video-url="https://www.youtube.com/watch?v=8_TeXs4Uh_4?version-2&autoplay=1&rel=0&autohide=1" data-video-thumbnail="https://scrap.kakaocdn.net/dn/cvnOmS/hyBS2AsyJA/aeK3Xxb1QfVB3eI16KuEQ0/img.jpg?width=1280&height=720&face=0_0_1280_720"><iframe src="https://www.youtube.com/embed/8_TeXs4Uh_4?version-2&autoplay=1&rel=0&autohide=1" width="980" height="551" frameborder="0" allowfullscreen="true"></iframe>
                        <figcaption></figcaption>
                    </figure>
                </span>
            @else
                {{--방송전 31일 13시~14시이후--}}
                <span><img src="https://static.willbes.net/public/images/promotion/2019/08/1376_02_after.jpg" title="방송종료"></span>
            @endif
        </div>
	</div>
    <!-- End Container -->
@stop