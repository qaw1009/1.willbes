@extends('willbes.m.layouts.master_no_footer')

@section('content')
<div class="reply">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="event_idx" value="{{element('event_idx', $arr_input)}}"/>

        <div class="replyWrite">
            <textarea id="event_comment" name="event_comment" placeholder="지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. 댓글을 입력해 주세요."></textarea>
            <a href="#none" id="btn_submit_comment">등록</a>
        </div>
        <div class="replyList">
            <ul>
                @if(empty($list))
                    <li class="noReply">등록된 댓글이 없습니다.</li>
                @endif

                @foreach($list as $row)
                    @if($row['RegType'] == '1')
                        <li class="notice">
                            <div class="date"><span>HOT</span> {{$row['RegDay']}}
                                <a href="#none" class="btn-notice-view" data-notice-idx="{{$row['Idx']}}">자세히보기 ></a>
                            </div>
                            <div>
                                {{$row['Content']}}
                            </div>
                        </li>
                    @else
                        <li>
                            <div class="date">
                                @if(empty($row['MemIdx']) === true && empty($row['MemName']) === true)
                                    비회원
                                @else
                                    {!! hpSubString($row['MemName'],0,2,'*') !!}
                                @endif
                                {{$row['RegDay']}}
                                @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                    <a href="#none" class="btn-comment-del" data-comment-idx="{{$row['Idx']}}" >삭제</a>
                                @endif
                            </div>
                            <div>
                                {!!nl2br($row['Content'])!!}
                            </div>
                        </li>
                    @endif
                        @php $paging['rownum']-- @endphp
                @endforeach
            </ul>
        </div>
        {!! $paging['pagination'] !!}
    </form>
</div>

<style>
    .replyList ul li:first-child {margin-top:49px}
</style>

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