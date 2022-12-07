@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_cts02 {margin-bottom:50px;}
    .wb_cts02 .tabs {display:flex}
    .wb_cts02 .tabs a {font-size:16px; text-align:center; display:block; width:33.3333%; background:#222; color:#fff; padding:20px 0; letter-spacing:-1px}
    .wb_cts02 .tabs a.active {background:#00C2C2;color:#fff;}

    .wb_cts05 a {display:block; width:60%; margin:0 auto; padding:1vh; text-align:center; background:#333; color:#fff; border-radius:30px;}
    .wb_cts05 p {font-size:4vh; margin:10vh auto}

    /* 이용안내 */
    .wb_info {padding:4vh 2vh; background:#ededed;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
    padding:5px 20px; font-weight:bold; font-size:1.8vh; border-radius:30px}        
    .guide_box dd{color:#333; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555;}
    .guide_box dd li {margin-bottom:5px; list-style:decimal; margin-left:20px; }
    .guide_box dd span {color:red}



</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top"  data-aos="fade-up">            
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2848m_top.jpg" alt="7급 PSAT 티패스" />            
    </div>

    <div class="evtCtnsBox wb_cts01"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2848m_01.jpg" alt="무료혜택"/>
    </div>

    <div class="evtCtnsBox mb50 wb_cts02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2848m_02.jpg" alt="교수진"/>
    </div>

    <div class="evtCtnsBox wb_cts03"  data-aos="fade-up" >
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2848m_03.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox wb_cts04"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/12/2848m_04.jpg" alt="운영과정"/>
    </div> 
    
    
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif 

    <div class="evtCtnsBox wb_cts05"  data-aos="fade-up">
        <a href="#tip">이용안내 확인하기 ▼</a>
        <p class="NSK-Black">“바른 시작이 합격을 위한<br> 가장 빠른 방법입니다.”</p>
    </div>

    <div class="evtCtnsBox wb_info" data-aos="fade-up" id="tip">
        <div class="guide_box">
            <h2 class="NSK-Black">윌비스 한림법학원 교수님 온라인 T-PASS반 이용안내</h2>
            <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 2023년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.<br>
                            [과목별 교수님]<br> 
                            자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아</li>
                            <li>수강기간 : 본 상품에 등록된 강의는<span>강의신청일부터 2023년 7급 1차 시험일까지 수강</span>하실 수 있습니다.<br>
                            ※ 패키지 과정은 특별할인 적용 상품으로, <span>일시중지/연장/재수강 적용되지 않으며 수강시작일 지정 불가</span>합니다.</li>
                            <li>강의배수  : 본 패키지 과정은 <span>3배수제한 적용 과정</span>입니다.</li>
                            <li><span>기기대수제한  : pc 2 또는 pc 1 + 모바일 기기 1</span>(스마트폰 또는 테블릿)</li>
                            <li>교재구매 : 수강중인 강의 > 강의보기 > 구매하지않은 교재 확인 후 결제 진행 하시면 됩니다.</li>
                            <li>CORE 특강 무료제공 : 신정하신 교수님의 <span>CORE특강이 자동 등록</span>됩니다.(+ 해당 강사님 T-PASS 신청시 추가 강의 무료제공)</li>
                            <li>진행(업로드) 강좌 순차 업로드 : <br>
                            MAIN CLASS(기본, 22년 10월), ADVANCED CLASS(심화, 23년 1~2월),   MASTER CLASS(실전모강, 23년 4~5월) 이 순차적으로 업로드 될 예정입니다.</li>
                            <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                        </ol>
                    </dd>

                    <dt>교재관련</dt>
                    <dd>
                        <ol>
                            <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                        </ol>
                    </dd>

                    <dt>환불정책</dt>
                    <dd>
                        <ol>
                            <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                            <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                            <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                            <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, 온라인 T-PASS반 결제가 기준으로 
                            계산하여 사용일수만큼 차감 후 환불됩니다.(환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)</li>
                        </ol>
                    </dd>

                    <dt>유의사항</dt>
                    <dd>
                        <ol>
                            <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                            <li>온라인 T-PASS 반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,  이로 인한 환불은 불가합니다.</li>
                            <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 온라인 T-PASS 반은 즉시 정지,  회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                        </ol>
                    </dd>

                
                </dl>           

            </dl> 
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
</script>

@stop




