var html = '', link_url = '#none';

@if($disp['DispTypeCcd'] == '664002')
    // 롤링 배너
    html = '<div class="{{ $disp['DispRollingTypeName'] }} {{ $css_class }}">';
    html += '    <div id="bn_slider_{{ $disp['BdIdx'] }}">';
    @foreach($data as $idx => $row)
        @if(empty($row['LinkUrl']) === false)
            link_url = '{{ front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www') }}';
        @endif
        html += '   <div><a href="' + link_url + '" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" title="{{ $row['BannerName'] }}"/></a></div>';
    @endforeach
    html += '   </div>';
    html += '</div>';

    @if(empty($set_class) === true)
        document.write(html);

        $(function() {
            slider('bn_slider_{{ $disp['BdIdx'] }}', '{{ $disp['DispRollingTypeName'] }}', {{ $disp['DispRollingTime'] }});
        });
    @else
        $('.{{ $set_class }}').html(html);
    @endif
@else
    // 고정 or 랜덤
    @if($data[0]['LinkType'] == 'layer')
        link_url = '//{{ app_to_env_url($data[0]['LinkUrl']) }}/event/popupRegistCreateByBanner?banner_idx=' + {{ $data[0]['BIdx'] }};
        html = '<a href="#none" onclick="event_layer_popup(link_url)" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
        html += '<div id="APPLYPASS" class="willbes-Layer-Black"></div>';
    @else
        @if(empty($data[0]['LinkUrl']) === false)
            link_url = '{{ front_app_url('/banner/click?banner_idx=' . $data[0]['BIdx'] . '&return_url=' . urlencode($data[0]['LinkUrl']) . '&link_url_type=' . $data[0]['LinkUrlType'], 'www') }}';
        @endif
        html = '<a href="' + link_url + '" target="_{{ $data[0]['LinkType'] }}" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
    @endif

    @if(empty($set_class) === true)
        document.write(html);
    @else
        $('.{{ $set_class }}').html(html);
    @endif
@endif