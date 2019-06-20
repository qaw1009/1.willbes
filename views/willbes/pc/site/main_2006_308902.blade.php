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
                <img src="https://static.willbes.net/public/images/promotion/main/308902_01.jpg" title="이재원 교수 직강">
            </div>
        </div>

        <div class="Section ProfBox">
            <div class="widthAuto">
                <ul class="PBtab NGR">
                    <li><a href="#tab01">전기(산업)기사</a></li>
                    <li><a href="#tab02">전기기능사</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/main/308902_tab01.jpg" alt="전기(산업)기사">
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/main/308902_tab02.jpg" alt="전기기능사">
                </div>
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto p_re">
                <img src="https://static.willbes.net/public/images/promotion/main/308902_03.jpg" alt="이재원 교수">
                <span class="txt02"><img src="https://static.willbes.net/public/images/promotion/main/308902_03_txt.gif" alt="언제나 누구나"></span>
                <div class="curriBox NGR">
                    <h4>소방설비(산업)기사 『 전기 / 기계 』</h4>
                    <ul class="curritab">
                        <li><a href="#1cha">1차 과목</a></li>
                        <li><a href="#2cha">2차 과목</a></li>
                    </ul>
                    <div id="1cha" class="curri">
                        <ul>
                            <li><strong>필기</strong><br>
                                - 전기자기학 / 전력공학 / 전기기기<br>
                                - 회로이론 및 제어공학<br>
                                - 전기설비기술기준 및 판단기준
                            </li>
                            <li><strong>실기</strong><br>
                                - 전기설비설계 및 관리
                            </li>
                        </ul>
                    </div>
                    <div id="2cha" class="curri">
                        <ul>
                            <li><strong>필기</strong><br>
                                - 전기이론<br>
                                - 전기기기<br>
                                - 전기설비
                            </li>
                            <li><strong>실기</strong><br>
                                - 전기설비작업
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
@stop