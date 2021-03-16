@extends('willbes.pc.layouts.master')
@section('content')
<link href="/public/css/willbes/style_gosi_tech.css??ver={{time()}}" rel="stylesheet">

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
                        <p class="leftBtn" id="imgBannerLeft"><a href="javascript:;">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="javascript:;">다음</a></p>

                        <div id="TechRollingDiv" class="TechtabList">
                            <div class="Techtab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{!! $row['BannerName'] !!}</a></li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section pkgWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK tx22">지금 이 시기에 딱 맞는 <span>PACKAGE</span></div>
                <div class="pkgLeft bSlider">
                    {!! banner_html(element('메인_패키지', $data['arr_main_banner'])) !!}
                </div>
                <div class="pkgRight">
                    <ul>
                        @for($i=1; $i<=4; $i++)
                            @if(isset($data['arr_main_banner']['메인_패키지_서브'.$i]) === true)
                                <li class="bSlider">
                                    {!! banner_html(element('메인_패키지_서브'.$i, $data['arr_main_banner']),'pkgslider') !!}
                                </li>
                            @endif
                        @endfor
                    </ul>                
                </div>
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

        $(function() {
            $('.pkgslider').bxSlider({
                mode:'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                pause: 3000,
                autoHover: true,
                onSliderLoad: function(){
                    $(".bSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });
    </script>
@stop