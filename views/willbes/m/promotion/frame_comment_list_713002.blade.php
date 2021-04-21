@extends('willbes.m.layouts.master_no_sitdbar')

@section('content')
    <style>
        .urlReply {font-size:14px; padding:0 20px; line-height:1.5;margin-top:20px}
        .urlReply input {width:100%; padding:10px;}
        .urlReply .urlReplyW {border-top:2px solid #333; border-bottom:1px solid #e4e4e4; padding:20px 0}
        .urlReply .urlReplyW .title {font-size:16px; margin-bottom:10px}
        .urlReply .btn {margin-top:10px}
        .urlReply .btn a {display:block; border-radius:5px; background:#333; color:#fff; padding:15px; font-size:16px; text-align:center}
        .urlReplyList li {padding:10px 0; border-bottom:1px solid #e4e4e4; position:relative; color:#666}
        .urlReplyList li span {position:absolute; right:0; top:10px; z-index: 1;}
        .urlReplyList li span a {display:block; width:22px; height:22px; line-height:22px; border:1px solid #ccc; border-radius:2px; text-align:center}
    </style>

    <div class="urlReply">
        <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            @foreach($arr_base['set_params '] as $key => $val)
                <input type="hidden" name="{{$key}}" value="{{$val}}"/>
            @endforeach

            <div class="urlReplyW">
                <div class="title">홍보 URL 남기기</div>
                <div><input type="text" name="event_comment" id="event_comment" placeholder="홍보 URL 남기기"></div>
                <div class="btn"><a href="javascript:void(0);" class="btnrwt" id="btn_submit_comment">이벤트 참여하기 ></a></div>
            </div>
            <div class="urlReplyList">
                <ul>
                    @if(empty($list) === true)
                        <li class="tx-center">
                            등록된 내용이 없습니다.
                        </li>
                    @else
                        @foreach($list as $row)
                            <li>
                                <div>{!! hpSubString($row['MemId'],0,2,'*') !!}</div>
                                {!! hpSubString($row['Content'], 0, 10, '*********************') !!}
                                @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                    <span class="NSK-Black"><a href="javascript:void(0);" class="btn-comment-del" data-comment-idx="{{$row['Idx']}}">X</a></span>
                                @endif
                            </li>
                        @endforeach
                    @endif
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

                    @if(empty($arr_base['login_url']) === false)
                        window.parent.location.href = "{{$arr_base['login_url']}}";
                    @endif
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

            var confirm_commnet_msg = '등록하시겠습니까?';
            @if(empty($give_timing) === false && $give_timing == 'comment')
                confirm_commnet_msg = '쿠폰이 발급 됩니다. 댓글을 등록하시겠습니까?';
            @endif

            var _url = '{!! front_url('/promotion/commentStore') !!}';
            if (!confirm(confirm_commnet_msg)) { return true; }
            ajaxSubmit($regi_form_comment, _url, function(ret) {
                if(ret.ret_cd) {
                    @if(empty($give_timing) === false && $give_timing == 'comment')
                    if(parent.giveCheck){
                        parent.giveCheck();
                    }else{
                        alert('쿠폰 발급 도중 오류가 발생하였습니다.');
                    }
                    @else
                    location.reload();
                    @endif
                }
            }, showValidateError, addValidate, false, 'alert');
        }

        function addValidate() {
            if ($('#event_comment').val() == '') {
                alert('홍보 URL을 입력해 주세요.');
                return false;
            }

            if (validUrl($('#event_comment').val()) == false) {
                alert('형식에 맞지않는 URL 입니다.');
                return false;
            }
            return true;
        }

        //URL 패턴 검사
        function validUrl(url) {
            var pattern = new RegExp('^(http:\\/\\/www\\.|https:\\/\\/www\\.|http:\\/\\/|https:\\/\\/)?[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}(:[0-9]{1,5})?(\\/.*)?$');
            return pattern.test(url);
        }
    </script>
@stop