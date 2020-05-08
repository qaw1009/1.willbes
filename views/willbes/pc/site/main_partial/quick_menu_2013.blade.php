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
        <a href="{{ site_url('/pass/board/qna/index')}}">
            <img src="https://static.willbes.net/public/images/promotion/main/2000_sky02.jpg" alt="학원 1:1상담">
        </a>
    </li>
    <li>
        <a href="{{ site_url('/pass/support/notice/index/cate/') }}">
            <img src="https://static.willbes.net/public/images/promotion/main/2000_sky04.jpg" alt="학원 공지사항">
        </a>
    </li>
</ul>