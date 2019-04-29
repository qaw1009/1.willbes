@if(empty($data) === false)
    $(document).ready(function() {
        var html = '', is_modal = false;

        @foreach($data as $row)
            {{--// 팝업타입 (layer, modal, bnBottom) --}}
            @php $popup_type = $arr_popup_type_ccd[$row['PopUpTypeCcd']]; @endphp

            {{--// 팝업타입별 style tag --}}
            @if($popup_type == 'modal')
                @php $pop_style = 'top: ' . $row['TopPixel'] . 'px; margin-left: ' . (($row['Width'] / 2) * -1) . 'px;'; @endphp
            @elseif($popup_type == 'bnBottom')
                @php $pop_style = 'position: fixed; top: auto; bottom: 0; left: 0; width: 100%; text-align: center; z-index: 101;'; @endphp
            @else
                @php $pop_style = 'top: ' . $row['TopPixel'] . 'px; left: ' . $row['LeftPixel'] . 'px; z-index: 101;'; @endphp
            @endif

            if ('{{ $popup_type }}' === 'bnBottom' || $.cookie('_wb_client_popup_{{ $row['PIdx'] }}') !== 'done') {
                {{--// 모달팝업창 존재 여부 --}}
                if ('{{ $popup_type }}' === 'modal') {
                    is_modal = true;
                }

                {{--// 팝업 링크URL --}}
                @php $img_link_url = '#none'; @endphp
                @if(empty($row['LinkUrl']) === false)
                    @php $img_link_url = '//' . (strpos($row['LinkUrl'], config_item('base_domain')) === false ? $row['LinkUrl'] : app_to_env_url($row['LinkUrl'])); @endphp
                @endif

                html += '<div id="Popup{{ $row['PIdx'] }}" class="PopupWrap {{ $popup_type }} willbes-Layer-popBox" style="{{ $pop_style }}">';
                html += '   <div class="Layer-Cont">';
                html += '       <a href="{!! $img_link_url !!}" target="_{{ $row['LinkType'] }}">';
                html += '           <img src="{{ $row['PopUpFullPath'] }}{{ $row['PopUpImgName'] }}" usemap="#PopupImgMap{{ $row['PIdx'] }}"/>';
                html += '       </a>';
                html += '   </div>';

                @if($popup_type == 'bnBottom')
                    html += '<div style="position: absolute; top: -9px; right: 50%; width: 19px; height: 19px; margin-right: -700px;">';
                    html += '   <a href="#none" class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days=""><img src="{{ img_static_url('promotion/common/mainBottom_btnclose.png') }}"/></a>';
                    html += '</div>';
                @else
                    html += '<ul class="btnWrapbt popbtn mt10">';
                    html += '   <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="1">하루 보지않기</a></li>';
                    html += '   <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="">Close</a></li>';
                    html += '</ul>';
                @endif

                @if(empty($row['PopUpImgMapData']) === false)
                    html += '<map name="PopupImgMap{{ $row['PIdx'] }}">';
                    @foreach($row['PopUpImgMapData'] as $map_row)
                        {{--// 팝업 이미지맵 링크URL --}}
                        @php $map_link_url = '#none'; @endphp
                        @if(empty($map_row['LinkUrl']) === false)
                            @php $map_link_url = '//' . (strpos($map_row['LinkUrl'], config_item('base_domain')) === false ? $map_row['LinkUrl'] : app_to_env_url($map_row['LinkUrl'])); @endphp
                        @endif

                        html += '<area shape="{{ $map_row['ImgType'] }}" coords="{{ $map_row['ImgArea'] }}" href="{!! $map_link_url !!}" target="_{{ $row['LinkType'] }}"/>';
                    @endforeach
                    html += '</map>';
                @endif

                html += '</div>';
            }
        @endforeach

        if (html !== '') {
            {{--// 백그라운드 레이어 class (willbes-Layer-Black or willbes-Layer-Trans) --}}
            html += '<div id="PopupBackWrap" class="' + (is_modal === true ? 'willbes-Layer-Black' : '') + '"></div>';

            $('body').append(html);
            $('.PopupWrap').fadeIn();
            $('#PopupBackWrap').fadeIn();
        }

        {{--// close 버튼 클릭 --}}
        $('.PopupWrap').on('click', '.btn-popup-close', function() {
            var popup_idx = $(this).data('popup-idx');
            var hide_days = $(this).data('popup-hide-days');

            {{--// 팝업 close --}}
            $(this).parents('.PopupWrap').fadeOut();

            {{--// 하루 보지않기 --}}
            if (hide_days !== '') {
                var domains = location.hostname.split('.');
                var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                    domain: domain,
                    path: '/',
                    expires: hide_days
                });
            }

            {{--// 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리 --}}
            if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                $('#PopupBackWrap').fadeOut();
            }

            {{--// 전체 팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리
            if ($('.PopupWrap').filter(':visible').length < 2) {
                $('#PopupBackWrap').fadeOut();
            }--}}
        });

        {{--// 백그라운드 클릭 --}}
        $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
            $('.PopupWrap.modal').fadeOut();
            $(this).fadeOut();
        });
    });
@endif