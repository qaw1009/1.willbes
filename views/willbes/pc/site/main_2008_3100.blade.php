@extends('willbes.pc.layouts.master')

@section('content')

    <style>
        /* top bar banner */
        .cop2008v2 .topBanner {display:block; background:#ececec; width:100%; text-align:center}
        .cop2008v2 .topBanner p {width:100%; max-width:1120px; margin:0 auto}
        .cop2008v2 .topBanner p img {width:100%}

        .cop2008v2 .menu-List .Tit {color: #9177d4;}
        .cop2008v2 .Menu .menu-List li.job > a {
            color: #9177d4;
            display:inline-block;
            vertical-align: middle;
        }
        .cop2008v2 .menu-List li.cop2008 > a {
            background: url("../../public/img/willbes/sub/icon_acad.gif") no-repeat left center;
            font-size: 16px;
            color: #0c5dc0;
            padding-left: 26px;
            display:inline-block;
            vertical-align: middle;
        }

        .cop2008v2 .menu-List li.cop2008 > a .arrow-Btn {
            background: url("../../public/img/willbes/sub/icon_arrow.gif") no-repeat left center;
            float: right;
            width: 4px;
            height: 8px;
            margin: 15px 5px 0;
        }

        /*********************************************     Main Container     *********************************************/
        .cop2008v2 .Depth .depth:last-child strong {
            color: #9177d4;
        }

        /* Main Container : MainVisual */
        .cop2008v2 .MainVisual {
            position: relative;
            width: 1120px;
            margin:40px auto 0;
            height: 400px;
        }
        .cop2008v2 .MainVisual:after {
            content: "";
            display: block;
            clear: both;
        }
        .cop2008v2 .VisualBox {
            width:725px;
            height: 400px;
            overflow: hidden;
            float:left;
        }
        .cop2008v2 .VisualBox img {
            height: 400px;
        }

        .cop2008v2 .VisualBox .bx-wrapper .bx-controls-auto {
            left:20px;
            bottom: 20px;
            width: 50px;
            z-index: 90;
        }
        .cop2008v2 .VisualBox .bx-wrapper .bx-pager {
            width: auto;
            left:60px;
            bottom: 22px;
            text-align: left;
            z-index: 90;
        }
        .cop2008v2 .VisualBox .bx-wrapper .bx-pager.bx-default-pager a {
            background: #cecece;
        }

        .cop2008v2 .VisualsubBox {
            width: 384px;
            padding:10px;
            float:right;
            background: #ccc;
        }

        .cop2008v2 .VisualsubBox .bSlider:nth-child(2) {
            margin-top:3px;
            width: 364px;
            height: 248px !important;
            overflow: hidden;
        }

        .cop2008v2 .VisualsubBox .bx-wrapper .bx-controls-auto {
            left:20px;
            bottom: 20px;
            margin: 0;
            width: 50px;
            z-index: 90;
        }
        .cop2008v2 .VisualsubBox .bx-wrapper .bx-pager {
            float: right;
            width: auto;
            left:60px;
            bottom: 20px;
            text-align: right;
            z-index: 90;
        }
        .cop2008v2 .VisualsubBox .bx-wrapper .bx-pager.bx-default-pager a {
            background: #cecece;
            width: 8px;
            height: 8px;
            margin: 0 2px;
        }

        .cop2008v2 .VisualsubBox .VisualsubBoxTop {width: 364px; height:128px; overflow: hidden;}

        .cop2008v2 .VisualsubBox .VisualsubBoxTop .bx-wrapper .bx-pager {
            float: left;
            width: auto;
            left: 20px;
            bottom: 10px;
            text-align: left;
        }
        .cop2008v2 .VisualsubBox .VisualsubBoxTop  .bx-wrapper .bx-pager.bx-default-pager a {
            background: #cecece;
        }
        .cop2008v2 .VisualsubBox .VisualsubBoxTop .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .cop2008v2 .VisualsubBox .VisualsubBoxTop .bx-wrapper .bx-pager.bx-default-pager a.active,
        .cop2008v2 .VisualsubBox .VisualsubBoxTop .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #9177d4 !important;
        }

        /**/
        .cop2008v2 .will-listTit {
            margin-bottom: 15px;
            color:#181818;
        }


        /* Main Container : Notice : noticeTabs */
        .cop2008v2 .noticeTabs {
            width: 345px !important;
            float:left;
            margin-right:40px;
        }
        .cop2008v2 .tabBox.noticeBox {
            margin-top:-30px;
        }
        .cop2008v2 .tabBox.noticeBox a.btn-add {
            position: absolute;
            top: -16px;
            right: 0;
        }
        .cop2008v2 .tabBox.noticeBox .List-Table {
            width: 100%;
        }
        .cop2008v2 .tabBox.noticeBox .List-Table li {
            position: relative;
            font-size: 13px;
            color: #3a3a3a;
            height: 37px;
            line-height: 37px;
            border-bottom: 1px solid #e3e3e3;
        }
        .cop2008v2 .tabBox.noticeBox .List-Table li a {
            display: inline-block;
            width: 80%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            letter-spacing: 0;
        }
        .cop2008v2 .tabBox.noticeBox .List-Table li a span {
            background: #9177d4;
            color:#fff;
            padding: 0 10px;
            border-radius: 10px;
            margin-right: 5px;
        }
        .cop2008v2 .willbesNumber ul li {
            margin-left: 30px;
            vertical-align: top;
        }

        .cop2008v2 .goMenu {background:#9177d4}

        .cop2008v2 .tx-color {
            color: #9177d4 !important;
        }
        .cop2008v2 .tx-color2 {
            color: #c3aefa !important;
        }
        .cop2008v2 .Section1 {
            background: #f8f8f8;
            padding:90px 0;
        }
        .cop2008v2 .copyTit {
            font-size: 33px;
            color: #363636;
            line-height: 1.2;
            text-align: center;
        }
        .cop2008v2 .copyTit strong {
            vertical-align: baseline;
            color:#000;
        }
        .cop2008v2 .copyTit span {
            color:#9177d4;
            vertical-align: baseline;
        }
        .cop2008v2 .List-Table li a img,
        .cop2008v2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .cop2008v2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .cop2008v2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus,
        .cop2008v2 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .cop2008v2 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .cop2008v2 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #9177d4;
        }
        .cop2008v2 .Section .SpecialBox li {
            display: inline; float: left;
            width: 216px; height: 143px;
            margin-right:10px; margin-bottom:10px;
        }
        .cop2008v2 .Section .SpecialBox li:nth-child(5),
        .cop2008v2 .Section .SpecialBox li:last-child {
            margin-right:0;
        }
        .cop2008v2 .Section .SpecialBox ul:after {
            content:''; display: block; clear:both;List-Table
        }

        .cop2008v2 .Section4_hl .noticeTabs {
            width: 100% !important;
        }

        /* Main Container : QuickMenu : Cop */
        .cop2008v2 .MainQuickMenu {
            position: fixed;
            top: 110px;
            right: 20px;
            width: 160px;
            height: auto;
            z-index: 100;
            overflow: hidden;
        }
        .cop2008v2 .QuickSlider {width:160px; height: 100px; overflow:hidden;}
        .cop2008v2 .QuickDdayBox {width:160px !important;}
    </style>

    <!-- Container -->
    <div id="Container" class="Container cop2008v2 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), '_slider_big_banner') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner']), '_slider_sub_banner1') !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), '_slider_sub_banner2') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto">
                <ul id="goMenu" class="goMenu" >
                    <li><a href="{{ front_url('/OffVisitLecture') }}">학원수강신청<span>|</span></a></li>
                    <li><a href="{{ front_url('/lecture/index/cate/'.$__cfg['CateCode'].'/pattern/free?search_order=course&course_idx=1236') }}">학원보강<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/82?s_cate_code='.$data['mapping_cate_data']['CateCode']) }}">강의실배정표<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/80?s_cate_code='.$data['mapping_cate_data']['CateCode']) }}">강의시간표<span>|</span></a></li>
                    <li><a href="{{ front_url('/lecture/index/cate/'.$__cfg['CateCode'].'/pattern/free') }}">무료특강<span>|</span></a></li>
                    <li><a href="{{ front_url('/pass/offinfo/boardInfo/index/110?s_cate_code=3110') }}">강의자료실</a></li>
                </ul>
            </div>
        </div>

        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    개편 전 마지막 시험, 이젠 <strong class="NSK-Black"><span class="tx-color2">처음부터 실전처럼 </span></strong>공부해야 합니다.<br />
                    <strong class="NSK-Black"><span class="tx-color2">윌비스 한림법학원</span></strong>이 수험생을 위한 프로그램을 준비하였습니다.
                </div>
                <ul>
                    @if(empty($data['arr_main_banner']['메인_리스트']) === false)
                        @foreach($data['arr_main_banner']['메인_리스트'] as $key => $val)
                            <li>
                                {!! banner_html([0 => $val]) !!}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        {{--이달의 강의 / 강의맛보기 --}}
        <div class="Section Section1">
            <div>
                <div class="copyTit">
                    <strong class="NSK-Black">WILLBES 경찰간부·일반경찰</strong> <strong class="NSK-Black"><span class="tx-color">이달의 강의</span></strong>
                </div>
                <div class="thisMonth NSK">
                    <div class="thisMonthBox">
                        <ul class="tmslider">
                            @if(empty($data['best_product']) === false)
                                @foreach($data['best_product'] as $row)
                                    <li>
                                        <a href="{{front_url('/lecture/show/pattern/only/cate/'.$row['CateCode'].'/prod-code/'.$row['ProdCode'])}}">
                                            <img src="{{$row['ProfIndexImg'] or ''}}">
                                            <div class="tx-color">{{$row['ProdName']}}
                                                <span class="NSK-Black">{{$row['ProfNickName']}}</span>
                                            </div>
                                            <div>{{$row['ProdMainIntroMemo']}}</div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>

                <div class="copyTit mt100">
                    <strong class="NSK-Black">WILLBES 경찰간부·일반경찰</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
                </div>
                <div class="preview NSK">
                    <div class="previewBox">
                        <ul class="pvslider">
                            @if(empty($data['new_product']) === false)
                                @foreach($data['new_product'] as $row)
                                    @php
                                        $sample_info = [];
                                        if($row['LectureSamplewUnit'] !== 'N') {
                                            $sample_info = json_decode($row['LectureSamplewUnit'], true);
                                        }
                                    @endphp
                                    <li>
                                        <a href="javascript:{{!empty($sample_info[0]['wUnitIdx']) ? "fnPlayerSample('".$row["ProdCode"]."','".$sample_info[0]["wUnitIdx"]."','".($sample_info[0]["wHD"] != '' ? 'HD' : 'SD')."')" : "alert('샘플영상 준비중입니다.')" }};">
                                            <img src="{{$row['ProfIndexImg'] or ''}}">
                                            <div>
                                                {{$row['ProdName']}}<BR>
                                                {{empty($sample_info) ? '' : $sample_info[0]['wUnitName']}}
                                                <strong>{{$row['SubjectName']}} {{$row['ProfNickName']}}</strong>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Section4_hl mt50">
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 <span class="tx-color">경찰간부</span> 학원</div>
                {{--학원 오시는 길--}}
                @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>    
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script>
        $(function() {
            var slidesImg = $(".tmslider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:4,
                maxSlides:4,
                slideWidth: 274,
                slideMargin:8,
                autoHover: true,
                moveSlides:1,
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });

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
            });
            $("#imgBannerLeft1").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>
@stop