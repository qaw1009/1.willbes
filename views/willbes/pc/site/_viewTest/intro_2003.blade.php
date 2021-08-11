@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_gosi_gate_2021.css??ver={{time()}}" rel="stylesheet">

    <!-- Container -->

    <div id="Container" class="Container gosi-gate-v2 NSK c_both">

        <div class="widthAuto gosi-gate-secTop">
            <div class="gosi-gate-search">
                {{-- 온라인강의 검색 --}}
                @include('willbes.pc.layouts.partial.site_search')
            </div>

            <div class="Menu widthAuto NSK c_both">
                <h3>
                    <div class="menu-Tit">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/2003_logo_2021.png" alt="윌비스공무원">
                    </div>
                    <ul class="menu-List">
                        <div><a href="{{ front_url('/home/index/cate/3019') }}">9급</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3103') }}">7급PSAT</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3020') }}">7급</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3022') }}">세무직</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3035') }}">법원직</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3023') }}">소방직</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3028') }}">기술직</a></div>
                        <div><a href="{{ front_url('/home/index/cate/3024') }}">군무원</a></div>
                        <div class="dropdown">
                            <a href="{{ front_url('/pass/home/index') }}"><span></span>학원</a>
                            <div class="drop-Box list-drop-Box">
                                <ul>
                                    <li><a href="{{ front_url('/pass/home/index') }}">노량진(본원)</a></li>
                                    <li><a href="{{ front_url('/pass/campus/show/code/605003') }}">부산</a></li>
                                    <li><a href="{{ front_url('/pass/campus/show/code/605004') }}">대구</a></li>
                                    <li><a href="{{ front_url('/pass/campus/show/code/605005') }}">인천</a></li>
                                    <li><a href="{{ front_url('/pass/campus/show/code/605006') }}">광주</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                    <div class="menu-banner">{!! banner_html(element('게이트_우측상단배너', $data['banner'])) !!}</div>
                </h3>
            </div>
        </div>

        <div class="Section gosi-gate-Sec">
            <div class="gosi-gate-bntop-img">
                <div class="gate-bntop-Slider mainSlider01">
                    <ul class="swiper-wrapper">
                        @for($i=0; $i<=9; $i++)
                            @if(isset($data['banner']['게이트_메인배너'.$i]) === true)
                                <li class="swiper-slide">
                                    {!! banner_html(element('게이트_메인배너'.$i, $data['banner']), '', '' , false, '', 'bnBig') !!}
                                    @if(empty($data['banner']['게이트_서브배너'.$i.'_1']) === false)
                                        <div class="bnSm">
                                            @for($s=1;$s<=3;$s++)
                                                <div>{!! banner_html(element('게이트_서브배너'.$i.'_'.$s, $data['banner'])) !!}</div>
                                            @endfor
                                        </div>
                                    @endif
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="MaintabList">
                <div class="widthAuto p_re">
                    <div class="MaintabControl">
                        <div class="swiper-pagination-gate"></div>
                        <div class="start" style="display:none;"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconPlay.png" alt="재생"></div>
                        <div class="stop"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconStop.png" alt="정지"></div>
                        <div class="swiper-btn-prev"></div>
                        <div class="swiper-btn-next"></div>
                    </div>
                    <div class="MaintabWrap">
                        <ul class="Maintab">
                            @php $j=0; @endphp
                            @for($i=0; $i<=9; $i++)
                                @if(isset($data['banner']['게이트_메인배너'.$i]) === true)
                                    <li><a data-swiper-slide-index="{{ $j }}" data-aaaaaaa="asdf" href="javascript:void(0);" @if($j == 0) class="active" @endif>
                                            {{ $data['banner']['게이트_메인배너'.$i][0]['BannerName'] }}</a></li>
                                    @php $j++; @endphp
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div class="MaintabAll">
                        <a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnAB.png" alt="전체보기"></a>
                    </div>
                    <div class="MaintabAllView" style="display:none;">
                        <div class="title">
                            <span>진행중인 모든 이벤트</span>
                            <span><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnClose.png" alt="닫기"></a></span>
                        </div>
                        <div class="tabCts">
                            @php $j=0; @endphp
                            @for($i=0; $i<=9; $i++)
                                @if(isset($data['banner']['게이트_메인배너'.$i]) === true)
                                    <a data-swiper-slide-index="{{ $j }}" @if($j == 0) class="active" @endif>{{ $data['banner']['게이트_메인배너'.$i][0]['BannerName'] }}</a>
                                    @php $j++; @endphp
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section newsWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">지금 바로 주목해야 할 <span>새로운 소식!</span></div>
                <div class="newsBox">
                    <ul class="newsSlider">
                        @for($i=1; $i<=10; $i++)
                            @if(isset($data['banner']['게이트_새소식'.$i]) === true)
                                <li>
                                    <div>{!! banner_html(element('게이트_새소식'.$i, $data['banner'])) !!}</div>
                                    <div class="newsTitle">{{ $data['banner']['게이트_새소식'.$i][0]['BannerName'] or "" }}</div>
                                </li>
                            @endif
                        @endfor
                    </ul>
                    <p class="leftBtn"><a id="newsSliderLeft"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconAL60.png"></a></p>
                    <p class="rightBtn"><a id="newsSliderRight"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconAR60.png"></a></p>
                </div>
            </div>
        </div>

        <div class="Section gosi-bnfull02">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black"><span>초보 수험생</span>이라면, <span>꼭</span> 확인해보세요!</div>
            </div>
            {!! banner_html(element('게이트_초보가이드', $data['banner']), 'slider') !!}
        </div>

        <div class="Section mt80">
            <div class="widthAuto tx-center">
                <div class="will-nTit NSK-Black mb40 tx-left">단기 합격자는 <span>지금 이 시기, ‘이론’</span>에 <span>집중</span>했습니다.</div>
                {!! banner_html(element('게이트_단기합격자', $data['banner'])) !!}
            </div>
        </div>

        <div class="Section tpassWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black tx-left mb40">자신 있는 주력 과목을 만들고 싶다면, <span>윌비스 T-PASS!</span></div>
                <div class="tpassLeft">
                    {!! banner_html(element('게이트_티패스1', $data['banner']), 'slider', '', true, '', 'bnimg', '', false, false, true) !!}
                </div>
                <div class="tpassRight">
                    {{-- 티패스2 --}}
                    <div class="tpassRightTop">
                        {!! banner_html(element('게이트_티패스2', $data['banner']), 'slider', '', true, '', 'bnimg', '', false, false, true) !!}
                    </div>
                    <div class="tpassRightBottom">
                        {!! banner_html(element('게이트_티패스3', $data['banner']), 'slider', '', true, '', 'bnimg', '', false, false, true) !!}
                        {!! banner_html(element('게이트_티패스4', $data['banner']), 'slider', '', true, '', 'bnimg', '', false, false, true) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="Section castWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">쉬면서도 열공이 되는 <span>윌비스 YOUTUBE 영상</span>을 시청해보세요!</div>
                <div class="castBox">
                    <ul class="castslider">
                        @for($i=1;$i<=10;$i++)
                            <li>
                                {!! banner_html(element('게이트_유튜브'.$i, $data['banner']), '', '', false, '', '', 'castTitle') !!}
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>

        <div class="Section gosi-gate-profWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">합격을 끝까지 책임지는 윌비스 교수진을 만나보세요!</div>
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
                                @if(isset($data['banner']['게이트_9_7급'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_9_7급'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item02" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_세무직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_세무직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item03" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_법원직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_법원직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item04" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_소방직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_소방직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item05" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_기술직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_기술직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item06" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_군무원'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_군무원'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section gosi-gate-bn02">
            <div class="widthAuto pick">
                <div class="will-nTit NSK-Black mb40">윌비스 공무원학원 <span>노량진 캠퍼스</span>에서는 무엇을 개강하나요?</div>
                {!! banner_html(element('게이트_학원개강정보', $data['banner']), 'slider') !!}

                <ul>
                    @for($i=1;$i<=3;$i++)
                        <li class="nSlider">
                            {!! banner_html(element('게이트_실강안내'.$i, $data['banner']), 'sliderNum'); !!}
                        </li>
                    @endfor
                </ul>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto530 f_left">
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
                    <div class="noticeList widthAuto530 f_right">
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
                </div>
            </div>
        </div>

        <div class="Section NSK mt50 mb90">
            <div class="widthAuto">
                {{-- cscenter --}}
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

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
                        {!! banner_html(element('게이트_우측퀵_01', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵_02', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵_03', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    {!! popup('657005', $__cfg['SiteCode'], '0', '') !!}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <script type="text/javascript">
        //swiper 메인 슬라이드
        $(document).ready(function(){
        var mainslider = new Swiper('.mainSlider01', {
            direction: 'horizontal',
            loop: true,
            observer: true,
            observeParents: true,
            slidesPerView : 'auto',
            pagination: {
            el: ".swiper-pagination-gate",
            type: "fraction",
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            }, //5초에 한번씩 자동 넘김
            navigation: {
                nextEl: ".swiper-btn-next",
                prevEl: ".swiper-btn-prev",
            },
            on: {
                slideChange: function () {
                    $('.Maintab li > a').removeClass('active');
                    $('.Maintab li > a').eq(this.realIndex).addClass('active').trigger('click');
                    if($('.Maintab li:eq(0) > a').hasClass('active')){
                        // mainslider.update();
                        // location.reload();
                    }  
                    $('.tabCts a').removeClass('active');
                    $('.tabCts a').eq(this.realIndex).addClass('active');                    
                }
            }
        });

        //메인 슬라이드 메뉴1
        $('.Maintab li > a').on('click', function(){
            $('.Maintab li > a').removeClass('active');
            $(this).addClass('active');
            var num = $(this).attr('data-swiper-slide-index');
            mainslider.slideTo(num);
            var target = $(this); 
            muCenter(target);
        });

        //슬라이드 메뉴1 클릭시 위치조정
        function muCenter(target){
            var snbwrap = $('.Maintab');
            var targetPos = target.position();
            var box = $('.MaintabWrap');
            var boxHarf = box.width()/2;
            var pos;
            var listWidth=0;
            
            snbwrap.find('li').each(function(){ listWidth += $(this).outerWidth(); })
            
            var selectTargetPos = targetPos.left + target.outerWidth()/2;
            if (selectTargetPos <= boxHarf) { // left
                pos = 0;
            }else if ((listWidth - selectTargetPos) <= boxHarf) { //right
                pos = listWidth-box.width();
            }else {
                pos = selectTargetPos - boxHarf;
            }
            
            setTimeout(function(){snbwrap.css({
                "transform": "translateX("+ (pos*-1) +"px)",
                "transition-duration": "500ms"
            })}, 200);
        } 

        //메인 슬라이드 메뉴2(진행중인 모든 이벤트)
        $('.tabCts > a').on('click', function(){
            $('.tabCts > a').removeClass('active');
            $(this).addClass('active');
            var num = $(this).attr('data-swiper-slide-index');
            mainslider.slideTo(num);    
        });
        //슬라이드 재생, 스탑 버튼
        $('.start').on('click', function() {
            mainslider.autoplay.start();
            $(this).hide();
            $('.stop').show();
            return false;
        });
        $('.stop').on('click', function() {
            mainslider.autoplay.stop();
            $(this).hide();
            $('.start').show();
            return false;
        });

        //진행중인 모든 이벤트 닫기, 열기
        $('.MaintabAll a').on('click', function() {
            $('.MaintabAllView').slideToggle("fast");
        });
        $('.MaintabAllView span a').on('click', function() {
            $('.MaintabAllView').hide();
        });
    });

        //새로운소식
        $(function() {
            var newsImg = $(".newsSlider").bxSlider({
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
            $("#newsSliderLeft").click(function (){
                newsImg.goToPrevSlide();
            });

            $("#newsSliderRight").click(function (){
                newsImg.goToNextSlide();
            });
        });

        //교수진 배너
        $(document).ready(function(){
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

                    e.preventDefault()})}
            )}
        );

        $(function() {
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
        });
    </script>

@stop