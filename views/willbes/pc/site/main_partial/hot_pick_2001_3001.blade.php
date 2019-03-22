<div class="widthAuto">
    <div class="sliderPick nSlider pick">
        <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
        <div class="pickBox pick1">
            {!! banner_html(element('메인_hotpick1', $data['arr_main_banner'])) !!}
        </div>
        <div class="pickBox pick2">
            {!! banner_html(element('메인_hotpick2', $data['arr_main_banner'])) !!}
        </div>
    </div>
    <div class="sliderEvt nSlider pick">
        <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 특강/이벤트</div>
        <ul>
            <li>
                {!! banner_html(element('메인_특강이벤트1', $data['arr_main_banner'])) !!}
            </li>
            <li>
                {!! banner_html(element('메인_특강이벤트2', $data['arr_main_banner']), 'sliderNum') !!}
            </li>
        </ul>
    </div>
</div>