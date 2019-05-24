<ul class="mb5">
    <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>
    <li><a href="{{ front_url('/support/notice/index') }}">공지사항</a></li>
    <li><a href="{{ front_url('/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
    <li><a href="{{ front_url('/offinfo/boardInfo/index/82') }}">강의실 배정표</a></li>
    {{--<li><a href="#map_campus">학원 오시는 길</a></li>--}}
    <li><a href="{{ front_url('/consultManagement/index') }}">1:1 방문상담</a></li>
    <li><a href="{{ front_url('/offinfo/gallery/index') }}">학원 갤러리</a></li>
    <li><a href="{{ site_url('/lecture/index/cate/3001/pattern/free?course_idx=1077') }}" target="_blank">보강동영상</a></li>
</ul>
{{--{!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner'])) !!}--}}
<li>
    <div class="QuickSlider">
        {!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner'])) !!}
    </div>
</li>
<li>
    <div class="QuickSlider">
        {!! banner_html(element('메인_우측퀵_02', $data['arr_main_banner'])) !!}
    </div>
</li>