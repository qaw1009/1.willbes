@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:url("https://static.willbes.net/public/images/promotion/2022/09/2771_bg.jpg") center top;   
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/09/2771_top_bg.jpg") no-repeat center top; height:1210px}
    .evt_top span {position: absolute; left:50%; z-index: 2;}
    .evt_top span.img01 {top:300px; margin-left:-500px}
    .evt_top span.img02 {top:280px; margin-left:50px}

    .evt01 .urlBox {width:1120px; margin:0 auto; background:#fff; border-radius:20px}

    .evt02 .point {font-size:16px; margin-top:100px; line-height:1.5}
    .evt02 .point h5 {font-size:24px; font-weight:bold; color:#fff}
    .evt02 .point div {width:900px; margin:50px auto; background:#fff; border-radius:10px; padding:50px; font-size:20px}
    .evt02 .point input {width:100px; color:#000; border:1px solid #000}
    .evt02 .point div a {display:block; padding:20px; background:#000; font-size:18px; color:#fff; border-radius:50px; width:70%; margin:20px auto 0}
    .evt02 .point div a:hover {background:#3e0763}
    .textinfo {color:#fff; line-height:1.5; font-size:20px} 
    .textinfo p {font-size:14px}
    .textinfo strong {color:#00fffc}
    .textinfo strong:nth-child(1) {color:#ffd800}

    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">
        <input type="hidden" id="_exam_type" name="_exam_type" value="N">
        <input type="hidden" id="_pr_id" name="_pr_id">

        <div class="evtCtnsBox evt_top">
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/09/2771_top_img1.png" alt="psat 합격을 예측하다"></span>
            <span class="img02" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/09/2771_top_img2.png" alt=""></span>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">            
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2771_01.png" alt="이벤트 하나">  
                <a href="#url" title="UP!" style="position: absolute; left: 47.14%; top: 14.74%; width: 22.23%; height: 3.69%; z-index: 2;"></a> 
                <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute; left: 35.8%; top: 88.94%; width: 10.89%; height: 2.09%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="소문내기 다운" style="position: absolute; left: 47.14%; top: 88.89%; width: 16.61%; height: 2.09%; z-index: 2;"></a>                      
            </div>   
            <div id="url" class="urlBox">
                {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
                @endif
            </div>     
        </div>


        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}

                <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
                <input type="hidden" name="register_name" value="{{sess_data('mem_name')}}">
                <input type="hidden" name="register_tel" value="{{sess_data('mem_phone')}}">
                <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="target_param_names[]" value="예상 합격 점수"/> {{-- 체크 항목 전송 --}}
                <input type="hidden" name="register_chk[]" id="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>

                <img src="https://static.willbes.net/public/images/promotion/2022/09/2771_02.png" alt="이벤트 둘">
                <div class="point">                   
                    <h5>Q. 내가 생각하는 예쌍 합격컷은?</h5>
                    <div>
                        예상 합격 점수 (평균값) <input class="score" type="text" maxlength="3" name="register_data1" oninput="maxLengthCheck(this);" value="{{ (empty($register_count[0]['EtcValue']) === false ? $register_count[0]['EtcValue'] : '') }}"> 점
                        <a href="javascript:void(0);" onclick="fn_submit(); return false;">합격 점수 예상하기 ></a>
                    </div>
                </div>
                <div class="textinfo">
                    이벤트 기간 <strong>~ 7/27(수) 자정까지</strong> 당첨자 발표 <strong>9/2(금) 개별 발표</strong>
                    <p>※ 합격컷 발표 이후 정답자에 한해 추첨을 통해 상품이 지급됩니다. (지급일 : 9/7(수))</p>
                </div>
            </form>
        </div>

        
        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2771_03.png" alt="이벤트 셋">
                <a href="javascript:void(0);" onclick="popup();" title="인증+등록하기" style="position: absolute; left: 22.77%; top: 68.82%; width: 54.73%; height: 9.75%; z-index: 2;"></a>
            </div>
        </div>

    </div>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <!-- googlechart -->
    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}

    <script src="/public/vendor/Nwagon/Nwagon.js?ver={{time()}}"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css?ver={{time()}}">

    <script type="text/javascript">
        $(document).ready(function(){
            AOS.init();
            /*상단 tab*/
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    if ($(this).attr('href') == '#tab03' || $(this).attr('href') == '#tab04') {
                        if ($("#_pr_id").val() == '') {
                            alert('기본정보 및 답안입력 후 확인 가능합니다.');
                            return false;
                        }

                        if ($("#_exam_type").val() != 'Y') {
                            alert('답안채점 후 확인 가능합니다.');
                            return false;
                        }
                    }

                    $links.removeClass('active');
                    $('.main_content').hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
            ajaxHtml2('{{$arr_promotion_params['PredictIdx']}}', '{{$arr_promotion_params['SsIdx']}}');
        });

        function ajaxHtml2(predict_idx, ss_idx) {
            var data = {
                'predict_idx' : predict_idx,
                'ss_idx' : ss_idx
            };
            sendAjax('{{front_url('/fullService/ajaxHtml2')}}', data, function(d) {
                $("#tab02").html(d);
            }, showAlertError, false, 'GET', 'html', false);
        }

        /*팝업 */
        function popup(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) .'?cert='. $arr_promotion_params['cert'] }}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
        }

        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}


            if ($regi_form_register.find('input[name="register_data1"]').val() == '') {
                alert('예상되는 합격 점수를 입력해 주세요.');
                return;
            }

            if (!confirm('이벤트에 참여 하시겠습니까?')) { return; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['이미 신청하셨습니다.','이미 신청하셨습니다.'],
                ['신청 되었습니다.','이벤트 참여가 완료되었습니다.'],
                ['처리 되었습니다.','처리 되었습니다.'],
                ['마감되었습니다.','마감되었습니다.']
            ];
            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        function maxLengthCheck(object) {
            if($(object).prop('type') == 'number') {
                object.value = object.value.replace(/[^0-9.]/g, "");
            }
            if (object.value > 100) {
                object.value = '';
            }
        }
    </script>
    
<!-- End Container -->

{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop