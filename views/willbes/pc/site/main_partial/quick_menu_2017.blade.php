@if(empty($data['dday']) === false)
    <ul>
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
    </ul>
@endif
<ul class="gobtn">
    <li><a href="{{ front_url('/pass/board/schedule') }}">강의실배정표</a></li>
    <li><a href="{{ front_url('/support/mobile/index') }}">모바일 수강안내</a></li>
    <li><a href="{{ front_url('/support/qna/index') }}">1:1 상담</a></li>
    <li><a href="{{ front_url('/event/list/ongoing') }}">이벤트</a></li>
    <li><a href="{{ front_url('/landing/show/lcode/1040/cate/3134/preview/Y') }}">재학생 러닝메이트</a></li>
    <li><a href="#">TOP ▲</a></li>
</ul>