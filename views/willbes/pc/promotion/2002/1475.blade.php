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
        
        .skybanner2{position:fixed;top:350px;right:0;z-index:1;}

        .evt_police{background:#404040 url("https://static.willbes.net/public/images/promotion/2019/07/1328_police_bg.jpg") center top  no-repeat}

        .evt_top{background:#b7b7b8 url("https://static.willbes.net/public/images/promotion/2019/12/1475_top_bg.jpg") center top  no-repeat}

        .evt_01{background:#e7e7e7;padding-bottom:135px;}
        .evt_01 #apply{margin-top:525px;}
        
        .form_area{width:980px;background:#fff;margin:0 auto;padding:65px 100px;}
        .form_area h4{background:#a2362a;color:#fff;width:760px;height:50px;line-height:50px;font-size:25px;font-weight:bold;}
        .form_area h5{font-size:14px;margin-bottom:10px;}
        .form_area strong {display:inline-block; width:120px;}
        .form_area .star{color:#FF5A00; margin-right:5px}
        .privacy{text-align:left;}
        .contacts{padding:35px 10px;}
        .contacts p{font-size:16px;padding:10px;}

        .contacts label{font-weight:bold;font-size:14px;display:inline-block; margin-left:5px; margin-right:10px}
        .contacts label.username{letter-spacing:10px;letter-spacing:3.5px;}
        .contacts input[type=text],
        .contacts input[type=tel] { height:30px; line-height:30px}
        .contacts input[type=radio]{padding-left:15px;}
        .contacts .check_contact .check{font-weight:normal;}
        input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

        .privacy .info{border:1px solid #DBDBDB;padding:20px;}
        .privacy .info li{padding-bottom:15px;font-size:14px; list-style:decimal; margin-left:15px; line-height:1.4}
        .privacy .accept{text-align: center;padding: 20px 0 30px 0;font-size: 17px;font-weight: bold;}

        #btnArea{margin:25px 0 0;}
        #btnArea #button{width:180px;height:50px;line-height:50px;background:#2A2A2A;color:#fff;font-size:23px;margin:10px;border:none;}

        .evt_02{background:#5893bf;}

    
        /*슬라이드*/  

        .slide_con2 {position:relative; width:1120px;height:290px; margin:0 auto;padding-left:4px;}
        .slide_con2 p {position:absolute; top:575px; margin-top:-30px; width:67px; height:67px; z-index:10}
        .slide_con2 p a {cursor:pointer}
        .slide_con2 p.leftBtn {left:0}
        .slide_con2 p.rightBtn {right:0}  
    }
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
{{--            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>--}}
{{--            <input type="hidden" name="target_params[]" value="register_data1"/> --}}{{-- 체크 항목 전송 --}}
{{--            <input type="hidden" name="target_param_names[]" value="참여캠퍼스"/> --}}{{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>

            <div class="skybanner2">
                <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2019/12/1475_sky.png" alt="김현정 영어 디딤돌 무료특강"/></a>
            </div>

            <div class="evtCtnsBox evt_police" id="evt_police">
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1328_police.jpg" title="윌비스 경찰팀">
            </div>

            <div class="evtCtnsBox evt_top" id="evt_top">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1475_top.jpg" title="디딤돌 무료특강">
            </div>


            <div class="evtCtnsBox evt_01" id="evt_01">
                <div id="tab2">
                    <div class="slide_con2">
                        <ul id="slidesImg5">
                            <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1475_01_tab01.jpg"  title="가정법 끝내기" /></li>
                            <li><img src="https://static.willbes.net/public/images/promotion/2019/12/1475_01_tab02.jpg"  title="가정법 끝내기" /></li>
                        </ul>
                        <p class="leftBtn"><a id="imgBannerLeft5"><img src="https://static.willbes.net/public/images/promotion/2019/09/1009_01_arrowL.png"></a></p>
                        <p class="rightBtn"><a id="imgBannerRight5"><img src="https://static.willbes.net/public/images/promotion/2019/09//1009_01_arrowR.png"></a></p>
                    </div>
                </div>
                <div id="apply">
                    <img src="https://static.willbes.net/public/images/promotion/2019/12/1475_01s.jpg" title="디딤돌 무료특강 신청하기">
                    <form name="regi_form_register" id="regi_form_register">
                {!! csrf_field() !!}
                <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <div class="form_area">
                    <h4>12.28(토) 김현정 경찰영어 무료특강 14:00</h4>
                    <div class="privacy">
                        <div class="contacts">
                            <p><strong><span class="star">*</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" /></p>
                            <p><strong><span class="star">*</span>연락처</strong><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" maxlength="11"/></p>
                            <p class="check_contact">
                                <strong><span class="star">*</span>참여캠퍼스</strong><br><br>
                                @foreach($arr_base['register_list'] as $row)
                                    <input type="radio" name="register_chk[]" id="register_chk_{{ $row['ErIdx'] }}" value="{{$row['ErIdx']}}" /> <label for="register_chk_{{ $row['ErIdx'] }}">{{ $row['Name'] }}</label>
                                @endforeach
                            </p>
                        </div>
                        <h5><span class="star">*</span>개인정보 수집 및 이용에 대한 안내</h5>
                        <div class="info">
                            <ul>
                                <li>
                                    개인정보 수집 이용 목적<br>
                                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대
                                    - 이벤트 참여에 따른 강의 수강자 목록에 활용
                                </li>
                                <li>
                                    개인정보 수집 항목<br>
                                    - 신청인의 이름,연락처
                                </li>
                                <li>
                                    개인정보 이용기간 및 보유기간<br>
                                    - 본 수집, 활용목적 달성 후 바로 파기
                                </li>
                                <li>
                                    개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은
                                    이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                                </li>
                            </ul>
                        </div>
                        <p class="accept">
                            <input type="checkbox" name="is_chk" id="is_chk" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                        </p>
                    </div>
                    <div class="btn NGEB">
                        <a onclick="javascript:fn_submit();">
                            <img src="https://static.willbes.net/public/images/promotion/2019/12/1475_apply_btn.png" alt="신청하기">
                        </a>
                    </div>
                </div>
            </form>                    
                   
                    </div>
                </div>
            </div>

            <div class="evtCtnsBox evt_02" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2019/12/1475_02.jpg" usemap="#Map1475a" title="소문내기" border="0">
                <map name="Map1475a" id="Map1475a">
                    <area shape="rect" coords="507,915,969,1039" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="소문내기 이미지" />
                </map>
            </div>
            {{--홍보url--}}
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial', array('bottom_cafe_type'=>'N'))
                @endif
        </form>
        
    </div>

    <!-- End evtContainer -->
  
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg5 = $("#slidesImg5").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft5").click(function (){
                slidesImg5.goToPrevSlide();
            });

            $("#imgBannerRight5").click(function (){
                slidesImg5.goToNextSlide();
            });
        });

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