@extends('willbes.pc.layouts.master')
@section('content')
<link href="/public/css/willbes/style_cop_sea.css?ver={{time()}}" rel="stylesheet">

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
                    {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), '_num_slider_big_banner') !!}
                    {{--
                    <div><a href="https://police.willbes.net/pass/promotion/index/cate/3016/code/1466" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3007_756x292_200117.jpg" alt="해양경찰 합격 패키지"/></a></div>
                    <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1357" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3007_756x292_190826.jpg" alt="해양경찰 공채 PASS"></a></div>
                    <div><a href="https://police.willbes.net/promotion/index/cate/3007/code/1043" target="_blank"><img src="{{ img_url('cop_sea/banner/bnr_756_01.jpg') }}" alt="기본이론"></a></div>
                    --}}
                <ul>
                    <li>{!! banner_html(element('메인_서브1', $data['arr_main_banner']), null, null, null, 'none') !!}</li>
                    <li>{!! banner_html(element('메인_서브2', $data['arr_main_banner']), null, null, null, 'none') !!}</li>
                    {{--
                    <li><a href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/157702"><img src="{{ img_url('cop_sea/banner/bnr_360_02.jpg') }}" title="오태진 한국사 기본이론"></a></li>
                    <li><a href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/157700"><img src="{{ img_url('cop_sea/banner/bnr_360_01.jpg') }}" title="원유철 한국사 기본이론"></a></li>
                    --}}
                </ul>
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto bnrSec02">
                {!! banner_html(element('메인_띠배너1', $data['arr_main_banner'])) !!}
                {!! banner_html(element('메인_띠배너2', $data['arr_main_banner'])) !!}
                {!! banner_html(element('메인_띠배너3', $data['arr_main_banner'])) !!}
                {{--
                <div><a href="{{ site_url('/professor/show/cate/3007/prof-idx/50547/?subject_idx=1004&subject_name=형사소송법') }}"><img src="{{ img_url('cop_sea/banner/bnr_1120_01.jpg') }}" title="형사소송법"></a></div>
                <div><a href="{{ site_url('/professor/show/cate/3007/prof-idx/50742/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}"><img src="{{ img_url('cop_sea/banner/bnr_1120_02.jpg') }}" title="공득인 해양경찰학개론"></a></div>
                <div><a href="https://police.willbes.net/professor/show/cate/3007/prof-idx/50759/?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0"><img src="https://static.willbes.net/public/images/promotion/main/bnr_1120_03.jpg" title="송광호 해양경찰학개론"></a></div>
                --}}
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto">
                <div class="will-big-Tit">
                    <div class="small NSK-Thin">여러분의 꿈과 목표를 위해,</div>
                    <div class="big NSK-Thin">오늘도 최선을 다하는 <span class="cop-color NSK-Black">윌비스 경찰</span></div>
                </div>
                <ul class="ProfCopBox mt60 mb100">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_ske_184.jpg" title="">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50547', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50547/?subject_idx=1004&subject_name=%ED%98%95%EC%82%AC%EC%86%8C%EC%86%A1%EB%B2%95') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_kwu_184.jpg" title="김원욱">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50297', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_hsm_184.jpg" title="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('50135', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_khj_184.jpg" alt="김현정">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('50748', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50748/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}">교수소개</a></li>
                                    </ul>
                                </div>                            
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_kjg_184.jpg" alt="김준기">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('50749', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50749/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4') }}">교수소개</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>       
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_otj_184.jpg" alt="오태진">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('50131', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}">교수소개</a></li>
                                    </ul>
                                </div>                            
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_wuc_184.jpg" alt="원유철">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('50641', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC') }}">교수소개</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_pth.jpg" title="박태하 해사법규">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51201', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51201?subject_idx=1030&subject_name=%ED%95%B4%EC%82%AC%EB%B2%95%EA%B7%9C') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_pth2.jpg" title="박태하 해양경찰학">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51200', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51200?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}">교수소개</a></li>
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
                                        <div class="btn-sbj"><a href="{{ site_url('/support/examQuestion/index/cate/' . $__cfg['CateCode']) }}" target="_blank">+ &nbsp; 문제 더 보기</a></div>
                                        <div class="btn-lec mt5"><a href="{{ front_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?course_idx=1075') }}" target="_blank">+ &nbsp; 강의 더 보기</a></div>
                                    </div>
                                </div>
                                <div class="infoList">
                                    <ul class="List-Table">
                                        <li><p><span>[2021년 하반기]</span>해양경찰 하반기 채용 및 해경 간부후보 선발 필기시험문제 및 정답</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/' . $__cfg['CateCode'] . '?board_idx=367951') }}" target="_blank">바로가기 ></a></span></li>  
                                        <li><p><span>[2020년 3차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=326965') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2020년 1차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=283615') }}" target="_blank">바로가기 ></a></span></li>
                                        <li><p><span>[2019년 3차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=258432') }}" target="_blank">바로가기 ></a></span></li>                                                           
                                        <li><p><span>[2019년 1차]</span>해양경찰(순경) 채용시험 기출</p><span class="btn-more"><a href="{{ site_url('/support/examQuestion/show/cate/3007?board_idx=229416') }}" target="_blank">바로가기 ></a></span></li>  
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
