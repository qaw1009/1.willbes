<ul class="tabWrap mainTab">
    <li><a href="#notice1" class="on">학원 공지사항</a></li>
    <li><a href="#notice2">동영상 공지사항</a></li>
    <li><a href="#notice3">강의계획서</a></li>
</ul>
<div class="tabBox buttonBox noticeBox">
    <div id="notice1" class="tabContent pd20">
        <div class="moreBtn"><a href="{{front_url('/support/gosiNotice/index')}}">+ 더보기</a></div>
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
    <div id="notice2" class="tabContent pd20">
        <div class="moreBtn"><a href="{{front_url('/support/notice/index')}}">+ 더보기</a></div>
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
    <div id="notice3" class="tabContent pd20">
        <div class="moreBtn"><a href="{{front_url('/pass/offinfo/boardInfo/index/109').'?on_off_link_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y'}}">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['board_lecture_plan']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['board_lecture_plan'] as $row)
                    <li>
                        <a href="{{front_url('/pass/offinfo/boardInfo/show/109?board_idx='.$row['BoardIdx']).'&on_off_link_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y'}}">
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