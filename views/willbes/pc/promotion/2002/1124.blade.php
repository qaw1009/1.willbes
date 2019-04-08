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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_01 {background:#4596db url(https://static.willbes.net/public/images/promotion/2019/04/1124_top_bg.jpg) no-repeat top;}
        .wb_02 {background:#464646}	            
        .wb_03 {background:#eee}            
        .wb_04 {background:#fff}	
        .wb_05 {background:#ededed}	
        .wb_06 {background:#3d3d3d url(https://static.willbes.net/public/images/promotion/2019/04/1124_05_bg.jpg) no-repeat top}
        	
    </style>


<div class="p_re evtContent" id="evtContainer">
    <div class="evtCtnsBox wb_01" id="main">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_top.jpg"  alt="메인" usemap="#link1" />		
		<map name="link1" >
			<area shape="rect" coords="822,249,1028,434" href="{{ site_url('/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1040') }}" alt="개강" />
		</map>
	</div>

	<div class="evtCtnsBox wb_02" >
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_01.jpg"  alt="교수님"/>
	</div>

	<div class="evtCtnsBox wb_03" >
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_02.jpg"  alt="커리큘럼" />
	</div>
		
	<div class="evtCtnsBox wb_04" >
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_03.jpg"  alt="언론" usemap="#link2" />
		<map name="link2" >
			<area shape="rect" coords="80,523,287,576" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" alt="언론보도" />
		</map>
	</div>
		
	<div class="evtCtnsBox wb_05" >
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_04.jpg"  alt="과정안내" />
	</div>
		
	<div class="evtCtnsBox wb_06" >
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_05.jpg"  alt="신광은경찰팀"/>
		{{--<iframe width="854" height="480" src="https://www.youtube.com/embed/re8w_IFAPS4?rel=0" frameborder="0" allowfullscreen></iframe>--}}
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1124_05_01.jpg"  alt="수강신청하기"  usemap="#link3"/>
		<map name="link3" >
			<area shape="rect" coords="440,126,676,319" href="{{ site_url('/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1040') }}" alt="신광은경찰팀 일반공채" />
		</map>
    </div>
    
</div>
<!-- End Container -->       

@stop