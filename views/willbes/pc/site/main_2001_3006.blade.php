@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container pro NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto">
                <!--iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=1&controls=2" frameborder="0" allowfullscreen=""></iframe-->
                <a href="{{ site_url('/promotion/index/cate/3006/code/1019') }}">
                    <img src="{{ img_url('cop_pro/visual/visual_190213.jpg') }}" alt="전국 4,000명 동시수강">
                </a>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto Profinfo">
                <img src="{{ img_url('cop_pro/visual/visual_190227_01.jpg') }}" alt="전문화된 교수진">
                <span class="btn01"><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}">자세히보기 &gt;</a></span>
                <span class="btn02"><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}">자세히보기 &gt;</a></span>
                <ul>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50553/?subject_idx=1024&subject_name=%EC%A3%BC%EA%B4%80%EC%8B%9D%ED%96%89%EC%A0%95%EB%B2%9') }}"><img src="{{ img_url('cop_pro/banner/bnr_372_01.jpg') }}" alt="경찰행정학 이성호"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50115/?subject_idx=1027&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B42') }}"><img src="{{ img_url('cop_pro/banner/bnr_372_02.jpg') }}" alt="경찰실무 송광호"></a></li>
                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50277/?subject_idx=1023&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B4%EC%A2%85%ED%95%A9') }}"><img src="{{ img_url('cop_pro/banner/bnr_372_03.jpg') }}" alt="실무종합 조용석"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt90">
            <div class="widthAuto">
                <div class="will-nTit bd-none">승진대비 <span class="tx-color">계급&amp;직렬</span> 승진 PASS</div>
                <ul class="proPAss">
                    <li><a href="{{ site_url('/promotion/index/cate/3006/code/1008') }}"><img src="{{ img_url('cop_pro/banner/bnr_557_01.jpg') }}" alt="계급별 12개월 PASS"></a></li>
                    <li><a href="{{ site_url('/promotion/index/cate/3006/code/1008') }}"><img src="{{ img_url('cop_pro/banner/bnr_557_02.jpg') }}" alt="교수별 12개월 PASS"></a></li>
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

                <div class="Section Section3 mt90">
                    <div class="widthAuto">
                        <div class="will-nTit bd-none">승진합격을 위한 윌비스 <span class="tx-color">경찰승진</span> 교수님</div>
                        <ul class="ProfCopBox mt20 mb100">
                            <li>
                                <img src="{{ img_url('cop_pro/prof/prof_ske.jpg') }}" alt="신광은">
                                <ul class="ProfBtns">
                                    <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}">교수소개</a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="{{ img_url('cop_pro/prof/prof_kwu.jpg') }}" alt="김원욱">
                                <ul class="ProfBtns">
                                    <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}">교수소개</a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="{{ img_url('cop_pro/prof/prof_jys.jpg') }}" alt="조용석">
                                <ul class="ProfBtns">
                                    <li><a href="#none" onclick="fnPlayerProf('50277', 'OT');">▶</a></li>
                                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50277/?subject_idx=1023&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B4%EC%A2%85%ED%95%A9') }}">교수소개</a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="{{ img_url('cop_pro/prof/prof_skh.jpg') }}" alt="송광호">
                                <ul class="ProfBtns">
                                    <li><a href="#none" onclick="fnPlayerProf('50115', 'OT');">▶</a></li>
                                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50115/?subject_idx=1027&subject_name=%EA%B2%BD%EC%B0%B0%EC%8B%A4%EB%AC%B42') }}">교수소개</a></li>
                                </ul>
                            </li>
                            <li>
                                <img src="{{ img_url('cop_pro/prof/prof_lsh.jpg') }}" alt="이성호">
                                <ul class="ProfBtns">
                                    <li><a href="#none" onclick="fnPlayerProf('50553', 'OT');">▶</a></li>
                                    <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50553/?subject_idx=1024&subject_name=%EC%A3%BC%EA%B4%80%EC%8B%9D%ED%96%89%EC%A0%95%EB%B2%9') }}">교수소개</a></li>
                                </ul>
                            </li>
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
