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

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certB_top_bg.jpg) no-repeat center top;}	
		.cert_01{background:url(https://static.willbes.net/public/images/promotion/2019/06/190619_certB_01_bg.jpg) no-repeat center top;}	
		.cert02{background:#fff;}
		.cert03{background:#f5f5f5;}
		.cert04 {position:relative;width:1120px; margin:0 auto} 
		.cert04 label {position:absolute; z-index:1;width:20px;height:20px;                        }
		.cert04 label.check1 {top:378px; left:679px;}
		.cert04 label.check2 {top:518px; left:930px;}
		.cert04 label.check3 {top:647px; left:174px;}
		.cert04 .check1{border:5px solid #15365d;width:30px;height:30px;background-color:#fff;}
		.cert04 .check2{border:5px solid #15365d;width:30px;height:30px;background-color:#fff;}
		.cert04 .check3{background-color: #fff;}
		

        /************************************************************/      
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
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_03.jpg" alt="윌비스 수강 스텝별" />
		</div>
		<div class="evtCtnsBox cert04">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_04.jpg" alt="수강신청" usemap="#Map1287A"/>
			<map name="Map1287A" id="Map1287A">
				<area shape="rect" coords="666,488,746,520" href="#;" target="_blank" />
				<area shape="rect" coords="742,638,901,673" href="#;" target="_blank"  />
				<area shape="rect" coords="271,771,857,858" href="#;" target="_blank"  />
			</map>
			<label class="check1"><input name="ischk1" type="checkbox" value="Y"></label>
			<label class="check2"><input name="ischk2" type="checkbox" value="Y"></label>
			<label class="check3"><input name="ischk3" type="checkbox" value="Y"></label>            
		</div>
		<div class="evtCtnsBox">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190619_certB_05.jpg" alt="이용안내" />
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop