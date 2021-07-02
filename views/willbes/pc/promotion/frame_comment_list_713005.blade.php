@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<style type="text/css">
    .replyEvaluate {width:1000px; margin:0 auto;}
    /*
    .character .crtTab {margin-bottom:20px}
    .character .crtTab li {display:inline; float:left; margin-right:20px}
    .character .crtTab li input {vertical-align:middle}
    .character .crtTab:after {content:""; display:block; clear:both}*/
    .character .characterImg {margin-bottom:20px}
    .character .characterImg li {display:block; float:left; width:7.6923%; text-align:center; height:80px; line-height:80px; margin:5px auto; cursor:pointer; position:relative}
    .character .characterImg li img {width:73px; margin:0 auto;}
    .character .characterImg li img.on {display:none}
    .character .characterImg li img.off {display:block}
    .character .characterImg li:hover img.on {display:block; position:absolute; width:154px; top:50%; left:50%; border:2px solid #1087ef; background:#fff; box-shadow:2px 2px 4px rgba(0,0,0,.5); z-index:10}
    .character .characterImg li:hover,
    .character .characterImg li.active {background:#cde7f5}
    .character .characterImg:after {content:""; display:block; clear:both}

    .character .characterImg2 {margin-bottom:20px}
    .character .characterImg2 li {position:relative; display:block; float:left; width:12.5%; text-align:center; margin:5px auto; }
    .character .characterImg2 li .off {padding:10px 0; cursor:pointer; }
    .character .characterImg2 li .on {display:none}
    .character .characterImg2 li .on img {width:154px;}
    .character .characterImg2 li:hover .on {display:block; position:absolute; width:154px; height:154px; top:50%; left:50%; border:2px solid #1087ef; background:#fff; box-shadow:2px 2px 4px rgba(0,0,0,.5); z-index:10}
    .character .characterImg2 li div:hover,
    .character .characterImg2 li.active {background:#cde7f5}
    .character .characterImg2:after {content:""; display:block; clear:both}

    .character .characterImg3 li img {width:73px}


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

    .replyNoticeWrap .btnRt {
        margin-top:20px;
        text-align: right;
    }

    .replyNoticeWrap .btnRt a {
        display: inline-block;
        background: #000;
        color:#fff;
        padding:0 20px;
        height: 30px;
        line-height: 30px;
        border:1px solid #000;
        margin-left:5px;
    }
    .replyNoticeWrap .btnRt a:hover {
        background: #fff;
        color:#000;
    }
    .replyNotice {
        margin-top: 20px;
        border:1px solid #000;
    }
    .replyNotice .ry_info {
        padding: 10px;
        border-bottom: 1px solid #e0e0e0;
        color:#555;
    }
    .replyNotice .ry_info .notice {
        display: inline-block;
        color:#fff;
        background: #ff0033;
        height: 20px;
        line-height: 20px;
        vertical-align: middle;
        font-size: 11px;
        padding:0 5px;
        border-radius: 4px;
        margin-right:10px;
    }
    .replyNotice .ry_info .rnBtns {
        float:right;
    }
    .replySection .rnEditBtn {
        color:#666;
    }
    .replySection .rnDelBtn {
        color:#ff0033;
    }

    .replyNotice .ry_info .date {
        margin-right:10px;
    }
    .replyNotice .ry_cont {
        padding: 10px;
        background: #fafafa;
    }
    .replyNotice .ry_cont a {
        color:#3366ff;
    }

    a.delBtn {
        float: right;
        font-size: 12px;
        border: 1px solid #eee;
        width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        color: #ccc;
    }

    a.delBtn:hover {
        border: 1px solid #000;
        color: #000;
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
            @if(config_app('SiteCode') == '2001' || config_app('SiteCode') == '2002')
                {{-- 경찰 사이트일 경우만 적용 --}}
                <ul class="characterImg">
                    @for ($i=1; $i<=26; $i++)
                        <li class="sel_icon" id="character_{{$i}}">
                            <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($i) == 1 ? '0' : '') }}{{ $i }}_1.png" alt="" class="off" onclick="javascript:choice({{ $i }})"/>
                            <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($i) == 1 ? '0' : '') }}{{ $i }}.png" alt="" class="on" onclick="javascript:choice({{ $i }})"/>
                        </li>
                    @endfor
                </ul>
            @endif

            @if(config_app('SiteCode') == '2003' || config_app('SiteCode') == '2004')
                {{-- 공무원 (한덕현 교수) --}}
                <ul class="characterImg2 @if(empty($arr_input['change_emoticon_img']) === false) characterImg3 @endif">
                    @php
                        $emoticon_img = '1588_character';
                        if(empty($arr_input['promotion_code']) === false && $arr_input['promotion_code'] == '1675' && ($i == 1 || $i == 2 || $i == 3)) {
                            $emoticon_img = '1675_character';     // 한덕현 교수 아침 1~3 이모티콘
                        }

                        // 공무원 신기훈 행정법 이모티콘
                        if(empty($arr_input['change_emoticon_img']) === false){
                            if ($arr_input['promotion_code'] == '2267') {
                                $emoticon_img = '50027_character'; //오태진강사
                            } else {
                                $emoticon_img = '500697_character';
                            }
                        }
                    @endphp

                    @for ($i=1; $i<=8; $i++)
                        <li class="sel_icon" id="character_{{$i}}">
                            <div class="off" onclick="javascript:choice({{ $i }})">
                                @if(empty($arr_input['change_emoticon_img']) === false)
                                    <img src="https://static.willbes.net/public/images/promotion/common/{{ $emoticon_img . (strlen($i) == 1 ? '0' : '') . $i }}.png" alt="" />
                                @else
                                    <img src="https://static.willbes.net/public/images/promotion/common/{{ $emoticon_img . (strlen($i) == 1 ? '0' : '') . $i }}_1.png" alt="" />
                                @endif
                            </div>
                            <div class="on" onclick="javascript:choice({{ $i }})"><img src="https://static.willbes.net/public/images/promotion/common/{{ $emoticon_img . (strlen($i) == 1 ? '0' : '') . $i }}.png" alt="" /></div>
                        </li>
                    @endfor
                </ul>

            @endif                      
        </div>

        <div class="reply_inbox">
            <div class="textarBx">
                <textarea name="event_comment" id="event_comment" cols="30" rows="5" placeholder="댓글을 입력해주세요."></textarea>
            </div>
            <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
            <button type="button" class="btnrwt" id="btn_submit_comment">글쓰기</button>
        </div>
    </form>


    <div class="replyNoticeWrap">
        <div class="btnRt ">
            <a href='#none' onclick="reload();">새로고침</a>
        </div>

        @foreach($arr_base['notice_data'] as $row)
        <ul class="replyNotice">
            <li>
                <div class="ry_info">
                    <span class="notice">공지</span> {{--<span class="date">{{ $row['RegDate'] }}</span> --}}<strong>{{ $row['Title'] }}</strong>
                </div>
                @if(empty($row['AttachData']) === false && $row['AttachData'] != 'N')
                <div class="ry_info">
                    @php $arr_attach_data = json_decode($row['AttachData'],true); @endphp
                    @foreach($arr_attach_data as $f_row)
                        <a href="{{front_url('/promotion/downloadNotice?file_idx=').$f_row['FileIdx'].'&board_idx='.$row['BoardIdx'] }}" target="_blank">
                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$f_row['RealName']}}</a>
                    @endforeach
                </div>
                @endif
                <div class="ry_cont">
                    <div>{!! $row['Content'] !!}
                    {{--<a href="javascript:modify_notice('VIEW',2)" class="rnView">[상세보기]</a>--}}
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>

    
    <div class="replyList">
        <ul>
            @foreach($list as $row)
                <li>
                    @php
                        $emoticon_img = '1588_character';
                        if(empty($arr_input['promotion_code']) === false && $arr_input['promotion_code'] == '1675' && ($row['EmoticonNo'] == 1 || $row['EmoticonNo'] == 2 || $row['EmoticonNo'] == 3)) {
                            $emoticon_img = '1675_character';     // 한덕현 교수 아침 1~3 이모티콘
                        }

                        // 공무원 신기훈 행정법 이모티콘
                        if(empty($arr_input['change_emoticon_img']) === false){
                            if ($arr_input['promotion_code'] == '2267') {
                                $emoticon_img = '50027_character'; //오태진강사
                            } else {
                                $emoticon_img = '500697_character';
                            }
                        }
                    @endphp

                    @if(config_app('SiteCode') == '2001' || config_app('SiteCode') == '2002')
                        <img src="https://static.willbes.net/public/images/promotion/common/character{{ (strlen($row['EmoticonNo']) == 1 ? '0' : '') }}{{ $row['EmoticonNo'] }}.png" title="{{ $row['EmoticonNo'] }}">
                    @elseif(config_app('SiteCode') == '2003' || config_app('SiteCode') == '2004')
                        <img src="https://static.willbes.net/public/images/promotion/common/{{ $emoticon_img . (strlen($row['EmoticonNo']) == 1 ? '0' : '') }}{{ $row['EmoticonNo'] }}.png" title="{{ $row['EmoticonNo'] }}">
                    @endif
                    <div>
                        <p>
                            {!! hpSubString($row['MemName'],0,2,'*') !!}
                            <span>{{$row['RegDatm']}}</span>
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a class="btn-comment-del delBtn" data-comment-idx="{{$row['Idx']}}" href="javascript:void(0);">X</a>
                            @endif
                        </p>
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

    function reload() {
        location.reload();
    }

</script>
@stop