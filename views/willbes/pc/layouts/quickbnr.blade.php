@if(in_array($__cfg['SiteCode'],['2017','2018']) === true) {{-- 임용 --}}
    @if(strpos($_SERVER['REQUEST_URI'], '/promotion/index') === false) {{-- 프로모션 제외 --}}
        <div id="QuickMenu" class="MainQuickMenuSSam NGR">
            <ul id="dday_box"></ul>
            <ul class="gobtn">
                <li><a href="{{ site_url('/pass/board/schedule') }}">강의실배정표</a></li>
                <li><a href="{{ site_url('/support/mobile/index') }}">모바일 수강안내</a></li>
                <li><a href="{{ site_url('/support/qna/index') }}">1:1 상담</a></li>
                <li><a href="{{ site_url('/event/list/ongoing') }}">이벤트</a></li>
                <li><a href="{{ site_url('/landing/show/lcode/1040/cate/3134') }}">재학생 러닝메이트</a></li>
                <li><a href="#">TOP ▲</a></li>
            </ul>
        </div>

        <script>
            $(function (){
                getSubPageData(['dday']);
            });
        </script>
    @endif
@endif

<script>
    // 서브페이지 공용 함수
    function getSubPageData(methods){
        var _url = "{{ site_url('/common/subPage') }}";
        var data = {
            '{{ csrf_token_name() }}' : '{{ csrf_token() }}',
            'method' : methods,
        };
        sendAjax(_url, data, function(ret) {
            if (ret.ret_data) {
                var html = '';
                $.each(methods, function (k, method) {
                    if(ret.ret_data[method]){
                        switch (method){
                            case "dday":
                                html = getDdayHtml(ret.ret_data.dday);
                                break;

                            default: html = '';
                        }

                        $('#' + method + '_box').html(html);
                    }
                });
            }
        }, showError, false, 'POST');
    }

    // Dday html
    function getDdayHtml(data){
        var add_html = '';
        add_html += '<li class="dday">';
        add_html += '<div class="QuickSlider">';
        add_html += '<div class="sliderNum">';
        $.each(data, function (k, v) {
            add_html += '<div class="QuickDdayBox">';
            add_html += '<div class="q_tit">' + v.DayTitle + '</div>';
            add_html += '<div class="q_day">' + v.DayDatm + '</div>';
            add_html += '<div class="q_dday NSK-Black">' + (v.DDay == 0 ? 'D-' + v.DDay : 'D' + v.DDay ) + '</div>';
            add_html += '</div>';
        });
        add_html += '</div>';
        add_html += '</div>';
        add_html += '</li>';

        return add_html;
    }
</script>