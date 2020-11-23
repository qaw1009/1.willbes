<div class="noticeTabs">
    <div class="will-listTit">학원 공지사항</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/pass/support/notice/index?s_cate_code='.$data['mapping_cate_data']['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['off_notice']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['off_notice'] as $row)
                        <li>
                            <a href="{{front_url('/pass/support/notice/show?board_idx='.$row['BoardIdx'].'&s_cate_code='.$data['mapping_cate_data']['CateCode'])}}">
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
</div>

<div class="noticeTabs">
    <div class="will-listTit">동영상 공지사항</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/notice/index?s_cate_code='.$__cfg['CateCode'])}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['notice']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['notice'] as $row)
                        <li>
                            <a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'].'&s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y')}}">
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
</div>

<div class="noticeTabs mr-zero">
    <div class="will-listTit">강의계획서</div>
    <div class="tabBox noticeBox">
        <div class="tabContent p_re">
            <a href="{{front_url('/pass/offinfo/boardInfo/index/109').'?s_cate_code='.$data['mapping_cate_data']['CateCode']}}" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['board_lecture_plan']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['board_lecture_plan'] as $row)
                        <li>
                            <a href="{{front_url('/pass/offinfo/boardInfo/show/109?board_idx='.$row['BoardIdx']).'&s_cate_code='.$data['mapping_cate_data']['CateCode']}}">
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
</div>
