@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    /*.evtCtnsBox a {border:1px solid #000}*/


    .wb_top p {font-size:5vh; position: absolute; width:100%; left:0; bottom:5vh; color:#fff; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite; letter-spacing:-1px; text-align:center; z-index: 1;}
    @@keyframes upDown{
        from{color:#fff}
        50%{color:#ffe87d; scale:1.1}
        to{color:#fff}
    }
    @@-webkit-keyframes upDown{
        from{color:#fff}
        50%{color:#ffe87d; scale:1.1}
        to{color:#fff}
    }       


    .wb_06 {padding:10vh 0}
    .wb_06 .buylec {font-size:2.4vh; line-height:1.3;}
    .wb_06 .buylec p {font-size:4vh; margin-bottom:30px}
    .wb_06 .buylec span {color:#484baf}
    .wb_06 .buylec div {display:flex; justify-content: center; }
    .wb_06 .buylec a {height:100%; width:40%; text-align:center; display:block; font-size:2vh; font-weight:bold; color:#fff; background:#555edf; margin:0 1vh; padding:2vh; border-radius:10px}
    .wb_06 .buylec a:last-child {background:#792886}
    .wb_06 .buylec2 span {color:#cf3c3c}
    .wb_06 .buylec2 a {background:#0dabbe}
    .wb_06 .buylec2 a:last-child {background:#cf3c3c}
    .wb_06 .buylec a:hover {background:#000}


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
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_top.jpg" alt="법원 9급 2~5순환 종합반"/>
        <p class="NSK-Black">"선착순 150명 마감"</p>
    </div>

    <div class="evtCtnsBox wb_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_01.jpg" alt="합격생 배출 1위" data-aos="fade-up"/>
    </div>

    <div class="evtCtnsBox wb_02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_02.jpg" alt="동행의 힘"/>
    </div>

    <div class="evtCtnsBox wb_03" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_03.jpg" alt="당신의 합격 우리가 만들어 드립니다."/>
    </div>

    <div class="evtCtnsBox wb_04" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_04.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox wb_05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2794m_05.jpg" alt="면접합격률 99%"/>
    </div>

    <div class="evtCtnsBox wb_06" data-aos="fade-up">
        <div class="buylec">
            합격을 위한 이유 있는 선택!
            <p class="NSK-Black">MAIN <span>PSAT</span> CLASS <span><br>기본이론강의</span></p>
            <div>
                <a href="https://pass.willbes.net/m/pass/offLecture/index?cate_code=3143&course_idx=1427" target="_blank">학원 실강<br>수강신청 ></a>
                <a href="https://pass.willbes.net/m/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1364&school_year=2022" target="_blank">동영상 강의 <br>수강신청 ></a>
            </div>
        </div>
        <div class="buylec buylec2 mt80">
            시작부터 끝까지 최고와 함께!
            <p class="NSK-Black">Perfect <span>PSAT</span><br> Program <span>PASS</span></p>
            <div>
                <a href="https://pass.willbes.net/m/pass/offPackage/show/prod-code/201485" target="_blank">학원 실강<br>수강신청 ></a>
                <a href="https://pass.willbes.net/m/Package/index/cate/3103/pack/648001" target="_blank">동영상 강의<br>수강신청 ></a>
            </div>
        </div>
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