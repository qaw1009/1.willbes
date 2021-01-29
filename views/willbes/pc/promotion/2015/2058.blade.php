@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">            
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
        .sky {position:fixed; top:200px; width:180px; right:10px; z-index:1;}
        .sky a {padding-bottom:10px; display:block}
        
        .evtTop {background:#fff4e2}
        .evt01 {background:#fec260}
        .evt02 {background:#fff4e2}
        .evt03 {background:#252656; padding-bottom:150px}
        .evt03 div {width:1060px; margin:0 auto}
        .evt03 div a {display:inline-block; width:500px; background:#e9de10; color:#252656; text-align:center; font-size:30px; padding:40px 0;border-radius:20px; border:2px solid #000; border-bottom:10px solid #000;}
        .evt03 div a:hover {background:#fff; }
        .evt03 div a:last-child {float:right}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2058_top.jpg" title="스파르타 합격 관리반">                    
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2058_01.jpg" title="비포어">           
        </div>
        
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2058_02.jpg" title="애프터">           
        </div>
        
        <div class="evtCtnsBox evt03 NSK-Black">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/2058_03.jpg" title="차별화된 합격시스템">
            <div>
                <a href="https://police.willbes.net/pass/offPackage/index/type/super?cate_code=3010&campus_ccd=605005&course_idx=" target="_blank">신광은 경찰팀 수강접수하기</a>
                <a href="https://willbesedu.willbes.net/pass/offPackage/index?cate_code=3125&course_idx=" target="_blank">드림 경찰팀 수강접수하기</a>
            </div>
        </div>
	</div>
    <!-- End Container --> 

@stop