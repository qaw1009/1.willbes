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
		.cert_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/190618_certA_top_bg.jpg) no-repeat center top;}	
		.cert02 {background:#f5f5f5;}
		.cert03 {position:relative; width:1120px; margin:0 auto} 
		label.check1 {top:355px; left:910px;}
		label.check2 {top:480px; left:930px;}
		label.check3 {top:610px; left:180px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
		label.check4 {top:1145px; left:675px;}
	
		label.check6 {top:1400px; left:205px; background-color: #fff; outline:2px solid #15365d; width:20px;height:20px;}		
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
        /************************************************************/      
    </style> 
	<div class="evtContent">
		<div class="evtCtnsBox cert_top">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_top.jpg" alt="전기/소방 윌비스 자격증" />
		</div>
		<div class="evtCtnsBox">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_01.jpg" alt="취업난 돌파" />
		</div>
		<div class="evtCtnsBox cert02">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_02.jpg" alt="윌비스와 함께" usemap="#Map1293A"/>
			<map name="Map1293A" id="Map1293A">
				<area shape="rect" coords="843,1443,1056,1506" href="#none" alt="교재 구매하기" />
			</map>
		</div>
		<div class="evtCtnsBox cert03">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certA.jpg" alt="수강신청" usemap="#Map1294A" />
				<map name="Map1294A" id="Map1294A">
					<area shape="rect" coords="667,456,747,485" href="#none" alt="상세보기" />
					<area shape="rect" coords="719,605,884,640" href="#info" alt="이용안내 확인하기" />
					<area shape="rect" coords="300,700,819,785" href="#none" alt="전기기사 패스 신청하기" />
					<area shape="rect" coords="736,1244,815,1276" href="#none" alt="상세보기" />
					<area shape="rect" coords="711,1395,873,1429" href="#info" alt="이용안내 확인하기" />
					<area shape="rect" coords="302,1527,826,1619" href="#none" alt="소방설비 패스 신청하기" />
				</map>
			<input name="ischk1" type="checkbox" value="Y" id="ischk1"><label for="ischk1" class="check1"></label>
			<input name="ischk2" type="checkbox" value="Y" id="ischk2"><label for="ischk2" class="check2"></label>
			<input name="ischk3" type="checkbox" value="Y" id="ischk3"><label for="ischk3" class="check3"></label> 
			<input name="ischk4" type="checkbox" value="Y" id="ischk4"><label for="ischk4" class="check4"></label>
			<input name="ischk6" type="checkbox" value="Y" id="ischk6"><label for="ischk6" class="check6"></label> 
		</div>
		<div class="evtCtnsBox" id="info">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_03.jpg" alt="윌비스 수강 이용안내" />
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop