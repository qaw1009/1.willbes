@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}


        /************************************************************/

        .evt_police{background:#404040 url("https://static.willbes.net/public/images/promotion/2019/07/1328_police_bg.jpg") center top  no-repeat}

        .evt_top{background:#25431f url("https://static.willbes.net/public/images/promotion/2019/12/1482_top_bg.jpg") center top  no-repeat}

        .evt_01{background:#414141;}     
        
        .form_area{width:980px;background:#fff;margin:0 auto;padding:0 65px 150px;}
        .form_area h4{height:50px;line-height:50px;font-size:30px;font-weight:bold;}
        .form_area h5{font-size:16px;margin-bottom:10px;padding-left:20px;font-weight:bold;}
        .form_area strong {display:inline-block; width:120px;}
        .form_area .star{color:#363636; margin-right:5px;font-size:7px;}
        .privacy{text-align:left;border:19px solid #e9e9e9;margin-top:30px;padding:0 40px;}
        .contacts{padding:35px 10px;}
        .contacts p{font-size:16px;padding:10px;}

        .contacts label{font-weight:bold;font-size:.accept14px;display:inline-block; margin-left:5px; margin-right:10px}
        .contacts label.username{letter-spacing:10px;letter-spacing:3.5px;}
        .contacts input[type=text],
        .contacts input[type=tel] { height:30px; line-height:30px}
        .contacts input[type=radio]{padding-left:15px;}
        .contacts .check_contact .check{font-weight:normal;}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .privacy .info{padding:20px;}
        .privacy .info li{padding-bottom:15px;font-size:14px; list-style:decimal; margin-left:15px; line-height:1.4}
        .detail{line-height:20px;}
        .accept{text-align: center;padding: 20px 0 50px 0;font-size: 17px;font-weight: bold;}

        #btnArea{margin:25px 0 0;}
        #btnArea #button{width:180px;height:50px;line-height:50px;background:#2A2A2A;color:#fff;font-size:23px;margin:10px;border:none;}

        .evt_02{background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">   
        
        <div class="evtCtnsBox evt_police" id="evt_police">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1328_police.jpg" title="윌비스 경찰팀">
        </div>

        <div class="evtCtnsBox evt_top" id="evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1482_top.jpg" title="김원욱 형법 무료특강">
        </div>

        <div class="evtCtnsBox evt_01" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2019/12/1482_01.jpg" title="무료특강 이벤트">
        </div>
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk_el_idx" value="{{ $data['ElIdx'] }}"/> {{-- 하나수강만 선택 가능할시 --}}

            <div id="apply">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1482_02.jpg" title="무료특강 신청하기">
                <div class="form_area">
                    <h4>2020.1.4(토) 14:00 김원욱 형법 무료특강</h4>
                    <div class="privacy">
                        <div class="contacts">
                            <p><strong><span class="star">▶</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" /></p>
                            <p><strong><span class="star">▶</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11"/></p>
                            <p class="check_contact">
                                <strong><span class="star">▶</span>참여캠퍼스</strong><br><br>
                                @foreach($arr_base['register_list'] as $row)
                                    <input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{$row['ErIdx']}}" /> <label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label>
                                @endforeach
                            </p>
                        </div>
                        <h5><span class="star">▶</span>개인정보 수집 및 이용에 대한 안내</h5>
                        <div class="info">
                            <p class="detail">
                                개인정보 수집 이용 목적 - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대 - 이벤트 참여에 따른 강의 수강자 목록에 활용 <br>
                                개인정보 수집 항목 - 신청인의 이름,연락처 <br>
                                개인정보 이용기간 및 보유기간 - 본 수집, 활용목적 달성 후 바로 파기 <br>
                                개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익 - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 <br> 동의 거부에 따른 불이익은 없으나, <br>
                                위 제공사항은 이벤트 참여를 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                            </p>
                        </div>
                     </div>
                    <p class="accept">
                        <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </p>
                    <div class="btn NGEB">
                        <a onclick="javascript:fn_submit();">
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/1482_apply_btn.png" alt="신청하기">
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End evtContainer -->
  
    <script type="text/javascript">
      
        function fn_submit() {
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            if (typeof $regi_form_register.find('input[name="register_chk[]"]:checked').val() === 'undefined') {
                alert('참여캠퍼스를 선택해 주세요.'); return;
            }
            
            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop   