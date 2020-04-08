@extends('willbes.pc.layouts.master')

@section('content')
    <style type="text/css">
        /*********************************************     Main Container : cert     *********************************************/
        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }

        /* Main Container : MainVisual */
        .njob2 .Section0 {background:url(https://static.willbes.net/public/images/promotion/main/3114_fullx110_bg.jpg) no-repeat center top; border-top:2px solid #000; margin-top:-2px}
        .njob2 .Section1 {background:#bebcbd}
        .njob2 .MainVisual {
            position: relative;
            width: 1120px;
            margin:0 auto;
            height: 670px;
        }
        .njob2 .MainVisual:after {
            content: "";
            display: block;
            clear: both;
        }

        .njob2 .VisualBox {
            position: absolute;
            width:1120px;
            height: 670px;
            overflow: hidden;
            z-index: 1;
        }

        .njob2 .VisualBox .bx-wrapper .bx-controls-auto {
            left:20px;
            bottom: 20px;
            width: 50px;
            z-index: 90;
        }
        .njob2 .VisualBox .bx-wrapper .bx-pager {
            width: auto;
            left:60px;
            bottom: 22px;
            text-align: left;
            z-index: 90;
        }
        .njob2 .VisualBox .bx-wrapper .bx-pager.bx-default-pager a {
            background: #cecece;
        }

        .njob2 .VisualsubBox {
            width: 1120px;
            height: 380px;
            overflow: hidden;
        }
        .njob2 .VisualsubBox .bx-wrapper .bx-controls-auto {
            left:20px;
            bottom: 20px;
            margin: 0;
            width: 50px;
            z-index:90;
        }
        .njob2 .VisualsubBox .bx-wrapper .bx-pager {
            float: right;
            width: auto;
            left:60px;
            bottom: 20px;
            text-align: right;
            z-index:90;
        }
        .njob2 .VisualsubBox .bx-wrapper .bx-pager.bx-default-pager a {
            background: #fff;
            width: 8px;
            height: 8px;
            margin: 0 2px;
        }

        .njob2 .bx-wrapper .bx-pager.bx-default-pager a {
            background: #ccc !important;
        }
        .njob2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .njob2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .njob2 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #3997f0 !important;
            z-index: 10;
        }
        .njob2 .will-listTi,
        .njob2 .will-listTit {font-size:24px; margin-bottom:30px}
        .njob2 .will-listTit {margin-bottom:20px}

        /**/
        .njob2 .bestLec > li {
            display: inline;
            float: left;
            width:25%;
        }
        .njob2 .bestLec li ul {padding:20px 10px; font-size:15px; line-height:1.5}
        .njob2 .bestLec li ul li {margin-bottom:10px}
        .njob2 .bestLec li ul li:first-child {font-size:14px}
        .njob2 .bestLec li ul li span {vertical-align: bottom;}
        .njob2 .bestLec li ul li:last-child a {display:block; width:80px; text-align:center; color:#Fff; background:#3997f0; font-size:14px; height:24px; line-height:24px; border-radius:5px}
        .njob2 .bestLec:after {
            content:'';
            display: block;
            clear:both;
        }

        .njob2 .Section2 {
            background:url(https://static.willbes.net/public/images/promotion/main/3114_fullx600_bg.jpg) no-repeat center top;
        }
        .njob2 .Section3 {background:#f7f7f7}
        .njob2 .tipLec li {
            display: inline;
            float: left;
            width:25%;
            text-align:center;
            font-size:15px;
        }
        .njob2 .tipLec li a {margin-bottom:10px; display:block}

        /* Main Container : Notice : noticeTabs */
        .njob2 .willbesNews {width:466px; height:297px; float:left}
        .njob2 .List-Table {
            width: 100%;
            border-top:1px solid #000;
            padding:0;
        }
        .njob2 .List-Table li {
            position: relative;
            font-size: 13px;
            color: #3a3a3a;
            height: 48px;
            line-height: 48px;
            border-bottom: 1px solid #e3e3e3;
        }
        .njob2 .List-Table li a {
            display: inline-block;
            width: 80%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            letter-spacing: 0;
        }
        .njob2 .List-Table li a span {
            background: #3997f0;
            color:#fff;
            padding: 0 10px;
            border-radius: 10px;
            margin-right: 5px;
        }
        .njob2 .List-Table li:last-child {
            border-bottom: 1px solid #000;
        }
        .njob2 .willbesCenter {float:right; width:600px; height:297px; border:10px solid #f0f0f0; background:#fff; padding:40px 50px; text-align:left} 
        .njob2 .willbesCenter h5 {font-size:24px; margin-bottom:30px; color:#000}
        .njob2 .willbesCenter span { vertical-align: bottom;}
        .njob2 .willbesCenter ul {width:100%; margin-top:34px}
        .njob2 .willbesCenter ul li {display: inline; float:left; width:25%; padding:0; margin:0;}
        .njob2 .willbesCenter ul li a {display:block; border-right:1px solid #e4e4e4; text-align:center}
        .njob2 .willbesCenter ul li:last-child a {border-right:0; }
        .njob2 .willbesCenter ul:after,
        .njob2 .widthAuto:after {content:""; display:block; clear:both}
        .njob2 .willbesCenter .tel {font-size:18px; margin-top:34px; line-height:1.5}



        /* Main Container */
        .njob2 .tx-color {
            color: #3997f0;
        }
    </style>

    <div id="Container" class="Container njob2 NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section Section0">
            <div class="widthAuto">
                <a href="https://www.youtube.com/watch?v=sBGMUCaAq6k&feature=youtu.be" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3114_fullx110.gif" alt="1억뷰 N잡"></a>
            </div>
        </div>

        <div class="Section1 p_re">
            <div class="MainVisual NSK">
                <div class="VisualBox">
                    <div class="bSlider">
                        <div class="sliderStopAutoPager">
                            {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), null, null, null, 'div') !!}
                            {{--
                                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_01.jpg" alt="배너명"></a></div>
                                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_02.jpg" alt="배너명"></a></div>
                                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_03.jpg" alt="배너명"></a></div>
                                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_1120x670_04.jpg" alt="배너명"></a></div>
                            --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt70">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 인기강좌</div>
                <ul class="bestLec">
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_01.png" alt="김정한 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>가장 현실적인 월 100만원 만들기, <br>
                                    지금 바로 시작하는 스마트스토어!</li>
                                <li>다마고치 김정환 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1564" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_02.png" alt="김경은 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>혼자서도 할 수 있는 <br>
                                    1인 온라인 창업</li>
                                <li>단아쌤 김경은 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1566" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_03.png" alt="황채영 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>재고없이 오픈마켓으로<br>
                                    월 1천만원 수익 만들기</li>
                                <li>황채영 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1565" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <div>
                            <img src="https://static.willbes.net/public/images/promotion/main/3114_272x316_04.png" alt="정문진 대표">
                            <ul>
                                <li><span class="tx-red">NEW</span> · 이커머스</li>
                                <li>진짜 고수에게 배우는 스마트스토어로, <br>
                                    제2의 월급통장 만들기!</li>
                                <li>정문진 대표<br>
                                    <strong class="NSK-Black">온라인강의 · <span class="tx-red">10%할인</span></strong></li>
                                <li><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1567" target="_blank">신청하기</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="Section2 mt70">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/3114_fullx600.jpg" alt="전강좌 10% 할인">
            </div>
        </div>

        <div class="Section3 pb100">
            <div class="widthAuto">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> HOT 클립 영상</div>
                <ul class="bestLec">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_hot클립'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_hot클립'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                    {{--
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_01.png" alt="김정한"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_02.png" alt="김경은"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_03.png" alt="황채영"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_04.png" alt="정문진"></a></li>
                    --}}
                </ul>
            </div>

            <div class="widthAuto mt70">
                <div class="will-listTi NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> PD 추천 꿀 Tip</div>
                <ul class="tipLec NSK-Black">
                    @for($i=1; $i<=4; $i++)
                        @if(isset($data['arr_main_banner']['메인_추천tip'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_추천tip'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                    {{--
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_01.png" alt="김정한"></a>[추천] 김정환 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_02.png" alt="김경은"></a>[추천] 김경은 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_03.png" alt="황채영"></a>[추천] 황채영 대표</li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/3114_272x153_tip_04.png" alt="정문진"></a>[추천] 정문진 대표</li>
                    --}}
                </ul>
            </div>
        </div>

        <div class="Section mt70 NSK">
            <div class="widthAuto">
                <div class="willbesNews">
                    <div class="will-listTit NSK-Black"><img src="https://static.willbes.net/public/images/promotion/main/3114_icon01.png" alt="1억뷰 N잡"> 공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a></div>
                    <ul class="List-Table">
                        @if(empty($data['notice']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <!--willbesNews //-->

                <div class="willbesCenter f_right">
                <h5 class="NSK-Black">서비스 <span class="tx-color">이용안내</span> <span class="tx13 NSK ml20 tx-black">궁금하신 사항에 대해 자세히 알려드립니다.</span></h5>
                <ul>
                    <li>
                        <a href="{{ front_url('/support/faq/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                            <div class="nTxt">자주하는 질문</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/mobile/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                            <div class="nTxt">모바일 서비스</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/qna/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                            <div class="nTxt">동영상 상담실</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ front_url('/support/remote/index') }}">
                            <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                            <div class="nTxt">1:1 고객지원</div>
                        </a>
                    </li>
                </ul>
                <div class="tel">
                    수강문의 전화 <span class="NSK-Black tx-color ml10">1544-5006</span><br>
                    운영시간 평일 <span class="NSK-Black tx-color ml10">09시~18시 (점심시간 12시~1시)  주말/공휴일 휴무</span>
                </div>
            </div> 
            </div>
        </div>

    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop