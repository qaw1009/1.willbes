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
    @if(empty($data['main_quick']['메인_우측퀵_01']) === false)
        <li>
            <div class="QuickSlider">
                <div class="sliderNum">
                    @foreach($data['main_quick']['메인_우측퀵_01'] as $row)
                        @php
                            $link_url = '#none';
                            if(empty($row['LinkUrl']) === false) {
                                $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                            }
                        @endphp
                        <div><a href="{{ $link_url }}" target="{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                    @endforeach
                </div>
            </div>
        </li>
    @endif
    @if(empty($data['main_quick']['메인_우측퀵_02']) === false)
        <li>
            @foreach($data['main_quick']['메인_우측퀵_02'] as $row)
                @php
                    $link_url = '#none';
                    if(empty($row['LinkUrl']) === false) {
                        $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                    }
                @endphp
                <a href="{{ $link_url }}" target="{{ $row['LinkType'] }}">
                    <img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}">
                </a>
            @endforeach
        </li>
    @endif
    @if(empty($data['main_quick']['메인_우측퀵_03']) === false)
        <li>
            @foreach($data['main_quick']['메인_우측퀵_03'] as $row)
                @php
                    $link_url = '#none';
                    if(empty($row['LinkUrl']) === false) {
                        $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                    }
                @endphp
                <a href="{{ $link_url }}" target="{{ $row['LinkType'] }}">
                    <img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}">
                </a>
            @endforeach
        </li>
    @endif
</ul>