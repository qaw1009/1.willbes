@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_job_v2.css??ver={{time()}}" rel="stylesheet">

    <!-- Container -->
    <div id="Container" class="Container job job309002 NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.site._viewTest.main_partial.site_menu')

        <div class="Section mt20">
            <div class="widthAuto">
                {!! banner_html(element('메인_상단띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner']), 'slider') !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'slider') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt50">
            @include('willbes.pc.site._viewTest.main_partial.content_menu_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        {{--최근 업로드 강좌--}}
        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    최근 <span class="tx-color">업로드</span> 강좌
                    <span class="f_right tx12 NSK-Thin pt10">* 최근 1주일 이내 업데이트된 강좌들 입니다.</span>
                </div>
                <div class="uploadLec NSK">
                    <div class="vSlider">
                        <div class="sliderNumV">
                            @foreach($data['lecture_update_info'] as $row)
                                @if($loop->index % 2 == 1)
                                    <div>
                                        @endif
                                        <div class="lecReview">
                                            <a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">
                                                <div class="imgBox">
                                                    <img src="{{$row['ProfLecListImg']}}">
                                                </div>
                                                <div class="lecinfo">
                                                    <p>{{$row['SubjectName']}} {{$row['ProfNickName']}}</p>
                                                    <p>{{ $row['ProdName'] }}</p>
                                                    <p>{{ date("m", strtotime($row['unit_regdate'])) }}월 {{ date("d", strtotime($row['unit_regdate'])) }}일 총 {{ $row['unit_cnt'] }}강 업로드</p>
                                                </div>
                                            </a>
                                        </div>
                                        @if($loop->index % 2 == 0)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section hotIssue mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    한림법학원 <span class="tx-color">Hot Issue!</span> <span class="NSK ml20 tx16">학원강의일정 및 이벤트 등 중요내용을 확인하세요.</span>
                </div>
                <ul>
                    @if(empty($data['arr_main_banner']['메인_리스트']) === false)
                        @foreach($data['arr_main_banner']['메인_리스트'] as $key => $val)
                            {{--<li>{!! banner_html([0 => $val], 'slider') !!}</li>--}}
                            <li>{!! banner_html([0 => $val]) !!}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>


        <div class="Section SecBanner12">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    전문 <span class="tx-color">교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                </div>
                <ul class="pro_box">
                    @for($i=1;$i<=10;$i++)
                        @if(isset($data['arr_main_banner']['메인_전문교수진' . $i]) === true)
                            <li class="bSlider">
                                {!! banner_html(element('메인_전문교수진'.$i, $data['arr_main_banner']),'slider') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_off')
            </div>
        </div>


        {{-- 대표 강의 맛보기--}}
        <div class="Section Section1 mt100">
            <div class="widthAuto">
                <div class="will-nTit">
                    <strong class="NSK-Black">윌비스</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
                </div>
                <div class="preview NSK">
                    <div class="previewBox">
                        <ul class="pvslider">
                            @if(!empty($data['new_product']))
                                @foreach($data['new_product'] as $row)
                                    @php
                                        $sample_info = [];
                                        if($row['LectureSamplewUnit'] !== 'N') {
                                            $sample_info = json_decode($row['LectureSamplewUnit'], true);
                                        }
                                    @endphp
                                    <li>
                                        <a href="javascript:{{!empty($sample_info[0]['wUnitIdx']) ? "fnPlayerSample('".$row["ProdCode"]."','".$sample_info[0]["wUnitIdx"]."','".($sample_info[0]["wHD"] != '' ? 'HD' : 'SD')."')" : "alert('샘플영상 준비중입니다.')" }};">
                                            <img src="{{$row['ProfIndexImg'] or ''}}">
                                            <div>
                                                {{$row['ProdName']}}<BR>
                                                {{empty($sample_info) ? '' : $sample_info[0]['wUnitName']}}
                                                <strong>{{$row['SubjectName']}} {{$row['ProfNickName']}}</strong>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>
            </div>
        </div>

        {{--학원 오시는 길--}}
        @include('willbes.pc.site._viewTest.main_partial.map_2006')

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'] .'_off')
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenu" class="QuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site._viewTest.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script type="text/javascript">
        //최근 업로드 강좌
        $(function() {
            $('.sliderNumV').bxSlider({
                mode: 'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                pause: 3000,
                autoHover: true,
                pager:true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });

        //바로가기 스크롤 배너
        $('*[id*=go_MenuBtns]:visible').ready(function () {
            var stickyOffset = $('.go_MenuBtns').offset();

            if (typeof stickyOffset !== 'undefined') {
                $(window).scroll(function () {
                    if ($(document).scrollTop() > stickyOffset.top) {
                        $('.go_MenuBtns').addClass('fixed');
                    } else {
                        $('.go_MenuBtns').removeClass('fixed');
                    }
                });
            }
        });

        //대표강의맛보기
        $(function() {
            var slidesImg = $(".lbSlider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 282,
                slideMargin:38,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        $(function() {
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
        });
    </script>
@stop