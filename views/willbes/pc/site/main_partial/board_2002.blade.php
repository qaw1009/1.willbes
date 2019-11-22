@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
<div class="noticeTabs acad">
    <ul class="tabWrap noticeWrap_acad two">
        <li><a href="#notice1" class="on">공지사항</a></li>
        <li><a href="#notice2" class="">시험공고</a></li>
        <li><a href="#notice3" class="">수험뉴스</a></li>
    </ul>
    <div class="tabBox noticeBox_acad">
        <div id="notice1" class="tabContent p_re">
            <a href="{{front_url('/support/notice/index')}}" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['notice']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['notice'] as $row)
                        <li>
                            <a href="{{front_url('/support/notice/show?board_idx='.$row['BoardIdx'])}}">
                                @if($row['IsBest'] == '1') <img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> @endif
                                {{$row['Title']}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div id="notice2" class="tabContent p_re">
            <a href="{{front_url('/support/examAnnouncement/index')}}" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['exam_announcement']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['exam_announcement'] as $row)
                        <li>
                            <a href="{{front_url('/support/examAnnouncement/show?board_idx='.$row['BoardIdx'])}}">
                                @if($row['IsBest'] == '1') <img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> @endif
                                {{$row['Title']}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div id="notice3" class="tabContent p_re">
            <a href="{{front_url('/support/examNews/index')}}" class="f_right btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}" alt="더보기"></a>
            <ul class="List-Table">
                @if(empty($data['exam_news']) === true)
                    <li>등록된 내용이 없습니다.</li>
                @else
                    @foreach($data['exam_news'] as $row)
                        <li>
                            <a href="{{front_url('/support/examNews/show?board_idx='.$row['BoardIdx'])}}">
                                @if($row['IsBest'] == '1') <img src="{{ img_url('cop/icon_hot.png') }}" alt="HOT"> @endif
                                {{$row['Title']}}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>