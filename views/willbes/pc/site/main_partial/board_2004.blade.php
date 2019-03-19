<ul class="tabWrap noticeWrap_acad three">
    <li><a href="#notice1" class="on">시험공고</a></li>
    <li><a href="#notice2" class="">수험뉴스</a></li>
</ul>
<div class="tabBox noticeBox_acad">
    <div id="notice1" class="tabContent p_re">
        <a href="{{front_url('/support/examAnnouncement/index')}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
        <ul class="List-Table">
            @if(empty($data['exam_announcement']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['exam_announcement'] as $row)
                    <li>
                        <a href="{{front_url('/support/examAnnouncement/show?board_idx='.$row['BoardIdx'])}}">
                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                            {{$row['AreaCcd_Name']}} | {{$row['Title']}}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice2" class="tabContent p_re">
        <a href="{{front_url('/support/examNews/index')}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
        <ul class="List-Table">
            @if(empty($data['exam_news']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['exam_news'] as $row)
                    <li>
                        <a href="{{front_url('/support/examNews/show?board_idx='.$row['BoardIdx'])}}">
                            @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>