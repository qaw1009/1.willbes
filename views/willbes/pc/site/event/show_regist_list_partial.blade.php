<div class="willbes-Leclist c_both mt50">
    <div class="LeclistTable">
        {{--<form id="regi_form_register" name="regi_form_register" method="POST" onsubmit="return false;" novalidate>--}}
        <form id="regi_form_register" name="regi_form_register" method="POST" action="{{ site_url("/event/registerStore") }}" novalidate>
        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
            {!! csrf_field() !!}
            {!! method_field($method) !!}
            <input type="hidden" name="event_idx" value="{{element('event_idx', $arr_input)}}"/>

            <colgroup>
                <col style="width: 110px;">
                <col style="width: 720px;">
                <col style="width: 110px;">
            </colgroup>
            <thead>
            <tr>
                <th class="w-tit" colspan="2">신청리스트</th>
                <th class="w-chk">선택</th>
            </tr>
            </thead>
            <tbody>
            @foreach($arr_base['register_list'] as $row)
                <tr>
                    <td class="w-list tx-left pl20" colspan="2">{{$row['Name']}}</td>
                    <td class="w-chk">
                        @if($data['LimitType'] == 'S')
                            <input type="radio" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}">
                        @else
                            <input type="checkbox" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}" @if($row['PersonLimitType'] == $arr_base['register_limit_type']['limit_true'] && $row['PersonLimit'] <= $row['MemCount']) disabled @endif>
                        @endif
                    </td>
                </tr>
            @endforeach
            <tr class="userInfoBox">
                <th><strong>신청자정보</strong></th>
                <td class="w-list tx-left pl20" colspan="2">
                    · 이름, 연락처, 이메일주소를 모두 입력해 주세요.<br/>
                    <input type="text" id="register_name" name="register_name" class="iptName" maxlength="20" placeholder="이름" style="width: 110px;" value="최현탁">
                    <input type="text" id="register_tel" name="register_tel" class="iptTel" maxlength="11" placeholder="휴대폰번호('-'없이 입력)" style="width: 220px;" value="01012341234">
                    <input type="text" id="register_email" name="register_email" class="iptEmail" maxlength="30" placeholder="이메일" style="width: 220px;" value="abcd@aaaaa.com">
                    <button type="button" id="btn_submit_register" class="mem-Btn combine-Btn {{($arr_base['register_create_type'] == '3') ? 'bg-purple-gray bd-dark-gray' : 'bg-blue bd-dark-blue'}}">
                        @if($arr_base['register_create_type'] == '1')
                            <span>신청하기</span>
                        @elseif($arr_base['register_create_type'] == '2')
                            <span>신청하기</span>
                        @elseif($arr_base['register_create_type'] == '3')
                            <span>신청완료</span>
                        @endif
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var $regi_form_register = $('#regi_form_register');
        var limit_type = '{{$data['LimitType']}}';

        $('#btn_submit_register').click(function() {
            @if($arr_base['register_create_type'] == '1')
                register_submit();
            @elseif($arr_base['register_create_type'] == '2')
                alert('로그인 후 신청해 주세요.');
            @elseif($arr_base['register_create_type'] == '3')
                alert('신청완료되었습니다.');
            @endif
        });

        function register_submit() {
            var _url = '{!! site_url('/event/registerStore') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }
            $regi_form_register.submit();
            /*ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, addValidate, false, 'alert');*/
        }

        function addValidate() {
            var inputBox_type;
            if (limit_type == 'S') { inputBox_type = 'radio'; } else { inputBox_type = 'checkbox'; }

            if ($('input:'+inputBox_type+'[name="register_chk[]"]').is(':checked') === false) {
                alert('특강을 선택해 주세요');
                return false;
            }

            if ($('#register_name').val() == '') {
                alert('이름을 입력해 주세요.');
                return false;
            }

            if ($('#register_tel').val() == '') {
                alert('휴대폰번호를 입력해 주세요.');
                return false;
            }

            if ($('#register_email').val() == '') {
                alert('이메일주소를 입력해 주세요.');
                return false;
            }
            return true;
        }
    });
</script>