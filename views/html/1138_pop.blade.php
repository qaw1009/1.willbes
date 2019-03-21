@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    body {padding:0; margin:0}
    h3 {background:#115087; color:#fff; text-align:center; padding:20px 0; font-size:160%; font-weight:600}
	select {height:28px;line-height:28px}
	input[type=text],
	input[type=password],
	input[type=number]{height:26px;line-height:26px;border:1px solid #979797; padding:0 5px}
	input[type=text]:focus,
	input[type=password]:focus,
	input[type=number]:focus{border:1px solid #00a2e2;background:#edf6fb;color:#464d61; padding:0 5px}
	input[type=text].readonly,
	input[type=password].readonly,
    input[type=number].readonly{border:1px solid #d8dee3;background:#f1f3f4; padding:0 5px}
    input[type=file] {width:70%}
		
	
	.Layerpop {background:#FFF; border:#4582cd solid 3px; padding:30px}
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
	.preTb label {margin-right:10px; display:inline-block; cursor:pointer}	
	
	.Layerpop .termsBx01{padding:0px 20px ; height:80px;overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5}
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  {margin-top:15px}
	.Layerpop .termsBx01 ul li p {padding-left:6px}
	.Layerpop .termsBx01 .span { height:60px; text-align:right}	

	.popupCts {padding:0 30px}
	.popupCts span {display:inline-block; color:#000; font-weight:bold; vertical-align:middle}	
	.popupCts span.red {color:#F00; text-decoration:underline}
	.popupCts input,
	.popupCts select {vertical-align:middle; height:26px; line-height:26px}
	.popupCts input[type=text] {padding:0 2px; height:24px; line-height:24px}
}
</style>

<div class="willbes-Layer-PassBox NGR">
<div id="popup" class="Layerpop" >
	<form name="eventForm" id="eventForm" method="post" enctype="multipart/form-data" action="">
	<input type="hidden" name="searchEventNo"  id ="searchEventNo" value="219"/>
	<input type="hidden" name="SELECTED_OPTION_NO"  id ="SELECTED_OPTION_NO" value="1"/>
	<input type="hidden" name="MESSAGE"  id ="MESSAGE" value=""/>
	<input type="hidden" name="MMS_YN"  id ="MMS_YN" value=""/>
	
    	<h1>최종합격! 必合노하우!<br>황세웅 면접 캠프</h1>
       
		
	  <p class="tit"><b>3법특강 신청접수</b></p>

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
            	  <th >지원청</th>
            	  <td colspan="3">
                  <label><input type="radio" name="ARM_NM" value="서울청" /> 서울청</label>
                  <label><input type="radio" name="ARM_NM" value="부산청" /> 부산청</label>
                  <label><input type="radio" name="ARM_NM" value="대구청" /> 대구청</label>
                  <label><input type="radio" name="ARM_NM" value="인천청" /> 인천청</label>
                  <label><input type="radio" name="ARM_NM" value="광주청" /> 광주청</label>
                  <label><input type="radio" name="ARM_NM" value="대전청" /> 대전청</label>
                  <label><input type="radio" name="ARM_NM" value="울산청" /> 울산청</label>
                  <label><input type="radio" name="ARM_NM" value="경기남부청" /> 경기남부청</label>
                  <label><input type="radio" name="ARM_NM" value="경기북부청" /> 경기북부청</label>
                  <label><input type="radio" name="ARM_NM" value="강원청" /> 강원청</label>
                  <label><input type="radio" name="ARM_NM" value="충북청" /> 충북청</label>
                  <label><input type="radio" name="ARM_NM" value="충남청" /> 충남청</label>
                  <label><input type="radio" name="ARM_NM" value="전북청" /> 전북청</label>
                  <label><input type="radio" name="ARM_NM" value="전남청" /> 전남청</label>
                  <label><input type="radio" name="ARM_NM" value="경북청" /> 경북청</label>
                  <label><input type="radio" name="ARM_NM" value="경남청" /> 경남청</label>
                  <label><input type="radio" name="ARM_NM" value="제주청" /> 제주청</label>
                  </td>
          	  </tr>
            	<tr >
            	  <th >일정</th>
            	  <td colspan="3">2019년 3월 7일(목) 14:00</td>
          	  </tr>
            </tbody>
        </table>

		<p class="tit">2018 3차 필기합격 수험표 첨부파일등록</p>
            <div>
				<span>첨부파일등록</span>&nbsp;&nbsp;<input type="file" name="ATTACH_FILE" id="ATTACH_FILE">
            </div>

            	<p>* 2MB까지 업로드 가능하며, 이미지파일(jpg,png) 또는 PDF 파일 첨부</p>
            	<p>* 3차 필기합격생만 적용됩니다.</p><br><br>


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
        <p class="btn" >
			<a href="javascript:fn_submit()"><img src="http://file3.willbes.net/new_gosi/com_img/box_request.jpg" alt="신청하기" /></a>
			<a href="javascript:window.close()"><img src="http://file3.willbes.net/new_gosi/com_img/box_cancel.jpg"alt="취소" /></a>
		</p>
	</form>
	</div>
</div>
<!--willbes-Layer-PassBox//-->

<script>
$(document).ready(function(){
	$("#ATTACH_FILE").change(function(){
		var fileNm = $(this).val();
		if (fileNm != "") {
		    var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
		    if (!(ext == "png" || ext == "jpg" || ext == "pdf")) {
		        alert("이미지파일 (.png, .jpg 또는 .pdf ) 만 업로드 가능합니다.");
		        $(this).val('');
		        return;
		    }
		}
		// 사이즈체크
        var maxSize  = 2 * 1024 * 1024    //2MB
        var fileSize = 0;
		// 브라우저 확인
		var browser=navigator.appName;
		// 익스플로러일 경우
		if (browser=="Microsoft Internet Explorer")
		{
			 var myFSO = new ActiveXObject("Scripting.FileSystemObject");
			 var filepath = $(this).val();
			 var thefile = myFSO.getFile(filepath);
			 var fileSize = thefile.size;
		}
		// 익스플로러가 아닐경우
		else
		{
			fileSize = this.files[0].size;
		}
        if(fileSize > maxSize)
        {
            alert("첨부파일 사이즈는 2MB 이내로 등록 가능합니다.    ");
            $(this).val('');
            return;
        }
	});
});
//숫자만 입력
	function fn_OnlyNumber1(obj) {
		var number = /[^0-9]/; //숫자만 허용
		if ( obj.value.search(number)!=-1 ){
	        $(obj).val('');
	        obj.focus();
	        return;
	   	}		
	}
	var is_submit = false;
	function fn_submit(){
		if(is_submit==false){
	 	if("<c:out value='${userInfo.USER_ID}' />" == "") {
	 		alert("로그인을 해주세요.");
	 		return;
	 	}
		
		
		if($("#USER_NAME").val() == ""){
			alert("이름을 입력해주세요.");
			$("#USER_NAME").focus();
			return;
		}
		
		
		if($("#PHONE_NO").val() == ""){
			alert("전화번호를 입력해주세요.");
			$("#PHONE_NO").focus();
			return;
		}
		if($("input[name=ARM_NM]:checked").length < 1){
			alert("지원청을 선택해주세요.");
			return;
		}
		if($("#ATTACH_FILE").val() == ""){
			alert("수험표파일을 첨부해주세요.");
			$("#ATTACH_FILE").focus();
			return;
		}
		if(!$("input:checkbox[id='accept_cb']").is(":checked")){
			alert("개인정보 제공 동의에 체크해주십시오.");
			return;
		}
		if(!confirm("최종합격! 필합 노하우!  황세웅 면접캠프 3법특강을 신청하시겠습니까?")) return;
			var message = "<문자쿠폰>"+$("#USER_NAME").val()+"님 "+"황세웅 면접캠프 3법특강 신청해주셔서 감사합니다. 2019.3.7(목) 14시 신광은경찰학원";
			
			var msgbyte =  checkByte(message);
			$("#MESSAGE").val(message);
			if(msgbyte > 80){
				$("#MMS_YN").val("Y");
			}

			
			$('#eventForm').attr("action","<c:url value='/event/eventInsertResultWithFile'/>");
			$('#eventForm').ajaxForm({
		        beforeSubmit: function (data, frm, opt) {
				 },
		        success: function(res){
		        	if(res.returnMsg=="Y"){
			 	    	alert("신청이 완료 되었습니다.");
			 	    	window.close();
			 			
					}else if(res.returnMsg=="N"){
			 	    	alert("이미 신청한 내역이 있습니다.");
			 	    	window.close();
					}
		        },
		        //ajax error
		        error: function(){
		        	alert("인증실패");
		        }                               
		      }).submit();
		}
	}

	//textarea에 입력된 문자의 바이트 수를 체크
	function checkByte(str) {
	   
	       var totalByte = 0;

	       for(var i =0; i < str.length; i++) {
	               var currentByte = str.charCodeAt(i);
	               if(currentByte > 128) totalByte += 2;
			else totalByte++;
	       }
	       return  totalByte;
	}

	//숫자만 입력
		function fn_OnlyNumber1(obj) {
			var number = /[^0-9]/; //숫자만 허용
			if ( obj.value.search(number)!=-1 ){
		        $(obj).val('');
		        obj.focus();
		        return;
		   	}		
		}
</script>

@stop