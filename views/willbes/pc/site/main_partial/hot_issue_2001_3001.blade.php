<div class="widthAuto">
    <div class="widthAuto smallTit">
        <p><span>학원 최신 소식을 한 눈에! <strong>학원 Hot Issue</strong></span></p>
    </div>
</div>
<ul class="widthAuto mt60">
    @if(empty($data['arr_main_banner']['메인_학원배너1']) === false)
        <li class="sliderHotIssue nSlider pick">
            <div class="sliderNum">
                @php $link_url = ''; @endphp
                @foreach($data['arr_main_banner']['메인_학원배너1'] as $row)
                    @if(empty($row['LinkUrl']) === false)
                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                    @endif
                    <div><a href="{{ $link_url }}" target="{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                @endforeach
            </div>
        </li>
    @endif

    @if(empty($data['arr_main_banner']['메인_학원배너2']) === false)
        <li class="sliderHotIssue nSlider pick">
            <div class="sliderNum">
                @php $link_url = ''; @endphp
                @foreach($data['arr_main_banner']['메인_학원배너2'] as $row)
                    @if(empty($row['LinkUrl']) === false)
                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                    @endif
                    <div><a href="{{ $link_url }}" target="{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                @endforeach
            </div>
        </li>
    @endif

    @if(empty($data['arr_main_banner']['메인_학원배너3']) === false)
        <li class="sliderHotIssue nSlider pick">
            <div class="sliderNum">
                @php $link_url = ''; @endphp
                @foreach($data['arr_main_banner']['메인_학원배너3'] as $row)
                    @if(empty($row['LinkUrl']) === false)
                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                    @endif
                    <div><a href="{{ $link_url }}" target="{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                @endforeach
            </div>
        </li>
    @endif
</ul>