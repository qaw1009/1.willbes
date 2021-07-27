@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_gosi_3103.css?ver={{time()}}" rel="stylesheet">

    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="gosi-bnfull-Sec">
            <div class="gosi-bnfull">
                {!! banner_html(element('메인_상단띠배너', $data['arr_main_banner']), 'sliderBar') !!}
            </div>
        </div>

        <div class="Section gosi-Sec NSK">
            <div class="gosi-bntop">
                <div id="TechRollingSlider" class="GositabBox">
                    {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'GositabSlider') !!}
                    <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>
                </div>

                <div id="TechRollingDiv" class="GositabList">
                    <div class="Gositab">
                        @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                            <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{!! $row['BannerName'] !!}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="Section gosi-bn03">
            <div class="widthAuto">
                <div class="tx16 mb20">교수님 추천강좌 / 이벤트 / 최신소식</div>
                <div class="will-nTit NSK-Black">지금 바로 주목해야 할 <span>HOT PICK</span></div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_핫픽'.$i]) === true)
                            <li class="nSlider">
                                {!! banner_html(element('메인_핫픽'.$i, $data['arr_main_banner']), 'sliderNum') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        @if(isset($data['arr_main_banner']['메인_중간띠배너']) === true)
            <div class="gosi-bnfull-Sec02">
                <div class="gosi-bnfull02">
                    {!! banner_html($data['arr_main_banner']['메인_중간띠배너'], 'sliderBar02') !!}
                    <p class="leftBtn" id="imgBannerLeft02"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight02"><a href="none">다음</a></p>
                </div>
            </div>
        @endif

        <div class="youtubeBox">
            <iframe src="https://www.youtube.com/embed/dcIflRAmSgE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <div class="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_01.jpg" alt="let's psat">
            <ul>
                @for($i=13; $i<=16; $i++)
                    @if(isset($data['arr_main_banner']['메인_무료강좌'.$i]) === true)
                        <li>
                            {!! banner_html($data['arr_main_banner']['메인_무료강좌'.$i]) !!}
                        </li>
                    @endif
                @endfor
                @for($i=1; $i<=12; $i++)
                    @if(isset($data['arr_main_banner']['메인_무료강좌'.$i]) === true)
                        <li>
                            {!! banner_html($data['arr_main_banner']['메인_무료강좌'.$i]) !!}
                        </li>
                    @endif
                @endfor
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_01_detail.gif" alt="자세히보기" usemap="#Map3103a" border="0">
            <map name="Map3103a" id="Map3103a">
                <area shape="rect" coords="219,18,900,88" href="#to_go" />
            </map>
        </div>

        <div class="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_02.jpg" alt="최강팀이 함께합니다.">
        </div>

        <div class="evt_02s">
            <div class="tabBox">
                <ul class="tab">
                    <li><a href="#tab01" class="active">자료해석</a></li>
                    <li><a href="#tab02">상황판단</a></li>
                    <li><a href="#tab03">언어논리</a></li>
                </ul>
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_tab01.jpg" alt="석치수">
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_tab02.jpg" alt="박준범">
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_tab03.jpg" alt="이나우"><br><br>
                    <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_tab04.jpg" alt="힌승아">
                </div>
            </div>
        </div>

        <div class="evt_03">
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_03.jpg" alt="이론+적용+실전연습">
        </div>

        <div class="evtCtnsBox evt_04" >
            <img src="https://static.willbes.net/public/images/promotion/main/2003/3103_04.jpg" alt="psat to easy" id="to_go">
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts01.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts02.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts03.png" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_cts04.png" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/main/2003/3103_right.png"></a></p>
            </div>
        </div>

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto350 f_left">
                        <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            <li><a href="#none"><span>[공지] 경찰3과 과목별 만점자를 소개합니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                            <li><a href="#none"><span>하승민 영어 2018년 3차 시험 적중!</span></a><span class="date">2018-09-01</span></li>
                            <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</span></a><span class="date">2018-08-24</span></li>
                            <li><a href="#none"><span>[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</span></a><span class="date">2018-08-13</span></li>
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                            <li><a href="#none"><span>[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</span></a><span class="date">2018-09-01</span></li>
                            <li><a href="#none"><span>2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</span></a><span class="date">2018-08-24</span></li>
                            <li><a href="#none"><span>[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</span></a><span class="date">2018-08-13</span></li>
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            <li><a href="#none"><span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span><img src="{{ img_url('cop/icon_new.png') }}"></a><span class="date">2018-09-06</span></li>
                            <li><a href="#none"><span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</span></a><span class="date">2018-09-01</span></li>
                            <li><a href="#none"><span>제주자치경찰 확대 시험운영 추진</span></a><span class="date">2018-08-24</span></li>
                            <li><a href="#none"><span>순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</span></a><span class="date">2018-08-13</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{--학원 오시는 길--}}
        @include('willbes.pc.site._viewTest.main_partial.map_2010')

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>

    <!-- End Container -->
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        );

        function go_popup() {
            $('#popup').bPopup();
        };
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3103/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }

        $(function() {
            $('.sliderBar').bxSlider({
                mode:'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                sliderWidth:2000,
                pause: 3000,
                autoHover: true,
                pager: false,
            });
        });

        //상단 메인 배너
        $(function(){
            var slidesImg = $(".GositabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,
                autoHover: true,
                pagerCustom: '#TechRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerRight").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        /*bar 배너 롤링 */
        $(function() {
            var slidesImg02 = $(".sliderBar02").bxSlider({
                mode:'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                sliderWidth:2000,
                pause: 3000,
                autoHover: true,
                pager: false,
            });
            $("#imgBannerRight02").click(function (){
                slidesImg02.goToPrevSlide();
            });

            $("#imgBannerLeft02").click(function (){
                slidesImg02.goToNextSlide();
            });
        });

        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
        });
    </script>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop