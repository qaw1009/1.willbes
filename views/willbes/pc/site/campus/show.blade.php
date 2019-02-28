@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re PA">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>

            <div class="subSection01 bSlider acad">
                <div class="slider">
                    <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_190211_01.jpg') }}" alt="배너명"></a></div>
                    <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_190211_02.jpg') }}" alt="배너명"></a></div>
                </div>
            </div><!-- subSection01// -->
            <div class="subSection02 mt20">
                <ul>
                    <li>
                        <div class="bSlider acad blue">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad blue">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div><!-- subSection02// -->

            <div class="noticeTabs acad">
                <a name="tabLink"></a>
                <ul class="tabWrap noticeWrap_acad three NSK">
                    <li><a href="#none" id="hover_notice" onclick="goUrl('tab', 'notice');">공지사항</a></li>
                    <li><a href="#none" id="hover_qna" onclick="goUrl('tab', 'qna');">1:1상담</a></li>
                    <li><a href="#none" id="hover_map" onclick="goUrl('tab', 'map');">오시는 길</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="{{ $arr_input['tab'] }}" class="tabContent p_re">
                        @include('willbes.pc.site.campus.tab_' . $arr_input['tab'] . '_partial')
                    </div>
                </div>
            </div>
        </div>
        {!! banner('전국캠퍼스_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            @if($is_tab_select === true)
            // 선택된 탭이 있을 경우 자동 스크롤
            $("html, body").animate({ scrollTop: $('a[name="tabLink"]').offset().top }, 0);
            @endif
        });

        $(function() {
            $('.noticeTabs .tabWrap li a').removeClass('on');
            $('.noticeTabs .tabWrap #hover_{{ $arr_input['tab'] }}').addClass('on');
            $('.noticeTabs .tabBox .tabContent').css('display', 'block');
        });
    </script>
@stop