@extends('willbes.pc.layouts.master')

@section('content')
    <style type="text/css">
        .pro .will-nTit {font-size:35px !important; border:0 !important; margin-bottom:30px;}


        .pro .ProfProBox {margin-left:-5px}
        .pro .ProfProBox > li {
            position: relative;
            display: inline;
            float: left;
            width: 220px;
            height: 327px;
            margin-left: 5px;
            margin-bottom:5px
        }
        .pro .mouBox span {display:inline-block; margin:0 10px 10px 0}

        .pro .Sec01 {background:#0a0a0a; margin-top:20px}
        .pro .Sec02 {position:relative; height:390px}
        .pro .Sec02 div {position:absolute; top:0; left:50%; margin-left:-1000px}
    </style>

    <!-- Container -->
    <div id="Container" class="Container pro NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto">
                <a href="{{ site_url('/promotion/index/cate/3006/code/1019') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/3006_visual_top.jpg" alt="대한민국 1등 경찰학원">
                </a>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto Profinfo">
                <img src="https://static.willbes.net/public/images/promotion/main/3006_visual_01_200701.jpg" alt="전문화된 교수진">
                <span class="btn01"><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}" alt="김원욱">자세히보기 &gt;</a></span>
                <span class="btn02"><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}" alt="신광은">자세히보기 &gt;</a></span>
                <span class="btn03"><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51037/?subject_idx=1023&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B4%EC%A2%85%ED%95%A9') }}" alt="장정훈">자세히보기 &gt;</a></span>
                <ul>
                    {!! banner_html(element('메인_교수진1', $data['arr_main_banner']), null, null, null, 'li') !!}
                    {!! banner_html(element('메인_교수진2', $data['arr_main_banner']), null, null, null, 'li') !!}
                    {!! banner_html(element('메인_교수진3', $data['arr_main_banner']), null, null, null, 'li') !!}
                </ul>
            </div>
        </div>

        <div class="Section mt90">
            <div class="widthAuto">
                <div class="will-nTit bd-none">승진대비 <span class="tx-color">계급&amp;직렬</span> 승진 PASS</div>
                <ul class="proPAss">
                    {!! banner_html(element('메인_승진패스1', $data['arr_main_banner']), null, null, null, 'li') !!}
                    {!! banner_html(element('메인_승진패스2', $data['arr_main_banner']), null, null, null, 'li') !!}
                </ul>
            </div>
        </div>

        <div class="Section mt90">
            <div class="widthAuto">
                <div class="will-nTit bd-none">윌비스 <span class="tx-color">신광은경찰</span> MOU 협약식</div>
                <div class="mou">
                    <ul>
                        <li><img src="{{ img_url('cop_pro/visual/visual_556_01.jpg') }}" alt="MOU 협약식"></li>
                        <li><img src="{{ img_url('cop_pro/visual/visual_556_02.jpg') }}" alt="MOU 협약식"></li>
                        <li><img src="{{ img_url('cop_pro/visual/visual_556_03.jpg') }}" alt="MOU 협약식"></li>
                        <li><img src="{{ img_url('cop_pro/visual/visual_556_04.jpg') }}" alt="MOU 협약식"></li>
                    </ul>
                </div>

                <div class="Section mt100">
                    <div class="widthAuto">
                        <div class="will-nTit NSK-Black">경찰승진 <span class="tx-color">주관식</span> <span class="tx16 NSK ml20">형사소송법, 행정법</span></div>
                        <div>
                            {!! banner_html(element('메인_교수진2', $data['arr_main_banner']), null, null, null, 'span','mr25') !!}
                            {!! banner_html(element('메인_교수진3', $data['arr_main_banner']), null, null, null, 'span') !!}
                        </div>
                    </div>
                </div>

                <div class="Section mt100">
                    <div class="widthAuto">
                        <div class="will-nTit NSK-Black">승진대비 <span class="tx-color">계급&amp;직렬</span> 승진 PASS</div>
                        <div>
                            {!! banner_html(element('메인_승진패스1', $data['arr_main_banner']), null, null, null, 'span','mr25') !!}
                            {!! banner_html(element('메인_승진패스2', $data['arr_main_banner']), null, null, null, 'span') !!}
                        </div>
                    </div>
                </div>

                <div class="Section Section3 mt90">
                    <div class="widthAuto">
                        <div class="will-nTit bd-none">승진합격을 위한 윌비스 <span class="tx-color">경찰승진</span> 교수님</div>
                        <ul class="ProfCopBox mt20 mb100">
                            @for($i=1; $i<=10; $i++)
                                <li>
                                    {!! banner_html(element('메인_승진교수'.$i, $data['arr_main_banner'])) !!}
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>

                <div class="Section Section6 mb50">
                    <div class="widthAuto">
                        {{-- best/new product include --}}
                        @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])
                        {{-- board include --}}
                        @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
                    </div>
                </div>

                <div class="Section Section7 mb100">
                    <div class="widthAuto">
                        @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
                    </div>
                </div>

                <div id="QuickMenu" class="MainQuickMenu">
                    {{-- quick menu --}}
                    @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(function(){
            $('.mou ul').bxSlider({
                speed:800,
                responsive:true,
                infiniteLoop:true,
                pager:false,
                slideWidth:556,
                minSlides:1,
                maxSlides:2,
            });
        });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
