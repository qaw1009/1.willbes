<div class="noticeTabs f_left">
    <div class="will-listTit">공지사항</div>
    <div class="tabBox noticeBox" style="margin-top:-30px">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode']).'?s_cate_code='.$__cfg['CateCode']}}&s_cate_code_disabled=Y" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['notice']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['notice'] as $row)
                        <li>
                            <a href="{{front_url('/support/notice/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'].'&s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y')}}">
                                @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                            </a>
                            <span class="date">{{$row['RegDatm']}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>

<div class="noticeTabs f_right">
    <div class="will-listTit">수험공고</div>
    <div class="tabBox noticeBox" style="margin-top:-30px">
        <div class="tabContent p_re">
            <a href="{{front_url('/support/notice/index/cate/'.$__cfg['CateCode']).'?s_cate_code='.$__cfg['CateCode']}}&s_cate_code_disabled=Y" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['exam_news']) === true)
                    <li><span>등록된 내용이 없습니다.</span></li>
                @else
                    @foreach($data['exam_news'] as $row)
                        <li>
                            <a href="{{front_url('/support/examNews/show/cate/'.$__cfg['CateCode'].'?board_idx='.$row['BoardIdx'].'&s_cate_code='.$__cfg['CateCode'].'&s_cate_code_disabled=Y')}}">
                                @if($row['IsBest'] == '1')<span>HOT</span>@endif {{$row['Title']}}
                                @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                            </a>
                            <span class="date">{{$row['RegDatm']}}</span>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
<!--willbesNews //-->
