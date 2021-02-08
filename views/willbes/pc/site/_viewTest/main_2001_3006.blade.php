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

        <div class="Section Sec02">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/main/2001/3006_2000x390.jpg" alt="합격패스">
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2001/3006_1148x133.jpg" alt="경감/경정 승진 패스 개설, 네오고시뱅크 제휴">
            </div>
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

        <div class="Section Section3 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">승진합격을 위한 윌비스 <span class="tx-color">경찰승진</span> 교수님</div>
                <ul class="ProfProBox">
                    @for($i=1; $i<=10; $i++)
                        <li>
                            {!! banner_html(element('메인_승진교수'.$i, $data['arr_main_banner'])) !!}
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section6 mb50 mt100">
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
