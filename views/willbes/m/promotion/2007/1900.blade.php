@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .Container {width:100%; max-width:720px; margin:0 auto; position:relative;}    
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}    

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

    .btnbuyBox {width:100%; position:fixed; bottom:0; text-align:center; background:rgba(255,255,255,0.5); padding-top:10px}
    .btnbuy a {display:block; width:94%; max-width:700px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:10px; line-height:1.4}
    .btnbuy a span {font-size:1.2rem;}
    .btnbuy a:hover {background:#3a99f0;
        -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
    }
    .infoCheck {width:100%; max-width:720px; margin:10px auto; font-size:12px;}
    .infoCheck label {margin-right:30px; cursor: pointer; }
    .infoCheck input[type=checkbox] {width:20px; height:20px; margin-right:10px}
    .infoCheck input[type=checkbox]:checked + label {border-bottom:1px dashed #0099ff; font-weight:bold; color:#0099ff} 
    .infoCheck a {display:inline-block; background:#333; color:#fff; height:30px; line-height:30px; text-align:center; padding:0 20px; border-radius:20px}
    .infoCheck a:hover {background:#0099ff;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left;  background:#525151; color:#fff; font-size:0.875rem; line-height:1.4 }
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox li {list-style: decimal; margin-left:20px; font-size:14px; margin-bottom:10px}
    .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
    .evtInfoBox .infoTit {font-size:20px; margin-bottom:10px}
    .evtInfoBox ul {margin-bottom:30px}


        

</style>

<div id="Container" class="Container NSK c_both">    

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1900m_top.jpg" alt="지텔프 패스" >        
    </div>

    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1900m_01.jpg" alt="지텔프 패스 혜택" >       
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1900m_02.jpg" alt="지텔프" >       
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1900m_03.jpg" alt="서민지/김혜진" >       
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/11/1900m_04.jpg" alt="" usemap="#Map1900_01" border="0" >
        <map name="Map1900_01">
          <area shape="rect" coords="58,761,349,894" href="https://pf.kakao.com/_Pxixdlxb" target="_blank" alt="서민지쌤카톡">
          <area shape="rect" coords="376,760,680,893" href="https://pf.kakao.com/_ayxgKK" target="_blank" alt="김혜진쌤 카톡">
        </map>       
    </div>


    <div class="evtCtnsBox evtFooter" id="infoText">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">윌비스 지텔프 PASS 이용안내</h4>
            <div class="infoTit"><strong>상품설명</strong></div>
            <ul>
                <li>본 상품은 서민지,김혜진 지텔프 강의와 교재 및 추가 혜택으로 구성됩니다.</li>
                <li>본 상품의 유료기간은 2개월(60일)이며, 수강생 혜택으로 제공되는 수강기간 연장 및 추가 강의는 서비스로 제공해드리는 무료 혜택입니다.(아래 추가 혜택사항 참조)</li>
                <li>추가혜택 사항은 하단을 참조 바랍니다.</li>                  
            </ul>
            <div class="infoTit"><strong>수강안내</strong></div>
            <ul>
                <li>결제 완료시 바로 수강 진행됩니다.</li>
                <li>윌비스 지텔프 패스는 일시 정지 및 재수강, 유료연장을 제공하지 않습니다.</li>
                <li>배수 제한 없이 무제한 수강이 가능합니다.</li>
                <li>수강 방법 및 수강기기<br>
                    • 먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.<br>
                    • 구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.<br>
                    • PASS 이용 중에는 일시중지가 불가능합니다.<br>
                    • 수강 가능 기기 대수는 PC 또는 모바일 합쳐서 총 2대입니다.(PC/모바일 2대 또는 각 1대)<br>
                    내강의실> 무한PASS> 등록기기 정보 확인 (직접 초기화/(삭제 횟수는 1회로 제한됩니다)</li>    
            </ul>
            <div class="infoTit"><strong>윌비스 지텔프 패스</strong></div>
            <ul>
                <li>수강 가능강의<br>
                    ① 서민지의 유패스 지텔프 최신 기출유형 공식 VOCA 강의<br>
                    ② 서민지의 유패스 지텔프 최신 기출유형 공식 모의고사 문제풀이<br>
                    ③ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법<br>
                    ④ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해<br>
                    ⑤ 서민지의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해,듣기<br>
                    ⑥ 김혜진의 유패스 지텔프 최신 기출유형 공식 VOCA 강의<br>
                    ⑦ 김혜진의 유패스 지텔프 최신 기출유형 공식 모의고사 문제풀이<br>
                    ⑧ 김혜진의 유패스 지텔프 최신 기출유형 공식 기본서 문법<br>
                    ⑨ 김혜진의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해<br>
                    ⑩ 김혜진의 유패스 지텔프 최신 기출유형 공식 기본서 문법,독해,듣기<br>
                    ※ 제공되는 강의 구성은 상황에 따라 변동될 수 있습니다.</li>                    
                <li>포함 교재<br>
                    ① 유패스 지텔프 최신유형 공식 보카 단어장<br>
                    ② 유패스 지텔프 최신 기출유형 공식 실전 모의고사 문제집<br>
                    ③ 유패스 지텔프 최신 기출유형 공식 기본서 / 문법<br>
                    ④ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해<br>
                    ⑤ 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해/듣기</li>
                <li>교재 발송<br>
                    ① 강의 결제 완료 후 순차 발송 진행됩니다. <br>
                        결제완료일 기준 3~4일 정도 소요될 수 있습니다. (주말/공휴일 제외한 평일 기준)<br>
                    ② 배송비(2,500원) 무료<br>
                    ③ 포함 교재 변경 발송 불가<br>
                    ④ 교재 발송 후 교재 배송지 수정, 변경은 불가합니다.<br>
                    ⑤ 배송지 오기재로 인한 재발송은 불가합니다. </li>                                    				
            </ul>
            <div class="infoTit"><strong>추가 혜택 사항 및 안내</strong></div>
            <ul>
                <li>추가혜택 <br>
                    ① 수강기간 무료연장 (유료 수강기간 2개월+최대 연장기간 7개월)<br>
                    ② 생애 첫 지텔프 응시료 50%지원(개별 발송)<br>
                    ③ 공식기출 유형 특강 및 보카 암기 영상 제공<br>
                    ④ 공식주관사 출제 실전모의고사(1회분) 증정<br>
                    ⑤ 서민지,김혜진쌤의 특별 비밀 학습 자료 제공<br>
                    ⑥ 지텔프 공식 유패스 교재 5권 포함 (상품 상세 설명 참조)<br>
                    ⑦ 서민지,김혜진쌤 오프라인 주말 마라톤 특강 진행시 50% 할인</li>
                <li>세부 안내<br>
                    ① 수강기간 무료연장 (유료 수강기간 2개월+최대 연장기간 7개월) <br>
                    - 무료자동연장 3개월, 추가 연장 신청 시 2개월씩 총 2회 제공(유료수강기간 2개월포함 최대 9개월 수강가능)<br>
                    - 추가 연장 신청은 수강기간 종료 이전에 고객센터 1:1 상담 게시판을 통해 신청하셔야 합니다.<br>
                    - 수강 종료 후 연장 신청은 불가합니다.<br>
                    ② 생애 첫 지텔프 응시료 50%지원 <br>
                    - 고객센터 1:1 상담 게시판에 지텔프 응시료 쿠폰 발급신청을 해주시면, 쿠폰 번호를 문자로 발송 해드립니다.<br>
                    - 본 할인쿠폰은 지텔프 시험을 생애 처음 응시하는 분에게만 적용됩니다. <br>
                    - 응시료 할인쿠폰의 조기 소진, 혹은 해당 이벤트는 별도의 공지 없이 조기 종료될 수 있습니다.<br>
                    - 2년 내 응시 내역이 확인되지 않더라도 이전에 응시한 이력이 있다면 본 쿠폰 사용은 불가합니다. (*탈퇴 후 재가입하여도 사용 불가)<br>
                    - 결제 완료 이후에 접수취소 및 환불시, 재사용 불가합니다.<br>
                    - 본 할인쿠폰은 다른 이벤트나 할인쿠폰과 중복하여 사용할 수 없습니다.<br>
                    - 할인쿠폰 사용법 : www.g-telp.co.kr → 로그인 → 정기시험접수 → 할인쿠폰 확인란에 쿠폰번호 기재 → 접수<br>
                    - 본 혜택은 조기 소진시에 공지 없이 종료 될 수 있습니다.<br>
                    ③ 공식 기출 유형 특강 : 추후 강의 진행 시 내 강의실에서 수강할 수 있도록 제공 예정<br>
                    보카 암기 영상 제공 : 카카오TV에서 수강 가능 (결제 완료 시 링크 포함 문자 자동 발송)<br>
                    ④ 공식주관사 출제 실전모의고사(1회분) 증정<br>
                    - 결제 완료 후 내강의실 PASS 추가강의리스트에서 해당 모의고사 확인 및 다운로드 가능<br>
                    ⑤ 특별 비밀 학습 자료 제공 <br>
                    서민지,김혜진 쌤의 특별 자료와 1:1 학습상담은 선생님의 개별 카카오톡 채널을 통해 제공됩니다.<br>
                    ⑥ 지텔프 공식 유패스 교재 5권 포함 (상품 상세 설명 참조)<br>
                    ⑦ 서민지,김혜진쌤 오프라인 주말 마라톤 특강 50% 할인<br>
                    - 추후 실강의 진행 시 제공 예정입니다.
                </li>                    				
            </ul>
            <div class="infoTit"><strong>환불 안내</strong></div>
            <ul>
                <li>환불 시 공통사항<br>
                    - 이용안내 및 환불 특약으로 안내된 별도 환불 기준이 있는 경우 우선 적용합니다.<br>
                    - 강의를 전체 수강하셨을 경우에는 환불이 불가합니다.<br>
                    - 강의 환불시 유료기간 2개월을 기준으로 환불 진행됩니다.<br>
                    - 강의와 별도로 교재만 환불은 불가합니다.<br>
                    - 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.<br>
                    - 강의재생시간에 관계없이 강의를 재생한 경우, 학습자료 및 모바일 다운로드 이용시 수강한 것으로 간주됩니다.<br>
                    - 고객변심으로 인한 부분환불은 수강시작일(당일 포함)로부터 7일이 경과되면, T-PASS 정가기준으로 계산하여 수강한 금액을 차감하고 환불됩니다.<br>
                    - 할인상품의 경우 할인 전 정가 기준으로 차감됩니다.<br>
                    - 강좌 차감액이 결제 금액을 초과할 시에는 환불이 불가합니다.
                </li> 
                <li>환불기준<br>
                    ① 결제 및 상품(교재) 수령일로부터 7일 이내 2강 이하 수강: [결제금액 100% ]<br>
                    ② 결제 및 상품(교재) 수령일로부터 7일 이내 3강 이상 수강: [결제금액-수강금액] 환불<br>
                    ③ 결제 및 상품(교재) 수령일로부터 7일 경과 후: 결제금액-수강금액-위약금 ([결제금액-교재비]의 10%) = 환불금액<br>
                    <br>
                    ※ 수강금액은 실제 수강한 강의의 단과강의 판매 가격을 기준으로 계산합니다.<br>
                        수강금액: 단과 강좌 수 대비 강좌 정상가의 1회 이용대금×이용강의수<br>
                        <br>
                    ※ 포함 교재 환불 처리기준 : 강의와 별도로 교재만 환불은 불가합니다.<br>
                        <br>
                    * 결제일로부터 10일 이내 환불 할경우<br>
                        - 교재 미사용일 경우만 전액환불, 교재회수 후 환불 진행(제반 수수료및 부대 비용차감)<br>
                        - 교재 사용일 경우 교재비 정가 차감 후 환불 진행 (랩핑제거/사용시 반품 불가)<br>
                        - 교재 반환 시 왕복 배송비는 회원 부담(왕복 5,000원)<br>
                        - 미사용교재 반송시 환불은 교재 상태를 확인 후 환불 진행 됩니다.<br>
                    * 결제일로부터 10일 이후 패스는 수강한내역 확인 차감 후 환불진행, 교재는 반품(환불)불가 (위 공통사항 참고)</li> 
                <li>PASS에 제공되는 교재비는 총 75,500원이며, 환불 시 해당 금액 차감 후 환불 진행 됩니다.<br>
                    - 유패스 지텔프 최신유형 공식 보카 단어장 : 13,000원<br>
                    - 유패스 지텔프 최신 기출유형 공식 실전 모의고사 문제집 : 19,000원<br>
                    - 유패스 지텔프 최신 기출유형 공식 기본서 / 문법 : 19,000원<br>
                    - 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해 : 11,500원<br>
                    - 유패스 지텔프 최신 기출유형 공식 기본서 문법/독해/듣기 : 13,000원</li>                    				
            </ul>
            <div class="infoTit"><strong>※ 이용 문의 : 고객 센터 1544-5006</strong></div>
        </div>
    </div>
</div>
<!-- End Container -->

<div class="btnbuyBox">
    <div class="btnbuy NSK-Black">     
        <a href="javascript:goLecture('174333');">
        수강신청하기 >
        </a>
    </div>
    <div id="pass" class="infoCheck">
        <input type="checkbox" name="y_pkg" value="173710" style="display: none;" checked/>
        <input type="checkbox" id="is_chk" name="is_chk"><label for="is_chk">페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
        <a href="#infoText">이용안내 확인하기 ↓</a>
    </div>
</div>

<script type="text/javascript">

    {{-- 수강신청 이동 --}}
    function goLecture(prod_code) {
        if ($('#is_chk').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }
        location.href = '{{ front_url('/periodPackage/show/cate/3093/pack/648001/prod-code/') }}' + prod_code;
    }

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop