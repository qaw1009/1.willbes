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

		.cert_top{background:url(https://static.willbes.net/public/images/promotion/2019/06/190618_certA_top_bg.jpg) no-repeat center top;}	
		.cert02{background:#f5f5f5;}
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
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_02.jpg" alt="윌비스와 함께" />
		</div>
		<div class="evtCtnsBox">
			<img src="https://static.willbes.net/public/images/promotion/2019/06/190618_certA_03.jpg" alt="윌비스 수강 이용안내" />
		</div>
	</div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>
@stop