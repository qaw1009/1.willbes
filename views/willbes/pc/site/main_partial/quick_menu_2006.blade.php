<ul>
    @for($i=1; $i<=5; $i++)
        @if(isset($data['arr_main_banner']['메인_퀵배너0'.$i]) === true)
            <li>
                <div class="QuickSlider">
                    {!! banner_html($data['arr_main_banner']['메인_퀵배너0'.$i], '_num_slider_quick_banner'.$i) !!}
                    {{--{!! banner_html(element('메인_퀵배너0'.$i, $data['arr_main_banner']), 'sliderNum') !!}--}}
                </div>
            </li>
        @endif
    @endfor
</ul>
