@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/

        .skybanner {position:fixed; top:225px;right:10px;z-index:10;}
        .skybanner a{display:block; margin-bottom:10px;}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/1786_top_bg.jpg) no-repeat center}
        
        .evt01 {background:#fff}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2021/03/1786_02_bg.jpg) no-repeat center}
        .evt03 {background:#e3e3e3}

        .youtube {position:absolute; top:469px; left:50%; z-index:1;margin-left:-89px}
        .youtube iframe {width:585px; height:345px}

        .evt05 {background:#f4f4f4;}

        .evt07 {background:#555; padding-bottom:100px}

        .evtInfo {padding:100px 0; background:#f4f4f4; color:#282828; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li { list-style:disc; margin-left:20px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_sky01.png" alt="10월 지텔프" >
            </a>         
        </div>   
        --}}s


        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_top.jpg" title="추천강좌" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_01.jpg" />
        </div>         
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_02.jpg"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_03.jpg" />           
        </div> 

        <div class="evtCtnsBox evt04">           
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_04.jpg" />
        </div> 

        <div class="evtCtnsBox evt05">           
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_05.jpg" />
        </div>

        <div class="evtCtnsBox evt06">           
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_06.jpg" />
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hFgv1FgRe3I?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>  

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/1786_07.jpg" />

                @if(empty($arr_base['display_product_data']) === false)
                    @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
                @else
                   강의리스트
                @endif 

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