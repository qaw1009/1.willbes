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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:#0C1D23 url(https://static.willbes.net/public/images/promotion/2021/12/2476_top_bg.jpg) no-repeat center top; }
        .evt_01 {background:#e6e0c2}

        .evt_02 {width:1120px; margin:0 auto; padding:150px 0}
        .evt_02 h4 {font-size:50px; margin-bottom:30px; color:#2d2d35}
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
        .evtInfoBox span {color:#e6e0c2}  
        
        /************************************************************/      
    </style> 

	<div class="evtContent NSK"> 
        
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2476_top.jpg" alt="PSTA 패키지"/>
		</div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2476_01.jpg" alt=""/>            
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2476_02.png" alt="스페셜 패키지"/>  
            <div class="wrap mt30">                
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/package/show/cate/3096/pack/648002/prod-code/189161" onclick="go_PassLecture(this)"  data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2476_02_01.png" alt="패키지1" /></a> 
                <a hhref="javascript:void(0);" data-url="https://gosi.willbes.net/userPackage/show/cate/3096/prod-code/189159" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2476_02_02.png" alt="패키지2" /></a> 
                <a href="javascript:void(0);" data-url="https://gosi.willbes.net/userPackage/show/cate/3096/prod-code/189160" onclick="go_PassLecture(this)" data-aos="fade-up"><img src="https://static.willbes.net/public/images/promotion/2021/12/2476_02_03.png" alt="패키지3" /></a>          
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
                <h4 class="NSK-Black">PSAT <span>SPECIAL PACKAGE</span> 이벤트 안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>
                        PSAT 실전모의고사 + 해설 및 핵심정리 동영상 종합반 (3과목 필수선택)<br>
                        <span>- 수강료 :  15%할인 +  수강기간 :  2022년 2월 26일까지 [상품안내 필독 부탁드립니다]</span>
                    </li>
                    <li>
                        PSAT 기출해설 특강 3 PICK PACKAGE (패키지에 등록된 강의 중 3강좌 이상 필수선택)<br>
                        <span>- 수강료 :  50%할인 +  수강기간 :  2022년 2월 26일까지</span>
                    </li>
                    <li>
                        PSAT 다다익선 PACKAGE (패키지에 등록된 강의 중 2강좌 이상 선택시 할인 등 적용)<br>
                        <span>- 2강좌 선택 : 수강료 10%할인 +  수강기간 :  2022년 2월 26일까지<br>
                        - 3강좌 선택 : 수강료 15%할인 +  수강기간 :  2022년 2월 26일까지<br>
                        - 4강좌 선택 : 수강료 20%할인 +  수강기간 :  2022년 2월 26일까지
                    </li>
                </ul>

                <div class="infoTit">※ 이벤트 종료일 : 2021년 <span>12월 31일(금) 24:00까지</span></div>

                <div class="infoTit mt50"><strong>교재</strong></div>
                <ul>
                    <li>실전모강종합반 신청시 모의고사 문제와 해설은 과목별 4회씩 택배발송 예정입니다. 상품안내를 꼭 필독부탁드립니다.</li>
                    <li>각 강의수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 교재구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>

                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>강의배수 제한 : 강의는 2배수 제한 규정이 적용됩니다.</li>
                    <li>이벤트 적용 강의는 2022년 2월 26일까지 수강하실 수 있습니다.<span>(일시정지, 강의연장 불가)</span></li>
                </ul>

                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>결제일로부터 7일 이내 전액 환불 가능합니다. 단, 맛보기 강좌를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의 자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 수강하신 상품의 정가를 기준으로 이용기간을 공제하고 환불됩니다.<br>
                        (환불시 무료로 제공된 모의고사 문제와 해설은 반납 후 환불됩니다.)</li>
                    <li>실전모강 동영상 종합반은 일부과목만의 환불은 불가합니다.</li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>       
                </ul>

                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>                
                </ul>

                <div class="infoTit">※ 이용 문의 : 윌비스 고객만족센터 1566-4770</div>
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