<ul>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_퀵배너1', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <ul class="mb5 gobtn">
        <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>  
        <li><a href="{{ front_url('/support/notice/index') }}">공지사항</a></li>      
        <li><a href="{{ front_url('/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
        <li><a href="{{ front_url('/offinfo/boardInfo/index/82') }}">강의실 배정표</a></li>
        <li><a href="https://pass.willbes.net/pass/consult/visitConsult/index?s_campus=605005">1:1방문상담</a></li>
        <li><a href="{{ front_url('/lecture/index/?search_order=course&course_idx=1481') }}">보강동영상</a></li>
    </ul>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_퀵배너2', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_퀵배너3', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_퀵배너4', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
</ul>