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
        .skyBanner {position:fixed; top:330px;right:0;z-index:10;}
        .skyBanner2 {position:fixed; top:490px;right:0;z-index:10;}
        .wb_cts00 {background:#404040}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/10/1431_top_bg.jpg) no-repeat center top;}   
        .evt01 {background:#edebec}
        .evt02 {background:#fff}      
     
    </style>

<div class="p_re evtContent NSK" id="evtContainer">
    <div class="skyBanner">
        <a href="#sky01"><img src="https://static.willbes.net/public/images/promotion/2019/10/1431_sky01.png" title="인.적성반"></a>      
    </div> 
    <div class="skyBanner2">
       <a href="#sky02"><img src="https://static.willbes.net/public/images/promotion/2019/10/1431_sky02.png" title="면접대비반"></a>      
    </div>

    <div class="evtCtnsBox wb_cts00">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1283_00.jpg" alt="슈퍼pass"/>            
    </div>

    <div class="evtCtnsBox evtTop">
		<img src="https://static.willbes.net/public/images/promotion/2019/10/1431_top.jpg" title="해경 포세이돈 면접대비반">
	</div>

	<div class="evtCtnsBox evt01" id="sky01">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1431_01.jpg" usemap="#Map1431a" title="해경 인.적성반" border="0">
        <map name="Map1431a" id="Map1431a">
            <area shape="rect" coords="438,2270,685,2342" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3016&subject_idx=1069&course_idx=1047&campus_ccd=605001" target="_blank" />
        </map>
	</div>

	<div class="evtCtnsBox evt02" id="sky02">
        <img src="https://static.willbes.net/public/images/promotion/2019/10/1431_02.jpg" usemap="#Map1431b" title="면접대비반" border="0">
        <map name="Map1431b" id="Map1431b">
            <area shape="rect" coords="880,397,1039,500" href="https://police.willbes.net/pass/offLecture/index/type/interview?cate_code=3016&subject_idx=1064&course_idx=1047&campus_ccd=605001" target="_blank"/>
            <area shape="rect" coords="883,854,1043,961" href="https://police.willbes.net/pass/offPackage/index?cate_code=3016&course_idx=1047&campus_ccd=605001" target="_blank" />
        </map>
	</div>    
</div>
<!-- End Container -->
@stop