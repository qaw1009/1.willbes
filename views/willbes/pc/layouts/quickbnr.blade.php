@if(in_array($__cfg['SiteCode'],['2017','2018']) === true) {{-- 임용 --}}
    @if(strpos($_SERVER['REQUEST_URI'], '/promotion/index') === false) {{-- 프로모션 제외 --}}
        <div id="QuickMenuC" class="MainQuickMenuSSam NGR">
            <ul id="dday_box"></ul>
            <ul class="gobtn NG">
                <li>
                    <a href="{{ site_url('/lecture/index/pattern/free?cate_code=') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick00.png" title="무료강의" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick00_on.png" title="무료강의" class="on">
                        <p>무료강의</p>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/pass/board/schedule') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick01.png" title="강의실배정표" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick01_on.png" title="강의실배정표" class="on">
                        <p>강의실배정표</p>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/mobile/index') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick02.png" title="모바일수강안내" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick02_on.png" title="모바일수강안내" class="on">
                        <p>모바일<br>수강안내</p>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/qna/create?') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick03.png" title="1:1상담" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick03_on.png" title="1:1상담" class="on">
                        <p>1:1상담</p>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/event/list/all') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick04.png" title="이벤트" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick04_on.png" title="이벤트" class="on">
                        <p>이벤트</p>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/landing/show/lcode/1040/cate/3134') }}">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick05.png" title="재학생러닝메이트" class="off">
                        <img src="https://static.willbes.net/public/images/promotion/main/2018/ssam_quick05_on.png" title="재학생러닝메이트" class="on">
                        <p>재학생<br>러닝메이트</p>
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