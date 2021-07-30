@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/ 

        .sky {position:fixed; width:200px; top:180px; right:10px;z-index:1;}
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:#e1dddc url(https://static.willbes.net/public/images/promotion/2020/12/1971_top_bg.jpg) no-repeat center top;}	      
        .evtTop .tabs {width:1120px; margin:0 auto}
        .evtTop .tabs li {display:inline; float:left; width:50%}
        .evtTop .tabs a {display:block; color:#b7b7b7; background:#37384b; padding:20px 0; text-align:center; font-size:35px; margin-right:1px}
        .evtTop .tabs a.active {color:#37384b; background:#fff;}
        .evtTop .tabs li:last-child {margin:0}
        .evtTop .tabs:after {content:''; display:block; clear:both}

        .evt02 {background:#e9e9e9;}

        /************************************************************/      
    </style> 
	<div class="evtContent NGR">

        <div class="sky">
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2013_sky.png" alt="">
            </a>            
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2014_sky.png" alt="">
            </a>
            <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/01/2015_sky.png" alt="">
            </a>
        </div>

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_top.jpg" alt="윌비스 공무원 x 대방고시학원" />
            <ul class="tabs NSK-Black">
                <li><a href="#tab01" class="active">기술직</a></li>
                <li><a href="/promotion/index/cate/3028/code/2003" target="_blank">자격증</a></li>
            </ul>
		</div>

        <div id="tab01">
            <div class="evtCtnsBox evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_01.jpg" alt="기술직" />
            </div>

            <div class="evtCtnsBox evt02">
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_02.jpg" alt="기술직"/>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176362" target="_blank" alt="전산직 기초" style="position: absolute; left: 21.88%; top: 49.75%; width: 7.59%; height: 3.14%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176364" target="_blank" alt="전산직 기본" style="position: absolute; left: 21.88%; top: 55.51%; width: 7.59%; height: 3.14%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176366" target="_blank" alt="전산직 심화" style="position: absolute; left: 21.88%; top: 61.61%; width: 7.59%; height: 3.14%; z-index: 2;"></a>

                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176388" target="_blank" alt="환경직 기초" style="position: absolute; left: 55%; top: 51.1%; width: 7.32%; height: 3.22%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176390" target="_blank" alt="환경직 기본" style="position: absolute; left: 55%; top: 58.56%; width: 7.32%; height: 3.22%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176391" target="_blank" alt="환경직 심화" style="position: absolute; left: 55%; top: 65.42%; width: 7.32%; height: 3.22%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176393" target="_blank" alt="환경직 특채" style="position: absolute; left: 55%; top: 71.36%; width: 7.32%; height: 3.22%; z-index: 2;"></a>

                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176367" target="_blank" alt="산림자원직 기초" style="position: absolute; left: 88.04%; top: 49.75%; width: 7.32%; height: 3.22%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/176370" target="_blank" alt="산림자원직 기본" style="position: absolute; left: 88.04%; top: 55.34%; width: 7.32%; height: 3.22%; z-index: 2;"></a>

                    <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176396" target="_blank" alt="곽후근 티패스" style="position: absolute; left: 8.48%; top: 92.97%; width: 16.88%; height: 4.58%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176398" target="_blank" alt="환경직 티패스" style="position: absolute; left: 41.61%; top: 92.97%; width: 16.88%; height: 4.58%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/periodPackage/show/cate/3028/pack/648001/prod-code/176397" target="_blank" alt="산림자원직 티패스" style="position: absolute; left: 74.46%; top: 92.97%; width: 16.88%; height: 4.58%; z-index: 2;"></a>
                </div>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2020/12/1971_tab01_03.jpg" alt="기술직" />
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51162?subject_idx=1169&subject_name=%EC%BB%B4%ED%93%A8%ED%84%B0%EC%9D%BC%EB%B0%98&tab=open_lecture" target="_blank" alt="곽후근" style="position: absolute; left: 20.45%; top: 25.47%; width: 7.32%; height: 2.54%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51163?subject_idx=2129&subject_name=%ED%99%98%EA%B2%BD%EA%B3%B5%ED%95%99&tab=open_lecture" target="_blank" alt="신영조" style="position: absolute; left: 69.64%; top: 25.47%; width: 7.32%; height: 2.54%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51165?subject_idx=1182&subject_name=%ED%99%94%ED%95%99&tab=open_lecture" target="_blank" alt="송연욱" style="position: absolute; left: 20.45%; top: 37.57%; width: 7.32%; height: 2.54%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/51164?subject_idx=1182&subject_name=%ED%99%94%ED%95%99&tab=open_lecture" target="_blank" alt="김병일" style="position: absolute; left: 69.64%; top: 37.57%; width: 7.32%; height: 2.54%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50395?subject_idx=2130&subject_name=%ED%99%98%EA%B2%BD%EB%B3%B4%EA%B1%B4&tab=open_lecture" target="_blank" alt="하재남" style="position: absolute; left: 20.45%; top: 49.47%; width: 7.32%; height: 2.54%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50541?subject_idx=1223&subject_name=%EC%9E%84%EC%97%85%EA%B2%BD%EC%98%81&tab=open_lecture" target="_blank" alt="장재영" style="position: absolute; left: 69.64%; top: 49.47%; width: 7.32%; height: 2.54%; z-index: 2;"></a>

                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2013" target="_blank" alt="전산직 패스" style="position: absolute; left: 10.09%; top: 81.62%; width: 16.79%; height: 3.68%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2014" target="_blank" alt="환경직 패스" style="position: absolute; left: 41.61%; top: 81.62%; width: 16.79%; height: 3.68%; z-index: 2;"></a>
                    <a href="https://pass.willbes.net/promotion/index/cate/3028/code/2015" target="_blank" alt="산림자원직 패스" style="position: absolute; left: 73.04%; top: 81.62%; width: 16.79%; height: 3.68%; z-index: 2;"></a>
                </div>
            </div>
        </div>
	</div>
    <!-- End Container -->
@stop