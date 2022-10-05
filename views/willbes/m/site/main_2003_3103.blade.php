@extends('willbes.m.layouts.master')

@section('content')
<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/ 
    }    
</style>

    <div id="Container" class="Container NSK gosi mb40">
        {!! banner('M_메인_빅배너', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

        <!--
        {!! banner('M_메인_서브', 'MainSlider mt20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

        <div class="gosiTitle NSK">
            윌비스 한림법학원 <span class="NSK-Black">PSAT 최강팀</span>
        </div>
        <div class="gosiProf-psat">
            @for($i=1; $i<=4; $i++)
                @if(empty($data['arr_main_banner']['메인_M_교수진'.$i]) === false)
                    {!! banner_html($data['arr_main_banner']['메인_M_교수진'.$i]) !!}
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
        -->

        <div id="Container" class="Container NSK c_both">
            <div class="evtCtnsBox" data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_01.jpg" alt="선착순" >
            </div>

            <div class="evtCtnsBox" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_02.jpg" alt="빅4" >
            </div> 

            <div class="evtCtnsBox" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_04.jpg" alt="강의 정보" >
            </div> 

            <div class="evtCtnsBox" data-aos="fade-up">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_05.jpg" alt="수강신청 바로가기" >
                    <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/201562" title="바로가기" target="_blank" style="position: absolute;left: 14.92%;top: 79.12%;width: 70.39%;height: 9.28%;z-index: 2;"></a>
                </div>
            </div>  
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });    
    </script>
    {!! popup('657007', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop