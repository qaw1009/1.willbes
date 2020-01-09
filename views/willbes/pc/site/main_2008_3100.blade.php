@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop2008 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt30">
            <div class="widthAuto bnrSec01 nSlider pick">
                <ul>
                    <li>
                        <div class="sliderNum">
{{--                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2008_756x292.jpg" title="해양경찰 특채PASS"></a></div>--}}
{{--                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2008_756x292.jpg" title="KCG 핵심요약"></a></div>--}}
                            {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                        </div>
                    </li>
                    <li>
                        <div class="sliderNum">
{{--                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2008_360x292.jpg" alt="10일 완성 패키지"></a></div>--}}
{{--                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2008_360x292.jpg" title="KCG 핵심요약"></a></div>--}}
{{--                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2008_360x292.jpg" title="KCG 마무리특강"></a></div>--}}
                            {!! banner_html(element('메인_서브', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto">
                <ul class="ProfCopBox mt60">
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="신광은">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="김원욱">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                    <li>
                        <img src="https://static.willbes.net/public/images/promotion/main/2008_159x280.jpg" alt="하승민">
                        <ul class="ProfBtns">
                            <li><a href="#none">▶</a></li>
                            <li><a href="#none" target="_blank">교수소개</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt95">
            <div class="widthAuto bnrSec02">
                <ul>
{{--                    <li><a href="#"><img src="https://static.willbes.net/public/images/promotion/main/2008_556x120.jpg" alt="권소현 항해술"></a></li>--}}
{{--                    <li><a href="#"><img src="https://static.willbes.net/public/images/promotion/main/2008_556x120.jpg" alt="황다혜 기관술"></a></li>--}}
                    @for($i=1; $i<=2; $i++)
                        @if(isset($data['arr_main_banner']['메인_강좌소개_'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_강좌소개_'.$i], 'slider') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section mt50">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mb100 mt50">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        {{--
        <div id="QuickMenu" class="MainQuickMenu">
            <ul>
                <li>
                    <div class="QuickDdayBox">
                        <div class="q_tit">3차 필기시험</div>
                        <div class="q_day">2018.12.12</div>
                        <div class="q_dday NSK-Blac">D-5</div>
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        <div class="sliderNum">
                            <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="{{ img_url('cop/quick/quick_190108.jpg') }}" alt="배너명"></a></div>
                            <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="{{ img_url('cop/quick/quick_190109.jpg') }}" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" alt="배너명"></a>
                </li>
                <li>
                    <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" alt="배너명"></a>
                </li>
            </ul>
        </div>
        --}}
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop