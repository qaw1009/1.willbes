@if(empty($data) === false)
$(document).ready(function() {
    var html = '';

    @foreach($data as $row)
        @if($row['PopUpTypeName'] == 'modal')
            if ($.cookie('_wb_client_popup_{{ $row['PIdx'] }}') !== 'done') {
                @php $img_link_url = '#none'; @endphp
                @if(empty($row['LinkUrl']) === false && $row['LinkUrl'] != '#')
                    @php $img_link_url = front_app_url('/popup/click?popup_idx=' . $row['PIdx'] . '&return_url=' . urlencode($row['LinkUrl']), 'www'); @endphp
                @endif

                html += '<div class="popupBox NSK" id="modalPopup{{$row['PIdx']}}">';
                    html += '<div class="popupContent">';
                        html += '<div class="popbanner">';
                            html += '<a href="{!! $img_link_url !!}" target="_{{ $row['LinkType'] }}">';
                                html += '<img src="{{ $row['PopUpFullPath'] }}{{ $row['PopUpImgName'] }}">';
                            html += '</a>';
                        html += '</div>';
                    html += '</div>';
                    html += '<div class="btnClose">';
                        html += '<div><button class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="1">오늘 그만 보기</button></div>';
                        html += '<div><button class="btn-popup-close" data-popup-idx="{{ $row['PIdx'] }}" data-popup-hide-days="">닫기</button></div>';
                    html += '</div>';
                html += '</div>';
            }
        @endif
    @endforeach

    if (html !== '') {
        $('body').append(html);
    }

    $('.popupBox').on('click', '.btn-popup-close', function() {
        var popup_idx = $(this).data('popup-idx');
        var hide_days = $(this).data('popup-hide-days');

        {{--// 팝업 close --}}
        $(this).parents('.popupBox').fadeOut();

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
    });
});
@endif