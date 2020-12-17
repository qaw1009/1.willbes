@extends('willbes.pc.layouts.master')

@section('content')

    <!-- Container -->
    <div id="Container" class="Container cop2008v2 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), '_slider_big_banner') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner']), '_slider_sub_banner1') !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), '_slider_sub_banner2') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">윌비스 <span class="tx-color">경찰 캐스트</span></div>
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

        <div class="Section mt50">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto">
                <ul id="goMenu" class="goMenu" >
                    <li><a href="{{ front_url('/OffVisitLecture') }}">학원수강신청<span>|</span></a></li>
                    <li><a href="{{ front_url('/lecture/index/cate/'.$__cfg['CateCode'].'/pattern/free?search_order=course&course_idx=1372') }}">학원보강<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/82?s_cate_code='.$data['mapping_cate_data']['CateCode']) }}">강의실배정표<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/80?s_cate_code='.$data['mapping_cate_data']['CateCode']) }}">강의시간표<span>|</span></a></li>
                    <li><a href="{{ front_url('/lecture/index/cate/'.$__cfg['CateCode'].'/pattern/free') }}">무료특강<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/110?s_cate_code=3110') }}">강의자료실</a></li>
                </ul>
            </div>
        </div>

        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    개편 전 마지막 시험, 이젠 <strong class="NSK-Black"><span class="tx-color2">처음부터 실전처럼 </span></strong>공부해야 합니다.<br />
                    <strong class="NSK-Black"><span class="tx-color2">윌비스 한림법학원</span></strong>이 수험생을 위한 프로그램을 준비하였습니다.
                </div>
                <ul>
                    @if(empty($data['arr_main_banner']['메인_리스트']) === false)
                        @foreach($data['arr_main_banner']['메인_리스트'] as $key => $val)
                            <li>
                                {!! banner_html([0 => $val]) !!}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        {{--이달의 강의 / 강의맛보기 --}}
        <div class="Section Section1">
            <div>
                <div class="copyTit">
                    <strong class="NSK-Black">WILLBES 경찰간부·일반경찰</strong> <strong class="NSK-Black"><span class="tx-color">이달의 강의</span></strong>
                </div>
                <div class="thisMonth NSK">
                    <div class="thisMonthBox">
                        <ul class="tmslider">
                            @if(empty($data['best_product']) === false)
                                @foreach($data['best_product'] as $row)
                                    <li>
                                        <a href="{{front_url('/lecture/show/pattern/only/cate/'.$row['CateCode'].'/prod-code/'.$row['ProdCode'])}}">
                                            <img src="{{$row['ProfIndexImg'] or ''}}">
                                            <div class="tx-color">{{$row['ProdName']}}
                                                <span class="NSK-Black">{{$row['ProfNickName']}}</span>
                                            </div>
                                            <div>{{$row['ProdMainIntroMemo']}}</div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>

                <div class="copyTit mt100">
                    <strong class="NSK-Black">WILLBES 경찰간부·일반경찰</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
                </div>
                <div class="preview NSK">
                    <div class="previewBox">
                        <ul class="pvslider">
                            @if(empty($data['new_product']) === false)
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

        <div class="Section Section4_hl mt50">
            <div class="widthAuto">
                <div class="will-acadTit bdb-black2 mb30">윌비스 <span class="tx-color">경찰간부</span> 학원</div>
                {{--학원 오시는 길--}}
                @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>    
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script>
        $(function() {
            var slidesImg = $(".tmslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 274,
                slideMargin:8,
                autoHover: true,
                moveSlides:1,
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });

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