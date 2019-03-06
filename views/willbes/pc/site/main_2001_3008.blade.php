@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container seaSp NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt30">
            <div class="widthAuto bnrSec01">
                <ul>
                    <li><a href="#"><img src="{{ img_url('cop_sea_special/banner/bnr_556_01.jpg') }}" alt="정태정 핵심이론"></a></li>
                    <li><a href="#"><img src="{{ img_url('cop_sea_special/banner/bnr_556_02.jpg') }}" alt="공득인 핵심이론"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt8">
            <div class="widthAuto bnrSec02">
                <ul>
                    <li><a href="#"><img src="{{ img_url('cop_sea_special/banner/bnr_556x124_01.jpg') }}" alt="정태정 핵심이론"></a></li>
                    <li><a href="#"><img src="{{ img_url('cop_sea_special/banner/bnr_556x124_02.jpg') }}" alt="공득인 핵심이론"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt8">
            <div class="widthAuto">
                <a href="#"><img src="{{ img_url('cop_sea_special/banner/bnr_1120_01.jpg') }}" alt="정태정 핵심이론"></a>
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
                        <img src="{{ img_url('cop_sea_special/prof/prof_gdi.jpg') }}" alt="공득인">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_jtj.jpg') }}" alt="정태정">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_hdh.jpg') }}" alt="황다혜">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_sea_special/prof/prof_ksh.jpg') }}" alt="권소현">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
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
                                        <div class="btn-lec mt5"><a href="https://cop.dev.willbes.net/lecture/index/cate/3001/pattern/free?course_idx=20032" target="_blank">+ &nbsp; 강의 더 보기</a></div>
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
