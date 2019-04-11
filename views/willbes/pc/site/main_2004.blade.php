@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="Container GA NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="widthAuto">
                @if(isset($data['arr_main_banner']['메인_빅배너']) === true)
                <div class="VisualBox p_re">
                    <div id="MainRollingDiv" class="MaintabList">
                        <ul class="Maintab">
                            @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="VisualsubBox mt20">
                    <ul>
                        @for($i=1; $i<=3; $i++)
                            @if(isset($data['arr_main_banner']['메인_서브'.$i]) === true)
                            <li>
                                <div class="bSlider acad">
                                    {!! banner_html($data['arr_main_banner']['메인_서브'.$i], 'sliderTM') !!}
                                </div>
                            </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Bnr mt5 mb80">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    {!! banner_html(element('메인_띠배너', $data['arr_main_banner'])) !!}
                </div>
            </div>
        </div>
        <div class="Section Section2 pt80 pb80">
            <div class="widthAuto">
                <div class="gosi-acadTit NSK-Thin mb50">
                    여러분의 꿈과 목표를 위해,<br />
                    <strong class="NSK-Black">오늘도 최선을 다하는 <span class="tx-color">윌비스 고시학원</span></strong>
                </div>
                <ul class="ProfBox">
                    @for($i=1; $i<=10; $i++)
                        @if(isset($data['arr_main_banner']['메인_미들'.$i]) === true)
                            <li>
                                <div class="bSlider acad">
                                    {!! banner_html($data['arr_main_banner']['메인_미들'.$i], 'sliderTM') !!}
                                </div>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section1 mt60">
            <div class="widthAuto">
                <div class="noticeTabs acad">
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
                </div>

                <div class="sliderEvt pick">
                    <div class="will-acadTit">윌비스 <span class="tx-color">이벤트</span></div>
                    <div class="bSlider acad">
                        {!! banner_html(element('메인_이벤트', $data['arr_main_banner']), 'sliderTM') !!}
                    </div>
                </div>

                <ul class="acad_infoBox">
                    <li class="w-infoBox1">
                        <a href="{{ front_url('/consultManagement/index') }}"><span>1:1 학습컨설팅</span></a>
                    </li>
                    <li class="w-infoBox2">
                        <a href="{{ front_url('/OffVisitLecture') }}"><span>학원실강접수</span></a>
                    </li>
                    <li class="w-infoBox3">
                        <a href="{{ front_url('/offinfo/boardInfo/index/78') }}"><span>학원개강안내</span></a>
                    </li>
                    <li class="w-infoBox4">
                        <a href="{{ front_url('/offinfo/boardInfo/index/82') }}"><span>강의실배정표</span></a>
                    </li>
                    <li class="w-infoBox5">
                        <a href="{{ front_url('/mockTest/apply/cate/') }}"><span>모의고사신청</span></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section mt80">
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 <span class="tx-color">공무원학원</span> 교수님</div>
                {!! banner_html(element('메인_대표교수', $data['arr_main_banner'])) !!}
            </div>
        </div>

        <div class="Section mb50">
            <div class="widthAuto">
                <div class="sliderSuccess">
                    <div class="will-acadTit">학원 <span class="tx-color">갤러리</span></div>
                    <a href="{{ front_url('/offinfo/gallery/index') }}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                    <ul>
                        @if(empty($data['gallery']) === false)
                            @foreach($data['gallery'] as $row)
                                <li>
                                    <a href="{{ front_url('/offinfo/gallery/show/?board_idx='.$row['BoardIdx']) }}">
                                        <img src="{{ $row['AttachData'][0]['FilePath'] . $row['AttachData'][0]['FileName'] }}" alt="{{ $row['CampusCcd_Name'] }}">
                                        <div>
                                            <strong>[{{ $row['CampusCcd_Name'] }}]</strong>
                                            <p>{{hpSubString($row['Title'],0,56,'...')}}</p>
                                            <span>{{$row['RegDatm']}}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

                <div class="sliderInfo">
                    <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                    <div class="bSlider acad">
                        {!! banner_html(element('메인_포커스', $data['arr_main_banner']), 'sliderTM') !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section Section4 mb50">
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
