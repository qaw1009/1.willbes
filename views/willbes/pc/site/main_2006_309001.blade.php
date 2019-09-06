@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container job c_both">
        <div class="Menu widthAuto NGR c_both">
            <!-- site nav -->
            @include('willbes.pc.layouts.partial.site_menu')
        </div>

        <div class="Section mt30">
            <div class="widthAuto bnrSec01 nSlider pick">
                <ul>
                    <li>
                        {!! banner_html(element('메인_서브1', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                    <li>
                        {!! banner_html(element('메인_서브2', $data['arr_main_banner']), 'sliderNum') !!}
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/309001_01.jpg" title="신명호 박사">
            </div>
        </div>

        <div class="Section Section2">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/309001_02.jpg" title="스포츠분야 필수 자격증, 스포츠 지도사">
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto p_re">
                <img src="https://static.willbes.net/public/images/promotion/main/309001_03.jpg" alt="신명호 박사">
                <span class="txt02_309001"><img src="https://static.willbes.net/public/images/promotion/main/309001_03_txt.gif" alt="언제나 누구나"></span>            
                <span class="prof"><iframe src="https://www.youtube.com/embed/QXxWoGDG6Rk" frameborder="0" allowfullscreen=""style="width:560px;height:420px;"></iframe></span>
                <div class="curriBox NGR">
                    <h4>2급 전문/생활 스포츠지도사 필기</h4>
                    <div id="1cha" class="curri">
                        <ul>
                            <li><strong>[7과목 중 5과목 선택]</strong><br>
                                - 스포츠사회학<br>
                                - 스포츠교육학<br>
                                - 스포츠심리학<br>
                                - 한국체육사<br>
                                - 운동생리학<br>
                                - 운동역학<br>
                                - 스포츠윤리
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt90 NSK">
            <div class="widthAuto">
                <div class="willbesNews">
                    {{-- board include --}}
                    @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
                </div>
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section mt70 mb90 NSK">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenu" class="MainQuickMenu" style="right: 70px;">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $("#stoggleBtn").click(function(){
                $("#textZone").slideToggle("fast");
            });

            $('.PBtab, .curritab').each(function () {
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
                });

                // Bind the click event handler
                $(this).on('click', 'a', function (e) {
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