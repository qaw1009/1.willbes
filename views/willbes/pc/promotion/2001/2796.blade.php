@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">       
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.4;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:10px}


        .evttop {background:url("https://static.willbes.net/public/images/promotion/2022/10/2796_top_bg.jpg");}
        .evt01 {background:url("https://static.willbes.net/public/images/promotion/2022/10/2796_01_bg.jpg");}
        .evt03 {background:#f2f2f2}       

        .evt04 {background:#373737;}
        .evt05 {background:#fff}
        .evt07 {padding-bottom:100px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt06"><img src="https://static.willbes.net/public/images/promotion/2022/10/2796_sky01.png" title="소문내기 이벤트"></a>               
            <a href="#evt07"><img src="https://static.willbes.net/public/images/promotion/2022/10/2796_sky02.png" title="이론완성반"></a>            
        </div>

        <div class="evtCtnsBox evttop">           
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_top.jpg" title="11.14일 개강 올인원 기출분석반">
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_01.jpg" title="교수진" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_02.jpg" title="왜 올인원이론반인가?" data-aos="fade-right">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_03.jpg" title="합격커리큘럼" data-aos="fade-left">
        </div>

        <div class="evtCtnsBox evt04">
            <div class="wrap" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_04.jpg" title="스케줄" >
                <a href="https://police.willbes.net/pass/offinfo/boardInfo/index/80" target="_blank" title="강의시간표" style="position: absolute; left: 30.63%; top: 77.44%; width: 38.66%; height: 10.01%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-right" id="evt06">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2796_05.jpg" title="소문내기 이벤트">
                <a href="javascript:void(0);" onclick="giveCheck(); return false;" title="쿠폰받기" style="position: absolute; left: 27.32%; top: 59.67%; width: 45.18%; height: 5.05%; z-index: 2;"></a>
                <a href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 57.32%; top: 74.62%; width: 29.46%; height: 5.05%; z-index: 2;"></a>
            </div>
        </div> 

        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif 

        <div class="evtCtnsBox evt07" id="evt07" data-aos="fade-up">
            <div><img src="https://static.willbes.net/public/images/promotion/2022/10/2796_06_01.jpg" title="단과"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
            <div><img src="https://static.willbes.net/public/images/promotion/2022/10/2796_06_02.jpg" title="종합반"></div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
            @endif
        </div>

	</div>
    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>


    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );

      var $regi_form = $('#regi_form');
      function giveCheck() {
          {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
          @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
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