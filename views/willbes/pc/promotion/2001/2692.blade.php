@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
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

        .sky {position:fixed; top:200px; width:140px; right:10px; z-index:10;}        
        .sky a {display:block; margin-bottom:10px}

        /*타이머*/
        .newTopDday {clear:both; background:#0c1e2a; width:100%; padding:20px 0; font-size:26px;}
        .newTopDday ul {width:1120px; margin:0 auto; display:flex; justify-content: center;}
        .newTopDday ul li {margin-right:5px; text-align:center; font-weight:600; color:#fff}
        .newTopDday ul li strong {line-height:70px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {line-height:none; text-align:center; padding-left:110px; padding-top:10px; width:28%}
        .newTopDday ul li:last-child {line-height:none; text-align:left; padding-left:10px; padding-top:5px; width:24%; line-height:70px}        

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/08/2692_top_bg.jpg) no-repeat center; height:900px}
        .wb_top span.top01 {position:absolute; left:32.10%; margin-left:-340.5px; top:5px;z-index: 10;}
        .wb_top span.top02 {position:absolute; left:63.5%; margin-left:-214.5px; top:100px;z-index: 10;}

        .wb_01 {background:#F5F5F7}

        .wb_02 {background:#333; padding-bottom:100px}
        .wb_02 .wrap a {background:#3333cc; color:#fff; font-size:35px;display:flex; justify-content: center; align-items: center;}
        .wb_02 .wrap a:hover {background:#FF5D00;}      
        .wb_02 .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;color:#fff;}
        .wb_02 .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .wb_02 .check p {font-size:14px; padding:50px 0 50px 20px; line-height:1.4; text-align:left; width:600px; margin:0 auto;color:#fff;}
        .wb_02 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .wb_02 .check input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}
        .wb_02 > a {font-size:30px; display:block; padding:30px 0; color:#fff; background:#000; width:850px; margin:0 auto; border-radius:50px}
        .wb_02 > a:hover {background:#ac0811}

        .wb_03 {background:#2E40CE;}

        .evtInfo {padding:80px 0; background:#626262; color:#fff; font-size:17px; line-height:1.4}
		.evtInfoBox {width:1000px; margin:0 auto; text-align:left;}
		.evtInfoBox h4 {font-size:40px; margin-bottom:30px}
		.evtInfoBox .infoTit {font-size:20px; margin-bottom:20px;}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox ul li {margin-bottom:5px; font-size:14px; list-style:decimal; margin-left:20px}
        .evtInfoBox ul li a {color:#ecfc80}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/08/2692_sky01.png" alt="이국령 헌번 티패스" ></a>
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2718" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2022/08/2692_sky02.png" alt="윌비스 경찰 패스 신청하기" ></a>
        </div>      

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday" data-aos="fade-down">
            <div>
                <ul>
                    <li>헌법 T-PASS<br>판매종료까지</li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>일</strong></li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><strong>:</strong></li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>남았습니다.</li>
                </ul>
            </div>
        </div>  
        
        <div class="evtCtnsBox wb_top">
            <span class="top01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/08/2692_top01.png" alt="이국령" /></span>
            <span class="top02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/08/2692_top02.png" alt="헌법 티패스 문구" /></span>
		</div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2692_01.jpg" alt="선택이 아닌 필수" />
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up" id="apply">
            <div class="wrap NSK-Black">
                <img src="https://static.willbes.net/public/images/promotion/2022/08/2692_02.jpg" alt="" />
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51259?subject_idx=1049" target="_blank" title="이국령 홈" style="position: absolute;left: 17.38%;top: 86.54%;width: 11.07%;height: 3.98%;z-index: 2; background:none"></a>
                <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/200716" onclick="go_PassLecture(this)" title="" style="position: absolute;left: 58.97%;top: 72.47%;width: 28.55%;height: 8.65%;z-index: 2;">25만원 신청하기 ></span></a>              
                <a href="javascript:void(0);" data-url="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/200717" onclick="go_PassLecture(this)" title="" style="position: absolute;left: 58.97%;top: 82.05%;width: 28.55%;height: 8.65%;z-index: 2;">18만원 신청하기 ></span></a>
            </div>
            <div class="check">
                <input name="ischk" type="checkbox" id="is_chk1" value="Y" />
                <label for="is_chk1">페이지 하단 윌비스 경찰 헌법 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="#info">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신 및 환급이 불가합니다.<br>
                    ※ 스페셜한정상품으로 할인쿠폰사용이 불가한 상품입니다.
                </p>
            </div>
        </div>

        <div class="evtCtnsBox wb_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2692_03.jpg"  alt="이국령 헌법 티패스 구매혜택" />          
		</div>


        <div class="evtCtnsBox evtInfo" id="info" data-aos="fade-up">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">2023윌비스경찰 헌법 T-PASS 이용안내</h4>
				<div class="infoTit NSK-Black">강좌 기본</div>
				<ul>               
                    <li>본 상품은 구매일로부터 12개월/6개월 동안 무제한으로 수강 가능한 기간제 패스입니다.</li>
                    <li>헌법 T-PASS는 결제가 완료되는 즉시 수강이 시작됩니다. (결제 완료자에 한함)</li>
                    <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                    <li>헌법 T-PASS 상품 구성은 다음과 같습니다.<br>                    
                    - 이국령 헌법 T-PASS : 이국령 교수님 헌법 전 강좌</li>
				</ul>

                <div class="infoTit NSK-Black">교재</div>
                <ul>
                    <li>헌법 T-PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                </ul>             

                <div class="infoTit NSK-Black">환불</div>
				<ul>
                    <li>결제 후 7일 이내 3강 이하 수강 시에만 전액 환불 가능합니다.</li>
                    <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                    <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                    <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 결제가 기준으로 계산하여 사용일 수 만큼 차감 후 환불됩니다.</li>
				</ul>

                <div class="infoTit NSK-Black">PASS 수강</div>
				<ul>
                    <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                    <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                    <li>윌비스경찰 헌법 T-PASS는 일시정지, 수강연장 , 재수강 불가합니다.</li>
                    <li>이국령 헌법 T-PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                    총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (윌비스경찰 PASS는  PMP 강의는 제공하지 않습니다.)</li>
                    <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가 필요할 시
                    내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                    <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
				</ul>

                <div class="infoTit NSK-Black">유의사항</div>
				<ul>
                    <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                    (단,이벤트 시 쿠폰사용가능)</li>
                    <li>헌법 T-PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며,
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

    <!-- End evtContainer -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

    <script type="text/javascript">
           
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
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

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop