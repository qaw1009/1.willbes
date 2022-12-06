@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox .wrap {position:relative}

    /*.evtCtnsBox a {border:1px solid #000}*/    

    .evt01 .youtube {position:relative; padding-top:30px; padding-bottom:56.25%; margin:0; height:0;background: #000;} 
    .evt01 .youtube iframe {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%; z-index: 2;}

    .evt05 {background:#F5F5F5; padding-bottom:8vh}
    .slide_con {padding:0 30px 30px}
    .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
    .slide_con .bx-wrapper .bx-pager {
        width: auto;
        bottom: -30px;
        left:0;
        right:0;
        text-align: center;
        z-index:90;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
        background: #ccc;
        width: 14px;
        height: 14px;
        margin: 0 4px;
        border-radius:10px;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
        background: #19586A;
    }
    .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
        width: 30px;
    }

    .evt_07 {padding:50px 0; background:#f5f5f7}
    .evt_07 h4 {font-family: 'Black Han Sans', sans-serif; font-size:30px}
    .evt_07 > a {display:block; margin-bottom:15px}

    .check {padding:20px 0 0;}
    .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block; padding:10px 0; color:#fff; background:#393939; border-radius:20px; font-weight:bold; width:60%; margin:20px auto}

    .evtInfo {padding:50px 20px; background:#626262; color:#fff;}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.4;}
    .evtInfoBox h4 {font-size:2.4vh; margin-bottom:30px;}
    .evtInfoBox .infoTit {font-size:1.6vh; margin-bottom:10px}
    .evtInfoBox .infoTit strong {padding:5px 10px; background:#fff; color:#000; border-radius:20px;}
    .evtInfoBox ul {margin-bottom:20px}
    .evtInfoBox li {margin-bottom:5px; list-style-type: decimal; margin-left:20px}
    .evtInfoBox a {color:#f1d188}

</style>

<div id="Container" class="Container NSK c_both">

    <div class="evtCtnsBox evt_top" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_top.jpg" alt="경찰학 김재규" >        
    </div> 

    <div class="evtCtnsBox evt01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_01.jpg" alt="오리지날 경찰학"/>
        <div class="youtube">
            <iframe src="https://www.youtube.com/embed/ojZcGpQXrcs?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_01_01.jpg" alt=""/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_02.jpg"  alt="합격률"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_03.jpg"  alt="커리큘럼"/>               
    </div>

    <div class="evtCtnsBox" data-aos="fade-up">        
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_04.jpg"  alt="경찰학 교재"/>                
    </div>

    <div class="evtCtnsBox evt05" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_05.jpg" alt="리얼 수강후기" >
        <div class="slide_con">
            <ul id="slidesImg2">
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment01.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment02.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment03.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment04.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment05.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment06.png" alt="" /></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment07.png" alt="" /></li>                
                <li><img src="https://static.willbes.net/public/images/promotion/2022/11/2825m_comment08.png" alt="" /></li>               
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_06.jpg"  alt="그레이스 호퍼 명언"/>               
    </div>

    <div class="evtCtnsBox evt_07" data-aos="fade-up">
            <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2828m_07.jpg" alt="">
            <a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank" title="유튜브 바로가기" data-url="https://police.willbes.net/m/periodPackage/show/cate/3001/pack/648001/prod-code/202735" style="position: absolute;left: 15.75%;top: 36.27%;width: 64.83%;height: 5.12%;z-index: 2;"></a>           
            <a href="javascript:void(0);" title="신청하기" data-url="https://police.willbes.net/m/periodPackage/show/cate/3001/pack/648001/prod-code/202735" onclick="go_PassLecture(this)" style="position: absolute;left: 11.75%;top: 80.27%;width: 76.83%;height: 10.12%;z-index: 2;"></a>               
        </div>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#info">이용안내확인하기 ↓</a>
            <p>
                ※ 강의공유, 콘텐츠 부정사용 적발 시, 환급이 불가합니다.
            </p>
        </div> 
    </div>

    <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">2023 1차대비 김재규 경찰학 100일 완성 PASS 이용안내</h4>
            <div class="infoTit NSK-Black"><strong>강좌 기본</strong></div>
            <ul>               
                <li>본 상품은 구매일로부터 23년1차 필기시험일 까지 무제한으로 수강 가능한 기간제 패스입니다.(최초 : 23년 3월 30일까지)</li>
                <li>김재규 경찰학 100일완성  PASS는 결제가 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                <li>김재규 경찰학 T-PASS 상품 구성은 다음과 같습니다.<br>                    
                    - 김재규 경찰학 T-PASS : 김재규 교수님 경찰학 전 강좌<br>
                    - 12월5일 : 이총기+핵서 (핵심이론반)<br>
                    - 23년 1월 : 플러스 1000제(실전대비 객관식 집중강의)<br>
                    - 23년 2월 : 개정법령특강<br>
                    - 학원사정으로 커리는 지연,변경될수 있습니다.<br>
                </li>
            </ul>

            <div class="infoTit NSK-Black"><strong>교재</strong></div>
            <ul>
                <li>강의 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
            </ul>             

            <div class="infoTit NSK-Black"><strong>환불</strong></div>
            <ul>
                <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 결제가 기준으로 계산하여 사용일 수 만큼 차감 후 환불됩니다.</li>
            </ul>

            <div class="infoTit NSK-Black"><strong>PASS 수강</strong></div>
            <ul>
                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                <li>강의수강시 일시정지, 수강연장 , 재수강 불가합니다.</li>
                <li>김재규 100일완성반 PASS 수강시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스경찰 PASS는  PMP 강의는 제공하지 않습니다.)</li>
                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시
                내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
            </ul>

            <div class="infoTit NSK-Black"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                (단,이벤트 시 쿠폰사용가능)</li>
                <li>김재규 100일완성반 PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,
                이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다.<br>
                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.<br>
                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
            </ul>

            <div class="infoTit">※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</div>

        </div>
    </div>

</div>

<!-- End Container -->



<link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
<script type="text/javascript">

    /*슬라이드*/
    $(document).ready(function() {
        var slidesImg1 = $("#slidesImg2").bxSlider({
            auto: true,
            speed: 500,
            pause: 4000,
            mode:'horizontal',
            autoControls: false,
            controls:false,
            pager:true,
        });
    });

     /*수강신청 동의*/ 
     function go_PassLecture(obj){
            if($("input[name='ischk']:checked").size() < 1){
            alert("이용안내에 동의하셔야 합니다.");
            return;
        }else{
            var _url = $(obj).data('url');
            window.open(_url);
        }
    }

</script>
<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop