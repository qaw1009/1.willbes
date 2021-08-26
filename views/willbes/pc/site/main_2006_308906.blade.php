@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    /* 빅데이터분석기사 */
    .job308906 .article1 {background:url(https://static.willbes.net/public/images/promotion/main/2006/308906_top_bg.jpg) no-repeat center top; margin-top:20px; text-align:center}
    
    .job308906 .article2 {width:979px; margin:-87px auto 120px; box-shadow:10px 10px 20px rgba(0,0,0,.3);} 
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

        <div class="Section article1">
            <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_top.jpg" title="빅데이터 분석기사">
        </div>

        <div class="Section article2" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_01.jpg" title="빅데이터 분석기사 진로와 전망">
        </div>

        <div class="Section article3">
            <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_02.jpg" title="시험일정">
            <a href="https://job.dev.willbes.net/landing/show/lcode/1043/cate/308906/preview/Y" target="_blank" class="NSK-Black">빅데이터 분석기사 더 자세히 알아보기 ></a>
        </div>

        <div class="Section article4">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03.jpg" title="왜 훈샘인가?"  data-aos="fade-left">
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/efr9iOZ57gM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <a href="https://job.willbes.net/lecture/show/cate/308906/pattern/only/prod-code/185036"><img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03_01.jpg" title="훈쌤 전격입성"></a>
                    <a href="https://job.willbes.net/lecture/show/cate/308906/pattern/only/prod-code/184363" class="f_right"><img src="https://static.willbes.net/public/images/promotion/main/2006/308906_03_02.jpg" title="훈쌤 전격입성"></a>
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
    </script>
@stop