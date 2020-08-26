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
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:250px; right:10px; width:128px; z-index:1;}
        .skybanner a {display:block; margin-bottom:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/08/1779_top_bg.jpg) center top no-repeat}    
        .evt01 {background:#fff}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/08/1779_02_bg.jpg) left top repeat-x}
        .evt03 {background:#a7d4ff}
        .evt04 {background:#0e2056}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="skybanner">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_sky01.jpg" alt="한덕현 T" usemap="#Map1779" border="0" />
            <map name="Map1779">
                <area shape="rect" coords="8,60,123,115" href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/1297" target="_blank" alt="한덕현 새벽모의고사">
                <area shape="rect" coords="8,117,122,172" href="https://pass.willbes.net/pass/support/notice/show?board_idx=286968" target="_blank" alt="티패스">
            </map>
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=289239" target="_blank" class="mt10"><img src="https://static.willbes.net/public/images/promotion/2020/08/1779_sky02.jpg" alt="기미진 T" /></a>
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=289043&s_campus=605001" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1779_sky03.jpg" alt="조민주 T" /></a>
        </div>

        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_top.gif" alt="9급 일반행정" />           
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_01.jpg" alt="커리큘럼" usemap="#Map1779_01" border="0" />
            <map name="Map1779_01">
              <area shape="rect" coords="938,1431,1058,1560" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001&subject_idx=1254&prof_idx=50500" target="_blank" alt="한덕현">
              <area shape="rect" coords="940,1608,1060,1736" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001&subject_idx=1257&prof_idx=50616" target="_blank" alt="이석준">
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_02.jpg" alt="프로그램" />
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_03.jpg" alt="프로그램" />
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1779_04.jpg" alt="수강신청" usemap="#Map1779_02" border="0" />
            <map name="Map1779_02">
              <area shape="rect" coords="190,1175,931,1292" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3043&campus_ccd=605001" target="_blank" alt="파란불 수강신청">
              <area shape="rect" coords="278,1422,515,1478" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001&subject_idx=1254&prof_idx=50500" target="_blank" alt="한덕현">
              <area shape="rect" coords="692,1422,928,1475" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001&subject_idx=1257&prof_idx=50616" target="_blank" alt="이석준">
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop