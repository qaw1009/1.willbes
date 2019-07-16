@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    h3 {color:#115087; text-align:center; padding:20px 0; font-size:20px; font-weight:600; border-bottom:2px solid #c14842}}
    span {vertical-align:auto}
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
	
	.Layerpop .termsBx01{padding:0px 20px ; height:80px;overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5}
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  {margin-top:15px}
	.Layerpop .termsBx01 ul li p {padding-left:6px}
	.Layerpop .termsBx01 .span { height:60px; text-align:right}	
    
    .termsBx p {font-size:16px; margin-bottom:10px; font-weight:bold}
    .termsBx li {margin-bottom:10px} 
    .termsBx {margin-bottom:20px}
    .termsBx a {display:block; width:250px; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:50px; line-height:50px;
        font-size:18px; border-bottom:5px solid #6b1612; margin-bottom:20px;
    }
    .termsBx a:hover {background:#a8312b;}
    .termsBx li {display:inline; float:left; margin-right:10px}
    .termsBx:after {content:''; display:block; clear:both} 

    .Layerpop .btn a {width:100px; display:block; text-align:center; background:#c14842; color:#fff; margin:30px auto 0; height:40px; line-height:40px}
    .Layerpop .btn a:hover {background:#000;}
</style>

<div class="willbes-Layer-PassBox NGR">
    <div id="popup" class="Layerpop" >
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_name"  id ="register_name" value="{{ sess_data('mem_name') }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="합격청"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="응시번호"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="register_type" value="promotion"/>

            
            <div id="request">
                <h3>윌비스 신광은경찰 합격자의 밤 신청 </h3>
                <div class="termsBx">
                    <p  class="tit">수강생 정보</p>
                    <ul>
                        <li>
                            <input type="text" id="userName" name="userName" value="{{sess_data('mem_name')}}" placeholder="이름" title="이름" readonly="readonly"/>
                        </li>
                        <li>
                            <input type="text" id="userId" name="userId" value="{{sess_data('mem_id')}}" title="연락처" placeholder="아이디" readonly="readonly"/>
                        </li>
                        <li>
                            <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="전화번호 숫자만 입력.">
                        </li>
                        <li>
                            <input type="text" id="register_data1" name="register_data1" value="" placeholder="합격청">
                        </li>
                        <li>
                            <input type="text" id="register_data2" name="register_data2" value="" placeholder="응시번호">
                        </li>
                    </ul>
                </div>

                <div class="termsBx">
                    <a href="#none" class="file">참여신청 양식 파일 받기 ↓</a> 

                    <p class="tit">참여신청 양식 등록</p>
                    <input type="file" name="ATTACH_FILE" id="ATTACH_FILE" style="width:300px"><br>
                    <div class="mt10">• 참여신청 양식 파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF파일 형태로 첨부</div>
                </div>

                <div class="termsBx01">
                    <h2>개인정보 수집/이용 동의 안내</h2>
                    <ul>
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
                </div>
                <div class="mt10">
                    <input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> <label for="is_chk">윌비스에 개인정보 제공 동의하기(필수)</label>
                </div>

                <div class="btn">
                    <a href="#none" onclick="javascript:fn_submit();">신청하기</a>
                </div>
            </div>
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