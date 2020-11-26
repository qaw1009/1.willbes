@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')  
    <!-- Container -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; }

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/11/1934_top_bg.jpg) no-repeat center top; height:904px}
        .evtTop .evtTilte {padding-top:240px; font-size:150px; font-family: 'Black Han Sans', sans-serif; color:#f9cf43;
            text-shadow: 2px 2px 1px #eb452b, 
            4px 4px 1px #efa032, 
            6px 6px 1px #46b59b, 
            8px 8px 1px #017e7f, 
            10px 10px 1px #052939, 
            12px 12px 1px #000, 
            14px 14px 1px #000, 
            16px 16px 1px #000, 
            18px 18px 1px #000;
            animation:upDown 1s infinite; -webkit-animation:upDown 1s infinite;
        }
        @@keyframes upDown{
        from{color:#f9cf43}
        50%{color:#fbeab3}
        to{color:#f9cf43}
        }
        @@-webkit-keyframes upDown{
        from{color:#f9cf43}
        50%{color:#fbeab3}
        to{color:#f9cf43}
        }

        .evt01 {background:#393a3e}

        .evt02 {width:1120px; margin:150px auto 140px}
        .evt02 li {display:inline; float:left; width:25%;height:531px;padding-bottom:10px;}
        .evt02 li a {display:block; text-align:center; }
        .evt02 li img:hover {box-shadow: 0 5px 10px rgba(0,0,0,0.1); margin-top:-10px}
        .evt02 ul:after {content:''; display:block; clear:both}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">    
        <div class="evtCtnsBox evtTop">
            <div class="evtTilte">
                BLACK<br>
                PRICE DAY
            </div>
        </div>  

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1934_01.jpg" alt="" >   
        </div>

        <div class="evtCtnsBox evt02"> 
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