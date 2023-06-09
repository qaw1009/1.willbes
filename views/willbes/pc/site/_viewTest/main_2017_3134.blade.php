@extends('willbes.pc.layouts.master')

@section('content')
    <style type="text/css">
        .ssam .willbes-Layer-ReplyBox-1120 .Layer-Cont {font-size:14px}
        .ssam .MaintabList {background-color:rgba(0,0,0,.5)}
        .ssam .VisualBox .MaintabFlex {width: 1120px; margin:0 auto; display:flex; justify-content: space-around; border-left:1px solid #fff}
        .ssam .VisualBox .MaintabFlex span {
            height: 50px;
            font-size: 14px;
            line-height: 50px;
            width:calc(100%);
        }
        .ssam .VisualBox .MaintabFlex span a {color:#fff}
        .ssam .VisualBox .MaintabFlex span a {
            display: block;
            width: 100%;
            height: 100%;
            border-right:1px solid #fff
        }
        .ssam .VisualBox .MaintabFlex span a:hover {
            background-color:rgba(255,255,255,.3); font-weight:bold
        }

        .ssam .noticeBanner {float:right; position:relative;}
        .ssam .noticeBanner .title {margin-bottom:10px; height:36px !important; line-height:36px !important; text-align:left; font-size:18px; color:#474747; font-weight:bold;}
        .ssam .noticeBanner .HotnNew {width:540px; height:240px; overflow: hidden;}
        .ssam .noticeBanner .ctrbtn {position:absolute; top:5px; left:110px}

        .ssam .noticeTabs {height:293px; overflow:hidden;}
        .ssam .noticeWrap li a {display:block; color:#474747 !important; background:#ededed; padding:0 20px !important; text-align:center; font-weight:bold; border:3px solid #ededed !important; border-radius:20px; font-size:18px; line-height:26px !important; height:32px !important; vertical-align:middle} 
        .ssam .noticeWrap li a.on {border:3px solid #0c5dc0 !important; background:#fff; }

        .ssam .noticeBox .List-Table {margin-top:20px !important;border-top:0 !important} 

        .ssam .sec-prof {background:url("https://static.willbes.net/public/images/promotion/main/2018/sec_prof_bg.jpg") no-repeat center 82px; position: relative;}
        .ssam .sec-prof .sec-prof-title {text-align:center; background-color:#0a2230;}
        .ssam .sec-prof .widthAuto {height:402px; overflow: hidden; z-index: 1}
        .ssam .sec-prof .prof-Tab {position:absolute; top:24px; left:50px; width:300px; z-index: 2;}

        .ssam .sec-prof .prof-Tab li {display:inline; float:left; width:50%}
        .ssam .sec-prof .prof-Tab li a {display:block; width:130px; border:1px solid #638294; height:35px; line-height:35px; color:#fff; font-size:11px; padding:0 10px; margin-bottom:-1px;}
        .ssam .sec-prof .prof-Tab li a span {font-size:13px; color:#0a2230; display:inline-block; width:67px; margin-right:2px; vertical-align:bottom; font-weight:bold;  text-align:left;}
        .ssam .sec-prof .prof-Tab li a.active {width:130px; background:#0a2230; width:140px; border:1px solid #0a2230; border-bottom:1px solid #638294}
        .ssam .sec-prof .prof-Tab li a.active span {color:#8ca4b2}
        .ssam .sec-prof .prof-Tab li a,
        .ssam .sec-prof .prof-Tab:after {content; display:block; clear:both}
        .ssam .sec-prof .prof-Tab-Cts {position:relative; width:1120px; margin:0 auto}
        .ssam .sec-prof .prof-Tab-Cts .btnBox {position:absolute; top:195px; left:384px}
        .ssam .sec-prof .prof-Tab-Cts .prof-top-btn { height:25px;}
        .ssam .sec-prof .prof-Tab-Cts .prof-top-btn a {display:inline-block; color:#fff; padding:4px 10px 4px 22px; margin-right:4px}
        .ssam .sec-prof .prof-Tab-Cts .prof-top-btn a:nth-of-type(1) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon01.png")
        no-repeat 5px center}
        .ssam .sec-prof .prof-Tab-Cts .prof-top-btn a:nth-of-type(2) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon02.png")
        no-repeat 5px center}
        .ssam .sec-prof .prof-Tab-Cts .prof-top-btn a:nth-of-type(3) {background:#0a2230 url("https://static.willbes.net/public/images/promotion/main/2018/icon03.png")
        no-repeat 5px center}
        .ssam .sec-prof .prof-Tab-Cts .prof-clip-btn {margin-top:42px}
        .ssam .sec-prof .prof-Tab-Cts .prof-clip-btn a {display:inline-block; margin-right:5px; margin-bottom: 5px;}
        .ssam .sec-prof .prof-Tab-Cts .hotclip {position:absolute; top:225px; left:355px;}

        .ssam .willbes-Layer-youtube {
            display: none;
            background:#000;
            position: absolute;
            top: 50px;
            z-index: 110;
            width: 860px;
            height: 484px;
            border: 1px solid #2f2f2f;
            left: 50%;
            margin-left: -445px;
        }
        .ssam .willbes-Layer-youtube .closeBtn {
            position: absolute;
            top: -33px;
            right: -2px;
        }
        .ssam .willbes-Layer-youtube iframe {width:860px; height:484px}

        .ssam .willbes-Layer-ProfReply {
            display: none;
            background: #fff;
            position: absolute;
            top: 54px;
            /*right: 0;*/
            z-index: 110;
            width: 890px;
            border: 1px solid #2f2f2f;
            padding: 20px 25px 30px;
            left: 50%;
            margin-left: -445px;
        }
        .ssam .willbes-Layer-ProfReply .Layer-Tit {
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 0;
            padding: 20px 0 25px;
            border-bottom: 2px solid #000;
            margin-bottom:20px
        }
        .ssam .willbes-Layer-ProfReply .closeBtn {
            position: absolute;
            top: -1px;
            right: -1px;
        }


        /*중간 교수진 영역*/
        .ssam .ssam-prof-List {position: absolute; top:50px; left:10px; z-index: 200;}
        .prof-dropdown {}
        .prof-dropdown > a {width:170px; display:block; color:#fff; font-size:15px; border:1px solid #668597; border-bottom:0; padding:20px 10px}
        .prof-dropdown:last-child > a {border-bottom:1px solid #668597} 
        .prof-dropdown:hover {background:#fff}
        .prof-dropdown:hover > a {color:#0a2230}
        .prof-dropdown:hover .prof-list-drop-Box {
            display: block;
        }
        .prof-list-drop-Box {
            display: none;
            position: absolute;
            background: #fff;
            left:169px;
            top:0;
            width: 150px;
            height: 281px;
            border:1px solid #668597; border-left:0;
        }
        .prof-list-drop-Box a {display:block; padding:10px 15px; height:calc(279px / 8); font-size:13px; width:100%;}
        .prof-list-drop-Box a:hover {background:#0a2230; color:#fff}
        .prof-list-drop-Box a strong {margin-left:10px;}       
    </style>

    <!-- Container -->
    @php $week_w = array('일','월','화','수','목','금','토'); @endphp
    <div id="Container" class="Container ssam NGR c_both">
        @if(empty($data['dday']) === false)
            <div class="d-day NSK">
                <div class="d-day-wrap">
                    @foreach($data['dday'] as $row)
                        <div>
                            <p>{{$row['DayTitle']}} <span class="NSK-Black">{{($row['DDay'] == 0) ? 'D-'.$row['DDay'] : 'D'.$row['DDay']}}</span></p>
                            {{--{{str_replace('-','.',$row['DayDatm'])}}.({{$week_w[date("w",strtotime($row['DayDatm']))]}})--}}
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- site nav -->
        @include('willbes.pc.site._viewTest.main_partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">
                @if(empty($data['arr_main_banner']['메인_빅배너']) === false)
                    <div id="MainRollingSlider" class="MaintabBox">
                        {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}

                        <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                        <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>

                        <div id="MainRollingDiv" class="MaintabList">
                            <div class="MaintabFlex">
                                @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                                    <span><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="Section mt40">
            <div class="widthAuto">
                {{-- board include --}}
                @include('willbes.pc.site._viewTest.main_partial.board_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section sec-prof mt40">
            @include('willbes.pc.site._viewTest.main_partial.professor_hot_clip_' . $__cfg['SiteCode'])            
        </div>

        <div class="Section Section2 mt40">
            <div class="widthAuto p_re">
                {{-- study comment include --}}
                @include('willbes.pc.site.main_partial.study_comment_' . $__cfg['SiteCode'])
            </div>
        </div>


        <div class="Section Section1 mt40">
            <div class="widthAuto smallTit NSK-Black">
                <p>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img01.png">
                    <span><strong>기출적중&수강후기로 증명</strong>하는 윌비스 임용 교수진</span>
                    <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_img02.png">
                </p>
            </div>
            <div class="VisualSubBox p_re mt20">
                <div id="SubRollingSlider" class="SubtabBox">
                    <ul class="SubtabSlider">
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1816') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_mjs.jpg" alt="유아 민정선"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1817') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bjm.jpg" alt="초등 배재민"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2555') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51312.jpg" alt="교육한 이경범"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2556') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51158.jpg" alt="교육한 정현"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2557') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51336.jpg" alt="교육한 신태식"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1814') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_lij.jpg" alt="교육한 이인재"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1815') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_hei.jpg" alt="교육한 홍의일"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1818') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_swy.jpg" alt="전공국어 송원영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1820') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbm.jpg" alt="전공국어 권보민"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2558') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51313.jpg" alt="전공국어 구동언"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1821') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kys.jpg" alt="전공영어 김유석"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1822') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kym.jpg" alt="전공영어 김영문"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1824') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcm.jpg" alt="전공수학 김철홍"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2559') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51338.jpg" alt="전공수학 김현웅"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1825') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_bty.jpg" alt="수학교육론 박태영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2560') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51314.jpg" alt="수학교육론 박혜향"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1828') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kbc.jpg" alt="도덕윤리 김병찬"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2561') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51317.jpg" alt="도덕윤리 김민웅"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2562') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51316.jpg" alt="일반사회 허역 팀"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2562') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51315.jpg" alt="전공역사 김종권"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1826') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_kcu.jpg" alt="전공생물 강치욱"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1827') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_yhj.jpg" alt="생물교육론 양혜정"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2565') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51310.jpg" alt="전공화학 강철"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2566') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51156.jpg" alt="전공체육 최규훈"></a></li>
                        
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1829') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_diana.jpg" alt="음악 다이애나"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1830') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_cuy.jpg" alt="전기전자통신 최우영"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1831') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_sgj.jpg" alt="정보컴퓨터 송광진"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/1832') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_jss.jpg" alt="정컴교육론 장순선"></a></li>
                        <li><a href="{{ front_url('/promotion/index/cate/3140/code/2563') }}"><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_51318.jpg" alt="중국어 장영희"></a></li>
                    </ul>
                    <p class="leftBtn" id="imgBannerLeft2"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight2"><a href="none">다음</a></p>
                </div>
                <div id="SubRollingDiv" class="SubtabList">
                    <ul class="Subtab">
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1816') }}"'><a data-slide-index='0' href="javascript:void(0);" class="active">유아 민정선</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1817') }}"'><a data-slide-index='1' href="javascript:void(0);">초등 배재민</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2555') }}"'><a data-slide-index='2' href="javascript:void(0);">교육학 이경범</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2556') }}"'><a data-slide-index='3' href="javascript:void(0);">교육학 정 현</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2557') }}"'><a data-slide-index='4' href="javascript:void(0);">교육학 신태식</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1814') }}"'><a data-slide-index='5' href="javascript:void(0);">교육학 이인재</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1815') }}"'><a data-slide-index='6' href="javascript:void(0);">교육학 홍의일</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1818') }}"'><a data-slide-index='7' href="javascript:void(0);">전공국어 송원영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1820') }}"'><a data-slide-index='8' href="javascript:void(0);">전공국어 권보민</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2558') }}"'><a data-slide-index='9' href="javascript:void(0);">전공국어 구동언</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1821') }}"'><a data-slide-index='10' href="javascript:void(0);">전공영어 김유석</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1822') }}"'><a data-slide-index='11' href="javascript:void(0);">전공영어 김영문</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1824') }}"'><a data-slide-index='12' href="javascript:void(0);">전공수학 김철홍</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2559') }}"'><a data-slide-index='28' href="javascript:void(0);">전공수학 김현웅</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1825') }}"'><a data-slide-index='13' href="javascript:void(0);">수학교육론 박태영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2560') }}"'><a data-slide-index='14' href="javascript:void(0);">수학교육론 박혜향</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1828') }}"'><a data-slide-index='15' href="javascript:void(0);">도덕윤리 김병찬</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2561') }}"'><a data-slide-index='16' href="javascript:void(0);">도덕윤리 김민웅</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2562') }}"'><a data-slide-index='17' href="javascript:void(0);">일반사회 허역 팀</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2564') }}"'><a data-slide-index='18' href="javascript:void(0);">전공역사 김종권</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1826') }}"'><a data-slide-index='19' href="javascript:void(0);">전공생물 강치욱</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1827') }}"'><a data-slide-index='20' href="javascript:void(0);">생물교육론 양혜정</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2565') }}"'><a data-slide-index='21' href="javascript:void(0);">전공화학 강 철</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2566') }}"'><a data-slide-index='22' href="javascript:void(0);">전공체육 최규훈</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1829') }}"'><a data-slide-index='23' href="javascript:void(0);">전공음악 다이애나</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1830') }}"'><a data-slide-index='24' href="javascript:void(0);">전기전자통신 최우영</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1831') }}"'><a data-slide-index='25' href="javascript:void(0);">정보컴퓨터 송광진</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/1832') }}"'><a data-slide-index='26' href="javascript:void(0);">정컴교육론 장순선</a></li>
                        <li onclick='location.href="{{ front_url('/promotion/index/cate/3140/code/2563') }}"'><a data-slide-index='27' href="javascript:void(0);">중국어 장영희</a></li>
                    </ul>
                </div>
            </div>
        </div>
 
        

        <div class="Section Section3 mt40">
            <div class="widthAuto">
                <div class="will-nTit">윌비스 임용 <span class="tx-color">합격 교수진</span></div>
                <ul>
                    @for($i=1; $i<=24; $i++)
                        @if(empty($data['arr_main_banner']['메인_교수진'.$i]) === false)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>


        @if(empty($data['top_order_lecture']) === false)
            <div class="Section Section4 mt80">
                <div class="widthAuto">
                    <div class="widthAuto smallTit NSK-Black">
                        <p><span>윌비스 임용 <strong>실시간 인기강의 TOP3</strong></span></p>
                    </div>
                    <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
                    <ul class="bestLecBox">
                        @foreach($data['top_order_lecture'] as $key => $row)
                            <li class="bestLec">
                                <a href="{{ site_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode']) }}">
                                    <ul class="lecinfo">
                                        <li class="NSK-Black"><span class="NSK">{{ $row['SubjectName'] }}</span>{{ $row['ProfNickNameAppellation'] }}</li>
                                        <li><strong>{{ $row['CourseName'] }}</strong></li>
                                        <li><span>{{ $row['ProdName'] }}</span></li>
                                    </ul>
                                </a>
                                <div class="profImg"><img src="{{ $row['ProfImgPath'] }}" title="{{ $row['ProfNickNameAppellation'] }}"></div>
                                <div class="best NSK-Black">{{ $key + 1 }}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="Section Section5 mt80">
            <div class="widthAuto">
                {{-- new product include --}}
                @include('willbes.pc.site.main_partial.new_product_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section5 mt60">
            <div class="widthAuto">
                {{-- exam info include --}}
                @include('willbes.pc.site.main_partial.exam_info_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div class="Section Section7 mt40">
            <div class="widthAuto">
                <ul class="NSK-Black">
                    <li><span class="NSK">WILLBES</span>학습자료실</li>
                    <li><a href="{{ front_url('/support/examQuestion/index') }}">#기출문제 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon01.png" title="기출문제"></a></li>
                    <li><a href="{{ front_url('/support/program/index') }}">#학습프로그램 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon02.png" title="학습프로그램"></a></li>
                    <li><a href="https://static.willbes.net/public/images/promotion/main/2018/2021년 윌비스임용가이드북.pdf" target="_blank">#임용가이드북 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon03.png" title="임용가이드북"></a></li>
                    <li><a href="{{ front_url('/support/mobile/index') }}">#모바일수강안내 <img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_icon04.png" title="모바일수강가이드"></a></li>
                </ul>
            </div>
        </div>

        <div class="Section mt40 mb40 c_both">
            <div class="widthAuto">
                <div class="CScenterBox">
                    <dl>
                        <dt class="willbesCenter">
                            <ul>
                                <li>
                                    <a href="{{ front_url('/pass/support/faq/index?s_faq=628') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon01.png"></span>
                                        <div class="nTxt">학원 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/support/faq/index?s_faq=626') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon02.png"></span>
                                        <div class="nTxt">동영상 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/support/faq/index?s_faq=627') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon03.png"></span>
                                        <div class="nTxt">모바일 FAQ</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/support/remote/index') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon04.png"></span>
                                        <div class="nTxt">동영상 원격지원</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/landing/show/lcode/1038/cate/3134/preview/Y') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon05.png"></span>
                                        <div class="nTxt">대학특강 문의</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ front_url('/landing/show/lcode/1039/cate/3134/preview/Y') }}">
                                        <span><img src="https://static.willbes.net/public/images/promotion/main/2018/2018_main_csicon06.png"></span>
                                        <div class="nTxt">교수채용</div>
                                    </a>
                                </li>
                            </ul>
                        </dt>
                        <dt class="willbesNumber NSK">
                            <ul>
                                <li>
                                    <div class="nTit">강의&동영상 문의</div>
                                    <div class="nNumber tx-color NSK-Black">1544-3169</div>
                                    <div class="nTxt NSK">
                                        [운영시간]<br/>
                                        09시 ~ 22시
                                    </div>
                                </li>
                                <li>
                                    <div class="nTit">교재배송문의</div>
                                    <div class="nNumber tx-color NSK-Black">1544-4944</div>
                                    <div class="nTxt NSK">
                                        [운영시간]<br/>
                                        평일: 09시~ 17시<br> (점심시간 12시 ~ 13시)
                                    </div>
                                </li>
                            </ul>
                        </dt>
                    </dl>
                </div>
            </div>
        </div>

        @include('willbes.pc.site.main_partial.map_' . $__cfg['SiteCode'])
    </div>
    <!-- End Container -->

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        //상단배너
        $(function(){
            var slidesImg = $(".MaintabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
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

            // HOT & NEW
            $(function() {
                var hnnImg1 = $(".HotnNew").bxSlider({
                    mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                    auto:true,
                    speed:350,
                    pause:4000,
                    pager:false,
                    controls:false,
                    minSlides:2,
                    maxSlides:2,
                    slideWidth: 260,
                    slideMargin:20,
                    autoHover: true,
                    moveSlides:2,
                });
                $("#HotnNewLeft").click(function (){
                    hnnImg1.goToNextSlide();
                });
                $("#HotnNewRight").click(function (){
                    hnnImg1.goToPrevSlide();
                });        
            });

            //적중배너
            var subslidesImg = $(".SubtabSlider").bxSlider({
                mode:'horizontal',
                touchEnabled: false,
                speed:400,
                pause:3000,
                sliderWidth:1120,
                auto : true,
                autoHover: true,
                pagerCustom: '#SubRollingDiv',
                controls:false,
                onSliderLoad: function(){
                    $("#SubRollingSlider").css("visibility", "visible").animate({opacity:1});
                }
            });
            $("#imgBannerLeft2").click(function (){
                subslidesImg.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                subslidesImg.goToNextSlide();
            });

            // 수강후기 마우스 오버
            // $('#SubRollingDiv .Subtab li').on('mouseover', function(){
            //     var _index = $('#SubRollingDiv .Subtab li').index(this);
            //     subslidesImg.stopAuto();
            //     subslidesImg.goToSlide(_index);
            // }).mouseleave(function (){
            //     subslidesImg.startAuto();
            // });
        });
    </script>
@stop