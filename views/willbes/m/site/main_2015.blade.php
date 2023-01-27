@extends('willbes.m.layouts.master')

@section('content')
<style>
    .gosiTitle {
        font-size: 2.2vh;
        text-align: center;
        padding: 7vh 0 2vh;
        word-break: keep-all;
        line-height: 1.2;
    }
    .swiper-sec06-Wrap {
        position: relative;
        overflow: hidden;
        margin-top:7vh;
    }
    .swiper-sec06-Wrap .gosiTitle {
        padding: 0 0 20px;
    }
    .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
    .swiper-sec06-Wrap .swiper-slide {
        width: 208px; align-items: flex-start; margin-right:10px;
    }
    .swiper-sec06-Wrap .swiper-slide:last-child {margin-right:0}
    .swiper-sec06-Wrap .swiper-slide a {
        display: block;
    }
    .swiper-sec06-Wrap .swiper-slide img {
        max-width: 100%;
    }

    .csCenter li {
        width: 50%;
    }
    /* iPhone 5/SE */
    @@media only screen and (max-width: 374px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }            
    }
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .swiper-sec06-Wrap .swiper-slide {
            width: 150px; 
        }
    }
</style>
    <!-- Container -->
    <div id="Container" class="Container NG gosi mb40">
        {!! banner('M_메인_01', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}
        {!! banner('M_메인_02', 'MainSlider c_both mt20', $__cfg['SiteCode'], '0') !!}

        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>

        <div class="bannerSec01">
            {!! banner('M_메인_03', null, $__cfg['SiteCode'], '0') !!}
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->

    <script>   
        //교수진
        var swiper6 = new Swiper('.swiper-sec06', {
        slidesPerView: 'auto',
        slidesPerColumn: 1,
        spaceBetween: 10,
        autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });

    </script> 
@stop