@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    .eventPop {font-size:12px; color:#333; line-height:1.5}
	.eventPop {width:530px; margin:0 auto} 
	.eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}
	.eventPopS1 {margin-top:1em}	
	.eventPopS1 span {margin-right:10px}

    .eventPopS2 {margin-top:1em}
    .eventPopS2 span {margin-right:10px}
    .eventPopS2 strong {color:red}
    .eventPopS2 p {border-bottom:1px solid #adadad; padding:1em 0;}

    .eventPopS3 {margin-top:2em}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul,
    .eventPopS3 li {padding:0; margin:0}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
    .eventPopS3 li {margin-left:15px; margin-bottom:5px}
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}

    .eventPopS4 {text-align:center;padding:20px 0; margin-top:20px}
    .eventPopS4 a {margin:0 5px}
    select,
    input[type=file],
    input[type=text] {padding:2px; margin-right:10px}
    }
</style>

<div class="willbes-Layer-PassBox NGR">
    <form id="" name="" method="post"  action="">

    <div class="eventPop">
		<h3>
            2019년 경찰 1차 합격예측 풀서비스<br>
            사전예약 신청하기
        </h3>
        <div class="eventPopS1">
			<div>	
				<span>직렬</span>
				<select  name="test_subject" id="test_subject"style="width:120px" onchange="fn_area(this.value);">
					<option value="AA">일반공채:남</option>
					<option value="BA">일반공채:여</option>
					<!-- <option value="CA">101단</option> -->
					<option value="DA">전의경경채</option>
				</select>
				<span>지역</span>
				<select id="listview" name="listview" >
					<option value="">지역구분</option>
				</select>
				<span>응시번호</span>
				<input type="text" name="textfield" id="textfield" style="width:120px">
			</div>
			<div class="mt10">				
				<span>추천인아이디</span>
				<input type="text" name="RE_USER_ID" id="RE_USER_ID" style="width:120px">
				<span>추천인이름</span>
				<input type="text" name="RE_USER_NM" id="RE_USER_NM" style="width:120px">
			</div>
        </div>
        <div class="eventPopS2">
            <p>
                * 확인이 어려운 증빙서류를 첨부하거나, 부정한 방법으로 참여했을 경우, 별도 통보 없이 제공된 혜택은 즉시 회수됩니다.<br>
                * 3차 필기합격생만 적용 및 인증됩니다. 
            </p>
        </div>
        <div class="eventPopS3">
            <p>* 개인정보 수집 및 이용에 대한 안내</p>
            <ul>
                <li>개인정보 수집 이용 목적 <br>
                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 무료특강수강</li>
                <li>개인정보 수집 항목<br>
                    - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 응시표)
                </li>
                <li>개인정보 이용기간 및 보유기간<br>
                    - 본 수집, 활용목적 달성 후 바로 파기
                </li>
                <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,<br>
                    - 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                </li>
            </ul>
            <div>
                위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에 <br>
                <input name="is_chk" id="is_chk" type="radio" value="Y"><label for="AA1">동의합니다.</label> <input name="is_chk" id="is_chk" type="radio" value="N"><label for="BB1">동의하지 않습니다.</label>
            </div>
        </div>
        
        <div class="eventPopS4">
            <a href="javascript:fn_submit();"><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn1.gif"  alt="확인" /></a>
            <a href="javascript:close();"><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn2.gif"  alt="취소" /></a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->

<script>
	$(document).ready(function(){
		$(".ATTACH_FILE").change(function(){
			var fileNm = $(this).val();
			if (fileNm != "") {
			    var ext = fileNm.slice(fileNm.lastIndexOf(".") + 1).toLowerCase();
			    if (!(ext == "gif" || ext == "jpg" || ext == "png")) {
			        alert("이미지파일 (.jpg, .png, .gif ) 만 업로드 가능합니다.");
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
	
	fn_area("AA");
	function fn_area(type){
		$.ajax({
      		type: 'GET', 
       		async: true,
       		url: "<c:url value='/gosi/ajax_list.html' />?GOSI_TYPE=" + type + "&FLAG=AREA",
       		success: function(data) {
				var response = $.trim(data);
       			if(response == "") {
					jQuery("#listview").empty();
       				jQuery("#listview").append("<option value=''>지역구분</option>");
       			} else {
                	jQuery("#listview").empty();
                    jQuery("#listview").append(response);
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
			   	if((key_num < "AC00") || (key_num > "D7A3")) { 
			    	event.returnValue = false;
			   	}    
		  	}
		}
		if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9) {
			$(obj).focus();
		}else{
			alert("숫자만 입력해주세요.");
			$(obj).val("");
			event.returnValue = false;
		}

	}
		
	function fn_submit(){

		var must_subject = '';
		var  subject = '';
		var  subject_temp = '';
		var  c = 0;
		
		if("<c:out value='${userInfo.USER_ID}' />" == ""){
			alert("로그인을 해주세요.");
			return;
		}
		if($("#test_subject option:selected").val() == ''){
			alert("응시직렬을 선택해주세요");
			return;
		}
		if($("#listview option:selected").val() == ''){
			alert("지역구분을 선택해주세요");
			return;
		}
		if($("#textfield").val() == ''){
			alert("응시번호를 입력해주세요");
			return;
		}
		if($("#ATTACH_FILE").val() == ''){
			alert("수험표 인증파일을 첨부해 주세요.");
			return;
		}
		if($(".ATTACH_FILE").val() == ''){
			alert("수험표 인증파일을 첨부해 주세요.");
			return;
		}
	    if($("input[name='is_chk']:checked").val()!='Y'){
			alert("개인정보 수집에 동의해 주세요.");
			return;
		}
	    
		var checkparam = "EVENT_NO="+$("#EVENT_NO").val()+"&GOSI_CD="+$("#GOSI_CD").val();
		checkparam = checkparam+"&GOSI_TYPE="+$("#test_subject option:selected").val();
		checkparam = checkparam+"&GOSI_AREA="+$("#listview option:selected").val();
		checkparam = checkparam+"&RST_NO="+$("#textfield").val();
		
		$.ajax({		     
			type: "GET", 
		    url : '<c:url value="/gosi/rst_pass_check.json"/>?'+ checkparam,
		    dataType: "text",
		    async : false,
		    success: function(RES) {
				if($.trim(RES)=="Y"){
					$.ajax({
						type: "GET", 
					    url : '<c:url value="/gosi/Event3_Check.do"/>?'+ checkparam,
					    dataType: "text",  
					    async : false,
					    success: function(RES) {
					    	if($.trim(RES)=="N"){
					        	alert("이미 인증한 계정입니다.");
					        	return;
					      	}else{
								fn_phone();
								fn_insert();
					      	}
					 	},error: function(){
					    	alert("검색실패");
					      	return;
					    }
					});
				}else{
		   	 		alert("올바른 응시번호가 아닙니다.");
		        	return;
				}
			},error: function(){
		    	alert("인증오류! 다시 인증해주세요.");
		      	return;
	     	}
		});
	    
	}
	
	function fn_insert(){

	 	$('#ajaxForm').attr("action","<c:url value='/gosi/exam_event_3_insert.do'/>");
		$('#ajaxForm').ajaxForm({
	        beforeSubmit: function (data, frm, opt) {
			 },
	        success: function(responseText, statusText){
	        	 if($.trim(responseText)=="N"){
				     alert("인증 실패하였습니다.");
				     return;  
				   }else{
				    alert("신청되었습니다.");
				    window.close();
				   }
	        },
	        //ajax error
	        error: function(){
	        	alert("인증실패");
	        }                               
	      }).submit();
	}
		
	function fn_phone(){
		$("#PHONENUM").val("<c:out value='${userInfo.PHONE_NO}' />");

		var message = "";
		message += "[윌비스 신광은경찰]\n\n";
		message += "2018년 3차 필기 합격 인증이 완료되었습니다.\n";

		$("#MESSAGE").val(message);
		
		$.ajax({
	        type: "POST",
	        url : '<c:url value="/event/doPhone.html"/>' ,
	    	data: $("#ajaxForm").serialize(),
	        cache : false,
	        dataType : "text",
	        success : function(RES) {
	            if(RES != ""){
	            }
	        },
	        error : function() {
	            alert("문자 발송 실패");
	            return;
	        }
	    });        
	}
</script>

@stop