@if(in_array($__cfg['SiteCode'],['2017','2018']) === true) {{-- 임용 --}}
    @if(strpos($_SERVER['REQUEST_URI'], '/promotion/index') === false) {{-- 프로모션 제외 --}}
        <div id="QuickMenu" class="MainQuickMenuSSam NGR">
            <ul id="dday_box"></ul>
            <ul class="gobtn">
                <li>
                    <a href="{{ site_url('/pass/board/schedule') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img01.png" title="강의실배정표" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img01_on.png" title="강의실배정표" class="on">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/mobile/index') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img02.png" title="모바일수강안내" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img02_on.png" title="모바일수강안내" class="on">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/qna/create?') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img03.png" title="1:1상담" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img03_on.png" title="1:1상담" class="on">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/event/list/ongoing') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img04.png" title="이벤트" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img04_on.png" title="이벤트" class="on">
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/landing/show/lcode/1040/cate/3134') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img05.png" title="재학생러닝메이트" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/quick_img05_on.png" title="재학생러닝메이트" class="on">
                    </a>
                </li>
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
                    if(ret.ret_data[method].length > 0){
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