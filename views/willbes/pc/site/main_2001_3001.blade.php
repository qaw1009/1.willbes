@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    .bnSec01 {padding:20px 0 0} 
    .bnSec01 li {display:inline; float:left}
    .bnSec01:after {content:""; display:block; clear:both}

    .onProfBox {margin-right:-12px; margin-bottom: -12px;}
    .onProfBox li {
        position: relative;
        display: inline;
        float: left;
        width: 271px;
        height: 297px;
        margin-right:12px;
        margin-bottom: 12px;
        overflow: hidden;
        background: url("../../img/willbes/cop_acad/prof/prof_temp.jpg") no-repeat center center;
    }

    .onProfBox li img {
        position: absolute;
        left:50%;
        margin-left:-50%;
    }
    .onProfBox .onProfBtns {
        position: absolute;
        top:170px;
        left:35px;
        font-size: 14px;
    }
    .onProfBox .onProfBtns a {
        display: block;
        font-size: 16px;
        background: url("https://static.willbes.net/public/images/promotion/main/icon_arrow.png") no-repeat 95% 7px;
        padding:5px 30px 5px 5px;
        margin-left:-5px;
        margin-bottom: 5px
    }
    .onProfBox .onProfBtns span {
        display: block;
        font-size: 13px;
        color:#fd6f31;
        margin-top: 4px;
    }
    .onProfBox .onProfBtns a:hover {
        color:#fff !important;
        background: #0c5dc0 url("https://static.willbes.net/public/images/promotion/main/icon_arrow.png") no-repeat 95% 7px;
        border-radius: 0 5px 0 5px;
    }
    .onProfBox .onProfBtns a:hover span {
        color:#fff;
    }
    .onProfBox:after {
        content: '';
        display: block;
        clear: both;
    }

    .bnSec02 ul {margin-right:-20px; margin-bottom:-20px}
    .bnSec02 li {
        display: inline;
        float: left;
        margin-right:20px;
        margin-bottom:20px;
    }
    .bnSec02 li:last-child {
        margin: 0;
    }
    .bnSec02 li.nSlider {
        display: inline;
    }
    .sliderbnSec02 {
        width: 550px;
    }
    .bnSec02 ul:after {content:""; display:block; clear:both}
    
    .cop .preview .previewBox {position:relative; width:1120px; margin: 0 auto;}
    .cop .preview .pvslider {width:1120px; margin: 0 auto; height:225px; overflow: hidden;}
    .cop .preview .pvslider li {display: inline; float: left; width:33.33333%;}
    .cop .preview .pvslider li a {display:block; height:225px;} 
    .cop .preview .pvslider:after {content: ""; display: block; clear:both}
    .cop .preview .previewBox p {position:absolute; top:50%; margin-top:-22px; width:44px; height:45px; z-index:10}
    .cop .preview .previewBox p.leftBtn {left:-22px}
    .cop .preview .previewBox p.rightBtn {right:-22px}
</style>

    <!-- Container -->
    <div id="Container" class="Container cop NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        {{--학원배너--}}
        <div class="Section">
            <div class="widthAuto">
                <ul class="bnSec01">
                    <li>
                        {!! banner_html(element('메인_상단1', $data['arr_main_banner'])) !!}
                    </li>
                    <li><a href="/"><img src="https://static.willbes.net/public/images/promotion/main/3001_logo.jpg"></a></li>
                    <li>
                        {!! banner_html(element('메인_상단2', $data['arr_main_banner'])) !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                {!! banner_html(element('메인_핵심띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {!! banner_html(element('메인_빅배너', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section HotIssue mt20">
            <ul class="widthAuto">
                <li>{!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브2', $data['arr_main_banner'])) !!}</li>
                <li>{!! banner_html(element('메인_서브3', $data['arr_main_banner'])) !!}</li>
            </ul>
        </div>

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">경찰합격 <span class="cop-color">전문교수진</span></div>
                <ul class="onProfBox">
                    @for($i=1; $i<=8; $i++)
                        <li>
                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner'])) !!}
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section bnSec02 mt50">
            <div class="widthAuto">
                <ul>
                    <li>
                        {!! banner_html(element('메인_미들1', $data['arr_main_banner'])) !!}
                    </li>
                    <li>
                        {!! banner_html(element('메인_미들2', $data['arr_main_banner'])) !!}
                    </li>
                    <li class="sliderbnSec02 nSlider pick">
                        {!! banner_html(element('메인_미들3', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                    <li class="sliderbnSec02 nSlider pick">
                        {!! banner_html(element('메인_미들4', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section HotIssue mt80">
            @include('willbes.pc.site.main_partial.hot_issue_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>
        <!-- HotIssue //-->

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="sliderPick nSlider pick">
                    <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> Hot Pick</div>
                    <div class="pickBox pick1">
                        {!! banner_html(element('메인_hotpick1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="pickBox pick2">
                        {!! banner_html(element('메인_hotpick2', $data['arr_main_banner'])) !!}
                    </div>
                </div>
                <div class="sliderEvt nSlider pick">
                    <div class="will-nTit bd-none">윌비스 <span class="cop-color">신광은경찰</span> 무료특강</div>
                    <ul>
                        {!! banner_html(element('메인_hotpick3', $data['arr_main_banner'])) !!}
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section Section5 mt50">
            <div class="widthAuto">
                <div class="will-nTit bd-none">윌비스 <span class="cop-color">경찰 캐스트</span></div>
                <div class="preview">
                    <div class="previewBox">
                        <ul class="pvslider">
                            @php
                                foreach ($data['arr_main_banner'] as $key => $val) {
                                    if (strpos($key, '메인_cast') !== false) {
                                        echo banner_html(element($key, $data['arr_main_banner']));
                                    }
                                }
                            @endphp
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>

            </div>
        </div>

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt30">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt50 mb50">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.onCollaborate_2001')
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            var collaboslides = $("#collaboslides ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
            });

            //하단이벤트배너 닫기
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });

            //경찰캐스트
            var slidesImg1 = $(".pvslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 460,
                slideMargin:10,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });

    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
