@if(empty($data) === false)
    $(document).ready(function() {
        var html = '', img_link_url = '#none', map_link_url = '#none';

        @foreach($data as $row)
            if ($.cookie('_wb_client_popup_{{ $row['PIdx'] }}') !== 'done') {
                @if(empty($row['LinkUrl']) === false)
                    img_link_url = '//{{ strpos($row['LinkUrl'], config_item('base_domain')) === false ? $row['LinkUrl'] : app_to_env_url($row['LinkUrl']) }}';
                @endif

                html += '<div id="Popup{{ $row['PIdx'] }}" class="PopupWrap willbes-Layer-popBox" style="top: {{ $row['TopPixel'] }}px; left: {{ $row['LeftPixel'] }}px;">';
                html += '   <div class="Layer-Cont">';
                html += '       <a href="' + img_link_url + '" target="_{{ $row['LinkType'] }}">';
                html += '           <img src="{{ $row['PopUpFullPath'] }}{{ $row['PopUpImgName'] }}" usemap="#PopupImgMap{{ $row['PIdx'] }}"/>';
                html += '       </a>';
                html += '   </div>';
                html += '   <ul class="btnWrapbt popbtn mt10">';
                html += '       <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="1">하루 보지않기</a></li>';
                html += '       <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="">Close</a></li>';
                html += '   </ul>';

                @if(empty($row['PopUpImgMapData']) === false)
                    html += '<map name="PopupImgMap{{ $row['PIdx'] }}">';
                    @foreach($row['PopUpImgMapData'] as $map_row)
                        @if(empty($map_row['LinkUrl']) === false)
                            map_link_url = '//{{ strpos($map_row['LinkUrl'], config_item('base_domain')) === false ? $map_row['LinkUrl'] : app_to_env_url($map_row['LinkUrl']) }}';
                        @else
                            map_link_url = '#none'
                        @endif

                        html += '<area shape="{{ $map_row['ImgType'] }}" coords="{{ $map_row['ImgArea'] }}" href="' + map_link_url + '" target="_{{ $row['LinkType'] }}"/>';
                    @endforeach
                    html += '</map>';
                @endif

                html += '</div>';
            }
        @endforeach

        if (html !== '') {
            html += '<div id="PopupBackWrap" class=""></div>';   // class => willbes-Layer-Black or willbes-Layer-Trans

            $('body').append(html);
            $('.PopupWrap').fadeIn();
            $('#PopupBackWrap').fadeIn();
        }

        // Close 버튼 클릭
        $('.PopupWrap').on('click', '.btn-popup-close', function() {
            var popup_idx = $(this).data('popup-idx');
            var hide_days = $(this).data('popup-hide-days');

            // popup close
            $(this).parents('.PopupWrap').fadeOut();

            // 하루 보지않기
            if (hide_days !== '') {
                var domains = location.hostname.split('.');
                var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                    domain: domain,
                    path: '/',
                    expires: hide_days
                });
            }

            // 전체 popup 창이 닫힐 경우 백그라운드 레이어 숨김 처리
            if ($('.PopupWrap').filter(':visible').length < 2) {
                $('#PopupBackWrap').fadeOut();
            }
        });

        // 백그라운드 클릭
        /*$('#PopupBackWrap').on('click', function() {
            $('.PopupWrap').fadeOut();
            $('#PopupBackWrap').fadeOut();
        });*/
    });
@endif