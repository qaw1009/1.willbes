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

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certB_top_bg.jpg) no-repeat center top;}	
		.cert_01{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certB_01_bg.jpg) no-repeat center top;}	
		.cert02{background:#fff;}
		.cert03{background:#f5f5f5;}
		.cert04 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:380px; left:679px;}
		label.check2 {top:518px; left:930px;}
		label.check3 {top:645px; left:174px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
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
           
    </style> 

	<div class="evtContent">
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_top.jpg" alt="전기/소방분야 올패스" />
		</div>
		<div class="evtCtnsBox cert_01">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_01.jpg" alt="취업난 돌파" />
		</div>
		<div class="evtCtnsBox cert02">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_02.jpg" alt="자격증 수강" />
		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_03.jpg" alt="자격증 수강" usemap="#Map1288A"/>
			<map name="Map1288A" id="Map1288A">
				<area shape="rect" coords="843,1653,1060,1717" href="#none" />
			</map>
		</div>
		<div class="evtCtnsBox cert04">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_04.jpg" alt="수강신청" usemap="#Map1287A"/>
			<map name="Map1287A" id="Map1287A">
				<area shape="rect" coords="666,488,746,520" href="#none" />
				<area shape="rect" coords="742,638,901,673" href="#none" />
				<area shape="rect" coords="271,771,857,858" href="#none" />
			</map>
			<input name="ischk1" type="checkbox" value="Y" id="ischk1"><label for="ischk1" class="check1"></label>
			<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>
			<input name="ischk3" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label>            
		</div>
		<div class="evtCtnsBox">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_05.jpg" alt="이용안내" />
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">
    </script>
@stop