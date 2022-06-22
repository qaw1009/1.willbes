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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}*/

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2022/06/2668_top_bg.jpg) no-repeat center top;}

        .evt02 {padding-bottom:100px}
        .comment {font-size:15px;font-weight:bold;padding-right:670px;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:16px}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:40px; margin-bottom:20px}
        .evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {list-style-type: decimal;margin-left:20px; margin-bottom:10px}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="msg" value="아래 체험팩 수강후기를 등록해 주세요.">
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-down">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2668_top.jpg" alt="설문조사 시험후기"/>                      
        </div>
        
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2668_01.jpg" alt="시험장 영상스케치 파일 삽입"/>
                <a href="javascript:alert('Coming Soon!')" title="영상스케치" style="position: absolute;left: 8.64%;top: 16.44%;width: 83.09%;height: 75.76%;z-index: 2;"></a>         
            </div>         
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2668_02.jpg" alt="모의고사 설문조사"/>
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여" style="position: absolute;left: 19.64%;top: 84.14%;width: 60.79%;height: 8.76%;z-index: 2;"></a>         
            </div>
            <div class="comment">
                📣 <span>Real 모의고사 응시후, 후기평을 남겨주세요.</span>
            </div>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>  
        
        <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[이벤트 참여 시, 유의사항]</h4>
                <ul>
                    <li>본 이벤트는 홈페이지 로그인 후, 참여 가능합니다.</li>
                    <li>본 설문조사 이벤트는 모의고사 후기에 관한 내용이어야 합니다. 목적과 관련 없는 글은 삭제될 수 있습니다.</li>
                    <li>본 설문조사 이벤트 참여자중 30명을 추첨하여 아이스 아메리카노 선물을 지급해 드립니다, 많은 참여 바랍니다.<br>
                        (당첨자는 홈페이지 게시 )</li>
                </ul>
            </div>
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