@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container lang c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="VisualsubBox">
                <div class="bSlider">

                    {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}

                </div>
            </div>
        </div>
        

        <div class="Section Section1">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual01.jpg" alt="">
        </div>
    </div>

    <div class="Section Section2">
        <div class="widthAuto">
            <iframe src="https://www.youtube.com/embed/Oqc0yoIIIsw?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
        </div>
    </div>

    <div class="Section Section3">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual03.jpg" alt="">
        </div>
    </div>

    <div class="Section Section4 NGR">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual04.jpg" alt="시험 접수방법" usemap="#Map3093A" border="0">
            <map name="Map3093A" id="Map3093A">
                <area shape="rect" coords="837,299,1043,341" href="https://www.g-telp.co.kr:335/" target="_blank" alt="인터넷 접수 바로가기" />
            </map>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.018409696558!2d127.11567647087642!3d37.49509369349401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca58fab795a41%3A0x2fab085681355d29!2z7ISc7Jq47Yq567OE7IucIOyGoe2MjOq1rCDqsIDrnb3rj5kg7Iah7YyM64yA66GcMzLquLggNC03!5e0!3m2!1sko!2skr!4v1537275097078" frameborder="0" allowfullscreen=""></iframe>
            <p>문의 : (주)한국지텔프 1588-0589</p>
            <p class="mt40 tx-red tx14">* 고사장에서는 시험접수를 받지 않습니다.</p>
        </div>     
    </div>

    <div class="Section Section5">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual05.jpg" alt="" usemap="#Map3093B" border="0">
            <map name="Map3093B" id="Map3093B">
                <area shape="rect" coords="40,380,671,595" href="https://lang.willbes.net/book/index/cate/3093" target="_blank" alt="교재 자세히 보기" />
            </map>
        </div>
    </div>

    <div class="Section Section6">
        <div class="widthAuto">
            <img src="https://static.willbes.net/public/images/promotion/main/3093_visual06.jpg" alt="" usemap="#Map3093C" border="0">
            <map name="Map3093C" id="Map3093C">
                <area shape="rect" coords="120,751,325,794" href="{{ front_url('/guide/show/cate/3093/pattern/gtelp') }}" target="_blank"/>
                <area shape="rect" coords="452,752,655,793" href="https://lang.willbes.net/support/examAnnouncement/show/cate/3093?board_idx=240562" target="_blank" />
                <area shape="rect" coords="785,750,979,796" href="https://www.g-telp.co.kr:335/" target="_blank"/>
            </map>
        </div>
    </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">  
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop