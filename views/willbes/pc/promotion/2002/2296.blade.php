@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;ㄴ
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:200px; right:10px; z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/07/2296_top_bg.jpg) no-repeat center;}
	
        .wb_02 {background:#006cff;}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <span class="skybanner">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2289" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/06/2254_sky.png" alt="스카이베너" ></a>
        </span>    

        <div class="evtCtnsBox wb_top" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2021/07/2296_top.jpg"  alt="이달의 추천강좌"/>
		</div>

        <div class="evtCtnsBox wb_01" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2296_01.jpg"  alt="선택"/>	
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2292" target="_blank" title="7개월 슈퍼패스" style="position: absolute; left: 70.71%; top: 62.2%; width: 20.63%; height: 2.13%; z-index: 2;"></a>		
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/184141" target="_blank" title="김원욱 슈퍼패스" style="position: absolute; left: 12.32%; top: 87.92%; width: 11.07%; height: 2.13%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/show/prod-code/184146" target="_blank" title="이국령 슈퍼패스" style="position: absolute; left: 43.39%; top: 87.92%; width: 11.07%; height: 2.13%; z-index: 2;"></a>
            </div>
		</div>

		<div class="evtCtnsBox wb_02" >
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2021/07/2296_02.jpg" alt="마지막 총 정리" />

                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2287" target="_blank" title="마무리" style="position: absolute; left: 22.95%; top: 65.6%; width: 21.96%; height: 3.72%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blank" title="모의고사" style="position: absolute; left: 53.93%; top: 65.52%; width: 24.2%; height: 3.72%; z-index: 2;"></a>

                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank" title="공채 마무리" style="position: absolute; left: 21.34%; top: 79.08%; width: 12.59%; height: 5.73%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1046" target="_blank" title="경채 마무리+기출" style="position: absolute; left: 34.73%; top: 79.08%; width: 12.59%; height: 5.73%; z-index: 2;"></a>

                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" title="모의고사 공채" style="position: absolute; left: 53.39%; top: 79.08%; width: 12.59%; height: 5.73%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1045" target="_blank" title="모의고사 경채" style="position: absolute; left: 66.88%; top: 79.08%; width: 12.59%; height: 5.73%; z-index: 2;"></a>
            </div>
		</div>        
       
	</div>
    <!-- End Container -->



@stop