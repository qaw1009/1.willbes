@extends('willbes.m.layouts.master')

@section('content')
    <style>
         .gosi .swiper-sec04 {
            position: relative;
            overflow: hidden;
            background:#c0bcb0;  
            margin-top:30px;
            padding-bottom:3vh;
        }
         .gosi .swiper-sec04 .gosiTitle {color:#fff}
         .gosi .swiper-sec04 .swiper-wrapper {display: flex; justify-content: space-between; padding-left:20px; height: auto;}
         .gosi .swiper-sec04 .swiper-container-sec04 .swiper-slide {
            width: 208px; margin-right:20px; align-items: flex-start; background:none;
        }
         .gosi .swiper-sec04 .swiper-slide a {
            display: block;
        }
         .gosi .swiper-sec04 .swiper-slide img {
            max-width: 100%;
        }

        /* iPhone 5/SE */
        @@media only screen and (max-width: 374px) {
            .gosi .swiper-sec04 .gosiTitle {padding-top:30px}
            .gosi .swiper-sec04 .swiper-wrapper {padding-left:10px}
            .gosi .swiper-sec04 .swiper-container-sec04 .swiper-slide {
                width: 130px; margin-right:10px;
            }
        }
    </style>

    <div id="Container" class="Container NSK gosi mb40">
        {!! banner('M_메인상단', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
        {!! banner('M_메인빅배너', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
        {!! banner('M_메인서브', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

        <div class="swiper-sec04">
            <div class="gosiTitle NSK">
                합격을 책임지는 <strong class="NSK-Black">윌비스 교수진</strong>
            </div>
            {!! banner('M_메인_교수진', 'swiper-container-sec04', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
        </div>

        {{-- 게시판 --}}
        <div class="noticeTabs c_both mt30">
            @include('willbes.m.site.main_partial.board')
        </div>

        {{-- cs box --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            //교수진
            new Swiper('.swiper-container-sec04', {
                slidesPerView: 'auto',
                slidesPerColumn: 1,
                spaceBetween: 0,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
            });
        });
    </script>
    {!! popup('657007', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop