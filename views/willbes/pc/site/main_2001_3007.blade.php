@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container sea NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt30">
            <div class="widthAuto bnrSec01">
                <div>
                    <a href="#"><img src="{{ img_url('cop_sea/banner/bnr_756_01.jpg') }}" alt="기본이론"></a>
                </div>
                <ul>
                    <li><a href="#"><img src="{{ img_url('cop_sea/banner/bnr_360_01.jpg') }}" alt="정태정 핵심이론"></a></li>
                    <li><a href="#"><img src="{{ img_url('cop_sea/banner/bnr_360_02.jpg') }}" alt="공득인 핵심이론"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto bnrSec02">
                <div><a href="#"><img src="{{ img_url('cop_sea/banner/bnr_1120_01.jpg') }}" alt="기본이론"></a></div>
                <div><a href="#"><img src="{{ img_url('cop_sea/banner/bnr_1120_02.jpg') }}" alt="기본이론"></a></div>
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
                        <img src="{{ img_url('cop_sea/prof/prof_ske.jpg') }}" alt="신광은">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_kwu.jpg') }}" alt="김원욱">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_hsm.jpg') }}" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50135', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_otj.jpg') }}" alt="오태진">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50131', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_wuc.jpg') }}" alt="원유철">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50641', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_jtj.jpg') }}" alt="정태정">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50655', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50655/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea/prof/prof_gdi.jpg') }}" alt="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50301', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50301/?subject_idx=1030&subject_name=%ED%95%B4%EC%82%AC%EB%B2%95%EA%B7%9C') }}" target="_blank">교수소개</a></li>
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
                                        <div class="btn-sbj"><a href="http://www.willbescop.net/movie/event.html?event_cd=On_181126_y&topMenuType=O" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                        <div class="btn-lec mt5"><a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">+ &nbsp; 강의 더 보기</a></div>
                                    </div>
                                </div>
                                <div class="infoList">
                                    <ul class="List-Table">
                                        <li><a href="#none"><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                        <li><a href="#none"><span>[2018년 1차]</span>경찰공무원(일반/101단/전의경) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                        <li><a href="#none"><span>[2018년 2차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
                                        <li><a href="#none"><span>[2018년 1차]</span>경찰공무원(일반/101단/경행) 채용시험 기출</a><span class="btn-more"><a href="https://cop.dev.willbes.net/support/examQuestion/show?board_idx=1286&" target="_blank">바로가기 ></a></span></li>
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
