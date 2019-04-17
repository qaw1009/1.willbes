<ul>
    @if(empty($data['dday']) === false)
    <li>
        <div class="QuickSlider">
            <div class="sliderNum">
            @foreach($data['dday'] as $row)
                <div class="QuickDdayBox">
                    <div class="q_tit">{{$row['DayTitle']}}</div>
                    <div class="q_day">{{$row['DayDatm']}}</div>
                    <div class="q_dday NSK-Black">{{($row['DDay'] == 0) ? 'D-'.$row['DDay'] : 'D'.$row['DDay']}}</div>
                </div>
            @endforeach
            </div>
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