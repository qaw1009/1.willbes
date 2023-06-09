@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        span {vertical-align:auto}
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/03/1183_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fce428 url(https://static.willbes.net/public/images/promotion/2019/03/1183_top_bg.jpg) no-repeat center top; padding-bottom:120px;}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

     <div class="evtCtnsBox evtTop"><img src="https://static.willbes.net/public/images/promotion/2019/03/1183_top.jpg" title="오태진 한국사 3개년기출특강"></div>
	 <div class="evtCtnsBox evt01"><img src="https://static.willbes.net/public/images/promotion/2019/03/1183_01.jpg" usemap="#Map1181A" title="시험전,수강생공부방법" border="0">
		<map name="Map1181A">
		  <area shape="rect" coords="203,909,928,1002" href="{{ site_url('/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" target="_blank" alt="신청하기">
		</map>
	  </div>

	</div>
    <!-- End Container -->

@stop