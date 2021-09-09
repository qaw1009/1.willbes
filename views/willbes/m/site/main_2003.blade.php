@php
    //인트로 페이지 리다이렉트
    redirect(front_url('/intro/index')); exit;
@endphp

@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NSK gosi mb40">       

        {!! banner('M_메인상단03', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}

        {{--
        <div class="gosiTitle NSK">
            합격을 위해 필요한 모든 것, <span class="NSK-Black">윌비스PASS</span>
        </div>
        --}}

        {!! banner('M_메인빅배너', 'MainSlider mt20', $__cfg['SiteCode'], '0') !!}

        <div class="gosiTitle NSK">
            공무원, <span class="NSK-Black">어떻게 시작할지 고민</span>이라면?
        </div>

        <div class="gosiSecBn01">
            <ul>
                <li class="f_left">{!! banner('M_메인상단01', '', $__cfg['SiteCode'], '0') !!}</li>
                <li class="f_right">{!! banner('M_메인상단02', '', $__cfg['SiteCode'], '0') !!}</li>
            </ul>
        </div>

        <div class="gosiTitle NSK">
            지금 <span class="NSK-Black">윌비스 공무원학원</span>에서는?
        </div>

        {!! banner('M_메인_실강안내', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="gosiTitle NSK">
            합격을 책임질 <span class="NSK-Black">윌비스 교수진</span>
        </div>

        <div class="gosiProf">
            {!! banner('M_메인_교수진', 'swiper-container-prof', $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="gosiTitle NSK">
            합격을 앞당기는 <span class="NSK-Black">수험생활 TIP</span>
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
                spaceBetween: 20,
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
        });
    </script>
@stop