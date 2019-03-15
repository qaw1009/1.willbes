@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gosi NSK c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section mt20 p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                        <div class="bSlider">
                            <div class="sliderStopAutoPager">
                                @php $link_url = '#none'; @endphp
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    @if(empty($row['LinkUrl']) === false)
                                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                    @endif
                                    <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="VisualsubBox">
                    @if(empty($data['arr_main_banner']['메인_서브1']) === false)
                        @if(count($data['arr_main_banner']['메인_서브1']) > 1) <div class="cSlider"><div class="slider"> @endif
                        @php $link_url = '#none'; @endphp
                        @foreach($data['arr_main_banner']['메인_서브1'] as $row)
                            @if(empty($row['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                            @endif
                            <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                        @endforeach
                        @if(count($data['arr_main_banner']['메인_서브1']) > 1) </div></div> @endif
                    @endif

                    @if(empty($data['arr_main_banner']['메인_서브2']) === false)
                        <div class="bSlider">
                            <div class="sliderStopAutoPager">
                                @php $link_url = '#none'; @endphp
                                @foreach($data['arr_main_banner']['메인_서브2'] as $row)
                                    @if(empty($row['LinkUrl']) === false)
                                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                    @endif
                                    <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if(empty($data['arr_main_banner']['메인_띠배너']) === false)
            <div class="Section barBnr">
                <div class="widthAuto">
                    @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_띠배너']); @endphp
                    @if(empty($last_banner['LinkUrl']) === false)
                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                    @endif
                    <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
                </div>
            </div>
        @endif

        <div class="Section">
            <div class="widthAuto">
                <div><img src="{{ img_url('gosi/visual/visual_tit01.jpg') }}" alt="더! 강력, 더! 완벽해진 윌비스 교수진"></div>
                <ul class="PBcts">
                    @for($i=1; $i<=5; $i++)
                        @if(empty($data['arr_main_banner']['메인_교수진'.$i]) === false)
                            <li>
                                @if(count($data['arr_main_banner']['메인_교수진'.$i]) > 1) <div class="bSlider"><div class="slider"> @endif
                                @php $link_url = '#none'; @endphp
                                @foreach($data['arr_main_banner']['메인_교수진'.$i] as $row)
                                    @if(empty($row['LinkUrl']) === false)
                                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                                    @endif
                                    <div><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></div>
                                @endforeach
                                @if(count($data['arr_main_banner']['메인_교수진'.$i]) > 1) </div></div> @endif
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section Section3 mt110">
            <div class="widthAuto">
                <div><img src="{{ img_url('gosi/visual/visual_tit02.jpg') }}" alt="추천강좌/이벤트/최신소식"></div>
                <ul class="SpecialBox">
                    @for($i=1; $i<=10; $i++)
                        @if(empty($data['arr_main_banner']['메인_hotpick'.$i]) === false)
                            @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_hotpick'.$i]); @endphp
                            @if(empty($last_banner['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                            @endif
                            <li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NG mt90">
            <div class="widthAuto">
                {{-- study comment include --}}
                @include('willbes.pc.site.main_partial.study_comment_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- 수강후기 //-->

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesLec">
                    <div class="smallTit mb30">
                        <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>
                    </div>

                    {{-- best product include --}}
                    @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])

                    <div class="will-listTit mt45">무료특강</div>
                    <ul class="freeLectBx">
                        @for($i=1; $i<=2; $i++)
                            @if(empty($data['arr_main_banner']['메인_무료특강'.$i]) === false)
                                @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_무료특강'.$i]); @endphp
                                @if(empty($last_banner['LinkUrl']) === false)
                                    @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                                @endif
                                <li>
                                    <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
                                    <p>{{ $last_banner['BannerName'] }}</p>
                                    {{ $last_banner['Desc'] }}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <!-- willbesLec//-->

                <div class="willbesNews">
                    <div class="smallTit mb30">
                        <p><span>윌비스 <strong>소식</strong></span></p>
                    </div>
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_box')
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
