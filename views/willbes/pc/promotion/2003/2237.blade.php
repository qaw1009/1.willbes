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

        /************************************************************/ 

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2237_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#eeecea;}    

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2237_03_bg.jpg) no-repeat center top;}    


        /************************************************************/      
    </style> 

	<div class="evtContent NGR">

		<div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2237_top.jpg" alt="기술직, 군무원 최우영" />
		</div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2237_01.jpg" alt="위립스 최우영이 약속합니다." />
		</div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2237_02.jpg" alt="기술직 군무원 맞춤 커리큘럼" />          
		</div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2237_03.jpg" alt="최우영 교수" />
		</div>

        <div class="evtCtnsBox evt04">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2237_04.jpg" alt="수강신청" />
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183060" target="_blank" title="군무원 전자직 9급" style="position: absolute; left: 12.86%; top: 38.65%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183061" target="_blank" title="군무원 전자직 7급" style="position: absolute; left: 40.71%; top: 38.65%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183062" target="_blank" title="군무원 전자직 7급 경채" style="position: absolute; left: 69.11%; top: 38.65%; width: 18.75%; height: 2.48%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183002" target="_blank" title="군무원 통신직 9급" style="position: absolute; left: 12.86%; top: 63.26%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183003" target="_blank" title="군무원 통신직 7급" style="position: absolute; left: 40.71%; top: 63.26%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/183004" target="_blank" title="군무원 통신직 7급 경채" style="position: absolute; left: 69.11%; top: 63.26%; width: 18.75%; height: 2.48%; z-index: 2;"></a>

                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/182688" target="_blank" title="전자직 패키지" style="position: absolute; left: 19.02%; top: 88.31%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/182687" target="_blank" title="통신직 패키지" style="position: absolute; left: 61.34%; top: 88.31%; width: 18.75%; height: 2.48%; z-index: 2;"></a>
            </div>    
		</div>
	</div>
    <!-- End Container -->

@stop