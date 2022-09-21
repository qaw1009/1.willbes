@extends('willbes.m.layouts.master')

@section('content')
    <style>
        .intro .swiper-wrapper {height:auto;}
        .intro .gosiTitle {text-align:left; margin-left:4%; font-size:2.4vh; padding:0 0 20px}

        .gosi-gate-Sec {overflow: hidden;}
        .gosi-gate-Sec .gosi-gate-bntop-img {position:relative;}

        .gosi-gate-Sec .mainTopBnList {position:relative; margin-top:4%}
        .gosi-gate-Sec .mainTopBn {display:flex; margin-left:4%}
        .gosi-gate-Sec .mainTopBn li a {
            display: block;
            color:#b4b4b4;
            text-align:center;
            line-height: 1.2;
            font-size: 1.8vh;
            width:110px;
            margin-right:30px
        }
        .gosi-gate-Sec .mainTopBn li a.active {color:#000; font-weight:bold;}
        .gosi-gate-Sec .mainTopBn li a img {display:block; margin:auto auto 18px; border-radius:18px; width:100%; max-width:110px}
        .gosi-gate-Sec .mainTopBn li a.active img {box-shadow:3px 3px 5px rgba(0,0,0,.2); }


        .intro .newsWrap {margin-top:6%; position: relative; display:flex; justify-content: space-between; align-items: top}
        .intro .newsWrap .swiper-wrapper img {border-radius:10px;}
        .intro .newsWrap .swiper-sec02-wrap {
            overflow: hidden;
            width:calc(100%);
            margin-left:20px
        }
        .intro .swiper-sec02-wrap .gosiTitle {margin-left:0}
        .intro .swiper-sec02-wrap .swiper-wrapper {display: flex; justify-content:flex-start; height: auto;}
        .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
            width:420px; margin-right:1.3%; align-items: flex-start;
        }
        .intro .swiper-sec02-wrap .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec02-wrap .swiper-slide .bnTit {
            display: block;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            margin: 10px auto 0;
            font-size: 12px;
        }
        .intro .swiper-sec02-wrap .swiper-slide img {
            width:100%;
        }

        .intro .swiper-sec03 {margin-top:10%; padding-bottom:30px;}
        .intro .swiper-sec03 img {width:100%}

        .intro .swiper-pagination .swiper-pagination-bullet {
            background:#d1d0ce !important;
            opacity: 1;
        }
        .intro .swiper-pagination .swiper-pagination-bullet-active {
            background:#2b2b2b !important;
        }

        .tpassWrap {margin-top:10%; background:#f4f7fe; padding:10% 4% 2%; }
        .tpassWrap .gosiTitle {margin-left:0}
        .tpassWrap .swiper-sec04 {padding-bottom:30px;}
        .tpassWrap .swiper-sec04 .swiper-wrapper {border-radius:20px;}
        .tpassWrap .swiper-sec04 .swiper-slide {background:#f4f7fe;}
        .tpassWrap .swiper-sec04 .swiper-slide img {border-radius:20px; width:100%;}
        .tpassWrap .swiper-sec04 .swiper-pagination04 {
            bottom:8px;
            float:none;
            text-align:center
        }
        .tpassWrap .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            bottom: 0;
            left:0;
            right: 0;
        }
        .tpassWrap .prfoWrap {margin:6% auto; display:flex; flex-wrap: wrap; justify-content: center;}
        .tpassWrap .prfoWrap > div {font-size:1.6vh; font-weight:bold; text-align:center; display:block; width:calc(20% - 8px); margin:0 4px 20px;}
        .tpassWrap .prfoWrap div img {border:1px solid #e6e6e6; border-radius:30px; overflow: hidden; display:block; margin:0 auto 10px; max-width:100%}



        .intro .swiper-sec05 {
            padding: 10% 0;
            overflow: hidden;
            position: relative;
            background:#21262c;
            color:#fff
        }
        .intro .swiper-sec05 .gosiTitle strong {color:#ff554d}
        .intro .swiper-sec05 .swiper-container-prof {margin-left:3%}
        .intro .swiper-sec05 .swiper-wrapper {height:auto;}
        .intro .swiper-sec05 .swiper-slide {
            width: 330px;
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
            margin-right:20px;
            margin-bottom:15px
        }
        .intro .swiper-sec05 .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec05 .swiper-slide img {
            width: 100%;
        }


        .intro .swiper-sec06-Wrap {
            position: relative;
            overflow: hidden;
            padding:10% 0;
        }
        .intro .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
        .intro .swiper-sec06-Wrap .swiper-slide {
            width: 210px; align-items: flex-start; margin-right:10px;
        }
        .intro .swiper-sec06-Wrap .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec06-Wrap .swiper-slide img {
            max-width: 100%;
        }

        /* iPhone 5/SE */
        @@media only screen and (max-width: 374px) {
            .gosi-gate-Sec .mainTopBn li a {
                font-size:1.6vh;
                width:55px;
                margin-right:16px
            }

            .intro .newsWrap {display:block; width:320px; margin:10% auto 0}
            .intro .newsWrap .swiper-sec02-wrap {
                overflow: hidden;
                width:100%;
                margin-left:0;
                margin-top:10%
            }

            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
                width:60%; margin-right:1%;
            }

            .tpassWrap .prfoWrap > div {font-size:1.4vh; width:calc(20% - 6px); margin:0 3px 20px;}
            .tpassWrap .prfoWrap div img {border-radius:10px;}

            .intro .swiper-sec05 .swiper-slide {width: 160px;}
            .intro .swiper-sec06-Wrap .swiper-slide {
                width: 150px;
            }
        }

        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .gosi-gate-Sec .mainTopBn li a {
                width:80px;
                margin-right:16px
            }

            .intro .newsWrap {display:block; width:92%; margin:10% auto 0}
            .intro .newsWrap .swiper-sec02-wrap {
                overflow: hidden;
                width:100%;
                margin-left:0;
                margin-top:10%
            }

            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
                width:60%; margin-right:1%;
            }
            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide:last-child {margin-right:0}

            .tpassWrap .prfoWrap > div {font-size:1.5vh; width:calc(20% - 6px); margin:0 3px 20px;}
            .tpassWrap .prfoWrap div img {border-radius:20px;}

            .intro .swiper-sec05 .swiper-slide {width: 165px;}

            .intro .swiper-sec06-Wrap .swiper-slide {
                width: 150px;
            }
        }
    </style>

    <div id="Container" class="Container NSK gosi intro mb40 p_re">

        <div class="gosi-gate-Sec">
            <div class="gosi-gate-bntop-img">
                <div class="gate-bntop-Slider mainSlider01">
                    <ul class="swiper-wrapper">
                        @if(isset($data['banner']['M_게이트_메인배너']) === true)
                            @for($i=0; $i<count($data['banner']['M_게이트_메인배너']); $i++)
                                <li class="swiper-slide">
                                    {!! banner_html(array($data['banner']['M_게이트_메인배너'][$i])) !!}
                                    {{--                                    {!! str_replace('/public/', 'https://pass.willbes.net/public/', banner_html(array($data['banner']['M_게이트_메인배너'][$i]))) !!}--}}
                                </li>
                            @endfor
                        @endif
                    </ul>
                </div>
            </div>

            <div class="mainTopBnList">
                <ul class="mainTopBn">
                    <li><a data-swiper-slide-index="0" href="javascript:void(0);" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_01.jpg" alt="배너명">
                            9급PASS<br>할인</a></li>
                    <li><a data-swiper-slide-index="1" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_02.jpg" alt="배너명">
                            윌비스<br>세무팀</a></li>
                    <li><a data-swiper-slide-index="2" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_03.jpg" alt="배너명">
                            불꽃소방<br>신규개강</a></li>
                    <li><a data-swiper-slide-index="3" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_04.jpg" alt="배너명">
                            농업직<br>통신직</a></li>
                    <li><a data-swiper-slide-index="4" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_05.jpg" alt="배너명">
                            축산직<br>조경직</a></li>
                    <li><a data-swiper-slide-index="5" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_06.jpg" alt="배너명">
                            군무원<br>행정직</a></li>
                    <li><a data-swiper-slide-index="6" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_07.jpg" alt="배너명">
                            검찰직<br>신규런칭</a></li>
                    <li><a data-swiper-slide-index="7" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_08.jpg" alt="배너명">
                            7급<br>PSAT</a></li>
                    <li><a data-swiper-slide-index="8" href="javascript:void(0);">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_09.jpg" alt="배너명">
                            김동진<br>법원팀</a></li>
                </ul>
            </div>
        </div>

        <div class="newsWrap">
            <div class="swiper-sec02-wrap">
                <div class="gosiTitle NSK">
                    지금 윌비스에서 <strong class="NSK-Black">주목해야 할 강의!</strong>
                </div>
                <div class="swiper-sec02">
                    <div class="swiper-wrapper">

                        @if(empty($data['banner']['M_게이트_주목']) === false)
                            @foreach($data['banner']['M_게이트_주목'] as $key => $row)
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
        </div>

        <div class="swiper-container swiper-sec03">
            {!! banner_html(element('M_게이트_초보가이드', $data['banner'])) !!}
        </div>

        <div class="tpassWrap">
            <div class="gosiTitle NSK">
                <strong class="NSK-Black">원하는 교수님</strong>의 과정을 무제한 수강
            </div>
            <div class="swiper-container swiper-sec04">
                <div class="swiper-wrapper">
                    @if(empty($data['banner']['M_게이트_무제한수강']) === false)
                        @foreach($data['banner']['M_게이트_무제한수강'] as $key => $row)
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
                <div class="swiper-pagination04 swiper-pagination"></div>
            </div>

            <div class="prfoWrap">
                @if(empty($data['banner']['M_게이트_과목별교수']) === false)
                    @foreach($data['banner']['M_게이트_과목별교수'] as $key => $row)
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
                            <div class="castTitle">{{$row['BannerName']}}</div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

        <div class="swiper-sec05">
            <div class="gosiTitle NSK">
                보기만 해도 열공 되는 <strong class="NSK-Black">YOUTUBE</strong>
            </div>

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

        <div class="swiper-sec06-Wrap">
            <div class="gosiTitle NSK">
                합격을 책임지는 <strong class="NSK-Black">윌비스 교수진</strong>
            </div>

            <div class="swiper-sec06">
                <div class="swiper-wrapper">
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
    {!! popup('657008', $__cfg['SiteCode']) !!}

    <script src="/public/vendor/jquery/swiper/swiper.min.js"></script>
    <script>
        //swiper 메인 슬라이드
        $(document).ready(function(){
            var mainslider = new Swiper('.mainSlider01', {
                spaceBetween: 0,
                effect: "fade",
                pagination: {
                    el: ".swiper-pagination-gate",
                    type: "fraction",
                },
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                }, //5초에 한번씩 자동 넘김
                navigation: {
                    nextEl: ".swiper-btn-next",
                    prevEl: ".swiper-btn-prev",
                },
                on: {
                    slideChange: function () {
                        $('.mainTopBn li > a').removeClass('active');
                        $('.mainTopBn li > a').eq(this.realIndex).addClass('active').trigger('click');
                        if($('.mainTopBn li:eq(0) > a').hasClass('active')){
                            // mainslider.update();
                            // location.reload();
                        }
                    }
                }
            });

            //메인 슬라이드 메뉴1
            $('.mainTopBn li > a').on('click', function(){
                $('.mainTopBn li > a').removeClass('active');
                $(this).addClass('active');
                var num = $(this).attr('data-swiper-slide-index');
                mainslider.slideTo(num);
                var target = $(this);
                muCenter(target);
            });

            //슬라이드 메뉴1 클릭시 위치조정
            function muCenter(target){
                var snbwrap = $('.mainTopBn');
                var targetPos = target.position();
                var box = $('.mainTopBnList');
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
        });


        //입성
        var swiper2 = new Swiper('.swiper-sec02', {
            slidesPerView: 'auto',
            slidesPerColumn: 1,
            spaceBetween: 0,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });


        //무제한 수강 교수진
        var swiper4 = new Swiper('.swiper-sec04', {
            slidesPerView: '1',
            effect : "fade",
            fadeEffect: {
                crossFade: true
            },
            allowTouchMove: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            loop: true,
            spaceBetween:0,//각 좌우 공간
            pagination: {
                el: ".swiper-pagination04",
                clickable:true
            },
        });

        //YOUTUBE 영상
        var swiper5 = new Swiper('.swiper-container-prof', {
            slidesPerView: 'auto',
            slidesPerColumn: 2,
            spaceBetween: 0,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
            // init: false,
            pagination: {
                el: '.swiper-container-prof .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                375: {
                    spaceBetween: 0,
                },
                640: {
                    spaceBetween: 0,
                },
            }
        });

        //교수진
        var swiper6 = new Swiper('.swiper-sec06', {
            slidesPerView: 'auto',
            slidesPerColumn: 1,
            spaceBetween: 10,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });

    </script>

@stop