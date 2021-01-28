var html = '', link_url = '#none', link_target = 'self';

@if($disp['DispTypeCcd'] == '664002')
    @if(count($data) == 1)
        // 고정 배너 (등록 배너개수가 1개일 경우)
        @if(empty($data[0]['LinkUrl']) === false && $data[0]['LinkUrl'] != '#')
            @if($data[0]['LinkType'] == 'script')
                link_url = '{{ $data[0]['LinkUrl'] }}';
            @else
                link_url = '{{ front_app_url('/banner/click?banner_idx=' . $data[0]['BIdx'] . '&return_url=' . urlencode($data[0]['LinkUrl']) . '&link_url_type=' . $data[0]['LinkUrlType'], 'www') }}';
            @endif
        @endif
        html = '<div class="{{ $css_class }}">';
        html += '   <a href="' + link_url + '" @if($data[0]['LinkType'] != 'script') target="_{{ $data[0]['LinkType'] }}" @endif><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}" style="width: 100%;"/></a>';
        html += '</div>';
    @else
        // 롤링 배너 (등록 배너개수가 2개 이상일 경우)
        html = '<div class="{{ strpos($disp['DispRollingTypeName'], 'manual') === false ? 'swiper-container' : '' }} {{ $disp['DispRollingTypeName'] }} {{ $css_class }}">';
        html += '   <div class="swiper-wrapper">';
        @foreach($data as $idx => $row)
            @if(empty($row['LinkUrl']) === false && $row['LinkUrl'] == '#')
                link_url = '#none';
            @elseif(empty($row['LinkUrl']) === false)
                @if($row['LinkType'] == 'script')
                    link_url = '{{ $row['LinkUrl'] }}';
                @else
                    link_url = '{{ front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . $row['LinkUrlType'], 'www') }}';
                @endif
            @endif
            html += '   <div class="swiper-slide">';
            html += '       <a href="' + link_url + '" @if($row['LinkType'] != 'script') target="_{{ $row['LinkType'] }}" @endif>';
            html += '           <img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" title="{{ $row['BannerName'] }}"/>';
            @if($set_class == 'bnTit')
                html += '       <div class="{{ $set_class }}">{{ $row['BannerName'] }}</div>';
            @endif
            html += '       </a>';
            html += '   </div>';
        @endforeach
        html += '   </div>';
        @if(strpos($disp['DispRollingTypeName'], 'page') > -1)
            html += '   <div class="swiper-pagination"></div>';
        @elseif(strpos($disp['DispRollingTypeName'], 'arrow') > -1)
            html += '   <div class="swiper-button-next"></div><div class="swiper-button-prev"></div>';
        @endif
        html += '</div>';
    @endif

    document.write(html);
@else
    // 고정 or 랜덤
    @if($data[0]['LinkType'] == 'layer')
        link_url = '//{{ app_to_env_url($data[0]['LinkUrl']) }}/event/popupRegistCreateByBanner?banner_idx=' + {{ $data[0]['BIdx'] }};
        html = '<a href="#none" onclick="event_layer_popup(link_url)" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
        html += '<div id="APPLYPASS" class="willbes-Layer-Black"></div>';
    @elseif($data[0]['LinkType'] == 'script')
        link_url = '{{ $data[0]['LinkUrl'] }}';
        html = '<a href="' + link_url + '" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
    @else
        @if(empty($data[0]['LinkUrl']) === false && $data[0]['LinkUrl'] != '#')
            link_url = '{{ front_app_url('/banner/click?banner_idx=' . $data[0]['BIdx'] . '&return_url=' . urlencode($data[0]['LinkUrl']) . '&link_url_type=' . $data[0]['LinkUrlType'], 'www') }}';
        @endif
        html = '<a href="' + link_url + '" target="_{{ $data[0]['LinkType'] }}" class="{{ $css_class }}"><img src="{{ $data[0]['BannerFullPath'] . $data[0]['BannerImgName'] }}" title="{{ $data[0]['BannerName'] }}"/></a>';
    @endif
    document.write(html);
@endif