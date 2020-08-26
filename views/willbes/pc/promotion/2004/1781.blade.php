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

        .skybanner {position:fixed; top:250px; right:10px; width:178px; z-index:1;}
        .skybanner a { display:block; padding-bottom:10px;}

        .evtTop {background:#0A0702 url(https://static.willbes.net/public/images/promotion/2020/08/1781_top_bg.jpg) center top no-repeat}        

        .evt01 {background:#eee}

        .evt02 {background:#fff}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="skybanner">
            <a href="https://pass.willbes.net/pass/promotion/index/cate/3052/code/1721" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1781_sky01.png" alt="광주 윌비스 공무원 필합반" /></a>
            <a href="https://pass.willbes.net/pass/support/notice/show?board_idx=289239" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/08/1781_sky02.png" alt="광주 윌비스 공무원 필합반" /></a>
        </div>

        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1781_top.jpg" alt="군무원" />           
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1781_01.jpg" alt="군무원 커리큘럼" />

        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1781_02.jpg" alt="수강신청" usemap="#Map1781" border="0" />
            <map name="Map1781">
              <area shape="rect" coords="301,2600,823,2684" href="https://pass.willbes.net/pass/offPackage/index?cate_code=3048&campus_ccd=605001" target="_blank" alt="군무원 행정직 수강신청">
              <area shape="rect" coords="144,3018,375,3094" href="https://pass.willbes.net/pass/promotion/index/cate/3052/code/1721" target="_blank" alt="최우영 티패스">
              <area shape="rect" coords="441,3018,690,3094" href="https://pass.willbes.net/pass/support/notice/show?board_idx=289239" target="_blank" alt="기미진 특강">
              <area shape="rect" coords="777,3018,1003,3094" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605001&subject_idx=1257&prof_idx=50616" target="_blank" alt="이석준 특강">
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop