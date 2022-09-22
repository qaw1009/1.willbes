@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:#c0ebfe}


        .wb_02,
        .wb_05 {background:#dbdbdb}
        .wb_03 {background:#30323e}
        .wb_06 {padding-bottom:150px}
        .wb_06 div a {display:block; width:800px; margin:50px auto 150px; font-size:36px; background:#0043a9; color:#fff; border-radius:50px; text-align:center; padding:30px 0; }
        .wb_06 div a:hover {background:#000; color:#fff}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">        
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_top.png" alt="법원 9급 2~5순환 종합반" data-aos="fade-up"/>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_01.jpg" alt="합격생 배출 1위" data-aos="fade-up"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_02.jpg" alt="동행의 힘"/>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_03.jpg" alt="당신의 합격 우리가 만들어 드립니다."/>
        </div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_04.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox wb_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_05.jpg" alt="면접합격률 99%"/>
        </div>

        <div class="evtCtnsBox wb_06" data-aos="fade-up">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2783_06.jpg" alt=""/><br>
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" data-aos="fade-right" class="NSK-Black">더 많은 합격수기 확인하기  →</a>
            </div>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3059/prod-code/201303" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2783_07.jpg" alt=""/></a>
            <p class="mt150"><a href="javascript:void(0);" onclick="showPopup();" title="설문 참여"><img src="https://static.willbes.net/public/images/promotion/2022/09/2783_08.jpg" alt=""/></a></p>
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );

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