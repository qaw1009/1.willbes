@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container seaSp NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        @if($__cfg['CateCode'] == '3008')
        <div class="Section NGR">
            <div class="widthAuto">
                <div class="seaAcadTit">윌비스 <strong>KCG해양경찰학원</strong></div>
            </div>
        </div>       
        @endif

        <div class="Section">
            <div class="widthAuto bnrSec01 nSlider pick">
                <ul>
                    <li><a href="{{ site_url('/promotion/index/cate/3007/code/1037') }}"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x292_190524.jpg" title="해양경찰 특채PASS"></a></li>
                    <li>
                        <div class="sliderNum">
                            <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1237" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x292_190514.jpg" alt="10일 완성 패키지"></a></div>
                            <div><a href="{{ site_url('/promotion/index/cate/3001/code/1035') }}"><img src="{{ img_url('cop_sea_special/banner/bnr_556_02.jpg') }}" title="KCG 핵심요약"></a></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt8">
            <div class="widthAuto bnrSec02">
                <ul>
                    <li><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/132255"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x124_190514_01.jpg" title="권소현 항해술"></a></li>
                    <li><a href="https://police.willbes.net/lecture/show/cate/3008/pattern/only/prod-code/153472"><img src="https://static.willbes.net/public/images/promotion/main/3008_556x124_190514_02.jpg" title="황다혜 기관술"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt8">
            <div class="widthAuto">
                <a href="{{ site_url('/professor/show/cate/3008/prof-idx/50301/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}">
                    <img src="{{ img_url('cop_sea_special/banner/bnr_1120_01.jpg') }}" title="합격은 공득인이 정답입니다.">
                </a>
            </div>
        </div>
        
        <div class="Section mt8">
            <div class="widthAuto">
                <a href="{{ site_url('/lecture/show/cate/3008/pattern/only/prod-code/152968') }}">
                    <img src="https://static.willbes.net/public/images/promotion/main/3008_bnr_1120_02.jpg" title="올인원 면접 전공 특강">
                </a>
            </div>
        </div>
        

        <div class="Section mt95">
            <div class="widthAuto">
                <div class="will-big-Tit">
                    <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                    <div class="big NSK-Thin">오늘도 최선을 다하는 <span class="cop-color NSK-Black">윌비스 KCG 해양경찰학원</span></div>
                </div>
                <ul class="ProfCopBox mt60 mb100">
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_gdi.jpg') }}" title="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50301', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50301/?subject_idx=1030&subject_name=%ED%95%B4%EC%82%AC%EB%B2%95%EA%B7%9C') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_gdi2.jpg') }}" title="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50301', 'OT');">▶</a></li>
                            <li><a href="/professor/show/cate/3008/prof-idx/50301/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0
" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_hdh.jpg') }}" title="황다혜">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50657', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50657/?subject_idx=1034&subject_name=%EA%B8%B0%EA%B4%80%EC%88%A0') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_ksh.jpg') }}" title="권소현">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50485', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50485/?subject_idx=1032&subject_name=%ED%95%B4%EC%82%AC%EC%98%81%EC%96%B4') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section Section3 mt100 pb90">
            <div class="widthAuto">
                <div class="widthAuto smallTit">
                    <p><span>기출문제와 강의를 한 곳에 <strong>기출강의!</strong></span></p>
                </div>
                <div class="will-big-Tit pt100">
                    <div class="small NSK-Thin">출제경향이 매번 반복되는 경찰공무원 시험.</div>
                    <div class="big NSK-Black"><span class="cop-color">날카롭게 분석된</span> 기출강의<span class="small NSK-Thin">로 마무리해야합니다.</span></div>
                </div>
                <div class="SpecialLecBox mt60">
                    <dl>
                        <dt class="nLec p_re">
                            <div class="infoBox">
                                <div class="infoTit">
                                    <div class="small NSK-Thin">해양경찰</div>
                                    <div class="big NSK-Black">
                                        최근 5개년<br/>
                                        기출문제
                                    </div>
                                    <div class="btn">
                                        <div class="btn-sbj"><a href="{{ site_url('/promotion/index/cate/' . $__cfg['CateCode'] . '/code/1010') }}" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                        <div class="btn-lec mt5"><a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">+ &nbsp; 강의 더 보기</a></div>
                                    </div>
                                </div>
                                <div class="infoList">
                                    <ul class="List-Table">
                                        <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/3008/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/3008/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/3008/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 1차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/lecture/index/cate/3008/pattern/free?course_idx=1075') }}" target="_blank">바로가기 ></a></span></li>
                                    </ul>
                                </div>
                            </div>
                        </dt>
                    </dl>
                </div>
            </div>
        </div>
        <!-- 기출강의// -->

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
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
