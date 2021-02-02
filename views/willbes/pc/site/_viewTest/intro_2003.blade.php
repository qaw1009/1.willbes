@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_gosi_gate.css??ver={{time()}}" rel="stylesheet">

    <div id="Container" class="Container gosi-gate NSK c_both">
        <div class="widthAuto gosi-gate-top">
            <div class="gosi-gate-sns">
                <ul>
                    <li>
                        <a href="https://www.youtube.com/channel/UCsNPdhwjR37qVtuePB599KQ" target="_blank">
                            <img src="{{ img_url('gnb/icon_youtube.png') }}" title="유튜브">
                        </a>
                    </li>
                    <li>
                        <a href="{{ site_url('/pass/promotion/index/cate/3048/code/1104') }}" target="_blank">
                            <img src="{{ img_url('gnb/icon_kakao.png') }}" title="카카오톡">
                        </a>
                    </li>
                    <li>
                        <a href="https://tv.naver.com/willbes79" target="_blank">
                            <img src="{{ img_url('gnb/icon_navertv.png') }}" title="네이버TV">
                        </a>
                    </li>
                    <li>
                        <a href="https://blog.naver.com/willbes79" target="_blank">
                            <img src="{{ img_url('gnb/icon_blog.png') }}" title="블로그">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/willbes_gong/" target="_blank">
                            <img src="{{ img_static_url('promotion/2019/10/icon_instagram.png') }}" title="인스타그램">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="gosi-logo">
                <img src="{{ img_static_url('promotion/main/gosi_gate/2003_logo.png') }}" alt="윌비스 공무원">
            </div>

            <div class="gosi-gate-search">
                {{-- 온라인강의 검색 --}}
                @include('willbes.pc.layouts.partial.site_search')
            </div>
        </div>

        {{-- 카테고리 메뉴 --}}
        <div class="gosi-gate-menu">
            <ul>
                <li><a href="{{ front_url('/home/index/cate/3092') }}">무료인강</a></li>
                <li><a href="{{ front_url('/home/index/cate/3019') }}">9급</a></li>
                <li><a href="{{ front_url('/home/index/cate/3103') }}">7급 PSAT</a></li>
                <li><a href="{{ front_url('/home/index/cate/3020') }}">7급</a></li>
                <li><a href="{{ front_url('/home/index/cate/3022') }}">세무직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3035') }}">법원직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3023') }}">소방직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3028') }}">기술직</a></li>
                <li><a href="{{ front_url('/home/index/cate/3024') }}">군무원</a></li>
            </ul>
        </div>

        <div class="gosi-bnfull-Sec">
            <div class="gosi-bnfull">
                {!! banner_html(element('인트로_상단띠배너', $data['banner']), 'sliderBar') !!}
            </div>
        </div>

        <div class="Section gosi-gate-Sec">
            <div class="widthAuto">
                {!! banner_html(element('인트로_핵심띠배너', $data['banner'])) !!}

                <div class="gosi-gate-bntop p_re">
                    <div id="MainRollingDiv" class="MaintabList">
                        <ul class="Maintab">
                            @foreach($data['banner']['인트로_메인빅배너'] as $row)
                                <li><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['banner']['인트로_메인빅배너'], 'MaintabSlider') !!}
                    </div>
                </div>
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>
            </div>
        </div>

        <div class="Section gosi-bnfull02">
            <div class="widthAuto">
                {!! banner_html(element('인트로_중간띠배너', $data['banner'])) !!}
            </div>
        </div>

        <div class="Section">
            <div class="widthAuto gosi-gate-bn01 nSlider pick">
                <div class="f_left">
                    <div class="will-nTit NSK-Black">공무원, 어떻게 준비하나요? </div>
                    @for($i=1; $i<2; $i++)
                        {!! banner_html(element('인트로_서브1', $data['banner']), 'sliderNum') !!}
                    @endfor
                </div>
                <div class="f_right">
                    <div class="will-nTit NSK-Black">윌비스 신규회원가입 혜택</div>
                    @for($i=1; $i<2; $i++)
                        {!! banner_html(element('인트로_서브2', $data['banner']), 'sliderNum') !!}
                    @endfor
                </div>
                </ul>
            </div>
        </div>

        <div class="Section tpassWrap">
            <div class="widthAuto">
                <div class="f_left"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_tpass_bg.jpg" alt="T-PASS"></div>
                <div class="f_right">
                    @for($i=1; $i<=12; $i++)
                        @if(isset($data['banner']['인트로_티패스'.$i]) === true)
                            {!! banner_html(element('인트로_티패스'.$i, $data['banner'])) !!}
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <div class="Section gosi-gate-profWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">합격을 책임질 윌비스 직렬별 대표 교수진</div>
                <ul class="gosi-tabs-prof">
                    <li><a href="#item01" class="on">9/7급</a></li>
                    <li><a href="#item02">세무직</a></li>
                    <li><a href="#item03">법원직</a></li>
                    <li><a href="#item04">소방직</a></li>
                    <li><a href="#item05">기술직</a></li>
                    <li><a href="#item06">군무원</a></li>
                </ul>
                <div class="gosi-tabs-contents-wrap">
                    <div id="item01" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof">
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_9_7급'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_9_7급'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item02" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_세무직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_세무직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item03" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_법원직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_법원직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item04" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_소방직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_소방직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item05" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_기술직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_기술직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item06" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['인트로_군무원'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('인트로_군무원'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section castWrap">
            <div class="widthAuto">
                <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
                <div class="will-nTit NSK-Black">합격을 앞당기는 <span>수험생활 팁</span></div>
                <div class="castBox">
                    <ul class="castslider">
                        @foreach($data['banner'] as $section_name => $section_banners)
                            @if(starts_with($section_name, '인트로_cast') === true)
                                <li>
                                    {!! banner_html($section_banners, '', '' , false, '', '', 'castTitle') !!}
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="{{ img_static_url('promotion/main/btn_arrowL.png') }}"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="{{ img_static_url('promotion/main/btn_arrowR.png') }}"></a></p>
                </div>
            </div>
        </div>

        <div class="Section gosi-gate-bn02">
            <div class="widthAuto pick">
                <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
                <div class="will-nTit NSK-Black">윌비스 공무원 학원 <span>실강 안내</span></div>
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['banner']['인트로_실강안내'.$i]) === true)
                            <li class="nSlider">
                                {!! banner_html(element('인트로_실강안내'.$i, $data['banner']), 'sliderNum') !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        {{-- 게시판 --}}
        <div class="Section mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto350 f_left">
                        <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show?board_idx=' . $row['BoardIdx'])}}">
                                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                                            {{$row['Title']}}
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_announcement']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_announcement'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show?board_idx='.$row['BoardIdx'], false, true)}}">
                                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                                            {{$row['Title']}}
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">수험뉴스 <a href="{{front_url('/support/examNews/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_news']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_news'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examNews/show?board_idx=' . $row['BoardIdx'], false, true)}}">
                                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                                            {{$row['Title']}}
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt50 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->

        <div id="QuickMenu" class="MainQuickMenu">
            <ul>
                @if(empty($data['dday']) === false)
                    <li class="dday">
                        <div class="QuickSlider">
                            <div class="sliderNum">
                                @foreach($data['dday'] as $val)
                                    @php $arr_dday = explode('::', $val); @endphp
                                    <div class="QuickDdayBox">
                                        <div class="q_tit">{{ $arr_dday[0] }}</div>
                                        <div class="q_day">{{ $arr_dday[1] }}</div>
                                        <div class="q_dday NSK-Black">{{ $arr_dday[2] == 0 ? 'D-' . $arr_dday[2] : 'D' . $arr_dday[2] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('인트로_우측퀵_01', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('인트로_우측퀵_02', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('인트로_우측퀵_03', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
            </ul>
        </div>
        <!-- 퀵메뉴 //-->
    </div>
    <!-- End Container -->
    {!! popup('657005', $__cfg['SiteCode'], '0', '') !!}

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        //상단 메인 배너
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
            $("#imgBannerRight").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerLeft").click(function (){
                slidesImg.goToNextSlide();
            });

            //교수진 배너
            $('.gosi-tabs-prof').each(function(){
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

                    e.preventDefault()})
            });

            //대표 교수진
            $('.sliderProf').bxSlider({
                auto: true,
                controls: true,
                pause: 4000,
                pager: true,
                pagerType: 'short',
                slideWidth: 208,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
                adaptiveHeight: true,
                infiniteLoop: true,
                touchEnabled: false,
                autoHover: true,
                onSliderLoad: function(){
                    $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1});
                }
            });

            // 수험생활 팁 (캐스트)
            var slidesImg1 = $('.castslider').bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:3,
                maxSlides:3,
                slideWidth: 370,
                slideMargin:5,
                autoHover: true,
                moveSlides:1,
            });

            $('#imgBannerLeft1').click(function (){
                slidesImg1.goToPrevSlide();
            });

            $('#imgBannerRight1').click(function (){
                slidesImg1.goToNextSlide();
            });

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
    </script>
@stop
