@extends('willbes.pc.layouts.master')

@section('content')
    <style>
        .gosi .tx-color {
            color: #ba5610;
        }
        .gosi .will-nTit {border:0; font-size:46px}
        .gosi .will-nTit span {color:#ba5610}

        .gosi .Menu h3 {border:0}

        /**/
        .gosi-bnfull-Sec {position:relative; margin:0; height: 90px !important;}
        .gosi-bnfull {position: absolute;
            top:0;
            left:50%;
            margin-left:-1000px;
            width: 2000px;
            min-width: 1120px;
            max-width: 2000px;
            height: 90px;
            overflow: hidden;}
        .gosi-bnfull .bx-wrapper .sliderBar img {width:2000px !important; height:90px}

        /*상단 메인 배너*//
        .gosi .gosi-Sec {
            width: 100%;
            max-width: 2000px;
        }
        .gosi .gosi-bntop {position:relative; margin:0; height: 460px !important;}
        .gosi .gosi-bntop .GositabBox {
            position: absolute;
            top:0;
            left:50%;
            margin-left:-1000px;
            width: 2000px;
            min-width: 1120px;
            max-width: 2000px;
            height: 460px;
            overflow: hidden;
        }

        .gosi .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
        .gosi .gosi-bntop .GositabBox p a {display:none;}
        .gosi .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
        .gosi .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}
        .gosi .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}

        .gosi .gosi-bntop .GositabList {
            position: absolute;
            top:404px;
            width:100%;
            z-index: 50;
            background-color: rgba(0,0,0,0.5);
            padding:10px 0;
        }

        .gosi .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
        .gosi .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
        .gosi .gosi-bntop .Gositab li {display:inline-block;  width: calc(11.11111% - 2px);}
        .gosi .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
        .gosi .gosi-bntop .Gositab li a:hover,
        .gosi .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

        /**/
        .gosi .gosi-bn02 {margin-top:100px}
        .gosi .gosi-bn02 ul {margin-right:-20px}
        .gosi .gosi-bn02 li {
            display: inline;
            float: left;
            width: 265px;
            margin-right:20px;
        }
        .gosi .gosi-bn02 ul:after {
            content: "";
            display: block;
            clear: both;
        }
        .gosi .gosi-bn02 .slider {width: 265px; height:123px; overflow:hidden;}
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager {
            width: auto;
            left: 0;
            bottom: -20px;
            text-align: center;
        }
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a {
            background: #e1e1e1;
        }
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #898989 !important;
        }

        /**/
        .gosi-bn03 {margin-top:120px; padding-bottom:100px}
        .gosi-bn03 ul {margin-top:60px; margin-right:-20px}
        .gosi-bn03 li {display:inline; float:left; width:265px; margin-right:20px}
        .gosi-bn03 li:first-child {width:550px;}
        .gosi-bn03 ul:after {content: ""; display: block; clear:both}
        .gosi-bn03 .sliderNum {height:303px; overflow:hidden;}
        .gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction {
            position: absolute;
            top: 310px;
            left:0;
            right: 0;
            width: 100%;
            height: 20px;
            text-align:center;
        }
        .gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction a {
            width: 20px;
            height: 20px;
        }
        .gosi-bn03 .nSlider .bx-wrapper a.bx-prev {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
            left:145px !important;
        }
        .gosi-bn03 .nSlider .bx-wrapper a.bx-next {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;
            left:100px !important;
        }
        .gosi-bn03 li:first-child .bx-wrapper a.bx-prev {
            left:290px !important;
        }
        .gosi-bn03 li:first-child .bx-wrapper a.bx-next {
            left:240px !important;
        }
        .gosi-bn03 .nSlider .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            top: 315px;
            left:0;
            right: 0;
            bottom: 0;
            font-size: 11px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

        /* */
        .gosi-bnfull-Sec02 {position:relative; height: 190px; background: url(https://static.willbes.net/public/images/promotion/main/2003/3019_1120x190_bg.jpg) repeat-x left bottom; }
        .gosi-bnfull-Sec02 .gosi-bnfull02 {width: 1120px; height: 190px; margin:0 auto; overflow: hidden;}
        .gosi-bnfull-Sec02 p {position:absolute; top:70%; left:50%; margin-top:-19px; width:22px; height:38px; cursor:pointer;
            background: url(https://static.willbes.net/public/images/promotion/main/arrow_w22.png) no-repeat left center;  opacity:0.4; filter:alpha(opacity=40);}
        .gosi-bnfull-Sec02 p a {display:none;}
        .gosi-bnfull-Sec02 p.leftBtn {margin-left:-620px;}
        .gosi-bnfull-Sec02 p.rightBtn {margin-left:588px; background-position: right center;}
        .gosi-bnfull-Sec02 p:hover {opacity:100; filter:alpha(opacity=100);}

        /*교수진*/
        .gosi-profWrap {background:#c0bcb0; padding:130px 0}
        .gosi-profWrap .will-nTit {color:#fff; margin-bottom:60px}
        .gosi-profWrap .will-nTit span {color:#535046}

        .gosi-tabs-contents-wrap {width:1120px; height:470px; overflow:hidden}
        .gosi-gate-prof li {
            display: inline;
            float: left;
            margin-right:15px;
            width: 208px;
            height:470px;
            background:#fff;
        }

        .gosi-gate-prof li:last-child {margin:0}
        .gosi-gate-prof:after {
            content: "";
            display: block;
            clear: both;
        }
        .gosi-gate-prof .nSlider {}
        .gosi-gate-prof .nSlider .sliderProf div {width: 208px !important; height:470px; position:relative;}
        .gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction {
            position: absolute;
            top: 425px;
            left:0;
            right: 0;
            width: 100%;
            height: 20px;
            text-align:center;
        }
        .gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction a {
            width: 20px;
            height: 20px;
        }
        .gosi-gate-prof .nSlider .bx-wrapper a.bx-prev {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
            left:120px !important;
        }
        .gosi-gate-prof .nSlider .bx-wrapper a.bx-next {
            background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;
            left:70px !important;
        }
        .gosi-gate-prof .nSlider .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            top: 430px;
            left:0;
            right: 0;
            bottom: 0;
            font-size: 11px;
            font-weight: 300;
            color: #000;
            margin: 0;
            padding: 0;
            letter-spacing: 0;
        }

        .tabWrapCustom.noticeWrap_campus {
            height: 60px;
            border-bottom: none;
            border-top: 2px solid #000;
            clear: both;
        }
        .tabWrapCustom.noticeWrap_campus li {
            float: left;
            width: auto;
            height: 60px;
            margin: 0 10px;
        }
        .tabWrapCustom.noticeWrap_campus li a {
            display: block;
            width: 100%;
            height: 60px;
            line-height: 60px;
            background: none;
            font-size: 13px;
            color: #3a3a3a;
            text-align: center;
            letter-spacing: 0;
            border: none;
            padding-right: 20px;
        }
        .tabWrapCustom.noticeWrap_campus li:first-child a {
            border-left: none;
        }
        .tabWrapCustom.noticeWrap_campus li a.on {
            position: relative;
            z-index: 2;
            background: none;
            height: 60px;
            line-height: 60px;
            font-weight: 600;
            color: #3a3a3a;
            border: none;
        }
        .tabWrapCustom.noticeWrap_campus .row-line {
            float: right;
            background: #b7b7b7;
            width: 1px;
            height: 12px;
            margin: -36px 0 0;
        }
    </style>
    <!-- Container -->

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
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
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
                @endif
            </div>
        </div>

        <div class="Section gosi-bn02">
            <div class="widthAuto">
                <ul>
                    @for($i=1;$i<=4;$i++)
                        <li>
                            <div class="bSlider">
                                @if(isset($data['arr_main_banner']['메인_교수홍보' . $i]) === true)
                                    {!! banner_html(element('메인_교수홍보' . $i, $data['arr_main_banner']),'slider') !!}
                                @endif
                            </div>
                        </li>
                    @endfor
                </ul>
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

        <div class="Section gosi-profWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">합격을 책임질 <span>7급 대표 교수진</span></div>
                <div class="gosi-tabs-contents-wrap">
                    <div class="gosi-tabs-content">
                        <ul class="gosi-gate-prof">
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt90">
            <div class="widthAuto">
                <div class="willbesLec">
                    <div class="smallTit mb30">
                        <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>
                    </div>
                    {{-- best product include --}}
                    @include('willbes.pc.site.main_partial.lecture_' . $__cfg['SiteCode'])

                    <div class="will-listTit mt45">무료특강</div>
                    <ul class="freeLectBx">
                        @for($i=1; $i<=2; $i++)
                            @if(isset($data['arr_main_banner']['메인_무료특강'.$i]) === true)
                                <li>
                                    {!! banner_html($data['arr_main_banner']['메인_무료특강'.$i], '', '', true) !!}
                                </li>
                            @endif
                        @endfor
                    </ul>
                </div>
                <!-- willbesLec//-->

                <div class="willbesNews">
                    <div class="smallTit mb30">
                        <p><span>윌비스 <strong>소식</strong></span></p>
                    </div>
                    <div class="noticeTabs">
                        <div class="will-listTit mt45">공지사항</div>
                        <div class="tabBox noticeBox" style="margin-top:-30px">
                            <div class="tabContent p_re">
                                <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                                <ul class="List-Table">
                                    @if(empty($data['notice']) === true)
                                        <li><span>등록된 내용이 없습니다.</span></li>
                                    @else
                                        @foreach($data['notice'] as $row)
                                            <li>
                                                <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                    @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                                    @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                                </a>
                                                <span class="date">{{$row['RegDatm']}}</span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="noticeTabs mt30">
                        <div class="will-listTit">강의계획서/자료</div>
                        <div class="tabBox noticeBox" style="margin-top:-30px">
                            <div class="tabContent p_re">
                                <a href="{{front_url('/support/examNews/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                                <ul class="List-Table">
                                    @if(empty($data['exam_news']) === true)
                                        <li>등록된 내용이 없습니다.</li>
                                    @else
                                        @foreach($data['exam_news'] as $row)
                                            <li>
                                                <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                                    @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                                    @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
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
                <!--willbesNews //-->
            </div>
        </div>

        <div class="Section NSK mt90 mb90">
            <div class="widthAuto">
                {{--학원 오시는 길--}}
                @include('willbes.pc.site.main_partial.map_2010')
                <div class="Section NSK mt90 mb90">
                    <div class="widthAuto">
                        <div class="CScenterBox">
                            <dl>
                                <dt class="willbesNumber">
                                    <ul>
                                        <li>
                                            <div class="nTit">온라인 수강문의</div>
                                            <div class="nNumber tx-color">1566-4770 <span>▶</span> 2</div>
                                            <div class="nTxt">
                                                [운영시간]<br/>
                                                평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                                주말/공휴일 휴무<br/>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="nTit">교재문의</div>
                                            <div class="nNumber tx-color">1544-4944</div>
                                            <div class="nTxt">
                                                [운영시간]<br/>
                                                평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                                주말/공휴일 휴무<br/>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="nTit">학원 고객센터</div>
                                            <div class="nNumber tx-color">1544-1881 <span>▶</span> 1</div>
                                            <div class="nTxt">
                                                [전화/방문상담 운영시간]<br/>
                                                월 ~ 토요일 : 8시 ~ 19시<br/>
                                                일요일 : 8시 ~ 18시
                                            </div>
                                        </li>
                                    </ul>
                                </dt>
                                <dt class="willbesCenter">
                                    <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                                    <ul>
                                        <li>
                                            <a href="{{ site_url('/support/faq/index') }}">
                                                <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                                <div class="nTxt">자주하는<br/>질문</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ site_url('/support/mobile/index') }}">
                                                <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                                <div class="nTxt">모바일<br/>서비스</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ site_url('/support/qna/index') }}">
                                                <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                                <div class="nTxt">동영상<br/>상담실</div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ site_url('/support/remote/index') }}">
                                                <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                                <div class="nTxt">1:1<br/>고객지원</div>
                                            </a>
                                        </li>
                                    </ul>
                                </dt>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>

    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            $('#counter').counterUp({
                delay: 11, // the delay time in ms
                time: 1000 // the speed time in ms
            });
        });
    </script>

    <script type="text/javascript">
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

        /*교수진*/
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