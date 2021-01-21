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

        .sky {position:fixed;top:200px;right:50px;z-index:1;}   

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/01/2044_top_bg.jpg) no-repeat center;}

        .wb_02 {background:#F0F0F0;}

        .wb_03 {background:#fff;padding-bottom:25px;}
        
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2021/01/2044_sky.png" alt="스파르타 관리반 수강신청" ></a>
        </div>  

        <div class="evtCtnsBox wb_top">
			<img src="https://static.willbes.net/public/images/promotion/2021/01/2044_top.jpg"  alt="스파르트 합격관리반" />
		</div>

        <div class="evtCtnsBox wb_01" >
			<img src="https://static.willbes.net/public/images/promotion/2021/01/2044_01.jpg"  alt="나는 지금?"/>			
		</div>

		<div class="evtCtnsBox wb_02" >
			<img src="https://static.willbes.net/public/images/promotion/2021/01/2044_02.jpg"  alt="스폐셜 혜택" />
		</div>
        
		<div class="evtCtnsBox wb_03" id="apply">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2044_03.jpg"  alt="전수받기 및 수강신청" usemap="#Map2024_apply" border="0" />
            <map name="Map2024_apply" id="Map2024_apply">
                <area shape="rect" coords="423,416,690,543" href="https://willbesedu.willbes.net/pass/support/review/index?s_cate_code=3125" target="_blank" />
                <area shape="rect" coords="275,633,842,746" href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605005&course_idx=1312" target="_blank" />
            </map>
		</div>	
       
	</div>
    <!-- End Container -->

    <script type="text/javascript">
        
    </script> 

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop