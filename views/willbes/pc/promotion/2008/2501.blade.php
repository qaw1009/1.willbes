@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/      

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/01/2501_top_bg.jpg) no-repeat center top;}
        .evt01 {padding-bottom:150px} 
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2501_top.jpg" title="경찰간부 5일 체험팩">
                <a href="javascript:void(0);" onclick="showPopup();" title="설문조사" style="position: absolute; left: 31.25%; top: 84.17%; width: 36.61%; height: 7.83%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/01/2501_01.jpg" title="쿠폰 이벤트">
                <a href="javascript:;" onclick="giveCheck()" title="쿠폰받기" style="position: absolute; left: 31.25%; top: 61.72%; width: 36.61%; height: 15.92%; z-index: 2;"></a> 
            </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif  
        </div>          
        
	</div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript">
        $regi_form = $('#regi_form');

        {{--쿠폰발급--}}
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('전국 모의고사 할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    {{--location.href = '{{ app_url('/classroom/coupon/index', 'www') }}';--}}
                }
            }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

      function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
              var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
              window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
          @endif
      }
    </script>
@stop 