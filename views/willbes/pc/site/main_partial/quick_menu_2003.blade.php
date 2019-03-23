<ul>
    @if(empty($data['dday']) === false)
        <li>
            <div class="QuickDdayBox">
                <div class="q_tit">{{$data['dday'][0]['DayTitle']}}</div>
                <div class="q_day">{{$data['dday'][0]['DayDatm']}}</div>
                <div class="q_dday NSK-Blac">{{($data['dday'][0]['DDay'] == 0) ? 'D-'.$data['dday'][0]['DDay'] : 'D'.$data['dday'][0]['DDay']}}</div>
            </div>
        </li>
    @endif
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_02', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_03', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
</ul>