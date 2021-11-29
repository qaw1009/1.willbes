@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#dbf1e5}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_03_bg.jpg) no-repeat center top;}

        .evt03 .entry {width:940px; position:absolute; top:1335px; left:50%; margin-left:-470px; z-index: 10;}
        .evt03 .entry table {width:500px; border-top:1px solid #c8c8c8; border-right:1px solid #c8c8c8;}
        .evt03 .entry th,
        .evt03 .entry td {padding:17px 15px; font-size:18px; border-bottom:1px solid #c8c8c8; border-left:1px solid #c8c8c8; line-height:1.2}
        .evt03 .entry th {background:#58bb85; color:#fff; font-weight:bold}
        .evt03 .entry td {text-align:left; color:#676767}
        .evt03 .entry input,
        .evt03 .entry select {width:100%}
        .evt03 .entry input::-webkit-input-placeholder {
        color: #ccc;
        }
        .evt03 .entry input:-moz-placeholder {
        color: #ccc;
        }

        .evt04 {background:#dbf1e5}

        .evt05 {width:1120px; margin:0 auto;}

        .evt06 {background:#fdfdfd}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2021/11/2424_sky01.png" alt="일정안내" ></a>
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2021/11/2424_sky02.png" alt="신청하기" ></a>
        </div>  

        <div class="evtCtnsBox eventTop">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_top.jpg" alt="퀵 서머리 한정판매"/>
                <a href="http://naver.me/xlW17yJK" target="_blank" title="위치보기" style="position: absolute; left: 33.48%; top: 41.02%; width: 33.21%; height: 5.41%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_01.jpg" alt="퀵 서머리 혜택"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_02.jpg" alt="퀵 서머리 특징"/>
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}
            <input type="hidden" name="register_name" value="{{sess_data('mem_name')}}" title="성명" />
            <input type="hidden" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" />
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data3"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params_item[]" value="false"/>
            <input type="hidden" name="target_params_item[]" value="false"/>
            <input type="hidden" name="target_params_item[]" value="false"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <div class="evtCtnsBox evt03 p_re" id="evt03">
                <div class="entry">
                    {{--
                    <table>
                        <col width="180"/>
                        <col  />
                        <tbody>
                            <tr>
                                <th>이름</th>
                                <td>{{sess_data('mem_name')}}</td>
                            </tr>
                            <tr>
                                <th>윌비스 ID</th>
                                <td>{{sess_data('mem_id')}}</td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td>{{sess_data('mem_phone')}}</td>
                            </tr>
                            <tr>
                                <th>출신학교</th>
                                <td><input type="text" class="register-data register-text" name="register_data1" autocomplete="off" maxlength="40" placeholder="선택입력"/></td>
                            </tr>
                            <tr>
                                <th>출신학과</th>
                                <td><input type="text" class="register-data register-text" name="register_data2" autocomplete="off" maxlength="40" placeholder="선택입력"/></td>
                            </tr>
                            <tr>
                                <th>응시횟수</th>
                                <td><input type="text" class="register-data register-text" name="register_data3" autocomplete="off" maxlength="40" placeholder="선택입력"></td>
                            <tr>
                                <th>
                                    희망응시지역
                                    <div class="tx14">(* 필수입력)</div>
                                </th>                               
                                <td>
                                    <select class="register-data" name="register_chk[]" title="응시지역">
                                        <option value="">응시지역</option>
                                        @foreach($arr_base['register_list'] as $row)
                                            <option value="{{$row['ErIdx']}}">{{ $row['Name'] }}</option>
                                        @endforeach
                                    </select>
                                </td>                                
                            </tr>
                        </tbody>
                    </table>
                    --}}
                </div>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_03.jpg" alt="퀵 서머리 특징"/>
                    {{--
                    <a href="javascript:void(0);" title="신청" onclick="fn_submit(); return false;" style="position: absolute; left: 22.68%; top: 87.05%; width: 25.98%; height: 3.96%; z-index: 2;"></a>
                    <a href="javascript:void(0);" title="리셋" onclick="reset(); return false;" style="position: absolute; left: 51.25%; top: 87.05%; width: 25.98%; height: 3.96%; z-index: 2;"></a>
                    --}}
                </div>
            </div>
        </form>

        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_04.jpg" alt="퀵 서머리 특징"/>
        </div>

        <div class="evtCtnsBox evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_05.jpg" alt="유의사항"/>  
                <a href="javascript:void(0);" onclick="copyTxt();"  title="주소복사하기" style="position: absolute; left: 68.93%; top: 45.4%; width: 25.71%; height: 23.12%; z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute; left: 68.93%; top: 69.08%; width: 25.71%; height: 23.12%; z-index: 2;"></a>               
            </div>
            <div class="urlWrap">
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
                @endif
            </div>
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_06.jpg" alt="퀵 서머리 특징"/>
        </div>
        
    </div>
    <!-- End Container -->


    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

    <script type="text/javascript">
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';
            var _check, _check2 = true;
            var _max_byte = 32;

            $.each($(".register-text"), function(index, item) {
                if (checkSpecial($(this).val()) == true) {
                    _check = false;
                    return false;
                }
                if (fn_chk_byte($(this).val()) > _max_byte) {
                    _check2 = false;
                    return false;
                }
            });

            if (_check == false) {
                alert('특수문자는 입력할 수 없습니다.');
                return false;
            }

            if (_check2 == false) {
                alert('32byte까지 입력 가능합니다.');
                return false;
            }

            if ($.trim($regi_form_register.find('select[name="register_chk[]"]').val()) == '') {
                alert('희망응시지역을 선택해주세요.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function reset() {
            $(".register-data").val('');
        }
    </script>
@stop