<div class="willbes-Layer-PassBox willbes-Layer-PassBox420 h470 fix">
    <form id="epopup_regi_form_register" name="epopup_regi_form_register" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="event_idx" value="{{$data['ElIdx']}}"/>
        <input type="hidden" name="register_chk[]" value="{{$arr_base['register_list'][0]['ErIdx']}}"/>

        <a class="closeBtn" href="#none" onclick="closeWin('APPLYPASS')">
            <img src="{{ img_url('sub/close.png') }}">
        </a>
        <div class="Layer-Tit tx-dark-black NG">{{$data['EventName']}}</div>

        <div class="lecMoreWrap">
            <div class="PASSZONE-List widthAutoFull userInfoBox">
                <input type="text" id="epopup_register_name" name="register_name" class="iptName" maxlength="20" placeholder="이름" style="width: 260px;"><br/>
                <input type="text" id="epopup_register_tel" name="register_tel" class="iptTel" maxlength="11" placeholder="휴대폰번호('-'없이 입력)" style="width: 260px;"><br/>
                <input type="text" id="epopup_register_email" name="register_email" class="iptEmail" maxlength="30" placeholder="이메일" style="width: 260px;"><br/>
                <button type="button" id="epopup_btn_submit_register" class="mem-Btn combine-Btn {{($arr_base['register_create_type'] == '3' || $arr_base['register_create_type'] == '4') ? 'bg-purple-gray bd-dark-gray' : 'bg-blue bd-dark-blue'}}">
                    @if($arr_base['register_create_type'] == '1')
                        <span>신청하기</span>
                    @elseif($arr_base['register_create_type'] == '2')
                        <span>신청하기</span>
                    @elseif($arr_base['register_create_type'] == '3')
                        <span>신청완료</span>
                    @elseif($arr_base['register_create_type'] == '4')
                        <span>신청만료</span>
                    @endif
                </button>
            </div>
        </div>
    </form>

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['banner'], $data['data_comment_use_area']) === true)
    <form id="epopup_regi_form_comment" name="epopup_regi_form_comment" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="event_idx" value="{{$data['ElIdx']}}"/>
        <div class="LeclistTable p_re pt20">
            <table cellspacing="0" cellpadding="0" class="listTable evtTable upper-gray upper-black bdb-gray tx-gray">
                <colgroup>
                    <col style="width: 300px;">
                    <col style="width: 70px;">
                </colgroup>
                <thead>
                <tr>
                    <th class="w-textarea pl20 pt25">
                        <textarea id="epopup_event_comment" name="event_comment" class="form-control" rows="15" title="댓글" placeholder="댓글을 입력해 주세요."></textarea>
                    </th>
                    <th class="w-btn pr20 pt25">
                        <button type="button" id="epopup_btn_submit_comment" class="mem-Btn combine-Btn {{($arr_base['comment_create_type'] == '3') ? 'bg-purple-gray bd-dark-gray' : 'bg-blue bd-dark-blue'}}">
                            <span>등록</span>
                        </button>
                    </th>
                </tr>
                <tr>
                    <td class="w-list tx-left pl20 bd-none" colspan="2">* 지나친 도배, 욕설, 주제와 상관없는 글은 예고 없이 관리자에 의해 삭제될 수 있습니다.</td>
                </tr>
                </thead>
            </table>
        </div>
    </form>
    @endif
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var $epopup_regi_form_register = $('#epopup_regi_form_register');
        var $epopup_regi_form_comment = $('#epopup_regi_form_comment');
        var limit_type = '{{$data['LimitType']}}';

        $('#epopup_btn_submit_register').click(function() {
            @if($arr_base['register_create_type'] == '1')
            epopup_register_submit();
            @elseif($arr_base['register_create_type'] == '2')
            alert('로그인 후 신청해 주세요.');
            @elseif($arr_base['register_create_type'] == '3')
            alert('신청완료된 이벤트 입니다.');
            @elseif($arr_base['register_create_type'] == '4')
            alert('만료된 이벤트 입니다.');
            @endif
        });

        $('#epopup_btn_submit_comment').click(function() {
            @if($arr_base['comment_create_type'] == '1')
            epopup_comment_submit();
            @elseif($arr_base['comment_create_type'] == '2')
            alert('회원만 댓글을 등록할 수 있습니다.');
            @elseif($arr_base['comment_create_type'] == '3')
            alert('만료된 이벤트 입니다.');
            @endif
        });

        function epopup_register_submit() {
            var _url = '{!! site_url('/event/registerStore') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($epopup_regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    closeWin('APPLYPASS');
                }
            }, showValidateError, _registerAddValidate, false, 'alert');
        }

        function _registerAddValidate() {
            var inputBox_type;
            if (limit_type == 'S') { inputBox_type = 'radio'; } else { inputBox_type = 'checkbox'; }

            if ($('#epopup_register_name').val() == '') {
                alert('이름을 입력해 주세요.');
                return false;
            }

            if ($('#epopup_register_tel').val() == '') {
                alert('휴대폰번호를 입력해 주세요.');
                return false;
            }

            if ($('#epopup_register_email').val() == '') {
                alert('이메일주소를 입력해 주세요.');
                return false;
            }
            return true;
        }

        function epopup_comment_submit() {
            var _url = '{!! site_url('/event/commentStore') !!}';
            if (!confirm('등록하시겠습니까?')) { return true; }
            ajaxSubmit($epopup_regi_form_comment, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    /*location.reload();*/
                }
            }, showValidateError, _commentAddValidate, false, 'alert');
        }

        function _commentAddValidate() {
            if ($('#event_comment').val() == '') {
                alert('댓글을 입력해 주세요.');
                return false;
            }
            return true;
        }
    });
</script>