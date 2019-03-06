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
            <div class="VisualBox p_re bSlider">
                <div id="MainRollingDiv" class="MaintabList three">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">2020 법원팀 PASS</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);" class="">법원팀 예비순환</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);" class="">3~4월 신규강좌</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="MaintabSlider">
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_law/banner/bnr_714x300_01.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_law/banner/bnr_714x300_02.jpg') }}" alt="배너명"></a></li>
                                <li><a href="#none" target="_blank"><img src="{{ img_url('gosi_law/banner/bnr_714x300_03.jpg') }}" alt="배너명"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="VisualsubBox">
                <div class="bSlider">
                    <div class="sliderStopAuto">
                        <div><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_394x300_01.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_394x300_02.jpg') }}" alt="배너명"></a></div>
                        <div><a href="#none"><img src="{{ img_url('gosi_law/banner/bnr_394x300_03.jpg') }}" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
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
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof01.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof02.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof03.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof04.jpg') }}" alt="배너명"></a></li>
                </ul>
            </div>
            <div id="tab02">
                <img src="{{ img_url('gosi_law/visual/visual_tit01_02.jpg') }}" alt="지금은 전범위 모의고사로 마무리 할 때!">
                <ul class="PBcts">
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof05.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof06.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof07.jpg') }}" alt="배너명"></a></li>
                    <li><a href="#none"><img src="{{ img_url('gosi_law/visual/visual_prof08.jpg') }}" alt="배너명"></a></li>
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
<!-- End Container -->
@stop