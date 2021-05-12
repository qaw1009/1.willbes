@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <style>
        .law-bn01 {margin:20px auto 0;}
        .law-bn01 ul {margin-right:-15px}
        .law-bn01 li {display:inline; float:left; width:260px; margin-right:15px}
        .law-bn01 li:first-child {width:570px;}
        .law-bn01 li .slider {height:380px; overflow:hidden;}
        .law-bn01 li:last-child .slider {height:185px; overflow:hidden;}
        .law-bn01 ul:after {content: ""; display: block; clear:both}
        .law-bn01 .bSlider .bx-wrapper .bx-controls-direction a {width: 20px; height: 20px;}
        .law-bn01 .bSlider .bx-wrapper .bx-pager {
            width: auto; position: absolute; top: 10px; left:0; right: 10px; bottom: 0; font-size: 11px; font-weight: 300; color: #000; margin: 0; padding: 0; letter-spacing: 0;}
        .law .bSlider .bx-wrapper .bx-pager.bx-default-pager a {background: #d9d9d9;}
        .law .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .law .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
        .law .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {background: #353535 !important;}
        .law-bn02 {width:1120px; height:260px; overflow:hidden; margin:40px auto 0}
        .law .willbesNews {width:1120px; margin:40px auto 0}
        .law .willbesNews .noticeTabs {width:340px; margin:0; float:left; margin-right:50px}
        .law .willbesNews .noticeTabs:last-child {margin-right:0}
        .law .willbesNews .List-Table {padding:0; width:100% !important;}
        .law .Section3 {background:url("https://static.willbes.net/public/images/promotion/main/2003/3035_sec04_bg.jpg") no-repeat center top; margin-top:100px}
        .law .Section3 .tipGo {position: absolute; width: 994px; top:700px; left:50%; margin-left:-497px;}
        .law .Section3 .tipGo li {display: inline; float: left; width: 142px;}
        .law .Section3 .tipGo li a {
            display: block; text-align: center; color:#333; background: #f4f4f4; height: 26px; line-height: 26px; width: 90px; margin: 0 auto; border-radius:4px; font-weight:bold;}
        .law .Section3 .tipGo li a:hover {background: #000; color:#fff}
        .law .Section5 {background:url("https://static.willbes.net/public/images/promotion/main/2003/3035_sec05_bg.jpg") repeat-x left top;}
        .law .Section6 {background:#f7f7f7}
        .law .Section7 {}
        .law .will-nTit {border:0; font-size:46px; text-align:center}
        .law .will-nTit span {vertical-align:baseline}
        .law .will-sTit {font-size:28px; text-align:center; margin-bottom:20px}
        .law .Section8 {margin:40px 0}
        .law .will-acadTit {font-size: 19px; font-weight: 600; color: #363636; line-height: 60px; border-bottom:2px solid #000; margin-bottom:20px}
        .law .will-acadTit span {vertical-align: baseline;}
    </style>

    <div id="Container" class="Container law NGR c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="law-bn01">
            <div class="widthAuto">
                <ul>
                    <li class="bSlider">
                        {!! banner_html(element('메인_빅배너', $data['arr_main_banner']), 'slider') !!}
                    </li>
                    <li class="bSlider">
                        {!! banner_html(element('메인_중배너', $data['arr_main_banner']), 'slider') !!}
                    </li>
                    <li class="bSlider">
                        {!! banner_html(element('메인_소배너1', $data['arr_main_banner']), 'slider') !!}
                        <div class="mt10">
                            {!! banner_html(element('메인_소배너2', $data['arr_main_banner']), 'slider') !!}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="Section NSK">
            <div class="willbesNews">
                {{--@include('willbes.pc.site.main_partial.board_' . $__cfg['SiteCode'] . '_wide')--}}
                <div class="noticeTabs">
                    <div class="will-listTit">
                        공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add">
                            <img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                    </div>
                    <div class="tabBox noticeBox">
                        <ul class="List-Table">
                            @if(empty($data['notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                            @if($row['IsBest'] == '1')<span>EVENT</span>@endif {{$row['Title']}}
                                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        </a>
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="noticeTabs">
                    <div class="will-listTit">
                        시간표 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}?s_cate_code={{$__cfg['CateCode']}}&s_keyword=시간표" class="f_right btn-add">
                            <img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기">
                        </a>
                    </div>
                    <div class="tabBox noticeBox">
                        <ul class="List-Table">
                            @if(empty($data['timetable_notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['timetable_notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}&s_cate_code={{$__cfg['CateCode']}}&s_keyword=시간표">
                                            @if($row['IsBest'] == '1')<span>EVENT</span>@endif {{$row['Title']}}
                                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        </a>
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="noticeTabs">
                    <div class="will-listTit">
                        합격수기 <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                    </div>
                    <div class="tx-center">
                        <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank"><img src="https://static.willbes.net/public/images/promotion/main/2003/3035_340x210.jpg" alt="배너명"></a>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($data['arr_main_banner']['메인_중간띠배너']) === true)
            <div class="law-bn02">
                <div class="bSlider">
                    {!! banner_html(element('메인_중간띠배너', $data['arr_main_banner']), 'slider') !!}
                </div>
            </div>
        @endif
        <div class="Section3 NSK">
            <div class="widthAuto p_re">
                <div><img src="https://static.willbes.net/public/images/promotion/main/2003/3035_sec04.gif" alt="김동진 법원팀의 학습 Tip"></div>
                <ul class="tipGo">
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1379" target="_blank">맛보기 강의</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1409" target="_blank">맛보기 강의</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1410" target="_blank">맛보기 강의</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1411" target="_blank">맛보기 강의</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1412" target="_blank">맛보기 강의</a></li>
                    <li><a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&course_idx=1413" target="_blank">맛보기 강의</a></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div class="Section6">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_sec06.jpg" alt="김동진 법원팀의 학습 Tip">
            </div>
        </div>
        <div class="Section5">
            <div class="widthAuto">
                <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_sec05.jpg" alt="김동진 법원팀의 학습 Tip">
            </div>
        </div>
        <div class="Section7">
            <div class="widthAuto">
                <ul class="ProfBoxB">
                    @for($i=1; $i<=8; $i++)
                        @if(isset($data['arr_main_banner']['메인_교수진'.$i]) === true)
                            <li>
                                {!! banner_html($data['arr_main_banner']['메인_교수진'.$i]) !!}
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>
        <div class="Section Section8">
            <div class="widthAuto">
                <div class="will-acadTit">윌비스 한림법학원 <span class="tx-color">김동진 법원팀</span></div>
                <div class="noticeTabs campus c_both">
                    <div class="tabBox noticeBox_campus">
                        <div id="campus1" class="tabContent">
                            <div class="map_img" id="map">지도영역</div>
                            <div class="map_img" id="alterMap1" style="display: none">
                                <img src="https://static.willbes.net/public/images/promotion/main/2003/3035_map.jpg" alt="김동진 법원팀">
                            </div>
                            <div class="campus_info">
                                <dl>
                                    <dt>
                                        <div class="c-tit"><span class="tx-color">학원</span> 오시는 길</div>
                                        <div class="c-info">
                                            <div class="address">
                                                <span class="a-tit">주소</span>
                                                <span>
                                                서울시 동작구 노량진로 196 노량빌딩 7층
                                            </span>
                                            </div>
                                            <div class="tel">
                                                <span class="a-tit">연락처</span>
                                                <span class="tx-color">1544-0330 > 2번</span>
                                            </div>
                                        </div>
                                    </dt>
                                </dl>
                            </div>
                        </div>
                        <!-- 노량진 //-->
                    </div>
                </div>
            </div>
        </div>
        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>
        <!-- CS센터 //-->
    </div>
    <!-- End Container -->
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    {{--<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ config_item('kakao_js_app_key') }}&libraries=services"></script>--}}
    <script type="text/javascript" src="/public/js/map_util.js?ver={{time()}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).ready(function() {
                var info_txt = '<div style="padding:5px; 5px; background:#fff; border: 1px solid midnightblue">윌비스 한림법학원<br><strong class="tx-color">김동진법원팀(7~9층)</strong></div>';
                kakaoMap('map', 'alterMap1', '4', '서울 동작구 노량진로 196', info_txt, '0.5', '2.7');
            });

            $('.PBtab').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                })
            });
        });
    </script>
@stop