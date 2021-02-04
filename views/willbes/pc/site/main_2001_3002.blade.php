@extends('willbes.pc.layouts.master')
<style type="text/css">
    /*Main Container : 상단 배너*/
    .adm .MainVisual {
        width: 100%;
        min-width: 1120px;
        max-width: 2000px;
        height: 440px;
        overflow: hidden;
        position: relative;
        margin:0 auto;
        text-align: center;
    }

    .adm .MaintabBox {
        position: absolute;
        top:0;
        left:50%;
        margin-left:-1000px;
        width: 2000px;
        min-width: 1120px;
        max-width: 2000px;
        height: 440px;
        overflow: hidden;
    }
    .adm .MaintabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer;
        background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
    .adm .MaintabBox p a {display:none;}
    .adm .MaintabBox p.leftBtn {margin-left:-620px;}
    .adm .MaintabBox p.rightBtn {margin-left:588px; background-position: right center;}
    .adm .MaintabBox p:hover {opacity:100; filter:alpha(opacity=100);}

    .adm .MaintabList {
        position: absolute;
        top:390px;
        width:100%;
        height: 50px;
        z-index: 99;
        background-color: rgba(0,0,0,0.5);
    }
    .adm .VisualBox .Maintab {width: 100%; margin:0 auto; text-align:center}
    .adm .VisualBox .Maintab span {
        display: inline-block;
        height: 50px;
        font-size: 15px;
        line-height: 50px;
        width: 200px;
        color:#fff
    }
    .adm .VisualBox .Maintab span a.active,
    .adm .VisualBox .Maintab span a:hover {color:#f9dd74; font-weight:600}
    .adm .VisualBox .Maintab:after {content:""; display:block; clear:both}
    .adm .VisualBox .MaintabList.three span {
        width: 209px;
    }
    .adm .VisualBox .MaintabList.four span {
        width: 156px;
    }
    .adm .VisualBox .MaintabList.five span {
        width: 188px;
    }
    .adm .VisualBox .MaintabList span a {
        display: block;
        width: 100%;
        height: 100%;
    }
    .adm .VisualBox .MaintabSlider li img {
        width: 100%;
        height: 100%;
    }
    .adm .VisualBox .Maintab li a:hover,
    .adm .VisualBox .Maintab li a.active { color:#fff;  font-weight: bold; background:rgba(0,0,0,0.5);}

    /*Main Container : 배너 4칸*/
    .adm .SecBanner02 {
        width:265px;
        height:350px;
        margin-right:20px;
        display: inline;
        float: left;
    }
    .adm .SecBanner02:last-child {margin:0}
    .adm .SecBanner02 .tag {height:30px; line-height: 30px; font-size: 15px;}
    .adm .SecBanner02 .slider {width: 265px; height: 320px; overflow: hidden;}
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a {
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .SecBanner02 .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }

    /*Main Container : 최근 업로드 강의*/
    .adm .will-nTit {font-size:35px !important; border:0 !important; }
    .adm .uploadLec {
        box-shadow:0 10px 25px rgba(0,0,0,.2);
        border-radius:10px;
        padding:20px;
    }
    .adm .uploadLec .vSlider {position:relative; width:100%; height:74px;}
    .adm .uploadLec .vSlider:after {content:''; display: block; clear:both}
    .adm .uploadLec .vSlider .sliderNumV {
        height:74px;
        overflow: hidden;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:after {content:''; display: block; clear:both}
    .adm .uploadLec .vSlider .sliderNumV .lecReview {
        float:left;
        display: inline;
        width:50%;
        height:74px;
        line-height: 1.3;
    }
    .adm .uploadLec .vSlider .sliderNumV .lecReview a {display:block;}
    .adm .uploadLec .vSlider .sliderNumV .lecReview a:after {content:''; display: block; clear:both}
    .adm .uploadLec .imgBox {
        position:relative;
        float: left;
        width: 74px;
        height: 74px;
        border-radius:6px;
        overflow:hidden
    }
    .adm .uploadLec .imgBox img {
        position: absolute; left:50%; top:50%; width:100%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%) scale(1);
        transition: all ease-in-out .2s;
    }
    .adm .uploadLec .vSlider .sliderNumV .lecReview a:hover img {
        -ms-transform: translate(-50%, -50%) scale(1.1);
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(1n) .lecReview:nth-child(1n) .imgBox {
        background:#34b696;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(1n) .lecReview:nth-child(2n) .imgBox {
        background:#e583b9;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(2n) .lecReview:nth-child(1n) .imgBox {
        background:#3490b6;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(2n) .lecReview:nth-child(2n) .imgBox {
        background:#b1b634;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(3n) .lecReview:nth-child(1n) .imgBox {
        background:#b67734;
    }
    .adm .uploadLec .vSlider .sliderNumV > div:nth-child(3n) .lecReview:nth-child(2n) .imgBox {
        background:#d3b9ef;
    }
    .adm .uploadLec .lecinfo {float:left; margin-left:10px}
    .adm .uploadLec .lecinfo p {margin-bottom: 5px; color:#848484; font-size:15px}
    .adm .uploadLec .lecinfo p:nth-child(2) {color:#363636; font-size:16px; font-weight:600; margin-bottom: 10px;}
    .adm .uploadLec .lecinfo p:nth-child(3) {color:#0c5dc0; font-size:12px}
    .adm .uploadLec .bx-wrapper .bx-controls-direction {
        position: absolute;
        top: 0;
        right: 10px;
        width: 40px;
        height: 20px;
    }
    .adm .uploadLec .bx-wrapper .bx-controls-direction a {
        width: 20px;
        height: 20px;
    }
    .adm .uploadLec .bx-wrapper .bx-pager {
        float: none;
        width: 100%;
        right: 8px;
        bottom: -50px;
        text-align: center;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a {
        width: 12px;
        height: 12px;
        margin: 0 2px;
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }
    .adm .uploadLec .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 40px;
    }

    /*개편 과목 전문교수진*/
    .adm .SecBanner03 {
        margin-right:-5px;
    }
    .adm .SecBanner03 li {
        display:inline; float:left;  margin-right:5px;
    }
    .adm .SecBanner03:after {content:''; display: block; clear:both}

    /*개편 과목 전문교수진*/
    .adm .SecBanner04 .bSlider .slider {
        height: 100px;
        overflow:hidden;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager {
        float: none;
        width: 100%;
        right: 8px;
        bottom: -30px;
        text-align: center;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 12px;
        height: 12px;
        margin: 0 2px;
        background: #fff;
        border:1px solid #b9b9b9;
        border-radius:10px;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a.active,
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #000;
        border:1px solid #000;
    }
    .adm .SecBanner04 .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 40px;
    }

    /*전문교수진 */
    .adm .SectionBg01 {background:#fbfbfd; padding:100px 0 80px}
    .adm .SecBanner05 {margin-right:-20px; margin-top:20px}
    .adm .SecBanner05 li {display:inline; float:left; margin:0 20px 20px 0;}
    .adm .SecBanner05:after {content:''; display: block; clear:both}

    .adm .SectionBg02 {background:#f8f0dd; padding:100px 0}
    .adm .SectionBg02 .will-nTit {color:#000}
    .adm .SecBanner06 {margin-right:-20px; margin-top:20px}
    .adm .SecBanner06 li {display:inline; float:left; margin:0 20px 20px 0;}
    .adm .SecBanner06:after {content:''; display: block; clear:both}
    .adm .tabTv {margin-top:40px}
    .adm .tabTv .tabTvBtns {float:left; width:285px}
    .adm .tabTv .tabTvBtns li a {display:block; margin:0 0 18px}
    .adm .tabTv .tabTvBtns li a span {padding-bottom:3px; border-bottom:2px solid #f8f0dd; color:#c0b381; font-size:22px;}
    .adm .tabTv .tabTvBtns li a:hover span,
    .adm .tabTv .tabTvBtns li a.on span {color:#000; border-bottom:2px solid #000}
    .adm .tabTv .moreBtn {margin-top:40px}
    .adm .tabTv .moreBtn a {display:inline-block; color:#fff; background:#000; border-radius:30px; height:24px; line-height:24px; padding:0 20px}
    .adm .tabTv .TvctsBox:after {content:''; display: block; clear:both}
    .adm .tabTv .Tvcts {width:265px; display:inline-block; float:left; margin-right:20px}
    .adm .tabTv .Tvcts:last-child {margin:0}
    .adm .tabTv .TVcts p {text-align:center; margin-top:10px; font-size:15px; color:#000}

    .adm .SecBanner07 ul {margin-right:-20px}
    .adm .SecBanner07 li {display:inline; float:left; width:265px; margin-right:20px}
    .adm .SecBanner07 li a {display:block}
    .adm .SecBanner07 li:last-child a:last-child {margin-top:-1px}

    /*교재*/
    .adm .SectionBg03 {background:#f3f0ed; padding:100px 0}
    .adm .bookContent {position:relative; width:1120px; margin:50px auto;}
    .adm .bookList:after {content:""; display:block; clear:both}
    .adm .bookList li {display:inline; float:left; width:186px; height:300px; text-align:center; margin-bottom:30px; padding-bottom:10px;
        word-break: keep-all; color:#43484f;}
    .adm .bookList span {background: url(https://static.willbes.net/public/images/promotion/main/2001/book_cover.png) no-repeat center top;
        width:167; height:196px; position: absolute; left:10px; top:0; z-index:10}
    .adm .bookList .bookImg {position:relative;  width:142px; margin:0 auto; min-height:196px; overflow: hidden;}

    .adm .bookList li img {
        position: absolute; left:50%; top:50%; max-width:150px;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%) scale(1);
        transition: all ease-in-out .2s;
    }
    .adm .bookList li:hover img {
        -ms-transform: translate(-50%, -50%) scale(1.1);
        -webkit-transform: translate(-50%, -50%) scale(1.1);
        transform: translate(-50%, -50%) scale(1.1);
    }
    .adm .bookList p {width:90%; margin:auto;}
    .adm .bookList p:nth-of-type(1) {font-weight:bold; line-height: 1.2; font-size:17px; margin-top:10px}
    .adm .bookList p:nth-of-type(2) {font-size:13px; color:#363636; margin-top:10px}

    .adm .bookContent > p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:57px; cursor:pointer;
        background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;}
    .adm .bookContent > p a {display:none;}
    .adm .bookContent > p.leftBtn {margin-left:-600px;}
    .adm .bookContent > p.rightBtn {margin-left:600px; background-position: right center;}
    .adm .willbes-Layer-Box {left:50%; top:4520px !important; margin-left:-490px !important; z-index: 110;}
</style>
@section('content')
    <!-- Container -->
    <div id="Container" class="Container adm NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Section MainVisual mt20">
            <div class="VisualBox p_re">
                <div id="MainRollingSlider" class="MaintabBox">
                    {!! banner_html($data['arr_main_banner']['메인_빅배너'], 'MaintabSlider') !!}
                    <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                    <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p>
                </div>
                <div id="MainRollingDiv" class="MaintabList NSK">
                    <div class="Maintab">
                        @foreach($data['arr_main_banner']['메인_빅배너'] as $row)
                            <span><a data-slide-index="{{ $loop->index -1 }}" href="javascript:void(0);" class="{{ ($loop->first === true) ? 'active' : '' }}">{{ $row['BannerName'] }}</a></span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="Section mt100">
            <div class="widthAuto NSK">
                <ul>
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_상품배너'.$i]) === true)
                            <li class="SecBanner02">
                                <div class="tag">{{ $data['arr_main_banner']['메인_상품배너'.$i][0]['BannerName'] or "" }}</div>
                                {!! banner_html(element('메인_상품배너'.$i, $data['arr_main_banner'])) !!}
                            </li>
                        @endif
                    @endfor
                    <li class="SecBanner02">
                        <div class="bSlider">
                            <div class="slider">
                                @if(isset($data['arr_main_banner']['메인_상품배너4']) === true)
                                    @foreach($data['arr_main_banner']['메인_상품배너4'] as $row)
                                        <div>
                                            <div class="tag">{{ $row['BannerName'] }}</div>
                                            <a href="{{ empty($row['LinkUrl']) === false ? $row['LinkUrl'] : '#none' }}" target="_{{ $row['LinkType'] }}">
                                                <img src="{{ $row['BannerFullPath'] . $row['BannerImgName'] }}" title="{{ $row['BannerName'] }}">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </li>
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

        <div class="Section mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    개편 과목 <span class="cop-color">전문 교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">2022년 경찰 합격을 위한 선택! 과목개편 대비 강좌을 경험해보세요.</span>
                </div>
                <ul class="SecBanner03">
                    @for($i=1; $i<=3; $i++)
                        @if(isset($data['arr_main_banner']['메인_전문교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_전문교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        @if(isset($data['arr_main_banner']['메인_중간띠배너']) === true)
            <div class="Section mt70">
                <div class="widthAuto SecBanner04">
                    {!! banner_html($data['arr_main_banner']['메인_중간띠배너'], 'slider') !!}
                </div>
            </div>
        @endif

        <div class="Section SectionBg01 mt100">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">
                    전문 <span class="cop-color">교수진</span>
                    <span class="tx16 NSK-Thin pt10 ml20">최고의 교수진으로 수험생의 합격을 돕겠습니다.</span>
                </div>
                <ul class="SecBanner05">
                    @for($i=1; $i<=8; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                            <li>
                                {!! banner_html(element('메인_교수진'.$i, $data['arr_main_banner'])) !!}
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
                <div class="will-nTit NSK-Black mt100">
                    신광은경찰팀 TV
                </div>
                <div class="tabTv">
                    <div class="tabTvBtns">
                        <ul class="NSK-Black">
                            <li><a href="#tabTv01" class="on"><span>커리큘럼 & 공부방법</span></a></li>
                            <li><a href="#tabTv02"><span>신광은경찰팀 특강</span></a></li>
                            <li><a href="#tabTv03"><span>합격생 영상</span></a></li>
                        </ul>
                        <div class="moreBtn"><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank">영상 더보기 ></a></div>
                    </div>
                    <div id="tabTv01" class="TvctsBox">
                        @for($i=1; $i<=3; $i++)
                            @if(isset($data['arr_main_banner']['메인_cast'.$i]) === true)
                                <div class="Tvcts">
                                    {!! banner_html(element('메인_cast'.$i, $data['arr_main_banner'])) !!}
                                    <p>{{ $data['arr_main_banner']['메인_cast'.$i][0]['BannerName'] or "" }}</p>
                                </div>
                            @endif
                        @endfor
                    </div>
                    <div id="tabTv02" class="TvctsBox">
                        @for($i=4; $i<=6; $i++)
                            @if(isset($data['arr_main_banner']['메인_cast'.$i]) === true)
                                <div class="Tvcts">
                                    {!! banner_html(element('메인_cast'.$i, $data['arr_main_banner'])) !!}
                                    <p>{{ $data['arr_main_banner']['메인_cast'.$i][0]['BannerName'] or "" }}</p>
                                </div>
                            @endif
                        @endfor
                    </div>
                    <div id="tabTv03" class="TvctsBox">
                        @for($i=7; $i<=9; $i++)
                            @if(isset($data['arr_main_banner']['메인_cast'.$i]) === true)
                                <div class="Tvcts">
                                    {!! banner_html(element('메인_cast'.$i, $data['arr_main_banner'])) !!}
                                    <p>{{ $data['arr_main_banner']['메인_cast'.$i][0]['BannerName'] or "" }}</p>
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
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

        <div class="Section Section7 mt50 mb50">
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

    @if (date('YmdHi') <= '202009191159')
        {{--//유튜브 모달팝업--}}
        <style type="text/css">
            #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
        </style>
        <div id="Popup200916" class="PopupWrap modal willbes-Layer-popBox" style="display: none;">
            <div class="Layer-Cont" id="youtube_box">
                <iframe width="850" height="482" src="https://www.youtube.com/embed/_t7QIFe_Rh0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <ul class="btnWrapbt popbtn mt10">
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="1">하루 보지않기</a></li>
                <li class="subBtn black"><a href="#none" class="btn-popup-close" data-popup-idx="860" data-popup-hide-days="">Close</a></li>
            </ul>
        </div>
        <div id="PopupBackWrap" class="willbes-Layer-Black"></div>
        {{--유튜브 모달팝업//--}}
    @endif

    <script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //하단이벤트배너 닫기
            $('.mainBottomBn .btmEvClose').click(function(){
                $('.mainBottomBn').hide();
            });
        });

        //유튜브 모달팝업 close 버튼 클릭
        var youtube_html;
        $(document).ready(function() {
            $('.PopupWrap').on('click', '.btn-popup-close', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');

                var popup_idx = $(this).data('popup-idx');
                var hide_days = $(this).data('popup-hide-days');

                // 팝업 close
                $(this).parents('.PopupWrap').fadeOut();

                //하루 보지않기
                if (hide_days !== '') {
                    var domains = location.hostname.split('.');
                    var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

                    $.cookie('_wb_client_popup_' + popup_idx, 'done', {
                        domain: domain,
                        path: '/',
                        expires: hide_days
                    });
                }

                // 모달팝업창이 닫힐 경우 백그라운드 레이어 숨김 처리
                if ($(this).parents('.PopupWrap').hasClass('modal') === true) {
                    $('#PopupBackWrap').fadeOut();
                }
            });

            // 백그라운드 클릭 --}}
            $('#PopupBackWrap.willbes-Layer-Black').on('click', function() {
                youtube_html = $('#youtube_box');
                $('#youtube_box').html('');
                $('.PopupWrap.modal').fadeOut();
                $(this).fadeOut();
            });

            // 팝업 오늘하루안보기 하드코딩
            if($.cookie('_wb_client_popup_860') !== 'done') {
                $('#Popup').show();
                $('.PopupWrap').fadeIn();
                $('#PopupBackWrap').fadeIn();
            }
        });
    </script>

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

        //교재
        $(function() {
            var slidesImg1 = $(".bookList").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:6,
                maxSlides:6,
                slideWidth: 186,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:true,
                touchEnabled: false,
            });
            $("#imgBannerLeft3").click(function (){
                slidesImg1.goToNextSlide();
            });
            $("#imgBannerRight3").click(function (){
                slidesImg1.goToPrevSlide();
            });
        });
    </script>

    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop
