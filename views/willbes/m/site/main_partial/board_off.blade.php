<ul class="tabWrap buttonWrap noticeWrap three">
    <li><a href="#notice1" class="on">학원 공지사항</a></li>
    <li><a href="#notice2">동영상 공지사항</a></li>
    <li><a href="#notice3">수험정보</a></li>
</ul>
<div class="tabBox buttonBox noticeBox">
    <div id="notice1" class="tabContent">
        <ul class="List-Table">
            @if(empty($data['off_notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['off_notice'] as $row)
                    <li>
                        <a href="{{front_url('/support/gosiNotice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                            {{-- <span>EVENT</span> --}}
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice2" class="tabContent" style="display: none;">
        <ul class="List-Table">
            @if(empty($data['notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['notice'] as $row)
                    <li>
                        <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                            {{-- <span>EVENT</span> --}}
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice3" class="tabContent" style="display: none;">
        <ul class="List-Table">
            @if(empty($data['exam_news']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['exam_news'] as $row)
                    <li>
                        <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                            {{-- <span>EVENT</span> --}}
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>