<ul>
    <li>
        <div class="QuickSlider">
            {!! banner_html(element('메인_퀵배너1', $data['arr_main_banner']), 'sliderNum') !!}
        </div>
    </li>
    <ul class="mb5 gobtn">
        <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>
        <li><a href="{{ front_url('/offinfo/gallery/index') }}">학원 갤러리</a></li>
        <li><a href="{{ front_url('/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
        <li><a href="{{ front_url('/offinfo/boardInfo/index/89') }}">모의고사</a></li>
        <li><a href="https://pf.kakao.com/_xapHUxb" target="_blank">실시간 소통실</a></li>
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
</ul>