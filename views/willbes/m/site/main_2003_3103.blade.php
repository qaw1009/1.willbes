@extends('willbes.m.layouts.master')

@section('content')
    <div id="Container" class="Container NSK gosi mb40">
        {!! banner('M_메인_빅배너', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
        {!! banner('M_메인_서브', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

        <div class="gosiTitle NSK">
            윌비스 한림법학원 <span class="NSK-Black">PSAT 최강팀</span>
        </div>
        <div class="gosiProf-psat">
            @for($i=1; $i<=4; $i++)
                @if(empty($data['arr_main_banner']['메인_M_교수진'.$i]) === false)
                    <div>
                        {!! banner_html($data['arr_main_banner']['메인_M_교수진'.$i]) !!}
                    </div>
                @endif
            @endfor
        </div>

        <div class="gosiTitle NSK">
            윌비스 한림법학원 최강팀의 PSAT!<br>
            <span class="NSK-Black">7급 PSAT 입문자를 위한 무료 학습 콘텐츠!</span>
        </div>
        <div class="gosiTip">
            {!! banner('M_메인_cast', 'swiper-container-tip', $__cfg['SiteCode'], $__cfg['CateCode'], 'bnTit') !!}
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
            var swiper = new Swiper('.swiper-container-prof', {
                slidesPerView: 'auto',
                slidesPerColumn: 2,
                spaceBetween: 30,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                // init: false,
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

            //수험생활 팁
            var swiper = new Swiper('.swiper-container-tip', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
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

        });
    </script>
@stop