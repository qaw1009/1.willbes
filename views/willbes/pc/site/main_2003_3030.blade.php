@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container noncom c_both">
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
            <div class="widthAuto bSlider">
                @if(empty($data['arr_main_banner']['메인_띠배너']) === false)
                <ul class="sliderPlay">
                    @php $link_url = '#none'; @endphp
                    @foreach($data['arr_main_banner']['메인_띠배너'] as $row)
                        @if(empty($row['LinkUrl']) === false)
                            @php $link_url = front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www'); @endphp
                        @endif
                        <li><a href="{{ $link_url }}" target="_{{ $row['LinkType'] }}"><img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" alt="{{ $row['BannerName'] }}"></a></li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="{{ img_url('gosi_noncom/visual/visual_tit01.jpg') }}" alt="오랜 경험과 노하우를 가진 전문 교수진">
                <ul class="PBcts">
                    @for($i=1; $i<=4; $i++)
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

    <script type="text/javascript">
        $(function() {
            $('.sliderPlay').bxSlider({
                auto: true,
                controls: false,
                pause: 4000,
                moveSlides:2,
                minSlides:2,
                maxSlides:2,
                slideWidth:1120,
                autoHover: true,
                onSliderLoad: function(){
                    $(".bSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
