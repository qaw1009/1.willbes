{{--
<ul>
    @if(empty($data['dday']) === false)
        <li>
            <div class="QuickSlider">
                <div class="sliderNum">
                    @foreach($data['dday'] as $row)
                        <div class="QuickDdayBox">
                            <div class="q_tit">{{$row['DayTitle']}}</div>
                            <div class="q_day">{{$row['DayDatm']}}</div>
                            <div class="q_dday NSK-Black">{{($row['DDay'] == 0) ? 'D-'.$row['DDay'] : 'D'.$row['DDay']}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </li>
    @endif
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_02', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_우측퀵_03', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
</ul>
--}}
@if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '309002'))
    @if(empty(sess_data('mem_hanlimid')) == false)
<div>
    <a href="javascript:popupOpen('{{front_app_url('/classroom/home/gotoHanlim?site=2&param=nomu20200504', 'www')}}', 'mylec', 1100, 800, null, null, 'yes', 'no');">
        <img src="https://static.willbes.net/public/images/promotion/main/309002_sky03.png">
    </a>
</div>
    @endif
@endif
<div>
    <a href="{{ site_url('/lecture/index/cate/' . $__cfg['CateCode'] . '/pattern/free?search_order=course&course_idx=1220') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky01.jpg">
    </a>
</div>
<div class="mt5">
    <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky03.jpg" alt="동영상 1:1상담">
    </a>
</div>
<div class="mt5">
    <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky02.jpg" alt="학원 1:1상담">
    </a>
</div>
<div class="mt5">
    <a href="{{ site_url('/support/gosiNotice/index/cate/' . $__cfg['CateCode'] . '?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2000_sky04.jpg" alt="학원 공지사항">
    </a>
</div>
@if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '309004'))
<div class="mt5">
    <a href="{{ site_url('/support/notice/show/cate/' . $__cfg['CateCode'] . '?board_idx=262928') }}">
        <img src="https://static.willbes.net/public/images/promotion/main/2005_sky_200306.jpg" alt="불법공유">
    </a>
</div>
@endif
<ul>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/109?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의 계획서</a></li>
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/80?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의 시간표</a></li>
    @if(empty($__cfg['CateCode']) === false && ($__cfg['CateCode'] == '309002' || $__cfg['CateCode'] == '309003'))
        <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/82?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의실 배정표</a></li>
    @endif
    <li><a href="{{ site_url('/pass/offinfo/boardInfo/index/110?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">강의자료실</a></li>
</ul>