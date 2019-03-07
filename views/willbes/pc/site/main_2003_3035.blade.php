@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container law c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section Section2">
            <div class="widthAuto">
                <a href="#none"><img src="{{ img_url('gosi_law/visual/visual_top.jpg') }}" alt="최적의 합격솔루션 김동진 법원팀"></a>
            </div>
        </div>

        <div class="Section MainVisual">
            <div class="widthAuto NSK mt30">
                @if(empty($data['arr_main_banner']['메인_서브1']) === false)
                <div class="VisualBox p_re bSlider">
                    <div id="MainRollingDiv" class="MaintabList three">
                        <ul class="Maintab">
                            @foreach($data['arr_main_banner']['메인_서브1'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        <div class="bx-wrapper">
                            <div class="bx-viewport">
                                <ul class="MaintabSlider">
                                    @php $link_url = '#none'; @endphp
                                    @foreach($data['arr_main_banner']['메인_서브1'] as $row)
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

                @if(empty($data['arr_main_banner']['메인_서브2']) === false)
                <div class="VisualsubBox">
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
                </div>
                @endif
            </div>
        </div>

        <div class="Section ProfBox">
            <div class="widthAuto">
                <ul class="PBtab NSK">
                    <li><a href="#tab01">현재 준비중인 수험생이라면</a></li>
                    <li><a href="#tab02">지금 시작하는 초시생이라면</a></li>
                </ul>
                <div id="tab01">
                    <img src="{{ img_url('gosi_law/visual/visual_tit01_01.jpg') }}" alt="지금은 전범위 모의고사로 마무리 할 때!">
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
                <div id="tab02">
                    <img src="{{ img_url('gosi_law/visual/visual_tit01_02.jpg') }}" alt="지금은 전범위 모의고사로 마무리 할 때!">
                    <ul class="PBcts">
                        @for($i=4; $i<=8; $i++)
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
        </div>

        <div class="Section Section3 mt100">
            <div class="widthAuto p_re">
                <div><img src="{{ img_url('gosi_law/visual/visual_tip.jpg') }}" alt="오직 법원직을 위한 최강 라인업 윌비스 김동진 법원팀"></div>
                <ul class="tipGo NSK">
                    <li><a href="#none">강좌 바로가기</a></li>
                    <li><a href="#none">강좌 바로가기</a></li>
                    <li><a href="#none">강좌 바로가기</a></li>
                    <li><a href="#none">강좌 바로가기</a></li>
                    <li><a href="#none">강좌 바로가기</a></li>
                    <li><a href="#none">강좌 바로가기</a></li>
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
        $(document).ready(function(){
            $('.PBtab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault();
                });
            });
        });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
