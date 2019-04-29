@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop_acad NGR c_both">
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section Bnr mt40">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    <ul>
                        <li><a href="/promotion/index/cate/3001/code/1022" target="_blank"><img src="{{ img_url('cop_acad/visual/visual_secA01.jpg') }}" title="적중은역시신광은경찰팀"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section MainVisual MainVisual_acad mb50 mt20">
            <div class="widthAuto">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_상품배너'.$i]) === true)
                            <li class="VisualsubBox_acad">
                                {!! banner_html(element('메인_상품배너'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor

                    <li class="VisualsubBox_acad">
                        <div class="bSlider acad">
                            {!! banner_html(element('메인_상품배너4', $data['arr_main_banner']), 'bSlider slider') !!}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mb50">
            <div class="widthAuto">
                <div class="will-acadTit">교수별 <span class="tx-color">빠른강좌</span> 찾기</div>
                <ul class="caProfBox">
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_ske.jpg') }}" title="형사소송법/수사 신광은">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1057&course_idx=1041&campus_ccd=605001') }}">형소법 심화<span>5.17 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1057&course_idx=1040&campus_ccd=605001') }}">형소법 기본<span>6.3 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_jjh.jpg') }}" title="경찰학개론 장정훈">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1058&course_idx=1042&campus_ccd=605001') }}">경찰학 심화<span>5.6 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1058&course_idx=1040&campus_ccd=605001') }}">경찰학 기본<span>6.24 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_wyc.jpg') }}" title="한국사 원유철">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1040&subject_idx=1055&campus_ccd=605001') }}">한국사 기본<span>4.22 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1055&course_idx=1041&campus_ccd=605001') }}">한국사 심화<span>5.6 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_otj.jpg') }}" title="한국사 오태진">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&course_idx=1040&subject_idx=1055&campus_ccd=605001') }}">한국사 기본<span>4.22 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1055&course_idx=1041&campus_ccd=605001') }}">한국사 심화<span>5.8 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kwu.jpg') }}" title="형법 김원욱">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&subject_idx=1056&course_idx=1040') }}">형법 기본<span>5.13 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056') }}">형법 심화<span>6.6 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_hsm.jpg') }}" title="경찰영어 하승민">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1040&subject_idx=1054') }}">영어 기본<span>5.16 개강</span></a></div>
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054') }}">영어 심화<span>5.13 개강</span></a></div>
                        </div>
                    </li>                                        
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_khj.jpg') }}" title="기초영어 김현정">
                        <div class="caProfBtsn">
                            <div><a href="{{ site_url('/pass/offLecture/index?cate_code=3010&subject_idx=1095&course_idx=1046') }}">영어 지옥탈출반<span>5.6 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kjk.jpg') }}" title="기초영어 김준기">
                        <div class="caProfBtsn">
                            <div><a href="#none">영어 지옥탈출반<span>5.6 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_hsw.jpg') }}" title="면접 황세웅">
                        <div class="caProfBtsn">
                            <div><a href="#none">Coming Soon</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kiy.jpg') }}" title="인적성검사 강인엽">
                        <div class="caProfBtsn">
                            <div><a href="#none">Coming Soon</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_jyw.jpg') }}" title="면접 정용욱">
                        <div class="caProfBtsn">
                            <div><a href="#none">Coming Soon</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_ubj.jpg') }}" title="면접 유봉진">
                        <div class="caProfBtsn">
                            <div><a href="#none">Coming Soon</a></div>
                        </div>
                    </li>                    
                </ul>
            </div>
        </div>
        <!-- 교수별 빠른강좌 //-->


        <div class="Section mb50">
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 <span class="tx-color">신광은경찰학원</span> 특별관리반</div>
                <ul class="specialClass">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_특별관리반'.$i]) === true)
                            <li>
                                {!! banner_html(element('메인_특별관리반'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section2 pb110">     
            <div class="widthAuto tx-center pt80 pb80">    
                <img src="{{ img_url('cop_acad/visual/visual_curri_tit.png') }}" title="최적의 합격 커리큘럼">
            </div> 
            <div class="widthAuto CurriStepBox">
                <div class="CurriView"><a href="{{ site_url('/promotion/index/cate/3001/code/1126') }}" target="_blank">커리큘럼 자세히보기 &gt;</a></div>
                <ul class="CurriStep">
                    <li class="active">
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop/icon_bubble.gif') }}" title="2019대비 진행중"> </span>
                            <div class="Tit">기본과정</div>
                            <div class="subTit">집중연강식 진행</div>
                            <ul class="info">
                                <li>기초개념 정리</li>
                                <li>지속적인 복습테스트</li>
                                <li>초시생 필수 수강과정</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132199', '1019097', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li class="active">
                        <div class="curriculumBox">
                            <span><img src="{{ img_url('cop/icon_bubble.gif') }}" title="2019대비 진행중"> </span>
                            <div class="Tit">심화과정</div>
                            <div class="subTit">프리미엄 심화과정</div>
                            <ul class="info">
                                <li>실력업그레이드</li>
                                <li>심화 l 이론/기출학습</li>
                                <li>고득점 합격발판 마련</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('132216', '1019296', 'HD');">OT보기 &gt;</a>
                    </li>
                    <li>&nbsp;</li>
                    <li>
                        <div class="curriculumBox">                            
                            <div class="Tit">문제풀이 과정</div>
                            <div class="subTit">(실전 1+2+3 단계)</div>
                            <ul class="info">
                                <li>1단계 진도별 핵심정리</li>
                                <li>2단계 전범위 동형모의고사</li>
                                <li>3단계 FINAL 실전 모의고사</li>
                            </ul>
                        </div>
                        <a href="#none" onclick="fnPlayerSample('131811', '1014607', 'HD');">OT보기 &gt;</a>
                    </li>
                </ul>
                <div class="curriculumTxt">
                    <span class="cop-color">모든 강의</span>를 SUPER PASS 하나로 <span class="cop-color"> 수강</span>하실 수 있습니다.
                    <span class="btn"><a href="{{ site_url('/pass/promotion/index/cate/3010/code/1050') }}" target="_blank">SUPER PASS 구매하기</a></span>
                </div>
            </div>
            <!-- CurriStepBox //--> 
            <div class="widthAuto tx-center pt80">    
                <img src="{{ img_url('cop_acad/visual/visual_curri_table.png') }}" title="최적의 합격 커리큘럼 연간 테이블">
            </div>        
        </div>

        {{-- on air include --}}
        @include('willbes.pc.site.main_partial.on_air')

        <div class="Section mt40">
            <div class="widthAuto">
                <div class="sliderSuccess">
                    <div class="will-acadTit"><span class="tx-color">신광은경찰</span> 학원소식</div>
                    <div class="sliderSuccessPlay">
                        <iframe src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="sliderInfo">
                    <div class="will-acadTit"><span class="tx-color">왜</span> 노량진 실강인가?</div>
                    <a href="{{ site_url('/promotion/index/cate/3001/code/1040') }}" target="_blank"><img src="{{ img_url('cop_acad/banner/bnr_B01.jpg') }}" title="노량진24시"></a>
                </div>
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section4 mb50 mt30">
            @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], '') !!}
@stop
