<style type="text/css">
.evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
/*.evtCtnsBox .wrap a {border:1px solid #000} */
.cts02_top {background:url("https://static.willbes.net/public/images/promotion/2022/03/2548_cts02_top_bg.jpg") no-repeat center top;}
.cts02_01 {background:#eaeaea;}
.cts02_02 {padding-bottom:50px;}
</style>

<div>
    <div class="evtCtnsBox cts02_top">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2548_cts02_top.jpg" alt="합격예측 풀서비스">
            @if($arr_promotion_params['start_active_tab2'] <= date('YmdHi'))
                <a href="{{front_url('/promotion/index/cate/3001/code/2573')}}" target="_blank" style="position: absolute;left: 26.01%;top: 84.07%;width: 48.13%;height: 6.3%;z-index: 2;"></a>
            @else
                @php
                    $set_month = date("n", strtotime($arr_promotion_params['start_active_tab2'].'00'));
                    $set_day = date("j", strtotime($arr_promotion_params['start_active_tab2'].'00'));
                    $set_hour = date("H", strtotime($arr_promotion_params['start_active_tab2'].'00'));
                    $set_min = date("i", strtotime($arr_promotion_params['start_active_tab2'].'00'));
                @endphp
                <a href="javascript:alert('{{$set_month}}월{{$set_day}}일 {{$set_hour}}시{{$set_min}}분 오픈됩니다.')" style="position: absolute;left: 26.01%;top: 84.07%;width: 48.13%;height: 6.3%;z-index: 2;"></a>
            @endif
        </div>
    </div>
    <div class="evtCtnsBox cts02_01" id="cts02_01">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2548_cts02_01.jpg" alt="라이브 토크쇼">            
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" style="position: absolute;left: 28.04%;top: 87.41%;width: 44.13%;height: 4.02%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox cts02_02">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2548_cts02_02.jpg" alt="신광은 경찰팀">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2578" target="_blank" style="position: absolute;left: 27.99%;top: 91.07%;width: 44.13%;height: 5.78%;z-index: 2;"></a>
        </div>
    </div>
</div>