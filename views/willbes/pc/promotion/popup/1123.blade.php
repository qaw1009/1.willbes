<div id="popup" class="Pstyle" alt="닫기">
    <span class="b-close"></span>
    <div class="popcontent">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field($arr_base['method']) !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $arr_base['data']['ElIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_date"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_hour"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="상담 예약날짜"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="상담 시간"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>


            <h2>윌비스 관리반 상담신청</h2>
            <div class="inBx_con">
                <h3>상담구분</h3>
                <ul>
                    @foreach($arr_base['register_list'] as $row)
                        <li><span class="tit"> - {{ $row['Name'] }}</span>
                            {{--<input type="radio" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}">--}}
                            @if($arr_base['data']['LimitType'] == 'S')
                                <input type="radio" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}">
                            @else
                                <input type="radio" name="register_chk[]" class="goods_chk" value="{{$row['ErIdx']}}">
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="inBx_con">
                <h3>상담자 정보 입력</h3>
                <ul>
                    <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer1.png" alt="성명"/></span>
                        <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" style="width:200px; height:30px;" >
                    </li>
                    <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer2.png" alt="전화번호"/></span>
                        <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" style="width:200px; height:30px;" >
                    </li>
                    <li><span class="tit"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_pop_layer3.png" alt="상담예약"/></span>
                        <input type="text" id="register_date" name="register_date" class="iptDate datepicker" maxlength="10" autocomplete="off" style="width:130px; height:30px;">
                        <select id="register_hour" name="register_hour" style="width:66px; height:30px;">
                        @for ($i=9; $i<=18; $i++)
                            @php $h = ''; @endphp
                            @if(strlen($i) == 1)
                                @php $h = 0; @endphp
                            @endif
                            <option value="{{ $h . $i }}">{{ $h . $i }}시</option>
                        @endfor
                        </select>
                    </li>
                </ul>
            </div>
            <p class="btn_lec"><a href="javascript:fn_submit();"><img src="http://file3.willbes.net/new_gosi/2018/04/EV180426_btn_go.png" alt="신청하기"/></a></p>
        </form>
    </div>
</div>

<script>
    $('#register_date').datepicker({
        beforeShow:function(input) {
            this.css({
                "position": "relative",
                "z-index": 999999
            });
        }
    });

    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        if (!confirm('저장하시겠습니까?')) { return true; }
        ajaxSubmit($regi_form_register, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                location.reload();
            }
        }, showValidateError, null, false, 'alert');
    }
</script>