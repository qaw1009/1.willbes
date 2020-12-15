
{{-- 
<div class="QuickSlider">
    <div class="sliderNum">
        <div class="QuickDdayBox">
            <div class="q_tit">3차 필기시험</div>
            <div class="q_day">2018.12.12</div>
            <div class="q_dday NSK-Blac">D-5</div>
        </div>
        <div class="QuickDdayBox">
            <div class="q_tit">1차 공무원</div>
            <div class="q_day">2019.04.05</div>
            <div class="q_dday NSK-Blac">D-10</div>
        </div>
    </div>
</div>
--}}

<ul class="mb5">
    <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>
    <li><a href="{{ front_url('/support/notice/index') }}">공지사항</a></li>
    <li><a href="{{ front_url('/offinfo/boardInfo/index/80') }}">강의 시간표</a></li>
    <li><a href="{{ front_url('/offinfo/boardInfo/index/82') }}">강의실 배정표</a></li>    
    <li><a href="{{ front_url('/consult/visitConsult/index') }}">1:1 방문상담</a></li>
    <li><a href="{{ front_url('/consult/telConsult/index') }}">1:1 전화상담</a></li>
    <li><a href="{{ site_url('/lecture/index/cate/3001/pattern/free?course_idx=1077') }}" target="_blank">보강동영상</a></li>
</ul>
{!! banner_html(element('메인_우측퀵_01', $data['arr_main_banner'])) !!}
{!! banner_html(element('메인_우측퀵_02', $data['arr_main_banner'])) !!}