@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css" xmlns="http://www.w3.org/1999/html">
    /*이모티콘 댓글*/
    .reEmo {}
    .characterSt2 {width:980px; margin:0 auto 50px}
    .characterSt2 .characterSt2Img {margin-bottom:20px; border-top:1px solid #ccc; border-bottom:1px solid #ccc}
    .characterSt2 .characterSt2Img li {display:inline; float:left; width:16.666666%; text-align:center; cursor:pointer;border-right:1px solid #ccc}
    .characterSt2 .characterSt2Img li input {vertical-align:middle}
    .characterSt2 .characterSt2Img li.active {background:#cde7f5}
    .characterSt2 .characterSt2Img li p {height:40px; line-height:40px; color:#333; background:#eee; font-size:14px; font-weight:bold}
    .characterSt2 .characterSt2Img li p span {color:#ee2365}
    .characterSt2 .characterSt2Img li:last-child {border-right:0; width:160px;}
    .characterSt2 .characterSt2Img:after {content:""; display:block; clear:both}

    .replySt3 {width:980px; margin:0 auto}
    .replySt3 .textarBx {margin-bottom:10px; background:#e8e6d9; padding:20px}
    .replySt3 .textarBx div {float:left; width:85.5%}
    .replySt3 .textarBx textarea {width:100%; height:85px;}
    .replySt3 .textarBx div input {height:36px; width:97%; line-height:36px; vertical-align:middle; border:2px solid #707070; margin-bottom:5px; padding-left:2%}
    .replySt3 .textarBx button {float:right; width:14%; height:85px; line-height:85px; text-align:center; background:#69654b; border-radius:4px; color:#fff}
    .replySt3 .textarBx:after {content:""; display:block; clear:both}
    .replySt3 p {color:#69654b}

    .replySt3List {width:980px; margin:20px auto 50px}
    .replySt3List li span.crtImg {display:block; float:left; width:120px; text-align:center; height:108px; background-size:100%; background-position:center center}
    .replySt3List li .crtReply {float:left; margin:10px 0}
    .replySt3List li .crtReply p {margin-bottom:5px}
    .replySt3List li .crtReply strong {color:#1087ef}
    .replySt3List li .crtReply > span {font-size:11px !important; color:#999; font-weight:normal !important}
    .replySt3List li .crtReply p a {float:right; margin-top:-5px; padding:0 4px; height:20px; line-height:20px; color:#666; border:1px solid #666; font-size:11px !important}
    .replySt3List li .crtReply p a:hover {
        color:#fff; background:#666;
    }
    .replySt3List li .crtReply div {width:860px; background:#eee; border-radius:10px; padding:20px; line-height:1.4; position:relative; margin:0 auto; margin-bottom:5px}
    .replySt3List li .crtReply div span a {display:block; margin-bottom:5px; color:#cf9243; font-weight:bold}
    .replySt3List li .crtReply div em {
        position:absolute;
        background:transparent;
        width:8px;height:0;
        top:20px;
        left:0;
        margin-left:-8px;
        border-top: 8px solid transparent;
        border-right: 8px solid #eee;
        border-bottom: 8px solid transparent;
        z-index:999;
    }
    .replySt3List li:after {content:""; display:block; clear:both}
    .rolling {width:1210px; margin:0 auto; text-align:center}

    .emoticon_1 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof01.png)}
    .emoticon_2 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof20.png)}
    .emoticon_3 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof17.png)}
    .emoticon_4 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof18.png)}
    .emoticon_5 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof13.png)}
    .emoticon_6 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof14.png)}
</style>

<div class="reEmo">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach

        <div class="characterSt2">
            <ul class="characterSt2Img">
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof01.png" title="신광은" />
                    <p><label><input type="radio" name="sns_icon" value="1" /> 만점의 <span>신~</span></label></p>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof20.png" title="장정훈" />
                    <p><label><input type="radio" name="sns_icon" value="2" /> 만점의 <span>향기~~</span></label></p>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof17.png" title="김원욱" />
                    <p><label><input type="radio" name="sns_icon" value="3" /> 만점<span>맨!~</span></label></p>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof18.png" title="하승민" />
                    <p><label><input type="radio" name="sns_icon" value="4" /> 히든 <span>만점러~</span></label></p>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof13.png" title="오태진" />
                    <p><label><input type="radio" name="sns_icon" value="5" /> 불타는 <span>만점러!</span></label></p>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/common/icon_poof14.png" title="원유철" />
                    <p><label><input type="radio" name="sns_icon" value="6" /> 만점의 <span>워너원~</span></label></p>
                </li>
            </ul>
        </div>

        <div class="replySt3">
            <div class="textarBx">
                <div><textarea id="event_comment" name="event_comment" cols="30" rows="3" title="댓글" placeholder="댓글을 입력해주세요."></textarea></div>
                <button type="button" id="btn_submit_comment">글쓰기</button>
            </div>
            <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
        </div>
    </form>

    <div class="replySt3List">
        <ul>
            @foreach($list as $row)
                <li>
                    <span class="crtImg emoticon_{{$row['EmoticonNo']}}">
                        {{--<img src="https://static.willbes.net/public/images/promotion/common/icon_poof17.png" alt=""/>--}}
                    </span>
                    <div class="crtReply">
                        <p>{!! hpSubString($row['MemName'],0,2,'*') !!}
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a class="btn-comment-del" data-comment-idx="{{$row['Idx']}}" href="#none">삭제</a>
                            @endif
                        </p>
                        <div>
                            <span><a href="" target="_blank"></a></span>
                            {!!nl2br($row['Content'])!!}
                            <em>&nbsp;</em>
                        </div>
                        <span>{{$row['RegDatm']}}</span>
                    </div>
                </li>
                @php $paging['rownum']-- @endphp
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