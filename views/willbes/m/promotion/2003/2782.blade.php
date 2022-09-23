@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/


    .wb_06 {padding-bottom:15vh}
    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">
    <div class="evtCtnsBox wb_top" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_top.jpg" alt="법원 9급 2~5순환 종합반"/>
    </div>

    <div class="evtCtnsBox wb_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_01.jpg" alt="합격생 배출 1위" data-aos="fade-up"/>
    </div>

    <div class="evtCtnsBox wb_02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_02.jpg" alt="동행의 힘"/>
    </div>

    <div class="evtCtnsBox wb_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_03.jpg" alt="당신의 합격 우리가 만들어 드립니다."/>
    </div>

    <div class="evtCtnsBox wb_04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_04.jpg" alt="커리큘럼"/>
        <a href="https://pass.willbes.net/m/promotion/index/cate/3035/code/2696" title="pass" target="_blank" style="position: absolute; left: 57.92%; top: 19.12%; width: 41.39%; height: 6.58%; z-index: 2;"></a>
    </div>

    <div class="evtCtnsBox wb_05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_05.jpg" alt="면접합격률 99%"/>
    </div>

    <div class="evtCtnsBox wb_06" data-aos="fade-up">
        <p>
            <a href="http://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_06.jpg" alt="후기"/>
            </a>
        </p>
        <p>
            <a href="https://pass.willbes.net/m/periodPackage/show/cate/3035/pack/648001/prod-code/201311" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_07.jpg" alt="수강신청"/>
            </a>
        </p>
        <p style="margin-top:15vh">
            <a href="javascript:void(0);" onclick="showPopup();" title="설문 참여"><img src="https://static.willbes.net/public/images/promotion/2022/09/2782m_08.jpg" alt="체험팩"/></a>
        </p>
    </div>
</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });

    function showPopup(){
          @if(empty($arr_promotion_params['SsIdx']) === true)
            alert('설문정보가 없습니다.');
            return;
          @else
            var url = "{{front_url('/eventSurvey/index/' . $arr_promotion_params['SsIdx'])}}";
            window.open(url,'survey_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
          @endif
      }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop