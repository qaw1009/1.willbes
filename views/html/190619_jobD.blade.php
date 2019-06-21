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

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certD_top_bg.jpg) no-repeat center top;}	
		.cert02{background:#f5f5f5;}

		.cert03 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:370px; left:920px;}
		label.check2 {top:500px; left:930px;}
		label.check3 {top:625px; left:173px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}	
		label.check4 {top:370px; left:425px;}	
		input + label {
			position:absolute; z-index:1; width:20px; height:20px; width:30px;height:30px; outline:5px solid #15365d; background:#fff
		}
		input:checked + label:after {
			position: relative;
			content: '\2714';
			font-size: 30px;
		}
		input:checked + label.check3:after {
			font-size: 20px;
		}		
		input {display:none}		
		.tipPopup{position: absolute;left: 49%;top: 100px;z-index: 1;display:none;}
           
    </style>

	<div class="evtContent">
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_top.jpg" alt="소방공무원 논스탑" />
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_01.jpg" alt="자격증 취득자" />
		</div>
		<div class="evtCtnsBox cert02">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_02.jpg" alt="윌비스와 함께" usemap="#Map1292A" />
			<map name="Map1292A" id="Map1292A">
				<area shape="rect" coords="841,1439,1059,1507" href="#none" alt="교재 구매하기"/>
			</map>
		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_03.jpg" alt="수강신청" usemap="#Map1291A"/>
			<map name="Map1291A" id="Map1291A">
				<area shape="rect" coords="668,472,746,501" href="#none" alt="상세보기" id="stoggleBtn"  />
			    <area shape="rect" coords="722,621,882,655" href="#info" alt="이용안내 확인하기" />
			    <area shape="rect" coords="271,715,854,801" href="#none" alt="전기+소방 합격패스 신청하기" />
			</map>
			<div class="tipPopup"id="textZone">
				<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_jobA_B_popup.png" alt="전기기사 상세보기 팝업">
			</div>
			<input name="ischk1" type="checkbox" value="Y" id="ischk1"><label for="ischk1" class="check1"></label>
			<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>
			<input name="ischk3" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>   
			<input name="ischk4" type="checkbox" value="Y" id="ischk4"><label for="ischk4" class="check4"></label>         
		</div>
		<div class="evtCtnsBox cert04" id="info">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certD_04.jpg" alt="이용안내" />			
		</div>
	
	</div>
    <!-- End Container -->

    <script type="text/javascript">   
    $(document).ready(function(){
        $("#stoggleBtn").click(function(){
            $("#textZone").slideToggle("fast");
        });        
    });
	</script>
@stop