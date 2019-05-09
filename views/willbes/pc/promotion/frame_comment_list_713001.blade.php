@extends('willbes.pc.layouts.master_no_sitdbar')
@section('content')
<style type="text/css">
.replySection { 
    width:1000px; 
    margin:30px auto 100px; 
    font-size:12px; 
    line-height: 1.4;
}
.replyWrite {
    position:relative; border:1px solid #ababab;
}	
.replyWrite .textarBx {
    border-bottom:1px solid #eaeaea; padding:10px;
}		
.replyWrite .textarBx textarea {
    float:left;
    width:100%;
    height:80px;
    overflow-y: auto;
    border:0;  
}

.replyWrite .textarBx:after {
    content: '';
    display: block;
    clear:both;
}
.replyWrite p {
    margin:0 0 0 20px; color:#999; text-align:left; height:42px; line-height:42px; 
}
.replyWrite .btnrwt {    
    position: absolute; bottom:0; right:0;
    width:70px; border-left:1px solid #eaeaea; display:block; height:42px; line-height:42px; color:#333; background:#fff;
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

.replyList {
    margin-top:30px;
}
.replyList .ryw_info {
    padding: 10px;
    border-bottom: 1px solid #e0e0e0;
    color:#555;
}
.replyList .ryw_info strong {
    margin-right: 10px
}
.replyList .ryw_cont {
    padding: 10px;
    color:#555;
    background: #fafafa;
    border-bottom:1px solid #999;
}
</style>
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
                </div>
                <p> * 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다. </p>
                <button type="button" class="btnrwt" id="btn_submit_comment">글쓰기</button>
            </div>

            <!--댓글공지-관리자만 등록,수정,삭제 가능-->
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
            <!-- replyNoticeWrap//-->

            <ul class="replyList">
                @foreach($list as $row)
                    <li>
                        <div class="ryw_info">
                            <strong>{!! hpSubString($row['MemName'],0,2,'*') !!}</strong> <span class="date">{{$row['RegDay']}}</span>
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

    function reload() {
        location.reload();
    }
</script>

@stop