@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<style type="text/css">
    .replyEvaluate {width:1000px; margin:0 auto;}
    .replyEvaluate .reply_inbx {
        position:relative; border:1px solid #ababab;  padding:20px 0;
    }
    .replyEvaluate .reply_inbx ul {margin-left:20px}
    .replyEvaluate .reply_inbx li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbx li input {width:18px; height:18px}
    .replyEvaluate .reply_inbx li label {display:inline-block; padding:0 15px; height:26px; line-height:26px; border:1px solid red; border-radius:14px; color:red}
    .replyEvaluate .reply_inbx li:nth-child(2) label {border:1px solid blue; color:blue}
    .replyEvaluate .reply_inbx li:nth-child(3) label {border:1px solid green; color:green}
    .replyEvaluate .reply_inbx li input:checked + label {border:1px solid #333; color:#fff; background:#333}
    .replyEvaluate ul:after {
        content:""; display:block; clear:both;
    }
    .replyEvaluate .textarBx { margin-top:10px}
    .replyEvaluate .textarBx textarea {
        border:0; width:100%; line-height:1.5; border-bottom:1px solid #eaeaea; padding:10px 20px;
    }
    .replyEvaluate .reply_inbx p {margin:10px 0 0 20px; color:#999; text-align:left}
    .replyEvaluate .reply_inbx .btnrwt {
        position: absolute; bottom:0; right:0;
        width:70px; border-left:1px solid #eaeaea; display:block; height:42px; line-height:42px; color:#333; background:#fff;
    }
    .replyEvaluate .replyList {
        text-align:left; color:#666;
    }
    .replyEvaluate .replyList li {
        position:relative; border-bottom:1px solid #e6e4e4; padding:20px 0; min-height:105px;
    }
    .replyEvaluate .replyList li div {line-height:1.5}
    .replyEvaluate .replyList li p {margin-bottom:10px; color:#999;}
    .replyEvaluate .replyList li p strong {margin-right:10px}
    .replyEvaluate .replyList li p strong.str01 {color:red}
    .replyEvaluate .replyList li p strong.str02 {color:blue}
    .replyEvaluate .replyList li p strong.str03 {color:green}
    .replyEvaluate .replyList li p span {margin-left:10px}
    .replyEvaluate .replyList li .btnDel {
        position:absolute; top:15px; right:5px;
        border:1px solid #dcdcdc; padding:5px 8px;
    }
</style>

<div class="replyEvaluate">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach
        <div class="reply_inbx">
            <ul>
                <li><input id="re1" name="sns_icon" type="radio" value="1"> <label for="re1">시험후기</label></li>
                <li><input id="re2" name="sns_icon" type="radio" value="2"> <label for="re2">적중사례</label></li>
                <li><input id="re3" name="sns_icon" type="radio" value="3"> <label for="re3">체감난이도</label></li>
            </ul>
            <div class="textarBx">
                <textarea name="event_comment" id="event_comment" cols="30" rows="5"></textarea>
            </div>
            <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            <button type="button" class="btnrwt" id="btn_submit_comment">글쓰기</button>
        </div>

        <div class="replyList">
            <ul>
                @foreach($list as $row)
                    <li>
                        <div>
                            <p>
                                <strong class="str0{{ empty($row['EmoticonNo']) === true ? '1' : $row['EmoticonNo'] }}">
                                    @if($row['EmoticonNo'] == 1)시험후기@elseif($row['EmoticonNo'] == 2)적중사례@else체감난이도@endif
                                </strong>
                                {!! hpSubString($row['MemName'],0,2,'*') !!} <span>{{$row['RegDatm']}}</span>
                            </p>
                            {!!nl2br($row['Content'])!!}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        {!! $paging['pagination'] !!}
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
        if ($('input:radio[name="sns_icon"]').is(':checked') === false) {
            alert('주제를 선택해 주세요.');
            return false;
        }

        if ($('#event_comment').val() == '') {
            alert('댓글을 입력해 주세요.');
            return false;
        }
        return true;
    }
</script>
@stop