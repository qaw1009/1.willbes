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

    .wb_cts01 {position:relative; overflow:hidden;  background:#e8e46b url("https://static.willbes.net/public/images/promotion/2019/06/1253_top_bg.jpg") center top  no-repeat}
    .wb_cts02 {background:#f2f2f2; padding:100px 0;}
    .wb_cts03 {background:#fff; padding-top:80px;}
    .wb_cts04 {background:#304892;}
    .wb_cts05 {background:#fff}
		
		/*TAB_교수커리*/
    .tab01Box {padding:20px 0 10px; width:980px; margin:0 auto;}
    .tab01Box p {display:block;}	
    .tab01 {margin-bottom:30px}
    .tab01 li {display:inline; float:left; width:18%;}
    .tab01 li a {display:block; text-align:center; font-size:14px; font-weight:bold; background:#fefefe; color:#000; padding:14px 0; border:1px solid #ccc; margin-right:4px}
    .tab01 li a:hover,
    .tab01 li a.active {background:#0078d7; color:#fff; border:1px solid #0078d7;}
    .tab01 li:last-child a {margin:0}
    .tab01:after {content:""; display:block; clear:both}
		
		/* tip */
    .wb_cts_tip {background:#fff; text-align:left; padding:100px 0}
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

    /*TAB_이용약관*/
    .tab02 {margin-bottom:20px}
    .tab02 li {display:inline; float:left; width:33.33333%;}
    .tab02 li a { display:block; text-align:center; font-size:14px; font-weight:bold; background:#333; color:#fff; padding:14px 0; border:1px solid #333; margin-right:2px}
    .tab02 li a:hover,
    .tab02 li a.active {background:#fff; color:#000; border:1px solid #666; border-bottom:1px solid #fff}
    .tab02 li:last-child a {margin:0}
    .tab02:after {content:""; display:block; clear:both}

		/*퀵배너*/
		.skybanner {position:fixed; top:200px; right:10px; z-index:1;}
    .skybanner ul li {padding-bottom:5px;}

  </style>

 <div class="p_re evtContent NGR" id="evtContainer">
    <div class="skybanner">
      <ul>
          <li><a href="https://pass.willbes.net/pass/consultManagement/index" target="_blank" ><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_s2.jpg"  title="학원방문상담" /></a></li>
          <li><a href="https://pf.kakao.com/_kcZIu" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_s3.jpg"  title="카카오상담하기" /></a></li>
		  <li><a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1101" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_s4.jpg"  title="윌비스통생반" /></a></li>
      </ul>
    </div> 

    <div class="evtCtnsBox wb_cts01">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1253_top.png" title="윌비스 T-PASS_학원실강Ver." />
    </div>
    <!--wb_cts01//-->
    
    <div class="evtCtnsBox wb_cts02">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1253_01.gif" title="원하는 교수님의 모든 강의를 학원에서 들을 수 있을까?" />
	  <img src="https://static.willbes.net/public/images/promotion/2019/06/1253_01_2.jpg" title="공부만 해도 모자를 시간에 고민하는 수험생의 사정을 너무나 잘 알기에 준비했습니다." />
    </div>
    <!--wb_cts02//-->
  
    <div class="evtCtnsBox wb_cts03">
		
			<!--국어-->
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t1.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t1">기미진</a></li>
			  </ul>
			  <div id="t1">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_1.jpg" usemap="#Map_p1" title="#" border="0" />
				  <map name="Map_p1">
					<area shape="rect" coords="279,49,422,83" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1253&prof_idx=50242"  target="_blank">
					<area shape="rect" coords="279,225,419,261" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1253&prof_idx=50242" target="_blank">
				  </map>
				</p>
			  </div>
			</div>
			<!--국어//--> 

			<!--영어--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t2.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t2">김신주</a></li>
				<li><a href="#t2_2">한덕현</a></li>
				<li><a href="#t2_3">김영</a></li>
				<li><a href="#t2_4">성기건</a></li>
			  </ul>
			  <div id="t2">
				<p><a href="javascript:alert('준비중');"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_2.jpg" title="김신주" /></a></p>
			  </div>
			  <div id="t2_2">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1254&prof_idx=50500" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_2_2.jpg" title="한덕현" /></a></p>
			  </div>
			  <div id="t2_3">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1254&prof_idx=50384" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_2_3.jpg" title="김영" /></a></p>
			  </div>
			  <div id="t2_4">
				<p><a href="javascript:alert('준비중');"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_2_4.jpg" title="성기건" /></a></p>
			  </div>
			</div>
			<!--영어//--> 

			<!--한국사--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t3.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t3">조민주</a></li>
				<li><a href="#t3_2">박민주</a></li>
			  </ul>
			  <div id="t3">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_3.jpg" usemap="#Map_p3" title="조민주" border="0" />
				  <map name="Map_p3">
					<area shape="rect" coords="278,31,417,65" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1255&prof_idx=50648" target="_blank">
					<area shape="rect" coords="279,202,425,234" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1255&prof_idx=50648" target="_blank">
				  </map>
				</p>
			  </div>
			  <div id="t3_2">
				<p><a href="javascript:alert('준비중');"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_3_2.jpg" title="박민주" /></a></p>
			  </div>
			</div>
			<!--한국사//--> 

			<!--행정학--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t4.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t4">김덕관</a></li>
				<li><a href="#t4_2">윤세훈</a></li>
			  </ul>
			  <div id="t4">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_4.jpg" usemap="#Map_p4" title="김덕관" border="0" />
				  <map name="Map_p4">
					<area shape="rect" coords="278,30,422,67" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1258&prof_idx=50560" target="_blank">
					<area shape="rect" coords="275,197,421,234" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1258&prof_idx=50560" target="_blank">
				  </map>
				</p>
			  </div>
			  <div id="t4_2">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_4_2.jpg" usemap="#Map_p4_1" title="윤세훈" border="0" />
				  <map name="Map_p4_1">
					<area shape="rect" coords="278,33,422,64" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1258&prof_idx=50042" target="_blank">
					<area shape="rect" coords="278,198,423,235" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1258&prof_idx=50042" target="_blank">
				  </map>
				</p>
			  </div>
			</div>
			<!--행정학//--> 

			<!--행정법/헌법/경제학--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t5.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t5">행정법 한세훈</a></li>
				<li><a href="#t5_2">헌법 유시완</a></li>
				<li><a href="#t5_3">경제학 황정빈</a></li>
			  </ul>
			  <div id="t5">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_5.jpg" usemap="#Map_p5" title="한세훈" border="0" />
				  <map name="Map_p5">
					<area shape="rect" coords="276,27,427,65" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&subject_idx=1257&prof_idx=50716" target="_blank">
					<area shape="rect" coords="276,197,424,233" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1257&prof_idx=50716" target="_blank">
				  </map>
				</p>
			  </div>
			  <div id="t5_2">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1260&prof_idx=50140" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_5_2.jpg" title="유시완" /></a></p>
			  </div>
			  <div id="t5_3">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1261&prof_idx=50488" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_5_3.jpg" title="황정빈" /></a></p>
			  </div>
			</div>
			<!--행정법/헌법/경제학//--> 

			<!--국제법/국제정치학--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t6.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t6">이상구</a></li>
			  </ul>
			  <div id="t6">
				<p><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_6.jpg" usemap="#Map_p6" title="이상구" border="0" />
				  <map name="Map_p6">
					<area shape="rect" coords="245,29,407,65" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1273&prof_idx=50394" target="_blank">
					<area shape="rect" coords="253,197,400,233" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1274&prof_idx=50394" target="_blank">
				  </map>
				</p>
			  </div>
			</div>
			<!--국제법/국제정치학//--> 

			<!--세법/회계학--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t7.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t7">세법 고선미</a></li>
				<li><a href="#t7_2">회계학 김영훈</a></li>
			  </ul>
			  <div id="t7">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3046&subject_idx=1269&prof_idx=50188" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_7.jpg"  title="고선미" /></a></p>
			  </div>
			  <div id="t7_2">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3046&subject_idx=1270&prof_idx=50228" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_7_2.jpg" title="김영훈" /></a></p>
			  </div>
			</div>
			<!--세법/회계학//--> 

			<!--중국어/일본어--> 
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_t8.png" title="#" />
			<div class="tab01Box">
			  <ul class="tab01">
				<li><a href="#t8">중국어 조소현</a></li>
				<li><a href="#t8_2">일본어 황선아</a></li>
			  </ul>
			  <div id="t8">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1308&prof_idx=50062" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_8.jpg" title="조소현" /></a></p>
			  </div>
			  <div id="t8_2">
				<p><a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3044&subject_idx=1307&prof_idx=50727" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/06/1253_02_8_2.jpg" title="황선아" /></a></p>
			  </div>
			</div>
			<!--중국어/일본어//-->

	 </div>
    <!--wb_cts03//-->
    
    <div class="evtCtnsBox wb_cts04">
      <img src="https://static.willbes.net/public/images/promotion/2019/06/1253_03.jpg" title="제공되는 혜택" />
    </div>
    <!--wb_cts04//-->
  
  <!--유의사항-->
  <div class="evtCtnsBox wb_cts_tip">
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
           <li><strong>온라인 복습동영상</strong><br />
           ▷ 기본적으로 판매 중인 온라인 단강좌가 지급됩니다.<br />
		   ▷ 중도 수강 취소 시 이용 중인 온라인 강좌는 회수되며, 판매중인 수강료 기준으로 차감됩니다.<br />
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
           ▷ 지원되는 시험은 아래와 같습니다.<br />
		     - 9급 : 2020년 9급 국가직(20.3월 시행), 지방직/서울시(20.4월 시행) 중 택1<br />
			 - 7급 : 2020년 7급 국가직(20.8월 시행)<br />
		   ▷ 중도 수강취소 시 제공되지 않습니다.<br />
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
    $('.tab01').each(function(){
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

        function go_popup() {  
            $('#popup').bPopup();
        };  

    </script>

@stop