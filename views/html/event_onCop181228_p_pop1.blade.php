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
	input {width:70px}	
	
	.forecast {padding:20px; line-height:1.3} 
	.forecast h4 {padding:10px 0; font-size:120%; font-weight:600; color:#000}
	.forecastCts {margin-bottom:2em}
	.forecastCts p {margin-bottom:1em; color:#115087}
	.forecastCts p a {color:#115087; font-weight:600; text-decoration:underline}	
	.forecastCts ol li {list-style:decimal; margin-left:15px; margin-bottom:10px}
	.forecast ul {margin:2em 0; padding:2em 0; border-top:1px solid #E4E4E4; border-bottom:1px solid #E4E4E4}
	.forecast ul li {list-style:disc; margin-left:15px; margin-bottom:10px}
	
	.forecast .btnSet {text-align:center; padding:1em}
	.forecast .btnSet a {display:inline-block; border:1px solid #115087; color:#115087; height:25px; line-height:25px; margin:0 4px; padding:0 10px}
	.forecast .btnSet a.btnSt1 {color:#fff; background:#115087}
	
	
	.viewTb{width:100%}
	.viewTb th,
	.viewTb td{padding:0.8em;border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd}
	.viewTb thead th,
	.viewTb tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}
	.viewTb thead th {border-top:1px solid #cdcdcd}
	.viewTb thead th:last-child,
	.viewTb tbody td:last-child {border-right:none}
	.viewTb tr.bdRno th:last-child {border-right:none}
	.viewTb tr.txtC td {text-align:center}
	.viewTb input[type=text],
	.viewTb input[type=password],
	.viewTb input[type=number] {width:70px}
	.viewTb td .route li {display:inline; float:left; width:50%}
	.viewTb td .route:after {content:""; display:block; clear:both}
}

</style>
<div class="willbes-Layer-PassBox NGR">
<form name="frm"  id="frm" action="" method="post"  onsubmit="return false;">
	 	<input type="hidden" name="GOSI_CD" id="GOSI_CD" value="2018_MST_3_1" />
		<input type="hidden" name="USER_ID" id="USER_ID" value="${params.USER_ID }" />
		<input type="hidden" id="PHONENUM" name="PHONENUM" value="${userInfo.PHONE_NO }"/>
		<input type="hidden" id="MESSAGE" name="MESSAGE" value=""/>
		<input type="hidden" id="is_mms" name="is_mms" value="Y"/>
		<input type="hidden" name="t_type" id="t_type" />

		<input type="hidden" name="flag_1" id="flag_1" value="1" />
		<input type="hidden" name="flag_2" id="flag_2" value="1" />
		<input type="hidden" name="flag_3" id="flag_3" value="1" />
		<input type="hidden" name="flag_value_1" id="flag_value_1"  />
		<input type="hidden" name="flag_value_2" id="flag_value_2" />
		<input type="hidden" name="flag_value_3" id="flag_value_3" />
		<input type="hidden" name="flag_text_1" id="flag_text_1"  />
		<input type="hidden" name="flag_text_2" id="flag_text_2" />
		<input type="hidden" name="flag_text_3" id="flag_text_3" />

    <h3>나의 위치파악</h3>
    <div class="forecast">        
        <!--미참여 상태-->
        <div class="forecastCts">
        	<h4>기본정보 입력</h4>
            <table class="viewTb">            	
              <col width="40%" />
              <col width="" />
              <tbody>
              <tr>
                <th>이름 </th>
                <td>${userInfo.USER_NM}</td>
              </tr>
              <tr>
                <th>응시번호 </th>
                <td><input type="text" maxlength="5" name="textfield" id="textfield" onkeyup="fn_OnlyNumber2(this);"> </td>
              </tr>
              <tr>
                <th>직렬/지역 구분 </th>
                <td>
					<select name="test_subject" id="test_subject" onchange="fn_area(this.value);" style="width:120px; margin-top:7px;">
						<option value="">응시직렬</option>
						<c:forEach items="${list}" var="data" varStatus="status">
								<option  value="${data.GOSI_TYPE }">${data.GOSI_TYPE_NM }</option>
							</c:forEach>
					</select>				
					<select id="listview" name="listview" style="width:120px; margin-top:7px;" onchange="fn_sel_subject();">
						<option value="">지역구분</option>
					</select>
                </td>
              </tr>
              </tbody>
            </table>
        </div>
        
		<div class="forecastCts">
        	<h4>필기점수 입력</h4>
            <p>반드시 성적표에 기재된 조정점수를 입력해 주세요.<br/> 
			<a href="http://gosi.police.go.kr"  target="_blank">필기시험 성적 확인하기 ▶</a>
            </p>
            <ol  id="sel_subject"></ol>
			<ol  id="h_sel_subject">            
	            <li>공통과목
	               <div><strong>영어</strong> <input type="text" maxlength="3" name="" id="" onkeyup=""> 점   /  <strong>한국사</strong> <input type="text" maxlength="3" name="" id="" onkeyup="">점</div>
	            </li>            
	            <li>선택과목
	              	<table class="viewTb">
	                    <col span="2" />
	                    <tr class="bdRno">
	                      <th>
								<select name="" id="" onchange="" style="width:120px; margin-top:7px;">
									<option value="">선택과목1</option>
								</select>
	                      </th>
	                      <th>
							<select name="" id="" onchange="" style="width:120px; margin-top:7px;">
								<option value="">선택과목2</option>
							</select>
	                      </th>
	                      <th>
						<select name="" id="" onchange=""  style="width:120px; margin-top:7px;">
							<option value="">선택과목3</option>
						</select>
	                      </th>
	                    </tr>
	                    <tr class="txtC">
	                      <td><input type="text" maxlength="5" name="" id="" onkeyup="" disabled> 점</td>
	                      <td><input type="text" maxlength="5" name="" id="" onkeyup="" disabled> 점</td>
	                      <td><input type="text" maxlength="5" name="" id="" onkeyup="" disabled> 점</td>
	                    </tr>
	                  </table>
	              </li>				
			</ol>
        </div>
        
        <div>
        	<h4>체력점수 / 가산점 입력</h4>
            <strong>체력점수</strong> <input type="text" maxlength="5" name="n_strength" id="n_strength" onkeyup="fn_OnlyNumber2(this);"> 점   /  <strong>가산점</strong> <input type="text" maxlength="5" name="n_addpoint" id="n_addpoint" onkeyup="fn_OnlyNumber2(this);"> 점
        </div>
        
        <ul>
        	<li>본 서비스는 필기시험 점수, 체력 점수, 가산점을 합산한 성적으로 면접점수는 제외되어 실제 결과와 차이가 있을 수 있습니다.</li>
            <li>본 서비스의 점수 입력 마감 기한은 2019년 03월 09일(금)까지 입니다.</li>
        </ul>
        
        <div class="btnSet">
        	<a href="javascript:fn_submit()" class="btnSt1">입력</a>
        	<a href="javascript:window.close()">취소</a>
        </div>
        <!--미참여 상태//-->               
        
    </div>	

</form>
</div>
<!--willbes-Layer-PassBox//-->

<script type="text/javascript">

function fn_area(type){
	
	$("#t_type").val(type);
	
	$.ajax({
		 type: 'GET', 
		 async: true,
		 url: "<c:url value='/gosi/ajax_list.html' />?GOSI_TYPE=" + type + "&FLAG=AREA&GOSI_CD=2018_MST_3",
		 success: function(data) {
			 var response = $.trim(data);
			 if(response == "") {						
				jQuery("#sel_subject").empty();														
				jQuery("#listview").empty();
				jQuery("#listview").append("<option value=''>지역구분</option>");
			 } else {
								 
				 jQuery("#h_sel_subject").show();
				 jQuery("#sel_subject").empty();
                if(type == 'CA'){
                	fn_sel_subject(type);
                	$("#listview").hide();
                }else{
               	 	$("#listview").show();
               	 	jQuery("#listview").empty();
                    jQuery("#listview").append(response);
                }
			 }
		 },
		 error: function(data, status, err) {
	            alert('서버와의 통신이 실패했습니다.');
	     }
	});
	
}


function fn_sel_subject(flag){
	
	var type = '';
	var area = '';
	if(flag == 'CA'){
		type = flag;
		area = 'B';
	}else{
		type = $("#test_subject option:selected").val();
		area = $("#listview option:selected").val();
	}
	$.ajax({
		type: 'GET', 
		async: true,
		url: "<c:url value='/gosi/ajax_list.html' />?GOSI_TYPE=" + type + "&FLAG=SEL_POP1"+"&SEL_AREA="+area+"&GOSI_CD=2018_MST_3",
		success: function(data) {
			var response = $.trim(data);
			if(response == "") {
				alert('리스트가 없습니다.');
			} else {
				//$("input[name=DEL_ARR]").prop("checked", false);
				//$("input[name=allCheck]").prop("checked", false);
				jQuery("#h_sel_subject").hide();		
				jQuery("#sel_subject").empty();
				jQuery("#sel_subject").append(response);
			}
		},
		error: function(data, status, err) {
			alert('서버와의 통신이 실패했습니다.');
     	}
	});
		
}

	// 응시번호용
	function fn_OnlyNumber2(obj) {
		
		for (var i = 0; i < obj.value.length ; i++){			
			chr = obj.value.substr(i,1);  
		  	chr = escape(chr);		  			  	
		  	key_eg = chr.charAt(1);
		  	
			if (key_eg == "u"){
		   		key_num = chr.substr(i,(chr.length-1));
		   		alert(key_num);
			   	if((key_num < "AC00") || (key_num > "D7A3")) { 
			    	event.returnValue = false;
			   	}    
		  	}
		}
		
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9) {
// 			MoveFocus(obj);
		}else{					
			alert("숫자만 입력해주세요.");
			frm.textfield.value = "";
			event.returnValue = false;			
		}
	
	}
	
	// 선택과목용
	function fn_OnlyNumber(obj) {	
		
		for (var i = 0; i < obj.value.length ; i++){			
			chr = obj.value.substr(i,1);  
		  	chr = escape(chr);		  			  	
		  	key_eg = chr.charAt(1);
		  	
			if (key_eg == "u"){
		   		key_num = chr.substr(i,(chr.length-1));
		   		alert(key_num);
			   	if((key_num < "AC00") || (key_num > "D7A3")) { 
			    	event.returnValue = false;
			   	}    
		  	}
		}
		
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9) {
// 			MoveFocus(obj);
		}else{					
			alert("숫자만 입력해주세요\n소수점(.)은 입력가능 합니다.");
			frm.textfield.value = "";
			event.returnValue = false;			
		}
	
	}

	// 정렬함수

	function sortSelect(selId){
	    
		var sel = $('#'+selId);
	    var optionList = sel.find('option');
	    
        optionList.sort(function(a, b){
            //if (a.text > b.text) return 1;
            //else if (a.text < b.text) return -1;
            //else {
                if (a.value > b.value) return 1;
                else if (a.value < b.value) return -1;
                else return 0;
            //}
        });

        // 정렬된 option 리스트를 HTML로 재작성
        var sorted = '';
        for (var i=0; i<optionList.length; i++) {
            var selected = '';
            if (optionList[i].selected) selected = ' selected';	   
            sorted += '<option value="'+optionList[i].value+'"'+selected+'>'+optionList[i].text+'</option>';
        }

        sel.html(sorted);
        
	}	    
	 
	
	
	function fn_sel_subject_tmp(flag, val, text){

		 //alert(obj.data("prev"));

		var flag_1 = $("#flag_1").val();
		var flag_2 = $("#flag_2").val();
		var flag_3 = $("#flag_3").val();
				
		//alert(flag_1 + " / " + flag_2 + " / " + flag_3); 
		
		if(flag==1){
						
			if(flag_1==1){
			
				// alert($("select[name='s_subject_2'] option[value="+val+"]").text() + " / " + $("select[name='s_subject_3'] option[value="+val+"]").text());			
				$('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_3').children("[value='"+val+"']").remove(); // 옵션 삭제				

				$("#flag_1").val("2");
				$("#flag_value_1").val(val);
				$("#flag_text_1").val(text);				
				$("#n_subject_1").attr("disabled", false);
				
			}else{
				
				$('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_3').children("[value='"+val+"']").remove(); // 옵션 삭제		
				
				$("#s_subject_2").append($("<option></option>").val($("#flag_value_1").val()).text($("#flag_text_1").val())); // 옵션 추가
				$("#s_subject_3").append($("<option></option>").val($("#flag_value_1").val()).text($("#flag_text_1").val())); // 옵션 추가
				
				$("#flag_value_1").val(val);
				$("#flag_text_1").val(text);						
				//$("#n_subject_1").attr("disabled", true);
				//$("#n_subject_1").val("");
				
				sortSelect('s_subject_2');
				sortSelect('s_subject_3');
				
			}
			
		}
		
		if(flag==2){
			
			if(flag_2==1){
				
				// alert($("select[name='s_subject_2'] option[value="+val+"]").text() + " / " + $("select[name='s_subject_3'] option[value="+val+"]").text());			
				$('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_3').children("[value='"+val+"']").remove(); // 옵션 삭제				

				$("#flag_2").val("2");
				$("#flag_value_2").val(val);
				$("#flag_text_2").val(text);				
				$("#n_subject_2").attr("disabled", false);
				
			}else{
				
				$('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_3').children("[value='"+val+"']").remove(); // 옵션 삭제		
				
				$("#s_subject_1").append($("<option></option>").val($("#flag_value_2").val()).text($("#flag_text_2").val())); // 옵션 추가
				$("#s_subject_3").append($("<option></option>").val($("#flag_value_2").val()).text($("#flag_text_2").val())); // 옵션 추가
				
				$("#flag_value_2").val(val);
				$("#flag_text_2").val(text);						
				
				sortSelect('s_subject_1');
				sortSelect('s_subject_3');
				
			}
			
		}
		
		if(flag==3){
			
			if(flag_3==1){
				
				// alert($("select[name='s_subject_2'] option[value="+val+"]").text() + " / " + $("select[name='s_subject_3'] option[value="+val+"]").text());			
				$('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제				

				$("#flag_3").val("2");
				$("#flag_value_3").val(val);
				$("#flag_text_3").val(text);				
				$("#n_subject_3").attr("disabled", false);
				
			}else{
				
				$('#s_subject_1').children("[value='"+val+"']").remove(); // 옵션 삭제								
				$('#s_subject_2').children("[value='"+val+"']").remove(); // 옵션 삭제		
				
				$("#s_subject_1").append($("<option></option>").val($("#flag_value_3").val()).text($("#flag_text_3").val())); // 옵션 추가
				$("#s_subject_2").append($("<option></option>").val($("#flag_value_3").val()).text($("#flag_text_3").val())); // 옵션 추가
				
				$("#flag_value_3").val(val);
				$("#flag_text_3").val(text);						
				
				sortSelect('s_subject_1');
				sortSelect('s_subject_2');			
				
			}
			
		}	
		
	}
	


	function fn_submit(){
				
		if("<c:out value='${userInfo.USER_ID}' />" == "") {
	 		alert("로그인을 해주세요.");
	 		return;
	 	}
		if($("#USER_ID").val() == ''){
			alert("로그인을 해주세요.");
			return;
		}
		
		if($("#test_subject option:selected").val() == ''){
			alert("응시직렬을 선택해주세요");
			return;
		}
		
		if($("#listview option:selected").val() == ''&&$("#test_subject option:selected").val()!='CA'){
			alert("지역구분을 선택해주세요");
			return;
		}

		if($("#textfield").val() == ''){
			alert("응시번호를 입력해주세요");
			return;
		}

		var chknum = $.trim($("#EXAMNUM_CHECK").val());
		var checkFail = false;
		if(chknum.indexOf(",")>-1){ //응시번호 범위 1개이상일 경우
			var checkArr = $("#EXAMNUM_CHECK").val().split(",");
			if(checkArr!=null&&checkArr.length>0){
				for(var i=0;i<checkArr.length;i++){
					var arr = checkArr[i].split("~");
					if(arr!=null&&arr.length>1){
						if(parseInt(arr[0])<=parseInt($("#textfield").val())&&parseInt(arr[1])>=parseInt($("#textfield").val())){
							checkFail = true;
							break;
						}
					}
				}
			}
		}else{
			var arr = chknum.split("~");
			if(arr!=null&&arr.length>1){
				if(parseInt(arr[0])<=parseInt($("#textfield").val())&&parseInt(arr[1])>=parseInt($("#textfield").val())){
					checkFail = true;
				}
			}
		}
		if(!checkFail){
			alert("올바른 응시번호가 아닙니다");
			return;
		}
		
		var type = $("#test_subject option:selected").val();
		
		var n1 = $("#n_major_1").val();    // 필수과목1-한국사
		var n2 = $("#n_major_2").val(); 	// 필수과목2-영어
		var n3 = $("#n_subject_1").val(); 	// 선택과목1
		var n4 = $("#n_subject_2").val(); 	// 선택과목2
		var n5 = $("#n_subject_3").val(); 	// 선택과목3 
		var n6 = $("#n_strength").val(); 	// 체력점수
		var n7 = $("#n_addpoint").val(); 	// 가산점
		
		//alert(n1+"/"+n2+"/"+n3+"/"+n4+"/"+n5+"/"+n6+"/"+n7);
		
		if(n1==""  ){
			if($("#test_subject option:selected").val() != "DA") alert("영어 점수를 입력하세요");
			else alert("수사 점수를 입력하세요");
			 $("#n_major_1").focus();
			 return;
		 }
		if(n2==""  ){
			if($("#test_subject option:selected").val() != "DA") alert("영어 점수를 입력하세요");
			else alert("행정법 점수를 입력하세요");
			$("#n_major_2").focus();
			 return;
		 }
		if(n3==""  ){			
			if($("#test_subject option:selected").val() != "DA") alert("선택과목1 점수를 입력하세요");
			else alert("형법 점수를 입력하세요");
			$("#n_subject_1").focus();
			 return;
		 }
		if(n4==""  ){
			if($("#test_subject option:selected").val() != "DA") alert("선택과목2 점수를 입력하세요");
			else alert("형사소송법 점수를 입력하세요");
			$("#n_subject_2").focus();
			 return;
		 }
		if(n5==""  ){
			if($("#test_subject option:selected").val() != "DA") alert("선택과목3 점수를 입력하세요");
			else alert("경찰학개론 점수를 입력하세요");
			$("#n_subject_3").focus();
			 return;
		 }
		if(n6==""  ){
			alert("체력 점수를 입력하세요");
			$("#n_strength").focus();
			 return;
		 }
		if(parseInt(n6)>50){
			alert("체력 점수는 50점을 넘을 수 없습니다.");
			$("#n_strength").focus();
			 return;
		}		
		if(n7==""  ){
			alert("가산점을 입력하세요");
			$("#n_addpoint").focus();
			 return;
		 }
		if(parseInt(n7)>5){
			alert("가산점은 5점을 넘을 수 없습니다.");
			$("#n_addpoint").focus();
			 return;
		}		
		
		if(confirm("등록하시겠습니까?")){
		
			$.ajax({		     
			     type: "GET", 
			     url : '<c:url value="/gosi/exam_rst_no_check.do"/>?RST_NO='+$("#textfield").val()+"&GOSI_CD=2018_MST_3_1",
			     dataType: "text",  
			     async : false,
			     beforeSend: function () {
		        	is_submit = true;
				 },
			     success: function(RES) {
			      if($.trim(RES)=="N"){           
			        alert("이미 등록하셨습니다.");
			        return;
			      }else{
			    	  //if(confirm("[기본 정보]\n응시번호: "+ $("#textfield").val() +"\n응시직렬/지역구분: " + $("#test_subject option:selected").text() + " / " + $("#listview option:selected").text() + "\n" +"공통과목: "+must_subject+" \n선택과목: " + subject_temp + "\n 상기 항목이 맞으면 확인을 클릭해주세요!\n(해당 정보를 바탕으로 성적채점이 진행됩니다.)") ){
							
							var dataString = $("#frm").serialize(); // frm은 form 이름
	
							$.ajax({
							     
							     type: "POST", 
							     url : '<c:url value="/gosi/exam_info_insert.do"/>?',
							     data: dataString,
							     dataType: "text",  
							     async : false,
							     success: function(RES) {
							      if($.trim(RES)=="Y"){  
									//문자보낼시 아래 두줄 주석처리 하고 그아래 주석 풀기
									alert("등록 완료 되었습니다.");
									self.close();
									
						    	  	/* var message = "";
							  		message += "[윌비스신광은경찰]\n";
							  		message += "최종합격예측서비스에\n";
							  		message += "참여해주셔서 감사합니다.\n\n";
							  		message += "본 메시지를 학원 면접 수강신청시에 제시하시면\n";
							  		message += "3만원 할인혜택을 받으실 수 있습니다.\n\n";
							  		message += "*면접 설명회:\n";
							  		message += "일시: 2018.01.13. 13:00\n";
							  		message += "장소: 노량진(본원)\n";
							  		message += "문의:1544-0336\n";

							  		$("#MESSAGE").val(message);
							  		
							  		$.ajax({
							  	        type: "POST",
							  	        url : '<c:url value="/event/doPhone.html"/>' ,
							  	    	data: $("#frm").serialize(),
							  	        cache : false,
							  	        dataType : "text",
							  	        success : function(RES) {
							  	            if(RES != ""){
						  	            	 	alert("등록 완료 되었습니다.");
										        self.close();
							  	            }
							  	        },
							  	        error : function() {
							  	            alert("검색 실패");
							  	            return;
							  	        }
							  	    });
 */									
							      }else{
							    	  alert("입력실패");
							    	  self.close();
							      }
							     },error: function(){
							      alert("입력실패");
							      self.close();
							     }
							  });
							
						//}	  
			      }
			     },
			     complete:function(){
			    	  is_submit = false;
			     },error: function(){
			      alert("검색실패");
			      is_submit = false;
			      self.close();
			     }
			  });
		
		}
		
	}	
	
	
</script>

<script>
    $(document).ready(function(){
        $('ul.tabs').each(function(){
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

                e.preventDefault()})})});
</script>


@stop