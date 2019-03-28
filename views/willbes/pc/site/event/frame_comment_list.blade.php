@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

<div class="willbes-Leclist c_both mt50" style="padding-bottom: 40px;">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="event_idx" value="{{element('event_idx', $arr_input)}}"/>
    <div class="LeclistTable p_re">
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray">
            <colgroup>
                <col style="width: 830px;">
                <col style="width: 110px;">
            </colgroup>
            <thead>
            <tr>
                <th class="w-textarea pl20 pt25">
                    <textarea id="event_comment" name="event_comment" class="form-control" rows="15" title="댓글" placeholder="댓글을 입력해 주세요."></textarea>
                </th>
                <th class="w-btn pr20 pt25">
                    <button type="button" id="btn_submit_comment" class="mem-Btn combine-Btn {{($arr_base['comment_create_type'] == '3') ? 'bg-purple-gray bd-dark-gray' : 'bg-blue bd-dark-blue'}}">
                        <span>등록</span>
                    </button>
                </th>
            </tr>
            <tr>
                <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
            </tr>
            </thead>
        </table>
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray mt30">
            <colgroup>
                <col style="width: 95px;">
                <col style="width: 90px;">
                <col style="width: 615px;">
                <col style="width: 140px;">
            </colgroup>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="4">등록된 댓글이 없습니다.</td>
                </tr>
            @endif

            @foreach($list as $row)
                <tr>
                    <td class="w-no">
                        @if($row['RegType'] == '1')
                            <img src="{{ img_url('sub/icon_HOT.gif') }}">
                        @else
                            @if(empty($row['MemIdx']) === true && empty($row['MemName']) === true)
                                비회원
                            @else
                                {!! hpSubString($row['MemName'],0,2,'*') !!}
                            @endif
                        @endif
                    </td>
                    <td class="w-date">{{$row['RegDay']}}</td>
                    <td class="w-list tx-left pl20">
                        @if($row['RegType'] == '1')
                            {{$row['Content']}}
                        @else
                            {!!nl2br($row['Content'])!!}
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a class="w-del btn-comment-del" data-comment-idx="{{$row['Idx']}}" href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a>
                            @endif
                        @endif
                    </td>
                    <td class="w-more">
                        @if($row['RegType'] == '1')
                            {{--<a class="tx-light-blue" href="#none" id="btn_notice_view" data-notice-idx="{{$row['Idx']}}" onclick="openWin('NOTICEPASS')">자세히보기 ></a>--}}
                            <a class="tx-light-blue btn-notice-view" href="#none" data-notice-idx="{{$row['Idx']}}">자세히보기 ></a>
                        @endif
                    </td>
                </tr>
                @php $paging['rownum']-- @endphp
            @endforeach
            </tbody>
        </table>
        {!! $paging['pagination'] !!}
    </div>
    </form>
</div>

<script type="text/javascript">
var $regi_form_comment = $('#regi_form_comment');
$(document).ready(function() {
    $('#btn_submit_comment').click(function() {
        @if($arr_base['comment_create_type'] == '1')
        comment_submit();
        @elseif($arr_base['comment_create_type'] == '2')
        alert('회원만 댓글을 등록할 수 있습니다.');
        @elseif($arr_base['comment_create_type'] == '3')
        alert('만료된 이벤트 입니다.');
        @endif
    });

    $('.btn-comment-del').click(function () {
        var comment_idx = $(this).data('comment-idx');

        if (!confirm('해당 댓글을 삭제하시겠습니까?')) { return true; }
        var data = {
            '{{ csrf_token_name() }}' : $regi_form_comment.find('input[name="{{ csrf_token_name() }}"]').val(),
            '_method' : 'PUT'
        };
        sendAjax('{{ front_url('/event/commentDel/') }}' + comment_idx, data, function(ret) {
            if (ret.ret_cd) {
                location.reload();
            }
        }, showError, false, 'POST');
    });

    $('.btn-notice-view').click(function () {
        var notice_idx = $(this).data('notice-idx');
        parent.popup_notice_view(notice_idx);
    });
});

function comment_submit() {
    var _url = '{!! front_url('/event/commentStore') !!}';
    if (!confirm('등록하시겠습니까?')) { return true; }
    ajaxSubmit($regi_form_comment, _url, function(ret) {
        if(ret.ret_cd) {
            location.reload();
        }
    }, showValidateError, addValidate, false, 'alert');
}

function addValidate() {
    if ($('#event_comment').val() == '') {
        alert('댓글을 입력해 주세요.');
        return false;
    }
    return true;
}
</script>
@stop