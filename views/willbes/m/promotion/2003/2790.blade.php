@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .Container {font-size:62.5%;}
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size: calc(1.4rem + (((100vw - 1.4rem) / (90 - 20))) * (2.0 - 1.4)); line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox a {border:1px solid #000}

    .lecInfo {font-size:1.8vh; padding:5vh}
    .lecInfo h5 {font-size:3vh; text-align:center; background:#1c318b; color:#fff; padding:20px; margin:5vh auto 3vh}
    .lecInfo p {font-size:1.6vh; color:red}
    .lecInfo .fs24 {font-size:2.4vh;}
    .lecInfo li {text-align:left; margin-left:4vh;}
    .lecInfo ol li {list-style-type: demical;}
    .lecInfo ul li {list-style-type: disc; margin-bottom:10px}
    .lecInfo ul li strong {font-size:2vh; display:block}

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

    <div class="evtCtnsBox" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_top.jpg" alt="단 5일의 투자" >
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_01.jpg" alt="표,그래프 마스터, 계산 특강" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_02.jpg" alt="혜택" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_03.jpg" alt="" >
    </div> 

    <div class="evtCtnsBox lecInfo" data-aos="fade-up" >
        <h5 class="NSK-Black">강의일정 및 장소</h5>
        <div class="fs24">2022년 10/10(월)  ~ 10/14(금),<br>
        총 5회 (강의시간 오후 2:00 ~ 5:30) / 신림동 한림법학원</div>
        <p>※ 동영상업로드 : 실강 다음날 오전 11시까지 업로드</p>

        <h5 class="NSK-Black">수강대상</h5>
        <ol>
            <li>PSAT 기출을 풀어보고 자료해석에서 심각한 좌절감을 느끼는 수험생</li>
            <li>표•그래프만 보면 심장 박동수가 증가하는 수험생</li>
            <li>표•그래프의 주제를 예상할 수 없는 수험생</li>
            <li>표•그래프가 여러 개 등장할 때, 항목 간의 관계 파악이 느리거나 어려움을 겪는 수험생</li>
            <li>계산에 대한 두려움으로 자료해석 과목 자체가 자신 없는 수험생</li>
        </ol>

        <h5 class="NSK-Black">강의일정 및 장소</h5>
        <p>※ 실강 수강자는 합격을 향한 열정과 필기구만 준비하여 참여하시면 됩니다!</p>
        <ol style="margin-top:2vh">
            <li>표•그래프 뽀개기 프린트(무료제공)</li>
            <li>석치수의 합격하는 계산 훈련용 교재(제본집, 무료제공)</li>
            <li>계산능력 향상을 위한 계산 마스터 프린트(무료제공)</li>
        </ol>

        <h5 class="NSK-Black">강의계획</h5>
        <ul style="margin-top:2vh">
            <li><strong>제1회 10/10(월)</strong>
            표•그래프 읽기 + 특징 + 주제 + 선택지 예상하기</li>
            <li><strong>제2회 10/11(화)</strong>
            계산의 기초 1: 사칙연산, 분수비교, 곱셈비교, 기초개념</li>
            <li><strong>제3회 10/12(수)</strong>
            계산의 기초 2: 증가율, 비중, 어림산 응용</li>
            <li><strong>제4회 10/13(목)</strong>
            기출식 세우기, 가중평균</li>
            <li><strong>제5회 10/15(금)</strong>
            가중평균</li>
        </ul>
        

    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_04.jpg" alt="수강신청 바로가기" >
            <a href="https://pass.willbes.net/m/pass/offLecture/show/cate/3143/prod-code/201562" title="바로가기" target="_blank" style="position: absolute;left: 14.92%;top: 77.50%;width: 70.39%;height: 9.28%;z-index: 2;"></a>
        </div>
    </div>
    
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2790m_v2_05.jpg" alt="" >
    </div> 

</div>

<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
        AOS.init();
    });    
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop