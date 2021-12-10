@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;} 

    /************************************************************/

    @@import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
    .evt_02 {padding:50px 0}
    .evt_02 h4 {font-family: 'Black Han Sans', sans-serif; font-size:30px}
    .evt_02 > a {display:block; margin-bottom:15px}

    .check {padding:20px 0 0; letter-spacing:1; color:#fff;}
    .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:block; padding:10px 0; color:#fff; background:#393939; border-radius:20px; font-weight:bold; width:60%; margin:20px auto 0}

    .evtInfo {padding:80px 20px; background:#333; color:#fff;}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.5;}
    .evtInfoBox h4 {font-size:24px; margin-bottom:40px;}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:6px 16px; background:#000; border-radius:20px; font-weight:normal !important}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}
    .evtInfoBox li span {vertical-align:bottom; color:#f1d188}  

    
    </style>

    <div id="Container" class="Container NSK c_both">
        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2470m_01.jpg" alt="황종휴 경제학">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2470m_02.jpg" alt="특별혜택">
        </div>    
        
        <div class="evtCtnsBox evt_02 " data-aos="fade-up">
            <h4>황종휴 경제학 고득점 합격 E-PASS Ⅱ</h4>             
            <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/188871" onclick="go_PassLecture(this)"  data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2470_02_01.jpg" alt="경제학 3 PICK 패키지" /></a> 
            <a hhref="javascript:void(0);" data-url="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/188877" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2470_02_02.jpg" alt="재정학 3 PICK 패키지" /></a> 
            <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/188878" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2470_02_03.jpg" alt="국제경제학 3 PICK 패키지" /></a> 
            <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/userPackage/show/cate/3094/prod-code/188880" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2470_02_04.jpg" alt="경제학+국제경제학 콜라보 패키지 1" /></a> 
            <a href="javascript:void(0);" data-url="https://gosi.willbes.net/m/periodPackage/show/cate/3094/pack/648001/prod-code/188883" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2470_02_05.jpg" alt="경제학+국제경제학 콜라보 패키지 2" /></a>           
   
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div> 
        </div>

        <div class="evtCtnsBox evtInfo" id="notice">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">상품이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>본 상품은 황종휴 경제학 고득점 합격을 위한 E-PASS Ⅱ 상품입니다.</li>
                </ul>
                <div class="infoTit"><strong>E-PASS Ⅱ 해당과정 할인율 및 수강기간</strong></div>
                <ul>
                    <li>
                        <span>3 PICK  패키지 : 각 과정별 3강좌 이상 자유선택</span><br>
                        - 경제학 3 PICK :  예비순환(21년 4월) + GS1순환(21년 7월) + GS2순환(21년 10월) + GS3순환(21년 3월)<br>
                        - 재정학 3 PICK : 예비순환(21년 7월) + GS1순환(21년 10월) + GS2순환(22년 1월) + GS3순환(21년 6월)<br>
                        - 국제경제학 3 PICK : 예비순환(21년 5월) + GS1순환(21년 10월) + GS2순환(22년 1월) + GS3순환(21년 6월)<br>
                    </li>    
                    <li>
                        <span>경제학+국제경제학 콜라보 패키지 1 : 4강좌 이상 자유 선택</span><br>
                        - 경제학 예비순환 ~ GS3순환 + 국제경제학 예비순환 ~ GS3순환 중 4강좌 이상 자유 선택(GS3순환은 21년 3월과 6월진행 강의)
                    </li>    
                    <li>    
                        <span>경제학+국제경제학 콜라보 패키지 2 : 경제학 예비~3순환 +국제경제학 GS1순환 패키지</span><br>
                        - 경제학예비(21년4월)+GS1순환(21년 7월)+GS2순환(20년 10월)+GS3순환(21년 3월)+국제경제학  GS1순환(21년 10월)
                    </li>    
                    <li>    
                        <span>신청 및 접수기간 : 2021년 12월 13일(월) 12:00 ~ 2021년 12월 31일(금) 24:00까지</span>
                    </li>
                </ul>
                <div class="infoTit"><strong>수강기간-과정별 수강기간 자동 적용</strong></div>
                <ul>
                    <li>강의신청시 다음날부터 바로 수강시작이 되며 <span>결제일부터 270일간 수강</span>하실 수 있습니다.<span>(일시정지, 강의연장 불가)</span></li>
                    <li>강의배수 제한 : 동영상강의는 강의배수제한 규정이 적용됩니다.</li>
                    <li>황종휴 경제학 E-PASS Ⅱ 상품은 사정에 의해서 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>강의배부자료 및 강의를 위해 제작된 교재는 <span>해당 강의에서 모두 무료로 주문</span>하실 수 있습니다.<span>(등록된 제본형태로 제공, 정식출간교재 제외)</span></li>
                </ul>
                <div class="infoTit"><strong>할인쿠폰</strong></div>
                <ul>
                    <li><span>30% 동영상 할인쿠폰</span>은 강의신청시 자동 발행되며, 황종휴 교수님의 강의 수강시 이용할 수 있습니다.(유효기간 2022년 7월 31일까지)</span></li>               
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, <span>PASS반 정가 기준</span>으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                    <li>환불시 무료로 제공된 제본교재는 반납 또는 해당 제본교재 정가기준 차감 후 환불됩니다.</li>
                    <li>기타 약관에 규정에 따릅니다.</li>       
                </ul>
                <div class="infoTit"><strong>PASS 수강</strong></div>
                <ul>
                    <li>로그인 후 <span>[내강의실] 에서 [무한PASS존]으로 접속</span>합니다.</li>
                    <li>구매한 PASS 상품 선택 후 <span>[강좌추가]</span> 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>PASS반은 <span>일시 정지, 수강 연장, 재수강 불가</span>합니다.</li>
                    <li>PASS반 수강 시 이용 가능한 <span>기기 대수</span>는 다음과 같이 <span>제한</span>됩니다.[ 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ]</li> 
                    <li>PC, 모바일 기기에 대한 초기화가 필요할  경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li> 
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>                
                </ul>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

<script type="text/javascript">
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop