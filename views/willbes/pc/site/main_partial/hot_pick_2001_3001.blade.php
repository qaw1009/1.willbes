<div class="widthAuto">
    <div class="sliderPick nSlider pick">
        <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
        <div class="pickBox pick1">
            @if(empty($data['arr_main_banner']['메인_hotpick1']) === false)
                @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_hotpick1']); @endphp
                @if(empty($last_banner['LinkUrl']) === false)
                    @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                @endif
                <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
            @endif
        </div>
        <div class="pickBox pick2">
            @if(empty($data['arr_main_banner']['메인_hotpick2']) === false)
                @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_hotpick2']); @endphp
                @if(empty($last_banner['LinkUrl']) === false)
                    @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                @endif
                <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
            @endif
        </div>
    </div>
    <div class="sliderEvt nSlider pick">
        <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 특강/이벤트</div>
        <ul>
            @if(empty($data['arr_main_banner']['메인_특강이벤트1']) === false)
                @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_특강이벤트1']); @endphp
                @if(empty($last_banner['LinkUrl']) === false)
                    @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                @endif
                <li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li>
            @endif
            @if(empty($data['arr_main_banner']['메인_특강이벤트2']) === false)
                <li>
                    <div class="sliderNum">
                        @php $link_url = ''; @endphp
                        @foreach($data['arr_main_banner']['메인_특강이벤트2'] as $row)
                            @if(empty($row['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                            @endif
                            <div><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                        @endforeach
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>