@extends('willbes.pc.layouts.master')

@section('content')
@include('willbes.pc.layouts.partial.site_menu')
<!-- Container-->
<style type="text/css">
    .subContainer {
    min-height: auto !important;
    margin-bottom: 0 !important;
    }
    .evtContent {
    width: 100% !important;
    min-width: 1210px !important;
    background: #ccc;
    margin-top: 20px !important;
    padding: 0 !important;
    background: #fff;
    }
    .evtCtnsBox {
    width: 100%;
    text-align: center;
    min-width: 1120px;
}
/************************************************************/
    .evtTop {background:#fff url(https://static.willbes.net/public/images/promotion/2019/07/1311_top_bg.jpg) no-repeat center top;}
    .evt01 {background:#fff}
    .evt02 {background:#fff;  padding-bottom:100px}
    .evt03 {background:#100760; padding-bottom:100px}

    .form_area{width:980px;background:#fff;margin:0 auto;padding:65px 100px;}
    .form_area h4{background:#FFAA5F;color:#333132;width:760px;height:50px;line-height:50px;font-size:25px;font-weight:bold;}
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
    .privacy .accept{margin-top:15px;font-size:15px;}

    #btnArea{margin:25px 0 50px;}
    #btnArea #button{width:180px;height:50px;line-height:50px;background:#2A2A2A;color:#fff;font-size:23px;margin:10px;border:none;}

    /* 슬라이드배너 */
    .bannerimg {position:relative; width:980px; margin:0 auto}
    .bannerimg p {position:absolute; top:50%; width:50px; z-index:100}
    .bannerimg img {width:100%}
    .bannerimg p a {cursor:pointer}
    .bannerimg p.leftBtn {left:-30px; top:50%; margin-top:-25px; width:50px; height:50px}
    .bannerimg p.rightBtn {right:-30px; top:50%; margin-top:-25px; width:50px; height:50px}
</style>

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="evtCtnsBox evtTop"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_top.png" usemap="#Map_1311_go" title="#" border="0" >
    <map name="Map_1311_go">
        <area shape="rect" coords="46,907,457,1007" href="#1311_go">
    </map>
    </div>
    <div class="evtCtnsBox evt01"> <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_01.jpg" title="시험전,수강생공부방법"> </div>
    <div class="evtCtnsBox evt02"> <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02.jpg"  title="교수님 수강평">
        <div class="bannerimg">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r1.jpg" title="수강평1"></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r2.jpg" title="수강평2"></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_r3.jpg" title="수강평3"></li>
            </ul>
            <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_pre.png" title="back"></a></p>
            <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/07/1311_02_next.png" title="next"></a></p>
        </div>
    </div>
    <div class="evtCtnsBox evt03" id="1311_go">
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>

            <img src="https://static.willbes.net/public/images/promotion/2019/07/1311_03.jpg" usemap="#Map1177B" title="최신기출 및 최신판례신청하기" border="0">
            <div class="form_area">
                <h4>7월 28일(일) 1개년 최.기.판 무료특강 학원실강 참여</h4>
                <div class="privacy">
                    <div class="contacts">
                        <p><strong><span class="star">*</span>이름</strong><input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly="readonly"/></p>
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
                                - 신청인의 이름
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
                <div id="btnArea">
                    <input id="button" type="button" value="확인" onclick="fn_submit();"/>
                    <input id="button" type="button" value="취소" onclick="fn_cancel();"/>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Container --> 


<!-- script -->

<script>
$(document).ready(function() {
    var slidesImg1 = $("#slidesImg2").bxSlider({
    mode:'fade',
    auto:true,
    speed:350,
    pause:3000,
    pager:true,
    controls:false,
    minSlides:1,
    maxSlides:1,
    slideWidth:1210,
    slideMargin:0,
    autoHover: true,
    moveSlides:1,
    pager:false
    });

    $("#imgBannerLeft").click(function (){
        slidesImg1.goToPrevSlide();
    });

    $("#imgBannerRight").click(function (){
        slidesImg1.goToNextSlide();
    });
});

function fn_submit() {
    var $regi_form_register = $('#regi_form_register');
    var _url = '{!! front_url('/event/registerStore') !!}';
    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

    if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
        alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
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

function fn_cancel() {
    var $regi_form_register = $('#regi_form_register');
    $("input:radio[name='register_chk[]']").prop("checked",false);
    $("input:checkbox[name='is_chk']").prop("checked",false);
}
</script> 

<!-- script// -->
@stop