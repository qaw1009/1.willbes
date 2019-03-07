@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gosi NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt30">
            <div class="widthAuto">
                <a href="#none"><img src="{{ img_url('gosi/banner/bnr_bar01.jpg') }}" alt="배너명"></a>
            </div>

            <div class="widthAuto NSK mt30">
                <div class="VisualBox p_re bSlider">
                    <div id="MainRollingDiv" class="MaintabList three">
                        <ul class="Maintab">
                            <li><a data-slide-index="0" href="javascript:void(0);" class="active">9급 PASS</a></li>
                            <li><a data-slide-index="1" href="javascript:void(0);" class="">제니스 영어</a></li>
                            <li><a data-slide-index="2" href="javascript:void(0);" class="">영어완성 PACK</a></li>
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                <ul class="MaintabSlider">
                                    <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_01.jpg') }}" alt="배너명"></a></li>
                                    <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_02.jpg') }}" alt="배너명"></a></li>
                                    <li><a href="#none" target="_blank"><img src="{{ img_url('gosi/visual/visual_190225_03.jpg') }}" alt="배너명"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider">
                        <div class="sliderStopAutoPager">
                            <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_01.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_02.jpg') }}" alt="배너명"></a></div>
                            <div><a href="#none"><img src="{{ img_url('gosi/visual/visual_r190225_03.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
                <ul class="ProfBox">
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50241/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4') }}"><img src="{{ img_url('gosi/prof/prof_190225_01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4') }}"><img src="{{ img_url('gosi/prof/prof_190225_02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50273/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4') }}"><img src="{{ img_url('gosi/prof/prof_190225_03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50441/?subject_idx=1109&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}"><img src="{{ img_url('gosi/prof/prof_190225_04.jpg') }}" alt="배너명"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50499/?subject_idx=1108&subject_name=%EC%98%81%EC%96%B4') }}"><img src="{{ img_url('gosi/prof/prof_190225_05.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section Section3 mt110">
            <div class="widthAuto">
                <div><img src="{{ img_url('gosi/visual/visual_tit02.jpg') }}" alt="추천강좌/이벤트/최신소식"></div>
                <ul class="SpecialBox">
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t04.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t05.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t06.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t07.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t08.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t09.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi/banner/bnr_t10.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesLec">
                    <div class="smallTit mb30">
                        <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>
                    </div>

                    {{-- best product include --}}
                    @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])

                    <div class="will-listTit mt45">무료특강</div>
                    <ul class="freeLectBx">
                        <li>
                            <img src="{{ img_url('gosi/banner/bnr_free01.jpg') }}" alt="" class="배너명"/>
                            <p>기초입문특강</p>
                            국어,영어,한국사 기초입문 풀패키지
                        </li>
                        <li>
                            <img src="{{ img_url('gosi/banner/bnr_free02.jpg') }}" alt="" class="배너명"/>
                            <p>기초문제 해설특강</p>
                            출제경향 완벽대비
                        </li>
                    </ul>
                </div>
                <!-- willbesLec//-->

                <div class="willbesNews">
                    <div class="smallTit mb30">
                        <p><span>윌비스 <strong>소식</strong></span></p>
                    </div>
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_box')
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="smallTit mb30">
                    <p><span>솔직한 <strong>수강후기</strong><a href="#none"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></span></p>
                </div>
                <div class="lecReviewBx nSlider">
                    <div class="sliderNumRv">
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                        <div class="lecReview">
                            <div class="imgBox cover">
                                <img class="coverImg" src="{{ img_url('cop/prof_cover.png') }}">
                                <img src="{{ img_url('gosi/prof/mainReviews02.png') }}">
                            </div>
                            <ul>
                                <li>[작물생리학] 장사원</li>
                                <li>2019 장사원 재배학 기출 문제풀이 (1월)</li>
                                <li>쏙쏙 이해가 잘되요 쏙쏙 이해가 잘되요쏙쏙 이해가 잘되요</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- 수강후기 //-->

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
    $(function() {
        $('.sliderNumRv').bxSlider({
            speed:1000,
            auto: true,
            controls: true,
            pause: 4000,
            pager: true,
            pagerType: 'short',
            slideWidth:1120,
            moveSlides:3,
            minSlides:3,
            maxSlides:3,
            onSliderLoad: function(){
                $(".nSlider").css("visibility", "visible").animate({opacity:1});
            }
        });
    });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
