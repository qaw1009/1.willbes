@extends('willbes.pc.layouts.master')

@section('content')
<style>
/* Main Container : MainVisual */
.hanlim .MainVisual {
    position: relative;
    width: 1120px;
    margin:40px auto 0;
    height: 360px;
}

.hanlim .VisualBox {
    width:1120px;  
    height: 360px;
    overflow: hidden;
  }
.hanlim .VisualBox img {
    height: 360px;
}
</style>
    <!-- Container -->
    <div id="Container" class="Container hanlim hanlim{{$__cfg['CateCode']}} NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{--
        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>
        --}}

        
        <div class="Section">        
            <div class="MainVisual NSK">            
                <div class="VisualBox">
                    <div class="bSlider">
                        <div class="sliderStopAutoPager">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_01.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_02.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_03.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </div>   
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto bnSt02">
                <div class="bSlider bnLeft">                    
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>   
                <div class="bSlider bnRight">
                    <div class="slider">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_03.jpg" alt="배너명"></a></div>
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

        <div class="Section mt50">
            <div class="goMenu">
                {{-- 학원수강신청, 학원보강, 강의실배정표, 신규동영상안내, 무료특강, 강의자료실 버튼 --}}
                @include('willbes.pc.site.main_partial.content_menu_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
            </div>
        </div>

        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    꿈을 향한 소중한 첫 걸음부터 합격의 순간까지!<br />
                    <strong class="NSK-Black">32년을 이어온 대표전문학원, 윌비스 한림법학원이 함께 합니다!!</strong>
                </div>
                <ul>
                    @if(empty($data['arr_main_banner']['메인_리스트']) === false)
                        @foreach($data['arr_main_banner']['메인_리스트'] as $key => $val)
                            <li>
                                {!! banner_html([0 => $val], 'slider') !!}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        {{--이달의 강의 / 강의맛보기 --}}
        <div class="Section Section1">
            <div class="widthAuto">
                <div class="copyTit">
                윌비스 한림법학원 <strong class="NSK-Black">이달의 강의</strong>
                </div>
                <div class="thisMonth NSK">
                    <div class="thisMonthBox">
                        <ul class="tmslider">
                            @if(!empty($data['best_product']))
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
                    윌비스 한림법학원 <strong class="NSK-Black">대표 강의 맛보기</strong>
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
        @include('willbes.pc.site._viewTest.main_partial.map_2010')

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenuB" class="QuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site._viewTest.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script type="text/javascript">
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