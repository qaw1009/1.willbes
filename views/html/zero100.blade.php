@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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

        .zero100_01 {background:url(https://static.willbes.net/public/images/promotion/2019/06/zero100_01_bg.jpg) no-repeat center top;}
        .zrCts01 {position:relative; width:1120px; margin:0 auto;}        
        
        .zrCts01 span {position:absolute;}
        .zrCts01 span.img01 {width:696px; top:650px; left:567px; z-index:2;}        
        
        .zrCts01 span.img02 {width:702px; top:572px; left:56px; z-index:1; animation:ani02 1s ease-in; -webkit-animation:ani02 1s ease-in;}
        @@keyframes ani02{
		0%{left:567px; opacity: 0;}
		90%{left:0; opacity: .9;}
		100%{left:56px; opacity: 1;}
        }

        .zero100_02 {background:url(https://static.willbes.net/public/images/promotion/2019/06/zero100_02_bg.jpg) no-repeat center top;}
        .zrCts02 {position:relative; width:1120px; margin:0 auto;}               
        .zrCts02 span {position:absolute; width:204px; top:710px; left:335px; z-index:1; animation:ani03 1s infinite;}
        @@keyframes ani03{
		0%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
		50%{-webkit-transform:scale3d(1.15,1.15,1);transform:scale3d(1.15,1.15,1)}
		100%{-webkit-transform:scale3d(1,1,1);transform:scale3d(1,1,1)}
		}
    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox zero100_01">
            <div class="zrCts01">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_01.jpg" alt="공무원 시작은 윌비스 ‘제로백’과 함께"  />
                <span class="img01"><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img01.png" alt="zero100"  /></span>
                <span class="img02"><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img02.png" alt="자동차"  /></span>
            </div>      
        </div>
        <div class="evtCtnsBox zero100_02">
            <div class="zrCts02">
                <img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_02.jpg" alt="공무원 시작은 윌비스 ‘제로백’과 함께"  />
                <span><img src="https://static.willbes.net/public/images/promotion/2019/06/zero100_img03.png" alt="조건없이"  /></span>
            </div>      
        </div>

    <!-- End Container -->

@stop