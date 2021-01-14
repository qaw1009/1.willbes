@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        .skyBanner {position:fixed; width:130px; top:200px; right:10px; z-index:10;}
        .skyBanner a {display:block; margin-bottom:15px}
       
        .evt00 {background:#0a0a0a}
        .evtTop {background:#456DDC url(https://static.willbes.net/public/images/promotion/2020/12/1997_top_bg.jpg) no-repeat center top;}     
        .evt01 {background:#3a3a3a}
        .evt02 {background:#fadd99}
        .evt03 {background:#eee}        

        .evt04 {background:#fff; padding-bottom:50px}
        .evt04 .youtube {position:absolute; top:1293px; left:50%; width:455px; z-index:1; margin-left:-479px; box-shadow:0 10px 20px rgba(0,0,0,.3);}
        .evt04 .youtube iframe {width:455px; height:298px} 
        .evt04 .youtube.yu02 {top:1503px; margin-left:31px;}
        .evt04 .youtube.yu03 {top:1713px;}
        .evt04 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt04 .request h3 {font-size:17px;}
        .evt04 .request td {padding:10px}
        .evt04 .request input {height:26px;}
        .evt04 .requestL {width:48%; float:left}
        .evt04 .requestR {width:48%; float:right; }
        .evt04 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:145px; overflow-y:scroll }
        .evt04 .requestL li {display:inline-block; margin-right:10px}
        .evt04 .requestR li {margin-bottom:5px}
        .evt04 .request:after {content:""; display:block; clear:both}
        .evt04 .btn {clear:both; width:450px; margin:0 auto;}
        .evt04 .btn a {display:block; text-align:center; font-size:28px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt04 .btn a:hover {background:#ffe342; color:#000; box-shadow:0 10px 10px rgba(0,0,0,.2);}  

        .evt05 {background:#343434}

        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="file_chk" value="N"/>
            <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] or ''}}" />
            {{--     
            <div class="skyBanner">               
                <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2020/12/1997_sky.jpg" alt="상담신청"></a>
                <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/01/1997_sky02.png" alt="수강신청"></a>
            </div>
            --}}
            <div class="evtCtnsBox evt00">
                <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg" alt="경찰학원 1위">
            </div>
            <div class="evtCtnsBox evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1997_top.jpg" alt="외사 경력경쟁채용 영어">
            </div>

            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1997_01.jpg" alt="영어 하나만으로 경찰 공무원을 꿈꾸다.">
            </div>

            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1997_02.jpg" alt="외사부서">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1997_03.jpg" alt="경찰 외사 영어 서미란">                
            </div>

            <div class="evtCtnsBox evt04" id="to_go">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1997_04.jpg" alt="소수만을 위한 특별한 강의">
                <div class="youtube">
                    <iframe src="https://www.youtube.com/embed/qMNyjRyfqSM?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube yu02">
                    <iframe src="https://www.youtube.com/embed/5yINoHYm66g?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube yu03">
                    <iframe src="https://www.youtube.com/embed/hdP0CyIsmSI?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </form>
	</div>
    <!-- End Container -->

    <script>
        var $regi_form_register = $('#regi_form_register');

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($register_count) === false)
            alert('등록된 신청자 정보가 있습니다.');
            return;
            @endif

            var _url = '{!! front_url('/event/registerStore') !!}';

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_name"]').val()) == '') {
                alert('이름을 입력하셔야 합니다.');
                $("#register_name").focus();
                return;
            }
            if ($.trim($regi_form_register.find('input[name="register_tel"]').val()) == '') {
                alert('연락처를 입력하셔야 합니다.');
                $("#register_tel").focus();
                return;
            }
            if ($regi_form_register.find('input[name="register_data2"]').is(':checked') === false) {
                alert('직렬을 선택하셔야 합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }

            // //전부 disabled 처리
            // $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);
            //
            // //체크 disable 해제
            // $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
            //     $(this).attr('disabled', false);
            // });

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
            //$regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
        }
    </script>
@stop 