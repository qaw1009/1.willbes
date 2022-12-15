@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        /*타이머*/
        .timeBox {background:#222}
        .time {width:980px; margin:0 auto; text-align:center;}
        .time {text-align:center; padding:20px 0}
        .time ul {width:100%;}
        .time ul:after {content:''; display:block; clear:both}
        .time li {display:inline; float:left; line-height:61px; font-size:30px; margin-right:10px;}
        .time li:first-child {margin-left:80px}
        .time li img {width:44px}
        .time .time_txt {color:#fff; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;vertical-align:top;}
        @@keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
        from{color:#d63e4d}
        50%{color:#ff6600}
        to{color:#d63e4d}
        }

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2852_top_bg.jpg) no-repeat center top; position: relative;}
        .evt_top span {position:absolute; left:50%; margin-left:-280px; top:300px; width:560px; z-index: 2;}

        .evt_01 {background:#00082C}

        .evt_02 {width:1120px; margin:0 auto; padding:100px 0}
        .evt_02 h4 {font-size:50px; padding-bottom:50px; color:#2d2d35;font-weight:bold;}
        .evt_02 a {display:block; margin-bottom:30px}

        .check { width:980px; margin:0 auto; padding:20px 0; letter-spacing:3; color:#fff;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#393939 ; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        .evtInfo {padding:80px 0; background:#333; color:#fff;}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.5;}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px;}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}
        .evtInfoBox li span {vertical-align:bottom; color:#f1d188}  


        @@import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
        .evt_02 h4 {font-family: 'Black Han Sans', sans-serif;}
        
        /************************************************************/

    </style>

	<div class="evtContent NSK">

        <div class="evtCtnsBox timeBox" data-aos="fade-down">
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }}</span> 마감!</li>
                    <li class="time_txt"><span>남은 시간은</span></li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>             
                </ul>
            </div>
        </div>

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2852_top.jpg" alt="황종휴 경제학"/>
            <span  data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/12/2852_top_img.png" alt="황종휴 경제학"/></span>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2852_01.jpg" alt="특별혜택"/>            
		</div>

        <div class="evtCtnsBox evt_02">
            <h4>황종휴 경제학 고득점 합격 E-PASS Ⅱ</h4>
            <div class="wrap">                
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/203908" onclick="go_PassLecture(this)"  data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/12/2852_02_01.png" alt="경제학 3 PICK 패키지" /></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/203909" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/12/2852_02_02.png" alt="재정학 3 PICK 패키지" /></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/userPackage/show/cate/3094/prod-code/203910" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2022/12/2852_02_03.png" alt="경제학+국제경제학 패키지" /></a>
            </div>    
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
                    <li>본 상품은 황종휴 경제학 고득점 합격을 위한 E-PASS 상품입니다.</li>
                </ul>
                <div class="infoTit"><strong>E-PASS Ⅱ 해당과정 할인율 및 수강기간</strong></div>
                <ul>
                    <li>
                        <span>[E-PASS Ⅱ 해당과정 할인율 및 수강기간]</span><br>
                        - 3 PICK 패키지 : 각 과정별 3강좌 이상 자유선택<br>
                        - 경제학 3 PICK : 예비순환(22년 4월) + GS1순환(22년 7월) + GS2순환(22년 10월) + GS3순환(22년 3월)<br>
                        - 재정학 3 PICK : 예비순환(21년 7월) + GS1순환(22년 10월) + GS2순환(22년 12월) + GS3순환(22년 6월)
                    </li>    
                    <li>
                        <span>경제학+국제경제학 콜라보 패키지  : 4강좌 이상 자유 선택</span><br>
                        - 경제학 예비순환 ~ GS3순환 + 국제경제학 예비순환 ~ GS3순환 중 4강좌 이상 자유 선택(GS3순환은 22년 3월과 6월진행 강의)
                    </li>                    
                    <li>    
                        <span>신청 및 접수기간 : 2022년 12월 31일(토) 24:00까지</span>
                    </li>
                </ul>
                <div class="infoTit"><strong>수강기간-과정별 수강기간 자동 적용</strong></div>
                <ul>
                    <li>강의신청시 다음날부터 바로 수강시작이 되며 <span>결제일부터 270일간 수강</span>하실 수 있습니다.<span>(일시정지, 강의연장 불가)</span></li>
                    <li>강의배수 제한 : 동영상강의는 강의배수제한 규정이 적용됩니다.</li>
                    <li>황종휴 경제학 E-PASS 상품은 사정에 의해서 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>강의배부자료 및 강의를 위해 제작된 교재는 <span>해당 강의에서 모두 무료로 주문</span>하실 수 있습니다.<span>(등록된 제본형태로 제공, 정식출간교재 제외)</span></li>
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

    /*디데이카운트다운*/
        $(document).ready(function() {
        dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });   
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