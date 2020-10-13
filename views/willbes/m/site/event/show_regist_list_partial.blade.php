<form id="regi_form_register" name="regi_form_register" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="event_idx" value="{{element('event_idx', $arr_input)}}"/>

    <div class="request">
        <div class="title">신청리스트</div>
        <ul>
            @foreach($arr_base['register_list'] as $row)
                @if($row['RegisterExpireStatus'] == 'Y')
                    @if($data['SelectType'] == 'S')
                        <li><label><input type="radio" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}"> {{$row['Name']}}</label><li>
                    @else
                        <li><label><input type="checkbox" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}" @if($row['PersonLimitType'] == $arr_base['register_limit_type']['limit_true'] && $row['PersonLimit'] <= $row['MemCount']) disabled @endif> {{$row['Name']}}</label><li>
                    @endif
                @else
                    <li>[신청만료]</li>
                @endif
            @endforeach
        </ul>
        <div class="title">신청자정보</div>
        <div class="tx-blue tx12 pl10 mt10">이름, 연락처, 이메일주소를 모두 입력해 주세요.</div>
        <div class="pd10 form">
            <div class="f_left">
                <p class="mb5">
                    <input type="text" id="register_name" name="register_name" maxlength="20" placeholder="이름" value="{{sess_data('mem_name')}}" @if(sess_data('is_login') === true) readonly @endif>
                    <input type="tel" id="register_tel" name="register_tel" maxlength="11" placeholder="휴대폰번호 숫자만 입력" value="{{sess_data('mem_phone')}}">
                </p>
                <p><input type="email" id="register_email" name="register_email" maxlength="30" placeholder="이메일" value="{{sess_data('mem_mail')}}"></p>
            </div>
            <div class="f_right">
                @if($arr_base['register_create_type'] == '1' || $arr_base['register_create_type'] == '2')
                    <a href="#none" id="btn_submit_register">신청하기</a>
                @elseif($arr_base['register_create_type'] == '3' || $arr_base['register_create_type'] == '4')
                    <a class="end">신청완료</a>
                @endif
            </div>
        </div>
    </div>
</form>

<style>
    .request input[type=text] { margin-right: 1px;}
</style>
<script type="text/javascript">
    $(document).ready(function() {
        var $regi_form_register = $('#regi_form_register');

        $('#btn_submit_register').click(function() {
            @if($arr_base['register_create_type'] == '1')
            register_submit();
            @elseif($arr_base['register_create_type'] == '2')
            alert('로그인 후 신청해 주세요.');
            @elseif($arr_base['register_create_type'] == '3')
            alert('신청완료된 이벤트 입니다.');
            @elseif($arr_base['register_create_type'] == '4')
            alert('만료된 이벤트 입니다.');
            @endif
        });

        function register_submit() {
            var _url = '{!! front_url('/event/registerStore') !!}';
            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, addValidate, false, 'alert');
        }

        function addValidate() {
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