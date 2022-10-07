@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .wb_cts05m {background:#0f181d; padding-bottom:5vh;}
    .wb_cts05m .passlec {padding:0 2vh; text-align:center;}
    .wb_cts05m .passlec div {width:50%; float:left; margin-bottom:1.5vh; padding:0 0.5vh}
    .wb_cts05m .passlec div label {display:block; cursor: pointer; position:relative; max-width:320px; margin:0 auto; border-radius:10px; overflow: hidden;}
    .wb_cts05m .passlec div label div {display:none}
    .wb_cts05m .passlec div label img {width:100%; max-width:320px;}
    .wb_cts05m .passlec input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
    .wb_cts05m .passlec input:checked + label div {display:flex;justify-content: center; align-items: center;position: absolute; width:100%; height:100%; top:0; left:0; background:rgba(253,182,37,0.7); color:#0f181d; font-size:5vh; font-weight:600; z-index: 1;}
    .wb_cts05m .passlec:after {content:''; display:block; clear:both}

    /*수강신청 체크*/
    .check {padding:0 10px; color:#fff}
    .check p {margin-bottom:50px;padding:40px 10px 0;}
    .check p a {display:block; width:80%; margin:0 auto; font-size:2.6vh; color:#000; background:#fdb625; text-align:center; border-radius:50px; padding:10px 0}
    .check p a:hover {background:#fff;color:#1c2127;} 
    .check label {cursor:pointer; font-weight:bold;font-size:1.6vh; }
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a.infotxt {display:inline-block; padding:5px 10px; color:#fff; background:#000; margin-left:10px; border-radius:20px}
    .check a.infotxt:hover {background:#fff;color:#1c2127;}
 

    .evtInfo {padding:5vh 2vh; background:#535353; color:#fff; font-size:1.6vh}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:2.2vh; margin-bottom:20px}
    .evtInfoBox .infoTit {margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px;}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}  
    .evtInfoBox span {color:#fff100;}

 

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {  
        .check p {margin-bottom:50px;padding:40px 10px 0;}
        .check p a {display:block;margin:0 auto; text-align:center; border-radius:50px; padding:10px 0;}
        .check a.infotxt {display:flow-root;margin-top:10px;}
    }  

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }

    </style>

    <div id="Container" class="Container NSK">
        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_top.jpg" alt="">
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_02.jpg" alt="">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_03.jpg" alt="">
        </div>

        <div class="evtCtnsBox wb_cts05m" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04.jpg" alt="">
            <div class="passlec">
                <div>
                    <input type="radio" name="y_pkg" id="pass01" value="201461">
                    <label for="pass01">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p01.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass02" value="201689">
                    <label for="pass02">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p02.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass03" value="201532">
                    <label for="pass03">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p03.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass04" value="201691">
                    <label for="pass04">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p04.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass05" value="201686">
                    <label for="pass05">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p05.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass06" value="201692">
                    <label for="pass06">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p06.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass07" value="201693">
                    <label for="pass07">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p07.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
                <div>
                    <input type="radio" name="y_pkg" id="pass08" value="201694">
                    <label for="pass08">
                        <img src="https://static.willbes.net/public/images/promotion/2022/10/2792m_04_p08.png" alt="">
                        <div class="NSK-Black">선택</div>
                    </label>
                </div>
            </div>
            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip" class="infotxt" > 이용안내 확인하기 ↓</a>
                <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">지금 바로 신청하기 ></a></p>     
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="tip">
            <div class="evtInfoBox" >
				<h4 class="NSK-Black">윌비스경찰간부 T-PASS 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>				
                    <li>본 상품은 구매일로부터 2023년 10월 31일 까지만 들을수 있는 기간제 간부 T-PASS 입니다.<br>
                        (추후 간부 시험이 늦어지게 되면 자동으로 연장진행 예정입니다.)</li>
                    <li>본 상품 강좌 구성은  각 교수님별로 다음과 같습니다.<br>
                        * 형사법(형소법) : 서영교 교수님<br>
                        * 형사법(형법) : 문형석 교수님<br>
                        * 경찰학개론: 정진천 교수님<br>
                        * 헌법 : 이국령 교수님<br>
                        * 헌법 : 선동주 교수님 <br>
                        * 범죄학 : 김한기 교수님* 민법총칙 : 고태환 교수님* 행정학 : 이동호 교수님</li>
                    <li>선택한 윌비스 경찰간부 T-PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                    <li>윌비스경찰간부 T-PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                    <li>강좌 스케줄 및 커리큘럼은 학원 사정에 따라 변동될 수 있습니다.</li>
				</ul>

				<div class="infoTit"><strong>교재 및 포인트</strong></div>
				<ul>
					<li>윌비스 경찰간부 T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
				</ul>

				<div class="infoTit"><strong>환불관련</strong></div>
				<ul>
					<li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 윌비스 경찰T-PASS 결제가 기준으로 계산하여 사용일 수만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                    <li>포인트를 사용하였을 경우 사용한 포인트만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.(포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
				</ul>
                
				<div class="infoTit"><strong>간부 T-PASS 수강</strong></div>
				<ul>
					<li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>윌비스 경찰간부T- PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                    <li>윌비스 경찰간부 T-PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.
                        총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다.([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용될수 있습니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
				</ul>
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
        /*수강신청 동의*/ 
        function go_PassLecture(){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            code = $('input[name="y_pkg"]:checked').val();
            if (typeof code == 'undefined' || code == '') {
                alert('강좌를 선택해 주세요.');
                return;
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3001/pack/648001/prod-code/') }}" + code;
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop