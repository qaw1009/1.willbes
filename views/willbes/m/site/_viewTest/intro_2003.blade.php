@extends('willbes.m.layouts.master')

@section('content')
    <style>
        .swiper-main-Banner {position:relative;}
        .swiper-main-Banner .swiper-slide {display:block; width:100%; padding-bottom:35%; height:auto}
        .swiper-main-Banner .swiper-slide .small-banner-wrap {position: absolute; width:100%; z-index: 2;}
        .swiper-main-Banner .swiper-slide .small-banner {
            width:calc(100% - 40px); margin:-20px 20px 0; padding:20px 0;
            display: flex; justify-content:space-around; border:1px solid #535353;
            background:#fff; box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:20px;
        }
        .swiper-main-Banner .small-banner div {flex-basis: auto; flex-grow: 1; border-right:1px solid #e1e1e1;}
        .swiper-main-Banner .small-banner div:last-child {border:0}
        .swiper-main-Banner .MaintabControl {position: absolute; right:2.5%; top: 48%; width: 25%; height: 8.59%; z-index: 99;}
        .swiper-main-Banner .MaintabControl div {float:left;  display: flex; justify-content: center; align-items: center; height:100%; width:30%; font-size: 16px; color:#666; background:rgba(255,255,255,.8); margin-right:1px}
        .swiper-main-Banner .MaintabControl .swiper-pagination-current {font-weight: 600; color:#000}
        .swiper-main-Banner .MaintabControl div.MaintabAll {margin-left:2%; border-radius:50%}
        .swiper-main-Banner .MaintabControl div.MaintabAll a {font-size:30px; color:#000; font-weight: 600;}
        .Container .MaintabAllView {position:absolute; top:0; left:0; width:100%; height:100%; z-index: 999; background:rgba(0,0,0,.5); display:none}
        .Container .MaintabAllView .title {background:#fff; text-align:center; padding:10px; font-size:16px}
        .Container .MaintabAllView .title span {float:right}
        .Container .MaintabAllView .title:after {content:''; display:block; clear:block}
        .Container .MaintabAllView img {max-width:100%;}
        .fixed {position:fixed; top:0; left:0; width:100%; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}
        .intro .gosiTitle {text-align:left; margin-left:24px}
        .intro .swiper-sec02 {position: relative;overflow: hidden;height: 250px;margin-left:20px;}
        .intro .swiper-sec02 .swiper-wrapper { display: flex; justify-content:flex-start;}
        .intro .swiper-sec02 .swiper-container-sec02 .swiper-slide {width:220px; margin-right:20px; align-items: flex-start;}
        .intro .swiper-sec02 .swiper-slide a {display: block;}
        .intro .swiper-sec02 .swiper-slide .bnTit {display: block;width: 100%;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;margin: 10px auto 0;font-size: 12px;}
        .intro .swiper-sec02 .swiper-slide img {max-width: 220px;}
        .intro .swiper-sec03 {padding-bottom:35px;}
        .intro .swiper-sec03 .swiper-pagination {top:90%;float:none;text-align:center}
        .intro .swiper-pagination .swiper-pagination-bullet {background:#d1d0ce !important;opacity: 1;}
        .intro .swiper-pagination .swiper-pagination-bullet-active {background:#2b2b2b !important;}
        .intro .swiper-sec04 {position: relative;overflow: hidden;max-height:620px;background:#c0bcb0;margin-top:30px;}
        .intro .swiper-sec04 .gosiTitle {color:#fff}
        .intro .swiper-sec04 .swiper-wrapper {display: flex; justify-content: space-between; padding-left:20px }
        .intro .swiper-sec04 .swiper-container-sec04 .swiper-slide {width: 208px; max-height:407px; margin-right:20px; align-items: flex-start; background:none;}
        .intro .swiper-sec04 .swiper-slide a {display: block;}
        .intro .swiper-sec04 .swiper-slide img {max-width: 100%;}
        .intro .swiper-sec05 {padding-bottom: 20px;overflow: hidden;position: relative;}
        .intro .swiper-sec05 .swiper-container-prof {height: 420px;}
        .intro .swiper-sec05 .swiper-slide {
            width: 350px;
            height: calc((100% - 10px) / 2);
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: flex-start;
            -ms-flex-align: flex-start;
            -webkit-align-items: flex-start;
            align-items: flex-start;
        }
        .intro .swiper-sec05 .swiper-slide a {display: block;}
        .intro .swiper-sec05 .swiper-slide img {width: 100%;}
        /* iPhone 5/SE */
        @@media only screen and (max-width: 374px) {
            .swiper-main-Banner .swiper-slide .small-banner {width:calc(100% - 20px); margin:-10px 10px 0; padding:10px 0; border-radius:10px;}
            .swiper-main-Banner .MaintabControl div {font-size:12px}
            .swiper-main-Banner .MaintabControl div.MaintabAll a {font-size:20px;}
            .intro .swiper-sec02 {height: 170px;}
            .intro .swiper-sec02 .swiper-container-sec02 .swiper-slide {width:140px; margin-right:10px}
            .intro .gosiTitle,
            .intro .swiper-sec02 {margin-left:10px}
            .intro .gosiTitle {font-size:18px}
            .intro .swiper-sec04 {max-height:400px;}
            .intro .swiper-sec04 .gosiTitle {padding-top:30px}
            .intro .swiper-sec04 .swiper-wrapper {padding-left:10px}
            .intro .swiper-sec04 .swiper-container-sec04 .swiper-slide {width: 130px; max-height:auto; margin-right:10px;}
            .intro .swiper-sec05 .swiper-container-prof {height:180px;}
            .intro .swiper-sec05 .swiper-slide {width: 140px;}
        }
    </style>

    <div id="Container" class="Container NSK gosi intro mb40 p_re">
        <div class="MainSlider swiper-container swiper-container-page mt20">
            <div class="swiper-wrapper">
                {{--banner_html 사용시 UI 깨짐--}}
                @if(empty($data['banner']['M_게이트_상단배너']) === false)
                    @foreach($data['banner']['M_게이트_상단배너'] as $key => $row)
                        <div class="swiper-slide">
                            @if(empty($row['LinkUrl']) === true || $row['LinkUrl'] == '#')
                                <a href="javascript:void(0);"><img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}"></a>
                            @else
                                <a href="{{front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www')}}" target="{{$row['LinkType']}}">
                                    <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                </a>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <div class="MainSlider swiper-container swiper-main-Banner">
            <div class="MaintabControl">
                <div class="swiper-pagination-gate"></div>
                <div class="start" style="display:none;"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconPlay.png" alt="재생"></div>
                <div class="stop"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconStop.png" alt="정지"></div>
                <div class="MaintabAll"><a href="javascript:void(0);">+</a></div>
            </div>

            <div class="swiper-wrapper">
                @for($i=0; $i<=9; $i++)
                    @if(isset($data['banner']['M_게이트_메인배너'.$i]) === true)
                        <div class="swiper-slide">
                            {!! banner_html(element('M_게이트_메인배너'.$i, $data['banner']), '', '' , false, '', 'big-banner') !!}
                            <div class="small-banner-wrap">
                                <div class="small-banner">
                                    @for($s=1;$s<=3;$s++)
                                        <div>{!! banner_html(element('M_게이트_서브배너'.$i.'_'.$s, $data['banner'])) !!}</div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

        <div class="MaintabAllView" style="display:none">
            <div class="title">
                전체보기 <span><a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnClose.png" alt="닫기"></a></span>
            </div>
            @for($i=0; $i<=9; $i++)
                @if(isset($data['banner']['M_게이트_메인배너'.$i]) === true)
                    <div>{!! banner_html(element('M_게이트_메인배너'.$i, $data['banner'])) !!}</div>
                @endif
            @endfor
        </div>

        <div class="gosiTitle NSK">
            지금 바로 주목해야 할 <strong class="NSK-Black">새로운 소식!</strong>
        </div>
        <div class="swiper-sec02">
            <div class="swiper-container-sec02">
                <div class="swiper-wrapper">
                    {{--banner_html 사용시 UI 깨짐--}}
                    @if(empty(element('M_게이트_새소식', $data['banner'])) === false)
                        @foreach(element('M_게이트_새소식', $data['banner']) as $key => $row)
                            <div class="swiper-slide">
                                @if(empty($row['LinkUrl']) === true || $row['LinkUrl'] == '#')
                                    <a href="javascript:void(0);">
                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                        <div class="bnTit">{{$row['Desc']}}</div>
                                    </a>
                                @else
                                    <a href="{{front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www')}}" target="{{$row['LinkType']}}">
                                        <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                        <div class="bnTit">{{$row['Desc']}}</div>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="gosiTitle NSK">
            <strong class="NSK-Black">초보 수험생</strong>이라면, 꼭 확인!
        </div>
        <div class="MainSlider swiper-container swiper-sec03 swiper-container-page">
            <div class="swiper-wrapper">
                {{--banner_html 사용시 UI 깨짐--}}
                @if(empty($data['banner']['M_게이트_초보가이드']) === false)
                    @foreach($data['banner']['M_게이트_초보가이드'] as $key => $row)
                        <div class="swiper-slide">
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
                    @endforeach
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>

        <div class="swiper-sec04">
            <div class="gosiTitle NSK">
                합격을 책임지는 <strong class="NSK-Black">윌비스 교수진</strong>
            </div>

            <div class="swiper-container-sec04">
                <div class="swiper-wrapper">
                    {{--banner_html 사용시 UI 깨짐--}}
                    @if(empty($data['banner']['M_게이트_교수진']) === false)
                        @foreach($data['banner']['M_게이트_교수진'] as $key => $row)
                            <div class="swiper-slide">
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
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="gosiTitle NSK">
            쉬면서도 열공되는 <strong class="NSK-Black">YOUTUBE 영상</strong> 시청하기!
        </div>
        <div class="swiper-sec05">
            <div class="swiper-container-prof">
                <div class="swiper-wrapper">
                    {{--banner_html 사용시 UI 깨짐--}}
                    @if(empty($data['banner']['M_게이트_유튜브']) === false)
                        @foreach($data['banner']['M_게이트_유튜브'] as $key => $row)
                            <div class="swiper-slide">
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
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="noticeTabs c_both mt30">
            <ul class="tabWrap mainTab two">
                <li><a href="#notice1" class="on">공지사항</a></li>
                <li><a href="#notice2">시험공고</a></li>
            </ul>
            <div class="tabBox buttonBox noticeBox">
                <div id="notice1" class="tabContent pd20">
                    <div class="moreBtn"><a href="{{front_url('/support/notice/index'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['notice']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{front_url('/support/notice/show'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : '').'?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div id="notice2" class="tabContent pd20">
                    <div class="moreBtn"><a href="{{front_url('/support/examAnnouncement/index'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['exam_announcement']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['exam_announcement'] as $row)
                                <li>
                                    <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'], false, true)}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        {{-- 고객센터 --}}
        @include('willbes.m.site.main_partial.cscenter_'.$__cfg['SiteCode'])

        <div class="appPlayer c_both">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>
    </div>

    <script>
        //swiper 메인 슬라이드
        $(document).ready(function(){
            var mainslider = new Swiper('.swiper-main-Banner', {
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
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
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
            $('.MaintabControl .MaintabAll a').on('click', function() {
                $('.MaintabAllView').css("display","block");
            });

            $('.MaintabAllView span a').on('click', function() {
                $('.MaintabAllView').css("display","none");
            });

            //입성
            var swiper = new Swiper('.swiper-container-sec02', {
                slidesPerView: 'auto',
                slidesPerColumn: 1,
                spaceBetween: 0,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
            });

            //교수진
            var swiper = new Swiper('.swiper-container-sec04', {
                slidesPerView: 'auto',
                slidesPerColumn: 1,
                spaceBetween: 0,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
            });

            //YOUTUBE 영상
            var swiper = new Swiper('.swiper-container-prof', {
                slidesPerView: 'auto',
                slidesPerColumn: 2,
                spaceBetween: 10,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                // init: false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        spaceBetween: 10,
                    },
                }
            });
        });

        //배너 전체보기
        $(function() {
            var nav = $('.title');
            var navTop = nav.offset().top+50;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 50);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });
    </script>
@stop