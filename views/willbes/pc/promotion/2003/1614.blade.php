@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
   
	<!-- Container -->
    <style type="text/css">
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

        .skybanner{position: fixed; top:250px; right:10px; width:190px; z-index:10;}

		.evtTop {background:#191b20 url(https://static.willbes.net/public/images/promotion/2020/04/1614_graph_bg.jpg) no-repeat center top;}

		.evt01 {background:#a4a6ac url(https://static.willbes.net/public/images/promotion/2020/04/1614_top_bg.jpg) no-repeat center top;}
        
        .evt01_1 {background:#f5f5f5;}

		.evt02 {background:#fff; padding-bottom:150px}

		.evt03 {background:#7a2fec;}

        .evt04 {background:#f3f5f7;position:relative; padding:50px 0 100px;}	
        .evt04 table {width:1100px; margin:0 auto; border:1px solid #333}
        .evt04 th,
        .evt04 td {font-size:14px; padding:20px 10px; border-right:1px solid #333; line-height:1.5}
        .evt04 tr {border-bottom:1px solid #333}
        .evt04 th {color:#000; background:#fff}
        .evt04 td input {height:30px; width:30px;}
        .evt04 td label {display:none}     

        .evt04 .check04 {width:877px; height:112px; margin:20px auto 0;}   
        .evt04 .check_bg { width:1100px; margin:0 auto}  
        .evt04 .check {width:980px; margin:0 auto;  padding:25px 0px 25px 20px; letter-spacing:3; font-weight:bold; color:#362f2d; font-size:16px}
        .evt04 .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .evt04 .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fffbfb; background:#252525; margin-left:50px; border-radius:20px}

        .evt04 .buyLec {padding-top:50px;}
		.evt04 .buyLec a {width:1120px;margin:0 auto;display:block; text-align:cetner; font-size:30px; font-weight:600; background:#D43728; color:#fff; padding:20px 0; border-radius:50px}
        .evt04 .buyLec a:hover {background:#D43728; box-shadow: 10px 10px 10px rgba(0,0,0,.2);}        
        .evt04 .issue {font-size:24px; margin-bottom:50px; color:#7b7b7b}	
        .evt04 .issue span {font-size:36px; color:#42499c; animation:txtch 1s infinite;-webkit-animation:txtch 1s infinite;}
        @@keyframes txtch{
            from{color:#42499c}
            50%{color:#ef1821}
            to{color:#42499c}
        }
        @@-webkit-keyframes txtch{
            from{color:#42499c}
            50%{color:#ef1821}
            to{color:#42499c}
        } 

		.evt05 {background:#fff;padding-bottom:50px;}
		
		/* tab */
        .tabContaier{width:100%; text-align:center; padding-bottom:20px;}
        .tabContaier ul {margin:0 auto;  width:980px}		
        .tabContaier li {display:inline; float:left}	
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}

        .evt04_1 {background:#f3f5f7;}
        .tabs {width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:50%}
        .tabs a {display:block; text-align:center; font-size:30px; background:#fff; color:#42499c; border:4px solid #42499c; margin:0 5px; padding:20px 0; border-radius:10px}
        .tabs a:hover,
        .tabs a.active {background:#42499c;color:#fff;}
        .tabs:after {content:""; display:block; clear:both}

		/*타이머*/
        .time{width:100%; text-align:center; background:#000}
        .time_date {text-align:center; padding:20px 0}
        .time_date table {width:1120px; margin:0 auto}
        .time_date table td:first-child {font-size:40px}
        .time_date table td img {width:80%}
        .time_txt {font-family: 'NanumGothic', '나눔고딕','NanumGothicWeb', '맑은 고딕', 'Malgun Gothic', Dotum; font-size:28px; color:#f2f2f2; letter-spacing: -1px; font-weight:bold}
        .time_txt span {color:#ef6759; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
            from{color:#d63e4d}
            50%{color:#ecd60f}
            to{color:#d63e4d}
        }
        @@-webkit-keyframes upDown{
            from{color:#d63e4d}
            50%{color:#ecd60f}
            to{color:#d63e4d}
        }  

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d;vertical-align:bottom}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="#lecbuy">
                <img src="https://static.willbes.net/public/images/promotion/2020/11/1614_sky.png" title="" />    
            </a>        
        </div>
        --}}

        <div class="evtCtnsBox evtTop">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_graph.gif" title="한덕현T-PASS" />			
		</div>		

		<!-- 타이머 -->
		<div class="evtCtnsBox time">
			<div class="time_date" id="newTopDday">
				<table>
					<tr>
						<td class="time_txt"><span>{{ kw_date('n/j(%)', $arr_promotion_params['edate']) }} 마감!</span></td>
						<td class="time_txt">마감까지<br><span>남은 시간은</span></td>
						<td><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td class="time_txt">일 </td>
						<td><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td class="time_txt">:</td>
						<td><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td class="time_txt">:</td>
						<td><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
						<td><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></td>
					</tr>
				</table>
			</div>
		</div>
		<!-- 타이머 //-->	

		<div class="evtCtnsBox evt01">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_top.gif" title="합격전략 공개" />
		</div>

		<div class="evtCtnsBox evt01_1">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_01.jpg" title="영어, 자신있나요?" />
		</div>

		<div class="evtCtnsBox evt02">
			<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02.jpg"  title="갓덕현이 모두 해결해드립니다." />
			<div class="tabContaier">
				<ul>
					<li>
						<a class="active" href="#tab1"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1.jpg" class="off" />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab1_on.jpg" class="on"  /></a></li>
					<li>
						<a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2.jpg"  class="off"  />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab2_on.jpg"  class="on" /></a>
					</li>
					<li>
						<a href="#tab3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3.jpg"  class="off" />
						<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_tab3_on.jpg"  class="on" /></a>
					</li>
				</ul>
				<div class="tabContents" id="tab1">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c1.jpg" alt="윌비스 영어 40~60점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab2">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c2.jpg" alt="윌비스 영어 60~80점대 강력 추천! " />
				</div>
				<div class="tabContents" id="tab3">
					<img src="https://static.willbes.net/public/images/promotion/2019/04/1193_02_c3.jpg" alt="윌비스 영어 70점 이상 강력 추천! " />
				</div>
			</div>
		</div>

		<div class="evtCtnsBox evt03">
			<img src="https://static.willbes.net/public/images/promotion/2020/04/1614_03.jpg" title="수험생들이 선택하고 인정한 영어정복 노하우!" />
		</div>

        <div class="evtCtnsBox evt04_1" id="lecbuy">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1614_04_top.gif" title="" />
            {{--
            <ul class="tabs NSK-Black">
                <li><a href="#tpass01">국가직 대비 T-PASS</a></li>
                <li><a href="#tpass02">지방직 대비 T-PASS</a></li>
            </ul>
            --}}
        </div>

        <div class="evtCtnsBox evt04" id="event">    
            {{--국가직
            <div id="tpass01">     
                <div class="issue NSK-Black">
                    2021 국가직 합격 기원<br>
                    <span>11월 특별 한정판매</span>
                </div>  
                <table>
                    <col/>
                    <col />
                    <col />
                    <col />
                    <col/>
                    <tr>
                        <th>구분</th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec01.jpg" title="전과정" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec02.jpg" title="반반모고 제외" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec03.jpg" title="새벽모의고사" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec04.jpg" title="반반한모의고사" /></td>
                    </tr>
                    <tr>
                        <th>제공과정</th>
                        <td>2020~21 국가직 전 과정 <br />
                        + 아침똑똑영어 다시보기 <br />
                        + 반반모의고사 다시보기 <br />
                        + 새벽모의고사</td>
                        <td>2020~21 국가직 전 과정 <br />
                        + 아침똑똑영어 다시보기 <br />
                        + 새벽모의고사</td>
                        <td>새벽모의고사<br />
                        (2020.1 과정부터 제공)</td>
                        <td>반반모의고사 다시보기<br />
                        (2020.4 과정부터 제공)</td>
                    </tr>
                    <tr>
                        <th>수강기간</th>
                        <td colspan="4">2021 국가직 시험일까지 (6개월)</td>
                    </tr>
                    <tr>
                        <th>기기제한</th>
                        <td colspan="4">PC or 모바일 총 2대</td>
                    </tr>
                    <tr>
                        <th>배수제한</th>
                        <td colspan="3">X</td>
                        <td>3배수</td>
                    </tr>
                    <tr>
                        <th>자료제한</th>
                        <td colspan="3">새벽실저모의고사 2020.4 진행 과정부터 출력 3회 제한</td>
                        <td>출력 3회 제한</td>
                    </tr>
                    <tr>
                        <th rowspan="2">가격</th>
                        <td class="tx18 tx-red NSK-Black">690,000원</td>
                        <td class="tx18 tx-red NSK-Black">590,000원</td>
                        <td class="tx18 tx-red NSK-Black">290,000원</td>
                        <td class="tx18 tx-red NSK-Black">210,000원</td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="174386" onClick=""/><label for="y_pkg">전과정</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="174388" onClick=""/><label for="y_pkg">반반모고 제외</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="174385" onClick=""/><label for="y_pkg">새벽모의고사</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="174384" onClick=""/><label for="y_pkg">반반모의고사</label></td>
                    </tr>
                </table>          
            </div>  
            --}} 

            {{--지방직--}}
            <div id="tpass02"> 
                <table>
                    <col/>
                    <col />
                    <col />
                    <col />
                    <col/>
                    <tr>
                        <th>구분</th>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec01.jpg" title="전과정" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec02.jpg" title="반반모고 제외" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec03.jpg" title="새벽모의고사" /></td>
                        <td><img src="https://static.willbes.net/public/images/promotion/2020/11/1614_lec04.jpg" title="반반한모의고사" /></td>
                    </tr>
                    <tr>
                        <th>제공과정</th>
                        <td>2020~21 전 과정 <br />
                        + 아침똑똑영어 다시보기 <br />
                        + 반반모의고사 다시보기 <br />
                        + 새벽모의고사</td>
                        <td>2020~21 전 과정 <br />
                        + 새벽모의고사</td>
                        <td>새벽모의고사<br />
                        (2020.1 과정부터 제공)</td>
                        <td>반반모의고사 다시보기<br />
                        (2020.4 과정부터 제공)</td>
                    </tr>
                    <tr>
                        <th>수강기간</th>
                        <td colspan="4">2021 지방직 시험일까지</td>
                    </tr>
                    <tr>
                        <th>기기제한</th>
                        <td colspan="4">PC or 모바일 총 2대</td>
                    </tr>
                    <tr>
                        <th>배수제한</th>
                        <td colspan="3">X</td>
                        <td>3배수</td>
                    </tr>
                    <tr>
                        <th>자료제한</th>
                        <td colspan="3">새벽실전 모의고사 2020.4 진행 과정부터 출력 3회 제한</td>
                        <td>출력 3회 제한</td>
                    </tr>
                    <tr>
                        <th rowspan="2">가격</th>
                        <td class="tx18 tx-red NSK-Black">790,000원</td>
                        <td class="tx18 tx-red NSK-Black">690,000원</td>
                        <td class="tx18 tx-red NSK-Black">340,000원</td>
                        <td class="tx18 tx-red NSK-Black">240,000원</td>
                    </tr>
                    <tr>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="164226" onClick=""/><label for="y_pkg">전과정</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="164227" onClick=""/><label for="y_pkg">반반모고 제외</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="163940" onClick=""/><label for="y_pkg">새벽모의고사</label></td>
                        <td><input type="radio" id="y_pkg" name="y_pkg" value="163829" onClick=""/><label for="y_pkg">반반모의고사</label></td>
                    </tr>
                </table>      
            </div>  
            

            <div class="check_bg">
                <div class="check" id="chkInfo">
                    <label>
                        <input name="is_chk" type="checkbox" value="Y" /> 페이지 하단 이용안내를 모두 확인하였고,이에 동의합니다.             
                    </label>
                    <a href="#tip">이용안내확인하기 ↓</a>
                </div> 
            </div>            
            <div>                
                <div class="buyLec">
                    <a href="#none" onclick="goPassLecture()">
                        수강신청 >
                    </a>
                </div>
            </div>              
        </div><!--wb_cts03//-->
        
        <div class="evtCtnsBox evtInfo" id="tip">
            <div class="evtInfoBox">
                <h4 class="NGEB">이용안내 및 유의사항</h4>
                <div class="infoTit NG"><strong>상품구성</strong></div>
                <ul>
                    <li>제공과정<br>
                        - 전 과정 T-PASS : 2020 ~ 2021 한덕현 영어 9급 지방직 대비 전 과정 (아침똑똑영어 / 반반한모의고사 다시보기 + 새벽모의고사 포함)<br>
                        - 반반모의고사 제외 T-PASS : 2020 ~ 2021 한덕현 영어 9급 지방직 대비 전 과정 (아침똑똑영어 + 새벽모의고사 포함)<br>
                        - 새벽모의고사 T-PASS : 2020년 1월부터 2021년 9급 지방직 시험일까지 수강기간 내 진행되는 새벽모의고사 전 과정<br>
                        - 반반모의고사 T-PASS : 2021년 9급 지방직 시험일까지 수강기간 내 진행되는 한덕현 영어 반반한 모의고사 전 과정<br>
                    </li>
                    <li>본 상품의 수강기간은 상품 수강신청 상세안내 최면에 표기된 기간만큼 제공됩니다.</li>
                    <li>개강일정 및 교수님 사정에 따라 커리큘럼의 변동이 있을 수 있습니다.</li>
                    <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                </ul>
                <div class="infoTit NG"><strong>기기제한</strong></div>
                <ul>
                    <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                    - <span>PC 2대 or 모바일 2대 of  PC 1대 + 모바일 1대(총 2대)</span></li>
                    <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며, <br>
                    그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>
                </ul>
                <div class="infoTit NG"><strong>수강안내</strong></div>
                <ul>
                    <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li>
                    <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li>
                    <li>본 상품은 <span>일시정지/수강연장/재수강이 불가한 상품</span>입니다.</li>
                </ul>
                <div class="infoTit NG"><strong>결제/환불</strong></div>
                <ul>
                    <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.<br>
                        강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.
                    <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.
                    <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                </ul>
            </div>
        </div>
	</div>
	<!-- End Container -->


	<script type="text/javascript">
		/*tab*/
		$(document).ready(function(){
			$(".tabContents").hide(); 
			$(".tabContents:first").show();

			$(".tabContaier ul li a").click(function(){ 

			var activeTab = $(this).attr("href"); 
			$(".tabContaier ul li a").removeClass("active"); 
			$(this).addClass("active"); 
			$(".tabContents").hide(); 
			$(activeTab).fadeIn(); 

			return false; 
			});
		});	        

        function goPassLecture() {
            var frm = $('#event');
            var prod_code = frm.find('input[name="y_pkg"]:checked');
            var is_chk = frm.find('input[name="is_chk"]:checked');

            if (is_chk.length < 1) {
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }

            if (prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            location.href = '{{ front_url('/periodPackage/show/cate/3019/pack/648001/prod-code/') }}' + prod_code.val();
        }		

		/*디데이카운트다운*/
		$(document).ready(function() {
			dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
		});

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

	{{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop
