@extends('willbes.m.layouts.master')

@section('content')
@if(ENVIRONMENT == 'local' || ENVIRONMENT == 'development')
    <!-- Container -->
    <div id="Container" class="Container NSK gosi mb40">       

        {!! banner('M_메인상단03', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}

        {{--
        <div class="gosiTitle NSK-Black">
            합격을 위해 필요한 모든 것, 윌비스PASS
        </div>
        --}}

        {!! banner('M_메인빅배너', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}

        <div class="gosiTitle NSK-Black">
            공무원, 어떻게 시작할지 고민이라면?
        </div>

        <div class="gosiSecBn01">
            <ul>
                <li class="f_left">{!! banner('M_메인상단01', '', $__cfg['SiteCode'], '0') !!}</li>
                <li class="f_right">{!! banner('M_메인상단02', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>

        <div class="gosiTitle NSK-Black">
            지금 윌비스 공무원학원에서는?
        </div>

        {!! banner('M_메인_실강안내', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="gosiTitle NSK-Black">
            합격을 책임질 윌비스 교수진
        </div>

        <div class="gosiProf">
            {!! banner('M_메인_교수진', 'swiper-container-prof', $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="gosiTitle NSK-Black">
            합격을 앞당기는 수험생활 TIP
        </div>

        <div class="gosiTip">
            {!! banner('M_메인_cast', 'swiper-container-tip', $__cfg['SiteCode'], '0', 'bnTit') !!}
        </div>

        <div class="noticeTabs c_both mt30">
            {{-- 게시판 --}}
            @include('willbes.m.site.main_partial.board')
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            // 교수진
            new Swiper('.swiper-container-prof', {
                slidesPerView: 'auto',
                slidesPerColumn: 2,
                spaceBetween: 30,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, // 3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        spaceBetween: 10,
                    },
                }
            });

            // 수험생활 팁
            new Swiper('.swiper-container-tip', {
                slidesPerView: 'auto',
                spaceBetween: 5,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, // 3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
@else
    <!-- Container -->
    <div id="Container" class="Container NG c_both mb20">
        {!! banner('M_메인_01', 'MainSlider c_both', $__cfg['SiteCode'], '0') !!}
        <div class="MainFixBnr c_both">
            <ul>
                <li>{!! banner('M_메인_02_01', '', $__cfg['SiteCode'], '0') !!}</li>
                <li>{!! banner('M_메인_02_02', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>
        {!! banner('M_메인_03', 'MainBnrSlider', $__cfg['SiteCode'], '0') !!}
        <div class="line">-</div>
        <div class="buttonTabs noticeTabs c_both">
            {{-- board include --}}
            @include('willbes.m.site.main_partial.board')
        </div>
        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>
    <!-- End Container -->
@endif
@stop