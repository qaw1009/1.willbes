@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/             
        .sky {position:fixed; top:200px; width:216px; text-align:center; right:10px;z-index:10;}
        .sky a {display:block; margin-bottom:20px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2655_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#f83651}  

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/03/2568_03_bg.jpg) repeat-x left top; padding-bottom:100px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <div class="evtContent NSK" id="evtContainer">             

        <div class="sky" id="QuickMenu">
            <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_sky01.png" alt="윌비스 전국모의고사 접수하기" >
            </a>   
            <a href="#event03"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_sky02.png" alt="윌비스 전국모의고사 접수하기" >
            </a>                   
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_top.jpg" alt="전국 모의고사" />
                <a href="#event03" title="모의고사 신청" style="position: absolute;left: 34.66%;top: 59.18%;width: 33.46%;height: 9.24%;z-index: 2;"></a>
            </div>
        </div>
      
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_01.jpg" alt="시험 미리 만나기" /> 
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_02.jpg" alt="접수 및 시행일정" />              
        </div>

        <div class="evtCtnsBox evt03" id="event03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2655_03.jpg" alt="시험 미리 만나기"  data-aos="fade-up"/> 
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰" style="position: absolute;left: 12.66%;top: 69.12%;width: 37.23%;height: 8.14%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" title="모의고사 신청" target="_blank" style="position: absolute;left: 50.66%;top: 69.12%;width: 37.23%;height: 8.14%;z-index: 2;"></a>
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif
        </div>
        
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $( document ).ready( function() {
        AOS.init();
    } );
    </script>

    <script type="text/javascript">

        $regi_form = $('#regi_form');               

        /*쿠폰발급*/
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('온라인 모의고사 무료 응시쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';
                }
            }, showValidateError, null, false, 'alert');
            @endif
        }

    </script>    
@stop