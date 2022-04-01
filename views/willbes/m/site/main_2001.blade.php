@extends('willbes.m.layouts.master')

@section('content')
    <style>
        .cop img {max-width:100%}

        .fixed {position:fixed; top:0; left:0; width:100%; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}

        .subMenuWrap {background-color: #f6f6f6; padding:15px 10px; font-size: 14px; max-width:720px; margin:0 auto}
        .subMenuWrap a {display: inline-block; margin-right:20px}
        .subMenuWrap a:last-child {margin:0}

        .groupLink {background:#3f84c2; padding:12px 0; display:flex; justify-content: space-between;}
        .groupLink a {display:block; width:25%; text-align:center; color:#fff; font-size:2vh; border-right:1px solid #3678b9; border-left:1px solid #66a4d4}
        .groupLink a img {width:10%; max-width:13px; display:inline-block; vertical-align:top; margin-left:3px}
        .groupLink a:nth-child(1) {border-left:0}
        .groupLink a:last-child {border-right::0}

        .conTitle {text-align:left; font-size:2.5vh; margin:10% 20px 2%}
        .conTitle img.moreBtn {width:28px; vertical-align:top; display:inline-block; margin-left:10px}

        .cop .mainColor {color:#3f84c2}

        .cop .swiper-sec {
            position: relative;
            overflow: hidden;
            height: auto;
            margin:0 20px;
            padding:0 0 20px;
        }
        .cop .swiper-sec .swiper-wrapper {display: flex; justify-content:flex-start;height: auto; }
        .cop .swiper-sec .swiper-slide {align-items: flex-start;}
        .cop .swiper-sec .swiper-slide a {display:block}
        .cop .swiper-horizontal>.swiper-scrollbar {
            position: relative;
            z-index: 50;
            height: 5px;
            width: 100%;
        }
        .cop .swiper-scrollbar {background: rgba(0,0,0,.1);}
        .cop .swiper-scrollbar-drag {
            height: 100%;
            width: 100%;
            position: relative;
            background: rgba(63,132,194,1);
            border-radius: 10px;
            left: 0;
            top: 0;
        }

        .cop .swiper-sec01 .swiper-slide {
            width:calc((100% - 10px) / 2); max-width:332px; margin-right:8px;
        }
        .cop .swiper-sec02 .swiper-slide {
            width:calc((100% - 10px) / 3); max-width:216px; margin-right:5px;
        }
        .cop .swiper-sec02 .swiper-slide a img {border-radius:5px}
        .cop .swiper-sec .swiper-slide:last-child {margin:0}

        .cop .sec-cast {margin:0 20px;}
        .cop .castList a {display:flex; justify-content: space-between; margin-bottom:5px; background:#f2f2f2; }
        .cop .castImg {width:calc(42%); max-width:284px}
        .cop .castImg img {width:100%}
        .cop .castInfo {width:calc(58%); padding:12px; line-height:1.4; }
        .cop .castInfo h5 {font-size:1.6vh; font-weight:bold; margin-bottom:8px;
            width:100%;
            overflow:hidden;
            text-overflow:ellipsis; /*말줄임*/
            display:-webkit-box;/*블록속성*/
            -webkit-line-clamp: 2; /* 라인수 */
            -webkit-box-orient:vertical;/*박스의 흐름 방향을 지정*/
            word-wrap:break-word; /*언어간 줄바꿈*/
        }
        .cop .castInfo p {font-size:1.5vh;
            width:100%;
            overflow:hidden;
            text-overflow:ellipsis; /*말줄임*/
            display:-webkit-box;/*블록속성*/
            -webkit-line-clamp: 2; /* 라인수 */
            -webkit-box-orient:vertical;/*박스의 흐름 방향을 지정*/
            word-wrap:break-word; /*언어간 줄바꿈*/
        }

        .cop .swiper-sec .swiper-slide .bnTitle {margin-top:10px; font-size:1.8vh}

        .cop .sec-tip {width:calc(100% - 40px); margin:0 auto; display:flex; justify-content: space-between;}
        .cop .sec-tip .tipBox {width:calc(25% - 8px); min-width:78px; max-width:157px; margin-right:8px; padding-bottom:20px}
        .cop .sec-tip .tipBox img {min-height:70px;}
        .cop .sec-tip .tipBox:nth-child(1) {width:50%; min-width:166px; max-width:332px;}
        .cop .sec-tip .swiper-sec03 {position:relative; overflow: hidden; margin:0}
        .cop .sec-tip .swiper-sec03 .swiper-pagination {
            top:90%;
            float:none;
            text-align:center;
            z-index: 100;
        }
        .cop .swiper-pagination .swiper-pagination-bullet {
            background:#e1e1e1 !important;
            opacity: 1;
        }
        .cop .swiper-pagination .swiper-pagination-bullet-active {
            background:#3f84c2 !important;
        }

        .noticeBoard {background:#f8f8f8; padding:10px 20px; line-height:1.4; font-size:14px}
        .noticeBoard a {display:block; width:100%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; border-bottom:1px solid #dadada; padding:14px 0}
        .noticeBoard a span {font-size:12px; background:#4d79f6; color:#fff; padding:0 5px; margin-right:5px}
        .noticeBoard li:last-child a {border:0}

        .cop .sec-cast {margin:0 20px;}

        .cop .swiper-best{display:flex; position: relative; overflow: hidden; padding-bottom:30px; width:calc(100% - 40px); margin:0 auto;}
        .cop .swiper-best .swiper-slide{display: flex; flex-direction: column;}
        .cop .swiper-best .swiper-pagination {
            top:98%;
            float:none;
            text-align:center;
            z-index: 100;
        }

        .swiper-container-Book {
            width: calc(100% - 40px);
            margin:0 auto;
            height: 340px;
            overflow: hidden;
            position: relative;
        }
        .swiper-container-Book .swiper-slide {
            text-align: center;
            font-size: 18px;
            width:160px;
            align-items: stretch;
        }
        .swiper-container-Book .swiper-slide a {
            display: block;
            font-size: 14px;
            margin-right: 5px;
        }
        .swiper-container-Book .swiper-slide .bookimg {
            width: 158px;
            height: 216px;
            margin: 0 auto; /*border:1px solid #d9d9d9;*/
            position: relative;
        }
        .swiper-container-Book .swiper-slide img {
            width: 100%;
            max-width: 158px;
            margin: 0 auto;
        }
        .swiper-container-Book ul {
            margin-top: 10px;
            line-height: 1.4;
        }
        .swiper-container-Book li:nth-child(1) {
            width: 98%;
            overflow: hidden;
            text-overflow:ellipsis; /*말줄임*/
            display:-webkit-box;/*블록속성*/
            -webkit-line-clamp: 2; /* 라인수 */
            -webkit-box-orient:vertical;/*박스의 흐름 방향을 지정*/
            word-wrap:break-word; /*언어간 줄바꿈*/
        }
        .swiper-container-Book li:nth-child(2) {
            color: #737373;
        }

        .swiper-container-Book li:last-child strong {
            font-size: 14px;
            color: #3f84c2;
        }
        .swiper-container-Book li:last-child span {
            color: #000;
            font-weight: normal;
        }
        .swiper-container-Book .swiper-pagination {
            bottom: 0 !important;
        }

        .noticeTabs {margin-top:10%;}
        .noticeTabs .tabContent {padding:20px 20px 0;}

        .sec-bottomBn {margin-top:10%;}
        .appPlayer {margin-top:8%;}

        .btnCounsel {position:fixed; right:10px; bottom:10px; z-index: 90;}
        .btnCounsel a {display:flex; flex-direction: column; justify-content: center; align-items: center; width:90px; height:90px; background:#fbe901; color:#363636; border-radius:50%; text-align:center; font-weight:bold; padding:5px; font-size:1.7vh}
        .btnCounsel a img {display:block; margin-bottom:5px; width:50%; max-width:45px}

        .castBoxpopup {display:none}
        .castBoxpopup .close {position:absolute; top:0; right:0}
        .castBoxpopup .close button {background:#fff url("https://static.willbes.net/public/images/promotion/m/icon_close.png") no-repeat center center;
            background-size:60%; font-size:0; text-indent: -9999px; width:24px; height:24px; border-radius:50%}

        @@media only screen and (max-width: 374px) {
            .groupLink a {font-size:1.6vh;}
            .conTitle img.moreBtn {width:20px;}
            .cop .castInfo {padding:8px; font-size:1.6vh;}
            .cop .castInfo h5 {font-size:1.7vh; font-weight:bold; margin-bottom:4px}
            .cop .castInfo h5 br {display:none}
            .cop .sec-tip .swiper-sec03 .swiper-pagination {top:85%;}

            .conTitle {margin:10% 10px 2%}

            .cop .swiper-sec,
            .cop .sec-cast {margin:0 10px;}
            .cop .sec-tip,
            .cop .swiper-best,
            .swiper-container-Book {width:calc(100% - 20px);}

            .noticeBoard {padding:10px}
            .noticeBoard a {padding:8px 0}

            .noticeTabs .tabContent {padding:10px 10px 0;}

            .btnCounsel a {width:60px; height: 60px; font-size:1.5vh}
            .btnCounsel a img {margin-bottom:3px; width:50%;}
        }
        @@media (min-width: 721px) {
            .cop .castInfo h5 {font-size:2.4vh;}
            .cop .castInfo p {font-size:2.2vh;}
            .cop .swiper-best{width:calc(100% - 20px); padding-bottom:40px;}

            .btnCounsel a {width:100px; height: 100px;}
        }
    </style>
    <!-- Container -->
    <div id="Container" class="Container NSK cop mb40 p_re">
        <div class="widthAutoFull">
            <div class="subMenuWrap">
                <a href="{{ front_app_url('/classroom/on/list/ongoing', 'www') }}">내강의실</a>
                <a href="{{ front_url('/lecture/index/pattern/free') }}">무료특강</a>
                <a href="{{ front_url('/lecture/index/pattern/only') }}">전체강좌</a>
                <a href="{{ front_url('/book/index') }}">교재구매</a>
            </div>
        </div>

        <div class="widthAutoFull">
            {!! banner('M_메인_상단', '', $__cfg['SiteCode'], '0') !!}
        </div>

        {!! banner('M_메인_01', 'MainBnrSlider', $__cfg['SiteCode'], '0') !!}

        <div class="groupLink">
            <a href="https://police.willbes.net/promotion/index/cate/3006/code/2478" target="_blank">경찰승진<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="{{ front_url('/promotion/index/cate/3007/code/2414') }}" target="_blank">해양경찰<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="https://police.willbes.net/promotion/index/cate/3008/code/2437" target="_blank">해경경채<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="{{ front_url('/promotion/index/cate/3001/code/2366') }}" target="_blank">경찰간부<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">진행중인 <strong class="mainColor">이벤트</strong></div>
        </div>
        {!! banner('M_메인_이벤트', 'swiper-sec swiper-sec01', $__cfg['SiteCode'], '0') !!}

        <div class="conTitle">
            <div class="NSK-Black">경찰 개편시험대비 <strong class="mainColor">전문교수진</strong></div>
        </div>
        {!! banner('M_메인_전문교수진', 'swiper-sec swiper-sec02', $__cfg['SiteCode'], '0') !!}

        <div class="conTitle">
            <div class="NSK-Black">신광은 <strong class="mainColor">경찰 캐스트</strong><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        <div class="sec-cast">
            @for($i = 1; $i <= 3; $i++)
                @if(empty(element('M_메인_경찰캐스트_' . $i, $data['arr_main_banner'])) === false)
                    @foreach(element('M_메인_경찰캐스트_' . $i, $data['arr_main_banner']) as $row)
                        <div class="castList">
                            <a href="{{ $row['LinkUrl'] }}" onclick="return false;">
                                <div class="castImg">
                                    <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                                </div>
                                <div class="castInfo">
                                    <h5>{{$row['BannerName']}}</h5>
                                    <p>{{$row['Desc']}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            @endfor
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은 <strong class="mainColor">경찰팀 TV</strong><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        {!! banner('M_메인_유튜브', 'swiper-sec swiper-sec02', $__cfg['SiteCode'], '0', 'bnTitle') !!}

        <div class="conTitle">
            <div class="NSK-Black">수험생활 <strong class="mainColor">꿀 TIP!</strong></div>
        </div>
        <div class="sec-tip">
            <div class="tipBox">{!! banner('M_메인_TIP_1', '', $__cfg['SiteCode'], '0') !!}</div>
            <div class="tipBox">{!! banner('M_메인_TIP_2', '', $__cfg['SiteCode'], '0') !!}</div>
            {!! banner('M_메인_TIP_3', 'swiper-sec03 tipBox', $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은 경찰학원 <strong class="mainColor">개강 소식</strong><a href="{{ front_url('/offinfo/boardInfo/index/78', true) }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        <div class="noticeBoard">
            <ul>
                @if(empty($data['board_lecture_infomation']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['board_lecture_infomation'] as $row)
                        <li>
                            <a href="{{ front_url('/offinfo/boardInfo/show/78?board_idx='.$row['BoardIdx'], true) }}">
                                @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                {{$row['Title']}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은경찰 <strong class="mainColor">베스트 강좌</strong></div>
        </div>
        @if(empty(element('M_메인_베스트강좌', $data['arr_main_banner'])) === false)
            <div class="swiper-best mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        @foreach(element('M_메인_베스트강좌', $data['arr_main_banner']) as $idx => $row)
                            @if($idx != 0 && $idx % 4 == 0)
                    </div>
                    <div class="swiper-slide">
                        @endif

                        @if(empty($row['LinkUrl']) === true || $row['LinkUrl'] == '#')
                            <a href="javascript:void(0);">
                                <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                            </a>
                        @else
                            <a href="{{front_app_url('/banner/click?banner_idx=' . $row['BIdx'] . '&return_url=' . urlencode($row['LinkUrl']) . '&link_url_type=' . urlencode($row['LinkUrlType']), 'www')}}" target="_{{$row['LinkType']}}">
                                <img src="{{$row['BannerFullPath'] . $row['BannerImgName']}}" alt="{{$row['BannerName']}}">
                            </a>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        @endif

        <div class="conTitle">
            <div class="NSK-Black">경찰 베스트 <strong class="mainColor">교재</strong><a href="{{ front_url('/book/index') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        @if(empty($data['new_product_book']) === false)
            <div class="swiper-container-Book">
                <div class="swiper-wrapper">
                    @foreach($data['new_product_book'] as $row)
                        <div class="swiper-slide">
                            <a href="javascript:void(0);" onclick="return false;">
                                <div class="bookimg"><img src="{{ $row['wAttachImgPath'] . $row['wAttachImgOgName'] }}" alt="{{ $row['ProdName'] }}"></div>
                                <ul>
                                    <li>{{ $row['ProdName'] }}</li>
                                    <li>[{{ $row['wSaleCcdName'] }}]</li>
                                    <li><span>{{ number_format($row['rwRealSalePrice']) }}원</span> <strong>(↓ {{ $row['rwSaleRate'] . $row['rwSaleRateUnit'] }})</strong></li>
                                </ul>
                            </a>
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        @endif

        <div class="noticeTabs">
            <ul class="tabWrap mainTab">
                <li><a href="#notice1" class="on">공지사항</a></li>
                <li><a href="#notice2">시험공고</a></li>
                <li><a href="#notice3">수험뉴스</a></li>
            </ul>
            <div class="tabBox buttonBox noticeBox">
                <div id="notice1" class="tabContent">
                    <div class="moreBtn"><a href="{{front_url('/support/notice/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['notice']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['notice'] as $row)
                                <li>
                                    <a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div id="notice2" class="tabContent">
                    <div class="moreBtn"><a href="{{front_url('/support/examAnnouncement/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['exam_announcement']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['exam_announcement'] as $row)
                                <li>
                                    <a href="{{front_url('/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                        @if($row['IsBest'] == 1)<span>HOT</span>@endif
                                        {{$row['Title']}}
                                    </a>
                                    <span class="date">{{$row['RegDatm']}}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div id="notice3" class="tabContent">
                    <div class="moreBtn"><a href="{{front_url('/support/examNews/index')}}">+ 더보기</a></div>
                    <ul class="List-Table">
                        @if(empty($data['exam_news']) === true)
                            <li><span>등록된 내용이 없습니다.</span></li>
                        @else
                            @foreach($data['exam_news'] as $row)
                                <li>
                                    <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
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

        <div class="sec-bottomBn">
            {!! banner('M_메인_하단배너', '', $__cfg['SiteCode'], '0') !!}
        </div>

        <div class="appPlayer">
            {{-- app player include --}}
            @include('willbes.m.site.main_partial.app_player')
        </div>

        <div class="btnCounsel">
            <a href="{{ front_device_url('/consult/visitConsult/index', 'pc', true) }}">
                <img src="https://static.willbes.net/public/images/promotion/m/icon_counsel.png" alt="">
                방문상담<br>예약
            </a>
        </div>
    </div>

    {{--경찰캐스트 팝업--}}
    <div id="castPopup" class="castBoxpopup">
        <div class="popupBox NSK" >
            <div class="popupContent">
                <div class="close"><button onclick="closeWin('castPopup')">닫기</button></div>
                <div class="embed-container">
                    <iframe src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            // 경찰캐스트 배너 클릭
            $('.castList a').on('click', function() {
                var $el = $('#castPopup').find('iframe');
                $el.prop('src', $(this).prop('href'));
                openWin('castPopup');
            });

            // 베스트강좌
            new Swiper('.swiper-best', {
                slidesPerView: 'auto',
                spaceBetween: 0,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: true,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            // 베스트교재
            new Swiper ('.swiper-container-Book', {
                slidesPerView: 'auto',
                spaceBetween: 11,
                loop: true,
                loopFillGroupWithBlank: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        });
    </script>
    {!! popup('657007', $__cfg['SiteCode'], '0') !!}
@stop
