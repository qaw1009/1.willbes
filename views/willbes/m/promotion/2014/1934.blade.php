@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
        .evtCtnsBox img {width:100%; max-width:720px;}

        /************************************************************/

        .evtCtnsBox ul {margin:50px 10px 100px}
        .evtCtnsBox li {display:inline; float:left; width:50%; padding-bottom:10px;}        
        .evtCtnsBox li a {display:block; text-align:center; margin:0 auto; margin:0 10px}
        .evtCtnsBox li img {max-width:272px;}
        .evtCtnsBox ul:after {content:''; display:block; clear:both}

        @@media only screen and (max-width: 640px) {

        }
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="msg" value="인생계획을 남겨주세요.">
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1934m_top.jpg" alt="" > 
        </div> 
        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1934m_01.jpg" alt="" >      
            <ul>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_01.png" alt="김정환" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_02.png" alt="황채영" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_03.png" alt="김경은" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_04.png" alt="정문진" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_05.png" alt="안혜빈" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_06.png" alt="이기용" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_07.png" alt="이승기" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_08.png" alt="이시한" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_09.png" alt="양원근" ></a></li>
                <li><a href="javascript:giveCheck();"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_10.png" alt="김윤태" ></a></li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');
        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }
    </script>
@stop