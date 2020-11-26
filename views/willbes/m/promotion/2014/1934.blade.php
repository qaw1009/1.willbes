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
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1934m_top.jpg" alt="" > 
        </div> 
        
        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1934m_01.jpg" alt="" >      
            <ul>
                <li><a href="javascript:giveCheck(0);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_01.png" alt="김정환" ></a></li>
                <li><a href="javascript:giveCheck(1);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_02.png" alt="황채영" ></a></li>
                <li><a href="javascript:giveCheck(2);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_03.png" alt="김경은" ></a></li>
                <li><a href="javascript:giveCheck(3);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_04.png" alt="정문진" ></a></li>
                <li><a href="javascript:giveCheck(4);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_05.png" alt="안혜빈" ></a></li>
                <li><a href="javascript:giveCheck(5);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_06.png" alt="이기용" ></a></li>
                <li><a href="javascript:giveCheck(6);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_07.png" alt="이승기" ></a></li>
                <li><a href="javascript:giveCheck(7);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_08.png" alt="이시한" ></a></li>
                <li><a href="javascript:giveCheck(8);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_09.png" alt="양원근" ></a></li>
                <li><a href="javascript:giveCheck(9);"><img src="https://static.willbes.net/public/images/promotion/2020/11/1934_02_10.png" alt="김윤태" ></a></li>
            </ul>
        </div>
    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

            @if(empty($arr_promotion_params) === false)

            var promotion_params = "?give_type={{$arr_promotion_params['give_type']}}&give_overlap_chk={{$arr_promotion_params['give_overlap_chk']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}&give_idx="+give_idx;
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}' + promotion_params;

            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }
    </script>
@stop