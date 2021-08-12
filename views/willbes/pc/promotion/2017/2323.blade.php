@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2323_top_bg.jpg) no-repeat center top;}
        
        .event01 {background:#17a2fd; padding-bottom:100px}
        .event01 .wrap {width:1120px; margin:0 auto; display:flex; justify-content: space-between;}
        .event01 .wrap a {display:block; background:#050519; color:#fff; font-size:30px; padding:20px 30px; width:500px; margin:0 auto; border-radius:40px}
        .event01 .wrap a span {color:#31ffce; vertical-align:top}
        .event01 .wrap a:hover {background:#fe4e2c; color:#000}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/08/2323_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<div class="wrap NSK-Black">
                <a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/184440" target="_blank"><span>도장깨기 특강</span> 신청 바로가기 ></a>
                <a href="javascript:void(0);" class="btn-study"><span>수강후기 작성</span> 바로가기 ></a>
            </div>
        </div>
        <div id="WrapReply"></div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $('.btn-study').on('click', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){ alert('구매자가 아닙니다.'); return; }

            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'on',
                'site_code' : '{{ $__cfg['SiteCode'] }}',
                'cate_code' : '{{ $__cfg['CateCode'] }}',
                'prod_code' : '{{ $arr_promotion_params['arr_prod_code'] }}',
                'subject_idx' : '{{ $arr_promotion_params['subject_idx'] }}',
                'subject_name' : encodeURIComponent('{{ $arr_promotion_params['subject_name'] }}'),
                'prof_idx' : '{{ $arr_promotion_params['prof_idx'] }}'
            };
            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                var targetOffset= $("#evtContainer").offset().top;
                $('html, body').animate({scrollTop: targetOffset}, 1000);
            }, showAlertError, false, 'GET', 'html');
        });
    </script>
@stop