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
    .evt_tab {padding-bottom:100px}
    .tabs {width:1120px; margin:0 auto; display:flex}
    .tabs li {width:25%;} 
    .tabs li a {display:block; color:#fff; background:#5918cc; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:20px;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#fff; color:#000}
    .tabs li:last-child a {margin:0}

    .tab_content {width:1120px; margin:0 auto; background:#fff; padding:100px 0}
    .tab_content:first-child {}

    .wbox {width:1100px; margin:0 auto; background:#fff; border-radius:10px} 

    .textbox {color:#fff;}
    .textbox ul {background:#10002c; font-size:24px; line-height:1.5; padding:30px; margin:0 120px; text-align:left; border-radius:6px; color:#00fffd}
    .textbox ul li:nth-child(1) {color:#ffe400; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;vertical-align:top;}
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

    .textbox .notice {text-align:left; line-height:1.5; font-size:16px; margin:30px 180px; }
    .textbox p {margin-bottom:10px; font-size:18px; font-weight:bold}
    .textbox .notice li {list-style: disc; margin-left:20px; margin-bottom:10px}

    .evt01_02 {width:1120px; margin:0 auto; position:relative}
    .evt01_02 .point {font-size:16px; margin-top:100px; line-height:1.5}
    .evt01_02 .point h5 {font-size:24px; font-weight:bold; color:#fff}
    .evt01_02 .point div {width:900px; margin:50px auto; background:#fff; border-radius:10px; padding:50px; font-size:20px}
    .evt01_02 .point input {width:100px; color:#000; border:1px solid #000}
    .evt01_02 .point div a {display:block; padding:20px; background:#000; font-size:18px; color:#fff; border-radius:50px; width:70%; margin:20px auto 0}
    .evt01_02 .point div a:hover {background:#3e0763}
    .textinfo {color:#fff; line-height:1.5; font-size:20px} 
    .textinfo p {font-size:14px}
    .textinfo strong {color:#00fffc}
    .textinfo strong:nth-child(1) {color:#ffd800}   


     /*2번째 탭*/
    .step {font-size:17px;line-height:2;padding-bottom:50px;}
    .stage {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:40px auto 0;padding-bottom:5px;}
    .stage:first-child {margin-top:0}
    .phase {display:inline-block;background:#000;color:#fff;border-radius:10px;width:75px;text-align:center;}
    .bold {font-weight:bold;}
    .gray {background:#F2F2F2}
    .blue {background:#DAE3F3}
    .avg {background:#FBE5D6}
    .current {border:3px solid red;}
    .careful {color:red;text-align:right;width:720px;margin:0 auto;line-height:1.25;}
    .chart a {display:inline-block;margin:10px;}

    .table_type {width:720px; margin:1em auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid}
    .table_type caption {display:none}	
    .table_type th {font-weight:bold;}
    .table_type th,
    .table_type td {letter-spacing:normal; text-align:center; padding:10px 8px}    

    .table_type thead th {color:#464646; background:#f3f3f3; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; }
    .table_type th.th2 {background:#fffcd1}
    .table_type td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646;}
    .table_type tbody th {background:#DAE3F3;}
    .table_type tfoot th {color:#464646; background:#f3f3f3;}
    .table_type tfoot td {font-weight:bold}
    .table_type td input {vertical-align:middle}
    .table_type td span.blueB {font-weight:bold; color:#33F}
    .table_type td span.redB {font-weight:bold; color:#C00}
    .table_type td label {margin-right:10px}
    .table_type .lineNo {border-right:none}
    .sel_info li {display:inline-block;margin-right:10px;margin-bottom:5px;vertical-align:bottom;}

    .graph_area {padding-top:10px;} 
    .graph {display:flex;left:50%;top:50%;}
    .graph li {padding:0 2px;text-align:center;}
    .graph li div {position:relative;margin:0 auto;width:40px;height:250px;background:#8f52ff;border-radius:4px 4px 0 0 ;}
    .graph li div span {position:absolute;left:0;bottom:0;right:0;background:#ccc;border-radius:4px 4px 0 0 ;}
    .graph li div i {display:none;}
    .graph li p {font-size:14px;}   

    /*.eventPopS3 {padding:20px;}*/
    .eventPopS3 {padding:20px 20px 0px 20px;}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px 4px;text-align:left;line-height:1.5;}
    .eventPopS3 ul {width:720px;margin:0 auto;}
    .eventPopS3 li {padding:0; margin:0;margin-left:15px; margin-bottom:5px} 
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}
    
    .markSbtn1 {width:100%; margin:1.5em auto; text-align:center;}
    .markSbtn1 a {display:inline-block; padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .markSbtn1 a.btn2 {background:#bf1212; border:1px solid #bf1212}
    .markSbtn1 a.btn3 {background:#fff; border:1px solid #333; color:#333}
    .markSbtn2 {display:block;padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .graph_area {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;text-align:center; position: relative;}
    .graph_area::after {content:'';display:block;clear:both;}  
    .graph_area .titleY {font-size:12px; background:#000; color:#fff; padding:3px 10px; position: absolute;top:0;left:0;z-index: 10; border-radius:20px; font-weight:normal}
    .graph_area .titleX {font-size:12px; background:#000; color:#fff; padding:3px 10px; position: absolute;bottom:50px;right:50px;z-index: 10; border-radius:20px; font-weight:normal}
    .recheck_area {margin:50px;}
    .markSbtn3_combine {display:flex;margin-left:-50px;padding-top:50px;}
    .subject {width:33.3333%}
    .subject_detail {padding-left:50px;}
    .level {display:flex;justify-content:space-evenly;position:relative;}
    .level span.level5:before{content:"";position:absolute;top:34%;width:17px;height:17px;margin-top:-3px;margin-left:-30px;background-color:#8faadc}
    .level span.level4:before{content:"";position:absolute;top:34%;width:17px;height:17px;margin-top:-3px;margin-left:-30px;background-color:#f4b183}
    .level span.level3:before{content:"";position:absolute;top:34%;width:17px;height:17px;margin-top:-3px;margin-left:-30px;background-color:#a9d18e}
    .level span.level2:before{content:"";position:absolute;top:34%;width:17px;height:17px;margin-top:-3px;margin-left:-30px;background-color:#ffd966}
    .level span.level1:before{content:"";position:absolute;top:34%;width:17px;height:17px;margin-top:-3px;margin-left:-30px;background-color:#cc99ff}
    .markSbtn4 {padding-top:50px;}

    .grading_result {width:720px;margin:0 auto;}

    .marking {margin:10px; padding:10px; border:1px dashed #e4e4e4}
    .marking h5 {font-size:17px; margin-bottom:10px;text-align:left;font-weight:bold;}
    .marking ul {display:flex;flex-flow:wrap;}
    .marking li {width:16.666%}
    .marking li div {margin-right:4px;  padding:3px; background:#666; text-align:center}
    .marking li div label {color:#fff; padding-bottom:5px; display: block}
    .marking li div input {width:100%; padding:5px 0; margin:0 auto; text-align:center; letter-spacing:4px;background:#fff;}
    .marking li div span {position:absolute; right:20px; top:30px; z-index: 10;}
  
    .marking ul:after {content:""; display:block; clear:both}

    .markTab {width:720px;margin:0 auto;margin-top:10px; /*border-bottom:1px solid #333*/}
    .markTab li {display:inline; float:left; width:33.3333%}
    .markTab a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab a.active {background:#333}
    .markTab li:last-child a {margin-right:0}
    .markTab:after {content:""; display:block; clear:both}

    .markTab2 {width:720px;margin:10px auto;}
    .markTab2 li {display:inline; float:left; width:25%}
    .markTab2 a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab2 a.active {background:#333}
    .markTab2 li:last-child a {margin-right:0}
    .markTab2:after {content:""; display:block; clear:both}

    .total td:nth-child(odd) {background:#F2F2F2;}
    .first {background:#F2F2F2;font-weight:bold;}
    .wrong {color:red !important;}
    .pass {color:#0070C0 !important;}
    /*.score {position:absolute;left:50%;top:67%;margin-left:33px;width:110px;height:45px;border:2px solid #bfbfbf;}*/


    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">
        <input type="hidden" id="_exam_type" name="_exam_type" value="N">
        <input type="hidden" id="_pr_id" name="_pr_id">
        <div class="evtCtnsBox evt_top">
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/11/2810_top_img1.png" alt="psat 합격을 예측하다"></span>
            <span class="img02" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/11/2810_top_img2.png" alt=""></span>
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">
            <ul class="tabs">
                <li><a href="#tab01">메인</a></li>
                <li><a href="#tab02">기본정보 및 답안입력</a></li>
                <li><a href="#tab03">성적확인 및 분석</a></li>
                <li><a href="#tab04">합격예측</a></li>
            </ul>
            <div class="tab_content" id="tab01" data-aos="fade-up" style="background-color:transparent">
                <div class="evt01_00">
                    <img src="https://static.willbes.net/public/images/promotion/2022/11/2810_00.png" alt="event1">
                    <div class="textbox">
                        {{--
                        <ul>
                            <li class="NSK-Black">[Research I] 정답 공개 전, 합격 예측 정답 입력하면 전원 100% 커피 쿠폰 증정!</li>
                            <li>[Research II] 정답 공개 후, 합격 예측 정답 입력하면 100명 추첨 커피 쿠폰 증정</li>
                        </ul>
                        --}}
                        @if(time() < strtotime('202303041900'))
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2810_00_01.gif" alt="event1"> 
                        @else 
                        <img src="https://static.willbes.net/public/images/promotion/2023/02/2810_00_end.jpg" alt="event1">       
                        @endif
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
                </div>
                <div class="evt01_01 mt100">
                    <div class="wrap">
                        <img src="https://static.willbes.net/public/images/promotion/2022/11/2810_01.png" alt="event2">
                        <a href="#url" title="UP!" style="position: absolute; left: 47.05%; top: 13.6%; width: 22.05%; height: 4.13%; z-index: 2;"></a> 
                        <a href="javascript:void(0);" title="링크복사" onclick="copyTxt();" style="position: absolute; left: 35.45%; top: 91.28%; width: 11.52%; height: 2.21%; z-index: 2;"></a>
                        <a href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" title="소문내기 다운" style="position: absolute; top: 91.28%; left: 47.41%; width: 16.52%; height: 2.21%;z-index: 2;"></a>
                        
                        <a href="https://section.blog.naver.com/" target="_blank" title="블로그" style="position: absolute; left: 72.59%; top: 90.58%; width: 5.18%; height: 3.08%; z-index: 2;"></a>
                        <a href="https://www.instagram.com/" target="_blank" title="인스타" style="position: absolute; left: 78.04%; top: 90.58%; width: 5.18%; height: 3.08%; z-index: 2;"></a>
                        <a href="https://section.cafe.naver.com/ca-fe/" target="_blank" title="네이버카페" style="position: absolute; left: 82.77%; top: 90.58%; width: 5.18%; height: 3.08%; z-index: 2;"></a>
                        <a href="https://top.cafe.daum.net/" target="_blank" title="다음카페" style="position: absolute; left: 87.68%; top: 90.58%; width: 5.18%; height: 3.08%; z-index: 2;"></a>
                    </div>
                </div>

                <div class="wbox mt50" id="url">
                    {{--홍보url--}}
                    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                        @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N', 'login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www'), 'is_public' => true)){{--기존SNS예외처리시, 로그인페이지 이동--}}
                    @endif
                </div>

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