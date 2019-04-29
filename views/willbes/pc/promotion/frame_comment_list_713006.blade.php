@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css">
    .urlWrap {
        width:1000px;
        margin:30px auto 100px;
        font-size:12px;
        line-height: 1.4;
        color:#555556;
    }
    .urlWrap .snslink {
        width: 90%;
        margin: 0 auto;
    }
    .urlWrap .snslink li {
        display: inline;
        float: left;
        width: 25%;
        text-align: center;
    }
    .urlWrap .snslink:after {
        content:'';
        display: block;
        clear:both;
    }

    .replyEvaluate {width:1000px; margin:0 auto;}
    .character ul {border-top:1px solid #ababab; text-align:center}
    .character li {display:inline; float:left; width:166px; text-align:center; margin:0 auto}
    .character li:first-child,
    .character li:last-child {width:168px}
    .character li:first-child div {border-left:1px solid #ababab}
    .character li:last-child div {border-right:1px solid #ababab}
    .character li div {border-right:1px solid #eaeaea}
    .character li input {vertical-align:middle}
    .character li.active {background:#cde7f5}
    .character li p {height:40px; line-height:40px; color:#333; background:#eee; font-size:14px; font-weight:bold}
    .character li p span {color:#ee2365}
    .character ul:after {content:""; display:block; clear:both}

    .replyEvaluate .reply_inbx {
        position:relative; border:1px solid #ababab; border-top:1px solid #eaeaea; padding:20px 0;
    }
    .replyEvaluate .reply_inbx ul {margin-left:20px}
    .replyEvaluate .reply_inbx li {
        display:inline; float:left; margin-right:20px;
    }
    .replyEvaluate .reply_inbx li input {width:18px; height:18px}
    .replyEvaluate .reply_inbx li img { width:30px}
    .replyEvaluate ul:after {
        content:""; display:block; clear:both;
    }
    .replyEvaluate .reportUrl { padding:0 20px}
    .replyEvaluate .reportUrl input {height:24px; width:80%; padding:0 10px; margin-left:15px; background:#f7f7f7; border:1px solid #eaeaea}
    .replyEvaluate .textarBx {margin-top:10px; border-top:1px solid #eaeaea; }
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
    .replyList li span.crtImg {display:block; float:left; width:120px; text-align:center; height:108px; background-size:100%; background-position:center center}
    .emoticon_1 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof01.png)}
    .emoticon_2 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof20.png)}
    .emoticon_3 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof17.png)}
    .emoticon_4 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof18.png)}
    .emoticon_5 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof13.png)}
    .emoticon_6 {background-image: url(https://static.willbes.net/public/images/promotion/common/icon_poof14.png)}
</style>

<div class="replyEvaluate">
    <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" id="event_comment" name="event_comment" value="">
        @foreach($arr_base['set_params '] as $key => $val)
            <input type="hidden" name="{{$key}}" value="{{$val}}"/>
        @endforeach
        <div class="character">
            <ul>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof01.png" title="신광은" />
                        <p><input type="radio" name="sns_icon" value="1" id="icon1"/> <label for="icon1">만점의 <span>신~</span></label></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof20.png" title="장정훈" />
                        <p><input type="radio" name="sns_icon" value="2" id="icon2"/> <label for="icon2">만점의 <span>향기~~</span></label></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof17.png" title="김원욱" />
                        <p><input type="radio" name="sns_icon" value="3" id="icon3"/> <label for="icon3">만점<span>맨!~</span></label></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof18.png" title="하승민" />
                        <p><input type="radio" name="sns_icon" value="4" id="icon4"/> <label for="icon4">히든 <span>만점러~</span></label></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof13.png" title="오태진" />
                        <p><input type="radio" name="sns_icon" value="5" id="icon5"/> <label for="icon5">불타는 <span>만점러!</span></label></p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="https://static.willbes.net/public/images/promotion/common/icon_poof14.png" title="원유철" />
                        <p><label><input type="radio" name="sns_icon" value="6" /> 만점의 <span>워너원~</span></label></p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="reply_inbx">
            <div class="reportUrl">소문내기 URL <input type="text" name="comment_url" id="comment_url" title="소문내기 URL" placeholder="소문내기 URL을 입력해주세요."></div>
            <div class="textarBx">
                <textarea name="comment" id="comment" cols="30" rows="5" title="댓글" placeholder="댓글을 입력해주세요."></textarea>
            </div>
            <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            <p> * 특수문자 파이프(|)는 입력 불가 입니다.</p>
            <button type="button" class="btnrwt" id="btn_submit_comment">글쓰기</button>
        </div>
    </form>

    <div class="replyList">
        <ul>
            @foreach($list as $row)
                <li>
                    <span class="crtImg emoticon_{{ empty($row['EmoticonNo']) === true ? '1' : $row['EmoticonNo'] }}"></span>
                    <div>
                        <p>{!! hpSubString($row['MemName'],0,2,'*') !!} <span>{{$row['RegDatm']}}</span></p>
                        @php $arr_content = explode('|', $row['Content']); @endphp
                        <p>{{ empty($arr_content[0]) === false ? hpSubString($arr_content[0], 0, 10, '*********************') : '' }}</p>
                        {!! empty($arr_content[1]) === false ? nl2br($arr_content[1]) : '' !!}
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
        var content = '';
        var _url = '{!! front_url('/promotion/commentStore') !!}';
        if (!confirm('등록하시겠습니까?')) { return true; }

        // 내용 가공 처리
        if (($('#comment_url').val() != '') && (validUrl($('#comment_url').val()) == true) && ($('#comment').val() != '')) {
            content = $('#comment_url').val() + '|' + $('#comment').val();
            $('#event_comment').val(content);
        }

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

        if ($('#comment_url').val() == '') {
            alert('홍보 URL을 입력해 주세요.');
            return false;
        }

        if (validUrl($('#comment_url').val()) == false) {
            alert('형식에 맞지않는 URL 입니다.');
            return false;
        }

        if ($('#comment').val() == '') {
            alert('댓글을 입력해 주세요.');
            return false;
        }

        if (checkSpecial($('#comment').val()) == true) {
            alert('허용되지 않은 특수문자가 존재합니다. 다시 입력해 주세요.');
            return false;
        }
        return true;
    }

    //URL 패턴 검사
    function validUrl(url) {
        var pattern = new RegExp('^(http:\\/\\/www\\.|https:\\/\\/www\\.|http:\\/\\/|https:\\/\\/)?[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}(:[0-9]{1,5})?(\\/.*)?$');
        return pattern.test(url);
    }

    function checkSpecial(str) { var special_pattern = /[|/?]/gi; if(special_pattern.test(str) == true) { return true; } else { return false; } }
</script>
@stop