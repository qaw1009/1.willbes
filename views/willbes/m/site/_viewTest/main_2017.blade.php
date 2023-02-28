@extends('willbes.m.layouts.master')

@section('content')
    <style>
        .ssam .mainTit {
            font-size: 20px;
            position: relative;
            height: 30px;
            margin: 0 10px;
        }
        .ssam .mainTit .morebtn {color:#fff; background:#000; display:inline-block; padding:5px 10px; font-size:12px;}

        .ssam .mainTit .goBtns {
            position: absolute;
            top: 0;
            right: 0;
        }
        .ssam .mainTit .goBtns a {
            display: block;
            padding: 8px 10px;
            color: #fff;
            background: #0c5dc0;
            font-size: 12px;
        }

        .ssam .lecup-Notice {position:absolute; top:15px; width:calc(100% - 110px);}
        .ssam .lecup-Notice a {display:block; height:36px; line-height:36px; font-size:13px;
            overflow: hidden; text-overflow: ellipsis; white-space: nowrap;z-index:2;
        }
        .ssam .lecup-Notice a span {background: #0c5dc0; color: #fff; padding: 0 10px; border-radius: 10px; margin-right: 5px;}

        .ssam .bestLecBox2 {
            margin-top: 10px;
            border-top: 1px solid #ccc;
        }
        .ssam .bestLecBox2 .bestLec {
            position: relative;
            display: block;
            float: left;
            width: 33.33333%;
            min-height:100px;
            max-height:160px;
            height: 20vw;
        }
        .ssam .bestLecBox2 .bestLec a {
            position:absolute;
            display: block;
            width: 100%;
            height: 100%;
            border-right: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            box-sizing: border-box;
            overflow: hidden;
            z-index:2;
        }
        .ssam .bestLecBox2 .bestLec:first-child a {
            border-left: 1px solid #ccc;
        }
        .ssam .bestLecBox2 .bestLec .profImg img {
            position: absolute;
            bottom: 0;
            right: -15%;
            width: 65%;
            z-index: 1;
            -webkit-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
            -moz-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
            -ms-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
            -o-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
            filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, 0.2));
            transform: scale(1);
            transition: all ease-in-out 0.2s;
        }
        .ssam .bestLecBox2 .best {
            position:absolute;
            top:0;
            left:0;
            width: 46px;
            height: 46px;
            line-height: 46px;
            background: url('https://static.willbes.net/public/images/promotion/m/2017/2017_best_icon.png');
            text-align: center;
            font-size: 1.8vh;
            color: #fff;
            z-index:1;
        }
        .ssam .bestLecBox2 .lecinfo {
            position:absolute;
            bottom:4%;
            left:4%;
            width: 90%;
            line-height: 1.3;
            z-index:4
        }
        .ssam .bestLecBox2 .lecinfo li {
            margin-bottom: 2%;
        }
        .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
            font-weight: bold;
            font-size: 14px;
        }
        .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
            font-size: 16px;
        }
        .ssam .bestLecBox2 .lecinfo li strong {
            color: #0c5dc0;
            font-weight: bold;
            font-size: 15px;
        }
        .ssam .bestLecBox2 .lecinfo li:last-child {
            display: block;
            word-break: keep-all;
        }
        .ssam .bestLecBox2 .lecinfo li:last-child span {
            background: rgba(255, 255, 255, 0.5);
        }
        .ssam .bestLecBox2:after {
            content: "";
            display: block;
            clear: both;
        }

        .ssam .profwrap {padding:0 10px; margin-top:20px}
        .ssam .profwrap div {display: inline-block; width:calc(33.33333% - 10px); text-align:center; float:left; margin:0 5px 10px}
        .ssam .profwrap div img {width:100%; max-width:220px; margin:0 auto}
        .ssam .profwrap:after {content:''; display:block; clear:both}

        @@media only screen and (max-width: 374px) {
            .ssam .bestLecBox2 .lecinfo li {
                margin-bottom: 1%;
            }
            .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
                font-size: 12px;
            }
            .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
                font-size: 14px;
            }
            .ssam .bestLecBox2 .lecinfo li strong {
                font-size: 13px;
            }
            .ssam .profwrap div {width:calc(50% - 10px);}
        }
        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) {
                font-size: 13px;
            }
            .ssam .bestLecBox2 .lecinfo li:nth-of-type(1) span {
                font-size: 15px;
            }
            .ssam .bestLecBox2 .lecinfo li strong {
                font-size: 14px;
            }
        }

        .ssam .Section .d-day-wrap {
            background: #1c242b;
            padding: 15px 0;
            letter-spacing: 0;
        }

        .ssam .Section .d-day-wrap div.package {
            font-size: 1.7vh;
            color: #fff;
            font-weight: bold;
            border-radius: 10px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .ssam .Section .d-day-wrap div.package div {display:inline-block;}
        .ssam .Section .d-day-wrap div.package div:first-child {text-align:right; margin-right:10px; width:calc(54% - 10px)}
        .ssam .Section .d-day-wrap div.package div:last-child {width:46%}
        .ssam .Section .d-day-wrap div.package div p {margin-bottom:10px}
        .ssam .Section .d-day-wrap div.package span {
            vertical-align: baseline;
        }

        .ssam .Section .d-day-wrap div.package .pc1 {
            color: #eeeabd;
        }

        .ssam .Section .d-day-wrap div.package .round {
            color: #1b232a;
            background: #eeeabd;
            padding: 0.2vh 1vh;
            border-radius: 2vh;
            margin-right: 5px;
            display: inline;
        }


        .ssam .Section .d-day-wrap div.package .pc2 span {
            color: #fff !important
        }

        .ssam .d-day-wrap div.package .count {
            font-size: 3.6vh;
            color: #fa7a09;
            letter-spacing:-1px;
            vertical-align:bottom;
            animation: animate1 1s infinite;
        }

        @@keyframes animate1 {
             from {
                 color: #eeeabd
             }

             50% {
                 color: red
             }

             to {
                 color: #eeeabd
             }
         }

        @@-webkit-keyframes animate1 {
             from {
                 color: #eeeabd
             }

             50% {
                 color: red
             }

             to {
                 color: #eeeabd
             }
         }
    </style>
    <!-- Container -->
    <div id="Container" class="Container NSK ssam mb40">

        @if(time() < strtotime('202212301700'))
            <div class="Section">
                <div class="d-day-wrap">
                    <div class="package NSK">
                        <div>
                            <p>연간패키지 <span class="pc1">문화상품권 이벤트</span></p>
                            <strong class="round">12.30.(금) 17시 마감까지</strong> <strong class="pc2">D-<span id="_day">0</span></strong>
                        </div>
                        <div>
                            <strong id="_time" class="count NSK-Black">00:00:00 00</strong>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {!! banner('M_메인', 'MainSlider', $__cfg['SiteCode'], '0') !!}

        <div class="noticeTabs c_both mt30">
            {{-- 게시판 --}}
            @include('willbes.m.site.main_partial.board_' . $__cfg['SiteCode'])
        </div>

        {{-- 합격교수진 --}}
        @if(empty($data['arr_main_banner']['메인_M_교수진']) === false)
            <div class="mainTit NSK-Black tx-center mt30">윌비스 임용 <span class="tx-main">합격 교수진</span></div>
            {!! banner_html($data['arr_main_banner']['메인_M_교수진'], 'profwrap') !!}
        @endif

        @if(empty($data['top_order_lecture']) === false)
            <div class="mainTit NSK-Black tx-center mt30">
                윌비스 임용 <span class="tx-main">실시간 인기강의 TOP3</span>
            </div>
            <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
            <ul class="bestLecBox2 NSK">
                @foreach($data['top_order_lecture'] as $key => $row)
                    <li class="bestLec">
                        <a href="{{ site_url('/m/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode']) }}">
                            <ul class="lecinfo">
                                <li>{{ $row['SubjectName'] }}<br><span class="NSK-Black"">{{ $row['ProfNickNameAppellation'] }}</span></li>
                                <li><strong>{{ $row['CourseName'] }}</strong></li>
                            </ul>
                            <div class="profImg"><img src="{{ $row['ProfImgPathM'] }}" title="{{ $row['ProfNickNameAppellation'] }}"></div>
                        </a>
                        <div class="best NSK-Black">{{ $key + 1 }}</div>
                    </li>
                @endforeach
            </ul>
        @endif

        {{-- 수강후기 --}}
        @include('willbes.m.site.main_partial.study_comment_' . $__cfg['SiteCode'])

        {{--<div class="mainTit NSK-Black tx-center mt60" >윌비스 임용 <span class="tx-main">대표 강의 맛보기</span></div>
        <div class="sampleViewImg">
            {!! banner('M_메인_맛보기1', 'swiper-container-view', $__cfg['SiteCode'], '0') !!}
        </div>--}}

        {{-- 시험정보 --}}
        @include('willbes.m.site.main_partial.examinfo_'.$__cfg['SiteCode'])

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

    </div>
    <!-- End Container -->

    <style>
        /*.sampleLecSlide .swiper-slide { height:72px;}*/
    </style>

    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
    <script>
        $(function() {
            //수강후기
            var swiper_review = new Swiper ('.swiper-container-reply', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                slidesPerGroup: 1,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            //맛보기강의
            var swiper = new Swiper('.swiper-container-view', {
                slidesPerView: 1,
                slidesPerColumn: 5,
                spaceBetween: 5,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });

        /* d-day 카운트 스크립트 */
        $(document).ready(function() {
            dDayTimer('2022-12-30','17:00','_day','_time');
        });
    </script>
    {!! popup('657007', $__cfg['SiteCode'], '0') !!}
@stop