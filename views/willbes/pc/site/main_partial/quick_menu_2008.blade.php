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
        <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode']) }}">
            <img src="https://static.willbes.net/public/images/promotion/main/2000_sky03.jpg" alt="동영상 1:1상담">
        </a>
    </li>
    <li>
        <a href="{{ site_url('/support/notice/index/cate/' . $__cfg['CateCode']) }}">
            <img src="https://static.willbes.net/public/images/promotion/main/2000_sky04.jpg" alt="학원 공지사항">
        </a>
    </li>
</ul>