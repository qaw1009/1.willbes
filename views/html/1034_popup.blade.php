@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->

<style type="text/css">
	/* 팝업*/	
	.Layerpop {background:#FFF; border:#4582cd solid 3px; padding:30px;}
	.Layerpop h1 {text-align:left; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#000; margin-bottom:20px}
	.Layerpop .tit {font-size:16px; color:#4582cd; font-weight:bold; letter-spacing:1px; text-align:left; padding:0; margin-bottom:10px}
	.Layerpop .ck {padding-left:5px}
	.Layerpop p {margin:10px 0 0 0}
	.Layerpop .btn{text-align:center}
	.Layerpop .btn img {padding:15px 5px 20px 0px}		
		
	.preTb {width:100%; margin-bottom:15px; border-top:#636363 solid 2px; border-bottom:2px solid #636363}
	.preTb th,
	.preTb td {padding:10px 5px; border-bottom:#EEE solid 1px; line-height:20px}
	.preTb th{font-weight:bold !important; background:#F5F5F5}
	.preTb input[type=text] {border:#CCC 1px solid; height:20px; line-height:20px} 	
	.preTb label {margin-right:10px}	
	
	.Layerpop .termsBx01{padding:0px 20px ; height:80px;overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5}
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  {margin-top:15px}
	.Layerpop .termsBx01 ul li p {padding-left:6px}
	.Layerpop .termsBx01 .span { height:60px; text-align:right}	
	#gridContainer * {font-family:'Noto Sans KR', Arial, Sans-serif, "나눔고딕", "돋움"; font-weight:normal}

	.popupCts {padding:0 30px}
	.popupCts span {display:inline-block; color:#000; font-weight:bold; vertical-align:middle}	
	.popupCts span.red {color:#F00; text-decoration:underline}
	.popupCts input,
	.popupCts select {vertical-align:middle; height:26px; line-height:26px}
	.popupCts input[type=text] {padding:0 2px; height:24px; line-height:24px}
	
</style>

<div id="popup" class="Layerpop" >
	<form name="eventForm" id="eventForm" method="post" enctype="multipart/form-data" action="">
	<input type="hidden" name="searchEventNo"  id ="searchEventNo" value="224"/>
	<input type="hidden" name="SELECTED_OPTION_NO"  id ="SELECTED_OPTION_NO" value="1"/>
	<input type="hidden" name="MESSAGE"  id ="MESSAGE" value=""/>
	<input type="hidden" name="MMS_YN"  id ="MMS_YN" value=""/>
	
    	<h1>장정훈 경찰학 무료 숫자특강</h1>
       
		
	  <p class="tit"><b>특강 신청접수</b></p>

        <table class="preTb">
        	<colgroup>
        		<col width="24%" />
        		<col width="32%" />
        		<col width="16%" />
        		<col width="28%" />
        	</colgroup>            
        	<tbody>
            	<tr >
                	<th>성명</th>
                	<td><input type="text" id="USER_NAME" name="USER_NAME" value="${userInfo.USER_NM}" style="width:100px"/></td>
                	<th>연락처</th>
                	<td><input type="text" id="PHONE_NO" name="PHONE_NO" value="${userInfo.PHONE_NO}" style="width:100px" onkeyup="fn_OnlyNumber1(this);"/></td>
                </tr>

            	<tr >
                	<th >캠퍼스</th>
					<td colspan="3">
						<select id="ARM_NM" name="ARM_NM">
							<option value="노량진">노량진</option>
							<option value="신림">신림</option>
							<option value="인천">인천</option>
							<option value="대구">대구</option>
							<option value="부산">부산</option>
							<option value="광주">광주</option>
							<option value="제주">제주</option>
							<option value="전북(전주/익산)">전북(전주/익산)</option>
							<option value="진주">진주</option>
                        </select>
					</td>
				</tr>
            	<tr >
            	  <th >일정</th>
            	  <td colspan="3">2019.3.30(토)~31(일) 14:00</td>
          	  </tr>
            </tbody>
        </table>

    	<div class="termsBx01">
    		<h2>개인정보 수집/이용 동의 안내</h2>
        	<ul class="mgB2">
        		<li>
                1. 개인정보 수집 이용 목적<br>
                 - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                 - 통계분석 및 마케팅<br>
                 - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                </li>
                <li>
                2. 개인정보 수집 항목<br>
                - 필수항목 : 성명, 연락처, 이메일
                </li>
                <li>
                3. 개인정보 이용기간 및 보유기간<br>
                - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                </li>
                <li>
                4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                </li>
                <li>
                5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                </li>
                <li>
                6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
				</li> 
        	</ul>
    	</div><!--//termsBx01-->
        <p class="ck"><input type="checkbox" id="accept_cb" value="N" > 윌비스 신광은경찰학원에 개인정보 제공 동의하기(필수)</p>
        <p class="ck"> * 성명 / 연락처 / 지원청 입력 및 수험표 첨부파일을 등록해야만 신청가능합니다.</p>
        <p class="btn" ><a href="javascript:fn_submit()"><img src="http://file3.willbes.net/new_gosi/com_img/box_request.jpg" alt="신청하기" /></a><a href="javascript:window.close()"><img src="http://file3.willbes.net/new_gosi/com_img/box_cancel.jpg"alt="취소" /></a></p>
	</form>
	</div>
<!--willbes-Layer-PassBox//-->




@stop