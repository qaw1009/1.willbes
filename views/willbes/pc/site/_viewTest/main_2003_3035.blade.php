@extends('willbes.pc.layouts.master')
@section('content')
    <link href="/public/css/willbes/style_gosi_law.css?ver={{time()}}" rel="stylesheet">
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
                        공지사항 <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}?s_cate_code={{$__cfg['CateCode']}}" class="f_right btn-add">
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

        {{--학원 오시는 길--}}
        @include('willbes.pc.site._viewTest.main_partial.map_2003')

        <div class="Section NSK mt70 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            {{-- quick menu --}}
            @include('willbes.pc.site.main_partial.quick_menu_' . $__cfg['SiteCode'])
        </div>
    </div>
    {!! popup('657001', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
@stop