@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="subContainer PA widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>

        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>

            <div class="subSection01 bSlider acad">
                {!! banner_html(element('캠퍼스_메인', $arr_base['arr_main_banner']), 'slider') !!}
            </div><!-- subSection01// -->
            <div class="subSection02 mt20">
                <ul>
                    <li>
                        <div class="bSlider acad blue">
                            {!! banner_html(element('캠퍼스_서브1', $arr_base['arr_main_banner']), 'slider') !!}
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad blue">
                            {!! banner_html(element('캠퍼스_서브2', $arr_base['arr_main_banner']), 'slider') !!}
                        </div>
                    </li>
                </ul>
            </div><!-- subSection02// -->

            {{-- 대구,부산,인천,광주 캠퍼스 --}}
            @if(($__cfg['SiteCode'] == '2002' || $__cfg['SiteCode'] == '2004') && ($campus_code == '605003' || $campus_code == '605004' || $campus_code == '605005' || $campus_code == '605006'))
                <div class="subSection02 mt20" @if(empty($arr_base['arr_main_banner']['캠퍼스_서브3']) === true && empty($arr_base['arr_main_banner']['캠퍼스_서브4']) === true) style="display:none;" @endif>
                    <ul>
                        @if(empty($arr_base['arr_main_banner']['캠퍼스_서브3']) === false)
                            <li>
                                <div class="bSlider acad blue">
                                    {!! banner_html(element('캠퍼스_서브3', $arr_base['arr_main_banner']), 'slider') !!}
                                </div>
                            </li>
                        @endif
                        @if(empty($arr_base['arr_main_banner']['캠퍼스_서브4']) === false)
                            <li>
                                <div class="bSlider acad blue">
                                    {!! banner_html(element('캠퍼스_서브4', $arr_base['arr_main_banner']), 'slider') !!}
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="subSection02 mt20" @if(empty($arr_base['arr_main_banner']['캠퍼스_서브5']) === true && empty($arr_base['arr_main_banner']['캠퍼스_서브6']) === true) style="display:none;" @endif>
                    <ul>
                        @if(empty($arr_base['arr_main_banner']['캠퍼스_서브5']) === false)
                            <li>
                                <div class="bSlider acad blue">
                                    {!! banner_html(element('캠퍼스_서브5', $arr_base['arr_main_banner']), 'slider') !!}
                                </div>
                            </li>
                        @endif
                        @if(empty($arr_base['arr_main_banner']['캠퍼스_서브6']) === false)
                            <li>
                                <div class="bSlider acad blue">
                                    {!! banner_html(element('캠퍼스_서브6', $arr_base['arr_main_banner']), 'slider') !!}
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif

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
        <div class="Quick-Bnr">
            {!! banner('캠퍼스_메인_우측퀵_01', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0', null, $campus_code) !!}
            {!! banner('캠퍼스_메인_우측퀵_02', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0', null, $campus_code) !!}
        </div>
        <div id="QuickMenu" class="MainQuickMenu">
            {{-- @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'] . '_campus') --}}
            @include('willbes.pc.site.main_partial.quick_menu_campus')
        </div>
    </div>

    {{-- 경찰학원 경기광주 캠퍼스 --}}
    @if(($__cfg['SiteCode'] == '2002') && ($campus_code == '605010'))
        <!--
        {{--//유튜브 모달팝업--}}
        <style type="text/css">
            #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
        </style>
        <div id="Popup200916" class="PopupWrap modal willbes-Layer-popBox">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/oG2U5f2IuWQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>
        -->
    @endif
    

    {!! popup('657001', $__cfg['SiteCode'], '0', $campus_code) !!}

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

        //유튜브 모달팝업 close 버튼 클릭
        var youtube_html;
        $(document).ready(function() {                
            $('.PopupWrap').on('click', '.btn-popup-close', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');

                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap').fadeOut();

                //하루 보지않기
                if (hide_days !== '') {
                    var domains = location.hostname.split('.');
                    var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                    $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                        domain: domain,
                        path: '/',
                        expires: hide_days
                    });
                }

                // 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리
                if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                    $('#PopupBackWrap').fadeOut();
                }
            });

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');
                $('.PopupWrap.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_860') !== 'done') {
                $('#Popup').show();
                $('.PopupWrap').fadeIn();
                $('#PopupBackWrap').fadeIn();
            }
        });
    </script>
@stop