@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evt01 .price { width:83.06% margin:0 auto 20px}
    .evt01 .price ul{display: flex; justify-content: center; margin:0 4.4%}
    .evt01 .price li {display:block; width:calc(50% - 5%); text-align:center; font-size:18px; font-weight:bold; color:#fff; background:#000; border-radius:10px; padding:20px 10px; margin:0 1.6% 5%; letter-spacing:-1px}
    .evt01 .price li label {display:block}
    .evt01 .ext01txt {padding:0 20px;}
    .evt01 .ext01txt label {font-size:18px; font-weight:bold}
    .evt01 input[type="radio"] {height:18px; width:18px; vertical-align:middle}
    .evt01 input[type="checkbox"] {height:20px; width:20px; vertical-align:middle; margin-right:5px}
    .evt01 input:checked + label {color:#ffef7e}
    .evt01 .ext01txt ul {margin:10px 0 0 25px}
    .evt01 a {display:block; width:90%; margin:20px auto 0; background:#000; color:#fff; border-radius:30px; padding:10px 0; font-size:20px; font-weight:bold; text-align:center}
    .evt02 {background:#f8f8f8;padding-bottom:125px;}
    .video-container {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0 20px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}
    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px;z-index:100;}
    .btnbuy {max-width:720px; margin:0 auto}
    .btnbuy a {display:inline-block; width:33%; max-width:700px; margin:0 auto 5px; font-size:1rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}
    .evtInfo {padding:40px 20px; background:#333; color:#fff; font-size:16px;}
    .guide_box {text-align:left; line-height:1.4}
    .guide_box li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px; color:#ccc}
    .guide_box h2 {font-size:24px; margin-bottom:30px}
    .guide_box dt {margin:20px 0 10px}
    .guide_box dd {margin-bottom:5px}
    .guide_box .only {color:#E80000;vertical-align:top;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}
        .evt06 .slide_con {margin:0 10px; padding-bottom:40px}  
        .content_guide_wrap .guide_tit{font-size:20px; margin-bottom:30px}
        .content_guide_wrap .tabs li a {font-size:14px !important; letter-spacing:-1px}
        .btnbuy a {width:31%;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .dday {font-size:18px !important;}
        .dday a {padding:5px 10px;}
        .btnbuy a {width:31%;}
    }
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .content_guide_wrap .tabs li a br {display:none}
    }
</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox evt00">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_top.jpg" alt="경찰간부" >
    </div>
    <div class="evtCtnsBox evt01" id="event01">
        <img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_01.jpg" alt="최저가" >
        <div class="price">
            <ul>
                <li><input type="radio" id="y_pkg1" name="y_pkg" value="{{ (ENVIRONMENT == 'production' || ENVIRONMENT == "testing" ? '186166' : '159718') }}" data-sale-price="970000" onClick=""/> <label for="y_pkg1">139 만원<br>신광은경찰간부 L-PASS</label></li>
            </ul>
        </div>
        <div class="ext01txt">
            <input type="checkbox" id="is_chk" name="is_chk" value="Y"/> <label for="is_chk">페이지 하단 신광은경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.</label>
            <ul>
                <li>※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.</li>
                <li>※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.</li>
            </ul>
        </div>
        <div><a href="javascript:void(0);" onclick="goCartNDirectPay('event01', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');">신광은경찰 PASS 신청하기 ></a></div>
    </div>
    
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_02.jpg" alt="영상" >
        <div class="youtube video-container">
            <iframe src="https://www.youtube.com/embed/d6TpPnR5crM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
    <div class="evtCtnsBox evt03"><img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_03.jpg" alt="개편포인트" ></div>
    <div class="evtCtnsBox evt04"><img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_04.jpg" alt="합격포인트" ></div>
    <div class="evtCtnsBox evt05"><img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_05.jpg" alt="런칭이벤트" ></div>
    <div class="evtCtnsBox evt06">
        <img src="https://static.willbes.net/public/images/promotion/2021/09/2366m_06.jpg" alt="할인쿠폰받기" >
        <a href="javascript:void(0);" title="할인쿠폰 받기" onclick="giveCheck(); return false;" style="position: absolute;left: 17.19%;top: 53.11%;width: 64.75%;height: 6.75%;z-index: 2;"></a>
        <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif"  title="이미지 다운받기" style="position: absolute;left: 14.19%;top: 82.11%;width: 73.75%;height: 4.75%;z-index: 2;"></a>
        <a href="http://cafe.daum.net/policeacademy" target="_blank" title="다음카페 경시모" style="position: absolute;left: 18.19%;top: 90.11%;width: 14.75%;height: 8.25%;z-index: 2;"></a>
        <a href="https://cafe.naver.com/polstudy" target="_blank" title="네이버 경꿈사" style="position: absolute;left: 33.19%;top: 90.11%;width: 14.75%;height: 8.25%;z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원 갤러리" style="position: absolute;left: 48.19%;top: 90.11%;width: 14.75%;height: 8.25%;z-index: 2;"></a>
        <a href="https://gall.dcinside.com/board/lists?id=policeofficer" target="_blank" title="순경 마이너 갤러리" style="position: absolute;left: 64.19%;top: 90.11%;width: 14.75%;height: 8.25%;z-index: 2;"></a>
    </div>

    {{--홍보url--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
    @endif

    <div class="evtCtnsBox evtInfo NGR" id="infoText">
        <div class="guide_box" >
            <h2 class="NSK-Black" >윌비스 신광은경찰간부 L-PASS 이용안내</h2>
            <dl>
                <dt>신광은경찰간부 L-PASS</dt>
                <dd>
                    <ol>
                        <li>본 상품은 구매일로부터 2022년 10월 31일 까지만 들을수 있는 기간제 간부PASS입니다.</li>
                        <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                            - 2022년 대비 형사법, 경찰학(행정법), 헌법 , 범죄학, 민법총칙, 행정학  강좌<br><br>
                            * 형사법 : 신광은 교수님<br>
                            * 경찰학개론 : 장정훈 교수님<br>
                            * 헌법 : 김원욱 교수님 / 이국령 교수님<br>
                            * 범죄학 : 박상민 교수님<br>
                            * 형사법(형법) : 문형석 교수님<br>
                            * 민법총칙 : 김동진 교수님<br>
                            * 행정학 : 이동호 교수님<br>
                            * G-TELP : 김준기 교수님<br>
                            * 한능검 : 오태진 교수님
                        </li><br>
                        <li>선택한 신광은 경찰간부 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>       
                        <li>신광은 경찰간부 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                        <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    </ol>
                </dd>
                <dt>교재 및 포인트</dt>
                <dd>
                    <ol>
                        <li>신광은 경찰간부 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>                      
                    </ol>
                </dd>
                <dt>환불</dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                        <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li> 고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면,<br>신광은 경찰PASS 결제가 기준으로 계산하여   사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                        <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며,<br> 남은 포인트는 회수됩니다.(포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                    </ol>
                </dd>
            </dl>
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
  });
</script>

<script type="text/javascript">
    /*tab*/
    $(document).ready(function(){
        $(".tabs li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs li a").removeClass("active");
            $(this).addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).fadeIn();
            return false;
        });

        var url = window.location.href;
        if(url.indexOf("tab4") > -1){
            var activeTab = "#tab4";
            $(".tabsl li a").removeClass("active");
            $(".tabs li a[href='#tab4']").addClass("active");
            $(".tabContents").hide();
            $(activeTab).show();
            return false;
        }else{
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#tab1']").addClass("active");
            $(".content_guide_box").hide();
            $(".content_guide_box:first").show();
        }
    });

    {{-- 쿠폰발급 --}}
    var $regi_form = $('#regi_form');
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
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

<!-- AceCounter Log Gathering Script V.8.0.AMZ2019080601 -->
<script language='javascript'>
    var _AceGID=(function(){var Inf=['gtp14.acecounter.com','8080','AH1A44052179653','AW','0','NaPm,Ncisy','ALL','0']; var _CI=(!_AceGID)?[]:_AceGID.val;var _N=0;var _T=new Image(0,0);if(_CI.join('.').indexOf(Inf[3])<0){ _T.src ="https://"+ Inf[0] +'/?cookie'; _CI.push(Inf);  _N=_CI.length; } return {o: _N,val:_CI}; })();
    var _AceCounter=(function(){var G=_AceGID;var _sc=document.createElement('script');var _sm=document.getElementsByTagName('script')[0];if(G.o!=0){var _A=G.val[G.o-1];var _G=(_A[0]).substr(0,_A[0].indexOf('.'));var _C=(_A[7]!='0')?(_A[2]):_A[3];var _U=(_A[5]).replace(/\,/g,'_');_sc.src='https:'+'//cr.acecounter.com/Web/AceCounter_'+_C+'.js?gc='+_A[2]+'&py='+_A[4]+'&gd='+_G+'&gp='+_A[1]+'&up='+_U+'&rd='+(new Date().getTime());_sm.parentNode.insertBefore(_sc,_sm);return _sc.src;}})();
</script>
<noscript><img src='https://gtp14.acecounter.com:8080/?uid=AH1A44052179653&je=n&' border='0' width='0' height='0' alt=''></noscript>
<!-- AceCounter Log Gathering Script End -->

@stop