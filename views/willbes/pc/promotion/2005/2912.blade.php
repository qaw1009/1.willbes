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
            background:url("https://static.willbes.net/public/images/promotion/2022/11/2810_bg.jpg") center top;      
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #fff}*/

    /************************************************************/

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/11/2810_top_bg.jpg") no-repeat center top; height:1137px}
    .evt_top span {position: absolute; left:50%; z-index: 2;}
    .evt_top span.img01 {top:300px; margin-left:-500px}
    .evt_top span.img02 {top:280px; margin-left:50px}


    /*전체 탭*/


    .tab_content {background:#fff; padding:100px 0}
    .tab_content:first-child {}

    .wbox {width:1100px; margin:0 auto; background:#fff; border-radius:10px} 

    .evt_00 {color:#fff; width:1120px; margin:0 auto; }
    .evt_00 ul {background:#10002c; font-size:24px; line-height:1.5; padding:30px; margin:0 120px; text-align:left; border-radius:6px; color:#00fffd}
    .evt_00 ul li:nth-child(1) {color:#ffe400; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top;}
    @@keyframes upDown{
        from{color:#ffe400}
        50%{color:#fff}
        to{color:#ffe400}
    }
    @@-webkit-keyframes upDown{
        from{color:#ffe400}
        50%{color:#fff}
        to{color:#ffe400}
    }

    .evt_00 .notice {text-align:left; line-height:1.5; font-size:16px; margin:30px 180px; }
    .evt_00 p {margin-bottom:10px; font-size:18px; font-weight:bold}
    .evt_00 .notice li {list-style: disc; margin-left:20px; margin-bottom:10px}

    .evt01_02 {width:1120px; margin:0 auto; position:relative}
    .evt01_02 .point {font-size:16px; line-height:1.5}
    .evt01_02 .point h5 {font-size:24px; font-weight:bold; color:#fff}
    .evt01_02 .point div {width:900px; margin:50px auto; background:#fff; border-radius:10px; padding:50px; font-size:20px}
    .evt01_02 .point input {width:100px; color:#000; border:1px solid #000}
    .evt01_02 .point div a {display:block; padding:20px; background:#000; font-size:18px; color:#fff; border-radius:50px; width:70%; margin:20px auto 0}
    .evt01_02 .point div a:hover {background:#3e0763}
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
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/11/2810_top_img1.png" alt="psat 합격을 예측하다"></span>
            <span class="img02" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/11/2810_top_img2.png" alt=""></span>
        </div>

        <div class="evtCtnsBox evt_00">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2912_00.png" alt="event1">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2810_00_01.gif" alt="event1">
            <div class="notice">
                <p>유의사항</p>
                <ol>
                    <li>최초 제출한 정답 기준으로 구분됩니다.<br>
                    예)<br>
                        - 정답 공개 전 답안 제출 > [Research I]에 포함<br>
                        - 정답 공개 후 답안 제출 및 수정 > [Research Ⅱ]에 포함</li>
                    <li>부적절한 방법으로 이벤트 참여시 관리자에 의해 삭제 또는 당첨 취소될 수 있습니다.</li>
                </ol>
            </div>
        </div>

        <div class="evtCtnsBox evt_00">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2912_01.png" alt="event2">
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2912_02.png" alt="event3">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2912_03.png" alt="">
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">

            <div class="tab_content" id="tab01" data-aos="fade-up" style="background-color:transparent">


                <div class="evt01_02">
                    <form name="regi_form_register" id="regi_form_register">
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                        <input type="hidden" name="register_type" value="promotion"/>
                        {{--<input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/>--}} {{-- 하나수강만 선택 가능할시 --}}
                        <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
                        <input type="hidden" name="register_name" value="{{sess_data('mem_name')}}">
                        <input type="hidden" name="register_tel" value="{{sess_data('mem_phone')}}">
                        <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
                        <input type="hidden" name="target_param_names[]" value="예상 합격 점수"/> {{-- 체크 항목 전송 --}}
                        <input type="hidden" name="register_chk[]" id="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>

                        <img src="https://static.willbes.net/public/images/promotion/2022/09/2771_02.png" alt="이벤트 둘">
                        <div class="point">                   
                            <h5>Q. 내가 생각하는 예상 합격컷은?</h5>
                            <div>
                                <p class="mb20 tx16">※ <strong class="tx-red">본인 응시 직렬</strong>에 해당하는 예상 합격컷을 기입 바랍니다.</p>

                                예상 합격 점수 (평균값) <input class="score" type="text" maxlength="5" name="register_data1" oninput="maxLengthCheck(this);" value="{{ (empty($register_count[0]['EtcValue']) === false ? $register_count[0]['EtcValue'] : '') }}"> 점
                                <a href="javascript:void(0);" onclick="fn_submit(); return false;">합격 점수 예상하기 ></a>
                            </div>
                        </div>
                        {{--
                        <div class="textinfo">
                            이벤트 기간 <strong>~ 7/27(수) 자정까지</strong> 당첨자 발표 <strong>9/2(금) 개별 발표</strong>
                            <p>※ 합격컷 발표 이후 정답자에 한해 추첨을 통해 상품이 지급됩니다. (지급일 : 9/7(수))</p>
                        </div>
                        --}}
                    </form>
                </div>
                {{--
                <div class="evt01_03">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2022/11/2810_03.png" alt="event3">
                        <a href="javascript:void(0);" onclick="popup();" title="인증+등록하기" style="position: absolute; left: 26.16%; top: 87.9%; width: 54.46%; height: 12.68%; z-index: 2;"></a>
                    </div>
                </div>
                --}}
            </div>

            <div class="tab_content" id="tab02"></div>
            <div class="tab_content" id="tab03"></div>
            <div class="tab_content" id="tab04"></div>
        </div>


    </div>

    

    
    <!-- googlechart -->

    <script src="/public/vendor/Nwagon/Nwagon.js?ver={{time()}}"></script>
    <link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css?ver={{time()}}">

    <script type="text/javascript">
        $(document).ready(function(){
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
                    $('.tab_content').hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault();
                });
            });
            ajaxHtml2('{{$arr_promotion_params['PredictIdx']}}', '{{$arr_promotion_params['SsIdx']}}', '{{$arr_promotion_params['SsIdx2'] or ''}}');
        });

        function ajaxHtml2(predict_idx, ss_idx, ss_idx2) {
            var data = {
                'predict_idx' : predict_idx,
                'ss_idx' : ss_idx,
                'ss_idx2' : ss_idx2
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
            AOS.init();
        });
    </script>
    
<!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop