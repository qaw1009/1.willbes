@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css">
    .replyEvaluate {width:1000px; margin:0 auto;}
    .character .crtTab {margin-bottom:20px}
    .character .crtTab li {display:inline; float:left; margin-right:20px}
    .character .crtTab li input {vertical-align:middle}
    .character .crtTab:after {content:""; display:block; clear:both}
    .character .characterImg {margin-bottom:20px}
    .character .characterImg li {display:inline; float:left; width:7.6923%; text-align:center; height:80px; line-height:80px; margin:5px 0; cursor:pointer; position:relative}
    .character .characterImg li img.on {display:none}
    .character .characterImg li img.off {display:block}
    .character .characterImg li:hover img.on {display:block; position:absolute; width:154px; top:50%; left:50%; border:2px solid #1087ef; background:#fff; box-shadow:2px 2px 4px rgba(0,0,0,.5); z-index:10}
    .character .characterImg li:hover,
    .character .characterImg li.active {background:#cde7f5}
    .character .characterImg:after {content:""; display:block; clear:both}

    .replyEvaluate .reply_inbox {
        position:relative; border:1px solid #ababab; padding:20px 0;
    }
    .replyEvaluate .reply_inbox ul {margin-left:20px}
    .replyEvaluate .reply_inbox li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbox li input {width:18px; height:18px}
    .replyEvaluate .reply_inbox li img { width:30px}
    .replyEvaluate ul:after {
        content:""; display:block; clear:both;
    }
    .replyEvaluate .reportUrl {padding:0 20px}
    .replyEvaluate .reportUrl input {height:24px; width:80%; padding:0 10px; margin-left:15px; background:#f7f7f7; border:1px solid #eaeaea}
    .replyEvaluate .textarBx textarea {
        border:0; width:100%; line-height:1.5; border-bottom:1px solid #eaeaea; padding:10px 20px;
    }
    .replyEvaluate .reply_inbox p {margin:10px 0 0 20px; color:#999; text-align:left}
    .replyEvaluate .reply_inbox .btnrwt {
        position: absolute; bottom:0; right:0;
        width:70px; border-left:1px solid #eaeaea; display:block; height:42px; line-height:42px; color:#333; background:#fff;
    }
    .replyEvaluate .replyList {
        text-align:left; color:#666;
    }
    .replyEvaluate .replyList li {
        position:relative; border-bottom:1px solid #e6e4e4; padding:20px 0; min-height:105px;
    }
    .replyEvaluate .replyList li img {
        position:absolute; top:15px; left:15px; width:80px;
    }
    .replyEvaluate .replyList li div {margin-left:110px; line-height:1.5}
    .replyEvaluate .replyList li p {margin-bottom:10px; color:#999;}
    .replyEvaluate .replyList li p span {margin-left:20px}
    .replyEvaluate .replyList li .btnDel {
        position:absolute; top:15px; right:5px;
        border:1px solid #dcdcdc; padding:5px 8px;
    }
</style>

<div class="replyEvaluate">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" id="sns_icon" name="sns_icon" value="">
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach
        <div class="character">
            <ul class="characterImg">
                @for ($i=1; $i<=26; $i++)
                    <li class="sel_icon" id="character_{{$i}}">
                        <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($i) == 1 ? '0' : '') }}{{ $i }}_1.png" alt="" class="off" onclick="javascript:choice({{ $i }})"/>
                        <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($i) == 1 ? '0' : '') }}{{ $i }}.png" alt="" class="on" onclick="javascript:choice({{ $i }})"/>
                    </li>
                @endfor
            </ul>
        </div>

        <div class="reply_inbox">
            <div class="textarBx">
                <textarea name="event_comment" id="event_comment" cols="30" rows="5" placeholder="댓글을 입력해주세요."></textarea>
            </div>
            <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            <button type="button" class="btnrwt" id="btn_submit_comment">글쓰기</button>
        </div>
    </form>

    <div class="replyList">
        <ul>
            @foreach($list as $row)
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($row['EmoticonNo']) == 1 ? '0' : '') }}{{ $row['EmoticonNo'] }}.png" title="{{ $row['EmoticonNo'] }}">
                    <div>
                        <p>{!! hpSubString($row['MemName'],0,2,'*') !!} <span>{{$row['RegDatm']}}</span></p>
                        {!!nl2br($row['Content'])!!}
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {!! $paging['pagination'] !!}
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

    // 선택된 아이콘 셋팅
    function choice(emoticon_num) {
        $("#sns_icon").val(emoticon_num);
        $(".sel_icon").removeClass("active");
        $("#character_"+emoticon_num).addClass("active");
    }

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
        if ($('#sns_icon').val() == '') {
            alert('이모티콘을 선택해 주세요.');
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