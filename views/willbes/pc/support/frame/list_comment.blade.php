@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<div class="LeclistTable p_re">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="board_idx" value="{{element('board_idx', $arr_input)}}"/>
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black tx-gray">
            <colgroup>
                <col style="width: 830px;">
                <col style="width: 110px;">
            </colgroup>
            <thead>
            <tr>
                <th class="w-textarea pl20 pt25"><textarea id="comment" name="comment" rows="15" title="댓글" placeholder="댓글을 입력해 주세요."></textarea></th>
                <th class="w-btn pr20 pt25">
                    <button type="button" id="btn_submit_comment" class="mem-Btn combine-Btn bg-blue bd-dark-blue">
                        <span>등록</span>
                    </button>
                </th>
            </tr>
            <tr>
                <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
            </tr>
            </thead>
        </table>
        <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none mt30">
            <colgroup>
                <col style="width: 95px;">
                <col style="width: 90px;">
                <col style="width: 615px;">
                <col style="width: 140px;">
            </colgroup>
            <tbody>
            @if(empty($list))
                <tr>
                    <td class="w-list tx-center" colspan="3">등록된 댓글이 없습니다.</td>
                </tr>
            @endif
            @foreach($list as $row)
                <tr>
                    <td class="w-no">
                        {!! $row['MemIdx'] == sess_data('mem_idx') ? $row['MemName'] : hpSubString($row['MemName'],0,2,'*') !!}
                    </td>
                    <td class="w-date">{{$row['RegDatm']}}</td>
                    <td class="w-list tx-left pl20" colspan="2">
                        {!!nl2br($row['Comment'])!!}
                        @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                            <a class="w-del btn-comment-del" data-comment-idx="{{$row['BoardCmtIdx']}}" href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a>
                        @endif
                    </td>
                </tr>
                @php $paging['rownum']-- @endphp
            @endforeach
            </tbody>
        </table>
        {!! $paging['pagination'] !!}
    </form>
</div>

<script type="text/javascript">
    var $regi_form_comment = $('#regi_form_comment');
    $(document).ready(function() {
        var is_login = '{{sess_data('is_login')}}';
        var _url = '{!! front_url($default_path.'/commentStore') !!}';

        //댓글 등록
        $('#btn_submit_comment').click(function() {
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            if (!confirm('등록하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_comment, _url, function(ret) {
                if(ret.ret_cd) {
                    location.reload();
                }
            }, showValidateError, addValidate, false, 'alert');
        });

        //댓글 삭제
        $('.btn-comment-del').click(function () {
            var comment_idx = $(this).data('comment-idx');
            if (!confirm('해당 댓글을 삭제하시겠습니까?')) { return true; }
            var data = {
                '{{ csrf_token_name() }}' : $regi_form_comment.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT'
            };
            sendAjax('{{ front_url($default_path.'/commentDel/') }}' + comment_idx, data, function(ret) {
                if (ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, false, 'POST');
        });
    });

    function addValidate() {
        if ($('#comment').val() == '') {
            alert('댓글을 입력해 주세요.');
            return false;
        }
        return true;
    }
</script>
@stop