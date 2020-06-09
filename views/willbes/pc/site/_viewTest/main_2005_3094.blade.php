@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container hanlim{{$__cfg['CateCode']}} NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="Section barBnr">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
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
                {{-- 학원수강신청, 학원보강, 강의실배정표, 신규동영상안내, 무료특강, 강의자료실 버튼 --}}
                @include('willbes.pc.site.main_partial.content_menu_' . $__cfg['SiteCode'] . '_' . $__cfg['CateCode'])
            </div>
        </div>

        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    꿈을 향한 소중한 첫 걸음부터, <strong class="NSK-Black"><span class="tx-color">합격의 순간</span></strong>까지!<br />
                    29년을 이어온 대표전문학원, <strong class="NSK-Black"><span class="tx-color">윌비스 한림법학원</span></strong>이 함께 합니다!!
                </div>
                <ul>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115095837.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200115102038.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200123131907.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128152955.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200128153052.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2020/02/popup_20200131165936.jpg" alt="배너명"></a></li>
                </ul>
            </div>
        </div>

        {{--이달의 강의 / 강의맛보기 --}}
        <div class="Section Section1">
            <div>
                <div class="copyTit">
                    <strong class="NSK-Black">WILLBES 한림법학원</strong> <strong class="NSK-Black"><span class="tx-color">이달의 강의</span></strong>
                </div>
                <div class="thisMonth NSK">
                    <div class="thisMonthBox">
                        <ul class="tmslider">
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                    <div class="tx-color">경제학 예비순환</div>
                                    <div class="NSK-Black">황종휴</div>
                                    <div>2020 거시경제학 예비순환</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                    <div class="tx-color">행정법 예비순환</div>
                                    <div class="NSK-Black">김정일</div>
                                    <div>2020 행정법 예비순환<br> (미시+거시)</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                    <div class="tx-color">행정법 예비순환</div>
                                    <div class="NSK-Black">박도원</div>
                                    <div>행정법 GS3순환(미시+거시)<br>+매일모의고사추가</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                    <div class="tx-color">경제학 예비순환</div>
                                    <div class="NSK-Black">김기홍</div>
                                    <div>경제학 10개년 기출문제<br>연도별 해설특강(2019년기출..</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                    <div class="tx-color">경제학 예비순환</div>
                                    <div class="NSK-Black">이동호</div>
                                    <div>경제학 10개년 기출문제<br>연도별 해설특강(2019년기출..</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                    <div class="tx-color">경제학 예비순환</div>
                                    <div class="NSK-Black">최승호</div>
                                    <div>경제학 10개년 기출문제<br>연도별 해설특강(2019년기출..</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50852/prof_index_50852_1586137263.png">
                                    <div class="tx-color">경제학 예비순환</div>
                                    <div class="NSK-Black">안진우</div>
                                    <div>경제학 10개년 기출문제<br>연도별 해설특강(2019년기출..</div>
                                </a>
                            </li>
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>

                <div class="copyTit mt100">
                    <strong class="NSK-Black">윌비스</strong> <strong class="NSK-Black"><span class="tx-color">대표 강의 맛보기</span></strong>
                </div>
                <div class="preview NSK">
                    <div class="previewBox">
                        <ul class="pvslider">
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                    <div>
                                        오리엔테이션, 무역모형기초 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                    <div>
                                        03월 27일 : 제 10회 모의고사 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                    <div>
                                        09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                    <div>
                                        오리엔테이션, 무역모형기초 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                    <div>
                                        09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                    <div>
                                        03월 27일 : 제 10회 모의고사 1회 1강
                                        <strong>국제경제학 황종휴</strong>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>
                    </div>
                </div>
            </div>
        </div>

        {{--학원 오시는 길--}}
        @include('willbes.pc.site.main_partial.map_2010')

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenuB" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script type="text/javascript">
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
                pager:true,
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        $(function() {
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
@stop