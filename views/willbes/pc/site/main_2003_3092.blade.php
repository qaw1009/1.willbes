<style>
.video_area{position:relative;}
.youtubeGods{position:absolute;top:35%;left:12.5%;}
.youtubeGods iframe{width:853px;height:480px;}
</style>
@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container free NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        
        <div class="Section MainVisual">
            <div class="widthAuto NSK mt30">
                <div class="VisualsubBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto bSlider">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner']), 'sliderPlay') !!}
            </div>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto">
            <div class="video_area">
                <img src="https://static.willbes.net/public/images/promotion/main/3092_video.jpg" alt="유튜브"/>            
                <div class="youtubeGods">
                    <iframe src="https://www.youtube.com/embed/81ulkDCF3ok?rel=0&autoplay=1" frameborder="0" allowfullscreen="" ></iframe>     
                </div>
            </div>
        </div>
    </div>       

    <div class="SectionBook">
        <div class="buyBook NGEB">
            <a href="https://pass.willbes.net/book/index/cate/3092">지금 바로 교재 구매하기 ></a>
        </div>
        <div class="box-book">
            <ul class="slidesBook">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book01.jpg" alt="국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book02.jpg" alt="영어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book03.jpg" alt="한국사"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book04.jpg" alt="행정학"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book05.jpg" alt="행정법총론"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book01.jpg" alt="국어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book02.jpg" alt="영어"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book03.jpg" alt="한국사"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book04.jpg" alt="행정학"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/11/1449_03_book05.jpg" alt="행정법총론"/></li>
            </ul>
        </div>  
    </div>

    <div id="Container" class="Container free NGR c_both">
        <div class="Section">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/3092_visual_01.gif" alt="제로백 안내">
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto mt80">
                <img src="https://static.willbes.net/public/images/promotion/main/3092_1120x125.gif" alt="제로백 교재">
                <ul class="PBcts mt30">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_wide')
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

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function() {
            $('.sliderPlay').bxSlider({
                auto: true,
                controls: false,
                pause: 4000,
                moveSlides:2,
                minSlides:2,
                maxSlides:2,
                slideWidth:1120,
                slideMargin:6,
                autoHover: true,
                onSliderLoad: function(){
                    $(".bSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });

        $(document).ready(function() {
            var BxBook = $('.slidesBook').bxSlider({
                slideWidth: 153,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
