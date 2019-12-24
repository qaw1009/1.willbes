<div class="noticeTabs">
    <div class="will-listTit">공지사항</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['notice']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['notice'] as $row)
                        <li>
                            <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                {{$row['Title']}}
                            </a>
                            <span class="date">{{$row['RegDatm']}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="noticeTabs">
    <div class="will-listTit">채용공고</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/examAnnouncement/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['exam_announcement']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['exam_announcement'] as $row)
                        <li>
                            <a href="{{front_url('/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                {{$row['Title']}}
                            </a>
                            <span class="date">{{$row['RegDatm']}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="noticeTabs mr-zero">
    <div class="will-listTit">수험뉴스</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/examNews/index/cate/'.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['exam_news']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['exam_news'] as $row)
                        <li>
                            <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'])}}">
                                {{$row['Title']}}
                            </a>
                            <span class="date">{{$row['RegDatm']}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>