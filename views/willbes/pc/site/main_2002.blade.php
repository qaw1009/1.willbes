@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop_acad NSK c_both">
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Section Bnr">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    <ul>
                        <li><a href="{{ site_url('/promotion/index/cate/3001/code/1022') }}"><img src="{{ img_url('cop_acad/visual/visual_secA01.jpg') }}" alt="적중은역시신광은경찰팀"></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section MainVisual MainVisual_acad mb50">
            <div class="widthAuto">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(empty($data['arr_main_banner']['메인_상품배너'.$i]) === false)
                            @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_상품배너'.$i]); @endphp
                            @if(empty($last_banner['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                            @endif
                            <li class="VisualsubBox_acad">
                                <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
                            </li>
                        @endif
                    @endfor

                    @if(empty($data['arr_main_banner']['메인_상품배너4']) === false)
                    <li class="VisualsubBox_acad">
                        <div class="bSlider acad">
                            <div class="bSlider slider">
                                @php $link_url = ''; @endphp
                                @foreach($data['arr_main_banner']['메인_상품배너4'] as $row)
                                    @if(empty($row['LinkUrl']) === false)
                                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                    @endif
                                    <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="Section mb50">
            <div class="widthAuto">
                <div class="will-acadTit">교수별 <span class="tx-color">빠른강좌</span> 찾기</div>
                <ul class="caProfBox">
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_ske.jpg') }}" alt="형사소송법/수사 신광은">
                        <div class="caProfBtsn">
                            <div><a href="#none">문풀1단계<span>3.7 개강</span></a></div>
                            <div><a href="#none">기본형소법<span>3.21 개강</span></a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_jjh.jpg') }}" alt="경찰학개론 장정훈">
                        <div class="caProfBtsn">
                            <div><a href="#none">문풀1단계<span>3.7 개강</span></a></div>
                            <div><a href="#none">무료특강</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kwu.jpg') }}" alt="형법 김원욱">
                        <div class="caProfBtsn">
                            <div><a href="#none">기본형법<span>3.7 개강</span></a></div>
                            <div><a href="#none">심화강좌</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_hsm.jpg') }}" alt="경찰영어 하승민">
                        <div class="caProfBtsn">
                            <div><a href="#none">문풀1단계<span>3.2 개강</span></a></div>
                            <div><a href="#none">심화강좌</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_wyc.jpg') }}" alt="한국사 원유철">
                        <div class="caProfBtsn">
                            <div><a href="#none">기본한국사<span>2.25 개강</span></a></div>
                            <div><a href="#none">심화강좌</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_otj.jpg') }}" alt="한국사 오태진">
                        <div class="caProfBtsn">
                            <div><a href="#none">기본한국사<span>2.25 개강</span></a></div>
                            <div><a href="#none">문풀1단계<span>3.13 개강</span></a></div>
                        </div>
                    </li>                    
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_khj.jpg') }}" alt="기초영어 김현정">
                        <div class="caProfBtsn">
                            <div><a href="#none">지옥탈출<span>3.11 개강</span></a></div>
                            <div><a href="#none">아침특강</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kjk.jpg') }}" alt="기초영어 김준기">
                        <div class="caProfBtsn">
                            <div><a href="#none">지옥탈출<span>3.11 개강</span></a></div>
                            <div><a href="#none">아침특강</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_hsw.jpg') }}" alt="면접 황세웅">
                        <div class="caProfBtsn">
                            <div><a href="#none">면접캠프</a></div>
                            <div><a href="#none">면접 스파르타</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_kiy.jpg') }}" alt="인적성검사 강인엽">
                        <div class="caProfBtsn">
                            <div><a href="#none">면접캠프</a></div>
                            <div><a href="#none">면접 스파르타</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_ubj.jpg') }}" alt="면접 유봉진">
                        <div class="caProfBtsn">
                            <div><a href="#none">면접캠프</a></div>
                            <div><a href="#none">면접 스파르타</a></div>
                        </div>
                    </li>
                    <li>
                        <img src="{{ img_url('cop_acad/prof/prof_jyw.jpg') }}" alt="면접 정용욱">
                        <div class="caProfBtsn">
                            <div><a href="#none">면접캠프</a></div>
                            <div><a href="#none">면접 스파르타</a></div>
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
                        @if(empty($data['arr_main_banner']['메인_특별관리반'.$i]) === false)
                            @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_특별관리반'.$i]); @endphp
                            @if(empty($last_banner['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                            @endif
                            <li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section2 mb50">
            <div class="widthAuto p_re">
                <img src="{{ img_url('cop_acad/visual/visual_curri_bg.jpg') }}" alt="신광은경찰 합격커리큘럼">
                <div class="passCurriWrap">
                    <ul>
                        <li class="curriStep1">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM01.png') }}" alt="집중 연강식 진행" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM01_on.png') }}" alt="집중 연강식 진행" class="over">
                        </li>
                        <li class="curriStep2">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM02.png') }}" alt="프리미엄 심화과정" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM02_on.png') }}" alt="프리미엄 심화과정" class="over">
                        </li>
                        <li class="curriStep3">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM03.png') }}" alt="핵심요약/진도별 정리" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM03_on.png') }}" alt="핵심요약/진도별 정리" class="over">
                        </li>
                        <li class="curriStep4">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM04.png') }}" alt="집중 약점 보안" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM04_on.png') }}" alt="집중 약점 보안" class="over">
                        </li>
                        <li class="curriStep5">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM05.png') }}" alt="실전력 극대화" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM05_on.png') }}" alt="실전력 극대화" class="over">
                        </li>
                        <li class="curriStep6">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM06.png') }}" alt="집단+개별면접대비" class="out">
                            <img src="{{ img_url('cop_acad/visual/visual_curriM06_on.png') }}" alt="집단+개별면접대비" class="over">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 합격커리큘럼 //-->

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
                    <a href="{{ site_url('/promotion/index/cate/3001/code/1040') }}" target="_blank"><img src="{{ img_url('cop_acad/banner/bnr_B01.jpg') }}" alt="노량진24시"></a>
                </div>
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <!--                            
        <div class="Section Bnr mt50">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    <ul>
                        <li><a href="{{ site_url('/promotion/index/cate/3001/code/1012') }}"><img src="{{ img_url('cop_acad/banner/bnr_190110.jpg') }}" alt="0원특강"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        -->

        <div class="Section Section4 mb50 mt30">
            @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], '0') !!}
@stop
