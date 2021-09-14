@extends('willbes.pc.layouts.master')
@section('content')
    <!-- Container -->
    <div id="Container" class="Container cop NGR c_both combine">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}
                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>
                        <div id="MainRollingDiv" class="MaintabList">
                            <div class="Maintab">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <span><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto NSK">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_상품배너'.$i]) === true)
                            <li class="SecBanner02">
                                {!! banner_html(element('메인_상품배너'.$i, $data['arr_main_banner']),'','','','','','',true) !!}
                            </li>
                        @endif
                    @endfor
                    @if(isset($data['arr_main_banner']['메인_상품배너4']) === true)
                        <li class="SecBanner02">
                            <div class="bSlider">
                                {!! banner_html(element('메인_상품배너4', $data['arr_main_banner']),'slider','','','','','',true) !!}
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    최근 <span class="cop-color">업로드</span> 강좌
                    <span class="f_right tx12 NSK-Thin pt10">* 최근 1주일 이내 업데이트된 강좌들 입니다.</span>
                </div>
                <div class="uploadLec NSK">
                    <div class="vSlider">
                        <div class="sliderNumV">
                            @foreach($data['lecture_update_info'] as $row)
                                @if($loop->index % 2 == 1)
                                    <div>
                                        @endif
                                        <div class="lecReview">
                                            <a href="{{ front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode']) }}">
                                                <div class="imgBox">
                                                    <img src="{{$row['ProfLecListImg']}}">
                                                </div>
                                                <div class="lecinfo">
                                                    <p>{{$row['SubjectName']}} {{$row['ProfNickName']}}</p>
                                                    <p>{{ $row['ProdName'] }}</p>
                                                    <p>{{ date("m", strtotime($row['unit_regdate'])) }}월 {{ date("d", strtotime($row['unit_regdate'])) }}일 총 {{ $row['unit_cnt'] }}강 업로드</p>
                                                </div>
                                            </a>
                                        </div>
                                        @if($loop->index % 2 == 0)
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="Section Sction3 mt100">
            <div class="widthAuto">
                <div class="SecBanner12">
                    <div class="will-nTit NSK-Black">
                        전문 <span class="cop-color">교수진</span>
                        <span class="tx16 NSK-Thin pt10 ml20">경찰 합격을 위한 선택! 최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                    </div>
                    <ul class="pro_box">
                        @for($i=1;$i<=10;$i++)
                            @if(isset($data['arr_main_banner']['메인_전문교수진' . $i]) === true)
                                <li class="bSlider">
                                    {!! banner_html(element('메인_전문교수진'.$i, $data['arr_main_banner']),'slider') !!}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        @if(isset($data['arr_main_banner']['메인_중간띠배너']) === true)
            <div class="Section mt70">
                <div class="widthAuto SecBanner04">
                    {!! banner_html($data['arr_main_banner']['메인_중간띠배너'], 'slider') !!}
                </div>
            </div>
        @endif

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    검정제 <span class="cop-color">교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">합격의 필수요소! 검정제 시작부터 제대로 준비하세요.</span>
                </div>
                <ul class="SecBanner11">
                    @for($i=1;$i<=3;$i++)
                        @if(isset($data['arr_main_banner']['메인_검정제교수진' . $i]) === true)
                            <li>
                                {!! banner_html(element('메인_검정제교수진'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section SectionBg02 NSK">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    수험생 맞춤 콘텐츠
                    <span class="tx16 NSK-Thin pt10 ml20">경시생들에게 제공하는 수강 맞춤 콘텐츠 입니다.</span>
                </div>
                <ul class="SecBanner06">
                    @for($i=1; $i<=9; $i++)
                        @if(isset($data['arr_main_banner']['메인_콘텐츠'.$i]) === true)
                            <li>
                                {!! banner_html(element('메인_콘텐츠'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor
                </ul>

                @if (empty(element('메인_유튜브', $data['arr_main_banner'])) === false)
                    <div class="will-nTit NSK-Black mt100">
                        신광은경찰팀 유튜브 채널 모음
                    </div>
                    <div class="Section tube_wrap">
                        <div class="widthAuto">
                            <div class="tube_box">
                                <ul class="tube_slider">
                                    {{-- 배너함수 사용 불가 --}}
                                    @foreach(element('메인_유튜브', $data['arr_main_banner']) as $row)
                                        <li>
                                            <div>
                                                @if(empty($row['LinkUrl']) === true || $row['LinkUrl'] == '#')
                                                    <a href="javascript:void(0);">
                                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                                    </a>
                                                @else
                                                    <a href="{{front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www')}}" target="{{$row['LinkType']}}">
                                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="tube_title">{{ $row['BannerName'] }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                                <p class="leftBtn"><a id="tube_slider_left"><img src="https://static.willbes.net/public/images/promotion/main/2001/combine_left.png"></a></p>
                                <p class="rightBtn"><a id="tube_slider_right"><img src="https://static.willbes.net/public/images/promotion/main/2001/combine_right.png"></a></p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto SecBanner07">
                <div class="will-nTit NSK-Black">
                    경찰학원 핫 이슈
                    <span class="tx16 NSK-Thin pt10 ml20">학원의 최신 소식을 한 눈에 확인하세요.</span>
                </div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_핫이슈'.$i]) === true)
                            <li>
                                {!! banner_html(element('메인_핫이슈'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor
                    <li>
                        @for($i=1; $i<=2; $i++)
                            @if(isset($data['arr_main_banner']['메인_핫이슈서브'.$i]) === true)
                                {!! banner_html(element('메인_핫이슈서브'.$i, $data['arr_main_banner'])) !!}
                            @endif
                        @endfor
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section SectionBg03 mt100">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.new_product_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt30">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section mt50 mb50">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.onCollaborate_2001')
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        //상단배너
        $(function(){
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:5000,
                sliderWidth:2000,
                auto : true,
                autoHover: true,
                pagerCustom: '#MainRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });

        //하단이벤트배너 닫기
        $(function(){
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });
        });

        //협력기관
        $(document).ready(function() {
            var collaboslides = $("#collaboslides ul").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:750,
                pause:3000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
            });
        });

        //최근 업로드 강좌
        $(function() {
            $('.sliderNumV').bxSlider({
                mode: 'fade',
                auto: true,
                touchEnabled: false,
                controls: false,
                pause: 3000,
                autoHover: true,
                pager:true,
                onSliderLoad: function(){
                    $(".vSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
        });

        //경찰팀 TV
        $(function() {
            $('.tabTvBtns ul').each(function () {
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).css({visibility: 'hidden', height: '0', overflow: 'hidden'});
                });

                $(this).on('click', 'a', function (e) {
                    $active.removeClass('on');
                    $content.hide().css({visibility: 'hidden', height: '0', overflow: 'hidden'});

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('on');
                    $content.show().css({visibility: 'visible', height: 'auto', overflow: 'visible'});
                    e.preventDefault();
                });
            });
        });

        //유튜브채널
        $(function() {
            var newsImg = $(".tube_slider").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                slideWidth: 224,
                minSlides:5,
                maxSlides:5,
                slideMargin:0,
                autoHover:true,
                moveSlides:1,
            });
            $("#tube_slider_left").click(function (){
                newsImg.goToPrevSlide();
            });

            $("#tube_slider_right").click(function (){
                newsImg.goToNextSlide();
            });
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
