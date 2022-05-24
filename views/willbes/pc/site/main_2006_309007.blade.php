@extends('willbes.pc.layouts.master')

@section('content')
    <style type="text/css">
        .job309007 .tx-color {
            color: #0c5dc0;
        }
        .job309007 .will-acadTit {
            font-size: 19px;
            font-weight: 600;
            color: #363636;
            line-height: 60px;
        }
        .job309007 .will-acadTit span {
            vertical-align: baseline;
        }
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

        .Area01 .gosi-bntop .GositabList {
            position: absolute;
            top:404px;
            width:100%;
            z-index: 50;
            background-color: rgba(0,0,0,0.5);
            padding:10px 0;
        }

        .Area01 .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
        .Area01 .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
        .Area01 .gosi-bntop .Gositab li {display:inline-block;  width: calc(11.11111% - 2px);}
        .Area01 .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
        .Area01 .gosi-bntop .Gositab li a:hover,
        .Area01 .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

        .Area02 {display: flex; justify-content: space-around; margin-top:70px}
        .Area03 {background:#e8e8e8; padding:80px 0}
        .Area03 .widthAuto {display: flex; justify-content: space-around;}

        .job309007 .acadview {position:relative; height:234px; width:1120px; margin: 0 auto;}
        .job309007 .acadview .avslider {height:180px; overflow: hidden;}
        .job309007 .acadview .avslider li {display:inline; float:left; width: 25%;}
        .job309007 .acadview .avslider li a {display:block;}
        .job309007 .acadview .avslider:after {content: ""; display: block; clear:both}
        .job309007 .acadview p {position:absolute; top:40%; margin-top:-22px; width:44px; height:45px; z-index:10}
        .job309007 .acadview p.leftBtn {left:-30px}
        .job309007 .acadview p.rightBtn {right:-50px}

        .job309007 .tabBox.noticeBox .List-Table {
            width: 520px;
        }
        .job309007 .tabBox.noticeBox .List-Table li a span {
            background: #0c5dc0;
            color:#fff;
            padding: 0 10px;
            border-radius: 10px;
            margin-right: 5px;
        }

        .AreaMap {
            width: 1120px !important;
            margin: auto;
        }
        .AreaMap .will-acadTit {border-bottom:2px solid #000; margin-bottom:20px}
        .AreaMap .noticeTabs {
            width: 100% !important;
        }
        .AreaMap .map_img {
            position: relative;
            float: left !important;
            width: 698px;
            height: 328px;
            overflow: hidden;
        }
        .AreaMap .map_img img {
            position: absolute;
            left:50%;
            margin-left:-349px;
        }

        .AreaMap .campus_info {
            position: relative;
            float: right !important;
            width: 320px;
            height: 328px;
        }
        .AreaMap .campus_info dl dt {
            border-top: 1px solid #e3e3e3;
            padding: 25px 0;
        }
        .AreaMap .campus_info dl dt:first-child {
            border-top: none;
            padding: 0 0 25px;
        }
        .AreaMap .campus_info .btn a {
            display: inline-block;
            font-size: 17px;
            font-weight: bold;
            height: 40px;
            line-height: 40px;
            padding: 0;
            width: 168px;
            margin-right: 5px;
            color: #000;
            text-align: center;
            border: 1px solid #000;
        }        
        .totalPrice {width:860px; margin:90px auto 0;}
        .totalPrice a {display:block; background:#000; font-size:44px; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);text-align:center;}
        .totalPrice a:hover {background:#533fd1}
        
    </style>

    <!-- Container -->
    <div id="Container" class="Container job309007 NGR c_both">
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section Area01 NSK">
            <div class="gosi-bntop">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="TechRollingSlider" class="GositabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'GositabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="javascript:void(0);">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="javascript:void(0);">다음</a></p>
                    </div>

                    <div id="TechRollingDiv" class="GositabList">
                        <div class="Gositab">
                            @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{!! $row['BannerName'] !!}</a></li>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto Area02">
                @for($i=1; $i<=3; $i++)
                    @if(isset($data['arr_main_banner']['메인_서브'.$i]) === true)
                        {!! banner_html(element('메인_서브'.$i, $data['arr_main_banner'])) !!}
                    @endif
                @endfor
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2006/309007_main01.jpg" alt="최적의 합격 커리큘럼">
            </div>
        </div>

        <div class="Section Area03">
            <div class="widthAuto">
                @for($i=1; $i<=3; $i++)
                    @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                        {!! banner_html(element('메인_미들'.$i, $data['arr_main_banner'])) !!}
                    @endif
                @endfor
            </div>
        </div>

        <div class="Section mt80">
            <div class="widthAuto">
                <div class="totalPrice NSK-Black">
                    <a href="http://job.willbes.net/pass/consult/visitConsult/index" target="_blank">합격 상담 예약 ></a>
                </div>
            </div>
        </div>

        <div class="Section mt50 c_both">
            <div class="widthAuto">
                <div class="will-acadTit">학원 <span class="tx-color">둘러보기</span></div>
                <div class="acadview">
                    <ul class="avslider">
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_01.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_02.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_03.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_04.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_05.jpg">
                        </li>
                        <li>
                            <img src="https://static.willbes.net/public/images/promotion/main/2015_bn_271x180_06.jpg">
                        </li>
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                </div>
            </div>
        </div>

        <div class="Section mt50 NSK">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
            </div>
        </div>

        <div class="Section AreaMap mt40">
            @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>

        <div class="Section mt50 mb50 c_both">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
        </div>
    </div>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    <!-- End Container -->

    <script type="text/javascript">
        //상단 메인 배너
        $(function(){
            var slidesImg = $(".GositabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,
                autoHover: true,
                pagerCustom: '#TechRollingDiv',
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

        $(function() {
            var slidesImg1 = $(".avslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 280,
                slideMargin:12,
                autoHover: true,
                moveSlides:1,
                pager:true,
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToNextSlide();
            });
            $("#imgBannerRight1").click(function (){
                slidesImg1.goToPrevSlide();
            });
        });
    </script>
@stop