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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2019/04/1069_01_bg.jpg") no-repeat center top}
        .wb_cts01 div {position:relative}
        .wb_cts01 div span {position:absolute; width:319px; top:1030px; left:50%; margin-left:-285px; z-index:10}

        .wb_cts02 {background:url("https://static.willbes.net/public/images/promotion/2019/04/1069_02_bg.jpg") no-repeat center top}
        .wb_cts03 {background:#212931}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/04/1069_skybanner.png" alt="매직아이 김신주 영어 어휘 PACK"/></a>
        </div>    
        <div class="evtCtnsBox wb_cts01" >
                <div>
                <span><a href="#event"><img src="https://static.willbes.net/public/images/promotion/2019/04/1069_01_btn.gif" alt="선착순 20명 교재 무료" /></a></span>
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1069_01.jpg" alt="매직아이 김신주 영어 어휘 PACK"/>
            </div>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1069_02.jpg" alt="빠른 합격을 위한 효율적인 영어 학습" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1069_03.gif" alt="김신주 매직아이 영어 커리큘럼" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox" id="event">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1069_04.jpg" alt="매직아이 김신주 영어 어휘 PACK 수강신청" usemap="#Map1069" border="0"  />
            <map name="Map1069" id="Map1069">
                <area shape="rect" coords="976,619,1153,668" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150378') }}" target="_blank" alt="어휘레벨패키지" />
                <area shape="rect" coords="974,709,1151,758" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150658') }}" target="_blank" alt="빈출어휘 패키지" />
              <area shape="rect" coords="975,295,1148,345" href="{{ site_url('/lecture/show/cate/3019/pattern/only/prod-code/152647') }}" alt="매직아이 어휘 특강" />
            </map>
        </div>
        <!--wb_cts04//-->

    </div>
    <!-- End Container -->
@stop