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

        .skybanner {
            position:fixed;
            top:280px;
            right:0;
            z-index:1;
        }   
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/08/1360_top_bg.jpg) no-repeat center top;}      
        .wb_01 {background:#fff;}
        .wb_02 {background:#5f5f5f}
        .wb_03 {background:#464646}
        .wb_04 {background:#5f5f5f;}
        .wb_05 {background:#e2e2e2;}
        .wb_06 {background:#555;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">        
        <div class="skybanner" >
            <a href="#to_go"><img src="https://static.willbes.net/public/images/promotion/2019/08/1360_skybanner.png" alt="스카이배너" ></a>
        </div>           
    
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_top.jpg" alt="프리미엄 심화 이론"/>       
        </div>
       
        <div class="evtCtnsBox wb_01" id="to_go">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_01.jpg" alt="사전접수 이벤트" usemap="#Map1360a" border="0" />
            <map name="Map1360a" id="Map1360a">
                <area shape="rect" coords="456,622,664,684" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />
                <area shape="rect" coords="76,1188,289,1250" href="#careful" />
                <area shape="rect" coords="459,1189,668,1250" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />
                <area shape="rect" coords="833,1184,1044,1250" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="신청하기" />
            </map>          
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_02.jpg" alt="더 늦기 전에 준비" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_03.jpg" alt="최적화된 전문교수진"/>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_04.jpg" alt="심화이론,지금부터 준비"/>
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_05.jpg" alt="수강 신청하기" usemap="#Map1360b" border="0"/>
            <map name="Map1360b" id="Map1360b">
                <area shape="rect" coords="914,477,1007,515" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1056" target="_blank" alt="김현욱 신청하기" />
                <area shape="rect" coords="910,527,1011,564" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1054" target="_blank" alt="하승민 신청하기" />
                <area shape="rect" coords="911,579,1011,618" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank" alt="원유철 신청하기" />
                <area shape="rect" coords="908,625,1014,669" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1055" target="_blank" alt="오태진 신청하기" />
                <area shape="rect" coords="907,676,1010,717" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1057" target="_blank" alt="신광은 신청하기" />
                <area shape="rect" coords="909,728,1014,765" href="https://police.willbes.net/pass/offLecture/index?cate_code=3010&campus_ccd=605001&course_idx=1041&subject_idx=1058" target="_blank" alt="장정훈 신청하기" />
                <area shape="rect" coords="916,1010,1009,1052" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="오태진 종합반 신청하기" />
                <area shape="rect" coords="915,1062,1009,1099" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="원유철 종합반 신청하기" />
                <area shape="rect" coords="915,1348,1009,1387" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="종합반 오태진 신청하기" />
                <area shape="rect" coords="914,1397,1009,1438" href="https://police.willbes.net/pass/offPackage/index?cate_code=3010&campus_ccd=605001&course_idx=1041" target="_blank" alt="종합반 원유철 신청하기" />
            </map>
        </div> 
               
        <div class="evtCtnsBox wb_06" id="careful">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1360_06.jpg" alt="유의사항"/>         
        </div>
      
    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop