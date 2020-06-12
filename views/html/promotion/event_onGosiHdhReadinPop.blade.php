@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    .Layerpop { position:absolute;margin-left:0px;width:470px; background:#FFF; border:#4582cd solid 3px;   }
	.Layerpop h1 {text-align:center; margin:20px; letter-spacing:-1px; height:50px; line-height:50px; font-size:24px; color:#fff; background:#4582cd;}
	.Layerpop .tit { font-size:16px; color:#4582cd; width:415px;font-weight:bold; letter-spacing:1px; text-align:left; padding-bottom:15px;}
	.Layerpop .ck {padding-left:5px;}
	.Layerpop p {margin:10px 0 0 25px;}
	.Layerpop .btn{ text-align:center;width:415px;}
	.Layerpop .btn img {padding:15px 5px 10px 0px;}	
	
	p {padding-left:8px; padding-bottom:5px; color:#000}
	span {color:#000; color:#000; font-weight:bold; }	
		
	.preTb { width:100%; max-width:420px; margin-left:25px; margin-bottom:15px; font-size:140%;}
	.preTb tr{ margin::10px 0;}
	.preTb th, .preTb td {padding:10px 5px;}
	.preTb th{font-weight:bold; text-align:left;background:#fff; color:#C00; border-bottom:#ebebeb 1px solid;}
	.preTb .TL {border-bottom:#ebebeb 1px solid; font-weight:bold; }	
	.preTb td {font-weight:bold; height:20px; padding-left:5px;}
	.preTb input {border:#CCC 1px solid; } 		
	
	.Layerpop .termsBx01{ padding:0px 20px ; margin:0px 30px; height:80px; overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5; }
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  { margin-top:15px;}
	.Layerpop .termsBx01 ul li p { padding-left:6px;}
    .Layerpop .termsBx01 .span {  height:60px; text-align:right;}
    
    .popBtns {text-align:center; margin: 30px 0 30px}
    .popBtns a {display:inline-block; margin:0 3px; color:#fff; background:#000 url(http://www.willbescop.net/assets/assets/img/common/arrow_02.png) no-repeat 85% center; font-size:140%; height:36px; line-height:36px; border:1px solid #000; padding:0 30px; font-weight:bold; font-family:'NanumBarunGothic', 'Malgun Gothic', Arial,Sans-serif}
    .popBtns a.btnA {background:#707070 url(http://www.willbescop.net/assets/img/common/arrow_02.png) no-repeat 85% center; border:1px solid #707070}
    .popBtns a:hover {color:#000; background:#fff; height:36px; line-height:36px; border:1px solid #000}
</style>

<div class="popWrap NGR">
    <div id="popup" class="Layerpop" >
        <form name="eventForm" id="eventForm">
            <h1 class="NGEB">온라인 독해 첨삭지도반 예약신청</h1>
        
            <table class="preTb">
                <colgroup>
                    <col width="30%" />
                    <col width="70%" />
                </colgroup>            
                <tbody>
                    <tr>
                        <th colspan="2" style="padding-top:30px; font-weight:bold;" >예약정보입력</th>
                    </tr>	
                    <tr class="TL">
                        <td><span>*이름</span></td>
                        <td><input type="text" id="USER_NM" name="USER_NM"  value="<c:out value='${userInfo.USER_NM}' />" style="width:90%; margin-top:7px;" readonly/></td>					
                    </tr>
                    <tr class="TL">
                        <td><span>*전화번호</span></td>
                        <td><input type="text" id="PHONE_NO" name="PHONE_NO"  onKeyDown="fn_OnlyNumber(this);" value="<c:out value='${userInfo.PHONE_NO}' />" style="width:90%; margin-top:7px;"/></td>
                    </tr>
                </tbody>
            </table>

            <div class="popBtns">
                <a href="javascript:fn_RegUser()" class="btnA">
                    등록
                </a>
                <a href="javascript:window.close()">
                    취소
                </a>
            </div>
        </form>
    </div>            
</div>

<script type="text/javascript">

function fn_RegUser(){
	
	if($("#PHONE_NO").val() == ""){
        alert("전화번호를 입력해 주세요.");
        $("#PHONE_NO").focus();
        return;
    } 	
	
	if(!confirm("등록하시겠습니까?")){
		return;
	}	
	
    $.ajax({
        type: "POST",        
        url: '<c:url value="/event/editUserRegistration.json"/>',
        data: $("#eventForm").serialize(),        		
        dataType: "json",
        async : false,
        success: function(result) {            
        	alert(result.sucess);
        	self.close();
        }
    });		
	
}

//숫자만 입력
function fn_OnlyNumber(obj) {
	
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
        MoveFocus(obj);
    }else{
        alert("숫자만 입력해 주세요.");
        //$(obj).val('');
        $(obj).focus();
        event.returnValue = false;
    }
}

</script>

@stop