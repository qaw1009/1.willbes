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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

/************************************************************/     

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certC_top_bg.jpg) no-repeat center top;}	
		.cert_01{background:#fff;}	
		.cert02{background:#f5f5f5;}
		.cert03{background:#fff;}
		.cert03 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:370px; left:910px;}
		label.check2 {top:500px; left:930px;}
		label.check3 {top:625px; left:173px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check4 {top:1160px; left:675px;}
		label.check5 {top:1290px; left:930px;}
		label.check6 {top:1415px; left:153px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check7 {top:370px; left:425px;}
		input + label {
			position:absolute; z-index:1; width:20px; height:20px; width:30px;height:30px; outline:5px solid #15365d; background:#fff
		}
		input:checked + label:after {
			position: relative;
			content: '\2714';
			font-size: 30px;
		}
		input:checked + label.check3:after,
		input:checked + label.check6:after {
			font-size: 20px;
		}		
		input {display:none}	 

		.skybanner{position: fixed; top: 280px;right: 2px;z-index: 1;}	
		.tipPopup{position: absolute;left: 49%;top: 100px;z-index: 2;display:none;}		
		.tipPopup2{position: absolute;left: 49%;top: 890px;z-index: 3;display:none;}
 
    </style>
	<div class="evtContent">
		<div class="skybanner">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobC_D_popup.png" alt="소방설비 베너">
		</div>
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_top.jpg" alt="전기/소방 자격증" />
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_01.jpg" alt="취업난 돌파" />
		</div>
		<div class="evtCtnsBox cert02">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_02.jpg" alt="윌비스와 함께" usemap="#Map1299A"/>
			<map name="Map1299A" id="Map1299A">
				<area shape="rect" coords="843,775,1063,846" href="#none" alt="대표강의" />
				<area shape="rect" coords="845,1308,1059,1375" href="#none" alt="교재 구매하기"/>
			</map>

		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_03.jpg" alt="수강신청" usemap="#Map1290A" />
				<map name="Map1290A" id="Map1290A">
				  <area shape="rect" coords="665,471,743,504" href="#none" alt="상세보기" id="stoggleBtn" />
				  <area shape="rect" coords="720,622,888,655" href="#info" alt="이용안내 확인하기"/>
				  <area shape="rect" coords="301,715,822,805" href="#none" alt="소방설비 신청하기" /> 
				  <area shape="rect" coords="662,1258,748,1294" href="#none" alt="상세보기" id="stoggleBtn2"/>
				  <area shape="rect" coords="743,1410,901,1446" href="#info" alt="이용안내 확인하기" />
				  <area shape="rect" coords="266,1545,863,1636" href="#none" alt="소방설비 더블패스 신청하기" />
				</map>
				<div class="tipPopup"id="textZone1">
					<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobC_D_popup.png" alt="전기기사 상세보기 팝업">
				</div>
				<div class="tipPopup2"id="textZone2">
					<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobC_D_popup.png" alt="전기기사 상세보기 팝업">
				</div>
			<input name="ischk1" type="checkbox" value="Y" id="ischk1"><label for="ischk1" class="check1"></label>
			<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>
			<input name="ischk3" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label> 
			<input name="ischk4" type="checkbox" value="Y" id="ischk4"><label for="ischk4" class="check4"></label>
			<input name="ischk5" type="checkbox" value="Y" id="ischk5"><label for="ischk5" class="check5"></label>
			<input name="ischk6" type="checkbox" value="Y" id="ischk6"><label for="ischk6" class="check6"></label> 
			<input name="ischk7" type="checkbox" value="Y" id="ischk7"><label for="ischk7" class="check7"></label> 
		</div>
		<div class="evtCtnsBox cert04" id="info">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_04.jpg" alt="이용안내" />  
		</div>  
	</div>
    <!-- End Container -->

	<script type="text/javascript">   
    $(document).ready(function(){
        $("#stoggleBtn").click(function(){
            $("#textZone1").slideToggle("fast");
        });		
		$("#stoggleBtn2").click(function(){
            $("#textZone2").slideToggle("fast");
        });		

    });
	</script>
@stop