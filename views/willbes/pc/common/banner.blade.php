var html = '';

@if($disp['DispTypeCcd'] == '664002')
    // 롤링 배너
    html = '<div class="{{ $disp['DispRollingTypeName'] }} {{ $css_class }}">';
    html += '    <div id="bn_slider_{{ $disp['BdIdx'] }}">';
    @foreach($data as $idx => $row)
        html += '   <div><a href="//{{ app_to_env_url($row['LinkUrl']) }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" title="{{ $row['BannerName'] }}"/></a></div>';
    @endforeach
    html += '   </div>';
    html += '</div>';
    document.write(html);

    $(function() {
        slider('bn_slider_{{ $disp['BdIdx'] }}', '{{ $disp['DispRollingTypeName'] }}', {{ $disp['DispRollingTime'] }});
    });
@else
    // 고정 or 랜덤
    html = '<a href="//{{ app_to_env_url($data[0]['LinkUrl']) }}" target="_{{ $data[0]['LinkType'] }}" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
    document.write(html);
@endif
