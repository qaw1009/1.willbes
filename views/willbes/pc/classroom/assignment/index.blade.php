@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

<div class="willbes-Mypage-EDITZONE mt60 c_both p_re">
    <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
        · 과제확인 및 답안제출
    </div>
    <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
        <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
        <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
            <tbody>
            <tr>
                <td>
                    <div class="SubTit">- 제출상태</div>
                    <div class="Txt">
                        <span class="aBox answerBox NSK f_left">과제제출</span>
                        <div class="SubTxt">'과제제출'을 클릭하여 과제를 확인하고 답안을 제출하세요. (과제제출 이후에는 수정할 수 없습니다.)</div>
                    </div>
                    <div class="SubTit pt20">- 채점확인</div>
                    <div class="Txt">
                        <span class="aBox finishBox NSK f_left">채점중</span>
                        <div class="SubTxt">
                            채점이 진행중입니다. 채점은 매일 진행예정이며, 부득이한 경우 1-2일 소요될 수 있습니다.<br/>
                            '채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.
                        </div>
                    </div>
                    <div class="Txt mt10">
                        <span class="aBox waitBox_block NSK f_left">채점완료</span>
                        <div class="SubTxt">채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="LeclistTable mt35 c_both">
        <table cellspacing="0" cellpadding="0" class="listTable editTable under-gray bdt-gray tx-gray">
            <colgroup>
                <col style="width: 60px;">
                <col style="width: 480px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
                <col style="width: 100px;">
            </colgroup>
            <thead>
            <tr>
                <th>No<span class="row-line">|</span></th>
                <th>과제제목<span class="row-line">|</span></th>
                <th>제출상태<span class="row-line">|</span></th>
                <th>과제제출일<span class="row-line">|</span></th>
                <th>채점상태<span class="row-line">|</span></th>
                <th>채점완료일</th>
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
                    <td class="w-no">{{$total_rows}}회</td>
                    <td class="w-list tx-left pl20">{{$row['Title']}}</td>
                    <td class="w-status-send">
                        @if(empty($row['am_BaIdx']) === true || $row['am_AssignmentStatusCcd'] == $arr_save_type_ccd[0])
                            <a href="#none" onclick="goEdit('ing', '', '{{$row['BoardIdx']}}')"><span class="aBox waitBox_block NSK">과제제출</span></a>
                        @else
                            제출완료
                        @endif
                    </td>
                    <td class="w-date">
                        @if(empty($row['am_BaIdx']) === false && $row['am_AssignmentStatusCcd'] != $arr_save_type_ccd[0])
                            {{$row['am_RegDatm']}}
                        @endif
                    </td>
                    <td class="w-status-mark">
                        @if(empty($row['am_BaIdx']) === false && $row['am_AssignmentStatusCcd'] != $arr_save_type_ccd[0])
                            @if($row['am_IsReply'] == 'N')
                                <a href="#none" onclick="goEdit('edit2', 'ch2', '{{$row['BoardIdx']}}')"><span class="aBox answerBox NSK">채점중</span></a>
                            @else
                                <a href="#none" onclick="goEdit('edit3', 'ch3', '{{$row['BoardIdx']}}')"><span class="aBox finishBox NSK">채점완료</span></a>
                            @endif
                        @endif
                    </td>
                    <td class="w-date-fin">{{$row['am_ReplyRegDatm']}}</td>
                </tr>
                @php $total_rows-- @endphp
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    function goEdit(open_target, open_content, b_idx) {
        parent.open_popup(open_target, open_content, b_idx);
    }
</script>
@stop