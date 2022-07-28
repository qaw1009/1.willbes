@extends('willbes.pc.layouts.master')

@section('content')
    <link href="/public/css/willbes/style_cop.css??ver={{time()}}" rel="stylesheet">
    <style type="text/css">
        .gosi-gate-secTop {position:relative; padding-top:56px;}
        .gosi-gate-secTop .gosi-gate-search {position:absolute; top:35px;}
        .onSearch {width:200px}
        .onSearch input[type="text"] {width:190px}

        .topMenu { position:relative; width:1120px; margin:0 auto;}
        .topMenu div {position:absolute; top:-30px; width:880px; display:flex; align-items: flex-end; font-size:19px; font-weight:bold; z-index: 100; vertical-align:bottom}
        .topMenu .copLogo {margin-right:30px}
        .topMenu div a {display:block; text-align:center; width:15%; padding-bottom:10px}
        .topMenu div a:last-child {text-align:right; width:25%; background: url(https://static.willbes.net/public/images/promotion/main/cop_gate/icon_cop01.png) no-repeat 50% 0; color:#0041b5}

        .cop-gate .Section01 {background: url(https://static.willbes.net/public/images/promotion/main/cop_gate/sec01_bg.jpg) no-repeat left center; margin-top:50px; border-top:4px solid #ffc100; min-height:1418px; text-align:center; padding-top:90px}
        .cop-gate .Section01 .bnBox {width:1030px; margin:30px auto 0; display:flex; justify-content: space-between;}
        .cop-gate .Section01 .bnBox img {box-shadow:10px 10px 26px rgba(0,0,0,.2);}
        .cop-gate .Section01 .titleBox {color:#fff; margin-top:150px; line-height:1.2}
        .cop-gate .Section01 .title01 {font-size:26px; color:#dee0e7}
        .cop-gate .Section01 .title02 {font-size:100px; margin-top:55px; text-shadow:0 8px 0 rgba(0,0,0,.4);}
        .cop-gate .Section01 .title03 {font-size:128px; text-shadow:0 10px 0 rgba(0,0,0,.4);}

        .cop-gate .Section02 {text-align:center; background:#525252; padding:150px 0; color:#fff; height: auto;}
        .cop-gate .Section02 .title01 {font-size:26px; margin-bottom:10px}
        .cop-gate .Section02 .title02 {font-size:82px; margin-bottom:90px; text-shadow:0 8px 0 rgba(0,0,0,.4);}
        .cop-gate .Section02 .bnBox {position:relative; width:986px; margin:0 auto}
        .cop-gate .Section02 .bnBox a {position: absolute; width: 13%; z-index: 2; background:#fff; color:#24262d; font-size:16px; font-weight:bold; font-size:16px; border-radius:10px; padding:10px 0}
        .cop-gate .Section02 .bnBox a:hover {background:#083381; color:#fff;}
    </style>

    <div id="Container" class="Container cop cop-gate NSK c_both">

        <div class="widthAuto gosi-gate-secTop">
            <div class="gosi-gate-search">
                @include('willbes.pc.layouts.partial.site_search')
            </div>
        </div>


        <div class="topMenu">
            <div>
            <span class="copLogo">
                <img src="https://static.willbes.net/public/images/promotion/main/cop_gate/logo_cop.jpg" alt="윌비스경찰">
            </span>
                <a href="{{front_url('/home/index/cate/3001')}}">일반.경찰</a>
                <a href="{{front_url('/home/index/cate/3006')}}">경찰승진</a>
                <a href="{{front_url('/home/index/cate/3007')}}">해양경찰</a>
                <a href="{{front_url('/home/index/cate/3008')}}">해양경채</a>
                <a href="{{front_url('/home/index/cate/3001')}}">경찰간부</a>
                <a href="{{front_url('/home/index/', true)}}">경찰학원</a>
            </div>
        </div>


        <div class="Section Section01">
            <div data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/sec01_img.png" alt="컴팩트한 강의, 확실한 합격!"></div>
            <div class="bnBox" data-aos="fade-left">
                <a href="{{front_url('/promotion/index/cate/3001/code/2718')}}"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_01.png" alt="경찰PASS"></a>
                <a href="{{front_url('/promotion/index/cate/3006/code/2478')}}"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_02.png" alt="승진PASS"></a>
                <a href="{{front_url('/promotion/index/cate/3007/code/2414')}}"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_03.png" alt="합격PASS"></a>
                <a href="{{front_url('/promotion/index/cate/3007/code/2598')}}"><img src="https://static.willbes.net/public/images/promotion/main/cop_gate/bn_250_04.png" alt="해경간부리더"></a>
            </div>
            <div class="titleBox NSK-Black" data-aos="fade-right">
                <div class="title01">
                    NEW 윌비스 경찰은<br>
                    여러분의 경찰 합격을 최상위 목표로 합니다.
                </div>
                <div class="title02">젊다, 간결하다.</div>
                <div class="title03">그렇지만 정확하다!</div>
            </div>
        </div>

        <div class="Section Section02 NSK-Black">
            <div class="title01" data-aos="fade-down">
                형사법,경찰학,헌법과 검정제(G-TELP, 한능검)과목까지 책임지는
            </div>
            <div class="title02" data-aos="fade-down">
                윌비스 경찰 교수진
            </div>
            <div class="bnBox" data-aos="fade-up">
                <img src="https://static.willbes.net/public/images/promotion/main/cop_gate/sec02_img.png" alt="배너명">
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" title="이국령" style="left: 51%; top: 41.49%;">확인하기 ></a>
                {{--
                <a href="javascript:void(0);" title="" style="left: 18%; top: 41.49%;">확인하기 ></a>
                <a href="javascript:void(0);" title="" style="left:  84.5%; top: 41.49%;">확인하기 ></a>

                <a href="javascript:void(0);" title="" style="left: 12.3%; top: 84.57%;">확인하기 ></a>
                <a href="javascript:void(0);" title="" style="left: 35.8%; top: 84.57%;">확인하기 ></a>
                <a href="javascript:void(0);" title="" style="left: 60.5%; top: 84.57%;">확인하기 ></a>
                --}}
            </div>
        </div>

        <div class="Section Section6 mt80">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto350 f_left">
                        <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx=' . $row['BoardIdx'])}}">
                                            <span>{{$row['Title']}}</span>
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_announcement']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_announcement'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'], false, true)}}">
                                            <span>{{$row['Title']}}</span>
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto350 f_left ml35">
                        <div class="will-nlistTit p_re">수험뉴스 <a href="{{front_url('/support/examNews/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_news']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_news'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'], false, true)}}">
                                            <span>{{$row['Title']}}</span>
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

        <div class="Section Section7 mt30">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section mt50 mb50">
            <div class="widthAuto">
                <div class="collaborate">
                    <div id="collaboslides">
                        <ul>
                            <li>
                                <a href="https://www.police.go.kr/main.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_01.jpg" alt="경찰청"></a>
                                <a href="http://www.smpa.go.kr/home/homeIndex.do?menuCode=kidonghq" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_02.jpg" alt="서울지방경찰청기동본부"></a>
                                <a href="http://www.gangdong.ac.kr/Home/Main.mbz" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_03.jpg" alt="강동대학교"></a>
                                <a href="http://kollabo.kiu.ac.kr/pages/index_mapsi.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_04.jpg" alt="경일대학교"></a>
                                <a href="http://cover.kimpo.ac.kr/intro/new/index.html" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_05.jpg" alt="김포대학교"></a>
                                <a href="http://www.jjpolice.go.kr/jjpolice" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_06.jpg" alt="제주지방경찰청"></a>
                                <a href="https://www.police.ac.kr/police/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_07.jpg" alt="경찰대학"></a>
                                <a href="https://job.kyungnam.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_08.jpg" alt="경남대학교"></a>
                                <a href="http://ipsi.kmcu.ac.kr/admission/index.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_09.jpg" alt="계명문화대학교"></a>
                                <a href="http://www.dju.ac.kr/kor/html/main.htm" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_10.jpg" alt="대전대학교"></a>
                            </li>
                            <li>
                                <a href="http://www.seowon.ac.kr/web/kor/home" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_11.jpg" alt="서원대학교"></a>
                                <a href="http://www.sehan.ac.kr/main/main.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_12.jpg" alt="세한대학교"></a>
                                <a href="http://www.jbnu.ac.kr/kor/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_13.jpg" alt="전북대학교"></a>
                                <a href="https://www3.chosun.ac.kr/chosun/index.do" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_14.jpg" alt="조선대학교"></a>
                                <a href="https://www.hyundai1990.ac.kr/index/main.asp?re=y" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_15.jpg" alt="특성화학교"></a>
                                <a href="https://lily.sunmoon.ac.kr/MainDefault.aspx" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_16.jpg" alt="선문대학교"></a>
                                <a href="http://www.wku.ac.kr/" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_17.jpg" alt="원광대학교"></a>
                                <a href="http://www.jj.ac.kr/jj/index.jsp" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_18.jpg" alt="전주대학교"></a>
                                <a href="http://www.joongbu.ac.kr" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_19.jpg" alt="중부대학교"></a>
                                <a href="javascript:void(0);"><img src="https://static.willbes.net/public/images/promotion/main/3001_collaborate_temp.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                        {!! banner_html(element('게이트_우측퀵1', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵1', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵1', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    {!! popup('657005', $__cfg['SiteCode'], $__cfg['CateCode'], '') !!}

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
            AOS.init();
        });
    </script>
@stop