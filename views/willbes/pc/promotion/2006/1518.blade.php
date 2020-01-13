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

		/************************************************************/ 

		.skybanner{position: fixed; top: 280px;right:2px;z-index: 1;}	  

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/01/1518_nomu_01_bg.jpg) no-repeat center top;}

		.evt_01 {background:#d6d6d6;}

        .evt_02 {background:#fff;}
        .evt_03 {width:980px !important; margin:0 auto; padding:100px 0}

        .tabs {border-bottom:2px solid #590895; width:980px; margin:0 auto 30px}
		.tabs li {display:inline; float:left; width:50%;}
		.tabs li a {display:block; color:#fff; background:#9697a1; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:16px; font-weight:bold}
		.tabs li a:hover,
		.tabs li a.active {background:#590895}
		.tabs li:last-child a {margin:0}
        .tabs:after {content:""; display:block; clear:both}
        
        .evtCtnsBox table {border-top:1px solid #edeeef; border-left:1px solid #edeeef; table-layout: auto; width:980px !important; margin:0 auto;}
		.evtCtnsBox table th,
		.evtCtnsBox table td {padding:15px 5px; border-bottom:1px solid #edeeef; border-right:1px solid #edeeef; text-align: center; font-size:14px}
		.evtCtnsBox table th {background: #2e3044; color:#fff; font-weight: bold;}
		.evtCtnsBox table tbody th {background: #9697a1; color:#fff;} 
        .evtCtnsBox table tbody tr.lec td:last-child {color:#de3349; font-weight:bold}
		.evtCtnsBox .buyLec {width:980px; margin:50px auto 0}
		.evtCtnsBox .buyLec a { display:block; text-align:cetner; font-size:30px; font-weight:600; background:#e83e3e; color:#fff; padding:20px 0; border-radius:50px}
		.evtCtnsBox .buyLec a:hover {background:#e83e3e; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}

		.evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
		.evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1518_nomu_01.png" alt="관세사 올패스 맴버쉽"/>
		</div>

		<div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/01/1518_nomu_02.png" alt="올패스 맴버쉽 혜택" />
		</div>

        <div class="evtCtnsBox evt_03">
            <ul class="tabs">
                <li><a href="#tab01">필수과목 강좌</a></li>
                <li><a href="#tab02">선택과목 강좌</a></li>
            </ul>
            <div id="tab01">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>과목명</th>
                            <th>교수</th>
                            <th>일정</th>
                            <th>횟수</th>
                            <th>수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="10">노동법</th>
                            <td rowspan="2">방강수 노무사</td>
                            <td>[평일반] 2020. 1/2~1/31</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">원 포인트 판례 170선 3판(방강수)+    통합노동법 10판(방강수)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">강재민 노무사</td>
                            <td>[평일반] 2020. 1/2~1/31</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">쟁점노동법 10판(강재민)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">박원철 노무사</td>
                            <td>[평일반] 2020. 1/2~1/31</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">실전노동법(2020 최신판)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">이수진 노무사</td>
                            <td>[주말반] 2020. 1/12~3/22</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합노동법 10판(방강수)+시험용법전+기타 보충자료</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">박원철 노무사</td>
                            <td>[주말반] 2020. 1/12~3/22</td>
                            <td>18회</td>
                            <td>284,000원</td>
                        </tr>
                        <tr>
                            <td height="18" colspan="3">실전노동법(2020 최신판)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="18">행정쟁송법</th>
                            <td rowspan="2">조  현 교수</td>
                            <td>[평일반] 2020. 2/3~2/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합행정쟁송법 8판(조현)+행정쟁송법 기출사례해설+최신판례자료</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">이승민 교수</td>
                            <td>[평일반] 2020. 2/3~2/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">콕 행정쟁송법(이승민)+행정쟁송법 사례집(이승민)+콕 행정쟁송법 핸드북</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">심  민 교수</td>
                            <td>[평일반] 2020. 2/3~2/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">MAGIC 통합 실전연습 행정쟁송법+MAGIC 노동관계 행정쟁송법+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><p>김정일 변호사</p></td>
                            <td>[평일반] 2020. 2/3~2/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">행정쟁송법 암기장(제본)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">김기홍 교수</td>
                            <td>[평일반] 2020. 2/3~2/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">2020 공인노무사 핵심정리 행정쟁송법+2020 공인노무사 기출,사례 행정쟁송법의&ldquo;기출&rdquo;편(김기홍, 1월 출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2"><p>조  현 교수</p></td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">통합행정쟁송법 8판(조현)+행정쟁송법 기출사례해설+최신판례자료</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">이승민 교수</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">콕 행정쟁송법(이승민)+행정쟁송법 사례집(이승민)+콕 행정쟁송법 핸드북</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">심  민 교수</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">MAGIC 통합 실전연습 행정쟁송법+MAGIC 노동관계 행정쟁송법+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">김정일 변호사</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">행정쟁송법 암기장(제본)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="8">인사노무관리</th>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[평일반] 2020. 2/17~2/28</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">인사노무관리 전략노트 6판(김유미)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">전수환 교수</td>
                            <td>[평일반] 2020. 2/17~2/28</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">공인노무사 인사노무관리 7판(전수환)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">김유미 노무사</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">인사노무관리 전략노트 6판(김유미)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">정준모 노무사</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">강의교재 : RECAP 인사노무관리 워크북<br />
                            참고교재 : 신인적자원관리 3판(김영재</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buyLec">
                    <a href="#none">수강신청 ></a>
                </div>
            </div>
            <div id="tab02">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>과목명</th>
                            <th>교수</th>
                            <th>일정</th>
                            <th>횟수</th>
                            <th>수강료</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr class="lec">
                            <th rowspan="8">경영조직론</th>
                            <td rowspan="2">김유미 노무사</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">경영조직 전략노트 4판(김유미)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">정준모 노무사</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">RECAP 경영조직 워크북(출간예정)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">전수환 교수</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">공인노무사 경영조직 5판(전수환)</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">김유미 노무사</td>
                            <td>[주말반] 2020. 1/4~3/14</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">경영조직 전략노트 4판(김유미)</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="4">민사소송법</th>
                            <td rowspan="2">김춘환 교수</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">테마 민사소송법 핵심암기장 7판(김춘환)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <td rowspan="2">이덕훈 박사</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">민사소송법 단문연습(이덕훈, 제본)+시험용법전</td>
                        </tr>
                        <tr class="lec">
                            <th rowspan="2">노동경제학</th>
                            <td rowspan="2">강두성 교수</td>
                            <td>[평일반] 2020. 3/2~3/13</td>
                            <td>10회</td>
                            <td>158,000원</td>
                        </tr>
                        <tr>
                            <td colspan="3">노동경제학 10판(김우탁)+논술 노동경제학 적중엄선 126선 6판(김우탁)</td>
                        </tr>
                    </tbody>
                </table>
                <div class="buyLec">
                    <a href="#none">수강신청 ></a>
                </div>
            </div>
        </div>

		<div class="evtCtnsBox evtInfo NGR">
			<div class="evtInfoBox">
				<h4 class="NGEB">상품 이용안내</h4>
				<div class="infoTit NG"><strong>상품구성</strong></div>
				<ul>
					<li>
                        본 상품은 2020년 1월~3월에 진행되는 [공인노무사 2차 GS1순환 강의] 과정입니다.<br>
                        동영상 강의는 실강 진행 후 다음날 동영상 업로드(공휴일/일요일제외) 됩니다.
                    </li>
                    <li>
                        강사배정 및 학원사정에 따라 강의가 진행이 되지 않을 경우 다른 강사님의 강의로 변경하실 수 있습니다.<br>
                        강의는 순차적으로 업로드 예정이며, 강의 일시와 횟수는 변경될 수 있습니다.
                    </li>
				</ul>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>본 상품 신청 시 컴퓨터, 스마트 기기를 이용하여 자유롭게 수강하실 수 있습니다.</li>
                    <li>본 상품은 2배수 수강제한이 되어있습니다.</li>
                    <li>본 상품의 수강시작일은 60일 범위 내에서 지정하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>본 상품 강의별 교재는 별도로 주문하셔야 합니다.</li>
					<li>본 상품 강의별 교재는 동영상 강의 신청 후 내강의실 바로가기 → 「강의보기」를 클릭하신 후 주문하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>결제/환불관련</strong></div>
				<ul>
					<li>본 상품은 파격 할인가가 적용된 상품으로 복지할인 등 다른 쿠폰과 중복 적용되지 않습니다. </li>
                    <li>본 상품 환불시 원 수강료와 수강일수 기준으로 환불이 됩니다.</li>
                    <li>기타 환불규정은 약관의 규정에 따릅니다.</li>
				</ul>
				<div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 및 불법공유 행위 적발 시 회원자격 박탈 및 고발 조치가 진행될 수 있습니다.</li>
					<li>본 상품은 PC 식별코드인 MAC ADDRESS 수집에 동의하셔야 구매 및 수강이 가능합니다.</li>
					<li>[MAC ADDRESS 안내]<br>
						본 상품은 MAC 주소 정보 수집에 동의 후 구매할 수 있습니다.<br>
						윌비스는 정당하게 수강하시는 분들의 권리를 보호하기 위하여 MAC주소를 수집하고 있습니다. <br>
						MAC 주소(Media Access Control Address)는 PC마다 존재하는 고유 식별 번호입니다.</li>
				</ul>
				<div class="infoTit NG"><strong>상담 및 문의</strong></div>
				<ul>
					<li>[상담시간] 평일 오전 10시 ~ 오후 5시</li>
					<li>[상담전화] 1544-5006 or 070-4006-7129 (자격증 담당자)</li>
					<li>[상담내용] 강의 및 패키지 상품 안내</li>
				</ul>
			</div>
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );
    </script>
@stop