@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .evt_pass .txtinfo {margin:10% 8%; padding:40px 20px 20px; border:1px solid #000; border-radius:10px; margin-bottom:50px; font-size:1.6vh; text-align:left}
    .evt_pass .txtinfo p {background:#000; color:#fff; padding:10px 5px; border-radius:30px; margin-top:-60px; margin-bottom:20px; font-size:1.8vh; text-align:center}

    .evt_pass {}
    .evt_pass .price {text-align:center; font-size:30px; font-weight:bold; color:#000; letter-spacing:-1px; position:absolute; top:82%; width:100%; z-index: 10;}
    .evt_pass .price p {margin-bottom:20px}
    .evt_pass .price p span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
    @@keyframes upDown{
        from{color:#d53a44}
        50%{color:#533fd1}
        to{color:#d53a44}
    }
    @@-webkit-keyframes upDown{
        from{color:#d53a44}
        50%{color:#533fd1}
        to{color:#d53a44}
    }

    .evt_pass .price label {display:inline-block}
    .evt_pass .price input:checked + label {color:blue}
    .evt_pass .ext01txt {width:100%;padding:20px;font-size:15px;}
    .evt_pass .ext01txt label {font-size:20px; font-weight:bold;}
    .evt_pass input[type="radio"] {height:35px; width:35px; vertical-align:middle}
    .evt_pass input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
    .evt_pass input:checked + label {border-bottom:1px dashed #504eff; color:#504eff; cursor: pointer;}
    .evt_pass .ext01txt ul {margin:10px 0 0 25px;}

    .evt_pass .totalPrice {width:80%; margin:0 auto;}
    .evt_pass .totalPrice a {display:block; background:#000; font-size:34px; color:#fff; padding:20px;border-radius:5px; font-weight: bold;}
    .evt_pass .totalPrice a:hover {background:#504eff}

    .evtInfo {padding:40px 20px; background:#333; color:#fff; font-size:1.6vh;}
    .evtInfoBox { text-align:left;}
    .evtInfoBox h4 {font-size:2vh; margin-bottom:30px}
    .evtInfoBox .infoTit {font-size:1.8vh; margin-bottom:20px; color:#ffe56e}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox ul li {margin-left:20px; margin-bottom:10px;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   
        .evt_pass .ext01txt label {font-size:14px;}
        .evt_pass .price {font-size:15px;}
        .evt_pass input[type="radio"] {height:15px; width:15px; vertical-align:middle}
        .evt_pass .totalPrice a {font-size:19px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {     
        .evt_pass .price {font-size:17px;}      
        .evt_pass input[type="radio"] {height:17px; width:17px; vertical-align:middle}
        .evt_pass .totalPrice a {font-size:20px;}
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_top.jpg" alt="해양경찰간부 L-PASS" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_01.jpg" alt="시험 과목" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_02.jpg" alt="교수진" >
    </div>

    <div class="evtCtnsBox evt_pass pb50" data-aos="fade-up" id="evt_pass"> 
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_03.jpg" alt="신청하기"/>            
        <div class="evt01_coupon" id="pass">
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_03_01.jpg" alt="해양경찰간부 L-PASS(일반)" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg1" name="y_pkg" value="204107" onClick=""/>
                    <label for="y_pkg1"> 해양경찰간부 L-PASS(일반) ></label>
                </div>
            </div>
            <div class="p_re">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_03_02.jpg" alt="해양경찰간부 L-PASS(해양)" > 
                <div class="price NSK-Black">                       
                    <input type="radio" id="y_pkg2" name="y_pkg" value="204108" onClick=""/>
                    <label for="y_pkg2"> 해양경찰간부 L-PASS(해양) ></label>
                </div>
            </div>               
            <div class="ext01txt">
                <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 해양경찰간부 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
                <ul>
                    <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.</li>
                    <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.</li>               
                </ul>
            </div>
        </div>
        <div class="totalPrice NSK-Black" ata-aos="fade-up">
            <a href="javascript:void(0);" onclick="goCartNDirectPay('evt_pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">L- PASS 신청하기 ></a>
        </div>        
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2857m_04.jpg" alt="소문내기 이벤트" >
            <a href="javascript:void(0);" onclick="giveCheck();" title="할인쿠폰받기" style="position: absolute;left: 8.54%;top: 52.53%;width: 83.25%;height: 4.74%;z-index: 2;"></a>
            <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute;left: 8.54%;top: 72.93%;width: 83.25%;height: 4.74%;z-index: 2;"></a>
        </div>
    </div>    
    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif    

    <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">[윌비스 X 등불쌤] 해양경찰 간부 L-PASS 이용안내</h4>
            <div class="infoTit NSK-Black">▶ 해양경찰 간부 L-PASS</div>
            <ul>               
                <li>1. 본 상품은 구매일로부터 1년간 들을 수 있는 기간제 해경간부 PASS입니다.</li>
                <li>2. 본 상품 강좌 구성은 다음과 같습니다.<br>
                    1 )해경 간부(일반) : 해양경찰학개론, 형법, 형소법, 범죄학, 행정학, 헌법<br>
                    2) 해경 간부(해양) : 해양경찰학개론, 형법, 형소법, 해사법규, 항해학, 기관학<br><br>
                        - 형사법(형법+형소법) : 임종희 교수님<br>
                        - 형법 : 문형석 교수님<br>
                        - 형소법 : 서영교 교수님 / 김한기 교수님<br>
                        - 헌법 : 이국령 교수님 (경찰간부 강의 제공, 일반경찰X)<br>
                        - 해양경찰학개론, 해사법규, 항해학, 기관학 : 등불쌤<br>
                        - 범죄학 : 김한기 교수님<br>
                        - 행정학 : 이동호 교수님<br>
                        - G-TELP : 제니 교수님<br>
                        - 한능검 : 오태진 교수님         
                </li>
                <li>3. 선택한 해양경찰 간부 L-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                <li>4. 해양경찰 간부 L-PASS 강좌는 결제 완료 시 수강이 시작됩니다. (결제완료자에 한함)</li>
                <li>5. 강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
            </ul>

            <div class="infoTit NSK-Black">▶ 교재 및 포인트</div>
            <ul>
                <li>1. 해양경찰 간부 L-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
            </ul>             

            <div class="infoTit NSK-Black">▶ 환불</div>
            <ul>
                <li>1. 결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>2. 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                <li>3. 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                <li>4. 환불은 수강 시작일 (당일 포함)로 부터 7일이 경과되면,해양경찰 간부 L-PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다.<br>(단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                <li>5. 포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다. (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
            </ul>
        </div>
    </div> 

</div>
<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>
<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>

<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');

    function go_PassLecture(cate, code){
        if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }

        var _url = '{{ site_url('/m/periodPackage/show/cate/')}}' + cate + '/pack/648001/prod-code/' + code;
        location.href = _url;
    }

    function giveCheck() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }

     /*약관동의*/
     function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay(ele_id, 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop