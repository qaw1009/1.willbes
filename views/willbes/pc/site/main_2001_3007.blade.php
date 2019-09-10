@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container sea NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt30">
            <div class="widthAuto bnrSec01 nSlider pick"> 
                {{--
                <div>
                    <a href="{{ site_url('/promotion/index/cate/3007/code/1043') }}">
                        <img src="{{ img_url('cop_sea/banner/bnr_756_01.jpg') }}" title="기본이론">
                    </a>
                </div>
                --}}
                <div class="sliderNum">
                    <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1357" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3007_756x292_190826.jpg" alt="해양경찰 공채 PASS"></a></div>
                    <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1043" target="_blank"><img src="{{ img_url('cop_sea/banner/bnr_756_01.jpg') }}" alt="기본이론"></a></div>
                </div>
                <ul>                    
                    <li><a href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/156658"><img src="{{ img_url('cop_sea/banner/bnr_360_02.jpg') }}" title="오태진 한국사 기본이론"></a></li>
                    <li><a href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/156660"><img src="{{ img_url('cop_sea/banner/bnr_360_01.jpg') }}" title="원유철 한국사 기본이론"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto bnrSec02">
                <div><a href="{{ site_url('/professor/show/cate/3007/prof-idx/50547/?subject_idx=1004&subject_name=형사소송법') }}"><img src="{{ img_url('cop_sea/banner/bnr_1120_01.jpg') }}" title="신광은 형사소송법"></a></div>
                <div><a href="{{ site_url('/professor/show/cate/3007/prof-idx/50301/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}"><img src="{{ img_url('cop_sea/banner/bnr_1120_02.jpg') }}" title="공득인 해양경찰학개론"></a></div>
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto">
                <div class="will-big-Tit">
                    <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                    <div class="big NSK-Thin">오늘도 최선을 다하는 <span class="cop-color NSK-Black">윌비스 신광은 경찰팀</span></div>
                </div>
                <ul class="ProfCopBox mt60 mb100">
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_ske.jpg') }}" title="신광은">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_kwu.jpg') }}" title="김원욱">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_hsm.jpg') }}" title="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50135', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_otj.jpg') }}" title="오태진">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50131', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}">교수소개</a></li>
                        </ul>
                    </li>       
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_wuc.jpg') }}" title="원유철">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50641', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}">교수소개</a></li>
                        </ul>
                    </li>                                
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_gdi2.jpg') }}" title="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_gdi.jpg') }}" title="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50301', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50301/?subject_idx=1030&subject_name=%ED%95%B4%EC%82%AC%EB%B2%95%EA%B7%9C') }}">교수소개</a></li>
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
                                        <li><p><span>[2019년 1차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=229416') }}" target="_blank">바로가기 ></a></span></li>    
                                        <li><p><span>[2018년 3차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=162332') }}" target="_blank">바로가기 ></a></span></li>                     
                                        <li><p><span>[2018년 2차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=162333') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2018년 1차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=162334') }}" target="_blank">바로가기 ></a></span></li>                                                           
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
