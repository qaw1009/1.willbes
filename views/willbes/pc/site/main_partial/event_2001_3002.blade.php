@if(empty($data['arr_main_banner']['메인_이벤트띠배너']) === false)
    <div class="widthAuto">
        <div class="widthAuto smallTit">
            <p><span>신광은경찰 Hot Pick! <strong>온라인특강/이벤트</strong></span></p>
        </div>
        <div class="willbes-Bnr mt60">
            @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_이벤트띠배너']); @endphp
            @if(empty($last_banner['LinkUrl']) === false)
                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
            @endif
            <ul><li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li></ul>
        </div>
    </div>
@endif