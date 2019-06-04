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

        .wb_cts01 {position:relative; overflow:hidden;  background:#000 url("https://static.willbes.net/public/images/promotion/2019/05/1252_top_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#fff}
        .wb_cts05 {background:#fff}
        .wb_cts06 {background:#095e4b}
        .wb_cts07 {background:#f3ece6; padding-bottom:100px} 
        .wb_cts07 div {width:980px; margin:0 auto }
        .wb_cts07 div li {display:inline; float:left; width:50%}
        .wb_cts07 div li a {display:block; text-align:center; background:#095e4b; color:#f3ece6; border-radius:10px; margin:10px; height:80px; line-height:80px; font-size:35px}
        .wb_cts07 div li a.active,
        .wb_cts07 div li a:hover {border:0px solid #000; border-bottom:0; background:#d9df01; color:#000; border-radius:10px 10px 0 0; height:100px; line-height:100px; margin:0;}
        .wb_cts07 div ul:after {content:""; display:block; clear:both} 
        .wb_cts08 {background:#222222}

        /* tip */
        .wb_cts09 {background:#fff; text-align:left; padding:100px 0}
        .wb_tipBox {border:1px solid #333; padding:30px; width:980px; margin:0 auto; }
        .wb_tipBox > strong {font-size:16px !important; font-weight:bold; color:#333; display:block; margin-bottom:20px}
        .wb_tipBox p {font-size:24px !important; font-weight:bold;  letter-spacing:-3px; margin:30px 0 10px; color:#111}	
        .wb_tipBox ol li {margin-bottom:10px; line-height:1.3; list-style:decimal; margin-left:15px}
        .wb_tipBox ul {margin-top:20px}
        .wb_tipBox ul li {margin-bottom:5px}
        .wb_tipBox table {width:100%; border-spacing:0px; border:1px solid #c9c7ca; border-top:2px solid #464646; border-bottom:1px solid #464646; table-layout:auto}
        .wb_tipBox th,
        .wb_tipBox td {text-align:center; padding:7px 10px; border-bottom:1px solid #e4e4e4; border-right:1px solid #e4e4e4}
        .wb_tipBox th {font-weight:bold; color:#333; background:#f6f0ec;}	
        .wb_tip_orange {font-size:12px; color:#c03011;}

        /*TAB_tip*/
        .tab02 {margin-bottom:20px}
        .tab02 li {display:inline; float:left; width:33.33333%;}
        .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#323232; color:#fff; padding:14px 0; border:1px solid #323232; margin-right:2px}
        .tab02 li a:hover,
        .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff}
        .tab02 li:last-child a {margin:0}
        .tab02:after {content:""; display:block; clear:both}

        /*TAB*/
        .tabWrapEvt{width:980px; margin:0 auto}
        .tabWrapEvt li {display:inline; float:left; width:490px; margin-left:0px;}
        .tabWrapEvt li a {display:block; text-align:center}
        .tabWrapEvt li a img.off {display:block}
        .tabWrapEvt li a img.on {display:none}
        .tabWrapEvt li a:hover img.off {display:none}
        .tabWrapEvt li a:hover img.on {display:block}
        .tabWrapEvt li a.active img.off {display:none}
        .tabWrapEvt li a.active img.on {display:block}
        .tabWrapEvt li a:hover,
        .tabWrapEvt li a.active {}
        .tabWrapEvt li:last-child a {margin-right:0}
        .tabWrapEvt:after {content:""; display:block; clear:both}
        .tabcts {background:none; width:980px; margin:0px auto 0; text-align:center;}
        .tabcts iframe {width:980px; margin:0px auto 0; height:450px; border:#000 solid 0px;}

        .skybanner {position:fixed; top:200px; right:10px; z-index:1;}
        .skybanner ul li {padding-bottom:5px;}

  </style>

  <div class="p_re evtContent NGR" id="evtContainer">
    <div class="skybanner">
      <ul>
          <li><a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=274" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_s1.jpg"  title="설명회" /></a></li>
          <li><a href="https://pass.willbes.net/pass/consultManagement/index" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_s2.jpg"  title="학원방문상담" /></a></li>
          <li><a href="https://pf.kakao.com/_kcZIu" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_s3.jpg" title="카카오상담하기" /></a></li>
		  <li><a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1101" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_s4.jpg"  title="윌비스통생반" /></a></li>
      </ul>
    </div> 

    <div class="evtCtnsBox wb_cts01">
      <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_top.png" title="7급 Beginners’ Class" />
    </div>
    <!--wb_cts01//-->
    
    <div class="evtCtnsBox wb_cts02">
      <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_01.jpg" title="과목별 고득점 커리큘럼" />
    </div>
    <!--wb_cts02//-->
  
    <div class="evtCtnsBox wb_cts03">
      <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02.jpg" title="학습부터 생활까지 꽉 찬 관리 시스템" />
	   <!--tab-->
      <ul class="tabWrapEvt">
        <li><a href="#tab1" class="active"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t1.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t1_on.png" alt="" class="on"/></a></li>
        <li><a href="#tab2"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t2.png" alt="" class="off"/><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t2_on.png" alt="" class="on"/></a></li>
      </ul>
      <div id="tab1" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t_c1.jpg" alt=""/></div>
      <div id="tab2" class="tabcts"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_02_t_c2.jpg" alt=""/></div>
      <!--tab//--> 
    </div>
    <!--wb_cts03//-->
    
    <div class="evtCtnsBox wb_cts04">
      <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_03.jpg" title="무한회독 학습 프로그램" />
    </div>
    <!--wb_cts04//-->
  
    <div class="evtCtnsBox wb_cts05">
      <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_04.jpg" title="정제된 학습환경 제공" />
    </div>
    <!--wb_cts05//-->
  
     <div class="evtCtnsBox wb_cts06">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_05.jpg" title="수험생에게 꼭 필요한 모든 것" />
     </div>
    <!--wb_cts06//-->
  
  <div class="evtCtnsBox wb_cts07">
	  <img src="https://static.willbes.net/public/images/promotion/2019/05/1252_06.jpg" title="수강신청" />
	  <div>
			<ul class="NGEB">
        <li><a href="#lec1" class="active">일반행정직 / 세무직</a></li>
        <li><a href="#lec2">외무영사직</a></li>
      </ul>
      <div class="lecCts mb40">
          <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3044&campus_ccd=605001&course_idx=1061" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_06_t_c1.jpg" title="일반행정직 / 세무직"  id="lec1"/></a>
          <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3044&campus_ccd=605001&course_idx=1061" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_06_t_c2.jpg" title="외무영사직"  id="lec2"/></a>
      </div>
    </div>
  </div>
  <!--wb_cts07//-->
  
  <div class="evtCtnsBox wb_cts08">
	  <a href="https://pass.willbes.net/pass/event/show/ongoing?event_idx=274&" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/05/1252_07.jpg" title="합격 전략 설명회" /></a>
  </div>
  <!--wb_cts08//-->

  <!--유의사항-->
  <div class="evtCtnsBox wb_cts09">
    <div class="wb_tipBox">
      <ul class="tab02">
        <li><a href="#txt1">수강료 환불규정</a></li>
        <li><a href="#txt2">수강생 혜택상세</a></li>
        <li><a href="#txt3">기타</a></li>
      </ul>
      <div id="txt1">
        <p>수강료 환불규정</p>
        <ol>
          <li><strong>수강료 환불규정<span class="wb_tip_gray"> (학원의 설립 및 과외교습에 관한 법률 시행령 제 18조 제 3항 별표 4)</span></strong><br />
            <br />
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
                <td>반환 사유가발생한 당해 월의 반환대상 수강료와</br />
                  나머지 월의 수강료 전액을 합산한 금액</td>
              </tr>
            </table>
            <br />
			▷ 총 교습 시간은 개강월로부터 종강월까지의 수업 개월 수를 말하며, 환불은 1개월을 기준으로 합니다.<br />
			▷ 환불 접수는 학원 방문 접수만 가능하며, 수강증을 필히 제출하여야 합니다.<br />
			▷ 카드로 결제하신 경우 결제 하셨던 카드를 지참하셔야 하며, 현금/계좌이체로 결제하신 경우 수강생 본인 명의의 통장으로만 환불금 입금 처리됩니다.<br />
			▷ 환불 기준일은 실제 수강 여부와 상관없이 환불 신청 날짜 (환불 신청서 작성 날짜)를 기준으로 합니다.<br />
			▷ 자습실, 사물함, 동영상 강좌, 단과 강좌 등 수강 혜택으로 제공된 모든 서비스는 환불 즉시 이용 정지 및 회수되며, 사용 여부와 상관없이 환불신청일까지 사용료를 산정하여 환불금액에서 공제합니다. <br />
			   <span class="wb_tip_orange">
			   - 사물함 사용료: 1개월-5,000원<br />
			   - 동영상 강좌: 1개월-35,000원<br />
			   - 자습실: 월 150,000원<br />
			   - 단과 강좌: 해당 강좌 수강료<br />
			   - 그 외: 해당 물품 및 서비스의 판매가<br />
			   </span>
			▷ 개강 이후 종합반 과목 수 변경을 원하실 경우, 구매하신 상품을 환불 규정에 의거 환불한 후 재등록 하셔야 합니다.<br />
			▷ 친구추천할인 이벤트 적용 대상자의 경우, 추천/피추천인 환불 시 다른 피추천/추천인이 정상금액으로 재결제 해야 환불이 진행됩니다.<br />
          </li>
        </ol>
      </div>
      <div id="txt2">
        <p>수강생 혜택상세</p>
        <ol>
          <li><strong>전용자습실</strong><br />
           ▷ 지정좌석제로 제공되며, 지정된 좌석이외의 좌석은 원칙적으로 사용이 불가능합니다. <br />
           ▷ 중도 수강 취소 시 지정된 좌석은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
           ▷ 개인 물품의 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
           ▷ 제공된 책상, 의자는 학원의 재산입니다. 임의 이동 및 분실/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
          </li>
           <li><strong>온라인 PASS</strong><br />
           ▷ 기본적으로 판매 중인 온라인PASS가 지급되며, PASS에 포함되지않은 수강 중인 강사의 강의는 별도 지급됩니다.<br />
		   ▷ 중도 수강 취소 시 이용 중인 온라인강좌는 회수되며, 월 35,000원이 차감됩니다.<br />
		   ▷ 수강기간 동안만 이용이 가능합니다.<br />
		  </li>
		  <li><strong>전국 모의고사</strong><br />
           ▷ 윌비스 고시학원에서 진행되는 윌비스 Real 모의고사가 제공됩니다.<br />
		   ▷ 선택과목/응시직렬에 따라 몇몇 과목의 모의고사가 제공되지 않을 수 있습니다.<br />
		  </li>
          <li><strong>사물함</strong><br />
           ▷ 지정 사물함으로 제공되며, 지정된 사물함이외의 사물함은 사용이 불가능합니다.<br />
           ▷ 무단 사용 적발 시, 사용기간에 대한 임대료(월 5,000원)를 지불하셔야 하며, 즉시 회수합니다. 잔여 물품은 폐기처리 되며, 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
           ▷ 중도 수강 취소 시 지정된 사물함은 회수되며, 잔여 물품은 폐기처리 됩니다. 폐기된 물품에 대해서는 학원에서 책임지지않습니다.<br />
           ▷ 개인 사물함 관리의 책임은 개인이 지며, 분실/훼손된 개인 물품에 대해서는 학원에서 책임지지 않습니다.<br />
           ▷ 제공된 사물함는 학원의 재산입니다. 사용 부주의에 의한 고장/훼손 시 수강생에게 배상의 책임이 있습니다.<br />
          </li>
		  <li><strong>면접 지원</strong><br />
           ▷ 13개월 종합반 수강 시에만 제공되는 혜택입니다.<br />
		   ▷ 지원되는 시험은 2020년 7급 국가직(20.8월 시행) 입니다.<br />
		   ▷ 학원사정에 의해 면접반이 개설되지 않을 수도 있습니다.<br />
		   ▷ 중도 수강 취소 시 제공되지 않습니다.<br />
          </li>
          <li><strong>공통 사항</strong><br />
           ▷ 개인 사유에 의해 이용하지 못한 혜택에 대해서는 학원에서 별도로 보상하지 않습니다.<br />
           ▷ 제공된 혜택은 수강생 본인만 사용할 수 있습니다. 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다<br />
          </li>
        </ol>
      </div>
      <div id="txt3">
        <p>기타</p>
        <ol>
          <li><strong>커리큘럼</strong><br />
           ▷ 커리큘럼은 시험일정이나 학원/강사의 사정에 따라 일부 수정될 수 있습니다.<br />
          </li>
          <li><strong>강사진</strong><br />
           ▷ 강사진은 강사 개인사정이나 학원사정에 따라 변경될 수 있습니다.<br />
          </li>
          <li><strong>자습실 및 학원 운영시간</strong><br />
		   ▷ 학원 운영 시간: <span class="wb_tip_orange">월~일 06:30~23:30</span> (자습실 운영시간은 학원 운영 시간과 동일합니다.)<br />
		   ▷ 데스크 운영 시간: <span class="wb_tip_orange"> 평일 07:30~20:00, 공휴일: 11:00~16:00 </span><br />
		   ▷ 1월 1일, 설 당일, 추석 당일은 건물 휴무로 운영되지 않습니다.<br />
          </li>
		  <li><strong>TEST 프로그램(전국 모의고사 포함)</strong><br />
           ▷ TEST 프로그램은 일일, 월간 TEST가 제공됩니다.<br />
		   ▷ Daily/Monthly TEST의 경우, 19년 12월까지만 제공되며, 강사의 강의 계획에 따라 제공되지 않을 수 있습니다.<br />
		   ▷ 전국 모의고사는 2개월에 한번 진행될 예정이나, 학원사정이나 시험 일정에 따라 기간이 변경될 수 있습니다.<br />
          </li>
          <li><strong>강의 수강</strong><br />
		   ▷ 수강 신청한 강의만 수강하실 수 있으며, 무단 청강 적발 시 전액등록조치 혹은 퇴실 조치가 이루어 질 수 있으며, 추가적인 학원 상품 등록이 불가할 수 있습니다.<br />
		   ▷ 등록하신 강좌는 본인만 수강이 가능하며, 본인 이외의 인원에게 판매/대여/양도할 수 없으며, 적발 시 법적 책임이 있습니다. <br />
		   ▷ 선택과목 변경(전반)은 개강 주에만 가능하며, 이후에는 불가능합니다. <br />
		   ▷ 강의는 학원/강사 사정에 의해 폐강될 수 있으며, 시간과 교수진이 변경 될 수 있으며 폐강될 수도 있습니다. <br />(폐강 시, 환불 규정에 의거 환불 처리됩니다.)<br />
		   ▷ 개인 사유로 인하여 결석/조퇴하는 경우, 환불 및 별도의 보강 진행은 불가하며 해당 교습시간을 이월하실 수 없습니다. <br />
	       ▷ 수강 확인은 수강증 검사가 수시로 진행되니 꼭 지참하시고 수강하시기 바랍니다.  (수강증 분실 및 미지참 등으로 강의 수강에 불편함이 발생할 수 있습니다.)<br />
          </li>
          <li><strong>교재</strong><br />
           ▷ 교재는 별도 구매입니다. <br />
           ▷ 강사의 강의계획에 따라 추가적인 교재가 사용될 수도 있습니다.<br />
          </li>
         </ol>
      </div>
    
	  </div>
  </div>
  <!--wb_tip//-->
  
</div>
<!-- End Container -->

<script type="text/javascript">
        $(document).ready(function(){
            $('.tabWrapEvt').each(function(){
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

		$(document).ready(function(){
            $('.wb_cts07 ul').each(function(){
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);}
		);

        function go_popup() {  
            $('#popup').bPopup();
        };  

    </script>

@stop