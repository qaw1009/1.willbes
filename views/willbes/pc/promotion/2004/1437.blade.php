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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}
        /************************************************************/         
        .evt01 {background:url("https://static.willbes.net/public/images/promotion/2019/10/1437_top_bg.jpg") no-repeat center top}
        .evt02 {background:#ececec;}
        .evt03 {background:#fff;}
    </style>
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_top.jpg" title="오태진 근현대사 이번에 끝내기">
        </div>    
        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_01.jpg" title="100점에 도전">
        </div>      
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_02.jpg" usemap="#Map1437a" title="수강 신청하기" border="0">
            <map name="Map1437a" id="Map1437a">
                <area shape="rect" coords="676,992,917,1066" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&amp;campus_ccd=605001&amp;course_idx=1041&amp;subject_idx=1055" target="_blank" alt="수강신청" />
            </map>
        </div>   
    </div>
    <!-- End Container -->
@stop