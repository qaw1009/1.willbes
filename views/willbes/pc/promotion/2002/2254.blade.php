@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;ㄴ
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed;top:200px; right:10px; z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

        .wb_top {background:#2753b1 url(https://static.willbes.net/public/images/promotion/2021/06/2254_top_bg.jpg) no-repeat center;}
	
        .wb_02 {background:#2d3744;}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <span class="skybanner">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2213" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2021/06/2254_sky.png" alt="스카이베너" ></a>
        </span>    

        <div class="evtCtnsBox wb_top" id="main">
			<img src="https://static.willbes.net/public/images/promotion/2021/06/2254_top.jpg"  alt="메인"/>
		</div>

        <div class="evtCtnsBox wb_01" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2254_01.jpg"  alt="선택"/>	
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2164" target="_blank" title="문제풀이" style="position: absolute; left: 62.86%; top: 54.98%; width: 18.04%; height: 1.83%; z-index: 2;"></a>		
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" title="문풀 이반공채" style="position: absolute; left: 25.45%; top: 74.28%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank" title="문풀 경행경채" style="position: absolute; left: 55.98%; top: 74.28%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1044" target="_blank" title="문풀2단계 일반공채" style="position: absolute; left: 7.05%; top: 91.57%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1044" target="_blank" title="문풀2단계 경행경채" style="position: absolute; left: 31.88%; top: 91.57%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1045" target="_blank" title="문풀3단계 일반공채" style="position: absolute; left: 55.98%; top: 91.57%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3011&campus_ccd=605001&course_idx=1045" target="_blank" title="문풀3단계 경행경채" style="position: absolute; left: 80%; top: 91.57%; width: 13.21%; height: 1.48%; z-index: 2;"></a>
            </div>
		</div>

		<div class="evtCtnsBox wb_02" >
            <div class="wrap">
			    <img src="https://static.willbes.net/public/images/promotion/2021/06/2254_02.jpg" alt="3가지" />
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/2170" target="_blank" title="기본반" style="position: absolute; left: 62.14%; top: 40.63%; width: 27.68%; height: 1.54%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offPackage/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1040" target="_blank" title="기본+기출" style="position: absolute; left: 36.79%; top: 63.43%; width: 26.43%; height: 1.8%; z-index: 2;"></a>

                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181339" target="_blank" title="형사법" style="position: absolute; left: 3.66%; top: 91.07%; width: 20%; height: 1.62%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181340" target="_blank" title="장정훈" style="position: absolute; left: 27.95%; top: 91.07%; width: 20%; height: 1.62%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/181341" target="_blank" title="김원욱" style="position: absolute; left: 52.14%; top: 91.07%; width: 20%; height: 1.62%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/offLecture/show/cate/3010/prod-code/183267" target="_blank" title="이국령" style="position: absolute; left: 76.52%; top: 91.07%; width: 20%; height: 1.62%; z-index: 2;"></a>
            </div>
		</div>        
       
	</div>
    <!-- End Container -->



@stop