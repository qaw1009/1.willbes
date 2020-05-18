@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container hanlim3094 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
                <div class="VisualsubBox">
                    <div class="bSlider VisualsubBoxTop">
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner'])) !!}
                    </div>
                    <div class="bSlider">
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'sliderStopAutoPager') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="Section barBnr">
            <div class="widthAuto">
                {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
            </div>
        </div>
        <div class="Section lecBanner mt50">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    꿈을 향한 소중한 첫 걸음부터, <strong class="NSK-Black"><span class="tx-color">합격의 순간</span></strong>까지!<br />
                    29년을 이어온 대표전문학원, <strong class="NSK-Black"><span class="tx-color">윌비스 한림법학원</span></strong>이 함께 합니다!!
                </div>
                <ul>
                    @if(empty($data['arr_main_banner']['메인_리스트']) === false)
                        @foreach($data['arr_main_banner']['메인_리스트'] as $key => $val)
                            <li>
                                {!! banner_html([0 => $val], 'slider') !!}
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mt100">
                    흉내 낼 수는 있지만 <strong class="NSK-Black"><span class="tx-color">같을 수 없습니다.</span></strong><br />
                    <strong class="NSK-Black">합격을 위한 이유있는 선택!</strong> 시험을 가장 잘 아는 <strong class="NSK-Black"><span class="tx-color">한림법학원</span></strong>의 합격 최적화 강의!
                </div>
                <img src="https://static.willbes.net/public/images/promotion/main/3094_visual01.gif" alt="로드맵" usemap="#Map3094" border="0">
                <map name="Map3094" id="Map3094">
                    <area shape="rect" coords="77,384,233,476" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1107" alt="원론강의" />
                    <area shape="rect" coords="136,244,294,336" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1108" alt="예비순환" />
                    <area shape="rect" coords="347,114,502,206" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1109" alt="GS1순환" />
                    <area shape="rect" coords="596,112,754,206" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1110" alt="GS2순환" />
                    <area shape="rect" coords="816,244,973,338" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1111" alt="GS3순환" />
                    <area shape="rect" coords="877,384,1033,475" href="https://gosi.willbes.net/lecture/index/cate/3094/pattern/only?search_order=course&amp;course_idx=1112" alt="GS4순환" />
                </map>
            </div> 
        </div>

        <div class="Section Section1">
            <div class="widthAuto">
                <div class="copyTit NSK-Thin mb50">
                    최단기 합격을 위한<br />
                    <strong class="NSK-Black">수강생을 위한 <span class="tx-color">맞춤형 추천 강좌</span></strong>
                </div>
                <ul class="PBcts">
                    @for($i=1; $i<=5; $i++)
                        @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                            <li>
                                <div class="bSlider">
                                    {!! banner_html($data['arr_main_banner']['메인_미들'.$i], 'slider') !!}
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        {{--학원 오시는 길--}}
        @include('willbes.pc.site.main_partial.map_2010')

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <dl>
                        <dt class="willbesNumber">
                            <ul>
                                <li>
                                    <div class="nTit">온라인 수강문의</div>
                                    <div class="nNumber tx-color">1544-5006 <span>▶</span> 3</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                        공휴일/일요일휴무<br/>
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">교재문의</div>
                                    <div class="nNumber tx-color">1544-4944</div>
                                    <div class="nTxt">
                                        [운영시간]<br/>
                                        평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                        공휴일/일요일휴무<br/>
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">학원 고객센터</div>
                                    <div class="nNumber tx-color">1544-1881</div>
                                    <div class="nTxt">
                                        [전화/방문상담 운영시간]<br/>
                                        평일/주말: 08시~ 18시<br/>
                                    </div>
                                </li>
                            </ul>
                        </dt>
                        <dt class="willbesCenter">
                            <div class="centerTit">윌비스 고등고시 사이트에 물어보세요!</div>
                            <ul>
                                <li>
                                    <a href="{{ site_url('/support/faq/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                        <div class="nTxt">자주하는<br/>질문</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/mobile/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                        <div class="nTxt">모바일<br/>서비스</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
                                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                        <div class="nTxt">동영상<br/>상담실</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ site_url('/support/remote/index') }}">
                                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                        <div class="nTxt">1:1<br/>고객지원</div>
                                    </a>
                                </li>
                            </ul>
                        </dt>

                    </dl>
                </div>
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenuB" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop