<ul class="tabWrap mainTab">
    <li><a href="#notice1" class="on">{{ $__cfg['IsPassSite'] === true ? '학원' : '' }}공지사항</a></li>
    <li><a href="#notice2">{{ SUB_DOMAIN == 'work' ? '채용공고' : '시험공고' }}</a></li>
    <li><a href="#notice3">수험뉴스</a></li>
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
        <div class="moreBtn"><a href="#none" onclick="location.href='{{front_url('/support/examAnnouncement/index'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}';">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['exam_announcement']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['exam_announcement'] as $row)
                    <li>
                        <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'], false, true)}}">
                            @if($row['IsBest'] == 1)<span>HOT</span>@endif
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div id="notice3" class="tabContent pd20">
        <div class="moreBtn"><a href="#none" onclick="location.href='{{front_url('/support/examNews/index'.(empty($__cfg['CateCode']) === false ? '/cate/'.$__cfg['CateCode'] : ''))}}';">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['exam_news']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['exam_news'] as $row)
                    <li>
                        <a href="{{front_url($row['PassRoute'] . '/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'], false, true)}}">
                            @if($row['IsBest'] == 1)<span>HOT</span>@endif
                            {{$row['Title']}}
                        </a>
                        <span class="date">{{$row['RegDatm']}}</span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</div>