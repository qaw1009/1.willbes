@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">

    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap {position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/



    .check {margin:3vh 0}
    .check label {cursor:pointer; font-size:1.6vh; font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.4vh;} 

    /* 이용안내 */
    .evtInfo {padding:50px 20px; background:#f4f4f4; color:#3a3a3a; font-size:1.6vh;}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox li {list-style:disc; margin-left:20px;}
    .evtInfoBox h4 {font-size:3vh; margin-bottom:50px}
    .evtInfoBox .infoTit {margin-bottom:10px; font-size:1.8vh;}
    .evtInfoBox .infoTit strong {padding:5px 20px; border-radius:50px; background:#333; color:#fff}
    .evtInfoBox ul {margin-bottom:30px}  
    
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
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2114m_top.jpg" alt="조경직 패스"/>
    </div>

    <div class="evtCtnsBox wb_01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/08/2114m_01.jpg" alt="커리큘럼"/>
    </div>

    <div class="evtCtnsBox wb_02" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2114m_02.jpg" alt="조경직 패스"/>
            <a href="javascript:go_PassLecture('194958');" title="" style="position: absolute; left: 10.14%; top: 88.71%; width: 79.86%; height: 7.35%; z-index: 2;"></a>
        </div>
        <div class="check">
            <label>
                <input name="ischk"  type="checkbox" value="Y" />
                페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
            </label>
            <a href="#careful">이용안내확인하기 ↓</a>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful" data-aos="fade-up">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스 조경직 PASS 이용안내</h4>

            <div class="infoTit"><strong>상품구성</strong></div>
            <ul>
                <li>본 PASS는 9급 조경직 대비 과정으로, 참여 교수진의 전 강좌를 배수 제한 없이 무제한으로 수강 가능합니다.<br>
                * 영어 한덕현 [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공.</li>
                <li>수강 가능 교수진 : 국어 오대혁/기미진, 영어 한덕현, 한국사 김상범/조민주, 조경학/조경계획 및 설계/생태계관리 이윤주</li>
                <li>2022~2023 대비로 진행된 전 강좌 제공 (진행 예정 신규강좌 포함)<br>
                (일부 교수진의 경우, 신규 과정이 업데이트 되지 않을 수 있으며 해당 경우에는 이전 연도 과정을 제공해드립니다.)</li>
                <li>참여 교수진의 일정 및 진행 방식은 상이하게 진행될 수 있으며, 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있다는 점 숙지 부탁드립니다.<br>
                (과목별 교수진의 제공 과정은 수강신청 상세안내 화면을 참고해주시기 바랍니다.)</li>
                <li>이벤트 해당 상품 (전과목PASS) 구매 시 지급되는 추가 포인트의 경우, 교재 구매 시 사용할 수 있으며 결제완료 후 자동으로 [내강의실]에서 확인 가능하오나, 누락된 경우 1:1상담게시판에 문의 바랍니다.</li>
            </ul>

            <div class="infoTit"><strong>수강기간</strong></div>
            <ul>
                <li>수강기간은 상품 상세 안내 페이지에 표시된 기간만큼 제공되며, 결제가 완료되는 즉시 수강이 시작됩니다.</li>       
            </ul>

            <div class="infoTit"><strong>수강관련</strong></div>
            <ul>
                <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭,원하는 과목/교수님/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                <li>본 PASS를 이용 중에는 일시 정지 기능을 사용할 수 없습니다.</li>
                <li>본 PASS 수강 시 이용가능한 기기는 다음과 같이 제한됩니다.<br>
                - PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)</li>
                <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>       
            </ul>

            <div class="infoTit"><strong>교재관련</strong></div>
            <ul>
                <li>본 PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 별도로 구입 가능합니다.</li>        				
            </ul>

            <div class="infoTit"><strong>환불정책</strong></div>
            <ul>
                <li>결제 후 7일 이내 전액 환불 가능합니다.</li>
                <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.</li>
                <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주됩니다.</li>
                <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                    · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                    * 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.
                </li>
            </ul>

            <div class="infoTit"><strong>유의사항</strong></div>
            <ul>
                <li>본 상품은 특별할인기획 상품으로 쿠폰할인/다다익선/적립금 사용 등 혜택이 적용되지 않습니다.</li>
                <li>선택한 교수의 강의가 학원 사정에 의해 부득이하게 진행되지 않을 경우 대체 강의가 제공되며, 이로 인한 환불은 불가합니다.</li>
                <li>아이디 공유 적발 시 회원 자격 박탈 및 환불 불가하며, 추가적인 불법 공유 행위 적발 시 형사 고발 조치가 단행될 수 있습니다.</li>
            </ul>
            <div class="infoTit"><strong>윌비스 고객만족센터 1544-5006</strong></div>
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

    /*수강신청 동의*/ 
    function go_PassLecture(code){
        if($("input[name='ischk']:checked").size() < 1){
        alert("이용안내에 동의하셔야 합니다.");
        return;
        }

        var url = '{{ site_url('/periodPackage/show/cate/3022/pack/648001/prod-code/') }}' + code;
        location.href = url;
    }    
    

    /*디데이카운트다운*/
    $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
    });
</script>


@stop