{{--
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
--}}
<div><a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free') }}"><img src="https://static.willbes.net/public/images/promotion/main/2000_sky01.jpg" alt="학원보강"></a></div> 
<div class="mt5"><a href="{{ site_url('/pass/support/qna/index') }}"><img src="https://static.willbes.net/public/images/promotion/main/2000_sky02.jpg" alt="학원 1:1상담"></a></div>  
<ul>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/109') }}">강의 계획서</a></li>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
    <li><a href="https://job.willbes.net/pass/offinfo/boardInfo/index/110">강의자료실</a></li>
</ul>