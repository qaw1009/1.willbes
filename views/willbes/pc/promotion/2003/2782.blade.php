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
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:#fed6bb; overflow: hidden;}
        .wb_top img {z-index: 100;}
        .wb_top span {position:absolute; display:block}
        .wb_top span.circle01 {background:#febc8f; opacity:0.8; width:800px; height:800px; border-radius:50%; top:-400px; left:-200px; z-index: 0; animation:upDown 5s infinite;-webkit-animation:upDown 5s infinite;}
        @@keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(1.5)}
            to{transform:scale(1)}
        }
        @@-webkit-keyframes upDown{
            from{transform:scale(1)}
            50%{transform:scale(1.5)}
            to{transform:scale(1)}
        }

        .wb_top span.circle02 {background:#febc90; opacity:0.3; width:600px; height:600px; border-radius:50%; bottom:-300px; left:60%; z-index: 0; animation:upDown02 3s infinite;-webkit-animation:upDown02 3s infinite;}
        @@keyframes upDown02{
            from{transform:scale(1)}
            50%{transform:scale(0.8)}
            to{transform:scale(1)}
        }
        @@-webkit-keyframes upDown02{
            from{transform:scale(1)}
            50%{transform:scale(0.8)}
            to{transform:scale(1)}
        }

        .wb_top span.circle03 {background:#fff; opacity:0.3; width:600px; height:600px; border-radius:50%; bottom:-100px; right:-150px; z-index: 0; animation:upDown03 3s infinite;-webkit-animation:upDown03 3s infinite;}
        @@keyframes upDown03{
            from{transform:scale(0.7)}
            50%{transform:scale(1.2)}
            to{transform:scale(0.7)}
        }
        @@-webkit-keyframes upDown03{
            from{transform:scale(0.7)}
            50%{transform:scale(1.2)}
            to{transform:scale(0.7)}
        }


        .wb_02,
        .wb_05 {background:#dbdbdb}
        .wb_03 {background:#30323e}
        .wb_06 {padding-bottom:150px}
        .wb_06 div a {display:block; width:800px; margin:50px auto 150px; font-size:36px; background:#0043a9; color:#fff; border-radius:50px; text-align:center; padding:30px 0; }
        .wb_06 div a:hover {background:#000; color:#fff}
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">       
            <span class="circle01"></span>
            <span class="circle02"></span>
            <span class="circle03"></span>
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_top.png" alt="법원 9급 2~5순환 종합반" data-aos="fade-up"/>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_01.jpg" alt="합격생 배출 1위" data-aos="fade-up"/>
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_02.jpg" alt="동행의 힘"/>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_03.jpg" alt="당신의 합격 우리가 만들어 드립니다."/>
        </div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_04.jpg" alt="커리큘럼"/>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2696" title="pass 자세히 보기" target="_blank" style="position: absolute; left: 9.02%; top: 83.49%; width: 26.52%; height: 10.09%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" style="position: absolute; left: 0.63%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" style="position: absolute; left: 17.5%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" style="position: absolute; left: 33.93%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" style="position: absolute; left: 50.18%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" style="position: absolute; left: 66.61%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" style="position: absolute; left: 83.04%; top: 76.61%; width: 15.98%; height: 8.62%; z-index: 2;" target="_blank"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_05.jpg" alt="면접합격률 99%"/>
        </div>

        <div class="evtCtnsBox wb_06" data-aos="fade-up">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2782_06.jpg" alt=""/><br>
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" data-aos="fade-right" class="NSK-Black">더 많은 합격수기 확인하기  →</a>
            </div>
            <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/201311" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/09/2782_07.jpg" alt=""/></a>
            <p class="mt150"><a href="javascript:void(0);" onclick="showPopup();" title="설문 참여"><img src="https://static.willbes.net/public/images/promotion/2022/09/2782_08.jpg" alt=""/></a></p>
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