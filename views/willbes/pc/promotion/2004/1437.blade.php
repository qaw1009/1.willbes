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

     
        .evt01 {background:url("https://static.willbes.net/public/images/promotion/2019/10/1437_top_bg.jpg") center top  no-repeat}

        .evt02 {background:#ececec;}

        .evt03 {background:#fff;}
    </style>
    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="evtCtnsBox evt02" id="evt12">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_top.jpg" title="오태진 근현대사 이번에 끝내기">
        </div>    
        <div class="evtCtnsBox evt03" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_01.jpg" title="100점에 도전">
        </div>      
        <div class="evtCtnsBox evt04" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/10/1437_02.jpg" usemap="#Map1435a" title="수강 신청하기" border="0">
            <map name="Map1435a" id="Map1435a">
                <area shape="rect" coords="676,992,917,1066" href="https://police.willbes.net/pass/offLecture/index/type/all?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055#none" target="_blank" />
            </map>
        </div> 
    </div>
    <!-- End Container -->
@stop