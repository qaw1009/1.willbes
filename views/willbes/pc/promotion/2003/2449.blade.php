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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/12/2449_top_bg.jpg) no-repeat center top;}
        .evt_top span {position:absolute; bottom:0; left:50%; margin-left:-508px;}
        .evt_01 {background:#240800}

        .evt_03 {background:#f5f5f5}
        .evt_05 {background:#ddd}
        .evt_07 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2449_07_bg.jpg) no-repeat center top;}
    </style>

    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_top.jpg" alt="법원팀 온라인 선행학습"/>  
            <span data-aos="flip-left"><img src="https://static.willbes.net/public/images/promotion/2021/12/2449_top_img.png" alt="법원팀 온라인 교수진"/></span>          
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_01.jpg" alt="수강신청" />
            </a>
        </div>
        
        <div class="evtCtnsBox evt_02" data-aos="fade-up">   
            <div class="wrap">         
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_02.jpg" alt="무료수강 찬스" />
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2431" target="_blank" title="자세히보기" style="position: absolute; left: 32.05%; top: 80.13%; width: 35.71%; height: 7.79%; z-index: 2;"></a>
            </div>
        </div> 

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_03.jpg" alt="선행과정"/>            
        </div>

        <div class="evtCtnsBox evt_04" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_04.jpg" alt="법원팀 온라인 관리반"/>            
        </div>

        <div class="evtCtnsBox evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_05.jpg" alt="수강생 중심 운영"/>            
        </div>

        <div class="evtCtnsBox evt_06" data-aos="fade-up">
            <div class="wrap">         
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_06.jpg" alt="수강 만족후기" />
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="자세히보기" style="position: absolute; left: 32.05%; top: 80.13%; width: 35.71%; height: 7.79%; z-index: 2;"></a>
            </div>          
        </div>
        
        <div class="evtCtnsBox evt_07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2449_07.jpg" alt="체험팩" />
                <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여" style="position: absolute; left: 33.93%; top: 71.4%; width: 30.54%; height: 10.89%; z-index: 2;"></a>
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