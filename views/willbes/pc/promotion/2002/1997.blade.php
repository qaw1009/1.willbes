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

        .evt05 {background:#fff;padding-bottom:100px;}
        .evt05 .request {width:1000px; margin:0 auto; background:#fff; padding:50px;text-align:left}
        .evt05 .request h3 {font-size:17px;}
        .evt05 .request td {padding:10px}
        .evt05 .request input {height:26px;}
        .evt05 .requestL {width:48%; float:left}
        .evt05 .requestR {width:48%; float:right; }
        .evt05 .requestR ul {margin-top:10px; line-height:1.5; padding:10px; border:1px solid #ccc; height:241px; overflow-y:scroll }
        .evt05 .requestL li {display:inline-block; margin-right:10px}
        .evt05 .requestR li {margin-bottom:5px}
        .evt05 .request:after {content:""; display:block; clear:both}
        .evt05 .btn {clear:both; width:500px; margin:0 auto;}
        .evt05 .btn a {display:block; text-align:center; font-size:25px; color:#fff; background:#000; padding:20px 0; margin-top:30px; border-radius:50px}
        .evt05 .btn a:hover {box-shadow:0 10px 10px rgba(0,0,0,.2);}

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
          
            <div class="skyBanner">               
                <a href="#request"><img src="https://static.willbes.net/public/images/promotion/2020/12/1997_sky.jpg" alt="상담신청"></a>
            </div>
          
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

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/1997_05.jpg" alt="경찰공무원 채용 인원 발표">        
                <div class="request" id="request">
                    <div class="requestL">
                        <h3 class="NSK-Black">* 외사경채 상담신청</h3>
                        <table width="0" cellspacing="0" cellpadding="0" class="table_type">
                            <col width="25%" />
                            <col  />
                            <tr>
                                <th>* 이름</th>
                                <td scope="col">
                                    <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" {{(sess_data('is_login') === true) ? 'readonly="readonly"' : ''}}/>
                                </td>
                            </tr>
                            <tr>
                                <th>* 연락처</th>
                                <td>
                                    <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" maxlength="11">
                                </td>
                            </tr>
                            <tr>
                                <th>* 상담일</th>
                                <td>
                                    <ul>
                                        @foreach($arr_base['register_list'] as $key => $val)
                                            @if(empty($val['RegisterExpireStatus']) === false && $val['RegisterExpireStatus'] == 'Y')
                                                <li><input type="checkbox" name="register_chk[]" id="campus{{$key}}" value="{{$val['ErIdx']}}" /> <label for="campus{{$key}}">{{$val['Name']}}</label></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>                           
                        </table>
                    </div>
                    <div class="requestR">
                        <h3 class="NSK-Black">* 개인정보 수집 및 이용에 대한 안내</h3>
                        <ul>
                            <li>
                                <strong>1. 개인정보 수집 이용 목적</strong> <br>
                                - 신청자 본인 확인 및 신청 접수 및 문의사항 응대
                                - 통계분석 및 마케팅
                                - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                            </li>
                            <li><strong>2. 개인정보 수집 항목</strong> <br>
                            - 필수항목 : 성명, 연락처, 직렬항목
                            </li>
                            <li><strong>3. 개인정보 이용기간 및 보유기간</strong><br>
                            - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                            </li>
                            <li><strong>4. 신청자의 개인정보 수집 및 활용 동의 거부 시</strong><br>
                            - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                            </li>
                            <li>5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                            </li>
                            <li>6. 신이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                            </li>
                        </ul>
                        <div>
                            <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </div>
                    </div>
                </div>
                <div class="btn NGEB">
                    <a href="#none" onclick="javascript:fn_submit();">외사경채 상담 신청하기 ></a>
                </div>        
            </div>

        </form>
	</div>
    <!-- End Container -->

    <script>
        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
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
            if ($regi_form_register.find('input[name="register_chk[]"]:checked').length == 0) {
                alert('참여일을 선택하셔야 합니다.');
                return;
            }

            if (!confirm('저장하시겠습니까?')) { return true; }

            //전부 disabled 처리
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', true);

            //체크 disable 해제
            $regi_form_register.find('input[name="register_chk[]"]:checked').each(function(i){
                $(this).attr('disabled', false);
            });

            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
            $regi_form_register.find('input[name="register_chk[]"]').attr('disabled', false); //disable 해제
        }
    </script>
@stop 