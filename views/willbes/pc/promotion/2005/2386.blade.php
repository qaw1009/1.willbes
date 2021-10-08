@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .evt_top {background:#0C1D23 url(https://static.willbes.net/public/images/promotion/2021/10/2386_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#b9a78f}

        .check { position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#393939 ; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}

        .evtInfo {padding:80px 0; background:#333; color:#fff; font-size:14px;}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:2;}
		.evtInfoBox h4 {font-size:30px; margin-bottom:40px}
		.evtInfoBox .infoTit {font-size:18px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#000; border-radius:20px; font-weight:normal !important}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:none; margin-left:20px}
        .evtInfoBox span {vertical-align:bottom}  
        .red {color:red;}
        .original {text-decoration:line-through;}
        
        /************************************************************/      
    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2386_top.jpg" alt="황종휴 경젱학"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2386_01.jpg" alt="특별혜택"/>            
		</div>

        <div class="evtCtnsBox evt_02">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2386_02.jpg" alt="수강 신청하기" />
                <a href="javascript:go_PassLecture('186515');" style="position: absolute;left: 71.16%;top: 13.67%;width: 25.04%;height: 16.73%;z-index: 2;"></a> 
                <a href="javascript:go_PassLecture('186518');" style="position: absolute;left: 71.16%;top: 31.67%;width: 25.04%;height: 16.73%;z-index: 2;"></a> 
                <a href="javascript:go_PassLecture('186516');" style="position: absolute;left: 71.16%;top: 48.97%;width: 25.04%;height: 16.73%;z-index: 2;"></a> 
                <a href="javascript:go_PassLecture('186517');" style="position: absolute;left: 71.16%;top: 66.97%;width: 25.04%;height: 16.73%;z-index: 2;"></a>           
            </div>    
            <div class="check">
                <label>
                    <input name="ischk"  type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#notice">이용안내확인하기 ↓</a>
            </div>   
		</div>

        <div class="evtCtnsBox evtInfo">
            <div class="evtInfoBox">
                <h4 class="NSK-Black">[PC] 상품이용안내</h4>
                <div class="infoTit"><strong>이용안내</strong></div>
                <ul>
                    <li>● 본 상품은 황종휴 경제학 고득점 합격을 위한 E-PASS 상품입니다.</li>
                </ul>
                <div class="infoTit"><strong>E-PASS 해당과정 할인율 및 수강기간</strong></div>
                <ul>
                    <li>
                    1. 경제학 전과정 E-PASS <br>
                        10월 20일까지 결제시 <span class="original">2,023,000원</span> -> 1,200,000원 / 10월 20일 이후 결제시 <span class="original">2,023,000원</span> -> 1,400,000원 + 수강기간 결제시부터 300일<br>
                        경제학예비(21년4월)+1순환(21년 7월)+2순환(20년 10월)+3순환(21년 3월) 
                    </li>    
                    <li>
                    2. 경제학 1~3순환+국제경제학 1순환 E-PASS <br>
                        10월 20일까지 결제시 <span class="original">1,666,000원</span> -> 990,000원 / 10월 20일 이후 결제시 <span class="original">1,666,000원</span> -> 1,160,000원 + 수강기간 결제시부터 300일<br>
                        경제학 1순환(21년 7월)+2순환(20년 10월)+3순환(21년 3월)+국제경제학 1순환(21년 10월)
                    </li>    
                    <li>    
                    3. 경제학 전과정+경제학을 위한 특강 E-PASS <br>
                        10월 20일까지 결제시 <span class="original">2,413,000원</span> -> 1,400,000원  / 10월 20일 이후 결제시 <span class="original">2,413,000원</span> -> 1,600,000원 + 수강기간 결제시부터 300일<br>
                        경제학예비(21년4월)+1순환(21년 7월)+2순환(20년 10월)+3순환(21년 3월)+경제학 기본서 1회독+경제학을 위한 국제경제학
                    </li>    
                    <li>    
                    4. 경제학+국제경제학 전과정 E-PASS <br>
                        10월 20일까지 결제시 <span class="original">3,047,000원</span> -> 1,800,000원 / 10월 20일 이후 결제시 <span class="original">3,047,000원</span> -> 2,100,000원 + 수강기간 결제시부터 300일<br>
                        경제학예비(21년4월)+1순환(21년 7월)+2순환(20년 10월)+3순환(21년 3월)+국제경제학 예비(21년 5월)+1순환(21년 10월)+2순환(21년 2월)+3순환(21년 6월)
                    </li>
                </ul>
                <div class="infoTit"><strong>수강기간-과정별 수강기간 자동 적용</strong></div>
                <ul>
                    <li>● 강의신청시 다음날부터 바로 수강시작이 되며 <span class="red">결제일부터 300일간 수강</span>하실 수 있습니다.<span class="red">(일시정지, 강의연장 불가)</span></li>
                    <li>● 강의배수 제한 : 동영상강의는 강의배수제한 규정이 적용됩니다.</li>
                    <li>● 황종휴 경제학 E-PASS 상품은 사정에 의해서 사전공지없이 종료 또는 변경될 수 있습니다.</li>
                </ul>
                <div class="infoTit"><strong>교재</strong></div>
                <ul>
                    <li>● 강의배부자료 및 강의를 위해 제작된 교재는 <span class="red">해당 강의에서 모두 무료로 주문</span>하실 수 있습니다.<span class="red">(제본형태로 제공, 정식출간교재 제외)</span></li>
                </ul>
                <div class="infoTit"><strong>할인쿠폰</strong></div>
                <ul>
                    <li>● <span class="red">30%할인쿠폰</span>은 강의신청시 자동 발행되며, 황종휴 교수님의 강의 수강시 이용할 수 있습니다.(유효기간 2022년 7월 31일까지, <span class="red">학원 및 동영상 모두 적용)</span></li>               
                </ul>
                <div class="infoTit"><strong>환불</strong></div>
                <ul>
                    <li>● 결제 후 7일 이내 강좌의 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능합니다.(일부강의만의 환불은 불가합니다.)</li>
                    <li>● 결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>● 강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>● 고객 변심으로 인한 환불은 수강시작일 (당일 포함)로부터 7일이 경과되면, <span class="red">PASS반 정가 기준</span>으로 계산하여 사용일수만큼 차감 후 환불됩니다.</li>
                    <li>● 환불시 무료로 제공된 제본교재는 반납 또는 해당 제본교재 정가기준 차감 후 환불됩니다.</li>
                    <li>● 기타 약관에 규정에 따릅니다.</li>       
                </ul>
                <div class="infoTit"><strong>PASS 수강</strong></div>
                <ul>
                    <li>● 로그인 후 <span class="red">[내강의실] 에서 [무한PASS존]으로 접속</span>합니다.</li>
                    <li>● 구매한 PASS 상품 선택 후 <span class="red">[강좌추가]</span> 를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>● PASS반은 <span class="red">일시 정지, 수강 연장, 재수강 불가</span>합니다.</li>
                    <li>● PASS반 수강 시 이용 가능한 <span class="red">기기 대수</span>는 다음과 같이 <span class="red">제한</span>됩니다.[ 총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 ]</li> 
                    <li>● PC, 모바일 기기에 대한 초기화가 필요할  경우 내용확인 후 진행이 가능하오니 고객센터로 문의 부탁드립니다.(수강기간동안 3회 신청가능)</li> 
                </ul>
                <div class="infoTit"><strong>유의사항</strong></div>
                <ul>
                    <li>● 본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.</li>
                    <li>● 아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS반은 즉시 정지, 회원 자격이 박탈됩니다. 이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생 할 수 있습니다.</li>                
                </ul>
            </div>
        </div>

	</div>
    <!-- End Container -->

    <script type="text/javascript">
     /*수강신청 동의*/ 
     function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/33094/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

    </script>
@stop