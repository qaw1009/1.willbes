@extends('willbes.pc.layouts.master')

@section('content')
    <div id="Container" class="Container GA NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="widthAuto">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                <div class="VisualBox p_re">
                    <div id="MainRollingDiv" class="MaintabList five">
                        <ul class="Maintab">
                            @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                <ul class="MaintabSlider">
                                    @php $link_url = ''; @endphp
                                    @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                        @if(empty($row['LinkUrl']) === false)
                                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                        @endif
                                        <li><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($data['arr_main_banner']['메인_서브1'], $data['arr_main_banner']['메인_서브2'], $data['arr_main_banner']['메인_서브3']) === true)
                <div class="VisualsubBox mt20">
                    <ul>
                        @for($i=1; $i<=3; $i++)
                            @if(empty($data['arr_main_banner']['메인_서브'.$i]) === false)
                            <li>
                                <div class="bSlider acad">
                                    <div class="sliderTM">
                                        @php $link_url = ''; @endphp
                                        @foreach($data['arr_main_banner']['메인_서브'.$i] as $row)
                                            @if(empty($row['LinkUrl']) === false)
                                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                            @endif
                                            <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <div class="Section Bnr mt5 mb80">
            <div class="widthAuto">
                <div class="willbes-Bnr">
                    @if(empty($data['arr_main_banner']['메인_띠배너']) === false)
                        @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_띠배너']); @endphp
                        @if(empty($row['LinkUrl']) === false)
                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                        @endif
                        <ul><li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li></ul>
                    @endif
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
                    @for($i=1; $i<=5; $i++)
                        @if(empty($data['arr_main_banner']['메인_미들'.$i]) === false)
                            <li>
                                <div class="bSlider acad">
                                    <div class="sliderTM">
                                        @php $link_url = ''; @endphp
                                        @foreach($data['arr_main_banner']['메인_미들'.$i] as $row)
                                            @if(empty($row['LinkUrl']) === false)
                                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                            @endif
                                            <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                        @endforeach
                                    </div>
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
                    @if(empty($data['arr_main_banner']['메인_이벤트']) === false)
                        <div class="bSlider acad">
                            <div class="sliderTM">
                                @php $link_url = ''; @endphp
                                @foreach($data['arr_main_banner']['메인_이벤트'] as $row)
                                    @if(empty($row['LinkUrl']) === false)
                                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                    @endif
                                    <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    @endif
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
            @if(empty($data['arr_main_banner']['메인_대표교수']) === false)
                @php
                    $last_banner = end($data['arr_main_banner']['메인_대표교수']); //마지막 배열값 셋팅
                @endphp
                <div class="widthAuto">
                    <div class="will-acadTit">윌비스 <span class="tx-color">공무원학원</span> 교수님</div>
                    <a href="{{ site_url('/pass/professor/index') }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
                </div>
            @endif
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

                @if(empty($data['arr_main_banner']['메인_포커스']) === false)
                    <div class="sliderInfo">
                        <div class="will-acadTit">Hot <span class="tx-color">Focus</span></div>
                            <div class="bSlider acad">
                                <div class="sliderTM">
                                    @php $link_url = ''; $last_banner = end($data['arr_main_banner']['메인_포커스']); @endphp
                                    @foreach($data['arr_main_banner']['메인_포커스'] as $row)
                                        @if(empty($row['LinkUrl']) === false)
                                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                                        @endif
                                        <div><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section Section4 mb50">
            @include('willbes.pc.site.main_partial.campus_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], '0') !!}
@stop
