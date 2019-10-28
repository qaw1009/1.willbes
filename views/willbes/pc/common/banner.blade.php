var html = '', link_url = '#none';

@if($disp['DispTypeCcd'] == '664002')
    // 롤링 배너
    html = '<div class="{{ $disp['DispRollingTypeName'] }} {{ $css_class }}">';
    html += '    <div id="bn_slider_{{ $disp['BdIdx'] }}">';
    @foreach($data as $idx => $row)
        @if(empty($row['LinkUrl']) === false && $data[0]['LinkUrl'] != '#')
            link_url = '{{ front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www') }}';
        @endif
        html += '   <div><a href="' + link_url + '" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" title="{{ $row['BannerName'] }}" usemap="#BannerImgMap{{ $row['BIdx'] }}"/></a></div>';
    @endforeach
    html += '   </div>';
    html += '</div>';

    @php $map_data = ''; @endphp
    @foreach($data as $idx => $row)
        @php
            if (empty($row['BannerImgMapData']) === false) {
                $map_data .= "<map name='BannerImgMap{$row['BIdx']}' id='BannerImgMap{$row['BIdx']}'>";
                $arr_img_map_data = json_decode($row['BannerImgMapData'], true);
                foreach ($arr_img_map_data as $map_row) {
                    $map_link = "href='#none'";
                    if (empty($map_row['LinkUrl']) === false && $map_row['LinkUrl'] != '#') {
                        if ($row['LinkType'] == 'layer') {
                            $set_map_link_url = app_to_env_url($map_row['LinkUrl']) . '/event/popupRegistCreateByBanner?banner_idx=' . $row['BIdx'];
                            $map_link = "onclick=event_layer_popup('{$set_map_link_url}')";
                        } else {
                            $set_map_link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($map_row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www');
                            if ($row['LinkType'] == 'popup') {
                                $map_link = "onclick=popupOpen('{$set_map_link_url}')";
                            } else {
                                $map_link = "href='{$set_map_link_url}' target='{$row['LinkType']}'";
                            }
                        }
                    }
                    $map_data .= "<area shape='{$map_row['ImgType']}' coords='{$map_row['ImgArea']}' {$map_link} style='cursor: pointer;'/>";
                }
                $map_data .= '</map>';
            }
        @endphp
    @endforeach
    html += "{!! $map_data !!}";

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
        html = '<a href="#none" onclick="event_layer_popup(\'' + link_url + '\');" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}" usemap="#BannerImgMap{{ $data[0]['BIdx'] }}"/></a>';
        html += '<div id="APPLYPASS" class="willbes-Layer-Black"></div>';
    @else
        @if(empty($data[0]['LinkUrl']) === false && $data[0]['LinkUrl'] != '#')
            link_url = '{{ front_app_url('/banner/click?banner_idx=' . $data[0]['BIdx'] . '&return_url=' . urlencode($data[0]['LinkUrl']) . '&link_url_type=' . $data[0]['LinkUrlType'], 'www') }}';
        @endif

        @if($data[0]['LinkType'] == 'popup')
            html = '<a href="#none" onclick="popupOpen(\'' + link_url + '\', \'_bn_pop_{{$data[0]['BIdx']}}\', \'{{$data[0]['PopWidth']}}\', \'{{$data[0]['PopHeight']}}\', null, null, \'no\', \'no\');" class="{{ $css_class }}">';
        @else
            html = '<a href="' + link_url + '" target="_{{ $data[0]['LinkType'] }}" class="{{ $css_class }}">';
        @endif

        html += '<img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}" usemap="#BannerImgMap{{ $data[0]['BIdx'] }}"/></a>';
    @endif

    @php
    $map_data = '';
    if (empty($data[0]['BannerImgMapData']) === false) {
        $map_data .= "<map name='BannerImgMap{$data[0]['BIdx']}' id='BannerImgMap{$data[0]['BIdx']}'>";
        $arr_img_map_data = json_decode($data[0]['BannerImgMapData'], true);
        foreach ($arr_img_map_data as $map_row) {
            $map_link = "href='#none'";
            if (empty($map_row['LinkUrl']) === false && $map_row['LinkUrl'] != '#') {
                if ($data[0]['LinkType'] == 'layer') {
                    $set_map_link_url = app_to_env_url($map_row['LinkUrl']) . '/event/popupRegistCreateByBanner?banner_idx=' . $data[0]['BIdx'];
                    $map_link = "onclick=event_layer_popup('{$set_map_link_url}')";
                } else {
                    $set_map_link_url = front_app_url('/banner/click?banner_idx=' . $data[0]['BIdx'] . '&return_url=' . urlencode($map_row['LinkUrl']) . '&link_url_type=' . urlencode($data[0]['LinkUrlType']), 'www');
                    if ($data[0]['LinkType'] == 'popup') {
                        $map_link = "onclick=popupOpen('{$set_map_link_url}')";
                    } else {
                        $map_link = "href='{$set_map_link_url}' target='{$data[0]['LinkType']}'";
                    }
                }
            }
            $map_data .= "<area shape='{$map_row['ImgType']}' coords='{$map_row['ImgArea']}' {$map_link} style='cursor: pointer;'/>";
        }
        $map_data .= '</map>';
    }
    @endphp
    html += "{!! $map_data !!}";

    @if(empty($set_class) === true)
        document.write(html);
    @else
        $('.{{ $set_class }}').html(html);
    @endif
@endif