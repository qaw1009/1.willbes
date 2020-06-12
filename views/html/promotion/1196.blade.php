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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1196_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#f0f0f0}
        .evt02 {background:#fff}
        .evt03 {background:#f0f0f0}
        .evt04 {background:#e1e1e1}
        .evt05 {background:#2e124c}
				.evt06 {width:980px !important; margin:100px auto; text-align:left}
        .evt06Box {border:1px solid #000; padding:30px}

		  /* 유의사항 */
	    .tab02 {margin-bottom:20px}
			.tab02 li {display:inline; float:left; width:25%}
			.tab02 li a {display:block; text-align:center; font-size:14px; font-weight:bold; background:#e4e4e4; color:#666; padding:15px 0; border:1px solid #e4e4e4}
			.tab02 li a:hover,
			.tab02 li a.active {background:#fff; color:#000; border:1px solid #000; border-bottom:1px solid #fff}
			.tab02:after {content:""; display:block; clear:both}
			.tab02Cts strong {font-size:16px; font-weight:bold; color:#000; display:block; margin-bottom:20px}
			.tab02Cts span {padding-left:10px;}
			.tab02Cts p {font-size:14px !important; font-weight:bold; margin:20px 0 10px; color:#000}
			.tab02Cts ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:20px}
			.tab02Cts ul {margin-top:20px}
			.tab02Cts ul li {margin-bottom:5px}
			.tab02Cts table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
			.tab02Cts th,
			.tab02Cts td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4; font-size:100% !important}
			.tab02Cts th {font-weight:bold; color:#333}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

			<div class="evtCtnsBox evtTop">
				<img src="https://static.willbes.net/public/images/promotion/2019/04/1196_top.png" title=" 2020대비영어집중첨삭지도반 ">
			</div>

			<div class="evtCtnsBox evt01">
				<img src="https://static.willbes.net/public/images/promotion/2019/04/1196_01.jpg" title="01. 영어성적관리에서 답을 찾다">
			</div>

			<div class="evtCtnsBox evt02">
				<img src="https://static.willbes.net/public/images/promotion/2019/04/1196_02.jpg" title="02. 체계적인관리와첨삭지도">
			</div>

			<div class="evtCtnsBox evt03">
				<img src="https://static.willbes.net/public/images/promotion/2019/04/1196_03.jpg" title="03. 영어점수확보를 위한 전문교재">
			</div>

			<div class="evtCtnsBox evt04">
					<p><img src="https://static.willbes.net/public/images/promotion/2019/04/1196_04.jpg" title="영어를 미리정복하면 수험기간이 짧아집니다."></p>
					<p><img src="https://static.willbes.net/public/images/promotion/2019/04/1196_04_1.gif" title="지금 수강하면 할인!"></p>
					<p><a href="https://pass.willbes.net/pass/professor/show/prof-idx/50500/?cate_code=3043&subject_idx=1254&subject_name=영어&tab=open_lecture" target="_blank" alt="수강신청"><img src="https://static.willbes.net/public/images/promotion/2019/04/1196_04_2.jpg"  title="수강신청하기" ></a></p>
			</div>

			<div class="evtCtnsBox evt05">
				<a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=218"><img src="https://static.willbes.net/public/images/promotion/2019/04/1196_05.gif" title="설명회 신청하기"></a>
			</div>

			<!--유의사항-->
			<div class="evtCtnsBox evt06">
				<div class="evt06Box">
					<ul class="tab02">
						<li><a href="#txt1" class="active">수강료 환불규정</a></li>
						<li><a href="#txt2">영어첨삭 프로그램</a></li>
						<li><a href="#txt3">수강생 혜택</a></li>
						<li><a href="#txt4">기타</a></li>
					</ul>
					<!--수강료 환불규정-->
					<div id="txt1" class="tab02Cts">
						<ol>
						<li><strong>수강료 환불규정 (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</strong>
							<table>
							<col />
							<col />
							<col />
							<tr>
								<th>수강료징수기간</th>
								<th>반환 사유발생일</th>
								<th>반환금액</th>
							</tr>
							<tr>
								<td rowspan="4">1개월 이내인 경우</td>
								<td>교습개시 이전</td>
								<td>이미 납부한 수강료 전액</td>
							</tr>
							<tr>
								<td>총 교습 시간의 1/3 경과 전</td>
								<td>이미 납부한수강료의 2/3 해당</td>
							</tr>
							<tr>
								<td>총 교습 시간의 1/2 경과 후</td>
								<td>이미 납부한수강료의 1/2 해당</td>
							</tr>
							<tr>
								<td>총 교습 시간의 1/2 경과 수</td>
								<td>반환하지아니함</td>
							</tr>
							<tr>
								<td rowspan="2">1개월 초과인 경우</td>
								<td>교습 개시 이전</td>
								<td>이미 납부한 수강료 전액</td>
							</tr>
							<tr>
								<td>교습 개시 이후</td>
								<td>반환 사유가발생한 당해 월의 반환대상 수강료와 나머지 월의 수강료 전액을 합산한 금액</td>
							</tr>
							</table>
							<br />
							<br />
							- 본 강좌의 총 교습기간은  2019. 05. 06.(월)부터 2019. 06. 29.(토) 까지이며, 수강료의 환불은 1개월을 기준으로 합니다.<br />
							- 개강 이후 환불 접수는 기간 내 직접 방문해주셔야 합니다. (유선 접수 불가/ 수강증 미반납시 환불 불가)<br />
							- 환불 요청시, 결제 하였던 카드, 수강증, 영수증을 지참하셔야 결제취소가 가능하며, 현금으로 결제하신 경우, 수강생 본인 명의의 통장으로 입금됩니다.<br />
							- 환불 기준일은 실제 수강여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />
							- 수강 기간 동안 제공받은 사물함, 동영상 강좌, 자습실 등 혜택으로 제공된 서비스는 환불 즉시 이용이 정지 및 회수됩니다 <br />
							- 무료로 제공받은 교재 등 혜택으로 제공된 물품류(전자제품 제외)의 경우 미반환되거나, 기사용흔적/훼손이 있는 경우, 환불금액에서 해당 물품류의 정가를 환불금에서 공제합니다.<br />
						</li>
						</ol>
					</div>

					<!--영어첨삭 프로그램-->
					<div id="txt2" class="tab02Cts">
						<ol>
						<li><strong>영어 집중첨삭지도반 커리큘럼</strong>
							- 커리큘럼은 시험일정이나 학원사정에 따라 일부 수정될 수 있습니다.<br />
							- 영어집중반은 윌비스고시학원의 한덕현 교수님과 이아림 교수님께서 운영하는 강좌입니다. <br /><br />
						</li>
						<li><strong>상기 게시된 “주간학습시간표” 일정에 맞춰서 운영합니다.</strong></li>
						<li><strong>자습실 및 학원 운영시간</strong>
							- 학원 운영 시간: 월~일 06:30~23:00<br />
							- 자습실 운영시간은 학원 운영 시간과 동일합니다. (단, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.)<br /><br />
						</li>
						<li><strong>TEST 프로그램</strong>
							- 매일아침 단어.숙어 Test가 진행되며, 상호 채점후 틀린부분을 다시 암기하는 시간으로 운영합니다. <br /> 
							- 주간Test는 일주일동안 배웠던 부분을 확인하는 과정입니다. 복습계획시 꼭 필요한 과정입니다. <br /><br />
						</li>
						<li><strong> 1:1 첨삭지도 프로그램</strong>
							- 영어집중반은 강의시간외에 교수님께서 주4일정도 전용강의실에서 상주하면서 1:1 과외식 학습지도를 진행합니다<br /><br />
						</li>
						</ol>
					</div>
				
					<!--수강생 혜택-->
					<div id="txt3" class="tab02Cts">
						<ol>
						<li><strong>전용 강의실&자습실</strong>
							- 지정좌석제로 제공되며, 지정된 좌석이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
							- 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
							- 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
							- 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
							- 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br /><br />
						</li>
						<li><strong>사물함 제공</strong>
							- 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다. <br />
							- 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
							- 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
							- 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
							- 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
							- 개인 사유에 의해 활용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br /><br />
						</li>
						<li><strong>이론종합반 수강시 할인혜택 </strong>
							- 본 과정이 종료된 후, 7월 이론종합반 및 연간반을 수강할 경우, 할인혜택을 드립니다. (관련 설명회 진행예정)<br />
						</li>
						</ol>
					</div>

					<!--기타-->
					<div id="txt4" class="tab02Cts">
						<ol>
						<li><strong>학원 시설 안내 </strong>
							- 본 강좌가 진행되는 위치는 동작구 장승배기로 168 (노량진동 54-11) 드림타워 건물입니다. <br />
							- 휴게시설: 건물의 5층. 6층. 11층에 작은 휴게공간이 있습니다. <br />
							- 화장실: 본 건물은 짝수층이 남자화장실 / 홀수층이 여자화장실입니다. <br />
							- 식 사: 본 건물 지하에 고시식당이 운영되고 있으며, 도시락을 지참하시는 분은 휴게 공간에서 13시~14시까지 식사하실 수 있습니다. (식사후, 환기를 철저히 부탁드립니다.) <br />
							- 학원 사물실 안내: 학원 안내데스크는 4층에 위치해 있으며, 수강접수 및 환불, 불편사항 등이 있으시면 문의해주시기 바랍니다. (전화 1544-0330) <br /><br />
						</li>
						<li><strong>강의수강</strong>
							- 반드시 등록한 강좌 및 등록한 수업만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원등록이 불가할 수 있습니다.<br />
							- 등록하신 강좌는 본인만 수강이 가능하며, 타인에게 판매/양도 할 수 없습니다.<br />
							- 강의는 학원 사정에 의해 폐강될 수 있습니다. (폐강시, 환불규정에 의거 환불 진행)<br />
							- 개인사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
							- 수강확인은 수강증을 통한 검사로 진행되오니 꼭 지참하시고 수강하시기 바랍니다. (수강증 분실 및 미발급으로 발생되는 손해책임은 수강생 본인에게 있습니다.)<br />
							- 수강료에 교재 비용은 포함되어 있지 않으며, 강의에 따라 추가 교재를 구매 하실 수 있습니다.<br /><br />
						</li>
						</ol>
					</div>
				</div>
			</div>
			<!--유의사항//-->

</div>
<!-- End Container -->

 <script type="text/javascript">

	$(document).ready(function(){
	$('.tab02').each(function(){
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