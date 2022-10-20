@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14vh; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/

    .wb_cts02 {margin-bottom:50px;}
    .wb_cts02 .tabs {display:flex}
    .wb_cts02 .tabs a {font-size:16px; text-align:center; display:block; width:33.3333%; background:#222; color:#fff; padding:20px 0; letter-spacing:-1px}
    .wb_cts02 .tabs a.active {background:#00C2C2;color:#fff;}

    .totalPrice {margin:50px auto 0;}
    .totalPrice a {display:block; font-size:35px; color:#00C2C2; padding:20px; background:#000; border-radius:10px;}
    .totalPrice a:hover {background:#533fd1;color:#fff;}

    /* 이용안내 */
    .wb_info {padding:4vh 2vh;}
    .guide_box{text-align:left; word-break:keep-all; line-height:1.5; font-size:1.6vh;}
    .guide_box h2 {font-size:3vh; margin-bottom:30px}
    .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; 
    padding:5px 20px; font-weight:bold; font-size:1.8vh; border-radius:30px}        
    .guide_box dd{color:#777; margin:0 0 20px 5px;}
    .guide_box dd strong {color:#555;}
    .guide_box dd li {margin-bottom:5px; list-style:decimal; margin-left:20px; }

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {       
        .totalPrice a {font-size:25px;}
    }
    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       
        .totalPrice a {font-size:30px;}
    }    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {    
      
    }

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox wb_top"  data-aos="fade-down">            
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_top.jpg" alt="선등록 이벤트" />            
    </div>

    <div class="evtCtnsBox wb_cts01"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_01.jpg" alt="명성"/>
    </div>

    <div class="evtCtnsBox wb_cts01_special"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_01_special.jpg" alt="특전"/>
    </div>

    <div class="evtCtnsBox mb50 wb_cts02" data-aos="fade-up">
        <div class="tabs NSK-Black">
            <a href="#tab01" class="active">자료해석</a>
            <a href="#tab02">상황판단</a>
            <a href="#tab03">언어논리</a>           
        </div>

        <div id="tab01" class="tabContents">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_tab01.jpg" alt="석치수">
        </div> 

        <div id="tab02" class="tabContents">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_tab02.jpg" alt="박준범">
        </div> 

        <div id="tab03" class="tabContents">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_tab03.jpg" alt="이나우"><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_tab04.jpg" alt="한승아">
        </div>
    </div>

    <div class="evtCtnsBox wb_cts03"  data-aos="fade-up" >
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_03.jpg" alt="윌비스 한림법학원"/>
    </div>

    <div class="evtCtnsBox wb_cts04"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_04.jpg" alt="psat so easy"/>
    </div>   

    <div class="evtCtnsBox wb_cts05 pb50"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_05.jpg" alt="전격개설"/>
        <div class="totalPrice NSK-Black">
            <a href="https://pass.willbes.net/m/pass/offPackage/show/prod-code/201485" target="_blank">수강신청 바로가기 ></a>
        </div>
    </div>

    <div class="evtCtnsBox wb_cts06"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_06.jpg" alt="마감유의"/>
    </div>

    <div class="evtCtnsBox wb_cts07"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_07.jpg" alt="온라인 pass반"/>
    </div>

    <div class="evtCtnsBox wb_cts08"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_08.jpg" alt="선등록 특전 및 기간제 패키지"/>
        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
        @endif 
    </div>

    <div class="evtCtnsBox wb_cts09"  data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/2800m_09.jpg" alt="10월 24일 개강"/>
    </div>

    <div class="evtCtnsBox wb_info" data-aos="fade-up">
        <div class="guide_box">
            <h2 class="NSK-Black">윌비스 한림법학원 Perfect PSAT Program  PASS반 이용안내</h2>
            <dl>
                <dt>이용안내</dt>
                <dd>
                    <ol>
                        <li>본 상품은 2023년 7급공무원 1차시험(PSAT)을 준비하시는 분을 위해 준비되었습니다.[과목별 교수님]<br>
                            자료해석 : 석치수, 상황판단 : 박준범, 언어논리(택1) : 이나우/한승아
                        </li>
                        <li>수강기간 : 본 상품에 등록된 강의는 2023년  7급공무원 1차시험(PSAT)일까지 수강하실 수 있습니다.</li>
                        <li>무제한수강 : 본 상품은 수강기간 동안 강의배수제한 없이 무제한 수강하실 수 있습니다.</li>
                        <li>CORE 특강 무료제공 : 과목별 4~5회 CORE특강이 무료 업로드되어 수강할 수 있습니다.(언어논리 : 신청과목 교수님 강의제공)</li>
                        <li>진행(업로드) 강좌 순차 업로드 : OPEN CLASS(기본, 22년 10~11월), ADVANCED CLASS(심화, 23년 1~2월),<br>
                            MASTER CLASS(실전모강, 23년 4~5월)강의가 수강하실 수 있게 순차적으로 업로드 될 예정입니다.
                        </li>
                        <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>교재</dt>
                <dd>
                    <ol>
                        <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                    </ol>
                </dd>

                <dt>환불</dt>
                <dd>
                    <ol>
                        <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                        <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                        <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                        <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, Perfect PSAT Program 온라인 PASS반 결제가 기준으로 계산하여 사용일수만큼 차감 후 환불됩니다.<br>(환불시 CORE 특강 수강료도 정가기준 수강부분만큼 차감 후 환불됩니다.)</li>
                    </ol>
                </dd>

                <dt>PASS 수강</dt>
                <dd>
                    <ol>
                        <li>로그인 후 [내강의실] 에서 [무한PASS존]으로 접속합니다.</li>
                        <li>구매한 PASS 상품 선택 후 [강좌추가] 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                        <li>Perfect PSAT Program 온라인 PASS반은 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                        <li>Perfect PSAT Program 온라인 PASS반 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                            - 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대
                        </li>
                        <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.<br>
                            (수강기간동안 3회 신청가능)
                        </li>
                        <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될 수 있습니다.</li>
                    </ol>
                </dd>

                <dt>유의사항</dt>
                <dd>
                    <ol>
                        <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                        <li>Perfect PSAT Program 온라인 PASS반 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                        <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 Perfect PSAT Program 온라인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>
                    </ol>
                </dd>

                <div class="infoTit NG"><strong>※ 이용문의 : 고객센터 1566-4770 / 사이트 내 1:1 상담 게시판</strong></div>               

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
 <script type="text/javascript">

    /*탭*/
        $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabs a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabs a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });

    </script>

@stop




