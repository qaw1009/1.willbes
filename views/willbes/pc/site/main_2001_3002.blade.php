@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container adm NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{--학원배너--}}
        <div class="Section">
            <div class="widthAuto">
                <ul class="bnSec01">
                    <li>
                        {!! banner_html(element('메인_상단1', $data['arr_main_banner'])) !!}
                    </li>
                    <li><a href="/"><img src="https://static.willbes.net/public/images/promotion/main/3001_logo.jpg"></a></li>
                    <li>
                        {!! banner_html(element('메인_상단2', $data['arr_main_banner']), '_slider_top_banner2') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="SectionBg">
            <div class="Section">
                <div class="widthAuto bnSecbar01">
                    {!! banner_html(element('메인_핵심띠배너', $data['arr_main_banner']), '_slider_belt_banner') !!}
                </div>
            </div>

            <div class="widthAuto mt50">
                <div class="f_left nSlider pick">
                    {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), '_num_slider_big_banner') !!}
                </div>
                <div class="f_right nSlider pick">
                    {!! banner_html(element('메인_서브', $data['arr_main_banner']), '_num_slider_sub_banner') !!}
                </div>
            </div>
        </div>

        <div class="Section HotIssue mt50">
            <ul class="widthAuto">
                <li>{!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브2', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브3', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브4', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브5', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브6', $data['arr_main_banner'])) !!}</li>
            </ul>
        </div>

        {{--최근 업로드 강좌--}}
        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">
                    최근 <span class="cop-color">업로드 강좌</span>
                    <a href="{{ front_url('/updateLectureInfo') }}" class="btn-add f_right"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
                </div>
                <div class="upload">
                    <div class="sliderNumV vSlider">
                        @foreach($data['lecture_update_info'] as $row)
                            <div><a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">{{$row['SubjectName']}} {{$row['ProfNickName']}} <span>|</span> <strong>{{$row['ProdName']}}</strong> <strong>▶ 총 {{$row['unit_cnt']}}강 업로드</strong></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{--경찰 개편 시험 대비 전문교수진--}}
        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">경찰 개편 시험 대비 <span class="cop-color">전문교수진</span></div>
                <ul class="onProfBox three">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_전문교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_전문교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">경찰합격 <span class="cop-color">전문교수진</span></div>
                <ul class="ProfCopBox mt20">
                    @for($i=1; $i<=5; $i++)
                        <li>
                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner'])) !!}
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section bnSec02 mt50">
            <div class="widthAuto">
                <ul>
                    <li>
                        {!! banner_html(element('메인_미들1', $data['arr_main_banner'])) !!}
                    </li>
                    <li>
                        {!! banner_html(element('메인_미들2', $data['arr_main_banner'])) !!}
                    </li>
                    <li class="sliderbnSec02 nSlider pick">
                        {!! banner_html(element('메인_미들3', $data['arr_main_banner']), '_num_slider_middle_banner3') !!}
                    </li>
                    <li class="sliderbnSec02 nSlider pick">
                        {!! banner_html(element('메인_미들4', $data['arr_main_banner']), '_num_slider_middle_banner4') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section HotIssue mt80">
            @include('willbes.pc.site.main_partial.hot_issue_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>
        <!-- HotIssue //-->

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="sliderPick nSlider pick">
                    <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
                    <div class="pickBox pick1">
                        {!! banner_html(element('메인_hotpick1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="pickBox pick2">
                        {!! banner_html(element('메인_hotpick2', $data['arr_main_banner'])) !!}
                    </div>
                </div>
                <div class="sliderEvt nSlider pick">
                    <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 무료특강</div>
                    <ul>
                        {!! banner_html(element('메인_hotpick3', $data['arr_main_banner'])) !!}
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">경찰 캐스트</span></div>
                <div class="preview">
                    <div class="previewBox">
                        <ul class="pvslider">
                            @php
                                foreach ($data['arr_main_banner'] as $key => $val) {
                                    if (strpos($key, '메인_cast') !== false) {
                                        echo '<li>'.banner_html(element($key, $data['arr_main_banner']), '', '' , false, '', '', 'castTitle').'</li>';
                                    }
                                }
                            @endphp
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt30">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt50 mb50">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.onCollaborate_2001')
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    @if (date('YmdHi') <= '202009191159')
        {{--//유튜브 모달팝업--}}
        <style type="text/css">
            #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
        </style>
        <div id="Popup200916" class="PopupWrap modal willbes-Layer-popBox" style="display: none;">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/_t7QIFe_Rh0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>
        {{--유튜브 모달팝업//--}}
    @endif

    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $("#collaboslides ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
            });

            //하단이벤트배너 닫기
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });

            //경찰캐스트
            var slidesImg1 = $(".pvslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 460,
                slideMargin:10,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });

            //최근 업로드 강좌
            $('.sliderNumV').bxSlider({
                mode: 'vertical',
                auto: true,
                controls: true,
                infiniteLoop: true,
                pagerType: 'short',
                minSlides: 1,
                pause: 4000,
                pager: true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
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

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
