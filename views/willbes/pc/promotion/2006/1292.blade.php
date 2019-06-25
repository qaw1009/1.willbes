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
		label.check3 {top:480px; left:173px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check4 {top:1150px; left:920px;}
		label.check5 {top:1290px; left:930px;}
		label.check6 {top:1270px; left:153px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check7 {top:370px; left:425px;}
		input + label {
			position:absolute; z-index:1; width:30px; height:30px; outline:5px solid #15365d; background:#fff
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
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_02.jpg" alt="윌비스와 함께" usemap="#Map1292B"/>
			<map name="Map1292B" id="Map1292B">
			  <area shape="rect" coords="840,1387,1054,1454" href="https://job.willbes.net/book/index/cate/308902" target="_blank" alt="교재 구매하기"/>
			</map>
		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certC_03.jpg" alt="수강신청" usemap="#Map1292A" />
			<map name="Map1292A" id="Map1292A">
			  {{--<area shape="rect" coords="538,472,616,505" href="#none" alt="상세보기" id="stoggleBtn" />--}}
			  <area shape="rect" coords="715,471,883,504" href="#info" alt="이용안내 확인하기"/>
			  <area shape="rect" coords="297,563,818,653" href="#none" alt="소방설비 신청하기" onclick="goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');" />
			  <area shape="rect" coords="663,1107,749,1143" href="#none" alt="상세보기" id="stoggleBtn2"/>
			  <area shape="rect" coords="741,1261,899,1297" href="#info" alt="이용안내 확인하기" />
			  <area shape="rect" coords="262,1392,859,1483" href="#none" alt="소방설비 더블패스 신청하기" onclick="goCartNDirectPay('double_pass', 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');" />
			</map>
			<div class="tipPopup" id="textZone1">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobC_D_popup.png" alt="전기기사 상세보기 팝업">
			</div>
			<div class="tipPopup2" id="textZone2">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobC_D_popup.png" alt="전기기사 상세보기 팝업">
			</div>
			{{-- PASS 수강신청 --}}
			<div id="pass">
				<input name="y_pkg" type="checkbox" value="155042" id="ischk7" class="chk_pass" onchange="checkOnly('.chk_pass', this.value);"><label for="ischk7" class="check7"></label>
				<input name="y_pkg" type="checkbox" value="155043" id="ischk1" class="chk_pass" onchange="checkOnly('.chk_pass', this.value);"><label for="ischk1" class="check1"></label>
				{{--<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>--}}
				<input name="is_chk" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>
			</div>
			{{-- Double PASS 수강신청 --}}
			<div id="double_pass">
				<input name="y_pkg" type="checkbox" value="155044" id="ischk4"><label for="ischk4" class="check4"></label>
				{{--<input name="ischk5" type="checkbox" value="Y" id="ischk5"><label for="ischk5" class="check5"></label>--}}
				<input name="is_chk" type="checkbox" value="Y" id="ischk6"><label for="ischk6" class="check6"></label>
			</div>
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

	{{-- 프로모션용 스크립트 include --}}
	@include('willbes.pc.promotion.promotion_script')
@stop