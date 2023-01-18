@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox.wrap {position:relative}
    /*.evtCtnsBox.wrap a {border:1px solid #000}*/

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evtTop" data-aos="fade-down">           
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_top.jpg" alt="김동진 법원팀" />             
    </div>
    
    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_01.jpg" alt="압도적 1위" />
    </div>

    <div class="evtCtnsBox evt01s" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_01s.jpg" alt="4~5순환 과정" />
    </div>

    <div class="evtCtnsBox evt02" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_02.jpg" alt="김동진 법원팀의 시스템"/>
    </div>

    <div class="evtCtnsBox evt03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_03.jpg" alt="교수진" />
    </div>

    <div class="evtCtnsBox evt04" data-aos="fade-up">
        <div class="wrap"> 
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_04.jpg" alt="연간 커리큘럼">
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU67JiI67mE7Iic7ZmY&course_idx=" title="예비순환" target="_blank" style="position: absolute;left: 3.98%;top: 17.04%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MeyInO2ZmA%3D%3D" title="1순환" target="_blank" style="position: absolute;left: 3.98%;top: 29.84%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6MuyInO2ZmA%3D%3D" title="2순환" target="_blank" style="position: absolute;left: 3.98%;top: 42.64%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6M%2ByInO2ZmA%3D%3D" title="3순환" target="_blank" style="position: absolute;left: 3.98%;top: 55.54%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NOyInO2ZmA%3D%3D" title="4순환" target="_blank" style="position: absolute;left: 3.98%;top: 68.24%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/m/lecture/index/cate/3035/pattern/only?search_order=regist&subject_idx=&search_text=UHJvZE5hbWU6NeyInO2ZmA%3D%3D" title="5순환" target="_blank" style="position: absolute;left: 3.98%;top: 81.04%;width: 92.11%;height: 10.38%;z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_05.jpg" alt="면접 합격률99%" />
    </div>

    <div class="evtCtnsBox evt06" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_06.jpg" alt="절대만족후기" />
            <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="더 많은 합격수기 보기" style="position: absolute; left: 24.73%; top: 82.75%; width: 50%; height: 9%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evt07" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_07.jpg" alt="4~5순환 학원종합반" />
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/204717" target="_blank" style="position: absolute;left: 17.98%;top: 80.05%;width: 64.11%;height: 12.08%;z-index: 2;"></a>
        </div>
    </div>
    {{--
    <div class="evtCtnsBox evt08" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_08.jpg" alt="4~5순환 온라인 관리반" />
            <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3059" target="_blank" style="position: absolute;left: 17.98%;top: 74.55%;width: 64.11%;height: 9.78%;z-index: 2;"></a>
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3059/code/2119" target="_blank" style="position: absolute;left: 17.98%;top: 84.55%;width: 64.11%;height: 9.78%;z-index: 2;"></a>
        </div>
    </div>
    --}}
    <div class="evtCtnsBox evt09" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2878m_09.jpg" alt="체험팩 설문조사 참여하기" />
            <a href="https://www.willbes.net/m/member/login/?rtnUrl=%2F%2Fpass.willbes.net%2FeventSurvey%2Findex%2F117" target="_blank" style="position: absolute;left: 16.98%;top: 78.75%;width: 64.11%;height: 13.08%;z-index: 2;"></a>
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
            window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
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

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
            AOS.init();
        });
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop