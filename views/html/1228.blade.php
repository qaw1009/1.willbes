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

        .skyBanner {position:fixed; bottom:20px; right:20px; width:138px; border:1px solid #000; z-index:10;}
        
        .evtTop {background:#404ae0; position:relative; }
        .btnSet {position:absolute; bottom:80px; width:596px; left:50%; margin-left:-298px; z-index:1}
        .btnSet a {display:block; float:left}
        .btnSet:after {content:''; display:block; clear:both}

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