@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container cert c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

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
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/308901_01.jpg" title="김종상 교수 직강"></a>
            </div>
        </div>

        <div class="Section ProfBox">
            <div class="widthAuto">
                <ul class="PBtab NGR">
                    <li><a href="#tab01">소방설비(산업)기사 '전기'</a></li>
                    <li><a href="#tab02">소방설비(산업)기사 '기계'</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/main/308901_tab01.jpg" alt="전기분야">
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/main/308901_tab02.jpg" alt="기계분야">
                </div>
            </div>
        </div>

        <div class="Section Section2">
            <div class="widthAuto p_re">
                <img src="https://static.willbes.net/public/images/promotion/main/308901_02.jpg" alt="소방설비(산업)기사 더블 패스" usemap="#Map3089901A" border="0">
                <map name="Map3089901A" id="Map3089901A">
                    <area shape="rect" coords="744,563,987,611" href="#none" id="stoggleBtn" alt="자격증 취득 팁" />
                </map>
                <div class="tipPopup" id="textZone"><img src="https://static.willbes.net/public/images/promotion/main/308901_02_pop.jpg" alt="1년 안에 2개 자격증 취득 팁!"></div>
            </div>
        </div>

        <div class="Section Section3">
            <div class="widthAuto p_re">
                <img src="https://static.willbes.net/public/images/promotion/main/308901_03.jpg" alt="김종상 교수">
                <span class="txt01"><img src="https://static.willbes.net/public/images/promotion/main/308902_03_txt.gif" alt="언제나 누구나"></span>
                <div class="curriBox NGR">
                    <h4>소방설비(산업)기사 『 전기 / 기계 』</h4>
                    <ul class="curritab">
                        <li><a href="#1cha">1차 과목</a></li>
                        <li><a href="#2cha">2차 과목</a></li>
                    </ul>
                    <div id="1cha" class="curri">
                        <ul>
                            <li>소방원론</li>
                            <li>소방관계법규</li>
                            <li>소방전기일반</li>
                            <li>소방전기시설의 구조 및 원리</li>
                            <li>소방유체역학</li>
                            <li>소방기계시설의 구조 및 원리</li>
                        </ul>
                    </div>
                    <div id="2cha" class="curri">
                        <ul>
                            <li>소방전기시설 설계 및 시공 실무</li>
                            <li>소방기계시설 설계 및 시공 실무</li>
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