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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2878_top_bg.jpg) no-repeat center top;}

        .evt01s {background:#EAEAEA}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2878_03_bg.jpg) no-repeat center top;}

        .evt05 {background:#DBDBDB}

        .evt07 {background:#E5FFF6}

        .evt08 {background:#FFEAE5}

        .evt09 {background:#EBEBEB}

        /************************************************************/

    </style>

    <div class="evtContent NSK" id="evtContainer">

		<div class="evtCtnsBox evtTop" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_top.jpg" alt="김동진 법원팀" />             
		</div>
        
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_01.jpg" alt="압도적 1위" />
		</div>

        <div class="evtCtnsBox evt01s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_01s.jpg" alt="4~5순환 과정" />
		</div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_02.jpg" alt="김동진 법원팀의 시스템"/>                
            </div>
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_03.jpg" alt="교수진" />
		</div>



        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_04.jpg" alt="연간 커리큘럼">
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute; left: 0.98%; top: 77.04%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute; left: 17.41%; top: 77.04%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute; left: 33.75%; top: 77.04%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute; left: 50.36%; top: 77.04%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute; left: 66.79%; top: 77.04%; width: 15.71%; height: 9.08%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute; left: 83.04%; top: 77.04%; width: 15.71%; height: 9.08%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_05.jpg" alt="면접 합격률99%" />
		</div>

        <div class="evtCtnsBox evt06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_06.jpg" alt="절대만족후기" />
                <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 24.73%; top: 84.05%; width: 50%; height: 9%; z-index: 2;"></a>
            </div>
		</div>    

        <div class="evtCtnsBox evt07" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_07.jpg" alt="4~5순환 학원종합반" />
                <a href="https://pass.willbes.net/periodPackage/show/cate/3035/pack/648001/prod-code/204717" target="_blank" style="position: absolute;left: 17.58%;top: 80.05%;width: 64.11%;height: 12.08%;z-index: 2;"></a>                
            </div>
		</div>
        {{--
        <div class="evtCtnsBox evt07s" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_07s.jpg" alt="온라인 관리반" />
		</div>
        
        <div class="evtCtnsBox evt08" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_08.jpg" alt="4~5순환 온라인 관리반" />
                <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute;left: 17.58%;top: 69.55%;width: 64.11%;height: 11.08%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" target="_blank" style="position: absolute;left: 17.58%;top: 81.95%;width: 64.11%;height: 11.08%;z-index: 2;"></a>
            </div>
		</div>
        --}}
        <div class="evtCtnsBox evt09" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2878_09.jpg" alt="체험팩 설문조사 참여하기" />
                <a href="https://www.willbes.net/member/login/?rtnUrl=%2F%2Fpass.willbes.net%2FeventSurvey%2Findex%2F117" target="_blank" style="position: absolute; left: 16.88%; top: 78.05%; width: 64.11%; height: 13.08%; z-index: 2;"></a>
            </div>
		</div>

	</div>
    <!-- End Container -->


    <script>
      var $regi_form = $('#regi_form');

      function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            var windowW = 800; // 창의 가로 길이
            var windowH = 700; // 창의 세로 길이
            var left = Math.ceil((window.screen.width - windowW)/2);
            var top = Math.ceil((window.screen.height - windowH)/2);
            window.open(url,"survey_event","top="+top+", left="+left+", height="+windowH+", width="+windowW);
          @endif
      }

      /*쿠폰발급*/
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
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
            AOS.init();
        });
    </script>
@stop