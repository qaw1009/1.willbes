@extends('willbes.pc.layouts.master')

@section('content')
<style>
    .cop_acad .Menu h3 {border:0}
</style>
    <!-- Container -->
    <div id="Container" class="Container cop_acad NGR c_both">
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section1">
            <div class="MainVisualAcad">
                <div class="VisualBoxAcad">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), '_slider_big_banner') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section barfull">
            <div>
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner']), '_slider_belt_banner') !!}
            </div>
        </div>

        <div class="Section MainVisual_acad2 mt50">
            <div class="widthAuto">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_상품배너'.$i]) === true)
                            <li class="VisualsubBox_acad2">
                                {!! banner_html(element('메인_상품배너'.$i, $data['arr_main_banner']),'','','','','','',true) !!}
                            </li>
                        @endif
                    @endfor

                    <li class="VisualsubBox_acad2">
                        <div class="bSlider">
                            @if(isset($data['arr_main_banner']['메인_상품배너4']) === true)
                                {!! banner_html(element('메인_상품배너4', $data['arr_main_banner']),'slider','','','','','',true) !!}
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <div class="f_left">
                    @if(empty($data['arr_main_banner']['메인_특별관리반']) === false)
                        <div class="will-acadTit">합격을 위한 <span class="tx-color">관리반</span> 시스템</div>
                        <div class="cop-bnSec-left">
                            <div id="MainRollingDiv" class="MaintabList five">
                                <ul class="Maintab">
                                    @foreach($data['arr_main_banner']['메인_특별관리반'] as $row)
                                        <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="MainRollingSlider" class="MaintabBox">
                                {!! banner_html($data['arr_main_banner']['메인_특별관리반'], 'MaintabSlider') !!}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="newLecture">
                    <div class="will-acadTit">교수팀 <span class="tx-color">신규강좌</span> 리스트</div>
                    <div class="bSlider">
                        <div class="slider">
                            @foreach($data['new_product'] as $row)
                                @if($loop->index % 3 == 1)
                                    <div>
                                @endif
                                        <dl>
                                            <dt><span><img src="{{ $row['ProfLecDetailImg'] }}" alt="{{ $row['ProfNickName'] }}"></span></dt>
                                            <dd>
                                                <p>{{ $row['CourseName'] }}   {{ $loop->index % 3 }}</p>
                                                <p class="NSK-Black"><a href="{{ front_url('/offLecture/show/cate/' . $row['CateCode'] . '/prod-code/' . $row['ProdCode']) }}">{{ $row['ProdName'] }}</a></p>
                                                <p>{{ $row['SubjectName'] }} {{ $row['ProfNickName'] }}</p>
                                            </dd>
                                        </dl>
                                @if($loop->index % 3 == 0)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="Section mb50">--}}
        {{--            <div class="widthAuto">--}}
        {{--                <div class="will-acadTit">교수별 <span class="tx-color">빠른강좌</span> 찾기</div>--}}
        {{--                <ul class="caProfBox">--}}
        {{--                    @for($i=1; $i<=8; $i++)--}}
        {{--                        <li>--}}
        {{--                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner'])) !!}--}}
        {{--                        </li>--}}
        {{--                    @endfor--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    <!-- 교수별 빠른강좌 //-->

        <div class="Section passCurri mt50">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2002/2002_img_1120.jpg" title="합격 프로그램">
                <div><a href="{{ front_url('/offinfo/boardInfo/index/78') }}" class="NSK-Black">윌비스 경찰학원 일정보기 ></a></div>
            </div>
        </div>

        {{-- on air include --}}
        @include('willbes.pc.site.main_partial.on_air')

        <div class="Section mt40">
            <div class="widthAuto">
                <div class="sliderSuccess">
                    <div class="will-acadTit">윌비스 <span class="tx-color">경찰</span> 학원소식</div>
                    <div class="sliderSuccessPlay">
                        {!! banner_html(element('메인_학원소식1', $data['arr_main_banner'])) !!}
                    </div>
                </div>
                <div class="sliderInfo">
                    <div class="will-acadTit"><span class="tx-color">이달의 추천강좌</span></div>
                    {!! banner_html(element('메인_학원소식2', $data['arr_main_banner'])) !!}
                </div>
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section4 mb50 mt30">
            @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    @if (date('YmdHi') <= '202103060900')
        {{--//유튜브 모달팝업--}}
        <style type="text/css">
            #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block; z-index: 106}
        </style>
        <div id="Popup200916" class="PopupWrap2 modal willbes-Layer-popBox" style="display: none;">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/146yrfkqJgM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap2" class="willbes-Layer-Black"></div>
        {{--유튜브 모달팝업//--}}
    @endif


    <script type="text/javascript">
        //유튜브 모달팝업 close 버튼 클릭
        var youtube_html;
        $(document).ready(function() {
            $('.PopupWrap2').on('click', '.btn-popup-close', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');

                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap2').fadeOut();

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
                if ($(this).parents('.PopupWrap2').hasClass('modal') === true) {
                    $('#PopupBackWrap2').fadeOut();
                }
            });

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap2.willbes-Layer-Black').on('click', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');
                $('.PopupWrap2.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_860') !== 'done') {
                $('.PopupWrap2').fadeIn();
                $('#PopupBackWrap2').fadeIn();
            }
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], '0', 'blank') !!}
@stop
