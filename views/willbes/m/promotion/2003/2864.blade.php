@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/    
</style>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="msg" value="아래 체험팩 수강후기를 등록해 주세요.">
</form>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2864m_top.gif" alt="" >
        <a href="javascript:void(0);" onclick="showPopup();" title="설문조사" style="position: absolute; left: 25.97%; top: 80.96%; width: 46.25%; height: 9.84%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox wrap" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2864m_01.jpg" alt=""/>
        <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx1'] or ''}}'); return false;" title="실강쿠폰받기" style="position: absolute; left: 23.61%; top: 65.33%; width: 46.25%; height: 10.19%; z-index: 2;"></a>
        <a href="javascript:void(0);" onclick="giveCheck('{{$arr_promotion_params['give_idx2'] or ''}}'); return false;" title="온라인쿠폰받기" style="position: absolute; left: 23.61%; top: 78.29%; width: 46.25%; height: 10.19%; z-index: 2;"></a>
    </div>

    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.m.promotion.show_comment_list_normal_partial')
    @endif
</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
      $(document).ready(function() {
        AOS.init();
      });

      var $regi_form = $('#regi_form');

      function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
          @endif
      }

      {{--쿠폰발급--}}
      function giveCheck(give_idx) {
          {!! login_check_inner_script('로그인 후 이용해주세요.','Y') !!}

          @if(empty($arr_promotion_params) === false)
              var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&give_idx=' + give_idx;
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

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop