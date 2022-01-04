@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}
        .evtTop {position:relative}
        .evt00 {text-align:center; background:#f4f1f3}
        .evt00 .dday {font-size:22px;padding:20px 0;}
        .evt00 .dday span {color:#0567ff; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
        .evtCtnsBox a {position: absolute; z-index: 5;}

        /* 폰 가로, 태블릿 세로*/
        @@media all and (min-width:320px) and (max-width:408px) {

        }

        @@media all and (min-width:409px) and (max-width:588px) {

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
        <div class="evtCtnsBox evt00 ddayArea">
            <div class="dday NSK-Thin">
                <strong class="NSK-Black">SECRET 선물 마감까지<br><span id="ddayCountText"></span> 남았습니다.</strong>
            </div>
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2389m_top.jpg" alt="윌비스 공무원 스타터팩" >
            <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2225" title="웰컴팩 혜택" target="_blank" style="left: 68.472%; top: 60.694%; width: 19.722%; height: 3.559%;"></a>
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" title="회원가입" target="_blank" style="left: 19.722%; top: 80.549%; width: 62.639%; height: 8.797%;"></a>
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2389m_01.jpg" alt="준비된 직렬별 라인업" >
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2389m_02.jpg" alt="특별한 혜택!" >
            <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[0]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[0] : ''}}'); return false;"; title="3만원쿠폰" style="left: 57.500%; top: 36.612%; width: 22.778%; height: 3.825%;"></a>
            <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[1]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[1] : ''}}'); return false;"; title="15만원쿠폰" style="left: 23.056%; top: 72.769%; width: 14.583%; height: 3.461%;"></a>
            <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[2]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[2] : ''}}'); return false;"; title="20만원쿠폰" style="left: 61.944%; top: 72.769%; width: 14.583%; height: 3.461%;"></a>
            <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[3]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[3] : ''}}'); return false;"; title="5만원쿠폰" style="left: 23.056%; top: 91.894%; width: 14.583%; height: 3.461%;"></a>
            <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[4]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[4] : ''}}'); return false;"; title="10만원쿠폰" style="left: 61.944%; top: 91.894%; width: 14.583%; height: 3.461%;"></a>
        </div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2389m_03.jpg" alt="" >
            <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" title="회원가입" target="_blank" style="left: 9.444%; top: 81.528%; width: 81.111%; height: 7.137%;"></a>
        </div>
    </div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}','txt');
        });

        {{--쿠폰발급--}}
        var $regi_form = $('#regi_form');
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}'+'&give_idx='+give_idx;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');}
            }, showValidateError, null, false, 'alert');
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