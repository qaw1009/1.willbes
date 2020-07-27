<ul class="gobtn">
    <li><a href="{{ front_url('/offinfo/boardInfo/index/78') }}">이달의 개강안내</a></li>
    <li><a href="{{ front_url('/OffVisitLecture') }}">학원 실강 접수</a></li>
    <li><a href="{{ front_url('/offinfo/boardInfo/index/82') }}">강의실 배정표</a></li>
    <li><a href="{{ front_url('/support/notice/index') }}">공지사항</a></li>
    <li><a href="{{ front_url('/consultManagement/index') }}">1:1 방문상담</a></li>
    <li><a href="{{ front_url('/mockTestNew/apply/cate') }}">전국모의고사 신청</a></li>
    <li><a href="{{ front_url('/event/list/ongoing') }}">진행 중 이벤트</a></li>
</ul>
<ul>
    @if(empty($data['dday']) === false)
        <li class="dday">
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