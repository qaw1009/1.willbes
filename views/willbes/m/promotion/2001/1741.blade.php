@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtTop {position:relative}

    .evt00 { text-align:center;}
    .evt00 .dday {font-size:22px;padding:20px 0;}
    .evt00 .dday span {color:#435d96; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}

    .evt02 {padding-bottom:120px; background:#f6f6f6}
    .evt02 a {display:block; margin:0 auto; width:60%; font-size:20px; background:#293342; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}


    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding:10px 0}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left; color:#666; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#000}
    .evtFooter p {margin-bottom:10px; color:#333; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}


    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {        
        
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt00 .dday {font-size:30px;}
        .evt00 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}    
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">      
    <div class="evtCtnsBox evt00">
        <div class="dday NSK-Thin">
            <strong class="NSK-Black">파이널패스 판매종료까지 <br><span id="ddayCountText"></span> 남았습니다.</strong>
        </div>     
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_00.jpg" alt="경찰학원부분 1위 윌비스 신광은 경찰학원" >
    </div>   

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_top.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_01.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    {{--
    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_02.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
        <a href="javascript:giveCheck();" class="NSK-Black">쿠폰받기 ></a>
    </div>
    --}} 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_03.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_04.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1741m_05.jpg" alt="윌비스 신광은 경찰학원 파이널패스" >
    </div> 

    <div class="evtCtnsBox evtFooter">
        <h3 class="NSK-Black">윌비스 신광은경찰 파이널패스 이용안내</h3>
        <p># 파이널 패스 경찰전문 교수진</p>
        <ul>
            <li>형소법/수사 - 신광은 교수님</li>
            <li>경찰학/행정법 - 장정훈 교수님</li>
            <li>형 법 – 김원욱 교수님</li>
            <li>영어 – 하승민 교수님</li>
            <li>한국사 – 원유철 교수님,오태진 교수님</li>
        </ul>

        <p># 강의구성</p>
        <ul>
            <li>2020년 2차 시험일까지 파이널패스 : 문제풀이 1~3단계, 마무리특강 (일반+경행)</li>
        </ul>

        <p># 강의수강기간</p>
        <ul>
            <li>~ 2020.9.19 까지 (20년 2차 시험까지)</li>
        </ul>

        <p># 이벤트 혜택</p>
        <ul>
            <li>50,000 할인쿠폰은 파이널패스 상품에만 적용 가능하며, 당일발급일 기준<br>
                24시간 이내만 사용 가능합니다. 단,하루 이벤트(7/31) 입니다.</li>
            <li>빅매치 2 , 3 합격예측모의고사 무료쿠폰은 파이널 패스 구매 시 자동발급<br>
                (내강의실 > 쿠폰함 확인)<br>
                (빅매치2 접수기간은 8/8  16시까지  - 접수기간에 맞추어 사용해주시기 바랍니다.)<br>
                (빅매치3 접수기간은 9/5  16시까지  - 접수기간에 맞추어 사용해주시기 바랍니다.)</li>
            <li>인강패스 10% 할인쿠폰 : 20년 2차 필기시험 종료 후 파이널패스 결제회원대상 일괄지급예정 (9/19)<br>
                인강패스 10% 할인쿠폰 사용기간 : 20년 9월 19일 ~ 20년 10월 19일까지 사용가능<br>
                (단, 쿠폰 적용 가능 패스상품은 특정상품에 제한될 수 있습니다.)<br>
                <br>
                ※ 타 쿠폰과 중복할인이 불가합니다.<br>
                ※ 기간 한정 상품이며 종합반으로 구성되어진 강의입니다.<br>
                ※ 회사 사정으로 조기 마감 될수 있습니다.</li>
        </ul>
        <div>※ 이용문의 : 1544-5006</div>
    </div>  
</div>
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="{{ front_url('/package/show/cate/3001/pack/648001/prod-code/169919') }}" target="_blank">
        FINAL PASS 수강신청하기 >
        </a>
    </div>
</div>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>


<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
<script type="text/javascript">
    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
    });

    {{-- 쿠폰발급 --}}
    function giveCheck() {

        @if(ENVIRONMENT == 'production')
            @if(date('YmdHi') < '202007310000' || date('YmdHi') >= '202008010000')
                alert('쿠폰발급 기간이 아닙니다.'); return;
            @endif
        @endif

        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
        @if(empty($arr_promotion_params) === false)
            var $regi_form = $('#regi_form');
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn=N';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
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