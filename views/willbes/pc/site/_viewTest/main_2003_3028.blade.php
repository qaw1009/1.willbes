@extends('willbes.pc.layouts.master')

@section('content')
    <style>
        /*********************************************     Main Container : tech     *********************************************/
        .tech .tx-color {color: #6faf4e;}
        .tech .Depth .depth:last-child strong {color: #ba560e;}
        .tech .will-nTit {border:0; font-size:46px}
        .tech .will-nTit span {color:#6faf4e}

        .tech .Menu h3 {border:0}

        .tech .sortMenu {border-top:1px solid #e9e9e9; background:#fbfbfb; padding:8px 0}
        .tech .sortMenu li {display:inline; float:left; width:12.5%}
        .tech .sortMenu a {display:block; padding:8px 0 8px 5px; font-size:14px; color:#606060}
        .tech .sortMenu a:hover {color: #6faf4e;}

        /*상단 메인 배너*//
        .tech .gosi-tech-Sec {
            width: 100%;
            max-width: 2000px;
        }
        .tech .gosi-tech-bntop {position:relative; margin:0; height: 460px !important;}
        .tech .gosi-tech-bntop .TechtabBox {
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
        .tech .gosi-tech-bntop .TechtabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
        .tech .gosi-tech-bntop .TechtabBox p a {display:none;}
        .tech .gosi-tech-bntop .TechtabBox p.leftBtn {margin-left:-620px;}
        .tech .gosi-tech-bntop .TechtabBox p.rightBtn {margin-left:588px; background-position: right center;}
        .tech .gosi-tech-bntop .TechtabBox p:hover {opacity:100; filter:alpha(opacity=100);}

        .tech .gosi-tech-bntop .TechtabList {
            position: absolute;
            top:410px;
            width:100%;
            z-index: 99;
            background-color: rgba(0,0,0,0.5);
        }

        .tech .gosi-tech-bntop .Techtab {width:1120px; margin:0 auto; text-align:center}
        .tech .gosi-tech-bntop .Techtab:after {content:""; display:block; clear:both}
        .tech .gosi-tech-bntop .Techtab li {display:inline-block; width: calc(11.11111% - 2px);}
        .tech .gosi-tech-bntop .Techtab li a {display:block; text-align:center; line-height:50px; font-size: 15px; color:#b4b4b4; height:50px; width:95%; overflow:hidden;white-space:nowrap; text-overflow:ellipsis;}
        .tech .gosi-tech-bntop .Techtab li a:hover,
        .tech .gosi-tech-bntop .Techtab li a.active {color:#fff; font-weight: bold;}

        /**/
        .tech .tech-bnfull {background:url("https://static.willbes.net/public/images/promotion/main/2003/3028_1120x286_bg.jpg") repeat-x;}

        /**/
        .gosi-tech-bn01 {margin-top:130px;}
        .gosi-tech-bn01 .bnTitle {float:left; width:280px;}
        .gosi-tech-bn01 .will-nTit {font-size:33px}
        .gosi-tech-bn01 .bnTitle div:nth-child(2) {line-height:1.4; color:#a6a6a6; font-size:20px; margin:30px 0 20px}
        .gosi-tech-bn01 .bnTitle a {display:inline-block; color:#fff; background:#000; font-size:14px; height:24px; line-height:24px; border-radius:13px; padding:0 20px }
        .gosi-tech-bn01 ul {float:right;}
        .gosi-tech-bn01 li {display:inline-block; float:left; width:266px; margin-right:20px;}
        .gosi-tech-bn01 li:last-child {margin:0}
        .gosi-tech-bn01 ul:after {content: ""; display: block; clear:both}
        .gosi-tech-bn01 .nSlider .sliderNum {height:250px; background:#ccc; overflow:hidden}
        .gosi-tech-bn01 .nSlider .bx-wrapper .bx-controls-direction {
            position: absolute;
            top: 250px;
            left:0;
            right: 0;
            width: 100%;
            height: 20px;
            text-align:center;
        }
        .gosi-tech-bn01 .nSlider .bx-wrapper .bx-controls-direction a {
            width: 20px;
            height: 20px;
        }
        .gosi-tech-bn01 .nSlider .bx-wrapper a.bx-prev {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
            left:150px !important;
        }
        .gosi-tech-bn01 .nSlider .bx-wrapper a.bx-next {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;
            left:95px !important;
        }
        .gosi-tech-bn01 .nSlider .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            top: 255px;
            left:0;
            right: 0;
            bottom: 0;
            font-size: 11px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

        /**/
        .tech .tech-bnfull02 {background:#fbfbfd; margin-top:130px}

        /**/
        .tech .ProfBoxB {margin-left:-8px; margin-top:50px}
        .tech .ProfBoxB li {float: left; width: 274px; height: 234px; margin-left: 8px;margin-bottom: 8px;}
        .tech .ProfBoxB:after {content: ""; display: block; clear: both;}


        /* Main Container : Notice : noticeTabs */
        .tech .tabWrap.noticeWrap {
            height: 16px;
            border: none;
        }
        .tech .tabWrap.noticeWrap li {
            float: left;
            width: auto;
            height: 16px;
            margin-right: 10px;
        }
        .tech .tabWrap.noticeWrap li a {
            display: block;
            width: 100%;
            height: 19px;
            line-height: 19px;
            font-size: 17px;
            color: #c5c5c5;
            text-align: center;
            letter-spacing: 0;
            border:none !important;
            border-right:1px solid #999 !important;
            padding-right: 10px;
        }
        .tech .tabWrap.noticeWrap li a.on {
            height: 19px;
            line-height: 19px;
            font-weight: 600;
            color: #6faf4e;
            border:none !important;
            border-right:1px solid #999 !important;
        }
        .tech .tabWrap.noticeWrap li:last-child a.on,
        .tech .tabWrap.noticeWrap li:last-child a {
            border-right:none !important;
        }
        .tech .tabBox.noticeBox a.btn-add {
            position: absolute;
            top: -16px;
            right: 0;
        }
        .tech .tabBox.noticeBox .List-Table {
            width: 520px;
        }
        .tech .tabBox.noticeBox .List-Table li {
            position: relative;
            font-size: 13px;
            color: #3a3a3a;
            height: 37px;
            line-height: 37px;
            border-bottom: 1px solid #e3e3e3;
        }
        .tech .tabBox.noticeBox .List-Table li a {
            display: inline-block;
            width: 80%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            letter-spacing: 0;
        }
        .tech .tabBox.noticeBox .List-Table li a span {
            background: #6faf4e;
            color:#fff;
            padding: 0 10px;
            border-radius: 10px;
            margin-right: 5px;
        }
    </style>

    <!-- Container -->
    <div id="Container" class="Container tech NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section sortMenu NSK">
            <div class="widthAuto">
                <ul>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#to_go">농업직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#to_go">농촌지도사</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1068#tab5">유기농업기능사</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1071">전송기술직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1071">통신기술직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1728#apply">전기직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1728#apply">전자직</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3028/pattern/only?search_order=regist&series_ccd=614021">토목직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/1915">축산직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2000">기계직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2001">조경직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2013">전산직</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014">환경직(공채)</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014">환경직(특채)</a></li>
                    <li><a href="https://pass.willbes.net/promotion/index/cate/3028/code/2015">산림자원직</a></li>
                    <li><a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/178589">공통과목</a></li>
                </ul>
            </div>
        </div>

        <div class="Section gosi-tech-Sec NSK">
            <div class="gosi-tech-bntop">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="TechRollingSlider" class="TechtabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'TechtabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>

                        <div id="TechRollingDiv" class="TechtabList">
                            <div class="Techtab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section tech-bnfull">
            <div class="widthAuto ">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3028_1120x286.jpg" alt="윌비스 기술직 라인업" usemap="#Map3028A" border="0">
                <map name="Map3028A">
                    <area shape="rect" coords="19,17,478,284" href="https://pass.willbes.net/promotion/index/cate/3028/code/1787" target="_blank" alt="윌비스 기술직">
                    <area shape="rect" coords="629,19,1099,284" href="https://pass.willbes.net/promotion/index/cate/3019/code/1971" target="_blank" alt="대방고시 라인업">
                </map>
            </div>
        </div>

        <div class="Section gosi-tech-bn01 NSK">
            <div class="widthAuto">
                <div class="bnTitle">
                    <div class="will-nTit NSK-Black">추천 <span>이론강좌</span></div>
                    <div>
                        과목별 기초 개념과<br>
                        배경지식을 다지는<br>
                        학습 전략
                    </div>
                    <div><a href="https://pass.willbes.net/package/index/cate/3028/pack/648001?course_idx=1055" target="_blank">패키지 확인하기 ></a></div>
                </div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_이론강좌'.$i]) === true)
                            <li class="nSlider">
                                {!! banner_html(element('메인_이론강좌'.$i, $data['arr_main_banner']), 'sliderNum') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
            <div class="widthAuto mt80">
                <div class="bnTitle">
                    <div class="will-nTit NSK-Black">추천 <span>문제풀이</span></div>
                    <div>
                        기출 문제 및<br>
                        예상 문제풀이를 통한<br>
                        출제포인트 공략<br>
                    </div>
                    <div><a href="https://pass.willbes.net/package/index/cate/3028/pack/648001?course_idx=1056" target="_blank">패키지 확인하기 ></a></div>
                </div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_문제풀이'.$i]) === true)
                            <li class="nSlider">
                                {!! banner_html(element('메인_문제풀이'.$i, $data['arr_main_banner']), 'sliderNum') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section tech-bnfull02">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3028_1120_img01.jpg" alt="빈틈없는 완벽한 실력을 쌓게 됩니다.">
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="tx16">무엇 하나 빠지지 않는 빈틈없는 라인업</div>
                <div class="will-nTit NSK-Black mt20">체계적인 학습 CARE, <span>윌비스 기술직 교수진</span></div>
                <ul class="ProfBoxB">
                    @for($i=1; $i<=16; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_wide')
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop

@section('post_content')
    <script type="text/javascript">
        //상단 메인 배너
        $(function(){
            var slidesImg = $(".TechtabSlider").bxSlider({
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
    </script>
@stop