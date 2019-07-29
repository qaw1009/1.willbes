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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1342_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#ececec}
        .evt02 {background:#fff;}        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2019/07/1342_03_bg.jpg) no-repeat center top;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer"> 
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_top.jpg" title="마무리특강">        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_01.jpg" title="조금 다른 전략으로 학습">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_02.jpg" title="마무리특강 학습전략">
        </div>

        <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/07/1342_03.jpg" usemap="#Map" title="마무리특강 교수진 및 수강신청" border="0">
            <map name="Map" id="Map">
                <area shape="rect" coords="912,1150,1012,1201" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1057&campus_ccd=605001" target="_blank" alte="형소법 신광은" />
                <area shape="rect" coords="911,1203,1014,1252" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1058&campus_ccd=605001" target="_blank" alte="경찰학 장정훈" />
                <area shape="rect" coords="912,1255,1012,1302" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank" alte="한국사 오태진" />
                <area shape="rect" coords="911,1304,1009,1352" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1055&campus_ccd=605001" target="_blank" alte="한국사 원유철" />
                <area shape="rect" coords="908,1357,1014,1401" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&subject_idx=1060&campus_ccd=605001" target="_blank" alte="행정법 장정훈" />
                <area shape="rect" coords="907,1406,1013,1452" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1056&campus_ccd=605001" target="_blank" alte="형법 김원욱" />
                <area shape="rect" coords="908,1460,1016,1502" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&course_idx=1046&subject_idx=1054&campus_ccd=605001" target="_blank" alte="영어 하승민" />
                <area shape="rect" coords="910,1509,1016,1553" 
                href="https://police.willbes.net/pass/offLecture/index?cate_code=3011&course_idx=1046&subject_idx=1059&campus_ccd=605001" target="_blank" alte="수사 신광은" />
                <area shape="rect" coords="912,1554,1016,1601" 
                href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1046" target="_blank" alte="학원 종합밥" />
            </map>
        </div>

	</div>
    <!-- End Container -->

@stop