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
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_ljh.jpg" title="형사법 임종희">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51394', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51394?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_mhs.jpg" title="형법 문형석">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51392', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51392?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_khg.jpg" title="형소법 김한기">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51389', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51389?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29') }}">교수소개</a></li>
                        </ul>
                    </li>                        
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_lgr.jpg" title="헌법 이국령">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51259', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2823%EB%85%84%EB%8C%80%EB%B9%84%29') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_dbs1.jpg" title="해사법규 등불쌤">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51201', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51201?subject_idx=1030&subject_name=%ED%95%B4%EC%82%AC%EB%B2%95%EA%B7%9C') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/prof_dbs2.jpg" title="해양경찰학 등불쌤">
                        <ul class="ProfBtns">
                            <li><a href="#none" onclick="fnPlayerProf('51200', 'OT');">▶</a></li>
                            <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51200?subject_idx=1031&subject_name=%ED%95%B4%EC%96%91%EA%B2%BD%EC%B0%B0%ED%95%99%EA%B0%9C%EB%A1%A0') }}">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="bSlider">
                            <div class="slider">
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_otj.jpg" alt="한능검 오태진">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('51126', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51126?subject_idx=2088&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC%EB%8A%A5%EB%A0%A5%EA%B2%80%EC%A0%95%EC%8B%9C%ED%97%98') }}">교수소개</a></li>
                                    </ul>
                                </div>                            
                                <div>
                                    <img src="https://static.willbes.net/public/images/promotion/main/prof_jenny.jpg" alt="지텔프 제니">
                                    <ul class="ProfBtns">
                                        <li><a href="#none" onclick="fnPlayerProf('51397', 'OT');">▶</a></li>
                                        <li><a href="{{ front_url('/professor/show/cate/' . $__cfg['CateCode'] . '/prof-idx/51397?subject_idx=2012&subject_name=G-TELP#none') }}">교수소개</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
