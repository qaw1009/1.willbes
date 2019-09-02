@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div class="willbes-Leclist c_both">
    <div class="willbes-Lec-Tit NG tx-black">수강후기</div>
    <div class="ReplylistTable tx-gray">
        @if(count($list_best) > 0)
            @foreach($list_best as $row)
                <div class="replyBox">
                    <div class="w-reply-teaser">
                        <ul>
                            <li class="w-tit tx-light-blue">{{$row['ProdName']}}</li>
                            <li class="w-name tx-center">
                                {!! $row['RegMemIdx'] == sess_data('mem_idx') ? $row['RegMemName'] : hpSubString($row['RegMemName'],0,2,'*') !!}
                            </li>
                            <li class="row-line">|</li>
                            <li class="w-date tx-center">{{$row['RegDatm']}}</li>
                        </ul>
                        <ul>
                            {{--<li class="w-star"><img src="{{ img_url('sub/star4.gif') }}"></li>--}}
                            <li class="w-star"><img src="{{img_url("sub/star".$row['LecScore'].".gif")}}"></li>
                            <li class="w-subtit">{{$row['Title']}}</li>
                        </ul>
                    </div>
                    <div class="w-reply">
                        @if($row['RegType'] == 1)
                            {!! $row['Content'] !!}
                        @else
                            {!! nl2br($row['Content']) !!}
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<!-- willbes-Reply -->

<div class="willbes-Leclist c_both">
    <div class="willbes-LecreplyList tx-gray">
        → 해당 강좌 총 수강후기 [ <a class="num tx-light-blue underline" href="#none">{{$total_rows}}건</a> ]
    </div>
    <div class="LeclistTable">
        <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
            <colgroup>
                <col style="width: 100px;">
                <col style="width: 590px;">
                <col style="width: 120px;">
                <col style="width: 130px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>제목<span class="row-line">|</span></th>
                <th>작성자<span class="row-line">|</span></th>
                <th>등록일</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="6">등록된 내용이 없습니다.</td>
                </tr>
            @endif
            @foreach($list as $row)
                <tr>
                    <td class="w-no">{{$paging['rownum']}}</td>
                    <td class="w-list tx-left pl20">{{$row['Title']}}</td>
                    <td class="w-name">
                        {!! (empty(sess_data('mem_idx')) === false && $row['RegMemIdx'] == sess_data('mem_idx')) ? $row['RegMemName'] : hpSubString($row['RegMemName'],0,2,'*') !!}
                    </td>
                    <td class="w-date">{{$row['RegDatm']}}</td>
                </tr>
                @php $paging['rownum']-- @endphp
            @endforeach
            </tbody>
        </table>
        <p class="mt10 tx-right">*본 게시판 취지와 맞지 않는 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</p>
    </div>
    <div class="row">
        <div class="col-xs-12">
            {!! $paging['pagination'] !!}
        </div>
    </div>
</div>
@stop