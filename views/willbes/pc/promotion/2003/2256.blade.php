@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:15px 0 40px}
        .newTopDday ul {width:1120px; margin:0 auto;}
        .newTopDday ul li {display:inline; float:left; margin-right:5px; text-align:center; font-size:28px; height:60px; line-height:60px; padding-top:10px !important; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; width:28%; font-size:16px; color:#666; line-height:1.3; }
        .newTopDday ul li:first-child span { font-size:28px; color:#000; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px; width:24%; line-height:60px}
        .newTopDday ul:after {content:""; display:block; clear:both}
         
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/06/2256_top_bg.jpg) no-repeat center top;}       

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2256_02_bg.jpg) no-repeat center top;}  

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2256_03_bg.jpg) no-repeat center top;} 

        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2256_04_bg.jpg) no-repeat center top;}

        .check {position:absolute; bottom:50px; left:50%; margin-left:-490px; width:980px; padding:20px 0px 20px 10px; letter-spacing:3; color:#fff; z-index:5}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}    

        /* 이용안내 */
        .evtInfo {padding:80px 0; background:#f4f4f4; color:#3a3a3a; font-size:16px}
        .evtInfoBox {width:1000px; margin:0 auto; text-align:left; line-height:1.4}
        .evtInfoBox li {list-style:disc; margin-left:20px; font-size:14px}
        .evtInfoBox h4 {font-size:35px; margin-bottom:50px}
        .evtInfoBox .infoTit {font-size:20px;}
        .evtInfoBox ul {margin-bottom:30px}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday NG">        
            <div>
                <ul>
                    <li>
                    최우영 T-PASS - {{$arr_promotion_params['turn']}}기<br />
                        <span class="NGEB">{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} 마감!</span>
                    </li>
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
                    <li>
                        남았습니다
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_top.jpg" alt="최우영 T-PASS" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_01.jpg" alt="시간 단축" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_02.jpg" alt="커리큘럼" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_03.jpg" alt="믿고 따라만 오세요" />
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_04.jpg" alt="절호의 기회" />
        </div>

        <div class="evtCtnsBox wb_cts05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2256_05.jpg" alt="바로 신청하기" />
                <a href="javascript:go_PassLecture('181424');" title="" style="position: absolute;left: 16.86%;top: 43.85%;width: 19.75%;height: 3.48%;z-index: 2;"></a>
                <a href="javascript:go_PassLecture('181423');" title="" style="position: absolute;left: 61.86%;top: 43.85%;width: 19.75%;height: 3.48%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="" style="position: absolute;left: 16.86%;top: 81.35%;width: 19.75%;height: 3.48%;z-index: 2;"></a>
                <a href="javascript:alert('Coming Soon!')" title="" style="position: absolute;left: 61.86%;top: 81.35%;width: 19.75%;height: 3.48%;z-index: 2;"></a>
                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 최우영 T-PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#careful">이용안내확인하기 ↓</a>
                </div>
            </div>    
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">이용안내 및 유의사항</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>최우영 T-PASS 제공 과정 (*과목별 상세 제공 과정의 경우 수강신청 상세 안내 참조)<br>
                        - 통신직 : 2021년도 대비 이론 + 2022년도 9급 국가직·지방직/군무원 대비 신규 개강 전 과정<br>
                        - 전기직 : 2021년도 대비 이론 및 문제풀이 + 2022년도 9/7급 국가직·지방직/군무원 전기직 대비 신규 개강 전 과정<br>
                        - 전자직 : 2021년도 대비 이론 및 문제풀이 + 2022년도 군무원 전자직 대비 신규 개강 전 과정
                     </li>   
                    <li>개강 일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                    <li>본 T-PASS 내 제공되는 과정 중 신규 개강이 진행되지 않는 경우, 전년도 진행 과정으로 대체 제공될 수 있습니다.</li>
                    <li>본 T-PASS를 통한 강의 수강 시, 각 과정당 3배수 제한이 적용됩니다.</li>
                    <li>본 상품의 이용기간은 수강신청 상세 안내화면에 표시된 기간 만큼 제공됩니다.</li>
				</ul>
                <div class="infoTit"><strong>교재안내</strong></div>
				<ul>
                    <li>교재는 별도로 제공되지 않으며, 각 강좌별 교재는 강좌소개 및 홈페이지 상단의 [교재구매] 메뉴에서 별도로 구매 가능합니다.</li>       
				</ul>
				<div class="infoTit"><strong>기기제한</strong></div>
				<ul>
					<li>본 PASS 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                        - PC+모바일 수강 시 : PC 2대 or 모바일 2대 or PC 1대+모바일 1대 (총 2대)
                    </li>
                    <li>계정당 최초 1회에 한해 직접 기기정보 초기화 진행 가능하며, 별도 기기정보 초기화가 추가로 필요하신 경우 내용 확인 후 진행 가능하오니 고객센터로 문의주시기 바랍니다.</li>       
				</ul>
                <div class="infoTit"><strong>수강안내</strong></div>
				<ul>
                    <li>먼저 [내강의실] 메뉴에서 무한PASS존으로 접속합니다.</li>
                    <li>구매하신 무한PASS 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 과목/교수/강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 PASS 이용 중에는 일시정지/재수강/연장 기능을 사용할 수 없습니다.</li>
				</ul>
				<div class="infoTit"><strong>결제/환불</strong></div>
				<ul>
					<li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                    <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                        - 결제금액 - (강좌 정상가의 1일 이용대금X이용일수)
                    </li>
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>             				
				</ul>
                <div class="infoTit"><strong>윌비스 고객만족센터 1544-5006</strong></div>
			</div>
		</div> 

    </div>
    <!-- End Container -->

    <script>    

        /*수강신청 동의*/ 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            var url = '{{ site_url('/periodPackage/show/cate/3028/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    
        
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop