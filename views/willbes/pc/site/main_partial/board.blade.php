<div class="nNoticeBox three mt50">
    <div class="noticeList widthAuto350 f_left">
        <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
        <ul class="List-Table">
            @if(empty($arr_base['board']['notice']['data'] ) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($arr_base['board']['notice']['data'] as $row)
                    <li>
                        <a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                            <span>{{$row['Title']}}</span>
                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="noticeList widthAuto350 f_left ml35">
        <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
        <ul class="List-Table">
            @if(empty($arr_base['board']['exam_announcement']['data'] ) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($arr_base['board']['exam_announcement']['data'] as $row)
                    <li>
                        <a href="{{front_url('/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                            <span>{{$row['Title']}}</span>
                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="noticeList widthAuto350 f_left ml35">
        <div class="will-nlistTit p_re">수험뉴스 <a href="{{front_url('/support/examNews/index/cate/'.$__cfg['CateCode'])}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
        <ul class="List-Table">
            @if(empty($arr_base['board']['exam_news']['data'] ) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($arr_base['board']['exam_news']['data'] as $row)
                    <li>
                        <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                            <span>{{$row['Title']}}</span>
                            @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>