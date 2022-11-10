@extends('willbes.m.layouts.master_no_sitdbar')

@section('content')
    <style>

    </style>

    <div class="reply">
        <form id="regi_form_comment" name="regi_form_comment" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            @foreach($arr_base['set_params '] as $key => $val)
                <input type="hidden" name="{{$key}}" value="{{$val}}"/>
            @endforeach
            @if(empty($arr_base['write_yn']) === true)
                <div class="replyWrite">
                    <textarea id="event_comment" name="event_comment" cols="30" rows="3" onclick="loginCheck('{{ sess_data('is_login') }}')"></textarea>
                    <div class="mt10">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</div>
                    <div class="mt10">
                        <span id="content_byte"><i>0</i> byte</span>
                        <a type="button" class="btnrwt" id="btn_submit_comment">글쓰기</a>
                    </div>
                </div>
            @endif
            <ul class="replyList">
                @foreach($list as $row)
                    <li>
                        <div class="ryw_info">
                            <strong>{!! hpSubString($row['MemName'],0,2,'*') !!}</strong> <span class="date">{{$row['RegDay']}}</span>
                            @if(sess_data('is_login') === true && sess_data('mem_idx') === $row['MemIdx'])
                                <a href="javascript:void(0);" class="rpDel btn-comment-del" data-comment-idx="{{$row['Idx']}}">삭제</a>
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
        </form>
    </div>

    <script type="text/javascript">
        var $regi_form_comment = $('#regi_form_comment');
        var $login_url = "{{$arr_base['login_url'] or ''}}";

        $(document).ready(function() {
            // 문자 바이트 수 계산
            $('#event_comment').on('change keyup', function() {
                var _byte = fn_chk_byte($(this).val());
                $('#content_byte i').text(_byte);
            });

            $('#btn_submit_comment').click(function() {
                @if($arr_base['comment_create_type'] == '1')
                comment_submit();
                @elseif($arr_base['comment_create_type'] == '2')
                loginCheck();
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
            // 설문조사 체크여부
            var survey_count = "{{$arr_base['survey_count'] or 0}}";
            var survey_chk_yn = "{{$arr_base['survey_chk_yn']}}";
            var min_byte = "{{empty($arr_base['min_byte']) === true ? 'null' : $arr_base['min_byte']}}";
            var max_byte = "{{empty($arr_base['max_byte']) === true ? 'null' : $arr_base['max_byte']}}";

            if(survey_chk_yn == 'Y'){
                if(survey_count == 0){
                    alert('설문조사 참여 후, 댓글 등록이 가능합니다.');
                    return false;
                }
            }

            if ($('#event_comment').val() == '') {
                alert('댓글을 입력해 주세요.');
                return false;
            }

            return chk_byte(min_byte, max_byte);
            return true;
        }

        function chk_byte(min_byte, max_byte){
            var str = $('#event_comment').val();
            var rbyte = 0;
            var strTxt = "";
            var strComment = "";
            var one_char = "";
            var check = false;
            var msg = '';

            for (i = 0; i < str.length; i++){
                //체크 하는 문자를 저장
                strTxt = str.substr(i,1)
                one_char = str.charAt(i);

                if(escape(one_char).length > 4){
                    rbyte += 2; //한글2Byte
                }else{
                    rbyte++;    //영문 등 나머지 1Byte
                }
            }

            if (min_byte != 'null' && rbyte < min_byte) {
                check = true;
                msg = min_byte + 'byte 이상 입력해 주세요.';
            }

            if (max_byte != 'null' && rbyte > max_byte) {
                check = true;
                msg = '댓글은 ' + max_byte + 'byte이내로 입력 가능합니다.';
            }

            if(check === true){
                /*$('#event_comment').val(strComment);
                $('#content_byte i').text(0);*/
                alert(msg);
                return false;
            }else{
                return true;
            }
        }

        function reload() {
            location.reload();
        }

        function loginCheck(is_login){
            if(!is_login && $login_url){
                alert('로그인해 주세요.');
                window.parent.location.href = $login_url;
            }
            return true;
        }
    </script>
@stop