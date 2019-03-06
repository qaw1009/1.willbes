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
                    @php $link_url = ''; @endphp
                    @foreach($data['main_quick']['메인_우측퀵_01'] as $row)
                        @if (empty($row['LinkUrl']) === false)
                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                        @endif
                            <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                    @endforeach
                </div>
            </div>
        </li>
    @endif
    @if(empty($data['main_quick']['메인_우측퀵_02']) === false)
        <li>
            <div class="QuickSlider">
                <div class="sliderNum">
                    @php $link_url = ''; @endphp
                    @foreach($data['main_quick']['메인_우측퀵_02'] as $row)
                        @if (empty($row['LinkUrl']) === false)
                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                        @endif
                        <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                    @endforeach
                </div>
            </div>
        </li>
    @endif
    @if(empty($data['main_quick']['메인_우측퀵_03']) === false)
        <li>
            <div class="QuickSlider">
                <div class="sliderNum">
                    @php $link_url = ''; @endphp
                    @foreach($data['main_quick']['메인_우측퀵_03'] as $row)
                        @if (empty($row['LinkUrl']) === false)
                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                        @endif
                        <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                    @endforeach
                </div>
            </div>
        </li>
    @endif
</ul>