@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2323_top_bg.jpg) no-repeat center top;}
        
        .event01 {background:#17a2fd; padding-bottom:100px}
        .event01 .wrap {width:1120px; margin:0 auto; display:flex; justify-content: space-between;}
        .event01 .wrap a {display:block; background:#050519; color:#fff; font-size:30px; padding:20px 30px; width:500px; margin:0 auto; border-radius:40px}
        .event01 .wrap a span {color:#31ffce; vertical-align:top}
        .event01 .wrap a:hover {background:#fe4e2c; color:#000}

        .event02 {background:#a2999a; padding:100px 0; line-height:1.4; font-size:14px; color:#666}
        .event02 .widthAuto {width:980px !important; margin:0 auto}
        .event02 .head_title {font-size:56px; color:#fff;}
        .event02 .head_title p {font-size:38px; color:#430303;}
        .event02 .head_title span {font-size:20px;}
        .event02 input {padding:10px 20px ; width:100%; border:1px solid #440203;}
        .event02 textarea {width:100%; padding:20px; border:1px solid #440203; color:#666}

        .event02 .btns {margin-top:40px}
        .event02 .btns a {display:inline-block; width:200px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#440203; margin:0 10px;}
        .event02 .btns a:last-child {background:#5f524c}
        .event02 .btns a:hover {background:#000}

        .evt_table {margin-top:100px; text-align:left}
        .evt_table .w-list {background:#fff; padding:20px; margin-bottom:5px}
        .evt_table .w-list .title {border-bottom:1px solid #f0f0f0; padding-bottom:10px; margin-bottom:10px; color:#440203; font-size:16px}
        .evt_table .w-list .title strong {margin-right:10px }
        .evt_table .w-list .title div {float:right; font-size:14px}
        .evt_table .w-list .title .r-line {color:#ccc; padding:0 10px; vertical-align:bottom}
        .evt_table .w-list .title a {font-size:12px; padding:3px 5px; color:#fff; background:#440203}
        .event02 .Paging li a {color:#fff; font-size:14px}
        .event02 .Paging li a.on {color:#440203}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/08/2323_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<div class="wrap NSK-Black">
                <a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/184440" target="_blank"><span>도장깨기 특강</span> 신청 바로가기 ></a>
            </div>
        </div>
        <div id="WrapReply"></div>

        <div class="evtCtnsBox event02">
            <div class="widthAuto">
                <div class="head_title NSK-Black">
                    전공음악 다이애나
                    <p>개년 기출문제 풀이 "도장깨기 특강" (2019~2021학년도)</p>
                    <span class="NSK">📝 로그인 하신 후 수강후기를 지금 남겨주세요.
                    </span>
                </div>
                <form name="regi_form_register" id="regi_form_register">
                    {!! csrf_field() !!}
                    {!! method_field('POST') !!}
                    <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                    <input type="hidden" name="register_type" value="promotion"/>
                    <input type="hidden" name="file_chk" value="N"/>
                    <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or "" }}"/>
                    <input type="hidden" id="register_name" name="register_name" value="{{ sess_data('mem_name') }}" readonly="readonly"/>
                    <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
                    <input type="hidden" name="register_overlap_chk" value="Y"> {{-- 중복 신청 가능여부 --}}

                    <div class="mt50">
                        <input type="text" id="etc_title" name="etc_title" maxlength="100" placeholder="{{ (sess_data('is_login') != true) ? '로그인 후 이용해주세요.' : '제목을 입력하세요.' }}"/>
                    </div>
                    <div class="mt10">
                        <textarea id="etc_data" name="etc_data" cols="30" rows="5" title="댓글" placeholder="{{ (sess_data('is_login') != true) ? '로그인 후 이용해주세요.' : '수강후기를 남겨 주세요~~!' }}"></textarea>
                    </div>
                    <div class="btns">
                        <a href="javascript:void(0);" onclick="fn_submit();">후기 등록</a>
                        <a href="javascript:void(0);" onclick="reset_form(this);">초기화</a>
                    </div>
                </form>

                <div class="evt_table mt100" id="studyCertWrap"></div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var $regi_form_register = $('#regi_form_register');

        $(document).ready(function() {
            fnRegisterList();
        });

        function fnRegisterList(page,search_type,search_value,move){
            var _url = '{{ site_url('/event/listRegisterAjax') }}';
            var data = {
                'el_idx' : '{{ $data['ElIdx'] }}',
                'search_type' : search_type,
                'search_value' : search_value,
                'file_type': '_study',
                'limit' : 15,
                'page' : page,
            };
            sendAjax(_url, data, function(ret) {
                if (ret) {
                    $("#studyCertWrap").html(ret);
                    if(move){
                        var offset = $("#studyCertWrap").offset();
                        $('html, body').animate({scrollTop : offset.top}, 400)
                    }
                }
            }, showAlertError, false, 'GET', 'html');
        }

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){ alert('강의 신청후 수강후기 작성이 가능합니다.'); return; }

            if ($regi_form_register.find('input[name="etc_title"]').val() == '') {
                alert('제목을 입력해주세요.');
                return false;
            }

            if ($regi_form_register.find('textarea[name="etc_data"]').val() == '') {
                alert('내용을 입력해주세요.');
                return false;
            }

            var _url = '{!! front_url('/event/registerStore') !!}';
            if (confirm('등록 후 수정이 불가능합니다. 후기등록 하시겠습니까?')) {
                ajaxSubmit($regi_form_register, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert('등록되었습니다.');
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            }
        }

        function reset_form(elem){
            $(elem).closest('form').get(0).reset();
        }
    </script>
@stop