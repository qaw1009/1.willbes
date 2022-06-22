@extends('willbes.pc.layouts.master')

@section('content')
    <style type="text/css">
        /* 빅데이터분석기사 */
        .Area01 {
            width: 100%;
            max-width: 2000px;
            margin-top:20px
        }
        .Area01 .gosi-bntop {position:relative; margin:0; height: 460px !important;}
        .Area01 .gosi-bntop .GositabBox {
            position: absolute;
            top:0;
            left:50%;
            margin-left:-1000px;
            width: 2000px;
            min-width: 1120px;
            max-width: 2000px;
            height: 460px;
            overflow: hidden;
        }

        .Area01 .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
        .Area01 .gosi-bntop .GositabBox p a {display:none;}
        .Area01 .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
        .Area01 .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}
        .Area01 .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}


        .job308906 .article1 {background:url(https://static.willbes.net/public/images/promotion/main/2006/308906_top_bg.jpg) no-repeat center top; margin-top:20px; text-align:center}

        .job308906 .article2 {width:979px; margin:100px auto; box-shadow:10px 10px 20px rgba(0,0,0,.3);}
        .job308906 .article3 {background:#c7ecff; text-align:center; padding-bottom:100px}
        .job308906 .article3 a {display:block; width:450px; margin:50px auto; padding:20px 0; font-size:24px; border-radius:50px; background:#363636; color:#fff}
        .job308906 .article3 a:hover {background:#000}

        .job308906 .article4 {background:#efefef; padding-bottom:100px}
        .job308906 .article4 .wrap {width:1120px; margin:0 auto; position:relative}
        .job308906 .article5 .wrap {width:1120px; margin:0 auto; position:relative}
        .job308906 .article6 {background:#c7ebff;}
        .job308906 .article6 .wrap {width:1120px; margin:0 auto; position:relative}
        .job308906 .article6 {position:relative;}
        .job308906 .youtube {width:860px; margin:0 auto;}
        .job308906 .youtube iframe {width:860px; height:450px; margin-bottom:50px}

        /*타이머*/
        .job308906 .newTopDday {clear:both; background:#fff; width:100%; padding:10px 0;}
        .job308906 .newTopDday ul {width:1120px; margin:0 auto}
        .job308906 .newTopDday ul li {display:inline-block; text-align:center; color:#000; font-size:20px;}
        .job308906 .newTopDday ul li:nth-child(1) {margin-right:10px; }
        .job308906 .newTopDday .d_day {line-height:1.2;text-align:center;padding-top:30px;}
        .job308906 .newTopDday .d_day p {color:#fffb00; font-size:40px; background:#000; border-radius:40px; padding:5px 15px}
    </style>

    <!-- Container -->
    <div id="Container" class="Container job308906 c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <!-- 타이머 -->
        @if(empty($data['dday']) === false)
            <div id="newTopDday" class="newTopDday">
                <div class="d_day NSK">
                    <ul>
                        <li>
                            {{ $data['dday'][0]['DayTitle'] }}<br>{{ $data['dday'][0]['DayDatm'] }}{{ kw_date('(%)', $data['dday'][0]['DayDatm']) }}
                        </li>
                        <li>
                            <p class="NSK-Black">{{ $data['dday'][0]['DDay'] == '0' ? 'D-0' : 'D' . $data['dday'][0]['DDay'] }} <span></span></p>
                        </li>
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section Area01" data-aos="fade-up">
            <div class="gosi-bntop">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="TechRollingSlider" class="GositabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'GositabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="javascript:void(0);">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="javascript:void(0);">다음</a></p>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section article2" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_01.jpg" title="빅데이터 분석기사 진로와 전망">
        </div>

        <div class="Section article3">
            <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_02.jpg" title="시험일정">
            <a href="https://job.willbes.net/landing/show/lcode/1043/cate/308906/preview/Y" target="_blank" class="NSK-Black">빅데이터 분석기사 더 자세히 알아보기 ></a>
        </div>

        <div class="Section article4">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03.jpg" title="왜 훈샘인가?"  data-aos="fade-left">
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/7MZQzT41teQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a href="https://job.willbes.net/lecture/index/cate/308906/pattern/only?search_order=regist&subject_idx=2171"><img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03_01.jpg" title="훈쌤 전격입성"></a>
                    <a href="https://job.willbes.net/lecture/index/cate/308906/pattern/only?search_order=regist&subject_idx=2172" class="f_right"><img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03_02.jpg" title="훈쌤 전격입성"></a>
                    <a href="https://job.willbes.net/Package/index/cate/308906/pack/648001"><img class="mt30" src="https://static.willbes.net/public/images/promotion/main/2006/308906_03_03.jpg" title="훈쌤 전격입성"></a>
                </div>     

                <div class="csTel NSK">
                    빅테이터분석기사 자격증 문의 <span class="NSK-Black">1544-1661</span>
                </div>
            </div>  

        </div>        
        
    </div>
    <!-- End Container -->

    {{-- popup --}}
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
        AOS.init();
    } );

    //상단 메인 배너
    $(function(){
        var slidesImg = $(".GositabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:3000,
            sliderWidth:2000,
            auto : true,
            autoHover: true,
            controls:false,
            onSliderLoad: function(){
                $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1});
            }
        });
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });

        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });
    });
</script>
@stop