@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; right:10px; z-index:10;}
        .sky a {display:block; margin-bottom:15px}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/01/2884_top_bg.jpg) no-repeat center top; height:1480px; overflow: hidden;}

        .wb_01 {background:#f5f5f7;}
        .wb_02 {background:#363331;}
        .wb_03 {background:#2e386f; position: relative;}
        .wb_03 .obj{position: absolute;top:0; right:-105px;}
        .wb_04 {background:#57473b;}
        .wb_05 {background:url(https://static.willbes.net/public/images/promotion/2023/01/2884_05_bg.jpg) no-repeat center top; height:3840px; overflow: hidden;}
        .wb_06 {background:#fff; position: relative;}
        .wb_06 a{position: absolute;top:700px; left: 300px; font-size: 53px; width: 456px; border-radius: 60px; z-index: 2; color:#fff; background-color: #000; padding: 29px 0; animation: colorBlink 1s infinite ease;}
        .wb_06 a:hover{background-color:#a20101}


        /*이용안내*/        
        .wb_ctsInfo {text-align:left; padding:100px 0; background:#f4f4f4}
        .wb_tipBox {width:1000px; margin:0 auto; font-size:16px; line-height:1.4}
        .wb_tipBox > strong { font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin-bottom:10px; color:#111}	
        .wb_tipBox ol li {margin:25px 0 10px; list-style:decimal; margin-left:15px;}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; background:#fff; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:15px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {color:#c03011;}
        .wb_tipBox b{vertical-align:top;}  

        @@keyframes colorBlink{
            0%{color:#fff }
            60%{color:yellow; }
            100%{color:#fff; }
        }

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt_05"><img src="https://static.willbes.net/public/images/promotion/2023/01/2884_sky01.png" alt="신청하기" ></a>
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_sky02.png" alt="문의전화" >
        </div>        

        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_top.jpg" alt="통합생활 관리반">
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/01/2884_01.jpg"  alt="합격을 케어"/>           
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
			<img src="https://static.willbes.net/public/images/promotion/2023/01/2884_02.jpg"  alt="통합생활관리반 소개"/>           
		</div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">        
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_03.jpg"  alt="관리반 포인트01"/>   
                <div class="obj" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_person.png" alt="교수">
                </div>    
            </div>    
		</div>

        <div class="evtCtnsBox wb_04" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_04.jpg"  alt="관리반 포인트02"/>       
		</div>
   
        <div class="evtCtnsBox wb_05" id="evt_05" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_05.jpg"  alt="관리반 24시"/>       
		</div>

        <div class="evtCtnsBox wb_06" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2884_06.jpg"  alt="통합생활관리반 신청"/>   
                <a href="https://police.willbes.net/pass/offPackage/index/type/life?cate_code=3010&campus_ccd=605001&course_idx=1093" target="_blank" class="NSK-Black">신청하기</a> 
            </div>   
		</div>

        <div class="wb_ctsInfo" id="ctsInfo">
            <div class="wb_tipBox">                     
                <div id="txt1">
                    <p>유의사항</p>
                    <ol>
                        <li><strong>[생활]</strong><br />
                        - <b>1개월 미만 등록은 불가하고 입실일과 무관하게 이용기간은 말일까지입니다.</b><br />
                        &nbsp;(ex: 10월 10일 입실 -> 11월 10일까지 1개월 이용 X, 10월 10일 입실 -> 11월 30일까지 이용 O)<br />
                        - 점호 및 출결 관리는 일요일과 공휴일은 진행되지 않으며 조교 근무 일정에 따라 진행이 안 되는 날이 있을 수 있습니다.<br />
                        - 내부 벌점 규정에 의한 생활 통제가 존재하며 점호 불참,소음,입실생간 불화,범죄 행위 등 벌점이 누적된 경우 강제 퇴실 조치가 있습니다.<br />
                        - <span class="wb_tip_orange">일요일도 식사가 제공되지만 명절 등 식당 공휴일에는 식사가 제공되지 않습니다.</span><br />
                        </li>
                        <li><strong>[실강 PASS]</strong><br />
                        - <span class="wb_tip_orange">국가재난, 정부 지침 등으로 인한 학원 휴원으로 실강 진행이 어려울 경우 동영상 강의로 대체될 수 있으며, 
                            이로 인한 해당기간 환불은 불가합니다.</span><br />
                        - 인강패스와 정규과정 외 특강 및 모의고사는 슈퍼패스 등록생에게 제공되는 무료혜택입니다.<br />
                        - 특강의 경우 별도의 신청이 필요합니다.<br />
                        - 일부 특강의 경우 별도의 결제가 필요할 수 있습니다.<br />
                        </li>
                        <li><strong>[인강 PASS]</strong><br />
                        - 불가피한 사정에 의해 진행되지 않은 강좌의 경우 대체 강좌로 제공되며, 이로 인한 환불은 불가합니다.<br />
                        - 아이디 공유, 타인 양도 등 부정사용 적발 시 환불없이 회원 자격이 박탈되며, 불법 행위 시안에 따라 민형사상 조치가 있을 수 있습니다.<br />
                        - 온/오프라인 동시 진행되는 이벤트성 특강의 경우 인강에 미지급되거나 이벤트가 종료된 후 제공될 수 있습니다.<br />
                        </li>                   
                        <li><strong>[환불 규정]</strong><br />
                        - 혜택 이용 여부에 따른 환불<br />
                        &nbsp;통합생활관리반은 숙박,식사,실강,인강 등이 통합된 패키지 상품으로 등록 시점에 담당자와 협의를 거친 경우를 제외하고<br />
                        &nbsp;혜택 이용 여부에 따른 <b>부분적인 금액 공제는 불가</b>합니다.<br />
                        &nbsp;<span class="wb_tip_orange">(ex: 총 6개월 과정을 등록하였는데 2개월은 식당을 이용하지 않았으니 해당 부분 환불해주세요. X)</span><br />
                        &nbsp;<span class="wb_tip_orange">(ex: 인강PASS를 이용하지 않으니 인강 비용만큼 금액 공제해 주세요. X)</span><br />
                        </li>
                        <li>중도 환불 시 무료 혜택 금액을 차감하고 환불됩니다.</li>
                        <span class="wb_tip_orange">- 이용 기간에 따른 환불(교육청 환불 기준 준수)</span><br>                                              
                    </ol>
                </div> 
                <table style="margin-top:25px;">  
                    <col />
                    <col />
                    <col />
                    <tr>
                        <th>수강료징수기간</th>
                        <th>반환 사유발생일</th>
                        <th>반환금액</th>
                    </tr>
                    <tr>
                        <td rowspan="4">교습 기간이 1개월 이내인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 교습비등의 전액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/3경과 전</td>
                        <td>이미 납부한 교습비등의 2/3에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 전</td>
                        <td>이미 납부한 교습비등의 1/2에 해당하는 금액</td>
                    </tr>
                    <tr>
                        <td>총 교습시간의 1/2경과 후</td>
                        <td>반환하지 않음</td>
                    </tr>
                    <tr>
                        <td rowspan="2">교습 기간이 1개월 초과인 경우</td>
                        <td>교습 시작 전</td>
                        <td>이미 납부한 수강료 전액</td>
                    </tr>
                    <tr>
                        <td>교습 시작 후</td>
                        <td>반환사유가 발생한 해당 월의 반환 대상 교습비등<br />
                            (교습기간이 1개월 이내인 경우의 기준에 따라 산출한 금액을 말한다)과 나머지<br/>
                            월의 교습비등의 전액을 합산한 금액
                        </td>
                    </tr>
                </table>                      
                
                </div>
            </div>  
        </div>  
       
	</div>
    <!-- End Container -->


    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop