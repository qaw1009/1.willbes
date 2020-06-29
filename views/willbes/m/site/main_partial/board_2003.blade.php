<ul class="tabWrap mainTab">
    <li><a href="#notice1" class="on">학원<br>공지사항</a></li>
    <li><a href="#notice2">동영상<br>공지사항</a></li>
    <li><a href="#notice3">신규<br>강의안내</a></li>
</ul>
<div class="tabBox buttonBox noticeBox">
    <div id="notice1" class="tabContent pd20">
        <div class="moreBtn"><a href="{{front_url('/pass/support/notice/index?s_cate_code=3059')}}">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['off_notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['off_notice'] as $row)
                    <li>
                        <a href="{{front_url('/pass/support/notice/show?board_idx='.$row['BoardIdx'].'&s_cate_code=3059')}}">
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
        <div class="moreBtn"><a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode'].'?s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y')}}">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['notice']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['notice'] as $row)
                    <li>
                        <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'].'&s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y')}}">
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
        <div class="moreBtn"><a href="{{front_url('/pass/offinfo/boardInfo/index/78?s_cate_code=3059')}}">+ 더보기</a></div>
        <ul class="List-Table">
            @if(empty($data['board_lecture_infomation']) === true)
                <li><span>등록된 내용이 없습니다.</span></li>
            @else
                @foreach($data['board_lecture_infomation'] as $row)
                    <li>
                        <a href="{{front_url('/pass/offinfo/boardInfo/show/78?board_idx='.$row['BoardIdx']).'&s_cate_code=3059'}}">
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