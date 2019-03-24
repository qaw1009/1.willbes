@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!--댓글-->
<div class="replySection" id="link">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach
        <div class="reply" id="reply">
            <div class="replyWrite">
                <div class="textarBx">
                    <textarea id="event_comment" name="event_comment" cols="30" rows="3"></textarea>
                    <button type="button" class="NSK" id="btn_submit_comment">글쓰기</button>
                </div>
                <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            </div>

            <!--댓글공지-관리자만 등록,수정,삭제 가능-->
            <div class="replyNoticeWrap">
                {{--<div class="btnRt ">
                    <a href='#none'>새로고침</a>
                    <a href='javascript:add_notice()'>공지등록</a>
                </div>--}}

                @foreach($arr_base['notice_data'] as $row)
                <ul class="replyNotice">
                    <li>
                        <div class="ry_info">
                            <span class="notice">공지</span> <span class="date">{{ $row['RegDate'] }}</span> <strong>{{ $row['Title'] }}</strong>
                        </div>
                        <div class="ry_cont">
                            <div>{!! $row['Content'] !!}
                            {{--<a href="javascript:modify_notice('VIEW',2)" class="rnView">[상세보기]</a>--}}
                            </div>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
            <!-- replyNoticeWrap//-->

            <ul class="replyList">
                @foreach($list as $row)
                    <li>
                        <div class="ryw_info">
                            <strong>{!! $row['MemIdx'] == sess_data('mem_idx') ? $row['MemName'] : hpSubString($row['MemName'],0,2,'*') !!}</strong> <span class="date">{{$row['RegDatm']}}</span>
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a class="rnDelBtn f_right btn-comment-del" data-comment-idx="{{$row['Idx']}}" href="#none">삭제</a>
                            @endif
                        </div>
                        <div class="ryw_cont">
                            <div>{!!nl2br($row['Content'])!!}</div>
                        </div>
                    </li>
                    @php $paging['rownum']-- @endphp
                @endforeach
            </ul>
            <div>{!! $paging['pagination'] !!}</div>
        </div>
    </form>
</div><!--wb_reply//-->

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
            sendAjax('{{ front_url('/promotion/commentDel/') }}' + comment_idx, data, function(ret) {
                if (ret.ret_cd) {
                    location.reload();
                }
            }, showError, false, 'POST');
        });
    });

    function comment_submit() {
        var _url = '{!! front_url('/promotion/commentStore') !!}';
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