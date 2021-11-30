@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/


        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2431_top_bg.jpg) no-repeat center top;}
        .evt_top .topimg {position:absolute; width:1029px; left:50%; top:600px; margin-left:-514px; z-index: 10;}

        .evt_02 {background:#b7ebff}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}

        <input type="hidden" name="msg" value="아래 체험팩 수강후기를 등록해 주세요.">
    </form>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <div class="topimg"><img src="https://static.willbes.net/public/images/promotion/2021/11/2431_top_img.png" alt="" data-aos="flip-left"/></div>
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2431_top.jpg" alt=""/>            
        </div>

        <div class="evtCtnsBox">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2431_01.jpg" alt="" />
                <a href="https://cafe.daum.net/LAW-KDJTEAM" target="_blank" title="김동진 법원팀 카페" style="position: absolute;left: 56.7%;top: 79.04%;width: 21.53%;height: 1.83%;z-index: 2;"></a>
            </div>
        </div>  
        
        <div class="evtCtnsBox evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2431_02.jpg" alt="" />
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여" style="position: absolute; left: 31.7%; top: 74.04%; width: 36.43%; height: 10.83%; z-index: 2;"></a>
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
    </script>
@stop