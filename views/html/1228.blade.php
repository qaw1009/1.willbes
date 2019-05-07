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

        /************************************************************/

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;
        -webkit-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        -moz-box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);
        box-shadow: 5px 5px 20px 0px rgba(0,0,0,0.3);}
        .skyBanner li a {display:block; padding:15px 0; text-align:center; background:#fff; color:#000; font-size:14px; font-weight:600; border-bottom:1px solid #000; line-height:1.4}
        .skyBanner li:last-child a {height:27px; line-height:27px; padding:0; background:#000; color:#fff}
        .skyBanner li a:hover {background:#000; color:#fff;}
        .evtTop {background:#404ae0; position:re}
        .btnSet {margin-top:-150px}
        .evt01 {background:#484c57;}
        .evt02 {background:#e65261;}


    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1228_top.jpg" title="광은 서포터즈 1기">
            <div class="btnSet">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/05/1228_01_btn01.png" title="서포터즈 지원서 다운로드"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/05/1228_01_btn02.png" title="합격수기 양식 다운로드"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1228_01.jpg" title="어떤 활동을 하는 서포터즈인가?">
		</div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1228_02.jpg" title="광은 서포터즈 신청안내">
        </div>		

    </div>
    <!-- End Container -->

@stop