@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_gosi_3103.css?ver={{time()}}" rel="stylesheet">
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}        
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        
        /************************************************************/     

        .evtTop {background:#1D318A;}

        .evt01 {background:#222327;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2790_01_bg.jpg) no-repeat center top; height: 1137px;}        
        .evt01 .imgA {position: absolute; top:1445px; left:50%; margin-left:-460px; z-index: 2;}
        .evt01 .imgB {position: absolute; top:1540px; left:50%; margin-left:-390px; z-index: 2;}

        .deadline {            
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        @@keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-10px}
            to{margin-top:0}
        }
        @@-webkit-keyframes upDown{
            from{margin-top:0}
            60%{margin-top:-10px}
            to{margin-top:0}
        }

        .evt02 {background:#222327;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2790_03_bg.jpg) no-repeat center top;}

        .evt05 {background:#D4F0F1;}

        .evt06 {background:#1D318A;}

    </style>

    <div id="Container" class="Container gosi NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="gosi-bnfull-Sec">
            <div class="gosi-bnfull">
                {!! banner_html(element('메인_상단띠배너', $data['arr_main_banner']), 'sliderBar') !!}
            </div>
        </div>

        <!--
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
            <iframe src="https://www.youtube.com/embed/XrI4cJvdal4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
-->


        <div class="evtContent NSK" id="evtContainer">         

            <div class="evtCtnsBox evtTop" data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_top.jpg" title="5일일의 투자">
            </div>

            <div class="evtCtnsBox evt01">
                <span class="imgA deadline" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2790_img01.png" alt=""/></span>
                <span class="imgB deadline" data-aos="flip-down" data-aos-duration="1000"><img src="https://static.willbes.net/public/images/promotion/2022/10/2790_img02.png" alt=""/></span>
            </div>

            <div class="evtCtnsBox evt02" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_02.jpg" title="빅4">
            </div>

            <div class="evtCtnsBox evt03" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_03.jpg" title="석치수 자료해석">
            </div>

            <div class="evtCtnsBox evt04" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_04.jpg" title="강의정보">
            </div>

            <div class="evtCtnsBox evt05" data-aos="fade-up">
                <div>
                    <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_05.jpg" title="welcome event">
                    <a href="https://pass.willbes.net/pass/offLecture/show/cate/3143/prod-code/201562" target="_blank" title="바로가기" style="position: absolute;left: 32.63%;top: 72.95%;width: 34.58%;height: 10.06%;z-index: 2;"></a>
                </div>
            </div>

            <div class="evtCtnsBox evt06" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2790_06.jpg" title="psat so easy">
            </div>

        </div>
        <!-- End Container -->

        <div class="Section mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="Section NSK mt90">
                        <div class="widthAuto">
                            <div class="noticeList widthAuto350 f_left">
                                <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add">
                                        <img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                </div>
                                <ul class="List-Table">
                                    @if(empty($data['notice']) === true)
                                        <li><span>등록된 내용이 없습니다.</span></li>
                                    @else
                                        @foreach($data['notice'] as $row)
                                            <li>
                                                <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                    <span>{{$row['Title']}}</span> @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                                </a>
                                                <span class="date">{{$row['RegDatm']}}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="noticeList widthAuto350 f_left ml35">
                                <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add">
                                        <img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                </div>
                                <ul class="List-Table">
                                    @if(empty($data['exam_announcement']) === true)
                                        <li><span>등록된 내용이 없습니다.</span></li>
                                    @else
                                        @foreach($data['exam_announcement'] as $row)
                                            <li>
                                                <a href="{{front_url('/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                    <span>{{$row['Title']}}</span> @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                                </a>
                                                <span class="date">{{$row['RegDatm']}}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="noticeList widthAuto350 f_left ml35">
                                <div class="will-nlistTit p_re">수험뉴스 <a href="{{front_url('/support/examNews/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add">
                                        <img src="{{ img_url('cop/icon_add_big.png') }}"></a>
                                </div>
                                <ul class="List-Table">
                                    @if(empty($data['exam_news']) === true)
                                        <li><span>등록된 내용이 없습니다.</span></li>
                                    @else
                                        @foreach($data['exam_news'] as $row)
                                            <li>
                                                <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                    <span>{{$row['Title']}}</span> @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                                </a>
                                                <span class="date">{{$row['RegDatm']}}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        {{--학원 오시는 길--}}
        @include('willbes.pc.site.main_partial.map_2003')
        

        <div class="Section mt70 mb90 NSK">
            <div class="widthAuto">
                {{-- cscenter --}}
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>
@stop