@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}

        /************************************************************/
        
        .evt_top {background: url(https://static.willbes.net/public/images/promotion/2020/10/1868_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:#d69d5f;}
        .evt_03 {background:#fff; width:1120px; margin:0 auto}

        .tabs {margin-bottom:20px}
        .tabs li {display:inline; float:left; width:33.33333%;}
        .tabs li a {display:block; text-align:center; font-size:24px; background:#323232; color:#fff; padding:24px 0; margin-right:1px}
        .tabs li a:hover,
        .tabs li a.active {background:#d69d5f; color:#fff;}
        .tabs li:last-child a {margin:0}
        .tabs:after {content:""; display:block; clear:both}
        .evtCtnsBox table {border-top:1px solid #4e4e4e; border-left:1px solid #4e4e4e}
        .evtCtnsBox tr {border-bottom:1px solid #4e4e4e}
        .evtCtnsBox th,
        .evtCtnsBox td {padding:15px 10px; text-align:center; font-size:16px; border-right:1px solid #4e4e4e}
        .evtCtnsBox th {font-weight:bold; background:#ededed}
        .evtCtnsBox td label {cursor:pointer; margin-right:5px}
        .evtCtnsBox td input {border:2px solid #000; margin-right:10px; height:20px; width:20px; }
        .evt_03 .lecBtn {position:relative}
        .evt_03 .lecBtn span {position:absolute; left:220px; top:215px }
        .evt_03 .lecBtn span input {height:40px; line-height:40px; padding-left:10px; font-size:18px; width:250px; color:#ccc; border:2px solid #0c6800}
        .evt_03 .lecBtn span input:focus {color:#333}
        .evt_03 .lecBtn span a {display:inline-block; height:40px; line-height:40px; font-size:18px; padding:0 10px; background:#0c6800; color:#fff; border:2px solid #0c6800;
            margin-left:5px; vertical-align:middle}
        .evt_03 .lecBtn span a:hover {background:#000; border:2px solid #000;}

        .check {width:1120px; padding:50px 0; letter-spacing:3; color:#fff; border-top:1px solid #ccc}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px;}
        .check a {display:inline-block; padding:12px 20px 10px 20px; color:#fff; background:#393939 ; margin-left:50px; border-radius:20px;font-size:14px;font-weight:bold;}
        .check a:hover {background:#d69d5f;}

        .evtInfo {padding:80px 0; background:#535353; color:#fff; font-size:14px}
		.evtInfoBox { width:1000px; margin:0 auto; text-align:left; line-height:1.4}
		.evtInfoBox h4 {font-size:20px; margin-bottom:20px}
		.evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
		.evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px}
		.evtInfoBox ul {margin-bottom:30px}
        .evtInfoBox li {margin-bottom:8px; list-style:disc; margin-left:20px}
        .evtInfoBox span {color:#ff6d6d}

        /************************************************************/      
    </style> 
	<div class="evtContent NSK">
		<div class="evtCtnsBox evt_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_top.jpg" alt="기본실력완성 패키지 이벤트"/>
		</div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_01.jpg" alt="예비순환 패키지"/>
		</div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_02.jpg" alt="예비순환 패키지 유의사항" />
		</div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_03.jpg" alt="예비순환 패키지 gs1순환 패키지" />
            <ul class="tabs NSK-Black">
                <li><a href="#tab01">일반행정직렬 관리종합반</a></li>
                <li><a href="#tab02">재경직렬 종합반</a></li>
                <li><a href="#tab03">국립외교원 관리종합반</a></li>
            </ul>
            <div id="tab01">
                <table>
                    <col width="25%">
                    <col width="25%">
                    <col width="30%">
                    <col width="">
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>교수</th>
                            <th>개강일 ~ 종료일</th>
                            <th>횟수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>경제학</td>
                            <td><label><input type="checkbox">황종휴</label></td>
                            <td>10/12(월)~11/7(토)</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td rowspan="2">행정법(택1)</td>
                            <td><label><input type="checkbox">김정일</label></td>
                            <td rowspan="2">11/9(월)~12/3(목)</td>
                            <td rowspan="2">22</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">박도원</label></td>
                        </tr>
                        <tr>
                            <td rowspan="2">행정학(택1)</td>
                            <td><label><input type="checkbox">박경효</label></td>
                            <td rowspan="2">12/4(금)~12/23(수)</td>
                            <td rowspan="2">17</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">최승호</label></td>
                        </tr>
                        <tr>
                            <td rowspan="3">정치학(택1)</td>
                            <td><label><input type="checkbox">김희철</label></td>
                            <td rowspan="3">12/25(금)~1/13(수)</td>
                            <td rowspan="3">17</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">정원준</label></td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">최승호</label></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt10 mb50">‣ 강의시간 (시험 없는 날) 1:40~5:10 | (시험) 1:00~2:00 | (강의) 2:10~5:20</div>
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04.jpg" alt="" />
                <div class="lecBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04_01.jpg" alt="" />               
                    <span><input type="text" placeholder="친구 아이디 입력"><a href="#none">확인</a></span>
                </div>
                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#notice">이용안내확인하기 ↓</a>
                </div> 
            </div> 
            <div id="tab02">
                <table>
                    <col width="25%">
                    <col width="25%">
                    <col width="30%">
                    <col width="">
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>교수</th>
                            <th>개강일 ~ 종료일</th>
                            <th>횟수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>경제학</td>
                            <td><label><input type="checkbox">황종휴</label></td>
                            <td>10/12(월)~11/7(토)</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td rowspan="2">행정법(택1)</td>
                            <td><label><input type="checkbox">김정일</label></td>
                            <td rowspan="2">11/9(월)~12/3(목)</td>
                            <td rowspan="2">22</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">박도원</label></td>
                        </tr>
                        <tr>
                            <td rowspan="2">행정학(택1)</td>
                            <td><label><input type="checkbox">박경효</label></td>
                            <td rowspan="2">12/4(금)~12/23(수)</td>
                            <td rowspan="2">17</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">최승호</label></td>
                        </tr>
                        <tr>
                            <td>재정학</td>
                            <td><label><input type="checkbox">
                              황종휴</label></td>
                            <td>12/25(금)~1/7(목)</td>
                            <td>12</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt10 mb50">‣ 강의시간 (시험 없는 날) 1:40~5:10 | (시험) 1:00~2:00 | (강의) 2:10~5:20</div>
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04.jpg" alt="" />
                <div class="lecBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04_02.jpg" alt="" />               
                    <span><input type="text" placeholder="친구 아이디 입력"><a href="#none">확인</a></span>
                </div>
                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#notice">이용안내확인하기 ↓</a>
                </div> 
            </div> 
            <div id="tab03">
                <table>
                    <col width="25%">
                    <col width="25%">
                    <col width="30%">
                    <col width="">
                    <thead>
                        <tr>
                            <th>과목</th>
                            <th>교수</th>
                            <th>개강일 ~ 종료일</th>
                            <th>횟수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>경제학</td>
                            <td><label><input type="checkbox">황종휴</label></td>
                            <td>10/12(월)~11/7(토)</td>
                            <td>24</td>
                        </tr>
                        <tr>
                            <td rowspan="2">국제정치학(택1)</td>
                            <td><label><input type="checkbox">정원준</label></td>
                            <td rowspan="2">11/9(월)~12/8(화)</td>
                            <td rowspan="2">26</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">김희철</label></td>
                        </tr>
                        <tr>
                            <td rowspan="2">국제법(택1)</td>
                            <td><label><input type="checkbox">안진우</label></td>
                            <td rowspan="2">12/9(수)~1/9(토)</td>
                            <td rowspan="2">28</td>
                        </tr>
                        <tr>
                            <td><label><input type="checkbox">백승호</label></td>
                        </tr>
                        <tr>
                            <td>국제경제학</td>
                            <td><label><input type="checkbox">황종휴</label></td>
                            <td>1/11(월)~1/23(토)</td>
                            <td>13</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt10 mb50">‣ 강의시간 (시험 없는 날) 1:40~5:10 | (시험) 1:00~2:00 | (강의) 2:10~5:20</div>
                <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04.jpg" alt="" />
                <div class="lecBtn">
                    <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_04_03.jpg" alt="" />               
                    <span><input type="text" placeholder="친구 아이디 입력"><a href="#none">확인</a></span>
                </div>
                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#notice">이용안내확인하기 ↓</a>
                </div> 
            </div>  
		</div>

        <div class="evtCtnsBox">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1868_05.jpg" alt="예비순환 패키지 유의사항" />
        </div>
        
        <div class="evtCtnsBox evtInfo mt100" id="notice">
			<div class="evtInfoBox">
				<h4 class="NGEB">온라인 관리종합반 이용안내<span>(필독바랍니다)</span></h4>
				<div class="infoTit NG"><strong>수강관련</strong></div>
				<ul>
					<li>강의는 일정에 따라 홈페이지 “내강의실”에서 개강 및 종강이 되며, <span>과목별 진행날짜에 따라 해당 회차 강의가  업로드</span> 됩니다. </li>
                    <li>개강 전 OT 영상을 통해 <span>운영(원격 채점, 출결 체크 등)에 관한 안내 예정</span>입니다.</li>
                    <li>강의 일정은 학원 및 기타 진행 상황에 따라 변경될 수 있습니다.</li>
                    <li>이용 중에는 휴강 기능을 이용할 수 없습니다.</li>
                    <li>온라인 관리종합반은 학원실강과 같은 진행방식으로 운영이 되며, 동영상강의 일시정지 및 연장은 적용되지 않습니다.  
                        다만, <span>수업 후 신청시 과목별 복습 동영상 제공(1.5배수 30일 1회에 한함)</span></li>
                    <li>온라인 관리종합반은 <span>10/18(일)까지 접수예정</span>이며 학원사정에 의해 조기신청종료 및 일정 변경될 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>추가포인트 적립관련</strong></div>
				<ul>
					<li>수강신청시 친구 아이디 입력하시고 친구분도 <span>관리종합반 같이 등록시 모두에게 150,000 포인트 적립</span></li>
                    <li>포인트는 10/19(월) 일괄적립예정이며, <span>동영상강의 결제시 이용</span>하실 수 있습니다.</li>
				</ul>
				<div class="infoTit NG"><strong>교재관련</strong></div>
				<ul>
					<li>교재는 별도로 구매하셔야 합니다.</li>
                    <li>각 강좌별 교재는 홈페이지 “교재구매” 메뉴에서 별도 구매 가능합니다. </li>
				</ul>
				<div class="infoTit NG"><strong>무이자 할부 안내</strong></div>
				<ul>
					<li>무이자 할부 개월수는 각 카드사 및 결제대행사(PG사) 할부 프로모션에 따라 상이합니다.(※ 결제대행사 무이자 가능한 할부 개월수 미확인 후 발생하는 불이익은 당사가 책임지지 않습니다.)</li>
                    <li>결제 완료 후 [카드변경 결제],[무이자 할부 변경] 목적으로 재결제가 진행될 경우 기수별 혜택이 변경되었을 시 최초 결제 혜택으로 적용되지 않습니다.</li>
                    <li>법인/ 기업/ 체크 /기프트/ 선불 은행계열 카드 등 일부 카드의 경우 할부가 적용되지 않을 수 있으며, 자세한 사항은 각 카드사 홈페이지를 참고 바랍니다.</li>
                </ul>
                <div class="infoTit NG"><strong>유의사항</strong></div>
				<ul>
					<li>아이디 공유 적발 시 회원 자격이 박탈되며 환불 불가함을 원칙으로 합니다.</li>
                    <li>추가적인 불법 공유 행위 적발 시 형사 고발 조치가 진행될 수 있는 점, 양지해주시기 바랍니다.</li>
				</ul>
                <div class="infoTit NG"><strong>환불정책</strong></div>
				<ul>
					<li>온라인 관리종합반(필수 4과목)은 <span>개별 과목 환불이 되지 않습니다.</span>(개별과목 환불시 전체 종합반 환불진행)</li>
                    <li>온라인 관리종합반은 할인이 적용된 상품으로 환불시 해당 과목의 <span>정가를 기준으로 환불</span>하는 것을 원칙으로 합니다.</li>
                    <li>과목별 해당회차 강의일이 지났을 경우, 해당 회차를 수강하신 것으로 환불이 되십니다.</li>
                    <li>기타, 자세한 환불규정은 약관에 따릅니다.</li>
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

            var url = '{{ site_url('/package/show/cate/3094/pack/648001/prod-code/') }}' + code;
            location.href = url;
        }    

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