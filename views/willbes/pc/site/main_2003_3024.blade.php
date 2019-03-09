@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container gp c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual">
            <div class="widthAuto NSK mt30">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                <div class="VisualsubBox">
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
                </div>
                @endif
            </div>
        </div>

        <div class="Section mt30">
            <div class="widthAuto">
                @if(empty($data['arr_main_banner']['메인_띠배너']) === false)
                    @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_띠배너']); @endphp
                    @if(empty($last_banner['LinkUrl']) === false)
                        @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                    @endif
                    <a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a>
                @endif
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit01.jpg') }}" alt="빠른 합격을 위한 윌비스 군무원 추천강좌">
                <ul class="PBcts">
                    @for($i=1; $i<=4; $i++)
                        @if(empty($data['arr_main_banner']['메인_미들'.$i]) === false)
                            @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_미들'.$i]); @endphp
                            @if(empty($last_banner['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                            @endif
                            <li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gpgosi/visual/visual_tit02.jpg') }}" alt="빠른 합격을 위한 윌비스 군무원 추천강좌">
                <ul class="PBctsB">
                    @for($i=1; $i<=8; $i++)
                        @if(empty($data['arr_main_banner']['메인_교수진'.$i]) === false)
                            @php $link_url = '#none'; $last_banner = end($data['arr_main_banner']['메인_교수진'.$i]); @endphp
                            @if(empty($last_banner['LinkUrl']) === false)
                                @php $link_url = front_app_url('/banner/click?banner_idx=' . $last_banner['BIdx'] . '&return_url=' . urlencode($last_banner['LinkUrl']) . '&link_url_type=' . urlencode($last_banner['LinkUrlType']), 'www'); @endphp
                            @endif
                            <li><a href="{{ $link_url }}" target="_{{ $last_banner['LinkType'] }}"><img src="{{ $last_banner['BannerFullPath'] . $last_banner['BannerImgName'] }}" alt="{{ $last_banner['BannerName'] }}"></a></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_wide')
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
