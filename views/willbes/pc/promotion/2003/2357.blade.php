@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2356_07_bg.jpg) no-repeat center top;}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_07.jpg" alt="5일 체험팩"/>
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여" style="position: absolute; left: 34.64%; top: 76.44%; width: 30.09%; height: 8.76%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox pb100">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_08.jpg" alt="후기쓰고 쿠폰받기" data-aos="fade-right"/>
                <a href="javascript:void(0);" onclick="giveCheck();" title="쿠폰받기" style="position: absolute; left: 50.89%; top: 71.2%; width: 30.09%; height: 12.92%; z-index: 2;"></a>
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

      var $regi_form = $('#regi_form');

      function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
              var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
              window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
          @endif
      }

      {{--쿠폰발급--}}
      function giveCheck() {
          {!! login_check_inner_script('로그인 후 이용해주세요.','Y') !!}

          @if(empty($arr_promotion_params) === false)
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
@stop