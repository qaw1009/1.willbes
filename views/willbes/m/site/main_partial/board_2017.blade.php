<ul class="tabWrap mainTab">
    <li><a href="#notice1" class="on">공지사항</a></li>
    <li><a href="#notice2">강의업데이트</a></li>
    <li><a href="#notice3">이벤트</a></li>
</ul>
<div class="tabBox buttonBox noticeBox">
    <div id="notice1" class="tabContent pd20">
        <div class="moreBtn"><a href="#none" onclick="location.href='{{front_url('/support/notice/index'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}';">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['notice'] as $row)
                    <li>
                        <a href="{{front_url('/support/notice/show'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : '').'?board_idx='.$row['BoardIdx'])}}">
                            @if($row['IsBest'] == 1)<span>HOT</span>@endif
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice2" class="tabContent pd20">
        <div class="moreBtn"><a href="#none" onclick="location.href='{{front_url('/updateLectureInfo'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}';">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['lecture_update_info']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['lecture_update_info'] as $row)
                    <li>
{{--                        <a href="{{front_url('/professor/show/cate/' . $row['CateCode'] . '/prof-idx/' . $row['ProfIdx'])}}">--}}
                        <a href="{{front_url('/lecture/show/cate/' . $row['CateCode'] . '/pattern/only/prod-code/' . $row['ProdCode'])}}">
                            <strong class="tx-blue">[{{ $row['SubjectName'] }} {{ $row['ProfNickName'] }}]</strong>
                            총 {{ $row['unit_cnt'] }}강 업로드 {{ date("m월 d일", strtotime($row['unit_regdate'])) }}
                            @if(date('Y-m-d') == $row['unit_regdate'])<img src="{{ img_url('cop/icon_new.png') }}" alt="new"/>@endif
                        </a>
{{--                        <span class="date">{{$row['unit_regdate']}}</span>--}}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice3" class="tabContent pd20">
        <div class="moreBtn"><a href="#none" onclick="location.href='{{front_url('/event/list/all'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}';">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['event']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['event'] as $row)
                    <li>
                        <a href="{{front_url('/event/show/ongoing_v2?event_idx='.$row['ElIdx'])}}">
                            [{{$row['RequestTypeName']}}] {{hpSubString($row['EventName'],0,20,'...')}}
                        </a>
{{--                        <span class="date">{{$row['RegisterStartDay']}}~{{$row['RegisterEndDay']}}</span>--}}
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>